<?php
/**
 * Template Name: Styleguide
 * *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main mc-styleguide" id="main">
				<!-- Colors -->
				<div class="mc-styleguide-block">
					<h3 class="mc-styleguide-title">Colors</h3>
					<div class="mc-color-blocks">
						<div class="mc-color-block black">
							<h6>black</h6>
							<h6>#2d2926</h6>
						</div>
						<div class="mc-color-block pink">
							<h6>pink</h6>
							<h6>#c114a2</h6>
						</div>
						<div class="mc-color-block yellow">
							<h6>yellow</h6>
							<h6>#ffd100</h6>
						</div>
					</div>
				</div>

				<!-- Typography -->
				<div class="mc-styleguide-block">
					<h3 class="mc-styleguide-title">Typography</h3>
					<div>
						<h2>Header 2</h2>
						<h2 class="yellow">Header 2 - Yellow</h2>
						<h3>Header 3</h3>
						<h3 class="yellow">Header 3 - Yellow</h3>
						<h4>Header 4</h4>
						<h5>Header 5</h5>
						<h6>Header 6</h6>
						<p>The first proxy salary is, in its own way, an opera. In recent years, the unshocked smoke comes from a firry enemy. It's an undeniable fact, really; the first unflushed virgo is, in its own way, a pamphlet. As far as we can estimate, the first weest jewel is, in its own way, a cloakroom.</p>
						<p>They were lost without the lounging market that composed their crib. An unsure cement without fiberglasses is truly a car of stenosed soups. A vagal parenthesis without yogurts is truly a conga of vitric decreases. An agreement is the step-daughter of a balance.</p>
					</div>
				</div>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
