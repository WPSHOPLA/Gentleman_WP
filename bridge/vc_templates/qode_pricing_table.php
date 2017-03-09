<?php

$args = array(
    "type"			=> "",
    "title"			=> "",
    "subtitle"		=> "",
    "short_info"	=> "",
    "additional_info"	=> "",
    "image"	=> "",
    "price"         => "0",
    "currency"      => "$",
    "price_period"  => "/mo",
    "show_button"   => "yes",
    "link"          => "",
    "target"        => "_self",
    "button_text"   => "Purchase",
    "button_size"   => "",
    "active"        => "",
    "active_text"   => "Best price"
);

extract(shortcode_atts($args, $atts));

$html = "";
$pricing_table_clasess = '';

if($target == ""){
    $target = "_self";
}

if($active == "yes") {
    $pricing_table_clasess .= ' active';
}
if($type != "") {
	$pricing_table_clasess .= ' qode_pricing_table_' . $type;
}
if($type == 'advanced'){

	$new_content = preg_replace('#^<\/p>|<p>$#', '', $content);

	$html .= '<div class="q_price_table '.$pricing_table_clasess.'">';
	if($image != ''){

		if (is_numeric($image)) {
			$image_src = wp_get_attachment_url($image);
			$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
		}

		$html .= '<div class="qode_pt_image">';
		$html .= '<img src="'.$image_src.'" alt="'.$image_alt.'" />';
		$html .= '</div>';
	}
	$html .= '<div class="price_table_inner">';
	$html .= '<div class="qode_price_table_prices">';
	$html .= '<div class="qode_price_table_prices_inner">';
	$html .= '<span class="price">'.$price.'</span>';
	$html .= '<sup class="value">'.$currency.'</sup>';
	$html .= '<span class="mark">'.$price_period.'</span>';
	$html .= '</div>'; // close div.price_table_prices_inner
	$html .= '</div>'; // close div.price_table_prices
	$html .= '<ul class="qode_pricing_table_text">';
	if($subtitle != '') {
		$html .= '<li class="cell qode_pt_subtitle">';
		$html .= '<span>' . $subtitle . '</span>';
		$html .= '</li>';
	}
	$html .= "<li class='cell qode_pt_title'>";
	$html .= '<h4>'.$title.'</h4>';
	$html .= '</li>';
	if($short_info != '') {
		$html .= "<li class='cell qode_pt_short_info'>";
		$html .= '<span>' . $short_info . '</span>';
		$html .= '</li>';
	}
	$html .= '<li class="pricing_table_content">';
	$html .= do_shortcode($new_content); //append pricing table content
	$html .= '</li>';

	if($show_button == 'yes') {
		$html .='<li class="price_button">';
		$html .= '<a itemprop="url" class="qbutton '. $button_size .'" href="'.$link.'" target="'.$target.'">'. $button_text .'</a>';
		$html .= '</li>'; //close li.price_button
	}

	$html .= '</ul>';

	$html .= '</div>'; //close div.price_table_inner
	if($additional_info != '') {
		$html .= "<div class='qode_pt_additional_info'>";
		$html .= '<span class="qode_pt_icon icon-basic-lightbulb"></span>';
		$html .= $additional_info;
		$html .= '</div>';
	}
	$html .='</div>'; //close div.q_price_table

} else {
	$html .= "<div class='q_price_table ".$pricing_table_clasess."'>";
	$html .= "<div class='price_table_inner'>";

	if($active == 'yes') {
		$html .= "<div class='active_text'><span>".__($active_text, 'qode')."</span></div>";
	}

	$html .= "<ul>";
	$html .= "<li class='cell table_title'><h3 class='title_content'>".$title."</h3>";

	$html .= "<li class='prices'>";
	$html .= "<div class='price_in_table'>";
	$html .= "<sup class='value'>".$currency."</sup>";
	$html .= "<span class='price'>".$price."</span>";
	$html .= "<span class='mark'>".$price_period."</span>";

	$html .= "</div>"; // close div.price_in_table
	$html .= "</li>"; //close li.prices

	$html .= "<li class='pricing_table_content'>";
	$html .= do_shortcode($content); //append pricing table content
	$html .= "</li>";

	if($show_button == 'yes') {
		$html .="<li class='price_button'>";
		$html .= "<a itemprop='url' class='qbutton white $button_size' href='$link' target='$target'>".__($button_text, 'qode')."</a>";
		$html .= "</li>"; //close li.price_button
	}

	$html .= "</ul>";
	$html .= "</div>"; //close div.price_table_inner
	$html .="</div>"; //close div.q_price_table
}


echo $html;