interface Window {
	headerBarData: {
		textContent: string;
		isDismissable: 0 | 1;
		cta: {
			button_text: string;
			button_link: string;
			allow_custom_colors: boolean;
			custom_colors: {
				button_color: {
					red: number;
					green: number;
					blue: number;
					alpha: number;
				};
				button_background: {
					red: number;
					green: number;
					blue: number;
					alpha: number;
				};
			};
		};
	};
}

class HeaderBar {
	private header: HTMLElement;
	private height: string;
	private textContent: string;
	private isDismissable: 0 | 1;
	private cta: {
		button_text: string;
		button_link: string;
		allow_custom_colors: boolean;
		custom_colors: {
			button_color: {
				red: number;
				green: number;
				blue: number;
				alpha: number;
			};
			button_background: {
				red: number;
				green: number;
				blue: number;
				alpha: number;
			};
		};
	};

	private fixedEls: NodeListOf< HTMLElement >;

	private transitionDuration = '0.25s';
	private transitionTiming = 'ease-in-out';

	constructor() {
		this.height = '80px';
		this.textContent = window.headerBarData.textContent;
		this.isDismissable = window.headerBarData.isDismissable;
		this.cta = window.headerBarData.cta;
		this.fixedEls =
			document.querySelectorAll< HTMLElement >( '.fixed-top' );

		// this.header = document.createElement( 'aside' );

		// this.styleContainer();
		// this.buildContent();
		// document.body.insertBefore( this.header, document.body.firstChild );
		this.offsetElements();
		this.handleEvents();
	}

	private styleContainer() {
		this.header.classList.add(
			'p-3',
			'text-bg-secondary',
			'd-flex',
			'justify-content-evenly',
			'align-items-center',
			'text-center',
			'w-100',
			'position-absolute',
			'top-0'
		);
		this.header.id = 'cno-alert-header-bar';

		this.styleElement( this.header, {
			height: this.height,
			zIndex: '1031',
		} );
	}

	private styleElement( el: HTMLElement, styles: Record< string, string > ) {
		Object.keys( styles ).forEach( ( key ) => {
			el.style[ key ] = styles[ key ];
		} );
	}

	private buildContent() {
		let markup = `<div class='fs-6'>${ this.textContent }</div>`;
		if ( this.isDismissable ) {
			markup += this.getDismissButton();
		}
		if ( this.cta.button_text ) {
			markup += this.getCtaButton();
		}
		this.header.innerHTML = markup;
	}

	private offsetElements() {
		document.body.style.paddingTop = this.height;
		this.fixedEls.forEach( ( el ) => {
			this.styleElement( el, {
				position: 'absolute',
				top: this.height,
				transition: `all ${ this.transitionDuration } ${ this.transitionTiming }`,
			} );
		} );
	}

	private getDismissButton() {
		const button = document.createElement( 'button' );
		button.classList.add( 'btn', 'btn-close' );
		button.setAttribute( 'aria-label', 'dismiss' );
		this.styleElement( button, {
			position: 'absolute',
			top: '50%',
			right: '1rem',
			transform: 'translateY(-50%)',
		} );
		return button.outerHTML;
	}

	private getCtaButton() {
		const button = this.cta.button_link
			? document.createElement( 'a' )
			: document.createElement( 'button' );
		button.classList.add( 'btn', 'btn-primary' );
		button.textContent = this.cta.button_text;
		if ( this.cta.button_link ) {
			button.href = this.cta.button_link;
			button.target = '_blank';
		}

		if ( this.cta.allow_custom_colors ) {
			this.styleElement( button, {
				backgroundColor: `rgba(${ this.cta.custom_colors.button_background.red }, ${ this.cta.custom_colors.button_background.green }, ${ this.cta.custom_colors.button_background.blue }, ${ this.cta.custom_colors.button_background.alpha })`,
				color: `rgba(${ this.cta.custom_colors.button_color.red }, ${ this.cta.custom_colors.button_color.green }, ${ this.cta.custom_colors.button_color.blue }, ${ this.cta.custom_colors.button_color.alpha })`,
			} );
		}
		return button.outerHTML;
	}

	private handleEvents() {
		const dismissButton = this.header.querySelector( 'button' );
		if ( dismissButton ) {
			dismissButton.addEventListener(
				'click',
				this.dismissHeader.bind( this ),
				{ once: true }
			);
		}

		const observer = new IntersectionObserver(
			( entries ) => {
				entries.forEach( ( entry ) => {
					console.log( entry );
					if ( entry.isIntersecting ) {
						// Header is in the viewport
						// Do something
					} else {
						this.dismissHeader( entry );
					}
				} );
			},
			{
				root: null,
				rootMargin: '0px',
				threshold: 0,
			}
		);

		observer.observe( this.header );
	}

	/**
	 * Dismiss the header bar
	 */
	private dismissHeader( ev ) {
		this.styleElement( this.header, {
			transition: `all ${ this.transitionDuration } ${ this.transitionTiming }`,
			opacity: '0',
			transform: 'translateY(-100%)',
		} );
		this.styleElement( document.body, {
			transition: `all ${ this.transitionDuration } ${ this.transitionTiming }`,
			paddingTop: '0',
		} );

		this.fixedEls.forEach( ( el ) => {
			this.styleElement( el, {
				position: 'fixed',
				transition: `all ${ this.transitionDuration } ${ this.transitionTiming }`,
				top: '0',
			} );
		} );
		if ( 'click' === ev.type ) {
			this.header.addEventListener(
				'transitionend',
				() => {
					this.header.remove();
				},
				{
					once: true,
				}
			);
		}
	}
}

new HeaderBar();
