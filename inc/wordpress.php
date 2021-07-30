<?php
/**
 * Remove WordPress Core parts
 */

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'previous_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

remove_action('wp_head', '_ak_framework_meta_tags');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

function disable_wp_emojis_in_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}
add_filter('tiny_mce_plugins', 'disable_wp_emojis_in_tinymce');


// Disable Gutenberg editor
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Don't load Gutenberg-related stylesheets.
add_action('wp_enqueue_scripts', 'remove_block_css', 100);
function remove_block_css() {
    wp_dequeue_style('wp-block-library'); // Wordpress core
    wp_dequeue_style('wp-block-library-theme'); // Wordpress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}

/**
 * Deactivate JQuery in frontend
 * (if you don't use Jquery on your website, you need uncomment add_filter('wp_default_scripts', 'remove_jquery');
 */
function remove_jquery(&$scripts) {
    if (!is_admin()) {
        $scripts->remove('jquery');
    }
}
// add_filter('wp_default_scripts', 'remove_jquery');

// Deactivate Jquery migrate
add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});


// Remove WP Gallery style
add_filter('use_default_gallery_style', '__return_false');

// Remove srcset from img tag
add_filter('wp_calculate_image_srcset', '__return_false');


/**
 * Deactive plugins parts (css/js files)
 * and delete comments from head and footer
 */

// Remove SEO Yoast comments
add_action('get_header', 'rmyoast_ob_start');
add_action('wp_head', 'rmyoast_ob_end_flush', 100);

function rmyoast_ob_start() {
    ob_start('remove_yoast');
}
function rmyoast_ob_end_flush() {
    ob_end_flush();
}
function remove_yoast($output) {
    if (defined('WPSEO_VERSION')) {
        $output = str_ireplace('<!-- This site is optimized with the Yoast SEO plugin v' . WPSEO_VERSION . ' - https://yoast.com/wordpress/plugins/seo/ -->', '', $output);
        $output = str_ireplace('<!-- / Yoast SEO plugin. -->', '', $output);
    }
    return $output;
}

// Remove the Site Kit by Google generator
add_action('get_header', function() {
    ob_start(function($o) {
        return preg_replace('/\n?<.*?content="Site Kit by Google.*?>/mi', '', $o);
    });
});

add_action('wp_head', function() {
    ob_end_flush();
}, 992);

// Contact form 7
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');
