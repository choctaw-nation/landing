import { test, expect } from '@wordpress/e2e-test-utils-playwright';
import { COLORS, DEFAULT_TRANSITION_TIMING } from '../test-utils';
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
	test.describe( 'Shared Tests', () => {
		test( 'Event breadcrumb links are bs-primary and have no underline', async ( { page } ) => {
			await Promise.all( [ page.goto( '/events' ), page.getByRole( 'main' ).getByRole( 'link' ).first().click(), page.waitForLoadState( 'networkidle' ) ] );
			// target the breadcrumb nav by role+name, then wait for it to be visible
			const breadcrumbs = page.getByRole( 'main' ).getByRole( 'navigation' );
			await expect( breadcrumbs ).toBeVisible();
			const breadcrumbLinks = breadcrumbs.getByRole( 'link' );
			const count = await breadcrumbLinks.count();
			if ( count === 0 ) {
				throw new Error( 'No breadcrumb links found on the event page' );
			}
			for ( let i = 0; i < count; i++ ) {
				await expect( breadcrumbLinks.nth( i ) ).toHaveCSS( 'color', COLORS.primary.bootstrapRgb );
				await expect( breadcrumbLinks.nth( i ) ).toHaveCSS( 'text-decoration-line', 'none' );
			}
		} );

		test.describe( 'News posts', () => {
			test.beforeEach( 'Go to newsroom archive page', async ( { page } ) => {
				await Promise.all( [ page.goto( '/newsroom' ), page.waitForLoadState( 'domcontentloaded' ) ] );
			} );

			test( 'Newsroom archive titles are bs-primary and have no underline', async ( { page } ) => {
				const main = page.locator( 'main' );
				const articleTitles = main.getByRole( 'heading', { level: 2 } );
				const count = await articleTitles.count();
				if ( count === 0 ) {
					throw new Error( 'No article links found on the newsroom archive page' );
				}
				for ( let i = 0; i < count; i++ ) {
					await expect( articleTitles.nth( i ) ).toHaveCSS( 'color', COLORS.primary.bootstrapRgb );
					await expect( articleTitles.nth( i ) ).toHaveCSS( 'text-decoration-line', 'none' );
				}
			} );

			test( 'Newsroom article breadcrumb links are bs-secondary and have no underline', async ( { page } ) => {
				await Promise.all( [ page.getByRole( 'main' ).getByRole( 'link' ).first().click(), page.waitForLoadState( 'networkidle' ) ] );
				const breadcrumbs = page.getByRole( 'article' ).getByRole( 'navigation' );
				await expect( breadcrumbs ).toBeVisible();
				const breadcrumbLinks = breadcrumbs.getByRole( 'link' );
				const count = await breadcrumbLinks.count();
				if ( count === 0 ) {
					throw new Error( 'No breadcrumb links found on the newsroom article page' );
				}
				for ( let i = 0; i < count; i++ ) {
					await expect( breadcrumbLinks.nth( i ) ).toHaveCSS( 'color', COLORS.secondary.bootstrapRgb );
					await expect( breadcrumbLinks.nth( i ) ).toHaveCSS( 'text-decoration-line', 'none' );
				}
			} );

			test( 'Newsroom article content links are bs-secondary and have underline', async ( { page } ) => {
				const articles = page.getByRole( 'main' ).getByRole( 'link' );
				const articleCount = await articles.count();
				let articleHasLinks = false;
				let visitedArticles = 0;
				do {
					await Promise.all( [ articles.nth( visitedArticles ).click(), page.waitForLoadState( 'networkidle' ) ] );
					const articleContent = page.getByRole( 'article' ).getByRole( 'region' );
					const contentLinks = articleContent.getByRole( 'link' );
					const count = await contentLinks.count();
					if ( count === 0 ) {
						return; // Skip if no links in article content
					}
					articleHasLinks = true;
					for ( let i = 0; i < count; i++ ) {
						await expect( contentLinks.nth( i ) ).toHaveCSS( 'color', COLORS.secondary.bootstrapRgb );
						await expect( contentLinks.nth( i ) ).toHaveCSS( 'text-decoration-line', 'underline' );
					}
				} while ( ! articleHasLinks && ++visitedArticles < articleCount );
			} );
		} );
	} );

	test.describe( 'Desktop', () => {
		test.beforeEach( 'Set viewport to desktop size', async ( { isMobile } ) => {
			test.skip( isMobile, 'Skipping desktop navigation tests on mobile viewport' );
		} );

		test( 'Arrow links are bs-primary on desktop and have no underline', async ( { page } ) => {
			await page.goto( '/stay' );
			const main = page.locator( 'main' );
			const allLinks = main.locator( 'a.arrow-link' );
			const count = await allLinks.count();
			for ( let i = 1; i < count; i++ ) {
				await expect( allLinks.nth( i ) ).toHaveCSS( 'color', COLORS.primary.bootstrapRgb );
				await expect( allLinks.nth( i ) ).toHaveCSS( 'text-decoration-line', 'none' );
			}
		} );
	} );
} );
