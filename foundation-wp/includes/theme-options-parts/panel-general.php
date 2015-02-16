<?php $options = get_option( 'bootstrap_theme_options' ); ?>

<!--  begin General Theme Options -->
<h1>General Site Options</h1>
<hr>

<section>

  <div class="row">
    <div class="col-md-2"><h3 class="option-title">Site Logo</h3></div>
    <div class="col-md-10">

        <input type="text" size="35" id="options_logo" name="bootstrap_theme_options[logo]" value="<?php echo $options[logo]?>">
        <input wp-upload="#options_logo" wp-upload-img="#options_logo_img" type="button" value="Upload Image" style="float:none;" />
        <br>

        <?php if ( isset( $options[logo] ) && $options[logo] != "" ) { ?> 
          <br><img id="options_logo_img" src="<?php echo $options[logo]; ?>"/>
        <?php } else { ?>
          <small>* No Preview available. Please enter in an image URL</small>
        <?php }  ?>

    </div>
  </div>
  <hr>


   <div class="row">
    <div class="col-md-2"><h3 class="option-title">Google Analytics</h3></div>
    <div class="col-md-10">

      <?php echo theme_text_input('ga_tracking_code', 'Tracking Code', 'Example: UA-XXXXX-XX'); ?>

    </div>
  </div>
  <hr>  

  


 
</section>
<!--  end General Options -->