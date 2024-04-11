/**
 * Calculates the height of the header and sets a CSS variable (`--header-offset`) with the value.
 * @param defaultOffset set a default offset if the header is not found
 */
export default function calcHeaderOffset( defaultOffset: number = 130 ) {
	const themeHeader = document.getElementById( 'masthead' );
	if ( themeHeader ) {
		const headerHeight = themeHeader.offsetHeight;
		document.documentElement.style.setProperty(
			'--header-offset',
			`${ headerHeight }px`
		);
	} else {
		document.documentElement.style.setProperty(
			'--header-offset',
			`${ defaultOffset }px`
		);
	}
}
