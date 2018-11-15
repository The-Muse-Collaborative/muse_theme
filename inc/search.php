<?php
/**
 * Edits to the results of the website's search function
 * @package understrap
 */

//removes the following pages from search results
 function jp_search_filter( $query ) {
   if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
     //array includes the page/post id for excluded items
     $query->set( 'post__not_in', array( 307,1256,3047,3037,2979,6,173,1862 ) );
   }
 }
 add_action( 'pre_get_posts', 'jp_search_filter' );
