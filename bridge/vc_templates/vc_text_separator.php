<?php
$output = $title = $title_align = $el_class = '';
extract(shortcode_atts(array(
    'title' => __("Title", "js_composer"),
    'title_align' => 'separator_align_center',
    'border' => '',
    'border_color' => '',
    'title_color' => '',
    'background_color' => '',
    'el_class' => ''
), $atts));
$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_text_separator wpb_content_element full '.$title_align.$el_class, $this->settings['base']);
$output .= '<div class="'.$css_class.'"><div';
if($border != "" || $border_color != "" || $title_color != ""){
		$output .= " style='";
			if($background_color != ""){
				$output .="background-color:".$background_color.";";
			}
			if($border_color != ""){
				$output .=" border:1px solid ".$border_color.";";
			}
			if($title_color != ""){
				$output .=" color:".$title_color.";";
			}
		$output.="'";
	}
$output .= '>';

$output .= '<span>' . $title . '</span>';

$output .='</div></div>'.$this->endBlockComment('separator')."\n";

echo $output;