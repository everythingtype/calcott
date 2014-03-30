<?php

$theslug = get_ID_by_slug('about');

$args = array(
	'post_type' => 'page',
	'include' => $theslug
);

$postslist = get_pages($args);

foreach ($postslist as $post) : 
	setup_postdata($post);
	the_content();
endforeach; 

wp_reset_postdata();

?>