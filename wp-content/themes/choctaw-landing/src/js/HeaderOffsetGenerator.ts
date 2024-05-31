/**
 * Calculates the height of the header and sets a CSS variable (`--header-offset`) with the value.
 */
new ( class HeaderOffsetGenerator {
	/**
	 * The header element to calculate the offset from.
	 */
	private masthead: HTMLElement;

	/**
	 * The default offset value if the header is not found.
	 */
	private defaultOffset = 130;

	/**
	 * Creates a new instance of the HeaderOffsetGenerator class.
	 */
	constructor() {
		const masthead = document.getElementById( 'masthead' );
		if ( masthead ) {
			this.masthead = masthead;
		}
		this.setOffset();
		window.addEventListener( 'resize', () => this.setOffset() );
	}

	/**
	 * Sets the offset value as a CSS variable.
	 */
	private setOffset() {
		const headerHeight = this.masthead.offsetHeight;
		document.documentElement.style.setProperty(
			'--header-offset',
			`${ headerHeight || this.defaultOffset }px`
		);
		if (
			! document.documentElement.style.getPropertyValue(
				'--header-offset'
			)
		) {
			console.warn( 'Header offset not found.' );
		}
	}
} )();
