<?php

error_reporting( 0 );

if ( ! defined( '_S_VERSION' ) ) {
	define( 'S_VERSION', '1.6.7' );
}

require_once 'inc/menus.php';
require_once 'inc/theme-supports.php';
require_once 'inc/filters.php';
require_once 'blocks.php';

require_once( get_stylesheet_directory() . '/customizer/customizer.php' );


function init_scripts() {
	/**
	 *  Main styles 
	 */
	wp_register_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css?v=7.3', [], false, 'all' );
	wp_register_script( 'main-js', get_template_directory_uri() . '/assets/js/script-min.js?v=7.2', [], false, 'all' );

	wp_enqueue_style( 'main-css' );
	wp_enqueue_script( 'main-js' );
}

add_action( 'wp_enqueue_scripts', 'init_scripts' );


add_filter('wpcf7_autop_or_not', '__return_false');
