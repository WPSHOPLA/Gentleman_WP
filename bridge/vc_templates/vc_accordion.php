<?php
$output = $title = $interval = $el_class = $collapsible = $active_tab = $style = '';
//
   
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'collapsible' => 'no',
    'active_tab' => '',
    'accordion_border_radius' => '',
	'style' => 'accordion'
), $atts));

//define accordion type classes
$acc_class = "";
switch($style) {
    case "toggle":
        $acc_class .= "toggle without_icon";
        break;
    case "accordion_with_icon":
        $acc_class = "accordion with_icon";
        break;
    case "toggle_with_icon":
        $acc_class .= "toggle with_icon";
        break;
    case "boxed_accordion":
        $acc_class .= "accordion boxed";
        break;
    case "boxed_toggle":
        $acc_class .= "toggle boxed";
        break;
    default:
        $acc_class = "accordion without_icon";
}

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'q_accordion_holder clearfix wpb_content_element '. $acc_class ." " . $el_class.' not-column-inherit', $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.'" data-active-tab="'.$active_tab.'" data-collapsible="'.$collapsible.'" data-border-radius="'.$accordion_border_radius.'">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_accordion');

echo $output;