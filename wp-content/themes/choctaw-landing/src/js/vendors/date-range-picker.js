import "../../styles/components/booking-bar.scss";
import ToastAlert from "../bs-toast";

function generateRedirectURL(daterangepickerData, numGuests) {
	const BASE_URL = `https://book.rguest.com/onecart/wbe/room/1180/Choctaw-Durant-Book`;
	const dateFormat = "YYYY-M-D";

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
jQuery(function ($) {
	$("#startDate").daterangepicker({
		startDate: moment(),
		endDate: moment().add(2, "days"),
		minDate: moment(),
		locale: {
			format: "M/DD/YYYY",
		},
		autoApply: true,
	});

	$("#booking-bar").on("submit", function (ev) {
		ev.preventDefault();
		const daterangepickerData = $("#startDate").data("daterangepicker");
		const numGuests = $("#numGuests").val();

		const reservationURL = generateRedirectURL(
			daterangepickerData,
			numGuests,
		);
		if (reservationURL) {
			new ToastAlert({
				message: `User will be sent to booking site.`,
				type: "info",
			});
			// window.open(reservationURL, '_blank');
		}
	});
});
