<?php
//
//	@Image Hover
//
 function logo_block_shortcode( $atts, $content="") {
	extract( shortcode_atts( array (
					'url'	=>	'',
					'first'	=>	'',
					'hover'	=>	'',
					'class'	=>	''
			), $atts ) );
	return '
	<!-- Logos Section
	================================================== -->
	<div class="logos_section">
		<div class="logos_bgimage"></div>
		<div class="container ">
			<div class="sixteen columns testimonials_dev">
				<div class="quote_p">
				<div class="logos_title">
					Our Partners
				</div>
				<div class="clearfix"></div>
				</div>
			</div>
			<div class="logos_imgs">
				<div class="one-third columns logo_item">
					<img src="'.get_stylesheet_directory_uri().'/images/content_images/1.png" alt="1">
				</div>
				<div class="one-third columns logo_item">
					<img src="'.get_stylesheet_directory_uri().'/images/content_images/2.png" alt="2">
				</div>
				<div class="one-third columns logo_item">
					<img src="'.get_stylesheet_directory_uri().'/images/content_images/3.png" alt="3">
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>';
}
add_shortcode( 'logo-block', 'logo_block_shortcode');

?>