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


?>