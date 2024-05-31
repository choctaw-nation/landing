import Lightbox from 'bs5-lightbox';
import 'bootstrap/js/dist/modal';
import { newSwiper } from '../vendors/swiperjs/swiper';

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
