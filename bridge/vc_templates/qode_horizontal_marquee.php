<?php

$args = array(
	"height" => "0",
	"spacing" => "0"
);

extract(shortcode_atts($args, $atts));

$html = "";

$html .= '<div class="qode-horizontal-marquee" data-height="'.esc_attr($height).'" data-spacing="'.esc_attr($spacing).'">';
$html .= '<div class="qode-horizontal-marquee-inner clearfix">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';

echo $html;

