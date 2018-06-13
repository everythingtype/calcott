<?php if ( is_front_page() ) : 
	$linkBase = '';
else :
	$linkBase = '/';
endif;
?>

<div class="menutoggle openmenu">
	<h4>
		<span>Menu</span>
		<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14"><rect width="15" height="2"/><rect y="6" width="15" height="2"/><rect y="12" width="15" height="2"/></svg>
	</h4>
</div>

<div class="sitenav">
	<ul>
	<li><a href="<?php echo $linkBase; ?>#selected_projects">Selected Projects</a></li>
	<li><a href="<?php echo $linkBase; ?>#info">Info</a></li>
	</ul>
</div>

<div class="topnav">
	<ul>
		<li <?php if ( is_page('index') ) echo 'class="active"'; ?>><a href="/index">Index</a></li>
	</ul>
</div>