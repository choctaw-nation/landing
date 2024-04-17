/**
 * Calculates the height of the header and sets a CSS variable (`--header-offset`) with the value.
 * @param {number} defaultOffset set a default offset if the header is not found (defaults to 130px)
 */
export default function calcHeaderOffset( defaultOffset: number = 130 ) {
	const headerHeight = document.getElementById( 'masthead' )?.offsetHeight;
	document.documentElement.style.setProperty(
		'--header-offset',
		`${ headerHeight || defaultOffset }px`
	);

	// Warn if the header offset is not found
	if (
		! document.documentElement.style.getPropertyValue( '--header-offset' )
	) {
		console.warn( 'Header offset not found.' );
	}
}
