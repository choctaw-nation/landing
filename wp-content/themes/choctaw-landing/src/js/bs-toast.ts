import Toast from "bootstrap/js/dist/toast";

/**
 * Represents the configuration options for a toast.
 * @property {HTMLElement} [trigger] - An HTML Element that triggers the Toast.
 * @property {string} [message] - A short message for the toast. Defaults to "Something went wrong!" if not provided.
 * @property {string} [event] - A valid event type to add a listener to.
 * @property {HTMLElement} [element] - A custom toast element to initialize the Toast constructor with.
 * @property {string} [type] - Sets the bg & color of the toast in accordance with bootstrap's colors & background API
 * @link https://getbootstrap.com/docs/5.3/helpers/color-background/
 */
export type ToastArgs = {
	trigger?: HTMLElement;
	message?: string;
	event?: string;
	element?: HTMLElement;
	type?:
		| "primary"
		| "secondary"
		| "success"
		| "danger"
		| "warning"
		| "info"
		| "light"
		| "dark";
};

/** To be used within a Callback Function
 *
 * @link https://getbootstrap.com/docs/5.3/components/toasts/#examples
 */
export default class ToastAlert {
	private toast: HTMLElement;
	private message?: string;
	private type?: ToastArgs["type"] = "info";

	constructor(args: ToastArgs) {
		const { element, message, event, trigger, type } = args;
		this.message = message;
		this.type = type;
		const toast = document.getElementById("bootstrap-toast");

		if (!toast && !element) {
			throw new Error(
				`Couldn't initialize toast message! No element found!`,
			);
		}

		if (toast && !element) {
			this.toast = toast;
			this.configToastEl();
		} else if (element) {
			this.toast = element;
		}

		const bsToast = Toast.getOrCreateInstance(this.toast);
		if (event && trigger) {
			trigger.addEventListener(event, () => {
				bsToast.show();
			});
		} else bsToast.show();
	}

	/** Sets up the default toast element */
	private configToastEl() {
		const toastMessage = this.toast.querySelector(
			".toast-message",
		) as HTMLElement;

		if (this.message && toastMessage) {
			toastMessage.innerText = this.message;
		}

		if (this.type) {
			this.removeAllClasses();
			this.toast.classList.add(`toast`);
			this.toast.classList.add(`text-bg-${this.type}`);
		}
	}

	private removeAllClasses() {
		while (this.toast.classList.length > 0) {
			this.toast.classList.remove(this.toast.classList.item(0)!);
		}
	}
}
