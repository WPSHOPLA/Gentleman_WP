<?php
/* Action shortcode */

if (!function_exists('action')) {
    function action($atts, $content = null) {
        $args = array(
            "type"						        => "normal",
            "full_width"                        => "yes",
            "content_in_grid"                   => "yes",
            "icon"						        => "",
            "icon_size"					        => "fa-2x",
            "icon_color"				        => "",
            "custom_icon"				        => "",
            "background_color"                  => "",
            "background_image"                  => "",
            "use_background_as_pattern"         => "",
            "border_color"                      => "",
            "padding_top"						=> "",
            "padding_bottom"					=> "",
            "show_button"                       => "yes",
            "button_size"                       => "",
            "button_link"                       => "",
            "button_text"                       => "",
            "button_target"                     => "",
            "button_text_color"                 => "",
            "button_hover_text_color"           => "",
            "button_background_color"           => "",
            "button_hover_background_color"     => "",
            "button_border_color"               => "",
            "button_hover_border_color"         => "",
            "text_color"                        => "", //used only when shortcode is called from call to action widget
            "text_size"                         => "",
            "text_font_weight"					=> "",
            "text_letter_spacing"				=> ""
        );

        extract(shortcode_atts($args, $atts));

        $html                   = '';
        $action_classes         = '';
        $action_styles          = '';
        $text_wrapper_classes   = '';
        $button_styles          = '';
        $icon_styles			= '';
        $data_attr              = '';
        $content_styles         = '';

        if($show_button == 'yes') {
            $text_wrapper_classes   .= 'column1';
        }

        $action_classes .= $type;

        if($background_color != '') {
            $action_styles .= 'background-color: '.$background_color.';';
        }

        if($padding_top != '') {
            $action_styles .= 'padding-top: '.$padding_top.'px;';
        }

        if($padding_bottom != '') {
            $action_styles .= 'padding-bottom: '.$padding_bottom.'px;';
        }

        if($border_color != '') {
            $action_styles .= 'border-top: 1px solid '.$border_color.';';
        }

        if($background_image !== '') {
            $background_image_src = is_numeric($background_image) ? wp_get_attachment_url($background_image) : $background_image;

            $action_classes = ' with_background_image';
            $action_styles = 'background-image: url('.$background_image_src.');';

            if($use_background_as_pattern == 'yes') {
                $action_styles .= 'background-repeat: repeat;';
            }
        }

        if($button_text_color != '') {
            $button_styles .= 'color: '.$button_text_color.';';
        }
        if($icon_color != "") {
            $icon_styles = " style='color: ".$icon_color . ";'";
        }
        if($button_border_color != '') {
            $button_styles .= 'border-color: '.$button_border_color.';';
        }

        if($button_background_color != '') {
            $button_styles .= "background-color: {$button_background_color};";

        }

        if($button_hover_background_color != "") {
            $data_attr .= "data-hover-background-color=".$button_hover_background_color." ";
        }

        if($button_hover_border_color != "") {
            $data_attr .= "data-hover-border-color=".$button_hover_border_color." ";
        }

        if($button_hover_text_color != "") {
            $data_attr .= "data-hover-color=".$button_hover_text_color;
        }

        if($full_width == "no") {
            $html .= '<div class="container_inner">';
        }

        $html.=  '<div class="call_to_action '.$action_classes.'" style="'.$action_styles.'">';

        if($content_in_grid == 'yes' && $full_width == 'yes') {
            $html .= '<div class="container_inner">';
        }

        if($show_button == 'yes' && $type !== 'simple') {
            $html .= '<div class="two_columns_75_25 clearfix">';
        }

        $content_additional_class = '';
        if($text_size != '') {
            $content_styles .= 'font-size:'. $text_size.'px;';
            $content_additional_class .= ' font_size_inherit';
        }

        if($text_color != '') {
            $content_styles .= 'color:'.$text_color.';';
            $content_additional_class .= ' color_inherit';
        }

        if($text_font_weight !== '') {
            $content_styles .= 'font-weight: '.$text_font_weight.';';
            $content_additional_class .= ' font_weight_inherit';
        }

        if($text_letter_spacing != '') {
            $content_styles .= 'letter-spacing: '.$text_letter_spacing.'px;';
            $content_additional_class .= ' letter_spacing_inherit';
        }

        $html .= '<div class="text_wrapper '.$text_wrapper_classes.'">';

        if($type == "with_icon"){
            $html .= '<div class="call_to_action_icon_holder">';
            $html .= '<div class="call_to_action_icon">';
            $html .= '<div class="call_to_action_icon_inner">';
            if($custom_icon != "") {
                if(is_numeric($custom_icon)) {
                    $custom_icon_src = wp_get_attachment_url( $custom_icon );
                } else {
                    $custom_icon_src = $custom_icon;
                }

                $html .= '<img itemprop="image" src="' . $custom_icon_src . '" alt="">';
            } else {
                $html .= "<i class='fa ".$icon." pull-left . ". $icon_size . "'".$icon_styles."></i>";
            }

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        $html .= '<div class="call_to_action_text '.$content_additional_class.'" style="'.$content_styles.'">'.$content.'</div>';

        if($show_button == 'yes' && $button_text !== '' && $type === "simple") {
            $button_link = ($button_link != '') ? $button_link : 'javascript: void(0)';

            $html .= '<a itemprop="url" href="'.$button_link.'" class="qbutton white '. $button_size . '" target="'.$button_target.'" style="'.$button_styles.'"'. $data_attr . '>'.$button_text.'</a>';
        }
        $html .= '</div>'; //close text_wrapper

        if($show_button == 'yes' && $button_text !== '' && $type !== "simple") {
            $button_link = ($button_link != '') ? $button_link : 'javascript: void(0)';

            $html .= '<div class="button_wrapper column2">';
            $html .= '<a itemprop="url" href="'.$button_link.'" class="qbutton white '. $button_size . '" target="'.$button_target.'" style="'.$button_styles.'"'. $data_attr . '>'.$button_text.'</a>';
            $html .= '</div>';//close button_wrapper
        }

        if($show_button == 'yes' && $type !== 'simple') {
            $html .= '</div>'; //close two_columns_75_25 if opened
        }

        if($content_in_grid == 'yes' && $full_width == 'yes') {
            $html .= '</div>'; // close .container_inner if oppened
        }

        $html .= '</div>';//close .call_to_action

        if($full_width == 'no') {
            $html .= '</div>'; // close .container_inner if oppened
        }

        return $html;
    }
    add_shortcode('action', 'action');
}