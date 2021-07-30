<?php
/**
 * The searchform.php template
 * (Used any time that get_search_form() is called.)
 */

 /*
 * Generate a unique ID for each form
 * if one was passed to get_search_form() in the args array.
 */
$unique_id = wp_unique_id('search-form-');
?>

<form role="search" method="get" <?php echo $unique_id; ?> class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text" for="s"><?php _e( 'Search&hellip;', 'initialstate' )?></label>
    <input type="text" class="search-field" value="<?php echo get_search_query() ?>" name="s" id="s" />
    <input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'submit button', 'initialstate' ); ?>" />
</form>