<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Enqueue scripts and styles.
 **/
function virtua_scripts() {
	$style_time = filemtime(dirname(__FILE__) . '/assets/css/styles.css');
	//css
	wp_enqueue_style( 'virtua-style', get_template_directory_uri() . '/assets/css/styles.css?v='.$style_time, array(), null );

}
add_action( 'wp_enqueue_scripts', 'virtua_scripts' );

require_once( 'inc/core-functions.php' );
require_once( 'inc/acf.php' );
require_once( 'inc/custom.php' );