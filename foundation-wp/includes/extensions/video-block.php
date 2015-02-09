<?php
//
//	@Image Hover
//
 function video_block_shortcode( $atts, $content="") {
	extract( shortcode_atts( array (
					'url'	=>	'',
					'title' => 'Watch The Video',
					'byline' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
			), $atts ) );

	return '<div class="home_video_section">
	<div class="container">
			<div class="sixteen columns ">
				<div class="Services_1_title_div">
					<h3>
						'.$title.'
					</h3>
				</div>
				<div class="clearfix"></div>
				<p class="services_tagline">
					'.$byline.'
				</p>
			</div>

			<div class="clearfix"></div>
			<div class="video_cont">
			<div class="video_div">
				<div class="responsive-container">
					<iframe src="'.$url.'"  allowfullscreen></iframe> 
				</div>
			</div>
			</div>
		<div class="clearfix"></div>

	</div>	
	</div>';
}
add_shortcode( 'video-block', 'video_block_shortcode');

?>