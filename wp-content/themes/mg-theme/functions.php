<?php

define('ROOT', get_template_directory_uri());
define('IMG', ROOT . '/img');
define('VIDEO', ROOT . '/video');

include('include/clear.php');
include('include/formApply.php');

add_theme_support( 'menus' );

function front_scripts() {

// Home page
	if( is_page_template( array( 'templates/page-home.php' ) ) ){
		wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-home.css');
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-index.js', false, false, 'in_footer');
	}

}
add_action( 'wp_enqueue_scripts', 'front_scripts' );

$user = wp_get_current_user();
if($user->display_name !== 'admin'){
	add_action('admin_head', 'admin_styles');
	function admin_styles() {
		wp_register_style( 'admin_styles', get_template_directory_uri() . '/css/styles-admin.css', false, '1.0.0' );
		wp_enqueue_style( 'admin_styles', get_template_directory_uri() . '/css/styles-admin.css', false, '1.0.0' );
	}
}

function front_variables(){
	wp_localize_script( 'scripts', 'data',
		array(
			'ajax' => admin_url('admin-ajax.php'),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'front_variables' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_filter('wpcf7_autop_or_not', '__return_false');