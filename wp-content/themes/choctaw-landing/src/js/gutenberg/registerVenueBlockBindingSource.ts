import { registerBlockBindingsSource } from '@wordpress/blocks';
import { store as editorStore } from '@wordpress/editor';
import { store as coreDataStore } from '@wordpress/core-data';

registerBlockBindingsSource( {
	name: 'cno/event-venue',
	usesContext: [ 'postType' ],
	getValues( { select, context, bindings } ) {
		const values = {};
		const venueTax = 'choctaw-events-venue';
		const { postType } = context;
		if ( postType !== 'choctaw-events' ) {
			return values;
		}
		const termIds =
			select( editorStore ).getEditedPostAttribute( venueTax );

		if ( ! termIds?.length ) {
			return values;
		}

		const venue = select( coreDataStore ).getEntityRecords(
			'taxonomy',
			venueTax,
			{
				include: termIds,
				per_page: termIds.length,
			}
		);
		for ( const [ attributeName ] of Object.entries( bindings ) ) {
			if ( attributeName === 'content' ) {
				if ( venue?.length ) {
					values[ attributeName ] = venue[ 0 ].name;
				}
			}
		}
		return values;
	},
} );
