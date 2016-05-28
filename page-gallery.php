<?php 

/* Template Name: Image Gallery */

get_header(); ?>
<div class="maxwidth"><div class="content">

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
					$imageset = Array();

					$rows = get_field('images'); 
					foreach($rows as $row) : 

						if ( $row['image'] ) : 

							if ( !in_array($row['image']['id'],$imageids) ) :

								$imageset[] = array(
									'display_size' => $row['display_size'],
									'id' => $row['image']['id']
								);

								$imageids[] = $row['image']['id'];

							endif;

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

								if ( !in_array($row['image']['id'],$imageids) ) :

									$imageset[] = array(
										'display_size' => $row['display_size'],
										'id' => $row['image']['id']
									);

									$imageids[] = $row['image']['id'];

								endif;

							endif;

						endforeach;
				
					endforeach;

					the_calcott_sized_gallery($imageset); 
				
					?>

					<div class="gutter"></div>
				</div>

			<?php endwhile; ?>

		<?php else : ?>
			<p>Sorry, page not found.</p>
		<?php endif; ?>

</div></div>
<?php get_footer(); ?>