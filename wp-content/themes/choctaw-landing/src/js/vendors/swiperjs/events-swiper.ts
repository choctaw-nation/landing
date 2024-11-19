import { newSwiper } from './swiper';

function eventsSwiper() {
	const el = document.getElementById( 'events-swiper' );
	if ( ! el ) {
		throw new Error( `Couldn't get events swiper!` );
	}
	newSwiper( el, {
		autoHeight: true,
		loop: false,
		pagination: {
			el: '.events-swiper-pagination',
			clickable: true,
		},

		// Navigation arrows
		navigation: {
			nextEl: '.events-swiper-button-next',
			prevEl: '.events-swiper-button-prev',
		},
		breakpoints: {
			991: {
				slidesPerView: 2,
				slidesPerGroup: 2,
				centeredSlides: false,
			},
			1200: {
				slidesPerView: 3,
				slidesPerGroup: 3,
				centeredSlides: false,
			},
		},
	} );
}
eventsSwiper();
