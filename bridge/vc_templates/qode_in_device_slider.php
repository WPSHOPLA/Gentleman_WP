<?php

$args = array(
	"device" => "",
	"titles_on_hover" => "",
	"navigation" => "",
	"auto_start" => "",
	"timeout" => "5000"
);

extract(shortcode_atts($args, $atts));

$html = "";

$html .=
	'<div class="qode-in-device-slider">'.
		'<div class="qode-ids-slider-holder">'.
			'<div class="qode-ids-slider qode-ids-framed-'.esc_attr($device).($titles_on_hover=='yes' ? ' qode-ids-titles-on-hover' : '').'" data-navigation="'.esc_attr($navigation).'" data-auto-start="'.esc_attr($auto_start).'"'.($auto_start == 'yes' ? ' data-timeout="'.esc_attr($timeout).'"' : '').'>'.
				'<ul class="slides">'.
					do_shortcode($content).
				'</ul>'.
			'</div>'.
			'<img itemprop="image" class="qode-ids-frame" src="'.get_template_directory_uri() . '/img/in-device-slider-'.esc_attr($device).'.png" alt="">'.
		'</div>'.
	'</div>'.
'';

echo $html;

