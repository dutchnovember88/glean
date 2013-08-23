<?php
/**
 * @package Glean Plugin
 * @version 1.0
 */
/*
Plugin Name: Glean
Plugin URI: http://wordpress.org/plugins/
Description: This will hopefully take the information you want out of a google spreadsheet you have access to and display it.
Author: Howard Noz
Version: 1.0
Author URI: http://www.howardnoz.com
*/

// add css
add_action( 'wp_enqueue_scripts', 'add_css' );
function add_css() {
	wp_register_style('glean_css', plugins_url( '/glean.css' , __FILE__ ));
	wp_enqueue_style('glean_css');
}

// add js
add_action( 'wp_enqueue_scripts', 'glean_js' );
function glean_js() {
	wp_enqueue_script(
		'jquery.sheetrock',
		plugins_url( '/jquery.sheetrock.js' , __FILE__ ),
		array( 'jquery' )
	);
	
	wp_register_script(
		'glean_js',
		plugins_url( '/glean.js' , __FILE__ ),
		array( 'jquery' )
	);
	wp_enqueue_script('glean_js');
	$params =array(
	'sheet' => "url here"
	);
	wp_localize_script('glean_js', 'jsParams', $params);
}
?>