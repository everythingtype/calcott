<?php

function enqueue_scripts_method() {

	$version = "o";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	// Define JS
	
	$packeryjs = get_template_directory_uri() . '/js/packery.pkgd.min.js';
	wp_register_script('packeryjs',$packeryjs, false, $version);

	$flickityjs = get_template_directory_uri() . '/js/flickity.pkgd.min.js';
	wp_register_script('flickityjs',$flickityjs, false, $version);

	$jqueryuijs = get_template_directory_uri() . '/js/jquery-ui-1.10.4.custom.min.js';
	wp_register_script('jqueryuijs',$jqueryuijs, false, $version);

	$scrolltojs = get_template_directory_uri() . '/js/jquery.scrollTo.min.js';
	wp_register_script('scrolltojs',$scrolltojs, false, $version);

	$localScrolljs = get_template_directory_uri() . '/js/jquery.localScroll.min.js';
	wp_register_script('localScrolljs',$localScrolljs, false, $version);

	$twitterjs = get_template_directory_uri() . '/js/twitter.js';
	wp_register_script('twitterjs',$twitterjs, false, $version);

	$instafeedjs = get_template_directory_uri() . '/js/instafeed.min.js';
	wp_register_script('instafeedjs',$instafeedjs, false, $version);
	
	$jsrenderjs = get_template_directory_uri() . '/js/jsrender.js';
	wp_register_script('jsrenderjs',$jsrenderjs, false, $version);

	$tumblrkitjs = get_template_directory_uri() . '/js/jquery.tumblr-kit.js';
	wp_register_script('tumblrkitjs',$tumblrkitjs, false, $version);

	$babbqjs = get_template_directory_uri() . '/js/jquery.ba-bbq.js';
	wp_register_script('babbqjs',$babbqjs, false, $version);

	$homepagejs = get_template_directory_uri() . '/js/homepage.js';
	wp_register_script('homepagejs',$homepagejs, false, $version);

	$colorboxjs = get_template_directory_uri() . '/js/jquery.colorbox-min.js';
	wp_register_script('colorboxjs',$colorboxjs, false, $version);

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);

	$slideshowjs = get_template_directory_uri() . '/js/slideshow.js';
	wp_register_script('slideshowjs',$slideshowjs, false, $version);


	// Define CSS

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);

	$homecss = get_template_directory_uri() . '/css/home.css';
	wp_register_style('homecss',$homecss, false, $version);

	$flickitycss = get_template_directory_uri() . '/css/flickity.css';
	wp_register_style('flickitycss',$flickitycss, false, $version);

	// Enqueue 

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	wp_enqueue_script( 'packeryjs',array('jquery'));
	wp_enqueue_script( 'jqueryuijs');
	wp_enqueue_script( 'scrolltojs',array('jquery') );
	wp_enqueue_script( 'localScrolljs',array('jquery','scrolltojs') );
	wp_enqueue_script( 'layoutjs',array('jquery','packeryjs'));

	wp_enqueue_style( 'themecss');


	if ( is_front_page() ) :

		wp_enqueue_script( 'flickityjs');
		wp_enqueue_script( 'twitterjs');
		wp_enqueue_script( 'instafeedjs');
		wp_enqueue_script( 'jsrenderjs',array('jquery'));
		wp_enqueue_script( 'tumblrkitjs',array('jquery','jsrenderjs'));
		wp_enqueue_script( 'babbqjs',array('jquery') );
		wp_enqueue_script( 'homepagejs',array('jquery','jsrenderjs','tumblrkitjs','babbqjs','scrolltojs','localScrolljs','jqueryuijs','pinjs','flickityjs') );

		wp_enqueue_style( 'homecss');
		wp_enqueue_style( 'flickitycss');

	else:

		wp_enqueue_script( 'colorboxjs','jquery');
		wp_enqueue_script( 'slideshowjs',array('jquery','colorboxjs','jqueryuijs') );

	endif;


}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');
