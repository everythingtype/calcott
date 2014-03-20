<?php 

/* Template Name: Image Gallery */

get_header(); ?>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php if ( get_the_content() != '' ) : ?>
					<div class="infobox"><div class="inner">
						<a class="close" title="Close"><span>Close</span></a>
						<div class="padding">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						</div>
					</div></div>
				<?php endif; ?>

				<div class="slideshow">

					<?php 
					$imageids = Array();

					$rows = get_field('images'); 
					foreach($rows as $row) : 
						if ( $row['image'] ) : 
							$imageids[] = $row['image']['id'];
						endif;
					endforeach; 

					// Sub Pages
					$args = array(
						'post_type' => 'page',
						'posts_per_page' => -1,
						'post_parent' => $post->ID
					);

					$myposts = get_posts( $args );

					foreach ( $myposts as $post ) : setup_postdata( $post );

						$rows = get_field('images'); 
						foreach($rows as $row) : 
							if ( $row['image'] ) : 
								$imageids[] = $row['image']['id'];
							endif;
						endforeach;
				
					endforeach;

					$imageids = array_unique($imageids);

					the_calcott_gallery($imageids,'thumb'); 
				
					?>

					<div class="gutter"></div>
				</div>

				<div class="detailview">

					<?php the_calcott_gallery($imageids,'enlargement'); ?>

					<div id="shade"></div>
				</div>

			<?php endwhile; ?>


		<?php else : ?>
			<div class="content"><p>Sorry, page not found.</p></div>
		<?php endif; ?>

<?php get_footer(); ?>