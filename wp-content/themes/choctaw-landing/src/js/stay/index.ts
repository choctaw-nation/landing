import Swiper from 'swiper';
import { newSwiper } from '../vendors/swiperjs/swiper';
import Modal from 'bootstrap/js/dist/modal';

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
				} ) as Swiper;
				swiper.el.focus();
			}
		} );
	}
}
