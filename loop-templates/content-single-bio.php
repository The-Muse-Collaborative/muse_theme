<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="bio-single">

	<div class="image"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></div>

	<header class="title">

		<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

		<?php if (is_singular( array( 'bios', 'artist', 'album' ) )): ?>
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
			$args = array(
		  	'post_type' => 'articles',
		  	'author_name' => $pagename,
		  	'posts_per_page' => -1
		);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
		  	echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
			endwhile;
		?>

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
