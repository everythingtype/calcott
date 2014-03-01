<?php

function the_calcott_gallery($imageids) {

	$numItems = count( $imageids );
	
	$output = '';
	$i = 0; 
	
	foreach ( $imageids as $imageid ) :
	
		$alt = ""; 
	
		$big_array = image_downsize( $imageid, 'large' );
 		$img_url = $big_array[0];
	
		$output .= '<div class="slide" id="slide' . $i . '">';
	
			$i++; 
			if ($i === $numItems ) $i = 0;

			$output .= '<a class="slideinner" href="#slide' . $i . '"><img src="' . $img_url . '" alt="' . $alt . '" /></a> ';
	
		$output .= '</div>';
	
	endforeach;

	echo $output;

} 

?>