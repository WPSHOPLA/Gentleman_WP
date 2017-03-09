<?php
/* Progress bar vertical shortcode */
if (!function_exists('progress_bar_vertical')) {

    function progress_bar_vertical($atts, $content = null) {
        $args = array(
            "title"                             => "",
            "title_color"                       => "",
            "title_tag"                         => "h5",
            "title_size"                        => "",
            "percent"                           => "100",
            "percentage_text_size"              => "",
            "percent_color"                     => "",
            "bar_color"                         => "",
            "bar_border_color"                  => "",
            "background_color"                  => "",
            "border_radius"     	            => "",
            "text"                              => ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html               = "";
        $title_styles       = "";
        $bar_styles         = "";
        $percentage_styles  = "";
        $bar_holder_styles  = "";

        //generate styles
        if($title_color != "") {
            $title_styles .= "color:".$title_color.";";
        }

        if($title_size != "") {
            $title_styles .= "font-size:".$title_size."px;";
        }

        //generate bar holder gradient styles
        if($background_color != "") {
            $bar_holder_styles .= "background-color: " . $background_color . ";";
        }

        if($border_radius != "") {
            $bar_holder_styles .= "border-radius: " . $border_radius . "px " . $border_radius . "px 0 0;border-radius: " . $border_radius . "px " . $border_radius . "px 0 0;border-radius: " . $border_radius . "px " . $border_radius . "px 0 0;";
        }

        //generate bar gradient styles
        if($bar_color != "") {
            $bar_styles .= "background-color: " . $bar_color . ";";
        }

        if($bar_border_color != "") {
            $bar_styles .= "border: 1px solid ".$bar_border_color.";";
        }

        if($percentage_text_size != "") {
            $percentage_styles .= "font-size: ".$percentage_text_size."px;";

        }

        if($percent_color != "") {
            $percentage_styles .= "color: ".$percent_color.";";
        }

        $html .= "<div class='q_progress_bars_vertical'>";
        $html .= "<div class='progress_content_outer' style='".$bar_holder_styles."'>";
        $html .= "<div data-percentage='$percent' class='progress_content' style='".$bar_styles."'></div>";
        $html .= "</div>"; //close progress_content_outer
        $html .= "<{$title_tag} class='progress_title' style='".$title_styles."'>$title</{$title_tag}>";
        $html .= "<span class='progress_number' style='".$percentage_styles."'>";
        $html .= "<span>$percent</span>%";
        $html .= "</span>"; //close progress_number
        $html .= "<span class='progress_text'>".$text."</span>"; //close progress_number
        $html .= "</div>"; //close progress_bars_vertical

        return $html;
    }
    add_shortcode('progress_bar_vertical', 'progress_bar_vertical');
}