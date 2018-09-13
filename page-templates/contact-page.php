<?php
/**
 * Template Name: Contact Page
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
					
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				<img class="vinyl_img" style="max-height: 800px;" src="<?php echo get_template_directory_uri() . '/images/contact_vinyl.svg'; ?>)">
				
			</div>

			<div class="col-lg-6 col-md-6 align-self-center col-sm-6 col-xs-12">
				<p class="mobile_text_center">426 Jackson Street
				<br>Camden, NJ 08104</p>
				<p class="mobile_text_center"><b>856.202.3968</b></p>

				<h2 class="pt-5 entry-title ">SEND US A MESSAGE</h2>
				<?= do_shortcode( '[civicrm component="profile" gid="16" mode="create" hijack="1"]' ); ?>

				<!-- Message Confirmation lives here...
				https://themusecollaborative.org/contact/message-confirmation/ -->
			</div>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>