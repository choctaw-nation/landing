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
	 * The Gallery Container
	 */
	private gallery: HTMLElement | null = null;

	/**
	 * The Current Slide
	 */
	private slide: HTMLElement;

	private slidePosition: {
		top: number;
		left: number;
	};

	/**
	 * The Current Slide Image Width
	 */
	private imageWidth: number;

	/**
	 * The Current Slide Image Height
	 */
	private imageHeight: number;

	/**
	 * The Viewport Size
	 */
	private viewport: {
		width: number;
		height: number;
	};

	/**
	 * Constructor
	 *
	 * @param {string} selector string to pass to QuerySelector to grab the SimpleLightBox gallery
	 * @param options [Optional] valid options to initialize SimpleLightBox
	 */
	constructor( selector: string, options?: LightboxOptions ) {
		const lightbox = new SimpleLightBox( selector, options );
		const events = [ 'shown', 'change' ];
		events.forEach( ( event ) => {
			lightbox.on( event + '.simplelightbox', ( ev ) => {
				try {
					this.initProperties();
					this.positionCloseButton();
					this.positionNavIcons();
				} catch ( err ) {
					console.error( err );
				}
			} );
		} );
		window.addEventListener( 'resize', () => {
			try {
				this.initProperties();
				this.positionCloseButton();
				this.positionNavIcons();
			} catch ( err ) {
				console.error( err );
			}
		} );
		return lightbox;
	}

	/**
	 * Initialize the class properties with the current slide
	 */
	private initProperties() {
		this.viewport = {
			width: window.innerWidth,
			height: window.innerHeight,
		};

		if ( ! this.gallery ) {
			const gallery =
				document.querySelector< HTMLElement >( '.simple-lightbox' );
			if ( ! gallery ) {
				throw new Error( 'No gallery container found' );
			}
			this.gallery = gallery;
		}
		const slide = this.gallery.querySelector< HTMLElement >( '.sl-image' );
		if ( ! slide ) {
			throw new Error( 'No slide found in the gallery container' );
		}
		this.slide = slide;
		this.slidePosition = {
			top: slide.style.top
				? parseInt( slide.style.top )
				: slide.offsetTop,
			left: slide.style.left
				? parseInt( slide.style.left )
				: slide.offsetLeft,
		};
		const image = slide.querySelector< HTMLImageElement >( 'img' );
		if ( ! image ) {
			throw new Error( 'No image found in the slide' );
		}
		this.imageWidth = image.width;
		this.imageHeight = image.height;
	}

	/**
	 * Position the close button
	 */
	private positionCloseButton() {
		const buttonOffset = 5 / 100;
		const buttonSize = 44;
		const close =
			this.gallery!.querySelector< HTMLButtonElement >( '.sl-close' );
		if ( ! close ) return;

		close.style.top = this.calcOffset(
			this.slidePosition.top - this.imageHeight * buttonOffset,
			buttonSize,
			'height'
		);
		close.style.left = this.calcOffset(
			this.slidePosition.left +
				this.imageWidth +
				this.imageWidth * buttonOffset,
			buttonSize,
			'width'
		);
	}

	private positionNavIcons() {
		const navOffset = 5 / 100;
		const navSize = 22.609;
		const nav = this.gallery!.querySelectorAll< HTMLButtonElement >(
			'.sl-navigation button'
		);
		if ( ! nav ) return;
		nav.forEach( ( button, index ) => {
			const inset = [ 'left', 'right' ];
			const idealPosition = this.slidePosition.left - navSize;
			button.style[ inset[ index ] ] = this.calcOffset(
				idealPosition,
				navSize,
				'width'
			);
		} );
		return '';
	}

	/**
	 * Returns the proper position for elements so they never go beyond the viewport
	 *
	 * @param {number} position The position of the close button
	 * @param {number} elSize The size of the element
	 * @param {string} axis The axis to calculate the offset for
	 * @returns {string} The offset for the element as px or %
	 */
	private calcOffset(
		position: number,
		elSize: number,
		axis: 'width' | 'height'
	): string {
		const offset = 5 / 100;
		const viewportOffset =
			elSize + this.viewport[ axis ] - this.viewport[ axis ] * offset;
		const positionActual = position - elSize;
		if ( positionActual > viewportOffset || positionActual < 0 ) {
			return `${ offset * 100 }%`;
		} else {
			return `${ positionActual }px`;
		}
	}
}
