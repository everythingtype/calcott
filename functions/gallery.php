<?php

function the_calcott_gallery($imageids,$size) {

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

		if ( $size == 'thumb') :
			$output .= '<div class="slide" id="slide' . $i . '"><div class="slideinner">';
				$output .= '<a><img src="' . $img_url . '" alt="' . $img_alt . '" /></a>';
			$output .= '</div></div>';
		elseif ( $size == 'enlargement') :

			$output .= '<div class="enlargement">';
				$output .= '<a class="control close" title="Close"><span>Close</span></a>';
				$output .= '<div class="image">';
					$output .= '<img src="' . $img_url . '" alt="' . $img_alt . '" />';
					$output .= '<a class="control prev" title="Previous"><span>&larr;</span></a>';
					$output .= '<a class="control next" title="Next"><span>&rarr;</span></a>';
				$output .= '</div>';
				if ( $img_caption ) :
					$output .= '<div class="caption">' . wpautop($img_caption) . '</div>';
				endif; 
			$output .= '</div>';
		endif; 

		$i++; 
		if ($i === $numItems ) $i = 0;

	endforeach;

	echo $output;

} 

?>