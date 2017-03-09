<?php
if(!function_exists('qode_haeder_options_map')) {
    /**
     * Header options page
     */
    function qode_haeder_options_map(){

        $headerandfooterPage = new QodeAdminPage("_header", "Header", "fa fa-header");
        qode_framework()->qodeOptions->addAdminPage("headerandfooter", $headerandfooterPage);

        // Header Position

        $panel6 = new QodePanel("Header Position", "header_position");
        $headerandfooterPage->addChild("panel6", $panel6);
        $vertical_area = new QodeField("yesno", "vertical_area", "no", "Switch to Left Menu", "Enabling this option will switch to a Left Menu area (default is Top Menu)", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "#qodef_header_panel,#qodef_header_top_panel,#qodef_enable_search_panel,#qodef_enable_menus_panel,#qodef_enable_side_area_panel,#qodef_enable_popup_menu_panel,#qodef_language_switcher",
                "dependence_show_on_yes" => "#qodef_vertical_areas_panel"));
        $panel6->addChild("vertical_area", $vertical_area);

        // Header

        $panel5 = new QodePanel("Header", "header_panel", "vertical_area", "yes");
        $headerandfooterPage->addChild("panel5", $panel5);
        $header_in_grid = new QodeField("yesno", "header_in_grid", "yes", "Header in Grid", "Enabling this option will display header content in grid");
        $panel5->addChild("header_in_grid", $header_in_grid);
        $header_bottom_appearance = new QodeField("select", "header_bottom_appearance", "fixed", "Header Type", "Choose the header layout & behavior", array("regular" => "Regular",
            "fixed" => "Fixed",
            "fixed fixed_minimal" => "Fixed Minimal",
            "fixed_hiding" => "Fixed Advanced",
            "fixed_top_header" => "Fixed Header Top",
            "stick" => "Sticky",
            "stick menu_bottom" => "Sticky Expanded",
            "stick_with_left_right_menu" => "Sticky Divided"
        ),
            array("dependence" => true,
                "hide" => array(
                    "regular" => "#qodef_search_left_sidearea_right_container,#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_height_container,#qodef_menu_background_color_container,#qodef_scroll_amount_for_sticky_container,#qodef_header_height_scroll,#qodef_header_height_sticky,#qodef_header_height_scroll_hidden,#qodef_header_background_color_scroll,#qodef_header_background_color_sticky,#qodef_header_background_transparency_scroll,#qodef_header_background_transparency_sticky,#qodef_scroll_amount_for_fixed_hiding_container,#qodef_header_fixed_top_logo_background_container",
                    "fixed" => "#qodef_search_left_sidearea_right_container,#qodef_header_top_height_container,#qodef_menu_background_color_container,#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_height_scroll_hidden,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky,#qodef_scroll_amount_for_fixed_hiding_container, #qodef_header_fixed_top_logo_background_container",
                    "fixed fixed_minimal" => "#qodef_search_left_sidearea_right_container,#qodef_header_top_height_container,#qodef_menu_position_container,#qodef_menu_background_color_container,#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_height_scroll_hidden,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky,#qodef_scroll_amount_for_fixed_hiding_container,#qodef_header_fixed_top_logo_background_container",
                    "fixed_top_header" => "#qodef_search_left_sidearea_right_container,#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_background_transparency_scroll,#qodef_header_background_color_scroll,#qodef_header_height_container,#qodef_menu_position_container,#qodef_menu_background_color_container,#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_height_scroll_hidden,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky,#qodef_scroll_amount_for_fixed_hiding_container",
                    "fixed_hiding" => "#qodef_header_top_height_container,#qodef_scroll_amount_for_sticky_container,#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky, #qodef_header_fixed_top_logo_background_container",
                    "stick menu_bottom" => "#qodef_search_left_sidearea_right_container,#qodef_header_top_height_container,#qodef_menu_background_color_container,#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_height_scroll_hidden,#qodef_header_background_transparency_scroll,#qodef_header_background_color_scroll,#qodef_scroll_amount_for_fixed_hiding_container,#qodef_header_fixed_top_logo_background_container",
                    "stick_with_left_right_menu" => "#qodef_search_left_sidearea_right_container,#qodef_header_top_height_container,#qodef_menu_background_color_container,#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_height_scroll_hidden,#qodef_header_background_transparency_scroll,#qodef_header_background_color_scroll,#qodef_scroll_amount_for_fixed_hiding_container,#qodef_header_fixed_top_logo_background_container",
                    "stick" => "#qodef_search_left_sidearea_right_container,#qodef_header_top_height_container,#qodef_menu_background_color_container,#qodef_header_height_scroll,#qodef_header_height_scroll_hidden,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll,#qodef_scroll_amount_for_fixed_hiding_container,#qodef_header_fixed_top_logo_background_container"),
                "show" => array(
                    "regular" => "#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_menu_position_container",
                    "fixed" => "#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_menu_position_container,#qodef_header_height_scroll,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll",
                    "fixed fixed_minimal" => "#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_header_height_scroll,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll",
                    "fixed_top_header" => "#qodef_header_top_height_container,#qodef_header_height_scroll,#qodef_header_fixed_top_logo_background_container",
                    "stick" => "#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_scroll_amount_for_sticky_container,#qodef_menu_position_container,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
                    "stick menu_bottom" => "#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
                    "stick_with_left_right_menu" => "#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_scroll_amount_for_sticky_container,#qodef_header_height_sticky,#qodef_header_background_color_sticky,#qodef_header_background_transparency_sticky",
                    "fixed_hiding" => "#qodef_search_left_sidearea_right_container,#qodef_disable_text_shadow_for_sticky_container,#qodef_header_top_scroll_container,#qodef_header_height_container,#qodef_menu_background_color_container,#qodef_header_height_scroll_hidden,#qodef_header_background_color_scroll,#qodef_header_background_transparency_scroll,#qodef_scroll_amount_for_fixed_hiding_container")));
        $panel5->addChild("header_bottom_appearance", $header_bottom_appearance);

        $search_left_sidearea_right_container = new QodeContainer("search_left_sidearea_right_container", "header_bottom_appearance", "", array("regular", "fixed", "fixed_top_header", "fixed fixed_minimal", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed_top_header", "fixed fixed_minimal"));
        $panel5->addChild("search_left_sidearea_right_container", $search_left_sidearea_right_container);

        $search_left_sidearea_right = new QodeField("yesno", "search_left_sidearea_right", "no", "Place Search and Side Area Icons to Separate Sides of Header ", "Enabling this option will set search icon to left side of header and side area icon to right side of header");
        $search_left_sidearea_right_container->addChild("search_left_sidearea_right", $search_left_sidearea_right);

        $scroll_amount_for_sticky_container = new QodeContainer("scroll_amount_for_sticky_container", "header_bottom_appearance", "", array("regular", "fixed", "fixed_hiding", "fixed fixed_minimal", "fixed_top_header"));
        $panel5->addChild("scroll_amount_for_sticky_container", $scroll_amount_for_sticky_container);
        $scroll_amount_for_sticky = new QodeField("text", "scroll_amount_for_sticky", "", "Scroll Amount for Sticky (px)", "Enter scroll amount (in pixels) for Sticky Menu to appear", array(), array("col_width" => 3));
        $scroll_amount_for_sticky_container->addChild("scroll_amount_for_sticky", $scroll_amount_for_sticky);

        $hide_initial_sticky = new QodeField("yesno", "hide_initial_sticky", "no", "Hide Header Initially", "Enabling this option will initially hide the header, and it will only be displayed when the user scrolls down the page");
        $scroll_amount_for_sticky_container->addChild("hide_initial_sticky", $hide_initial_sticky);

        $scroll_amount_for_fixed_hiding_container = new QodeContainer("scroll_amount_for_fixed_hiding_container", "header_bottom_appearance", "", array("regular", "fixed", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed fixed_minimal", "fixed_top_header"));
        $panel5->addChild("scroll_amount_for_fixed_hiding_container", $scroll_amount_for_fixed_hiding_container);
        $scroll_amount_for_fixed_hiding = new QodeField("text", "scroll_amount_for_fixed_hiding", "", "Scroll Amount (px)", "Enter scroll amount (in pixels) for menu to hide", array(), array("col_width" => 3));
        $scroll_amount_for_fixed_hiding_container->addChild("scroll_amount_for_fixed_hiding", $scroll_amount_for_fixed_hiding);

        $menu_position_container = new QodeContainer("menu_position_container", "header_bottom_appearance", "", array("stick menu_bottom", "stick_with_left_right_menu", "fixed_hiding", "fixed fixed_minimal", "fixed_top_header"));
        $panel5->addChild("menu_position_container", $menu_position_container);
        $menu_position = new QodeField("select", "menu_position", "", "Menu Position", "Choose a menu position", array(
            "-1" => "Right",
            "center" => "Center",
            "left" => "Left"
        ));
        $menu_position_container->addChild("menu_position", $menu_position);
        $center_logo_image = new QodeField("yesno", "center_logo_image", "no", "Center Logo", "Enabling this option will center logo and position it above menu", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_center_logo_image_container"));
        $menu_position_container->addChild("center_logo_image", $center_logo_image);

        $center_logo_image_container = new QodeContainer("center_logo_image_container", "center_logo_image", "no");
        $menu_position_container->addChild("center_logo_image_container", $center_logo_image_container);

        $search_left_sidearea_right_regular = new QodeField("yesno", "search_left_sidearea_right_regular", "no", "Place Search and Side Area Icons to Separate Sides of Header ", "Enabling this option will set search icon to left side of header and side area icon to right side of header");
        $center_logo_image_container->addChild("search_left_sidearea_right_regular", $search_left_sidearea_right_regular);

        $center_logo_image_animate = new QodeField("yesno", "center_logo_image_animate", "no", "Animate Centered Logo", "Enabling this option will animate logo upon loading");
        $center_logo_image_container->addChild("center_logo_image_animate", $center_logo_image_animate);

        $disable_text_shadow_for_sticky_container = new QodeContainer("disable_text_shadow_for_sticky_container", "header_bottom_appearance", "", array("fixed_top_header", "regular"));
        $panel5->addChild("disable_text_shadow_for_sticky_container", $disable_text_shadow_for_sticky_container);

        $disable_text_shadow_for_sticky = new QodeField("yesno", "disable_text_shadow_for_sticky", "no", "Disable Shadow For Scrolled Header", "Enabling this option will disable shadow for scrolled/sticky header");
        $disable_text_shadow_for_sticky_container->addChild("disable_text_shadow_for_sticky", $disable_text_shadow_for_sticky);

        $header_height_container = new QodeContainerNoStyle("header_height_container", "header_bottom_appearance", "", array("fixed_top_header"));
        $panel5->addChild("header_height_container", $header_height_container);
        $group1 = new QodeGroup("Header Height", "Enter header height in pixels");
        $header_height_container->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $header_height = new QodeField("textsimple", "header_height", "", "Initial (px)", "Initial header (px)");
        $row1->addChild("header_height", $header_height);
        $header_height_scroll = new QodeField("textsimple", "header_height_scroll", "", "After Scroll (px)", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed_hiding"));
        $row1->addChild("header_height_scroll", $header_height_scroll);
        $header_height_sticky = new QodeField("textsimple", "header_height_sticky", "", "After Scroll (px)", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "fixed", "fixed_hiding", "fixed fixed_minimal", "fixed_top_header"));
        $row1->addChild("header_height_sticky", $header_height_sticky);
        $header_height_scroll_hidden = new QodeField("textsimple", "header_height_scroll_hidden", "", "After Scroll (px)", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "fixed", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed fixed_minimal", "fixed_top_header"));
        $row1->addChild("header_height_scroll_hidden", $header_height_scroll_hidden);

        $header_fixed_top_logo_background_container = new QodeContainer("header_fixed_top_logo_background_container", "header_bottom_appearance", "", array("regular", "fixed", "fixed fixed_minimal", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed_hiding"));
        $panel5->addChild("header_fixed_top_logo_background_container", $header_fixed_top_logo_background_container);

        $header_fixed_top_logo_background = new QodeField("image", "header_fixed_top_logo_background", "", "Header Bottom Background Image", "Set background image for header bottom");
        $header_fixed_top_logo_background_container->addChild("header_fixed_top_logo_background", $header_fixed_top_logo_background);

        $header_style = new QodeField("select", "header_style", "", "Header Skin", "Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style", array(
            "-1" => "",
            "light" => "Light",
            "dark" => "Dark"
        ));
        $panel5->addChild("header_style", $header_style);

        $enable_header_style_on_scroll = new QodeField("yesno", "enable_header_style_on_scroll", "no", "Enable Header Style on Scroll", "Enabling this option, header will change style depending on row settings for dark/light style");
        $panel5->addChild("enable_header_style_on_scroll", $enable_header_style_on_scroll);

        $group2 = new QodeGroup("Header Background Color", "Choose a background color for header area");
        $panel5->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $header_background_color = new QodeField("colorsimple", "header_background_color", "", "Initial", "This is some description");
        $row1->addChild("header_background_color", $header_background_color);
        $header_background_color_scroll = new QodeField("colorsimple", "header_background_color_scroll", "", "After Scroll", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed_top_header"));
        $row1->addChild("header_background_color_scroll", $header_background_color_scroll);
        $header_background_color_sticky = new QodeField("colorsimple", "header_background_color_sticky", "", "After Scroll", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "fixed", "fixed_hiding", "fixed fixed_minimal", "fixed_top_header"));
        $row1->addChild("header_background_color_sticky", $header_background_color_sticky);
        $group3 = new QodeGroup("Header Transparency", "Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)");
        $panel5->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $header_background_transparency_initial = new QodeField("textsimple", "header_background_transparency_initial", "", "Initial", "This is some description");
        $row1->addChild("header_background_transparency_initial", $header_background_transparency_initial);
        $header_background_transparency_scroll = new QodeField("textsimple", "header_background_transparency_scroll", "", "After Scroll", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "stick", "stick menu_bottom", "stick_with_left_right_menu", "fixed_top_header"));
        $row1->addChild("header_background_transparency_scroll", $header_background_transparency_scroll);
        $header_background_transparency_sticky = new QodeField("textsimple", "header_background_transparency_sticky", "", "After Scroll", "This is some description", array(), array(), "header_bottom_appearance", array("regular", "fixed", "fixed_hiding", "fixed fixed_minimal", "fixed_top_header"));
        $row1->addChild("header_background_transparency_sticky", $header_background_transparency_sticky);
        $header_bottom_border_color = new QodeField("color", "header_bottom_border_color", "", "Header Bottom Border Color", "Choose a color for the header bottom border. Note: If color has not been chosen, border bottom will not be displayed");
        $panel5->addChild("header_bottom_border_color", $header_bottom_border_color);
        $header_botom_border_transparency = new QodeField("text", "header_botom_border_transparency", "", "Header Bottom Border Transparency", "Choose a transparency for the header border color (0 = fully transparent, 1 = opaque). Note: Works only if Header Bottom Border Color is filled", array(), array("col_width" => 3));
        $panel5->addChild("header_botom_border_transparency", $header_botom_border_transparency);
        $header_botom_border_in_grid = new QodeField("yesno", "header_botom_border_in_grid", "no", "Enable Header Bottom Border in Grid", "Enabling this option will set header border bottom width in grid");
        $panel5->addChild("header_botom_border_in_grid", $header_botom_border_in_grid);


        $panel10 = new QodePanel("Menus", "enable_menus_panel", "vertical_area", "yes");
        $headerandfooterPage->addChild("panel10", $panel10);

        $menu_background_color_container = new QodeContainer("menu_background_color_container", "header_bottom_appearance", "", array("regular", "fixed", "stick", "stick_with_left_right_menu", "fixed fixed_minimal", "fixed_top_header"));
        $panel10->addChild("menu_background_color_container", $menu_background_color_container);

        $menu_background_color = new QodeField("color", "menu_background_color", "", "Background Color of 1st Level Menu", "Choose a color for the menu background (works only for Fixed Advanced header)");
        $menu_background_color_container->addChild("menu_background_color", $menu_background_color);

        $dropdown_separator_beetwen_items = new QodeField("yesno", "dropdown_separator_beetwen_items", "no", "Dropdown Menu Item Separators", "Enabling this option will display horizontal separators between menu items in classic dropdown menu (in case of wide menu, vertical separators are always enabled)");
        $panel10->addChild("dropdown_separator_beetwen_items", $dropdown_separator_beetwen_items);
        $dropdown_border_around = new QodeField("yesno", "dropdown_border_around", "no", "Border Around Dropdown Menus", "Enabling this option will display border around dropdown menus");
        $panel10->addChild("dropdown_border_around", $dropdown_border_around);
        $header_separator_color = new QodeField("color", "header_separator_color", "", "Dropdown Menu Item Separator and Border Color", "Choose a color for horizontal (classic dropdown) or vertical (wide dropdown) separators between dropdown menu items. This option also applies to border around dropdown menus");
        $panel10->addChild("header_separator_color", $header_separator_color);
        $group4 = new QodeGroup("Dropdown Menu Background", "Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)");
        $panel10->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $dropdown_background_color = new QodeField("colorsimple", "dropdown_background_color", "", "Background Color", "This is some description");
        $row1->addChild("dropdown_background_color", $dropdown_background_color);
        $dropdown_background_transparency = new QodeField("textsimple", "dropdown_background_transparency", "", "Transparency", "This is some description");
        $row1->addChild("dropdown_background_transparency", $dropdown_background_transparency);

        $enable_wide_manu_background = new QodeField("yesno", "enable_wide_manu_background", "no", "Enable Full Width Background for Wide Dropdown Type", "Enabling this option will show full width background  for wide dropdown type");
        $panel10->addChild("enable_wide_manu_background", $enable_wide_manu_background);

        $panel3 = new QodePanel("Qode Search", "enable_search_panel", "vertical_area", "yes");
        $headerandfooterPage->addChild("panel3", $panel3);
        $enable_search = new QodeField("yesno", "enable_search", "no", "Enable Qode Search Bar", "This option enables Qode Search functionality (search icon will appear next to main navigation)
	", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_search_container"));
        $panel3->addChild("enable_search", $enable_search);

        $enable_search_container = new QodeContainer("enable_search_container", "enable_search", "no");
        $panel3->addChild("enable_search_container", $enable_search_container);

        $search_type = new QodeField("select", "search_type", "search_slides_from_window_top", "Qode Search Type", "Choose a type of Qode search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)", array(
            "search_slides_from_window_top" => "Slide From Window Top",
            "search_slides_from_header_bottom" => "Slide From Header Bottom",
            "search_covers_header" => "Search Covers Header",
            "fullscreen_search" => "Fullscreen Search"
        ),
            array("dependence" => true,
                "hide" => array(
                    "search_slides_from_window_top" => "#qodef_search_animation_container,#qodef_search_cover_header_container,#qodef_search_height_container",
                    "search_covers_header" => "#qodef_search_height_container,#qodef_search_animation_container",
                    "fullscreen_search" => "#qodef_search_height_container,#qodef_search_cover_header_container",
                    "search_slides_from_header_bottom" => "#qodef_search_animation_container,#qodef_search_cover_header_container"
                ),
                "show" => array(
                    "search_slides_from_window_top" => "",
                    "search_slides_from_header_bottom" => "#qodef_search_height_container",
                    "fullscreen_search" => "#qodef_search_animation_container",
                    "search_covers_header" => "#qodef_search_cover_header_container"
                )
            ));
        $enable_search_container->addChild("search_type", $search_type);


        $search_height_container = new QodeContainer("search_height_container", "search_type", "", array("search_covers_header", "fullscreen_search", "search_slides_from_window_top"));
        $enable_search_container->addChild("search_height_container", $search_height_container);

        $search_height = new QodeField("text", "search_height", "", "Search bar height", "Set search bar height (in pixels)", array(), array("col_width" => 3));
        $search_height_container->addChild("search_height", $search_height);

        $search_animation_container = new QodeContainer("search_animation_container", "search_type", "", array("search_covers_header", "search_slides_from_header_bottom", "search_slides_from_window_top"));
        $enable_search_container->addChild("search_animation_container", $search_animation_container);

        $search_animation = new QodeField("select", "search_animation", "fade", "Fullscreen Search Overlay Animation", "Choose animation for fullscreen search overlay", array(
            "fade" => "Fade",
            "from_circle" => "Circle appear"
        ));
        $search_animation_container->addChild("search_animation", $search_animation);

        $fullscreen_search_icon_color = new QodeField('color', 'fullscreen_search_icon_color', '', 'Fullscreen Search Icon Color', 'Choose color for search icon that appears after input field');
        $search_animation_container->addChild('fullscreen_search_icon_color', $fullscreen_search_icon_color);

        $search_cover_header_container = new QodeContainer("search_cover_header_container", "search_type", "", array("fullscreen_search", "search_slides_from_header_bottom", "search_slides_from_window_top"));
        $enable_search_container->addChild("search_cover_header_container", $search_cover_header_container);

        $search_cover_only_bottom_yesno = new QodeField("yesno", "search_cover_only_bottom_yesno", "no", "Cover Only Header Bottom", "Enable this option to make search cover only header bottom");
        $search_cover_header_container->addChild("search_cover_only_bottom_yesno", $search_cover_only_bottom_yesno);

        $search_icon_pack = new QodeField('iconpack', 'search_icon_pack', 'font_awesome', 'Icon Pack', 'Choose icon pack for search icon');
        $enable_search_container->addChild('search_icon_pack', $search_icon_pack);

        $search_background_color = new QodeField("color", "search_background_color", "", "Search Background Color", "Choose a background color for Qode search bar");
        $enable_search_container->addChild("search_background_color", $search_background_color);

        $group1 = new QodeGroup("Search Input Text", "Define Style for Search input text");
        $enable_search_container->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $search_text_color = new QodeField("colorsimple", "search_text_color", "", "Text Color", "Choose a text color for Qode search bar");
        $row1->addChild("search_text_color", $search_text_color);
        $search_text_disabled_color = new QodeField("colorsimple", "search_text_disabled_color", "", "Disabled Text Color", "This is some description");
        $row1->addChild("search_text_disabled_color", $search_text_disabled_color);
        $search_text_fontsize = new QodeField("textsimple", "search_text_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("search_text_fontsize", $search_text_fontsize);
        $search_text_texttransform = new QodeField("selectblanksimple", "search_text_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("search_text_texttransform", $search_text_texttransform);

        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $search_text_google_fonts = new QodeField("fontsimple", "search_text_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("search_text_google_fonts", $search_text_google_fonts);
        $search_text_fontstyle = new QodeField("selectblanksimple", "search_text_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("search_text_fontstyle", $search_text_fontstyle);
        $search_text_fontweight = new QodeField("selectblanksimple", "search_text_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("search_text_fontweight", $search_text_fontweight);
        $search_text_letterspacing = new QodeField("textsimple", "search_text_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("search_text_letterspacing", $search_text_letterspacing);

        $group5 = new QodeGroup("Search Label Text", "Define Style for Search label text");
        $enable_search_container->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $search_label_text_color = new QodeField("colorsimple", "search_label_text_color", "", "Text Color", "This is some description");
        $row1->addChild("search_label_text_color", $search_label_text_color);
        $search_label_text_fontsize = new QodeField("textsimple", "search_label_text_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("search_label_text_fontsize", $search_label_text_fontsize);
        $search_label_text_texttransform = new QodeField("selectblanksimple", "search_label_text_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("search_label_text_texttransform", $search_label_text_texttransform);

        $row2 = new QodeRow(true);
        $group5->addChild("row2", $row2);
        $search_label_text_google_fonts = new QodeField("fontsimple", "search_label_text_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("search_label_text_google_fonts", $search_label_text_google_fonts);
        $search_label_text_fontstyle = new QodeField("selectblanksimple", "search_label_text_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("search_label_text_fontstyle", $search_label_text_fontstyle);
        $search_label_text_fontweight = new QodeField("selectblanksimple", "search_label_text_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("search_label_text_fontweight", $search_label_text_fontweight);
        $search_label_text_letterspacing = new QodeField("textsimple", "search_label_text_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("search_label_text_letterspacing", $search_label_text_letterspacing);

        $group7 = new QodeGroup("Initial Search Icon", "Define size for Search icon in header");
        $enable_search_container->addChild("group7", $group7);
        $row1 = new QodeRow();
        $group7->addChild("row1", $row1);
        $header_search_icon_size = new QodeField("textsimple", "header_search_icon_size", "", "Icon Size", "Set size for icon (ix pixels)", array(), array("col_width" => 3));
        $row1->addChild("header_search_icon_size", $header_search_icon_size);

        $group2 = new QodeGroup("Search Icons", "Define Style for icons in Search bar");
        $enable_search_container->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $search_icon_color = new QodeField("colorsimple", "search_icon_color", "", "Color", "Choose icon color for Qode search bar");
        $row1->addChild("search_icon_color", $search_icon_color);
        $search_icon_hover_color = new QodeField("colorsimple", "search_icon_hover_color", "", "Hover Color", "Choose icon hover color for Qode search bar");
        $row1->addChild("search_icon_hover_color", $search_icon_hover_color);
        $search_icon_disabled_color = new QodeField("colorsimple", "search_icon_disabled_color", "", "Disabled Color", "Choose icon disabled color for Qode search bar");
        $row1->addChild("search_icon_disabled_color", $search_icon_disabled_color);
        $search_icon_size = new QodeField("textsimple", "search_icon_size", "", "Size", "Set size for icon (ix pixels)", array(), array("col_width" => 3));
        $row1->addChild("search_icon_size", $search_icon_size);

        $group4 = new QodeGroup("Search Close Icon", "Define style for Search close icon");
        $enable_search_container->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $search_close_color = new QodeField("colorsimple", "search_close_color", "", "Color", "Choose color for search close icon");
        $row1->addChild("search_close_color", $search_close_color);
        $search_close_hover_color = new QodeField("colorsimple", "search_close_hover_color", "", "Hover Color", "Choose hover color for search close icon");
        $row1->addChild("search_close_hover_color", $search_close_hover_color);
        $search_close_size = new QodeField("textsimple", "search_close_size", "", "Size", "Choose size for search close icon");
        $row1->addChild("search_close_size", $search_close_size);

        $group3 = new QodeGroup("Search Bottom Border", "Define style for Search text input bottom border (for Fullscreen search type)");
        $enable_search_container->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $search_border_color = new QodeField("colorsimple", "search_border_color", "", "Border Color", "Choose border color for search text input");
        $row1->addChild("search_border_color", $search_border_color);
        $search_border_focus_color = new QodeField("colorsimple", "search_border_focus_color", "", "Border Focus Color", "Choose focus color for search text input");
        $row1->addChild("search_border_focus_color", $search_border_focus_color);


        $panel11 = new QodePanel("Side Area", "enable_side_area_panel", "vertical_area", "yes");
        $headerandfooterPage->addChild("panel11", $panel11);

        $enable_side_area = new QodeField("yesno", "enable_side_area", "yes", "Enable Side Area", "This option enables a side area to be opened from main menu navigation", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_side_area_container"));
        $panel11->addChild("enable_side_area", $enable_side_area);

        $enable_side_area_container = new QodeContainer("enable_side_area_container", "enable_side_area", "no");
        $panel11->addChild("enable_side_area_container", $enable_side_area_container);


        $side_area_type = new QodeField("select", "side_area_type", "side_area_uncovered_from_content", "Side Area Type", "Choose a type of Side Area", array(
            "side_area_uncovered_from_content" => "Uncovered from Content",
            "side_menu_slide_from_right" => "Slide from Right Over Content",
            "side_menu_slide_with_content" => "Slide from Right With Content"
        ),
            array("dependence" => true,
                "hide" => array(
                    "side_area_uncovered_from_content" => "#qodef_side_area_width_container,#qodef_side_area_slide_with_content_container",
                    "side_menu_slide_from_right" => "#qodef_side_area_slide_with_content_container",
                    "side_menu_slide_with_content" => "#qodef_side_area_width_container"

                ),
                "show" => array(
                    "side_area_uncovered_from_content" => "",
                    "side_menu_slide_from_right" => "#qodef_side_area_width_container",
                    "side_menu_slide_with_content" => "#qodef_side_area_slide_with_content_container"
                )
            ));

        $enable_side_area_container->addChild("side_area_type", $side_area_type);

        //init icon pack hide and show array. It will be populated dinamically from collections array
        $side_area_icon_pack_hide_array = array();
        $side_area_icon_pack_show_array = array();

        //do we have some collection added in collections array?
        if (is_array(qode_icon_collections()->iconCollections) && count(qode_icon_collections()->iconCollections)) {
            //get collections params array. It will contain values of 'param' property for each collection
            $side_area_icon_collections_params = qode_icon_collections()->getIconCollectionsParams();

            //foreach collection generate hide and show array
            foreach (qode_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
                $side_area_icon_pack_hide_array[$dep_collection_key] = '';

                //we need to include only current collection in show string as it is the only one that needs to show
                $side_area_icon_pack_show_array[$dep_collection_key] = '#qodef_side_area_icon_' . $dep_collection_object->param . '_container';

                //for all collections param generate hide string
                foreach ($side_area_icon_collections_params as $side_area_icon_collections_param) {
                    //we don't need to include current one, because it needs to be shown, not hidden
                    if ($side_area_icon_collections_param !== $dep_collection_object->param) {
                        $side_area_icon_pack_hide_array[$dep_collection_key] .= '#qodef_side_area_icon_' . $side_area_icon_collections_param . '_container,';
                    }
                }

                //remove remaining ',' character
                $side_area_icon_pack_hide_array[$dep_collection_key] = rtrim($side_area_icon_pack_hide_array[$dep_collection_key], ',');
            }

        }

        $side_area_button_icon_pack = new QodeField(
            "select",
            "side_area_button_icon_pack",
            "font_awesome",
            "Side Area Button Icon Pack",
            "Choose icon pack for side area button",
            qode_icon_collections()->getIconCollections(),
            array(
                "dependence" => true,
                "hide" => $side_area_icon_pack_hide_array,
                "show" => $side_area_icon_pack_show_array
            ));

        $enable_side_area_container->addChild("side_area_button_icon_pack", $side_area_button_icon_pack);

        if (is_array(qode_icon_collections()->iconCollections) && count(qode_icon_collections()->iconCollections)) {
            //foreach icon collection we need to generate separate container that will have dependency set
            //it will have one field inside with icons dropdown
            foreach (qode_icon_collections()->iconCollections as $collection_key => $collection_object) {
                $icons_array = $collection_object->getIconsArray();

                //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
                $icon_collections_keys = qode_icon_collections()->getIconCollectionsKeys();

                //unset current one, because it doesn't have to be included in dependency that hides icon container
                unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

                $side_area_icon_hide_values = $icon_collections_keys;
                $side_area_icon_container = new QodeContainer("side_area_icon_" . $collection_object->param . "_container", "side_area_button_icon_pack", "", $side_area_icon_hide_values);
                $side_area_button_icon = new QodeField("select", "side_area_icon_" . $collection_object->param, "fa-bars", "Side Area Icon", "Choose Side Area Icon", $icons_array, array("col_width" => 3));
                $side_area_icon_container->addChild("side_area_icon_" . $collection_object->param, $side_area_button_icon);

                $enable_side_area_container->addChild("side_area_icon_" . $collection_object->param . "_container", $side_area_icon_container);
            }

        }

        $side_area_width_container = new QodeContainer("side_area_width_container", "side_area_type", "", array("side_menu_slide_with_content", "side_area_uncovered_from_content"));
        $enable_side_area_container->addChild("side_area_width_container", $side_area_width_container);

        $side_area_width = new QodeField("text", "side_area_width", "", "Side Area Width", "Enter a width for Side Area (in percentages, enter more than 30)", array(), array("col_width" => 3));
        $side_area_width_container->addChild("side_area_width", $side_area_width);

        $side_area_content_overlay_color = new QodeField("color", "side_area_content_overlay_color", "", "Content Overlay Background Color", "Choose a background color for a content overlay", array(), array("col_width" => 3));
        $side_area_width_container->addChild("side_area_content_overlay_color", $side_area_content_overlay_color);

        $side_area_content_overlay_opacity = new QodeField("text", "side_area_content_overlay_opacity", "", "Content Overlay Background Transparency", "Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)", array(), array("col_width" => 3));
        $side_area_width_container->addChild("side_area_content_overlay_opacity", $side_area_content_overlay_opacity);

        $side_area_slide_with_content_container = new QodeContainer("side_area_slide_with_content_container", "side_area_type", "", array("side_menu_slide_from_right", "side_area_uncovered_from_content"));
        $enable_side_area_container->addChild("side_area_slide_with_content_container", $side_area_slide_with_content_container);

        $side_area_slide_with_content_width = new QodeField("select", "side_area_slide_with_content_width", "width_470", "Side Area Width", "Choose width for Side Area", array(
            "width_270" => "270px",
            "width_370" => "370px",
            "width_470" => "470px"
        ));
        $side_area_slide_with_content_container->addChild("side_area_slide_with_content_width", $side_area_slide_with_content_width);

        $side_area_title = new QodeField("text", "side_area_title", "", "Side Area Title", "Enter a title to appear in Side Area");
        $enable_side_area_container->addChild("side_area_title", $side_area_title);

        $side_area_background_color = new QodeField("color", "side_area_background_color", "", "Background Color", "Choose a background color for Side Area");
        $enable_side_area_container->addChild("side_area_background_color", $side_area_background_color);

        $group5 = new QodeGroup("Padding", "Define padding for Side Area");
        $enable_side_area_container->addChild("group5", $group5);
        $row1 = new QodeRow(true);
        $group5->addChild("row1", $row1);
        $side_area_padding_top = new QodeField("textsimple", "side_area_padding_top", "", "Top Padding (px)", "This is some description");
        $row1->addChild("side_area_padding_top", $side_area_padding_top);
        $side_area_padding_right = new QodeField("textsimple", "side_area_padding_right", "", "Right Padding (px)", "This is some description");
        $row1->addChild("side_area_padding_right", $side_area_padding_right);
        $side_area_padding_bottom = new QodeField("textsimple", "side_area_padding_bottom", "", "Bottom Padding (px)", "This is some description");
        $row1->addChild("side_area_padding_bottom", $side_area_padding_bottom);
        $side_area_padding_left = new QodeField("textsimple", "side_area_padding_left", "", "Left Padding (px)", "This is some description");
        $row1->addChild("side_area_padding_left", $side_area_padding_left);

        $side_area_alignment = new QodeField("selectblank", "side_area_alignment", "", "Side Area Alignment", "Choose alignment for Side Area content", array(
            "left" => "Left",
            "center" => "Center",
            "right" => "Right"

        ));
        $enable_side_area_container->addChild("side_area_alignment", $side_area_alignment);

        $group1 = new QodeGroup("Text", "Define styles for Side Area text");
        $enable_side_area_container->addChild("group1", $group1);

        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);

        $side_area_text_color = new QodeField("colorsimple", "side_area_text_color", "", "Text Color", "This is some description");
        $row1->addChild("side_area_text_color", $side_area_text_color);

        $side_area_text_hover_color = new QodeField("colorsimple", "side_area_text_hover_color", "", "Text Hover Color", "This is some description");
        $row1->addChild("side_area_text_hover_color", $side_area_text_hover_color);

        $side_area_text_lineheight = new QodeField("textsimple", "side_area_text_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("side_area_text_lineheight", $side_area_text_lineheight);

        $side_area_text_texttransform = new QodeField("selectblanksimple", "side_area_text_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("side_area_text_texttransform", $side_area_text_texttransform);

        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);

        $side_area_text_font_size = new QodeField("textsimple", "side_area_text_font_size", "", "Font Size (px)", "This is some description");
        $row2->addChild("side_area_text_font_size", $side_area_text_font_size);

        $side_area_text_letter_spacing = new QodeField("textsimple", "side_area_text_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("side_area_text_letter_spacing", $side_area_text_letter_spacing);

        $side_area_text_font_weight = new QodeField("selectblanksimple", "side_area_text_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("side_area_text_font_weight", $side_area_text_font_weight);


        $group2 = new QodeGroup("Title", "Define styles for Side Area title");
        $enable_side_area_container->addChild("group2", $group2);

        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);

        $side_area_title_color = new QodeField("colorsimple", "side_area_title_color", "", "Text Color", "This is some description");
        $row1->addChild("side_area_title_color", $side_area_title_color);

        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);

        $side_area_title_font_size = new QodeField("textsimple", "side_area_title_font_size", "", "Font Size (px)", "This is some description");
        $row2->addChild("side_area_title_font_size", $side_area_title_font_size);

        $side_area_title_letter_spacing = new QodeField("textsimple", "side_area_title_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("side_area_title_letter_spacing", $side_area_title_letter_spacing);

        $side_area_title_font_weight = new QodeField("selectblanksimple", "side_area_title_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("side_area_title_font_weight", $side_area_title_font_weight);


        $side_area_close_icon_style = new QodeField("select", "side_area_close_icon_style", "", "Close Icon Style", "Choose a style for close ('X') button", array("-1" => "",
            "light" => "Light",
            "dark" => "Dark"
        ));
        $enable_side_area_container->addChild("side_area_close_icon_style", $side_area_close_icon_style);


        $panel12 = new QodePanel("Fullscreen Menu", "enable_popup_menu_panel", "vertical_area", "yes");
        $headerandfooterPage->addChild("panel12", $panel12);
        $enable_popup_menu = new QodeField("yesno", "enable_popup_menu", "no", "Enable Fullscreen Menu", "This option enables a fullscreen menu to be opened from main menu navigation", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_popup_menu_container"));
        $panel12->addChild("enable_popup_menu", $enable_popup_menu);
        $enable_popup_menu_container = new QodeContainer("enable_popup_menu_container", "enable_popup_menu", "no");
        $panel12->addChild("enable_popup_menu_container", $enable_popup_menu_container);

        $popup_menu_animation_style = new QodeField("select", "popup_menu_animation_style", "", "Fullscreen Menu Overlay Animation", "Choose animation type for fullscreen menu overlay", array(
            '' => '',
            'popup_menu_push_text_right' => 'Fade Push Text Right',
            'popup_menu_push_text_top' => 'Fade Push Text Top',
            'popup_menu_text_scaledown' => 'Fade Text Scaledown'
        ));
        $enable_popup_menu_container->addChild("popup_menu_animation_style", $popup_menu_animation_style);

        $logo_image_popup = new QodeField("image", "logo_image_popup", "", "Logo image for Fullscreen menu", "Choose a logo for Fullscreen Menu");
        $enable_popup_menu_container->addChild("logo_image_popup", $logo_image_popup);

        $font_icon_pack_icon_popup = new QodeField("select", "font_icon_pack_icon_popup", "", "Menu Icon Style", "Choose a menu icon style for Fullscreen Menu", array(
            "" => "Default",
            "font_awesome" => "Font Awesome",
            "font_elegant" => "Font Elegant"

        ));
        $enable_popup_menu_container->addChild("font_icon_pack_icon_popup", $font_icon_pack_icon_popup);

        $group1 = new QodeGroup("1st Level Style", "Define styles for 1st level in Fullscreen Menu");
        $enable_popup_menu_container->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $popup_menu_color = new QodeField("colorsimple", "popup_menu_color", "", "Text Color", "This is some description");
        $row1->addChild("popup_menu_color", $popup_menu_color);
        $popup_menu_hover_color = new QodeField("colorsimple", "popup_menu_hover_color", "", "Text Hover Color", "This is some description");
        $row1->addChild("popup_menu_hover_color", $popup_menu_hover_color);
        $popup_menu_hover_background_color = new QodeField("colorsimple", "popup_menu_hover_background_color", "", "Background Hover Color", "This is some description");
        $row1->addChild("popup_menu_hover_background_color", $popup_menu_hover_background_color);

        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $popup_menu_google_fonts = new QodeField("fontsimple", "popup_menu_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("popup_menu_google_fonts", $popup_menu_google_fonts);
        $popup_menu_fontsize = new QodeField("textsimple", "popup_menu_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("popup_menu_fontsize", $popup_menu_fontsize);
        $popup_menu_lineheight = new QodeField("textsimple", "popup_menu_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("popup_menu_lineheight", $popup_menu_lineheight);
        $row3 = new QodeRow(true);
        $group1->addChild("row3", $row3);
        $popup_menu_fontstyle = new QodeField("selectblanksimple", "popup_menu_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("popup_menu_fontstyle", $popup_menu_fontstyle);
        $popup_menu_fontweight = new QodeField("selectblanksimple", "popup_menu_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("popup_menu_fontweight", $popup_menu_fontweight);
        $popup_menu_letterspacing = new QodeField("textsimple", "popup_menu_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("popup_menu_letterspacing", $popup_menu_letterspacing);

        $group2 = new QodeGroup("2nd Level Style", "Define styles for 1st level in Fullscreen Menu");
        $enable_popup_menu_container->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $popup_menu_color_2nd = new QodeField("colorsimple", "popup_menu_color_2nd", "", "Text Color", "This is some description");
        $row1->addChild("popup_menu_color_2nd", $popup_menu_color_2nd);
        $popup_menu_hover_color_2nd = new QodeField("colorsimple", "popup_menu_hover_color_2nd", "", "Text Hover Color", "This is some description");
        $row1->addChild("popup_menu_hover_color_2nd", $popup_menu_hover_color_2nd);
        $popup_menu_hover_background_color_2nd = new QodeField("colorsimple", "popup_menu_hover_background_color_2nd", "", "Background Hover Color", "This is some description");
        $row1->addChild("popup_menu_hover_background_color_2nd", $popup_menu_hover_background_color_2nd);

        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $popup_menu_google_fonts_2nd = new QodeField("fontsimple", "popup_menu_google_fonts_2nd", "-1", "Font Family", "This is some description");
        $row2->addChild("popup_menu_google_fonts_2nd", $popup_menu_google_fonts_2nd);
        $popup_menu_fontsize_2nd = new QodeField("textsimple", "popup_menu_fontsize_2nd", "", "Font Size (px)", "This is some description");
        $row2->addChild("popup_menu_fontsize_2nd", $popup_menu_fontsize_2nd);
        $popup_menu_lineheight_2nd = new QodeField("textsimple", "popup_menu_lineheight_2nd", "", "Line Height (px)", "This is some description");
        $row2->addChild("popup_menu_lineheight_2nd", $popup_menu_lineheight_2nd);
        $row3 = new QodeRow(true);
        $group2->addChild("row3", $row3);
        $popup_menu_fontstyle_2nd = new QodeField("selectblanksimple", "popup_menu_fontstyle_2nd", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("popup_menu_fontstyle_2nd", $popup_menu_fontstyle_2nd);
        $popup_menu_fontweight_2nd = new QodeField("selectblanksimple", "popup_menu_fontweight_2nd", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("popup_menu_fontweight_2nd", $popup_menu_fontweight_2nd);
        $popup_menu_letterspacing_2nd = new QodeField("textsimple", "popup_menu_letterspacing_2nd", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("popup_menu_letterspacing_2nd", $popup_menu_letterspacing_2nd);

        $group3 = new QodeGroup("Background", "Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)");
        $enable_popup_menu_container->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $popup_menu_background_color = new QodeField("colorsimple", "popup_menu_background_color", "", "Color", "This is some description");
        $row1->addChild("popup_menu_background_color", $popup_menu_background_color);
        $popup_menu_background_transparency = new QodeField("textsimple", "popup_menu_background_transparency", "", "Transparency", "This is some description");
        $row1->addChild("popup_menu_background_transparency", $popup_menu_background_transparency);

        $group4 = new QodeGroup("Close Button Color", "Select a color for close button");
        $enable_popup_menu_container->addChild("group4", $group4);
            $row2 = new QodeRow();
            $group4->addChild("row2", $row2);
                $popup_menu_close_button_color = new QodeField("colorsimple", "popup_menu_close_button_color", "", "Color", "This is some description");
                $row2->addChild("popup_menu_close_button_color", $popup_menu_close_button_color);


        $panel2 = new QodePanel("Header Top", "header_top_panel", "vertical_area", "yes");
        $headerandfooterPage->addChild("panel2", $panel2);
        $header_top_area = new QodeField("yesno", "header_top_area", "no", "Show Header Top Area", "Enabling this option will show Header Top area (this setting applies to Header Left and Header Right widgets)
        ", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_header_top_area_container"));
        $panel2->addChild("header_top_area", $header_top_area);
        $header_top_area_container = new QodeContainer("header_top_area_container", "header_top_area", "no");
        $panel2->addChild("header_top_area_container", $header_top_area_container);

        $header_top_scroll_container = new QodeContainer("header_top_scroll_container", "header_bottom_appearance", "", array("fixed_top_header"));
        $header_top_area_container->addChild("header_top_scroll_container", $header_top_scroll_container);

        $header_top_area_scroll = new QodeField("yesno", "header_top_area_scroll", "no", "Hide on Scroll", "Enabling this option will hide Header Top on scroll (if fixed header types are chosen)");
        $header_top_scroll_container->addChild("header_top_area_scroll", $header_top_area_scroll);

        $hide_top_bar_on_mobile = new QodeField("yesno", "hide_top_bar_on_mobile", "no", "Hide Top Bar on Mobile Header", "Enabling this option you will hide top header area when mobile header is active");
        $header_top_scroll_container->addChild("hide_top_bar_on_mobile", $hide_top_bar_on_mobile);

        $header_top_height_container = new QodeContainer("header_top_height_container", "header_bottom_appearance", "", array("regular", "fixed", "fixed_hiding", "fixed fixed_minimal", "stick", "stick menu_bottom", "stick_with_left_right_menu"));
        $header_top_area_container->addChild("header_top_height_container", $header_top_height_container);

        $header_top_height = new QodeField("text", "header_top_height", "", "Header Top Height", "Enter height for header top", array(), array("col_width" => 3));
        $header_top_height_container->addChild("header_top_height", $header_top_height);

        $header_top_background_color = new QodeField("color", "header_top_background_color", "", "Background color", "Choose a background color for Header Top area");
        $header_top_area_container->addChild("header_top_background_color", $header_top_background_color);

        $group5 = new QodeGroup("Bottom Border", "Define bottom border style for Header Top");
        $header_top_area_container->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $top_header_border_color = new QodeField("colorsimple", "top_header_border_color", "", "Bottom Border Color", "This is some description");
        $row1->addChild("top_header_border_color", $top_header_border_color);
        $top_header_border_weight = new QodeField("textsimple", "top_header_border_weight", "", "Bottom Border Width (px)", "This is some description");
        $row1->addChild("top_header_border_weight", $top_header_border_weight);

        $top_header_area_padding = new QodeField("text", "top_header_area_padding", "", "Padding (%)", "Choose a left/right padding for Header Top area");
        $header_top_area_container->addChild("top_header_area_padding", $top_header_area_padding);


        $panel7 = new QodePanel("Left Menu Area", "vertical_areas_panel", "vertical_area", "no");
        $headerandfooterPage->addChild("panel7", $panel7);

        $vertical_area_type = new QodeField("select", "vertical_area_type", "", "Left Menu Area Type", "Specify menu type", array(
            "" => "Always Opened (Default)",
            "hidden" => "Initially Hidden"
        ),
            array("dependence" => true,
                "hide" => array(
                    "" => "#qodef_vertical_area_hidden_button_color_container, #qodef_vertical_area_width_container",
                    "hidden" => "#qodef_vertical_area_transparency_container"),
                "show" => array(
                    "" => "#qodef_vertical_area_transparency_container",
                    "hidden" => "#qodef_vertical_area_hidden_button_color_container, #qodef_vertical_area_width_container"
                )
            ));
        $panel7->addChild("vertical_area_type", $vertical_area_type);

        $vertical_area_hidden_button_color_container = new QodeContainer("vertical_area_hidden_button_color_container", "vertical_area_type", "");
        $panel7->addChild("vertical_area_hidden_button_color_container", $vertical_area_hidden_button_color_container);

        $vertical_area_hidden_button_color = new QodeField("color", "vertical_area_hidden_button_color", "", "Button Color", "Choose a color for button that opens/closes Hidden Left Menu Area");
        $vertical_area_hidden_button_color_container->addChild("vertical_area_hidden_button_color", $vertical_area_hidden_button_color);

        $vertical_area_hidden_button_margin_top = new QodeField("text", "vertical_area_hidden_button_margin_top", "", "Button Margin Top (px)", "Set top margin for button that opens/closes Hidden Left Menu Area", array(), array("col_width" => 3));
        $vertical_area_hidden_button_color_container->addChild("vertical_area_hidden_button_margin_top", $vertical_area_hidden_button_margin_top);

        $vertical_area_width_container = new QodeContainer("vertical_area_width_container", "vertical_area_type", "");
        $panel7->addChild("vertical_area_width_container", $vertical_area_width_container);

        $vertical_area_width = new QodeField("select", "vertical_area_width", "width_260", "Left Menu Area Width", "Choose width for left menu area", array(
            "width_260" => "260px",
            "width_290" => "290px",
            "width_350" => "350px",
            "width_400" => "400px"
        ));
        $vertical_area_width_container->addChild("vertical_area_width", $vertical_area_width);

        $vertical_area_transparency_container = new QodeContainer("vertical_area_transparency_container", "vertical_area_type", "hidden");
        $panel7->addChild("vertical_area_transparency_container", $vertical_area_transparency_container);
        $vertical_area_transparency = new QodeField("yesno", "vertical_area_transparency", "no", "Enable transparent left menu area", "Enabling this option will make Left Menu background transparent");
        $vertical_area_transparency_container->addChild("vertical_area_transparency", $vertical_area_transparency);

        $vertical_area_submenu_opening_style = new QodeField("select", "vertical_area_submenu_opening_type", "", "Submenu Opening Style", "Specify submenu opening style", array(
            "" => "On Hover",
            "on_click" => "On Click",
            "float" => "Float In"
        ), array(
            "dependence" => true,
            "hide" => array("" => "#qodef_vertical_area_float_container", "on_click" => "#qodef_vertical_area_float_container"),
            "show" => array("float" => "#qodef_vertical_area_float_container")
        ));
        $panel7->addChild("vertical_area_submenu_opening_style", $vertical_area_submenu_opening_style);

        $vertically_center_content = new QodeField("yesno", "vertical_area_vertically_center_content", "no", "Vertically Center Content", "Enabling this option will make menu to be centered vertically");
        $panel7->addChild("vertical_area_vertically_center_content", $vertically_center_content);

        $vertical_area_background = new QodeField("color", "vertical_area_background", "", "Left Menu Area Background Color", "Choose a color for Left Menu background");
        $panel7->addChild("vertical_area_background", $vertical_area_background);

        $vertical_area_float_container = new QodeContainer("vertical_area_float_container", "vertical_area_submenu_opening_type", array(), array("", "on_click"));
        $panel7->addChild("vertical_area_float_container", $vertical_area_float_container);

        $vertical_area_float_dropdown_bckg_color = new QodeField("color", "vertical_area_float_dropdown_bckg_color", "", "Dropdown Background Color", "Choose a color for Left Menu Float type dropdown background");
        $vertical_area_float_container->addChild("vertical_area_float_dropdown_bckg_color", $vertical_area_float_dropdown_bckg_color);

        $vertical_area_float_dropdown_alignment = new QodeField("selectblank", "vertical_area_float_dropdown_alignment", "", "Dropdown Alignment", "Choose an alignment for dropdown, leave empty if it inherits Content Alignment", array(
            "left" => "Left",
            "center" => "Center",
            "right" => "Right"
        ));
        $vertical_area_float_container->addChild("vertical_area_float_dropdown_alignment", $vertical_area_float_dropdown_alignment);

        $vertical_area_background_image = new QodeField("image", "vertical_area_background_image", "", "Left Menu Area Background Image", "Choose an image for Left Menu background");
        $panel7->addChild("vertical_area_background_image", $vertical_area_background_image);
        $vertical_area_text_color = new QodeField("color", "vertical_area_text_color", "", "Left Menu Area Text Color (for Widgets)", "Choose a text color for widgets in Left Menu");
        $panel7->addChild("vertical_area_text_color", $vertical_area_text_color);
        $vertical_area_content_alignment = new QodeField("select", "left_menu_alignment", "", "Content Alignment", "Choose content alignment inside left menu area", array("left" => "Left",
            "center" => "Center",
            "right" => "Right"
        ));
        $panel7->addChild("left_menu_alignment", $vertical_area_content_alignment);

        $group1 = new QodeGroup("1st Level Menu Style", "Define styles for 1st level in Left Menu");
        $panel7->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $vertical_menu_color = new QodeField("colorsimple", "vertical_menu_color", "", "Text Color", "This is some description");
        $row1->addChild("vertical_menu_color", $vertical_menu_color);
        $vertical_menu_hovercolor = new QodeField("colorsimple", "vertical_menu_hovercolor", "", "Hover/Active color", "This is some description");
        $row1->addChild("vertical_menu_hovercolor", $vertical_menu_hovercolor);

        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $vertical_menu_google_fonts = new QodeField("fontsimple", "vertical_menu_google_fonts", "-1", "Font family", "This is some description");
        $row2->addChild("vertical_menu_google_fonts", $vertical_menu_google_fonts);
        $vertical_menu_fontsize = new QodeField("textsimple", "vertical_menu_fontsize", "", "Font size (px)", "This is some description");
        $row2->addChild("vertical_menu_fontsize", $vertical_menu_fontsize);
        $vertical_menu_lineheight = new QodeField("textsimple", "vertical_menu_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("vertical_menu_lineheight", $vertical_menu_lineheight);

        $row3 = new QodeRow(true);
        $group1->addChild("row3", $row3);
        $vertical_menu_fontstyle = new QodeField("selectblanksimple", "vertical_menu_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("vertical_menu_fontstyle", $vertical_menu_fontstyle);
        $vertical_menu_fontweight = new QodeField("selectblanksimple", "vertical_menu_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("vertical_menu_fontweight", $vertical_menu_fontweight);
        $vertical_menu_letterspacing = new QodeField("textsimple", "vertical_menu_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("vertical_menu_letterspacing", $vertical_menu_letterspacing);
        $vertical_menu_texttransform = new QodeField("selectblanksimple", "vertical_menu_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("vertical_menu_texttransform", $vertical_menu_texttransform);

        $group2 = new QodeGroup("2nd Level Menu Style", "Define styles for 2st level in Left Menu");
        $panel7->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $vertical_dropdown_color = new QodeField("colorsimple", "vertical_dropdown_color", "", "Text Color", "This is some description");
        $row1->addChild("vertical_dropdown_color", $vertical_dropdown_color);
        $vertical_dropdown_hovercolor = new QodeField("colorsimple", "vertical_dropdown_hovercolor", "", "Hover/Active Color", "This is some description");
        $row1->addChild("vertical_dropdown_hovercolor", $vertical_dropdown_hovercolor);

        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $vertical_dropdown_google_fonts = new QodeField("fontsimple", "vertical_dropdown_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("vertical_dropdown_google_fonts", $vertical_dropdown_google_fonts);
        $vertical_dropdown_fontsize = new QodeField("textsimple", "vertical_dropdown_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("vertical_dropdown_fontsize", $vertical_dropdown_fontsize);
        $vertical_dropdown_lineheight = new QodeField("textsimple", "vertical_dropdown_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("vertical_dropdown_lineheight", $vertical_dropdown_lineheight);

        $row3 = new QodeRow(true);
        $group2->addChild("row3", $row3);
        $vertical_dropdown_fontstyle = new QodeField("selectblanksimple", "vertical_dropdown_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("vertical_dropdown_fontstyle", $vertical_dropdown_fontstyle);
        $vertical_dropdown_fontweight = new QodeField("selectblanksimple", "vertical_dropdown_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("vertical_dropdown_fontweight", $vertical_dropdown_fontweight);
        $vertical_dropdown_letterspacing = new QodeField("textsimple", "vertical_dropdown_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("vertical_dropdown_letterspacing", $vertical_dropdown_letterspacing);
        $vertical_dropdown_texttransform = new QodeField("selectblanksimple", "vertical_dropdown_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("vertical_dropdown_texttransform", $vertical_dropdown_texttransform);


        $group3 = new QodeGroup("3rd Level Menu Style", "Define styles for 3rd level in Left Menu");
        $panel7->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $vertical_dropdown_color_thirdlvl = new QodeField("colorsimple", "vertical_dropdown_color_thirdlvl", "", "Text Color", "This is some description");
        $row1->addChild("vertical_dropdown_color_thirdlvl", $vertical_dropdown_color_thirdlvl);
        $vertical_dropdown_hovercolor_thirdlvl = new QodeField("colorsimple", "vertical_dropdown_hovercolor_thirdlvl", "", "Hover/Active Color", "This is some description");
        $row1->addChild("vertical_dropdown_hovercolor_thirdlvl", $vertical_dropdown_hovercolor_thirdlvl);

        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);
        $vertical_dropdown_google_fonts_thirdlvl = new QodeField("fontsimple", "vertical_dropdown_google_fonts_thirdlvl", "-1", "Font Family", "This is some description");
        $row2->addChild("vertical_dropdown_google_fonts_thirdlvl", $vertical_dropdown_google_fonts_thirdlvl);
        $vertical_dropdown_fontsize_thirdlvl = new QodeField("textsimple", "vertical_dropdown_fontsize_thirdlvl", "", "Font Size (px)", "This is some description");
        $row2->addChild("vertical_dropdown_fontsize_thirdlvl", $vertical_dropdown_fontsize_thirdlvl);
        $vertical_dropdown_lineheight_thirdlvl = new QodeField("textsimple", "vertical_dropdown_lineheight_thirdlvl", "", "Line Height (px)", "This is some description");
        $row2->addChild("vertical_dropdown_lineheight_thirdlvl", $vertical_dropdown_lineheight_thirdlvl);

        $row3 = new QodeRow(true);
        $group3->addChild("row3", $row3);
        $vertical_dropdown_fontstyle_thirdlvl = new QodeField("selectblanksimple", "vertical_dropdown_fontstyle_thirdlvl", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("vertical_dropdown_fontstyle_thirdlvl", $vertical_dropdown_fontstyle_thirdlvl);
        $vertical_dropdown_fontweight_thirdlvl = new QodeField("selectblanksimple", "vertical_dropdown_fontweight_thirdlvl", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("vertical_dropdown_fontweight_thirdlvl", $vertical_dropdown_fontweight_thirdlvl);
        $vertical_dropdown_letterspacing_thirdlvl = new QodeField("textsimple", "vertical_dropdown_letterspacing_thirdlvl", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("vertical_dropdown_letterspacing_thirdlvl", $vertical_dropdown_letterspacing_thirdlvl);
        $vertical_dropdown_texttransform_thirdlvl = new QodeField("selectblanksimple", "vertical_dropdown_texttransform_thirdlvl", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("vertical_dropdown_texttransform_thirdlvl", $vertical_dropdown_texttransform_thirdlvl);


        $panel20 = new QodePanel("Mobile Menu", "mobile_menu_panel");
        $headerandfooterPage->addChild("panel20", $panel20);

        $mobile_separator_color = new QodeField("color", "mobile_separator_color", "", "Mobile Menu Item Separator Color", "Choose color for mobile menu horizontal separators");
        $panel20->addChild("mobile_separator_color", $mobile_separator_color);
        $mobile_background_color = new QodeField("color", "mobile_background_color", "", "Mobile Header & Menu Background Color", "Choose color for mobile header&menu background");
        $panel20->addChild("mobile_background_color", $mobile_background_color);
		$mobile_header_top_background_color = new QodeField("color", "mobile_header_top_background_color", "", "Mobile Header Top Background Color", "Choose color for mobile header top background");
		$panel20->addChild("mobile_header_top_background_color", $mobile_header_top_background_color);
        //init icon pack hide and show array. It will be populated dinamically from collections array
        $mobile_menu_icon_pack_hide_array = array();
        $mobile_menu_icon_pack_show_array = array();

        //do we have some collection added in collections array?
        if (is_array(qode_icon_collections()->iconCollections) && count(qode_icon_collections()->iconCollections)) {
            //get collections params array. It will contain values of 'param' property for each collection
            $mobile_menu_icon_collections_params = qode_icon_collections()->getIconCollectionsParams();

            //foreach collection generate hide and show array
            foreach (qode_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
                $mobile_menu_icon_pack_hide_array[$dep_collection_key] = '';

                //we need to include only current collection in show string as it is the only one that needs to show
                $mobile_menu_icon_pack_show_array[$dep_collection_key] = '#qodef_mobile_menu_icon_' . $dep_collection_object->param . '_container';

                //for all collections param generate hide string
                foreach ($mobile_menu_icon_collections_params as $mobile_menu_icon_collections_param) {
                    //we don't need to include current one, because it needs to be shown, not hidden
                    if ($mobile_menu_icon_collections_param !== $dep_collection_object->param) {
                        $mobile_menu_icon_pack_hide_array[$dep_collection_key] .= '#qodef_mobile_menu_icon_' . $mobile_menu_icon_collections_param . '_container,';
                    }
                }

                //remove remaining ',' character
                $mobile_menu_icon_pack_hide_array[$dep_collection_key] = rtrim($mobile_menu_icon_pack_hide_array[$dep_collection_key], ',');
            }

        }

        $mobile_menu_button_icon_pack = new QodeField(
            "select",
            "mobile_menu_button_icon_pack",
            "font_awesome",
            "Mobile Menu Button Icon Pack",
            "Choose icon pack for Mobile Menu button",
            qode_icon_collections()->getIconCollections(),
            array(
                "dependence" => true,
                "hide" => $mobile_menu_icon_pack_hide_array,
                "show" => $mobile_menu_icon_pack_show_array
            ));

        $panel20->addChild("mobile_menu_button_icon_pack", $mobile_menu_button_icon_pack);

        if (is_array(qode_icon_collections()->iconCollections) && count(qode_icon_collections()->iconCollections)) {
            //foreach icon collection we need to generate separate container that will have dependency set
            //it will have one field inside with icons dropdown
            foreach (qode_icon_collections()->iconCollections as $collection_key => $collection_object) {
                $icons_array = $collection_object->getIconsArray();

                //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
                $icon_collections_keys = qode_icon_collections()->getIconCollectionsKeys();

                //unset current one, because it doesn't have to be included in dependency that hides icon container
                unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

                $mobile_menu_icon_hide_values = $icon_collections_keys;
                $mobile_menu_icon_container = new QodeContainer("mobile_menu_icon_" . $collection_object->param . "_container", "mobile_menu_button_icon_pack", "", $mobile_menu_icon_hide_values);
                $mobile_menu_button_icon = new QodeField("select", "mobile_menu_icon_" . $collection_object->param, "fa-bars", "Mobile Menu Icon", "Choose Mobile Menu Icon", $icons_array, array("col_width" => 3));
                $mobile_menu_icon_container->addChild("mobile_menu_icon_" . $collection_object->param, $mobile_menu_button_icon);

                $panel20->addChild("mobile_menu_icon_" . $collection_object->param . "_container", $mobile_menu_icon_container);
            }

        }


        $panel9 = new QodePanel("Header Button Icons", "header_buttons_panel");
        $headerandfooterPage->addChild("panel9", $panel9);
        $header_buttons_color = new QodeField("color", "header_buttons_color", "", "Color", "Choose a color for Header icons");
        $panel9->addChild("header_buttons_color", $header_buttons_color);
        $header_buttons_hover_color = new QodeField("color", "header_buttons_hover_color", "", "Hover Color", "Choose a hover color for Header icons");
        $panel9->addChild("header_buttons_hover_color", $header_buttons_hover_color);
        $header_buttons_font_size = new QodeField("text", "header_buttons_font_size", "", "Icon Size (px)", "Choose a size for Header icons", array(), array("col_width" => 3));
        $panel9->addChild("header_buttons_font_size", $header_buttons_font_size);
        $header_buttons_size = new QodeField("select", "header_buttons_size", "normal", "Side Menu / Fullscreen Menu Icon Size", "Choose a size for Side Menu / Fullscreen Menu icons", array("normal" => "Normal",
            "medium" => "Medium",
            "large" => "Large"
        ));
        $panel9->addChild("header_buttons_size", $header_buttons_size);


        if (qode_is_wpml_installed()) {
            $wpml_panel = new QodePanel('Language Switcher', 'language_switcher', 'vertical_area', 'yes');

            $headerandfooterPage->addChild('language_switcher', $wpml_panel);

            $lang_items_padding = new QodeField('text', 'header_bottom_lang_items_padding', '', 'Left / Right Spacing Between Languages in List (px)', 'Set spacing between languages when horizontal language switcher is added to main menu', array(), array("col_width" => 3));
            $wpml_panel->addChild('header_bottom_lang_items_padding', $lang_items_padding);
        }

    }
    add_action('qode_options_map','qode_haeder_options_map',30);
}