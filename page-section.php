<?php 

/* Template Name: Section */

get_header(); ?>
<div class="maxwidth"><div class="section thumbnails">

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php

				$args = array(
					'post_type' => 'page',
					'parent' => $post->ID ,
					'sort_column' => 'menu_order'

				);

				$postslist = get_pages($args);

				foreach ($postslist as $post) : setup_postdata($post);
					if ( has_post_thumbnail()) :
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
						<div class="thumb">
							<div class="thumbinner">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" /></a>
								<h4>
                                    <a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
                                        <?php if (is_page('archive')): ?>
                                        	<?php $postid = get_the_ID(); ?>
                                            <span class="_<?php echo $postid; ?>_year"> (<?php 
												$post_id = $post->ID;
												$projectdates = get_post_meta($post_id, 'date_of_project', true);
												if ( isset($projectdates) ) {
													echo $projectdates;
												};
											?>)</span>
                                        <?php endif; ?>
                                    </a>
                                </h4>
						</div></div>
				<?	endif;
				endforeach; 

				wp_reset_postdata();

				?>

			<?php endwhile; ?>


		<?php else : ?>
			<p>Sorry, page not found.</p>
		<?php endif; ?>

</div></div>
<?php get_footer(); ?>