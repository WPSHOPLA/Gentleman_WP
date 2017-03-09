<?php
/* Video Box Shortcode */
if (!function_exists('qode_video_box')) {

    function qode_video_box($atts) {
        extract(shortcode_atts(
            array(
                "video_link" => "",
                "video_image" => ""
            ), $atts));


        $html = "";
        $html .= '<div class="qode_video_box">';
        $html .= '<a itemprop="image" class="qode_video_image" href="'. esc_url($video_link) .'" data-rel="prettyPhoto">';
        $html .= wp_get_attachment_image($video_image,'full');
        $html .= '<span class="qode_video_box_button_holder"><span class="qode_video_box_button"><span class="qode_video_box_button_arrow"></span>';
        $html .= '</span></span>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    add_shortcode('qode_video_box', 'qode_video_box');
}