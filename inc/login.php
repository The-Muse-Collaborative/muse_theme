<?php

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg);
          	background-size: 300px 300px;
          	background-position: center top;
          	background-repeat: no-repeat;
          	color: #999;
          	height: 240px;
          	font-size: 20px;
          	font-weight: normal;
          	line-height: 1.3em;
          	margin: -75px auto 25px;
          	padding: 0;
          	text-decoration: none;
          	width: 300px;
          	text-indent: -9999px;
          	outline: none;
          	overflow: hidden;
          	display: block;
        }
        #login h1 a, .login {
            background-color: #2d2a26;
            color: #c114a2;
            text-align: center;
        }

        .wp-core-ui .button-primary {
          background: #c114a2 !important;
          border-color: #c114a2 !important;
          box-shadow: none !important;
          text-shadow: none !important;
        }
        .login label {color:#c114a2 !important;}
        .login #nav a {color:#eee !important;}
        .login #backtoblog a {color:#eee !important;}

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
