import '../../styles/components/booking-bar.scss';
import ToastAlert from '../bs-toast';

jquery( function ( $ ) {
	// Grab the Input Field and set the initial values
	$( '#startDate' ).daterangepicker( {
		startDate: moment(),
		endDate: moment().add( 2, 'days' ),
		minDate: moment(),
		locale: {
			format: 'MM/DD/YYYY',
		},
		autoApply: true,
	} );

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
