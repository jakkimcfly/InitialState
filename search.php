<?php
/**
 * The template for displaying search results
 */

get_header();
get_breadcrumbs(); ?>
<div id="primary" class="container">
    <main id="content">
        <?php get_template_part('template-parts/content/content', 'search'); ?>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>