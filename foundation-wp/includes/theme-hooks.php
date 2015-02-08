<?php
//
//	Bootstrap Theme Action Hooks
//
//	@since 4/3/2014
//	@last 4/3/2014
//
//	@Locations:
//
//	above_header
//	below_header
//
//	above_wrapper
//		above_content
//		below_content
//	below_wrapper
//
//	above_footer
//	below_footer

function do_above_header_hook() {
	do_action('above_header_hook');
}

function do_below_header_hook() {
	do_action('below_header_hook');
}

function do_above_wrapper_hook() {
	do_action('above_wrapper_hook');
}

function do_above_content_hook() {
	do_action('above_content_hook');
}

function do_below_content_hook() {
	do_action('below_content_hook');
}

function do_below_wrapper_hook() {
	do_action('below_wrapper_hook');
}

function do_above_footer_hook() {
	do_action('above_footer_hook');
}

function do_below_footer_hook() {
	do_action('below_footer_hook');
}
