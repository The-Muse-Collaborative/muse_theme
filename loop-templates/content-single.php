<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<header class="entry-header mc-news-header col-md-4">

			<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

			<?php if (is_singular( array( 'bio', 'artist', 'album' ) )): ?>
				<?php // Do Nothing. ?>
			<?php else: ?>
				<div class="entry-meta">
					<?php understrap_posted_on(); ?>

				</div><!-- .entry-meta -->
			<?php endif ?>

		</header><!-- .entry-header -->

		<div class="col-md-1"></div>

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<div class="entry-content mc-news-content col-md-7">

			<?php the_content(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->
		<footer class="entry-footer col-md-12">
			<?php understrap_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
