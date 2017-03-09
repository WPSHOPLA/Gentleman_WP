<?php
/* Icon with text shortcode */
if(!function_exists('icon_text')) {
    function icon_text($atts, $content = null) {
        global $qodeIconCollections;

        $default_atts = array(
            "icon_size"             		=> "",
            "use_custom_icon_size"  		=> "",
            "custom_icon_size"      		=> "",
            "custom_icon_size_inner"      	=> "",
            "custom_icon_margin"    		=> "",
            "icon_animation"        		=> "",
            "icon_animation_delay"  		=> "",
            "image"                 		=> "",
            "icon_type"             		=> "",
            "icon_position"         		=> "",
            "icon_border_color"     		=> "",
            "icon_margin"           		=> "",
            "icon_color"            		=> "",
            "icon_hover_color"           	=> "",
            "icon_background_color" 		=> "",
            "icon_hover_background_color" 	=> "",
            "box_type"              		=> "",
            "box_border_color"      		=> "",
            "box_background_color"  		=> "",
            "title"                 		=> "",
            "title_tag"             		=> "h5",
            "title_color"           		=> "",
            "title_font_weight"				=> "",
            "separator"						=> "",
            "separator_color"				=> "",
            "separator_top_margin"			=> "0",
            "separator_bottom_margin"		=> "15",
            "separator_width"				=> "20",
            "text"                  		=> "",
            "text_color"            		=> "",
            "link"                  		=> "",
            "link_text"             		=> "",
            "link_color"            		=> "",
            "link_icon"						=> "",
            "target"                		=> ""
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($default_atts, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init icon styles
        $style = '';
        $icon_stack_classes = '';


        //init icon stack styles
        $icon_margin_style       = '';
        $icon_stack_square_style = '';
        $icon_stack_base_style   = '';
        $icon_stack_style        = '';
        $img_styles              = '';
        $animation_delay_style   = '';
        $icon_text_holder_styles = '';

        //generate inline icon styles
        if($use_custom_icon_size == "yes") {
            if($custom_icon_size != "") {
                //remove px if user has entered it
                $custom_icon_size = strstr($custom_icon_size, 'px', true) ? strstr($custom_icon_size, 'px', true) : $custom_icon_size;
                $icon_stack_style .= 'font-size: '.$custom_icon_size.'px;';
            }

            if($custom_icon_margin != "") {
                //remove px if user has entered it
                $custom_icon_margin = strstr($custom_icon_margin, 'px', true) ? strstr($custom_icon_margin, 'px', true) : $custom_icon_margin;
                $custom_icon_margin = $custom_icon_size + $custom_icon_margin;

                if($icon_position !== 'right') {
                    $icon_text_holder_styles .= 'padding-left:'.$custom_icon_margin.'px;';
                } else {
                    $icon_text_holder_styles .= 'padding-right:'.$custom_icon_margin.'px;';
                }

            }

            if($custom_icon_size_inner != '' && in_array($icon_type, array('circle', 'square'))) {
                $style .= 'font-size: '.$custom_icon_size_inner.'px;';
            }

        }

        if($icon_color != "") {
            $style .= 'color: '.$icon_color.';';
        }

        //generate icon stack styles
        if($icon_background_color != "") {
            $icon_stack_base_style .= 'background-color: '.$icon_background_color.';';
            $icon_stack_square_style .= 'background-color: '.$icon_background_color.';';
        }

        if($icon_border_color != "") {
            $icon_stack_style .= 'border-color: '.$icon_border_color.';';
        }

        if($icon_margin != "" && ($icon_position == "" || $icon_position == "top")) {
            $icon_margin_style .= "margin: ".$icon_margin.";";
            $img_styles       .= "margin: ".$icon_margin.";";
        }

        if($icon_animation_delay != ""){
            $animation_delay_style .= 'transition-delay: '.$icon_animation_delay.'ms; -webkit-transition-delay: '.$icon_animation_delay.'ms; -moz-transition-delay: '.$icon_animation_delay.'ms; -o-transition-delay: '.$icon_animation_delay.'ms;';
        }

        $box_size = '';
        //generate icon text holder styles and classes

        //map value of the field to the actual class value
        switch ($icon_size) {
            case 'large': //smallest icon size
                $box_size = 'tiny';
                break;
            case 'fa-2x':
                $box_size = 'small';
                break;
            case 'fa-3x':
                $box_size = 'medium';
                break;
            case 'fa-4x':
                $box_size = 'large';
                break;
            case 'fa-5x':
                $box_size = 'very_large';
                break;
            default:
                $box_size = 'tiny';
        }

        if($image != "") {
            $icon_type = 'image';
        }

        $box_icon_type = '';
        switch ($icon_type) {
            case 'normal':
                $box_icon_type = 'normal_icon';
                break;
            case 'square':
                $box_icon_type = 'square';
                break;
            case 'circle':
                $box_icon_type = 'circle';
                break;
            case 'image':
                if($box_type == 'normal') {
                    $box_icon_type = 'custom_icon_image';
                } else {
                    $box_icon_type = 'image';
                }
                break;
        }

        /* Generate text styles */
        $title_style = "";
        if($title_color != "") {
            $title_style .= "color: ".$title_color.";";
        }
        if($title_font_weight !== "") {
            $title_style .= "font-weight: ".$title_font_weight.";";
        }

        $text_style = "";
        if($text_color != "") {
            $text_style .= "color: ".$text_color;
        }

        $link_style = "";

        if($link_color != "") {
            $link_style .= "color: ".$link_color.";";
        }

        $html = "";
        $html_icon = "";

        if($link_icon == 'yes' && $link !== '') {
            $html_icon .= '<a itemprop="url" href="'.$link.'" target="'.$target.'" class="q_icon_link">';
        }

        //have to set default because of already created shortcodes
        $icon_pack = $icon_pack == '' ? 'font_awesome' : $icon_pack;

        if($image == "") {
            //genererate icon html
            switch ($icon_type) {
                case 'circle':
                    $html_icon .= '<span '.qode_get_inline_attr($icon_type, 'data-icon-type').' '.qode_get_inline_attr($icon_hover_color, 'data-icon-hover-color').' '.qode_get_inline_attr($icon_hover_background_color, 'data-icon-hover-bg-color').' class="qode_iwt_icon_holder fa-stack '.$icon_size.' '.$icon_stack_classes.'" style="'.$icon_stack_style . $icon_stack_base_style .'">';

                    $html_icon .= $qodeIconCollections->getIconHTML(
                        ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                        $icon_pack,
                        array('icon_attributes' => array('style' => $style, 'class' => 'qode_iwt_icon_element')));

                    $html_icon .= '</span>';
                    break;
                case 'square':
                    $html_icon .= '<span '.qode_get_inline_attr($icon_type, 'data-icon-type').'  '.qode_get_inline_attr($icon_hover_color, 'data-icon-hover-color').' '.qode_get_inline_attr($icon_hover_background_color, 'data-icon-hover-bg-color').' class="qode_iwt_icon_holder fa-stack '.$icon_size.' '.$icon_stack_classes.'" style="'.$icon_stack_style.$icon_stack_square_style.'">';

                    $html_icon .= $qodeIconCollections->getIconHTML(
                        ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                        $icon_pack,
                        array('icon_attributes' => array('style' => $style, 'class' => 'qode_iwt_icon_element')));

                    $html_icon .= '</span>';
                    break;
                default:
                    $html_icon .= '<span '.qode_get_inline_attr($icon_type, 'data-icon-type').'  '.qode_get_inline_attr($icon_hover_color, 'data-icon-hover-color').' style="'.$icon_stack_style.'" class="qode_iwt_icon_holder q_font_awsome_icon '.$icon_size.' '.$icon_stack_classes.'">';

                    $html_icon .= $qodeIconCollections->getIconHTML(
                        ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                        $icon_pack,
                        array('icon_attributes' => array('style' => $style, 'class' => 'qode_iwt_icon_element')));

                    $html_icon .= '</span>';
                    break;
            }
        } else {
            if(is_numeric($image)) {
                $image_src = wp_get_attachment_url( $image );
            }else {
                $image_src = $image;
            }
            $html_icon = '<img itemprop="image" style="'.$img_styles.'" src="'.$image_src.'" alt="">';
        }

        if($link_icon == 'yes' && $link !== '') {
            $html_icon .= '</a>';
        }

        //generate normal type of a box html
        if($box_type == "normal") {

            //init icon text wrapper styles
            $icon_with_text_clasess = '';
            $icon_with_text_style   = '';
            $icon_text_inner_style = '';

            $icon_with_text_clasess .= $box_size;
            $icon_with_text_clasess .= ' '.$box_icon_type;

            if($box_border_color != "") {
                $icon_text_inner_style .= 'border-color: '.$box_border_color;
            }

            if($icon_position == "" || $icon_position == "top") {
                $icon_with_text_clasess .= " center";
            }
            if($icon_position == "left_from_title"){
                $icon_with_text_clasess .= " left_from_title";
            }

            if($icon_position == 'right') {
                $icon_with_text_clasess .= ' right';
            }

            $html .= "<div class='q_icon_with_title ".$icon_with_text_clasess."'>";
            if($icon_position != "left_from_title") {
                //generate icon holder html part with icon
                $html .= '<div class="icon_holder '.$icon_animation.'" style="'.$icon_margin_style.' '.$animation_delay_style.'">';
                $html .= $html_icon;
                $html .= '</div>'; //close icon_holder
            }
            //generate text html
            $html .= '<div class="icon_text_holder" style="'.$icon_text_holder_styles.'">';
            $html .= '<div class="icon_text_inner" style="'.$icon_text_inner_style.'">';
            if($icon_position == "left_from_title") {
                $html .= '<div class="icon_title_holder">'; //generate icon_title holder for icon from title
                //generate icon holder html part with icon
                $html .= '<div class="icon_holder '.$icon_animation.'" style="'.$icon_margin_style.' '.$animation_delay_style.'">';
                $html .= $html_icon;
                $html .= '</div>'; //close icon_holder
            }
            $html .= '<'.$title_tag.' class="icon_title" style="'.$title_style.'">'.$title.'</'.$title_tag.'>';
            if($icon_position == "left_from_title") {
                $html .= '</div>'; //close icon_title holder for icon from title
            }
            if($separator == "yes") {
                $html .= do_shortcode('[vc_separator type="small" position="left" color="'.$separator_color.'" thickness="2" width="'.$separator_width.'" up="'.$separator_top_margin.'" down="'.$separator_bottom_margin.'"]');
            }
            $html .= "<p style='".$text_style."'>".$text."</p>";
            if($link != ""){
                if($target == ""){
                    $target = "_self";
                }

                if($link_text == ""){
                    $link_text = "Read More";
                }

                $html .= "<a itemprop='url' class='icon_with_title_link' href='".$link."' target='".$target."' style='".$link_style."'>".$link_text."</a>";
            }
            $html .= '</div>';  //close icon_text_inner
            $html .= '</div>'; //close icon_text_holder

            $html.= '</div>'; //close icon_with_title
        } else {
            //init icon text wrapper styles
            $icon_with_text_clasess = '';
            $box_holder_styles = '';

            if($box_border_color != "") {
                $box_holder_styles .= 'border-color: '.$box_border_color.';';
            }

            if($box_background_color != "") {
                $box_holder_styles .= 'background-color: '.$box_background_color.';';
            }

            $icon_with_text_clasess .= $box_size;
            $icon_with_text_clasess .= ' '.$box_icon_type;

            $html .= '<div class="q_box_holder with_icon" style="'.$box_holder_styles.'">';

            $html .= '<div class="box_holder_icon">';
            $html .= '<div class="box_holder_icon_inner '.$icon_with_text_clasess.' '.$icon_animation.'" style="'.$animation_delay_style.'">';
            $html .= $html_icon;
            $html .= '</div>'; //close box_holder_icon_inner
            $html .= '</div>'; //close box_holder_icon

            //generate text html
            $html .= '<div class="box_holder_inner '.$box_size.' center">';
            $html .= '<'.$title_tag.' class="icon_title" style="'.$title_style.'">'.$title.'</'.$title_tag.'>';
            if($separator == "yes") {
                $html .= do_shortcode('[vc_separator type="small" position="left" color="'.$separator_color.'" thickness="2" width="'.$separator_width.'" up="'.$separator_top_margin.'" down="'.$separator_bottom_margin.'"]');
            }else{
                $html .= '<span class="separator transparent" style="margin: 8px 0;"></span>';
            }
            $html .= '<p style="'.$text_style.'">'.$text.'</p>';
            $html .= '</div>'; //close box_holder_inner

            $html .= '</div>'; //close box_holder
        }

        return $html;

    }
    add_shortcode('icon_text', 'icon_text');
}
