<?php
/**
 * Template Name: Confirmation Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
			<div class="col-sm justify-content-sm-end justify-content-center align-items-center d-flex">
				<div class="text-sm-left text-center">
					<h2 class="entry-title">Thanks for Contacting Us</h2>
					<p class="">We will be in touch with you shortly!</p>
        </div>
			</div>
			<div class="col-sm d-sm-flex justify-content-start ">
				<img class="vinyl_img align-self-start d-none d-sm-block" style="max-height: 663px; width: auto; transform: scaleX(-1)" src="<?php echo get_template_directory_uri() . '/images/contact_vinyl.svg'; ?>)">
				<img class="vinyl_sm mb-5 d-sm-none d-block" style="transform: scaleY(-1)" src="<?php echo get_template_directory_uri() . '/images/vinyl_0padding.png'; ?>)">
			</div>



		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
