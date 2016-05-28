<div id="news">
	<div class="inner">
		<a class="close" title="Close"><span>Close</span></a>
		<h2>News</h2>

		<?php

		$myposts = get_posts(array( 'posts_per_page' => 1, 'category' => 1 ));

		foreach ( $myposts as $post ) : 
			setup_postdata( $post ); ?>

			<div class="item">
				<h3><?php the_time('F j, Y'); ?></h3>
				<?php the_content(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail(); ?>
				<?php endif; ?>
			</div>

		<?php 
			endforeach; 
			wp_reset_postdata();
		?>
		<div class="item">
			<p><a class="readmore" href="/category/news/">Read more</a></p>
		</div>

	</div>
</div>
