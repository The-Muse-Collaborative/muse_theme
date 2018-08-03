<?php
/**
 * Post rendering content according to caller of get_template_part for bios.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="bio-single">

	<div class="image"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></div>

	<header class="title">

		<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

		<?php if (is_singular( array( 'bio', 'artists', 'albums' ) )): ?>
			<?php // Do Nothing. ?>
		<?php else: ?>
			<div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->
		<?php endif ?>

	</header><!-- .entry-header -->


	<div class="content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->
