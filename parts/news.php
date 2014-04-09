<?php

$theslug = get_ID_by_slug('news');

$args = array(
	'post_type' => 'page',
	'include' => $theslug
);

$postslist = get_pages($args);

foreach ($postslist as $post) : setup_postdata($post);

	$rows = get_field('item');

	foreach($rows as $row) :

		echo '<div class="item">';
			if ( $row['when'] ) echo '<h3>' . $row['when'] . '</h3>';
			if ( $row['what'] ) echo wpautop( $row['what'] );
			if ( $row['image'] ) echo '<img src="' . $row['image']['sizes']['large'] . '" alt="" />';
		echo '</div>';

	endforeach;

endforeach; 

wp_reset_postdata();

?>