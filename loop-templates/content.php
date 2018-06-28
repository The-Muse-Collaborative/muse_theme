<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<header class="entry-header mc-excerpt-header col-md-4">

			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h4>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="col-md-1"></div>

		<div class="entry-content mc-excerpt-content col-md-7">
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

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

</article><!-- #post-## -->
