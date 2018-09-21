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

		<div class="d-flex justify-content-center mb-5">
					
			<div class="justify-content-center d-none d-sm-block">

				<img class="vinyl_img pr-4" style="max-height: 584px;" src="<?php echo get_template_directory_uri() . '/images/vinyl_0padding.png'; ?>)">
				
			</div>

			<div class="flex-column align-items-end mobile_text_center d-flex justify-content-center">
			<!-- <div class="col-lg-6 col-md-6 flex-column align-items-end col-sm-6 col-xs-12 mobile_text_center"> -->
				<div class="contact-address">
				<img class="vinyl_sm" src="<?php echo get_template_directory_uri() . '/images/vinyl_0padding.png'; ?>)">
				<p class="">426 Jackson Street
				<br>Camden, NJ 08104</p>
				<p class="mobile_text_center"><b>856.202.3968</b></p>
				</div>
				
				<div class="align-self-end mt-auto">
				<h2 class="pt-5 entry-title ">SEND US A MESSAGE</h2>
				<?= do_shortcode( '[civicrm component="profile" gid="16" mode="create" hijack="1"]' ); ?>
				</div>


				<!-- Message Confirmation lives here...
				https://themusecollaborative.org/contact/message-confirmation/ -->
			</div>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

<style type="text/css">
	@media only screen and (max-width: 575px) {
		.crm-container span.crm-button {
			float: initial !important;
			width: 100%;
		}
	}

</style>