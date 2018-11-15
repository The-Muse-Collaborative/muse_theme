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
            <div class="mt-3 mc-news-header">
            </div>
          <h3><?php the_field('album_artist'); ?></h3>
          <h5>Release Year: <?php the_field('release_year'); ?></h5>
          <h5>Length: <?php the_field('play_time'); ?> min</h5>
          <p style="text-align:justify"><?php the_field('album_description'); ?></p>
       </div>
      </div>

      <div class="col-md-5">
        <?php
        $images = get_field('album_art');

        if( $images ): ?>
          <?php foreach( $images as $image ): ?>
            <a href="<?php echo $image['url']; ?>" data-toggle="lightbox" >
              <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php the_title(); ?>" class="img-fluid" />
            </a>
          <?php endforeach; ?>
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
			<script>
		   	window.$ = jQuery.noConflict();
				$(document).on('click', '[data-toggle="lightbox"]', function(e) {
	     		e.preventDefault();
	        $(this).ekkoLightbox({
						//options go here
					});
	      });
			</script>
		</footer><!-- .entry-footer -->
</article><!-- #post-## -->
