<?php
/**
 * The template for displaying all single posts
 */

get_header();
get_breadcrumbs(); ?>
<div id="primary" class="container">
    <main id="content">
        <?php
        while (have_posts()) {

            the_post();
            get_template_part('template-parts/content/content', 'single');
            
            // Navigation
            if (is_singular('post')) {
                get_template_part('template-parts/navigation/nav', 'single');
            } elseif (is_singular('attachment')) {
                get_template_part('template-parts/navigation/nav', 'attachment');  
            }
        }
        
        // Comments
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>