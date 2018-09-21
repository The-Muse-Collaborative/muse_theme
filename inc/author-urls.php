<?php
/**
 * Makes wordpress generated author pages redirect to bio custom posts
 *
 * @package understrap
 */

add_action('init', 'cng_author_base');
function cng_author_base() {
    global $wp_rewrite;
    $author_slug = 'bios'; // change slug name
    $wp_rewrite->author_base = $author_slug;
}
