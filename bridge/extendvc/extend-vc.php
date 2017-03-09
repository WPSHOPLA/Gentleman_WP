<?php

global $qodeIconCollections;

/*** Removing shortcodes ***/
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");
vc_remove_element("vc_cta");
vc_remove_element("vc_round_chart");
vc_remove_element("vc_line_chart");
vc_remove_element("vc_tta_accordion");
vc_remove_element("vc_tta_tour");
vc_remove_element("vc_tta_tabs");

//Remove Grid Elements if disabled
if (!qode_vc_grid_elements_enabled() && version_compare(qode_get_vc_version(), '4.4.2') >= 0) {
	vc_remove_element('vc_basic_grid');
	vc_remove_element('vc_media_grid');
	vc_remove_element('vc_masonry_grid');
	vc_remove_element('vc_masonry_media_grid');
	vc_remove_element('vc_icon');
}

if(!qode_vc_grid_elements_enabled()) {
	vc_remove_element('vc_button2');
	vc_remove_element("vc_custom_heading");
	vc_remove_element("vc_btn");
}

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	vc_remove_param('vc_column_text', 'css_animation');
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'content_placement');
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
	vc_remove_param('vc_row', 'gap');
    vc_remove_param('vc_row', 'columns_placement');
    vc_remove_param('vc_row', 'equal_height');
    vc_remove_param('vc_row_inner', 'gap');
    vc_remove_param('vc_row_inner', 'content_placement');
    vc_remove_param('vc_row_inner', 'equal_height');


    //remove vc parallax functionality
    vc_remove_param('vc_row', 'parallax');
    vc_remove_param('vc_row', 'parallax_image');

//	vc_remove_param( "vc_row", "css" );
//	vc_remove_param( "vc_row_inner", "css" );

	if(version_compare(qode_get_vc_version(), '4.4.2') >= 0) {
		vc_remove_param('vc_accordion', 'disable_keyboard');
		vc_remove_param('vc_separator', 'align');
		vc_remove_param('vc_separator', 'border_width');
		vc_remove_param('vc_text_separator', 'align');
		vc_remove_param('vc_text_separator', 'border_width');
	}
	if(version_compare(qode_get_vc_version(), '4.7.4') >= 0) {
		add_action( 'init', 'qode_remove_vc_image_zoom',11);
		function qode_remove_vc_image_zoom() {
			//Remove zoom from click action on single image
			$param = WPBMap::getParam( 'vc_single_image', 'onclick' );
			unset($param['value']['Zoom']);
			vc_update_shortcode_param( 'vc_single_image', $param );
		}
		vc_remove_param('vc_text_separator', 'css');
		vc_remove_param('vc_separator', 'css');
	}
	if(version_compare(qode_get_vc_version(), '4.10') >= 0) {
		vc_remove_param('vc_text_separator', 'add_icon');
		vc_remove_param('vc_text_separator', 'i_type');
		vc_remove_param('vc_text_separator', 'i_icon_fontawesome');
		vc_remove_param('vc_text_separator', 'i_icon_openiconic');
		vc_remove_param('vc_text_separator', 'i_icon_typicons');
		vc_remove_param('vc_text_separator', 'i_icon_entypo');
		vc_remove_param('vc_text_separator', 'i_icon_linecons');
		vc_remove_param('vc_text_separator', 'i_color');
		vc_remove_param('vc_text_separator', 'i_custom_color');
		vc_remove_param('vc_text_separator', 'i_background_style');
		vc_remove_param('vc_text_separator', 'i_background_color');
		vc_remove_param('vc_text_separator', 'i_custom_background_color');
		vc_remove_param('vc_text_separator', 'i_size');
		vc_remove_param('vc_text_separator', 'i_css_animation');
		vc_remove_param('vc_row', 'parallax_speed_bg');
		vc_remove_param('vc_row', 'parallax_speed_video');
	}
	if(function_exists('vc_remove_param') && version_compare(qode_get_vc_version(), '4.12') >= 0) {
		vc_remove_param('vc_row', 'disable_element');
		vc_remove_param('vc_row_inner', 'disable_element');
	}
}
/*** Remove unused parameters from grid elements ***/
if (function_exists('vc_remove_param') && qode_vc_grid_elements_enabled() && version_compare(qode_get_vc_version(), '4.4.2') >= 0) {
	vc_remove_param('vc_basic_grid', 'button_style');
	vc_remove_param('vc_basic_grid', 'button_color');
	vc_remove_param('vc_basic_grid', 'button_size');
	vc_remove_param('vc_basic_grid', 'filter_color');
	vc_remove_param('vc_basic_grid', 'filter_style');
	vc_remove_param('vc_media_grid', 'button_style');
	vc_remove_param('vc_media_grid', 'button_color');
	vc_remove_param('vc_media_grid', 'button_size');
	vc_remove_param('vc_media_grid', 'filter_color');
	vc_remove_param('vc_media_grid', 'filter_style');
	vc_remove_param('vc_masonry_grid', 'button_style');
	vc_remove_param('vc_masonry_grid', 'button_color');
	vc_remove_param('vc_masonry_grid', 'button_size');
	vc_remove_param('vc_masonry_grid', 'filter_color');
	vc_remove_param('vc_masonry_grid', 'filter_style');
	vc_remove_param('vc_masonry_media_grid', 'button_style');
	vc_remove_param('vc_masonry_media_grid', 'button_color');
	vc_remove_param('vc_masonry_media_grid', 'button_size');
	vc_remove_param('vc_masonry_media_grid', 'filter_color');
	vc_remove_param('vc_masonry_media_grid', 'filter_style');
	vc_remove_param('vc_basic_grid', 'paging_color');
	vc_remove_param('vc_basic_grid', 'arrows_color');
	vc_remove_param('vc_media_grid', 'paging_color');
	vc_remove_param('vc_media_grid', 'arrows_color');
	vc_remove_param('vc_masonry_grid', 'paging_color');
	vc_remove_param('vc_masonry_grid', 'arrows_color');
	vc_remove_param('vc_masonry_media_grid', 'paging_color');
	vc_remove_param('vc_masonry_media_grid', 'arrows_color');
}

/*** Remove frontend editor ***/
if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}
$fa_icons = getFontAwesomeIconArray();
$collection = $qodeIconCollections->getIconCollection('font_awesome');
$icons = $collection->getIconsArray();

$carousel_sliders = getCarouselSliderArray();

$animations = array(
	"" => "",
	"Elements Shows From Left Side" => "element_from_left",
	"Elements Shows From Right Side" => "element_from_right",
	"Elements Shows From Top Side" => "element_from_top",
	"Elements Shows From Bottom Side" => "element_from_bottom",
	"Elements Shows From Fade" => "element_from_fade"
);

$font_weight_array = array(
	"Default" => "",
	"Thin 100" => "100",
	"Extra-Light 200" => "200",
	"Light 300" => "300",
	"Regular 400" => "400",
	"Medium 500" => "500",
	"Semi-Bold 600" => "600",
	"Bold 700" => "700",
	"Extra-Bold 800" => "800",
	"Ultra-Bold 900" => "900"
);

/*** Accordion ***/

vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Style",
	"param_name" => "style",
	"value" => array(
		"Accordion"             => "accordion",
		"Toggle"                => "toggle",
        "Boxed Accordion"       => "boxed_accordion",
        "Boxed Toggle"          => "boxed_toggle"
	),
	'save_always' => true,
	"description" => ""
));

vc_add_param("vc_accordion", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Accordion Mark Border Radius",
	"param_name" => "accordion_border_radius",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "style", 'value' => array('accordion', 'toggle'))
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Color",
	"param_name" => "title_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Color",
	"param_name" => "background_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
    "class" => "",
    "heading" => "Title Tag",
    "param_name" => "title_tag",
    "value" => array(
        ""   => "",
        "h2" => "h2",
        "h3" => "h3",
        "h4" => "h4",	
        "h5" => "h5",
        "h6" => "h6",	
    ),
    "description" => ""
));

/*** Tabs ***/

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Style",
	"param_name" => "style",
	"value" => array(
		"Horizontal Center" => "horizontal",
		"Horizontal Left" => "horizontal_left",
		"Horizontal Right" => "horizontal_right",
		"Boxed" => "boxed",
		"Vertical Left" => "vertical_left",
		"Vertical Right" => "vertical_right"
	),
	'save_always' => true,
	"description" => ""
));

/*** Gallery ***/

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Column Number",
	"param_name" => "column_number",
	 "value" => array(2, 3, 4, 5, "Disable" => 0),
	'save_always' => true,
	 "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Grayscale Images",
    "param_name" => "grayscale",
    "value" => array('No' => 'no', 'Yes' => 'yes'),
	'save_always' => true,
    "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Enable drag",
    "param_name" => "enable_drag",
    "value" => array(
        '' => '',
        'Yes' => 'yes',
        'No' => 'no'
    ),
    "description" => "",
    "dependency" => Array('element' => "onclick", 'value' => array(''))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Show direction navigation",
    "param_name" => "direction_nav",
    "value" => array(
        '' => '',
        'Yes' => 'yes',
        'No' => 'no'
    ),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide','flexslider_fade'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Show control navigation",
    "param_name" => "control_nav",
    "value" => array(
        '' => '',
        'Yes' => 'yes',
        'No' => 'no'
    ),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide','flexslider_fade'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Pause on hover",
    "param_name" => "pause_on_hover",
    "value" => array(
        '' => '',
        'Yes' => 'yes',
        'No' => 'no'
    ),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide','flexslider_fade'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Frame",
    "param_name" => "frame",
	"value" => array("Use frame?" => "use_frame"),
	"value" => array(
		'' => '',
		'Yes' => 'use_frame',
		'No' => 'no'
	),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide'))
));

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Choose Frame",
	"param_name" => "choose_frame",
	"value" => array('Default' => 'default', 'Frame 1' => 'frame1', 'Frame 2' => 'frame2'),
	'save_always' => true,
	"dependency" => Array('element' => "frame", 'value' => array('use_frame'))
));
vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Spaces between images",
	"param_name" => "images_space",
	"value" => array('No' => 'gallery_without_space', 'Yes' => 'gallery_with_space'),
	'save_always' => true,
	"dependency" => Array('element' => "type", 'value' => array('image_grid'))
));


/*** Empty Space ***/

vc_add_param("vc_empty_space",  array(
        "type" => "attach_image",
        'heading' => 'Background Image',
        'param_name' => 'background_image',
        'value' => '',
        'description' =>( 'Select image from media library.'),
    )
);
vc_add_param("vc_empty_space",  array(
        "type" => "dropdown",
        'heading' => 'Image Repeat',
        'param_name' => 'image_repeat',
        "value" => array(
            'No Repeat' => 'no-repeat',
            'Repeat x' => 'repeat-x',
            'Repeat y' => 'repeat-y',
            'Repeat (x y)' => 'repeat'
        ),
		'save_always' => true,
        'description' =>'',
        'dependency' => array('element' => 'background_image','not_empty' => true)
    )
);

/*** Row ***/

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
		"Expandable" => "expandable",
		"Content menu" => "content_menu"
	),
	'save_always' => true
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Use Row as Full Screen Section",
	"param_name" => "use_row_as_full_screen_section",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"
	),
	'save_always' => true,
	"description" => "This option works only for Full Screen Sections Template",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width" => "full_width",
		"In Grid" => "grid"		
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Header Style",
    "param_name" => "header_style",
    "value" => array(
        "" => "",
        "Light" => "light",
        "Dark" => "dark"
    ),
    "dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Content Width",
	"param_name" => "parallax_content_width",
	"value" => array(
		"In Grid" => "in_grid",
		"Full Width" => "full_width"
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Anchor ID",
	"param_name" => "anchor",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Row in content menu",
	"value" => array(
		"No" => "",
		"Yes" => "in_content_menu"
	),
	"param_name" => "in_content_menu",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Content menu title",
	"value" => "",
	"param_name" => "content_menu_title",
	"description" => "",
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Content menu icon",
	"param_name" => "content_menu_icon",
	"value" => $icons,
	'save_always' => true,
	"description" => "",
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Angled Shape in Background",
	"param_name" => "angled_section",
	"value" => array(
		'No' => 'no',
		'Yes' => 'yes'
	),
	'save_always' => true,
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Angled Shape Position",
	"param_name" => "angled_section_position",
	"value" => array(
		'Default (both)' => 'both',
		'Only Top' => 'top',
		'Only Bottom' => 'bottom'
	),
	'save_always' => true,
	"description" => "",
	"dependency" => Array('element' => "angled_section", 'value' => array('yes'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Angled Shape Direction",
	"param_name" => "angled_section_direction",
	"value" => array(
		'From Left To Right' => 'from_left_to_right',
		'From Right To Left' => 'from_right_to_left'
	),
	'save_always' => true,
	"description" => "",
	"dependency" => Array('element' => "angled_section", 'value' => array('yes'))
));


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video background",
	"value" => array(
		"No" => "",
		"Yes" => "show_video"
	),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video overlay",
	"value" => array(
		"No" => "",
		"Yes" => "show_video_overlay"
	),
	"param_name" => "video_overlay",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video overlay image (pattern)",
	"value" => "",
	"param_name" => "video_overlay_image",
	"description" => "",
	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm) file url",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4) file url",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (ogv) file url",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video preview image",
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax', 'row'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Set Background image as pattern",
	"value" => array(
		"No" => "without_pattern",
		"Yes" => "with_pattern"
	),
	'save_always' => true,
	"param_name" => "background_image_as_pattern",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
    'type' => 'dropdown',
    'class' => '',
    'heading' => 'Full Screen Height',
    'param_name' => 'full_screen_section_height',
    'value' => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    'save_always' => true,
    'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
));

vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'class' => '',
    'heading' => 'Vertically align content in middle',
    'param_name' => 'vertically_align_content_in_middle',
    'value' => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section height",
	"param_name" => "section_height",
	"value" => "",
	"dependency" => Array('element' => "full_screen_section_height", 'value' => array('no'))
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Parallax speed",
    "param_name" => "parallax_speed",
    "value" => "",
    "dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable','content_menu'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border bottom color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));


vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Disable negative margin",
	"value" => array("Disable negative margin" => "disable_negative_margin" ),
	"param_name" => "row_negative_margin",
	"description" => 'This option will remove left and right -15px margin on row',
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding",
	"value" => "",
	"param_name" => "side_padding",
	"description" => "Padding (left/right in % - full width only)",
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Side Padding",
	"value" => "",
	"param_name" => "parallax_side_padding",
	"description" => "Padding (left/right in % - full width only)",
	"dependency" => Array('element' => "parallax_content_width", 'value' => array('full_width'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Label Color",
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Label Hover Color",
	"param_name" => "hover_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "More Label",
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Less Label",
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Label Position",
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row",  array(
    "type" => "textfield",
    "heading" => "Expandable Content Top Padding (px)",
    "param_name" => "expandable_content_top_padding",
    "admin_label" => true,
    "value" => "",
    "description" => "Default value is 70",
    "dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row",  array(
  "type" => "dropdown",
  "heading" => "CSS Animation",
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => $animations,
	'save_always' => true,
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row",  array(
  "type" => "textfield",
  "heading" => "Transition delay (ms)",
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));

/*** Row Inner ***/

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
		"Expandable" => "expandable"
	),
	'save_always' => true
	
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Use as box",
	"value" => array("Use row as box" => "use_row_as_box" ),
	"param_name" => "use_as_box",
	"description" => '',
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width" => "full_width",
		"In Grid" => "grid"
	),
	'save_always' => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Anchor ID",
	"param_name" => "anchor",
	"value" => ""
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	),
	'save_always' => true
	
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
vc_add_param("vc_row_inner", array(
    'type' => 'dropdown',
    'class' => '',
    'heading' => 'Full screen height',
    'param_name' => 'full_screen_section_height',
    'value' => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    'save_always' => true,
    'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
));
vc_add_param('vc_row_inner', array(
    'type' => 'dropdown',
    'class' => '',
    'heading' => 'Vertically align content in middle',
    'param_name' => 'vertically_align_content_in_middle',
    'value' => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section height",
	"param_name" => "section_height",
	"value" => "",
	"dependency" => Array('element' => "full_screen_section_height", 'value' => array('no'))
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Disable negative margin",
	"value" => array("Disable negative margin" => "disable_negative_margin" ),
	"param_name" => "row_negative_margin",
	"description" => 'This option will remove left and right -15px margin on row',
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding",
	"value" => "",
	"param_name" => "side_padding",
	"description" => "Padding (left/right in % - full width only)",
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "More Button Label",
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Less Button Label",
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Button Position",
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"	
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Color",
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner",  array(
    "type" => "textfield",
    "heading" => "Expandable Content Top Padding (px)",
    "param_name" => "expandable_content_top_padding",
    "admin_label" => true,
    "value" => "",
    "description" => "Default value is 70",
    "dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner",  array(
	"type" => "dropdown",
	"heading" => "CSS Animation",
	"param_name" => "css_animation",
	"admin_label" => true,
	"value" => $animations,
	'save_always' => true,
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row_inner",  array(
  "type" => "textfield",
  "heading" => "Transition delay (ms)",
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));

/*** Separator ***/


$separator_setting = array (
  'show_settings_on_create' => true,
  "controls"	=> '',
);
vc_map_update('vc_separator', $separator_setting);


vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Normal"		=>	"normal",
		"Transparent"	=>	"transparent",
		"Small"			=>	"small"
	),
	'save_always' => true,
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Position",
	"param_name" => "position",
	"value" => array(
		"Center" => "center",
		"Left" => "left",
		"Right" => "right"
	),
	'save_always' => true,
    "dependency" => array("element" => "type", "value" => array("small")),
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Color",
	"param_name" => "color",
	"value" => "",
	"dependency" => array("element" => "type", "value" => array("normal","small")),
	"description" => ""
));

vc_add_param("vc_separator",  array(
    "type" => "dropdown",
    "heading" => "Gradinet Color",
    "param_name" => "gradient_color",
    "value" => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    "description" => "",
    "dependency" => array("element" => "type", "value" => array("normal","small"))

));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Transparency",
	"param_name" => "transparency",
	"value" => "",
	"dependency" => array("element" => "type", "value" => array("normal","small")),
	"description" => "Value should be between 0 and 1"
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Thickness",
	"param_name" => "thickness",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Width",
	"param_name" => "width",
	"value" => "",
	"dependency" => array("element" => "type", "value" => array("small")),
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "",
	"value" => array("Width In Percentages?" => "yes"),
	"param_name" => "width_in_percentages",
	"dependency" => array('element' => 'width', 'not_empty' => true)
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Top Margin",
	"param_name" => "up",
	"value" => "",
	"description" => ""
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Bottom Margin",
	"param_name" => "down",
	"value" => "",
	"description" => ""
));

/*** Separator With Text ***/

vc_add_param("vc_text_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Border",
	"param_name" => "border",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"
	),
	'save_always' => true
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border Color",
	"param_name" => "border_color",
	"dependency" => Array('element' => "border", 'value' => array('yes'))
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Color",
	"param_name" => "background_color",
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Color",
	"param_name" => "title_color",
));

/*** Single Image ***/

vc_add_param("vc_single_image",  array(
  "type" => "dropdown",
  "heading" => "CSS Animation",
  "param_name" => "qode_css_animation",
  "admin_label" => true,
  "value" => $animations,
	'save_always' => true,
  "description" => ""
  
));
vc_add_param("vc_single_image",  array(
  "type" => "textfield",
  "heading" => "Transition delay (s)",
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => ""
  
));
vc_add_param("vc_single_image",  array(
  "type" => "dropdown",
  "heading" => "Hover Animation",
  "param_name" => "qode_hover_animation",
  "admin_label" => true,
  "value" => array(
  		'No animation' => '',
  		'Zoom In' => 'zoom_in',
  		'Dark Overlay' => 'darken'
  	),
  "description" => ""
  
));

$social_icons_array = array(
	"" => "",
	"ADN" => "fa-adn",
	"Android" => "fa-android",
	"Apple" => "fa-apple",
	"Bitbucket" => "fa-bitbucket",	
	"Bitbucket-Sign" => "fa-bitbucket-sign",	
	"Bitcoin" => "fa-bitcoin",	
	"BTC" => "fa-btc",	
	"CSS3" => "fa-css3",	
	"Dribbble" => "fa-dribbble",	
	"Dropbox" => "fa-dropbox",	
	"E-mail" => "fa-envelope",	
	"Facebook" => "fa-facebook",	
	"Facebook-Sign" => "fa-facebook-sign",	
	"Flickr" => "fa-flickr",	
	"Foursquare" => "fa-foursquare",	
	"GitHub" => "fa-github",	
	"GitHub-Alt" => "fa-github-alt",	
	"GitHub-Sign" => "fa-github-sign",	
	"Gittip" => "fa-gittip",	
	"Google Plus" => "fa-google-plus",	
	"Google Plus-Sign" => "fa-google-plus-sign",	
	"HTML5" => "fa-html5",	
	"Instagram" => "fa-instagram",	
	"LinkedIn" => "fa-linkedin",	
	"LinkedIn-Sign" => "fa-linkedin-sign",	
	"Linux" => "fa-linux",
	"Mail" => "fa-envelope",
	"Mail Alt" => "fa-envelope-o",
	"Mail Square" => "fa-envelope-square",
	"MaxCDN" => "fa-maxcdn",	
	"Pinterest" => "fa-pinterest",	
	"Pinterest-Sign" => "fa-pinterest-sign",	
	"Renren" => "fa-renren",	
	"Skype" => "fa-skype",	
	"StackExchange" => "fa-stackexchange",	
	"Trello" => "fa-trello",	
	"Tumblr" => "fa-tumblr",	
	"Tumblr-Sign" => "fa-tumblr-sign",	
	"Twitter" => "fa-twitter",	
	"Twitter-Sign" => "fa-twitter-sign",	
	"Vimeo-Square" => "fa-vimeo-square",	
	"VK" => "fa-vk",	
	"Weibo" => "fa-weibo",	
	"Windows" => "fa-windows",	
	"Xing" => "fa-xing",	
	"Xing-Sign" => "fa-xing-sign",	
	"YouTube" => "fa-youtube",	
	"YouTube Play" => "fa-youtube-play",	
	"YouTube-Sign" => "fa-youtube-sign"
);


// Banner
vc_map( array(
	'name'		=> 'Banner',
	'base'		=> 'qode_banner',
	'category'	=> 'by QODE',
	'icon'		=> 'extended-custom-icon-qode icon-wpb-banner',
	'allowed_container_element' => 'vc_row',
	'params' => array(
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Image',
			'param_name'	=> 'image',
			'admin_label'	=> true
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Link',
			'param_name'	=> 'link'
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Target',
			'param_name'	=> 'target',
			'value'			=> array(
				'Self'          => '_self',
				'Blank'         => '_blank',
				'Parent'        => '_parent'
			)
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> 'Vertical Alignment',
			'param_name'	=> 'vertical_alignment',
			'value'			=> array(
				'Center'		=> 'center',
				'Top'			=> 'top',
				'Bottom'		=> 'bottom'
			)
		),
		array(
			'type'			=> 'textarea_html',
			'heading'		=> 'Content',
			'param_name'	=> 'content',
			'admin_label'	=> true
		),

	)
) );

// Blockquote 
vc_map( array(
        "name" => "Blockquote",
		"base" => "blockquote",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea",
				"heading" => "Text",
				"param_name" => "text",
				"value" => "Blockquote text",
				'save_always' => true,
				'admin_label' => true

			),
            array(
				"type" => "colorpicker",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Width",
				"param_name" => "width",
				"description" => "Width (%)",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Line Height",
				"param_name" => "line_height",
				"description" => "Line Height (px)"
			),
            array(
				"type" => "colorpicker",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "heading" => "Show Quote Icon",
                "param_name" => "show_quote_icon",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => "",
				'admin_label' => true
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Quote Icon Color",
                "param_name" => "quote_icon_color",
                "description" => "",
                "dependency" => array('element' => "show_quote_icon", 'value' => 'yes'),
            )
		)
) );

/*** Blog Masonry ***/
vc_map( array(
		"name" => "Blog Masonry",
		"base" => "masonry_blog",
		"icon" => "extended-custom-icon-qode icon-wpb-masonry_blog",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array(
                "type" => "textfield",
                "heading" => "Number of Posts",
                "param_name" => "number_of_posts",
                "description" => "",
				'admin_label' => true
            ),
			array(
				"type" => "dropdown",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Title" => "title",
					"Date" => "date"
				),
				'save_always' => true,
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				'save_always' => true,
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Category Slug",
				"param_name" => "category",
				"description" => "Leave empty for all or use comma for list",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Text length",
				"param_name" => "text_length",
				"description" => "Number of characters"
			),
            array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "dropdown",
				"heading" => "Display date",
				"param_name" => "display_time",
				"value" => array(
				    "Defaut" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"heading" => "Display comments",
				"param_name" => "display_comments",
				"value" => array(
				    "Defaut" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ''
			)
		)
) );

// Blog Slider
vc_map( array(
        "name" => "Blog Slider",
        "base" => "blog_slider",
        "category" => 'by QODE',
        "icon" => "extended-custom-icon-qode icon-wpb-blog-slider",
        "allowed_container_element" => 'vc_row',
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => "Slider Type",
                "param_name" => "type",
                "value" => array(
                    "Default" => "",
                    "Carousel" => "carousel",
                    "Simple" => "simple"
                ),
                "description" => "Default type is Carousel",
				"admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => "Auto Start",
                "param_name" => "auto_start",
                "value" => array(
                    "No" => "false",
                    "Yes" => "true"
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => "Post Info Position",
                "param_name" => "info_position",
                "value" => array(
                    "Default(Overlay)" => "",
                    "Bottom" => "info_in_bottom_always"
                ),
                "dependency" => array('element' => 'type', 'value' => array('carousel',''))
            ),
            array(
                "type" => "dropdown",
                "heading" => "Image size",
                "param_name" => "image_size",
                "value" => array(
                    "Default" => "",
                    "Original Size" => "full",
                    "Landscape" => "landscape",
                    "Portrait" => "portrait",
                    "Custom" => "custom"
                )
            ),
			array(
				"type" => "textfield",
				"heading" => "Image Width (px)",
				"param_name" => "image_width",
				"value" => "",
				"description" => "Set image custom width",
				"dependency" => array('element' => 'image_size','value' => array('custom'))
			),
			array(
				"type" => "textfield",
				"heading" => "Image Height (px)",
				"param_name" => "image_height",
				"value" => "",
				"description" => "Set image custom height",
				"dependency" => array('element' => 'image_size','value' => array('custom'))
			),
            array(
                "type" => "dropdown",
                "heading" => "Order By",
                "param_name" => "order_by",
                "value" => array(
                    "" => "",
                    "Title" => "title", 
                    "Date" => "date"
                ),
				"admin_label" => true
            ),
            array(
                "type" => "dropdown",
                "heading" => "Order",
                "param_name" => "order",
                "value" => array(
                    "" => "",
                    "ASC" => "ASC",
                    "DESC" => "DESC",   
                ),
				"admin_label" => true
            ),
            array(
                "type" => "textfield",
                "heading" => "Number",
                "param_name" => "number",
                "value" => "-1",
                "description" => "Number of blog posts on page (-1 is all)"
            ),
            array(
                "type" => "dropdown",
                "heading" => "Number of Blog Posts Shown",
                "param_name" => "blogs_shown",
                "value" => array(
                    "" => "",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6"   
                ),
                "save_always" => true,
                "description" => "Number of blog posts that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)",
                "dependency" => array('element' => 'type', 'value' => array('carousel',''))
            ),
            array(
                "type" => "textfield",
                "heading" => "Category",
                "param_name" => "category",
                "value" => "",
                "description" => "Category Slug (leave empty for all)",
				"admin_label" => true
            ),
            array(
                "type" => "textfield",
                "heading" => "Selected Projects",
                "param_name" => "selected_projects",
                "value" => "",
                "description" => "Selected Projects (leave empty for all, delimit by comma)",
				"admin_label" => true
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Info Box Color",
                "param_name" => "hover_box_color",
                "value" => "",
                "description" => "",
            ),
            array(
                "type" => "dropdown",
                "heading" => "Post Info Position",
                "param_name" => "post_info_position",
                "value" => array(
                    "Default" => "",
                    "Above Title" => "above_title"
                ),
                "dependency" => array('element' => "type", 'value' => array('simple'))
            ),
            array(
                "type" => "dropdown",
                "heading" => "Show Category Names",
                "param_name" => "show_categories",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => "Default value is Yes",
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Category Name Color",
                "param_name" => "category_color",
                "value" => "",
                "dependency" => array('element' => "show_categories", 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Day Color",
                "param_name" => "day_color",
                "value" => "",
                "dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
            ),
            array(
                "type" => "textfield",
                "heading" => "Day Font Size (px)",
                "param_name" => "day_font_size",
                "value" => "",
                "dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Month Color",
                "param_name" => "month_color",
                "value" => "",
                "dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
            ),
            array(
                "type" => "textfield",
                "heading" => "Month Font Size (px)",
                "param_name" => "month_font_size",
                "value" => "",
                "dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
            ),
            array(
                "type" => "dropdown",
                "heading" => "Show Date",
                "param_name" => "show_date",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => "Default value is Yes, does not affect Carousel type - post info position bottom",
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Date Color",
                "param_name" => "date_color",
                "value" => "",
                "description" => "Does not affect Carousel type - post info position bottom",
                "dependency" => array('element' => "show_date", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                "heading" => "Show Author",
                "param_name" => "show_author",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => "Default value is Yes",
                "dependency" => array('element' => "type", 'value' => array('simple'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Author Color",
                "param_name" => "author_color",
                "value" => "",
                "description" => "",
                "dependency" => array('element' => "show_author", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                "heading" => "Title Tag",
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ),
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Title Color",
                "param_name" => "title_color",
                "value" => "",
                "description" => ""
            ),
    		array(
				"type" => "dropdown",
				"heading" => "Show Comments",
				"param_name" => "show_comments",
				"value" => array(
					"No"  => "no",
					"Yes" => "yes"
				),
				'save_always' => true,
				"description" => "",
                "dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
			),
            array(
                "type" => "colorpicker",
                "heading" => "Comments Color",
                "param_name" => "comments_color",
                "value" => "",
                "description" => "",
                "dependency" => array('element' => "show_comments", 'value' => array('yes'))
            ),
			array(
				"type" => "dropdown",
				"heading" => "Show Excerpt",
				"param_name" => "show_excerpt",
				"value" => array(
					"No"  => "no",
					"Yes" => "yes"
				),
				'save_always' => true,
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('simple'))
			),
			array(
				"type" => "textfield",
				"heading" => "Excerpt Length",
				"param_name" => "excerpt_length",
				"value" => "",
				"dependency" => array('element' => "show_excerpt", 'value' => array('yes'))
			),
            array(
                "type" => "colorpicker",
                "heading" => "Excerpt Color",
                "param_name" => "excerpt_color",
                "value" => "",
                "description" => "",
                "dependency" => array('element' => "show_excerpt", 'value' => array('yes'))
            ),
    		array(
				"type" => "dropdown",
				"heading" => "Show Read More Button",
				"param_name" => "show_read_more",
				"value" => array(
					"Default"  => "default",
					"Yes" => "yes",
					"No"  => "no"
				),
				'save_always' => true,
				"description" => "",
                "dependency" => array('element' => "type", 'value' => array('simple'))
			),
            array(
                "type" => "checkbox",
                "heading" => "Prev/Next navigation",
                "value" => array("Enable prev/next navigation?" => "enable_navigation"),
                "param_name" => "enable_navigation"
            ),
            array(
                "type" => "textfield",
                "heading" => "Extra class name",
                "param_name" => "add_class",
                "value" => "",
                "description" => "If you wish to style this particular blog slider differently, you can use this field to add an extra class name to it and then refer to that class name in your css file."
            )
        )
) );

// Button
vc_map( array(
		"name" => "Button",
		"base" => "button",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-button",
		"allowed_container_element" => 'vc_row',
		"params" =>  array_merge( array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Size",
				"param_name" => "size",
				"value" => array(
					"Default" => "",
                    "Small" => "small",
					"Medium" => "medium",	
					"Large" => "large",
					"Big Large" => "big_large",
					"Big Large full width" => "big_large_full_width"
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Style",
				"param_name" => "style",
				"value" => array(
					"Default" => "",
					"White" => "white"
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text"
			),
//			array(
//				"type" => "dropdown",
//				"class" => "",
//				"heading" => "Icon",
//				"param_name" => "icon",
//				"value" => $icons,
//				'save_always' => true
//				),
		),
	$qodeIconCollections->getVCParamsArray(),
	array(
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link",
				"param_name" => "link"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent",
					"Top" => "_top"	
				),
				'save_always' => true
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "ID",
                "param_name" => "button_id",
                "description" => "Set unique button ID attribute"
            ),
            array(
            	"type" => "dropdown",
            	"holder" => "div",
            	"class" => "",
            	"heading" => "Hover Type",
            	"param_name" => "hover_type",
            	"value" => array(
            		"Default" => "default",
            		"Enlarge" => "enlarge",	
            	),
            	'save_always' => true
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Color",
				"param_name" => "color"
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Hover Color",
                "param_name" => "hover_color"
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Background Color",
                "param_name" => "background_color"
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Hover Background Color",
                "param_name" => "hover_background_color"
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color"
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Hover Border Color",
                "param_name" => "hover_border_color"
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Style",
				"param_name" => "font_style",
				"value" => array(
					"" => "",
					"Normal" => "normal",	
					"Italic" => "italic"
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" => "",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900"
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Align",
				"param_name" => "text_align",
				"value" => array(
					"" => "",
					"Left" => "left",	
					"Right" => "right",
					"Center" => "center"
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"description" => __("Please insert margin in format: 0px 0px 1px 0px", 'qode')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border radius",
				"param_name" => "border_radius",
				"description" => __("Please insert border radius(Rounded corners) in px. For example: 4 ", 'qode')
			)
		))
) );

/*** Call to action ***/
vc_map( array(
		"name" => "Call to Action",
		"base" => "action",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-action",
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array(
                "type"          => "dropdown",
                "holder"        => "div",
                "class"         => "",
                "heading"       => "Full Width",
                "param_name"    => "full_width",
                "value"         => array(
                    "Yes"       => "yes",
                    "No"        => "no"
                ),
				'save_always' => true,
                "description"   => ""
            ),
            array(
                "type"          => "dropdown",
                "holder"        => "div",
                "class"         => "",
                "heading"       => "Content in grid",
                "param_name"    => "content_in_grid",
                "value"         => array(
                    "Yes"       => "yes",
                    "No"        => "no"
                ),
				'save_always' => true,
                "description"   => "",
                "dependency"    => array("element" => "full_width", "value" => "yes")
            ),
			array(
				"type" => "dropdown",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Simple" => "simple",
					"With Icon" => "with_icon"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "dropdown",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => array(
					"" => "",
					"Small" => "fa-lg",
					"Medium" => "fa-2x",
					"Large" => "fa-3x"
				),
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "attach_image",
				"heading" => "Custom Icon",
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "attach_image",
				"heading" => "Background Image",
				"param_name" => "background_image"
			),
			array(
				"type" => "checkbox",
				"value" => array("Use background image as pattern?" => "yes" ),
				"param_name" => "use_background_as_pattern",
				"description" => '',
				"dependency" => Array('element' => "background_image", 'not_empty' => true)
			),
			array(
				"type" => "colorpicker",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Padding Top (px)",
				"param_name" => "padding_top",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Padding Bottom (px)",
				"param_name" => "padding_bottom",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Default Text Font Size",
				"param_name" => "text_size",
				"description" => "Font size for p tag"
			),
			array(
				"type" => "dropdown",
				"heading" => "Text Font Weight",
				"param_name" => "text_font_weight",
				"value" => $font_weight_array,
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Text Letter Spacing",
				"param_name" => "text_letter_spacing",
			),
            array(
                "type" => "dropdown",
                "heading" => "Show Button",
                "param_name" => "show_button",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"heading" => "Button Size",
				"param_name" => "button_size",
				"value" => array(
					"Default" => "",
					"Small" => "small",
					"Medium" => "medium",
					"Large" => "large",
					"Big Large" => "big_large"
				),
				"description" => "",
				"dependency" => array('element' => 'show_button', 'value' => array('yes'))
			),
            array(
                "type" => "textfield",
                "heading" => "Button Text",
                "param_name" => "button_text",
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
			array(
				"type" => "textfield",
				"heading" => "Button Link",
				"param_name" => "button_link",
				"description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
			),
            array(
                "type" => "dropdown",
                "heading" => "Button Target",
                "param_name" => "button_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Button text color",
                "param_name" => "button_text_color",
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Button hover text color",
                "param_name" => "button_hover_text_color",
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Button Background Color",
                "param_name" => "button_background_color",
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
             array(
                "type" => "colorpicker",
                "heading" => "Button Hover Background Color",
                "param_name" => "button_hover_background_color",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Button Border Color",
                "param_name" => "button_border_color",
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Button Hover Border Color",
                "param_name" => "button_hover_border_color",
                "description" => "",
                "dependency" => array('element' => 'show_button', 'value' => array('yes'))
            ),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<p>"."I am test text for Call to action."."</p>",
				"description" => ""
			)
		)
) );

// Countdown
vc_map( array(
    "name" => "Countdown",
    "base" => "countdown",
    "category" => 'by QODE',
    'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
    "icon" => "extended-custom-icon-qode icon-wpb-countdown",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => "Year",
            "param_name" => "year",
            "value" => array(
                "" => "",
                "2014" => "2014",
                "2015" => "2015",
                "2016" => "2016",
                "2017" => "2017",
                "2018" => "2018",
                "2019" => "2019",
                "2020" => "2020"
            ),
			"save_always" => true,
			"admin_label" => true
        ),

        array(
            "type" => "dropdown",
            "heading" => "Month",
            "param_name" => "month",
            "value" => array(
                "" => "",
                "January" => "1",
                "February" => "2",
                "March" => "3",
                "April" => "4",
                "May" => "5",
                "June" => "6",
                "July" => "7",
                "August" => "8",
                "September" => "9",
                "October" => "10",
                "November" => "11",
                "December" => "12"
            ),
			"save_always" => true,
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Day",
            "param_name" => "day",
            "value" => array(
                "" => "",
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",
                "8" => "8",
                "9" => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
                "13" => "13",
                "14" => "14",
                "15" => "15",
                "16" => "16",
                "17" => "17",
                "18" => "18",
                "19" => "19",
                "20" => "20",
                "21" => "21",
                "22" => "22",
                "23" => "23",
                "24" => "24",
                "25" => "25",
                "26" => "26",
                "27" => "27",
                "28" => "28",
                "29" => "29",
                "30" => "30",
                "31" => "31",
            ),
			"save_always" => true,
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Hour",
            "param_name" => "hour",
            "value" => array(
                "" => "",
                "0" => "0",
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",
                "8" => "8",
                "9" => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
                "13" => "13",
                "14" => "14",
                "15" => "15",
                "16" => "16",
                "17" => "17",
                "18" => "18",
                "19" => "19",
                "20" => "20",
                "21" => "21",
                "22" => "22",
                "23" => "23",
                "24" => "24"
            ),
			"save_always" => true,
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Minute",
            "param_name" => "minute",
            "value" => array(
                "" => "",
                "0" => "0",
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",
                "8" => "8",
                "9" => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
                "13" => "13",
                "14" => "14",
                "15" => "15",
                "16" => "16",
                "17" => "17",
                "18" => "18",
                "19" => "19",
                "20" => "20",
                "21" => "21",
                "22" => "22",
                "23" => "23",
                "24" => "24",
                "25" => "25",
                "26" => "26",
                "27" => "27",
                "28" => "28",
                "29" => "29",
                "30" => "30",
                "31" => "31",
                "32" => "32",
                "33" => "33",
                "34" => "34",
                "35" => "35",
                "36" => "36",
                "37" => "37",
                "38" => "38",
                "39" => "39",
                "40" => "40",
                "41" => "41",
                "42" => "42",
                "43" => "43",
                "44" => "44",
                "45" => "45",
                "46" => "46",
                "47" => "47",
                "48" => "48",
                "49" => "49",
                "50" => "50",
                "51" => "51",
                "52" => "52",
                "53" => "53",
                "54" => "54",
                "55" => "55",
                "56" => "56",
                "57" => "57",
                "58" => "58",
                "59" => "59",
                "60" => "60",
            ),
			"save_always" => true,
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Month Label",
            "param_name" => "month_label",
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Day Label",
            "param_name" => "day_label",
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Hour Label",
            "param_name" => "hour_label",
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Minute Label",
            "param_name" => "minute_label",
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Second Label",
            "param_name" => "second_label",
			"admin_label" => true
        ),
        array(
			"type" => "textfield",
			"heading" => "Month Singular Label",
			"param_name" => "month_singular_label"
		),
		array(
			"type" => "textfield",
			"heading" => "Day Singular Label",
			"param_name" => "day_singular_label"
		),
		array(
			"type" => "textfield",
			"heading" => "Hour Singular Label",
			"param_name" => "hour_singular_label"
		),
		array(
			"type" => "textfield",
			"heading" => "Minute Singular Label",
			"param_name" => "minute_singular_label"
		),
		array(
			"type" => "textfield",
			"heading" => "Second Singular Label",
			"param_name" => "second_singular_label"
		),
        array(
            "type" => "colorpicker",
            "heading" => "Color",
            "param_name" => "color",
            "description" => "For digits, labels and separators",
        ),
        array(
            "type" => "textfield",
            "heading" => "Digit Font Size (px)",
            "param_name" => "digit_font_size",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => "Label Font Size (px)",
            "param_name" => "label_font_size",
            "description" => ""
        ),
        array(
            "type" => "dropdown",
            "heading" => "Font Weight",
            "param_name" => "font_weight",
            "description" => "For both digits and labels",
            "value" => array(
                "Default" => "",
                "Thin 100" => "100",
                "Extra-Light 200" => "200",
                "Light 300" => "300",
                "Regular 400" => "400",
                "Medium 500" => "500",
                "Semi-Bold 600" => "600",
                "Bold 700" => "700",
                "Extra-Bold 800" => "800",
                "Ultra-Bold 900" => "900"
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => "Show separator",
            "param_name" => "show_separator",
            "value" => array(
                "No" => "hide_separator",
                "Yes" => "show_separator"
            ),
			'save_always' => true
        ),
    )
) );

/*** Counter ***/
vc_map( array(
		"name" => "Counter",
		"base" => "counter",
		"category" => 'by QODE',
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "extended-custom-icon-qode icon-wpb-counter",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Zero Counter" => "zero",
					"Random Counter" => "random"	
				),
				'save_always' => true,
				"description" => "",
				'admin_label' => true
			),
            array(
                "type" => "dropdown",
                "heading" => "Box",
                "param_name" => "box",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Box Border Color",
                "param_name" => "box_border_color",
                "description" => "",
                "dependency" => array('element' => "box", 'value' => array('yes'))
            ),
			array(
				"type" => "dropdown",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Left" => "left",
					"Right" => "right",	
					"Center" => "center"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Digit",
				"param_name" => "digit",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Font size (px)",
				"param_name" => "font_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Font weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Font Color",
				"param_name" => "font_color",
				"description" => ""
			),
            array(
                "type" => "textfield",
                "heading" => "Text",
                "param_name" => "text",
                "description" => "",
				'admin_label' => true
            ),
            array(
                "type" => "textfield",
                "heading" => "Text Size (px)",
                "param_name" => "text_size",
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"heading" => "Text Font Weight",
				"param_name" => "text_font_weight",
				"value" => array(
					"Default" => "",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900"
				)
			),
			array(
				"type" => "dropdown",
				"heading" => "Text Transform",
				"param_name" => "text_transform",
				"value" => array(
					"Default" 			=> "",
					"None"				=> "none",
					"Capitalize" 		=> "capitalize",
					"Uppercase"			=> "uppercase",
					"Lowercase"			=> "lowercase"
				),
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "heading" => "Text Color",
                "param_name" => "text_color",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "heading" => "Separator",
                "param_name" => "separator",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "heading" => "Separator Color",
                "param_name" => "separator_color",
                "description" => "",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            ),
			array(
				"type" => "textfield",
				"heading" => "Separator Transparency",
				"param_name" => "separator_transparency",
				"description" => "Value should be between 0 and 1",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			)
		)
) );

// Cover Boxes
vc_map( array(
		"name" => "Cover Boxes",
		"base" => "cover_boxes",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "extended-custom-icon-qode icon-wpb-cover_boxes",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array(
                "type" => "textfield",
                "heading" => "Active element",
                "param_name" => "active_element",
                "value" => "",
				'admin_label' => true
            ),
			array(
				"type" => "attach_image",
				"heading" => "Image 1",
				"param_name" => "image1",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Title 1",
				"param_name" => "title1",
				"value" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color 1",
				"param_name" => "title_color1",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Text 1",
				"param_name" => "text1",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text Color 1",
				"param_name" => "text_color1",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Link 1",
				"param_name" => "link1",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Link label 1",
				"param_name" => "link_label1",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Target 1",
				"param_name" => "target1",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "attach_image",
				"heading" => "Image 2",
				"param_name" => "image2",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Title 2",
				"param_name" => "title2",
				"value" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color 2",
				"param_name" => "title_color2",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Text 2",
				"param_name" => "text2",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text Color 2",
				"param_name" => "text_color2",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Link 2",
				"param_name" => "link2",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Link label 2",
				"param_name" => "link_label2",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Target 2",
				"param_name" => "target2",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "attach_image",
				"heading" => "Image 3",
				"param_name" => "image3",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Title 3",
				"param_name" => "title3",
				"value" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color 3",
				"param_name" => "title_color3",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Text 3",
				"param_name" => "text3",
				"value" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text Color 3",
				"param_name" => "text_color3",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Link 3",
				"param_name" => "link3",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Link label 3",
				"param_name" => "link_label3",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Target 3",
				"param_name" => "target3",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Read More Button Style",
				"param_name" => "read_more_button_style",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => ""
			)
		)
) );

// Custom Font
vc_map( array(
		"name" => "Custom Font",
		"base" => "custom_font",
		"icon" => "extended-custom-icon-qode icon-wpb-custom_font",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Font family",
				"param_name" => "font_family",
				"value" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Font size",
				"param_name" => "font_size",
				"value" => "15",
				'save_always' => true,
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Line height",
				"param_name" => "line_height",
				"value" => "26",
				'save_always' => true,
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Font Style",
				"param_name" => "font_style",
				"value" => array(
					"Normal" => "normal",
					"Italic" => "italic"	
				),
				'save_always' => true,
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Text Align",
				"param_name" => "text_align",
				"value" => array(
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"	
				),
				'save_always' => true,
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Font weight",
				"param_name" => "font_weight",
				"value" => "300",
				'save_always' => true,
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Color",
				"param_name" => "color",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Text decoration",
				"param_name" => "text_decoration",
				"value" => array(
					"None" => "none",
					"Underline" => "underline",
					"Overline" => "overline",
					"Line Through" => "line-through"	
				),
				'save_always' => true,
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Text shadow",
				"param_name" => "text_shadow",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				'save_always' => true,
				"description" => ""
			),
            array(
                "type" => "textfield",
                "heading" => "Letter Spacing (px)",
                "param_name" => "letter_spacing",
                "value" => "",
				'admin_label' => true
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Padding (px)",
				"param_name" => "padding",
				"value" => "0"
			),
			array(
				"type" => "textfield",
				"heading" => "Margin (px)",
				"param_name" => "margin",
				"value" => "0"
			),
			array(
				"type" => "colorpicker",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Border Width (px)",
				"param_name" => "border_width",
				"value" => "",
				"description" => "Enter just number, omit px"
			),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<p>content content content</p>",
				"description" => "",
				'admin_label' => true
			)
		)
) );

/*** Google Map ***/
vc_map( array(
	"name" => "Qode Google Map",
	"base" => "qode_google_map",
	"icon" => "extended-custom-icon-qode icon-wpb-google-map",
	"category" => 'by QODE',
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 1",
			"param_name" => "address1",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 2",
			"param_name" => "address2",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 3",
			"param_name" => "address3",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 4",
			"param_name" => "address4",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 5",
			"param_name" => "address5",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Map Height",
			"param_name" => "map_height",
			"description" => ""
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Pin",
			"param_name" => "pin",
			"description" => "Select a pin image to be used on Google Map"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Custom Map Style",
			"param_name" => "custom_map_style",
			"value" => array(
				"No" => "false",
				"Yes" => "true"
			),
			'save_always' => true,
			"description" => "Enabling this option will allow to style map"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Color Overlay",
			"param_name" => "color_overlay",
			"description" => "Choose a Map color overlay",
			"dependency" => array('element' => "custom_map_style", 'value' => array('true'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Saturation",
			"param_name" => "saturation",
			"description" => "Choose a level of saturation (-100 = least saturated, 100 = most saturated)",
			"dependency" => array('element' => "custom_map_style", 'value' => array('true'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Lightness",
			"param_name" => "lightness",
			"description" => "Choose a level of lightness (-100 = darkest, 100 = lightest)",
			"dependency" => array('element' => "custom_map_style", 'value' => array('true'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Map Zoom",
			"param_name" => "zoom",
			"description" => "Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Zoom Map on Mouse Wheel",
			"param_name" => "google_maps_scroll_wheel",
			"value" => array(
				"No" => "false",
				"Yes" => "true"
			),
			'save_always' => true,
			"description" => "Enabling this option will allow users to zoom in on Map using mouse wheel"
		)
	)
));

// Icon
vc_map( array(
		"name" => "Icon",
		"base" => "icons",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-icons",
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
            $qodeIconCollections->getVCParamsArray(),
            array(
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Size",
                    "param_name" => "size",
                    "value" => array(
                        "Tiny" => "fa-lg",
                        "Small" => "fa-2x",
                        "Medium" => "fa-3x",
                        "Large" => "fa-4x",
                        "Very Large" => "fa-5x"
                    ),
					'save_always' => true,
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Type",
                    "param_name" => "type",
                    "value" => array(
                        "Normal" => "normal",
                        "Circle" => "circle",
                        "Square" => "square"
                    ),
					'save_always' => true,
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Custom Size (px)",
                    "param_name" => "custom_size",
                    "value" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Custom Shape Size (px)",
                    "param_name" => "custom_shape_size",
                    "value" => "",
                    "dependency" => array("element" => "type", "value" => array("circle", "square"))
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Icon Color",
                    "param_name" => "icon_color",
                    "description" => ""
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Icon Hover Color",
                    "param_name" => "icon_hover_color",
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Border Radius (px)",
                    "param_name" => "border_radius",
                    "value" => "",
                    "dependency" => array("element" => "type", "value" => array("square"))
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Position",
                    "param_name" => "position",
                    "value" => array(
                        "Normal" => "",
                        "Left" => "left",
                        "Center" => "center",
                        "Right" => "right"
                    ),
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Border",
                    "param_name" => "border",
                    "value" => array(
                        "Yes" => "yes",
                        "No" => "no"
                    ),
					'save_always' => true,
                    "description" => "",
                    "dependency" => Array('element' => "type", 'value' => array('square'))
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Border Color",
                    "param_name" => "border_color",
                    "description" => "Only for Square type",
                    "dependency" => Array('element' => "type", 'value' => array('square'))
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Border Width (px)",
                    "param_name" => "border_width",
                    "description" => "Only for Square type",
                    "dependency" => Array('element' => "type", 'value' => array('square'))
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Background Color",
                    "param_name" => "background_color",
                    "description" => "",
                    "dependency" => array("element" => "type", "value" => array("circle", "square"))
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Hover Background Color",
                    "param_name" => "hover_background_color",
                    "description" => "",
                    "dependency" => array("element" => "type", "value" => array("circle", "square"))
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Margin",
                    "param_name" => "margin",
                    "description" => "Margin (top right bottom left)"
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Icon Animation",
                    "param_name" => "icon_animation",
                    "value" => array(
                        "No" => "",
                        "Yes" => "q_icon_animation"
                    ),
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Icon Animation Delay (ms)",
                    "param_name" => "icon_animation_delay",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Link",
                    "param_name" => "link",
                    "value" => ""
                ),
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => "Use Link as Anchor",
					"value" => array("Use this icon as Anchor?" => "yes"),
					"param_name" => "anchor_icon",
					"description" => "Check this box to use icon as anchor link (eg. #about)",
					"dependency" => Array('element' => "link", 'not_empty' => true)
				),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Target",
                    "param_name" => "target",
                    "value" => array(
                        "Self" => "_self",
                        "Blank" => "_blank",
                        "Parent" => "_parent"
                    ),
					'save_always' => true,
                    "description" => ""
                )
            )
        )
) );

/*** Icon List Item ***/
vc_map( array(
		"name" => "Icon List Item",
		"base" => "icon_list_item",
		"icon" => "extended-custom-icon-qode icon-wpb-icon_list_item",
		"category" => 'by QODE',
		"params" =>  array_merge(
			$qodeIconCollections->getVCParamsArray(),
			array(
            array(
                "type" => "dropdown",
                "heading" => "Icon Type",
                "param_name" => "icon_type",
                "value" => array(
                    "Circle"        => "circle",
                    "Transparent"   => "transparent"
                ),
				'save_always' => true
            ),
			array(
				"type" => "textfield",
				"heading" => "Icon Size",
				"param_name" => "icon_size"
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color"
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Background Color",
				"param_name" => "icon_background_color",
                "dependency" => array('element' => "icon_type", 'value' => array('circle'))
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Border Color",
				"param_name" => "icon_border_color",
                "dependency" => array('element' => "icon_type", 'value' => array('circle'))
			),
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"admin_label" => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color"
			),
            array(
                "type" => "textfield",
                "heading" => "Title size (px)",
                "param_name" => "title_size"
            ),
			array(
				"type" => "dropdown",
				"heading" => "Title Font Weight",
				"param_name" => "title_font_weight",
				"value" => $font_weight_array
			),
			array(
				"type" => "textfield",
				"heading" => "Margin Bottom (px)",
				"param_name" => "margin_bottom"
			),
		))
) );

// Icon with Text
vc_map( array(
		"name" => "Icon With Text",
		"base" => "icon_text",
		"icon" => "extended-custom-icon-qode icon-wpb-icon_text",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
            array(
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Box type",
                    "param_name" => "box_type",
                    "value" => array(
                        "Normal" => "normal",
                        "Icon in a box" => "icon_in_a_box"
                    ),
					'save_always' => true,
                    "description" => ""
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Box Border Color",
                    "param_name" => "box_border_color",
                    "description" => "",
                    "dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Box Background Color",
                    "param_name" => "box_background_color",
                    "description" => "",
                    "dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
                )
            ),
        $qodeIconCollections->getVCParamsArray(),
        array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Image",
                "param_name" => "image"
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Type",
				"param_name" => "icon_type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				'save_always' => true,
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon/Image Position",
                "param_name" => "icon_position",
                "value" => array(
                    "Top" => "top",
                    "Left" => "left",
                    "Left From Title" => "left_from_title",
                    "Right" => "right"
                ),
				'save_always' => true,
                "description" => "Icon Position (only for normal box type)",
                "dependency" => Array('element' => "box_type", 'value' => array('normal'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Margin",
                "param_name" => "icon_margin",
                "value" => "",
                "description" => "Margin should be set in a top right bottom left format",
                "dependency" => array('element' => "icon_position", 'value' => array('top'))
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"	
				),
				'save_always' => true,
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Use Custom Icon Size",
                "param_name" => "use_custom_icon_size",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
				'save_always' => true,
                "description" => __("Select Yes if you want to use custom icon size and margin")
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon Size (px)",
				"param_name" => "custom_icon_size",
				"value" => "",
                "description" => __("Enter just number, omit px"),
                "dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon Size inside a circle or square (px)",
				"param_name" => "custom_icon_size_inner",
				"value" => "",
				"description" => __("Enter just number, omit px. Applied only for circle or square icon type"),
				"dependency" => array('element' => 'use_custom_icon_size', 'value' => array('yes'))
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Custom Icon Margin (px)",
                "param_name" => "custom_icon_margin",
                "value" => "",
                "description" => __("Spacing between icon and text (for left icon/margin position). Enter just number, omit px"),
                "dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Border Color",
				"param_name" => "icon_border_color",
				"description" => "Only for Square and Circle type",
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Hover Color",
				"param_name" => "icon_hover_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Background Color",
				"param_name" => "icon_background_color",
				"description" => "Icon Background Color (only for square and circle icon type)",
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Hover Background Color",
				"param_name" => "icon_hover_background_color",
				"description" => "Icon Hover Background Color (only for square and circle icon type)",
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Animation",
                "param_name" => "icon_animation",
                "value" => array(
                    "No" => "",
                    "Yes" => "q_icon_animation"
                ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Animation Delay (ms)",
                "param_name" => "icon_animation_delay",
                "value" => "",
                "description" => "",
                "dependency" => Array('element' => "icon_animation", 'value' => array('q_icon_animation'))
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Font Weight",
				"param_name" => "title_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
					),
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator",
                "param_name" => "separator",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Color",
                "param_name" => "separator_color",
                "description" => "",
                "dependency" => Array('element' => "separator", 'value' => array('yes'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Top Margin",
                "param_name" => "separator_top_margin",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Bottom Margin",
                "param_name" => "separator_bottom_margin",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Width",
                "param_name" => "separator_width",
                "value" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"value" => ""
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link",
				"param_name" => "link",
				"value" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Text",
				"param_name" => "link_text",
				"value" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Color",
				"param_name" => "link_color",
				"description" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Target",
				"param_name" => "target",
				"value" => array(
                    ""   => "",
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",
				),
				"description" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Icon",
				"param_name" => "link_icon",
				"value" => array(
					'' => '',
					'Yes' => 'yes',
					'No' => 'no'
				)
			)
        )
		)
) );

// Image hover
vc_map( array(
		"name" => "Image Hover",
		"base" => "image_hover",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-image_hover",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"heading" => "Image",
				"param_name" => "image",
				'admin_label' => true
			),
			array(
				"type" => "attach_image",
				"heading" => "Hover Image",
				"param_name" => "hover_image",
				'admin_label' => true
			),
            array(
				"type" => "textfield",
				"heading" => "Link",
				"param_name" => "link",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Target",
				"param_name" => "target",
				"description" => "",
                "value" => array(
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
				'save_always' => true
			),
            array(
				"type" => "dropdown",
				"heading" => "Animation",
				"param_name" => "animation",
				"description" => "",
                "value" => array(
                    "" => "",
                    "Yes" => "yes",
                    "No" => "no"
                )
			),
            array(
				"type" => "textfield",
				"heading" => "Transition delay",
				"param_name" => "transition_delay",
				"description" => "",
                "dependency" => array('element' => "animation", 'value' => array("yes"))
			)
		)
) );

// Image with text 
vc_map( array(
		"name" => "Image With Text",
		"base" => "image_with_text",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-image_with_text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"heading" => "Image",
				"param_name" => "image",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<p>"."I am test text for Image with text shortcode."."</p>",
				"description" => "",
				'admin_label' => true
			)
		)
) );

// Image with text over
vc_map( array(
		"name" => "Image With Text Over",
		"base" => "image_with_text_over",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-image_with_text_over",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => "Width",
				"param_name" => "layout_width",
				"value" => array(
                    ""   => "",
                    "1/2" => "one_half",
					"1/3" => "one_third",
					"1/4" => "one_fourth",
				),
				"description" => ""
            ),
			array(
				"type" => "attach_image",
				"heading" => "Image",
				"param_name" => "image",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Image Shader Color",
				"param_name" => "image_shader_color",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Image Shader Hover Color",
				"param_name" => "image_shader_hover_color"
			),
			array(
				"type" => "dropdown",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"
				),
				'save_always' => true,
				"description" => ""
            ),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"heading" => "Title Size (px)",
				"param_name" => "title_size",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<p>"."I am test text for Image with text shortcode."."</p>",
				"description" => "",
				'admin_label' => true
			)
		)
) );

// Text marquee
vc_map( array(
		"name" => "Text Marquee",
		"base" => "text_marquee",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-text-marquee",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			)
		)
) );

//Expanding Images
vc_map( array(
	'name' => 'Expanding Images',
	'base' => 'expanding_images',
	'category' => 'by QODE',
	'icon' => 'extended-custom-icon-qode icon-wpb-expanding-images',
	"allowed_container_element" => 'vc_row',
	'params' => array(
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Hero Image',
			'param_name'	=> 'hero_image',
			'description'	=> 'This image will be set inside the laptop frame.'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Link',
			'param_name'	=> 'link',
			'description'	=> 'Enter an external URL to link to.',
			'admin_label'	=> true
		),
		array(
		    'type'       => 'dropdown',
		    'heading'    => 'Target',
		    'param_name' => 'target',
		    'value'      => array(
		        ''      => '',
		        'Self'  => '_self',
		        'Blank' => '_blank'
		    ),
		    'dependency' => array('element' => 'link', 'not_empty' => true),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Title',
			'param_name'	=> 'title',
			'description'	=> 'Hero Image title.',
		    'dependency' => array('element' => 'link', 'not_empty' => true),
			'admin_label'	=> true
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 1',
			'param_name'	=> 'side_image_1',
			'description'	=> 'This image will be set next to the upper left corner of the laptop frame.',
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 1 Link',
			'param_name'	=> 'side_image_1_link',
		    'dependency' => array('element' => 'side_image_1', 'not_empty' => true),
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 2',
			'param_name'	=> 'side_image_2',
			'description'	=> 'This image will be set next to the lower left corner of the laptop frame.',
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 2 Link',
			'param_name'	=> 'side_image_2_link',
		    'dependency' => array('element' => 'side_image_2', 'not_empty' => true),
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 3',
			'param_name'	=> 'side_image_3',
			'description'	=> 'This image will be set next to the upper right corner of the laptop frame.',
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 3 Link',
			'param_name'	=> 'side_image_3_link',
		    'dependency' => array('element' => 'side_image_3', 'not_empty' => true),
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 4',
			'param_name'	=> 'side_image_4',
			'description'	=> 'This image will be set next to the lower right corner of the laptop frame.',
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 4 Link',
			'param_name'	=> 'side_image_4_link',
		    'dependency' => array('element' => 'side_image_4', 'not_empty' => true),
			'group'			=> 'Inner Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 5',
			'param_name'	=> 'side_image_5',
			'description'	=> 'This image will be set in the upper left corner of the entire section.',
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 5 Link',
			'param_name'	=> 'side_image_5_link',
		    'dependency' => array('element' => 'side_image_5', 'not_empty' => true),
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 6',
			'param_name'	=> 'side_image_6',
			'description'	=> 'This image will be set in the lower left corner of the entire section.',
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 6 Link',
			'param_name'	=> 'side_image_6_link',
		    'dependency' => array('element' => 'side_image_6', 'not_empty' => true),
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 7',
			'param_name'	=> 'side_image_7',
			'description'	=> 'This image will be set in the upper right corner of the entire section.',
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 7 Link',
			'param_name'	=> 'side_image_7_link',
		    'dependency' => array('element' => 'side_image_7', 'not_empty' => true),
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'attach_image',
			'heading'		=> 'Side Image 8',
			'param_name'	=> 'side_image_8',
			'description'	=> 'This image will be set in the lower right corner of the entire section.',
			'group'			=> 'Outer Side Images'
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> 'Side Image 8 Link',
			'param_name'	=> 'side_image_8_link',
		    'dependency' => array('element' => 'side_image_8', 'not_empty' => true),
			'group'			=> 'Outer Side Images'
		),
	)
));

/*** Latest Posts ***/
vc_map( array(
		"name" => "Latest Posts",
		"base" => "latest_post",
		"icon" => "extended-custom-icon-qode icon-wpb-latest_post",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", 'qode'),
				"param_name" => "type",
				"value" => array(
					"Image in left box" => "image_in_box",
					"Minimal" => "minimal",
					"Boxes" => "boxes",
					"Boxes With Dividers" => "dividers"
				),
				'save_always' => true,
				"description" => ""
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Posts",
                "param_name" => "number_of_posts",
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('date_in_box', 'image_in_box', 'minimal'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Colums",
                "param_name" => "number_of_colums",
                "value" => array(
					"Two" => "2",
					"Three" => "3",
					"Four" => "4"
				),
				'save_always' => true,
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes','dividers'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Rows",
                "param_name" => "number_of_rows",
                "value" => array(
					"One"   => "1",
					"Two"   => "2",
					"Three" => "3",
					"Four"  => "4",
					"Five"  => "5"
				),
				'save_always' => true,
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes','dividers'))
            ),	
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Text from edge",
                "param_name" => "text_from_edge",
                "value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes"
				),
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Title" => "title",
					"Date" => "date"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Slug",
				"param_name" => "category",
				"description" => "Leave empty for all or use comma for list"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text length",
				"param_name" => "text_length",
				"description" => "Number of characters"
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display category",
				"param_name" => "display_category",
				"value" => array(
					"Default" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display date",
				"param_name" => "display_time",
				"value" => array(
				    "Default" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => '',
				"dependency" => array('element' => 'type', 'value' => array("image_in_box","boxes","minimal"))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display comments",
				"param_name" => "display_comments",
				"value" => array(
				    "Default" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display like",
				"param_name" => "display_like",
				"value" => array(
				    "Default" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ''
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display share",
				"param_name" => "display_share",
				"value" => array(
				    "Default" => "",
					"Yes" => "1",
					"No" => "0"
				),
				"description" => ''
			)
		)
) );

/*** Latest Posts 2 ***/
vc_map( array(
		"name" => "Latest Posts 2",
		"base" => "latest_post_two",
		"icon" => "extended-custom-icon-qode icon-wpb-latest_post_two",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Posts",
                "param_name" => "number_of_posts",
                "description" => "",
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Colums",
                "param_name" => "number_of_columns",
                "value" => array(
					"One"   => "1",
					"Two"   => "2",
					"Three" => "3",
					"Four"  => "4"
				),
				'save_always' => true,
                "description" => "",
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Title" => "title",
					"Date" => "date"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Slug",
				"param_name" => "category",
				"description" => "Leave empty for all or use comma for list"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Length",
				"param_name" => "text_length",
				"description" => "Number of characters"
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"heading" => "Display Featured Images",
				"param_name" => "display_featured_images",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Image size",
				"param_name" => "featured_image_size",
				"value" => array(
					"Default" => "",
					"Full" => "full",
					"Landscape" => "landscape",
					"Portrait" => "portrait",
					"Custom" => "custom"
				),
				"dependency" => array('element' => 'display_featured_images','value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"heading" => "Image Width (px)",
				"param_name" => "image_width",
				"value" => "",
				"description" => "Set image custom width",
				"dependency" => array('element' => 'featured_image_size','value' => array('custom'))
			),
			array(
				"type" => "textfield",
				"heading" => "Image Height (px)",
				"param_name" => "image_height",
				"value" => "",
				"description" => "Set image custom height",
				"dependency" => array('element' => 'featured_image_size','value' => array('custom'))
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => "",
				"group" => 'Design Options'
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Color",
				"param_name" => "separator_color",
				"description" => "",
				"group" => 'Design Options'
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Excerpt Color",
				"param_name" => "excerpt_color",
				"description" => "",
				"group" => 'Design Options'
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Post Info Color",
				"param_name" => "post_info_color",
				"description" => "",
				"group" => 'Design Options'
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Post Info Separator Color",
				"param_name" => "post_info_separator_color",
				"description" => "",
				"group" => 'Design Options'
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => "",
				"group" => 'Design Options'
			)
		)
) );

// Line Graph shortcode
vc_map( array(
		"name" => "Line Graph",
		"base" => "line_graph",
		"icon" => "extended-custom-icon-qode icon-wpb-line_graph",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"" => "",
					"Rounded edges" => "rounded",
					"Sharp edges" => "sharp"	
				),
				"save_always" => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Color",
				"param_name" => "custom_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Scale steps",
				"param_name" => "scale_steps",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Scale step width",
				"param_name" => "scale_step_width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Labels",
				"param_name" => "labels",
				"value" => "Label 1, Label 2, Label 3",
				"save_always" => true
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "#1abc9c,Legend One,1,5,10;#5ed0ba,Legend Two,3,7,20;#8cddcd,Legend Three,10,2,34",
				"save_always" => true,
				"description" => ""
			)
		)
) );

// List - Ordered
vc_map( array(
		"name" => "List - Ordered",
		"base" => "ordered_list",
		"icon" => "extended-custom-icon-qode icon-wpb-ordered_list",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>",
				"description" => ""
			)

		)
) );

// List - Unordered
vc_map( array(
		"name" => "List - Unordered",
		"base" => "unordered_list",
		"icon" => "extended-custom-icon-qode icon-wpb-unordered_list",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Style",
				"param_name" => "style",
				"value" => array(
					"Circle" => "circle",
					"Number" => "number"
				),
				'save_always' => true,
				"description" => ""
			),
            array(
                "type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Number Type",
				"param_name" => "number_type",
				"value" => array(
					"Circle" => "circle_number",
					"Transparent" => "transparent_number"
				),
				'save_always' => true,
				"description" => "",
                "dependency" => array('element' => "style", 'value' => array('number'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Animate List",
				"param_name" => "animate",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				'save_always' => true,
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
                    "Default" => "",
					"Light" => "light",
					"Normal" => "normal",
                    "Bold" => "bold"
				),
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>",
				"description" => ""
			)
		)
) );

//Masonry Gallery
vc_map( array(
		"name" => "Masonry Gallery",
		"base" => "qode_masonry_gallery",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-masonry_gallery",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category",
				"param_name" => "category",
				"value" => "",
				"description" => "Category Slug (leave empty for all)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Number",
				"param_name" => "number",
				"value" => "",
				"description" => "Number of Masonry Gallery Items"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
				    "DESC" => "DESC",
				    "ASC" => "ASC"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Parallax Item Speed",
				"param_name" => "parallax_item_speed",
				"value" => "",
				"description" => 'This option only takes effect on portfolio items on which "Set Masonry Item in Parallax" is set to "Yes", default value is 0.3'
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Parallax Item Offset",
				"param_name" => "parallax_item_offset",
				"value" => "",
				"description" => 'This option only takes effect on portfolio items on which "Set Masonry Item in Parallax" is set to "Yes", default value is 0'
			),
		)
));

//Message
vc_map( array(
		"name" => "Message",
		"base" => "message",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-message",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"With Icon" => "with_icon"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => array(
					"Small" => "fa-lg",
					"Medium" => "fa-2x",
					"Large" => "fa-3x"
				),
				'save_always' => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Icon Background Color",
				"param_name" => "icon_background_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon",
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Border",
				"param_name" => "border",
				"value" => array(
					"Default"	=> "",
					"No"		=> "no",
					"Yes"		=> "yes"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Width (px)",
				"param_name" => "border_width",
				"dependency" => Array('element' => "border", 'value' => array('yes'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"dependency" => Array('element' => "border", 'value' => array('yes'))
			),
            array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Close Button Color",
				"param_name" => "close_button_color",
				"description" => ""
                        ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<p>"."I am test text for Message shortcode."."</p>",
				"description" => ""
			)
		)
) );

/*** Parallax Layers ***/
vc_map( array(
    "name" => "Parallax Layers",
    "base" => "qode_parallax_layers",
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-parallax-layers",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            "type" => "attach_images",
            "holder" => "div",
            "class" => "",
            "heading" => "Layers",
            "param_name" => "images"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Full Screen Height",
            "param_name" => "full_screen",
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
			'save_always' => true,
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Height (px)",
            "param_name" => "height",
            "value" => "",
            "dependency" => array('element' => 'full_screen', 'value' => 'no')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => "Content",
            "param_name" => "content",
            "value" => "",
            "description" => "This content will be displayed as final (top) layer over all other layers"
        )
    )
) );

// Pie Chart
vc_map( array(
		"name" => "Pie Chart",
		"base" => "pie_chart",
		"icon" => "extended-custom-icon-qode icon-wpb-pie_chart",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Percentage Color",
				"param_name" => "percentage_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Percentage Font Size",
				"param_name" => "percent_font_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Percentage Font weight",
				"param_name" => "percent_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Bar Active Color",
				"param_name" => "active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Bar Noactive Color",
				"param_name" => "noactive_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Pie Chart Line Width (px)",
				"param_name" => "line_width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"heading" => "Text",
				"param_name" => "text",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Separator",
				"param_name" => "separator",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Separator Color",
				"param_name" => "separator_color",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			)
		)
) );

// Pie Chart 2 (Pie)
vc_map( array(
		"name" => "Pie Chart 2 (Pie)",
		"base" => "pie_chart2",
		"icon" => "extended-custom-icon-qode icon-wpb-pie_chart2",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Width",
				"param_name" => "width",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Height",
				"param_name" => "height",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Legend Text Color",
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "15,#1abc9c,Legend One; 35,#5ed0ba,Legend Two; 50,#8cddcd,Legend Three",
				"save_always" => true,
				"description" => "",
				'admin_label' => true
			)

		)
) );

// Pie Chart 3 (Doughnut)
vc_map( array(
		"name" => "Pie Chart 3 (Doughnut)",
		"base" => "pie_chart3",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-pie_chart3",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Width",
				"param_name" => "width",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Height",
				"param_name" => "height",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Legend Text Color",
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "15,#1abc9c,Legend One; 35,#5ed0ba,Legend Two; 50,#8cddcd,Legend Three",
				"save_always" => true,
				"description" => "",
				'admin_label' => true
			)

		)
) );

// Pie Chart With Icon
vc_map( array(
		"name" => "Pie Chart With Icon",
		"base" => "pie_chart_with_icon",
		"icon" => "extended-custom-icon-qode icon-wpb-pie_chart_with_icon",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Bar Active Color",
				"param_name" => "active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Bar Noactive Color",
				"param_name" => "noactive_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Pie Chart Line Width (px)",
				"param_name" => "line_width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "dropdown",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"description" => "",
				'admin_label' => true
				),
			array(
				"type" => "dropdown",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Text",
				"param_name" => "text",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			)
		)
) );

/*** Portfolio ***/
vc_map( array(
		"name" => "Portfolio List",
		"base" => "portfolio_list",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-portfolio",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Standard"						=> "standard",
					"Standard No Space"				=> "standard_no_space",
					"Hover Text"					=> "hover_text",
					"Hover Text No Space"			=> "hover_text_no_space",
                    "Masonry without space"			=> "masonry",
                    "Masonry with space"			=> "masonry_gallery_with_space",
                    "Masonry(Pinterest) with space" => "masonry_with_space",
                    "Masonry(Pinterest) with space (image only)" => "masonry_with_space_without_description",
                    "Justified Gallery"				=> "justified_gallery",
                    "Alternating Sizes"				=> "alternating_sizes"
				),
				'save_always' => true,
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Hover Animation Type",
                "param_name" => "hover_type_standard",
                "value" => array(
                    "Default" => "default",
                    "Subtle Vertical" => "subtle_vertical_hover",
                    "Image Subtle Rotate Zoom" => "image_subtle_rotate_zoom_hover",
                    "Image Text Zoom" => "image_text_zoom_hover",
                    "Thin Plus Only" => "thin_plus_only",
                    "Slow Zoom" => "slow_zoom",
                    "Split Up" => "split_up"
                ),
				'save_always' => true,
                "dependency" => array('element' => "type", 'value' => array('standard', 'standard_no_space', 'masonry_with_space'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Hover Animation Type",
                "param_name" => "hover_type_text_on_hover_image",
                "value" => array(
                    "Default" => "default",
                    "Subtle Vertical" => "subtle_vertical_hover",
                    "Image Subtle Rotate Zoom" => "image_subtle_rotate_zoom_hover",
                    "Image Text Zoom" => "image_text_zoom_hover",
                    "Cursor Change" => "cursor_change_hover",
                    "Thin Plus Only" => "thin_plus_only",
                    "Slow Zoom" => "slow_zoom",
                    "Split Up" => "split_up",
                    "Grayscale" => "grayscale",
                    "Slide Up" => "slide_up",
                    "Flip From Left" => "flip_from_left"

                ),
				'save_always' => true,
                "dependency" => array('element' => "type", 'value' => array('hover_text', 'hover_text_no_space', 'masonry_with_space_without_description', 'alternating_sizes'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Hover Animation Type",
                "param_name" => "hover_type_masonry",
                "value" => array(
                    "Default" => "default",
                    "Subtle Vertical" => "subtle_vertical_hover",
                    "Image Subtle Rotate & Zoom" => "image_subtle_rotate_zoom_hover",
                    "Image & Text Zoom" => "image_text_zoom_hover",
                    "Cursor Change" => "cursor_change_hover",
                    "Thin Plus Only" => "thin_plus_only",
                    "Slow Zoom" => "slow_zoom",
                    "Split Up" => "split_up"
                ),
				'save_always' => true,
                "dependency" => array('element' => "type", 'value' => array('masonry', 'masonry_gallery_with_space', 'justified_gallery'))
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Spacing between items (px)",
				"param_name" => "spacing",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "type","value" => array("masonry_with_space", "masonry_with_space_without_description", "justified_gallery"))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Background Color",
				"param_name" => "box_background_color",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space', 'masonry_with_space'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border",
				"param_name" => "box_border",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space', 'masonry_with_space'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Width",
				"param_name" => "box_border_width",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "box_border", 'value' => array('yes'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Color",
				"param_name" => "box_border_color",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "box_border", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Columns",
				"param_name" => "columns",
				"value" => array(
					"" => "",
                    "1" => "1",
					"2" => "2",
					"3" => "3",	
					"4" => "4",	
					"5" => "5",	
					"6" => "6"	
				),
				"save_always" => true,
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space', 'masonry_with_space', 'masonry_with_space_without_description','alternating_sizes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Grid Size",
				"param_name" => "grid_size",
				"value" => array(
					"Default" => "",
					"3 Columns Grid" => "3",
					"4 Columns Grid" => "4",
					"5 Columns Grid" => "5"
				),
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('masonry', 'masonry_gallery_with_space'))
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Frame",
                "param_name" => "frame_around_item",
                "value" => array(
                    "No Frame" => "no_frame",
                    "Monitor Frame" => "monitor_frame"
                ),
                "description" => "",
                "dependency" => array('element' => "type", 'value' => array('hover_text'))
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Portfolio Loading Type",
				"param_name" => "portfolio_loading_type",
				"value" => array(
					"" => "",
					"Fade - one by one" => "portfolio_one_by_one",
					"Fade - diagonal" => "diagonal_fade",
					"Slide from top - diagonal" => "slide_from_top",
					"Slide from left - random" => "slide_from_left"
				),
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space','alternating_sizes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Portfolio Loading Type",
				"param_name" => "portfolio_loading_type_masonry",
				"value" => array(
					"" => "",
					"Fade - one by one" => "portfolio_one_by_one",
					"Fade - from bottom" => "portfolio_fade_from_bottom"
				),
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('masonry','masonry_gallery_with_space','masonry_with_space','masonry_with_space_without_description'))
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Image proportions",
                "param_name" => "image_size",
                "value" => array(
                    "Original" => "",
                    "Square" => "square",
					"Landscape" => "landscape",
					"Portrait" => "portrait"
                ),
                "description" => "",
				"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space','alternating_sizes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Image Color Overlay",
                "param_name" => "overlay_background_color",
                "value" => "",
                "description" => "Choose color for overlay that appears on hover. Not available for default hover types",
                "dependency" => array('element' => 'type', 'value' => array('standard', 'standard_no_space', 'hover_text', 'hover_text_no_space', 'masonry', 'masonry_gallery_with_space', 'masonry_with_space','masonry_with_space_without_description', 'justified_gallery','alternating_sizes'))
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Row Height (px)",
				"param_name" => "row_height",
				"value" => "200",
				"save_always" => true,
				"description" => "Targeted row height, which may vary depending on the proportions of the images.",
				"dependency" => array('element' => "type", 'value' => array('justified_gallery'))
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Last Row Behavior",
                "param_name" => "justify_last_row",
                "value" => array(
                    "Align left" => "nojustify",
                    "Align right" => "right",
                    "Align centrally" => "center",
                    "Justify" => "justify",
                    "Hide" => "hide"
                ),
                "description" => "Defines whether to justify the last row, align it in a certain way, or hide it.",
                "dependency" => array('element' => "type", 'value' => array('justified_gallery'))
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Justify Threshold (0-1)",
				"param_name" => "justify_threshold",
				"value" => "0.75",
				"description" => "If the last row takes up more than this part of available width, it will be justified despite the defined alignment. Enter 1 to never justify the last row.",
				"dependency" => array('element' => "justify_last_row", 'value' => array('nojustify','right','center'))
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Order By",
                "param_name" => "order_by",
                "value" => array(
                    "" => "",
                    "Menu Order" => "menu_order",
                    "Title" => "title",
                    "Date" => "date"
                ),
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Filter",
				"param_name" => "filter",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Filter Color",
				"param_name" => "filter_color",
				"description" => "",
				"dependency" => array('element' => "filter", 'value' => array('yes'))
			),
            array(
                "type" => "dropdown",
                "heading" => "Filter Order By",
                "param_name" => "filter_order_by",
                "value" => array(
                    "Name" => "name",
                    "Slug" => "slug",
                    "ID" => "id",
                    "Description" => "description"
                ),
                "description" => "",
                "dependency" => array('element' => "filter", 'value' => array('yes'))
            ),
			array(
				"type" => "dropdown",
				"heading" => "Enable Number of Items in Filter",
				"param_name" => "filter_number_of_items",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				"dependency" => array('element' => "filter", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Lightbox",
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" =>""
			),
			array(
				"type" => "dropdown",
				"heading" => "Show View Button",
				"param_name" => "view_button",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"
				),
				"description" =>""
			),
			array(
				"type" => "dropdown",
				"heading" => "Show Load More",
				"param_name" => "show_load_more",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => "",
				"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space', 'masonry_with_space', 'masonry_with_space_without_description', 'justified_gallery','alternating_sizes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Number",
				"param_name" => "number",
				"value" => "-1",
				"description" => "Number of portfolios on page (-1 is all)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category",
				"param_name" => "category",
				"value" => "",
				"description" => "Category Slug (leave empty for all)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Selected Projects",
				"param_name" => "selected_projects",
				"value" => "",
				"description" => "Selected Projects (leave empty for all, delimit by comma)"
			),
            array(
                "type" => "dropdown",
                "heading" => "Show Title",
                "param_name" => "show_title",
                "value" => array(
                    "" => "",
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "description" => "",
            ),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => "",
                "dependency" => array("element" => "show_title", "value" => array("", "yes"))
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title Color",
                "param_name" => "title_color",
                "value" => "",
                "description" => "",
                "dependency" => array("element" => "show_title", "value" => array("", "yes"))
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => "Title Font Size (px)",
                "param_name" => "title_font_size",
                "value" => "",
                "description" => "",
                "dependency" => array("element" => "show_title", "value" => array("", "yes"))
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Enable separator below title",
				"param_name" => "portfolio_separator",
				"value" => array(
					""   	=>	"",
					"No"   	=>	"no",
					"Yes"	=>	"yes"

				),
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Color",
                "param_name" => "separator_color",
                "value" => "",
                "description" => "",
                "dependency" => array("element" => "portfolio_separator", "value" => array("yes"))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Show Categories",
                "param_name" => "show_categories",
                "value" => array(
                    ""   	=>	"",
                    "Yes"	=>	"yes",
                    "No"   	=>	"no"
                ),
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Category Name Color",
                "param_name" => "category_color",
                "value" => "",
                "description" => "",
                "dependency" => array("element" => "show_categories", "value" => array("", "yes"))
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Text align",
				"param_name" => "text_align",
				"value" => array(
					""   => "",
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				),
				"description" => "",
				"dependency" => array('element' => 'type', 'value' => array('standard', 'standard_no_space', 'masonry_with_space'))
			)
		)
) );

/*** Portfolio Slider ***/
vc_map( array(
		"name" => "Portfolio Slider",
		"base" => "portfolio_slider",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-portfolio_slider",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Menu Order" => "menu_order",
					"Title" => "title",	
					"Date" => "date"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Number",
				"param_name" => "number",
				"value" => "-1",
				"description" => "Number of portolios on page (-1 is all)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category",
				"param_name" => "category",
				"value" => "",
				"description" => "Category Slug (leave empty for all)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Selected Projects",
				"param_name" => "selected_projects",
				"value" => "",
				"description" => "Selected Projects (leave empty for all, delimit by comma)"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Number of Items Shown",
				"param_name" => "number_of_items",
				"value" => array(
					"" => "",
					"Four" => "4",
					"Five" => "5"
				),
				"description" => " Number of items that are showing at the same time in full width (on smaller screens/sizes, due to responsiveness, there will be less items shown)"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Lightbox",
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Title Tag",
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ),
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator",
				"param_name" => "separator",
				"value" => array(
					"" => "",
					"No" => "no",
					"Yes" => "yes"

				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Hide 'View' Button",
				"param_name" => "hide_button",
				"value" => array(
					"" => "",
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Image proportions",
                "param_name" => "image_size",
                "value" => array(
                    "Original" => "",
                    "Square (cropped to 570x570)" => "square",
					"Landscape (cropped to 800x600)" => "landscape",
                    "Landscape (cropped to 500x380)" => "portfolio_slider",
					"Portrait (cropped to 600x800)" => "portrait"
                ),
                "description" => ""
            ),
            array(
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => "Prev/Next navigation",
                    "value" => array("Enable prev/next navigation?" => "enable_navigation"),
                    "param_name" => "enable_navigation"
            )
		)
) );

if(function_exists("is_woocommerce")) {

	/*** Product List - Elegant ***/
	vc_map( 
		array(
			"name" => "Product List - Elegant",
			"base" => "product_list_elegant",
			"icon" => "extended-custom-icon-qode icon-wpb-product_list_elegant",
			"category" => 'by QODE',
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => "Per Page",
					"param_name" => "per_page",
					"value" => "12",
					'admin_label' => true,
				),
				array(
					"type" => "dropdown",
					"heading" => "Columns",
					"param_name" => "columns",
					"value" => array(
						"Two" => "two_columns",
						"Three" => "three_columns",
					),
					'save_always' => true,
					'admin_label' => true,
					"description" => ""
				),
				array(
					"type" => "textfield",
					"heading" => "Category Slug",
					"param_name" => "category",
					'admin_label' => true,
				),
				array(
					"type" => "dropdown",
					"heading" => "Order By",
					"param_name" => "order_by",
					"value" => array(
						"Date" => "date",
						"Title" => "title",
                        "Menu Order" => "menu_order"
					),
					'save_always' => true,
					'admin_label' => true,
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => "Order",
					"param_name" => "order",
					"value" => array(
						"ASC" => "ASC",
						"DESC" => "DESC"
					),
					'save_always' => true,
					'admin_label' => true,
					"description" => ""
				),
	            array(
					"type" => "dropdown",
					"heading" => "Product Title Tag",
					"param_name" => "title_tag",
					"value" => array(
	                    ""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
	            ),
	            array(
					"type" => "textfield",
					"heading" => "Holder Padding (top right bottom left)",
					"param_name" => "holder_padding",
					'group'       => 'Design Options',
					"description" => "Our suggestion is to use values with percentage mark because of responsiveness"
				),
	            array(
					"type" => "colorpicker",
					"heading" => "Separator Color",
					"param_name" => "separator_color",
					"description" => "",
					'group'       => 'Design Options',
				),
				array(
					"type" => "colorpicker",
					"heading" => "Price Color",
					"param_name" => "price_color",
					"description" => "",
					'group'       => 'Design Options',
				),
				array(
					"type" => "textfield",
					"heading" => "Price Font Size (px)",
					"param_name" => "price_font_size",
					'group'       => 'Design Options',
				),
				array(
					"type" => "dropdown",
					"heading" => "Button Size",
					"param_name" => "button_size",
					"value" => array(
						"Default" => "",
						"Small" => "small",
						"Large" => "large",
						"Huge" => "big_large",
					),
					'save_always' => true,
					'group'       => 'Design Options',
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => "Button Hover Type",
					"param_name" => "button_hover_type",
					"value" => array(
						"Default" => "default",
						"Enlarge" => "enlarge",
					),
					'save_always' => true,
					'group'       => 'Design Options',
					"description" => ""
				),
			)
		) 
	);
}

if(function_exists("is_woocommerce")) {

    /*** Product List - Masonry ***/
    vc_map(
        array(
            "name" => "Product List - Masonry",
            "base" => "product_list_masonry",
            "icon" => "extended-custom-icon-qode icon-wpb-product_list_masonry",
            "category" => 'by QODE',
            "allowed_container_element" => 'vc_row',
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => "Per Page",
                    "param_name" => "per_page",
                    "value" => "",
					'admin_label' => true,
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Columns",
                    "param_name" => "columns",
                    "value" => array(
                        "Two" => "two_columns",
                        "Three" => "three_columns",
                        "Four" => "four_columns",
                    ),
                    'save_always' => true,
					'admin_label' => true,
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Category Slug",
                    "param_name" => "category",
					'admin_label' => true
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Order By",
                    "param_name" => "order_by",
                    "value" => array(
                        "Date" => "date",
                        "Title" => "title",
                        "Menu Order" => "menu_order"
                    ),
                    'save_always' => true,
					'admin_label' => true,
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Order",
                    "param_name" => "order",
                    "value" => array(
                        "ASC" => "ASC",
                        "DESC" => "DESC"
                    ),
                    'save_always' => true,
					'admin_label' => true,
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Product Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ),
                    "description" => ""
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Hover Background Color",
                    "param_name" => "hover_background_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Category Color",
                    "param_name" => "category_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Separator Color",
                    "param_name" => "separator_color",
                    "description" => "",
                    'group'       => 'Design Options',
                    'dependency' => array('element' => 'show_separator', 'value' => array('yes'))
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => "Price Color",
                    "param_name" => "price_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Price Font Size (px)",
                    "param_name" => "price_font_size",
                    'group'       => 'Design Options',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Image Proportions',
                    'param_name' => 'image_size',
                    'value' => array(
                        'Default - from Woo Settings' => '',
                        'Original' => 'original',
                        'Square' => 'square'
                    ),
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Show Separator',
                    'param_name' => 'show_separator',
                    'value' => array(
                        'Yes' => 'yes',
                        'No' => 'no'
                    ),
                    'save_always' => true
                )
            )
        )
    );
}

if(function_exists('is_woocommerce')) {

	/*** Product List - Pinterest ***/
	vc_map(
		array(
			'name' => 'Product List - Pinterest',
			'base' => 'product_list_pinterest',
			'icon' => 'extended-custom-icon-qode icon-wpb-product-list-pinterest',
			'category' => 'by QODE',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'			=> 'textfield',
					'heading'		=> 'Per Page',
					'param_name'	=> 'per_page',
					'admin_label'	=> true,
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> 'Columns',
					'param_name'	=> 'columns',
					'value'			=> array(
						'Two' => 'two_columns',
						'Three' => 'three_columns',
						'Four' => 'four_columns',
					),
					'admin_label'	=> true
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> 'Category Slug',
					'param_name'	=> 'category',
					'admin_label'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> 'Order By',
					'param_name'	=> 'order_by',
					'value'			=> array(
						'Date'			=> 'date',
						'Title'			=> 'title'
					),
					'admin_label'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> 'Order',
					'param_name'	=> 'order',
					'value'			=> array(
						'ASC'	=> 'ASC',
						'DESC'	=> 'DESC'
					),
					'admin_label'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> 'Product Title Tag',
					'param_name'	=> 'title_tag',
					'value'			=> array(
						''   => '',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					)
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> 'Hover Background Color',
					'param_name'	=> 'hover_background_color',
					'group'			=> 'Design Options',
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> 'Category Color',
					'param_name'	=> 'category_color',
					'group'			=> 'Design Options',
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> 'Separator Color',
					'param_name'	=> 'separator_color',
					'group'			=> 'Design Options',
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> 'Price Color',
					'param_name'	=> 'price_color',
					'group'			=> 'Design Options',
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> 'Price Font Size (px)',
					'param_name'	=> 'price_font_size',
					'group'			=> 'Design Options',
				)
			)
		)
	);
}


// Progress Bar - Horizontal shortcode
vc_map( array(
		"name" => "Progress Bar - Horizontal",
		"base" => "progress_bar",
		"icon" => "extended-custom-icon-qode icon-wpb-progress_bar",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "colorpicker",
				"heading" => "Percentage Color",
				"param_name" => "percent_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Percentage Font Size",
				"param_name" => "percent_font_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Percentage Font weight",
				"param_name" => "percent_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Background Color",
				"param_name" => "active_background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Active Border Color",
				"param_name" => "active_border_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Inactive Background Color",
				"param_name" => "noactive_background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Inactive Background Color Transparency",
				"param_name" => "noactive_background_color_transparency",
				"description" => "Value should be between 0 and 1. Works if field above isn't empty"
			),
			array(
				"type" => "textfield",
				"heading" => "Progress Bar Height (px)",
				"param_name" => "height",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Progress Bar Border Radius)",
				"param_name" => "border_radius",
				"description" => ""
			)
		)
) );

// Progress Bar - Icon
vc_map( array(
		"name" => "Progress Bar - Icon",
		"base" => "progress_bar_icon",
		"icon" => "extended-custom-icon-qode icon-wpb-progress_bar_icon",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Number of Icons",
				"param_name" => "icons_number",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "textfield",
				"heading" => "Number of Active Icons",
				"param_name" => "active_number",
				"description" => "",
				'admin_label' => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				'save_always' => true,
				'admin_label' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"description" => ""
				),
			array(
				"type" => "dropdown",
				"heading" => "Size",
				"param_name" => "size",
				"value" => array(
					"Tiny" => "tiny",
					"Small" => "small",
					"Medium" => "medium",	
					"Large" => "large",
					"Very Large" => "very_large",
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Custom Size (px)",
				"param_name" => "custom_size",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Active Color",
				"param_name" => "icon_active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Background Active Color",
				"param_name" => "background_active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => "Only for Square and Circle type",
				"dependency" => array('element' => "type", 'value' => array('square', 'circle'))
			),
			array(
				"type" => "colorpicker",
				"heading" => "Border Active Color",
				"param_name" => "border_active_color",
				"description" => "Only for Square and Circle type",
				"dependency" => array('element' => "type", 'value' => array('square', 'circle'))
			)
		)
) );

// Progress Bar - Vertical shortcode
vc_map( array(
		"name" => "Progress Bar - Vertical",
		"base" => "progress_bar_vertical",
		"icon" => "extended-custom-icon-qode icon-wpb-vertical_progress_bar",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array (
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				'admin_label' => true
			),
            array (
				"type" => "colorpicker",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array (
				"type" => "textfield",
				"heading" => "Title Size",
				"param_name" => "title_size",
				"description" => ""
			),
            array (
                "type" => "colorpicker",
                "heading" => "Bar Color",
                "param_name" => "bar_color",
                "description" => ""
            ),
            array (
                "type" => "colorpicker",
                "heading" => "Bar Border Color",
                "param_name" => "bar_border_color",
                "description" => ""
            ),
			array (
				"type" => "colorpicker",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array (
				"type" => "textfield",
				"heading" => "Top Border Radius",
				"param_name" => "border_radius",
				"description" => ""
			),
            array (
				"type" => "textfield",
				"heading" => "Percent",
				"param_name" => "percent",
				"description" => "",
				'admin_label' => true
			),
            array (
				"type" => "textfield",
				"heading" => "Percentage Text Size",
				"param_name" => "percentage_text_size",
				"description" => ""
			),
            array (
				"type" => "colorpicker",
				"heading" => "Percentage Color",
				"param_name" => "percent_color",
				"description" => ""
			),
            array(
				"type" => "textarea",
				"heading" => "Text",
				"param_name" => "text",
				"value" => "",
				"description" => "",
				'admin_label' => true
			)
		)
) );

/*** Qode Carousel ***/
vc_map( array(
		"name" => "Qode Carousel",
		"base" => "qode_carousel",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-qode_carousel",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Carousel Slider",
				"param_name" => "carousel",
				"value" => $carousel_sliders,
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Number Of Visible Items",
				"param_name" => "number_of_visible_items",
				"value" => array(
					"Default" => "",
					"Four" => "four_items",
					"Five" => "five_items",
				),
				"description" => "",
				'save_always' => true,
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "orderby",
				"value" => array(
					"" => "",
					"Menu Order" => "menu_order",
					"Title" => "title",	
					"Date" => "date"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Items In Two Rows?",
				"param_name" => "show_in_two_rows",
				"value" => array(
					"No" => "",
					"Yes" => "yes",
				),
				"description" => ""
			)
		)
) );

// Qode Image Slider
vc_map( array(
    "name" => "Qode Image Slider",
    "base" => "image_slider_no_space",
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-images-stack",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            "type" => "attach_images",
            "holder" => "div",
            "class" => "",
            "heading" => "Images",
            "param_name" => "images"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "On click",
            "param_name" => "on_click",
            "value" => array(
                "Do nothing"       			 	=> "",
                "Open image in prettyphoto"     => "prettyphoto",
                "Open image in new tab"			=> "new_tab",
                "Use custom links"				=> "use_custom_links"
            ),
            "description" => ""
        ),
        array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => "Custom Links",
            "param_name" => "custom_links",
            "value" => "",
            "dependency" => array('element' => 'on_click', 'value' => 'use_custom_links'),
            "description" => "Enter links for each image here. Divide links with comma."
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Custom links target",
            "param_name" => "custom_links_target",
            "value" => array(
                "" => "",
                "Same window" => "_self",
                "New window" => "_blank"
            ),
            "dependency" => array('element' => 'on_click', 'value' => 'use_custom_links'),
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Slider height (px)",
            "param_name" => "height",
            "value" => "",
            "dependency" => ""
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Navigation style",
            "param_name" => "navigation_style",
            "value" => array(
                "" => "",
                "Light" => "light",
                "Dark" => "dark"
            )
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Highlight active image",
            "param_name" => "highlight_active_image",
            "value" => array(
                "" => "",
                "Yes" => "yes",
                "No" => "no"
            )
        ),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Highlight Inactive Color",
			"param_name" => "highlight_inactive_color",
			"dependency" => array('element' => "highlight_active_image", 'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Highlight Inactive Opacity (0-1)",
			"param_name" => "highlight_inactive_opacity",
			"value" => "",
			"dependency" => array('element' => "highlight_active_image", 'value' => 'yes')
		)
    )
) );

/*** Separator with icon ***/
vc_map( array(
    "name" => "Separator with Icon",
    "base" => "separator_with_icon",
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_separator_with_icon",
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Icon",
            "param_name" => "icon",
            "value" => $icons,
			'save_always' => true,
            "description" => ""
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => "Color",
            "param_name" => "color",
            "value" => "",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Opacity",
            "param_name" => "opacity",
            "value" => "",
            "description" => "Set opacity from 0 to 1"
        )
    )
) );

/*** Service table shortcode ***/
vc_map( array(
        "name" => "Service Table",
        "base" => "service_table",
        "icon" => "extended-custom-icon-qode icon-wpb-service_table",
        "category" => 'by QODE',
        "allowed_container_element" => 'vc_row',
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title",
                "param_name" => "title",
                "value" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Title Tag",
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",   
                    "h5" => "h5",   
                    "h6" => "h6",   
                ),
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Color",
                "param_name" => "title_color",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Background Type",
                "param_name" => "title_background_type",
                "value" => array(
                    "Background Color" => "background_color_type",
                    "Background Image" => "background_image_type"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Background Color",
                "param_name" => "title_background_color",
                "description" => "",
                "dependency" => array('element' => "title_background_type", 'value' => array('background_color_type'))
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Background Image",
                "param_name" => "background_image",
                "dependency" => array('element' => "title_background_type", 'value' => array('background_image_type'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Background Image Height (px)",
                "param_name" => "background_image_height",
                "value" => "",
                "dependency" => array('element' => "title_background_type", 'value' => array('background_image_type'))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Icon",
                "param_name" => "icon",
                "value" => $icons,
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Size",
                "param_name" => "icon_size",
                "value" => array(
                    "Tiny" => "fa-lg",
                    "Small" => "fa-2x",
                    "Medium" => "fa-3x",    
                    "Large" => "fa-4x",
                    "Very Large" => "fa-5x" 
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Custom Size (px)",
                "param_name" => "custom_size",
                "value" => ""
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Content Background Color",
                "param_name" => "content_background_color",
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Around",
				"param_name" => "border",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border width (px)",
				"param_name" => "border_width",
				"value" => "",
				"dependency" => array('element' => "border", 'value' => array('yes'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border color",
				"param_name" => "border_color",
				"value" => "",
				"dependency" => array('element' => "border", 'value' => array('yes'))
			),
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => "Content",
                "param_name" => "content",
                "value" => "<li>content content content</li><li>content content content</li><li>content content content</li>",
                "description" => ""
            )
        )
) );

// Social Icon 
vc_map( array(
	"name"                      => "Social Icons",
	"base"                      => "social_icons",
	"icon"                      => "extended-custom-icon-qode icon-wpb-social_icons",
	"category"                  => 'by QODE',
	"allowed_container_element" => 'vc_row',
	"params"                    => array_merge(
		array(
			array(
				"type"              => "dropdown",
				"holder"            => "div",
				"class"             => "",
				"heading"           => "Type",
				"param_name"        => "type",
				"value"             => array(
					"Circle" => "circle_social",
                    "Square" => "square_social",
					"Normal" => "normal_social"
				),
				'save_always' => true,
				"description"       => ""
			)
		),
		$qodeIconCollections->getSocialVCParamsArray(array(),'',false,'linea_icons'),
        array(
            array(
                "type"              => "dropdown",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Use Custom Size",
                "param_name"        => "use_custom_size",
                "value"             => array(
                    "No"            => "no",
                    "Yes"           => "yes",
                ),
				'save_always' => true,
                "description"       => ""
            ),
            array(
                "type"              => "dropdown",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Size",
                "param_name"        => "size",
                "value"             => array(
                    "Small"         => "fa-lg",
                    "Normal"        => "fa-2x",
                    "Large"         => "fa-3x",
                    "Very Large"    => "fa-4x"
                ),
				'save_always' => true,
                "description"       => "",
                "dependency"        => array('element' => 'use_custom_size', 'value' => array('no'))
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Custom Size(px)",
                "param_name"        => "custom_size",
                "value"             => "",
                "dependency"        => array('element' => 'use_custom_size', 'value' => array('yes'))
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Custom Shape Size(px)",
                "param_name"        => "custom_shape_size",
                "value"             => "",
                "dependency"        => array('element' => 'use_custom_size', 'value' => array('yes')),
                "description"       => "Available only for square and circle icon types"
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Link",
                "param_name"        => "link",
                "value"             => ""
            ),
            array(
                "type"              => "dropdown",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Target",
                "param_name"        => "target",
                "value"             => array(
                    "Self"          => "_self",
                    "Blank"         => "_blank",
                    "Parent"        => "_parent"
                ),
				'save_always' => true,
                "description"       => ""
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Border Radius",
                "param_name"        => "border_radius",
                "value"             => "",
                "dependency"        => array("element" => "type", "value" => "square_social"),
                "description"       => "Add border radius in pixels. Ommit unit, add just number"
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Icon Color",
                "param_name"        => "icon_color",
                "description"       => ""
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Icon Hover Color",
                "param_name"        => "icon_hover_color",
                "description"       => ""
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Background Color",
                "param_name"        => "background_color",
                "description"       =>"",
                "dependency"        => array('element' => "type", 'value' => array('circle_social', 'square_social'))
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Background Hover Color",
                "param_name"        => "background_hover_color",
                "description"       =>"",
                "dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Background Color Transparency",
                "param_name"        => "background_color_transparency",
                "description"       =>"Value should be between 0 and 1. Applied only if you have selected background color and circle / square icon type",
                "dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Border Width",
                "param_name"        => "border_width",
                "dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Border Color",
                "param_name"        => "border_color",
                "description"       => "",
                "dependency"        => array('element' => "type", 'value' => array('circle_social', 'square_social'))
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Border Hover Color",
                "param_name"        => "border_hover_color",
                "description"       => "",
                "dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
            ),
            array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "heading"           => "Icon Margin",
                "param_name"        => "icon_margin",
                "value"             => "",
                "description"       => "Margin should be set in a top right bottom left format"
            ),
        )
    )
) );

// Social Share
vc_map( array(
    "name" => "Social Share",
    "base" => "social_share",
    "params" => array(
        array(
            "type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show share icon",
			"param_name" => "show_share_icon",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
			'save_always' => true,
			"description" => ""
        )
    ),
    "icon" => "extended-custom-icon-qode icon-wpb-social_share",
    "category" => 'by QODE',
    "allowed_container_element" => 'vc_row',
    "show_settings_on_create" => true
) );

// Social Share List
vc_map( array(
    "name" => "Social Share List",
    "base" => "social_share_list",
    "icon" => "extended-custom-icon-qode icon-wpb-social_share_list",
    "category" => 'by QODE',
    "allowed_container_element" => 'vc_row',
    "show_settings_on_create" => false,
    "params" => array()
) );

/*** Team Shortcode ***/
vc_map( array(
		"name" => "Team",
		"base" => "q_team",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-q_team",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Default" => "",
					"Main Info Below Image" => "info_below_image",
					"Main Info on Hover" => "info_on_hover"
				),
				"description" => "Default type is Main Info Below Image"
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Image",
				"param_name" => "team_image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Name",
				"param_name" => "team_name"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
            	"value" => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",   
                    "h5" => "h5",   
                    "h6" => "h6",   
                ),
				"description" => "Title tag will refer to Name of team member"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Name Color",
				"param_name" => "name_color",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "team_position"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Position Color",
				"param_name" => "position_color",
				"description" => ""
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "team_description"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Overlay Color",
				"param_name" => "overlay_color",
				"dependency" => array('element' => 'type', 'value' => array('info_on_hover')),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border",
				"param_name" => "box_border",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Width",
				"param_name" => "box_border_width",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "box_border", 'value' => array('yes'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Color",
				"param_name" => "box_border_color",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "box_border", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Separator",
				"param_name" => "show_separator",
				"value" => array(
					"Default" => "",
					"Yes" => "yes",
					"No" => "no"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Color",
				"param_name" => "separator_color",
				"value" => "",
				"dependency" => array('element' => "show_separator", 'value' => array('yes','')),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Color",
				"param_name" => "icons_color",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Social Icon 1",
				"param_name" => "team_social_icon_1",
				"value" =>$social_icons_array,
				'save_always' => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icon 1 Link",
				"param_name" => "team_social_icon_1_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 1 Target",
                "param_name" => "team_social_icon_1_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Social Icon 2",
				"param_name" => "team_social_icon_2",
				"value" =>$social_icons_array,
				'save_always' => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icon 2 Link",
				"param_name" => "team_social_icon_2_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 2 Target",
                "param_name" => "team_social_icon_2_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Social Icon 3",
				"param_name" => "team_social_icon_3",
				"value" =>$social_icons_array,
				'save_always' => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icon 3 Link",
				"param_name" => "team_social_icon_3_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 3 Target",
                "param_name" => "team_social_icon_3_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Social Icon 4",
				"param_name" => "team_social_icon_4",
				"value" =>$social_icons_array,
				'save_always' => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icon 4 Link",
				"param_name" => "team_social_icon_4_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 4 Target",
                "param_name" => "team_social_icon_4_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Social Icon 5",
				"param_name" => "team_social_icon_5",
				"value" =>$social_icons_array,
				'save_always' => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icon 5 Link",
				"param_name" => "team_social_icon_5_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Social Icon 5 Target",
                "param_name" => "team_social_icon_5_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            )
		)
) );

/*** Testimonials ***/
vc_map( array(
		"name" => "Testimonials",
		"base" => "testimonials",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-testimonials",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category",
				"param_name" => "category",
				"value" => "",
				"description" => "Category Slug (leave empty for all)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Number",
				"param_name" => "number",
				"value" => "",
				"description" => "Number of Testimonials"
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number per slide",
                "param_name" => "number_per_slide",
                "value" => array(
                    "1"         => "1",
                    "2"         => "2",
                    "3"         => "3"
                ),
                "description" => "Number of Testimonials per slide"
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Title" => "title",
					"Date" => "date",
					"Random" => "rand"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order Type",
				"param_name" => "order",
				"value" => array(
					"" => "",
					"Ascending" => "ASC",
					"Descending" => "DESC",
				),
				"description" => "",
				"dependency" => array("element" => "order_by", "value" => array("title", "date"))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Author Image",
				"param_name" => "author_image",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes",
				),
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Text Color",
                "param_name" => "text_color",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Font Size",
				"param_name" => "text_font_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Author Text Font Weight",
				"param_name" => "author_text_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Author Text Color",
                "param_name" => "author_text_color",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Author Text Font Size (px)",
				"param_name" => "author_text_font_size",
				"description" => "Enter just number. Omit px"
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Show navigation",
                "param_name" => "show_navigation",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Navigation Style",
                "param_name" => "navigation_style",
                "value" => array(
                    "Dark" => "dark",
                    "Light" => "light"
                ),
				'save_always' => true,
                "description" => "",
                "dependency" => array("element" => "show_navigation", "value" => array("yes"))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Auto rotate slides (sec)",
                "param_name" => "auto_rotate_slides",
                "value" => array(
                    "3"         => "3",
                    "5"         => "5",
                    "10"        => "10",
                    "15"        => "15",
                    "Disable"   => "0"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Animation type",
                "param_name" => "animation_type",
                "value" => array(
                    "Fade"   => "fade_option",
                    "Slide"  => "slide_option"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Animation speed",
                "param_name" => "animation_speed",
                "value" => "",
                "description" => __("Speed of slide animation in milliseconds")
            )
		)
) );

/*** Testimonials Carousel ***/
vc_map( array(
		"name" => "Testimonials Carousel",
		"base" => "testimonials_carousel",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-testimonials-carousel",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Category",
				"param_name" => "category",
				"value" => "",
				'admin_label' => true,
				"description" => "Category Slug (leave empty for all)"
			),
			array(
				"type" => "textfield",
				"heading" => "Number",
				"param_name" => "number",
				"value" => "",
				'admin_label' => true,
				"description" => "Number of Testimonials"
			),
            array(
                "type" => "dropdown",
                "heading" => "Number per slide",
                "param_name" => "number_per_slide",
                "value" => array(
                    "1"         => "1",
                    "2"         => "2",
                    "3"         => "3"
                ),
				'admin_label' => true,
                "description" => "Number of Testimonials per slide"
            ),
			array(
				"type" => "dropdown",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Title" => "title",
					"Date" => "date",
					"Random" => "rand"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Order Type",
				"param_name" => "order",
				"value" => array(
					"" => "",
					"Ascending" => "ASC",
					"Descending" => "DESC",
				),
				"description" => "",
				"dependency" => array("element" => "order_by", "value" => array("title", "date"))
			),
			array(
				"type" => "dropdown",
				"heading" => "Show Title",
				"param_name" => "show_title",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Show Rating",
				"param_name" => "show_rating",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Show Author Image",
				"param_name" => "author_image",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes",
				),
				'admin_label' => true,
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "heading" => "Text Color",
                "param_name" => "text_color",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"heading" => "Text Font Size",
				"param_name" => "text_font_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Author Text Font Weight",
				"param_name" => "author_text_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "heading" => "Author Text Color",
                "param_name" => "author_text_color",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"heading" => "Author Text Font Size (px)",
				"param_name" => "author_text_font_size",
				"description" => "Enter just number. Omit px"
			),
            array(
                "type" => "dropdown",
                "heading" => "Show navigation",
                "param_name" => "show_navigation",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
				'save_always' => true,
				'admin_label' => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "heading" => "Navigation Style",
                "param_name" => "navigation_style",
                "value" => array(
                    "Dark" => "dark",
                    "Light" => "light"
                ),
				'save_always' => true,
                "description" => "",
                "dependency" => array("element" => "show_navigation", "value" => array("yes"))
            ),
            array(
                "type" => "dropdown",
                "heading" => "Slideshow Interval (sec)",
                "param_name" => "auto_rotate_slides",
                "value" => array(
                    "3"         => "3",
                    "5"         => "5",
                    "10"        => "10",
                    "15"        => "15",
                    "Disable"   => "0"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => "Animation speed",
                "param_name" => "animation_speed",
                "value" => "",
                "description" => __("Speed of slide animation in milliseconds")
            )
		)
) );

/*** Testimonials Masonry***/
vc_map( array(
		"name" => "Testimonials Masonry",
		"base" => "testimonials_masonry",
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-testimonials-masonry",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category",
				"param_name" => "category",
				"value" => "",
				"description" => "Category Slug (leave empty for all)"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Title" => "title",
					"Date" => "date",
					"Random" => "rand"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order Type",
				"param_name" => "order",
				"value" => array(
					"" => "",
					"Ascending" => "ASC",
					"Descending" => "DESC",
				),
				"description" => "",
				"dependency" => array("element" => "order_by", "value" => array("title", "date"))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Block Main Title",
				"param_name" => "main_title",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Block Main Title Tag",
				"param_name" => "main_title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => "",
                "dependency" => array('element' => "main_title", 'not_empty' => true)
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Block Main Title Size (px)",
				"param_name" => "main_title_size",
				"value" => "",
				"description" => "",
                "dependency" => array('element' => "main_title", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Block Main Description",
				"param_name" => "description",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Block Main Button Text",
				"param_name" => "button_text",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Background Color",
				"param_name" => "button_bckg_color",
				"value" => "",
				"description" => "",
                "dependency" => array('element' => "button_text", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Link",
				"param_name" => "button_link",
				"value" => "",
				"description" => "",
                "dependency" => array('element' => "button_text", 'not_empty' => true)
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Link Target",
                "param_name" => "link_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => "",
                "dependency" => array('element' => "button_link", 'not_empty' => true)
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Author Image",
				"param_name" => "author_image",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Size (px)",
				"param_name" => "title_size",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Testimonial Background Color",
				"param_name" => "background_color",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Author Size (px)",
				"param_name" => "author_size",
				"value" => "",
				"description" => ""
			)
		)
) );

// Video box
vc_map( array(
        'name' => 'Qode Video Box',
        'base' => 'qode_video_box',
        'category' => 'by QODE',
        'icon' => 'extended-custom-icon-qode icon-wpb-video-box',
        'allowed_container_element' => 'vc_row',
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => "Video Link",
                "param_name" => "video_link"
            ),
            array(
                "type" => "attach_image",
                "heading" => "Image",
                "param_name" => "video_image"
            )
        )
) );

// Animation holder
class WPBakeryShortCode_Qode_Animation_Holder extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        'name' => 'Qode Animation Holder',
        'base' => 'qode_animation_holder',
        "content_element" => true,
        'category' => 'by QODE',
        'icon' => 'extended-custom-icon-qode icon-wpb-animation-holder',
        'allowed_container_element' => 'vc_row',
		"as_parent" => array('except' => 'vc_row'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "js_view" => 'VcColumnView',
        'params' => array(
            array(
                "type" => "dropdown",
                "heading" => "Animation Type",
                "param_name" => "animation_type",
                "value" => array(
            		'Element from Fade'	=> 'element_from_fade',
            		'Element from Left'  => 'element_from_left',
            		'Element from Right' => 'element_from_right',
            		'Element from Top'	 => 'element_from_top',
            		'Element from Bottom'	 => 'element_from_bottom',
            		'Element Grow In'	=> 'element_transform',
                ),
                'save_always' => true,
                "description" => ""
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'heading' => 'Animation Delay',
                'param_name' => 'animation_delay',
                'value' => '',
                'description' => 'Animation delay in seconds.'
            ),
        )
) );

class WPBakeryShortCode_Animated_Icons_With_Text  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Animated icons with text", "qode",
        "base" => "animated_icons_with_text",
        "as_parent" => array('only' => 'animated_icon_with_text'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-animated_icons_with_text",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => "Columns",
                "param_name" => "columns",
                "value" => array(
                    "Two"       => "two_columns",
                    "Three"     => "three_columns",
                    "Four"      => "four_columns",
                    "Five"      => "five_columns"
                ),
				'save_always' => true,
				"admin_label" => true,
                "description" => ""
            )
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Animated_Icon_With_Text extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Animated icons with text", "qode",
        "base" => "animated_icon_with_text",
		"icon" => "extended-custom-icon-qode icon-wpb-animated_icon_with_text_item",
        "content_element" => true,
        "as_child" => array('only' => 'animated_icons_with_text'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"description" => "",
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => ""
            ),
			array(
				"type" => "textarea",
				"heading" => "Text",
				"param_name" => "text",
				"description" => "",
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Icon size",
				"param_name" => "size",
				"description" => "Put number in px, ex.25"
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon background Color",
				"param_name" => "icon_background_color",
				"description" =>""
			),
            array(
				"type" => "colorpicker",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon Color on hover",
				"param_name" => "icon_color_hover",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"heading" => "Icon background Color On Hover",
				"param_name" => "icon_background_color_hover",
				"description" =>""
			),
            array(
				"type" => "colorpicker",
				"heading" => "Border Color On Hover",
				"param_name" => "border_color_hover",
				"description" => ""
			)
        )
) );

class WPBakeryShortCode_Qode_Circles  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Qode Process Holder", "qode",
        "base" => "qode_circles",
        "as_parent" => array('only' => 'qode_circle'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-qode_circles",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Columns",
                "param_name" => "columns",
                "value" => array(
                    "Three"     => "three_columns",
                    "Four"      => "four_columns",
                    "Five"      => "five_columns"
                ),
				'save_always' => true,
                "description" => ""
            ),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Line between Process",
				"param_name" => "circle_line",
				"value" => array(
                    "No"   => "no_line",
					"Yes" => "with_line",
				),
				'save_always' => true
            )
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Circle extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Qode Process", "qode",
        "base" => "qode_circle",
        "content_element" => true,
		"icon" => "extended-custom-icon-qode icon-wpb-qode_circle",
        "as_child" => array('only' => 'qode_circles'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
        	array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Icon in Process" => "icon_type",
					"Image" => "image_type",
					"Text in Process" => "text_type"
				),
				'save_always' => true
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Process Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Background Process Transparency",
                "param_name" => "background_transparency",
                "description" => "Insert value between 0 and 1"
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Process Color",
				"param_name" => "border_color",
				"description" => ""
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Border Process Width",
                "param_name" => "border_width",
                "description" => ""
            ),
        	array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon",
				"param_name" => "icon",
				"value" => $icons,
				'save_always' => true,
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Size",
				"param_name" => "size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Normal" => "fa-3x",
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"
				),
				'save_always' => true,
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Image",
                "param_name" => "image",
                "dependency" => array('element' => "type", 'value' => array("image_type"))
            ),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text in Process",
				"param_name" => "text_in_circle",
				"dependency" => array('element' => "type", 'value' => array("text_type"))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Text in Process Tag",
				"param_name" => "text_in_circle_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => "",
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Text in Process Size (px)",
                "param_name" => "font_size",
                "dependency" => array('element' => "text_in_circle", 'not_empty' => true)
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text in Process Color",
				"param_name" => "text_in_circle_color",
				"description" => "",
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text in Process Font Weight",
				"param_name" => "text_in_circle_font_weight",
				"description" => "Not all values are available for chosen font",
				"value" => array(
					"Default" => "",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900"
				),
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
			),
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link",
                "param_name" => "link",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Link Target",
                "param_name" => "link_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => "",
                "dependency" => array('element' => "link", 'not_empty' => true)
            ),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => "",
				"dependency" => array('element' => "title", 'not_empty' => true)
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => "",
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => "",
				"dependency" => array('element' => "text", 'not_empty' => true)
			)
        )
) );

class WPBakeryShortCode_Qode_Clients  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Qode Clients", "qode",
        "base" => "qode_clients",
        "as_parent" => array('only' => 'qode_client'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by QODE',
		"icon" => "extended-custom-icon-qode icon-wpb-qode_clients",
        "show_settings_on_create" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Columns",
                "param_name" => "columns",
                "value" => array(
                    "Two"       => "two_columns",
                    "Three"     => "three_columns",
                    "Four"      => "four_columns",
                    "Five"      => "five_columns",
                    "Six"       => "six_columns"
                ),
				'save_always' => true,
                "description" => ""
            )
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Client extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Qode Client", "qode",
        "base" => "qode_client",
        "content_element" => true,
		"icon" => "extended-custom-icon-qode icon-wpb-qode_client",
        "as_child" => array('only' => 'qode_clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Image",
                "param_name" => "image"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link",
                "param_name" => "link"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Link Target",
                "param_name" => "link_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                )
            )
        )
) );

class WPBakeryShortCode_Qode_Elements_Holder  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Qode Elements Holder', 'qode' ),
	"base" => "qode_elements_holder",
	"as_parent" => array('only' => 'qode_elements_holder_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-qode_elements_holder",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"heading" => "Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"heading" => "Columns",
			"param_name" => "number_of_columns",
			"value" => array(
				"One"    	=> "one_column",
				"Two"    	=> "two_columns",
				"Three"     => "three_columns",
				"Four"      => "four_columns"
			),
			"admin_label" => true,
			'save_always' => true
		),
		array(
			"type" => "dropdown",
			"heading" => "Columns Proportion",
			"param_name" => "columns_proportion",
			"value" => array(
				"50:50"    	=> "50_50",
				"66:33"    	=> "66_33",
				"33:66"     => "33_66"
			),
			"dependency" => array("element" => "number_of_columns", "value" => array("two_columns"))
		),
		array(
			"type" => "dropdown",
			"group" => "Width & Responsiveness",
			"heading" => "Switch to One Column",
			"param_name" => "switch_to_one_column",
			"value" => array(
				"Default"    		=> "",
				"Below 1300px" 		=> "1300",
				"Below 1000px"    	=> "1000",
				"Below 768px"     	=> "768",
				"Below 600px"    	=> "600",
				"Below 480px"    	=> "480",
				"Never"    			=> "never"
			),
			"admin_label" => true,
			"description" => "Choose on which stage item will be in one column"
		),
		array(
			"type" => "dropdown",
			"group" => "Width & Responsiveness",
			"heading" => "Choose Alignment In Responsive Mode",
			"param_name" => "alignment_one_column",
			"value" => array(
				"Default"    	=> "",
				"Left" 			=> "left",
				"Center"    	=> "center",
				"Right"     	=> "right"
			),
			"description" => "Alignment When Items are in One Column"
		)
	)
) );

class WPBakeryShortCode_Qode_Elements_Holder_Item  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Qode Elements Holder Item', 'qode' ),
	"base" => "qode_elements_holder_item",
	"as_parent" => array('except' => 'vc_row, vc_tabs, vc_accordion, cover_boxes, portfolio_list, portfolio_slider, qode_carousel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"as_child" => array('only' => 'qode_elements_holder'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-qode_elements_holder_item",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
			array(
				"type" => "colorpicker",
				"heading" => "Background Color",
				"param_name" => "background_color",
                "value" => "",
				"admin_label" => true,
                "description" => ""
            ),
			array(
				"type" => "attach_image",
				"heading" => "Background Image",
				"param_name" => "background_image",
				"value" => "",
				"admin_label" => true,
				"description" => ""
			),
			array(
                "type" => "textfield",
                "heading" => "Padding",
                "param_name" => "item_padding",
                "value" => "",
				"admin_label" => true,
                "description" => "Please insert padding in format 0px 10px 0px 10px"
            ),
			array(
				"type" => "dropdown",
				"heading" => "Vertical Alignment",
				"param_name" => "vertical_alignment",
				"value" => array(
					"Default" => "",
					"Top" => "top",
					"Middle" => "middle",
					"Bottom" => "bottom"
				),
				"admin_label" => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Advanced Scroll Animations",
				"param_name" => "advanced_animations",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Animation Start Position",
				"param_name" => "start_position",
				"value" => array(
					'Bottom of Page' => 'bottom',
					'Center of Page' => 'center'
				),
				'save_always' => true,
				"description" => "",
				"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
			),
			array(
				"type" => "textfield",
				"heading" => "Start Animation Style",
				"param_name" => "start_animation_style",
				"description" => "",
				"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
			),
			array(
				"type" => "dropdown",
				"heading" => "Animation End Position",
				"param_name" => "end_position",
				"value" => array(
					"Center of Page" => "center",
					"Top of Page" => "top-bottom"
				),
				'save_always' => true,
				"description" => "",
				"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
			),
			array(
				"type" => "textfield",
				"heading" => "End Animation Style",
				"param_name" => "end_animation_style",
				"description" => "",
				"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
			),
			array(
				'type' => 'textfield',
				'class' => '',
				'group' => 'Width & Responsiveness',
				'heading' => 'Padding on screen size between 1280px-1440px',
				'param_name' => 'item_padding_1280_1440',
				'value' => '',
				'description' => 'Please insert padding in format 0px 10px 0px 10px'
			),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => 'Width & Responsiveness',
                'heading' => 'Padding on screen size between 1024px-1280px',
                'param_name' => 'item_padding_1024_1280',
                'value' => '',
                'description' => 'Please insert padding in format 0px 10px 0px 10px'
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => 'Width & Responsiveness',
                'heading' => 'Padding on screen size between 768px-1024px',
                'param_name' => 'item_padding_768_1024',
                'value' => '',
                'description' => 'Please insert padding in format 0px 10px 0px 10px'
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => 'Width & Responsiveness',
                'heading' => 'Padding on screen size between 600px-768px',
                'param_name' => 'item_padding_600_768',
                'value' => '',
                'description' => 'Please insert padding in format 0px 10px 0px 10px'
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => 'Width & Responsiveness',
                'heading' => 'Padding on screen size between 480px-600px',
                'param_name' => 'item_padding_480_600',
                'value' => '',
                'description' => 'Please insert padding in format 0px 10px 0px 10px'
            ),
            array(
                'type' => 'textfield',
                'class' => '',
                'group' => 'Width & Responsiveness',
                'heading' => 'Padding on Screen Size Bellow 480px',
                'param_name' => 'item_padding_480',
                'value' => '',
                'description' => 'Please insert padding in format 0px 10px 0px 10px'
            )
        )
) );

class WPBakeryShortCode_Qode_Pricing_List  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => "Qode Pricing List", "qode",
	"base" => "qode_pricing_list",
	"as_parent" => array('only' => 'qode_pricing_list_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-qode_pricing_list",
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Pricing_List_Item extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Qode Pricing List Item", "qode",
	"base" => "qode_pricing_list_item",
	"content_element" => true,
	"icon" => "extended-custom-icon-qode icon-wpb-pricing_list_item",
	"as_child" => array('only' => 'qode_pricing_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => "Title",
			"param_name" => "title",
			'admin_label' => true
		),
		array(
			"type" => "colorpicker",
			"heading" => "Title Color",
			"param_name" => "title_color"
		),
		array(
			"type" => "textfield",
			"heading" => "Title Font Size (px)",
			"param_name" => "title_font_size",
			"description" => "Enter just number. Omit unit, it is added automatically"
		),
		array(
			"type" => "dropdown",
			"heading" => "Title Tag",
			"param_name" => "title_tag",
			"value" => array(
				""   => "",
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => "",
			"dependency" => array('element' => "title", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"heading" => "Text",
			"param_name" => "text",
			'admin_label' => true
		),
		array(
			"type" => "colorpicker",
			"heading" => "Text Color",
			"param_name" => "text_color",
		),
		array(
			"type" => "textfield",
			"heading" => "Text Font Size (px)",
			"param_name" => "text_font_size",
			"description" => "Enter just number. Omit unit, it is added automatically"
		),
		array(
			"type" => "textfield",
			"heading" => "Price",
			"param_name" => "price",
			"description" => "You can append any unit that you want",
			'admin_label' => true
		),
		array(
			"type" => "colorpicker",
			"heading" => "Price Color",
			"param_name" => "price_color",
		),
		array(
			"type" => "textfield",
			"heading" => "Price Font Size (px)",
			"param_name" => "price_font_size",
			"description" => "Enter just number. Omit unit, it is added automatically"
		)
	)
) );

class WPBakeryShortCode_Qode_Pricing_Tables  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" => "Qode Pricing Tables", "qode",
    "base" => "qode_pricing_tables",
    "as_parent" => array('only' => 'qode_pricing_table'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-pricing_column",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => "Columns",
            "param_name" => "columns",
            "value" => array(
                "Two"       => "two_columns",
                "Three"     => "three_columns",
                "Four"      => "four_columns",
            ),
			'admin_label'	=> true,
			'save_always' => true,
            "description" => ""
        )
    ),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Pricing_Table  extends WPBakeryShortCode {}
// Pricing table shortcode
vc_map( array(
		"name" => "Pricing Table",
		"base" => "qode_pricing_table",
		"icon" => "extended-custom-icon-qode icon-wpb-pricing_list_item",
		"category" => 'by QODE',
		"allowed_container_element" => 'vc_row',
        "as_child" => array('only' => 'qode_pricing_tables'), // Use only|except attributes to limit parent (separate multiple values with comma)
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Standard"	=> "standard",
					"Advanced"	=> "advanced"
				),
				'admin_label'	=> true,
				"description" => ""
			),
			array(
				"type"			=> "attach_image",
				"heading"		=> "Image",
				"param_name"	=> "image",
				"dependency" 	=> array('element' => "type", 'value' => 'advanced')
			),
			array(
				"type" => "textfield",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "Basic Plan",
				'admin_label'	=> true,
				'save_always'	=> true,
				"description" => ""
			),
			array(
				"type"			=> "textfield",
				"heading"		=> "Subtitle",
				"param_name"	=> "subtitle",
				"value"			=> "",
				"dependency" 	=> array('element' => "type", 'value' => 'advanced')
			),
			array(
				"type"			=> "textfield",
				"heading"		=> "Short Info",
				"param_name"	=> "short_info",
				"value"			=> "",
				"dependency" 	=> array('element' => "type", 'value' => 'advanced')
			),
			array(
				"type"			=> "textfield",
				"heading"		=> "Additional Info",
				"param_name"	=> "additional_info",
				"value"			=> "",
				"dependency" 	=> array('element' => "type", 'value' => 'advanced')
			),
			array(
				"type" => "textfield",
				"heading" => "Price",
				"param_name" => "price",
				'admin_label'	=> true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Currency",
				"param_name" => "currency",
				'admin_label'	=> true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"heading" => "Price Period",
				"param_name" => "price_period",
				'admin_label'	=> true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"heading" => "Show Button",
				"param_name" => "show_button",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
				'admin_label'	=> true,
				'save_always' => true
			),
            array(
                "type" => "textfield",
                "heading" => "Button Text",
                "param_name" => "button_text",
                "description" => "Default label is Purchase",
                "dependency" => array('element' => 'show_button', 'value' => 'yes')
            ),
			array(
				"type" => "textfield",
				"heading" => "Button Link",
				"param_name" => "link",
				"dependency" => array('element' => 'show_button', 'value' => 'yes')
			),
			array(
				"type" => "dropdown",
				"heading" => "Button Target",
				"param_name" => "target",
				"value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent"
				),
				"dependency" => array('element' => 'show_button', 'value' => 'yes')
			),
			array(
				"type" => "dropdown",
				"heading" => "Button Size",
				"param_name" => "button_size",
				"value" => array(
					"" => "",
					"Small" => "small",
					"Medium" => "medium",
					"Large" => "large"
				),
				"dependency" => array('element' => 'show_button', 'value' => 'yes')
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> 'Active',
				'param_name'	=> 'active',
				'value' => array(
					'No' => 'no',
					'Yes' => 'yes'
				),
				'save_always'	=> true,
				'admin_label'	=> true,
				'dependency' 	=> array('element' => 'type', 'value' => 'standard')
			),
            array(
                "type" => "textfield",
                "heading" => "Active text",
                "param_name" => "active_text",
                "dependency" => array('element' => 'active', 'value' => 'yes')
            ),
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<li>content content content</li><li>content content content</li><li>content content content</li>",
				"description" => ""
			)
		)
) );

class WPBakeryShortCode_Qode_Vertical_Split_Slider  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Qode Vertical Split Slider', 'qode' ),
	"base" => "qode_vertical_split_slider",
	"as_parent" => array('only' => 'qode_vertical_left_sliding_panel,qode_vertical_right_sliding_panel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-vertical_split_slider",
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Vertical_Left_Sliding_Panel  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Left Sliding Panel', 'qode' ),
	"base" => "qode_vertical_left_sliding_panel",
	"as_parent" => array('only' => 'qode_vertical_slide_content_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"as_child" => array('only' => 'qode_vertical_split_slider'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-vertical_split_left",
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Vertical_Right_Sliding_Panel  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Right Sliding Panel', 'qode' ),
	"base" => "qode_vertical_right_sliding_panel",
	"as_parent" => array('only' => 'qode_vertical_slide_content_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"as_child" => array('only' => 'qode_vertical_split_slider'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-vertical_split_right",
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Vertical_Slide_Content_Item  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Slide Content Item', 'qode' ),
	"base" => "qode_vertical_slide_content_item",
	"as_parent" => array('except' => 'vc_row, vc_tabs, vc_accordion, cover_boxes, portfolio_list, portfolio_slider, qode_carousel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"as_child" => array('only' => 'qode_vertical_left_sliding_panel, qode_vertical_right_sliding_panel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-qode_horizontal_marquee_item",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Image",
			"param_name" => "background_image",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Padding left/right",
			"param_name" => "item_padding",
			"value" => "",
			"description" => "Please insert padding in format '10px'"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Content Aligment",
			"param_name" => "aligment",
			"value" => array(
				"left"    	=> "left",
				"right"     => "right",
				"center"      => "center"
			),
			'save_always' => true,
			"description" => ""
		)

	)
) );

/******* Horizontal Marquee Shortcodes ***********/

class WPBakeryShortCode_Qode_Horizontal_Marquee  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Qode Horizontal Marquee', 'qode' ),
	"base" => "qode_horizontal_marquee",
	"as_parent" => array('only' => 'qode_horizontal_marquee_item'),
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-qode_horizontal_marquee",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Height (px)",
			"param_name" => "height",
			"description" => "Enter the desired height for the marquee. It might become lower to fit smaller screens."
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Spacing (px)",
			"param_name" => "spacing",
			"description" => "Distance between marquee items."
		)
	),
	"js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Horizontal_Marquee_Item  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" =>  __( 'Horizontal Marquee Item', 'qode' ),
	"base" => "qode_horizontal_marquee_item",
	"as_parent" => array('except' => 'vc_row, vc_tabs, vc_accordion, cover_boxes, portfolio_list, portfolio_slider, qode_carousel'),
	"as_child" => array('only' => 'qode_horizontal_marquee'),
	"content_element" => true,
	"category" => 'by QODE',
	"icon" => "extended-custom-icon-qode icon-wpb-qode_horizontal_marquee_item",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Width (px)",
			"param_name" => "width",
			"description" => "Enter the desired width for this item. It might be lower on smaller screens."
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Vertical Alignment",
			"param_name" => "align",
			"value" => array(
				"Top"    	=> "top",
				"Middle"     => "middle",
				"Bottom"      => "bottom"
			),
			'save_always' => true,
			"description" => "How to align the content of this item relative to the marquee height."
		)
	),
	"js_view" => 'VcColumnView'
) );

/******* Preview Slider Shortcodes ***********/

class WPBakeryShortCode_Qode_Preview_Slider  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" =>  __( 'Qode Preview Slider', 'qode' ),
    "base" => "qode_preview_slider",
    "as_parent" => array('only' => 'qode_preview_slider_item'),
    "content_element" => true,
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_preview_slider",
    "show_settings_on_create" => false,
    "params" => array(),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Preview_Slider_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" =>  __( 'Preview Slider Item', 'qode' ),
    "base" => "qode_preview_slider_item",
    "as_child" => array('only' => 'qode_preview_slider'),
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_preview_slider_item",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => "Main Image",
            "param_name" => "big_image",
            "description" => "",
			"admin_label" => true
        ),
        array(
            "type" => "attach_image",
            "heading" => "Preview Image",
            "param_name" => "small_image",
            "description" => "",
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Link",
            "param_name" => "link",
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Link Target",
            "param_name" => "target",
            "value" => array(
                "Self" => "_self",
                "Blank" => "_blank"
            ),
            'save_always' => true
        )
    )
) );

/******* In-Device Slider Shortcodes ***********/

class WPBakeryShortCode_Qode_In_Device_Slider  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" =>  __( 'Qode In-Device Slider', 'qode' ),
    "base" => "qode_in_device_slider",
    "as_parent" => array('only' => 'qode_in_device_slider_item'),
    "content_element" => true,
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_in_device_slider",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => "Device",
            "param_name" => "device",
            "description" => "Choose the frame in which the slides will be shown.",
            "value" => array(
                "Desktop" => "desktop",
                "Tablet - Portrait" => "tablet-portrait",
                "Tablet - Landscape" => "tablet-landscape",
                "Phone - Portrait" => "phone-portrait",
                "Phone - Landscape" => "phone-landscape"
            ),
            'save_always' => true,
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Image Titles on Hover?",
            "param_name" => "titles_on_hover",
            "value" => array(
                "Yes" => "yes",
                "No" => "no"
            ),
            'save_always' => true,
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Show Navigation Arrows?",
            "param_name" => "navigation",
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            'save_always' => true,
			"admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => "Autostart Slideshow",
            "param_name" => "auto_start",
            "value" => array(
                "Yes" => "yes",
                "No" => "no"
            ),
            'save_always' => true,
			"admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Time Between Slides (ms)",
            "description" => "Default is 5000.",
            "param_name" => "timeout",
            "placeholder" => '5000',
            'dependency' => array('element' => 'auto_start', 'value' => array('yes'))
        )
    ),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_In_Device_Slider_Item  extends WPBakeryShortCode {}
vc_map( array(
    "name" =>  __( 'In-Device Slider Item', 'qode' ),
    "base" => "qode_in_device_slider_item",
    "as_child" => array('only' => 'qode_in_device_slider'),
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_in_device_slider_item",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => "Image",
            "param_name" => "image",
            "description" => ""
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Title",
            "param_name" => "title"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Link",
            "param_name" => "link"
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Link Target",
            "param_name" => "target",
            "value" => array(
                "Self" => "_self",
                "Blank" => "_blank"
            ),
            'save_always' => true
        )
    )
) );

/******* Content Slider Shortcodes ***********/

class WPBakeryShortCode_Qode_Content_Slider  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
    "name" =>  __( 'Qode Content Slider', 'qode' ),
    "base" => "qode_content_slider",
    "as_parent" => array('only' => 'qode_content_slider_item'),
    "content_element" => true,
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_content_slider",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Auto Rotate",
            "param_name" => "auto_rotate",
            "value" => array(
                "3" => "3",
                "5" => "5",
                "10" => "10",
                "Disable" => "0"
            )
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Enable drag",
            "param_name" => "enable_drag",
            "value" => array(
                '' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            "description" => ""
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Show direction navigation",
            "param_name" => "direction_nav",
            "value" => array(
                '' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            "description" => ""
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Show control navigation",
            "param_name" => "control_nav",
            "value" => array(
                '' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            "description" => "",
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Justify control navigation",
            "param_name" => "control_nav_justify",
            "value" => array(
                '' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            "description" => "",
			"dependency" => Array('element' => "control_nav", 'not_empty' => true)
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Pause on hover",
            "param_name" => "pause_on_hover",
            "value" => array(
                '' => '',
                'Yes' => 'yes',
                'No' => 'no'
            ),
            "description" => "",
        )
    ),
    "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_Qode_Content_Slider_Item  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
    "name" =>  __( 'Content Slider Item', 'qode' ),
    "base" => "qode_content_slider_item",
    "as_parent" => array(''),
    "as_child" => array('only' => 'qode_content_slider'),
    "content_element" => true,
    "category" => 'by QODE',
    "icon" => "extended-custom-icon-qode icon-wpb-qode_content_slider_item",
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView'
) );

/***************** Woocommerce Shortcodes *********************/
//
if(function_exists("is_woocommerce") && version_compare(qode_get_vc_version(), '4.4.2') < 0){

/**** Order Tracking ***/

vc_map( array(
		"name" => "Order Tracking",
		"base" => "woocommerce_order_tracking",
		"icon" => "icon-wpb-woocommerce_order_tracking",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/*** Product price/cart button ***/

vc_map( array(
		"name" => "Product price/cart button",
		"base" => "add_to_cart",
		"icon" => "icon-wpb-add_to_cart",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "ID",
				"param_name" => "id",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "SKU",
				"param_name" => "sku",
				"description" => ""
			)
		)
) );

/*** Product by SKU/ID ***/

vc_map( array(
		"name" => "Product by SKU/ID",
		"base" => "product",
		"icon" => "icon-wpb-product",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "ID",
				"param_name" => "id",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "SKU",
				"param_name" => "sku",
				"description" => ""
			)
		)
) );


/*** Products by SKU/ID ***/

vc_map( array(
		"name" => "Products by SKU/ID",
		"base" => "products",
		"icon" => "icon-wpb-products",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "IDS",
				"param_name" => "ids",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "SKUS",
				"param_name" => "skus",
				"description" => ""
			)
		)
) );

/*** Product categories ***/

vc_map( array(
		"name" => "Product categories",
		"base" => "product_categories",
		"icon" => "icon-wpb-product_categories",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Number",
				"param_name" => "number",
				"description" => ""
			)
		)
) );

/*** Products by category slug ***/

vc_map( array(
		"name" => "Products by category slug",
		"base" => "product_category",
		"icon" => "icon-wpb-product_category",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category",
				"param_name" => "category",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Per Page",
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Columns",
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "orderby",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				'save_always' => true,
				"description" => ""
			)
		)
) );

/*** Recent products ***/

vc_map( array(
		"name" => "Recent products",
		"base" => "recent_products",
		"icon" => "icon-wpb-recent_products",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Per Page",
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Columns",
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				'save_always' => true,
				"description" => ""
			),
		)
) );

/*** Featured products ***/

vc_map( array(
		"name" => "Featured products",
		"base" => "featured_products",
		"icon" => "icon-wpb-featured_products",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Per Page",
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Columns",
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				'save_always' => true,
				"description" => ""
			),
		)
) );

/**** Shop Messages ***/

vc_map( array(
		"name" => "Shop Messages",
		"base" => "woocommerce_messages",
		"icon" => "icon-wpb-woocommerce_messages",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Cart ***/

vc_map( array(
		"name" => "Pages - Cart",
		"base" => "woocommerce_cart",
		"icon" => "icon-wpb-woocommerce_cart",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Checkout ***/

vc_map( array(
		"name" => "Pages - Checkout",
		"base" => "woocommerce_checkout",
		"icon" => "icon-wpb-woocommerce_checkout",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** My Account ***/

vc_map( array(
		"name" => "Pages - My Account",
		"base" => "woocommerce_my_account",
		"icon" => "icon-wpb-woocommerce_my_account",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Edit Address ***/

vc_map( array(
		"name" => "Pages - Edit Address",
		"base" => "woocommerce_edit_address",
		"icon" => "icon-wpb-woocommerce_edit_address",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Change Password ***/

vc_map( array(
		"name" => "Pages - Change Password",
		"base" => "woocommerce_change_password",
		"icon" => "icon-wpb-woocommerce_change_password",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** View Order ***/

vc_map( array(
		"name" => "Pages - View Order",
		"base" => "woocommerce_view_order",
		"icon" => "icon-wpb-woocommerce_view_order",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Pay ***/

vc_map( array(
		"name" => "Pages - Pay",
		"base" => "woocommerce_pay",
		"icon" => "icon-wpb-woocommerce_pay",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Thankyou ***/

vc_map( array(
		"name" => "Pages - Thankyou",
		"base" => "woocommerce_thankyou",
		"icon" => "icon-wpb-woocommerce_thankyou",
		"category" => 'Woocommerce',
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

}

/*** Contact Form 7 ***/

if(qode_contact_form_7_installed()){
	vc_add_param("contact-form-7", array(
		"type" => "dropdown",
		"class" => "",
		"heading" => "Style",
		"param_name" => "html_class",
		"value" => array(
			"Default"				=> "default",
			"Custom Style 1"		=> "cf7_custom_style_1",
			"Custom Style 2"		=> "cf7_custom_style_2",
			"Custom Style 3"		=> "cf7_custom_style_3"
		),
		'save_always' => true,
		"description" => "You can style each form element individually in Qode Options > Contact Form 7"
	));
}

/*** Restore Tabs&Accordion from Deprecated category ***/

$vc_map_deprecated_settings = array (
	'deprecated' => false,
	'category' => __( 'Content', 'js_composer' )
);
vc_map_update( 'vc_accordion', $vc_map_deprecated_settings );
vc_map_update( 'vc_tabs', $vc_map_deprecated_settings );
vc_map_update( 'vc_tab', array('deprecated' => false) );
vc_map_update( 'vc_accordion_tab', array('deprecated' => false) );

?>