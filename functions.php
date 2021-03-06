<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/** Initialize theme default settings **/
require get_template_directory() . '/inc/theme-settings.php';

/** Initialize custom post settings **/
require get_template_directory() . '/inc/custom-posts.php';

/** Initialize custom post settings **/
require get_template_directory() . '/inc/custom-taxonomies.php';

/** Theme setup and custom theme supports. **/
require get_template_directory() . '/inc/setup.php';

/** Register widget area. **/
require get_template_directory() . '/inc/widgets.php';

/** Enqueue scripts and styles. **/
require get_template_directory() . '/inc/enqueue.php';

/** Custom template tags for this theme. **/
require get_template_directory() . '/inc/template-tags.php';

/** Custom template tags for this theme. **/
require get_template_directory() . '/inc/pagination.php';

/** Custom functions that act independently of the theme templates. **/
require get_template_directory() . '/inc/extras.php';

/** Customizer additions. **/
require get_template_directory() . '/inc/customizer.php';

/** Custom Comments file. **/
require get_template_directory() . '/inc/custom-comments.php';

/** Load Jetpack compatibility file. **/
require get_template_directory() . '/inc/jetpack.php';

/** Load custom WordPress nav walker. **/
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/** Load WooCommerce functions. **/
require get_template_directory() . '/inc/woocommerce.php';

/** Load Editor functions. **/
require get_template_directory() . '/inc/editor.php';

/** Load wp-admin bar changes **/
require get_template_directory() . '/inc/admin-bar.php';

/** Load author url changes **/
require get_template_directory() . '/inc/author-urls.php';

/** Load excerpt changes **/
require get_template_directory() . '/inc/excerpts.php';

/** Load search function changes **/
require get_template_directory() . '/inc/search.php';

/** Load search function changes **/
require get_template_directory() . '/inc/dashboard.php';

/** Load wordpress login function changes **/
require get_template_directory() . '/inc/login.php';

/** CURRENTLY INACTIVE FUNCTIONS **/

/** Load custom file-types for media folder. **/
//require get_template_directory() . '/inc/custom-media-files.php';
