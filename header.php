<!DOCTYPE html>

<html lang="en">
<head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Fav Icons: Browser, iOS, Windows 8 -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
		<meta name="msapplication-TileColor" content="#000000"/> 
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<link rel="stylesheet" href="<?php echo bloginfo('template_url') ?>/webfonts/PxGroteskBold-Regular.css" type="text/css" media="screen" />
        
		<?php wp_head(); ?>

</head>
<body id="top">

<div class="header">
	<div class="mask">
	<div class="maxwidth">
		<div class="padding">

			<h1><span><a href="/"><?php bloginfo('name'); ?></a></span></h1>

			<?php get_template_part('parts/nav-desktop'); ?>

		<div class="line"></div>
	</div></div>
</div>
</div>

<div class="scrollingcontent">

<div class="layout">

	<?php if ( is_page('friends') ) : ?>

		<?php get_template_part('parts/breadcrumbs'); ?>

	<?php elseif ( !is_front_page() && !is_page('index')  && !is_category() && !is_single() ) : ?>

		<?php get_template_part('parts/breadcrumbs'); ?>

		<div class="pagetitle">
			<h2><a href="#top"><?php if ( is_tax('imagetag') ) :
					echo $wp_query->queried_object->name;
				else :
					the_title(); 
				endif;
			?></a></h2>
		</div>

	<?php endif; ?>

