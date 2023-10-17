<?php
/**
 * CNO Navwalker
 *
 * Edits the output of wp_nav_menu()
 * <div class='menu-container'>
 *   <ul> // start_lvl()
 *     <li><a href=""><span> // start_el()
 *     </span></a></li> // end_el()
 *   </ul>
 * </div> // end_lvl()
 *
 * @package ChoctawNation
 * @since 0.2
 * @version 2.0
 */

/**
 * Extends the WP Nav Walker to create megamenu option
 *
 * @since 0.1
 * @author Blake Perkins
 */
class CNO_Navwalker extends Walker_Nav_Menu {
	/** The Current Menu Item
	 *
	 * @var WP_Post $current_item
	 */
	private WP_Post $current_item;

	/**
	 * An array of the last items' IDs of each top-level menu item
	 *
	 * @var int[] $nav_arr
	 */
	private array $nav_arr;

	/**
	 * The Opening Level
	 *
	 * @param string    $output the html
	 * @param int       $depth whether we are at the top-level or a sub-level
	 * @param ?stdClass $args An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = \null ) {
		$indent  = str_repeat( "\t", $depth ); // indents the final HTML
		$submenu = ( $depth > 0 ) ? ' sub-menu' : ''; // adds sub-menu class
	}

	/**
	 * Starts the Element Output (li a span)
	 *
	 * @param string   $output            Used to append additional content (passed by reference).
	 *
	 * @param WP_Post  $data_object       Menu item data object.
	 * @param int      $depth             Depth of menu item. Used for padding.
	 * @param stdClass $args              An object of wp_nav_menu() arguments.
	 * @param int      $id Optional. ID of the current menu item. Default 0.
	 */
	public function start_el( &$output, $data_object, $depth = 0, $args = \null, $id = 0 ) {
		$this->current_item = $data_object;

		$output .= $this->get_the_li_element( $depth, $args );
		$output .= $this->get_the_anchor_element( $args );
	}

	/** Generate the Opening `li` tag
	 *
	 * @param int      $depth Depth of menu item. Used for padding.
	 * @param stdClass $args  An object of wp_nav_menu() arguments.
	 * @return string the HTML
	 */
	private function get_the_li_element( $depth, $args ): string {
		$indent        = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$li_attributes = '';
		$class_names   = $this->set_the_li_classes( $depth, $args );
		$html_id       = $this->set_the_li_id( $args );
		return $indent . '<li' . $html_id . $class_names . $li_attributes . '>';
	}

	/** Handles the setting of the element's classes and returns an HTML string
	 *
	 * @param int       $depth whether we are at the top-level or a sub-level
	 * @param ?stdClass $args An object of wp_nav_menu() arguments.
	 * @return string the class names
	 */
	private function set_the_li_classes( int $depth, stdClass $args ): string {
		$classes   = empty( $this->current_item->classes ) ? array() : (array) $this->current_item->classes;
		$classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
		$classes[] = ( $this->current_item->current || $this->current_item->current_item_ancestor ) ? 'active' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $this->current_item->ID;

		if ( $depth && $args->walker->has_children ) {
			$classes[] = 'dropdown-menu dropdown-menu-end';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $this->current_item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		return $class_names;
	}

	/** Handles the id generation
	 *
	 * @param ?stdClass $args An object of wp_nav_menu() arguments.
	 * @return string the id
	 */
	private function set_the_li_id( ?stdClass $args ): string {
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $this->current_item->ID, $this->current_item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		return $id;
	}

	private function get_the_anchor_element( $args ): string {
		$attributes  = ! empty( $this->current_item->attr_title ) ? ' title="' . esc_attr( $this->current_item->attr_title ) . '"' : '';
		$attributes .= ! empty( $this->current_item->target ) ? ' target="' . esc_attr( $this->current_item->target ) . '"' : '';
		$attributes .= ! empty( $this->current_item->xfn ) ? ' rel="' . esc_attr( $this->current_item->xfn ) . '"' : '';
		$attributes .= ! empty( $this->current_item->url ) ? ' href="' . esc_attr( $this->current_item->url ) . '"' : '';

		$attributes  .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
		$item_output  = $args->walker->before;
		$item_output .= "<a {$attributes}>";
		$item_output .= $args->walker->link_before . apply_filters( 'the_title', $this->current_item->title, $this->current_item->ID ) . $args->walker->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
	}

	// public function end_el( &$output, $item, $depth = 0, $args = \null ) {
	// }

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
			$output .= '<li class="pt-3 constrain-width">';
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
	private function get_the_mega_menu_content( int $id ): string {
		$mega_menu_content = '';

		if ( ! in_array( $id, $this->nav_arr, true ) ) {
			return $mega_menu_content;
		}

		switch ( $id ) {
			case $this->nav_arr[1]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'stay_content', 'option' ) );
				break;
			case $this->nav_arr[2]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'eat_and_drink_content', 'option' ) );
				break;
			case $this->nav_arr[3]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'entertainment_content', 'option' ) );
				break;
			case $this->nav_arr[4]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'things_to_do_content', 'option' ) );
				break;
			case $this->nav_arr[5]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'mercantile_content', 'option' ) );
				break;
		}

		$mega_menu_content = $mega_menu->get_the_content();
		return $mega_menu_content;
	}
}