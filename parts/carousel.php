

<?php

$theslug = get_ID_by_slug('carousel');

$args = array(
	'post_type' => 'page',
	'include' => $theslug
);

$pages = get_pages($args);

foreach ($pages as $post) : setup_postdata($post); ?>

<div class="frames">
<?
	$rows = get_field('images'); 
	foreach($rows as $row) :

		$image = $row['image'];

		if ( $image ) : 
?>

	<div class="frame"><div class="frameimage" style="background-image: url('<?php echo $image['sizes']['large'];?>'); "><div class="ratio"></div></div>

	</div>

<?
		endif;

	endforeach;
?>

</div>

<?php
endforeach; 

wp_reset_postdata();

?>
