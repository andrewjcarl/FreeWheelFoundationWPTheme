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
	wp_enqueue_style('flat-ui', get_stylesheet_directory_uri() . '/assets/theme/flat-ui/dist/css/flat-ui.css' );
	wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/assets/theme/flat-ui/dist/css/vendor/bootstrap.min.css');

	wp_enqueue_script('flat-ui-js', get_stylesheet_directory_uri() . '/assets/theme/flat-ui/dist/js/flat-ui.min.js', array( 'jquery') );
	wp_enqueue_script('theme-js', get_stylesheet_directory_uri() . '/assets/js/wp-theme.js', array( 'jquery') );

	//Wordpress Media Upload Scripts
	//wp_enqueue_script('media-upload');
	//wp_enqueue_media(); 
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

	$theme_panels = array("general","footer");

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
				<ul class="list-group">
					<?php foreach($theme_panels as $panel) { ?>
						<li nav-panel-toggle="#<?php echo $panel; ?>" class="list-group-item"><?php echo ucfirst($panel); ?> Options</li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-9">
				<form method="post" action="options.php">

					<?php settings_fields( 'bootstrap_options' ); ?>  

					<?php $options = get_option( 'bootstrap_theme_options' ); ?> 
					
					<?php foreach($theme_panels as $panel) { ?>
						<div nav-panel id="<?php echo $panel; ?>">
							<?php get_template_part('includes/theme-options-parts/panel',$panel); ?>
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