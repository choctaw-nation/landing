import { test, expect } from '@wordpress/e2e-test-utils-playwright';
import { COLORS, DEFAULT_TRANSITION_TIMING } from './test-utils';
import { Locator } from '@playwright/test';

test.describe( 'Footer Links', () => {
	let footerLinks:Locator;
	test.beforeEach( 'Open homepage', async ( { page } ) => {
		await page.goto( '/' );
		footerLinks = page.locator( 'footer' ).getByRole( 'link' );
	} );

	test( 'All footer links should be white', async ( { page } ) => {
		const count = await footerLinks.count();
		for ( let i = 0; i < count; i++ ) {
			await expect( footerLinks.nth( i ) ).toHaveCSS( 'color', COLORS.white.bootstrapRgb );
		}
	} );

	test( 'All footer links change to primary and underline on interaction', async ( { page } ) => {
		const count = await footerLinks.count();
		for ( let i = 0; i < count; i++ ) {
			await footerLinks.nth( i ).hover();
			await page.waitForTimeout( DEFAULT_TRANSITION_TIMING ); // Wait for hover state to apply
			await expect( footerLinks.nth( i ) ).toHaveCSS( 'color', COLORS.primary.bootstrapRgb );
			await expect( footerLinks.nth( i ) ).toHaveCSS( 'text-decoration-line', 'underline' );
			await page.mouse.move( 0, 0 ); // Move mouse away to trigger hover state change
		}
	} );
} );

test.describe( 'Anchors are not underlined', () => {
	test( 'Homepage links are bs-primary on desktop and have no underline', async ( { page } ) => {
		await page.goto( '/' );
		const allLinks = page.locator( 'main' ).getByRole( 'link' );
		const count = await allLinks.count();
		for ( let i = 1; i < count; i++ ) {
			await expect( allLinks.nth( i ) ).toHaveCSS( 'color', COLORS.primary.bootstrapRgb );
			await expect( allLinks.nth( i ) ).toHaveCSS( 'text-decoration-line', 'none' );
		}
	} );
} );
