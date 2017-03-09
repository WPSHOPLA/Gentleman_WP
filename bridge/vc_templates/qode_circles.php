<?php

$args = array(
    "columns"     => "four_columns",
    "circle_line" => "no_line",
    "line_color"  => ""
);

$html = "";
$styles = "";

extract(shortcode_atts($args, $atts));

if($line_color != "empty") {
    $styles .= "color: ".$line_color.";";
}

$html = '<ul class="q_circles_holder '.$columns.' '.$circle_line.'" style="'.$styles.'">';

$html .= do_shortcode($content);

$html .= '</ul>';

echo $html;