<?php

//
//  Register Song Post Type
function register_discography_song_cpt() {
$url = get_stylesheet_directory_uri();

  $labels = array(
    'name'               => 'Songs',
    'singular_name'      => 'Song',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Song',
    'edit_item'          => 'Edit Song',
    'new_item'           => 'New Song',
    'all_items'          => 'All Songs',
    'view_item'          => 'View Song',
    'search_items'       => 'Search Songs',
    'not_found'          => 'No Songs found',
    'not_found_in_trash' => 'No Songs found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Songs'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail' )
  );

  register_post_type( 'song', $args );
}
add_action( 'init', 'register_discography_song_cpt' );

//
//  Register Album Post Type
function register_discography_album_cpt() {
$url = get_stylesheet_directory_uri();

  $labels = array(
    'name'               => 'Album',
    'singular_name'      => 'Song',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Song',
    'edit_item'          => 'Edit Song',
    'new_item'           => 'New Song',
    'all_items'          => 'All Album',
    'view_item'          => 'View Song',
    'search_items'       => 'Search Album',
    'not_found'          => 'No Album found',
    'not_found_in_trash' => 'No Album found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Album'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail' )
  );


  register_post_type( 'album', $args );
}
add_action( 'init', 'register_discography_album_cpt' );

?>