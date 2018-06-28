<?php
/**       Custom posts setup        **/

// Creates custom post type Albums
add_action( 'init', 'codex_albums_init' );

function codex_albums_init() {
	$labels = array(
		'name'               => _x( 'Albums', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Album', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Albums', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Album', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Album', 'album', 'your-plugin-textdomain' ),
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
    'menu_icon'          => 'dashicons-album',
		'public'             => true,
		'delete_with_user'   => false,
    'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
    'rewrite'            => array( 'slug' => 'albums', 'with_front' => false ),
	  'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'post-formats'),
	);

	add_filter( 'enter_title_here', function( $title ) {
      $screen = get_current_screen();

      if  ( 'albums' == $screen->post_type ) {
          $title = 'Enter album name';
      }

      return $title;
  } );

	register_post_type( 'albums', $args );
}

// Creates custom post type Articles
add_action( 'init', 'codex_articles_init' );

function codex_articles_init() {
	$labels = array(
		'name'               => _x( 'Articles', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Article', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Articles', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Article', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Article', 'article', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Article', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Article', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Article', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Article', 'your-plugin-textdomain' ),
    'view_items'         => __( 'View Articles', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Articles', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Articles', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Articles:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No articles found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No articles found in Trash.', 'your-plugin-textdomain' ),
    'featured_image'     => __( 'Featured Article Image', 'your-plugin-textdomain' ),
    'set_featured_image' => __( 'Set Image', 'your-plugin-textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
    'menu_icon'          => 'dashicons-format-aside',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'						 => true,
    'delete_with_user'   => false,
    'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
    'rewrite'            => array('slug' => 'articles', 'with_front' => false ),
	  'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
	);

  add_filter( 'enter_title_here', function( $title ) {
      $screen = get_current_screen();

      if  ( 'articles' == $screen->post_type ) {
          $title = 'Enter article name';
      }

      return $title;
  } );

	register_post_type( 'articles', $args );
}

// Creates custom post type Artists
add_action( 'init', 'codex_artists_init' );

function codex_artists_init() {
	$labels = array(
		'name'               => _x( 'Artists', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Artist', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Artists', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Artist', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Artist', 'artist', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Artist', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Artist', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Artist', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Artist', 'your-plugin-textdomain' ),
    'view_items'         => __( 'View Artists', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Artists', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Artists', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Artists:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No artists found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No artists found in Trash.', 'your-plugin-textdomain' )
	);


	$args = array(
		'labels'             => $labels,
    'menu_icon'          => 'dashicons-universal-access-alt',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'artists' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'artists', $args );
}

// Creates custom post type Bios
add_action( 'init', 'codex_bios_init' );

function codex_bios_init() {
	$labels = array(
		'name'               => _x( 'Bios', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Bio', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Bios', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Bio', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Bio', 'bio', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Bio', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Bio', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Bio', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Bio', 'your-plugin-textdomain' ),
    'view_items'         => __( 'View Bios', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Bios', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Bios', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Bios:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No bios found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No bios found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
    'menu_icon'          => 'dashicons-groups',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'bios', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => 5,
    'taxonomies'         => array( 'bios'),
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'bios', $args );
}
