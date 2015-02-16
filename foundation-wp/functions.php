<?php

//
//	Bootstrap Child Theme Functions
//	@author	Andrew Carl
//	@date	April 2014
//

include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-options.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-options-helper.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-shortcode.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-sidebar.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-widget.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-menu.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/theme-hooks.php');

//  Theme Extensions
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/extensions/contentblock.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/extensions/causes.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/extensions/logo-block.php');
include(ABSPATH . '/wp-content/themes/foundation-wp/includes/extensions/video-block.php');

function childtheme_scripts() {

  //  Frontend CSS
  wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/css/main.css' );
  wp_enqueue_style('icomoon-font', get_stylesheet_directory_uri() . '/assets/fonts/icomoon/style.css');

	//	Frontend javascript
  wp_enqueue_script('script2', get_stylesheet_directory_uri() . '/assets/js/app/car/jquery-1.7.2.min.js', array('jquery'));
  wp_enqueue_script('script3', get_stylesheet_directory_uri() . '/assets/js/app/car/jquery.easing.1.3.js', array('jquery'));
  wp_enqueue_script('script4', get_stylesheet_directory_uri() . '/assets/js/app/car/custom.js', array('jquery'));
  wp_enqueue_script('script5', get_stylesheet_directory_uri() . '/assets/js/app/ticker.js', array('jquery'));
  wp_enqueue_script('script6', get_stylesheet_directory_uri() . '/assets/js/app/jquery.common.min.js', array('jquery'));
  wp_enqueue_script('script1', get_stylesheet_directory_uri() . '/assets/js/app/menu_jquery.js', array('jquery'));
/*
  wp_enqueue_script('app-js', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'));
  wp_enqueue_script('vendor-js', get_stylesheet_directory_uri() . '/assets/js/vendor.js', array('jquery'));
*/
} add_action('wp_enqueue_scripts','childtheme_scripts'); 



//	Remove appending version numbers 
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src . '?ver=' . rand(0,1000);
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );



//	Add post thumbnails
add_theme_support( 'post-thumbnails' ); 

//  Custom Thumbnail sizes
add_image_size( 'homepage-causes', 220, 180, true );



//  Remove WPAutoP
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


//
//	HTML Additions
//

?>