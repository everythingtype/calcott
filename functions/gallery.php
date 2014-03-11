<?php

function the_calcott_gallery($imageids) {

	$numItems = count( $imageids );
	
	$output = '';
	$i = 0; 
	
	foreach ( $imageids as $imageid ) :
	
		$big_array = image_downsize( $imageid, 'large' );
 		$img_url = $big_array[0];

		$imageobject = get_post( $imageid );

		$img_title = $imageobject->post_title;   // title.
		$img_caption = $imageobject->post_excerpt; // caption.
		$img_description = $imageobject->post_content; // description.

		$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt
		if ($img_alt == '') : $img_alt = $img_title; endif;


	
		$output .= '<div class="slide" id="slide' . $i . '"><div class="slideinner">';
	
			$i++; 
			if ($i === $numItems ) $i = 0;

			$output .= '<a><img src="' . $img_url . '" alt="' . $img_alt . '" /></a>';
			// href="#slide' . $i . '"

			if ( $img_caption ) :
				$output .= '<div class="caption">' . wpautop($img_caption) . '</div>';
			endif; 
		$output .= '</div></div>';
	
	endforeach;

	echo $output;

} 

?>