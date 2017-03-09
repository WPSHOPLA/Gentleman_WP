<?php

if(!function_exists('qode_sidebar_options_map')) {
    /**
     * Sidebar options page
     */
    function qode_sidebar_options_map()
    {

        $sidebarPage = new QodeAdminPage("_sidebar", "Sidebar", "fa fa-bars");
        qode_framework()->qodeOptions->addAdminPage("sidebarPage", $sidebarPage);

        //Widgets style

        $panel1 = new QodePanel("Widgets Style", "widget_panel");
        $sidebarPage->addChild("panel1", $panel1);

        $group1 = new QodeGroup("Title Style", "Define styles for widgets title");
        $panel1->addChild("group1", $group1);

        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);

        $sidebar_title_color = new QodeField("colorsimple", "sidebar_title_color", "", "Text Color", "This is some description");
        $row1->addChild("sidebar_title_color", $sidebar_title_color);

        $sidebar_title_fontsize = new QodeField("textsimple", "sidebar_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("sidebar_title_fontsize", $sidebar_title_fontsize);

        $sidebar_title_lineheight = new QodeField("textsimple", "sidebar_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("sidebar_title_lineheight", $sidebar_title_lineheight);

        $sidebar_title_texttransform = new QodeField("selectblanksimple", "sidebar_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("sidebar_title_texttransform", $sidebar_title_texttransform);

        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);

        $sidebar_title_google_fonts = new QodeField("fontsimple", "sidebar_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("sidebar_title_google_fonts", $sidebar_title_google_fonts);

        $sidebar_title_fontstyle = new QodeField("selectblanksimple", "sidebar_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("sidebar_title_fontstyle", $sidebar_title_fontstyle);

        $sidebar_title_fontweight = new QodeField("selectblanksimple", "sidebar_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("sidebar_title_fontweight", $sidebar_title_fontweight);

        $sidebar_title_letterspacing = new QodeField("textsimple", "sidebar_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("sidebar_title_letterspacing", $sidebar_title_letterspacing);

        $group2 = new QodeGroup("Text Style", "Define styles for widget text");
        $panel1->addChild("group2", $group2);

        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);

        $sidebar_text_color = new QodeField("colorsimple", "sidebar_text_color", "", "Text Color", "This is some description");
        $row1->addChild("sidebar_text_color", $sidebar_text_color);

        $sidebar_text_fontsize = new QodeField("textsimple", "sidebar_text_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("sidebar_text_fontsize", $sidebar_text_fontsize);

        $sidebar_text_lineheight = new QodeField("textsimple", "sidebar_text_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("sidebar_text_lineheight", $sidebar_text_lineheight);

        $sidebar_text_texttransform = new QodeField("selectblanksimple", "sidebar_text_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("sidebar_text_texttransform", $sidebar_text_texttransform);

        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);

        $sidebar_text_google_fonts = new QodeField("fontsimple", "sidebar_text_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("sidebar_text_google_fonts", $sidebar_text_google_fonts);

        $sidebar_text_fontstyle = new QodeField("selectblanksimple", "sidebar_text_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("sidebar_text_fontstyle", $sidebar_text_fontstyle);

        $sidebar_text_fontweight = new QodeField("selectblanksimple", "sidebar_text_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("sidebar_text_fontweight", $sidebar_text_fontweight);

        $sidebar_text_letterspacing = new QodeField("textsimple", "sidebar_text_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("sidebar_text_letterspacing", $sidebar_text_letterspacing);

        $group3 = new QodeGroup("Link Style", "Define styles for widget links");
        $panel1->addChild("group3", $group3);

        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);

        $sidebar_link_color = new QodeField("colorsimple", "sidebar_link_color", "", "Text Color", "This is some description");
        $row1->addChild("sidebar_link_color", $sidebar_link_color);

        $sidebar_link_hover_color = new QodeField("colorsimple", "sidebar_link_hover_color", "", "Text Hover Color", "This is some description");
        $row1->addChild("sidebar_link_hover_color", $sidebar_link_hover_color);

        $sidebar_link_fontsize = new QodeField("textsimple", "sidebar_link_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("sidebar_link_fontsize", $sidebar_link_fontsize);

        $sidebar_link_lineheight = new QodeField("textsimple", "sidebar_link_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("sidebar_link_lineheight", $sidebar_link_lineheight);

        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);

        $sidebar_link_texttransform = new QodeField("selectblanksimple", "sidebar_link_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("sidebar_link_texttransform", $sidebar_link_texttransform);

        $sidebar_link_google_fonts = new QodeField("fontsimple", "sidebar_link_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("sidebar_link_google_fonts", $sidebar_link_google_fonts);

        $sidebar_link_fontstyle = new QodeField("selectblanksimple", "sidebar_link_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("sidebar_link_fontstyle", $sidebar_link_fontstyle);

        $sidebar_link_fontweight = new QodeField("selectblanksimple", "sidebar_link_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("sidebar_link_fontweight", $sidebar_link_fontweight);

        $row3 = new QodeRow();
        $group3->addChild("row3", $row3);

        $sidebar_link_letterspacing = new QodeField("textsimple", "sidebar_link_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("sidebar_link_letterspacing", $sidebar_link_letterspacing);
    }
    add_action('qode_options_map','qode_sidebar_options_map',80);
}