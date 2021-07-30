<?php
// Previous/next post navigation.

$args = array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next Post', 'initialstate') . ': </span>' . '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous Post', 'initialstate') . '</span>: ' . '<span class="post-title">%title</span>',
);

the_post_navigation($args);