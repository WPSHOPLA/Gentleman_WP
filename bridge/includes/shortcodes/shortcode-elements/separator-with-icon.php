<?php
/* Separator with Icon shortcode */
if (!function_exists('separator_with_icon')) {
    function separator_with_icon($atts, $content = null) {
        $args = array(
            "icon"      => "fa-codepen",
            "color"     => "",
            "opacity"   => "",
        );

        extract(shortcode_atts($args, $atts));

        $separator_style = "";

        if($color != "" || $opacity != '') {
            $separator_style .= "style='";

            if($color != "") {
                $separator_style .= "color:" . $color . ";";
            }

            if($opacity != "") {
                $separator_style .= "opacity:" . $opacity . ";";
            }

            $separator_style .= "'";
        }

        $html = '<span class="separator_with_icon" '.$separator_style.'><i class="fa '.$icon.'"></i></span>';
        return $html;
    }
    add_shortcode('separator_with_icon', 'separator_with_icon');
}