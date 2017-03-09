<?php
/* Highlights shortcode */
if (!function_exists('highlight')) {
    function highlight($atts, $content = null) {
        extract(shortcode_atts(array("color"=>"","background_color"=>""), $atts));
        $html =  "<span class='highlight'";
        if($color != "" || $background_color != ""){
            $html .= " style='color: ".$color."; background-color:".$background_color.";'";
        }
        $html .= ">" . $content . "</span>";
        return $html;
    }
    add_shortcode('highlight', 'highlight');
}