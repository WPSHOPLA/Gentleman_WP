<?php
/* Progress bar horizontal shortcode */
if (!function_exists('progress_bar')) {

    function progress_bar($atts, $content = null) {
        $args = array(
            "title"                     				=> "",
            "title_color"               				=> "",
            "title_tag"                 				=> "h5",
            "percent"                   				=> "",
            "percent_color"             				=> "",
            "percent_font_size"         				=> "",
            "percent_font_weight"       				=> "",
            "active_background_color"   				=> "",
            "active_border_color"       				=> "",
            "noactive_background_color" 				=> "",
            "noactive_background_color_transparency" 	=> "",
            "height"                    				=> "",
            "border_radius"            					=> ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html                           = "";
        $progress_title_holder_styles   = "";
        $number_styles                  = "";
        $outer_progress_styles          = "";
        $percentage_styles              = "";

        //generate styles
        if ($title_color != "") {
            $progress_title_holder_styles .= "color: " . $title_color . ";";
        }

        if ($percent_color != "") {
            $number_styles .= "color: " . $percent_color . ";";
        }

        if ($percent_font_size != "") {
            $number_styles .= "font-size: " . $percent_font_size . "px;";
        }
        if ($percent_font_weight != "") {
            $number_styles .= "font-weight: " . $percent_font_weight . ";";
        }
        if ($height != "") {
            $valid_height = (strstr($height, 'px', true)) ? $height : $height . "px";
            $outer_progress_styles .= "height: " . $valid_height . ";";
            $percentage_styles .= "height: " . $valid_height . ";";
        }

        if ($border_radius != "") {
            $border_radius = (strstr($border_radius, 'px', true)) ? $border_radius : $border_radius . "px";
            $outer_progress_styles .= "border-radius: " . $border_radius . ";-moz-border-radius: " . $border_radius . ";-webkit-border-radius: " . $border_radius . ";";
        }

        if ($noactive_background_color != "") {

            if($noactive_background_color_transparency !== '' && ($noactive_background_color_transparency >= 0 && $noactive_background_color_transparency <= 1)) {
                $noactive_background_color = qode_hex2rgb($noactive_background_color);

                $outer_progress_styles .= "background-color: rgba(".$noactive_background_color[0].", ".$noactive_background_color[1].", ".$noactive_background_color[2].", ".$noactive_background_color_transparency.");";
            } else {
                $outer_progress_styles .= "background-color: " . $noactive_background_color . ";";
            }
        }

        if ($active_background_color != "") {
            $percentage_styles .= "background-color: " . $active_background_color . ";";
        }

        if($active_border_color != "") {
            $percentage_styles .= "border: 1px solid " . $active_border_color . ";";
        }

        $html .= "<div class='q_progress_bar'>";
        $html .= "<{$title_tag} class='progress_title_holder clearfix' style='{$progress_title_holder_styles}'>";
        $html .= "<span class='progress_title'>";
        $html .= "<span>$title</span>";
        $html .= "</span>"; //close progress_title

        $html .= "<span class='progress_number' style='{$number_styles}'>";
        $html .= "<span>0</span>%</span>";
        $html .= "</{$title_tag}>"; //close progress_title_holder

        $html .= "<div class='progress_content_outer' style='{$outer_progress_styles}'>";
        $html .= "<div data-percentage='" . $percent . "' class='progress_content' style='{$percentage_styles}'>";
        $html .="</div>"; //close progress_content
        $html .= "</div>"; //close progress_content_outer

        $html .= "</div>"; //close progress_bar
        return $html;
    }
    add_shortcode('progress_bar', 'progress_bar');
}