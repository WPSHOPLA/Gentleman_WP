<?php
/* Icon List Item shortcode */
if (!function_exists('icon_list_item')) {

	function icon_list_item($atts, $content = null) {

		global $qodeIconCollections;

        $args = array(
        //    "icon"                                  => "",
            "icon_type"                             => "",
            "icon_size"                             => "",
            "icon_color"                            => "",
            "icon_background_color"                 => "",
            "icon_border_color"                     => "",
            "title"                                 => "",
            "title_color"                           => "",
            "title_size"                            => "",
            "title_font_weight"                    	=> "",
            "margin_bottom"                    		=> ""
        );

		$args = array_merge($args, $qodeIconCollections->getShortcodeParams());
		extract(shortcode_atts($args, $atts));

        $html           = '';
        $icon_style     = "";
        $icon_classes   = array('qode-ili-icon-holder');
        $title_style    = "";
		$add_icon = '';

        $icon_classes[] = $icon_type;


        if($title_color != "") {
            $title_style .= "color:".$title_color.";";
        }

        if($title_size != "") {
            $title_style .= "font-size: ".$title_size."px;";
        }
		if($title_font_weight != "") {
            $title_style .= "font-weight: ".$title_font_weight.";";
        }
		if($margin_bottom != "") {
            $title_style .= "margin-bottom: ".$margin_bottom."px;";
        }

		$icon_pack = $icon_pack == '' ? 'font_awesome' : $icon_pack;

		if(${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)} != ""){
			$icon_style = "";
			if($icon_size != ""){
				$icon_style .= 'font-size: '.$icon_size.'px;';
			}
			if($icon_color != ""){
				$icon_style .= 'color: '.$icon_color.';';
			}

			if($icon_background_color != "") {
				$icon_style .= "background-color: {$icon_background_color};";
			}

			if($icon_border_color != "") {
				$icon_style .= "border-color:".$icon_border_color.";";
				$icon_style .= "border-style:solid;";
				$icon_style .= "border-width:1px;";
			}

			$add_icon .= $qodeIconCollections->getIconHTML(
				${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
				$icon_pack,
				array('icon_attributes' => array('style' => $icon_style, 'class' => implode(' ', $icon_classes))));

		}

        $html .= '<div class="q_icon_list">';
        //$html .= '<i class="fa '.$icon.' pull-left '.$icon_classes.'" style="'.$icon_style.'"></i>';
        $html .= $add_icon;
        $html .= '<p style="'.$title_style.'">'.$title.'</p>';
        $html .= '</div>';
        return $html;
    }
    add_shortcode('icon_list_item', 'icon_list_item');
}
