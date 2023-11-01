import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/scss";
import "swiper/scss/navigation";
import "swiper/scss/pagination";
import { SwiperOptions } from "swiper/types/swiper-options";

const defaultArgs = {
	modules: [Navigation, Pagination],
	// If we need pagination
	pagination: {
		el: ".swiper-pagination",
	},

	// Navigation arrows
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
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
 * @param {HTMLElement} el the element to create a slider on
 * @param {SwiperOptions} args Swiper Options
 * @returns swiper instance
 */
export function newSwiper(
	el: HTMLElement,
	args?: SwiperOptions,
): Swiper | void {
	const newArgs = { ...defaultArgs, ...args };
	try {
		const swiper = new Swiper(el, newArgs);
		return swiper;
	} catch (err) {
		console.error(err);
	}
}
