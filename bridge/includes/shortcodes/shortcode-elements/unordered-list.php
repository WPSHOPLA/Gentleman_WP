<?php
/* Unordered List shortcode */
if (!function_exists('unordered_list')) {
    function unordered_list($atts, $content = null) {
        $args = array(
            "style"         => "",
            "animate"       => "",
            'number_type'   => "",
            "font_weight"   => ""
        );

        extract(shortcode_atts($args, $atts));

        $list_item_classes = "";

        if($style != "") {
            $list_item_classes .= "{$style}";
        }

        if($number_type != "") {
            $list_item_classes .= " {$number_type}";
        }

        if($font_weight != "") {
            $list_item_classes .= " {$font_weight}";
        }

        $html =  "<div class='q_list $list_item_classes";
        if($animate == "yes"){
            $html .= " animate_list'>" . $content . "</div>";
        } else {
            $html .= "'>" . $content . "</div>";
        }
        return $html;
    }
    add_shortcode('unordered_list', 'unordered_list');
}