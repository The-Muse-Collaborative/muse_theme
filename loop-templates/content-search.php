<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		<div class="col-md-4">
			<header class="entry-header mc-news-header">

				<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h3>' ); ?>

				<?php if ( 'post' == get_post_type() || 'articles' == get_post_type() ) : ?>

					<div class="entry-meta">

						<?php understrap_posted_on(); ?>

					</div><!-- .entry-meta -->

				<?php endif; ?>

			</header><!-- .entry-header -->
		</div>

		<div class="col-md-8">

			<div class="entry-content mc-news-content">

				<?php the_excerpt(); ?>

			</div>

		</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
