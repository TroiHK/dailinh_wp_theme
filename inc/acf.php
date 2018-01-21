<?php 

if ( function_exists('acf_add_options_page') ) {

	// Main menu page
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Code Placement',
		'menu_title'	=> 'Code Placement',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/* pass google maps api key from the options menu to the ACF backend map */
function my_acf_init() {

	acf_update_setting('google_api_key', get_field( 'options_api_key','option' ));
}

add_action('acf/init', 'my_acf_init');

?>