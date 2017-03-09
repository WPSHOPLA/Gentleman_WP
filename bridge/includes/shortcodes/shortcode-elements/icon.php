<?php
//Icon shortcode
if(!function_exists('icons')) {
    function icons($atts, $content = null) {
        global $qodeIconCollections;

        $default_atts = array(
            "size"                          => "",
            "custom_size"                   => "",
            "custom_shape_size"             => "",
            "type"                          => "",
            "position"                      => "",
            "border"                        => "",
            "border_width"                  => "",
            "border_color"                  => "",
            "icon_color"                    => "",
            "icon_hover_color"              => "",
            "border_radius"                 => "",
            "background_color"              => "",
            "hover_background_color"        => "",
            "margin"                        => "",
            "icon_animation"                => "",
            "icon_animation_delay"          => "",
            "link"                          => "",
            "anchor_icon"                   => "",
            "target"                        => ""
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($default_atts, $atts));

        $html = "";

        //generate inline icon styles
        $style = '';
        $style_normal = '';
        $icon_stack_classes = '';
        $animation_delay_style = '';

        //generate icon stack styles
        $icon_stack_style = '';
        $icon_stack_base_style = '';
        $icon_stack_circle_styles = '';
        $icon_stack_square_styles = '';
        $icon_stack_normal_style  = '';

        if($custom_size != "") {
            $style .= 'font-size: '.$custom_size;

            if($custom_shape_size !== '') {
                $icon_stack_circle_styles .= 'font-size: '.$custom_size;
                $icon_stack_square_styles .= 'font-size: '.$custom_size;
            }


            if(!strstr($custom_size, 'px')) {
                $style .= 'px;';

                if($custom_shape_size !== '') {
                    $icon_stack_circle_styles .= 'px;';
                    $icon_stack_square_styles .= 'px;';
                }
            }
        }

        if($custom_shape_size !== '') {
            $icon_stack_circle_styles .= 'font-size: '.$custom_shape_size.'px;';
            $icon_stack_square_styles .= 'font-size: '.$custom_shape_size.'px;';
        }

        if($icon_color != "") {
            $style .= 'color: '.$icon_color.';';
        }

        if($position != "") {
            $icon_stack_classes .= 'pull-'.$position;
        }

        if($background_color != "") {
            $icon_stack_base_style .= 'color: '.$background_color.';';
            $icon_stack_style .= 'background-color: '.$background_color.';';
        }

        if($border == 'yes' && $border_color != "") {
            if($border_width !== '') {
                $icon_stack_style .= 'border: '.$border_width.'px solid '.$border_color.';';
            } else {
                $icon_stack_style .= 'border: 1px solid '.$border_color.';';
            }
        } else if ($border == 'no') {
            $icon_stack_style .= 'border: 0;';
        }

        if($border_radius !== '') {
            $icon_stack_square_styles .= 'border-radius: '.$border_radius.'px;';
        }

        if($icon_animation_delay != ""){
            $animation_delay_style .= 'transition-delay: '.$icon_animation_delay.'ms; -webkit-transition-delay: '.$icon_animation_delay.'ms; -moz-transition-delay: '.$icon_animation_delay.'ms; -o-transition-delay: '.$icon_animation_delay.'ms;';
        }

        if($margin != "") {
            $icon_stack_style .= 'margin: '.$margin.';';
            $icon_stack_circle_styles .= 'margin: '.$margin.';';
            $icon_stack_normal_style .= 'margin: '.$margin.';';
        }

        $icon_link_class="";
        if($anchor_icon == "yes"){
            $icon_link_class = "anchor";
        }

        //have to set default because of already created shortcodes
        $icon_pack = $icon_pack == '' ? 'font_awesome' : $icon_pack;

        switch ($type) {
            case 'circle':
                $html = '<span '.qode_get_inline_attr($type, 'data-type').' '.qode_get_inline_attr($hover_background_color, 'data-hover-bg-color').' '.qode_get_inline_attr($icon_hover_color, 'data-hover-icon-color').' class="qode_icon_shortcode fa-stack q_font_awsome_icon_stack '.$size.' '.$icon_stack_classes.' '.$icon_animation.'" style="'.$icon_stack_circle_styles.' '.$animation_delay_style.'">';
                if($link != ""){
                    $html .= '<a '.qode_get_inline_attr($icon_link_class, 'class').' itemprop="url" href="'.$link.'" target="'.$target.'">';
                }
                $html .= '<i class="fa fa-circle fa-stack-base fa-stack-2x" style="'.$icon_stack_base_style.'"></i>';

                $html .= $qodeIconCollections->getIconHTML(
                    ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                    $icon_pack,
                    array('icon_attributes' => array('style' => $style, 'class' => 'qode_icon_element fa-stack-1x')));

                break;
            case 'square':
                $html = '<span '.qode_get_inline_attr($type, 'data-type').' '.qode_get_inline_attr($hover_background_color, 'data-hover-bg-color').' '.qode_get_inline_attr($icon_hover_color, 'data-hover-icon-color').' class="qode_icon_shortcode fa-stack q_font_awsome_icon_square '.$size.' '.$icon_stack_classes.' '.$icon_animation.'" style="'.$icon_stack_style.$icon_stack_square_styles.' '.$animation_delay_style.'">';
                if($link != ""){
                    $html .= '<a '.qode_get_inline_attr($icon_link_class, 'class').'  itemprop="url" href="'.$link.'" target="'.$target.'">';
                }

                $html .= $qodeIconCollections->getIconHTML(
                    ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                    $icon_pack,
                    array('icon_attributes' => array('style' => $style, 'class' => 'qode_icon_element')));

                break;
            default:
                $html = '<span '.qode_get_inline_attr($type, 'data-type').' '.qode_get_inline_attr($icon_hover_color, 'data-hover-icon-color').' class="qode_icon_shortcode  q_font_awsome_icon '.$size.' '.$icon_stack_classes.' '.$icon_animation.'" style="'.$icon_stack_normal_style.' '.$animation_delay_style.'">';
                if($link != ""){
                    $html .= '<a '.qode_get_inline_attr($icon_link_class, 'class').' itemprop="url" href="'.$link.'" target="'.$target.'">';
                }

                $html .= $qodeIconCollections->getIconHTML(
                    ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                    $icon_pack,
                    array('icon_attributes' => array('style' => $style, 'class' => 'qode_icon_element')));

                break;
        }

        if($link != ""){
            $html .= '</a>';
        }

        $html.= '</span>';
        return $html;
    }
    add_shortcode('icons', 'icons');
}