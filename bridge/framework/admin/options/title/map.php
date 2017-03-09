<?php

if(!function_exists('qode_title_options_map')) {
    /**
     * Title options page
     */
    function qode_title_options_map()
    {

        $titlePage = new QodeAdminPage("_title", "Title", "fa fa-list-alt");
        qode_framework()->qodeOptions->addAdminPage("title", $titlePage);

        $panel8 = new QodePanel("Title", "title_panel");
        $titlePage->addChild("panel8", $panel8);
        $dont_show_page_title = new QodeField("yesno", "dont_show_page_title", "no", "Don't Show Title Area", "Enable this option to turn off page title area", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_page_title_area_container", "dependence_show_on_yes" => ""));
        $panel8->addChild("dont_show_page_title", $dont_show_page_title);

        $page_title_area_container = new QodeContainer("page_title_area_container", "dont_show_page_title", "yes");
        $panel8->addChild("page_title_area_container", $page_title_area_container);


        $animate_title_area = new QodeField("select", "animate_title_area", "no", "Animations", "Choose an animation for Title Area", array("no" => "No animation",
            "text_right_left" => "Text right to left",
            "area_top_bottom" => "Title area top to bottom"
        ));
        $page_title_area_container->addChild("animate_title_area", $animate_title_area);


        $dont_show_page_title_text = new QodeField("yesno", "dont_show_page_title_text", "no", "Don't Show Title Text", "Enable this option to turn off page title text", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_page_title_area_text_container", "dependence_show_on_yes" => ""));
        $page_title_area_container->addChild("dont_show_page_title_text", $dont_show_page_title_text);

        $page_title_area_text_container = new QodeContainer("page_title_area_text_container", "dont_show_page_title_text", "yes");
        $page_title_area_container->addChild("page_title_area_text_container", $page_title_area_text_container);


        $page_title_position = new QodeField("select", "page_title_position", "left", "Title Text Alignment", "Specify Title text alignment", array("left" => "Left",
            "center" => "Center",
            "right" => "Right"
        ));
        $page_title_area_text_container->addChild("page_title_position", $page_title_position);
        $predefined_title_sizes = new QodeField("select", "predefined_title_sizes", "small", "Text Size", "Choose a default Title size", array("small" => "Small",
            "medium" => "Medium",
            "large" => "Large"
        ));
        $page_title_area_text_container->addChild("predefined_title_sizes", $predefined_title_sizes);
        $title_text_shadow = new QodeField("yesno", "title_text_shadow", "no", "Text Shadow", "Enabling this option will give Title text a shadow");
        $page_title_area_text_container->addChild("title_text_shadow", $title_text_shadow);
        $title_text_margin = new QodeField("text", "title_text_margin", "", "Text Margin (top right bottom left)", "Set margin for title text, our suggestion is to use percentage mark because of responsivness.", array(), array("col_width" => 3));
        $page_title_area_text_container->addChild("title_text_margin", $title_text_margin);
        $title_background_color = new QodeField("color", "title_background_color", "", "Background Color", "Choose a background color for Title Area");
        $page_title_area_container->addChild("title_background_color", $title_background_color);
        $title_image = new QodeField("image", "title_image", "", "Background Image", "Choose an Image for Title Area");
        $page_title_area_container->addChild("title_image", $title_image);
        $responsive_title_image = new QodeField("yesno", "responsive_title_image", "no", "Background Responsive Image", "Enabling this option will make Title background image responsive", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_responsive_title_image_container", "dependence_show_on_yes" => ""));
        $page_title_area_container->addChild("responsive_title_image", $responsive_title_image);

        $responsive_title_image_container = new QodeContainer("responsive_title_image_container", "responsive_title_image", "yes");
        $page_title_area_container->addChild("responsive_title_image_container", $responsive_title_image_container);
        $fixed_title_image = new QodeField("select", "fixed_title_image", "no", "Parallax Title Image", "Enabling this option will make Title image parallax", array("no" => "No",
            "yes" => "Yes",
            "yes_zoom" => "Yes, with zoom out"
        ));
        $responsive_title_image_container->addChild("fixed_title_image", $fixed_title_image);
        $title_height = new QodeField("text", "title_height", "", "Title Height (px)", "Set a height for Title Area in pixels", array(), array("col_width" => 3));
        $responsive_title_image_container->addChild("title_height", $title_height);
        $title_overlay_image = new QodeField("image", "title_overlay_image", "", "Pattern Overlay Image", "Choose an image to be used as pattern over Title Area");
        $page_title_area_container->addChild("title_overlay_image", $title_overlay_image);
        $title_separator = new QodeField("yesno", "title_separator", "yes", "Show Title Separator", "Enabling this option will display a separator underneath Title", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_title_separator_container, #qodef_animation_page_separator_container"));
        $page_title_area_container->addChild("title_separator", $title_separator);
        $title_separator_container = new QodeContainer("title_separator_container", "title_separator", "no");
        $page_title_area_container->addChild("title_separator_container", $title_separator_container);
        $title_separator_color = new QodeField("color", "title_separator_color", "", "Title Separator Color", "Choose a color for Title separator");
        $title_separator_container->addChild("title_separator_color", $title_separator_color);
        $title_separator_width = new QodeField("text", "title_separator_width", "", "Title Separator Width (px)", "Set the separator width in pixels", array(), array("col_width" => 3));
        $title_separator_container->addChild("title_separator_width", $title_separator_width);

        $enable_title_angled = new QodeField("yesno", "enable_title_angled", "no", "Enable Angled Title", "Enabling this option will show angled shape in background", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_title_angled_container"));
        $page_title_area_container->addChild("enable_title_angled", $enable_title_angled);

        $enable_title_angled_container = new QodeContainer("enable_title_angled_container", "enable_title_angled", "no");
        $page_title_area_container->addChild("enable_title_angled_container", $enable_title_angled_container);

        $title_angled_section_direction = new QodeField("select", "title_angled_section_direction", "", "Angled Direction", "Choose a direction for angled shape in title background", array(
            "from_left_to_right" => "From Left To Right",
            "from_right_to_left" => "From Right To Left"
        ));
        $enable_title_angled_container->addChild("title_angled_section_direction", $title_angled_section_direction);

        $title_angled_section_color = new QodeField("color", "title_angled_section_color", "", "Background Color", "Choose a background color for angled shape");
        $enable_title_angled_container->addChild("title_angled_section_color", $title_angled_section_color);

        $border_bottom_title_area = new QodeField("yesno", "border_bottom_title_area", "no", "Bottom Border", "Enabling this option will display bottom border on Title Area", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_border_bottom_title_area_container"));
        $page_title_area_container->addChild("border_bottom_title_area", $border_bottom_title_area);
        $border_bottom_title_area_container = new QodeContainer("border_bottom_title_area_container", "border_bottom_title_area", "no");
        $page_title_area_container->addChild("border_bottom_title_area_container", $border_bottom_title_area_container);
        $border_bottom_title_area_color = new QodeField("color", "border_bottom_title_area_color", "", "Bottom Border Color", "Choose a color for Title Area bottom border");
        $border_bottom_title_area_container->addChild("border_bottom_title_area_color", $border_bottom_title_area_color);

        $border_bottom_in_grid_title_area = new QodeField('yesno', 'border_bottom_in_grid_title_area', 'no', 'Border In Grid', "Set border in grid");
        $border_bottom_title_area_container->addChild('border_bottom_in_grid_title_area', $border_bottom_in_grid_title_area);

        $margin_after_title = new QodeField("text", "margin_after_title", "", "Margin After Title for Default Template (px)", "Set a bottom margin for Title Area", array(), array("col_width" => 3));
        $panel8->addChild("margin_after_title", $margin_after_title);

        $margin_after_title_responsive = new QodeField("text", "margin_after_title_responsive", "", "Margin After Title for Default Template on Touch Devices (px)", "Set a bottom margin for Title Area on touch devices", array(), array("col_width" => 3));
        $panel8->addChild("margin_after_title_responsive", $margin_after_title_responsive);

        $panel4 = new QodePanel("Breadcrumbs", "enable_breadcrumbs_panel");
        $titlePage->addChild("panel4", $panel4);
        $enable_breadcrumbs = new QodeField("yesno", "enable_breadcrumbs", "no", "Enable Breadcrumbs", "This option will display Breadcrumbs in Title Area", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_breadcrumbs_container, #qodef_animation_page_breadcrumb_container"));
        $panel4->addChild("enable_breadcrumbs", $enable_breadcrumbs);
        $enable_breadcrumbs_container = new QodeContainer("enable_breadcrumbs_container", "enable_breadcrumbs", "no");
        $panel4->addChild("enable_breadcrumbs_container", $enable_breadcrumbs_container);
        $breadcrumbs_color = new QodeField("color", "breadcrumbs_color", "", "Breadcrumbs Color", "Choose a color for Breadcrumb text");
        $enable_breadcrumbs_container->addChild("breadcrumbs_color", $breadcrumbs_color);


        $panel9 = new QodePanel('Title Scroll Animations', 'title_animations');
        $titlePage->addChild('panel9', $panel9);

        //Whole title content animation
        $page_title_whole_content_animations = new QodeField('yesno', 'page_title_whole_content_animations', 'no', 'Enable Whole Title Content Animation', 'This option will enable whole title content animation', array(), array(
            'dependence' => true,
            'dependence_hide_on_yes' => '',
            'dependence_show_on_yes' => '#qodef_page_title_whole_content_animations_container'
        ));
        $panel9->addChild('page_title_whole_content_animations', $page_title_whole_content_animations);

        $page_title_whole_content_animations_container = new QodeContainer('page_title_whole_content_animations_container', 'page_title_whole_content_animations', 'no');
        $panel9->addChild('page_title_whole_content_animations_container', $page_title_whole_content_animations_container);

        $page_title_whole_content_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
        $page_title_whole_content_animations_container->addChild('page_title_whole_content_animations_data_start', $page_title_whole_content_animations_data_start);

        $row1 = new QodeRow();
        $page_title_whole_content_animations_data_start->addChild('row1', $row1);

        $page_title_whole_content_data_start = new QodeField('textsimple', 'page_title_whole_content_data_start', '', 'Scrollbar Top Distance (px)');
        $row1->addChild('page_title_whole_content_data_start', $page_title_whole_content_data_start);

        $page_title_whole_content_start_custom_style = new QodeField('textareasimple', 'page_title_whole_content_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row1->addChild('page_title_whole_content_start_custom_style', $page_title_whole_content_start_custom_style);

        $page_title_whole_content_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
        $page_title_whole_content_animations_container->addChild('page_title_whole_content_animations_data_end', $page_title_whole_content_animations_data_end);

        $row2 = new QodeRow();
        $page_title_whole_content_animations_data_end->addChild('row2', $row2);

        $page_title_whole_content_data_end = new QodeField('textsimple', 'page_title_whole_content_data_end', '', 'Scrollbar Top Distance (px)');
        $row2->addChild('page_title_whole_content_data_end', $page_title_whole_content_data_end);

        $page_title_whole_content_end_custom_style = new QodeField('textareasimple', 'page_title_whole_content_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row2->addChild('page_title_whole_content_end_custom_style', $page_title_whole_content_end_custom_style);

        //Title Animations
        $page_title_animations = new QodeField('yesno', 'page_title_animations', 'no', 'Enable Page Title Animations', 'This option will enable Page Title Scroll Animations', array(), array(
            'dependence' => true,
            'dependence_hide_on_yes' => '',
            'dependence_show_on_yes' => '#qodef_page_title_animations_container'
        ));
        $panel9->addChild('page_title_animations', $page_title_animations);

        $page_title_animations_container = new QodeContainer('page_title_animations_container', 'page_title_animations', 'no');
        $panel9->addChild('page_title_animations_container', $page_title_animations_container);

        $page_title_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
        $page_title_animations_container->addChild('page_title_animations_data_start', $page_title_animations_data_start);

        $row1 = new QodeRow();
        $page_title_animations_data_start->addChild('row1', $row1);

        $page_title_data_start = new QodeField('textsimple', 'page_title_data_start', '', 'Scrollbar Top Distance (px)');
        $row1->addChild('page_title_data_start', $page_title_data_start);

        $page_title_start_custom_style = new QodeField('textareasimple', 'page_title_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row1->addChild('page_title_start_custom_style', $page_title_start_custom_style);

        $page_title_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
        $page_title_animations_container->addChild('page_title_animations_data_end', $page_title_animations_data_end);

        $row2 = new QodeRow();
        $page_title_animations_data_end->addChild('row2', $row2);

        $page_title_data_end = new QodeField('textsimple', 'page_title_data_end', '', 'Scrollbar Top Distance (px)');
        $row2->addChild('page_title_data_end', $page_title_data_end);

        $page_title_end_custom_style = new QodeField('textareasimple', 'page_title_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row2->addChild('page_title_end_custom_style', $page_title_end_custom_style);

        //Title Separator Animations
        $animation_page_separator_container = new QodeContainerNoStyle('animation_page_separator_container', 'title_separator', 'no');
        $panel9->addChild('animation_page_separator_container', $animation_page_separator_container);

        $page_title_separator_animations = new QodeField('yesno', 'page_title_separator_animations', 'no', 'Enable Page Title Separator Animations', 'This option will enable Page Title Separator Scroll Animations', array(), array(
            'dependence' => true,
            'dependence_hide_on_yes' => '',
            'dependence_show_on_yes' => '#qodef_page_title_separator_animations_container'
        ));
        $animation_page_separator_container->addChild('page_title_separator_animations', $page_title_separator_animations);

        $page_title_separator_animations_container = new QodeContainer('page_title_separator_animations_container', 'page_title_separator_animations', 'no');
        $animation_page_separator_container->addChild('page_title_separator_animations_container', $page_title_separator_animations_container);

        $page_title_separator_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
        $page_title_separator_animations_container->addChild('page_title_separator_animations_data_start', $page_title_separator_animations_data_start);

        $row1 = new QodeRow();
        $page_title_separator_animations_data_start->addChild('row1', $row1);

        $page_title_separator_data_start = new QodeField('textsimple', 'page_title_separator_data_start', '', 'Scrollbar Top Distance (px)');
        $row1->addChild('page_title_separator_data_start', $page_title_separator_data_start);

        $page_title_separator_start_custom_style = new QodeField('textareasimple', 'page_title_separator_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row1->addChild('page_title_separator_start_custom_style', $page_title_separator_start_custom_style);

        $page_title_separator_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
        $page_title_separator_animations_container->addChild('page_title_separator_animations_data_end', $page_title_separator_animations_data_end);

        $row2 = new QodeRow();
        $page_title_separator_animations_data_end->addChild('row2', $row2);

        $page_title_separator_data_end = new QodeField('textsimple', 'page_title_separator_data_end', '', 'Scrollbar Top Distance (px)');
        $row2->addChild('page_title_separator_data_end', $page_title_separator_data_end);

        $page_title_separator_end_custom_style = new QodeField('textareasimple', 'page_title_separator_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row2->addChild('page_title_separator_end_custom_style', $page_title_separator_end_custom_style);

        //Subtitle Animations
        $page_subtitle_animations = new QodeField('yesno', 'page_subtitle_animations', 'no', 'Enable Page Subtitle Animations', 'This option will enable Page Subtitle Scroll Animations', array(), array(
            'dependence' => true,
            'dependence_hide_on_yes' => '',
            'dependence_show_on_yes' => '#qodef_page_subtitle_animations_container'
        ));
        $panel9->addChild('page_subtitle_animations', $page_subtitle_animations);

        $page_subtitle_animations_container = new QodeContainer('page_subtitle_animations_container', 'page_subtitle_animations', 'no');
        $panel9->addChild('page_subtitle_animations_container', $page_subtitle_animations_container);

        $page_subtitle_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
        $page_subtitle_animations_container->addChild('page_subtitle_animations_data_start', $page_subtitle_animations_data_start);

        $row1 = new QodeRow();
        $page_subtitle_animations_data_start->addChild('row1', $row1);

        $page_subtitle_data_start = new QodeField('textsimple', 'page_subtitle_data_start', '', 'Scrollbar Top Distance (px)');
        $row1->addChild('page_subtitle_data_start', $page_subtitle_data_start);

        $page_subtitle_start_custom_style = new QodeField('textareasimple', 'page_subtitle_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row1->addChild('page_subtitle_start_custom_style', $page_subtitle_start_custom_style);

        $page_subtitle_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
        $page_subtitle_animations_container->addChild('page_subtitle_animations_data_end', $page_subtitle_animations_data_end);

        $row2 = new QodeRow();
        $page_subtitle_animations_data_end->addChild('row2', $row2);

        $page_subtitle_data_end = new QodeField('textsimple', 'page_subtitle_data_end', '', 'Scrollbar Top Distance (px)');
        $row2->addChild('page_subtitle_data_end', $page_subtitle_data_end);

        $page_subtitle_end_custom_style = new QodeField('textareasimple', 'page_subtitle_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row2->addChild('page_subtitle_end_custom_style', $page_subtitle_end_custom_style);

        //Breadcrumb animations
        $animation_page_breadcrumb_container = new QodeContainerNoStyle('animation_page_breadcrumb_container', 'enable_breadcrumbs', 'no');
        $panel9->addChild('animation_page_breadcrumb_container', $animation_page_breadcrumb_container);

        $page_title_breadcrumbs_animations = new QodeField('yesno', 'page_title_breadcrumbs_animations', 'no', 'Enable Page Title Breadcrumbs Animations', 'This option will enable Page Title Breadcrumbs Scroll Animations', array(), array(
            'dependence' => true,
            'dependence_hide_on_yes' => '',
            'dependence_show_on_yes' => '#qodef_page_title_breadcrumbs_animations_container'
        ));
        $animation_page_breadcrumb_container->addChild('page_title_breadcrumbs_animations', $page_title_breadcrumbs_animations);

        $page_title_breadcrumbs_animations_container = new QodeContainer('page_title_breadcrumbs_animations_container', 'page_title_breadcrumbs_animations', 'no');
        $animation_page_breadcrumb_container->addChild('page_title_breadcrumbs_animations_container', $page_title_breadcrumbs_animations_container);

        $page_title_breadcrumbs_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
        $page_title_breadcrumbs_animations_container->addChild('page_title_breadcrumbs_animations_data_start', $page_title_breadcrumbs_animations_data_start);

        $row1 = new QodeRow();
        $page_title_breadcrumbs_animations_data_start->addChild('row1', $row1);

        $page_title_breadcrumbs_data_start = new QodeField('textsimple', 'page_title_breadcrumbs_data_start', '', 'Scrollbar Top Distance (px)');
        $row1->addChild('page_title_breadcrumbs_data_start', $page_title_breadcrumbs_data_start);

        $page_title_breadcrumbs_start_custom_style = new QodeField('textareasimple', 'page_title_breadcrumbs_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row1->addChild('page_title_breadcrumbs_start_custom_style', $page_title_breadcrumbs_start_custom_style);

        $page_title_breadcrumbs_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
        $page_title_breadcrumbs_animations_container->addChild('page_title_breadcrumbs_animations_data_end', $page_title_breadcrumbs_animations_data_end);

        $row2 = new QodeRow();
        $page_title_breadcrumbs_animations_data_end->addChild('row2', $row2);

        $page_title_breadcrumbs_data_end = new QodeField('textsimple', 'page_title_breadcrumbs_data_end', '', 'Scrollbar Top Distance (px)');
        $row2->addChild('page_title_breadcrumbs_data_end', $page_title_breadcrumbs_data_end);

        $page_title_breadcrumbs_end_custom_style = new QodeField('textareasimple', 'page_title_breadcrumbs_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
        $row2->addChild('page_title_breadcrumbs_end_custom_style', $page_title_breadcrumbs_end_custom_style);

    }
    add_action('qode_options_map','qode_title_options_map',50);
}