<?php
/**
 * The template for displaying sngle album posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<h2><?php the_field('album_artist'); ?></h2>
					<h3><?php the_field('album_name'); ?></h3>
					<h3><?php the_field('release_year'); ?></h3>
					<h3><?php the_field('play_time'); ?></h3>

					<?php
					// Checks for rows in the tracks custom field and displays all entries
					if( have_rows('track') ):
							while ( have_rows('track') ) : the_row();
					        the_sub_field('track_number');
									the_sub_field('track_name');
									the_sub_field('track_length');
									the_sub_field('bpm');
									if( have_rows('featured_artists') ):
											while ( have_rows('featured_artists') ) : the_row();
												the_sub_field('feat');
											endwhile;
									else :
									endif;
									if( have_rows('samples') ):
											while ( have_rows('samples') ) : the_row();
												the_sub_field('sample');
											endwhile;
									else :
									endif;
									the_sub_field('lyrics');
					    endwhile;
					else :
					endif;
					?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

						<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
