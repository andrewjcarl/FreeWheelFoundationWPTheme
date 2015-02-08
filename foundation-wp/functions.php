<?php

//
//	Bootstrap Child Theme Functions
//	@author	Andrew Carl
//	@date	April 2014
//

include(ABSPATH . '/wp-content/themes/portfolio/includes/theme-options.php');
include(ABSPATH . '/wp-content/themes/portfolio/includes/theme-shortcode.php');
include(ABSPATH . '/wp-content/themes/portfolio/includes/theme-sidebar.php');
include(ABSPATH . '/wp-content/themes/portfolio/includes/theme-widget.php');
include(ABSPATH . '/wp-content/themes/portfolio/includes/theme-menu.php');
include(ABSPATH . '/wp-content/themes/portfolio/includes/theme-hooks.php');

//  Theme Extensions
include(ABSPATH . '/wp-content/themes/portfolio/includes/extensions/contentblock.php');

function childtheme_scripts() {

  //  Frontend CSS
  wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/css/main.css' );
  wp_enqueue_style('icomoon-font', get_stylesheet_directory_uri() . '/assets/fonts/icomoon/style.css');

	//	Frontend javascript
  wp_enqueue_script('app.js', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'));
  wp_enqueue_script('vendor.js', get_stylesheet_directory_uri() . '/assets/js/vendor.js', array('jquery'));

} add_action('wp_enqueue_scripts','childtheme_scripts'); 




//
//	HTML Additions
//

?>