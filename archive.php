<?php
/**
 * The template for displaying archive
 */

get_header();
get_breadcrumbs(); ?>
<div id="primary" class="container">
    <main id="content">
        <?php get_template_part('template-parts/content/content', 'archive'); ?>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>