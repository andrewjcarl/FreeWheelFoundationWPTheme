<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Template
 *
 * @file           header.php
 * @package        Elegant Themes
 * @author         Andrew Carl
 * @copyright      2013
 */

$header_class = (is_home() ||  is_front_page()) ? "" : "header2";

?>
<!doctype html>
<!--[if !IE]>      <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> 
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&#124;', true, 'right'); ?></title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet" type="style/css"/>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

</head>
<!-- end head -->

<!-- body -->
<body <?php body_class(); ?> >

<?php $options = get_option( 'elegant_theme_options' ); ?> 

<!-- #header-wrapper -->
	<div class="header <?php echo $header_class; ?>">
	<div class="container">
		<div class="four columns alpha">
			<div class="center_mobile">
			<a href="<?php echo home_url('/'); ?>" class="logo"></a>
			</div>
		</div>
		<div class="twelve columns omega">
			<div class="center_mobile">
				<div class="header_line"><span class="vert_line">| </span>
					<span class="header_social">
						<a href="#" class="footer_social facebook-c"></a>
						<a href="#" class="footer_social twitter-c"></a>
					</span>
				</div>
			</div>

		<!-- end header -->

		<?php if ( has_nav_menu( 'main' ) ) : ?>
			<nav>
				<div id='cssmenu'>
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'main', 'items_wrap' => '%3$s', 'container' => '' ) ); ?>
					</ul>
				</div>
			</nav>
		<?php endif; ?>

		</div>
	</div>
	</div>
	<div class="header_warper">
	</div>

<?php ?>