<?php

if(!function_exists('qode_contactform7_options_map')) {
    /**
     * Contact Form 7 options page
     */
    function qode_contactform7_options_map()
    {

        $contactform7page = new QodeAdminPage("_contact_form_7", "Contact Form 7", "fa fa-file-text-o");
        qode_framework()->qodeOptions->addAdminPage("Contact Form 7", $contactform7page);

        //Contact Form 7 Settings

        $panel1 = new QodePanel("Custom Style 1 Settings", "contact_form_custom_style_1_panel");
        $contactform7page->addChild("panel1", $panel1);

        $group1 = new QodeGroup("Form Elements' Background", "Define background style for form elements (input, textarea, select)");
        $panel1->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $cf7_custom_style_1_element_background_color = new QodeField("colorsimple", "cf7_custom_style_1_element_background_color", "", "Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_background_color", $cf7_custom_style_1_element_background_color);
        $cf7_custom_style_1_element_focus_background_color = new QodeField("colorsimple", "cf7_custom_style_1_element_focus_background_color", "", "Focus Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_focus_background_color", $cf7_custom_style_1_element_focus_background_color);
        $cf7_custom_style_1_element_background_transparency = new QodeField("textsimple", "cf7_custom_style_1_element_background_transparency", "", "Background Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_background_transparency", $cf7_custom_style_1_element_background_transparency);
        $group2 = new QodeGroup("Form Elements' Border", "Define border style for form elements (text input fields, textarea, select)");
        $panel1->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $cf7_custom_style_1_element_border_color = new QodeField("colorsimple", "cf7_custom_style_1_element_border_color", "", "Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_border_color", $cf7_custom_style_1_element_border_color);
        $cf7_custom_style_1_element_focus_border_color = new QodeField("colorsimple", "cf7_custom_style_1_element_focus_border_color", "", "Focus Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_focus_border_color", $cf7_custom_style_1_element_focus_border_color);
        $cf7_custom_style_1_border_transparency = new QodeField("textsimple", "cf7_custom_style_1_border_transparency", "", "Border Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_1_border_transparency", $cf7_custom_style_1_border_transparency);
        $cf7_custom_style_1_element_border_width = new QodeField("textsimple", "cf7_custom_style_1_element_border_width", "", "Border Width (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_border_width", $cf7_custom_style_1_element_border_width);

        $group3 = new QodeGroup("Form Elements' Border Radius", "Define border radius for form elements (text input fields, textarea, select)");
        $panel1->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $cf7_custom_style_1_element_border_radius_top_left = new QodeField("textsimple", "cf7_custom_style_1_element_border_radius_top_left", "", "Top Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_border_radius_top_left", $cf7_custom_style_1_element_border_radius_top_left);
        $cf7_custom_style_1_element_border_radius_top_right = new QodeField("textsimple", "cf7_custom_style_1_element_border_radius_top_right", "", "Top Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_border_radius_top_right", $cf7_custom_style_1_element_border_radius_top_right);
        $cf7_custom_style_1_element_border_radius_bottom_right = new QodeField("textsimple", "cf7_custom_style_1_element_border_radius_bottom_right", "", "Bottom Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_border_radius_bottom_right", $cf7_custom_style_1_element_border_radius_bottom_right);
        $cf7_custom_style_1_element_border_radius_bottom_left = new QodeField("textsimple", "cf7_custom_style_1_element_border_radius_bottom_left", "", "Bottom Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_border_radius_bottom_left", $cf7_custom_style_1_element_border_radius_bottom_left);


        $group4 = new QodeGroup("Form Elements' Text Style", "Define text style for form elements (text input fields, textarea, select)");
        $panel1->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $cf7_custom_style_1_element_font_color = new QodeField("colorsimple", "cf7_custom_style_1_element_font_color", "", "Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_font_color", $cf7_custom_style_1_element_font_color);
        $cf7_custom_style_1_element_font_focus_color = new QodeField("colorsimple", "cf7_custom_style_1_element_font_focus_color", "", "Focus Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_font_focus_color", $cf7_custom_style_1_element_font_focus_color);
        $cf7_custom_style_1_element_font_size = new QodeField("textsimple", "cf7_custom_style_1_element_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_font_size", $cf7_custom_style_1_element_font_size);
        $cf7_custom_style_1_element_line_height = new QodeField("textsimple", "cf7_custom_style_1_element_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_line_height", $cf7_custom_style_1_element_line_height);
        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $cf7_custom_style_1_element_font_family = new QodeField("fontsimple", "cf7_custom_style_1_element_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("cf7_custom_style_1_element_font_family", $cf7_custom_style_1_element_font_family);
        $cf7_custom_style_1_element_font_style = new QodeField("selectblanksimple", "cf7_custom_style_1_element_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("cf7_custom_style_1_element_font_style", $cf7_custom_style_1_element_font_style);
        $cf7_custom_style_1_element_font_weight = new QodeField("selectblanksimple", "cf7_custom_style_1_element_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("cf7_custom_style_1_element_font_weight", $cf7_custom_style_1_element_font_weight);
        $cf7_custom_style_1_element_text_transform = new QodeField("selectblanksimple", "cf7_custom_style_1_element_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("cf7_custom_style_1_element_text_transform", $cf7_custom_style_1_element_text_transform);
        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);
        $cf7_custom_style_1_element_letter_spacing = new QodeField("textsimple", "cf7_custom_style_1_element_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("cf7_custom_style_1_element_letter_spacing", $cf7_custom_style_1_element_letter_spacing);

        $group5 = new QodeGroup("Form Elements' Padding", "Define padding for form elements (text input fields, textarea, select)");
        $panel1->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $cf7_custom_style_1_element_padding_top = new QodeField("textsimple", "cf7_custom_style_1_element_padding_top", "", "Padding Top (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_padding_top", $cf7_custom_style_1_element_padding_top);
        $cf7_custom_style_1_element_padding_right = new QodeField("textsimple", "cf7_custom_style_1_element_padding_right", "", "Padding Right (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_padding_right", $cf7_custom_style_1_element_padding_right);
        $cf7_custom_style_1_element_padding_bottom = new QodeField("textsimple", "cf7_custom_style_1_element_padding_bottom", "", "Padding Bottom (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_padding_bottom", $cf7_custom_style_1_element_padding_bottom);
        $cf7_custom_style_1_element_padding_left = new QodeField("textsimple", "cf7_custom_style_1_element_padding_left", "", "Padding Left (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_padding_left", $cf7_custom_style_1_element_padding_left);

        $group6 = new QodeGroup("Form Elements' Margin", "Define margin for form elements (text input fields, textarea, select)");
        $panel1->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $cf7_custom_style_1_element_margin_top = new QodeField("textsimple", "cf7_custom_style_1_element_margin_top", "", "Margin Top (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_margin_top", $cf7_custom_style_1_element_margin_top);
        $cf7_custom_style_1_element_margin_bottom = new QodeField("textsimple", "cf7_custom_style_1_element_margin_bottom", "", "Margin Bottom (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_element_margin_bottom", $cf7_custom_style_1_element_margin_bottom);

        $group7 = new QodeGroup("Button Background", "Define background style for button");
        $panel1->addChild("group7", $group7);
        $row1 = new QodeRow();
        $group7->addChild("row1", $row1);
        $cf7_custom_style_1_button_background_color = new QodeField("colorsimple", "cf7_custom_style_1_button_background_color", "", "Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_background_color", $cf7_custom_style_1_button_background_color);
        $cf7_custom_style_1_button_hover_background_color = new QodeField("colorsimple", "cf7_custom_style_1_button_hover_background_color", "", "Hover Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_hover_background_color", $cf7_custom_style_1_button_hover_background_color);
        $cf7_custom_style_1_button_background_transparency = new QodeField("textsimple", "cf7_custom_style_1_button_background_transparency", "", "Background Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_background_transparency", $cf7_custom_style_1_button_background_transparency);
        $group8 = new QodeGroup("Button Border", "Define border style for button");
        $panel1->addChild("group8", $group8);
        $row1 = new QodeRow();
        $group8->addChild("row1", $row1);
        $cf7_custom_style_1_button_border_color = new QodeField("colorsimple", "cf7_custom_style_1_button_border_color", "", "Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_color", $cf7_custom_style_1_button_border_color);
        $cf7_custom_style_1_button_hover_border_color = new QodeField("colorsimple", "cf7_custom_style_1_button_hover_border_color", "", "Border Hover Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_hover_border_color", $cf7_custom_style_1_button_hover_border_color);
        $cf7_custom_style_1_button_border_transparency = new QodeField("textsimple", "cf7_custom_style_1_button_border_transparency", "", "Border Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_transparency", $cf7_custom_style_1_button_border_transparency);
        $cf7_custom_style_1_button_border_width = new QodeField("textsimple", "cf7_custom_style_1_button_border_width", "", "Border Width (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_width", $cf7_custom_style_1_button_border_width);

        $group9 = new QodeGroup("Button Border Radius", "Define border radius for button");
        $panel1->addChild("group9", $group9);
        $row1 = new QodeRow();
        $group9->addChild("row1", $row1);
        $cf7_custom_style_1_button_border_radius_top_left = new QodeField("textsimple", "cf7_custom_style_1_button_border_radius_top_left", "", "Top Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_radius_top_left", $cf7_custom_style_1_button_border_radius_top_left);
        $cf7_custom_style_1_button_border_radius_top_right = new QodeField("textsimple", "cf7_custom_style_1_button_border_radius_top_right", "", "Top Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_radius_top_right", $cf7_custom_style_1_button_border_radius_top_right);
        $cf7_custom_style_1_button_border_radius_bottom_right = new QodeField("textsimple", "cf7_custom_style_1_button_border_radius_bottom_right", "", "Bottom Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_radius_bottom_right", $cf7_custom_style_1_button_border_radius_bottom_right);
        $cf7_custom_style_1_button_border_radius_bottom_left = new QodeField("textsimple", "cf7_custom_style_1_button_border_radius_bottom_left", "", "Bottom Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_border_radius_bottom_left", $cf7_custom_style_1_button_border_radius_bottom_left);

        $group10 = new QodeGroup("Button Text Style", "Define text style for button");
        $panel1->addChild("group10", $group10);
        $row1 = new QodeRow();
        $group10->addChild("row1", $row1);
        $cf7_custom_style_1_button_font_color = new QodeField("colorsimple", "cf7_custom_style_1_button_font_color", "", "Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_font_color", $cf7_custom_style_1_button_font_color);
        $cf7_custom_style_1_button_font_hover_color = new QodeField("colorsimple", "cf7_custom_style_1_button_font_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_font_hover_color", $cf7_custom_style_1_button_font_hover_color);
        $cf7_custom_style_1_button_font_size = new QodeField("textsimple", "cf7_custom_style_1_button_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_font_size", $cf7_custom_style_1_button_font_size);
        $cf7_custom_style_1_button_font_family = new QodeField("fontsimple", "cf7_custom_style_1_button_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("cf7_custom_style_1_button_font_family", $cf7_custom_style_1_button_font_family);
        $row2 = new QodeRow(true);
        $group10->addChild("row2", $row2);
        $cf7_custom_style_1_button_font_style = new QodeField("selectblanksimple", "cf7_custom_style_1_button_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("cf7_custom_style_1_button_font_style", $cf7_custom_style_1_button_font_style);
        $cf7_custom_style_1_button_font_weight = new QodeField("selectblanksimple", "cf7_custom_style_1_button_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("cf7_custom_style_1_button_font_weight", $cf7_custom_style_1_button_font_weight);
        $cf7_custom_style_1_button_text_transform = new QodeField("selectblanksimple", "cf7_custom_style_1_button_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("cf7_custom_style_1_button_text_transform", $cf7_custom_style_1_button_text_transform);
        $cf7_custom_style_1_button_letter_spacing = new QodeField("textsimple", "cf7_custom_style_1_button_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("cf7_custom_style_1_button_letter_spacing", $cf7_custom_style_1_button_letter_spacing);

        $cf7_custom_style_1_button_height = new QodeField("text", "cf7_custom_style_1_button_height", "", "Button Height (px)", "Enter button height in px ", array(), array("col_width" => 3));
        $panel1->addChild("cf7_custom_style_1_button_height", $cf7_custom_style_1_button_height);

        $cf7_custom_style_1_button_padding = new QodeField("text", "cf7_custom_style_1_button_padding", "", "Button Left/Right Padding (px)", "Enter button left and right padding in px ", array(), array("col_width" => 3));
        $panel1->addChild("cf7_custom_style_1_button_padding", $cf7_custom_style_1_button_padding);

		$cf7_custom_style_1_button_hover = new QodeField("select","cf7_custom_style_1_button_hover","","Button Hover Type","Choose button hover type",array(
			"" => "Default",
			"enlarge" => "Enlarge"
		));
		$panel1->addChild("cf7_custom_style_1_button_hover",$cf7_custom_style_1_button_hover);

        $cf7_custom_style_1_textarea_height = new QodeField("text", "cf7_custom_style_1_textarea_height", "", "Textarea Height (px)", "Enter height in px for textarea form element", array(), array("col_width" => 3));
        $panel1->addChild("cf7_custom_style_1_textarea_height", $cf7_custom_style_1_textarea_height);

        $panel2 = new QodePanel("Custom Style 2 Settings", "contact_form_custom_style_2_panel");
        $contactform7page->addChild("panel2", $panel2);

        $group1 = new QodeGroup("Form Elements' Background", "Define background style for form elements (input, textarea, select)");
        $panel2->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $cf7_custom_style_2_element_background_color = new QodeField("colorsimple", "cf7_custom_style_2_element_background_color", "", "Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_background_color", $cf7_custom_style_2_element_background_color);
        $cf7_custom_style_2_element_focus_background_color = new QodeField("colorsimple", "cf7_custom_style_2_element_focus_background_color", "", "Focus Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_focus_background_color", $cf7_custom_style_2_element_focus_background_color);
        $cf7_custom_style_2_element_background_transparency = new QodeField("textsimple", "cf7_custom_style_2_element_background_transparency", "", "Background Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_background_transparency", $cf7_custom_style_2_element_background_transparency);
        $group2 = new QodeGroup("Form Elements' Border", "Define border style for form elements (text input fields, textarea, select)");
        $panel2->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $cf7_custom_style_2_element_border_color = new QodeField("colorsimple", "cf7_custom_style_2_element_border_color", "", "Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_border_color", $cf7_custom_style_2_element_border_color);
        $cf7_custom_style_2_element_focus_border_color = new QodeField("colorsimple", "cf7_custom_style_2_element_focus_border_color", "", "Focus Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_focus_border_color", $cf7_custom_style_2_element_focus_border_color);
        $cf7_custom_style_2_border_transparency = new QodeField("textsimple", "cf7_custom_style_2_border_transparency", "", "Border Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_2_border_transparency", $cf7_custom_style_2_border_transparency);
        $cf7_custom_style_2_element_border_width = new QodeField("textsimple", "cf7_custom_style_2_element_border_width", "", "Border Width (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_border_width", $cf7_custom_style_2_element_border_width);

        $group3 = new QodeGroup("Form Elements' Border Radius", "Define border radius for form elements (text input fields, textarea, select)");
        $panel2->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $cf7_custom_style_2_element_border_radius_top_left = new QodeField("textsimple", "cf7_custom_style_2_element_border_radius_top_left", "", "Top Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_border_radius_top_left", $cf7_custom_style_2_element_border_radius_top_left);
        $cf7_custom_style_2_element_border_radius_top_right = new QodeField("textsimple", "cf7_custom_style_2_element_border_radius_top_right", "", "Top Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_border_radius_top_right", $cf7_custom_style_2_element_border_radius_top_right);
        $cf7_custom_style_2_element_border_radius_bottom_right = new QodeField("textsimple", "cf7_custom_style_2_element_border_radius_bottom_right", "", "Bottom Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_border_radius_bottom_right", $cf7_custom_style_2_element_border_radius_bottom_right);
        $cf7_custom_style_2_element_border_radius_bottom_left = new QodeField("textsimple", "cf7_custom_style_2_element_border_radius_bottom_left", "", "Bottom Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_border_radius_bottom_left", $cf7_custom_style_2_element_border_radius_bottom_left);

        $group4 = new QodeGroup("Form Elements' Text Style", "Define text style for form elements (text input fields, textarea, select)");
        $panel2->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $cf7_custom_style_2_element_font_color = new QodeField("colorsimple", "cf7_custom_style_2_element_font_color", "", "Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_font_color", $cf7_custom_style_2_element_font_color);
        $cf7_custom_style_2_element_font_focus_color = new QodeField("colorsimple", "cf7_custom_style_2_element_font_focus_color", "", "Focus Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_font_focus_color", $cf7_custom_style_2_element_font_focus_color);
        $cf7_custom_style_2_element_font_size = new QodeField("textsimple", "cf7_custom_style_2_element_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_font_size", $cf7_custom_style_2_element_font_size);
        $cf7_custom_style_2_element_line_height = new QodeField("textsimple", "cf7_custom_style_2_element_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_line_height", $cf7_custom_style_2_element_line_height);
        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $cf7_custom_style_2_element_font_family = new QodeField("fontsimple", "cf7_custom_style_2_element_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("cf7_custom_style_2_element_font_family", $cf7_custom_style_2_element_font_family);
        $cf7_custom_style_2_element_font_style = new QodeField("selectblanksimple", "cf7_custom_style_2_element_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("cf7_custom_style_2_element_font_style", $cf7_custom_style_2_element_font_style);
        $cf7_custom_style_2_element_font_weight = new QodeField("selectblanksimple", "cf7_custom_style_2_element_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("cf7_custom_style_2_element_font_weight", $cf7_custom_style_2_element_font_weight);
        $cf7_custom_style_2_element_text_transform = new QodeField("selectblanksimple", "cf7_custom_style_2_element_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("cf7_custom_style_2_element_text_transform", $cf7_custom_style_2_element_text_transform);
        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);
        $cf7_custom_style_2_element_letter_spacing = new QodeField("textsimple", "cf7_custom_style_2_element_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("cf7_custom_style_2_element_letter_spacing", $cf7_custom_style_2_element_letter_spacing);
        $group5 = new QodeGroup("Form Elements' Padding", "Define padding for form elements (text input fields, textarea, select)");
        $panel2->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $cf7_custom_style_2_element_padding_top = new QodeField("textsimple", "cf7_custom_style_2_element_padding_top", "", "Padding Top (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_padding_top", $cf7_custom_style_2_element_padding_top);
        $cf7_custom_style_2_element_padding_right = new QodeField("textsimple", "cf7_custom_style_2_element_padding_right", "", "Padding Right (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_padding_right", $cf7_custom_style_2_element_padding_right);
        $cf7_custom_style_2_element_padding_bottom = new QodeField("textsimple", "cf7_custom_style_2_element_padding_bottom", "", "Padding Bottom (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_padding_bottom", $cf7_custom_style_2_element_padding_bottom);
        $cf7_custom_style_2_element_padding_left = new QodeField("textsimple", "cf7_custom_style_2_element_padding_left", "", "Padding Left (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_padding_left", $cf7_custom_style_2_element_padding_left);
        $group6 = new QodeGroup("Form Elements' Margin", "Define margin for form elements (text input fields, textarea, select)");
        $panel2->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $cf7_custom_style_2_element_margin_top = new QodeField("textsimple", "cf7_custom_style_2_element_margin_top", "", "Margin Top (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_margin_top", $cf7_custom_style_2_element_margin_top);
        $cf7_custom_style_2_element_margin_bottom = new QodeField("textsimple", "cf7_custom_style_2_element_margin_bottom", "", "Margin Bottom (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_element_margin_bottom", $cf7_custom_style_2_element_margin_bottom);

        $group7 = new QodeGroup("Button Background", "Define background style for button");
        $panel2->addChild("group7", $group7);
        $row1 = new QodeRow();
        $group7->addChild("row1", $row1);
        $cf7_custom_style_2_button_background_color = new QodeField("colorsimple", "cf7_custom_style_2_button_background_color", "", "Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_background_color", $cf7_custom_style_2_button_background_color);
        $cf7_custom_style_2_button_hover_background_color = new QodeField("colorsimple", "cf7_custom_style_2_button_hover_background_color", "", "Hover Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_hover_background_color", $cf7_custom_style_2_button_hover_background_color);
        $cf7_custom_style_2_button_background_transparency = new QodeField("textsimple", "cf7_custom_style_2_button_background_transparency", "", "Background Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_background_transparency", $cf7_custom_style_2_button_background_transparency);
        $group8 = new QodeGroup("Button Border", "Define border style for button");
        $panel2->addChild("group8", $group8);
        $row1 = new QodeRow();
        $group8->addChild("row1", $row1);
        $cf7_custom_style_2_button_border_color = new QodeField("colorsimple", "cf7_custom_style_2_button_border_color", "", "Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_color", $cf7_custom_style_2_button_border_color);
        $cf7_custom_style_2_button_hover_border_color = new QodeField("colorsimple", "cf7_custom_style_2_button_hover_border_color", "", "Border Hover Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_hover_border_color", $cf7_custom_style_2_button_hover_border_color);
        $cf7_custom_style_2_button_border_transparency = new QodeField("textsimple", "cf7_custom_style_2_button_border_transparency", "", "Border Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_transparency", $cf7_custom_style_2_button_border_transparency);
        $cf7_custom_style_2_button_border_width = new QodeField("textsimple", "cf7_custom_style_2_button_border_width", "", "Border Width (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_width", $cf7_custom_style_2_button_border_width);
        $group9 = new QodeGroup("Button Border Radius", "Define border radius for button");
        $panel2->addChild("group9", $group9);
        $row1 = new QodeRow();
        $group9->addChild("row1", $row1);
        $cf7_custom_style_2_button_border_radius_top_left = new QodeField("textsimple", "cf7_custom_style_2_button_border_radius_top_left", "", "Top Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_radius_top_left", $cf7_custom_style_2_button_border_radius_top_left);
        $cf7_custom_style_2_button_border_radius_top_right = new QodeField("textsimple", "cf7_custom_style_2_button_border_radius_top_right", "", "Top Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_radius_top_right", $cf7_custom_style_2_button_border_radius_top_right);
        $cf7_custom_style_2_button_border_radius_bottom_right = new QodeField("textsimple", "cf7_custom_style_2_button_border_radius_bottom_right", "", "Bottom Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_radius_bottom_right", $cf7_custom_style_2_button_border_radius_bottom_right);
        $cf7_custom_style_2_button_border_radius_bottom_left = new QodeField("textsimple", "cf7_custom_style_2_button_border_radius_bottom_left", "", "Bottom Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_border_radius_bottom_left", $cf7_custom_style_2_button_border_radius_bottom_left);

        $group10 = new QodeGroup("Button Text Style", "Define text style for button");
        $panel2->addChild("group10", $group10);
        $row1 = new QodeRow();
        $group10->addChild("row1", $row1);
        $cf7_custom_style_2_button_font_color = new QodeField("colorsimple", "cf7_custom_style_2_button_font_color", "", "Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_font_color", $cf7_custom_style_2_button_font_color);
        $cf7_custom_style_2_button_font_hover_color = new QodeField("colorsimple", "cf7_custom_style_2_button_font_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_font_hover_color", $cf7_custom_style_2_button_font_hover_color);
        $cf7_custom_style_2_button_font_size = new QodeField("textsimple", "cf7_custom_style_2_button_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_font_size", $cf7_custom_style_2_button_font_size);
        $cf7_custom_style_2_button_font_family = new QodeField("fontsimple", "cf7_custom_style_2_button_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("cf7_custom_style_2_button_font_family", $cf7_custom_style_2_button_font_family);
        $row2 = new QodeRow(true);
        $group10->addChild("row2", $row2);
        $cf7_custom_style_2_button_font_style = new QodeField("selectblanksimple", "cf7_custom_style_2_button_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("cf7_custom_style_2_button_font_style", $cf7_custom_style_2_button_font_style);
        $cf7_custom_style_2_button_font_weight = new QodeField("selectblanksimple", "cf7_custom_style_2_button_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("cf7_custom_style_2_button_font_weight", $cf7_custom_style_2_button_font_weight);
        $cf7_custom_style_2_button_text_transform = new QodeField("selectblanksimple", "cf7_custom_style_2_button_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("cf7_custom_style_2_button_text_transform", $cf7_custom_style_2_button_text_transform);
        $cf7_custom_style_2_button_letter_spacing = new QodeField("textsimple", "cf7_custom_style_2_button_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("cf7_custom_style_2_button_letter_spacing", $cf7_custom_style_2_button_letter_spacing);

        $cf7_custom_style_2_button_height = new QodeField("text", "cf7_custom_style_2_button_height", "", "Button Height (px)", "Enter button height in px ", array(), array("col_width" => 3));
        $panel2->addChild("cf7_custom_style_2_button_height", $cf7_custom_style_2_button_height);

        $cf7_custom_style_2_button_padding = new QodeField("text", "cf7_custom_style_2_button_padding", "", "Button Left/Right Padding (px)", "Enter button left and right padding in px ", array(), array("col_width" => 3));
        $panel2->addChild("cf7_custom_style_2_button_padding", $cf7_custom_style_2_button_padding);

		$cf7_custom_style_2_button_hover = new QodeField("select","cf7_custom_style_2_button_hover","","Button Hover Type","Choose button hover type",array(
			"" => "Default",
			"enlarge" => "Enlarge"
		));
		$panel2->addChild("cf7_custom_style_2_button_hover",$cf7_custom_style_2_button_hover);

        $cf7_custom_style_2_textarea_height = new QodeField("text", "cf7_custom_style_2_textarea_height", "", "Textarea Height (px)", "Enter height in px for textarea form element", array(), array("col_width" => 3));
        $panel2->addChild("cf7_custom_style_2_textarea_height", $cf7_custom_style_2_textarea_height);

        $panel3 = new QodePanel("Custom Style 3 Settings", "contact_form_custom_style_3_panel");
        $contactform7page->addChild("panel3", $panel3);

        $group1 = new QodeGroup("Form Elements' Background", "Define background style for form elements (input, textarea, select)");
        $panel3->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $cf7_custom_style_3_element_background_color = new QodeField("colorsimple", "cf7_custom_style_3_element_background_color", "", "Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_background_color", $cf7_custom_style_3_element_background_color);
        $cf7_custom_style_3_element_focus_background_color = new QodeField("colorsimple", "cf7_custom_style_3_element_focus_background_color", "", "Focus Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_focus_background_color", $cf7_custom_style_3_element_focus_background_color);
        $cf7_custom_style_3_element_background_transparency = new QodeField("textsimple", "cf7_custom_style_3_element_background_transparency", "", "Background Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_background_transparency", $cf7_custom_style_3_element_background_transparency);
        $group2 = new QodeGroup("Form Elements' Border", "Define border style for form elements (text input fields, textarea, select)");
        $panel3->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $cf7_custom_style_3_element_border_color = new QodeField("colorsimple", "cf7_custom_style_3_element_border_color", "", "Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_border_color", $cf7_custom_style_3_element_border_color);
        $cf7_custom_style_3_element_focus_border_color = new QodeField("colorsimple", "cf7_custom_style_3_element_focus_border_color", "", "Focus Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_focus_border_color", $cf7_custom_style_3_element_focus_border_color);
        $cf7_custom_style_3_border_transparency = new QodeField("textsimple", "cf7_custom_style_3_border_transparency", "", "Border Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_3_border_transparency", $cf7_custom_style_3_border_transparency);
        $cf7_custom_style_3_element_border_width = new QodeField("textsimple", "cf7_custom_style_3_element_border_width", "", "Border Width (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_border_width", $cf7_custom_style_3_element_border_width);
        $group3 = new QodeGroup("Form Elements' Border Radius", "Define border radius for form elements (text input fields, textarea, select)");
        $panel3->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $cf7_custom_style_3_element_border_radius_top_left = new QodeField("textsimple", "cf7_custom_style_3_element_border_radius_top_left", "", "Top Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_border_radius_top_left", $cf7_custom_style_3_element_border_radius_top_left);
        $cf7_custom_style_3_element_border_radius_top_right = new QodeField("textsimple", "cf7_custom_style_3_element_border_radius_top_right", "", "Top Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_border_radius_top_right", $cf7_custom_style_3_element_border_radius_top_right);
        $cf7_custom_style_3_element_border_radius_bottom_right = new QodeField("textsimple", "cf7_custom_style_3_element_border_radius_bottom_right", "", "Bottom Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_border_radius_bottom_right", $cf7_custom_style_3_element_border_radius_bottom_right);
        $cf7_custom_style_3_element_border_radius_bottom_left = new QodeField("textsimple", "cf7_custom_style_3_element_border_radius_bottom_left", "", "Bottom Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_border_radius_bottom_left", $cf7_custom_style_3_element_border_radius_bottom_left);

        $group4 = new QodeGroup("Form Elements' Text Style", "Define text style for form elements (text input fields, textarea, select)");
        $panel3->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $cf7_custom_style_3_element_font_color = new QodeField("colorsimple", "cf7_custom_style_3_element_font_color", "", "Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_font_color", $cf7_custom_style_3_element_font_color);
        $cf7_custom_style_3_element_font_focus_color = new QodeField("colorsimple", "cf7_custom_style_3_element_font_focus_color", "", "Focus Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_font_focus_color", $cf7_custom_style_3_element_font_focus_color);
        $cf7_custom_style_3_element_font_size = new QodeField("textsimple", "cf7_custom_style_3_element_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_font_size", $cf7_custom_style_3_element_font_size);
        $cf7_custom_style_3_element_line_height = new QodeField("textsimple", "cf7_custom_style_3_element_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_line_height", $cf7_custom_style_3_element_line_height);
        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $cf7_custom_style_3_element_font_family = new QodeField("fontsimple", "cf7_custom_style_3_element_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("cf7_custom_style_3_element_font_family", $cf7_custom_style_3_element_font_family);
        $cf7_custom_style_3_element_font_style = new QodeField("selectblanksimple", "cf7_custom_style_3_element_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("cf7_custom_style_3_element_font_style", $cf7_custom_style_3_element_font_style);
        $cf7_custom_style_3_element_font_weight = new QodeField("selectblanksimple", "cf7_custom_style_3_element_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("cf7_custom_style_3_element_font_weight", $cf7_custom_style_3_element_font_weight);
        $cf7_custom_style_3_element_text_transform = new QodeField("selectblanksimple", "cf7_custom_style_3_element_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("cf7_custom_style_3_element_text_transform", $cf7_custom_style_3_element_text_transform);
        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);
        $cf7_custom_style_3_element_letter_spacing = new QodeField("textsimple", "cf7_custom_style_3_element_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("cf7_custom_style_3_element_letter_spacing", $cf7_custom_style_3_element_letter_spacing);
        $group5 = new QodeGroup("Form Elements' Padding", "Define padding for form elements (text input fields, textarea, select)");
        $panel3->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $cf7_custom_style_3_element_padding_top = new QodeField("textsimple", "cf7_custom_style_3_element_padding_top", "", "Padding Top (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_padding_top", $cf7_custom_style_3_element_padding_top);
        $cf7_custom_style_3_element_padding_right = new QodeField("textsimple", "cf7_custom_style_3_element_padding_right", "", "Padding Right (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_padding_right", $cf7_custom_style_3_element_padding_right);
        $cf7_custom_style_3_element_padding_bottom = new QodeField("textsimple", "cf7_custom_style_3_element_padding_bottom", "", "Padding Bottom (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_padding_bottom", $cf7_custom_style_3_element_padding_bottom);
        $cf7_custom_style_3_element_padding_left = new QodeField("textsimple", "cf7_custom_style_3_element_padding_left", "", "Padding Left (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_padding_left", $cf7_custom_style_3_element_padding_left);

        $group6 = new QodeGroup("Form Elements' Margin", "Define margin for form elements (text input fields, textarea, select)");
        $panel3->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $cf7_custom_style_3_element_margin_top = new QodeField("textsimple", "cf7_custom_style_3_element_margin_top", "", "Margin Top (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_margin_top", $cf7_custom_style_3_element_margin_top);
        $cf7_custom_style_3_element_margin_bottom = new QodeField("textsimple", "cf7_custom_style_3_element_margin_bottom", "", "Margin Bottom (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_element_margin_bottom", $cf7_custom_style_3_element_margin_bottom);

        $group7 = new QodeGroup("Button Background", "Define background style for button");
        $panel3->addChild("group7", $group7);
        $row1 = new QodeRow();
        $group7->addChild("row1", $row1);
        $cf7_custom_style_3_button_background_color = new QodeField("colorsimple", "cf7_custom_style_3_button_background_color", "", "Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_background_color", $cf7_custom_style_3_button_background_color);
        $cf7_custom_style_3_button_hover_background_color = new QodeField("colorsimple", "cf7_custom_style_3_button_hover_background_color", "", "Hover Background Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_hover_background_color", $cf7_custom_style_3_button_hover_background_color);
        $cf7_custom_style_3_button_background_transparency = new QodeField("textsimple", "cf7_custom_style_3_button_background_transparency", "", "Background Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_background_transparency", $cf7_custom_style_3_button_background_transparency);
        $group8 = new QodeGroup("Button Border", "Define border style for button");
        $panel3->addChild("group8", $group8);
        $row1 = new QodeRow();
        $group8->addChild("row1", $row1);
        $cf7_custom_style_3_button_border_color = new QodeField("colorsimple", "cf7_custom_style_3_button_border_color", "", "Border Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_color", $cf7_custom_style_3_button_border_color);
        $cf7_custom_style_3_button_hover_border_color = new QodeField("colorsimple", "cf7_custom_style_3_button_hover_border_color", "", "Border Hover Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_hover_border_color", $cf7_custom_style_3_button_hover_border_color);
        $cf7_custom_style_3_button_border_transparency = new QodeField("textsimple", "cf7_custom_style_3_button_border_transparency", "", "Border Transparency (values: 0-1)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_transparency", $cf7_custom_style_3_button_border_transparency);
        $cf7_custom_style_3_button_border_width = new QodeField("textsimple", "cf7_custom_style_3_button_border_width", "", "Border Width (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_width", $cf7_custom_style_3_button_border_width);
        $group9 = new QodeGroup("Button Border Radius", "Define border radius for button");
        $panel3->addChild("group9", $group9);
        $row1 = new QodeRow();
        $group9->addChild("row1", $row1);
        $cf7_custom_style_3_button_border_radius_top_left = new QodeField("textsimple", "cf7_custom_style_3_button_border_radius_top_left", "", "Top Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_radius_top_left", $cf7_custom_style_3_button_border_radius_top_left);
        $cf7_custom_style_3_button_border_radius_top_right = new QodeField("textsimple", "cf7_custom_style_3_button_border_radius_top_right", "", "Top Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_radius_top_right", $cf7_custom_style_3_button_border_radius_top_right);
        $cf7_custom_style_3_button_border_radius_bottom_right = new QodeField("textsimple", "cf7_custom_style_3_button_border_radius_bottom_right", "", "Bottom Right(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_radius_bottom_right", $cf7_custom_style_3_button_border_radius_bottom_right);
        $cf7_custom_style_3_button_border_radius_bottom_left = new QodeField("textsimple", "cf7_custom_style_3_button_border_radius_bottom_left", "", "Bottom Left(px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_border_radius_bottom_left", $cf7_custom_style_3_button_border_radius_bottom_left);
        $group10 = new QodeGroup("Button Text Style", "Define text style for button");
        $panel3->addChild("group10", $group10);
        $row1 = new QodeRow();
        $group10->addChild("row1", $row1);
        $cf7_custom_style_3_button_font_color = new QodeField("colorsimple", "cf7_custom_style_3_button_font_color", "", "Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_font_color", $cf7_custom_style_3_button_font_color);
        $cf7_custom_style_3_button_font_hover_color = new QodeField("colorsimple", "cf7_custom_style_3_button_font_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_font_hover_color", $cf7_custom_style_3_button_font_hover_color);
        $cf7_custom_style_3_button_font_size = new QodeField("textsimple", "cf7_custom_style_3_button_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_font_size", $cf7_custom_style_3_button_font_size);
        $cf7_custom_style_3_button_font_family = new QodeField("fontsimple", "cf7_custom_style_3_button_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("cf7_custom_style_3_button_font_family", $cf7_custom_style_3_button_font_family);
        $row2 = new QodeRow(true);
        $group10->addChild("row2", $row2);
        $cf7_custom_style_3_button_font_style = new QodeField("selectblanksimple", "cf7_custom_style_3_button_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("cf7_custom_style_3_button_font_style", $cf7_custom_style_3_button_font_style);
        $cf7_custom_style_3_button_font_weight = new QodeField("selectblanksimple", "cf7_custom_style_3_button_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("cf7_custom_style_3_button_font_weight", $cf7_custom_style_3_button_font_weight);
        $cf7_custom_style_3_button_text_transform = new QodeField("selectblanksimple", "cf7_custom_style_3_button_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("cf7_custom_style_3_button_text_transform", $cf7_custom_style_3_button_text_transform);
        $cf7_custom_style_3_button_letter_spacing = new QodeField("textsimple", "cf7_custom_style_3_button_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("cf7_custom_style_3_button_letter_spacing", $cf7_custom_style_3_button_letter_spacing);

        $cf7_custom_style_3_button_height = new QodeField("text", "cf7_custom_style_3_button_height", "", "Button Height (px)", "Enter button height in px ", array(), array("col_width" => 3));
        $panel3->addChild("cf7_custom_style_3_button_height", $cf7_custom_style_3_button_height);

        $cf7_custom_style_3_button_padding = new QodeField("text", "cf7_custom_style_3_button_padding", "", "Button Left/Right Padding (px)", "Enter button left and right padding in px ", array(), array("col_width" => 3));
        $panel3->addChild("cf7_custom_style_3_button_padding", $cf7_custom_style_3_button_padding);

		$cf7_custom_style_3_button_hover = new QodeField("select","cf7_custom_style_3_button_hover","","Button Hover Type","Choose button hover type",array(
			"" => "Default",
			"enlarge" => "Enlarge"
		));
		$panel3->addChild("cf7_custom_style_3_button_hover",$cf7_custom_style_3_button_hover);

        $cf7_custom_style_3_textarea_height = new QodeField("text", "cf7_custom_style_3_textarea_height", "", "Textarea Height (px)", "Enter height in px for textarea form element", array(), array("col_width" => 3));
        $panel3->addChild("cf7_custom_style_3_textarea_height", $cf7_custom_style_3_textarea_height);

    }
    add_action('qode_options_map','qode_contactform7_options_map',190);
}