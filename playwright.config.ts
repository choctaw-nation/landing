import { defineConfig, devices } from '@playwright/test';

/**
 * Read environment variables from file.
 * https://github.com/motdotla/dotenv
 */
// import dotenv from 'dotenv';
// import path from 'path';
// dotenv.config( { path: path.resolve( __dirname, '.env' ) } );
const BASE_URL = process.env.BASE_URL || 'https://landing.local';
const DESKTOP_VIEWPORT = { width: 1920, height: 1080 };
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
		baseURL: BASE_URL,
		trace: 'on-first-retry',
	},
	projects: [
		{
			name: 'chromium',
			use: {
				...devices[ 'Desktop Chrome HiDPI' ],
				viewport: DESKTOP_VIEWPORT,
			},
			fullyParallel: true,
			retries: 1,
		},
		{
			name: 'firefox',
			use: {
				...devices[ 'Desktop Firefox' ],
				viewport: DESKTOP_VIEWPORT,
			},
			fullyParallel: true,
		},
		{
			name: 'webkit',
			use: {
				...devices[ 'Desktop Safari' ],
				viewport: DESKTOP_VIEWPORT,
				browserName: 'webkit',
			},
			fullyParallel: true,
		},
		{
			name: 'Mobile Chrome',
			use: { ...devices[ 'Galaxy S24' ] },
			fullyParallel: true,
			retries: 1,
		},
		{
			name: 'Mobile Safari',
			use: { ...devices[ 'iPhone 15' ], browserName: 'webkit' },
			fullyParallel: true,
			retries: 1,
		},
	],
} );
