<?php

// 
//  Include Files
//
include(ABSPATH . '/wp-content/themes/portfolio/includes/extensions/music-player/post-type.php');
include(ABSPATH . '/wp-content/themes/portfolio/includes/extensions/music-player/ajax.php');


//
//  Theme Page Registration & Rendering
//
add_action( 'admin_menu', 'discography_page_register' );
function discography_page_register()
{
    add_menu_page(
        'Audio Player',     // page title
        'Audio Player',     // menu title
        'manage_options',   // capability
        'audio-player',     // menu slug
        'discography_page_render' // callback function
    );
}

function discography_page_render()
{
    global $title;

    $albums = get_posts(array('post_type'=>'album','posts_per_page'=>-1));
    $album_id = filter_input(INPUT_GET, 'album_id', FILTER_VALIDATE_INT);

    ?>

<div class="container pull-left">
    <h3><?php echo $title; ?></h3>
    <hr>


    <!-- No Current Album -->
    <?php if (!isset($album_id)) { ?>
    <form name="new_album" id="new_album" class="">
        <nav class="navbar navbar-inverse" style="padding: 11px; color: white;">
        <div class="row">
            <div class="col-md-3">
                <label>Album Title</label>
                <input type="text" name="album_title"/>
            </div>
            <div class="col-md-3">
                <label>Release Date</label>
                <input type="text" name="album_date"/>
            </div>
            <div class="col-md-3">
                <label>Liner Text</label>
                <textarea name="album_content" id="album_content"></textarea>
                <input type="hidden" name="album_photo" id="album_photo"/>
                <button wp-upload="#album_photo" class="btn btn-default navbar-btn btn-xs" type="button">Upload Photo</button>
                <button id="save" class="btn btn-default navbar-btn btn-xs" type="button">Save Album</button>
            </div>
        </div>
        </nav>
    </form>
    <?php } unset($album); ?>

    <?php if (isset($albums)) { ?>

    <!-- Albums -->
    <h4>Albums</h4>
    <nav class="navbar navbar-inverse album-container">

        <?php foreach($albums as $album) { ?>

            <?php 
                $meta = get_post_meta($album->ID); 
                $active = ($album_id == $album->ID) ? 'active' : '';
            ?>
            <div class="album-single pull-left <?php echo $active; ?>" 
                album-id="<?php echo $album->ID;?>">

                <img src="<?php echo $meta["album_image"][0]; ?>"/>
                <span class="title"><?php echo $album->post_title;?></span>
                <span class="date"><?php echo $meta["album_date"][0]; ?></span>
                <a class="btn btn-inverse btn-xs" href="?page=audio-player&album_id=<?php echo $album->ID;?>">Edit</a>
                <button id="delete_album" class="btn btn-danger btn-xs" type="button">Delete</button>

            </div>
        <?php } ?>
    </nav>

    <?php } ?>

    <?php if (isset($album_id)) { 

        $current_album = get_post($album_id);
        $album_meta = get_post_meta($album_id);
        $album_tracks = json_decode($album_meta["track_data"][0]);

        //var_dump($current_album);
        //var_dump($album_meta);
        //var_dump($album_tracks);
        //var_dump($album_id);

        ?>
        
        <h4>Edit Album <?php echo $current_album->post_title; ?></h4>
        <div class="album-edit-container" album-id="<?php echo $album_id; ?>">

        <nav class="navbar navbar-inverse track-meta">
            <div class="track-header">Album Information</div>
            <div class="clearfix">
                <div class="col-md-3 form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" id="update_album_title" name="album_title" value="<?php echo $current_album->post_title; ?>"/>
                    <label>Release Date</label>
                    <input class="form-control" type="text" id="update_album_date" name="album_date" value="<?php echo $album_meta["album_date"][0]; ?>"/>

                    <label>Album Image</label>
                    <img id="update_album_photo_img" src="<?php echo $album_meta["album_image"][0]; ?>" width="150" height="auto"/>
                    <input type="hidden" name="album_photo" id="update_album_photo" value="<?php echo $album_meta["album_image"][0]; ?>"/>
                    <button wp-upload="#update_album_photo" wp-upload-img="#update_album_photo_img" class="btn btn-default navbar-btn btn-xs" type="button">Change Photo</button>
                </div>
                <div class="col-md-9 form-group">
                    <label>Liner Text</label>
                    <textarea class="form-control" name="album_content" id="update_album_content" value="" rows="10"><?php echo $current_album->post_content; ?></textarea>

                </div>
            </div>


            <div class="save-control clearfix">
                <button class="btn btn-success btn-lg" id="update_album">Save Changes</button>
            </div>
        </nav>

        <nav class="navbar navbar-inverse track-container">
            <div class="track-header">
                Tracks
            </div>
            <div class="tracks-sortable">

            <?php foreach($album_tracks as $index=>$track) { ?>
                <div class="track-single">
                    <div class="form-inline">
                        <div class="form-group">
                            <button class="remove-track icon-btn"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                        </div>
                        <div class="form-group">
                            <span class="title"><?php echo $index+1 . '. '.$track->title; ?></span>
                        </div>
                        <div class="form-group">
                            <span class="url"></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>

            <div class="track-single track-add">
                <div class="form-inline">
                    <div class="form-group">
                        <button class="add-track icon-btn">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="track_title" placeholder="Track Title">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="track_url"/>
                        <button wp-upload="#track_url" class="btn btn-default navbar-btn btn-xs" type="button">Upload Track</button>
                    </div>
                </div>

            </div>

            <div class="save-control">
                <button class="btn btn-success btn-lg" id="save_tracks">Save Tracks</button>
            </div>

        </nav>

        </div>

    <?php } ?>


</div>

<style type="text/css">
    .album-edit-container {color: white;}
    .album-edit-container .track-header {padding: 11px; font-size: .8em; text-transform: uppercase;}
    .album-edit-container .track-single {}
    .album-edit-container .track-single:not(:last-child),
    .album-edit-container .track-header {border-bottom: 1px solid rgba(255,255,255,.3);}
    .album-edit-container .track-single:hover {background: rgba(255,255,255,.05);}

    .save-control {padding: 11px;}

    .album-container {
        padding: 11px;}
    .album-single {
        max-width: 150px;
        color: white;
        margin-right: 11px;
        padding: 11px;
        border-radius: 7px;
        background: rgba(255,255,255,.3);
        transition: background, ease, 0.15s;
        -webkit-transition: background,ease,0.15s;
        -moz-transition: background, ease, 0.15s;}
    .album-single:hover {
        background: rgba(255,255,255,.45);}
    .album-single.active {border: 3px solid #de6b15;}
    .album-single img {width: 100%; height: auto;}
    .album-single span {
        display: inline-block;
        width: 100%;}
    .album-single span.title {text-transform: uppercase; font-weight: bold;}
    .album-single span.date {font-size: .8em; color: #dedede;}

    .icon-btn {font-size: 2em; font-weight: bold; background: transparent; border: none; padding: 0 .5em;}
</style>


<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/theme/flat-ui/dist/css/vendor/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/theme/flat-ui/dist/css/flat-ui.min.css"><!-- 
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/theme/flat-ui/dist/js/flat-ui.min.js"> 
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/jquery-ui/dist/jquery-ui.min.js">-->

<?php }


?>