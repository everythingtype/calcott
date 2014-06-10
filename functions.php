<?php

function enqueue_scripts_method() {

	$version = "j";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	$packeryjs = get_template_directory_uri() . '/js/packery.pkgd.min.js';
	wp_register_script('packeryjs',$packeryjs, false, $version);
	wp_enqueue_script( 'packeryjs',array('jquery'));

	$jqueryuijs = get_template_directory_uri() . '/js/jquery-ui-1.10.4.custom.min.js';
	wp_register_script('jqueryuijs',$jqueryuijs, false, $version);
	wp_enqueue_script( 'jqueryuijs');

	$scrolltojs = get_template_directory_uri() . '/js/jquery.scrollTo.min.js';
	wp_register_script('scrolltojs',$scrolltojs, false, $version);
	wp_enqueue_script( 'scrolltojs',array('jquery') );

	$localScrolljs = get_template_directory_uri() . '/js/jquery.localScroll.min.js';
	wp_register_script('localScrolljs',$localScrolljs, false, $version);
	wp_enqueue_script( 'localScrolljs',array('jquery','scrolltojs') );


	if ( is_front_page() ) :

		// Social

		$twitterjs = get_template_directory_uri() . '/js/twitter.js';
		wp_register_script('twitterjs',$twitterjs, false, $version);
		wp_enqueue_script( 'twitterjs');

		$instafeedjs = get_template_directory_uri() . '/js/instafeed.min.js';
		wp_register_script('instafeedjs',$instafeedjs, false, $version);
		wp_enqueue_script( 'instafeedjs');

		$jsrenderjs = get_template_directory_uri() . '/js/jsrender.js';
		wp_register_script('jsrenderjs',$jsrenderjs, false, $version);
		wp_enqueue_script( 'jsrenderjs',array('jquery'));

		$tumblrkitjs = get_template_directory_uri() . '/js/jquery.tumblr-kit.js';
		wp_register_script('tumblrkitjs',$tumblrkitjs, false, $version);
		wp_enqueue_script( 'tumblrkitjs',array('jquery','jsrenderjs'));

		// Layout

		$babbqjs = get_template_directory_uri() . '/js/jquery.ba-bbq.js';
		wp_register_script('babbqjs',$babbqjs, false, $version);
		wp_enqueue_script( 'babbqjs',array('jquery') );

		$homepagejs = get_template_directory_uri() . '/js/homepage.js';
		wp_register_script('homepagejs',$homepagejs, false, $version);
		wp_enqueue_script( 'homepagejs',array('jquery','jsrenderjs','tumblrkitjs','babbqjs','scrolltojs','localScrolljs','jqueryuijs','pinjs') );

	
	else:

		// Slideshow

		$colorboxjs = get_template_directory_uri() . '/js/jquery.colorbox-min.js';
		wp_register_script('colorboxjs',$colorboxjs, false, $version);
		wp_enqueue_script( 'colorboxjs','jquery');

		$slideshowjs = get_template_directory_uri() . '/js/slideshow.js';
		wp_register_script('slideshowjs',$slideshowjs, false, $version);
		wp_enqueue_script( 'slideshowjs',array('jquery','colorboxjs','jqueryuijs') );

	endif;

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);
	wp_enqueue_script( 'layoutjs',array('jquery','packeryjs'));

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);
	wp_enqueue_style( 'themecss');

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
	global $wpdb;
	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;
}




// Includes

require_once( 'functions/gallery.php' );
require_once( 'functions/tagging.php' );

?>