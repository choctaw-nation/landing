<?php //phpcs:ignore
/**
 * The Super ACF class that all children inherit
 *
 * @package ChoctawNation
 * @since 0.2
 */

/**
 * The abstract class for creating content generator classes with ACF fields
 */
abstract class ACF_Generator {
	/** The post_id associated with the acf fields
	 *
	 * @var int $post_id
	 */
	protected int $post_id;

	/** Inits the class
	 *
	 * @param int   $post_id the post id
	 * @param array $acf_fields the acf fields
	 */
	public function __construct( int $post_id, array $acf_fields ) {
		$this->post_id = $post_id;
		$this->init_props( $acf_fields );
	}

	/** Sets class props to ACF fields
	 *
	 * @param array $acf the acf array
	 */
	abstract protected function init_props( array $acf );
}