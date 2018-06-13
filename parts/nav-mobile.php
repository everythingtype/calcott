<?php if ( is_front_page() ) : 
	$linkBase = '';
else :
	$linkBase = '/';
endif;
?>

<div id="navshade" class="lightbox" style="display: none;">
	<div class="box">

		<div class="mobilenav <?php if ( is_front_page() ) echo 'homemobilenav'; ?>">
			<div class="mobilenavpadding"></div>
			<ul>
				<li>&nbsp;</li>
				<li><a href="<?php echo $linkBase; ?>#selected_projects">Selected Projects</a></li>
				<li><a href="<?php echo $linkBase; ?>#info">Info</a></li>
				<li><a href="/index">Index</a></li>
			</ul>
		</div>

	</div>
</div>
