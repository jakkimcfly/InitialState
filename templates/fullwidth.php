<?php
/*
Template Name: Full Width Template
Template Post Type: page
*/

get_header();
get_breadcrumbs(); ?>
<div id="primary" class="container fullwidth">
    <main id="content">
        <?php get_template_part('template-parts/content/content', 'page'); ?>
    </main>
</div>
<?php get_footer(); ?>