import { test, expect } from '@wordpress/e2e-test-utils-playwright';
import { COLORS, DEFAULT_TRANSITION_TIMING } from './test-utils';
import { Locator, Page } from '@playwright/test';

async function getHoverColor( index: number, navLinks:Locator, page:Page ) {
	await navLinks.nth( index ).hover();
	await page.waitForTimeout( DEFAULT_TRANSITION_TIMING ); // Wait for hover state to apply
	const hoverColor = await navLinks.nth( index ).evaluate( ( el ) => {
		return window.getComputedStyle( el ).color;
	} );
	return hoverColor;
}
async function getTapColor( index: number, navLinks:Locator, page:Page ) {
	await navLinks.nth( index ).evaluate( ( el ) => el.removeAttribute( 'href' ) );
	await navLinks.nth( index ).tap();
	await page.waitForTimeout( DEFAULT_TRANSITION_TIMING ); // Wait for tap state to apply
	const tapColor = await navLinks.nth( index ).evaluate( ( el ) => {
		return window.getComputedStyle( el ).color;
	} );
	return tapColor;
}
function preventOffcanvasCloseOnLinkTap( page:Page ) {
	page.locator( '#offcanvas-navbar' ).evaluate( ( el ) => {
		el.addEventListener( 'hide.bs.offcanvas', ( ev ) => {
			ev.preventDefault();
		} );
	} );
}

test.describe( 'Desktop Navigation Links', () => {
	test.beforeEach( 'Set viewport to desktop size', async ( { isMobile } ) => {
		test.skip( isMobile, 'Skipping desktop navigation tests on mobile viewport' );
	} );
	test.describe( 'Initial state', () => {
		test.beforeEach( 'Open homepage', async ( { page } ) => {
			await page.goto( '/' );
		} );

		test( 'Check if the first nav link in menu is correct', async ( { page } ) => {
			const stayLink = page.getByRole( 'link', { name: 'Stay' } );
			await expect( stayLink ).toBeVisible();
		} );

		test( 'All nav menu links should be white', async ( { page } ) => {
			const navLinks = page.getByRole( 'navigation' ).getByRole( 'link' );
			const count = await navLinks.count();
			for ( let i = 1; i < count; i++ ) {
				await expect( navLinks.nth( i ) ).toHaveCSS( 'color', COLORS.white.bootstrapRgb );
			}
		} );
	} );

	test.describe( 'Interaction states', () => {
		test.beforeEach( 'Open homepage', async ( { page } ) => {
			await page.goto( '/' );
		} );

		test( 'all top-level nav menu links should switch to yellow on interaction', async ( { page } ) => {
			const navLinks = page.locator( '#cno-navbar .btn-group > a.nav-link' );
			const count = await navLinks.count();
			for ( let i = 0; i < count; i++ ) {
				try {
					const hoverColor = await getHoverColor( i, navLinks, page );
					expect( hoverColor ).toBe( COLORS.yellow.bootstrapRgb );
					await page.mouse.move( 0, 0 ); // Move mouse away to trigger hover state change
				} catch ( error ) {
					const failedLinkText = await navLinks.nth( i ).innerText();
					const errorMessage = `Expected nav link at index ${ i } (${ failedLinkText }) to change to yellow on hover, but it did not.`;
					throw new Error( `${ errorMessage } ${ error }` );
				}
			}
		} );

		test( 'top-level nav menu link should be bold when active page', async ( { page } ) => {
			await page.waitForLoadState( 'networkidle' );
			const stayLink = page.getByRole( 'link', { name: 'Stay' } );
			await stayLink.click();
			page.mouse.move( 0, 0 ); // Move mouse away to trigger any potential hover state change
			await expect( stayLink ).toHaveCSS( 'font-weight', '700' );
			await expect( stayLink ).toHaveCSS( 'color', COLORS.white.bootstrapRgb );
		} );

		test( 'internal visited links should not change color', async ( { page } ) => {
			const mercantileLink = page.getByRole( 'link', { name: 'The Mercantile' } );
			await mercantileLink.click();
			await page.goBack();
			page.mouse.move( 0, 0 ); // Move mouse away to trigger any potential hover state change
			await expect( mercantileLink ).toHaveCSS( 'color', COLORS.white.bootstrapRgb );
		} );

		test( 'external visited links should not change color', async ( { page } ) => {
			const externalLink = page.getByRole( 'link', { name: 'Book Now' } );
			const [ newPage ] = await Promise.all( [
				page.waitForEvent( 'popup' ),
				externalLink.click(),
			] );
			await newPage.close(); // simulate user leaving tab
			await page.focus( 'body' );
			await externalLink.blur();
			page.mouse.move( 0, 0 ); // Move mouse away to trigger any potential hover state change
			await expect( externalLink ).toHaveCSS( 'color', COLORS.white.bootstrapRgb );
		} );
	} );

	test.describe( 'Dropdown states', async () => {
		let navLinks:Locator;
		let topLevelNavLinksCount:number;

		test.beforeEach( 'Open homepage and locate nav links', async ( { page } ) => {
			await page.goto( '/' );
			navLinks = page.locator( '#cno-navbar .btn-group', { has: page.locator( 'a.nav-link' ) } );
			topLevelNavLinksCount = await navLinks.count();
		} );

		test( 'dropdown-item nav-links should be dark', async ( { page } ) => {
			const dropdownLinks = page.locator( '#cno-navbar .dropdown-menu .dropdown-item' );
			const count = await dropdownLinks.count();
			for ( let i = 0; i < count; i++ ) {
				await expect( dropdownLinks.nth( i ) ).toHaveCSS( 'color', COLORS.dark.bootstrapRgb );
			}
		} );

		test( 'dropdown-item nav-links should be bs-secondary when interacted with', async ( { page } ) => {
			for ( let i = 0; i < topLevelNavLinksCount; i++ ) {
				try {
					const dropdownLinks = navLinks.nth( i ).locator( '.dropdown-menu .dropdown-item' );
					const dropdownCount = await dropdownLinks.count();
					for ( let j = 0; j < dropdownCount; j++ ) {
						await navLinks.nth( i ).hover();
						const hoverColor = await getHoverColor( j, dropdownLinks, page );
						expect( hoverColor ).toBe( COLORS.secondary.bootstrapRgb );
						await dropdownLinks.nth( j ).hover();
						await page.waitForTimeout( DEFAULT_TRANSITION_TIMING ); // Wait for hover state to apply
						const bgHoverColor = await dropdownLinks.nth( j ).evaluate( ( el ) => window.getComputedStyle( el ).backgroundColor );
						expect( bgHoverColor ).toBe( 'rgb(248, 249, 250)' );
						await page.mouse.move( 0, 0 ); // Move mouse away to trigger hover state change
					}
				} catch ( error ) {
					const failedLinkText = await navLinks.nth( i ).innerText();
					const errorMessage = `Expected nav link at index ${ i } (${ failedLinkText }) to change to bs-secondary on hover, but it did not.`;
					throw new Error( `${ errorMessage } ${ error }` );
				}
			}
		} );

		test( 'visited dropdown-item links should not change color', async ( { page } ) => {
			for ( let i = 3; i < topLevelNavLinksCount; i++ ) {
				const dropdownLinks = navLinks.nth( i ).locator( '.dropdown-menu .dropdown-item' );
				const dropdownCount = await dropdownLinks.count();
				for ( let j = 0; j < dropdownCount; j++ ) {
					await navLinks.nth( i ).hover();
					const target = await dropdownLinks.nth( j ).getAttribute( 'target' );
					if ( target === '_blank' ) {
						const [ newPage ] = await Promise.all( [
							page.waitForEvent( 'popup' ),
							dropdownLinks.nth( j ).click(),
						] );
						await newPage.close(); // simulate user leaving tab
						await page.mouse.move( 0, 0 ); // Move mouse away to trigger any potential hover state change
					} else {
						await dropdownLinks.nth( j ).click();
						await page.waitForLoadState( 'networkidle' );
						await page.goBack();
					}
					await navLinks.nth( i ).hover();
					await expect( dropdownLinks.nth( j ) ).toHaveCSS( 'color', COLORS.dark.bootstrapRgb );
				}
			}
		} );
	} );
} );

test.describe( 'Mobile Navigation Links', () => {
	let toggleButton:Locator;

	test.beforeEach( 'Open homepage and open mobile menu', async ( { page, isMobile } ) => {
		test.skip( ! isMobile, 'Skipping mobile navigation tests on desktop viewport' );
		await page.goto( '/' );
		toggleButton = page.getByRole( 'button', { name: 'Menu' } );
	} );

	test.describe( 'Initial state', () => {
		test.beforeEach( 'Open mobile menu', async () => {
			await toggleButton.tap();
		} );

		test( 'Menu is visible', async ( { page } ) => {
			const stayLink = page.getByRole( 'link', { name: 'Stay' } );
			expect( stayLink ).toBeVisible();
		} );

		test( 'All nav menu links should be white', async ( { page } ) => {
			const navLinks = page.getByRole( 'navigation' ).getByRole( 'link' );
			const count = await navLinks.count();
			for ( let i = 1; i < count; i++ ) {
				await expect( navLinks.nth( i ) ).toHaveCSS( 'color', COLORS.white.bootstrapRgb );
			}
		} );
	} );

	test.describe( 'Interaction states', () => {
		test.beforeEach( 'Open mobile menu', async () => {
			await toggleButton.tap();
		} );

		test( 'all top-level nav menu links should switch to yellow on interaction', async ( { page } ) => {
			const navLinks = page.locator( '#cno-navbar .btn-group > a.nav-link' );
			const count = await navLinks.count();
			preventOffcanvasCloseOnLinkTap( page );
			for ( let i = 0; i < count; i++ ) {
				try {
					const tapColor = await getTapColor( i, navLinks, page );
					expect( tapColor ).toBe( COLORS.yellow.bootstrapRgb );
				} catch ( error ) {
					const failedLinkText = await navLinks.nth( i ).innerText();
					const errorMessage = `Expected nav link at index ${ i } (${ failedLinkText }) to change to yellow on tap.`;
					throw new Error( `${ errorMessage } ${ error }` );
				}
			}
		} );

		test( 'Dropdown links are dark on dropdown open', async ( { page } ) => {
			const dropdowns = page.locator( '#cno-navbar .btn-group' );
			const dropdownCount = await dropdowns.count();
			// preventOffcanvasCloseOnLinkTap( page );
			for ( let i = 0; i < dropdownCount; i++ ) {
				// open dropdown
				await dropdowns.nth( i ).getByRole( 'button' ).tap();
				const submenu = await dropdowns.nth( i ).locator( '.dropdown-menu' ).all();
				for ( const submenuItem of submenu ) {
					const submenuLinks = submenuItem.getByRole( 'link', { name: /^(?!Book Now$).*$/ } );
					const submenuLinkCount = await submenuLinks.count();
					if ( submenuLinkCount === 0 ) {
						throw new Error( `Expected dropdown at index ${ i } to have submenu links, but none were found.` );
					}
					for ( let j = 0; j < submenuLinkCount; j++ ) {
						await expect( submenuLinks.nth( j ) ).toHaveCSS( 'color', COLORS.dark.bootstrapRgb );
					}
				}
				// close dropdown
				await dropdowns.nth( i ).getByRole( 'button' ).tap();
			}
		} );
	} );
} );
