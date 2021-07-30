<?php
/**
 * Custom shortcodes
 */

// Include template part
function include_template_part($atts) {
    ob_start();
    $atts = shortcode_atts([
        'path' => '',
    ], $atts);

    get_template_part("template-parts/{$atts['path']}");
    return ob_get_clean();
}
add_shortcode('inc_part', 'include_template_part');