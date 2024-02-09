/**
 * The Toast Alert Class
 *
 * @link https://getbootstrap.com/docs/5.3/components/toasts/#examples
 */
class ToastAlert {
	/** The element with the id of "bootstrap-toast" */
	toast = undefined;

	/** A custom toast message. Toast messages are set to "Something went wrong!" by default */
	message = "";

	/** The bootstrap CSS modifier class */
	type = "info";

	/**
	 * @param {{trigger:HTMLElement,message:string,event:string,element:HTMLElement,type:string}} args - the args object
	 *
	 * @link https://getbootstrap.com/docs/5.3/helpers/color-background/
	 */
	constructor(args) {
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

		const bsToast = new bootstrap.Toast(this.toast);
		if (event && trigger) {
			trigger.addEventListener(event, () => {
				bsToast.show();
			});
		} else bsToast.show();
	}

	/** Sets up the default toast element */
	configToastEl() {
		const toastMessageContainer =
			this.toast.querySelector(".toast-message");

		if (this.message && toastMessageContainer) {
			toastMessageContainer.innerText = this.message;
		}

		if (this.type) {
			this.removeAllClasses();
			this.toast.classList.add(`toast`);
			this.toast.classList.add(`bg-${this.type}`, "text-dark");
		}
	}

	removeAllClasses() {
		while (this.toast.classList.length > 0) {
			this.toast.classList.remove(this.toast.classList.item(0));
		}
	}
}

jQuery(function ($) {
	// Grab the Input Field and set the initial values
	$("#startDate").daterangepicker({
		startDate: moment(),
		endDate: moment().add(2, "days"),
		minDate: moment(),
		locale: {
			format: "MM/DD/YYYY",
		},
		autoApply: true,
	});

	// On Submit, grab the values and redirect to the booking page
	$("#booking-bar").on("submit", function (ev) {
		ev.preventDefault();
		const daterangepickerData = $("#startDate").data("daterangepicker");
		const numGuests = $("#numGuests").val();

		const reservationURL = generateRedirectURL(
			daterangepickerData,
			numGuests,
		);
		if (reservationURL) {
			window.open(reservationURL, "_blank");
		}
	});
});

/**
 * Generates the URL to redirect to
 *
 * @param {daterangepicker|undefined} daterangepickerData the DateRangePicker data
 * @param {number} numGuests the number of guests
 * @returns {string} the url to redirect to
 */
function generateRedirectURL(daterangepickerData, numGuests) {
	const BASE_URL = `https://book.rguest.com/onecart/wbe/room/1180/choctaw-landing`;
	const dateFormat = "YYYY-MM-DD";

	const { startDate, endDate } = daterangepickerData;

	if ("# of Guest(s)" === numGuests) {
		new ToastAlert({
			message: `Please choose the number of guests!`,
			type: "warning",
		});
		return null;
	} else
		return `${BASE_URL}/${startDate.format(dateFormat)}/${endDate.format(
			dateFormat,
		)}/WEBSITE/${numGuests}`;
}
