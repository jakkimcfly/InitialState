<?php
/**
 * Template part for displaying  single post in single.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php edit_post_link(); ?>
    </header>
    <div class="post-content">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail();
        } ?>
        <?php the_content(); ?>
        <div class="post-links"><?php wp_link_pages(); ?></div>
    </div>
    <div class="post-meta">
        <span class="author vcard"><?php the_author_posts_link(); ?></span>
        <span class="meta-sep"> | </span>
        <span class="post-date"><?php the_time(get_option('date_format')); ?></span>
    </div>
    <footer class="post-footer">
        <span class="cat-links"><?php esc_html_e('Categories: ', 'initialstate'); ?><?php the_category(', '); ?></span>
        <span class="tag-links"><?php the_tags(); ?></span>
    </footer>
    <?php if( !is_singular('attachment') && (bool) get_the_author_meta('description') ): ?>
    <div class="author-bio">
        <h2 class="author-title">
            <span class="author-heading">
                <?php printf(__( 'Published by %s', 'initialstate' ),esc_html( get_the_author() )); ?>
            </span>
        </h2>
        <p class="author-description">
            <?php the_author_meta( 'description' ); ?>
            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php _e( 'View more posts', 'initialstate' ); ?>
            </a>
        </p>
    </div>
    <?php endif; ?>
</article>