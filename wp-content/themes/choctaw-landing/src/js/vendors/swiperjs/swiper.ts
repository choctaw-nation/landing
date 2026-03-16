import Swiper from 'swiper';
import { Navigation, Pagination, A11y, Keyboard } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/a11y';
import 'swiper/css/keyboard';
import { SwiperOptions } from 'swiper/types';

const defaultArgs = {
	modules: [ Navigation, Pagination, A11y, Keyboard ],
	// If we need pagination
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},

	// Navigation arrows
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	loop: true,
	spaceBetween: 20,
	grabCursor: true,
	autoHeight: true,
	centeredSlides: true,
	breakpoints: {
		767: {
			slidesPerView: 3,
			slidesPerGroup: 3,
			centeredSlides: false,
		},
	},
} as SwiperOptions;

/**
 *
 * @param {HTMLElement}   el   the element to create a slider on
 * @param {SwiperOptions} args Swiper Options
 * @return {Swiper} swiper instance
 */
export function newSwiper(
	el: HTMLElement,
	args?: SwiperOptions
): Swiper | void {
	const newArgs = { ...defaultArgs, ...args };
	try {
		const swiper = new Swiper( el, newArgs );
		return swiper;
	} catch ( err ) {
		// eslint-disable-next-line no-console
		console.error( err );
	}
}
