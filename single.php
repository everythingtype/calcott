<?php get_header(); ?>
<div class="maxwidth">

		<?php if (have_posts()) : ?>
			<div class="category"><div class="margin">
				<h2>News</h2>
			<?php while (have_posts()) : the_post(); ?>
				<h3><?php the_time('F j, Y'); ?></h3>
				<?php the_content(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail(); ?>
				<?php endif; ?>
			<?php endwhile; ?>
			</div></div>
		<?php endif; ?>

</div></div>


<?php get_footer(); ?>


