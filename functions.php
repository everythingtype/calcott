<?php

function enqueue_scripts_method() {

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	// Packery
	$packeryjs = get_template_directory_uri() . '/js/packery.pkgd.min.js';
	wp_register_script('packeryjs',$packeryjs);
	wp_enqueue_script( 'packeryjs',array('jquery'));

	// Theme JS
	$themejs = get_template_directory_uri() . '/js/calcott.js';
	wp_register_script('themejs',$themejs);
	wp_enqueue_script( 'themejs',array('jquery','slideshowjs','packeryjs'));
	
	// Fonts CSS
	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
    wp_register_style('fontscss',$fontscss);
    wp_enqueue_style( 'fontscss');

	// theme css
	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss);
	wp_enqueue_style( 'themecss');

	if ( is_front_page() ) :

		$twitterjs = get_template_directory_uri() . '/js/twitter.js';
		wp_register_script('twitterjs',$twitterjs);
		wp_enqueue_script( 'twitterjs');

		$instafeedjs = get_template_directory_uri() . '/js/instafeed.min.js';
		wp_register_script('instafeedjs',$instafeedjs);
		wp_enqueue_script( 'instafeedjs');

		$jsrenderjs = get_template_directory_uri() . '/js/jsrender.js';
		wp_register_script('jsrenderjs',$jsrenderjs);
		wp_enqueue_script( 'jsrenderjs',array('jquery'));

		$tumblrkitjs = get_template_directory_uri() . '/js/jquery.tumblr-kit.js';
		wp_register_script('tumblrkitjs',$tumblrkitjs);
		wp_enqueue_script( 'tumblrkitjs',array('jquery','jsrenderjs'));

		$tumblrjs = get_template_directory_uri() . '/js/tumblr.js';
		wp_register_script('tumblrjs',$tumblrjs);
		wp_enqueue_script( 'tumblrjs',array('jquery','jsrenderjs','tumblrkitjs') );

	endif;

}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');


function register_my_menu() {
	register_nav_menu( 'site-navigation', __( 'Site Navigation' ) );
}
add_action( 'init', 'register_my_menu' );



if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}



function get_ID_by_slug($page_slug) {
	// Not happy about calling the DB, but get_page_by_path() just wasn't cutting it.

	global $wpdb;

	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;

}


// Includes

require_once( 'functions/gallery.php' );


?>