import '../../styles/components/booking-bar.scss';
import ToastAlert from '../bs-toast';

jQuery( function ( $ ) {
	const dateRangePickerArgs = {
		minDate: moment( '2024-04-01' ),
		locale: {
			format: 'MM/DD/YYYY',
		},
		autoApply: true,
	};
	if ( moment().isAfter( '2024-04-01' ) ) {
		dateRangePickerArgs.startDate = moment();
		dateRangePickerArgs.endDate = moment().add( 1, 'days' );
	} else {
		dateRangePickerArgs.startDate = moment( '2024-04-01' );
		dateRangePickerArgs.endDate = moment( '2024-04-02' );
	}

	// Grab the Input Field and set the initial values
	$( '#startDate' ).daterangepicker( dateRangePickerArgs );

	// On Submit, grab the values and redirect to the booking page
	$( '#booking-bar' ).on( 'submit', function ( ev ) {
		ev.preventDefault();
		const daterangepickerData = $( '#startDate' ).data( 'daterangepicker' );
		const numGuests = $( '#numGuests' ).val();

		const reservationURL = generateRedirectURL(
			daterangepickerData,
			numGuests
		);
		if ( reservationURL ) {
			window.open( reservationURL, '_blank' );
		}
	} );
} );

/**
 * Generates the URL to redirect to
 *
 * @param {daterangepicker|undefined} daterangepickerData the DateRangePicker data
 * @param {number} numGuests the number of guests
 * @returns {string} the url to redirect to
 */
function generateRedirectURL( daterangepickerData, numGuests ) {
	const BASE_URL = `https://book.rguest.com/onecart/wbe/room/1180/choctaw-landing`;
	const dateFormat = 'YYYY-MM-DD';

	const { startDate, endDate } = daterangepickerData;

	if ( '# of Guest(s)' === numGuests ) {
		new ToastAlert( {
			message: `Please choose the number of guests!`,
			type: 'warning',
		} );
		return null;
	} else
		return `${ BASE_URL }/${ startDate.format(
			dateFormat
		) }/${ endDate.format( dateFormat ) }/WEBSITE/${ numGuests }`;
}
