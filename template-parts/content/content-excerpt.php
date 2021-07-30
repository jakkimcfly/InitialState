<?php
/**
 * Template part for displaying post archives and search results
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post-header">
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
        <?php edit_post_link(); ?>
    </header>
    <div class="post-content">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php endif; ?>
        <?php the_excerpt(); ?>
    </div>
    <div class="post-meta">
        <span class="author vcard"><?php the_author_posts_link(); ?></span>
        <span class="meta-sep"> | </span>
        <span class="post-date"><?php the_time(get_option('date_format')); ?></span>
    </div>
    <footer class="post-footer">
        <span class="cat-links"><?php esc_html_e('Categories: ', 'initialstate'); ?><?php the_category(', '); ?></span>
        <span class="tag-links"><?php the_tags(); ?></span>
        <?php if (comments_open()) {
            echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url(get_comments_link()) . '">' . sprintf(esc_html__('Comments', 'initialstate')) . '</a></span>';
        } ?>
    </footer>
</article>