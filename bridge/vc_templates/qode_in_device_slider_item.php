<?php

$args = array(
	"image" => "",
	"title" => "",
	"link" => "",
	"target" => ""
);

extract(shortcode_atts($args, $atts));

$html = "";

$html .=
	'<li>'.
		'<div class="qode-ids-item">'.
			'<a itemprop="url" class="qode-ids-link" href="'.esc_attr($link).'" target="'.esc_attr($target).'">'.
				wp_get_attachment_image($image,'full').
				'<div class="qode-ids-title"><h5>'.esc_html($title).'</h5></div>'.
			'</a>'.
		'</div>'.
	'</li>'.
'';

echo $html;

