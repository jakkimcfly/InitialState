    </div>
    <footer id="site-footer">
        <div class="container">
            <div class="site-info">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
                <div class="branding">
                    <div class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
                    </div>
                    <div class="site-description">
                        <?php bloginfo('description'); ?>
                    </div>
                </div>
            </div>
            <?php
            if (has_nav_menu('footer')) {
                wp_nav_menu(
                    array(
                        'container'         => 'nav',
                        'container_id'      => 'footer-menu',
                        'container_class'   => 'menu',
                        'items_wrap'        => '<ul class="menu-container">%3$s</ul>',
                        'theme_location'    => 'footer',
                    )
                );
            }
            ?>
        </div>
        <div id="copyright">
            <div class="container">
                &copy; <?php echo esc_html(date_i18n(__('Y', 'initialstate'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>

    </html>