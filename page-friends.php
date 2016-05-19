<?php 

/* Template Name: Friends */

get_header(); ?>

		<div class="maxwidth"><div class="links">
				<ul>
                    <li class="headerterm">
                    	<span>Friends</span>
                        <ul>
                            <?php 
                            
                                $args = array(
                                    'title_before'     => '<span>',
                                    'title_after'      => '</span>' );
                            
                                wp_list_bookmarks( $args ); 
                            ?>
                        </ul>
                    </li>
                </ul> 
                            
        </div></div>

<?php get_footer(); ?>


