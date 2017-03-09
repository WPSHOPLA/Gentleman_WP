<?php
$output = '';
extract(shortcode_atts(array(
    'el_class' 				=> '',
    'type' 					=> '',
    'position' 				=> '',
    'color' 				=> '',
    'gradient_color' 		=> '',
	'transparency' 			=> '',
    'up' 					=> '',
    'down' 					=> '',
    'thickness' 			=> '',
    'width' 				=> '',
	'width_in_percentages' 	=> ''
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'separator', $this->settings['base']);

$separator_classes = "";
$separator_styles  = "";

$separator_classes .= $css_class." ".$el_class." ";
$separator_classes .= $type." ";
$separator_classes .= $position." ";

if($gradient_color == 'yes'){
    $separator_classes .= ' qode-type1-gradient-left-to-right';
}

if($up != '') {
	$separator_styles .= 'margin-top: '.$up.'px;';
}

if($down != '') {
	$separator_styles .= 'margin-bottom: '.$down.'px;';
}

if($color != '') {
	$separator_styles .= 'background-color: '.$color.';';
}

if($transparency !== '') {
	$separator_styles .= 'opacity: '.$transparency.';';
}

if($thickness != '') {
	$separator_styles .= 'height: '.$thickness.'px;';
}

if($width != '') {
	$width_unit = ($width_in_percentages == 'yes') ? '%' : 'px';
	$separator_styles .= 'width: '.$width.$width_unit.';';
}

$output .= '<div class="'.$separator_classes.' " style="'.$separator_styles.'">';
$output .= '</div>'.$this->endBlockComment('separator')."\n";

echo $output;