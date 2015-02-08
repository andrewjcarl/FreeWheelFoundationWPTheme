<?php
//
//	SIDEBAR SCRIPTS 
//  @author AC
//  @date   10/13/13
//

//
// This function accepts two inputs, a sidebar ID, and a fallback sidebar.
// See the default_sidebar() function for accepted fallback inputs. 
// The ID should be from the registered sidebars below, or from a custom sidebar
//

function sidebar_display( $id, $fallback=null ) {
    if ( is_active_sidebar( $id ) && is_dynamic_sidebar( $id )) {
      echo '<div class="sidebar" id="' . $id . '">';
      dynamic_sidebar( $id ); 
      echo '</div>';
      return true;
    } elseif ( isset( $fallback ) ) {
      default_sidebar( $fallback );
      return false;
    } 
}

function default_sidebar( $input ) {
  switch ($input) {
    case "home-widget":
      echo '<div class="sidebar" id="default-widget">
              <li id="text-2" class="widget widget_text">
                <div id="widget-title">Default Title</div>
                <div class="textwidget">
                Donec viverra faucibus erat ac hendrerit. Donec pulvinar ultrices accumsan. Vivamus ac sodales urna, quis rutrum enim. Nam commodo, tellus ut laoreet luctus, magna elit mollis libero, ac ultricies mi mi quis lorem. 
                </div>
              </li>
            </div>';
    break;
  }
}

//
//  DEFAULT SIDEBAR
//

register_sidebar(array(
  'name' => __( 'Default Sidebar' ),
  'id' => 'd-widget-1',
  'description' => __( 'This is the default sidebar area for all page templates' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

//
//  PAGE SIDEBARS
//

register_sidebar(array(
  'name' => __( 'Left Page Sidebar' ),
  'id' => 'left-sidebar',
  'description' => __( 'Widgets in this area will on all Left Page Templates' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

//
//  HOME SIDEBARS
//
//  @notes  registers 3 home page widget sections
//

register_sidebar(array(
  'name' => __( 'Home Widget 1' ),
  'id' => 'h-widget-1',
  'description' => __( 'Widgets in this area will appear on the left-most section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

register_sidebar(array(
  'name' => __( 'Home Widget 2' ),
  'id' => 'h-widget-2',
  'description' => __( 'Widgets in this area will appear on the middle-left section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

register_sidebar(array(
  'name' => __( 'Home Widget 3' ),
  'id' => 'h-widget-3',
  'description' => __( 'Widgets in this area will appear on the middle-right section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

//
//	FOOTER SIDEBARS
//
//  @notes registers 4 footer sidebar areas
//

register_sidebar(array(
  'name' => __( 'Footer Widget 1' ),
  'id' => 'f-widget-1',
  'description' => __( 'Widgets in this area will appear on the left-most section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

register_sidebar(array(
  'name' => __( 'Footer Widget 2' ),
  'id' => 'f-widget-2',
  'description' => __( 'Widgets in this area will appear on the middle-left section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

register_sidebar(array(
  'name' => __( 'Footer Widget 3' ),
  'id' => 'f-widget-3',
  'description' => __( 'Widgets in this area will appear on the middle-right section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));

register_sidebar(array(
  'name' => __( 'Footer Widget 4' ),
  'id' => 'f-widget-4',
  'description' => __( 'Widgets in this area will appear on the right-most section of the footer' ),
  'before_title' => '<div id="widget-title">',
  'after_title' => '</div>'
));


?>