<?php $options = get_option( 'bootstrap_theme_options' ); ?>

<!--  begin General Theme Options -->
<header class="options-header">General Options</header>
<section>
  <table>
    <tr>
      <td colspan="2"><h3>Site Logo</h3></td>
    </tr>
    <tr valign="top">
      <td><?php _e( 'Site Logo URL:', 'bootstrap' ); ?></td>
      <td>
        <input type="text" size="35" id="bootstrap_theme_options[logo]" name="bootstrap_theme_options[logo]" value="<?php echo $options[logo]?>">
        <input id="upload_image_button" type="button" value="Upload Image" style="float:none;" />
      </td>
    </tr>
    <tr >
      <td>Preview:</td>
      <td>
        <?php if ( isset( $options[logo] ) && $options[logo] != "" ) { ?> 
        <br><img src="<?php echo $options[logo]; ?>"/>
        <?php } else { ?>
        * No Preview available. Please enter in an image URL
        <?php }  ?>
      </td>
    </tr>
  </table>

  <hr/>
  <table>
    <tr>
      <td colspan="2"><h3>Site Background Images</h3></td>
    </tr>
    <tr>
      <td>
        <input type="text" size="35" id="bootstrap_theme_options[bg_image]" name="bootstrap_theme_options[bg_image][1]" value="<?php echo $options[bg_image][1]?>">
        <input id="upload_image_button" type="button" value="Upload Image" style="float:none;" />
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" size="35" id="bootstrap_theme_options[bg_image]" name="bootstrap_theme_options[bg_image][2]" value="<?php echo $options[bg_image][2]?>">
        <input id="upload_image_button" type="button" value="Upload Image" style="float:none;" />
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" size="35" id="bootstrap_theme_options[bg_image]" name="bootstrap_theme_options[bg_image][3]" value="<?php echo $options[bg_image][3]?>">
        <input id="upload_image_button" type="button" value="Upload Image" style="float:none;" />
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" size="35" id="bootstrap_theme_options[bg_image]" name="bootstrap_theme_options[bg_image][4]" value="<?php echo $options[bg_image][4]?>">
        <input id="upload_image_button" type="button" value="Upload Image" style="float:none;" />
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" size="35" id="bootstrap_theme_options[bg_image]" name="bootstrap_theme_options[bg_image][5]" value="<?php echo $options[bg_image][5]?>">
        <input id="upload_image_button" type="button" value="Upload Image" style="float:none;" />
      </td>
    </tr>
  </table>
  <p>
    <input type="submit" value="<?php _e( 'Save Options', 'bootstrap' ); ?>" />
  </p>
</section>
<!--  end General Options -->