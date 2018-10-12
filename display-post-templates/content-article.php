<?php
/**
 * "Small" layout for Display Posts Shortcode
 *
**/
echo '<article class="post-summary small">';
	echo '<h2 class="entry-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
echo '</article>';
