import TwoColModalHandler from '../TwoColModalHandler';
import { newSwiper } from '../vendors/swiperjs/swiper';

new TwoColModalHandler();

const swiperEl = document.querySelector< HTMLElement >(
	'#casino-promotions .swiper'
);
if ( swiperEl ) {
	newSwiper( swiperEl, {
		navigation: {
			nextEl: '.casino-promos-button-next',
			prevEl: '.casino-promos-button-prev',
		},
		pagination: {
			el: '.casino-promos-pagination',
			clickable: true,
		},
		lazyPreloadPrevNext: 1,
		loop: false,
		rewind: true,
		spaceBetween: 10,
		centeredSlides: false,
		breakpoints: {
			767: {
				slidesPerView: 2,
				slidesPerGroup: 2,
				spaceBetween: 20,
			},
			1200: {
				slidesPerView: 3,
				slidesPerGroup: 3,
			},
		},
	} );
}
