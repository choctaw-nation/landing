<?php
/**
 * Template Name: Gatherings
 *
 * @package ChoctawNation
 * @since 0.2
 */

get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();
$weather_widget_photo = new ACF_Image( get_field( 'weather_widget_photo' ) );
?>

<aside id="weather" class="container">
	<div class="row pt-2 pb-5">
		<div class="col-12 col-xl-6 col-xxl-8 py-3">
			<?php $weather_widget_photo->the_image( 'w-100' ); ?>
		</div>
		<?php get_template_part( 'template-parts/aside', 'weather-widget' ); ?>
	</div>
</aside>

<section id="featured-activities">
	<?php
	$featured_activities = get_field( 'featured_activities' );
	foreach ( $featured_activities as $featured_activity ) {
		$feature = new Two_Col_Section( get_the_ID(), $featured_activity, 'div' );
		$feature->the_section();
	}
	?>
</section>

<?php
$attractions = get_field( 'attractions' );
$banner      = new ACF_Image( $attractions['banner_image'] );
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

?>
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
get_footer();