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
	
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />
		<meta name="author" content="http://www.everything-type-company.com, http://martyspellerberg.com" />

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
<body>

<div class="layout">

<div class="header">
	
<div class="padding">

<h1><span><a href="/"><?php bloginfo('name'); ?></a></span></h1>

<?php if ( is_front_page() ) : ?>

	<div class="topnav">
	<ul>
	<li id="newsbutton" class="active"><a>News</a></li>
	</ul>
	</div>

<?php else :?>

	<h2><?php the_title(); ?></h2>

<?php endif; ?>


</div>


<div class="sitenav"><div class="inner">
<?php if ( is_front_page() ) : 
	$linkBase = '';
else :
	$linkBase = '/';
endif;
?>

	<ul>
	<li><a href="<?php echo $linkBase; ?>#portfolios">Portfolios</a></li>
	<li><a href="<?php echo $linkBase; ?>#projects">Projects</a></li>
	<li><a href="<?php echo $linkBase; ?>#updates">Updates</a></li>
	<li><a href="<?php echo $linkBase; ?>#info">About &amp; Contact</a></li>
	<li><a href="<?php echo $linkBase; ?>#other">Other Stuff</a></li>
	</ul>

</div>

</div></div>
