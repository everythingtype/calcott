<?php get_header(); ?>
<div class="maxwidth">

		<?php if (have_posts()) : ?>
			<div class="content blankpage">
			<?php while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>

</div></div>


<?php get_footer(); ?>


