<?php
/**       Custom posts & taxonomies setup        **/


/************************************/
/* Creates custom taxonomy for bios */
/************************************/
function bio_init() {
	register_taxonomy('bio-type', 'bio',
		array(
			'label'                 => __( 'Bio Categories' ),
      'hierarchical'          => true,
      'show_ui'               => true,
      'public'                => true,
      'show_admin_column'     => true,
			'rewrite'               => array( 'slug' => 'Bioslabel2' ),
			'capabilities'          => array(
			'assign_terms'          => 'edit_guides',
			'edit_terms'            => 'publish_guides'
			)
		)
	);
}

/************************************/
/* Runs custom taxonomy for bios */
/************************************/
add_action( 'init', 'bio_init' );


/*************************************/
/* Creates custom post type 'Album'  */
/*************************************/

add_action( 'init', 'codex_album_init' );

function codex_album_init() {
	$labels = array(
		'name'               => _x( 'Albums', 'post type general name', 'your-plugin-textdomain' ),   //Don't know if I need anything other than the first string
		'singular_name'      => _x( 'Album', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Albums', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Album', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'album', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Album', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Album', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Album', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Album', 'your-plugin-textdomain' ),
    'view_items'         => __( 'View Albums', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Albums', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Albums', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Albums:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No albums found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No albums found in Trash.', 'your-plugin-textdomain' ),
    'featured_image'     => __( 'Album cover', 'your-plugin-textdomain' ),
    'set_featured_image' => __( 'Set Album cover', 'your-plugin-textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Insert description here!.', 'your-plugin-textdomain' ),     // Don't know
    'menu_icon'          => 'dashicons-album',                                  // Sets icon in wordpress ui
		'public'             => true,                                               // Makes post searchable, displays in wordpress ui
    'delete_with_user'   => false,                                              // If author is deleted, post are not deleted if set to false
    'query_var'          => true,                                               // "If set to true it allows you to request a custom posts type (book) using this: example.com/?book=life-of-pi"
		'capability_type'    => 'post',                                             // Don't understand
		'has_archive'        => true,                                               // Don't know
    'rewrite'            => array( 'slug' => 'albums'),                         // Changes archive page URL
	  'hierarchical'       => false,                                              // Don't know
		'menu_position'      => 5,                                                  // Sets order in wordpress ui
//    'taxonomies'         => array( 'post_tag', 'category'),                  // Creates category-like subdivisions -- needs to be added to register_taxonomy()
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'post-formats'),    // Fields enabled on the edit page
	);

  add_filter( 'enter_title_here', function( $title ) {                          // Changes tool-tip for Album title
      $screen = get_current_screen();

      if  ( 'album' == $screen->post_type ) {
          $title = 'Enter album name';
      }

      return $title;
  } );

	register_post_type( 'album', $args );
}

/*************************************/
/* Creates custom post type 'Artist'  */
/*************************************/

add_action( 'init', 'codex_artist_init' );

function codex_artist_init() {
	$labels = array(
		'name'               => _x( 'Artists', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Artist', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Artists', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Artist', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'artist', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Artist', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Artist', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Artist', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Artist', 'your-plugin-textdomain' ),
    'view_items'          => __( 'View Artists', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Artists', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Artists', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Artists:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No artists found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No artists found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),     // Don't know
    'menu_icon'          => 'dashicons-universal-access-alt',                    // Sets icon in wordpress menu
		'public'             => true,                                               // Don't know
		'publicly_queryable' => true,                                               // Don't know
		'show_ui'            => true,                                               // Don't know
		'show_in_menu'       => true,                                               // Don't know
		'query_var'          => true,                                               // Don't know
		'rewrite'            => array( 'slug' => 'artist' ),                         // Don't know
		'capability_type'    => 'post',                                             // Don't know
		'has_archive'        => true,                                               // Don't know
		'hierarchical'       => false,                                              // Sets order in wordpress menu
		'menu_position'      => 5,                                                  // Don't know
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')    // Don't know
	);

	register_post_type( 'artist', $args );
}

/*************************************/
/* Creates custom post type 'Bio'  */
/*************************************/

add_action( 'init', 'codex_bio_init' );

function codex_bio_init() {
	$labels = array(
		'name'               => _x( 'Bios', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Bio', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Bios', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Bio', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'bio', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Bio', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Bio', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Bio', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Bio', 'your-plugin-textdomain' ),
    'view_items'          => __( 'View Bios', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Bios', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Bios', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Bios:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No bios found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No bios found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),     // Don't know
    'menu_icon'          => 'dashicons-groups',                                 // Sets icon in wordpress menu
		'public'             => true,                                               // Don't know
		'publicly_queryable' => true,                                               // Don't know
		'show_ui'            => true,                                               // Don't know
		'show_in_menu'       => true,                                               // Don't know
		'query_var'          => true,                                               // Don't know
		'rewrite'            => array( 'slug' => 'album' ),                         // Don't know
		'capability_type'    => 'post',                                             // Don't know
		'has_archive'        => true,                                               // Don't know
		'hierarchical'       => true,                                              // Sets order in wordpress menu
		'menu_position'      => 5,                                                  // Don't know
    'taxonomies'         => array( 'bios'),                  // Creates category-like subdivisions -- needs to be added to register_taxonomy()
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail')    // Don't know
	);

	register_post_type( 'bio', $args );
}
