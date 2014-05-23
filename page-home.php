<?php 

/* Template Name: Home */

get_header(); ?>

<a id="portfolios" class="blockanchor"></a>

<div class="home">

	<div id="portfoliosblock" class="stripe">

		<h2>Portfolios</h2>

		<div class="thumbnails">
			<?php get_template_part('parts/portfolios'); ?>
		</div>
	</div><!-- portfolios -->

	<a id="projects" class="blockanchor"></a>
	<div id="projectsblock" class="stripe">

		<h2>Projects</h2>

		<div class="inner">
			<div class="thumbnails">
				<?php get_template_part('parts/projects'); ?>
			</div>
		</div>
	</div><!-- projects -->

	<div id="updatesblock" class="stripe">

		<a id="updates" class="blockanchor"></a>

		<h2>Updates</h2>

		<div class="inner">

			<div class="column"><div class="padding">

				<h3 id="thetweetdate">&nbsp;</h3>

				<div class="box"><div class="height"><div class="proportional">
					
					<div id="thetweet"></div>
					
				</div></div></div>
				<p class="handle"><a href="https://twitter.com/NicholasCalcott">Twitter</a><br />
				<em>@NicholasCalcott</em></p>
			</div></div>

			<div class="column"><div class="padding">

					<div id="instafeed"></div>

				<p class="handle"><a href="http://instagram.com/ncott">Instagram</a><br />
				<em>@ncott</em></p>
			</div></div>

			<div class="column"><div class="padding">

				<script id="tmpl-photo" type="text/x-jsrender">

					<h3>{{datetime:date}}</h3>

					<div class="box"><div class="height"><div class="proportional">
					{{if photoset_layout}}
						{{for photos}}<img src="{{:~getPhotoURL(#view, 500)}}" />{{/for}}
					{{else}}
						<img src="{{for photos}}{{:~getPhotoURL(#view, 500)}}{{/for}}" />
					{{/if}}
					</div></div></div>

				</script>

				<div id="tumblr"><span class="tumblr-api-loading"></span></div>

				<p class="handle"><a href="http://blog.nicholascalcott.com/">Tumblr</a><br />
				<em>blog.nicholascalcott.com</em></p>
			</div></div>

			<div class="also">
				<p>Also see:<br />
				<a href="https://www.facebook.com/nicholas.calcott">Facebook</a><br />
				<a href="https://www.linkedin.com/pub/nicholas-calcott/1a/834/536">LinkedIn</a><br />
				<a href="/feed/">RSS</a></p>
			</div>

		</div>
	</div><!-- updates -->

	<a id="info" class="blockanchor"></a>
	<div id="infoblock" class="stripe">

		<h2>Info</h2>

		<div class="inner">
			<div class="column"><div class="padding">
				<h3>About Nicholas Calcott</h3>

				<?php get_template_part('parts/about'); ?>

			</div></div>
			<div class="column"><div class="padding">
				<h3>Clients</h3>

				<?php get_template_part('parts/clients'); ?>

			</div></div>
			<div class="column"><div class="padding">
				<h3>Contact</h3>

				<?php get_template_part('parts/contact'); ?>

				<h4><span>Subscribe</span></h4>

				<?php get_template_part('parts/newsletter'); ?>

			</div></div>
		</div>
	</div><!-- about -->

	<a id="other" class="blockanchor"></a>
	<div id="otherblock" class="stripe">
		
		<h2>Other Stuff</h2>

		<div class="inner">
			<div class="column"><div class="padding">
				<h3>Exhibitions</h3>
				<?php get_template_part('parts/exhibitions'); ?>
			</div></div>
			<div class="column"><div class="padding">
				<h3>Artist&rsquo;s Books</h3>
					<?php get_template_part('parts/books'); ?>
					<p><a href="/books/">See All Artists Books</a></p>
			</div></div>
			<div class="column"><div class="padding">
				<h3>Texts</h3>
				<?php get_template_part('parts/texts'); ?>
			</div></div>
		</div>
	</div><!-- other -->

	<div id="news">
		<div class="inner">
			<a class="close" title="Close"><span>Close</span></a>
			<h2>News</h2>
			<?php get_template_part('parts/news'); ?>
		</div>
	</div>

	<div id="fixedtitle">
	</div>

</div>

<?php get_footer(); ?>