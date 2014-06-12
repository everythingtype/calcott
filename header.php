<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>
	
		<meta name="author" content="Designed by Everything Type Company, http://www.etc-nyc.com/ | Developed by Marty Spellerberg, http://www.martyspellerberg.com/" />

		<!-- Fav Icons: Browser, iOS, Windows 8 -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
		<meta name="msapplication-TileColor" content="#000000"/> 
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<link href="//fnt.webink.com/wfs/webink.css/?project=3F9A2281-0205-420D-9C4C-F7FFB1920DFC&fonts=F06E7859-C7AE-7BC9-DA36-BA8CCFC1BFEC:f=PxGrotesk-BoldIta,B0CBCA70-418F-4482-421C-88B41ECCD5FA:f=PxGrotesk-Bold" rel="stylesheet" type="text/css"/>
        
		<?php wp_head(); ?>

</head>
<body id="top">

<div class="layout">

	<div class="header">
		<div class="mask">
		<div class="maxwidth">
			<div class="padding">

				<h1><span><a href="/"><?php bloginfo('name'); ?></a></span></h1>

				<?php if ( is_front_page() ) : 
					$linkBase = '';
				else :
					$linkBase = '/';
				endif;
				?>

				<div class="sitenav">
					<ul>
					<li><a href="<?php echo $linkBase; ?>#portfolios">Portfolios</a></li>
					<li><a href="<?php echo $linkBase; ?>#projects">Projects</a></li>
					<li><a href="<?php echo $linkBase; ?>#updates">Updates</a></li>
					<li><a href="<?php echo $linkBase; ?>#info">Info</a></li>
					<li><a href="<?php echo $linkBase; ?>#other">Other Stuff</a></li>
					</ul>
				</div>

				<div class="topnav">
					<ul>
					<?php if ( is_front_page() ) : ?>
						<li id="newsbutton" class="active"><a>News</a></li>
					<?php endif; ?>
						<li><a href="<?php the_random_page_or_tag(); ?>">Random Sort</a></li>
						<li <?php if ( is_page('index') ) echo 'class="active"'; ?>><a href="/index">Index</a></li>
					</ul>
				</div>

			<div class="line"></div>
		</div></div>
	</div>

		<?php if ( !is_front_page() && !is_page('index') ) : ?>
		<div class="pagetitle">
			<h2><a href="#top"><?php if ( is_tax('imagetag') ) :
					echo $wp_query->queried_object->name;
				else :
					the_title(); 
				endif;
			?></a></h2>
		</div>
		<?php endif; ?>

	</div>

	<?php if ( !is_front_page() && !is_page('index') ) : ?>
	<!-- <div class="breadcrumbs">
		<p><a href="">Breadcrumb</a> &gt; <a href="">Breadcrumb</a></p>
	</div> -->
	<?php endif; ?>

