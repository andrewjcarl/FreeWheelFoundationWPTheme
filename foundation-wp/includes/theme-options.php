<?php

//
//	@Theme Options
//

// Add pages to Wordpress admin panel

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page'); 

// Add .css and .js files to admin 

add_action( 'admin_init', 'theme_options_style');

function theme_options_style() {
	wp_enqueue_style( 'bootstrap_Theme_Stylesheet', get_stylesheet_directory_uri() . '/assets/css/theme.css' );
	wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/wp-theme.js', array( 'jquery') );

	

	//Wordpress Media Upload Scripts
	wp_enqueue_script('media-upload');
	wp_enqueue_media(); 
}

// Add bootstrap Options to Wordpress Initialization
function theme_options_init(){
	register_setting( 'bootstrap_options', 'bootstrap_theme_options');
} 

// Add the bootstrap Options page to Wordpress Backend

function theme_options_add_page() {
 add_theme_page( __( 'Bootstrap Options', 'bootstrap' ), __( 'Bootstrap Options', 'bootstrap' ), 'edit_theme_options', 'bootstrap_theme_options', 'bootstrap_options_do_page' );
}

// Function creating the bootstrap Options Page

function bootstrap_options_do_page() {
	global $select_options; 

	if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false; 
	?>
	<div id="wpwrap">
	<div id="options-container">
	<h1>Portfolio Theme Options</h1>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>

	<p class="options-saved update-nag"><strong><?php _e( 'Options saved', 'bootstrap' ); ?></strong></p>
	<?php endif; ?> 

	<form method="post" action="options.php">

	<?php settings_fields( 'bootstrap_options' ); ?>  

	<?php $options = get_option( 'bootstrap_theme_options' ); ?> 

		<!--	begin General Theme Options -->
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
		<!--	end General Options -->

		</form>
		</div>
	</div>
	<?php }


function page_classes() {
	$classes = array();

	return $classes;
}

function theme_body_classes( $classes ) {
	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';
	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';
	return $classes;
}
add_filter( 'body_class', 'theme_body_classes' );

?>