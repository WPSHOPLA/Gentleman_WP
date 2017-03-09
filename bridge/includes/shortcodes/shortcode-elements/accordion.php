<?php
/* Accordion shortcode */

if (!function_exists('accordion')) {
    function accordion($atts, $content = null) {
        extract(shortcode_atts(array("accordion_type"=>""), $atts));
        return "<div class='q_accordion_holder $accordion_type clearfix'>" . $content . "</div>";
    }
}
add_shortcode('accordion', 'accordion');

/* Accordion item shortcode */
if (!function_exists('accordion_item')) {
    function accordion_item($atts, $content = null) {
        extract(shortcode_atts(array("caption"=>"","title_color"=>"","icon"=>"","icon_color"=>"","background_color"=>""), $atts));
        $html           = '';
        $heading_styles = '';
        $no_icon        = '';

        if($icon == "") {
            $no_icon = 'no_icon';
        }

        if($title_color != "") {
            $heading_styles .= "color: ".$title_color.";";
        }

        if($background_color != "") {
            $heading_styles .= " background-color: ".$background_color.";";
        }

        $html .= "<h5 style='".$heading_styles."'>";
        if($icon != "") {
            $html .= '<div class="icon-wrapper"><i class="fa '.$icon.'" style="color: '.$icon_color.';"></i></div>';
        }
        $html .= "<div class='accordion_mark'></div><span class='tab-title'>".$caption."</span><span class='accordion_icon_mark'></span></h5><div class='accordion_content ".$no_icon."'><div class='accordion_content_inner'>" . $content . "</div></div>";

        return $html;
    }
    add_shortcode('accordion_item', 'accordion_item');
}
