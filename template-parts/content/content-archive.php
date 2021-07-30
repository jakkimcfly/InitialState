<?php
/**
 * Template part for displaying page content in archive.php
 */
?>

<header class="page-header">
    <h1 class="page-title">
        <?php single_term_title(); ?>
    </h1>
    <?php $archive_description = get_the_archive_description();
    if ($archive_description) {
        echo '<div class="archive-meta">' . $archive_description . '</div>';
    } ?>
</header>
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