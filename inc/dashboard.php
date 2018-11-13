<?php

/* Adds widgets to the wordpress dashboard */
function mc_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'welcome',                                // Widget slug.
                 'Authors: Getting Started',               // Title.
                 'welcome_dashboard_widget'                // Display function.
        );
  wp_add_dashboard_widget(
                 'current-contributors',                   // Widget slug.
                 'Current Contributors',                   // Title.
                 'current_contributors_dashboard_widget'   // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'mc_dashboard_widgets' );

// Author Welcome Widget
function welcome_dashboard_widget() {
  echo "Welcome to The Muse Collaborative's author dashboard.  Put more instructions here for future users. <br>
  <a href='https://join.slack.com/t/themusecollaborative/shared_invite/enQtNDgwMjM4NjQxNTEwLTk3NzIwOWRmM2MwYmEzNWNlM2RlYWUwMTFkNWYxM2Y0MDI0MzY2MWY1YjU1MTg3N2NmMjIwNGZlMTc0MGZmZmI'>Slack Channel</a>
  If you have questions, email <a href='mailto:michael@themusecollaborative.org'>michael@themusecollaborative.org</a>";
}

// Current Contributors Widget
function current_contributors_dashboard_widget() {
  echo do_shortcode( '[display-posts post_type="bios" taxonomy="bio" tax_term="authors" posts_per_page="0" include_content="false" order="ASC" orderby="title"]' );
}
