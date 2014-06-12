<?php

function the_calcott_gallery($imageids) {

	$numItems = count( $imageids );
	
	$output = '';
	$i = 0; 
	
	foreach ( $imageids as $imageid ) :
	
		$largesize = image_downsize( $imageid, 'large' );
		$large_url = $largesize[0];

		$mediumsize = image_downsize( $imageid, 'medium' );
		$medium_url = $mediumsize[0];

		$imageobject = get_post( $imageid );

		$img_title = $imageobject->post_title;   // title.
		$img_caption = $imageobject->post_excerpt; // caption.
		$img_description = $imageobject->post_content; // description.

		$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt

		if ($img_alt == '') : 
			$img_alt = $img_title; 
		endif;

		$output .= '<div class="slide" id="slide' . $i . '"><div class="slideinner">';

		$output .= '<a class="gallery" href="' . $large_url . '" data-caption="';

		if ( $img_caption ) $output .= $img_caption;

		$output .= '"><img src="' . $medium_url . '" alt="' . $img_alt . '" />';

		$output .= '</a></div></div>';

		$i++; 
		if ($i === $numItems ) $i = 0;

	endforeach;

	echo $output;

} 

?>