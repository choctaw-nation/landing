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
		this.masthead.addEventListener( 'click', ( ev ) => {
			this.handleNavClick( ev );
		} );
	}

	/**
	 * Sets the offset value as a CSS variable and updates the headerHeight property.
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

	/**
	 * Handles the scroll behavior when the page is loaded or reloaded.
	 *
	 * @param passedTarget The target element to scroll to. Defaults to the current hash value.
	 */
	private handleScrollBehavior( passedTarget?: string ) {
		const target = passedTarget || window.location.hash;
		if ( target ) {
			setTimeout( () => {
				const targetElement = document.querySelector< HTMLElement >(
					target.slice( 0, -1 )
				);
				if ( targetElement ) {
					window.scrollTo( {
						top: this.calcOffset( targetElement ),
						behavior: 'smooth',
					} );
				}
			}, 0 );
		}
	}

	/**
	 * Calculates the offset value based on the target element.
	 *
	 * @param target The target element to calculate the offset from.
	 * @return The calculated offset value
	 */
	private calcOffset( target: HTMLElement ): number {
		const targetTop = target.getBoundingClientRect().top + window.scrollY;
		const offset = targetTop - ( this.headerHeight || this.defaultOffset );
		return offset;
	}

	/**
	 * Handles the click event on the navigation links to correctly handle scroll and/or page reload.
	 *
	 * @param ev The click event.
	 */
	private handleNavClick( ev: Event ) {
		const target = ev.target as HTMLElement;
		const href = target.getAttribute( 'href' );
		if (
			href &&
			href.includes( window.location.pathname.slice( 0, -1 ) )
		) {
			ev.preventDefault();
			if (
				href ===
				`${ window.location.pathname }${ window.location.hash }`
			) {
				return;
			}
			window.history.pushState( null, '', href );
			this.handleScrollBehavior( `#${ href.split( '#' )[ 1 ] }` );
		}
	}
} )();
