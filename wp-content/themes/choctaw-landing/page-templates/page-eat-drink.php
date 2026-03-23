<?php
/**
 * Template Name: Eat & Drink
 *
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\ACF\Eat_And_Drink;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Title_Bar;

wp_enqueue_script( 'eat-drink-swiper' );
wp_enqueue_style( 'eat-drink-swiper' );
get_header();
?>
<main <?php post_class(); ?>>
	<?php
	$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
	$hero->the_hero();
	$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
	$title_bar->the_title_bar();

	$featured_specials = get_field( 'featured_specials' );
	if ( ! empty( $featured_specials ) ) {
		$can_render = false;
		foreach ( $featured_specials as $special ) {
			if ( 'publish' === $special->post_status ) {
				$can_render = true;
				break;
			}
		}
		if ( $can_render ) {
			get_template_part( 'template-parts/aside', 'featured-specials', array( 'featured_specials' => $featured_specials ) );
		}
	}

	$sections = get_field( 'sections' );
	if ( $sections ) {
		echo "<div class='d-flex flex-column row-gap-5 my-5'>";
		foreach ( $sections as $section ) {
			$layout    = $section['acf_fc_layout'];
			$the_posts = $section['featured_eat_or_drink'];
			$row       = new Eat_And_Drink( $layout, $the_posts );
			$row->the_section();
		}
		echo '</div>';
	}
	?>
</main>
<?php
get_footer();