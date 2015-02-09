<?php 
//
//	POST TYPE TEMPLATE FILE
//
//  ** remember to update functions.php if you change the filename
//

function casuses_cpt() {
    $url = get_stylesheet_directory_uri();

    $labels = array(
        'name'               => 'Causes',
        'singular_name'      => 'Cause',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Cause',
        'edit_item'          => 'Edit cause',
        'new_item'           => 'New cause',
        'all_items'          => 'All causes',
        'view_item'          => 'View cause',
        'search_items'       => 'Search causes',
        'not_found'          => 'No causes found',
        'not_found_in_trash' => 'No causes found in Trash',
        'parent_item_colon'  => '',
        'menu_name'          => 'Causes'
        );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cause' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt' )
        );

    register_post_type( 'cause', $args );
}
add_action( 'init', 'casuses_cpt' );


function causes_cpt_postmeta_wrapper() {

    $screens = array( 'cause' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'causes_cpt_postmeta_box_fields',
            __( 'Post Meta Section', 'foundation-wp' ),
            'causes_cpt_postmeta_box_fields',
            $screen
            );
    }
}
add_action( 'add_meta_boxes', 'causes_cpt_postmeta_wrapper' );


//
//  Function Creating the Meta Section
//

function causes_cpt_postmeta_box_fields($post) {

//  Individual non-array post meta fetch
    $status     = get_post_meta( $post->ID, '$id', TRUE); 

// Post Meta array fetch
    $post_meta  = maybe_unserialize(get_post_meta($post->ID, 'post_meta', FALSE));


    ?>


    <div class="page-meta-container">
        <header class="table-header">Cause Meta Header</header>

        <table>
            <tbody>
                <tr>
                    <td>Cause Title</td>
                    <td>
                        <input type="text" size="15" id="post_meta[title]" name="post_meta[title]" value="<?php echo $post_meta[0]["title"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <input type="text" size="15" id="post_meta[description]" name="post_meta[description]" value="<?php echo $post_meta[0]["description"]; ?>">
                    </td>
                </tr>
                <tr>    
                    <td>Total Amount</td>
                    <td>
                        <input type="text" size="15" id="post_meta[total_amount]" name="post_meta[total_amount]" value="<?php echo $post_meta[0]["total_amount"]; ?>">
                    </td>
                </tr>
                <tr>    
                    <td>Donation Link</td>
                    <td>
                        <input type="text" size="15" id="post_meta[donation_link]" name="post_meta[donation_link]" value="<?php echo $post_meta[0]["donation_link"]; ?>">
                    </td>
                </tr>
            </tbody>
        </table>

    </div>


    <?php } 

//
//  Function Saving all Home Meta Information
//

    function post_meta_save($post_id) {

     if ( !wp_is_post_revision( $post_ID ) ) {

    // Save post_meta post array
        if (isset( $_POST['post_meta'] )) {
           update_post_meta( $post_id, 'post_meta', $_POST['post_meta']);
       }
   }

}
add_action('save_post','post_meta_save');



function causes_cpt_shortcode_display( $atts, $content="") {
    extract( shortcode_atts( array (
        'count'    =>  8,
        'class' =>  '',
        'title' =>  'Our Causes',
        'byline' => 'Sample text here'
    ), $atts ) );

    $args = array( 'posts_per_page' => $count, 'post_type' => 'cause' );

    $posts = get_posts( $args );


    $return = "";

    $return .= '
    <div class="container">
        <div class="sixteen columns services_div">
            <div class="Services_1_title_div"><h3>'.$title.'</h3></div><div class="clearfix"></div>
            <p class="services_tagline">'.$byline.'</p>
        </div>
        <div class="services_boxes">
            <div class="sixteen columns ">';

            foreach($posts as $post) {

                $return .= '
                <div class="four columns alpha services_box">
                     <img class="tile_image" src="http://placehold.it/250x150" alt="">
                     <div class="box_text_div">
                        <h3 class="box_title">
                            '.$post->post_title.'
                        </h3>
                        <p class="box_text">
                            '.$post->post_excerpt.'
                        </p>
                        <div class="tile_blue_button">
                            <a href="'.$post->guid.'">Donate Now</a>
                        </div>
                     </div>
                </div>
                <div class="sep"><div class="clearfix"></div></div>';
            }
        
        $return .= '<div class="clearfix"></div>
        <div class="seeall_div">
            <div class="seeall_button">
                <a href="causes.html">
                    <span class="pe-7s-keypad pe-2x pe-va colored"></span><span class="seeall_text">SEE ALL CAUSES</span>
                </a>
            </div>
        </div>
        </div>
        <div class="clearfix"></div>
    </div></div>';         


    return $return;
} 
add_shortcode('causes-block','causes_cpt_shortcode_display');
