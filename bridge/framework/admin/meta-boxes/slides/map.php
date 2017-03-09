<?php
$qode_custom_sidebars = array();
foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
	if(isUserMadeSidebar(ucwords($sidebar['name']))){
		$qode_custom_sidebars[$sidebar['id']] = ucwords( $sidebar['name']);
	}
}


$qode_blog_categories = array();
$categories = get_categories(); 
foreach($categories as $category) {
	$qode_blog_categories[$category->term_id] = $category->name;
}

//Qode Slide Type

$qodeSlideType = new QodeMetaBox("slides", "Qode Slide Type");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_type",$qodeSlideType);

	$qode_slide_background_type = new QodeMetaField("imagevideo","qode_slide-background-type","image","Slide Background Type","Do you want to upload an image or video?", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef-meta-box-slides_video_settings", "dependence_show_on_yes" => "#qodef-meta-box-slides_image_settings"));
	$qodeSlideType->addChild("qode_slide-background-type",$qode_slide_background_type);

//Qode Slide Image

$qodeSlideImageSettings = new QodeMetaBox("slides", "Qode Slide Image","qode_slide-background-type",array("video"));
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_image_settings",$qodeSlideImageSettings);

	$qode_slide_image = new QodeMetaField("image","qode_slide-image","","Slide Image","Choose background image");
	$qodeSlideImageSettings->addChild("qode_title-image",$qode_slide_image);
	
	$qode_slide_overlay_image = new QodeMetaField("image","qode_slide-overlay-image","","Overlay Image","Choose overlay image (pattern) for background image");
	$qodeSlideImageSettings->addChild("qode_slide-overlay-image",$qode_slide_overlay_image);
	
	$qode_enable_image_animation = new QodeMetaField("yesno", "qode_enable_image_animation", "no", "Enable Image Animation", "Enabling this option will turn on a motion animation on the slide image", array(), array(
        "dependence" => "true",
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#qodef_qode_enable_image_animation_container"
    ));
	$qodeSlideImageSettings->addChild('qode_enable_image_animation', $qode_enable_image_animation);
	
	$qode_enable_image_animation_container = new QodeContainer("qode_enable_image_animation_container", "qode_enable_image_animation", "no");
	$qodeSlideImageSettings->addChild("qode_enable_image_animation_container", $qode_enable_image_animation_container);
	
	$qode_enable_image_animation_type = new QodeMetaField("select","qode_enable_image_animation_type","zoom_center","Animation Type","", array(
        "zoom_center" => "Zoom In Center",
        "zoom_top_left" => "Zoom In to Top Left",
        "zoom_top_right" => "Zoom In to Top Right",
        "zoom_bottom_left" => "Zoom In to Bottom Left",
        "zoom_bottom_right" => "Zoom In to Bottom Right"
    ));
    $qode_enable_image_animation_container->addChild("qode_enable_image_animation_type",$qode_enable_image_animation_type);

//Qode Slide Video

$qodeSlideVideoSettings = new QodeMetaBox("slides", "Qode Slide Video","qode_slide-background-type",array("image"));
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_video_settings",$qodeSlideVideoSettings);

	$qode_slide_video_webm = new QodeMetaField("text","qode_slide-video-webm","","Video - webm","Path to the webm file that you have previously uploaded in Media Section");
	$qodeSlideVideoSettings->addChild("qode_slide-video-webm",$qode_slide_video_webm);
	
	$qode_slide_video_mp4 = new QodeMetaField("text","qode_slide-video-mp4","","Video - mp4","Path to the mp4 file that you have previously uploaded in Media Section");
	$qodeSlideVideoSettings->addChild("qode_slide-video-mp4",$qode_slide_video_mp4);
	
	$qode_slide_video_ogv = new QodeMetaField("text","qode_slide-video-ogv","","Video - ogv","Path to the ogv file that you have previously uploaded in Media Section");
	$qodeSlideVideoSettings->addChild("qode_slide-video-ogv",$qode_slide_video_ogv);

	$qode_slide_video_image = new QodeMetaField("image","qode_slide-video-image","","Video Preview Image","Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.");
	$qodeSlideVideoSettings->addChild("qode_slide-video-image",$qode_slide_video_image);
	
	$qode_slide_video_overlay = new QodeMetaField("yesempty","qode_slide-video-overlay","","Video Overlay Image","Do you want to have an overlay image on video? ", array(),
			array("dependence" => true,
			"dependence_hide_on_yes" => "",
			"dependence_show_on_yes" => "#qodef_qode_slide-video-overlay_container"));
	$qodeSlideVideoSettings->addChild("qode_slide-video-overlay",$qode_slide_video_overlay);
	
	$qode_slide_video_overlay_container = new QodeContainer("qode_slide-video-overlay_container","qode_slide-video-overlay","");
	$qodeSlideVideoSettings->addChild("qode_slide_video_overlay_container",$qode_slide_video_overlay_container);
	
		$qode_slide_video_overlay_image = new QodeMetaField("image","qode_slide-video-overlay-image","","Overlay Image","Choose overlay image (pattern) for background video");
		$qode_slide_video_overlay_container->addChild("qode_slide-video-overlay-image",$qode_slide_video_overlay_image);

//Qode Slide General

$qodeSlideGeneral = new QodeMetaBox("slides", "Qode Slide General");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_layout",$qodeSlideGeneral);
	
	$qode_slide_header_style = new QodeMetaField("selectblank","qode_slide-header-style","","Header Skin","Header skin will be applied when this slide is in focus", array(
	    "light" => "Light",
	    "dark" => "Dark"
	));
	$qodeSlideGeneral->addChild("qode_slide-header-style",$qode_slide_header_style);
	
	$qode_slide_navigation_color = new QodeMetaField("color","qode_slide-navigation-color","","Navigation Color","Navigation color will be applied when this slide is in focus");
	$qodeSlideGeneral->addChild("qode_slide-navigation-color",$qode_slide_navigation_color);
	
	$qode_slide_scroll_to_section = new QodeMetaField("text","qode_slide-anchor-button","","Scroll to Section","An arrow will appear to take viewers to the next section of the page. Enter the section anchor here, for example, '#contact'");
	$qodeSlideGeneral->addChild("qode_slide-anchor-button",$qode_slide_scroll_to_section);

	$qode_slide_hide_title = new QodeMetaField("yesempty","qode_slide-hide-title","","Hide Slide Title","Do you want to hide slide title?", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef-meta-box-slides_title", "dependence_show_on_yes" => ""));
	$qodeSlideGeneral->addChild("qode_slide-hide-title",$qode_slide_hide_title);

    $qode_slide_hide_shadow = new QodeMetaField("yesempty","qode_slide-hide-shadow","","Don't Show Slide Text Shadow","Do you want to hide text shadow?");
    $qodeSlideGeneral->addChild("qode_slide-hide-shadow",$qode_slide_hide_shadow);

    $qode_slide_thumbnail_animation = new QodeMetaField("select","qode_slide-thumbnail-animation","","Graphic Animation","This is how the graphic will enter the slide", array(
        "flip" => "Flip",
        "fade" => "Fade"
    ));
    $qodeSlideGeneral->addChild("qode_slide-thumbnail-animation",$qode_slide_thumbnail_animation);

    $qode_slide_content_animation = new QodeMetaField("select","qode_slide-content-animation","","Content Animation","This is how content (title, subtitle, text and buttons) will enter the slide", array(
        "all_at_once" => "All At Once",
        "one_by_one" => "One By One"
    ));
    $qodeSlideGeneral->addChild("qode_slide-content-animation",$qode_slide_content_animation);

//Qode Slide Title

$qodeSlideTitle = new QodeMetaBox("slides", "Qode Slide Title","qode_slide-hide-title",array("yes"));
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_title",$qodeSlideTitle);

	$title_group = new QodeGroup("Title Style","Define styles for title");
	$qodeSlideTitle->addChild("title_group",$title_group);
	    $row1 = new QodeRow();
	    $title_group->addChild("row1",$row1);
		    $title_color = new QodeMetaField("colorsimple","qode_slide-title-color","","Font Color","This is some description");
		    $row1->addChild("qode_slide-title-color",$title_color);
		    $title_fontsize = new QodeMetaField("textsimple","qode_slide-title-font-size","","Font Size (px)","This is some description");
		    $row1->addChild("qode_slide-title-font-size",$title_fontsize);
		    $title_lineheight = new QodeMetaField("textsimple","qode_slide-title-line-height","","Line Height (px)","This is some description");
		    $row1->addChild("qode_slide-title-line-height",$title_lineheight);
		    $title_letterspacing = new QodeMetaField("textsimple","qode_slide-title-letter-spacing","","Letter Spacing (px)","This is some description");
		    $row1->addChild("qode_slide-title-letter-spacing",$title_letterspacing);
	
	    $row2 = new QodeRow(true);
	    $title_group->addChild("row2",$row2);
		    $title_google_fonts = new QodeMetaField("Fontsimple","qode_slide-title-font-family","","Font Family","This is some description");
		    $row2->addChild("qode_slide-title-font-family",$title_google_fonts);
		    $title_fontstyle = new QodeMetaField("selectblanksimple","qode_slide-title-font-style","","Font Style","This is some description",$options_fontstyle);
		    $row2->addChild("qode_slide-title-font-style",$title_fontstyle);
		    $title_fontweight = new QodeMetaField("selectblanksimple","qode_slide-title-font-weight","","Font Weight","This is some description",$options_fontweight);
		    $row2->addChild("qode_slide-title-font-weight",$title_fontweight);
		    $title_texttransform = new QodeMetaField("selectblanksimple","qode_slide-title-text-transform","","Text Transform","This is some description",$options_texttransform);
		    $row2->addChild("qode_slide-title-text-transform",$title_texttransform);
	
	    $row3 = new QodeRow(true);
	    $title_group->addChild("row3",$row3);
		    $title_background_color = new QodeMetaField("colorsimple","qode_slide-title-background-color","","Background Color","This is some description");
		    $row3->addChild("qode_slide-title-background-color",$title_background_color);
		    $title_background_color_transparency = new QodeMetaField("textsimple","qode_slide-title-bg-color-transparency","","Background Color Transparency (0 = fully transparent, 1 = opaque)","Value between 0 and 1");
		    $row3->addChild("qode_slide-title-bg-color-transparency",$title_background_color_transparency);

	$qode_slide_title_separator = new QodeMetaField("yesno","qode_slide-separator-after-title","no","Separator After Title","Do you want to have a separator after title?", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_qode_slide_title_separator_container"));
	$qodeSlideTitle->addChild("qode_slide-separator-after-title",$qode_slide_title_separator);
	
	$qode_slide_title_separator_container = new QodeContainer("qode_slide_title_separator_container","qode_slide-separator-after-title","no");
	$qodeSlideTitle->addChild("qode_slide_title_separator_container",$qode_slide_title_separator_container);
	
		$qode_slide_title_separator_color = new QodeMetaField("color","qode_slide-separator-color","","Separator Color","Choose a color for the separator");
		$qode_slide_title_separator_container->addChild("qode_slide-separator-color",$qode_slide_title_separator_color);
		
		$qode_slide_title_separator_transparency = new QodeMetaField("text","qode_slide-separator-transparency","","Separator transparency","Enter a value between 0 (fully transparent) and 1 (opaque)");
		$qode_slide_title_separator_container->addChild("qode_slide-separator-transparency",$qode_slide_title_separator_transparency);
		
		$qode_slide_title_separator_width = new QodeMetaField("text","qode_slide-separator-width","","Separator Width","Enter value from 0% to 100%. Enter just number.");
		$qode_slide_title_separator_container->addChild("qode_slide-separator-width",$qode_slide_title_separator_width);

	$qode_slide_title_border = new QodeMetaField("yesno","qode_slide-border-around-title","no","Border Around Title","Do you want to have a border around title?", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_qode_slide_title_border_container"));
	$qodeSlideTitle->addChild("qode_slide-border-around-title",$qode_slide_title_border);
	
	$qode_slide_title_border_container = new QodeContainer("qode_slide_title_border_container","qode_slide-border-around-title","no");
	$qodeSlideTitle->addChild("qode_slide_title_border_container",$qode_slide_title_border_container);
	
		$qode_slide_title_border_color = new QodeMetaField("color","qode_slide-border-around-title-color","","Border Color","Choose a color for the border");
		$qode_slide_title_border_container->addChild("qode_slide-border-around-title-color",$qode_slide_title_border_color);
		
		$qode_slide_title_border_transparency = new QodeMetaField("text","qode_slide-border-around-title-transparency","","Border Transparency","Enter a value between 0 (fully transparent) and 1 (opaque)");
		$qode_slide_title_border_container->addChild("qode_slide-border-around-title-transparency",$qode_slide_title_border_transparency);

//Qode Slide Subtitle

$qodeSlideSubtitle = new QodeMetaBox("slides", "Qode Slide Subtitle");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_subtitle",$qodeSlideSubtitle);

	$qode_slide_subtitle = new QodeMetaField("text","qode_slide-subtitle","","Slide Subtitle","Enter slide subtitle");
	$qodeSlideSubtitle->addChild("qode_slide-subtitle",$qode_slide_subtitle);
	
	$qode_slide_subtitle_position = new QodeMetaField("select","qode_slide-subtitle-position","","Subtitle Position","Choose a position for the subtitle", array(
	    "above_title" => "Above title",
	    "bellow_title" => "Below title"
	));
	$qodeSlideSubtitle->addChild("qode_slide-subtitle-position",$qode_slide_subtitle_position);
	
	$subtitle_group = new QodeGroup("Subtitle Style","Define styles for subtitle");
	$qodeSlideSubtitle->addChild("subtitle_group",$subtitle_group);
	    $row1 = new QodeRow();
	    $subtitle_group->addChild("row1",$row1);
		    $subtitle_color = new QodeMetaField("colorsimple","qode_slide-subtitle-color","","Font Color","This is some description");
		    $row1->addChild("qode_slide-subtitle-color",$subtitle_color);
		    $subtitle_fontsize = new QodeMetaField("textsimple","qode_slide-subtitle-font-size","","Font Size (px)","This is some description");
		    $row1->addChild("qode_slide-subtitle-font-size",$subtitle_fontsize);
		    $subtitle_lineheight = new QodeMetaField("textsimple","qode_slide-subtitle-line-height","","Line Height (px)","This is some description");
		    $row1->addChild("qode_slide-subtitle-line-height",$subtitle_lineheight);
		    $subtitle_letterspacing = new QodeMetaField("textsimple","qode_slide-subtitle-letter-spacing","","Letter Spacing (px)","This is some description");
		    $row1->addChild("qode_slide-subtitle-letter-spacing",$subtitle_letterspacing);
	
	    $row2 = new QodeRow(true);
	    $subtitle_group->addChild("row2",$row2);
		    $subtitle_google_fonts = new QodeMetaField("fontsimple","qode_slide-subtitle-font-family","","Font Family","This is some description");
		    $row2->addChild("qode_slide-subtitle-font-family",$subtitle_google_fonts);
		    $subtitle_fontstyle = new QodeMetaField("selectblanksimple","qode_slide-subtitle-font-style","","Font Style","This is some description",$options_fontstyle);
		    $row2->addChild("qode_slide-subtitle-font-style",$subtitle_fontstyle);
		    $subtitle_fontweight = new QodeMetaField("selectblanksimple","qode_slide-subtitle-font-weight","","Font Weight","This is some description",$options_fontweight);
		    $row2->addChild("qode_slide-subtitle-font-weight",$subtitle_fontweight);
			$subtitle_text_transform = new QodeMetaField("selectblanksimple","qode_slide-subtitle-text-transform","","Text Transform","This is some description",$options_texttransform);
		    $row2->addChild("qode_slide-subtitle-text-transform",$subtitle_text_transform);
	
	    $row3 = new QodeRow(true);
	    $subtitle_group->addChild("row3",$row3);
		    $subtitle_background_color = new QodeMetaField("colorsimple","qode_slide-subtitle-background-color","","Background Color","This is some description");
		    $row3->addChild("qode_slide-subtitle-background-color",$subtitle_background_color);
		    $subtitle_background_color_transparency = new QodeMetaField("textsimple","qode_slide-subtitle-bg-color-transparency","","Background Color Transparency (0 = fully transparent, 1 = opaque)","Value between 0 ana 1");
		    $row3->addChild("qode_slide-subtitle-bg-color-transparency",$subtitle_background_color_transparency);

    $subtitle_margin_group = new QodeGroup("Margin Bottom (px)","Enter value for subtitle bottom margin (default value is 14)");
    $qodeSlideSubtitle->addChild("subtitle_margin_group",$subtitle_margin_group);
        $row1 = new QodeRow(true);
        $subtitle_margin_group->addChild("row1",$row1);
            $subtitle_margin_bottom = new QodeMetaField("textsimple","qode_slide_subtitle_margin_bottom","","","This is some description");
            $row1->addChild("qode_slide_subtitle_margin_bottom",$subtitle_margin_bottom);

    $subtitle_padding_group = new QodeGroup("Padding","Define padding for subtitle");
    $qodeSlideSubtitle->addChild("subtitle_padding_group",$subtitle_padding_group);
        $row1 = new QodeRow(true);
        $subtitle_padding_group->addChild("row1",$row1);
            $subtitle_padding_top = new QodeMetaField("textsimple","qode_slide_subtitle_padding_top","","Top Padding (px)","This is some description");
            $row1->addChild("qode_slide_subtitle_padding_top",$subtitle_padding_top);
            $subtitle_padding_right = new QodeMetaField("textsimple","qode_slide_subtitle_padding_right","","Right Padding (px)","This is some description");
            $row1->addChild("qode_slide_subtitle_padding_right",$subtitle_padding_right);
            $subtitle_padding_bottom = new QodeMetaField("textsimple","qode_slide_subtitle_padding_bottom","","Bottom Padding (px)","This is some description");
            $row1->addChild("qode_slide_subtitle_padding_bottom",$subtitle_padding_bottom);
            $subtitle_padding_left = new QodeMetaField("textsimple","qode_slide_subtitle_padding_left","","Left Padding (px)","This is some description");
            $row1->addChild("qode_slide_subtitle_padding_left",$subtitle_padding_left);

//Qode Slide Text

$qodeSlideText = new QodeMetaBox("slides", "Qode Slide Text");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_text",$qodeSlideText);

	$qode_slide_text = new QodeMetaField("textarea","qode_slide-text","","Slide Text","Enter slide text");
	$qodeSlideText->addChild("qode_slide-text",$qode_slide_text);

    $text_group = new QodeGroup("Text Style","Define styles for text");
    $qodeSlideText->addChild("title_group",$text_group);
    $row1 = new QodeRow();
    $text_group->addChild("row1",$row1);
        $text_color = new QodeMetaField("colorsimple","qode_slide-text-color","","Font Color","This is some description");
        $row1->addChild("qode_slide-text-color",$text_color);
        $text_fontsize = new QodeMetaField("textsimple","qode_slide-text-font-size","","Font Size (px)","This is some description");
        $row1->addChild("qode_slide-text-font-size",$text_fontsize);
        $text_lineheight = new QodeMetaField("textsimple","qode_slide-text-line-height","","Line Height (px)","This is some description");
        $row1->addChild("qode_slide-text-line-height",$text_lineheight);
		$text_text_transform = new QodeMetaField("selectblanksimple","qode_slide-text-text-transform","","Text Transform","This is some description",$options_texttransform);
		$row1->addChild("qode_slide-text-text-transform",$text_text_transform);

    $row2 = new QodeRow(true);
    $text_group->addChild("row2",$row2);
        $text_google_fonts = new QodeMetaField("Fontsimple","qode_slide-text-font-family","","Font Family","This is some description");
        $row2->addChild("qode_slide-text-font-family",$text_google_fonts);
        $text_fontstyle = new QodeMetaField("selectblanksimple","qode_slide-text-font-style","","Font Style","This is some description",$options_fontstyle);
        $row2->addChild("qode_slide-text-font-style",$text_fontstyle);
        $text_fontweight = new QodeMetaField("selectblanksimple","qode_slide-text-font-weight","","Font Weight","This is some description",$options_fontweight);
        $row2->addChild("qode_slide-text-font-weight",$text_fontweight);

    $text_without_separator_padding_group = new QodeGroup("Padding","Define padding for text");
    $qodeSlideText->addChild("text_without_separator_padding_group",$text_without_separator_padding_group);
        $row1 = new QodeRow(true);
        $text_without_separator_padding_group->addChild("row1",$row1);
            $text_padding_top = new QodeMetaField("textsimple","qode_slide_text_padding_top","","Top Padding (px)","This is some description");
            $row1->addChild("qode_slide_text_padding_top",$text_padding_top);
            $text_padding_right = new QodeMetaField("textsimple","qode_slide_text_padding_right","","Right Padding (px)","This is some description");
            $row1->addChild("qode_slide_text_padding_right",$text_padding_right);
            $text_padding_bottom = new QodeMetaField("textsimple","qode_slide_text_padding_bottom","","Bottom Padding (px)","This is some description");
            $row1->addChild("qode_slide_text_padding_bottom",$text_padding_bottom);
            $text_padding_left = new QodeMetaField("textsimple","qode_slide_text_padding_left","","Left Padding (px)","This is some description");
            $row1->addChild("qode_slide_text_padding_left",$text_padding_left);

//Qode Slide Graphic

$qodeSlideGraphic = new QodeMetaBox("slides", "Qode Slide Graphic");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_graphic",$qodeSlideGraphic);

	$qode_slide_graphic = new QodeMetaField("image","qode_slide-thumbnail","","Slide Graphic","Choose slide graphic");
	$qodeSlideGraphic->addChild("qode_slide-thumbnail",$qode_slide_graphic);
	
	$qode_slide_graphic_link = new QodeMetaField("text","qode_slide-thumbnail-link","","Link","Past link for slide graphic if you want to link it");
	$qodeSlideGraphic->addChild("qode_slide-thumbnail-link",$qode_slide_graphic_link);

$qodeSlideSvg = new QodeMetaBox('slides', 'Qode Slide SVG');
$qodeFramework->qodeMetaBoxes->addMetaBox('svg', $qodeSlideSvg);

	$qode_slide_svg_source = new QodeMetaField('textarea', 'qode_slide_svg_source', '', 'SVG source code', 'Paste SVG source code. (Note: all CSS styling for SVG you may put in Qode Options > General > Custom SVG CSS)');
	$qodeSlideSvg->addChild('qode_slide_svg_source', $qode_slide_svg_source);

	$qode_slide_svg_link = new QodeMetaField('text', 'qode_slide_svg_link', '', 'SVG link', 'Enter URL to link SVG');
	$qodeSlideSvg->addChild('qode_slide_svg_link', $qode_slide_svg_link);

	$qode_slide_svg_drawing = new QodeMetaField("yesno", "qode_slide_svg_drawing", "no", "SVG Drawing Animation", "Enable SVG drawing animation", array(), array(
		"dependence" => "true",
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_svg_drawing_container"
	));
	$qodeSlideSvg->addChild("qode_slide_svg_drawing", $qode_slide_svg_drawing);

	$qode_slide_svg_drawing_container = new QodeContainer("qode_slide_svg_drawing_container", "qode_slide_svg_drawing", "no");
	$qodeSlideSvg->addChild("qode_slide_svg_drawing_container", $qode_slide_svg_drawing_container);

	$qode_slide_svg_frame_rate = new QodeMetaField("text", "qode_slide_svg_frame_rate", "", "SVG Frame Rate", "FPS (frames per second) value, defines speed of drawing");
	$qode_slide_svg_drawing_container->addChild("qode_slide_svg_frame_rate", $qode_slide_svg_frame_rate);

//Qode Slide Buttons

$qodeSlideButtons = new QodeMetaBox("slides", "Qode Slide Buttons");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_buttons",$qodeSlideButtons);

	$button1_group = new QodeGroup("Button 1","");
	$qodeSlideButtons->addChild("button1_group",$button1_group);
	    $row1 = new QodeRow();
	    $button1_group->addChild("row1",$row1);
		    $button1_label = new QodeMetaField("textsimple","qode_slide-button-label","","Label","This is some description");
		    $row1->addChild("qode_slide-button-label",$button1_label);
		    $button1_link = new QodeMetaField("textsimple","qode_slide-button-link","","Link","This is some description");
		    $row1->addChild("qode_slide-button-link",$button1_link);
		    $button1_hover_type = new QodeMetaField("selectsimple","qode_slide-button-hover-type","default","Hover Type","This is some description", array(
			    "default" => "Default",
			    "enlarge" => "Enlarge",
			));
		    $row1->addChild("qode_slide-button-hover-type",$button1_hover_type);

		//init icon pack hide and show array. It will be populated dinamically from collections array
		$button1_icon_pack_hide_array = array();
		$button1_icon_pack_show_array = array();

		//do we have some collection added in collections array?
		if(is_array($qodeIconCollections->iconCollections) && count($qodeIconCollections->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$button1_icon_collections_params = $qodeIconCollections->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach ($qodeIconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
				$button1_icon_pack_hide_array[$dep_collection_key] = '';
				$button1_icon_pack_hide_array["no_icon"] = "";

				//button1_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
				$button1_icon_pack_hide_array["no_icon"] .= "#qodef_slider_button1_icon_size,";

				//we need to include only current collection in show string as it is the only one that needs to show
				$button1_icon_pack_show_array[$dep_collection_key] = '#qodef_slider_button1_icon_size, #qodef_button1_icon_'.$dep_collection_object->param.'_container';

				//for all collections param generate hide string
				foreach ($button1_icon_collections_params as $button1_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if($button1_icon_collections_param !== $dep_collection_object->param) {
						$button1_icon_pack_hide_array[$dep_collection_key].= '#qodef_button1_icon_'.$button1_icon_collections_param.'_container,';
					}

					$button1_icon_pack_hide_array["no_icon"] .= '#qodef_button1_icon_'.$button1_icon_collections_param.'_container,';
				}

				//remove remaining ',' character
				$button1_icon_pack_hide_array[$dep_collection_key] = rtrim($button1_icon_pack_hide_array[$dep_collection_key], ',');
				$button1_icon_pack_hide_array["no_icon"] = rtrim($button1_icon_pack_hide_array["no_icon"], ',');
			}

		}

		$button1_icon_pack = new QodeMetaField(
			"select",
			"qode_slide_button1_icon_pack",
			"no_icon",
			"Button 1 Icon Pack",
			"Choose icon pack for first button",
			$qodeIconCollections->getIconCollectionsEmpty("no_icon"),
			array(
				"dependence" => true,
				"hide" => $button1_icon_pack_hide_array,
				"show" => $button1_icon_pack_show_array
			));

		$qodeSlideButtons->addChild("button1_icon_pack", $button1_icon_pack);

		if(is_array($qodeIconCollections->iconCollections) && count($qodeIconCollections->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach ($qodeIconCollections->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = $qodeIconCollections->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$button1_icon_hide_values = $icon_collections_keys;
				$button1_icon_hide_values[] = "no_icon";
				$button1_icon_container = new QodeContainer("button1_icon_".$collection_object->param."_container", "qode_slide_button1_icon_pack", "", $button1_icon_hide_values);
				$button1_icon = new QodeMetaField("select", "qode_slide_button1_icon_".$collection_object->param, "", "Button 1 Icon","Choose First Button Icon", $icons_array, array("col_width" => 3));
				$button1_icon_container->addChild("button1_icon_".$collection_object->param, $button1_icon);

				$qodeSlideButtons->addChild("button1_icon_".$collection_object->param."_container", $button1_icon_container);
			}

		}

	$button2_group = new QodeGroup("Button 2","");
	$qodeSlideButtons->addChild("button2_group",$button2_group);
	    $row1 = new QodeRow();
	    $button2_group->addChild("row1",$row1);
		    $button2_label = new QodeMetaField("textsimple","qode_slide-button-label2","","Label","This is some description");
		    $row1->addChild("qode_slide-button-label",$button2_label);
		    $button2_link = new QodeMetaField("textsimple","qode_slide-button-link2","","Link","This is some description");
		    $row1->addChild("qode_slide-button-link",$button2_link);
		    $button2_hover_type = new QodeMetaField("selectsimple","qode_slide-button-hover-type2","default","Hover Type","This is some description", array(
			    "default" => "Default",
			    "enlarge" => "Enlarge",
			));
		    $row1->addChild("qode_slide-button-hover-type2",$button2_hover_type);

	//init icon pack hide and show array. It will be populated dinamically from collections array
	$button2_icon_pack_hide_array = array();
	$button2_icon_pack_show_array = array();

	//do we have some collection added in collections array?
	if(is_array($qodeIconCollections->iconCollections) && count($qodeIconCollections->iconCollections)) {
		//get collections params array. It will contain values of 'param' property for each collection
		$button2_icon_collections_params = $qodeIconCollections->getIconCollectionsParams();

		//foreach collection generate hide and show array
		foreach ($qodeIconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
			$button2_icon_pack_hide_array[$dep_collection_key] = '';
			$button2_icon_pack_hide_array["no_icon"] = "";

			//button2_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
			$button2_icon_pack_hide_array["no_icon"] .= "#qodef_slider_button2_icon_size,";

			//we need to include only current collection in show string as it is the only one that needs to show
			$button2_icon_pack_show_array[$dep_collection_key] = '#qodef_slider_button2_icon_size,#qodef_button2_icon_'.$dep_collection_object->param.'_container';

			//for all collections param generate hide string
			foreach ($button2_icon_collections_params as $button2_icon_collections_param) {
				//we don't need to include current one, because it needs to be shown, not hidden
				if($button2_icon_collections_param !== $dep_collection_object->param) {
					$button2_icon_pack_hide_array[$dep_collection_key].= '#qodef_button2_icon_'.$button2_icon_collections_param.'_container,';
				}

				$button2_icon_pack_hide_array["no_icon"] .= '#qodef_button2_icon_'.$button2_icon_collections_param.'_container,';
			}

			//remove remaining ',' character
			$button2_icon_pack_hide_array[$dep_collection_key] = rtrim($button2_icon_pack_hide_array[$dep_collection_key], ',');
			$button2_icon_pack_hide_array["no_icon"] = rtrim($button2_icon_pack_hide_array["no_icon"], ',');
		}

	}

	$button2_icon_pack = new QodeMetaField(
		"select",
		"qode_slide_button2_icon_pack",
		"no_icon",
		"Button 2 Icon Pack",
		"Choose icon pack for first button",
		$qodeIconCollections->getIconCollectionsEmpty("no_icon"),
		array(
			"dependence" => true,
			"hide" => $button2_icon_pack_hide_array,
			"show" => $button2_icon_pack_show_array
		));

	$qodeSlideButtons->addChild("button2_icon_pack", $button2_icon_pack);

	if(is_array($qodeIconCollections->iconCollections) && count($qodeIconCollections->iconCollections)) {
		//foreach icon collection we need to generate separate container that will have dependency set
		//it will have one field inside with icons dropdown
		foreach ($qodeIconCollections->iconCollections as $collection_key => $collection_object) {
			$icons_array = $collection_object->getIconsArray();

			//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
			$icon_collections_keys = $qodeIconCollections->getIconCollectionsKeys();

			//unset current one, because it doesn't have to be included in dependency that hides icon container
			unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

			$button2_icon_hide_values = $icon_collections_keys;
			$button2_icon_hide_values[] = "no_icon";
			$button2_icon_container = new QodeContainer("button2_icon_".$collection_object->param."_container", "qode_slide_button2_icon_pack", "", $button2_icon_hide_values);
			$button2_icon = new QodeMetaField("select", "qode_slide_button2_icon_".$collection_object->param, "", "Button 2 Icon","Choose First Button Icon", $icons_array, array("col_width" => 3));
			$button2_icon_container->addChild("button2_icon_".$collection_object->param, $button2_icon);

			$qodeSlideButtons->addChild("button2_icon_".$collection_object->param."_container", $button2_icon_container);
		}

	}

//Qode Slide Content Positioning

$qodeSlideContentPositioning = new QodeMetaBox("slides", "Qode Slide Content Positioning");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_content_positioning",$qodeSlideContentPositioning);

	$qode_slide_graphic_alignment = new QodeMetaField("selectblank","qode_slide-graphic-alignment","","Graphic Alignment","Choose an alignment for the slide graphic", array(
	    "left" => "Left",
	    "center" => "Center",
	    "right" => "Right"
	));
	$qodeSlideContentPositioning->addChild("qode_slide-graphic-alignment",$qode_slide_graphic_alignment);
	
	$qode_slide_text_alignment = new QodeMetaField("selectblank","qode_slide-content-alignment","","Text Alignment","Choose an alignment for the slide text", array(
	    "left" => "Left",
	    "center" => "Center",
	    "right" => "Right"
	));
	$qodeSlideContentPositioning->addChild("qode_slide-content-alignment",$qode_slide_text_alignment);

	$qode_slide_separate_text_graphic = new QodeMetaField("selectblank","qode_slide-separate-text-graphic","no","Separate Graphic and Text Positioning","Do you want to separately position graphic and text?", array(
	    "no" => "No",
	    "yes" => "Yes"
	), array("dependence" => true,
	         "hide" => array(
	            "" => "#qodef_qode_slide_graphic_positioning_container",
	            "no" => "#qodef_qode_slide_graphic_positioning_container"
	         ),
	         "show" => array(
	             "yes" => "#qodef_qode_slide_graphic_positioning_container"
	         )));
	$qodeSlideContentPositioning->addChild("qode_slide-separate-text-graphic",$qode_slide_separate_text_graphic);

    $qode_slide_content_vertical_middle = new QodeMetaField("yesno","qode_slide-content-vertical-middle","no","Vertically Align Content to Middle","", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_qode_slide-content-vertical-middle-container", "dependence_show_on_yes" => "#qodef_qode_slide-content-vertical-middle-type-container"));
    $qodeSlideContentPositioning->addChild("qode_slide-content-vertical-middle",$qode_slide_content_vertical_middle);

    $qode_slide_content_vertical_middle_type_container = new QodeContainer("qode_slide-content-vertical-middle-type-container","qode_slide-content-vertical-middle","no");
    $qodeSlideContentPositioning->addChild("qode_slide-content-vertical-middle-type-container",$qode_slide_content_vertical_middle_type_container);

        $qode_slide_content_vertical_middle_type = new QodeMetaField("selectblank","qode_slide-content-vertical-middle-type","","Align Content Vertically Relative to the Height Measured From","", array(
            "bottom_of_header" => "Bottom of Header",
            "window_top" => "Window Top"
        ));
        $qode_slide_content_vertical_middle_type_container->addChild("qode_slide-content-vertical-middle-type",$qode_slide_content_vertical_middle_type);

        $qode_slide_vertical_content_full_width = new QodeMetaField("yesno","qode_slide_vertical_content_full_width","no","Content Holder Full Width","Do you want to set slide content holder to full width?");
        $qode_slide_content_vertical_middle_type_container->addChild("qode_slide_vertical_content_full_width",$qode_slide_vertical_content_full_width);

        $qode_slide_vertical_content_width = new QodeMetaField("text","qode_slide_vertical_content_width","","Content Width","Enter Width for Content Area (%)",array(), array("col_width" => 3));
        $qode_slide_content_vertical_middle_type_container->addChild("qode_slide_vertical_content_width",$qode_slide_vertical_content_width);

        $content_vertical_positioning_group = new QodeGroup("Space Around Content in Slide","Enter values for margins around slide content");
        $qode_slide_content_vertical_middle_type_container->addChild("content_vertical_positioning_group",$content_vertical_positioning_group);
        $row1 = new QodeRow(true);
        $content_vertical_positioning_group->addChild("row1",$row1);
        $qode_slide_vertical_content_left = new QodeMetaField("textsimple","qode_slide_vertical_content_left","","From Left (%)","This is some description");
        $row1->addChild("qode_slide_vertical_content_left",$qode_slide_vertical_content_left);
        $qode_slide_vertical_content_right = new QodeMetaField("textsimple","qode_slide_vertical_content_right","","From Right (%)","This is some description");
        $row1->addChild("qode_slide_vertical_content_right",$qode_slide_vertical_content_right);

    $qode_slide_content_vertical_middle_container = new QodeContainer("qode_slide-content-vertical-middle-container","qode_slide-content-vertical-middle","yes");
    $qodeSlideContentPositioning->addChild("qode_slide-content-vertical-middle-container",$qode_slide_content_vertical_middle_container);

        $content_positioning_group = new QodeGroup("Content Positioning","Positioning for slide title, subtitle, text and buttons (and graphic if positioning is not separated) ");
        $qode_slide_content_vertical_middle_container->addChild("content_positioning_group",$content_positioning_group);
            $row1 = new QodeRow();
            $content_positioning_group->addChild("row1",$row1);
                $qode_slide_content_width = new QodeMetaField("textsimple","qode_slide-content-width","","Width (%)","This is some description");
                $row1->addChild("qode_slide-content-width",$qode_slide_content_width);

            $row2 = new QodeRow(true);
            $content_positioning_group->addChild("row2",$row2);
                $qode_slide_content_top = new QodeMetaField("textsimple","qode_slide-content-top","","Content from top (%)","This is some description");
                $row2->addChild("qode_slide-content-top",$qode_slide_content_top);
                $qode_slide_content_left = new QodeMetaField("textsimple","qode_slide-content-left","","Content from left (%)","This is some description");
                $row2->addChild("qode_slide-content-left",$qode_slide_content_left);

            $row3 = new QodeRow(true);
            $content_positioning_group->addChild("row3",$row3);
                $qode_slide_content_bottom = new QodeMetaField("textsimple","qode_slide-content-bottom","","Content from bottom (%)","This is some description");
                $row3->addChild("qode_slide-content-bottom",$qode_slide_content_bottom);
                $qode_slide_content_right = new QodeMetaField("textsimple","qode_slide-content-right","","Content from right (%)","This is some description");
                $row3->addChild("qode_slide-content-right",$qode_slide_content_right);

        $qode_slide_graphic_positioning_container = new QodeContainer("qode_slide_graphic_positioning_container","qode_slide-separate-text-graphic","no");
        $qode_slide_content_vertical_middle_container->addChild("qode_slide_graphic_positioning_container",$qode_slide_graphic_positioning_container);

        $graphic_positioning_group = new QodeGroup("Graphic Positioning","Positioning for slide graphic");
        $qode_slide_graphic_positioning_container->addChild("graphic_positioning_group",$graphic_positioning_group);
            $row1 = new QodeRow();
            $graphic_positioning_group->addChild("row1",$row1);
                $qode_slide_content_width = new QodeMetaField("textsimple","qode_slide-graphic-width","","Width (%)","This is some description");
                $row1->addChild("qode_slide-graphic-width",$qode_slide_content_width);

            $row2 = new QodeRow(true);
            $graphic_positioning_group->addChild("row2",$row2);
                $qode_slide_content_top = new QodeMetaField("textsimple","qode_slide-graphic-top","","Content from top (%)","This is some description");
                $row2->addChild("qode_slide-graphic-top",$qode_slide_content_top);
                $qode_slide_content_left = new QodeMetaField("textsimple","qode_slide-graphic-left","","Content from left (%)","This is some description");
                $row2->addChild("qode_slide-graphic-left",$qode_slide_content_left);

            $row3 = new QodeRow(true);
            $graphic_positioning_group->addChild("row3",$row3);
                $qode_slide_content_bottom = new QodeMetaField("textsimple","qode_slide-graphic-bottom","","Content from bottom (%)","This is some description");
                $row3->addChild("qode_slide-graphic-bottom",$qode_slide_content_bottom);
                $qode_slide_content_right = new QodeMetaField("textsimple","qode_slide-graphic-right","","Content from right (%)","This is some description");
                $row3->addChild("qode_slide-graphic-right",$qode_slide_content_right);

//Qode Slide Scroll Animations

$qodeSlideScrollAnimations = new QodeMetaBox("slides", "Qode Slide Scroll Animations");
$qodeFramework->qodeMetaBoxes->addMetaBox("slides_scroll_animations",$qodeSlideScrollAnimations);

	$qode_slide_general_animation = new QodeMetaField("yesno", "qode_slide_general_animation", "yes", "Animate Whole Slide Content Group at Once on Scroll", "All parts of slide content will animate on scroll as group", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_general_animation_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_general_animation', $qode_slide_general_animation);

	$qode_slide_general_animation_container = new QodeContainer('qode_slide_general_animation_container', 'qode_slide_general_animation', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_general_animation_container', $qode_slide_general_animation_container);

		$qode_slide_content_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are starting properties for the scrolling animation of the slide content group");
		$qode_slide_general_animation_container->addChild("qode_slide_content_animation_data_start", $qode_slide_content_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_content_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_start = new QodeMetaField("textsimple", "qode_slide_data_start", "","Scrollbar Top Distance (px)", "", array(), array("col_width" => 1));
				$row1->addChild("qode_slide_data_start", $qode_slide_data_start);

				$qode_slide_data_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_start_custom_style", "", "Enter CSS declarations separated by semicolons", "", array(), array("col_width" => 4));
				$row1->addChild("qode_slide_data_start_custom_style", $qode_slide_data_start_custom_style);

		$qode_slide_content_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are ending properties for the scrolling animation of the slide content group");
		$qode_slide_general_animation_container->addChild("qode_slide_content_animation_data_end", $qode_slide_content_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_content_animation_data_end->addChild('row2', $row2);

				$qode_slide_data_end = new QodeMetaField("textsimple", "qode_slide_data_end", "", "Scrollbar Top Distance (px)", "");
				$row2->addChild("qode_slide_data_end", $qode_slide_data_end);

				$qode_slide_data_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row2->addChild("qode_slide_data_end_custom_style", $qode_slide_data_end_custom_style);

//Title scroll animation
	$qode_slide_title_animation_scroll = new QodeMetaField("yesno", "qode_slide_title_animation_scroll", "no", "Animate Title on Scroll", "Enable title text to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_title_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_title_animation_scroll', $qode_slide_title_animation_scroll);

	$qode_slide_title_animation_scroll_container = new QodeContainer('qode_slide_title_animation_scroll_container', 'qode_slide_title_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_title_animation_scroll_container', $qode_slide_title_animation_scroll_container);

		$qode_slide_title_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_title_animation_scroll_container->addChild("qode_slide_title_animation_data_start", $qode_slide_title_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_title_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_title_start = new QodeMetaField("textsimple", "qode_slide_data_title_start", "", "Scrollbar Top Distance (px)", "");
				$row1->addChild("qode_slide_data_title_start", $qode_slide_data_title_start);

				$qode_slide_data_title_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_title_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row1->addChild("qode_slide_data_title_start_custom_style", $qode_slide_data_title_start_custom_style);

		$qode_slide_title_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_title_animation_scroll_container->addChild("qode_slide_title_animation_data_end", $qode_slide_title_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_title_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_title_end = new QodeMetaField("textsimple", "qode_slide_data_title_end", "", "Scrollbar Top Distance (px)", "");
				$row2->addChild("qode_slide_data_title_end", $qode_slide_data_title_end);

				$qode_slide_data_title_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_title_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row2->addChild("qode_slide_data_title_end_custom_style", $qode_slide_data_title_end_custom_style);


//Subtitle scroll animation
	$qode_slide_subtitle_animation_scroll = new QodeMetaField("yesno", "qode_slide_subtitle_animation_scroll", "no", "Animate Subtitle on Scroll", "Enable subtitle text to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_subtitle_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_subtitle_animation_scroll', $qode_slide_subtitle_animation_scroll);

	$qode_slide_subtitle_animation_scroll_container = new QodeContainer('qode_slide_subtitle_animation_scroll_container', 'qode_slide_subtitle_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_subtitle_animation_scroll_container', $qode_slide_subtitle_animation_scroll_container);

		$qode_slide_subtitle_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_subtitle_animation_scroll_container->addChild("qode_slide_subtitle_animation_data_start", $qode_slide_subtitle_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_subtitle_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_subtitle_start = new QodeMetaField("textsimple", "qode_slide_data_subtitle_start", "", "Scrollbar Top Distance (px)", "");
				$row1->addChild("qode_slide_data_subtitle_start", $qode_slide_data_subtitle_start);

				$qode_slide_data_subtitle_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_subtitle_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row1->addChild("qode_slide_data_subtitle_start_custom_style", $qode_slide_data_subtitle_start_custom_style);

		$qode_slide_subtitle_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_subtitle_animation_scroll_container->addChild("qode_slide_subtitle_animation_data_end", $qode_slide_subtitle_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_subtitle_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_subtitle_end = new QodeMetaField("textsimple", "qode_slide_data_subtitle_end", "", "Scrollbar Top Distance (px)", "");
				$row2->addChild("qode_slide_data_subtitle_end", $qode_slide_data_subtitle_end);

				$qode_slide_data_subtitle_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_subtitle_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row2->addChild("qode_slide_data_subtitle_end_custom_style", $qode_slide_data_subtitle_end_custom_style);


//Graphics scroll animation
	$qode_slide_graphic_animation_scroll = new QodeMetaField("yesno", "qode_slide_graphic_animation_scroll", "no", "Animate Graphic on Scroll", "Enable graphic to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_graphic_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_graphic_animation_scroll', $qode_slide_graphic_animation_scroll);

	$qode_slide_graphic_animation_scroll_container = new QodeContainer('qode_slide_graphic_animation_scroll_container', 'qode_slide_graphic_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_graphic_animation_scroll_container', $qode_slide_graphic_animation_scroll_container);

		$qode_slide_graphics_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_graphic_animation_scroll_container->addChild("qode_slide_graphics_animation_data_start", $qode_slide_graphics_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_graphics_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_graphics_start = new QodeMetaField("textsimple", "qode_slide_data_graphics_start", "", "Scrollbar Top Distance (px)", "");
				$row1->addChild("qode_slide_data_graphics_start", $qode_slide_data_graphics_start);

				$qode_slide_data_graphics_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_graphics_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row1->addChild("qode_slide_data_graphics_start_custom_style", $qode_slide_data_graphics_start_custom_style);

		$qode_slide_graphics_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_graphic_animation_scroll_container->addChild("qode_slide_graphics_animation_data_end", $qode_slide_graphics_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_graphics_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_graphics_end = new QodeMetaField("textsimple", "qode_slide_data_graphics_end", "", "Scrollbar Top Distance (px)", "");
				$row2->addChild("qode_slide_data_graphics_end", $qode_slide_data_graphics_end);

				$qode_slide_data_graphics_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_graphics_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row2->addChild("qode_slide_data_graphics_end_custom_style", $qode_slide_data_graphics_end_custom_style);

//Text scroll animation
	$qode_slide_text_animation_scroll = new QodeMetaField("yesno", "qode_slide_text_animation_scroll", "no", "Animate Text on Scroll", "Enable text to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_text_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_text_animation_scroll', $qode_slide_text_animation_scroll);

	$qode_slide_text_animation_scroll_container = new QodeContainer('qode_slide_text_animation_scroll_container', 'qode_slide_text_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_text_animation_scroll_container', $qode_slide_text_animation_scroll_container);

		$qode_slide_text_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_text_animation_scroll_container->addChild("qode_slide_text_animation_data_start", $qode_slide_text_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_text_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_text_start = new QodeMetaField("textsimple", "qode_slide_data_text_start", "", "Scrollbar Top Distance (px)", "");
				$row1->addChild("qode_slide_data_text_start", $qode_slide_data_text_start);

				$qode_slide_data_text_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_text_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row1->addChild("qode_slide_data_text_start_custom_style", $qode_slide_data_text_start_custom_style);

		$qode_slide_text_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_text_animation_scroll_container->addChild("qode_slide_text_animation_data_end", $qode_slide_text_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_text_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_text_end = new QodeMetaField("textsimple", "qode_slide_data_text_end", "", "Scrollbar Top Distance (px)", "");
				$row2->addChild("qode_slide_data_text_end", $qode_slide_data_text_end);

				$qode_slide_data_text_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_text_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
				$row2->addChild("qode_slide_data_text_end_custom_style", $qode_slide_data_text_end_custom_style);


//Button 1 scroll animation
	$qode_slide_button1_animation_scroll = new QodeMetaField("yesno", "qode_slide_button1_animation_scroll", "no", "Animate Button 1 on Scroll", "Enable button 1 to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_button1_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_button1_animation_scroll', $qode_slide_button1_animation_scroll);

	$qode_slide_button1_animation_scroll_container = new QodeContainer('qode_slide_button1_animation_scroll_container', 'qode_slide_button1_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_button1_animation_scroll_container', $qode_slide_button1_animation_scroll_container);

		$qode_slide_button_1_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_button1_animation_scroll_container->addChild("qode_slide_button_1_animation_data_start", $qode_slide_button_1_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_button_1_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_button_1_start = new QodeMetaField("textsimple", "qode_slide_data_button_1_start", "", "Scrollbar Top Distance (px)");
				$row1->addChild("qode_slide_data_button_1_start", $qode_slide_data_button_1_start);

				$qode_slide_data_button_1_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_button_1_start_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row1->addChild("qode_slide_data_button_1_start_custom_style", $qode_slide_data_button_1_start_custom_style);

		$qode_slide_button_1_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_button1_animation_scroll_container->addChild("qode_slide_button_1_animation_data_end", $qode_slide_button_1_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_button_1_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_button_1_end = new QodeMetaField("textsimple", "qode_slide_data_button_1_end", "", "Scrollbar Top Distance (px)");
				$row2->addChild("qode_slide_data_button_1_end", $qode_slide_data_button_1_end);

				$qode_slide_data_button_1_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_button_1_end_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row2->addChild("qode_slide_data_button_1_end_custom_style", $qode_slide_data_button_1_end_custom_style);



//Button 2 scroll animation
	$qode_slide_button2_animation_scroll = new QodeMetaField("yesno", "qode_slide_button2_animation_scroll", "no", "Animate Button 2 on Scroll", "Enable button 2 to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_button2_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_button2_animation_scroll', $qode_slide_button2_animation_scroll);

	$qode_slide_button2_animation_scroll_container = new QodeContainer('qode_slide_button2_animation_scroll_container', 'qode_slide_button2_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_button2_animation_scroll_container', $qode_slide_button2_animation_scroll_container);

		$qode_slide_button_2_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_button2_animation_scroll_container->addChild("qode_slide_button_2_animation_data_start", $qode_slide_button_2_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_button_2_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_button_2_start = new QodeMetaField("textsimple", "qode_slide_data_button_2_start", "", "Scrollbar Top Distance (px)");
				$row1->addChild("qode_slide_data_button_2_start", $qode_slide_data_button_2_start);

				$qode_slide_data_button_2_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_button_2_start_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row1->addChild("qode_slide_data_button_2_start_custom_style", $qode_slide_data_button_2_start_custom_style);

		$qode_slide_button_2_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_button2_animation_scroll_container->addChild("qode_slide_button_2_animation_data_end", $qode_slide_button_2_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_button_2_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_button_2_end = new QodeMetaField("textsimple", "qode_slide_data_button_2_end", "", "Scrollbar Top Distance (px)");
				$row2->addChild("qode_slide_data_button_2_end", $qode_slide_data_button_2_end);

				$qode_slide_data_button_2_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_button_2_end_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row2->addChild("qode_slide_data_button_2_end_custom_style", $qode_slide_data_button_2_end_custom_style);


//Separator Bottom scroll animation
	$qode_slide_separator_bottom_animation_scroll = new QodeMetaField("yesno", "qode_slide_separator_bottom_animation_scroll", "no", "Animate Separator on Scroll", "Enable separator bottom to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_separator_bottom_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_separator_bottom_animation_scroll', $qode_slide_separator_bottom_animation_scroll);

	$qode_slide_separator_bottom_animation_scroll_container = new QodeContainer('qode_slide_separator_bottom_animation_scroll_container', 'qode_slide_separator_bottom_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_separator_bottom_animation_scroll_container', $qode_slide_separator_bottom_animation_scroll_container);

		$qode_slide_separator_bottom_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_separator_bottom_animation_scroll_container->addChild("qode_slide_separator_bottom_animation_data_start", $qode_slide_separator_bottom_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_separator_bottom_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_separator_bottom_start = new QodeMetaField("textsimple", "qode_slide_data_separator_bottom_start", "", "Scrollbar Top Distance (px)");
				$row1->addChild("qode_slide_data_separator_bottom_start", $qode_slide_data_separator_bottom_start);

				$qode_slide_data_separator_bottom_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_separator_bottom_start_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row1->addChild("qode_slide_data_separator_bottom_start_custom_style", $qode_slide_data_separator_bottom_start_custom_style);

		$qode_slide_separator_bottom_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_separator_bottom_animation_scroll_container->addChild("qode_slide_separator_bottom_animation_data_end", $qode_slide_separator_bottom_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_separator_bottom_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_separator_bottom_end = new QodeMetaField("textsimple", "qode_slide_data_separator_bottom_end", "", "Scrollbar Top Distance (px)");
				$row2->addChild("qode_slide_data_separator_bottom_end", $qode_slide_data_separator_bottom_end);

				$qode_slide_data_separator_bottom_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_separator_bottom_end_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row2->addChild("qode_slide_data_separator_bottom_end_custom_style", $qode_slide_data_separator_bottom_end_custom_style);


//SVG scroll animation
	$qode_slide_svg_animation_scroll = new QodeMetaField("yesno", "qode_slide_svg_animation_scroll", "no", "Animate SVG on Scroll", "Enable SVG to animate separately", array(), array(
		"dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_qode_slide_svg_animation_scroll_container"
	));
	$qodeSlideScrollAnimations->addChild('qode_slide_svg_animation_scroll', $qode_slide_svg_animation_scroll);

	$qode_slide_svg_animation_scroll_container = new QodeContainer('qode_slide_svg_animation_scroll_container', 'qode_slide_svg_animation_scroll', 'no');
	$qodeSlideScrollAnimations->addChild('qode_slide_svg_animation_scroll_container', $qode_slide_svg_animation_scroll_container);

		$qode_slide_svg_animation_data_start = new QodeGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
		$qode_slide_svg_animation_scroll_container->addChild("qode_slide_svg_animation_data_start", $qode_slide_svg_animation_data_start);

			$row1 = new QodeRow();
			$qode_slide_svg_animation_data_start->addChild("row1", $row1);

				$qode_slide_data_svg_start = new QodeMetaField("textsimple", "qode_slide_data_svg_start", "", "Scrollbar Top Distance (px)");
				$row1->addChild("qode_slide_data_svg_start", $qode_slide_data_svg_start);

				$qode_slide_data_svg_start_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_svg_start_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row1->addChild("qode_slide_data_svg_start_custom_style", $qode_slide_data_svg_start_custom_style);

		$qode_slide_svg_animation_data_end = new QodeGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
		$qode_slide_svg_animation_scroll_container->addChild("qode_slide_svg_animation_data_end", $qode_slide_svg_animation_data_end);

			$row2 = new QodeRow();
			$qode_slide_svg_animation_data_end->addChild("row2", $row2);

				$qode_slide_data_svg_end = new QodeMetaField("textsimple", "qode_slide_data_svg_end", "", "Scrollbar Top Distance (px)");
				$row2->addChild("qode_slide_data_svg_end", $qode_slide_data_svg_end);

				$qode_slide_data_svg_end_custom_style = new QodeMetaField("textareasimple", "qode_slide_data_svg_end_custom_style", "", "Enter CSS declarations separated by semicolons");
				$row2->addChild("qode_slide_data_svg_end_custom_style", $qode_slide_data_svg_end_custom_style);