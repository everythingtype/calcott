<?php 

/* Template Name: Index */

get_header(); ?>

<div class="maxwidth"><div class="index">
	<?php the_recursive_index(); ?>
	<ul>
		<li class="headerterm"><span>All Pages</span>
			<ul>
				<?php //Outputting all pages in non hierarchical list
				$args = array(
					'sort_order' => 'asc',
					'sort_column' => 'post_title',
					'hierarchical' => 0,
					'exclude' => '2577, 2674, 189, 192, 194, 1175',
					'post_type' => 'page',
					'post_status' => 'publish'
				); 
				  $pages = get_pages($args); 
 				   foreach ( $pages as $page ) {
				  	$option = '<li><a href="' . get_page_link( $page->ID ) . '">';
					$option .= $page->post_title;
					$option .= '</a></li>';
					echo $option;
				   }
				?>
			</ul>
		</li>
	</ul>
	<ul>
		<li class="headerterm"><span>Recently Modified</span>
			<ul>
				<?php //Outputting all pages in non hierarchical list
				$args = array(
					'sort_order' => 'desc',
					'sort_column' => 'post_modified',
					'hierarchical' => 0,
					'exclude' => '2577, 2674, 189, 192, 194, 1175',
					'post_type' => 'page',
					'number' => 5,
					'post_status' => 'publish'
				); 
				  $pages = get_pages($args); 
 				   foreach ( $pages as $page ) {
				  	$option = '<li><a href="' . get_page_link( $page->ID ) . '">';
					$option .= $page->post_title;
					$option .= '</a></li>';
					echo $option;
				   }
				?>
			</ul>
		</li>
	</ul>
</div></div>

<?php get_footer(); ?>