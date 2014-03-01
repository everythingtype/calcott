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

	// Slideshow
	$slideshowjs = get_template_directory_uri() . '/js/slideshow.js';
	wp_register_script('slideshowjs',$slideshowjs);
	wp_enqueue_script( 'slideshowjs',array('jquery'));

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

}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');


// Includes

require_once( 'functions/gallery.php' );


?>