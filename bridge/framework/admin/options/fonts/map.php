<?php

if(!function_exists('qode_fonts_options_map')) {
    /**
     * Fonts options page
     */
    function qode_fonts_options_map(){
        global $qode_options_proya;

        $fontsPage = new QodeAdminPage("_fonts", "Fonts", "fa fa-font");
        qode_framework()->qodeOptions->addAdminPage("fonts", $fontsPage);

        // Headings

        $panel1 = new QodePanel("Headings", "headings_panel");
        $fontsPage->addChild("panel1", $panel1);

        $group1 = new QodeGroup("H1 Style", "Define styles for H1 heading");
        $panel1->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $h1_color = new QodeField("colorsimple", "h1_color", "", "Text Color", "This is some description");
        $row1->addChild("h1_color", $h1_color);
        $h1_fontsize = new QodeField("textsimple", "h1_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("h1_fontsize", $h1_fontsize);
        $h1_lineheight = new QodeField("textsimple", "h1_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("h1_lineheight", $h1_lineheight);
        $h1_texttransform = new QodeField("selectblanksimple", "h1_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("h1_texttransform", $h1_texttransform);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $h1_google_fonts = new QodeField("fontsimple", "h1_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("h1_google_fonts", $h1_google_fonts);
        $h1_fontstyle = new QodeField("selectblanksimple", "h1_fontstyle", "", "Font Style", "This is some description",  qode_get_font_style_array());
        $row2->addChild("h1_fontstyle", $h1_fontstyle);
        $h1_fontweight = new QodeField("selectblanksimple", "h1_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("h1_fontweight", $h1_fontweight);
        $h1_letterspacing = new QodeField("textsimple", "h1_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("h1_letterspacing", $h1_letterspacing);

        $group2 = new QodeGroup("H2 Style", "Define styles for H2 heading");
        $panel1->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $h2_color = new QodeField("colorsimple", "h2_color", "", "Text Color", "This is some description");
        $row1->addChild("h2_color", $h2_color);
        $h2_fontsize = new QodeField("textsimple", "h2_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("h2_fontsize", $h2_fontsize);
        $h2_lineheight = new QodeField("textsimple", "h2_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("h2_lineheight", $h2_lineheight);
        $h2_texttransform = new QodeField("selectblanksimple", "h2_texttransform", "", "Text Transform", "This is some description",  qode_get_text_transform_array());
        $row1->addChild("h2_texttransform", $h2_texttransform);
        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $h2_google_fonts = new QodeField("fontsimple", "h2_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("h2_google_fonts", $h2_google_fonts);
        $h2_fontstyle = new QodeField("selectblanksimple", "h2_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("h2_fontstyle", $h2_fontstyle);
        $h2_fontweight = new QodeField("selectblanksimple", "h2_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("h2_fontweight", $h2_fontweight);
        $h2_letterspacing = new QodeField("textsimple", "h2_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("h2_letterspacing", $h2_letterspacing);

        $group3 = new QodeGroup("H3 Style", "Define styles for H3 heading");
        $panel1->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $h3_color = new QodeField("colorsimple", "h3_color", "", "Text Color", "This is some description");
        $row1->addChild("h3_color", $h3_color);
        $h3_fontsize = new QodeField("textsimple", "h3_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("h3_fontsize", $h3_fontsize);
        $h3_lineheight = new QodeField("textsimple", "h3_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("h3_lineheight", $h3_lineheight);
        $h3_texttransform = new QodeField("selectblanksimple", "h3_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("h3_texttransform", $h3_texttransform);
        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);
        $h3_google_fonts = new QodeField("fontsimple", "h3_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("h3_google_fonts", $h3_google_fonts);
        $h3_fontstyle = new QodeField("selectblanksimple", "h3_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("h3_fontstyle", $h3_fontstyle);
        $h3_fontweight = new QodeField("selectblanksimple", "h3_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("h3_fontweight", $h3_fontweight);
        $h3_letterspacing = new QodeField("textsimple", "h3_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("h3_letterspacing", $h3_letterspacing);

        $group4 = new QodeGroup("H4 Style", "Define styles for H4 heading");
        $panel1->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $h4_color = new QodeField("colorsimple", "h4_color", "", "Text Color", "This is some description");
        $row1->addChild("h4_color", $h4_color);
        $h4_fontsize = new QodeField("textsimple", "h4_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("h4_fontsize", $h4_fontsize);
        $h4_lineheight = new QodeField("textsimple", "h4_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("h4_lineheight", $h4_lineheight);
        $h4_texttransform = new QodeField("selectblanksimple", "h4_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("h4_texttransform", $h4_texttransform);
        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $h4_google_fonts = new QodeField("fontsimple", "h4_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("h4_google_fonts", $h4_google_fonts);
        $h4_fontstyle = new QodeField("selectblanksimple", "h4_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("h4_fontstyle", $h4_fontstyle);
        $h4_fontweight = new QodeField("selectblanksimple", "h4_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("h4_fontweight", $h4_fontweight);
        $h4_letterspacing = new QodeField("textsimple", "h4_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("h4_letterspacing", $h4_letterspacing);

        $group5 = new QodeGroup("H5 style", "Define styles for H5 heading");
        $panel1->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $h5_color = new QodeField("colorsimple", "h5_color", "", "Text Color", "This is some description");
        $row1->addChild("h5_color", $h5_color);
        $h5_fontsize = new QodeField("textsimple", "h5_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("h5_fontsize", $h5_fontsize);
        $h5_lineheight = new QodeField("textsimple", "h5_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("h5_lineheight", $h5_lineheight);
        $h5_texttransform = new QodeField("selectblanksimple", "h5_texttransform", "", "Text Transform", "This is some description",  qode_get_text_transform_array());
        $row1->addChild("h5_texttransform", $h5_texttransform);
        $row2 = new QodeRow(true);
        $group5->addChild("row2", $row2);
        $h5_google_fonts = new QodeField("fontsimple", "h5_google_fonts", "-1", "Font family", "This is some description");
        $row2->addChild("h5_google_fonts", $h5_google_fonts);
        $h5_fontstyle = new QodeField("selectblanksimple", "h5_fontstyle", "", "Font style", "This is some description", qode_get_font_style_array());
        $row2->addChild("h5_fontstyle", $h5_fontstyle);
        $h5_fontweight = new QodeField("selectblanksimple", "h5_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("h5_fontweight", $h5_fontweight);
        $h5_letterspacing = new QodeField("textsimple", "h5_letterspacing", "", "Letter spacing (px)", "This is some description");
        $row2->addChild("h5_letterspacing", $h5_letterspacing);

        $group6 = new QodeGroup("H6 Style", "Define styles for H6 heading");
        $panel1->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $h6_color = new QodeField("colorsimple", "h6_color", "", "Text Color", "This is some description");
        $row1->addChild("h6_color", $h6_color);
        $h6_fontsize = new QodeField("textsimple", "h6_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("h6_fontsize", $h6_fontsize);
        $h6_lineheight = new QodeField("textsimple", "h6_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("h6_lineheight", $h6_lineheight);
        $h6_texttransform = new QodeField("selectblanksimple", "h6_texttransform", "", "Text Transform", "This is some description",  qode_get_text_transform_array());
        $row1->addChild("h6_texttransform", $h6_texttransform);
        $row2 = new QodeRow(true);
        $group6->addChild("row2", $row2);
        $h6_google_fonts = new QodeField("fontsimple", "h6_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("h6_google_fonts", $h6_google_fonts);
        $h6_fontstyle = new QodeField("selectblanksimple", "h6_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("h6_fontstyle", $h6_fontstyle);
        $h6_fontweight = new QodeField("selectblanksimple", "h6_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("h6_fontweight", $h6_fontweight);
        $h6_letterspacing = new QodeField("textsimple", "h6_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("h6_letterspacing", $h6_letterspacing);

        $panel1_responsive_tablet = new QodePanel("Headings Responsive (Tablet Portrait View)", "headings_responsive_tablet_panel");
        $fontsPage->addChild("panel1_responsive_tablet", $panel1_responsive_tablet);

        $group1 = new QodeGroup("H1 Responsive Style", "Define responsive styles for H1 heading");
        $panel1_responsive_tablet->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $h1_fontsize_tablet = new QodeField("textsimple", "h1_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("h1_fontsize_tablet", $h1_fontsize_tablet);
        $h1_lineheight_tablet = new QodeField("textsimple", "h1_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("h1_lineheight_tablet", $h1_lineheight_tablet);
        $h1_letterspacing_tablet = new QodeField("textsimple", "h1_letterspacing_tablet", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h1_letterspacing_tablet", $h1_letterspacing_tablet);

        $group2 = new QodeGroup("H2 Responsive Style", "Define responsive styles for H2 heading");
        $panel1_responsive_tablet->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $h2_fontsize_tablet = new QodeField("textsimple", "h2_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("h2_fontsize_tablet", $h2_fontsize_tablet);
        $h2_lineheight_tablet = new QodeField("textsimple", "h2_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("h2_lineheight_tablet", $h2_lineheight_tablet);
        $h2_letterspacing_tablet = new QodeField("textsimple", "h2_letterspacing_tablet", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h2_letterspacing_tablet", $h2_letterspacing_tablet);

        $group3 = new QodeGroup("H3 Responsive Style", "Define responsive styles for H3 heading");
        $panel1_responsive_tablet->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $h3_fontsize_tablet = new QodeField("textsimple", "h3_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("h3_fontsize_tablet", $h3_fontsize_tablet);
        $h3_lineheight_tablet = new QodeField("textsimple", "h3_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("h3_lineheight_tablet", $h3_lineheight_tablet);
        $h3_letterspacing_tablet = new QodeField("textsimple", "h3_letterspacing_tablet", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h3_letterspacing_tablet", $h3_letterspacing_tablet);

        $group4 = new QodeGroup("H4 Responsive Style", "Define responsive styles for H4 heading");
        $panel1_responsive_tablet->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $h4_fontsize_tablet = new QodeField("textsimple", "h4_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("h4_fontsize_tablet", $h4_fontsize_tablet);
        $h4_lineheight_tablet = new QodeField("textsimple", "h4_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("h4_lineheight_tablet", $h4_lineheight_tablet);
        $h4_letterspacing_tablet = new QodeField("textsimple", "h4_letterspacing_tablet", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h4_letterspacing_tablet", $h4_letterspacing_tablet);

        $group5 = new QodeGroup("H5 Responsive Style", "Define responsive styles for H5 heading");
        $panel1_responsive_tablet->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $h5_fontsize_tablet = new QodeField("textsimple", "h5_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("h5_fontsize_tablet", $h5_fontsize_tablet);
        $h5_lineheight_tablet = new QodeField("textsimple", "h5_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("h5_lineheight_tablet", $h5_lineheight_tablet);
        $h5_letterspacing_tablet = new QodeField("textsimple", "h5_letterspacing_tablet", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("h5_letterspacing_tablet", $h5_letterspacing_tablet);

        $group6 = new QodeGroup("H6 Responsive Style", "Define responsive styles for H6 heading");
        $panel1_responsive_tablet->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $h6_fontsize_tablet = new QodeField("textsimple", "h6_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("h6_fontsize_tablet", $h6_fontsize_tablet);
        $h6_lineheight_tablet = new QodeField("textsimple", "h6_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("h6_lineheight_tablet", $h6_lineheight_tablet);
        $h6_letterspacing_tablet = new QodeField("textsimple", "h6_letterspacing_tablet", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h6_letterspacing_tablet", $h6_letterspacing_tablet);

        $panel1_responsive_mobile = new QodePanel("Headings Responsive (Mobile Devices)", "headings_responsive_mobile_panel");
        $fontsPage->addChild("panel1_responsive_mobile", $panel1_responsive_mobile);

        $group1 = new QodeGroup("H1 Responsive Style", "Define responsive styles for H1 heading");
        $panel1_responsive_mobile->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $h1_fontsize_mobile = new QodeField("textsimple", "h1_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("h1_fontsize_mobile", $h1_fontsize_mobile);
        $h1_lineheight_mobile = new QodeField("textsimple", "h1_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("h1_lineheight_mobile", $h1_lineheight_mobile);
        $h1_letterspacing_mobile = new QodeField("textsimple", "h1_letterspacing_mobile", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h1_letterspacing_mobile", $h1_letterspacing_mobile);

        $group2 = new QodeGroup("H2 Responsive Style", "Define responsive styles for H2 heading");
        $panel1_responsive_mobile->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $h2_fontsize_mobile = new QodeField("textsimple", "h2_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("h2_fontsize_mobile", $h2_fontsize_mobile);
        $h2_lineheight_mobile = new QodeField("textsimple", "h2_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("h2_lineheight_mobile", $h2_lineheight_mobile);
        $h2_letterspacing_mobile = new QodeField("textsimple", "h2_letterspacing_mobile", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h2_letterspacing_mobile", $h2_letterspacing_mobile);

        $group3 = new QodeGroup("H3 Responsive Style", "Define responsive styles for H3 heading");
        $panel1_responsive_mobile->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $h3_fontsize_mobile = new QodeField("textsimple", "h3_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("h3_fontsize_mobile", $h3_fontsize_mobile);
        $h3_lineheight_mobile = new QodeField("textsimple", "h3_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("h3_lineheight_mobile", $h3_lineheight_mobile);
        $h3_letterspacing_mobile = new QodeField("textsimple", "h3_letterspacing_mobile", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h3_letterspacing_mobile", $h3_letterspacing_mobile);

        $group4 = new QodeGroup("H4 Responsive Style", "Define responsive styles for H4 heading");
        $panel1_responsive_mobile->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $h4_fontsize_mobile = new QodeField("textsimple", "h4_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("h4_fontsize_mobile", $h4_fontsize_mobile);
        $h4_lineheight_mobile = new QodeField("textsimple", "h4_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("h4_lineheight_mobile", $h4_lineheight_mobile);
        $h4_letterspacing_mobile = new QodeField("textsimple", "h4_letterspacing_mobile", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h4_letterspacing_mobile", $h4_letterspacing_mobile);

        $group5 = new QodeGroup("H5 Responsive Style", "Define responsive styles for H5 heading");
        $panel1_responsive_mobile->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $h5_fontsize_mobile = new QodeField("textsimple", "h5_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("h5_fontsize_mobile", $h5_fontsize_mobile);
        $h5_lineheight_mobile = new QodeField("textsimple", "h5_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("h5_lineheight_mobile", $h5_lineheight_mobile);
        $h5_letterspacing_mobile = new QodeField("textsimple", "h5_letterspacing_mobile", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("h5_letterspacing_mobile", $h5_letterspacing_mobile);

        $group6 = new QodeGroup("H6 Responsive Style", "Define responsive styles for H6 heading");
        $panel1_responsive_mobile->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $h6_fontsize_mobile = new QodeField("textsimple", "h6_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("h6_fontsize_mobile", $h6_fontsize_mobile);
        $h6_lineheight_mobile = new QodeField("textsimple", "h6_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("h6_lineheight_mobile", $h6_lineheight_mobile);
        $h6_letterspacing_mobile = new QodeField("textsimple", "h6_letterspacing_mobile", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("h6_letterspacing_mobile", $h6_letterspacing_mobile);

        // Text

        $panel2 = new QodePanel("Text", "text_panel");
        $fontsPage->addChild("panel2", $panel2);

        $group1 = new QodeGroup("Paragraph", "Define styles for paragraph text");
        $panel2->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $text_color = new QodeField("colorsimple", "text_color", "", "Text Color", "This is some description");
        $row1->addChild("text_color", $text_color);
        $text_fontsize = new QodeField("textsimple", "text_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("text_fontsize", $text_fontsize);
        $text_lineheight = new QodeField("textsimple", "text_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("text_lineheight", $text_lineheight);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $text_google_fonts = new QodeField("fontsimple", "text_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("text_google_fonts", $text_google_fonts);
        $text_fontstyle = new QodeField("selectblanksimple", "text_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("text_fontstyle", $text_fontstyle);
        $text_fontweight = new QodeField("selectblanksimple", "text_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("text_fontweight", $text_fontweight);
        $text_margin = new QodeField("textsimple", "text_margin", "", "Top/Bottom Margin (px)", "This is some description");
        $row2->addChild("text_margin", $text_margin);

        $group1_tablet = new QodeGroup("Paragraph Responsive (Table Portrait View)", "Define responsive styles for paragraph text for table devices - portrait view");
        $panel2->addChild("group1_tablet", $group1_tablet);
        $row1 = new QodeRow();
        $group1_tablet->addChild("row1", $row1);
        $text_fontsize_tablet = new QodeField("textsimple", "text_fontsize_tablet", "", "Font Size (px)", "This is some description");
        $row1->addChild("text_fontsize_tablet", $text_fontsize_tablet);
        $text_lineheight_tablet = new QodeField("textsimple", "text_lineheight_tablet", "", "Line Height (px)", "This is some description");
        $row1->addChild("text_lineheight_tablet", $text_lineheight_tablet);
        $text_letterspacing_tablet = new QodeField("textsimple", "text_letterspacing_tablet", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("text_letterspacing_tablet", $text_letterspacing_tablet);

        $group2_mobile = new QodeGroup("Paragraph Responsive (Mobile Devices)", "Define responsive styles for paragraph text for mobile devices");
        $panel2->addChild("group2_mobile", $group2_mobile);
        $row1 = new QodeRow();
        $group2_mobile->addChild("row1", $row1);
        $text_fontsize_mobile = new QodeField("textsimple", "text_fontsize_mobile", "", "Font Size (px)", "This is some description");
        $row1->addChild("text_fontsize_mobile", $text_fontsize_mobile);
        $text_lineheight_mobile = new QodeField("textsimple", "text_lineheight_mobile", "", "Line Height (px)", "This is some description");
        $row1->addChild("text_lineheight_mobile", $text_lineheight_mobile);
        $text_letterspacing_mobile = new QodeField("textsimple", "text_letterspacing_mobile", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("text_letterspacing_mobile", $text_letterspacing_mobile);

        $group2 = new QodeGroup("Links", "Define styles for link text");
        $panel2->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $link_color = new QodeField("colorsimple", "link_color", "", "Text Color", "This is some description");
        $row1->addChild("link_color", $link_color);
        $link_hovercolor = new QodeField("colorsimple", "link_hovercolor", "", "Hover Text Color", "This is some description");
        $row1->addChild("link_hovercolor", $link_hovercolor);
        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $link_fontstyle = new QodeField("selectblanksimple", "link_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("link_fontstyle", $link_fontstyle);
        $link_fontweight = new QodeField("selectblanksimple", "link_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("link_fontweight", $link_fontweight);
        $link_fontdecoration = new QodeField("selectblanksimple", "link_fontdecoration", "", "Font Decoration", "This is some description", qode_get_text_decorations());
        $row2->addChild("link_fontdecoration", $link_fontdecoration);

        // Header & Menu

        $panel7 = new QodePanel("Header & Menu", "header_and_menu_panel");
        $fontsPage->addChild("panel7", $panel7);

        $group1 = new QodeGroup("1st Level Menu", "Define styles for 1st level in Top Navigation Menu");
        $panel7->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $menu_color = new QodeField("colorsimple", "menu_color", "", "Text Color", "This is some description");
        $row1->addChild("menu_color", $menu_color);
        $menu_hovercolor = new QodeField("colorsimple", "menu_hovercolor", "", "Hover Text Color", "This is some description");
        $row1->addChild("menu_hovercolor", $menu_hovercolor);
        $menu_activecolor = new QodeField("colorsimple", "menu_activecolor", "", "Active Text Color", "This is some description");
        $row1->addChild("menu_activecolor", $menu_activecolor);
        $menu_hover_background_color = new QodeField("colorsimple", "menu_hover_background_color", "", "Hover Text Background Color", "This is some description");
        $row1->addChild("menu_hover_background_color", $menu_hover_background_color);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $menu_google_fonts = new QodeField("fontsimple", "menu_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("menu_google_fonts", $menu_google_fonts);
        $menu_fontsize = new QodeField("textsimple", "menu_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("menu_fontsize", $menu_fontsize);
        $menu_lineheight = new QodeField("textsimple", "menu_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("menu_lineheight", $menu_lineheight);
        $menu_hover_background_color_transparency = new QodeField("textsimple", "menu_hover_background_color_transparency", "", "Hover Text Background Color Transparency", "This is some description");
        $row2->addChild("menu_hover_background_color_transparency", $menu_hover_background_color_transparency);
        $row3 = new QodeRow(true);
        $group1->addChild("row3", $row3);
        $menu_fontstyle = new QodeField("selectblanksimple", "menu_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("menu_fontstyle", $menu_fontstyle);
        $menu_fontweight = new QodeField("selectblanksimple", "menu_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("menu_fontweight", $menu_fontweight);
        $menu_letterspacing = new QodeField("textsimple", "menu_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("menu_letterspacing", $menu_letterspacing);
        $menu_text_transform = new QodeField("selectblanksimple", "menu_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("menu_text_transform", $menu_text_transform);

        if (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == 'no') {
            $row4 = new QodeRow(true);
            $group1->addChild("row4", $row4);
            $menu_separator_between_items = new QodeField("yesnosimple", "menu_separator_between_items", "no", "Show Separator Between Items", "This is some description");
            $row4->addChild("menu_separator_between_items", $menu_separator_between_items);
            $menu_separator_color = new QodeField("colorsimple", "menu_separator_color", "", "Separator Color", "This is some description");
            $row4->addChild("menu_separator_color", $menu_separator_color);
            $menu_padding_left_right = new QodeField("textsimple", "menu_padding_left_right", "", "Padding Left/Right (px)", "This is some description");
            $row4->addChild("menu_padding_left_right", $menu_padding_left_right);

            $row5 = new QodeRow(true);
            $group1->addChild("row5", $row5);
            $menu_item_border = new QodeField("yesnosimple", "menu_item_border", "no", "Show Border on Active/Hover Items", "");
            $row5->addChild("menu_item_border", $menu_item_border);
        }

        $row6 = new QodeRow(true);
        $group1->addChild("row6", $row6);
        $menu_underline_dash = new QodeField("yesnosimple", "menu_underline_dash", "no", "Show Underline Dash on Active/Hover Items", "", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_menu_underline_dash_container"));
        $row6->addChild("menu_underline_dash", $menu_underline_dash);

        $menu_underline_dash_container = new QodeContainerNoStyle("menu_underline_dash_container", "menu_underline_dash", "no");
        $row6->addChild("menu_underline_dash_container", $menu_underline_dash_container);

        $menu_underline_dash_color = new QodeField("colorsimple", "menu_underline_dash_color", "", "Dash Color (default is 'inherit' from text)", "");
        $menu_underline_dash_container->addChild("menu_underline_dash_color", $menu_underline_dash_color);

        $menu_underline_dash_width = new QodeField("textsimple", "menu_underline_dash_width", "", "Dash Width (px)", "");
        $menu_underline_dash_container->addChild("menu_underline_dash_width", $menu_underline_dash_width);

        $menu_underline_dash_height = new QodeField("textsimple", "menu_underline_dash_height", "", "Dash Height (px)", "");
        $menu_underline_dash_container->addChild("menu_underline_dash_height", $menu_underline_dash_height);

        $menu_underline_dash_alignment = new QodeField("selectsimple", "menu_underline_dash_alignment", "center", "Dash Alignment", "", array(
                "center" => "Center",
                "left" => "Left",
                "right" => "Right")
        );
        $menu_underline_dash_container->addChild("menu_underline_dash_alignment", $menu_underline_dash_alignment);

        $group2 = new QodeGroup("2nd Level Menu", "Define styles for 2nd level in Top Navigation Menu");
        $panel7->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $dropdown_color = new QodeField("colorsimple", "dropdown_color", "", "Text Color", "This is some description");
        $row1->addChild("dropdown_color", $dropdown_color);
        $dropdown_hovercolor = new QodeField("colorsimple", "dropdown_hovercolor", "", "Hover/Active Color", "This is some description");
        $row1->addChild("dropdown_hovercolor", $dropdown_hovercolor);
        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $dropdown_google_fonts = new QodeField("fontsimple", "dropdown_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("dropdown_google_fonts", $dropdown_google_fonts);
        $dropdown_fontsize = new QodeField("textsimple", "dropdown_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("dropdown_fontsize", $dropdown_fontsize);
        $dropdown_lineheight = new QodeField("textsimple", "dropdown_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("dropdown_lineheight", $dropdown_lineheight);
        $dropdown_padding_top_bottom = new QodeField("textsimple", "dropdown_padding_top_bottom", "", "Padding Top/Bottom", "This is some description");
        $row2->addChild("dropdown_padding_top_bottom", $dropdown_padding_top_bottom);
        $row3 = new QodeRow(true);
        $group2->addChild("row3", $row3);
        $dropdown_fontstyle = new QodeField("selectblanksimple", "dropdown_fontstyle", "", "Font style", "This is some description", qode_get_font_style_array());
        $row3->addChild("dropdown_fontstyle", $dropdown_fontstyle);
        $dropdown_fontweight = new QodeField("selectblanksimple", "dropdown_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("dropdown_fontweight", $dropdown_fontweight);
        $dropdown_letterspacing = new QodeField("textsimple", "dropdown_letterspacing", "", "Letter spacing (px)", "This is some description");
        $row3->addChild("dropdown_letterspacing", $dropdown_letterspacing);
        $dropdown_texttransform = new QodeField("selectblanksimple", "dropdown_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("dropdown_texttransform", $dropdown_texttransform);

        $group3 = new QodeGroup("2nd Level Wide Menu", "Define styles for 2nd level in Wide Menu");
        $panel7->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $dropdown_wide_color = new QodeField("colorsimple", "dropdown_wide_color", "", "Text Color", "This is some description");
        $row1->addChild("dropdown_wide_color", $dropdown_wide_color);
        $dropdown_wide_hovercolor = new QodeField("colorsimple", "dropdown_wide_hovercolor", "", "Hover Text Color", "This is some description");
        $row1->addChild("dropdown_wide_hovercolor", $dropdown_wide_hovercolor);
        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);
        $dropdown_wide_google_fonts = new QodeField("fontsimple", "dropdown_wide_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("dropdown_wide_google_fonts", $dropdown_wide_google_fonts);
        $dropdown_wide_fontsize = new QodeField("textsimple", "dropdown_wide_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("dropdown_wide_fontsize", $dropdown_wide_fontsize);
        $dropdown_wide_lineheight = new QodeField("textsimple", "dropdown_wide_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("dropdown_wide_lineheight", $dropdown_wide_lineheight);
        $row3 = new QodeRow(true);
        $group3->addChild("row3", $row3);
        $dropdown_wide_fontstyle = new QodeField("selectblanksimple", "dropdown_wide_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("dropdown_wide_fontstyle", $dropdown_wide_fontstyle);
        $dropdown_wide_fontweight = new QodeField("selectblanksimple", "dropdown_wide_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("dropdown_wide_fontweight", $dropdown_wide_fontweight);
        $dropdown_wide_letterspacing = new QodeField("textsimple", "dropdown_wide_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("dropdown_wide_letterspacing", $dropdown_wide_letterspacing);
        $dropdown_wide_texttransform = new QodeField("selectblanksimple", "dropdown_wide_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("dropdown_wide_texttransform", $dropdown_wide_texttransform);

        $group4 = new QodeGroup("3rd Level Wide Menu", "Define styles for 3rd level in wide menu");
        $panel7->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $dropdown_color_thirdlvl = new QodeField("colorsimple", "dropdown_color_thirdlvl", "", "Text Color", "This is some description");
        $row1->addChild("dropdown_color_thirdlvl", $dropdown_color_thirdlvl);
        $dropdown_hovercolor_thirdlvl = new QodeField("colorsimple", "dropdown_hovercolor_thirdlvl", "", "Hover/Active Color", "This is some description");
        $row1->addChild("dropdown_hovercolor_thirdlvl", $dropdown_hovercolor_thirdlvl);
        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $dropdown_google_fonts_thirdlvl = new QodeField("fontsimple", "dropdown_google_fonts_thirdlvl", "-1", "Font Family", "This is some description");
        $row2->addChild("dropdown_google_fonts_thirdlvl", $dropdown_google_fonts_thirdlvl);
        $dropdown_fontsize_thirdlvl = new QodeField("textsimple", "dropdown_fontsize_thirdlvl", "", "Font Size (px)", "This is some description");
        $row2->addChild("dropdown_fontsize_thirdlvl", $dropdown_fontsize_thirdlvl);
        $dropdown_lineheight_thirdlvl = new QodeField("textsimple", "dropdown_lineheight_thirdlvl", "", "Line Height (px)", "This is some description");
        $row2->addChild("dropdown_lineheight_thirdlvl", $dropdown_lineheight_thirdlvl);
        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);
        $dropdown_fontstyle_thirdlvl = new QodeField("selectblanksimple", "dropdown_fontstyle_thirdlvl", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("dropdown_fontstyle_thirdlvl", $dropdown_fontstyle_thirdlvl);
        $dropdown_fontweight_thirdlvl = new QodeField("selectblanksimple", "dropdown_fontweight_thirdlvl", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("dropdown_fontweight_thirdlvl", $dropdown_fontweight_thirdlvl);
        $dropdown_letterspacing_thirdlvl = new QodeField("textsimple", "dropdown_letterspacing_thirdlvl", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("dropdown_letterspacing", $dropdown_letterspacing_thirdlvl);
        $dropdown_texttransform_thirdlvl = new QodeField("selectblanksimple", "dropdown_texttransform_thirdlvl", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("dropdown_texttransform_thirdlvl", $dropdown_texttransform_thirdlvl);

        $group5 = new QodeGroup("Fixed Menu", "Define styles for fixed menu");
        $panel7->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $fixed_color = new QodeField("colorsimple", "fixed_color", "", "Text Color", "This is some description");
        $row1->addChild("fixed_color", $fixed_color);
        $fixed_hovercolor = new QodeField("colorsimple", "fixed_hovercolor", "", "Hover/Active Color", "This is some description");
        $row1->addChild("fixed_hovercolor", $fixed_hovercolor);
        $row2 = new QodeRow(true);
        $group5->addChild("row2", $row2);
        $fixed_google_fonts = new QodeField("fontsimple", "fixed_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("fixed_google_fonts", $fixed_google_fonts);
        $fixed_fontsize = new QodeField("textsimple", "fixed_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("fixed_fontsize", $fixed_fontsize);
        $fixed_lineheight = new QodeField("textsimple", "fixed_lineheight", "", "Line height (px)", "This is some description");
        $row2->addChild("fixed_lineheight", $fixed_lineheight);
        $row3 = new QodeRow(true);
        $group5->addChild("row3", $row3);
        $fixed_fontstyle = new QodeField("selectblanksimple", "fixed_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("fixed_fontstyle", $fixed_fontstyle);
        $fixed_fontweight = new QodeField("selectblanksimple", "fixed_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("fixed_fontweight", $fixed_fontweight);
        $fixed_letterspacing = new QodeField("textsimple", "fixed_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("fixed_letterspacing", $fixed_letterspacing);
        $fixed_texttransform = new QodeField("selectblanksimple", "fixed_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("fixed_texttransform", $fixed_texttransform);

        $group6 = new QodeGroup("Sticky Menu", "Define styles for sticky menu");
        $panel7->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $sticky_color = new QodeField("colorsimple", "sticky_color", "", "Text Color", "This is some description");
        $row1->addChild("sticky_color", $sticky_color);
        $sticky_hovercolor = new QodeField("colorsimple", "sticky_hovercolor", "", "Hover/Active color", "This is some description");
        $row1->addChild("sticky_hovercolor", $sticky_hovercolor);
        $row2 = new QodeRow(true);
        $group6->addChild("row2", $row2);
        $sticky_google_fonts = new QodeField("fontsimple", "sticky_google_fonts", "-1", "Font family", "This is some description");
        $row2->addChild("sticky_google_fonts", $sticky_google_fonts);
        $sticky_fontsize = new QodeField("textsimple", "sticky_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("sticky_fontsize", $sticky_fontsize);
        $sticky_lineheight = new QodeField("textsimple", "sticky_lineheight", "", "Line height (px)", "This is some description");
        $row2->addChild("sticky_lineheight", $sticky_lineheight);
        $row3 = new QodeRow(true);
        $group6->addChild("row3", $row3);
        $sticky_fontstyle = new QodeField("selectblanksimple", "sticky_fontstyle", "", "Font style", "This is some description", qode_get_font_style_array());
        $row3->addChild("sticky_fontstyle", $sticky_fontstyle);
        $sticky_fontweight = new QodeField("selectblanksimple", "sticky_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("sticky_fontweight", $sticky_fontweight);
        $sticky_letterspacing = new QodeField("textsimple", "sticky_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("sticky_letterspacing", $sticky_letterspacing);
        $sticky_texttransform = new QodeField("selectblanksimple", "sticky_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("sticky_texttransform", $sticky_texttransform);

        $group7 = new QodeGroup("Mobile Menu", "Define styles for Mobile Menu (as seen on small screens)");
        $panel7->addChild("group7", $group7);
        $row1 = new QodeRow();
        $group7->addChild("row1", $row1);
        $mobile_color = new QodeField("colorsimple", "mobile_color", "", "Text Color", "This is some description");
        $row1->addChild("mobile_color", $mobile_color);
        $mobile_hovercolor = new QodeField("colorsimple", "mobile_hovercolor", "", "Hover/Active Color", "This is some description");
        $row1->addChild("mobile_hovercolor", $mobile_hovercolor);

        $row2 = new QodeRow(true);
        $group7->addChild("row2", $row2);
        $mobile_google_fonts = new QodeField("fontsimple", "mobile_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("mobile_google_fonts", $mobile_google_fonts);
        $mobile_fontsize = new QodeField("textsimple", "mobile_fontsize", "", "Font Size (px)", "This is some description");
        $row2->addChild("mobile_fontsize", $mobile_fontsize);
        $mobile_lineheight = new QodeField("textsimple", "mobile_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("mobile_lineheight", $mobile_lineheight);
        $row3 = new QodeRow(true);
        $group7->addChild("row3", $row3);
        $mobile_fontstyle = new QodeField("selectblanksimple", "mobile_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("mobile_fontstyle", $mobile_fontstyle);
        $mobile_fontweight = new QodeField("selectblanksimple", "mobile_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("mobile_fontweight", $mobile_fontweight);
        $mobile_letter_spacing = new QodeField("textsimple", "mobile_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("mobile_letter_spacing", $mobile_letter_spacing);
        $mobile_texttransform = new QodeField("selectblanksimple", "mobile_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("mobile_texttransform", $mobile_texttransform);

        $group8 = new QodeGroup("Header Top", "Define styles for Header Top area");
        $panel7->addChild("group8", $group8);
        $row1 = new QodeRow();
        $group8->addChild("row1", $row1);
        $top_header_text_color = new QodeField("colorsimple", "top_header_text_color", "", "Text Color", "This is some description");
        $row1->addChild("top_header_text_color", $top_header_text_color);
        $top_header_text_hover_color = new QodeField("colorsimple", "top_header_text_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("top_header_text_hover_color", $top_header_text_hover_color);
        $row2 = new QodeRow(true);
        $group8->addChild("row2", $row2);
        $top_header_text_font_family = new QodeField("fontsimple", "top_header_text_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("top_header_text_font_family", $top_header_text_font_family);
        $top_header_text_font_size = new QodeField("textsimple", "top_header_text_font_size", "", "Font Size (px)", "This is some description");
        $row2->addChild("top_header_text_font_size", $top_header_text_font_size);
        $top_header_text_line_height = new QodeField("textsimple", "top_header_text_line_height", "", "Line Height (px)", "This is some description");
        $row2->addChild("top_header_text_line_height", $top_header_text_line_height);
        $row3 = new QodeRow(true);
        $group8->addChild("row3", $row3);
        $group8->addChild("row3", $row3);
        $top_header_text_font_style = new QodeField("selectblanksimple", "top_header_text_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row3->addChild("top_header_text_font_style", $top_header_text_font_style);
        $top_header_text_font_weight = new QodeField("selectblanksimple", "top_header_text_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("top_header_text_font_weight", $top_header_text_font_weight);
        $top_header_text_letter_spacing = new QodeField("textsimple", "top_header_text_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("top_header_text_letter_spacing", $top_header_text_letter_spacing);
        $top_header_text_texttransform = new QodeField("selectblanksimple", "top_header_text_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row3->addChild("top_header_text_texttransform", $top_header_text_texttransform);

        // Page title

        $panel3 = new QodePanel("Page Title", "page_title_panel");
        $fontsPage->addChild("panel3", $panel3);

        $group1 = new QodeGroup("Small Type", 'Define styles for default "Small" Title');
        $panel3->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $page_title_color = new QodeField("colorsimple", "page_title_color", "", "Text Color", "This is some description");
        $row1->addChild("page_title_color", $page_title_color);
        $page_title_fontsize = new QodeField("textsimple", "page_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("page_title_fontsize", $page_title_fontsize);
        $page_title_lineheight = new QodeField("textsimple", "page_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("page_title_lineheight", $page_title_lineheight);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $page_title_google_fonts = new QodeField("fontsimple", "page_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("page_title_google_fonts", $page_title_google_fonts);
        $page_title_fontstyle = new QodeField("selectblanksimple", "page_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("page_title_fontstyle", $page_title_fontstyle);
        $page_title_fontweight = new QodeField("selectblanksimple", "page_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("page_title_fontweight", $page_title_fontweight);
        $page_title_letterspacing = new QodeField("textsimple", "page_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("page_title_letterspacing", $page_title_letterspacing);

        $group2 = new QodeGroup("Medium Type", 'Define styles for default "Medium" Title');
        $panel3->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $page_title_medium_fontsize = new QodeField("textsimple", "page_title_medium_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("page_title_medium_fontsize", $page_title_medium_fontsize);
        $page_title_medium_lineheight = new QodeField("textsimple", "page_title_medium_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("page_title_medium_lineheight", $page_title_medium_lineheight);
        $page_title_medium_fontweight = new QodeField("selectblanksimple", "page_title_medium_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row1->addChild("page_title_medium_fontweight", $page_title_medium_fontweight);
        $page_title_medium_letterspacing = new QodeField("textsimple", "page_title_medium_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("page_title_medium_letterspacing", $page_title_medium_letterspacing);

        $group3 = new QodeGroup("Large Type", 'Define styles for default "Large" Title');
        $panel3->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $page_title_large_fontsize = new QodeField("textsimple", "page_title_large_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("page_title_large_fontsize", $page_title_large_fontsize);
        $page_title_large_lineheight = new QodeField("textsimple", "page_title_large_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("page_title_large_lineheight", $page_title_large_lineheight);
        $page_title_large_fontweight = new QodeField("selectblanksimple", "page_title_large_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row1->addChild("page_title_large_fontweight", $page_title_large_fontweight);
        $page_title_large_letterspacing = new QodeField("textsimple", "page_title_large_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("page_title_large_letterspacing", $page_title_large_letterspacing);

        // Page Subtitle

        $panel4 = new QodePanel("Page Subtitle", "page_subtitle_panel");
        $fontsPage->addChild("panel4", $panel4);

        $group1 = new QodeGroup("Subtitle", "Define styles for page Subtitle");
        $panel4->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $page_subtitle_color = new QodeField("colorsimple", "page_subtitle_color", "", "Text Color", "This is some description");
        $row1->addChild("page_subtitle_color", $page_subtitle_color);
        $page_subtitle_fontsize = new QodeField("textsimple", "page_subtitle_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("page_subtitle_fontsize", $page_subtitle_fontsize);
        $page_subtitle_lineheight = new QodeField("textsimple", "page_subtitle_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("page_subtitle_lineheight", $page_subtitle_lineheight);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $page_subtitle_font_family = new QodeField("fontsimple", "page_subtitle_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("page_subtitle_font_family", $page_subtitle_font_family);
        $page_subtitle_font_style = new QodeField("selectblanksimple", "page_subtitle_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("page_subtitle_font_style", $page_subtitle_font_style);
        $page_subtitle_fontweight = new QodeField("selectblanksimple", "page_subtitle_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("page_subtitle_fontweight", $page_subtitle_fontweight);

        $group2 = new QodeGroup("Large Type", 'Define styles for default "Large" Subtitle');
        $panel4->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $page_subtitle_large_fontsize = new QodeField("textsimple", "page_subtitle_large_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("page_subtitle_large_fontsize", $page_subtitle_large_fontsize);
        $page_subtitle_large_lineheight = new QodeField("textsimple", "page_subtitle_large_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("page_subtitle_large_lineheight", $page_subtitle_large_lineheight);
        $page_subtitle_large_fontweight = new QodeField("selectblanksimple", "page_subtitle_large_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row1->addChild("page_subtitle_large_fontweight", $page_subtitle_large_fontweight);


		// Page Text Above Title

		$panel_text_above_title = new QodePanel("Page Text Above Title", "page_text_above_title_panel");
		$fontsPage->addChild("panel_text_above_title", $panel_text_above_title);

		$group1 = new QodeGroup("Text Above Title", "Define styles for page Text Above Title");
		$panel_text_above_title->addChild("group1", $group1);
		$row1 = new QodeRow();
		$group1->addChild("row1", $row1);
		$page_text_above_title_color = new QodeField("colorsimple", "page_text_above_title_color", "", "Text Color", "This is some description");
		$row1->addChild("page_text_above_title_color", $page_text_above_title_color);
		$page_text_above_title_fontsize = new QodeField("textsimple", "page_text_above_title_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("page_text_above_title_fontsize", $page_text_above_title_fontsize);
		$page_text_above_title_lineheight = new QodeField("textsimple", "page_text_above_title_lineheight", "", "Line Height (px)", "This is some description");
		$row1->addChild("page_text_above_title_lineheight", $page_text_above_title_lineheight);
		$page_text_above_title_letterspacing = new QodeField("textsimple", "page_text_above_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
		$row1->addChild("page_text_above_title_letterspacing", $page_text_above_title_letterspacing);
		$row2 = new QodeRow(true);
		$group1->addChild("row2", $row2);
		$page_text_above_title_font_family = new QodeField("fontsimple", "page_text_above_title_font_family", "-1", "Font Family", "This is some description");
		$row2->addChild("page_text_above_title_font_family", $page_text_above_title_font_family);
		$page_text_above_title_font_style = new QodeField("selectblanksimple", "page_text_above_title_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
		$row2->addChild("page_text_above_title_font_style", $page_text_above_title_font_style);
		$page_text_above_title_fontweight = new QodeField("selectblanksimple", "page_text_above_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row2->addChild("page_text_above_title_fontweight", $page_text_above_title_fontweight);
		$page_text_above_title_texttransform = new QodeField("selectblanksimple", "page_text_above_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
		$row2->addChild("page_text_above_title_texttransform", $page_text_above_title_texttransform);

		$group2 = new QodeGroup("Large Type", 'Define styles for default "Large" Text Above Title');
		$panel_text_above_title->addChild("group2", $group2);
		$row1 = new QodeRow();
		$group2->addChild("row1", $row1);
		$page_text_above_title_large_fontsize = new QodeField("textsimple", "page_text_above_title_large_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("page_text_above_title_large_fontsize", $page_text_above_title_large_fontsize);
		$page_text_above_title_large_lineheight = new QodeField("textsimple", "page_text_above_title_large_lineheight", "", "Line Height (px)", "This is some description");
		$row1->addChild("page_text_above_title_large_lineheight", $page_text_above_title_large_lineheight);
		$page_text_above_title_large_fontweight = new QodeField("selectblanksimple", "page_text_above_title_large_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row1->addChild("page_text_above_title_large_fontweight", $page_text_above_title_large_fontweight);

        // Quote and Link blog format and Blockquote shortcode

        $panel5 = new QodePanel("Footer", "footer_panel");
        $fontsPage->addChild("panel5", $panel5);

        $group1 = new QodeGroup("Footer top title styles", 'Define styles for footer top title');
        $panel5->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $footer_title_color = new QodeField("colorsimple", "footer_title_color", "", "Text Color", "This is some description");
        $row1->addChild("footer_title_color", $footer_title_color);
        $footer_title_font_size = new QodeField("textsimple", "footer_title_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("footer_title_font_size", $footer_title_font_size);
        $footer_title_letter_spacing = new QodeField("textsimple", "footer_title_letter_spacing", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("footer_title_letter_spacing", $footer_title_letter_spacing);
        $footer_title_line_height = new QodeField("textsimple", "footer_title_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("footer_title_line_height", $footer_title_line_height);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $footer_title_font_family = new QodeField("fontsimple", "footer_title_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("footer_title_font_family", $footer_title_font_family);
        $footer_title_font_style = new QodeField("selectblanksimple", "footer_title_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("footer_title_font_style", $footer_title_font_style);
        $footer_title_font_weight = new QodeField("selectblanksimple", "footer_title_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("footer_title_font_weight", $footer_title_font_weight);
        $footer_title_text_transform = new QodeField("selectblanksimple", "footer_title_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("footer_title_text_transform", $footer_title_text_transform);

        $group2 = new QodeGroup("Footer top text styles", 'Define styles for footer top text');
        $panel5->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $footer_text_font_size = new QodeField("textsimple", "footer_text_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("footer_text_font_size", $footer_text_font_size);
        $footer_text_letter_spacing = new QodeField("textsimple", "footer_text_letter_spacing", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("footer_text_letter_spacing", $footer_text_letter_spacing);
        $footer_text_line_height = new QodeField("textsimple", "footer_text_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("footer_text_line_height", $footer_text_line_height);
        $footer_text_font_family = new QodeField("fontsimple", "footer_text_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("footer_text_font_family", $footer_text_font_family);
        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $footer_text_font_style = new QodeField("selectblanksimple", "footer_text_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("footer_text_font_style", $footer_text_font_style);
        $footer_text_font_weight = new QodeField("selectblanksimple", "footer_text_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("footer_text_font_weight", $footer_text_font_weight);
        $footer_text_text_transform = new QodeField("selectblanksimple", "footer_text_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("footer_text_text_transform", $footer_text_text_transform);

        $group3 = new QodeGroup("Footer top link styles", 'Define styles for footer top link');
        $panel5->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $footer_link_font_size = new QodeField("textsimple", "footer_link_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("footer_link_font_size", $footer_link_font_size);
        $footer_link_letter_spacing = new QodeField("textsimple", "footer_link_letter_spacing", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("footer_link_letter_spacing", $footer_link_letter_spacing);
        $footer_link_line_height = new QodeField("textsimple", "footer_link_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("footer_link_line_height", $footer_link_line_height);
        $footer_link_font_family = new QodeField("fontsimple", "footer_link_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("footer_link_font_family", $footer_link_font_family);
        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);
        $footer_link_font_style = new QodeField("selectblanksimple", "footer_link_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("footer_link_font_style", $footer_link_font_style);
        $footer_link_font_weight = new QodeField("selectblanksimple", "footer_link_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("footer_link_font_weight", $footer_link_font_weight);
        $footer_link_text_transform = new QodeField("selectblanksimple", "footer_link_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("footer_link_text_transform", $footer_link_text_transform);

        $group4 = new QodeGroup("Footer bottom text styles", 'Define styles for footer bottom text');
        $panel5->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $footer_bottom_text_font_size = new QodeField("textsimple", "footer_bottom_text_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("footer_bottom_text_font_size", $footer_bottom_text_font_size);
        $footer_bottom_text_letter_spacing = new QodeField("textsimple", "footer_bottom_text_letter_spacing", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("footer_bottom_text_letter_spacing", $footer_bottom_text_letter_spacing);
        $footer_bottom_text_line_height = new QodeField("textsimple", "footer_bottom_text_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("footer_bottom_text_line_height", $footer_bottom_text_line_height);
        $footer_bottom_text_font_family = new QodeField("fontsimple", "footer_bottom_text_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("footer_bottom_text_font_family", $footer_bottom_text_font_family);
        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $footer_bottom_text_font_style = new QodeField("selectblanksimple", "footer_bottom_text_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("footer_bottom_text_font_style", $footer_bottom_text_font_style);
        $footer_bottom_text_font_weight = new QodeField("selectblanksimple", "footer_bottom_text_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("footer_bottom_text_font_weight", $footer_bottom_text_font_weight);
        $footer_bottom_text_text_transform = new QodeField("selectblanksimple", "footer_bottom_text_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("footer_bottom_text_text_transform", $footer_bottom_text_text_transform);

        $group5 = new QodeGroup("Footer bottom link styles", 'Define styles for footer bottom link');
        $panel5->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $footer_bottom_link_font_size = new QodeField("textsimple", "footer_bottom_link_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("footer_bottom_link_font_size", $footer_bottom_link_font_size);
        $footer_bottom_link_letter_spacing = new QodeField("textsimple", "footer_bottom_link_letter_spacing", "", "Letter spacing (px)", "This is some description");
        $row1->addChild("footer_bottom_link_letter_spacing", $footer_bottom_link_letter_spacing);
        $footer_bottom_link_line_height = new QodeField("textsimple", "footer_bottom_link_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("footer_bottom_link_line_height", $footer_bottom_link_line_height);
        $footer_bottom_link_font_family = new QodeField("fontsimple", "footer_bottom_link_font_family", "-1", "Font Family", "This is some description");
        $row1->addChild("footer_bottom_link_font_family", $footer_bottom_link_font_family);
        $row2 = new QodeRow(true);
        $group5->addChild("row2", $row2);
        $footer_bottom_link_font_style = new QodeField("selectblanksimple", "footer_bottom_link_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("footer_bottom_link_font_style", $footer_bottom_link_font_style);
        $footer_bottom_link_font_weight = new QodeField("selectblanksimple", "footer_bottom_link_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("footer_bottom_link_font_weight", $footer_bottom_link_font_weight);
        $footer_bottom_link_text_transform = new QodeField("selectblanksimple", "footer_bottom_link_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("footer_bottom_link_text_transform", $footer_bottom_link_text_transform);

        // Portfolio

        $panel6 = new QodePanel("Portfolio", "portfolio_panel");
        $fontsPage->addChild("panel6", $panel6);

        $group1 = new QodeGroup("Categories Filter", "Define styles for portfolio Category Filter");
        $panel6->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $portfolio_filter_color = new QodeField("colorsimple", "portfolio_filter_color", "", "Text Color", "This is some description");
        $row1->addChild("portfolio_filter_color", $portfolio_filter_color);
        $portfolio_filter_hover_color = new QodeField("colorsimple", "portfolio_filter_hover_color", "", "Text Hover/Active Color", "This is some description");
        $row1->addChild("portfolio_filter_hover_color", $portfolio_filter_hover_color);
        $portfolio_filter_font_size = new QodeField("textsimple", "portfolio_filter_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("portfolio_filter_font_size", $portfolio_filter_font_size);
        $portfolio_filter_line_height = new QodeField("textsimple", "portfolio_filter_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("portfolio_filter_line_height", $portfolio_filter_line_height);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $portfolio_filter_text_transform = new QodeField("selectblanksimple", "portfolio_filter_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("portfolio_filter_text_transform", $portfolio_filter_text_transform);
        $portfolio_filter_font_family = new QodeField("fontsimple", "portfolio_filter_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("portfolio_filter_font_family", $portfolio_filter_font_family);
        $portfolio_filter_font_style = new QodeField("selectblanksimple", "portfolio_filter_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("portfolio_filter_font_style", $portfolio_filter_font_style);
        $portfolio_filter_font_weight = new QodeField("selectblanksimple", "portfolio_filter_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("portfolio_filter_font_weight", $portfolio_filter_font_weight);
        $row3 = new QodeRow(true);
        $group1->addChild("row3", $row3);
        $portfolio_filter_letter_spacing = new QodeField("textsimple", "portfolio_filter_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("portfolio_filter_letter_spacing", $portfolio_filter_letter_spacing);

    }
    add_action('qode_options_map','qode_fonts_options_map',60);
}