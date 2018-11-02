<?php
/**
 * Single post partial template.
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

				<?php if ( 'articles' == get_post_type() ) : ?>

					<div class="entry-meta">

						<?php understrap_posted_on(); ?>

					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->
		</div>

		<div class="col-md-8">

			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

			<div class="entry-content mc-news-content">

				<?php the_excerpt(); ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
				?>

			</div><!-- .entry-content -->
		</div>
		<footer class="entry-footer col-md-12">
			<?php understrap_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
