<?php get_header(); ?>

<div class="content">

<div class="slideshow">

<?php

	$images = get_posts( 
	array(
		'post_type' => 'attachment', 
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'imagetag',
				'field' => 'slug',
				'terms' => $wp_query->queried_object->slug
			)
		)
	)  
);

//print_r($images);

$imageids = Array();

if ( !empty($images) ) {
	foreach ( $images as $image ) {
		$imageids[] = $image->ID;
	}
}

//print_r($imageids);

the_calcott_gallery($imageids); 

?>

	<div class="gutter"></div>
</div>

</div>
<?php get_footer(); ?>