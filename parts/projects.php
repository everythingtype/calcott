<?php

$theslug = get_ID_by_slug('projects');

$args = array(
	'post_type' => 'page',
	'parent' => $theslug,
	'sort_column' => 'menu_order'
);

$postslist = get_pages($args);

foreach ($postslist as $post) : setup_postdata($post);
	if ( has_post_thumbnail()) :
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
		<div class="thumb">
			<div class="thumbinner">
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" /></a>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			</div>
		</div>
<?	endif;
endforeach; 

wp_reset_postdata();

?>