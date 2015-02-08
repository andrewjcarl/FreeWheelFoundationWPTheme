<?php

//
//	@Button Shortcode
//

function button_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'size'	=>	'medium',
		'color'	=>	'green',
		'round'	=>	'',
		'link'	=>	''
	), $atts ) );

	// new Class array
	$classA = array();
		
	// create class array
	array_push($classA, $size, $color, $round);
	$class = implode(" ", $classA);
	
	// set return
	$return	.=	'<button class="' . $class . '">';
	if (isset($link)) {
		$return .= '<a href="' . $link . '" target="_blank">' . $content . '</a>';
	} else { 
		$return .= $content;
	}
	$return	.=	'</button>';
	
	return $return;
}
add_shortcode( 'button', 'button_shortcode' );


//
//	@Image Hover
//
 function img_hover_shortcode( $atts, $content="") {
	extract( shortcode_atts( array (
					'url'	=>	'',
					'first'	=>	'',
					'hover'	=>	'',
					'class'	=>	''
			), $atts ) );
	return '	<a href="' . $url . '"  class="img-hover ' . $class . '" >
					<img src="' . $first . '" onmouseover="this.src=\'' . $hover . '\'" onmouseout="this.src=\'' . $first . '\'" />
				</a>
	';
}
add_shortcode( 'img-hover', 'img_hover_shortcode');

//
//	@Responsive Shortcodes
//

function one_third_shortcode( $attr,$content ) {
	$r = '<div class="left col-third">';
	$r .= do_shortcode($content);
	$r .= '</div>';
	return $r;
}
add_shortcode( 'one_third', 'one_third_shortcode');

function one_half_shortcode( $attr,$content ) {
	$r = '<div class="left col-half">';
	$r .= do_shortcode($content);
	$r .= '</div>';
	return $r;
}
add_shortcode( 'one_half', 'one_half_shortcode');

function two_third_shortcode( $attr,$content ) {
	$r = '<div class="left col-twothird">';
	$r .= do_shortcode($content);
	$r .= '</div>';
	return $r;
}
add_shortcode( 'two_third', 'two_third_shortcode');


?>