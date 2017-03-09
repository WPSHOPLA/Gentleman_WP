<?php
/* Animation Holder Shortcode */
if (!function_exists('qode_animation_holder')) {
    function qode_animation_holder($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "animation_type" => "",
                "animation_delay" => ""
            ), $atts));

        $html = "";
        $html .= '<div class="qode-animation-holder '. esc_attr($animation_type) .'">';
        $html .= '<div class="qode-animation-holder-inner"  style="-webkit-animation-delay:' . $animation_delay . 's; animation-delay:' . $animation_delay . 's; -webkit-transition-delay:' . $animation_delay . 's; transition-delay:' . $animation_delay . 's">';
        $html .= do_shortcode($content);
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    add_shortcode('qode_animation_holder', 'qode_animation_holder');
}