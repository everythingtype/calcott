<div id="news">
	<div class="inner">
		<a class="close" title="Close"><span>Close</span></a>
		<h2>News</h2>

<?php

$theslug = get_ID_by_slug('news');

$args = array(
	'post_type' => 'page',
	'include' => $theslug
);

$postslist = get_pages($args);

foreach ($postslist as $post) : setup_postdata($post);

	$rows = get_field('item');
	$count = 1; 

	foreach($rows as $row) :
		if ( $count < 4 ) :
			echo '<div class="item">';
				if ( $row['when'] ) echo '<h3>' . $row['when'] . '</h3>';
				if ( $row['what'] ) echo wpautop( $row['what'] );
				if ( $row['image'] ) echo '<img src="' . $row['image']['sizes']['large'] . '" alt="" />';
			echo '</div>';
			$count++;
		endif;
	endforeach;

endforeach; 

wp_reset_postdata();

?>

	</div>
</div>
