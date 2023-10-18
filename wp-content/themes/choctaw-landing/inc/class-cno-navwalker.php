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
class CNO_Navwalker extends Bootstrap_5_WP_Nav_Menu_Walker {
	/**
	 * An array of the last items' IDs of each top-level menu item
	 *
	 * @var int[] $last_item_ids
	 */
	private array $last_item_ids;

	/** How many children a menu has
	 *
	 * @var int $children_count
	 */
	private int $children_count;

	/**
	 * Depth of menu item. Used for padding.
	 *
	 * @var int $depth
	 */
	private int $depth;

	/**
	 * The array of wp_nav_menu() arguments as an object.
	 *
	 * @var ?stdClass $args
	 */
	private ?stdClass $args;

	/**
	 * Optional. ID of the current menu item. Default 0.
	 *
	 * @param int $id
	 */
	private int $id;

	/**
	 * The Opening Level
	 *
	 * @param string    $output the html
	 * @param int       $depth whether we are at the top-level or a sub-level
	 * @param ?stdClass $args An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = \null ) {
		$dropdown_menu_class[] = '';
		// handle user-inputted classes
		foreach ( $this->current_item->classes as $class ) {
			if ( in_array( $class, $this->dropdown_menu_alignment_values, true ) ) {
				$dropdown_menu_class[] = $class;
			}
		}
		$indent       = str_repeat( "\t", $depth );
		$is_top_level = 0 === $depth;
		$submenu      = ( $is_top_level ) ? ' mega-menu__container' : ' sub-menu';
		$grid         = '';

		if ( $is_top_level ) {
			$column_count = $this->children_count + 1; // add 1 for unaccounted-for acf field
			$grid         = " style=\"--grid-columns:{$column_count}\"";
		}

		$output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr( implode( ' ', $dropdown_menu_class ) ) . " depth_$depth\"" . $grid . ">\n";
	}

	/**
	 * Starts the Element Output (inside the `li`)
	 *
	 * @param string   $output       Used to append additional content (passed by reference).
	 * @param WP_Post  $data_object  Menu item data object.
	 * @param int      $depth        Depth of menu item. Used for padding.
	 * @param stdClass $args         An object of wp_nav_menu() arguments.
	 * @param int      $id           Optional. ID of the current menu item. Default 0.
	 */
	public function start_el( &$output, $data_object, $depth = 0, $args = \null, $id = 0 ) {
		$this->current_item = $data_object;
		$this->depth        = $depth;
		$this->args         = $args;
		$this->id           = $id;

		$output .= $this->get_the_li_element();
		$output .= $this->get_the_anchor_element();
	}

	/** Generate the Opening `li` tag
	 *
	 * @return string the HTML
	 */
	private function get_the_li_element(): string {
		if ( $this->has_children ) {
			$this->set_the_children_count();
		}
		$indent        = ( $this->depth ) ? str_repeat( "\t", $this->depth ) : '';
		$li_attributes = '';
		$class_names   = $this->set_the_li_classes();
		$html_id       = $this->set_the_li_id();
		return $indent . '<li' . $html_id . $class_names . $li_attributes . '>';
	}

	/**
	 * Sets the number of children a sub-menu has
	 */
	private function set_the_children_count() {
		// Getting the menu item objects array from the menu.
		$menu_items = wp_get_nav_menu_items( $this->args->menu->term_id );

		// Getting the parent ids by looping through the menu item objects array. This will give an array of parent ids and the number of their children.
		$menu_item_parents = array_map(
			function ( $o ) {
				return $o->menu_item_parent;
			},
			$menu_items
		);
		// Get number of children menu item has.
		$this->children_count = array_count_values( $menu_item_parents )[ $this->current_item->ID ];
	}

	/**
	 * Handles the setting of the element's classes and returns an HTML string
	 *
	 * @return string the class names
	 */
	private function set_the_li_classes(): string {
		$classes   = empty( $this->current_item->classes ) ? array() : (array) $this->current_item->classes;
		$classes[] = ( $this->has_children ) ? 'dropdown ' : '';
		$classes[] = ( $this->has_children && 0 === $this->depth ) ? 'mega-menu position-static ' : '';
		$classes[] = ( $this->current_item->current || $this->current_item->current_item_ancestor ) ? 'active' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $this->current_item->ID;

		if ( $this->depth && $this->has_children ) {
			$classes[] = 'dropdown-menu dropdown-menu-end';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $this->current_item, $this->args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		return $class_names;
	}

	/**
	 * Handles the id generation
	 *
	 * @return string the id
	 */
	private function set_the_li_id(): string {
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $this->current_item->ID, $this->current_item, $this->args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		return $id;
	}

	/**
	 * Generates the intial <a></a> tag
	 *
	 * @return string the anchor
	 */
	private function get_the_anchor_element(): string {
		$attributes = $this->get_the_attributes();

		$title = apply_filters( 'the_title', $this->current_item->title, $this->current_item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $this->current_item, $this->args, $this->depth );

		$item_output  = $this->args->before;
		$item_output .= "<a {$attributes}>";
		$item_output .= $this->args->link_before . $title . $this->args->link_after;
		$item_output .= '</a>';
		$item_output .= $this->args->after;
		$item_output  = apply_filters( 'walker_nav_menu_start_el', $item_output, $this->current_item, $this->depth, $this->args );
		return $item_output;
	}

	/** Builds the anchor attributes */
	private function get_the_attributes(): string {
		$attributes = array(
			'title'  => $this->current_item->attr_title,
			'target' => $this->current_item->target,
			'rel'    => $this->current_item->xfn,
			'href'   => $this->current_item->url,
			'class'  => '',
		);

		if ( $this->has_children ) {
			$attributes['data-toggle'] = 'dropdown';
			$attributes['class']       = 'dropdown-toggle';
			$is_mega_menu_title        = 0 !== $this->depth && '0' !== $this->current_item->menu_item_parent;

			if ( $is_mega_menu_title ) {
				$attributes['class'] .= ' mega-menu__title';
			}
		}
		if ( 0 === $this->depth ) {
			$attributes['class'] .= ' text-white';
		}
		return $this->build_atts( $attributes );
	}


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
				$this->last_item_ids[] = $last_item;
			}
			$last_item = $nav_item->ID;
		}

		$mega_menu_content = $this->get_the_mega_menu_content( $this->current_item->ID );
		$discard_spacing   = isset( $args->item_spacing ) && 'discard' === $args->item_spacing;

		$t      = $discard_spacing ? '' : "\t";
		$n      = $discard_spacing ? '' : "\n";
		$indent = str_repeat( $t, $depth );

		if ( 0 === $depth && $mega_menu_content ) {
			$output .= '<li class="pt-3 flex-grow-1 mega-menu__acf-field">';
			$output .= $mega_menu_content;
			$output .= '</li>';
		}

		$output .= "{$indent}</ul>{$n}";
	}

	/**
	 * If current_item->ID in $last_item_ids[], get the content
	 *
	 * @param int $id the current item's ID
	 * @return string the markup
	 */
	private function get_the_mega_menu_content( int $id ): string {
		$mega_menu_content = '';

		if ( ! in_array( $id, $this->last_item_ids, true ) ) {
			return $mega_menu_content;
		}

		switch ( $id ) {
			case $this->last_item_ids[1]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'stay_content', 'option' ) );
				break;
			case $this->last_item_ids[2]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'eat_and_drink_content', 'option' ) );
				break;
			case $this->last_item_ids[3]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'entertainment_content', 'option' ) );
				break;
			case $this->last_item_ids[4]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'things_to_do_content', 'option' ) );
				break;
			case $this->last_item_ids[5]:
				$mega_menu = new Mega_Menu_Content( 'option', get_field( 'mercantile_content', 'option' ) );
				break;
		}

		$mega_menu_content = $mega_menu->get_the_content();
		return $mega_menu_content;
	}
}