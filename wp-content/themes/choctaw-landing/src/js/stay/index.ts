import { newSwiper } from '../vendors/swiperjs/swiper';
import Modal from 'bootstrap/js/dist/modal';
import { Swiper } from 'swiper/types';

const roomSwiper = document.getElementById( 'rooms-gallery' );

if ( roomSwiper ) {
	newSwiper( roomSwiper, {
		navigation: {
			nextEl: '.swiper-button-gallery-next',
			prevEl: '.swiper-button-gallery-prev',
		},
	} );
	const roomsGalleryModal = document.getElementById( 'rooms-gallery-modal' );
	const roomsGallerySwiper = document.getElementById(
		'rooms-gallery-modal-swiper'
	);

	if ( roomsGalleryModal ) {
		roomSwiper.addEventListener( 'click', ( ev ) => {
			const clickedSlide = ev.target
				.closest( '.swiper-slide' )
				.getAttribute( 'data-swiper-slide-index' );
			// window.location.hash = slide;
			const modal = new Modal( roomsGalleryModal );
			modal.show();

			if ( roomsGallerySwiper ) {
				const swiper = newSwiper( roomsGallerySwiper, {
					breakpoints: undefined,
					loop: false,
					navigation: {
						nextEl: '.swiper-button-modal-next',
						prevEl: '.swiper-button-modal-prev',
					},
					keyboard: {
						enabled: true,
						onlyInViewport: true,
					},
					hashNavigation: {
						watchState: true,
						replaceState: true,
					},
				} ) as Swiper;
				swiper.init();
				swiper.activeIndex = parseInt( clickedSlide );
				swiper.el.focus();
			}
		} );
	}
	newSwiper( roomSwiper, {
		navigation: {
			nextEl: '.swiper-button-gallery-next',
			prevEl: '.swiper-button-gallery-prev',
		},
	} );
	const roomsGalleryModal = document.getElementById( 'rooms-gallery-modal' );
	const roomsGallerySwiper = document.getElementById(
		'rooms-gallery-modal-swiper'
	);

	if ( roomsGalleryModal ) {
		roomSwiper.addEventListener( 'click', ( ev ) => {
			const clickedSlide = ev.target
				.closest( '.swiper-slide' )
				.getAttribute( 'data-swiper-slide-index' );
			// window.location.hash = slide;
			const modal = new Modal( roomsGalleryModal );
			modal.show();

			if ( roomsGallerySwiper ) {
				const swiper = newSwiper( roomsGallerySwiper, {
					breakpoints: undefined,
					loop: false,
					navigation: {
						nextEl: '.swiper-button-modal-next',
						prevEl: '.swiper-button-modal-prev',
					},
					keyboard: {
						enabled: true,
						onlyInViewport: true,
					},
					hashNavigation: {
						watchState: true,
						replaceState: true,
					},
				} ) as Swiper;
				swiper.init();
				swiper.activeIndex = parseInt( clickedSlide );
				swiper.el.focus();
			}
		} );
	}
}
