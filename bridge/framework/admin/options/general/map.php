<?php

if(!function_exists('qode_general_options_map')) {
    /**
     * General options page
     */
    function qode_general_options_map(){

        $generalPage = new QodeAdminPage("", "General", "fa fa-institution");
        qode_framework()->qodeOptions->addAdminPage("general", $generalPage);

        // Design Style

        $panel1 = new QodePanel("Design Style", "design_style");
        $generalPage->addChild("panel1", $panel1);

        $google_fonts = new QodeField("font", "google_fonts", "-1", "Font Family", "Choose a default Google font for your site");
        $panel1->addChild("google_fonts", $google_fonts);

        $additional_google_fonts = new QodeField("yesno","additional_google_fonts","no","Additional Google Fonts","", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_additional_google_font_container"));
        $panel1->addChild("additional_google_fonts",$additional_google_fonts);

        $additional_google_font_container = new QodeContainer("additional_google_font_container","additional_google_fonts","no");
        $panel1->addChild("additional_google_font_container",$additional_google_font_container);

        $additional_google_font1 = new QodeField("font","additional_google_font1","-1","Font Family","Choose additional Google font for your site");
        $additional_google_font_container->addChild("additional_google_font1",$additional_google_font1);

        $additional_google_font2 = new QodeField("font","additional_google_font2","-1","Font Family","Choose additional Google font for your site");
        $additional_google_font_container->addChild("additional_google_font2",$additional_google_font2);

        $additional_google_font3 = new QodeField("font","additional_google_font3","-1","Font Family","Choose additional Google font for your site");
        $additional_google_font_container->addChild("additional_google_font3",$additional_google_font3);

        $additional_google_font4 = new QodeField("font","additional_google_font4","-1","Font Family","Choose additional Google font for your site");
        $additional_google_font_container->addChild("additional_google_font4",$additional_google_font4);

        $additional_google_font5 = new QodeField("font","additional_google_font5","-1","Font Family","Choose additional Google font for your site");
        $additional_google_font_container->addChild("additional_google_font5",$additional_google_font5);

        $first_color = new QodeField("color", "first_color", "", "First Main Color", "Choose the most dominant theme color");
        $panel1->addChild("first_color", $first_color);

        $second_color = new QodeField("color", "second_color", "", "Second Main Color", "Choose the second most dominant theme color");
        $panel1->addChild("second_color", $second_color);

        $third_color = new QodeField("color", "third_color", "", "Third Main Color", "Choose the third most dominant theme color");
        $panel1->addChild("third_color", $third_color);

        $fourth_color = new QodeField("color", "fourth_color", "", "Fourth Main Color", "Choose the fourth most dominant theme color");
        $panel1->addChild("fourth_color", $fourth_color);

        $background_color = new QodeField("color", "background_color", "", "Content Background Color", "Choose the background color for page content area ");
        $panel1->addChild("background_color", $background_color);

        $background_color_boxes = new QodeField("color", "background_color_boxes", "", "Box Background Color", "Choose the background color for portfolio and blog boxes");
        $panel1->addChild("background_color_boxes", $background_color_boxes);

        $selection_color = new QodeField("color", "selection_color", "", "Text Selection Color", "Choose the color users see when selecting text");
        $panel1->addChild("selection_color", $selection_color);

        $group_gradient = qode_add_admin_group(array(
            'name'        => 'group_gradient',
            'title'       => 'Gradient Colors',
            'description' => 'Define colors for gradient styles',
            'parent'      => $panel1
        ));

            $row_gradient_style1 = qode_add_admin_row(array(
                'name'   => 'row_gradient_style1',
                'parent' => $group_gradient
            ));

                qode_add_admin_field(array(
                    'type'          => 'colorsimple',
                    'name'          => 'gradient_style1_start_color',
                    'default_value' => '#31c8a2',
                    'label'         => 'Style 1 - Start Color (def. #31c8a2)',
                    'parent'        => $row_gradient_style1
                ));

                qode_add_admin_field(array(
                    'type'          => 'colorsimple',
                    'name'          => 'gradient_style1_end_color',
                    'default_value' => '#ae66fd',
                    'label'         => 'Style 1 - End Color (def. #ae66fd)',
                    'parent'        => $row_gradient_style1
                ));

        $transparent_content = new QodeField("yesno","transparent_content","no","Enable Uniform Site Background","If enabled, content background on pages will be transparent (unless set otherwise) and the background you set here will show", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_transparent_content_container"));
        $panel1->addChild("transparent_content",$transparent_content);

            $transparent_content_container = new QodeContainer("transparent_content_container","transparent_content","no");
            $panel1->addChild("transparent_content_container",$transparent_content_container);

            $transparent_content_background_color = new QodeField("color","transparent_content_background_color","","Background Color","Choose body background color. Default color is #ffffff.");
            $transparent_content_container->addChild("transparent_content_background_color",$transparent_content_background_color);

            $transparent_content_background_image = new QodeField("image","transparent_content_background_image","","Background Image","Choose an image to be displayed in background");
            $transparent_content_container->addChild("transparent_content_background_image",$transparent_content_background_image);

            $transparent_content_pattern_background_image = new QodeField("image","transparent_content_pattern_background_image","","Background Pattern","Choose an image to be used as background pattern");
            $transparent_content_container->addChild("transparent_content_pattern_background_image",$transparent_content_pattern_background_image);

        $overlapping_content = new QodeField("yesno", "overlapping_content", "no", "Enable Overlapping Content", "Enabling this option will make content overlap title area or slider for set amount of pixels", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_overlapping_content_container"));
        $panel1->addChild("overlapping_content", $overlapping_content);

        $overlapping_content_container = new QodeContainer("overlapping_content_container", "overlapping_content", "no");
        $panel1->addChild("overlapping_content_container", $overlapping_content_container);

        $overlapping_content_amount = new QodeField("text", "overlapping_content_amount", "", "Overlapping amount (px)", "Enter amount of pixels you would like content to overlap title area or slider", array(), array("col_width" => 1));
        $overlapping_content_container->addChild("overlapping_content_amount", $overlapping_content_amount);

        $overlapping_content_padding = new QodeField("text", "overlapping_content_padding", "", "Overlapping left/right padding (px)", "This option takes effect only on Default (in grid) templates", array(), array("col_width" => 1));
        $overlapping_content_container->addChild("overlapping_content_padding", $overlapping_content_padding);

        $boxed = new QodeField("yesno", "boxed", "no", "Boxed layout", "Enabling this option will display site content in grid", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_boxed_container"));
        $panel1->addChild("boxed", $boxed);

        $boxed_container = new QodeContainer("boxed_container", "boxed", "no");
        $panel1->addChild("boxed_container", $boxed_container);

        $background_color_box = new QodeField("color", "background_color_box", "", "Page Background Color", "Choose the page background (body) color");
        $boxed_container->addChild("background_color_box", $background_color_box);

        $background_image = new QodeField("image", "background_image", "", "Background Image", "Choose an image to be displayed in background");
        $boxed_container->addChild("background_image", $background_image);

        $pattern_background_image = new QodeField("image", "pattern_background_image", "", "Background Pattern", "Choose an image to be used as background pattern");
        $boxed_container->addChild("pattern_background_image", $pattern_background_image);

        $paspartu = new QodeField("yesno", "paspartu", "no", "Passepartout", "Enabling this option will display passepartout around site content", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_paspartu_container"));
        $panel1->addChild("paspartu", $paspartu);

        $paspartu_container = new QodeContainer("paspartu_container", "paspartu", "no");
        $panel1->addChild("paspartu_container", $paspartu_container);

        $paspartu_color = new QodeField("color", "paspartu_color", "", "Passepartout Color", "Choose passepartout color, default value is #ffffff");
        $paspartu_container->addChild("paspartu_color", $paspartu_color);

        $paspartu_width = new QodeField("text", "paspartu_width", "", "Passepartout Size (%)", "Enter size amount for passepartout, default value is 2% (the percent is in relation to site width)", array(), array("col_width" => 3));
        $paspartu_container->addChild("paspartu_width", $paspartu_width);

        $paspartu_header_alignment = new QodeField("yesno", "paspartu_header_alignment", "no", "Align Header With Passepartout", "Enabling this option will set header content within passepartout");
        $paspartu_container->addChild("paspartu_header_alignment", $paspartu_header_alignment);

        $paspartu_header_inside = new QodeField("yesno", "paspartu_header_inside", "no", "Set Header Inside Passepartout", "Enabling this option will set the whole header between the left and right border of passepartout");
        $paspartu_container->addChild("paspartu_header_inside", $paspartu_header_inside);

        $vertical_menu_inside_paspartu = new QodeField("yesno", "vertical_menu_inside_paspartu", "yes", "Vertical Menu Inside Passepartout", "");
        $paspartu_container->addChild("vertical_menu_inside_paspartu", $vertical_menu_inside_paspartu);

        $paspartu_footer_alignment = new QodeField("yesno", "paspartu_footer_alignment", "no", "Align Footer With Passepartout", "Enabling this option will align footer content with passepartout borders");
        $paspartu_container->addChild("paspartu_footer_alignment", $paspartu_footer_alignment);

        $paspartu_on_top = new QodeField("yesno", "paspartu_on_top", "yes", "Top Passepartout", "Disabling this option will disable top part of passepartout", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_paspartu_on_top_fixed_container"));
        $paspartu_container->addChild("paspartu_on_top", $paspartu_on_top);

        $paspartu_on_top_fixed_container = new QodeContainer("paspartu_on_top_fixed_container", "paspartu_on_top", "no");
        $paspartu_container->addChild("paspartu_on_top_fixed_container", $paspartu_on_top_fixed_container);

        $paspartu_on_top_fixed = new QodeField("yesno", "paspartu_on_top_fixed", "no", "Fix Top Passepartout", "Enabling this option will fix top part of passepartout to the top of the screen");
        $paspartu_on_top_fixed_container->addChild("paspartu_on_top_fixed", $paspartu_on_top_fixed);

        $paspartu_on_bottom_slider_container = new QodeContainer("paspartu_on_bottom_slider_container", "", "");
        $paspartu_container->addChild("paspartu_on_bottom_slider_container", $paspartu_on_bottom_slider_container);

        $paspartu_on_bottom_slider = new QodeField("yesno", "paspartu_on_bottom_slider", "no", "Show Bottom Passepartout on Qode Slider", "Enabling this option will show bottom passepartout on Qode Slider");
        $paspartu_on_bottom_slider_container->addChild("paspartu_on_bottom_slider", $paspartu_on_bottom_slider);

        $paspartu_on_bottom = new QodeField("yesno", "paspartu_on_bottom", "yes", "Bottom Passepartout", "Disabling this option will disable bottom part of passepartout", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_paspartu_on_bottom_fixed_container"));
        $paspartu_container->addChild("paspartu_on_bottom", $paspartu_on_bottom);

        $paspartu_on_bottom_fixed_container = new QodeContainer("paspartu_on_bottom_fixed_container", "paspartu_on_bottom", "no");
        $paspartu_container->addChild("paspartu_on_bottom_fixed_container", $paspartu_on_bottom_fixed_container);

        $paspartu_on_bottom_fixed = new QodeField("yesno", "paspartu_on_bottom_fixed", "no", "Fix Bottom Passepartout", "Enabling this option will fix bottom part of passepartout to the bottom of the screen");
        $paspartu_on_bottom_fixed_container->addChild("paspartu_on_bottom_fixed", $paspartu_on_bottom_fixed);

        $enable_content_top_margin = new QodeField("yesno", "enable_content_top_margin", "no", "Always put content below header", "Enabling this option always will put content below header");
        $panel1->addChild("enable_content_top_margin", $enable_content_top_margin);

        $initial_content_width = new QodeField("select", "initial_content_width", "grid_1100", "Initial Width of Content", 'Choose the initial width of content which is in grid',
            array(
                "grid_1100" => "1100px (default)",
                "grid_1200" => "1200px",
                "grid_1300" => "1300px"
            )
        );
        $panel1->addChild("initial_content_width", $initial_content_width);

        // Settings

        $panel4 = new QodePanel("Settings", "settings");
        $generalPage->addChild("panel4", $panel4);

        $page_transitions = new QodeField("select", "page_transitions", "0", "Page Transition", 'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', array(0 => "No animation",
            1 => "Up/Down",
            2 => "Fade",
            3 => "Up/Down (In) / Fade (Out)",
            4 => "Left/Right"
        ), array("dependence" => true,
			"hide" => array(
				"0"=>"#qodef_ajax_animate_header_container",
				"1"=>"#qodef_ajax_animate_header_container",
				"2"=>"",
				"3"=>"",
				"4"=>"#qodef_ajax_animate_header_container"
			),
			"show" => array(
				"0"=>"",
				"1"=>"",
				"2"=>"#qodef_ajax_animate_header_container",
				"3"=>"#qodef_ajax_animate_header_container",
				"4"=>""
			) 
		), "enable_grid_elements", array("yes"));
        $panel4->addChild("page_transitions", $page_transitions);

        $page_transitions_notice = new QodeNotice("Page Transition", 'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', "AJAX Page transitions are disabled due to VC Grid Elements", "enable_grid_elements", "no");
        $panel4->addChild("page_transitions_notice", $page_transitions_notice);
	
		$ajax_animate_header_container = new QodeContainer("ajax_animate_header_container","page_transitions","0");
		$panel4->addChild("ajax_animate_header_container",$ajax_animate_header_container);
		
		$ajax_animate_header = new QodeField("yesno","ajax_animate_header","no","Animate Header","Enabling this option will include the header area in the Ajax Page Transition Animations");
		$ajax_animate_header_container->addChild("ajax_animate_header",$ajax_animate_header);

        $loading_animation = new QodeField("onoff", "loading_animation", "off", "Loading Animation", "Enabling this option will display animation while page loads", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_loading_animation_container"));
        $panel4->addChild("loading_animation", $loading_animation);

        $loading_animation_container = new QodeContainer("loading_animation_container", "loading_animation", "off");
        $panel4->addChild("loading_animation_container", $loading_animation_container);

        $group1 = new QodeGroup("Loading Animation Graphic", "Choose type and color of preload graphic animation");
        $loading_animation_container->addChild("group1", $group1);

        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);

        $loading_animation_spinner = new QodeField("selectsimple", "loading_animation_spinner", "pulse", "Spinner", "This is some description", array("pulse" => "Pulse",
            "double_pulse" => "Double Pulse",
            "cube" => "Cube",
            "rotating_cubes" => "Rotating Cubes",
            "stripes" => "Stripes",
            "wave" => "Wave",
            "two_rotating_circles" => "2 Rotating Circles",
            "five_rotating_circles" => "5 Rotating Circles"
        ));
        $row1->addChild("loading_animation_spinner", $loading_animation_spinner);

        $spinner_color = new QodeField("colorsimple", "spinner_color", "", "Spinner Color", "This is some description");
        $row1->addChild("spinner_color", $spinner_color);

        $loading_image = new QodeField("image", "loading_image", "", "Loading Image", 'Upload custom image to be displayed while page loads (Note: Page Transition must not be set to "No Animation")');
        $loading_animation_container->addChild("loading_image", $loading_image);

        $loading_animation_left_menu_alignment = new QodeField("yesno", "loading_animation_left_menu_alignment", "no", "Center Loading Animation to Browser Window", 'Enabling this option will center loading animation in regard to browser window instead of in regard to content when left menu is enabled');
        $loading_animation_container->addChild("loading_animation_left_menu_alignment", $loading_animation_left_menu_alignment);

        $smooth_scroll = new QodeField("yesno", "smooth_scroll", "yes", "Smooth Scroll", "Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)");
        $panel4->addChild("smooth_scroll", $smooth_scroll);

        $elements_animation_on_touch = new QodeField("yesno", "elements_animation_on_touch", "no", "Elements Animation on Mobile/Touch Devices", "Enabling this option will allow elements (shortcodes) to animate on mobile / touch devices");
        $panel4->addChild("elements_animation_on_touch", $elements_animation_on_touch);

        $show_back_button = new QodeField("yesno", "show_back_button", "yes", "Show 'Back To Top Button'", "Enabling this option will display a Back to Top button on every page");
        $panel4->addChild("show_back_button", $show_back_button);

        $responsiveness = new QodeField("yesno", "responsiveness", "yes", "Responsiveness", "Enabling this option will make all pages responsive");
        $panel4->addChild("responsiveness", $responsiveness);

        $content_sidebar_responsiveness = new QodeField("yesno", "content_sidebar_responsiveness", "no", "Sidebar Responsiveness for Tablet Devices (Portrait View)", "Enabling this option will enable responsive sidebar on tablet devices in portrait view. Default behavior is for responsive sidebar to be enabled in Mobile View");
        $panel4->addChild("content_sidebar_responsiveness", $content_sidebar_responsiveness);

        $favicon_image = new QodeField("image", "favicon_image", QODE_ROOT . "/img/favicon.ico", "Favicon Image", "Choose a favicon image to be displayed");
        $panel4->addChild("favicon_image", $favicon_image);

        $internal_no_ajax_links = new QodeField("textarea", "internal_no_ajax_links", "", "List of Internal URLs Loaded Without AJAX (Separated With Comma)", "To disable AJAX transitions on certain pages, enter their full URLs here (for example: http://www.mydomain.com/forum/)");
        $panel4->addChild("internal_no_ajax_links", $internal_no_ajax_links);

        // Custom Code

        $panel3 = new QodePanel("Custom Code", "custom_code");
        $generalPage->addChild("panel3", $panel3);

        $custom_css = new QodeField("textarea", "custom_css", "", "Custom CSS", "Enter your custom CSS here");
        $panel3->addChild("custom_css", $custom_css);

        $custom_svg_css = new QodeField("textarea", "custom_svg_css", "", "Custom SVG CSS", "Enter your SVG CSS here");
        $panel3->addChild("custom_svg_css", $custom_svg_css);

        $custom_js = new QodeField("textarea", "custom_js", "", "Custom JS", 'Enter your custom Javascript here (jQuery selector is "$j" because of the conflict mode)');
        $panel3->addChild("custom_js", $custom_js);

        // SEO

        $panel2 = new QodePanel("SEO", "seo");
        $generalPage->addChild("panel2", $panel2);

        $google_analytics_code = new QodeField("text", "google_analytics_code", "", "Google Analytics Account ID", "With this field you can monitor traffic on your website");
        $panel2->addChild("google_analytics_code", $google_analytics_code);

        $disable_qode_seo = new QodeField("yesno", "disable_qode_seo", "no", "Disable Qode SEO", "Enabling this option will turn off Qode SEO", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "#qodef_disable_qode_seo_container",
                "dependence_show_on_yes" => ""));
        $panel2->addChild("disable_qode_seo", $disable_qode_seo);

        $disable_qode_seo_container = new QodeContainer("disable_qode_seo_container", "disable_qode_seo", "yes");
        $panel2->addChild("disable_qode_seo_container", $disable_qode_seo_container);

        $meta_keywords = new QodeField("textarea", "meta_keywords", "", "Meta Keywords", "Add relevant keywords separated with commas to improve SEO");
        $disable_qode_seo_container->addChild("meta_keywords", $meta_keywords);

        $meta_description = new QodeField("textarea", "meta_description", "", "Meta Description", "Enter a short description of the website for SEO");
        $disable_qode_seo_container->addChild("meta_description", $meta_description);


		// Google Maps

		$panel_google_maps = new QodePanel("Google Maps", "google_maps");
		$generalPage->addChild("panel_google_maps", $panel_google_maps);

		$google_maps_api_key = new QodeField("text", "google_maps_api_key", "", "Google Maps Api Key", "Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation. Temporarily you can use 'AIzaSyCwbt1Y6Mzwn-f0Jn3xxXDHgsGqpfRxSiU'");
		$panel_google_maps->addChild("google_maps_api_key", $google_maps_api_key);

    }

    add_action('qode_options_map','qode_general_options_map',10);
}