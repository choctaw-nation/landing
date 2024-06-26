/**
 * Calculates the height of the header and sets a CSS variable (`--header-offset`) with the value.
 */
new ( class HeaderOffsetHandler {
	/**
	 * The header element to calculate the offset from.
	 */
	private masthead: HTMLElement;

	/**
	 * The default offset value if the header is not found.
	 */
	private defaultOffset = 130;

	/**
	 * The calculated height of the header (#masthead).
	 */
	private headerHeight: number;

	/**
	 * Creates a new instance of the HeaderOffsetGenerator class.
	 */
	constructor() {
		const masthead = document.getElementById( 'masthead' );
		if ( masthead ) {
			this.masthead = masthead;
		}
		document.addEventListener( 'DOMContentLoaded', () =>
			this.handleScrollBehavior()
		);
		this.setOffset();
		window.addEventListener( 'resize', () => this.setOffset() );
	}

	/**
	 * Sets the offset value as a CSS variable.
	 */
	private setOffset() {
		this.headerHeight = this.masthead.offsetHeight;
		document.documentElement.style.setProperty(
			'--header-offset',
			`${ this.headerHeight || this.defaultOffset }px`
		);
		if (
			! document.documentElement.style.getPropertyValue(
				'--header-offset'
			)
		) {
			console.warn( 'Header offset not found.' );
		}
	}

	private handleScrollBehavior() {
		const target = window.location.hash;
		if ( target ) {
			setTimeout( () => {
				const targetElement =
					document.querySelector< HTMLElement >( target );
				if ( targetElement ) {
					window.scrollTo( {
						top:
							targetElement.offsetTop - this.headerHeight ||
							this.defaultOffset,
						behavior: 'smooth',
					} );
				}
			}, 0 );
		}
	}
} )();
