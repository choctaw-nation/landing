import Lightbox from 'bs5-lightbox';
import 'bootstrap/js/dist/modal';
import { newSwiper } from '../vendors/swiperjs/swiper';
import GalleryController from './GalleryController';

const options = {
	keyboard: true,
	size: 'xl',
};

document
	.querySelectorAll< HTMLAnchorElement >( '.lightbox-init' )
	.forEach( ( el ) =>
		el.addEventListener( 'click', ( ev ) => {
			console.log( 'click' );
			ev.preventDefault();
			const lightbox = new Lightbox( el, options );
			lightbox.show();
		} )
	);

const roomSwiper = document.getElementById( 'rooms-gallery' );
if ( roomSwiper ) {
	newSwiper( roomSwiper );
}

new GalleryController( '.swiper-slide .lightbox-init img', {
	navText: [
		`<div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>`,
		`<div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>`,
	],
	sourceAttr: 'src',
	widthRatio: 0.8,
	heightRatio: 0.8,
	captions: false,
} );
