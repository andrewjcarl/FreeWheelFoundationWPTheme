<?php 
//
//	POST TYPE TEMPLATE FILE
//
//  ** remember to update functions.php if you change the filename
//

function featured_neighborhoods_post_type() {
$url = get_stylesheet_directory_uri();

  $labels = array(
    'name'               => 'Neighborhoods',
    'singular_name'      => 'Neighborhood',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Neighborhood',
    'edit_item'          => 'Edit Neighborhood',
    'new_item'           => 'New Neighborhood',
    'all_items'          => 'All Neighborhoods',
    'view_item'          => 'View Neighborhood',
    'search_items'       => 'Search Neighborhoods',
    'not_found'          => 'No neighborhoods found',
    'not_found_in_trash' => 'No neighborhoods found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Neighborhoods'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'neighborhood' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail' )
  );

  register_post_type( 'neighborhood', $args );
}
add_action( 'init', 'featured_neighborhoods_post_type' );

