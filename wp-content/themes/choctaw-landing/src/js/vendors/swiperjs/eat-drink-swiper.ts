import { newSwiper } from "./swiper";

function eatDrinkSwiper() {
	const el = document.getElementById("restaurant-swiper");
	if (!el) {
		throw new Error(`Couldn't get restaurant swiper!`);
	}
	newSwiper(el, {
		loop: false,
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
	});
}
eatDrinkSwiper();
