<?php
/**
 * Template part for displaying search results in search.php
 */
?>

<header class="page-header">
    <h1 class="page-title">
        <?php _e('Search results for: ', 'initialstate'); ?>
        <span class="page-description"><?php echo get_search_query(); ?></span>
    </h1>
</header>
<div class="page-content">
    <?php 
    if (have_posts()) {

        // Loop
        while(have_posts()){
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

