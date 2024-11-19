import TwoColModalHandler from '../TwoColModalHandler';

const modal = document.querySelector< HTMLElement >( '.modal' );
if ( modal ) {
	new TwoColModalHandler( modal );
}
