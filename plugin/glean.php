<?php
/**
 * @package Glean Plugin
 * @version 1.1
 */
/*
Plugin Name: Glean
Plugin URI: http://wordpress.org/plugins/
Description: Plugin to extract the information you want out of a google spreadsheet you have access to. Includes short code.
Author: Howard Noz
Version: 1.0
Author URI: 
*/

// shortcode
function glean_short( $atts ) {
	extract( shortcode_atts( array(
		'sheet' => 'url here',
	), $atts ) );
	
	$find = array("/.*[?]/", "/[^a-zA-Z0-9]/");
	$replace = array("","");
	$sheet = "{$sheet}";
	$unique = preg_replace($find, $replace, $sheet);
	
	$params =array( 
		'unique' => $unique,
		'sheet' => $sheet ,
	);
	wp_register_script('glean_js', plugins_url( '/glean.js' , __FILE__ ), array( 'jquery' ));
	wp_enqueue_script('glean_js');
	wp_localize_script('glean_js', 'jsParams', $params);

	return "<table id=\"".$unique."\" cellspacing=\"0\" cellpadding=\"4\"></table>";
}
add_shortcode( 'display_response', 'glean_short' );

// javascript
function glean_js() {
	wp_enqueue_script(
		'jquery.sheetrock',
		plugins_url( '/jquery.sheetrock.js' , __FILE__ ),
		array( 'jquery' )
	);
}
add_action( 'wp_enqueue_scripts', 'glean_js' );
?>