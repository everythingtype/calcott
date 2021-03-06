

<?php

$theslug = get_ID_by_slug('carousel');

$args = array(
	'post_type' => 'page',
	'sort_column' => 'post_date',
	'include' => $theslug
);

$pages = get_pages($args);

foreach ($pages as $post) : setup_postdata($post); ?>

<div class="frames">
<?
	$rows = get_field('images'); 
	shuffle($rows);

	$rowcount = count($rows);
	$framecount = 1;

	foreach($rows as $row) :

		$image = $row['image'];
		$caption = $row['caption'];

		if ( $image ) : 
?>

	<div class="frame">
	
		<div class="frameimagewrap">
			<div class="frameimage" style="background-image: url('<?php echo $image['sizes']['full-width'];?>'); ">
				<div class="ratio"></div>
			</div>
		</div>
		<div class="carouselcaption">
			<?php echo $caption;?>
			<p class="captioncount"><?php echo sprintf("%02s", $framecount); ?>/<?php echo $rowcount; ?></p>
		</div>

	</div>

<?
			$framecount++;

		endif;

	endforeach;
?>

</div>

<?php
endforeach; 

wp_reset_postdata();

?>
