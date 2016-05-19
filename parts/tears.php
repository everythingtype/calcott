<?php

$args = array(
	'post_type' => 'page',
	'include' => 1657
);

$postslist = get_pages($args);

foreach ($postslist as $post) : setup_postdata($post);
	if ( has_post_thumbnail()) :
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
		<div class="tears">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" /></a>
			<h4><a href="<?php the_permalink(); ?>">View full gallery</a></h4>
		</div>
<?	endif;
endforeach; 

wp_reset_postdata();

?>