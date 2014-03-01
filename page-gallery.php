<?php 

/* Template Name: Image Gallery */

get_header(); ?>

		<?php if (have_posts()) : ?>

		<div class="slideshow">

			<?php 
			
			while (have_posts()) : the_post(); 

				$rows = get_field('images'); 
				$imageids = Array();

				foreach($rows as $row) : 
					if ( $row['image'] ) : 
						$imageids[] = $row['image']['id'];
					endif;
				endforeach; 
			
				the_calcott_gallery($imageids);
			
			endwhile; ?>

			<div class="gutter"></div>
		</div>


		<?php else : ?>
			<div class="content"><p>Sorry, page not found.</p></div>
		<?php endif; ?>

<?php get_footer(); ?>