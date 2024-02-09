/**
 * WordPress Dependencies
 */

const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );
const THEME_NAME = 'bootscore-5';
const THEME_DIR = `/wp-content/themes/${ THEME_NAME }`;

function snakeToCamel( str ) {
	return str.replace( /([-_][a-z])/g, ( group ) =>
		group.toUpperCase().replace( '-', '' ).replace( '_', '' )
	);
}

const appNames = []; // for jsx + scss
const styleSheets = []; // for scss only
module.exports = {
	...defaultConfig,
	...{
		entry: function () {
			const entries = {
				'js/site': `.${ THEME_DIR }/src/index.js`,
				'css/global': `.${ THEME_DIR }/src/styles/global.scss`,
			};

			if ( appNames.length > 0 ) {
				appNames.forEach( ( appName ) => {
					const appNameOutput = snakeToCamel( appName );
					entries[
						appNameOutput
					] = `.${ THEME_DIR }/src/js/${ appName }/App.jsx`;
				} );
			}
			if ( styleSheets.length > 0 ) {
				styleSheets.forEach( ( styleSheet ) => {
					const styleSheetOutput = snakeToCamel( styleSheet );
					entries[
						styleSheetOutput
					] = `.${ THEME_DIR }/src/styles/pages/${ styleSheet }.scss`;
				} );
			}
			return entries;
		},

		output: {
			path: __dirname + `${ THEME_DIR }/dist`,
			filename: `[name].js`,
		},
	},
};
