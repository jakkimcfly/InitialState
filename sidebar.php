<?php
/**
 * The template for displaying sidebar
 */

if (is_active_sidebar('sidebar')) : ?>
    <aside id="sidebar">
        <ul class="widgets">
            <?php dynamic_sidebar('sidebar'); ?>
        </ul>
    </aside>
<?php endif; ?>