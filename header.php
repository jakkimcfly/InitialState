<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <header id="site-header">
            <div class="container">
                <?php if ( has_custom_logo() ) : ?>
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
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(
                        array(
                            'container'         => 'nav',
                            'container_id'      => 'primary-menu',
                            'container_class'   => 'menu',
                            'items_wrap'        => '<ul class="menu-container">%3$s</ul>',
                            'theme_location'    => 'primary',
                        )
                    );
                }
                ?>
            </div>
        </header>
        <div id="wrapper">