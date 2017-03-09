<?php

if(!function_exists('qode_portfolio_options_map')) {
    /**
     * Portfolio options page
     */
    function qode_portfolio_options_map()
    {

        $portfolioPage = new QodeAdminPage("_portfolio", "Portfolio", "fa fa-camera-retro");
        qode_framework()->qodeOptions->addAdminPage("portfolioPage", $portfolioPage);

        //Portfolio Single Project

        $panel1 = new QodePanel("Portfolio Single Project", "porfolio_single_project");
        $portfolioPage->addChild("panel1", $panel1);

        $portfolio_style = new QodeField("select", "portfolio_style", "1", "Portfolio Type", 'Choose a default type for Single Project pages', array("1" => "Portfolio small images",
            "2" => "Portfolio small slider",
            "5" => "Portfolio big images",
            "3" => "Portfolio big slider",
            "4" => "Portfolio custom - in grid",
            "7" => "Portfolio custom - full width",
            "6" => "Portfolio gallery",
            "8" => "Portfolio big slider - modern",
        ));
        $panel1->addChild("portfolio_style", $portfolio_style);

        $portfolio_qode_like = new QodeField("onoff", "portfolio_qode_like", "on", "Likes", 'Enabling this option will turn on "Likes"');
        $panel1->addChild("portfolio_qode_like", $portfolio_qode_like);

        $lightbox_single_project = new QodeField("yesno", "lightbox_single_project", "yes", "Lightbox for Images", "Enabling this option will turn on lightbox functionality for projects with images.");
        $panel1->addChild("lightbox_single_project", $lightbox_single_project);

        $lightbox_video_single_project = new QodeField("yesno", "lightbox_video_single_project", "no", "Lightbox for Videos", "Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.");
        $panel1->addChild("lightbox_video_single_project", $lightbox_video_single_project);

        $portfolio_columns_number = new QodeField("select", "portfolio_columns_number", "2", "Number of Columns", 'Enter the number of columns for Portfolio Gallery type', array("2" => "2 columns",
            "3" => "3 columns",
            "4" => "4 columns"
        ));
        $panel1->addChild("portfolio_columns_number", $portfolio_columns_number);

        $portfolio_single_sidebar = new QodeField("select", "portfolio_single_sidebar", "default", "Sidebar Layout", "Choose a sidebar layout for Single Project pages", array("default" => "No Sidebar",
            "1" => "Sidebar 1/3 right",
            "2" => "Sidebar 1/4 right",
            "3" => "Sidebar 1/3 left",
            "4" => "Sidebar 1/4 left"
        ));
        $panel1->addChild("portfolio_single_sidebar", $portfolio_single_sidebar);

        $custom_sidebars = array();
        foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
            if (isUserMadeSidebar(ucwords($sidebar['name']))) {
                $custom_sidebars[$sidebar['id']] = ucwords($sidebar['name']);
            }
        }
        $portfolio_single_sidebar_custom_display = new QodeField("selectblank", "portfolio_single_sidebar_custom_display", "", "Sidebar to Display", "Choose a sidebar to display on Single Project pages", $custom_sidebars);
        $panel1->addChild("portfolio_single_sidebar_custom_display", $portfolio_single_sidebar_custom_display);

        $portfolio_single_slug = new QodeField("text", "portfolio_single_slug", "", "Portfolio Single Slug", 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect) ', array(), array("col_width" => 3));
        $panel1->addChild("portfolio_single_slug", $portfolio_single_slug);

        $disable_portfolio_single_title_label = new QodeField("yesno", "disable_portfolio_single_title_label", "no", "Disable Project Title Label", "Enabling this option will hide 'About This Project' label on portfolio single page");
        $panel1->addChild("disable_portfolio_single_title_label", $disable_portfolio_single_title_label);

        $portfolio_text_follow = new QodeField("portfoliofollow", "portfolio_text_follow", "portfolio_single_follow", "Sticky Side Text ", "Enabling this option will make side text sticky on Single Project pages");
        $panel1->addChild("portfolio_text_follow", $portfolio_text_follow);

        $portfolio_comments = new QodeField("yesno", "enable_portfolio_comments", "no", "Enable Comments", "Enabling this option will display comments on portfolio single page");
        $panel1->addChild("enable_portfolio_comments", $portfolio_comments);

        $portfolio_related = new QodeField("yesno", "enable_portfolio_related", "no", "Enable Related Portfolios", "Enabling this option will display related portfolios on portfolio single page", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_portfolio_related_container"));
        $panel1->addChild("enable_portfolio_related", $portfolio_related);

        $portfolio_related_container = new QodeContainer("portfolio_related_container", "enable_portfolio_related", "no");
        $panel1->addChild("portfolio_related_container", $portfolio_related_container);

        $portfolio_related_image_size = new QodeField("select", "portfolio_related_image_size", "", "Image Proportion", 'Select image proportion for related portfolio items.', array(
            "" => "Original",
            "portfolio-landscape" => "Landscape",
            "portfolio-portrait" => "Portrait",
            "portfolio-square" => "Square"
        ));
        $portfolio_related_container->addChild("portfolio_related_image_size", $portfolio_related_image_size);

        $enable_navigation_title = new QodeField("yesno", "enable_navigation_title", "no", "Show Title on Navigation", "Enabling this option will display title and categories on portfolio single navigation");
        $panel1->addChild("enable_navigation_title", $enable_navigation_title);

        $portfolio_navigation_through_same_category = new QodeField("yesno", "portfolio_navigation_through_same_category", "no", "Enable Pagination Through Same Category", "Enabling this option will make portfolio pagination sort through current category.");
        $panel1->addChild("portfolio_navigation_through_same_category", $portfolio_navigation_through_same_category);


        /* Portfolio List */

        $panel2 = new QodePanel("Portfolio List", "porfolio_list");
        $portfolioPage->addChild("panel2", $panel2);

        $group1 = new QodeGroup("Overlay Style", "Define styles overlay");
        $panel2->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $portfolio_list_overlay_color = new QodeField("colorsimple", "portfolio_list_overlay_color", "", "Overlay Color", "Choose overlay color");
        $row1->addChild("portfolio_list_overlay_color", $portfolio_list_overlay_color);
        $portfolio_list_overlay_opacity = new QodeField("textsimple", "portfolio_list_overlay_opacity", "", "Overlay Opacity (values 0-1)", "This is some description");
        $row1->addChild("portfolio_list_overlay_opacity", $portfolio_list_overlay_opacity);

        $group2 = new QodeGroup("Title Style (Standard and Masonry With Space)", "Define styles for title");
        $panel2->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $portfolio_list_standard_title_color = new QodeField("colorsimple", "portfolio_list_standard_title_color", "", "Text Color", "This is some description");
        $row1->addChild("portfolio_list_standard_title_color", $portfolio_list_standard_title_color);
        $portfolio_list_standard_title_hover_color = new QodeField("colorsimple", "portfolio_list_standard_title_hover_color", "", "Text Hover Color", "This is some description");
        $row1->addChild("portfolio_list_standard_title_hover_color", $portfolio_list_standard_title_hover_color);
        $portfolio_list_standard_title_fontsize = new QodeField("textsimple", "portfolio_list_standard_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("portfolio_list_standard_title_fontsize", $portfolio_list_standard_title_fontsize);
        $portfolio_list_standard_title_lineheight = new QodeField("textsimple", "portfolio_list_standard_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("portfolio_list_standard_title_lineheight", $portfolio_list_standard_title_lineheight);
        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $portfolio_list_standard_title_texttransform = new QodeField("selectblanksimple", "portfolio_list_standard_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("portfolio_list_standard_title_texttransform", $portfolio_list_standard_title_texttransform);
        $portfolio_list_standard_title_google_fonts = new QodeField("fontsimple", "portfolio_list_standard_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("portfolio_list_standard_title_google_fonts", $portfolio_list_standard_title_google_fonts);
        $portfolio_list_standard_title_fontstyle = new QodeField("selectblanksimple", "portfolio_list_standard_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("portfolio_list_standard_title_fontstyle", $portfolio_list_standard_title_fontstyle);
        $portfolio_list_standard_title_fontweight = new QodeField("selectblanksimple", "portfolio_list_standard_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("portfolio_list_standard_title_fontweight", $portfolio_list_standard_title_fontweight);
        $row3 = new QodeRow(true);
        $group2->addChild("row3", $row3);
        $portfolio_list_standard_title_letterspacing = new QodeField("textsimple", "portfolio_list_standard_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("portfolio_list_standard_title_letterspacing", $portfolio_list_standard_title_letterspacing);

        $group3 = new QodeGroup("Category Style (Standard and Masonry With Space)", "Define styles for category");
        $panel2->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $portfolio_list_standard_category_color = new QodeField("colorsimple", "portfolio_list_standard_category_color", "", "Text Color", "This is some description");
        $row1->addChild("portfolio_list_standard_category_color", $portfolio_list_standard_category_color);
        $portfolio_list_standard_category_fontsize = new QodeField("textsimple", "portfolio_list_standard_category_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("portfolio_list_standard_category_fontsize", $portfolio_list_standard_category_fontsize);
        $portfolio_list_standard_category_lineheight = new QodeField("textsimple", "portfolio_list_standard_category_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("portfolio_list_standard_category_lineheight", $portfolio_list_standard_category_lineheight);
        $portfolio_list_standard_category_texttransform = new QodeField("selectblanksimple", "portfolio_list_standard_category_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("portfolio_list_standard_category_texttransform", $portfolio_list_standard_category_texttransform);
        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);
        $portfolio_list_standard_category_google_fonts = new QodeField("fontsimple", "portfolio_list_standard_category_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("portfolio_list_standard_category_google_fonts", $portfolio_list_standard_category_google_fonts);
        $portfolio_list_standard_category_fontstyle = new QodeField("selectblanksimple", "portfolio_list_standard_category_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("portfolio_list_standard_category_fontstyle", $portfolio_list_standard_category_fontstyle);
        $portfolio_list_standard_category_fontweight = new QodeField("selectblanksimple", "portfolio_list_standard_category_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("portfolio_list_standard_category_fontweight", $portfolio_list_standard_category_fontweight);
        $portfolio_list_standard_category_letterspacing = new QodeField("textsimple", "portfolio_list_standard_category_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("portfolio_list_standard_category_letterspacing", $portfolio_list_standard_category_letterspacing);

        $group4 = new QodeGroup("Title Style (Hover Text, Masonry Without Space, Masonry With Space (only image) and Justified Gallery)", "Define styles for title");
        $panel2->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $portfolio_list_gallery_title_color = new QodeField("colorsimple", "portfolio_list_gallery_title_color", "", "Text Color", "This is some description");
        $row1->addChild("portfolio_list_gallery_title_color", $portfolio_list_gallery_title_color);
        $portfolio_list_gallery_title_hover_color = new QodeField("colorsimple", "portfolio_list_gallery_title_hover_color", "", "Text Hover Color", "This is some description");
        $row1->addChild("portfolio_list_gallery_title_hover_color", $portfolio_list_gallery_title_hover_color);
        $portfolio_list_gallery_title_fontsize = new QodeField("textsimple", "portfolio_list_gallery_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("portfolio_list_gallery_title_fontsize", $portfolio_list_gallery_title_fontsize);
        $portfolio_list_gallery_title_lineheight = new QodeField("textsimple", "portfolio_list_gallery_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("portfolio_list_gallery_title_lineheight", $portfolio_list_gallery_title_lineheight);

        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $portfolio_list_gallery_title_texttransform = new QodeField("selectblanksimple", "portfolio_list_gallery_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("portfolio_list_gallery_title_texttransform", $portfolio_list_gallery_title_texttransform);
        $portfolio_list_gallery_title_google_fonts = new QodeField("fontsimple", "portfolio_list_gallery_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("portfolio_list_gallery_title_google_fonts", $portfolio_list_gallery_title_google_fonts);
        $portfolio_list_gallery_title_fontstyle = new QodeField("selectblanksimple", "portfolio_list_gallery_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("portfolio_list_gallery_title_fontstyle", $portfolio_list_gallery_title_fontstyle);
        $portfolio_list_gallery_title_fontweight = new QodeField("selectblanksimple", "portfolio_list_gallery_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("portfolio_list_gallery_title_fontweight", $portfolio_list_gallery_title_fontweight);
        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);
        $portfolio_list_gallery_title_letterspacing = new QodeField("textsimple", "portfolio_list_gallery_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("portfolio_list_gallery_title_letterspacing", $portfolio_list_gallery_title_letterspacing);

        $group5 = new QodeGroup("Category Style (Hover Text, Masonry Without Space, Masonry With Space (only image) and Justified Gallery)", "Define styles for category");
        $panel2->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $portfolio_list_gallery_category_color = new QodeField("colorsimple", "portfolio_list_gallery_category_color", "", "Text Color", "This is some description");
        $row1->addChild("portfolio_list_gallery_category_color", $portfolio_list_gallery_category_color);
        $portfolio_list_gallery_category_fontsize = new QodeField("textsimple", "portfolio_list_gallery_category_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("portfolio_list_gallery_category_fontsize", $portfolio_list_gallery_category_fontsize);
        $portfolio_list_gallery_category_lineheight = new QodeField("textsimple", "portfolio_list_gallery_category_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("portfolio_list_gallery_category_lineheight", $portfolio_list_gallery_category_lineheight);
        $portfolio_list_gallery_category_texttransform = new QodeField("selectblanksimple", "portfolio_list_gallery_category_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("portfolio_list_gallery_category_texttransform", $portfolio_list_gallery_category_texttransform);
        $row2 = new QodeRow(true);
        $group5->addChild("row2", $row2);
        $portfolio_list_gallery_category_google_fonts = new QodeField("fontsimple", "portfolio_list_gallery_category_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("portfolio_list_gallery_category_google_fonts", $portfolio_list_gallery_category_google_fonts);
        $portfolio_list_gallery_category_fontstyle = new QodeField("selectblanksimple", "portfolio_list_gallery_category_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("portfolio_list_gallery_category_fontstyle", $portfolio_list_gallery_category_fontstyle);
        $portfolio_list_gallery_category_fontweight = new QodeField("selectblanksimple", "portfolio_list_gallery_category_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("portfolio_list_gallery_category_fontweight", $portfolio_list_gallery_category_fontweight);
        $portfolio_list_gallery_category_letterspacing = new QodeField("textsimple", "portfolio_list_gallery_category_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("portfolio_list_gallery_category_letterspacing", $portfolio_list_gallery_category_letterspacing);

        $group6 = new QodeGroup("Category Filter Style", "Define styles for category filter holder");
        $panel2->addChild("group6", $group6);

        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);

        $portfolio_list_filter_background_color = new QodeField("colorsimple", "portfolio_list_filter_background_color", "", "Background Color", "Choose color for background of filter area");
        $row1->addChild("portfolio_list_filter_background_color", $portfolio_list_filter_background_color);
        $portfolio_list_filter_height = new QodeField("textsimple", "portfolio_list_filter_height", "", "Height (px)", "Enter height for filter area");
        $row1->addChild("portfolio_list_filter_height", $portfolio_list_filter_height);
        $portfolio_filter_margin_bottom = new QodeField("textsimple", "portfolio_filter_margin_bottom", "", "Bottom Margin (px)", "Enter bottom margin for filter area. Default value is 40");
        $row1->addChild("portfolio_filter_margin_bottom", $portfolio_filter_margin_bottom);

        $thin_icon_only_title = new QodeTitle('thin_icon_only', 'Thin Plus Only Hover');
        $panel2->addChild('thin_icon_only', $thin_icon_only_title);
        $thin_icon_font_family = new QodeField('font', 'thin_icon_only_font_family', '', 'Icon Font Family', 'Choose font family plus icon that appears on hover');
        $panel2->addChild('thin_icon_only_font_family', $thin_icon_font_family);
    }
    add_action('qode_options_map','qode_portfolio_options_map',110);
}