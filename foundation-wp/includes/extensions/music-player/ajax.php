<?php

//
//  AJAX Javascipt
add_action( 'admin_footer', 'discography_ajax_js' ); 
function discography_ajax_js() { ?>
  <script type="text/javascript" >
  jQuery(document).ready(function($) {

    /*
     *  Save New Album
     =====================*/
    $('#new_album #save').click(function(e) {
      e.preventDefault();
      var form = $('#new_album'),
          container = $('.album-container'),
          fields = form.find('input'),
          data = {'action':'save_album'};

      $.each(fields, function(k,v) {
        var input = $(v)[0];
        data[input.name] = input.value;
      });

      console.log(data);

      $.post(ajaxurl,data, function(success){
        console.log(success);
        var single = container.find('.album-single').eq(0).clone();

        single.attr('album-id',success);
        single.find('img').eq(0).attr('src',data.album_photo);
        single.find('.title').eq(0).text(data.album_title);
        single.find('.date').eq(0).text(data.album_date);

        container.append(single);

        $.each(fields, function(k,v) {
          v.value('');
        });

      });
    });


    /*
     *  Delete Album
     =====================*/
    $('.album-single button#delete_album').click(function(e) {
      e.preventDefault();
      var parent = $(this).parents().eq(0),
          id = parent.attr('album-id'),
          data = {
            'action' : 'delete_album',
            'album_id' : id};

      console.log('deleting album: ' + id);

      $.post(ajaxurl,data, function(success) {
        console.log(success);
        parent.fadeOut('slow', function() {
          $(this).remove();
        });
      });
    });


    /*
     *  Update Album Tracks
     =====================*/
     $('.track-container button#save_tracks').click(function(e) {
      e.preventDefault();


     });

    /*
     *  Add/Remove Track UI
     =====================*/
     $('#save_tracks').click(function(e) {
      var parent = $(this).parents('.album-edit-container').eq(0),
          id = parent.attr('album-id'),
          data = {
            'action' : 'add_tracks',
            'album_id' : id,
            'track_data' : []
          };

       console.log(data);

      var trackContainer = $('.track-container'),
          tracks = trackContainer.find('.track-single').not('.track-add');

      //  format track data
      $.each(tracks, function(k,v) {
        console.log(v);
        var t = {
          title: $(v).find('#track_title').val(),
          url: $(v).find('#track_url').val()
        };
        console.log(t);

        data.track_data.push(t);
      });
      data.track_data = JSON.stringify(data.track_data);


      console.log(data);

      $.post(ajaxurl, data, function(success) {
        console.log(success);
      });

     });

     $('#update_album').click(function(e) {
       var parent = $(this).parents('.album-edit-container').eq(0),
          id = parent.attr('album-id'),
          data = {
            'action' : 'update_album',
            'album_id' : id,
            'album_title' : $('#update_album_title').val(),
            'album_content' : $('#update_album_content').val(),
            'album_date' : $('#update_album_date').val(),
            'album_photo' : $('#update_album_photo').val(),
          };

          console.log('updating album...');
          console.log(data);

          $.post(ajaxurl, data, function(success) {
            console.log('album updated');
          });

     });


     // UI - ADD TRACK
     //
     console.log('binding events');
     $('.add-track').click(function(e) {
      e.preventDefault();
      var template = [
        '<div class="track-single">',
          '<div class="form-inline">',
            '<div class="form-group">',
              '<button class="remove-track icon-btn"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>',
            '</div>',
            '<div class="form-group">',
              '<span class="title"/>',
              '<input type="hidden" id="track_title"/>',
            '</div>',
            '<div class="form-group">',
              '<span class="url"/>',
              '<input type="hidden" id="track_url"/>',
            '</div>',
          '</div>',
        '</div>'
      ].join('\n'),
      $template = $(template),
      $container = $('.tracks-sortable'),
      trackLength = $container.find('.track-single').length,
      track = $(this).parents('.track-single').eq(0),
      title = track.find('#track_title'),
      url = track.find('#track_url');

      $template.find('.title').html(trackLength+1 + '. ' + title.val());
      $template.find('#track_title').val(title.val());

      $template.find('.url').text(url.val());
      $template.find('#track_url').val(url.val());

      console.log($container);
      console.log($template);

      $container.append($template);

      title.val('');
      url.val('');

     });

    //
    //  UI - REMOVE TRACK
    $('.remove-track').click(function(e) {
      var target = $(this).parents('.track-single');
      target.slideUp(400, function() {
        target.remove();
      });
    });

    
  });
  </script> 
  
  <?php
}

//
//  AJAX PHP Hooks

/*  
 * Save/Update Album  
 ===================== */
add_action( 'wp_ajax_save_album', 'ajax_discography_post_album' );
function ajax_discography_post_album() {
  global $wpdb; 

  $name = $_POST['album_title'];
  $photo = $_POST['album_photo'];
  $date = $_POST['album_date']; 
  $content = $_POST['album_content'];

  $post_data = array(
    'post_type' => 'album',
    'post_status' => 'publish',
    'post_title' => $name,
    'post_content' => $content
  );

  $id = wp_insert_post($post_data);

  if (isset($id)) {
    if($photo == "") {
      $photo = get_stylesheet_directory_uri() . '/includes/extensions/music-player/assets/images/blank_album.png';
    }

    update_post_meta($id, 'album_image', $photo);
    update_post_meta($id, 'album_date', $date);
  }

  echo $id;
  die(); 
}

//
//  Delete Album
add_action( 'wp_ajax_delete_album', 'ajax_discography_delete_album' );
function ajax_discography_delete_album() {
  global $wpdb; 

  $id = $_POST['album_id'];

  if (isset($id)) {
    wp_delete_post($id);
  }

  echo $id;
  die(); 
}


//
//  Update Tracks
add_action( 'wp_ajax_add_tracks', 'ajax_discography_add_tracks' );
function ajax_discography_add_tracks() {
  global $wpdb; 

  $id = $_POST['album_id'];
  $track_data = $_POST['track_data'];  

  if (isset($id)) {
    update_post_meta($id,'track_data', $track_data);
  }

  echo $track_data;

  die(); 
}

//  
//  Update Album
add_action( 'wp_ajax_update_album', 'ajax_discography_update_album' );
function ajax_discography_update_album() {
  global $wpdb;

  $id = $_POST['album_id'];
  $album_title = $_POST['album_title'];
  $album_content = $_POST['album_content'];
  $album_date = $_POST['album_date'];
  $album_photo = $_POST['album_photo'];

  if (isset($id)) {
    update_post_meta($id,'album_image', $album_photo);
    update_post_meta($id, 'album_date', $album_date);
    wp_update_post(array(
      'ID' => $id,
      'post_content' => $album_content,
      'post_title' => $album_title
    ));
  }

  echo $id;
  die();
}




?>