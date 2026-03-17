import { defineConfig, devices } from '@playwright/test';

/**
 * Read environment variables from file.
 * https://github.com/motdotla/dotenv
 */
// import dotenv from 'dotenv';
// import path from 'path';
// dotenv.config( { path: path.resolve( __dirname, '.env' ) } );

/**
 * See https://playwright.dev/docs/test-configuration.
 */
export default defineConfig( {
	testDir: './specs',
	forbidOnly: !! process.env.CI,
	retries: process.env.CI ? 1 : 0,
	workers: process.env.CI ? 1 : undefined,
	reporter: 'html',
	use: {
		baseURL: 'https://landing.local',
		trace: 'on-first-retry',
	},
	projects: [
		{
			name: 'wpe-dev-chromium',
			use: {
				...devices[ 'Desktop Chrome' ],
				baseURL: 'https://choctawlandev.wpenginepowered.com/',
				headless: true,
			},
			retries: 1,
			fullyParallel: true,
		},
		{
			name: 'chromium',
			use: { ...devices[ 'Desktop Chrome' ] },
			fullyParallel: true,
			retries: 1,
		},
		{
			name: 'firefox',
			use: {
				...devices[ 'Desktop Firefox' ],
				baseURL: 'https://choctawlandev.wpenginepowered.com/',
			},
			fullyParallel: true,
		},
		{
			name: 'webkit',
			use: { ...devices[ 'Desktop Safari' ] },
			fullyParallel: true,
		},

		/* Test against mobile viewports. */
		// {
		//   name: 'Mobile Chrome',
		//   use: { ...devices['Pixel 5'] },
		//   fullyParallel: true,
		// },
		// {
		// 	name: 'Mobile Safari',
		// 	use: { ...devices[ 'iPhone 12' ] },
		//   fullyParallel: true,
		// },
	],
} );
