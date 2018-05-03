<?php
/**       Custom posts setup        **/


/************************************/
/* Creates custom taxonomy for bios */
/************************************/
function bio_init() {
	$labels = array(
		'name'              => _x( 'Bios', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Bio', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Bio Categories', 'textdomain' ),
		'all_items'         => __( 'All Bio Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Bio Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Bio Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Bio Category', 'textdomain' ),
		'update_item'       => __( 'Update Bio Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Bio Category', 'textdomain' ),
		'new_item_name'     => __( 'New Bio Name', 'textdomain' ),
		'menu_name'         => __( 'Bio Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'public'            => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'bio' ),
	);

	register_taxonomy('bio', array( 'bio' ), $args);
}

/************************************/
/* Runs custom taxonomy for bios */
/************************************/
add_action( 'init', 'bio_init' );

/****************************************/
/* Creates custom taxonomy for articles */
/****************************************/

// creates hierarchical categories for articles
function article_init() {
	$labels = array(
		'name'              => _x( 'Articles', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Article', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Article Categories', 'textdomain' ),
		'all_items'         => __( 'All Article Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Article Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Article Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Article Category', 'textdomain' ),
		'update_item'       => __( 'Update Article Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Article Category', 'textdomain' ),
		'new_item_name'     => __( 'New Article Name', 'textdomain' ),
		'menu_name'         => __( 'Article Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'public'            => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'article' ),
	);

	register_taxonomy('article', array( 'article' ), $args);

// creates non-hierarchical tags for articles
	$labels = array(
		'name'              				 => _x( 'Article Tags', 'taxonomy general name', 'textdomain' ),
		'singular_name'    					 => _x( 'Article Tag', 'taxonomy singular name', 'textdomain' ),
		'search_items'     					 => __( 'Search Article Tags', 'textdomain' ),
		'all_items'        					 => __( 'All Article Tags', 'textdomain' ),
		'parent_item'      					 => null,
		'parent_item_colon'					 => null,
		'edit_item'        					 => __( 'Edit Article Tags', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate tags with commas' ),
		'add_or_remove_items'				 => __( 'Add or remove Tags' ),
		'choose_from_most_used'			 => __( 'Choose from most used Tags'),
		'update_item'      					 => __( 'Update Article Tags', 'textdomain' ),
		'add_new_item'     					 => __( 'Add New Article Tag', 'textdomain' ),
		'new_item_name'     				 => __( 'New Article Name', 'textdomain' ),
		'not_found'									 => __( 'No tags found'),
		'menu_name'        					 => __( 'Article Tags', 'textdomain' ),
	);

	$args = array(
		'hierarchical'     		  => false,
		'labels'           		  => $labels,
		'show_ui'          		  => true,
		'public'           		  => true,
		'show_admin_column' 		=> true,
		'update_count_callback'	=> '_update_post_term_count',
		'query_var'       		  => true,
		'rewrite'          		  => array( 'slug' => 'tag' ),
	);

	register_taxonomy('tag', array( 'article' ), $args);
}
/*************************************/
/* Runs custom taxonomy for articles */
/*************************************/
add_action( 'init', 'article_init', 0 );
