<?php
/* Dropcaps shortcode */
if (!function_exists('dropcaps')) {
    function dropcaps($atts, $content = null) {
        $args = array(
            "color"             => "",
            "font_size"  => "",
            "background_color"  => "",
            "border_color"      => "",
            "type"              => ""
        );
        extract(shortcode_atts($args, $atts));

        $html = "<span class='q_dropcap ".$type."' style='";
        if($background_color != ""){
            $html .= "background-color: $background_color;";
        }
        if($color != ""){
            $html .= " color: $color;";
        }
        if ($font_size != "") {
            $html .= 'font-size: ' . $font_size . 'px;';
        }
        if($border_color != ""){
            $html .= " border-color: $border_color;";
        }
        $html .= "'>" . $content  . "</span>";

        return $html;
    }
    add_shortcode('dropcaps', 'dropcaps');
}