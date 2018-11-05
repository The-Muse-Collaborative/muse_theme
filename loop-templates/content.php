<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-md-4">
			<header class="entry-header mc-news-header">

				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h4>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->

			<div class="mt-3 mb-4">
				<?php echo get_the_post_thumbnail(); ?>
			</div>

		</div>
		<div class="col-md-8">
			<div class="entry-content mc-news-content">

					<?php the_content(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>


				<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

				</footer><!-- .entry-footer -->
				</div><!-- .entry-content -->
			</div>
		</div>

</article><!-- #post-## -->
