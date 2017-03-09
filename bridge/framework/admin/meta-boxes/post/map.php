<?php
$qode_custom_sidebars = array();
foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
	if(isUserMadeSidebar(ucwords($sidebar['name']))){
		$qode_custom_sidebars[$sidebar['id']] = ucwords( $sidebar['name']);
	}
}

$qodeGeneral = new QodeMetaBox("post", "Qode General");
$qodeFramework->qodeMetaBoxes->addMetaBox("post_general",$qodeGeneral);

	$qode_page_background_color = new QodeMetaField("color","qode_page_background_color","","Page Background Color","Choose the page background (body) color");
	$qodeGeneral->addChild("qode_page_background_color",$qode_page_background_color);

	$qode_show_animation = new QodeMetaField("selectblank", "qode_show-animation", "", "Page Transition", 'Choose a type of transition between loading pages.', array(
		"no_animation" => "No Animation",
		"updown" => "Up / Down",
		"fade" => "Fade",
		"updown_fade" => "Up/Down (In) / Fade (Out)",
		"leftright" => "Left / Right"
	), array(), "enable_grid_elements", array("yes"));
	$qodeGeneral->addChild("qode_show-animation", $qode_show_animation);

	$page_transitions_notice = new QodeNotice("Page Transition",'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', "AJAX Page transitions are disabled due to VC Grid Elements", "enable_grid_elements","no");
	$qodeGeneral->addChild("page_transitions_notice",$page_transitions_notice);

	$qode_hide_featured_image = new QodeMetaField("yesno","qode_hide-featured-image","no","Hide Feature image","Do you want to hide feature image for this post?");
	$qodeGeneral->addChild("qode_hide-featured-image",$qode_hide_featured_image);

	$qode_revolution_slider = new QodeMetaField("text","qode_revolution-slider","","Layer Slider or Qode Slider Shortcode","Copy and paste your shortcode located in Qode Slider -> Slider");
	$qodeGeneral->addChild("qode_revolution-slider",$qode_revolution_slider);

	$qode_post_style_masonry_date_image = new QodeMetaField("select","qode_post_style_masonry_date_image","","Dimensions of image for Blog Masonry - Date in Image","Choose post image dimensions for Blog Masonry - Date in Image template",array(
		"full" => "Default",
		"landscape" => "Landscape",
		"portrait" => "Portrait",
		"square" => "Square"
		));
	$qodeGeneral->addChild("qode_post_style_masonry_date_image",$qode_post_style_masonry_date_image);

    $qode_post_style_masonry_gallery = new QodeMetaField("select","qode_post_style_masonry_gallery","","Dimensions for Masonry Gallery","Choose image layout when it appears in Masonry Gallery list",array(
        "default" => "Default",
        "large-width" => "Large width",
        "large-height" => "Large heigh",
        "large-width-height" => "Large width/height"
    ));
    $qodeGeneral->addChild("qode_post_style_masonry_gallery",$qode_post_style_masonry_gallery);

	$qode_enable_content_top_margin = new QodeMetaField("selectblank","qode_enable_content_top_margin","","Always put content below header","Enabling this option always will put content below header", array(
		"no" => "No",
		"yes" => "Yes",
	));
	$qodeGeneral->addChild("qode_enable_content_top_margin",$qode_enable_content_top_margin);
// Left Menu Area

$qodeLeftMenuArea = new QodeMetaBox("post", "Qode Left Menu Area","vertical_area",array("no"));
$qodeFramework->qodeMetaBoxes->addMetaBox("post_left_menu",$qodeLeftMenuArea);

	$qode_page_vertical_area_transparency = new QodeMetaField("selectblank","qode_page_vertical_area_transparency","","Enable transparent left menu area","Enabling this option will make Left Menu background transparent ", array(
       "no" => "No",
       "yes" => "Yes"
      ));
	$qodeLeftMenuArea->addChild("qode_page_vertical_area_transparency",$qode_page_vertical_area_transparency);

	$qode_page_vertical_area_background = new QodeMetaField("color","qode_page_vertical_area_background","","Left Menu Area Background Color","Choose a color for Left Menu background");
	$qodeLeftMenuArea->addChild("qode_page_vertical_area_background",$qode_page_vertical_area_background);

	$qode_page_vertical_area_background_image = new QodeMetaField("image","qode_page_vertical_area_background_image","","Left Menu Area Background Image","Choose an image for Left Menu background");
	$qodeLeftMenuArea->addChild("qode_page_vertical_area_background_image",$qode_page_vertical_area_background_image);


// Layout
$post_layout_meta_box = qode_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => 'Qode Post Layout',
        'name' => 'post_layout'
    )
);

	qode_add_meta_box_field(
		array(
			'name'        	=> 'blog_single_type_meta',
			'type'        	=> 'selectblank',
			'label'       	=> 'Single Post Type',
			'default_value'	=> '',
			'description'	=> 'Choose type for Single Post pages',
			'parent'		=> $post_layout_meta_box,
			'options'		=> array(
				'standard'				=> 'Standard',
				'image-title-post'		=> 'Image Title Post'
			)
		)
	);
    qode_add_meta_box_field(
        array(
            'name'        => 'post_layout_meta',
            'type'        => 'selectblank',
            'label'       => 'Post Layout',
            'default'	  => 'default',
            'description' => 'Choose post layout for Blog Compound list',
            'parent'      => $post_layout_meta_box,
            'options'     => array(
                'default' => 'Default',
                'split' => 'Split'
            )
        )
    );

// Header
$qodeHeader = new QodeMetaBox("post", "Qode Header","vertical_area",array("yes"));
$qodeFramework->qodeMetaBoxes->addMetaBox("post_header",$qodeHeader);

	$qode_header_style = new QodeMetaField("selectblank","qode_header-style","","Header Skin","Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style", array(
       "light" => "Light",
       "dark" => "Dark"
      ));
	$qodeHeader->addChild("qode_header-style",$qode_header_style);

    $qode_header_style_on_scroll = new QodeMetaField("selectblank","qode_header-style-on-scroll","","Enable Header Style on Scroll","Enabling this option, header will change style on scroll (depending on row settings) to make header elements (logo, main menu, side menu button) in that style", array(
        "no" => "No",
        "yes" => "Yes"
    ));
    $qodeHeader->addChild("qode_header-style-on-scroll",$qode_header_style_on_scroll);

	$qode_header_color_per_page = new QodeMetaField("color","qode_header_color_per_page","","Initial Header Background Color","Choose a background color for header area");
	$qodeHeader->addChild("qode_header_color_per_page",$qode_header_color_per_page);

	$qode_header_color_transparency_per_page = new QodeMetaField("text","qode_header_color_transparency_per_page","","Initial Header Transparency","Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)", array(), array("col_width" => 3));
	$qodeHeader->addChild("qode_header_color_transparency_per_page",$qode_header_color_transparency_per_page);

	$qode_page_scroll_amount_for_sticky = new QodeMetaField("text","qode_page_scroll_amount_for_sticky","","Scroll amount for sticky header appearance (px)","Define scroll amount for sticky header appearance", array(), array("col_width" => 3),"header_bottom_appearance",array( "regular","fixed","fixed_hiding") );
	$qodeHeader->addChild("qode_page_scroll_amount_for_sticky",$qode_page_scroll_amount_for_sticky);
	
	$qode_page_hide_initial_sticky = new QodeMetaField("selectblank","qode_page_hide_initial_sticky","","Hide Sticky Header Initially","Enabling this option will initially hide the header, and it will only be displayed when the user scrolls down the page", array(
		"no" => "No",
		"yes" => "Yes"	
	));
	$qodeHeader->addChild("qode_page_hide_initial_sticky",$qode_page_hide_initial_sticky);
	
// Title

$qodeTitle = new QodeMetaBox("post", "Qode Title");
$qodeFramework->qodeMetaBoxes->addMetaBox("post_title",$qodeTitle);

	$qode_show_page_title = new QodeMetaField("select","qode_show-page-title","default","Don't Show Title Area","Enable this option to turn off page title area", array(
			"" => "Default",
			"no" => "No",
			"yes" => "Yes"),
		array("dependence" => true,
			"hide" => array(
				"yes"=>"#qodef_qode_page_title_area_container, #qodef-meta-box-post_title_animations"),
			"show" => array(
				""=>"#qodef_qode_page_title_area_container, #qodef-meta-box-post_title_animations",
				"no"=>"#qodef_qode_page_title_area_container, #qodef-meta-box-post_title_animations") ));
	$qodeTitle->addChild("qode_show-page-title",$qode_show_page_title);

	$qode_page_title_area_container = new QodeContainer("qode_page_title_area_container","qode_show-page-title","yes");
	$qodeTitle->addChild("qode_page_title_area_container",$qode_page_title_area_container);

	$qode_animate_page_title = new QodeMetaField("selectblank","qode_animate-page-title","no","Animations","Choose an animation for Title Area",array(
		"no" => "No animation",
		"text_right_left" => "Text right to left",
		"area_top_bottom" => "Title area top to bottom"
	));
	$qode_page_title_area_container->addChild("qode_animate_page_title",$qode_animate_page_title);

	$qode_show_page_title_text = new QodeMetaField("select","qode_show-page-title-text","","Don't Show Title Text","Enable this option to hide the title text", array(
			"" => "Default",
			"no" => "No",
			"yes" => "Yes"),
		array("dependence" => true,
			"hide" => array(
				"yes"=>"#qodef_qode_title_text_container"),
			"show" => array(
				""=>"#qodef_qode_title_text_container",
				"no"=>"#qodef_qode_title_text_container") ));
	$qode_page_title_area_container->addChild("qode_show-page-title-text",$qode_show_page_title_text);

	$qode_title_text_container = new QodeContainer("qode_title_text_container","qode_show-page-title-text","yes");
	$qode_page_title_area_container->addChild("qode_title_text_container",$qode_title_text_container);

	$qode_page_title_position = new QodeMetaField("selectblank","qode_page_title_position","","Title Text Alignment","Specify Title text alignment",array(
		"left" => "Left",
		"center" => "Center",
		"right" => "Right"
	));
	$qode_title_text_container->addChild("qode_page_title_position",$qode_page_title_position);

	$group1 = new QodeGroup("Title Text Style","Define styles for text in Title Area");
	$qode_title_text_container->addChild("group1",$group1);

	$row1 = new QodeRow();
	$group1->addChild("row1",$row1);

	$qode_page_title_color = new QodeMetaField("colorsimple","qode_page-title-color","","Text Color","ThisIsDescription");
	$row1->addChild("qode_page-title-color",$qode_page_title_color);

	$qode_page_title_font_size = new QodeMetaField("selectblanksimple","qode_page_title_font_size","","Text Size","ThisIsDescription",array(
		"small" => "Small",
		"medium" => "Medium",
		"large" => "Large"
	));
	$row1->addChild("qode_page_title_font_size",$qode_page_title_font_size);

	$qode_title_text_shadow = new QodeMetaField("selectblanksimple","qode_title_text_shadow","","Text Shadow","ThisIsDescription",array(
		"no" => "No",
		"yes" => "yes"
	));
	$row1->addChild("qode_title_text_shadow",$qode_title_text_shadow);

	$qode_page_title_background_color = new QodeMetaField("color","qode_page-title-background-color","","Background Color","Choose background color for Title Area");
	$qode_page_title_area_container->addChild("qode_page-title-background-color",$qode_page_title_background_color);

	$qode_show_page_title_image = new QodeMetaField("yesempty","qode_show-page-title-image","","Don't Show Background Image","Enable this option to hide background image in Title Area", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_qode_background_image_container", "dependence_show_on_yes" => ""));
	$qode_page_title_area_container->addChild("qode_show-page-title-image",$qode_show_page_title_image);

	$qode_background_image_container = new QodeContainer("qode_background_image_container","qode_show-page-title-image","yes");
	$qode_page_title_area_container->addChild("qode_background_image_container",$qode_background_image_container);

	$qode_title_image = new QodeMetaField("image","qode_title-image","","Background Image","Choose a background image for Title Area");
	$qode_background_image_container->addChild("qode_title-image",$qode_title_image);

	$qode_title_overlay_image = new QodeMetaField("image","qode_title-overlay-image","","Pattern Overlay Image","Choose an image to be used as pattern over Title Area");
	$qode_background_image_container->addChild("qode_title-overlay-image",$qode_title_overlay_image);

	$qode_responsive_title_image = new QodeMetaField("selectblank","qode_responsive-title-image","","Responsive Background Image","Do you want to make Title background image responsive?", array(
			"no" => "No",
			"yes" => "Yes"),
		array("dependence" => true,
			"hide" => array(
				"yes"=>"#qodef_qode_responsive_title_image_container, #qodef_qode_title-height"),
			"show" => array(
				""=>"#qodef_qode_responsive_title_image_container, #qodef_qode_title-height",
				"no"=>"#qodef_qode_responsive_title_image_container, #qodef_qode_title-height") ));
	$qode_background_image_container->addChild("qode_responsive-title-image",$qode_responsive_title_image);

	$qode_responsive_title_image_container = new QodeContainer("qode_responsive_title_image_container","qode_responsive-title-image","yes");
	$qode_background_image_container->addChild("qode_responsive_title_image_container",$qode_responsive_title_image_container);

	$qode_fixed_title_image = new QodeMetaField("selectblank","qode_fixed-title-image","","Parallax Background Image","Do you want background image to have parallax effect?", array(
		"no" => "No",
		"yes" => "Yes",
		"yes_zoom" => "Yes, with zoom out"
	));
	$qode_responsive_title_image_container->addChild("qode_fixed-title-image",$qode_fixed_title_image);

	$qode_title_height = new QodeMetaField("text","qode_title-height","","Title Height (px)","Set a height for Title Area in pixels", array(), array("col_width" => 3));
	$qode_page_title_area_container->addChild("qode_title-height",$qode_title_height);

	$qode_separator_bellow_title = new QodeMetaField("select","qode_separator_bellow_title","","Separator Under Title Text","Do you want to have a separator under title text?",
		array(
			"" => "",
			"no" => "No",
			"yes" => "Yes"
		),
		array(
			'dependence' => true,
			'hide' => array(
				'no' => '#qodef_animation_page_page_separator_container'
			),
			'show' => array(
				'' => '#qodef_animation_page_page_separator_container',
				'yes' => '#qodef_animation_page_page_separator_container'
			)
		)
	);
	$qode_page_title_area_container->addChild("qode_separator_bellow_title",$qode_separator_bellow_title);

	$qode_title_separator_color = new QodeMetaField("color","qode_title_separator_color","","Separator Color","Choose a color for separator");
	$qode_page_title_area_container->addChild("qode_title_separator_color",$qode_title_separator_color);

	$qode_enable_page_title_angled = new QodeMetaField("selectblank","qode_enable_page_title_angled","","Enable Angled Title","Enabling this option will show title angled", array(
			"no" => "No",
			"yes" => "Yes"),
		array("dependence" => true,
			"hide" => array(
				"no"=>"#qodef_qode_title_angled_container",
				""=>"#qodef_qode_title_angled_container"),
			"show" => array(
				"yes"=>"#qodef_qode_title_angled_container") ));
	$qode_page_title_area_container->addChild("qode_enable_page_title_angled",$qode_enable_page_title_angled);

	$qode_title_angled_container = new QodeContainer("qode_title_angled_container","qode_enable_page_title_angled","");
	$qode_page_title_area_container->addChild("qode_title_angled_container",$qode_title_angled_container);

$qode_title_angled_section_direction = new QodeMetaField("selectblank","qode_title_angled_section_direction","","Angled Direction","Choose a direction for title angled", array(
		"from_left_to_right" => "From Left To Right",
		"from_right_to_left" => "From Right To Left"
	));
	$qode_title_angled_container->addChild("qode_title_angled_section_direction",$qode_title_angled_section_direction);

	$qode_title_angled_section_color = new QodeMetaField("color","qode_title_angled_section_color","","Background Color","Choose a background color for Title Angled");
	$qode_title_angled_container->addChild("qode_title_angled_section_color",$qode_title_angled_section_color);

	$qode_enable_breadcrumbs = new QodeMetaField("selectblank","qode_enable_breadcrumbs","","Enable Breadcrumbs","Do you want to display breadcrumbs in title area?",
		array(
			"no" => "No",
			"yes" => "Yes"
		),
		array(
			'dependence' => true,
			'hide' => array(
				'no' => '#qodef_animation_page_page_breadcrumbs_container'
			),
			'show' => array(
				'yes' => '#qodef_animation_page_page_breadcrumbs_container',
				'' => '#qodef_animation_page_page_breadcrumbs_container'
			)
		)
	);
	$qode_page_title_area_container->addChild("qode_enable_breadcrumbs",$qode_enable_breadcrumbs);

	$qode_page_breadcrumbs_color = new QodeMetaField("color","qode_page_breadcrumbs_color","","Breadcrumbs Color","Choose a color for breadcrumbs text ");
	$qode_page_title_area_container->addChild("qode_page_breadcrumbs_color",$qode_page_breadcrumbs_color);

	$qode_page_subtitle = new QodeMetaField("text","qode_page_subtitle","","Subtitle Text","Enter your subtitle text");
	$qode_page_title_area_container->addChild("qode_page_subtitle",$qode_page_subtitle);

	$qode_page_subtitle_color = new QodeMetaField("color","qode_page_subtitle_color","","Subtitle Text Color","Choose a color for subtitle text");
	$qode_page_title_area_container->addChild("qode_page_subtitle_color",$qode_page_subtitle_color);

	$qode_page_text_above_title = new QodeMetaField("text","qode_page_text_above_title","","Text Above Title","Enter your text above Title");
	$qode_page_title_area_container->addChild("qode_page_text_above_title",$qode_page_text_above_title);

	$qode_page_text_above_title_color = new QodeMetaField("color","qode_page_text_above_title_color","","Text Above Title Color","Choose a color for text above title");
	$qode_page_title_area_container->addChild("qode_page_text_above_title_color",$qode_page_text_above_title_color);

	$group_margin_after_title = new QodeGroup("Spacing After title","Define spacing after title. This option will also take effect if title is disabled, and will move the content down for the set value.");
	$qodeTitle->addChild("group_margin_after_title",$group_margin_after_title);

	$row1 = new QodeRow();
	$group_margin_after_title->addChild("row1",$row1);

	$qode_margin_after_title = new QodeMetaField("textsimple","qode_margin_after_title","","Margin After Title (px)","Set a bottom margin for Title Area");
	$row1->addChild("qode_margin_after_title",$qode_margin_after_title);

	$qode_margin_after_title_mobile = new QodeMetaField("selectblanksimple","qode_margin_after_title_mobile","","Set This Bottom Margin for Mobile Header","", array(
		"no" => "No",
		"yes" => "Yes"
	));
	$row1->addChild("qode_margin_after_title_mobile",$qode_margin_after_title_mobile);

//Page Title Animations
$qodeTitleAnimations = new QodeMetaBox('post', 'Qode Scroll Title Animations', 'qode_show-page-title', array('yes'));
$qodeFramework->qodeMetaBoxes->addMetaBox('post_title_animations', $qodeTitleAnimations);

//Whole title content animation
$page_page_title_whole_content_animations = new QodeMetaField('selectblank', 'page_page_title_whole_content_animations', '', 'Enable Whole Title Content Animation', 'This option will enable whole title content animation', array(
	'no' => 'No',
	'yes' => 'Yes'
),
	array(
		'dependence' => true,
		'hide' => array(
			'' => '#qodef_page_page_title_whole_content_animations_container',
			'no' => '#qodef_page_page_title_whole_content_animations_container'
		),
		'show' => array(
			'yes' => '#qodef_page_page_title_whole_content_animations_container'
		)
	));
$qodeTitleAnimations->addChild('page_page_title_whole_content_animations', $page_page_title_whole_content_animations);

$page_page_title_whole_content_animations_container = new QodeContainer('page_page_title_whole_content_animations_container', 'page_page_title_whole_content_animations', '', array('', 'no'));
$qodeTitleAnimations->addChild('page_page_title_whole_content_animations_container', $page_page_title_whole_content_animations_container);

$page_page_title_whole_content_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_page_title_whole_content_animations_container->addChild('page_page_title_whole_content_animations_data_start', $page_page_title_whole_content_animations_data_start);

$row1 = new QodeRow();
$page_page_title_whole_content_animations_data_start->addChild('row1', $row1);

$page_page_title_whole_content_data_start = new QodeMetaField('textsimple', 'page_page_title_whole_content_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_page_title_whole_content_data_start', $page_page_title_whole_content_data_start);

$page_page_title_whole_content_start_custom_style = new QodeMetaField('textareasimple', 'page_page_title_whole_content_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_page_title_whole_content_start_custom_style', $page_page_title_whole_content_start_custom_style);

$page_page_title_whole_content_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_page_title_whole_content_animations_container->addChild('page_page_title_whole_content_animations_data_end', $page_page_title_whole_content_animations_data_end);

$row2 = new QodeRow();
$page_page_title_whole_content_animations_data_end->addChild('row2', $row2);

$page_page_title_whole_content_data_end = new QodeMetaField('textsimple', 'page_page_title_whole_content_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_page_title_whole_content_data_end', $page_page_title_whole_content_data_end);

$page_page_title_whole_content_end_custom_style = new QodeMetaField('textareasimple', 'page_page_title_whole_content_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_page_title_whole_content_end_custom_style', $page_page_title_whole_content_end_custom_style);


//Title Animations
$animation_page_page_title_container = new QodeContainerNoStyle('animation_page_page_title_container', 'qode_show-page-title-text', 'yes');
$qodeTitleAnimations->addChild('animation_page_page_title_container', $animation_page_page_title_container);

$page_page_title_animations = new QodeMetaField('selectblank', 'page_page_title_animations', '', 'Enable Page Title Animations', 'This option will enable Page Title Scroll Animations',
	array(
		'no' => 'No',
		'yes' => 'Yes'
	),
	array(
		'dependence' => true,
		'hide' => array(
			'' => '#qodef_page_page_title_animations_container',
			'no' => '#qodef_page_page_title_animations_container'
		),
		'show' => array(
			'yes' => '#qodef_page_page_title_animations_container'
		) ));

$animation_page_page_title_container->addChild('page_page_title_animations', $page_page_title_animations);

$page_page_title_animations_container = new QodeContainer('page_page_title_animations_container', 'page_page_title_animations', '', array('', 'no'));
$animation_page_page_title_container->addChild('page_page_title_animations_container', $page_page_title_animations_container);

$page_page_title_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_page_title_animations_container->addChild('page_page_title_animations_data_start', $page_page_title_animations_data_start);

$row1 = new QodeRow();
$page_page_title_animations_data_start->addChild('row1', $row1);

$page_page_title_data_start = new QodeMetaField('textsimple', 'page_page_title_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_page_title_data_start', $page_page_title_data_start);

$page_page_title_start_custom_style = new QodeMetaField('textareasimple', 'page_page_title_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_page_title_start_custom_style', $page_page_title_start_custom_style);

$page_page_title_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_page_title_animations_container->addChild('page_page_title_animations_data_end', $page_page_title_animations_data_end);

$row2 = new QodeRow();
$page_page_title_animations_data_end->addChild('row2', $row2);

$page_page_title_data_end = new QodeMetaField('textsimple', 'page_page_title_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_page_title_data_end', $page_page_title_data_end);

$page_page_title_end_custom_style = new QodeMetaField('textareasimple', 'page_page_title_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_page_title_end_custom_style', $page_page_title_end_custom_style);

//Title Separator Animations
$animation_page_page_separator_container = new QodeContainerNoStyle('animation_page_page_separator_container', 'qode_separator_bellow_title', 'no');
$qodeTitleAnimations->addChild('animation_page_page_separator_container', $animation_page_page_separator_container);

$page_page_title_separator_animations = new QodeMetaField('selectblank', 'page_page_title_separator_animations', '', 'Enable Page Separator Title Animations', 'This option will enable Page Title Separator Scroll Animations',
	array(
		'no' => 'No',
		'yes' => 'Yes'
	),
	array(
		'dependence' => true,
		'hide' => array(
			'' => '#qodef_page_page_title_separator_animations_container',
			'no' => '#qodef_page_page_title_separator_animations_container'
		),
		'show' => array(
			'yes' => '#qodef_page_page_title_separator_animations_container'
		)
	));
$animation_page_page_separator_container->addChild('page_page_title_separator_animations', $page_page_title_separator_animations);

$page_page_title_separator_animations_container = new QodeContainer('page_page_title_separator_animations_container', 'page_page_title_separator_animations', '', array('no', ''));
$animation_page_page_separator_container->addChild('page_page_title_separator_animations_container', $page_page_title_separator_animations_container);

$page_page_title_separator_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_page_title_separator_animations_container->addChild('page_page_title_separator_animations_data_start', $page_page_title_separator_animations_data_start);

$row1 = new QodeRow();
$page_page_title_separator_animations_data_start->addChild('row1', $row1);

$page_page_title_separator_data_start = new QodeMetaField('textsimple', 'page_page_title_separator_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_page_title_separator_data_start', $page_page_title_separator_data_start);

$page_page_title_separator_start_custom_style = new QodeMetaField('textareasimple', 'page_page_title_separator_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_page_title_separator_start_custom_style', $page_page_title_separator_start_custom_style);

$page_page_title_separator_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_page_title_separator_animations_container->addChild('page_page_title_separator_animations_data_end', $page_page_title_separator_animations_data_end);

$row2 = new QodeRow();
$page_page_title_separator_animations_data_end->addChild('row2', $row2);

$page_page_title_separator_data_end = new QodeMetaField('textsimple', 'page_page_title_separator_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_page_title_separator_data_end', $page_page_title_separator_data_end);

$page_page_title_separator_end_custom_style = new QodeMetaField('textareasimple', 'page_page_title_separator_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_page_title_separator_end_custom_style', $page_page_title_separator_end_custom_style);

//Subtitle Animations
$page_page_subtitle_animations = new QodeMetaField('selectblank', 'page_page_subtitle_animations', '', 'Enable Page Subtitle Animations', 'This option will enable Page Subtitle Scroll Animations',
	array(
		'no' => 'No',
		'yes' => 'Yes'
	),
	array(
		'dependence' => true,
		'hide' => array(
			'' => '#qodef_page_page_subtitle_animations_container',
			'no' => '#qodef_page_page_subtitle_animations_container'
		),
		'show' => array(
			'yes' => '#qodef_page_page_subtitle_animations_container'
		)
	));
$qodeTitleAnimations->addChild('page_page_subtitle_animations', $page_page_subtitle_animations);

$page_page_subtitle_animations_container = new QodeContainer('page_page_subtitle_animations_container', 'page_page_subtitle_animations', '', array('', 'no'));
$qodeTitleAnimations->addChild('page_page_subtitle_animations_container', $page_page_subtitle_animations_container);

$page_page_subtitle_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_page_subtitle_animations_container->addChild('page_page_subtitle_animations_data_start', $page_page_subtitle_animations_data_start);

$row1 = new QodeRow();
$page_page_subtitle_animations_data_start->addChild('row1', $row1);

$page_page_subtitle_data_start = new QodeMetaField('textsimple', 'page_page_subtitle_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_page_subtitle_data_start', $page_page_subtitle_data_start);

$page_page_subtitle_start_custom_style = new QodeMetaField('textareasimple', 'page_page_subtitle_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_page_subtitle_start_custom_style', $page_page_subtitle_start_custom_style);

$page_page_subtitle_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_page_subtitle_animations_container->addChild('page_page_subtitle_animations_data_end', $page_page_subtitle_animations_data_end);

$row2 = new QodeRow();
$page_page_subtitle_animations_data_end->addChild('row2', $row2);

$page_page_subtitle_data_end = new QodeMetaField('textsimple', 'page_page_subtitle_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_page_subtitle_data_end', $page_page_subtitle_data_end);

$page_page_subtitle_end_custom_style = new QodeMetaField('textareasimple', 'page_page_subtitle_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_page_subtitle_end_custom_style', $page_page_subtitle_end_custom_style);

//Breadcrumb animations
$animation_page_page_breadcrumbs_container = new QodeContainerNoStyle('animation_page_page_breadcrumbs_container', 'qode_enable_breadcrumbs', 'no');
$qodeTitleAnimations->addChild('animation_page_page_breadcrumbs_container', $animation_page_page_breadcrumbs_container);

$page_page_title_breadcrumbs_animations = new QodeMetaField('selectblank', 'page_page_title_breadcrumbs_animations', '', 'Enable Page Title Breadcrumbs Animations', 'This option will enable Page Title Breadcrumbs Scroll Animations',
	array(
		'no' => 'No',
		'yes' => 'Yes'
	),
	array(
		'dependence' => true,
		'hide' => array(
			'' => '#qodef_page_page_title_breadcrumbs_animations_container',
			'no' => '#qodef_page_page_title_breadcrumbs_animations_container'
		),
		'show' => array(
			'yes' => '#qodef_page_page_title_breadcrumbs_animations_container'
		)
	));
$animation_page_page_breadcrumbs_container->addChild('page_page_title_breadcrumbs_animations', $page_page_title_breadcrumbs_animations);

$page_page_title_breadcrumbs_animations_container = new QodeContainer('page_page_title_breadcrumbs_animations_container', 'page_page_title_breadcrumbs_animations', '', array('', 'no'));
$animation_page_page_breadcrumbs_container->addChild('page_page_title_breadcrumbs_animations_container', $page_page_title_breadcrumbs_animations_container);

$page_page_title_breadcrumbs_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_page_title_breadcrumbs_animations_container->addChild('page_page_title_breadcrumbs_animations_data_start', $page_page_title_breadcrumbs_animations_data_start);

$row1 = new QodeRow();
$page_page_title_breadcrumbs_animations_data_start->addChild('row1', $row1);

$page_page_title_breadcrumbs_data_start = new QodeMetaField('textsimple', 'page_page_title_breadcrumbs_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_page_title_breadcrumbs_data_start', $page_page_title_breadcrumbs_data_start);

$page_page_title_breadcrumbs_start_custom_style = new QodeMetaField('textareasimple', 'page_page_title_breadcrumbs_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_page_title_breadcrumbs_start_custom_style', $page_page_title_breadcrumbs_start_custom_style);

$page_page_title_breadcrumbs_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_page_title_breadcrumbs_animations_container->addChild('page_page_title_breadcrumbs_animations_data_end', $page_page_title_breadcrumbs_animations_data_end);

$row2 = new QodeRow();
$page_page_title_breadcrumbs_animations_data_end->addChild('row2', $row2);

$page_page_title_breadcrumbs_data_end = new QodeMetaField('textsimple', 'page_page_title_breadcrumbs_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_page_title_breadcrumbs_data_end', $page_page_title_breadcrumbs_data_end);

$page_page_title_breadcrumbs_end_custom_style = new QodeMetaField('textareasimple', 'page_page_title_breadcrumbs_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_page_title_breadcrumbs_end_custom_style', $page_page_title_breadcrumbs_end_custom_style);



// Content Bottom

$qodeContentBottom = new QodeMetaBox("post", "Qode Content Bottom");
$qodeFramework->qodeMetaBoxes->addMetaBox("post_content_bottom_page",$qodeContentBottom);

	$qode_enable_content_bottom_area = new QodeMetaField("selectblank","qode_enable_content_bottom_area","","Show Content Bottom Area","Do you want to show content bottom area?", array(
       "no" => "No",
       "yes" => "Yes"
      ),
      array("dependence" => true,
      	"hide" => array(
      		"no"=>"#qodef_qode_enable_content_bottom_area_container",
			""=>"#qodef_qode_enable_content_bottom_area_container"),
      	"show" => array(
      		"yes"=>"#qodef_qode_enable_content_bottom_area_container") ));
	$qodeContentBottom->addChild("qode_enable_content_bottom_area",$qode_enable_content_bottom_area);
	
	$qode_enable_content_bottom_area_container = new QodeContainer("qode_enable_content_bottom_area_container","qode_enable_content_bottom_area","no",array("", "no"));
	$qodeContentBottom->addChild("qode_enable_content_bottom_area_container",$qode_enable_content_bottom_area_container);

		$qode_content_bottom_background_color = new QodeMetaField("color","qode_content_bottom_background_color","","Background Color","Choose a color for content bottom area");
		$qode_enable_content_bottom_area_container->addChild("qode_content_bottom_background_color",$qode_content_bottom_background_color);
	
		$qode_choose_content_bottom_sidebar = new QodeMetaField("selectblank","qode_choose_content_bottom_sidebar","","Custom Widget","Choose Custom Widget area to display",$qode_custom_sidebars);
		$qode_enable_content_bottom_area_container->addChild("qode_choose_content_bottom_sidebar",$qode_choose_content_bottom_sidebar);
	
		$qode_content_bottom_sidebar_in_grid = new QodeMetaField("selectblank","qode_content_bottom_sidebar_in_grid","","Display in Grid","Enabling this option will place Content Bottom in grid",array(
	       "no" => "No",
	       "yes" => "Yes"
	      ));
		$qode_enable_content_bottom_area_container->addChild("qode_content_bottom_sidebar_in_grid",$qode_content_bottom_sidebar_in_grid);


// Side Bar Area

$qodeSideBar = new QodeMetaBox("post", "Qode Sidebar");
$qodeFramework->qodeMetaBoxes->addMetaBox("post_side_bar",$qodeSideBar);

	$qode_show_sidebar = new QodeMetaField("select","qode_show-sidebar","default","Layout","Choose the sidebar layout",array( "default" => "Default",
       "1" => "Sidebar 1/3 right",
       "2" => "Sidebar 1/4 right",
       "3" => "Sidebar 1/3 left",
       "4" => "Sidebar 1/4 left",
      ));
	$qodeSideBar->addChild("qode_show-sidebar",$qode_show_sidebar);

	$qode_choose_sidebar = new QodeMetaField("selectblank","qode_choose-sidebar","default","Choose Widget Area in Sidebar","Choose Custom Widget area to display in Sidebar", $qode_custom_sidebars);
	$qodeSideBar->addChild("qode_choose-sidebar",$qode_choose_sidebar);

// SEO

$qodeSeo = new QodeMetaBox("post", "Qode SEO");
$qodeFramework->qodeMetaBoxes->addMetaBox("post_seo",$qodeSeo);

$seo_title = new QodeMetaField("text","qode_seo_title","","SEO Title","Enter custom Title for this page");
$qodeSeo->addChild("qode_seo_title",$seo_title);

$seo_keywords = new QodeMetaField("text","qode_seo_keywords","","Meta Keywords","Enter the list of keywords separated by comma");
$qodeSeo->addChild("qode_seo_keywords",$seo_keywords);

$seo_description = new QodeMetaField("textarea","qode_seo_description","","Meta Description","Enter meta description for this page");
$qodeSeo->addChild("qode_seo_description",$seo_description);