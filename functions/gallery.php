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

		$img_terms = get_the_terms( $imageobject , 'imagetag' );  //image tags
		
		$img_parent = $imageobject->post_parent; // parent-page.
		$imgparent_name = get_the_title( $img_parent );
		$imgparent_url = get_permalink( $img_parent );
		$imgparent_date = get_the_date( 'Y', $img_parent );
		
		$site_url = get_site_url(); //for use in image tag addresses below
		
		$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt

		if ($img_alt == '') : 
			$img_alt = $img_title; 
		endif;

		$output .= '<div class="slide" id="slide' . $i . '"><div class="slideinner">';

		$output .= '<a class="gallery" href="' . $large_url . '" data-caption="';

		if ( $img_caption ) $output .= $img_caption;
		
		if ( $img_parent ) {
				$output .= ' (<a href=\'' . $imgparent_url . '\'>' . $imgparent_name . '</a>' ;
				if ( $imgparent_name != 'Miscellaneous Client Work') $output .= ', ' . $imgparent_date ;
				$output .= ')' ;
			}
	
		if ( $img_terms ) {
				$output .= '<div class=\'slide_terms\'><ul>';
				foreach ($img_terms as $img_term) {
					$img_term_name = $img_term->name;
					$img_term_slug = $img_term->slug;
					$output .= '<li><a href=\'' . $site_url . '/index/' . $img_term_slug . '\'>' . $img_term_name . '</a></li>';
				}
				unset($img_term); 
				$output .= '</ul></div>';
			};
		
		$output .= '"><img src="' . $medium_url . '" alt="' . $img_alt . '" />';

		$output .= '</a></div></div>';

		$i++; 
		if ($i === $numItems ) $i = 0;

	endforeach;

	echo $output;

} 

?>