import 'bootstrap/js/dist/modal';

export default class TwoColModalHandler {
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

	/**
	 * Constructor
	 *
	 * @param modalEl The modal element
	 */
	constructor( modalEl?: HTMLElement ) {
		const modal =
			modalEl || document.querySelector< HTMLElement >( '.modal' );
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
		modalTitle.innerHTML = '';
		modalBody.innerHTML = '';
		if ( title ) {
			modalTitle.innerHTML = title;
		}
		if ( video ) {
			modalBody.innerHTML = `<div class="ratio ratio-16x9">${ video }</
			</div>`;
		} else {
			modalBody.innerHTML = `${
				headline ? `<h2 class="fs-5">${ headline }</h2>` : ''
			}<div class="fs-6">${ content }</div>`;
		}
	}
}
