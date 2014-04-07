<?php 

/* Template Name: Home */

get_header(); ?>

<div class="home">

	<div id="portfolios">
		<div class="thumbnails">
			<?php get_template_part('parts/portfolios'); ?>
		</div>
	</div><!-- portfolios -->

	<div id="projects">
		<h2>Projects</h2>
		<div class="inner">
			<div class="thumbnails">
				<?php get_template_part('parts/projects'); ?>
			</div>
		</div>
	</div><!-- projects -->

	<div id="updates">
		<h2>Updates</h2>
		<div class="line"></div>
		<div class="inner">

			<div class="column"><div class="padding">

				<h3>Date</h3>

				<div class="box"><div class="height"><div class="proportional">

					<div id="instafeed"></div>

				</div></div></div>
				<p class="handle"><a href="http://instagram.com/ncott">Instagram</a><br />
				<em>@ncott</em></p>
			</div></div>

			<div class="column"><div class="padding">

				<h3 id="thetweetdate"></h3>

				<div class="box"><div class="height"><div class="proportional">
					
					<div id="thetweet"></div>
					
				</div></div></div>
				<p class="handle"><a href="https://twitter.com/ncott">Twitter</a><br />
				<em>@ncott</em></p>
			</div></div>

			<div class="column"><div class="padding">

				<h3>Date</h3>

				<div class="box"><div class="height"><div class="proportional">

					<script id="tmpl-photo" type="text/x-jsrender">
							{{if photoset_layout}}
								<ul class="photoset">
									{{for photos}}<li><img src="{{:~getPhotoURL(#view, 500)}}" /></li>{{/for}}
								</ul>
							{{else}}
								<img src="{{for photos}}{{:~getPhotoURL(#view, 500)}}{{/for}}" />
							{{/if}}

							{{:caption}}

							{{for #data tmpl="#tmpl-metadata"/}}
					</script>
					<div id="photos"><span class="tumblr-api-loading">Loading posts&hellip;</span></div>

				</div></div></div>
				<p class="handle"><a href="http://blog.nicholascalcott.com/">Tumblr</a><br />
				<em>blog.nicholascalcott.com</em></p>
			</div></div>

			<div class="also">
				<p>Also see:<br />
				<a href="">Facebook</a><br />
				<a href="">LinkedIn</a><br />
				<a href="/feed/">RSS</a></p>
			</div>

		</div>
	</div><!-- updates -->

	<div id="info">
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

				<p>To receive my newsletter,<br /> 
				please send your email:</p>

			</div></div>
		</div>
	</div><!-- about -->

	<div id="other">
		<h2>Other Stuff</h2>
		<div class="line"></div>
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

</div>

<?php get_footer(); ?>