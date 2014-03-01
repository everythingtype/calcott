<?php 

/* Template Name: Image Gallery */

get_header(); ?>

		<?php if (have_posts()) : 
			while (have_posts()) : the_post(); 
				$rows = get_field('images'); 

					$i = 0; 
					$numItems = count( $rows );

					foreach($rows as $row) : 
						if ( $row['image'] ) : ?>

						<div class="imageslide" id="slide<?php echo $i; ?>">

						<?php $i++; 
							if ($i === $numItems ) $i = 0;

							if ( $row['image']['alt'] ) :
								$alt = $row['image']['alt']; 
							else :
								$alt = $row['image']['title']; 
							endif; ?>

							<a class="slideinner" href="#slide<?php echo $i; ?>"><img src="<?php echo $row['image']['sizes']['large']; ?>" alt="<?php echo $alt; ?>" /></a>

						</div>

						<?php endif;
					endforeach;
				?>

			<?php endwhile; ?>

		<?php else : ?>
			<div class="content"><p>Sorry, page not found.</p></div>
		<?php endif; ?>

<?php get_footer(); ?>