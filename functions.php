<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Enqueue scripts and styles.
 **/
function virtua_scripts() {
	$style_time = filemtime(dirname(__FILE__) . '/assets/css/styles.css');
	$general_time = filemtime(dirname(__FILE__) . '/backend-custom/css/general.css');
	$projets = filemtime(dirname(__FILE__) . '/backend-custom/js/projets.js');
	$team = filemtime(dirname(__FILE__) . '/backend-custom/css/team.css');
	$contact = filemtime(dirname(__FILE__) . '/backend-custom/css/contact.css');
	$projets_js_time = filemtime(dirname(__FILE__) . '/backend-custom/js/projets.js');
	$ajax_time = filemtime(dirname(__FILE__) . '/backend-custom/js/core-ajax.js');
	//css
	wp_enqueue_style( 'virtua-style', get_template_directory_uri() . '/assets/css/styles.css?v='.$style_time, array(), null );

	wp_enqueue_style( 'general-style', get_template_directory_uri() . '/backend-custom/css/general.css?v='.$general_time, array(), null );

	//js
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if ( is_page_template( 'pages/projets.php' ) ) :
		//css
		wp_enqueue_style( 'projets-style', get_template_directory_uri() . '/backend-custom/css/projets.css?v='.$projets, array(), null );

		//js
        wp_enqueue_script( 'projets-script', get_template_directory_uri() . '/backend-custom/js/projets.js?v='.$projets_js_time, array('jquery'), null, true );
	endif;

	if ( is_page_template( 'pages/equipes.php' ) ) :
		//css
		wp_enqueue_style( 'team-style', get_template_directory_uri() . '/backend-custom/css/team.css?v='.$team, array(), null );
	endif;

	if ( is_page_template( 'pages/contact.php' ) ) :
		//css
		wp_enqueue_style( 'contact-style', get_template_directory_uri() . '/backend-custom/css/contact.css?v='.$contact, array(), null );
	endif;

    wp_register_script( 'core-ajax-script', get_template_directory_uri() . '/backend-custom/js/core-ajax.js?v='.$ajax_time, array('jquery'), null, true );
	wp_localize_script( 'core-ajax-script', 'ing_load_more_actualite', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    wp_enqueue_script( 'core-ajax-script' );

}
add_action( 'wp_enqueue_scripts', 'virtua_scripts' );

require_once( 'inc/core-functions.php' );
require_once( 'inc/acf.php' );
require_once( 'inc/custom.php' );

// add_action("wp_enqueue_scripts", "auto_version_scripts");
// function auto_version_scripts() {

// 	$mtime = filemtime(dirname(__FILE__) . '/assets/css/styles.css');
// 	wp_enqueue_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/assets/css/styles.css?v='.$mtime, array(), null, 'all');
// }