<?php
/* Button shortcode */
if (!function_exists('button')) {
    function button($atts, $content = null) {
		global $qodeIconCollections;

		$default_atts = array(
            "size"                      => "",
            "style"                      => "",
            "text"                      => "",
//            "icon"                      => "",
            "icon_color"                => "",
            "link"                      => "",
            "target"                    => "_self",
            "button_id"                 => "",
            "hover_type"                 => "default",
            "color"                     => "",
            "hover_color"               => "",
            "background_color"			=> "",
            "hover_background_color"    => "",
            "border_color"              => "",
            "hover_border_color"        => "",
            "font_style"                => "",
            "font_weight"               => "",
            "text_align"                => "",
            "margin"					=> "",
            "border_radius"				=> "",
            "html_type"                 => ""
        );

		$default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

		extract(shortcode_atts($default_atts, $atts));
		//extract(shortcode_atts($args, $atts));

        if($target == ""){
            $target = "_self";
        }

        //init variables
        $html  = "";
        $button_classes = "qbutton ";
        $button_styles  = "";
        $add_icon       = "";
        $data_attr      = "";

        if($size != "") {
            $button_classes .= " {$size}";
        }

        if($text_align != "") {
            $button_classes .= " {$text_align}";
        }
        if($style == "white") {
            $button_classes .= " {$style}";
        }

        $button_classes .= " ".$hover_type;

        if($color != ""){
            $button_styles .= 'color: '.$color.'; ';
        }

        if($border_color != ""){
            $button_styles .= 'border-color: '.$border_color.'; ';
        }

        if($font_style != ""){
            $button_styles .= 'font-style: '.$font_style.'; ';
        }

        if($font_weight != ""){
            $button_styles .= 'font-weight: '.$font_weight.'; ';
        }

		$icon_pack = $icon_pack == '' ? 'font_awesome' : $icon_pack;

        if(${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)} != ""){
            $icon_style = "";
            if($icon_color != ""){
                $icon_style .= 'color: '.$icon_color.';';
            }

			$add_icon .= $qodeIconCollections->getIconHTML(
				${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
				$icon_pack,
				array('icon_attributes' => array('style' => $icon_style, 'class' => 'qode_button_icon_element')));

            //$add_icon .= '<i class="fa '.$icon.'" style="'.$icon_style.'"></i>';
        }

        if($margin != ""){
            $button_styles .= 'margin: '.$margin.'; ';
        }

        if($border_radius != ""){
            $button_styles .= 'border-radius: '.$border_radius.'px;-moz-border-radius: '.$border_radius.'px;-webkit-border-radius: '.$border_radius.'px; ';
        }

        if($background_color != "" ) {
            $button_styles .= "background-color: {$background_color};";
        }

        if($hover_background_color != "") {
            $data_attr .= "data-hover-background-color=".$hover_background_color." ";
        }

        if($hover_border_color != "") {
            $data_attr .= "data-hover-border-color=".$hover_border_color." ";
        }

        if($hover_color != "") {
            $data_attr .= "data-hover-color=".$hover_color;
        }

        if($html_type !== "button") {
            $html .= '<a ' . qode_get_inline_attr($button_id, 'id') . ' itemprop="url" href="' . $link . '" target="' . $target . '" ' . $data_attr . ' class="' . $button_classes . '" style="' . $button_styles . '">' . $text . $add_icon . '</a>';
        }else {
            $html .= '<button type="submit" ' . qode_get_inline_attr($button_id, 'id') . ' ' . $data_attr . ' class="' . $button_classes . '" style="' . $button_styles . '">' . $text . $add_icon . '</button>';
        }

        return $html;
    }
    add_shortcode('button', 'button');
}