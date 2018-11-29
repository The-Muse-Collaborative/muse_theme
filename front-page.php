<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php
	$image = get_field('home_background_image');
	$large = $image['sizes'][ 'large' ];
	$full = $image[ 'url' ];
?>
<style>
@media screen and (min-width: 1024px) {
	.mc-homepage-background-image {
		background-image: url(<?php echo $full; ?>);
	}
}
@media screen and (min-width: 501px) and (max-width: 1023px) {
	.mc-homepage-background-image {
		background-image: url(<?php echo $large; ?>);
	}
}
@media screen and (max-width: 500px) {
	.mc-homepage-background-image {
		background-image: none;
	}
}

</style>

<?php
	$image = get_field('home_background_image');
	if( !empty($image) ): ?>
		<div class="mc-homepage-background-image" alt="<?php echo $image['alt']; ?>)">
		</div>
<?php endif; ?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
						if( have_rows('home_cards') ):

    				while ( have_rows('home_cards') ) : the_row();
					?>

					<div class="card card--faded mb-5">
						<div class="card-body">
						<?php if( !empty(get_sub_field('home_card_title')) ): ?>
							<h3><?php the_sub_field('home_card_title'); ?></h3>
						<?php endif ?>
						<?php the_sub_field('home_card_content'); ?>
						</div>
					</div>

					<?php
						endwhile;
						else :
						endif;
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
