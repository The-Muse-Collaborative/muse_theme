<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h2 class="page-title"><?php esc_html_e( 'Oh $#&@! – Something went wrong', 'understrap' ); ?></h2>

							</header><!-- .page-header -->

							<div class="page-content">

							<p><?php esc_html_e( 'We can&rsquo;t find that page. If you don&rsquo;t find what you&rsquo;re looking for, please contact us.', 'understrap' ); ?></p>

  						<?php get_search_form(); ?>

							<div class="mt-5 mb-4">
								<a class="btn btn-special" role="button" href="/contact">Contact Us</a>
							</div>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
