<?php
/**
 * CNO Navwalker
 *
 * @package ChoctawNation
 * @since 0.2
 */

/**
 * Extends the Bootstrap 5 Nav Walker to create megamenu option
 *
 * @since 0.1
 * @author Blake Perkins
 */
class CNO_Navwalker extends Bootstrap_5_WP_Nav_Menu_Walker {
	/**
	 * An array of the last items' IDs of each top-level menu item
	 *
	 * @var int[] $nav_arr
	 */
	private array $nav_arr;

	/**
	 * Ends the list of after the elements are added. Specifically, this function handles the mega-menu output.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$nav_items    = wp_get_nav_menu_items( 'main-menu' );
		$last_item    = null;
		$end_of_array = end( $nav_items );
		foreach ( $nav_items as $nav_item ) {
			$is_top_level_item = '0' === $nav_item->menu_item_parent;

			if ( $is_top_level_item || $nav_item === $end_of_array ) {
				$this->nav_arr[] = $last_item;
			}
			$last_item = $nav_item->ID;
		}

		$mega_menu_content = $this->get_the_mega_menu_content( $this->current_item->ID );
		$discard_spacing   = isset( $args->item_spacing ) && 'discard' === $args->item_spacing;

		$t      = $discard_spacing ? '' : "\t";
		$n      = $discard_spacing ? '' : "\n";
		$indent = str_repeat( $t, $depth );

		if ( 0 === $depth && $mega_menu_content ) {
			$output .= '<li class="pt-3" style="width: 130px;">';
			$output .= $mega_menu_content;
			$output .= '</li>';
		}

		$output .= "{$indent}</ul>{$n}";
	}

	/**
	 * If current_item->ID in $nav_arr[], get the content
	 *
	 * @param int $id the current item's ID
	 * @return string the markup
	 */
	private function get_the_mega_menu_content( int $id ) {
		$mega_menu_content = '';
		if ( ! in_array( $id, $this->nav_arr, true ) ) {
			return $mega_menu_content;
		}
		switch ( $id ) {
			case $this->nav_arr[1]:
				$mega_menu         = new Mega_Menu_Content( 'option', get_field( 'stay_content', 'option' ) );
				$mega_menu_content = $mega_menu->get_the_content();
				break;
			case $this->nav_arr[2]:
				$mega_menu_content = get_field( 'eat_and_drink_content', 'option' );
				break;
			case $this->nav_arr[3]:
				$mega_menu_content = get_field( 'entertainment_content', 'option' );
				break;
			case $this->nav_arr[4]:
				$mega_menu_content = get_field( 'things_to_do_content', 'option' );
				break;
			case $this->nav_arr[5]:
				$mega_menu_content = get_field( 'mercantile_content', 'option' );
				break;
		}
		return $mega_menu_content;
	}
}