<?php

//
//	@Theme Options
//

/*
 *	Include and enqueue our scripts and styles into our admin framework
 *	
 *	For best practices, follow this guide here: http://code.tutsplus.com/tutorials/loading-css-into-wordpress-the-right-way--cms-20402
 *
 *
 ******************************/
add_action( 'admin_enqueue_scripts', 'theme_options_style');

function theme_options_style() {

	//	
	//	Register our styles with a unique namespace to declare dependencies if needed
	//
	wp_register_style('flat-ui', get_stylesheet_directory_uri() . '/assets/theme/flat-ui-1.3.2/dist/css/flat-ui-pro.css', null, '1.3.2');
	wp_register_style('bootstrap-css', get_stylesheet_directory_uri() .'/assets/theme/flat-ui-1.3.2/dist/css/vendor/bootstrap.min.css', array('flat-ui'),	'1.3.2');
	wp_register_style('custom-theme-css', get_stylesheet_directory_uri() . '/assets/theme/custom-theme.css');

	//	
	//	Include our styles in our admin panel
	//	
	wp_enqueue_style('flat-ui');
	wp_enqueue_style('bootstrap-css');
	wp_enqueue_style('custom-theme-css');

	//
	//	Enqueue the scripts that we will be using
	//	
	//	* Note: the wp-theme.js file is compiled via our grunt task, so we can load multiple smaller script parts as one file
	//
	wp_enqueue_script('flat-ui-js', get_stylesheet_directory_uri() . '/assets/theme/flat-ui-1.3.2/dist/js/flat-ui-pro.js', array( 'jquery') );
	wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/wp-theme.js', array( 'jquery') );

	//
	//	We used to need to manually include these scripts as well to make use of the Wordpress File upload helper. I'm leaving them here incase we need them for an older WP version.
	//
	//Wordpress Media Upload Scripts
	//
	//wp_enqueue_script('media-upload');
	//wp_enqueue_media(); 
}


/*
 *
 *  Hook our Theme functions into the admin actions
 *
 *******************************/
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page'); 


/*
 *
 *  Register our Theme Options in the global namespace
 *
 *******************************/
function theme_options_init() {
	register_setting( 'bootstrap_options', 'bootstrap_theme_options');
} 

/*
 *
 *  Add our Admin Options page to Wordpress Backend
 *
 *******************************/
function theme_options_add_page() {
 add_theme_page( __( 'Bootstrap Options', 'bootstrap' ), __( 'Bootstrap Options', 'bootstrap' ), 'edit_theme_options', 'bootstrap_theme_options', 'bootstrap_options_do_page' );
}

/*
 *
 * Creating the HTML for our Admin Options Page
 *
 *******************************/
function bootstrap_options_do_page() {
	global $select_options; 
	global $theme_options;

	$theme_options = get_option( 'bootstrap_theme_options' );

	$theme_panels = array("general","home","footer","admin");

	if ( ! isset( $_REQUEST['settings-updated'] ) ) 
		$_REQUEST['settings-updated'] = false; 
	?>
	<div id="wpwrap">
		<div id="options-container" class="container pull-left">
			<h1>Theme Options</h1>

			<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
				<div class="alert alert-success" role="alert"><?php _e( 'Options saved', 'bootstrap' ); ?></div>
			<?php endif; ?> 

		<div class="well well-lg">
			The following options help provide visibility into features provided in the Foundation HTML theme. 
		</div>

		<div class="row">
			<div class="col-md-3">
				<ul class="nav nav-list">
					<?php foreach($theme_panels as $panel) { ?>
						<li nav-panel-toggle="#<?php echo $panel; ?>"><a href="#"><?php echo ucfirst($panel); ?> Options</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-9">
				<form method="post" action="options.php">

					<?php settings_fields( 'bootstrap_options' ); ?>  
					
					<?php foreach($theme_panels as $panel) { ?>
						<div nav-panel id="<?php echo $panel; ?>">
							<?php get_template_part('includes/theme-options-parts/panel',$panel); ?>

							<button role="submit" class="btn btn-embossed btn-success">Save Changes</button>

						</div>
					<?php } ?>

				</form>
			</div>
		</div>
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