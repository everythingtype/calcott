<?php

function wptp_add_imagetag_taxonomy() {
    $labels = array(
        'name'              => 'Image Tags',
        'singular_name'     => 'Image Tag',
        'search_items'      => 'Search Image Tags',
        'all_items'         => 'All Image Tags',
        'parent_item'       => 'Parent Image Tag',
        'parent_item_colon' => 'Parent Image Tag:',
        'edit_item'         => 'Edit Image Tag',
        'update_item'       => 'Update Image Tag',
        'add_new_item'      => 'Add New Image Tag',
        'new_item_name'     => 'New Image Tag Name',
        'menu_name'         => 'Image Tags',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => array( 'slug' => 'index' ),
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'imagetag', 'attachment', $args );
}
add_action( 'init', 'wptp_add_imagetag_taxonomy' );


function the_random_page_or_tag() {

	$thelinks = Array();

	$mypages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'page-gallery.php',
		'hierarchical' => 0 ,
		'exclude_tree' => 196 , 
		'exclude_tree' => 217 
	));

	foreach ( $mypages as $mypage ) :
		$thelinks[] = get_permalink($mypage->ID);
	endforeach;

	$mycats = get_terms( 'imagetag', array(
		'hide_empty' => true,
		'hierarchical' => true
	));

//	print_r($mycats);

	foreach ( $mycats as $mycat ) :

		// Show if the term contains or more items
		// Because "hide_empty" is set to "true," a zero-count means it's a category

		if ( $mycat->count == 0 || $mycat->count > 4 ) :
			$thelinks[] = get_term_link( $mycat->slug, 'imagetag' );
		endif;


	endforeach;

//	print_r($thelinks);

	$rand_key = array_rand($thelinks, 1);
	
	echo $thelinks[$rand_key];
}

function the_recursive_index() {

	echo get_recursive_index();
}

function get_recursive_index( $parent = 0 ) {

	$output = '';

	$taxonomy_name = 'imagetag';

	$mycats = get_terms( $taxonomy_name, array(
		'hide_empty' => false,
		'parent' => $parent
	));

	foreach ( $mycats as $mycat ) : 

		$termlink = get_term_link( $mycat->slug, $taxonomy_name ); 
		$termname = $mycat->name; 
		$termcount = $mycat->count; 
		$termparent = $mycat->parent; 
		$termslug = $mycat->slug;

		$children = get_recursive_index( $mycat->term_id );

		if ( $children ) :
			if ( $termparent != 0 ) :
				$output .= '<li><a href="' . $termlink . '" class="' . $termslug . '">' . $termname . '</a><ul>' . $children . '</ul></li>';
			else :
				$output .= '<li class="headerterm"><span>' . $termname . '</span><ul class="firstchild">' . $children . '</ul></li>';
			endif;
		else :
			if ( $termcount > 2 ) :
				$output .= '<li><a href="' . $termlink . '" class="' . $termslug . '">' . $termname . '</a></li>';
			endif;
		endif;

	endforeach;

	if ( $output != '' ) :
		return '<ul>' . $output . '</ul>';
	endif;

}



?>