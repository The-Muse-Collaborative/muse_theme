<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row col-md-12">
			<div class="col-md-7">
        <div>
          <h2><?php the_field('album_name'); ?></h2>
          <h3><?php the_field('album_artist'); ?></h3>
          <h3><?php the_field('release_year'); ?></h3>
          <h3><?php the_field('play_time'); ?></h3>
          <p style="text-align:justify"><?php the_field('album_description'); ?></p>
       </div>
      </div>

      <div class="col-md-5">
        <?php

        $images = get_field('album_art');
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)

        if( $images ): ?>
            <ul>
                <?php foreach( $images as $image ): ?>
                    <li>
                    	<?php echo wp_get_attachment_image( $image['ID'], $size = 'full' ); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
      </div>
    </div>

    <div class="row col-md-12 mt-4">
      <?php if( have_rows('track') ): ?>
      	<ul class="nav nav-tabs flex-column col-md-3" id="myTab" role="tablist">
          <h3>tracks</h3>
      		<?php $i=0; while ( have_rows('track') ) : the_row(); ?>
      			<?php
      				$string = sanitize_title( get_sub_field('track_name') );
      			?>
      			<li role="presentation" <?php if ($i==0) { ?>class="active"<?php } ?>  >
      				<a href="#<?php echo $string ?>" aria-controls="<?php echo $string ?>" role="tab" data-toggle="tab"><?php the_sub_field('track_number'); echo ".  "; the_sub_field('track_name'); ?></a>
      			</li>
      		<?php $i++; endwhile; ?>
      	</ul>
      	<div class="tab-content col-md-9">
      		<?php $i=0; while ( have_rows('track') ) : the_row(); ?>
      			<?php
      				$string = sanitize_title( get_sub_field('track_name') );
      			?>
      		    <div role="tabpanel" style="background-color:yellow" class="tab-pane fade <?php if ($i==0) { ?>in active<?php } ?>" id="<?php echo $string; ?>">
      		    	<h2><?php the_sub_field('track_name'); ?></h2>
                  <?php // Displays track details on right side of page
                    //the_sub_field('track_length');
                    //the_sub_field('bpm');
                    //if( have_rows('featured_artists') ): // check for featured artists
                    //  while ( have_rows('featured_artists') ) : the_row();
                    //    the_sub_field('feat');
                    //  endwhile;
                    //else :
                    //endif; // end of artist check
                    //if( have_rows('samples') ): // check for samples
                    //  while ( have_rows('samples') ) : the_row();
                    //    the_sub_field('sample');
                    //  endwhile;
                    //else :
                    //endif; // end of samples check
                    the_sub_field('lyrics');
                  ?>
      		    </div>
      		<?php $i++; endwhile; ?>
      	</div>
      <?php endif; ?>
    </div>

		<footer class="entry-footer col-md-12">
			<?php understrap_entry_footer(); ?>
		</footer><!-- .entry-footer -->
</article><!-- #post-## -->
