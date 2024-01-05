const defaultConfig = require("@wordpress/scripts/config/webpack.config.js");

const THEME_NAME = "choctaw-landing";
const THEME_DIR = `/wp-content/themes/${THEME_NAME}`;

function snakeToCamel(str) {
	return str.replace(/([-_][a-z])/g, (group) =>
		group.toUpperCase().replace("-", "").replace("_", ""),
	);
}

/**
 * For index.ts (located `~/src/js/folder-name/index.ts)`)
 * Array of strings modeled after folder names (e.g. 'about-choctaw')
 *
 * !Be sure to import page scss in these files!
 */
const appNames = [];

/**
 * For SCSS files (no leading `_`)
 * Array of strings modeled after scss names (e.g. 'we-are-choctaw')
 *  */
const styleSheets = []; // for scss only

module.exports = {
	...defaultConfig,
	...{
		entry: function () {
			// Define custom entry points here
			const entries = {
				global: `.${THEME_DIR}/src/index.js`,
				"vendors/bootstrap": `.${THEME_DIR}/src/js/vendors/bootstrap.js`,
				"vendors/fontawesome": `.${THEME_DIR}/src/styles/vendors/fontawesome.scss`,
				"vendors/date-range-picker": `.${THEME_DIR}/src/js/vendors/date-range-picker.js`,
				"modules/swiper/eat-drink-swiper": `.${THEME_DIR}/src/js/vendors/swiperjs/eat-drink-swiper.ts`,
				"modules/swiper/events-swiper": `.${THEME_DIR}/src/js/vendors/swiperjs/events-swiper.ts`,
			};

			if (appNames.length > 0) {
				appNames.forEach((appName) => {
					const appNameOutput = snakeToCamel(appName);
					entries[
						appNameOutput
					] = `.${THEME_DIR}/src/js/${appName}/index.ts`;
				});
			}
			if (styleSheets.length > 0) {
				styleSheets.forEach((styleSheet) => {
					const styleSheetOutput = snakeToCamel(styleSheet);
					entries[
						`pages/${styleSheetOutput}`
					] = `.${THEME_DIR}/src/styles/pages/${styleSheet}.scss`;
				});
			}
			return entries;
		},

		output: {
			path: __dirname + `${THEME_DIR}/dist`,
			filename: `[name].js`,
		},
	},
};
