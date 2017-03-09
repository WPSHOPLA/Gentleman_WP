<?php
/* Counter shortcode */
if (!function_exists('counter')) {
    function counter($atts, $content = null) {
        $args = array(
            "type"              		=> "",
            "box"               		=> "",
            "box_border_color"  		=> "",
            "position"          		=> "",
            "digit"             		=> "",
            "font_size"         		=> "",
            "font_weight"       		=> "",
            "font_color"        		=> "",
            "text"              		=> "",
            "text_size"         		=> "",
            "text_font_weight"  		=> "",
            "text_transform"    		=> "",
            "text_color"        		=> "",
            "separator"         		=> "",
            "separator_color"   		=> "",
            "separator_transparency" 	=> ""
        );

        extract(shortcode_atts($args, $atts));

        //init variables
        $html                   = "";
        $counter_holder_classes = "";
        $counter_classes        = "";
        $counter_holder_styles         = "";
        $counter_styles         = "";
        $text_styles            = "";
        $separator_styles       = "";

        if($position != "") {
            $counter_holder_classes .= " ".$position;
        }

        if($box == "yes") {
            $counter_holder_classes .= " boxed_counter";
            if($box_border_color != ''){
                $counter_holder_styles = 'border-color:'.$box_border_color.';';
            }
        }

        if($type != "") {
            $counter_classes .= " ".$type;
        }

        if($font_color != "") {
            $counter_styles .= "color: ".$font_color.";";
        }

        if($font_size != "") {
            $counter_styles .= "font-size: ".$font_size."px;";
        }
        if($font_weight != "") {
            $counter_styles .= "font-weight: ".$font_weight.";";
        }
        if($text_size != "") {
            $text_styles .= "font-size: ".$text_size."px;";
        }
        if($text_font_weight != "") {
            $text_styles .= "font-weight: ".$text_font_weight.";";
        }
        if($text_transform != "") {
            $text_styles .= "text-transform: ".$text_transform.";";
        }

        if($text_color != "") {
            $text_styles .= "color: ".$text_color.";";
        }

        if($separator_color != "") {
            if($separator_transparency !== '') {
                $rgba_color = qode_rgba_color($separator_color, $separator_transparency);
                $separator_styles .= "background-color: ".$rgba_color.';';
            } else {
                $separator_styles .= "background-color: ".$separator_color.";";
            }
        }

        $html .= '<div class="q_counter_holder '.$counter_holder_classes.'" style="'.$counter_holder_styles.'">';
        $html .= '<span class="counter '.$counter_classes.'" style="'.$counter_styles.'">'.$digit.'</span>';

        if($separator == "yes") {
            $html .= '<span class="separator small" style="'.$separator_styles.'"></span>';
        }

        $html .= $content;

        if($text != "") {
            $html .= '<p class="counter_text" style="'.$text_styles.'">'.$text.'</p>';
        }

        $html .= '</div>'; //close q_counter_holder

        return $html;
    }
    add_shortcode('counter', 'counter');
}