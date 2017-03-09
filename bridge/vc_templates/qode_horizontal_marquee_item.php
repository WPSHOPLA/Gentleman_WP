<?php

$args = array(
	"width" => "0",
	"align" => "top"
);

extract(shortcode_atts($args, $atts));

$html = "";

$html .= '<div class="qode-hm-item" data-width="'.esc_attr($width).'" style="width: '.esc_attr($width).'px;">';
$html .= '<div class="qode-hm-item-inner qode-'.esc_attr($align).'-aligned">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';

echo $html;

