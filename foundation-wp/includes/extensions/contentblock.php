<?php
//
//	Content Block Theme Extension
//	@created 	4/3/2014
//	@last 		4/3/2014
//
//	@components
//	custom post type
//	meta fields options
//	shortcode
//	widget option
//	post column shortcode display
//  content block style options

//
//	@Creating the Custom Post Type
//	@uses register_post_type
//

function contentblock_cpt_make() {

  $labels = array(
    'name'               => 'Content Blocks',
    'singular_name'      => 'Content Block',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Content Block',
    'edit_item'          => 'Edit Content Block',
    'new_item'           => 'New Content Block',
    'all_items'          => 'All Content Blocks',
    'view_item'          => 'View Content Block',
    'search_items'       => 'Search Content Blocks',
    'not_found'          => 'No Content Blocks found',
    'not_found_in_trash' => 'No Content Blocks found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Content Blocks'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => false,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'thumbnail', 'editor' )
  );

  register_post_type( 'content-block', $args );
}
add_action( 'init', 'contentblock_cpt_make' );

//
//	@Content Block Meta Fields
//



//
//	@Content Block Shortcode
//

function contentblock_shortcode_make( $atts, $content="") {
	extract( shortcode_atts( array (
		'id'	=>	'',
        'class' =>  '',
        'title' =>  'no'
	), $atts ) );

	$block     =   get_post($id);

    $title = ($title == 'yes') ? '<div class="content-block-title">'.$block->post_title.'</div>' : '';

    $r .=   '<section id="'.$id.'" class="content-block '.$class.'">';
    $r .=   $title;
    $r .=   do_shortcode($block->post_content);
    $r .=   '</section>';

    return $r;
}
add_shortcode('content-block','contentblock_shortcode_make');

//
//	@Post Column Shortcode Display
//
//	@filter manage_posts_columns
//	@action manage_posts_custom_column

function contentblock_posts_column($defaults){
	if ( get_post_type() === 'content-block' ) {
	    $defaults['contentblock_shortcode_post_column'] = __('Shortcode');
	    return $defaults;
    } else { 
    	return $defaults; 
    }
}
function contentblock_custom_column($column_name, $id){
	if ( get_post_type() === 'content-block' ) {

		// Display Shortcode text
		if($column_name === 'contentblock_shortcode_post_column') {
	        echo '<span><em>[content-block id="'.$id.'"]</em></span>';
	    }

	} else { 
		return $defaults; 
	}
}
add_filter('manage_posts_columns', 'contentblock_posts_column', 10);
add_action('manage_posts_custom_column', 'contentblock_custom_column', 10, 2);