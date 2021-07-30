<?php
/**
 * Template part for displaying a message that posts cannot be found
 */
?>

<?php if (is_archive()) : ?>
    <section class="no-results not-found">
        <p><?php esc_html_e('Nothing found for the requested page. Try a search instead?', 'initialstate'); ?></p>
        <?php get_search_form(); ?>
    </section>
<?php elseif (is_search()) : ?>
    <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'initialstate'); ?></p>
    <?php get_search_form(); ?>
<? else : ?>
    <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'initialstate'); ?></p>
    <?php get_search_form(); ?>
<? endif; ?>