<?php

$args = array(
	"big_image" => "",
	"small_image" => "",
	"link" => "",
	"target" => ""
);

extract(shortcode_atts($args, $atts));

$html = "";

$html .=
	'<li>'.
		'<div class="qode-presl-main-item">'.
			'<div class="qode-presl-main-item-inner">'.
				'<img itemprop="image" src="'.get_template_directory_uri() . '/img/bridge-browser-top.png" alt="bridge-browser-top">'.
				'<a itemprop="url" class="qode-presl-link main" href="'.esc_attr($link).'" target="'.esc_attr($target).'">'.
					wp_get_attachment_image($big_image,'full').
				'</a>'.
				'<a itemprop="url" class="qode-presl-link small" href="'.esc_attr($link).'" target="'.esc_attr($target).'">'.
					wp_get_attachment_image($small_image,'full').
				'</a>'.
			'</div>'.
		'</div>'.
	'</li>'.
'';

echo $html;

