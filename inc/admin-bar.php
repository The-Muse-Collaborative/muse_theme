<?php
/**
 * Changes to left and top admin bar in wordpress.
 *
 * @package understrap
 */

//removes icon from left admin bar
 function remove_left_menus(){

   remove_menu_page( 'edit-comments.php' );          // Comments
   remove_menu_page( 'themes.php' );                 // Appearance

 }
 add_action( 'admin_menu', 'remove_left_menus' );

//removes icon from top admin bar
 function remove_top_menues(){
         global $wp_admin_bar;
         $wp_admin_bar->remove_menu('comments');       // Comments
         $wp_admin_bar->remove_menu('wp-logo');        // Wordpress Home
 }
 add_action( 'wp_before_admin_bar_render', 'remove_top_menues' );

//determines order of left admin bar icons
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
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');
