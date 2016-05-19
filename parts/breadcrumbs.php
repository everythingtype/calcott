<div class="maxwidth">
    <div class="breadcrumbs"><p>
		<?php if ( is_page('archive') ) : ?>
            <a href="/#portfolios">Portfolios</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_page_or_subpage_of('archive') ) : ?>
            <a href="/#portfolios">Portfolios</a> &gt; <a href="/portfolios/archive">Archive</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_page_or_subpage_of('clients') ) : ?>
            <a href="/#info">Info</a> &gt; Clients &gt; <?php the_title(); ?>
		<?php elseif ( is_page_or_subpage_of('friends') ): ?>
            <a href="/#info">Info</a> &gt; <?php the_title(); ?>
		<?php elseif ( is_page_or_subpage_of('portfolios') ) : ?>
            <a href="/#portfolios">Portfolios</a> &gt; <?php the_title(); ?>
		<?php elseif ( is_page('yearbook') ): ?>
            <a href="/#projects">Projects</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_page_or_subpage_of('yearbook') ): ?>
            <a href="/#projects">Projects</a> &gt; <a href="/projects/yearbook">Yearbook</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_page_or_subpage_of('projects') ): ?>
            <a href="/#projects">Projects</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_page_or_subpage_of('books') && !is_page('books') ): ?>
            <a href="/books">Artist&rsquo;s Books</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_page_or_subpage_of('exhibitions') ): ?>
            <a href="/#other">Exhibitions</a> &gt; <?php the_title(); ?>
        <?php elseif ( is_tax('imagetag') ): ?>
            <a href="/index">Index</a> &gt; 
                <?php $page_id  = get_queried_object_id();
                    $ancestors = get_ancestors( $page_id , 'imagetag' );
                    foreach ( array_reverse($ancestors) as $ancestor ) { 
                        $term = get_term( $ancestor, 'imagetag' );
                        $name = $term->name;
                        $slug = $term->slug;
						$parent = $term->parent; // checking for parent
						$siteurl = get_site_url() ;
						if ( $parent != 0) { 
                        	echo '<a href=\'' . $siteurl . '/index/' . $slug . '\'>' .$name . '</a> > ' ;
						} else {
                        	echo '<a href=\'' . $siteurl . '/index/\'>' .$name . '</a> > ' ;
						};
                    } ; ?> 
			<?php echo $wp_query->queried_object->name; ?>
        <?php else: ?>
            &nbsp;
        <?php endif; ?>
    </p></div>
</div>
