<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>


<?php get_sidebar( 'footerfull' ); ?>
	<footer class="mc-footer mc-top-footer" style="background-image: url(<?php echo get_template_directory_uri() . '/images/bottom-banner.jpg'; ?>)">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-md-5 col-sm-12 mc-top-footer--right contact_bg" style="background-image: url(<?php echo get_template_directory_uri() . '/images/contact_bg2.png'; ?>)">
					<h3 class="white">Contact</h3>
					<div class="mc-top-footer--item">
						<p>
							426 Jackson Street<br />
							Camden, NJ 08104
						</p>
					</div>
					<div class="mc-top-footer--item">
						<a href="tel:856.202.3968">856.202.3968</p>
					</div>
					<div class="mc-top-footer--item">
						<a href="mailto:info@themusecollaborative.org">info@themusecollaborative.org</a>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<footer class="mc-footer mc-bottom-footer">
			<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row justify-content-between align-items-center mc-bottom-footer-content">
				<div class="col-sm-2 mc-footer-hosting">
					<p class="sm-text" style="text-align: center">Hosting provided by</p>
					<a href="https://linode.com">
						<img class="mc-footer-linode-logo" src="<?php echo get_template_directory_uri() . '/images/linode_icon.svg'; ?>"/>
					</a>
				</div>
				<div class="col-sm-4">
					<!-- Hide this logo on mobile -->
					<img class="d-none d-sm-block" src="<?php echo get_template_directory_uri() . '/images/bottom-footer-logo.svg'; ?>"/>
					<!-- Show this logo on mobile -->
					<img class="d-block d-sm-none text-center mc-footer-logo-mobile" src="<?php echo get_template_directory_uri() . '/images/bottom-footer-logo-mobile.svg'; ?>"/>
					<div class="pull-right mc-footer-social" style="margin-top: 20px">
						<!-- <div class="col-3"> -->
							<a href="https://twitter.com/cmdmuse" target="blank">
								<img class="socials" src="<?php echo get_template_directory_uri() . '/images/twitter-icon.svg'; ?>"/>
							</a>
						<!-- </div> -->
						<!-- <div class="col-3"> -->
							<a href="https://instagram.com/cmdmuse" target="blank">
								<img class="socials" src="<?php echo get_template_directory_uri() . '/images/instagram-icon.svg'; ?>"/>
							</a>
						<!-- </div> -->
						<!-- <div class="col-3"> -->
							<a href="https://facebook.com/cmdmuse" target="blank">
								<img class="socials" src="<?php echo get_template_directory_uri() . '/images/facebook-icon.svg'; ?>"/>
							</a>
						<!-- </div> -->
						<!-- <div class="col-3"> -->
							<a href="https://plus.google.com/+ThemusecollaborativeOrg1" target="blank">
								<img class="socials" src="<?php echo get_template_directory_uri() . '/images/googleplus-icon.svg'; ?>"/>
							</a>
					</div>
						<!-- </div> -->
					<div class="row clear-both">
						<div class="col-12 text-center text-sm-right">
							<p class="sm-text" style="margin-top: 20px">
								&copy; Copyright <?php echo date('Y')?> All Rights Reserved
							</p>
						</div>
					</div>
				</div>
				<div class="col-12 text-center">

				</div>
			</div>
	</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

<style type="text/css">

</style>
