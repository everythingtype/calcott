<div class="maxwidth">
    <div class="breadcrumbs"><p>
        <?php if ( is_page_or_subpage_of('portfolios') ) : ?>
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
            <a href="/index">Index</a> &gt; <?php echo $wp_query->queried_object->name; ?>
        <?php else: ?>
            &nbsp;
        <?php endif; ?>
    </p></div>
</div>
