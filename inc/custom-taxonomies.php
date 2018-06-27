<?php
/**       Custom posts setup        **/

// Creates custom taxonomy for bios
function bios_init() {
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
	  'has_archive'				=> true,
		'rewrite'           => array( 'slug' => 'bio', 'with_front' => false),
	);

	register_taxonomy('bio', array( 'bios' ), $args);
}

// Runs custom taxonomy for bios
add_action( 'init', 'bios_init' );

// Creates custom taxonomy for articles
// Creates hierarchical categories for articles
function articles_init() {
	$labels = array(
		'name'              => _x( 'Article Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Article Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Article Categories', 'textdomain' ),
		'all_items'         => __( 'All Article Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Article Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Article Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Article Category', 'textdomain' ),
		'update_item'       => __( 'Update Article Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Article Category', 'textdomain' ),
		'new_item_name'     => __( 'New Article Category', 'textdomain' ),
		'menu_name'         => __( 'Article Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
	  'show_in_nav_menus' => true,
		'show_ui'           => true,
		'public'            => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'has_archive'				=> true,
		'rewrite'           => array( 'slug' => 'article', 'with_front' => false),
	);

	register_taxonomy('article', array( 'articles' ), $args);

// Creates non-hierarchical tags for articles
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

	register_taxonomy('tag', array( 'articles' ), $args);
}

// Runs custom taxonomy for articles
add_action( 'init', 'articles_init', 0 );
