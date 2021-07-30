<?php
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
    add_theme_support('woocommerce');
}

/* Remove WooCommerce styles */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
