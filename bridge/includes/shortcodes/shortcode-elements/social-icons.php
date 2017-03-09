<?php
/* Social Icons shortcode */
if (!function_exists('social_icons')) {
    function social_icons($atts, $content = null) {
        global $qodeIconCollections;

        $args = array(
            "type"                              => "",
            "link"                              => "",
            "target"                            => "",
            "use_custom_size"                   => "",
            "custom_size"                       => "",
            "custom_shape_size"                 => "",
            "size"                              => "",
            "border_radius"                     => "",
            "icon_color"                        => "",
            "icon_hover_color"                  => "",
            "background_color"                  => "",
            "background_hover_color"            => "",
            "background_color_transparency"     => "",
            "border_width"                      => "",
            "border_color"                      => "",
            "border_hover_color"                => "",
            "icon_margin"                       => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $html               = "";
        $fa_stack_styles    = "";
        $icon_styles        = "";
        $data_attr          = "";

        if(!empty($background_color) && !empty($background_color_transparency) && ($background_color_transparency >= 0 && $background_color_transparency <= 1)) {
            $rgb = qode_hex2rgb($background_color);

            $background_color = 'rgba('.$rgb[0].', '.$rgb[1].', '.$rgb[2].', '.$background_color_transparency.')';
        }

        if(!empty($background_color)) {
            $fa_stack_styles .= "background-color: {$background_color};";
        }

        if($type == 'square_social' && $border_radius !== '') {
            $fa_stack_styles .= 'border-radius: '.$border_radius.'px;';
            $fa_stack_styles .= '-webkit-border-radius: '.$border_radius.'px;';
            $fa_stack_styles .= '-moz-border-radius: '.$border_radius.'px;';
        }

        if($border_color != "") {
            $fa_stack_styles .= "border-color: ".$border_color.";";
        }

        if($border_width != "") {
            $fa_stack_styles .= "border-width: ".$border_width."px;";
        }

        if($icon_color != ""){
            $icon_styles .= "color: ".$icon_color.";";
            $data_attr .= "data-color=".$icon_color." ";
        }

        if($icon_margin != "") {
            if($type == 'circle_social' || $type == 'square_social') {
                $fa_stack_styles .= "margin: ".$icon_margin.";";
            } else {
                $icon_styles .= "margin: ".$icon_margin.";";
            }

        }

        if($background_hover_color != "") {
            $data_attr .= "data-hover-background-color=".$background_hover_color." ";
        }

        if($border_hover_color != "") {
            $data_attr .= "data-hover-border-color=".$border_hover_color." ";
        }

        if($icon_hover_color != "") {
            $data_attr .= "data-hover-color=".$icon_hover_color;
        }

        if($use_custom_size == 'yes') {
            if($custom_size !== '') {
                $icon_styles .= 'font-size: '.$custom_size."px;";
            }

            if($custom_shape_size !== '') {
                $fa_stack_styles .= 'font-size: '.$custom_shape_size."px;";
            } elseif($custom_size !== '' && $custom_shape_size == '') {
                $fa_stack_styles .= 'font-size: '.$custom_size."px;";
            }
        }

        $html .= "<span class='q_social_icon_holder $type' $data_attr>";

        if($link != ""){
            $html .= "<a itemprop='url' href='".$link."' target='".$target."'>";
        }

        //have to set default because of already created shortcodes
        $icon_pack = $icon_pack == '' ? 'font_awesome' : $icon_pack;

        if($type == "normal_social"){
            $html .= $qodeIconCollections->getIconHTML(
                ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                $icon_pack,
                array('icon_attributes' => array('style' => $icon_styles, 'class' => $size.' simple_social')));
        } else {
            $html .= "<span class='fa-stack ".$size."' style='".$fa_stack_styles."'>";

            $html .= $qodeIconCollections->getIconHTML(
                ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                $icon_pack,
                array('icon_attributes' => array('style' => $icon_styles, 'class' => '')));

            $html .= "</span>"; //close fa-stack
        }

        if($link != ""){
            $html .= "</a>";
        }

        $html .= "</span>"; //close q_social_icon_holder
        return $html;
    }
    add_shortcode('social_icons', 'social_icons');
}