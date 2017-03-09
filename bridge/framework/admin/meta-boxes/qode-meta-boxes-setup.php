<?php


add_action('init', 'qode_meta_boxes_map_init');
function qode_meta_boxes_map_init() {
	global $qode_options_proya;
	global $qodeFramework;
	global $options_fontstyle;
	global $options_fontweight;
	global $options_texttransform;
	global $options_fontdecoration;
    global $qodeIconCollections;
	require_once("page/map.php");
	require_once("portfolio/map.php");
	require_once("slides/map.php");
	require_once("post/map.php");
	require_once("testimonials/map.php");
	require_once("carousels/map.php");
	require_once("masonry_gallery/map.php");
	require_once("woocommerce/map.php");
}