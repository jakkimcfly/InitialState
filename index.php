<?php
/**
 * The main template file
 */

get_header(); ?>
<div id="primary" class="container">
    <main id="content">
        <?php get_template_part('template-parts/content/content'); ?>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>