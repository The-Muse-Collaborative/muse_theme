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
					
			

			<div class="col-lg-6 col-md-6 align-self-center col-sm-6 col-xs-12 mobile_text_center">
				<h2 class="entry-title ">THANKS FOR CONTACTING US</h2>
				<p class="">WE WILL BE IN TOUCH WITH YOU SHORTLY!</p>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				<img class="vinyl_img confirmation" style="max-height: 800px; transform: scaleX(-1);" src="<?php echo get_template_directory_uri() . '/images/contact_vinyl.svg'; ?>)">
				
			</div>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>