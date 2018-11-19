<?php
/**
 * Changes to left and top admin bar in wordpress.
 *
 * @package understrap
 */

//adds expert fields to pages (already default for posts and custom posts)
add_post_type_support( 'page', 'excerpt' );

//determines order of left admin bar icons in wordpress dashboard
function custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;

     return array(
         'index.php',                  // Dashboard
         'CiviCRM',                    // CiviCRM
         'upload.php',                 // Media
         'separator1',                 // First separator
         'edit.php?post_type=page',    // Pages
         'edit.php',                   // Posts
         'edit.php?post_type=albums',  // Albums
         'edit.php?post_type=articles',// Articles
         'edit.php?post_type=artists', // Artists
         'edit.php?post_type=bios',    // Bios
         'separator2',                 // Second separator
         'themes.php',                 // Appearance
         'plugins.php',                // Plugins
         'options-general.php',        // Settings
         'tools.php',                  // Tools
         'users.php',                  // Users
         'separator-last',             // Last separator
     );
 }
 add_filter('custom_menu_order', 'custom_menu_order');
 add_filter('menu_order', 'custom_menu_order');

//removes items from left admin bar for ALL USERS
function remove_left_menus() {
remove_menu_page( 'edit-comments.php' );          // Comments
}
add_action( 'admin_menu', 'remove_left_menus' );

//removes items from top admin bar for ALL USERS
function remove_top_menus() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');       // Comments
  $wp_admin_bar->remove_menu('wp-logo');        // Wordpress Home
 }
 add_action( 'wp_before_admin_bar_render', 'remove_top_menus' );

//removes items from left admin bar for NON-ADMINS
function remove_left_menu_items() {
  if( !current_user_can( 'administrator' ) ):
    remove_menu_page( 'edit.php?post_type=bios' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'profile.php' );
    remove_menu_page( 'edit.php' );
    endif;
}
add_action( 'admin_menu', 'remove_left_menu_items' );

//removes items from top admin bar for NON-ADMINS
function remove_top_menu_items() {
  global $wp_admin_bar;
  if( !current_user_can( 'administrator' ) ):
    $wp_admin_bar->remove_menu('my-account');     // My account
    $wp_admin_bar->remove_menu('new-content');    // + New item
  endif;
}
add_action( 'wp_before_admin_bar_render', 'remove_top_menu_items' );

//remove dashboard widgets for NON-ADMINS
function remove_dashboard_meta() {
	if( !current_user_can( 'administrator' ) ):
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' ); //wordpress news
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); //quick draft
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); //at a glance
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); //activity
  endif;
}
add_action( 'admin_init', 'remove_dashboard_meta' );
