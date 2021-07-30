<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<header class="page-header">
    <h1 class="page-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header>
<div class="page-content">
    <?php the_content(); ?>
    <?php 
    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . __('Pages:', 'initialstate'),
            'after'  => '</div>',
        )
    );
    ?>
</div>