<?php

function get_breadcrumbs($pages = null) {
    if(!is_page($pages) || !$pages) {
        get_template_part('template-parts/breadcrumbs');
    } else {
        return false;
    }
}