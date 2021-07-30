<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

$comment_count = get_comments_number();
?>

<div id="comments" class="comments-area <?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            if ('1' === $comment_count){
                esc_html_e('1 comment', 'initialstate');
            }else {
                printf(
                    esc_html(_nx('%s comment', '%s comments', $comment_count, 'Comments title', 'initialstate')),
                    esc_html(number_format_i18n($comment_count))
                ); 
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'avatar_size' => 60,
                    'style'       => 'ol',
                    'short_ping'  => true,
                )
            );
            ?>
        </ol>

        <?php
        the_comments_pagination(
            array(
                'before_page_number' => esc_html__('Page', 'initialstate') . ' ',
                'mid_size'           => 0,
                'prev_text'          => sprintf(
                    '%s <span class="nav-prev-text">%s</span>',
                    '« Previous',
                    esc_html__('Older comments', 'initialstate')
                ),
                'next_text'          => sprintf(
                    '<span class="nav-next-text">%s</span> %s',
                    esc_html__('Newer comments', 'initialstate'),
                    'Next »'
                ),
            )
        );
        ?>
        
        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'initialstate'); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    // Comment form
    $form_args = array(
        'logged_in_as'       => null,
        'title_reply'        => esc_html__('Leave a comment', 'initialstate'),
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
    );
    
    comment_form( $form_args);
    ?>
</div>