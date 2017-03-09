<?php
if(!function_exists('qode_slider_options_map')) {
    /**
     * Slider options page
     */
    function qode_slider_options_map(){

        $sliderPage = new QodeAdminPage("_slider", "Qode Slider", "fa fa-sliders");
        qode_framework()->qodeOptions->addAdminPage("slider", $sliderPage);

        // General Style

        $panel3 = new QodePanel("General Style", "navigation_control_style");
        $sliderPage->addChild("panel3", $panel3);

        $qs_slider_height_tablet = new QodeField("text", "qs_slider_height_tablet", "", "Slider Height For Tablet Portrait and Mobile Landscape View (px)", "Define slider height for tablet devices - portrait view and mobile devices landscape view");
        $panel3->addChild("qs_slider_height_tablet", $qs_slider_height_tablet);

        $qs_slider_height_mobile = new QodeField("text", "qs_slider_height_mobile", "", "Slider Height For Mobile Devices (px)", "Define slider height for mobile devices");
        $panel3->addChild("qs_slider_height_mobile", $qs_slider_height_mobile);

        //Buttons

        $panel4 = new QodePanel("Buttons Style", "buttons_panel");
        $sliderPage->addChild("panel4", $panel4);

        $group1 = new QodeGroup("Button 1 Style", "Define style for button 1.");
        $panel4->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);

        $qs_button_color = new QodeField("colorsimple", "qs_button_color", "", "Text Color", "This is some description");
        $row1->addChild("qs_button_color", $qs_button_color);

        $qs_button_hover_color = new QodeField("colorsimple", "qs_button_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("qs_button_hover_color", $qs_button_hover_color);

        $qs_button_background_color = new QodeField("colorsimple", "qs_button_background_color", "", "Background Color", "This is some description");
        $row1->addChild("qs_button_background_color", $qs_button_background_color);

        $qs_button_hover_background_color = new QodeField("colorsimple", "qs_button_hover_background_color", "", "Background Hover Color", "This is some description");
        $row1->addChild("qs_button_hover_background_color", $qs_button_hover_background_color);

        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);

        $qs_button_border_color = new QodeField("colorsimple", "qs_button_border_color", "", "Border Color", "This is some description");
        $row2->addChild("qs_button_border_color", $qs_button_border_color);

        $qs_button_hover_border_color = new QodeField("colorsimple", "qs_button_hover_border_color", "", "Border Hover Color", "This is some description");
        $row2->addChild("qs_button_hover_border_color", $qs_button_hover_border_color);

        $qs_button_border_width = new QodeField("textsimple", "qs_button_border_width", "", "Border Width (px)", "This is some description");
        $row2->addChild("qs_button_border_width", $qs_button_border_width);

        $qs_button_border_radius = new QodeField("textsimple", "qs_button_border_radius", "", "Border radius (px)", "This is some description");
        $row2->addChild("qs_button_border_radius", $qs_button_border_radius);

        $group2 = new QodeGroup("Button 2 Style", "Define style for button 2.");
        $panel4->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);

        $qs_button2_color = new QodeField("colorsimple", "qs_button2_color", "", "Text Color", "This is some description");
        $row1->addChild("qs_button2_color", $qs_button2_color);

        $qs_button2_hover_color = new QodeField("colorsimple", "qs_button2_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("qs_button2_hover_color", $qs_button2_hover_color);

        $qs_button2_background_color = new QodeField("colorsimple", "qs_button2_background_color", "", "Background Color", "This is some description");
        $row1->addChild("qs_button2_background_color", $qs_button2_background_color);

        $qs_button2_hover_background_color = new QodeField("colorsimple", "qs_button2_hover_background_color", "", "Background Hover Color", "This is some description");
        $row1->addChild("qs_button2_hover_background_color", $qs_button2_hover_background_color);

        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);

        $qs_button2_border_color = new QodeField("colorsimple", "qs_button2_border_color", "", "Border Color", "This is some description");
        $row2->addChild("qs_button2_border_color", $qs_button2_border_color);

        $qs_button2_hover_border_color = new QodeField("colorsimple", "qs_button2_hover_border_color", "", "Border Hover Color", "This is some description");
        $row2->addChild("qs_button2_hover_border_color", $qs_button2_hover_border_color);

        $qs_button2_border_width = new QodeField("textsimple", "qs_button2_border_width", "", "Border Width (px)", "This is some description");
        $row2->addChild("qs_button2_border_width", $qs_button2_border_width);

        $qs_button2_border_radius = new QodeField("textsimple", "qs_button2_border_radius", "", "Border radius (px)", "This is some description");
        $row2->addChild("qs_button2_border_radius", $qs_button2_border_radius);

        // Custom cursor navigation style

        $panel5 = new QodePanel("Custom Cursor Navigation Style", "navigation_custom_cursor_style");
        $sliderPage->addChild("panel5", $panel5);

        $qs_enable_navigation_custom_cursor = new QodeField("yesno", "qs_enable_navigation_custom_cursor", "no", "Enable Custom Cursor for Navigation", "Enabling this option will display custom cursors for slider navigation", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_qs_enable_navigation_custom_cursor_container"));
        $panel5->addChild("qs_enable_navigation_custom_cursor", $qs_enable_navigation_custom_cursor);


        $qs_enable_navigation_custom_cursor_container = new QodeContainer("qs_enable_navigation_custom_cursor_container", "qs_enable_navigation_custom_cursor", "no");
        $panel5->addChild("qs_enable_navigation_custom_cursor_container", $qs_enable_navigation_custom_cursor_container);

        $cursor_image_left_right_area_size = new QodeField("text", "cursor_image_left_right_area_size", "", "Clickable Left/Right Area Size (%)", "Define size of clickable left/right slider area in relation to slider width (default value is 23%)", array(), array("col_width" => 3));
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_right_area_size", $cursor_image_left_right_area_size);

        $cursor_image_left_normal = new QodeField("image", "cursor_image_left_normal", "", "Cursor Image 'Left' - Normal", "Choose a default cursor 'Left' image to display ");
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_normal", $cursor_image_left_normal);

        $cursor_image_right_normal = new QodeField("image", "cursor_image_right_normal", "", "Cursor Image 'Right' - Normal", "Choose a default cursor 'Right' image to display ");
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_right_normal", $cursor_image_right_normal);


        $cursor_image_left_light = new QodeField("image", "cursor_image_left_light", "", "Cursor Image 'Left' - Light", "Choose a cursor 'Left' light image to display ");
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_light", $cursor_image_left_light);

        $cursor_image_right_light = new QodeField("image", "cursor_image_right_light", "", "Cursor Image 'Right' - Light", "Choose a cursor 'Right' light image to display ");
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_right_light", $cursor_image_right_light);

        $cursor_image_left_dark = new QodeField("image", "cursor_image_left_dark", "", "Cursor Image 'Left' - Dark", "Choose a cursor 'Left' dark image to display ");
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_dark", $cursor_image_left_dark);

        $cursor_image_right_dark = new QodeField("image", "cursor_image_right_dark", "", "Cursor Image 'Right' - Dark", "Choose a cursor 'Right' dark image to display ");
        $qs_enable_navigation_custom_cursor_container->addChild("cursor_image_right_dark", $cursor_image_right_dark);


        $qs_enable_navigation_custom_cursor_grab = new QodeField("yesno", "qs_enable_navigation_custom_cursor_grab", "no", "Enable Custom Cursor for 'Grab' Arrow", "Enabling this option will display custom cursor for slider 'Grab' arrow", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_qs_enable_navigation_custom_cursor_grab_container"));
        $qs_enable_navigation_custom_cursor_container->addChild("qs_enable_navigation_custom_cursor_grab", $qs_enable_navigation_custom_cursor_grab);

        $qs_enable_navigation_custom_cursor_grab_container = new QodeContainer("qs_enable_navigation_custom_cursor_grab_container", "qs_enable_navigation_custom_cursor_grab", "no");
        $qs_enable_navigation_custom_cursor_container->addChild("qs_enable_navigation_custom_cursor_grab_container", $qs_enable_navigation_custom_cursor_grab_container);

        $cursor_image_grab_normal = new QodeField("image", "cursor_image_grab_normal", "", "Cursor Image 'Grab' - Normal", "Choose a default cursor 'Grab' image to display");
        $qs_enable_navigation_custom_cursor_grab_container->addChild("cursor_image_grab_normal", $cursor_image_grab_normal);

        $cursor_image_grab_light = new QodeField("image", "cursor_image_grab_light", "", "Cursor Image 'Grab' - Light", "Choose a cursor 'Grab' light image to display");
        $qs_enable_navigation_custom_cursor_grab_container->addChild("cursor_image_grab_light", $cursor_image_grab_light);

        $cursor_image_grab_dark = new QodeField("image", "cursor_image_grab_dark", "", "Cursor Image 'Grab' - Dark", "Choose a cursor 'Grab' dark image to display");
        $qs_enable_navigation_custom_cursor_grab_container->addChild("cursor_image_grab_dark", $cursor_image_grab_dark);
    }
    add_action('qode_options_map','qode_slider_options_map',90);
}