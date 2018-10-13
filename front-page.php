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

<?php // Include for background image through advance custom fields; needs to be moved to background and have homepage-slider.scss changed
	$image = get_field('home_background_image');
	if( !empty($image) ): ?>
		<div class="mc-homepage-background-image" style="background-image: url(<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>)">
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

					<div class="card card--faded mb-3">
						<div class="card-body">
							<h3><?php the_sub_field('home_card_title'); ?></h3>
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
