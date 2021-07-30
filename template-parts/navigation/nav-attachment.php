<?php
// Parent post navigation.

$args = array(
    'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'initialstate'), '%title'),
);

the_post_navigation($args);