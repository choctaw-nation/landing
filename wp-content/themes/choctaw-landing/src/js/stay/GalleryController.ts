import SimpleLightBox from 'simplelightbox';
import 'simplelightbox/dist/simple-lightbox.min.css';
import '../../styles/components/simple-lightbox.scss';

type LightboxOptions = {
	sourceAttr?: string;
	overlay?: boolean;
	overlayOpacity?: number;
	spinner?: boolean;
	nav?: boolean;
	navText?: string[];
	captions?: boolean;
	captionDelay?: number;
	captionSelector?: string;
	captionType?: string;
	captionsData?: string;
	captionPosition?: string;
	captionClass?: string;
	captionHTML?: boolean;
	close?: boolean;
	closeText?: string;
	swipeClose?: boolean;
	showCounter?: boolean;
	fileExt?: string;
	animationSlide?: boolean;
	animationSpeed?: number;
	preloading?: boolean;
	enableKeyboard?: boolean;
	loop?: boolean;
	rel?: boolean;
	docClose?: boolean;
	swipeTolerance?: number;
	className?: string;
	widthRatio?: number;
	heightRatio?: number;
	scaleImageToRatio?: boolean;
	disableRightClick?: boolean;
	disableScroll?: boolean;
	alertError?: boolean;
	alertErrorMessage?: string;
	additionalHtml?: boolean;
	history?: boolean;
	throttleInterval?: number;
	doubleTapZoom?: number;
	maxZoom?: number;
	htmlClass?: string;
	rtl?: boolean;
	fixedClass?: string;
	fadeSpeed?: number;
	uniqueImages?: boolean;
	focus?: boolean;
	scrollZoom?: boolean;
	scrollZoomFactor?: number;
	download?: boolean;
};

export default class GalleryController {
	/**
	 * The Offset % for the elements
	 */
	private OFFSET = 5 / 100;

	private slidePosition: {
		top: number;
		left: number;
		width: number;
	};

	private close: HTMLButtonElement;
	private nav: NodeListOf< HTMLButtonElement >;
	private slide: HTMLElement;

	/**
	 * Constructor
	 *
	 * @param {string} selector string to pass to QuerySelector to grab the SimpleLightBox gallery
	 * @param options [Optional] valid options to initialize SimpleLightBox
	 */
	constructor( selector: string, options?: LightboxOptions ) {
		const lightbox = new SimpleLightBox( selector, options );
		const events = [ 'shown' ];
		events.forEach( ( event ) => {
			lightbox.on( event + '.simplelightbox', ( ev ) => {
				try {
					this.initProperties();
					this.calcSlidePosition();
					this.positionCloseButton();
					this.positionNavIcons();
				} catch ( err ) {
					console.error( err );
				}
			} );
		} );
		window.addEventListener( 'resize', () => {
			this.calcSlidePosition();
			this.positionCloseButton();
			this.positionNavIcons();
		} );
		return lightbox;
	}

	/**
	 * Initialize the class properties with the current slide
	 */
	private initProperties() {
		const gallery =
			document.querySelector< HTMLElement >( '.simple-lightbox' );
		if ( ! gallery ) {
			throw new Error( 'No gallery container found' );
		}

		const slide = gallery.querySelector< HTMLElement >( '.sl-image' );
		if ( ! slide ) {
			throw new Error( 'No slide found in the gallery container' );
		}
		this.slide = slide;
		const close = gallery.querySelector< HTMLButtonElement >( '.sl-close' );
		if ( ! close ) return;
		this.close = close;
		const nav = gallery.querySelectorAll< HTMLButtonElement >(
			'.sl-navigation button'
		);
		if ( ! nav ) return;
		this.nav = nav;
	}

	/**
	 * Calculate the position of the slide
	 */
	private calcSlidePosition() {
		this.slidePosition = {
			top: this.slide.style.top
				? parseInt( this.slide.style.top )
				: this.slide.offsetTop,
			left: this.slide.style.left
				? parseInt( this.slide.style.left )
				: this.slide.offsetLeft,
			width: this.slide.style.width
				? parseInt( this.slide.style.width )
				: this.slide.offsetWidth,
		};
	}

	/**
	 * Position the close button
	 */
	private positionCloseButton() {
		const buttonSize = 44;
		// this.close.style.top = `${ this.slidePosition.top - buttonSize }px`;
		const left =
			this.slidePosition.left + this.slidePosition.width + buttonSize;
		const browser = window.innerWidth - buttonSize;
		this.close.style.left = `${ left > browser ? browser : left }px`;
	}

	private positionNavIcons() {
		const navSize = 30;
		this.nav.forEach( ( button, index ) => {
			const inset = [ 'left', 'right' ];
			const idealPosition = this.slidePosition.left - navSize;
			button.style[ inset[ index ] ] = `${
				this.slidePosition.left - navSize
			}px`;
		} );
		return '';
	}
}
