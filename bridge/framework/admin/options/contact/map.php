<?php
if(!function_exists('qode_contact_options_map')) {
    /**
     * Contact options page
     */
    function qode_contact_options_map(){

        $contactPage = new QodeAdminPage("_contact", "Contact Page", "fa fa-envelope-o");
        qode_framework()->qodeOptions->addAdminPage("Contact Page", $contactPage);

        //Contact Form

        $panel1 = new QodePanel("Contact Page", "contact_page_panel");
        $contactPage->addChild("panel1", $panel1);

        $enable_google_map = new QodeField("yesno", "enable_google_map", "no", "Enable Google Map", "Enabling this option will display a Google Map on your Contact page", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_google_map_settings_panel"));
        $panel1->addChild("enable_google_map", $enable_google_map);

        $section_between_map_form = new QodeField("yesno", "section_between_map_form", "yes", "Show Upper Section", "Enabling this option will display a section between Map and Contact Form", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_upper_section_settings_panel"));
        $panel1->addChild("section_between_map_form", $section_between_map_form);

        $enable_contact_form = new QodeField("yesno", "enable_contact_form", "no", "Enable Contact Form", "This option will display a Contact Form on Contact page", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_contact_form_settings_panel"));
        $panel1->addChild("enable_contact_form", $enable_contact_form);

        //Google Map Settings

        $panel3 = new QodePanel("Google Map Settings", "google_map_settings_panel", "enable_google_map", "no");
        $contactPage->addChild("panel3", $panel3);

        $google_maps_address = new QodeField("text", "google_maps_address", "", "Google Map Address", 'Enter address to be pinned on Google Map (Example: "Louvre Museum, Paris, France');
        $panel3->addChild("google_maps_address", $google_maps_address);

        $google_maps_address2 = new QodeField("text", "google_maps_address2", "", "Google Map Address 2", "Enter additional address to be pinned on Google Map");
        $panel3->addChild("google_maps_address2", $google_maps_address2);

        $google_maps_address3 = new QodeField("text", "google_maps_address3", "", "Google Map Address 3", "Enter additional address to be pinned on Google Map");
        $panel3->addChild("google_maps_address3", $google_maps_address3);

        $google_maps_address4 = new QodeField("text", "google_maps_address4", "", "Google Map Address 4", "Enter additional address to be pinned on Google Map");
        $panel3->addChild("google_maps_address4", $google_maps_address4);

        $google_maps_address5 = new QodeField("text", "google_maps_address5", "", "Google Map Address 5", "Enter additional address to be pinned on Google Map");
        $panel3->addChild("google_maps_address5", $google_maps_address5);

        $google_maps_pin_image = new QodeField("image", "google_maps_pin_image", QODE_ROOT . "/img/pin.png", "Pin Image", "Select a pin image to be used on Google Map ");
        $panel3->addChild("google_maps_pin_image", $google_maps_pin_image);

        $google_maps_height = new QodeField("text", "google_maps_height", "750", "Map Height (px)", "Enter a height for Google Map in pixels");
        $panel3->addChild("google_maps_height", $google_maps_height);

        $google_maps_zoom = new QodeField("range", "google_maps_zoom", "12", "Map Zoom", "Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)", array(), array("range_min" => "3",
            "range_max" => "19",
            "range_step" => "1",
            "range_decimals" => "0"
        ));
        $panel3->addChild("google_maps_zoom", $google_maps_zoom);

        $google_maps_scroll_wheel = new QodeField("yesno", "google_maps_scroll_wheel", "no", "Zoom Map on Mouse Wheel", "Enabling this option will allow users to zoom in on Map using mouse wheel");
        $panel3->addChild("google_maps_scroll_wheel", $google_maps_scroll_wheel);

        $google_maps_style = new QodeField("yesno", "google_maps_style", "yes", "Custom Map Style", "Enabling this option will allow Map editing", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_google_maps_style_container"));
        $panel3->addChild("google_maps_style", $google_maps_style);

        $google_maps_style_container = new QodeContainer("google_maps_style_container", "google_maps_style", "no");
        $panel3->addChild("google_maps_style_container", $google_maps_style_container);

        $google_maps_color = new QodeField("color", "google_maps_color", "", "Color Overlay", "Choose a Map color overlay");
        $google_maps_style_container->addChild("google_maps_color", $google_maps_color);

        $google_maps_saturation = new QodeField("range", "google_maps_saturation", "", "Saturation", "Choose a level of saturation (-100 = least saturated, 100 = most saturated)", array(), array("range_min" => "-100",
            "range_max" => "100",
            "range_step" => "1",
            "range_decimals" => "0"
        ));
        $google_maps_style_container->addChild("google_maps_saturation", $google_maps_saturation);

        $google_maps_lightness = new QodeField("range", "google_maps_lightness", "", "Lightness", "Choose a level of lightness (-100 = darkest, 100 = lightest)", array(), array("range_min" => "-100",
            "range_max" => "100",
            "range_step" => "1",
            "range_decimals" => "0"
        ));
        $google_maps_style_container->addChild("google_maps_lightness", $google_maps_lightness);

        //Upper Section Settings

        $panel4 = new QodePanel("Upper Section Settings", "upper_section_settings_panel", "section_between_map_form", "no");
        $contactPage->addChild("panel4", $panel4);

        $section_between_map_form_position = new QodeField("select", "section_between_map_form_position", "", "Section Alignment", "Choose an alignment for Upper Section", array("" => "Default",
            "left" => "Left",
            "right" => "Right",
            "center" => "Center"
        ));
        $panel4->addChild("section_between_map_form_position", $section_between_map_form_position);

        $contact_section_above_form_title = new QodeField("text", "contact_section_above_form_title", "", "Title", "Enter a title to be displayed in Upper Section");
        $panel4->addChild("contact_section_above_form_title", $contact_section_above_form_title);

        $contact_section_above_form_subtitle = new QodeField("text", "contact_section_above_form_subtitle", "", "Subtitle", "Enter a subtitle to be displayed in Upper Section");
        $panel4->addChild("contact_section_above_form_subtitle", $contact_section_above_form_subtitle);

        //Contact Form Settings

        $panel2 = new QodePanel("Contact Form Settings", "contact_form_settings_panel", "enable_contact_form", "no");
        $contactPage->addChild("panel2", $panel2);

        $receive_mail = new QodeField("text", "receive_mail", "", "Mail Send To", "Enter email address for receiving messages submitted through Contact Form");
        $panel2->addChild("receive_mail", $receive_mail);

        $email_from = new QodeField("text", "email_from", "", "Email From", 'Enter a default e-mail address to appear in "From" field when receiving emails through Contact Form');
        $panel2->addChild("email_from", $email_from);

        $email_subject = new QodeField("text", "email_subject", "", "Email Subject", 'Enter a default message to appear in "Subject" field when receiving emails through Contact Form');
        $panel2->addChild("email_subject", $email_subject);

        $hide_contact_form_website = new QodeField("yesno", "hide_contact_form_website", "no", "Hide Website Field", 'Enabling this option will hide the "Website" field on Contact Form');
        $panel2->addChild("hide_contact_form_website", $hide_contact_form_website);

        $contact_heading_above = new QodeField("text", "contact_heading_above", "", "Contact Form Heading", "Enter a heading to be displayed above Contact Form");
        $panel2->addChild("contact_heading_above", $contact_heading_above);

        $use_recaptcha = new QodeField("yesno", "use_recaptcha", "no", "Use reCAPTCHA", "Enabling this option will place a reCAPTCHA box under Contact Form", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_use_recaptcha_container"));
        $panel2->addChild("use_recaptcha", $use_recaptcha);

        $use_recaptcha_container = new QodeContainer("use_recaptcha_container", "use_recaptcha", "no");
        $panel2->addChild("use_recaptcha_container", $use_recaptcha_container);

        $recaptcha_public_key = new QodeField("text", "recaptcha_public_key", "", "reCAPTCHA Public Key", "Enter reCAPTCHA public key. For more info, see https://www.google.com/recaptcha");
        $use_recaptcha_container->addChild("recaptcha_public_key", $recaptcha_public_key);

        $recaptcha_private_key = new QodeField("text", "recaptcha_private_key", "", "reCAPTCHA Private Key", "Enter reCAPTCHA private key. For more info, see https://www.google.com/recaptcha");
        $use_recaptcha_container->addChild("recaptcha_private_key", $recaptcha_private_key);
    }
    add_action('qode_options_map','qode_contact_options_map',150);
}