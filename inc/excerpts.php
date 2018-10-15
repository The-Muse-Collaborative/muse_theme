<?php
/**
 * Makes changes to post and custom post excerpts
 *
 * @package understrap
 */

//changes number of words in excerpts
function theme_slug_excerpt_length( $length ) {
        if ( is_admin() ) {
                return $length;
        }
        return 125; // total number of words
}
add_filter( 'excerpt_length', 'theme_slug_excerpt_length', 999 );
