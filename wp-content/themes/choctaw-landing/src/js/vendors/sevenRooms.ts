// DOM element Required:
// <button type="button" id="sr-res-root" class="btn btn-lg btn-primary text-uppercase">Reservations</button>

SevenroomsWidget.init( {
	venueId: 'tuklo',
	triggerId: 'sr-res-root', // id of the dom element that will trigger this widget
	type: 'reservations', // either 'reservations' or 'waitlist' or 'events'
	styleButton: true, // true if you are using the SevenRooms button
	clientToken: '', //(Optional) Pass the api generated clientTokenId here
} );
