<?php
/* Ordered List shortcode */
if (!function_exists('ordered_list')) {
    function ordered_list($atts, $content = null) {
        $html =  "<div class=ordered>" . $content . "</div>";
        return $html;
    }
    add_shortcode('ordered_list', 'ordered_list');
}