import wordpress from '@wordpress/eslint-plugin';
import { includeIgnoreFile } from '@eslint/compat';
import { globalIgnores, defineConfig } from 'eslint/config';
import { fileURLToPath, URL } from 'url';

const gitignorePath = fileURLToPath( new URL( '.gitignore', import.meta.url ) );
export default defineConfig( [
	includeIgnoreFile( gitignorePath, 'Ignore .gitignore files' ),
	globalIgnores( [
		'wp-content/themes/choctaw-landing/src/js/**/*.d.ts',
		'wp-content/themes/choctaw-landing/src/js/vendors/bootscore.js',
	] ),
	...wordpress.configs.recommended,
	{
		files: [
			'wp-content/themes/choctaw-landing/src/**/*.{js,ts,jsx,tsx}',
			'specs/**/*.{js,ts,jsx,tsx}',
			'./*.config.{js,ts,mjs,cjs}',
		],
		languageOptions: {
			globals: globals.browser,
		},
		rules: {
			'jsdoc/require-jsdoc': 'off',
			'jsdoc/require-param': 'off',
			'jsdoc/require-param-type': 'off',
			'jsdoc/require-returns-type': 'off',
			'jsdoc/require-returns-check': 'off',
			'jsdoc/require-returns-description': 'off',
			'jsdoc/check-param-names': 'off',
			'no-console': 'warn',
			'no-duplicate-imports': 'off',
			'import/no-duplicates': 'error',
			'no-unused-vars': 'off',
			'no-undef': 'off',
			'no-shadow': 'off',
		},
	},
] );
