<?php

$args = array(
    "auto_rotate" => "3",
    "enable_drag" => "",
    "direction_nav" => "",
    "control_nav" => "",
    "control_nav_justify" => "",
    "pause_on_hover" => ""
);

extract(shortcode_atts($args, $atts));

$interval_data = '';
if($auto_rotate !== ''){
    $interval_data .= 'data-interval="'. $auto_rotate .'"';
}

$control_nav_data = '';
if($control_nav !== ''){
    $control_nav_data .= 'data-control="'. ($control_nav == 'yes' ? 'true' : 'false').'"';
}

$direction_nav_data = '';
if($direction_nav !== ''){
    $direction_nav_data .= 'data-direction="'. ($direction_nav == 'yes' ? 'true' : 'false').'"';
}

$pause_on_hover_data = '';
if($pause_on_hover !== ''){
    $pause_on_hover_data .= 'data-pause-on-hover="'. ($pause_on_hover == 'yes' ? 'true' : 'false').'"';
}

$drag_data = '';
if($enable_drag !== ''){
    $drag_data .= 'data-drag="'. ($enable_drag == 'yes' ? 'true' : 'false').'"';
}

$additional_classes = '';
if($control_nav == 'yes'){
    $additional_classes .= ' has_control_nav';
}
if($control_nav_justify == 'yes'){
    $additional_classes .= ' control_nav_justified';
}
if($enable_drag == 'yes'){
    $additional_classes .= ' drag_enabled';
}

$html = "";

$html .= '<div class="qode_content_slider '. $additional_classes .'" '.$interval_data.' '.$direction_nav_data.' '.$control_nav_data.' '.$pause_on_hover_data.' '.$drag_data.'>';
$html .= '<div class="qode_content_slider_inner">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';

echo $html;

