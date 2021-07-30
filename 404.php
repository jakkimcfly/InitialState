<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
get_breadcrumbs(); ?>
<div id="primary" class="container">
    <main id="content">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'initialstate'); ?></h1>
        </header>
        <div class="page-content">
             <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'initialstate' ); ?></p>
             <?php get_search_form(); ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>