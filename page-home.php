<?php 

/* Template Name: Home */

get_header(); ?>

<a id="initial" class="blockanchor"></a>

<div class="home">

	<div id="carouselblock" class="stripe">

		<div class="maxwidth">
			<div class="padding">
			<?php get_template_part('parts/carousel'); ?>
			</div>
		</div>
	</div><!-- carousel -->

	<a id="selected_projects" class="blockanchor"></a>
	<div id="portfoliosblock" class="stripe">

		<h2>Selected Projects</h2>

		<div class="inner"><div class="maxwidth">
			<div class="thumbnails">
			<?php get_template_part('parts/selected_projects'); ?>
			</div>
		</div></div>
	</div><!-- selected_projects -->

	<div id="updatesblock" class="stripe">
	</div><!-- updates -->

	<a id="info" class="blockanchor"></a>
	<div id="infoblock" class="stripe">

		<h2>Info</h2>

		<div class="maxwidth"><div class="inner">
			<div class="column"><div class="padding">
				<h3>About Nicholas Calcott</h3>

				<?php get_template_part('parts/about'); ?>

                <br/><br/>
				<h3>Contact</h3>

				<?php get_template_part('parts/contact'); ?>

				<br/><br/>
			</div></div>
			<div class="column"><div class="padding">
				<h3>Selected Clients</h3>

				<?php get_template_part('parts/clients'); ?>

			</div></div>
			<div class="column"><div class="padding">
            	<h3><span>Selected Tearsheets</span></h3>
                
                <?php get_template_part('parts/tears'); ?>

                <br/><br/>
                
               <h3>Website</h3>
                
                <?php get_template_part('parts/siteinfo'); ?>
                
			</div></div>
		</div></div>
	</div><!-- about -->

	<div id="otherblock" class="stripe">
	</div><!-- other -->

	<div id="fixedtitle">
	</div>

</div>

<?php get_footer(); ?>