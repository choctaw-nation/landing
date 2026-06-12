import TwoColModalHandler from '../TwoColModalHandler';
import '../../styles/pages/events.scss';

const modal = document.querySelector< HTMLElement >( '.modal' );
if ( modal ) {
	new TwoColModalHandler( modal );
}
