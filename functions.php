<?php
/**
 * InitialState functions and definitions
 */

define('INITIALSTATE_VERSION', wp_get_theme()->get('Version'));
define('INITIALSTATE_ASSETS', trailingslashit(get_template_directory_uri()) . 'assets/');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function initialstate_setup() {
    load_theme_textdomain('initialstate', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );
}
add_action('after_setup_theme', 'initialstate_setup');

/**
 * Add support for core custom logo.
 */

$logo_width  = 120;
$logo_height = 50;

add_theme_support(
    'custom-logo',
    array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => true,
    )
);

/**
 * Register and Enqueue Styles.
 */
function initialstate_register_styles() {
    wp_enqueue_style('initialstate-style', INITIALSTATE_ASSETS . 'css/style.css', array(), INITIALSTATE_VERSION);
}
add_action('wp_enqueue_scripts', 'initialstate_register_styles');

/**
 * Register and Enqueue Scripts.
 */
function initialstate_register_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('initialstate-js', INITIALSTATE_ASSETS . 'js/index.js', array(), INITIALSTATE_VERSION, true);
}
add_action('wp_enqueue_scripts', 'initialstate_register_scripts');

/**
 * Register navigation menus.
 */
function initialstate_menus() {
    $locations = array(
        'primary'  => __('Main Navigation Menu', 'initialstate'),
        'mobile'   => __('Main Mobile Menu', 'initialstate'),
        'footer'   => __('Footer Menu', 'initialstate'),
    );
    register_nav_menus($locations);
}
add_action('init', 'initialstate_menus');

/**
 * Register widget areas.
 */
function initialstate_widgets_init() {

    // Default Arguments for register_sidebar() calls.
    $shared_args = array(
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget'  => '</li>',
    );

    // Default Sidebar
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => 'Sidebar Widget Area',
                'id'          => 'sidebar',
                'description' => 'Main Sidebar Area',
            )

        )
    );
}
add_action('widgets_init', 'initialstate_widgets_init');


/**
 * REQUIRED FILES
 * Include required files.
 */

// Clean HTML (Remove js/css files from header/footer in frontend and deactivate some WP Core and some plugins parts)
require_once get_template_directory() . '/inc/wordpress.php';

// Shortcodes
require_once get_template_directory() . '/inc/shortcodes.php';

// Theme functions
require_once get_template_directory() . '/inc/theme-functions.php';

// WooCommerce functions
require_once get_template_directory() . '/inc/woocommerce.php';