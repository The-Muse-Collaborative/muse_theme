<?php

/* Adds widgets to the wordpress dashboard */
function mc_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'welcome',                        // Widget slug.
                 'Authors: Getting Started',       // Title.
                 'welcome_dashboard_widget'        // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'mc_dashboard_widgets' );

// Content of the welcome widget
function welcome_dashboard_widget() {

  echo "Welcome to The Muse Collaborative's author dashboard.  Put more instructions here for future users.  These details are in dashboard.php.  If you have questions, email info@themusecollaborative.org.  Figure out how to make that email a link";
}
