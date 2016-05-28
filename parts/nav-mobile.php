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
				<li><a href="<?php echo $linkBase; ?>#portfolios">Portfolios</a></li>
				<li><a href="<?php echo $linkBase; ?>#updates">Updates</a></li>
				<li><a href="<?php echo $linkBase; ?>#info">Info</a></li>
				<li><a href="<?php echo $linkBase; ?>#other">Other Stuff</a></li>
				<li><a href="/category/news/">News</a></li>
				<li><a href="<?php the_random_page_or_tag(); ?>">Random Sort</a></li>
				<li><a href="/index">Index</a></li>
			</ul>
		</div>

	</div>
</div>
