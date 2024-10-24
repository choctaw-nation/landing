<?php
/**
 * Template Name: Things To Do
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Card;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Image;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;
use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;

new Asset_Loader( 'thingsToDo', Enqueue_Type::script, 'pages' );
get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();
$weather_widget_photo = new Image( get_field( 'weather_widget_photo' ) );
?>

<aside id="weather" class="container">
	<div class="row pt-2 pb-5 row-gap-4">
		<div class="col-12 col-lg-6 col-xl-8">
			<?php $weather_widget_photo->the_image( 'w-100 h-100 object-fit-cover' ); ?>
		</div>
		<?php get_template_part( 'template-parts/aside', 'weather-widget' ); ?>
	</div>
</aside>

<?php get_template_part( 'template-parts/events/content', 'featured-events-swiper' ); ?>

<section id="featured-activities">
	<?php
	$featured_activities = get_field( 'featured_activities' );
	$has_modal           = array();
	foreach ( $featured_activities as $featured_activity ) {
		$feature = new Two_Col_Section( get_the_ID(), $featured_activity, 'div' );
		$feature->the_section();
		if ( 'Casino' === $featured_activity['headline'] ) {
			get_template_part( 'template-parts/aside', 'casino-promotions' );
		}
		if ( $feature->has_modal ) {
			$has_modal[] = true;
		}
	}
	if ( ! empty( $has_modal ) ) {
		get_template_part( 'template-parts/content', 'modal' );
	}
	?>
</section>

<?php
$attractions = get_field( 'attractions' );
if ( ! empty( $attractions['banner_image'] ) ) {
	$banner = new Image( $attractions['banner_image'] );
	get_template_part(
		'template-parts/content',
		'banner-header',
		array(
			'url'   => $banner->src,
			'title' => array(
				'text' => 'Area Attractions',
			),
		)
	);
}
?>
<?php if ( ! empty( $attractions['attractions_columns'] ) ) : ?>
<section id="area-attractions-list" class="container my-5">
	<?php
	$attractions_columns = $attractions['attractions_columns'];
	foreach ( $attractions_columns as $row ) {
		echo '<div class="row">';
		foreach ( $row as $attraction ) {
			$attraction_card = new Card( get_the_ID(), $attraction );
			$attraction_card->the_card( 'col-12 col-md-6 col-xl-3 p-3' );
		}
		echo '</div>';
	}
	?>
</section>
	<?php
endif;
get_footer();
