import 'bootstrap/js/dist/modal';
import Swiper from 'swiper';
import { Navigation, Pagination, A11y } from 'swiper/modules';
import 'swiper/scss';
import 'swiper/scss/navigation';
import 'swiper/scss/pagination';
import 'swiper/scss/a11y';

new ( class HandleModal {
	/**
	 * The modal element
	 */
	private modal: HTMLElement;

	/**
	 * The modal content
	 */
	private modalContent: {
		headline: string | null;
		content: string | null;
		video: string | null;
		title: string | null;
	};

	/**
	 * The modal elements
	 */
	private modalElements: {
		title: HTMLElement;
		body: HTMLElement;
	};

	constructor() {
		const modal = document.querySelector< HTMLElement >( '.modal' );
		if ( ! modal ) {
			throw new Error( 'Modal not found' );
		}
		this.modal = modal;
		this.modal.addEventListener(
			'show.bs.modal',
			this.handleModal.bind( this )
		);
	}

	/**
	 * Sets the modal content based on the data passed by the trigger
	 *
	 * @param ev The Bootstrap custom event object
	 */
	private handleModal( ev ) {
		try {
			this.getModalElements();
			this.initContent( ev.relatedTarget );
			this.setModalContent();
		} catch ( err ) {
			console.error( err );
		}
	}

	/**
	 * Gets the modal elements
	 */
	private getModalElements() {
		const title = this.modal.querySelector< HTMLElement >( '.modal-title' );
		const body = this.modal.querySelector< HTMLElement >( '.modal-body' );

		if ( ! title || ! body ) {
			throw new Error( 'Modal elements not found' );
		}

		this.modalElements = {
			title,
			body,
		};
	}

	/**
	 * Initializes the modal content
	 *
	 * @param trigger The element that triggered the modal
	 */
	private initContent( trigger: HTMLElement ) {
		const headline = trigger.getAttribute( 'data-modal-headline' );
		const content = trigger.getAttribute( 'data-modal-content' );
		const video = trigger.getAttribute( 'data-modal-video' );
		const title = trigger.getAttribute( 'data-modal-title' );

		this.modalContent = {
			headline: '' === headline ? null : headline,
			content: '' === content ? null : content,
			video: '' === video ? null : video,
			title: '' === title ? null : title,
		};
	}

	private setModalContent() {
		const { headline, content, video, title } = this.modalContent;
		const { title: modalTitle, body: modalBody } = this.modalElements;
		if ( title ) {
			modalTitle.innerHTML = title;
		}
		if ( video ) {
			modalBody.innerHTML = `<div class="ratio ratio-16x9">${ video }</
			</div>`;
		} else {
			modalBody.innerHTML = `<h2 class="fs-5">${ headline }</h2><div class="fs-6">${ content }</div>`;
		}
	}
} )();

const swiperEl = document.querySelector< HTMLElement >(
	'#casino-promotions .swiper'
);
if ( swiperEl ) {
	new Swiper( swiperEl, {
		modules: [ Navigation, Pagination, A11y ],
		navigation: {
			nextEl: '.casino-promos-button-next',
			prevEl: '.casino-promos-button-prev',
		},
		pagination: {
			el: '.casino-promos-pagination',
			clickable: true,
		},
		grabCursor: true,
		lazyPreloadPrevNext: 1,
		loop: false,
		spaceBetween: 10,
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
