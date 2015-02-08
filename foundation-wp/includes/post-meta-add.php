<?php
function post_meta_box_create() {

    $screens = array( 'post', 'page' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'post_meta_box_fields',
            __( 'Post Meta Section', 'photocrati' ),
            'post_meta_box_fields',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'post_meta_box_create' );


//
//  Function Creating the Meta Section
//

function post_meta_box_fields($post) {

//  Individual non-array post meta fetch
$status     = get_post_meta( $post->ID, '$id', TRUE); 


// Post Meta array fetch
$post_meta  = maybe_unserialize(get_post_meta($post->ID, 'post_meta', FALSE));


?>


<div class="page-meta-container">

    <header class="table-header">Page Meta Header</header>


<td>
            <input type="text" size="7" id="post_meta[id]" name="post_meta[id]" value="<?php echo $post_meta[0]["id"]; ?> ">
        </td>



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