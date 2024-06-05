import { newSwiper } from '../vendors/swiperjs/swiper';
import GalleryController from './GalleryController';

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
	captions: false,
} );
