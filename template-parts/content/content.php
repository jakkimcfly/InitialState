<?php
/**
 * Template part for displaying posts (index.php)
 */
?>

<div class="page-content">
    <?php
    if (have_posts()) {

        // loop
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content/content', 'excerpt');
        }

        // Navigation
        get_template_part('template-parts/navigation/nav');
    } else {
        get_template_part('template-parts/content/content', 'none');
    }
    ?>
</div>