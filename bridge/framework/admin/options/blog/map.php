<?php

if(!function_exists('qode_blog_options_map')) {
    /**
     * Blog options page
     */
    function qode_blog_options_map()
    {

        $blogPage = new QodeAdminPage("_blog", "Blog", "fa fa-files-o");
        qode_framework()->qodeOptions->addAdminPage("blogPage", $blogPage);

        // Blog List

        $panel2 = new QodePanel("Blog List", "blog_list_panel");
        $blogPage->addChild("panel2", $panel2);

        $pagination = new QodeField("zeroone", "pagination", "1", "Pagination", "Enabling this option will display pagination on bottom of Blog List");
        $panel2->addChild("pagination", $pagination);

        $blog_style = new QodeField("select", "blog_style", "1", "Archive and Category Layout", "Choose a default blog layout for archived Blog Lists and Category Blog Lists", array(
            "1" => "Blog Large Image",
//     "5" => "Blog Masonry Full Width",
            "3" => "Blog Large Image Whole Post",
            "4" => "Blog Small Image",
            "2" => "Blog Masonry",
            "7" => "Blog Large Image With Dividers",
            "8" => "Blog Masonry - Date in Image",
            "9" => "Blog Compound",
            "10" => "Blog Pinterest",
            "11" => "Blog Headlines",
            "12" => "Blog Chequered"
        ));
        $panel2->addChild("blog_style", $blog_style);

        $category_blog_sidebar = new QodeField("select", "category_blog_sidebar", "default", "Archive and Category Sidebar", "Choose a sidebar layout for archived Blog Lists and Category Blog Lists", array("default" => "No Sidebar",
            "1" => "Sidebar 1/3 right",
            "2" => "Sidebar 1/4 right",
            "3" => "Sidebar 1/3 left",
            "4" => "Sidebar 1/4 left"
        ));
        $panel2->addChild("category_blog_sidebar", $category_blog_sidebar);

        $blog_hide_comments = new QodeField("yesno", "blog_hide_comments", "no", "Hide Comments", "Enabling this option will hide comments on Blog List and Single Blog Posts");
        $panel2->addChild("blog_hide_comments", $blog_hide_comments);

        $blog_hide_author = new QodeField("yesno", "blog_hide_author", "no", "Hide Author", "Enabling this option will hide author name on Blog List");
        $panel2->addChild("blog_hide_author", $blog_hide_author);

        $qode_like = new QodeField("onoff", "qode_like", "on", "Likes", 'Enabling this option will turn on "Likes"');
        $panel2->addChild("qode_like", $qode_like);

        $blog_page_range = new QodeField("text", "blog_page_range", "", "Pagination Page Range", 'Enter the number of numerals to be displayed before the "..." (For example, enter "3" to get "1 2 3...")', array(), array("col_width" => 3));
        $panel2->addChild("blog_page_range", $blog_page_range);

        $number_of_chars = new QodeField("text", "number_of_chars", "45", "Number of Words in Blog Listing", 'Enter the number of words to be displayed per post in Blog List', array(), array("col_width" => 3));
        $panel2->addChild("number_of_chars", $number_of_chars);

        $number_of_chars_masonry = new QodeField("text", "number_of_chars_masonry", "", "Number of Words in Masonry", 'Enter the number of words to be displayed per post in "Masonry" Blog List (Note: this overrides "Word Number" above)', array(), array("col_width" => 3));
        $panel2->addChild("number_of_chars_masonry", $number_of_chars_masonry);

        $number_of_chars_large_image = new QodeField("text", "number_of_chars_large_image", "", "Number of Words in Large Image", 'Enter the number of words to be displayed per post in "Large Image" Blog List (Note: this overrides "Word Number" above)', array(), array("col_width" => 3));
        $panel2->addChild("number_of_chars_large_image", $number_of_chars_large_image);

        $number_of_chars_small_image = new QodeField("text", "number_of_chars_small_image", "", "Number of Words in Small Image", 'Enter the number of words to be displayed per post in "Small Image" Blog List (Note: this overrides "Word Number" above))', array(), array("col_width" => 3));
        $panel2->addChild("number_of_chars_small_image", $number_of_chars_small_image);

        $blog_content_position = new QodeField("select", "blog_content_position", "content_above_blog_list", "Content Position", "Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
            "content_above_blog_list" => "Content Above Blog List",
            "content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
        ));
        $panel2->addChild("blog_content_position", $blog_content_position);

        $pagination_masonry = new QodeField("select", "pagination_masonry", "pagination", "Pagination on Masonry/Pinterest/Headlines", 'Choose a pagination style for "Masonry/Pinterest/Headlines" Blog List', array(
            "pagination" => "Pagination",
            "load_more" => "Load More",
            "infinite_scroll" => "Infinite Scroll"
        ));
        $panel2->addChild("pagination_masonry", $pagination_masonry);

        $blog_masonry_filter = new QodeField("yesno", "blog_masonry_filter", "no", "Show Category Filter on Masonry", 'Enabling this option will display a Category Filter on "Masonry" Blog List');
        $panel2->addChild("blog_masonry_filter", $blog_masonry_filter);

        $blog_masonry_padding = new QodeField("text", "blog_masonry_padding", "", "Full Width Masonry Margin", 'Please insert margin in px (i.e. 5px), or in % (i.e 5%)', array(), array("col_width" => 3));
        $panel2->addChild("blog_masonry_padding", $blog_masonry_padding);

        $blog_large_image_subtitle = new QodeTitle("blog_large_image_subtitle", "Blog Large Image Style");
        $panel2->addChild("blog_large_image_subtitle", $blog_large_image_subtitle);

        $group1 = new QodeGroup("Large Image Style", 'Define styles for the "Large Image" Blog List');
        $panel2->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $blog_large_image_text_in_box = new QodeField("selectsimple", "blog_large_image_text_in_box", "", "Text in Box", 'ThisIsDescription', array("Default" => "Default",
            "no" => "No",
            "yes" => "Yes"
        ));
        $row1->addChild("blog_large_image_text_in_box", $blog_large_image_text_in_box);
        $blog_large_image_border = new QodeField("selectsimple", "blog_large_image_border", "", "Text Box Border", 'ThisIsDescription', array("Default" => "Default",
            "no" => "No",
            "yes" => "Yes"
        ));
        $row1->addChild("blog_large_image_border", $blog_large_image_border);
        $blog_large_image_border_width = new QodeField("textsimple", "blog_large_image_border_width", "", "Text Box Border width (px)", "This is some description");
        $row1->addChild("blog_large_image_border_width", $blog_large_image_border_width);
        $row2 = new QodeRow(true);
        $group1->addChild("row2", $row2);
        $blog_large_image_background_color = new QodeField("colorsimple", "blog_large_image_background_color", "", "Text Box Background Color", "ThisIsDescription");
        $row2->addChild("blog_large_image_background_color", $blog_large_image_background_color);
        $blog_large_image_border_color = new QodeField("colorsimple", "blog_large_image_border_color", "", "Text Box Border Color", "ThisIsDescription");
        $row2->addChild("blog_large_image_border_color", $blog_large_image_border_color);

        $group2 = new QodeGroup("Title Style", "Define styles for title. *Please note that these settings also take effect on single post titles");
        $panel2->addChild("group2", $group2);
        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);
        $blog_large_image_title_color = new QodeField("colorsimple", "blog_large_image_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_large_image_title_color", $blog_large_image_title_color);
        $blog_large_image_title_hover_color = new QodeField("colorsimple", "blog_large_image_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_large_image_title_hover_color", $blog_large_image_title_hover_color);
        $blog_large_image_title_date_color = new QodeField("colorsimple", "blog_large_image_title_date_color", "", "Date Color", "This is some description");
        $row1->addChild("blog_large_image_title_date_color", $blog_large_image_title_date_color);
        $blog_large_image_title_fontsize = new QodeField("textsimple", "blog_large_image_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_title_fontsize", $blog_large_image_title_fontsize);


        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);
        $blog_large_image_title_lineheight = new QodeField("textsimple", "blog_large_image_title_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_large_image_title_lineheight", $blog_large_image_title_lineheight);
        $blog_large_image_title_texttransform = new QodeField("selectblanksimple", "blog_large_image_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_title_texttransform", $blog_large_image_title_texttransform);
        $blog_large_image_title_google_fonts = new QodeField("fontsimple", "blog_large_image_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_title_google_fonts", $blog_large_image_title_google_fonts);
        $blog_large_image_title_fontstyle = new QodeField("selectblanksimple", "blog_large_image_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_title_fontstyle", $blog_large_image_title_fontstyle);

        $row3 = new QodeRow(true);
        $group2->addChild("row3", $row3);
        $blog_large_image_title_fontweight = new QodeField("selectblanksimple", "blog_large_image_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_large_image_title_fontweight", $blog_large_image_title_fontweight);
        $blog_large_image_title_letterspacing = new QodeField("textsimple", "blog_large_image_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_title_letterspacing", $blog_large_image_title_letterspacing);

        $group18 = new QodeGroup("Post Info Style", "Define styles for post info. *Please note that these settings also take effect on single post info");
        $panel2->addChild("group18", $group18);
        $row1 = new QodeRow();
        $group18->addChild("row1", $row1);
        $blog_large_image_post_info_color = new QodeField("colorsimple", "blog_large_image_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_large_image_post_info_color", $blog_large_image_post_info_color);
        $blog_large_image_post_info_link_color = new QodeField("colorsimple", "blog_large_image_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_large_image_post_info_link_color", $blog_large_image_post_info_link_color);
        $blog_large_image_post_info_link_hover_color = new QodeField("colorsimple", "blog_large_image_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_large_image_post_info_link_hover_color", $blog_large_image_post_info_link_hover_color);
        $blog_large_image_post_info_fontsize = new QodeField("textsimple", "blog_large_image_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_post_info_fontsize", $blog_large_image_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group18->addChild("row2", $row2);
        $blog_large_image_post_info_lineheight = new QodeField("textsimple", "blog_large_image_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_large_image_post_info_lineheight", $blog_large_image_post_info_lineheight);
        $blog_large_image_post_info_texttransform = new QodeField("selectblanksimple", "blog_large_image_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_post_info_texttransform", $blog_large_image_post_info_texttransform);
        $blog_large_image_post_info_google_fonts = new QodeField("fontsimple", "blog_large_image_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_post_info_google_fonts", $blog_large_image_post_info_google_fonts);
        $blog_large_image_post_info_fontstyle = new QodeField("selectblanksimple", "blog_large_image_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_post_info_fontstyle", $blog_large_image_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group18->addChild("row3", $row3);
        $blog_large_image_post_info_fontweight = new QodeField("selectblanksimple", "blog_large_image_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_large_image_post_info_fontweight", $blog_large_image_post_info_fontweight);
        $blog_large_image_post_info_letterspacing = new QodeField("textsimple", "blog_large_image_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_post_info_letterspacing", $blog_large_image_post_info_letterspacing);

        $group23 = new QodeGroup("Post Info Quote/Link Style", "Define styles for Quote/Link post info. *Please note that these settings also take effect on single post info");
        $panel2->addChild("group23", $group23);
        $row1 = new QodeRow();
        $group23->addChild("row1", $row1);
        $blog_large_image_ql_post_info_color = new QodeField("colorsimple", "blog_large_image_ql_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_large_image_ql_post_info_color", $blog_large_image_ql_post_info_color);
        $blog_large_image_ql_post_info_link_color = new QodeField("colorsimple", "blog_large_image_ql_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_large_image_ql_post_info_link_color", $blog_large_image_ql_post_info_link_color);
        $blog_large_image_ql_post_info_link_hover_color = new QodeField("colorsimple", "blog_large_image_ql_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_large_image_ql_post_info_link_hover_color", $blog_large_image_ql_post_info_link_hover_color);
        $blog_large_image_ql_post_info_fontsize = new QodeField("textsimple", "blog_large_image_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_ql_post_info_fontsize", $blog_large_image_ql_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group23->addChild("row2", $row2);
        $blog_large_image_ql_post_info_lineheight = new QodeField("textsimple", "blog_large_image_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_large_image_ql_post_info_lineheight", $blog_large_image_ql_post_info_lineheight);
        $blog_large_image_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_large_image_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_ql_post_info_texttransform", $blog_large_image_ql_post_info_texttransform);
        $blog_large_image_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_large_image_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_ql_post_info_google_fonts", $blog_large_image_ql_post_info_google_fonts);
        $blog_large_image_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_large_image_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_ql_post_info_fontstyle", $blog_large_image_ql_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group23->addChild("row3", $row3);
        $blog_large_image_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_large_image_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_large_image_ql_post_info_fontweight", $blog_large_image_ql_post_info_fontweight);
        $blog_large_image_ql_post_info_letterspacing = new QodeField("textsimple", "blog_large_image_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_ql_post_info_letterspacing", $blog_large_image_ql_post_info_letterspacing);


        $blog_small_image_subtitle = new QodeTitle("blog_small_image_subtitle", "Blog Small Image Style");
        $panel2->addChild("blog_small_image_subtitle", $blog_small_image_subtitle);

        $group3 = new QodeGroup("Small Image Style", 'Define styles for the "Small Image" Blog List');
        $panel2->addChild("group3", $group3);
        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);
        $blog_small_image_text_in_box = new QodeField("selectsimple", "blog_small_image_text_in_box", "", "Text in Box", "ThisIsDescription", array("Default" => "Default",
            "no" => "No",
            "yes" => "Yes"
        ));
        $row1->addChild("blog_small_image_text_in_box", $blog_small_image_text_in_box);
        $blog_small_image_border = new QodeField("selectsimple", "blog_small_image_border", "", "Text Box Border", "ThisIsDescription", array("Default" => "Default",
            "no" => "No",
            "yes" => "Yes"
        ));
        $row1->addChild("blog_small_image_border", $blog_small_image_border);
        $blog_small_image_border_width = new QodeField("textsimple", "blog_small_image_border_width", "", "Text Box Border width (px)", "ThisIsDescription");
        $row1->addChild("blog_small_image_border_width", $blog_small_image_border_width);
        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);
        $blog_small_image_background_color = new QodeField("colorsimple", "blog_small_image_background_color", "", "Text Box Background Color", 'ThisIsDescription');
        $row2->addChild("blog_small_image_background_color", $blog_small_image_background_color);
        $blog_small_image_border_color = new QodeField("colorsimple", "blog_small_image_border_color", "", "Text Box Border Color", "ThisIsDescription");
        $row2->addChild("blog_small_image_border_color", $blog_small_image_border_color);

        $group4 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group4", $group4);
        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);
        $blog_small_image_title_color = new QodeField("colorsimple", "blog_small_image_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_small_image_title_color", $blog_small_image_title_color);
        $blog_small_image_title_hover_color = new QodeField("colorsimple", "blog_small_image_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_small_image_title_hover_color", $blog_small_image_title_hover_color);
        $blog_small_image_title_date_color = new QodeField("colorsimple", "blog_small_image_title_date_color", "", "Date Color", "This is some description");
        $row1->addChild("blog_small_image_title_date_color", $blog_small_image_title_date_color);
        $blog_small_image_title_fontsize = new QodeField("textsimple", "blog_small_image_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_small_image_title_fontsize", $blog_small_image_title_fontsize);


        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);
        $blog_small_image_title_lineheight = new QodeField("textsimple", "blog_small_image_title_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_small_image_title_lineheight", $blog_small_image_title_lineheight);
        $blog_small_image_title_texttransform = new QodeField("selectblanksimple", "blog_small_image_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_small_image_title_texttransform", $blog_small_image_title_texttransform);
        $blog_small_image_title_google_fonts = new QodeField("fontsimple", "blog_small_image_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_small_image_title_google_fonts", $blog_small_image_title_google_fonts);
        $blog_small_image_title_fontstyle = new QodeField("selectblanksimple", "blog_small_image_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_small_image_title_fontstyle", $blog_small_image_title_fontstyle);

        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);
        $blog_small_image_title_fontweight = new QodeField("selectblanksimple", "blog_small_image_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_small_image_title_fontweight", $blog_small_image_title_fontweight);
        $blog_small_image_title_letterspacing = new QodeField("textsimple", "blog_small_image_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_small_image_title_letterspacing", $blog_small_image_title_letterspacing);

        $group19 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel2->addChild("group19", $group19);
        $row1 = new QodeRow();
        $group19->addChild("row1", $row1);
        $blog_small_image_post_info_color = new QodeField("colorsimple", "blog_small_image_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_small_image_post_info_color", $blog_small_image_post_info_color);
        $blog_small_image_post_info_link_color = new QodeField("colorsimple", "blog_small_image_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_small_image_post_info_link_color", $blog_small_image_post_info_link_color);
        $blog_small_image_post_info_link_hover_color = new QodeField("colorsimple", "blog_small_image_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_small_image_post_info_link_hover_color", $blog_small_image_post_info_link_hover_color);
        $blog_small_image_post_info_fontsize = new QodeField("textsimple", "blog_small_image_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_small_image_post_info_fontsize", $blog_small_image_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group19->addChild("row2", $row2);
        $blog_small_image_post_info_lineheight = new QodeField("textsimple", "blog_small_image_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_small_image_post_info_lineheight", $blog_small_image_post_info_lineheight);
        $blog_small_image_post_info_texttransform = new QodeField("selectblanksimple", "blog_small_image_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_small_image_post_info_texttransform", $blog_small_image_post_info_texttransform);
        $blog_small_image_post_info_google_fonts = new QodeField("fontsimple", "blog_small_image_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_small_image_post_info_google_fonts", $blog_small_image_post_info_google_fonts);
        $blog_small_image_post_info_fontstyle = new QodeField("selectblanksimple", "blog_small_image_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_small_image_post_info_fontstyle", $blog_small_image_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group19->addChild("row3", $row3);
        $blog_small_image_post_info_fontweight = new QodeField("selectblanksimple", "blog_small_image_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_small_image_post_info_fontweight", $blog_small_image_post_info_fontweight);
        $blog_small_image_post_info_letterspacing = new QodeField("textsimple", "blog_small_image_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_small_image_post_info_letterspacing", $blog_small_image_post_info_letterspacing);

        $group24 = new QodeGroup("Post Info Quote/Link Style", "Define styles for Quote/Link post info");
        $panel2->addChild("group24", $group24);
        $row1 = new QodeRow();
        $group24->addChild("row1", $row1);
        $blog_small_image_ql_post_info_color = new QodeField("colorsimple", "blog_small_image_ql_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_small_image_ql_post_info_color", $blog_small_image_ql_post_info_color);
        $blog_small_image_ql_post_info_link_color = new QodeField("colorsimple", "blog_small_image_ql_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_small_image_ql_post_info_link_color", $blog_small_image_ql_post_info_link_color);
        $blog_small_image_ql_post_info_link_hover_color = new QodeField("colorsimple", "blog_small_image_ql_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_small_image_ql_post_info_link_hover_color", $blog_small_image_ql_post_info_link_hover_color);
        $blog_small_image_ql_post_info_fontsize = new QodeField("textsimple", "blog_small_image_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_small_image_ql_post_info_fontsize", $blog_small_image_ql_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group24->addChild("row2", $row2);
        $blog_small_image_ql_post_info_lineheight = new QodeField("textsimple", "blog_small_image_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_small_image_ql_post_info_lineheight", $blog_small_image_ql_post_info_lineheight);
        $blog_small_image_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_small_image_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_small_image_ql_post_info_texttransform", $blog_small_image_ql_post_info_texttransform);
        $blog_small_image_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_small_image_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_small_image_ql_post_info_google_fonts", $blog_small_image_ql_post_info_google_fonts);
        $blog_small_image_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_small_image_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_small_image_ql_post_info_fontstyle", $blog_small_image_ql_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group24->addChild("row3", $row3);
        $blog_small_image_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_small_image_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_small_image_ql_post_info_fontweight", $blog_small_image_ql_post_info_fontweight);
        $blog_small_image_ql_post_info_letterspacing = new QodeField("textsimple", "blog_small_image_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_small_image_ql_post_info_letterspacing", $blog_small_image_ql_post_info_letterspacing);


        $blog_masonry_subtitle = new QodeTitle("blog_masonry_subtitle", "Masonry Style");
        $panel2->addChild("blog_masonry_subtitle", $blog_masonry_subtitle);

        $group5 = new QodeGroup("Masonry Style", 'Define styles for the "Masonry" Blog List');
        $panel2->addChild("group5", $group5);
        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);
        $blog_masonry_background_color = new QodeField("colorsimple", "blog_masonry_background_color", "", "Text Box Background Color", "ThisIsDescription");
        $row1->addChild("blog_masonry_background_color", $blog_masonry_background_color);
        $blog_masonry_border_color = new QodeField("colorsimple", "blog_masonry_border_color", "", "Text Box Border Color", "ThisIsDescription");
        $row1->addChild("blog_masonry_border_color", $blog_masonry_border_color);
        $blog_masonry_border_radius = new QodeField("textsimple", "blog_masonry_border_radius", "", "Text Box Border Radius (px)", "ThisIsDescription");
        $row1->addChild("blog_masonry_border_radius", $blog_masonry_border_radius);

        $group6 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group6", $group6);
        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);
        $blog_masonry_title_color = new QodeField("colorsimple", "blog_masonry_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_masonry_title_color", $blog_masonry_title_color);
        $blog_masonry_title_hover_color = new QodeField("colorsimple", "blog_masonry_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_masonry_title_hover_color", $blog_masonry_title_hover_color);
        $blog_masonry_title_fontsize = new QodeField("textsimple", "blog_masonry_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_masonry_title_fontsize", $blog_masonry_title_fontsize);
        $blog_masonry_title_lineheight = new QodeField("textsimple", "blog_masonry_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_masonry_title_lineheight", $blog_masonry_title_lineheight);

        $row2 = new QodeRow(true);
        $group6->addChild("row2", $row2);
        $blog_masonry_title_texttransform = new QodeField("selectblanksimple", "blog_masonry_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_masonry_title_texttransform", $blog_masonry_title_texttransform);
        $blog_masonry_title_google_fonts = new QodeField("fontsimple", "blog_masonry_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_masonry_title_google_fonts", $blog_masonry_title_google_fonts);
        $blog_masonry_title_fontstyle = new QodeField("selectblanksimple", "blog_masonry_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_masonry_title_fontstyle", $blog_masonry_title_fontstyle);
        $blog_masonry_title_fontweight = new QodeField("selectblanksimple", "blog_masonry_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_masonry_title_fontweight", $blog_masonry_title_fontweight);

        $row3 = new QodeRow(true);
        $group6->addChild("row3", $row3);
        $blog_masonry_title_letterspacing = new QodeField("textsimple", "blog_masonry_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_masonry_title_letterspacing", $blog_masonry_title_letterspacing);

        $group20 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel2->addChild("group20", $group20);
        $row1 = new QodeRow();
        $group20->addChild("row1", $row1);
        $blog_masonry_post_info_color = new QodeField("colorsimple", "blog_masonry_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_masonry_post_info_color", $blog_masonry_post_info_color);
        $blog_masonry_post_info_link_color = new QodeField("colorsimple", "blog_masonry_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_masonry_post_info_link_color", $blog_masonry_post_info_link_color);
        $blog_masonry_post_info_link_hover_color = new QodeField("colorsimple", "blog_masonry_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_masonry_post_info_link_hover_color", $blog_masonry_post_info_link_hover_color);
        $blog_masonry_post_info_fontsize = new QodeField("textsimple", "blog_masonry_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_masonry_post_info_fontsize", $blog_masonry_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group20->addChild("row2", $row2);
        $blog_masonry_post_info_lineheight = new QodeField("textsimple", "blog_masonry_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_masonry_post_info_lineheight", $blog_masonry_post_info_lineheight);
        $blog_masonry_post_info_texttransform = new QodeField("selectblanksimple", "blog_masonry_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_masonry_post_info_texttransform", $blog_masonry_post_info_texttransform);
        $blog_masonry_post_info_google_fonts = new QodeField("fontsimple", "blog_masonry_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_masonry_post_info_google_fonts", $blog_masonry_post_info_google_fonts);
        $blog_masonry_post_info_fontstyle = new QodeField("selectblanksimple", "blog_masonry_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_masonry_post_info_fontstyle", $blog_masonry_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group20->addChild("row3", $row3);
        $blog_masonry_post_info_fontweight = new QodeField("selectblanksimple", "blog_masonry_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_masonry_post_info_fontweight", $blog_masonry_post_info_fontweight);
        $blog_masonry_post_info_letterspacing = new QodeField("textsimple", "blog_masonry_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_masonry_post_info_letterspacing", $blog_masonry_post_info_letterspacing);

        $group25 = new QodeGroup("Post Info Quote/Link Style", "Define styles for Quote/Link post info");
        $panel2->addChild("group25", $group25);
        $row1 = new QodeRow();
        $group25->addChild("row1", $row1);
        $blog_masonry_ql_post_info_color = new QodeField("colorsimple", "blog_masonry_ql_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_masonry_ql_post_info_color", $blog_masonry_ql_post_info_color);
        $blog_masonry_ql_post_info_link_color = new QodeField("colorsimple", "blog_masonry_ql_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_masonry_ql_post_info_link_color", $blog_masonry_ql_post_info_link_color);
        $blog_masonry_ql_post_info_link_hover_color = new QodeField("colorsimple", "blog_masonry_ql_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_masonry_ql_post_info_link_hover_color", $blog_masonry_ql_post_info_link_hover_color);
        $blog_masonry_ql_post_info_fontsize = new QodeField("textsimple", "blog_masonry_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_masonry_ql_post_info_fontsize", $blog_masonry_ql_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group25->addChild("row2", $row2);
        $blog_masonry_ql_post_info_lineheight = new QodeField("textsimple", "blog_masonry_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_masonry_ql_post_info_lineheight", $blog_masonry_ql_post_info_lineheight);
        $blog_masonry_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_masonry_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_masonry_ql_post_info_texttransform", $blog_masonry_ql_post_info_texttransform);
        $blog_masonry_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_masonry_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_masonry_ql_post_info_google_fonts", $blog_masonry_ql_post_info_google_fonts);
        $blog_masonry_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_masonry_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_masonry_ql_post_info_fontstyle", $blog_masonry_ql_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group25->addChild("row3", $row3);
        $blog_masonry_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_masonry_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_masonry_ql_post_info_fontweight", $blog_masonry_ql_post_info_fontweight);
        $blog_masonry_ql_post_info_letterspacing = new QodeField("textsimple", "blog_masonry_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_masonry_ql_post_info_letterspacing", $blog_masonry_ql_post_info_letterspacing);


        $blog_masonry_gallery_subtitle = new QodeTitle("blog_masonry_gallery_subtitle", "Masonry Gallery Style");
        $panel2->addChild("blog_masonry_gallery_subtitle", $blog_masonry_gallery_subtitle);

        $group41 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group41", $group41);
            $row1 = new QodeRow();
            $group41->addChild("row1", $row1);
                $blog_masonry_gallery_title_color = new QodeField("colorsimple", "blog_masonry_gallery_title_color", "", "Title Color", "This is some description");
                $row1->addChild("blog_masonry_gallery_title_color", $blog_masonry_gallery_title_color);
                $blog_masonry_gallery_title_hover_color = new QodeField("colorsimple", "blog_masonry_gallery_title_hover_color", "", "Title Hover Color", "This is some description");
                $row1->addChild("blog_masonry_gallery_title_hover_color", $blog_masonry_gallery_title_hover_color);
                $blog_masonry_gallery_title_fontsize = new QodeField("textsimple", "blog_masonry_gallery_title_fontsize", "", "Font Size (px)", "This is some description");
                $row1->addChild("blog_masonry_gallery_title_fontsize", $blog_masonry_gallery_title_fontsize);
                $blog_masonry_gallery_title_lineheight = new QodeField("textsimple", "blog_masonry_gallery_title_lineheight", "", "Line Height (px)", "This is some description");
                $row1->addChild("blog_masonry_gallery_title_lineheight", $blog_masonry_gallery_title_lineheight);

            $row2 = new QodeRow(true);
            $group41->addChild("row2", $row2);
                $blog_masonry_gallery_title_texttransform = new QodeField("selectblanksimple", "blog_masonry_gallery_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
                $row2->addChild("blog_masonry_gallery_title_texttransform", $blog_masonry_gallery_title_texttransform);
                $blog_masonry_gallery_title_google_fonts = new QodeField("fontsimple", "blog_masonry_gallery_title_google_fonts", "-1", "Font Family", "This is some description");
                $row2->addChild("blog_masonry_gallery_title_google_fonts", $blog_masonry_gallery_title_google_fonts);
                $blog_masonry_gallery_title_fontstyle = new QodeField("selectblanksimple", "blog_masonry_gallery_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
                $row2->addChild("blog_masonry_gallery_title_fontstyle", $blog_masonry_gallery_title_fontstyle);
                $blog_masonry_gallery_title_fontweight = new QodeField("selectblanksimple", "blog_masonry_gallery_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
                $row2->addChild("blog_masonry_gallery_title_fontweight", $blog_masonry_gallery_title_fontweight);

            $row3 = new QodeRow(true);
            $group41->addChild("row3", $row3);
                $blog_masonry_gallery_title_letterspacing = new QodeField("textsimple", "blog_masonry_gallery_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
                $row3->addChild("blog_masonry_gallery_title_letterspacing", $blog_masonry_gallery_title_letterspacing);

        $group42 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel2->addChild("group42", $group42);
            $row1 = new QodeRow();
            $group42->addChild("row1", $row1);
                $blog_masonry_gallery_post_info_color = new QodeField("colorsimple", "blog_masonry_gallery_post_info_color", "", "Text Color", "This is some description");
                $row1->addChild("blog_masonry_gallery_post_info_color", $blog_masonry_gallery_post_info_color);
                $blog_masonry_gallery_post_info_link_color = new QodeField("colorsimple", "blog_masonry_gallery_post_info_link_color", "", "Link Color", "This is some description");
                $row1->addChild("blog_masonry_gallery_post_info_link_color", $blog_masonry_gallery_post_info_link_color);
                $blog_masonry_gallery_post_info_link_hover_color = new QodeField("colorsimple", "blog_masonry_gallery_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
                $row1->addChild("blog_masonry_gallery_post_info_link_hover_color", $blog_masonry_gallery_post_info_link_hover_color);
                $blog_masonry_gallery_post_info_fontsize = new QodeField("textsimple", "blog_masonry_gallery_post_info_fontsize", "", "Font Size (px)", "This is some description");
                $row1->addChild("blog_masonry_gallery_post_info_fontsize", $blog_masonry_gallery_post_info_fontsize);

            $row2 = new QodeRow(true);
            $group42->addChild("row2", $row2);
                $blog_masonry_gallery_post_info_lineheight = new QodeField("textsimple", "blog_masonry_gallery_post_info_lineheight", "", "Line Height (px)", "This is some description");
                $row2->addChild("blog_masonry_gallery_post_info_lineheight", $blog_masonry_gallery_post_info_lineheight);
                $blog_masonry_gallery_post_info_texttransform = new QodeField("selectblanksimple", "blog_masonry_gallery_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
                $row2->addChild("blog_masonry_gallery_post_info_texttransform", $blog_masonry_gallery_post_info_texttransform);
                $blog_masonry_gallery_post_info_google_fonts = new QodeField("fontsimple", "blog_masonry_gallery_post_info_google_fonts", "-1", "Font Family", "This is some description");
                $row2->addChild("blog_masonry_gallery_post_info_google_fonts", $blog_masonry_gallery_post_info_google_fonts);
                $blog_masonry_gallery_post_info_fontstyle = new QodeField("selectblanksimple", "blog_masonry_gallery_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
                $row2->addChild("blog_masonry_gallery_post_info_fontstyle", $blog_masonry_gallery_post_info_fontstyle);

            $row3 = new QodeRow(true);
            $group42->addChild("row3", $row3);
                $blog_masonry_gallery_post_info_fontweight = new QodeField("selectblanksimple", "blog_masonry_gallery_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
                $row3->addChild("blog_masonry_gallery_post_info_fontweight", $blog_masonry_gallery_post_info_fontweight);
                $blog_masonry_gallery_post_info_letterspacing = new QodeField("textsimple", "blog_masonry_gallery_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
                $row3->addChild("blog_masonry_gallery_post_info_letterspacing", $blog_masonry_gallery_post_info_letterspacing);

        $group43 = new QodeGroup("Quote/Link Style", "Define styles for Quote/Link post style");
        $panel2->addChild("group43", $group43);
            $row1 = new QodeRow();
            $group43->addChild("row1", $row1);
                $blog_masonry_gallery_ql_post_info_color = new QodeField("colorsimple", "blog_masonry_gallery_ql_post_info_color", "", "Text Color", "This is some description");
                $row1->addChild("blog_masonry_gallery_ql_post_info_color", $blog_masonry_gallery_ql_post_info_color);
                $blog_masonry_gallery_ql_post_info_fontsize = new QodeField("textsimple", "blog_masonry_gallery_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
                $row1->addChild("blog_masonry_gallery_ql_post_info_fontsize", $blog_masonry_gallery_ql_post_info_fontsize);
                $blog_masonry_gallery_ql_post_info_lineheight = new QodeField("textsimple", "blog_masonry_gallery_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
                $row1->addChild("blog_masonry_gallery_ql_post_info_lineheight", $blog_masonry_gallery_ql_post_info_lineheight);
                $blog_masonry_gallery_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_masonry_gallery_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
                $row1->addChild("blog_masonry_gallery_ql_post_info_texttransform", $blog_masonry_gallery_ql_post_info_texttransform);

            $row2 = new QodeRow(true);
            $group43->addChild("row2", $row2);

                $blog_masonry_gallery_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_masonry_gallery_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
                $row2->addChild("blog_masonry_gallery_ql_post_info_google_fonts", $blog_masonry_gallery_ql_post_info_google_fonts);
                $blog_masonry_gallery_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_masonry_gallery_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
                $row2->addChild("blog_masonry_gallery_ql_post_info_fontstyle", $blog_masonry_gallery_ql_post_info_fontstyle);
                $blog_masonry_gallery_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_masonry_gallery_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
                $row2->addChild("blog_masonry_gallery_ql_post_info_fontweight", $blog_masonry_gallery_ql_post_info_fontweight);
                $blog_masonry_gallery_ql_post_info_letterspacing = new QodeField("textsimple", "blog_masonry_gallery_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
                $row2->addChild("blog_masonry_gallery_ql_post_info_letterspacing", $blog_masonry_gallery_ql_post_info_letterspacing);


		$blog_gallery_subtitle = new QodeTitle("blog_gallery_subtitle", "Gallery Style");
		$panel2->addChild("blog_gallery_subtitle", $blog_gallery_subtitle);

		$group51 = new QodeGroup("Title Style", "Define styles for title");
		$panel2->addChild("group51", $group51);
		$row1 = new QodeRow();
		$group51->addChild("row1", $row1);
		$blog_gallery_title_color = new QodeField("colorsimple", "blog_gallery_title_color", "", "Title Color", "This is some description");
		$row1->addChild("blog_gallery_title_color", $blog_gallery_title_color);
		$blog_gallery_title_hover_color = new QodeField("colorsimple", "blog_gallery_title_hover_color", "", "Title Hover Color", "This is some description");
		$row1->addChild("blog_gallery_title_hover_color", $blog_gallery_title_hover_color);
		$blog_gallery_title_fontsize = new QodeField("textsimple", "blog_gallery_title_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("blog_gallery_title_fontsize", $blog_gallery_title_fontsize);
		$blog_gallery_title_lineheight = new QodeField("textsimple", "blog_gallery_title_lineheight", "", "Line Height (px)", "This is some description");
		$row1->addChild("blog_gallery_title_lineheight", $blog_gallery_title_lineheight);

		$row2 = new QodeRow(true);
		$group51->addChild("row2", $row2);
		$blog_gallery_title_texttransform = new QodeField("selectblanksimple", "blog_gallery_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
		$row2->addChild("blog_gallery_title_texttransform", $blog_gallery_title_texttransform);
		$blog_gallery_title_google_fonts = new QodeField("fontsimple", "blog_gallery_title_google_fonts", "-1", "Font Family", "This is some description");
		$row2->addChild("blog_gallery_title_google_fonts", $blog_gallery_title_google_fonts);
		$blog_gallery_title_fontstyle = new QodeField("selectblanksimple", "blog_gallery_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
		$row2->addChild("blog_gallery_title_fontstyle", $blog_gallery_title_fontstyle);
		$blog_gallery_title_fontweight = new QodeField("selectblanksimple", "blog_gallery_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row2->addChild("blog_gallery_title_fontweight", $blog_gallery_title_fontweight);

		$row3 = new QodeRow(true);
		$group51->addChild("row3", $row3);
		$blog_gallery_title_letterspacing = new QodeField("textsimple", "blog_gallery_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
		$row3->addChild("blog_gallery_title_letterspacing", $blog_gallery_title_letterspacing);

		$group52 = new QodeGroup("Post Info Style", "Define styles for post info");
		$panel2->addChild("group52", $group52);
		$row1 = new QodeRow();
		$group52->addChild("row1", $row1);
		$blog_gallery_post_info_color = new QodeField("colorsimple", "blog_gallery_post_info_color", "", "Text Color", "This is some description");
		$row1->addChild("blog_gallery_post_info_color", $blog_gallery_post_info_color);
		$blog_gallery_post_info_link_color = new QodeField("colorsimple", "blog_gallery_post_info_link_color", "", "Link Color", "This is some description");
		$row1->addChild("blog_gallery_post_info_link_color", $blog_gallery_post_info_link_color);
		$blog_gallery_post_info_link_hover_color = new QodeField("colorsimple", "blog_gallery_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
		$row1->addChild("blog_gallery_post_info_link_hover_color", $blog_gallery_post_info_link_hover_color);
		$blog_gallery_post_info_fontsize = new QodeField("textsimple", "blog_gallery_post_info_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("blog_gallery_post_info_fontsize", $blog_gallery_post_info_fontsize);

		$row2 = new QodeRow(true);
		$group52->addChild("row2", $row2);
		$blog_gallery_post_info_lineheight = new QodeField("textsimple", "blog_gallery_post_info_lineheight", "", "Line Height (px)", "This is some description");
		$row2->addChild("blog_gallery_post_info_lineheight", $blog_gallery_post_info_lineheight);
		$blog_gallery_post_info_texttransform = new QodeField("selectblanksimple", "blog_gallery_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
		$row2->addChild("blog_gallery_post_info_texttransform", $blog_gallery_post_info_texttransform);
		$blog_gallery_post_info_google_fonts = new QodeField("fontsimple", "blog_gallery_post_info_google_fonts", "-1", "Font Family", "This is some description");
		$row2->addChild("blog_gallery_post_info_google_fonts", $blog_gallery_post_info_google_fonts);
		$blog_gallery_post_info_fontstyle = new QodeField("selectblanksimple", "blog_gallery_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
		$row2->addChild("blog_gallery_post_info_fontstyle", $blog_gallery_post_info_fontstyle);

		$row3 = new QodeRow(true);
		$group52->addChild("row3", $row3);
		$blog_gallery_post_info_fontweight = new QodeField("selectblanksimple", "blog_gallery_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row3->addChild("blog_gallery_post_info_fontweight", $blog_gallery_post_info_fontweight);
		$blog_gallery_post_info_letterspacing = new QodeField("textsimple", "blog_gallery_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
		$row3->addChild("blog_gallery_post_info_letterspacing", $blog_gallery_post_info_letterspacing);


		$blog_chequered_subtitle = new QodeTitle("blog_chequered_subtitle", "Chequered Style");
		$panel2->addChild("blog_chequered_subtitle", $blog_chequered_subtitle);

		$group61 = new QodeGroup("Title Style", "Define styles for title");
		$panel2->addChild("group61", $group61);
		$row1 = new QodeRow();
		$group61->addChild("row1", $row1);
		$blog_chequered_title_color = new QodeField("colorsimple", "blog_chequered_title_color", "", "Title Color", "This is some description");
		$row1->addChild("blog_chequered_title_color", $blog_chequered_title_color);
		$blog_chequered_title_hover_color = new QodeField("colorsimple", "blog_chequered_title_hover_color", "", "Title Hover Color", "This is some description");
		$row1->addChild("blog_chequered_title_hover_color", $blog_chequered_title_hover_color);
		$blog_chequered_title_fontsize = new QodeField("textsimple", "blog_chequered_title_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("blog_chequered_title_fontsize", $blog_chequered_title_fontsize);
		$blog_chequered_title_lineheight = new QodeField("textsimple", "blog_chequered_title_lineheight", "", "Line Height (px)", "This is some description");
		$row1->addChild("blog_chequered_title_lineheight", $blog_chequered_title_lineheight);

		$row2 = new QodeRow(true);
		$group61->addChild("row2", $row2);
		$blog_chequered_title_texttransform = new QodeField("selectblanksimple", "blog_chequered_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
		$row2->addChild("blog_chequered_title_texttransform", $blog_chequered_title_texttransform);
		$blog_chequered_title_google_fonts = new QodeField("fontsimple", "blog_chequered_title_google_fonts", "-1", "Font Family", "This is some description");
		$row2->addChild("blog_chequered_title_google_fonts", $blog_chequered_title_google_fonts);
		$blog_chequered_title_fontstyle = new QodeField("selectblanksimple", "blog_chequered_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
		$row2->addChild("blog_chequered_title_fontstyle", $blog_chequered_title_fontstyle);
		$blog_chequered_title_fontweight = new QodeField("selectblanksimple", "blog_chequered_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row2->addChild("blog_chequered_title_fontweight", $blog_chequered_title_fontweight);

		$row3 = new QodeRow(true);
		$group61->addChild("row3", $row3);
		$blog_chequered_title_letterspacing = new QodeField("textsimple", "blog_chequered_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
		$row3->addChild("blog_chequered_title_letterspacing", $blog_chequered_title_letterspacing);

		$group62 = new QodeGroup("Post Info Style", "Define styles for post info");
		$panel2->addChild("group62", $group62);
		$row1 = new QodeRow();
		$group62->addChild("row1", $row1);
		$blog_chequered_post_info_color = new QodeField("colorsimple", "blog_chequered_post_info_color", "", "Text Color", "This is some description");
		$row1->addChild("blog_chequered_post_info_color", $blog_chequered_post_info_color);
		$blog_chequered_post_info_link_color = new QodeField("colorsimple", "blog_chequered_post_info_link_color", "", "Link Color", "This is some description");
		$row1->addChild("blog_chequered_post_info_link_color", $blog_chequered_post_info_link_color);
		$blog_chequered_post_info_link_hover_color = new QodeField("colorsimple", "blog_chequered_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
		$row1->addChild("blog_chequered_post_info_link_hover_color", $blog_chequered_post_info_link_hover_color);
		$blog_chequered_post_info_fontsize = new QodeField("textsimple", "blog_chequered_post_info_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("blog_chequered_post_info_fontsize", $blog_chequered_post_info_fontsize);

		$row2 = new QodeRow(true);
		$group62->addChild("row2", $row2);
		$blog_chequered_post_info_lineheight = new QodeField("textsimple", "blog_chequered_post_info_lineheight", "", "Line Height (px)", "This is some description");
		$row2->addChild("blog_chequered_post_info_lineheight", $blog_chequered_post_info_lineheight);
		$blog_chequered_post_info_texttransform = new QodeField("selectblanksimple", "blog_chequered_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
		$row2->addChild("blog_chequered_post_info_texttransform", $blog_chequered_post_info_texttransform);
		$blog_chequered_post_info_google_fonts = new QodeField("fontsimple", "blog_chequered_post_info_google_fonts", "-1", "Font Family", "This is some description");
		$row2->addChild("blog_chequered_post_info_google_fonts", $blog_chequered_post_info_google_fonts);
		$blog_chequered_post_info_fontstyle = new QodeField("selectblanksimple", "blog_chequered_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
		$row2->addChild("blog_chequered_post_info_fontstyle", $blog_chequered_post_info_fontstyle);

		$row3 = new QodeRow(true);
		$group62->addChild("row3", $row3);
		$blog_chequered_post_info_fontweight = new QodeField("selectblanksimple", "blog_chequered_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row3->addChild("blog_chequered_post_info_fontweight", $blog_chequered_post_info_fontweight);
		$blog_chequered_post_info_letterspacing = new QodeField("textsimple", "blog_chequered_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
		$row3->addChild("blog_chequered_post_info_letterspacing", $blog_chequered_post_info_letterspacing);

		$group63 = new QodeGroup("Quote/Link Style", "Define styles for Quote/Link post style");
		$panel2->addChild("group63", $group63);
		$row1 = new QodeRow();
		$group63->addChild("row1", $row1);
		$blog_chequered_ql_post_info_color = new QodeField("colorsimple", "blog_chequered_ql_post_info_color", "", "Text Color", "This is some description");
		$row1->addChild("blog_chequered_ql_post_info_color", $blog_chequered_ql_post_info_color);
		$blog_chequered_ql_post_info_fontsize = new QodeField("textsimple", "blog_chequered_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
		$row1->addChild("blog_chequered_ql_post_info_fontsize", $blog_chequered_ql_post_info_fontsize);
		$blog_chequered_ql_post_info_lineheight = new QodeField("textsimple", "blog_chequered_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
		$row1->addChild("blog_chequered_ql_post_info_lineheight", $blog_chequered_ql_post_info_lineheight);
		$blog_chequered_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_chequered_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
		$row1->addChild("blog_chequered_ql_post_info_texttransform", $blog_chequered_ql_post_info_texttransform);

		$row2 = new QodeRow(true);
		$group63->addChild("row2", $row2);

		$blog_chequered_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_chequered_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
		$row2->addChild("blog_chequered_ql_post_info_google_fonts", $blog_chequered_ql_post_info_google_fonts);
		$blog_chequered_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_chequered_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
		$row2->addChild("blog_chequered_ql_post_info_fontstyle", $blog_chequered_ql_post_info_fontstyle);
		$blog_chequered_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_chequered_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
		$row2->addChild("blog_chequered_ql_post_info_fontweight", $blog_chequered_ql_post_info_fontweight);
		$blog_chequered_ql_post_info_letterspacing = new QodeField("textsimple", "blog_chequered_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
		$row2->addChild("blog_chequered_ql_post_info_letterspacing", $blog_chequered_ql_post_info_letterspacing);



		$blog_large_image_simple_subtitle = new QodeTitle("blog_large_image_simple_subtitle", "Blog Large Image Simple Style");
        $panel2->addChild("blog_large_image_simple_subtitle", $blog_large_image_simple_subtitle);

        $group7 = new QodeGroup("Box Content Style", "Define styles for content box");
        $panel2->addChild("group7", $group7);
        $blog_large_image_simple_side_padding_left = new QodeField("textsimple", "blog_large_image_simple_side_padding_left", "", "Content Padding Left(px)", "This is some description");
        $group7->addChild("blog_large_image_simple_side_padding_left", $blog_large_image_simple_side_padding_left);

        $blog_large_image_simple_side_padding_right = new QodeField("textsimple", "blog_large_image_simple_side_padding_right", "", "Content Padding Right(px)", "This is some description");
        $group7->addChild("blog_large_image_simple_side_padding_right", $blog_large_image_simple_side_padding_right);

        $group8 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group8", $group8);
        $row1 = new QodeRow();
        $group8->addChild("row1", $row1);
        $blog_large_image_simple_title_color = new QodeField("colorsimple", "blog_large_image_simple_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_large_image_simple_title_color", $blog_large_image_simple_title_color);
        $blog_large_image_simple_title_hover_color = new QodeField("colorsimple", "blog_large_image_simple_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_large_image_simple_title_hover_color", $blog_large_image_simple_title_hover_color);
        $blog_large_image_simple_title_fontsize = new QodeField("textsimple", "blog_large_image_simple_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_simple_title_fontsize", $blog_large_image_simple_title_fontsize);
        $blog_large_image_simple_title_lineheight = new QodeField("textsimple", "blog_large_image_simple_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_large_image_simple_title_lineheight", $blog_large_image_simple_title_lineheight);

        $row2 = new QodeRow(true);
        $group8->addChild("row2", $row2);
        $blog_large_image_simple_title_texttransform = new QodeField("selectblanksimple", "blog_large_image_simple_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_simple_title_texttransform", $blog_large_image_simple_title_texttransform);
        $blog_large_image_simple_title_google_fonts = new QodeField("fontsimple", "blog_large_image_simple_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_simple_title_google_fonts", $blog_large_image_simple_title_google_fonts);
        $blog_large_image_simple_title_fontstyle = new QodeField("selectblanksimple", "blog_large_image_simple_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_simple_title_fontstyle", $blog_large_image_simple_title_fontstyle);
        $blog_large_image_simple_title_fontweight = new QodeField("selectblanksimple", "blog_large_image_simple_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_large_image_simple_title_fontweight", $blog_large_image_simple_title_fontweight);

        $row3 = new QodeRow(true);
        $group8->addChild("row3", $row3);
        $blog_large_image_simple_title_letterspacing = new QodeField("textsimple", "blog_large_image_simple_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_simple_title_letterspacing", $blog_large_image_simple_title_letterspacing);

        $group21 = new QodeGroup("Date Style", "Define styles for date");
        $panel2->addChild("group21", $group21);
        $row1 = new QodeRow();
        $group21->addChild("row1", $row1);
        $blog_large_image_simple_post_info_color = new QodeField("colorsimple", "blog_large_image_simple_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_large_image_simple_post_info_color", $blog_large_image_simple_post_info_color);
        $blog_large_image_simple_post_info_fontsize = new QodeField("textsimple", "blog_large_image_simple_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_simple_post_info_fontsize", $blog_large_image_simple_post_info_fontsize);
        $blog_large_image_simple_post_info_lineheight = new QodeField("textsimple", "blog_large_image_simple_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_large_image_simple_post_info_lineheight", $blog_large_image_simple_post_info_lineheight);
        $blog_large_image_simple_post_info_texttransform = new QodeField("selectblanksimple", "blog_large_image_simple_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("blog_large_image_simple_post_info_texttransform", $blog_large_image_simple_post_info_texttransform);

        $row2 = new QodeRow(true);
        $group21->addChild("row2", $row2);
        $blog_large_image_simple_post_info_google_fonts = new QodeField("fontsimple", "blog_large_image_simple_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_simple_post_info_google_fonts", $blog_large_image_simple_post_info_google_fonts);
        $blog_large_image_simple_post_info_fontstyle = new QodeField("selectblanksimple", "blog_large_image_simple_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_simple_post_info_fontstyle", $blog_large_image_simple_post_info_fontstyle);
        $blog_large_image_simple_post_info_fontweight = new QodeField("selectblanksimple", "blog_large_image_simple_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_large_image_simple_post_info_fontweight", $blog_large_image_simple_post_info_fontweight);
        $blog_large_image_simple_post_info_letterspacing = new QodeField("textsimple", "blog_large_image_simple_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("blog_large_image_simple_post_info_letterspacing", $blog_large_image_simple_post_info_letterspacing);

        $group26 = new QodeGroup("Quote/Link Date Style", "Define styles for Quote/Link date");
        $panel2->addChild("group26", $group26);
        $row1 = new QodeRow();
        $group26->addChild("row1", $row1);
        $blog_large_image_simple_ql_post_info_color = new QodeField("colorsimple", "blog_large_image_simple_ql_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_large_image_simple_ql_post_info_color", $blog_large_image_simple_ql_post_info_color);
        $blog_large_image_simple_ql_post_info_fontsize = new QodeField("textsimple", "blog_large_image_simple_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_simple_ql_post_info_fontsize", $blog_large_image_simple_ql_post_info_fontsize);
        $blog_large_image_simple_ql_post_info_lineheight = new QodeField("textsimple", "blog_large_image_simple_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_large_image_simple_ql_post_info_lineheight", $blog_large_image_simple_ql_post_info_lineheight);
        $blog_large_image_simple_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_large_image_simple_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("blog_large_image_simple_ql_post_info_texttransform", $blog_large_image_simple_ql_post_info_texttransform);

        $row2 = new QodeRow(true);
        $group26->addChild("row2", $row2);
        $blog_large_image_simple_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_large_image_simple_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_simple_ql_post_info_google_fonts", $blog_large_image_simple_ql_post_info_google_fonts);
        $blog_large_image_simple_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_large_image_simple_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_simple_ql_post_info_fontstyle", $blog_large_image_simple_ql_post_info_fontstyle);
        $blog_large_image_simple_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_large_image_simple_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_large_image_simple_ql_post_info_fontweight", $blog_large_image_simple_ql_post_info_fontweight);
        $blog_large_image_simple_ql_post_info_letterspacing = new QodeField("textsimple", "blog_large_image_simple_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("blog_large_image_simple_ql_post_info_letterspacing", $blog_large_image_simple_ql_post_info_letterspacing);


        $blog_large_image_dividers_subtitle = new QodeTitle("blog_large_image_dividers_subtitle", "Blog Large Image With Dividers Style");
        $panel2->addChild("blog_large_image_dividers_subtitle", $blog_large_image_dividers_subtitle);

        $blog_large_image_dividers_background_color = new QodeField("color", "blog_large_image_dividers_background_color", "", "Text Box Background Color", "Choose a background color for Blog Large Image With Dividers");
        $panel2->addChild("blog_large_image_dividers_background_color", $blog_large_image_dividers_background_color);

        $group9 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group9", $group9);
        $row1 = new QodeRow();
        $group9->addChild("row1", $row1);
        $blog_large_image_dividers_title_color = new QodeField("colorsimple", "blog_large_image_dividers_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_title_color", $blog_large_image_dividers_title_color);
        $blog_large_image_dividers_title_hover_color = new QodeField("colorsimple", "blog_large_image_dividers_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_title_hover_color", $blog_large_image_dividers_title_hover_color);
        $blog_large_image_dividers_title_fontsize = new QodeField("textsimple", "blog_large_image_dividers_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_dividers_title_fontsize", $blog_large_image_dividers_title_fontsize);
        $blog_large_image_dividers_title_lineheight = new QodeField("textsimple", "blog_large_image_dividers_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_large_image_dividers_title_lineheight", $blog_large_image_dividers_title_lineheight);
        $row2 = new QodeRow(true);
        $group9->addChild("row2", $row2);
        $blog_large_image_dividers_title_texttransform = new QodeField("selectblanksimple", "blog_large_image_dividers_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_dividers_title_texttransform", $blog_large_image_dividers_title_texttransform);
        $blog_large_image_dividers_title_google_fonts = new QodeField("fontsimple", "blog_large_image_dividers_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_dividers_title_google_fonts", $blog_large_image_dividers_title_google_fonts);
        $blog_large_image_dividers_title_fontstyle = new QodeField("selectblanksimple", "blog_large_image_dividers_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_dividers_title_fontstyle", $blog_large_image_dividers_title_fontstyle);
        $blog_large_image_dividers_title_fontweight = new QodeField("selectblanksimple", "blog_large_image_dividers_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_large_image_dividers_title_fontweight", $blog_large_image_dividers_title_fontweight);
        $row3 = new QodeRow(true);
        $group9->addChild("row3", $row3);
        $blog_large_image_dividers_title_letterspacing = new QodeField("textsimple", "blog_large_image_dividers_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_dividers_title_letterspacing", $blog_large_image_dividers_title_letterspacing);

        $group22 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel2->addChild("group22", $group22);
        $row1 = new QodeRow();
        $group22->addChild("row1", $row1);
        $blog_large_image_dividers_post_info_color = new QodeField("colorsimple", "blog_large_image_dividers_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_post_info_color", $blog_large_image_dividers_post_info_color);
        $blog_large_image_dividers_post_info_link_color = new QodeField("colorsimple", "blog_large_image_dividers_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_post_info_link_color", $blog_large_image_dividers_post_info_link_color);
        $blog_large_image_dividers_post_info_link_hover_color = new QodeField("colorsimple", "blog_large_image_dividers_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_post_info_link_hover_color", $blog_large_image_dividers_post_info_link_hover_color);
        $blog_large_image_dividers_post_info_fontsize = new QodeField("textsimple", "blog_large_image_dividers_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_dividers_post_info_fontsize", $blog_large_image_dividers_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group22->addChild("row2", $row2);
        $blog_large_image_dividers_post_info_lineheight = new QodeField("textsimple", "blog_large_image_dividers_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_large_image_dividers_post_info_lineheight", $blog_large_image_dividers_post_info_lineheight);
        $blog_large_image_dividers_post_info_texttransform = new QodeField("selectblanksimple", "blog_large_image_dividers_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_dividers_post_info_texttransform", $blog_large_image_dividers_post_info_texttransform);
        $blog_large_image_dividers_post_info_google_fonts = new QodeField("fontsimple", "blog_large_image_dividers_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_dividers_post_info_google_fonts", $blog_large_image_dividers_post_info_google_fonts);
        $blog_large_image_dividers_post_info_fontstyle = new QodeField("selectblanksimple", "blog_large_image_dividers_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_dividers_post_info_fontstyle", $blog_large_image_dividers_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group22->addChild("row3", $row3);
        $blog_large_image_dividers_post_info_fontweight = new QodeField("selectblanksimple", "blog_large_image_dividers_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_large_image_dividers_post_info_fontweight", $blog_large_image_dividers_post_info_fontweight);
        $blog_large_image_dividers_post_info_letterspacing = new QodeField("textsimple", "blog_large_image_dividers_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_dividers_post_info_letterspacing", $blog_large_image_dividers_post_info_letterspacing);

        $group27 = new QodeGroup("Post Info Quote/Link Style", "Define styles for Quote/Link post info");
        $panel2->addChild("group27", $group27);
        $row1 = new QodeRow();
        $group27->addChild("row1", $row1);
        $blog_large_image_dividers_ql_post_info_color = new QodeField("colorsimple", "blog_large_image_dividers_ql_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_ql_post_info_color", $blog_large_image_dividers_ql_post_info_color);
        $blog_large_image_dividers_ql_post_info_link_color = new QodeField("colorsimple", "blog_large_image_dividers_ql_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_ql_post_info_link_color", $blog_large_image_dividers_ql_post_info_link_color);
        $blog_large_image_dividers_ql_post_info_link_hover_color = new QodeField("colorsimple", "blog_large_image_dividers_ql_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_large_image_dividers_ql_post_info_link_hover_color", $blog_large_image_dividers_ql_post_info_link_hover_color);
        $blog_large_image_dividers_ql_post_info_fontsize = new QodeField("textsimple", "blog_large_image_dividers_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_large_image_dividers_ql_post_info_fontsize", $blog_large_image_dividers_ql_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group27->addChild("row2", $row2);
        $blog_large_image_dividers_ql_post_info_lineheight = new QodeField("textsimple", "blog_large_image_dividers_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_large_image_dividers_ql_post_info_lineheight", $blog_large_image_dividers_ql_post_info_lineheight);
        $blog_large_image_dividers_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_large_image_dividers_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_large_image_dividers_ql_post_info_texttransform", $blog_large_image_dividers_ql_post_info_texttransform);
        $blog_large_image_dividers_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_large_image_dividers_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_large_image_dividers_ql_post_info_google_fonts", $blog_large_image_dividers_ql_post_info_google_fonts);
        $blog_large_image_dividers_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_large_image_dividers_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_large_image_dividers_ql_post_info_fontstyle", $blog_large_image_dividers_ql_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group27->addChild("row3", $row3);
        $blog_large_image_dividers_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_large_image_dividers_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_large_image_dividers_ql_post_info_fontweight", $blog_large_image_dividers_ql_post_info_fontweight);
        $blog_large_image_dividers_ql_post_info_letterspacing = new QodeField("textsimple", "blog_large_image_dividers_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_large_image_dividers_ql_post_info_letterspacing", $blog_large_image_dividers_ql_post_info_letterspacing);

        $blog_vertical_loop_subtitle = new QodeTitle("blog_vertical_loop_subtitle", "Blog Vertical Loop Style");
        $panel2->addChild("blog_vertical_loop_subtitle", $blog_vertical_loop_subtitle);

        $group10 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group10", $group10);
        $row1 = new QodeRow();
        $group10->addChild("row1", $row1);
        $blog_vertical_loop_title_color = new QodeField("colorsimple", "blog_vertical_loop_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_vertical_loop_title_color", $blog_vertical_loop_title_color);
        $blog_vertical_loop_title_hover_color = new QodeField("colorsimple", "blog_vertical_loop_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_vertical_loop_title_hover_color", $blog_vertical_loop_title_hover_color);
        $blog_vertical_loop_title_fontsize = new QodeField("textsimple", "blog_vertical_loop_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_title_fontsize", $blog_vertical_loop_title_fontsize);
        $blog_vertical_loop_title_lineheight = new QodeField("textsimple", "blog_vertical_loop_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_title_lineheight", $blog_vertical_loop_title_lineheight);
        $row2 = new QodeRow(true);
        $group10->addChild("row2", $row2);
        $blog_vertical_loop_title_texttransform = new QodeField("selectblanksimple", "blog_vertical_loop_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_vertical_loop_title_texttransform", $blog_vertical_loop_title_texttransform);
        $blog_vertical_loop_title_google_fonts = new QodeField("fontsimple", "blog_vertical_loop_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_vertical_loop_title_google_fonts", $blog_vertical_loop_title_google_fonts);
        $blog_vertical_loop_title_fontstyle = new QodeField("selectblanksimple", "blog_vertical_loop_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_vertical_loop_title_fontstyle", $blog_vertical_loop_title_fontstyle);
        $blog_vertical_loop_title_fontweight = new QodeField("selectblanksimple", "blog_vertical_loop_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_vertical_loop_title_fontweight", $blog_vertical_loop_title_fontweight);
        $row3 = new QodeRow(true);
        $group10->addChild("row3", $row3);
        $blog_vertical_loop_title_letterspacing = new QodeField("textsimple", "blog_vertical_loop_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_vertical_loop_title_letterspacing", $blog_vertical_loop_title_letterspacing);

        $group11 = new QodeGroup("Next Post Title Style", "Define styles for next post title");
        $panel2->addChild("group11", $group11);
        $row1 = new QodeRow();
        $group11->addChild("row1", $row1);
        $blog_vertical_loop_next_post_title_color = new QodeField("colorsimple", "blog_vertical_loop_next_post_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_vertical_loop_next_post_title_color", $blog_vertical_loop_next_post_title_color);
        $blog_vertical_loop_next_post_title_fontsize = new QodeField("textsimple", "blog_vertical_loop_next_post_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_next_post_title_fontsize", $blog_vertical_loop_next_post_title_fontsize);
        $blog_vertical_loop_next_post_title_lineheight = new QodeField("textsimple", "blog_vertical_loop_next_post_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_next_post_title_lineheight", $blog_vertical_loop_next_post_title_lineheight);
        $blog_vertical_loop_next_post_title_texttransform = new QodeField("selectblanksimple", "blog_vertical_loop_next_post_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("blog_vertical_loop_next_post_title_texttransform", $blog_vertical_loop_next_post_title_texttransform);
        $row2 = new QodeRow(true);
        $group11->addChild("row2", $row2);
        $blog_vertical_loop_next_post_title_google_fonts = new QodeField("fontsimple", "blog_vertical_loop_next_post_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_vertical_loop_next_post_title_google_fonts", $blog_vertical_loop_next_post_title_google_fonts);
        $blog_vertical_loop_next_post_title_fontstyle = new QodeField("selectblanksimple", "blog_vertical_loop_next_post_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_vertical_loop_next_post_title_fontstyle", $blog_vertical_loop_next_post_title_fontstyle);
        $blog_vertical_loop_next_post_title_fontweight = new QodeField("selectblanksimple", "blog_vertical_loop_next_post_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_vertical_loop_next_post_title_fontweight", $blog_vertical_loop_next_post_title_fontweight);
        $blog_vertical_loop_next_post_title_letterspacing = new QodeField("textsimple", "blog_vertical_loop_next_post_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("blog_vertical_loop_next_post_title_letterspacing", $blog_vertical_loop_next_post_title_letterspacing);


        $group12 = new QodeGroup("Post info Style", "Define styles for post info");
        $panel2->addChild("group12", $group12);
        $row1 = new QodeRow();
        $group12->addChild("row1", $row1);
        $blog_vertical_loop_post_info_color = new QodeField("colorsimple", "blog_vertical_loop_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_vertical_loop_post_info_color", $blog_vertical_loop_post_info_color);
        $blog_vertical_loop_post_info_link_color = new QodeField("colorsimple", "blog_vertical_loop_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_vertical_loop_post_info_link_color", $blog_vertical_loop_post_info_link_color);
        $blog_vertical_loop_post_info_hover_color = new QodeField("colorsimple", "blog_vertical_loop_post_info_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_vertical_loop_post_info_hover_color", $blog_vertical_loop_post_info_hover_color);
        $blog_vertical_loop_post_info_fontsize = new QodeField("textsimple", "blog_vertical_loop_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_post_info_fontsize", $blog_vertical_loop_post_info_fontsize);
        $row2 = new QodeRow(true);
        $group12->addChild("row2", $row2);
        $blog_vertical_loop_post_info_lineheight = new QodeField("textsimple", "blog_vertical_loop_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_vertical_loop_post_info_lineheight", $blog_vertical_loop_post_info_lineheight);
        $blog_vertical_loop_post_info_texttransform = new QodeField("selectblanksimple", "blog_vertical_loop_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_vertical_loop_post_info_texttransform", $blog_vertical_loop_post_info_texttransform);
        $blog_vertical_loop_post_info_google_fonts = new QodeField("fontsimple", "blog_vertical_loop_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_vertical_loop_post_info_google_fonts", $blog_vertical_loop_post_info_google_fonts);
        $blog_vertical_loop_post_info_fontstyle = new QodeField("selectblanksimple", "blog_vertical_loop_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_vertical_loop_post_info_fontstyle", $blog_vertical_loop_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group12->addChild("row3", $row3);
        $blog_vertical_loop_post_info_fontweight = new QodeField("selectblanksimple", "blog_vertical_loop_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_vertical_loop_post_info_fontweight", $blog_vertical_loop_post_info_fontweight);
        $blog_vertical_loop_post_info_letterspacing = new QodeField("textsimple", "blog_vertical_loop_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_vertical_loop_post_info_letterspacing", $blog_vertical_loop_post_info_letterspacing);

        $group13 = new QodeGroup("Quote/Link Title Style", "Define styles for title");
        $panel2->addChild("group13", $group13);
        $row1 = new QodeRow();
        $group13->addChild("row1", $row1);
        $blog_vertical_loop_ql_title_color = new QodeField("colorsimple", "blog_vertical_loop_ql_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_title_color", $blog_vertical_loop_ql_title_color);
        $blog_vertical_loop_ql_title_hover_color = new QodeField("colorsimple", "blog_vertical_loop_ql_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_title_hover_color", $blog_vertical_loop_ql_title_hover_color);
        $blog_vertical_loop_ql_title_author_color = new QodeField("colorsimple", "blog_vertical_loop_ql_title_author_color", "", "Quote Author Color", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_title_author_color", $blog_vertical_loop_ql_title_author_color);
        $blog_vertical_loop_ql_title_fontsize = new QodeField("textsimple", "blog_vertical_loop_ql_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_title_fontsize", $blog_vertical_loop_ql_title_fontsize);

        $row2 = new QodeRow(true);
        $group13->addChild("row2", $row2);
        $blog_vertical_loop_ql_title_lineheight = new QodeField("textsimple", "blog_vertical_loop_ql_title_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_vertical_loop_ql_title_lineheight", $blog_vertical_loop_ql_title_lineheight);
        $blog_vertical_loop_ql_title_texttransform = new QodeField("selectblanksimple", "blog_vertical_loop_ql_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_vertical_loop_ql_title_texttransform", $blog_vertical_loop_ql_title_texttransform);
        $blog_vertical_loop_ql_title_google_fonts = new QodeField("fontsimple", "blog_vertical_loop_ql_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_vertical_loop_ql_title_google_fonts", $blog_vertical_loop_ql_title_google_fonts);
        $blog_vertical_loop_ql_title_fontstyle = new QodeField("selectblanksimple", "blog_vertical_loop_ql_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_vertical_loop_ql_title_fontstyle", $blog_vertical_loop_ql_title_fontstyle);

        $row3 = new QodeRow(true);
        $group13->addChild("row3", $row3);
        $blog_vertical_loop_ql_title_fontweight = new QodeField("selectblanksimple", "blog_vertical_loop_ql_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_vertical_loop_ql_title_fontweight", $blog_vertical_loop_ql_title_fontweight);
        $blog_vertical_loop_ql_title_letterspacing = new QodeField("textsimple", "blog_vertical_loop_ql_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_vertical_loop_ql_title_letterspacing", $blog_vertical_loop_ql_title_letterspacing);

        $group14 = new QodeGroup("Quote/Link Post Info", "Define styles for Quote/Link post info");
        $panel2->addChild("group14", $group14);
        $row1 = new QodeRow();
        $group14->addChild("row1", $row1);
        $blog_vertical_loop_ql_post_info_color = new QodeField("colorsimple", "blog_vertical_loop_ql_post_info_color", "", "Text Color", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_post_info_color", $blog_vertical_loop_ql_post_info_color);
        $blog_vertical_loop_ql_post_info_link_color = new QodeField("colorsimple", "blog_vertical_loop_ql_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_post_info_link_color", $blog_vertical_loop_ql_post_info_link_color);
        $blog_vertical_loop_ql_post_info_hover_color = new QodeField("colorsimple", "blog_vertical_loop_ql_post_info_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_post_info_hover_color", $blog_vertical_loop_ql_post_info_hover_color);
        $blog_vertical_loop_ql_post_info_fontsize = new QodeField("textsimple", "blog_vertical_loop_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_vertical_loop_ql_post_info_fontsize", $blog_vertical_loop_ql_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group14->addChild("row2", $row2);
        $blog_vertical_loop_ql_post_info_lineheight = new QodeField("textsimple", "blog_vertical_loop_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_vertical_loop_ql_post_info_lineheight", $blog_vertical_loop_ql_post_info_lineheight);
        $blog_vertical_loop_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_vertical_loop_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_vertical_loop_ql_post_info_texttransform", $blog_vertical_loop_ql_post_info_texttransform);
        $blog_vertical_loop_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_vertical_loop_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_vertical_loop_ql_post_info_google_fonts", $blog_vertical_loop_ql_post_info_google_fonts);
        $blog_vertical_loop_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_vertical_loop_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_vertical_loop_ql_post_info_fontstyle", $blog_vertical_loop_ql_post_info_fontstyle);

        $row3 = new QodeRow(true);
        $group14->addChild("row3", $row3);
        $blog_vertical_loop_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_vertical_loop_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_vertical_loop_ql_post_info_fontweight", $blog_vertical_loop_ql_post_info_fontweight);
        $blog_vertical_loop_ql_post_info_letterspacing = new QodeField("textsimple", "blog_vertical_loop_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_vertical_loop_ql_post_info_letterspacing", $blog_vertical_loop_ql_post_info_letterspacing);

        $group15 = new QodeGroup("Next/Prev Buttons Style", "Define styles next/prev buttons");
        $panel2->addChild("group15", $group15);
        $row1 = new QodeRow();
        $group15->addChild("row1", $row1);
        $blog_vertical_loop_npb_background_color = new QodeField("colorsimple", "blog_vertical_loop_npb_background_color", "", "Background Color", "This is some description");
        $row1->addChild("blog_vertical_loop_npb_background_color", $blog_vertical_loop_npb_background_color);

        $blog_vertical_loop_npb_background_hover_color = new QodeField("colorsimple", "blog_vertical_loop_npb_background_hover_color", "", "Background Hover Color", "This is some description");
        $row1->addChild("blog_vertical_loop_npb_background_hover_color", $blog_vertical_loop_npb_background_hover_color);

        $blog_vertical_loop_npb_icon_color = new QodeField("colorsimple", "blog_vertical_loop_npb_icon_color", "", "Icon Color", "This is some description");
        $row1->addChild("blog_vertical_loop_npb_icon_color", $blog_vertical_loop_npb_icon_color);

        $blog_vertical_loop_npb_icon_hover_color = new QodeField("colorsimple", "blog_vertical_loop_npb_icon_hover_color", "", "Icon Hover Color", "This is some description");
        $row1->addChild("blog_vertical_loop_npb_icon_hover_color", $blog_vertical_loop_npb_icon_hover_color);

        $blog_masonry_date_image_subtitle = new QodeTitle("blog_masonry_date_image_subtitle", "Masonry - Date in Image Style");
        $panel2->addChild("blog_masonry_date_image_subtitle", $blog_masonry_date_image_subtitle);

        $group16 = new QodeGroup("Masonry - Date in Image Style", 'Choose a background color for Blog Masonry - Date in Image');
        $panel2->addChild("group16", $group16);
        $row1 = new QodeRow();
        $group16->addChild("row1", $row1);
        $blog_masonry_date_image_background_color = new QodeField("colorsimple", "blog_masonry_date_image_background_color", "", "Text Box Background Color", "ThisIsDescription");
        $row1->addChild("blog_masonry_date_image_background_color", $blog_masonry_date_image_background_color);

        $group17 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group17", $group17);
        $row1 = new QodeRow();
        $group17->addChild("row1", $row1);
        $blog_masonry_date_image_title_color = new QodeField("colorsimple", "blog_masonry_date_image_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_masonry_date_image_title_color", $blog_masonry_date_image_title_color);
        $blog_masonry_date_image_title_hover_color = new QodeField("colorsimple", "blog_masonry_date_image_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_masonry_date_image_title_hover_color", $blog_masonry_date_image_title_hover_color);
        $blog_masonry_date_image_title_fontsize = new QodeField("textsimple", "blog_masonry_date_image_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_masonry_date_image_title_fontsize", $blog_masonry_date_image_title_fontsize);
        $blog_masonry_date_image_title_lineheight = new QodeField("textsimple", "blog_masonry_date_image_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_masonry_date_image_title_lineheight", $blog_masonry_date_image_title_lineheight);

        $row2 = new QodeRow(true);
        $group17->addChild("row2", $row2);
        $blog_masonry_date_image_title_texttransform = new QodeField("selectblanksimple", "blog_masonry_date_image_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_masonry_date_image_title_texttransform", $blog_masonry_date_image_title_texttransform);
        $blog_masonry_date_image_title_google_fonts = new QodeField("fontsimple", "blog_masonry_date_image_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_masonry_date_image_title_google_fonts", $blog_masonry_date_image_title_google_fonts);
        $blog_masonry_date_image_title_fontstyle = new QodeField("selectblanksimple", "blog_masonry_date_image_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_masonry_date_image_title_fontstyle", $blog_masonry_date_image_title_fontstyle);
        $blog_masonry_date_image_title_fontweight = new QodeField("selectblanksimple", "blog_masonry_date_image_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_masonry_date_image_title_fontweight", $blog_masonry_date_image_title_fontweight);

        $row3 = new QodeRow(true);
        $group17->addChild("row3", $row3);
        $blog_masonry_date_image_title_letterspacing = new QodeField("textsimple", "blog_masonry_date_image_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_masonry_date_image_title_letterspacing", $blog_masonry_date_image_title_letterspacing);

        $group35 = new QodeGroup("Hover Type", "Define hover type for articles");
        $panel2->addChild("group35", $group35);
        $row1 = new QodeRow();
        $group35->addChild("row1", $row1);
        $blog_masonry_date_image_hover_type = new QodeField("selectblanksimple", "blog_masonry_date_image_hover_type", "", "Hover Type", "ThisIsDescription", array(
            'qodef-no-hover' => 'None',
            'qodef-zoom' => 'Zoom In'
        ));
        $row1->addChild("blog_masonry_date_image_hover_type", $blog_masonry_date_image_hover_type);

        $blog_pinterest_subtitle = new QodeTitle("blog_pinterest_subtitle", "Pinterest Style");
        $panel2->addChild("blog_pinterest_subtitle", $blog_pinterest_subtitle);

        $group30 = new QodeGroup("Pinterest Style", 'Define styles for the "Pinterest" Blog List');
        $panel2->addChild("group30", $group30);
            $row1 = new QodeRow();
            $group30->addChild("row1", $row1);
            $blog_pinterest_background_color = new QodeField("colorsimple", "blog_pinterest_background_color", "", "Text Box Background Color", "ThisIsDescription");
            $row1->addChild("blog_pinterest_background_color", $blog_pinterest_background_color);

        $group31 = new QodeGroup("Title Style", "Define styles for title");
        $panel2->addChild("group31", $group31);
            $row1 = new QodeRow();
            $group31->addChild("row1", $row1);
            $blog_pinterest_title_color = new QodeField("colorsimple", "blog_pinterest_title_color", "", "Title Color", "This is some description");
            $row1->addChild("blog_pinterest_title_color", $blog_pinterest_title_color);
            $blog_pinterest_title_hover_color = new QodeField("colorsimple", "blog_pinterest_title_hover_color", "", "Title Hover Color", "This is some description");
            $row1->addChild("blog_pinterest_title_hover_color", $blog_pinterest_title_hover_color);
            $blog_pinterest_title_fontsize = new QodeField("textsimple", "blog_pinterest_title_fontsize", "", "Font Size (px)", "This is some description");
            $row1->addChild("blog_pinterest_title_fontsize", $blog_pinterest_title_fontsize);
            $blog_pinterest_title_lineheight = new QodeField("textsimple", "blog_pinterest_title_lineheight", "", "Line Height (px)", "This is some description");
            $row1->addChild("blog_pinterest_title_lineheight", $blog_pinterest_title_lineheight);

            $row2 = new QodeRow(true);
            $group31->addChild("row2", $row2);
            $blog_pinterest_title_texttransform = new QodeField("selectblanksimple", "blog_pinterest_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
            $row2->addChild("blog_pinterest_title_texttransform", $blog_pinterest_title_texttransform);
            $blog_pinterest_title_google_fonts = new QodeField("fontsimple", "blog_pinterest_title_google_fonts", "-1", "Font Family", "This is some description");
            $row2->addChild("blog_pinterest_title_google_fonts", $blog_pinterest_title_google_fonts);
            $blog_pinterest_title_fontstyle = new QodeField("selectblanksimple", "blog_pinterest_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
            $row2->addChild("blog_pinterest_title_fontstyle", $blog_pinterest_title_fontstyle);
            $blog_pinterest_title_fontweight = new QodeField("selectblanksimple", "blog_pinterest_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
            $row2->addChild("blog_pinterest_title_fontweight", $blog_pinterest_title_fontweight);

            $row3 = new QodeRow(true);
            $group31->addChild("row3", $row3);
            $blog_pinterest_title_letterspacing = new QodeField("textsimple", "blog_pinterest_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
            $row3->addChild("blog_pinterest_title_letterspacing", $blog_pinterest_title_letterspacing);

        $group32 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel2->addChild("group32", $group32);
            $row1 = new QodeRow();
            $group32->addChild("row1", $row1);
            $blog_pinterest_post_info_color = new QodeField("colorsimple", "blog_pinterest_post_info_color", "", "Text Color", "This is some description");
            $row1->addChild("blog_pinterest_post_info_color", $blog_pinterest_post_info_color);
            $blog_pinterest_post_info_link_color = new QodeField("colorsimple", "blog_pinterest_post_info_link_color", "", "Link Color", "This is some description");
            $row1->addChild("blog_pinterest_post_info_link_color", $blog_pinterest_post_info_link_color);
            $blog_pinterest_post_info_link_hover_color = new QodeField("colorsimple", "blog_pinterest_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
            $row1->addChild("blog_pinterest_post_info_link_hover_color", $blog_pinterest_post_info_link_hover_color);
            $blog_pinterest_post_info_fontsize = new QodeField("textsimple", "blog_pinterest_post_info_fontsize", "", "Font Size (px)", "This is some description");
            $row1->addChild("blog_pinterest_post_info_fontsize", $blog_pinterest_post_info_fontsize);

            $row2 = new QodeRow(true);
            $group32->addChild("row2", $row2);
            $blog_pinterest_post_info_lineheight = new QodeField("textsimple", "blog_pinterest_post_info_lineheight", "", "Line Height (px)", "This is some description");
            $row2->addChild("blog_pinterest_post_info_lineheight", $blog_pinterest_post_info_lineheight);
            $blog_pinterest_post_info_texttransform = new QodeField("selectblanksimple", "blog_pinterest_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
            $row2->addChild("blog_pinterest_post_info_texttransform", $blog_pinterest_post_info_texttransform);
            $blog_pinterest_post_info_google_fonts = new QodeField("fontsimple", "blog_pinterest_post_info_google_fonts", "-1", "Font Family", "This is some description");
            $row2->addChild("blog_pinterest_post_info_google_fonts", $blog_pinterest_post_info_google_fonts);
            $blog_pinterest_post_info_fontstyle = new QodeField("selectblanksimple", "blog_pinterest_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
            $row2->addChild("blog_pinterest_post_info_fontstyle", $blog_pinterest_post_info_fontstyle);

            $row3 = new QodeRow(true);
            $group32->addChild("row3", $row3);
            $blog_pinterest_post_info_fontweight = new QodeField("selectblanksimple", "blog_pinterest_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
            $row3->addChild("blog_pinterest_post_info_fontweight", $blog_pinterest_post_info_fontweight);
            $blog_pinterest_post_info_letterspacing = new QodeField("textsimple", "blog_pinterest_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
            $row3->addChild("blog_pinterest_post_info_letterspacing", $blog_pinterest_post_info_letterspacing);

        $group33 = new QodeGroup("Post Info Quote/Link Style", "Define styles for Quote/Link post info");
        $panel2->addChild("group33", $group33);
            $row1 = new QodeRow();
            $group33->addChild("row1", $row1);
            $blog_pinterest_ql_post_info_color = new QodeField("colorsimple", "blog_pinterest_ql_post_info_color", "", "Text Color", "This is some description");
            $row1->addChild("blog_pinterest_ql_post_info_color", $blog_pinterest_ql_post_info_color);
            $blog_pinterest_ql_post_info_fontsize = new QodeField("textsimple", "blog_pinterest_ql_post_info_fontsize", "", "Font Size (px)", "This is some description");
            $row1->addChild("blog_pinterest_ql_post_info_fontsize", $blog_pinterest_ql_post_info_fontsize);

            $row2 = new QodeRow(true);
            $group33->addChild("row2", $row2);
            $blog_pinterest_ql_post_info_lineheight = new QodeField("textsimple", "blog_pinterest_ql_post_info_lineheight", "", "Line Height (px)", "This is some description");
            $row2->addChild("blog_pinterest_ql_post_info_lineheight", $blog_pinterest_ql_post_info_lineheight);
            $blog_pinterest_ql_post_info_texttransform = new QodeField("selectblanksimple", "blog_pinterest_ql_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
            $row2->addChild("blog_pinterest_ql_post_info_texttransform", $blog_pinterest_ql_post_info_texttransform);
            $blog_pinterest_ql_post_info_google_fonts = new QodeField("fontsimple", "blog_pinterest_ql_post_info_google_fonts", "-1", "Font Family", "This is some description");
            $row2->addChild("blog_pinterest_ql_post_info_google_fonts", $blog_pinterest_ql_post_info_google_fonts);
            $blog_pinterest_ql_post_info_fontstyle = new QodeField("selectblanksimple", "blog_pinterest_ql_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
            $row2->addChild("blog_pinterest_ql_post_info_fontstyle", $blog_pinterest_ql_post_info_fontstyle);

            $row3 = new QodeRow(true);
            $group33->addChild("row3", $row3);
            $blog_pinterest_ql_post_info_fontweight = new QodeField("selectblanksimple", "blog_pinterest_ql_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
            $row3->addChild("blog_pinterest_ql_post_info_fontweight", $blog_pinterest_ql_post_info_fontweight);
            $blog_pinterest_ql_post_info_letterspacing = new QodeField("textsimple", "blog_pinterest_ql_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
            $row3->addChild("blog_pinterest_ql_post_info_letterspacing", $blog_pinterest_ql_post_info_letterspacing);


        // Blog Single

        $panel3 = new QodePanel("Blog Single", "blog_single_panel");
        $blogPage->addChild("panel3", $panel3);

		qode_add_admin_field(
			array(
				'name'          => 'blog_single_type',
				'type'          => 'select',
				'label'         => 'Choose a default type for Single Post pages',
				'description'   => '',
				'options'     => array(
					'standard'				=> 'Standard',
					'image-title-post'		=> 'Image Title Post'
				),
				'default_value'		=> 'standard',
				'parent'        => $panel3
			)
		);

        $blog_single_sidebar = new QodeField("select", "blog_single_sidebar", "default", "Sidebar Layout", "Choose a sidebar layout for Blog Single pages", array("default" => "No Sidebar",
            "1" => "Sidebar 1/3 right",
            "2" => "Sidebar 1/4 right",
            "3" => "Sidebar 1/3 left",
            "4" => "Sidebar 1/4 left"
        ));
        $panel3->addChild("blog_single_sidebar", $blog_single_sidebar);

        $custom_sidebars = array();
        foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
            if (isUserMadeSidebar(ucwords($sidebar['name']))) {
                $custom_sidebars[$sidebar['id']] = ucwords($sidebar['name']);
            }
        }
        $blog_single_sidebar_custom_display = new QodeField("selectblank", "blog_single_sidebar_custom_display", "", "Sidebar to Display", "Choose a sidebar to display on Blog Single pages", $custom_sidebars);
        $panel3->addChild("blog_single_sidebar_custom_display", $blog_single_sidebar_custom_display);

        $blog_share_like_layout = new QodeField("select", "blog_share_like_layout", "in_post_info", "Share/Like Layout", "Choose a share/like layout for Blog Single pages", array(
            "in_post_info" => "In Post Info",
            "below_post_text" => "Below Post Text"
        ));
        $panel3->addChild("blog_share_like_layout", $blog_share_like_layout);

        $blog_author_info = new QodeField("yesno", "blog_author_info", "no", "Show Blog Author", "Enabling this option will display author name on Blog Single pages");
        $panel3->addChild("blog_author_info", $blog_author_info);

        $group1 = new QodeGroup("Blog Single Spacing", "Set spacing for blog single posts");
        $panel3->addChild("group1", $group1);
        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);
        $blog_single_image_margin_bottom = new QodeField("textsimple", "blog_single_image_margin_bottom", "", "Image Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_single_image_margin_bottom", $blog_single_image_margin_bottom);
        $blog_single_title_margin_bottom = new QodeField("textsimple", "blog_single_title_margin_bottom", "", "Title Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_single_title_margin_bottom", $blog_single_title_margin_bottom);
        $blog_single_post_info_margin_bottom = new QodeField("textsimple", "blog_single_post_info_margin_bottom", "", "Post Info Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_single_post_info_margin_bottom", $blog_single_post_info_margin_bottom);

        // Quote/Link

        $panel1 = new QodePanel("Quote/Link", "quote_link_panel");
        $blogPage->addChild("panel1", $panel1);
        $blog_quote_link_box_color = new QodeField("color", "blog_quote_link_box_color", "", "Box Backround Color", 'Choose a box background color for "Quote" and "Link" type blog displays');
        $panel1->addChild("blog_quote_link_box_color", $blog_quote_link_box_color);


        $panel4 = new QodePanel("Blog Slider", "blog_slider_panel");
        $blogPage->addChild("panel4", $panel4);

        $blog_slider_default_subtitle = new QodeTitle("blog_slider_default_subtitle", "Blog Carousel Slider Style");
        $panel4->addChild("blog_slider_default_subtitle", $blog_slider_default_subtitle);

        $group1 = new QodeGroup("Title Style", "Define styles for title");
        $panel4->addChild("group1", $group1);

        $row1 = new QodeRow();
        $group1->addChild("row1", $row1);

        $blog_slider_title_color = new QodeField("colorsimple", "blog_slider_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_slider_title_color", $blog_slider_title_color);
        $blog_slider_title_hover_color = new QodeField("colorsimple", "blog_slider_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_slider_title_hover_color", $blog_slider_title_hover_color);
        $blog_slider_title_fontsize = new QodeField("textsimple", "blog_slider_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_slider_title_fontsize", $blog_slider_title_fontsize);
        $blog_slider_title_lineheight = new QodeField("textsimple", "blog_slider_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_slider_title_lineheight", $blog_slider_title_lineheight);

        $row2 = new QodeRow();
        $group1->addChild("row2", $row2);

        $blog_slider_title_texttransform = new QodeField("selectblanksimple", "blog_slider_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_slider_title_texttransform", $blog_slider_title_texttransform);
        $blog_slider_title_google_fonts = new QodeField("fontsimple", "blog_slider_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_slider_title_google_fonts", $blog_slider_title_google_fonts);
        $blog_slider_title_fontstyle = new QodeField("selectblanksimple", "blog_slider_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_slider_title_fontstyle", $blog_slider_title_fontstyle);
        $blog_slider_title_fontweight = new QodeField("selectblanksimple", "blog_slider_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_slider_title_fontweight", $blog_slider_title_fontweight);

        $row3 = new QodeRow();
        $group1->addChild("row3", $row3);

        $blog_slider_title_letterspacing = new QodeField("textsimple", "blog_slider_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_slider_title_letterspacing", $blog_slider_title_letterspacing);

        $group2 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel4->addChild("group2", $group2);

        $row1 = new QodeRow();
        $group2->addChild("row1", $row1);

        $blog_slider_post_info_color = new QodeField("colorsimple", "blog_slider_post_info_color", "", "Color", "This is some description");
        $row1->addChild("blog_slider_post_info_color", $blog_slider_post_info_color);

        $blog_slider_post_info_link_color = new QodeField("colorsimple", "blog_slider_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_slider_post_info_link_color", $blog_slider_post_info_link_color);

        $blog_slider_post_info_link_hover_color = new QodeField("colorsimple", "blog_slider_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_slider_post_info_link_hover_color", $blog_slider_post_info_link_hover_color);

        $blog_slider_post_info_fontsize = new QodeField("textsimple", "blog_slider_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_slider_post_info_fontsize", $blog_slider_post_info_fontsize);

        $row2 = new QodeRow(true);
        $group2->addChild("row2", $row2);

        $blog_slider_post_info_lineheight = new QodeField("textsimple", "blog_slider_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_slider_post_info_lineheight", $blog_slider_post_info_lineheight);

        $blog_slider_post_info_texttransform = new QodeField("selectblanksimple", "blog_slider_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_slider_post_info_texttransform", $blog_slider_post_info_texttransform);

        $blog_slider_post_info_google_fonts = new QodeField("fontsimple", "blog_slider_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_slider_post_info_google_fonts", $blog_slider_post_info_google_fonts);

        $blog_slider_post_info_fontstyle = new QodeField("selectblanksimple", "blog_slider_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_slider_post_info_fontstyle", $blog_slider_post_info_fontstyle);

        $row3 = new QodeRow();
        $group2->addChild("row3", $row3);

        $blog_slider_post_info_fontweight = new QodeField("selectblanksimple", "blog_slider_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_slider_post_info_fontweight", $blog_slider_post_info_fontweight);

        $blog_slider_post_info_letterspacing = new QodeField("textsimple", "blog_slider_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_slider_post_info_letterspacing", $blog_slider_post_info_letterspacing);

        $group9 = new QodeGroup("Day Style", "Define styles for post info - Day, for Post Info Position - Bottom (if not set, it will be inherited from Post Info Style)");
        $panel4->addChild("group9", $group9);

        $row1 = new QodeRow();
        $group9->addChild("row1", $row1);

        $blog_slider_day_color = new QodeField("colorsimple", "blog_slider_day_color", "", "Color", "This is some description");
        $row1->addChild("blog_slider_day_color", $blog_slider_day_color);

        $blog_slider_day_fontsize = new QodeField("textsimple", "blog_slider_day_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_slider_day_fontsize", $blog_slider_day_fontsize);

        $blog_slider_day_lineheight = new QodeField("textsimple", "blog_slider_day_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_slider_day_lineheight", $blog_slider_day_lineheight);

        $blog_slider_day_texttransform = new QodeField("selectblanksimple", "blog_slider_day_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("blog_slider_day_texttransform", $blog_slider_day_texttransform);

        $row2 = new QodeRow(true);
        $group9->addChild("row2", $row2);

        $blog_slider_day_google_fonts = new QodeField("fontsimple", "blog_slider_day_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_slider_day_google_fonts", $blog_slider_day_google_fonts);

        $blog_slider_day_fontstyle = new QodeField("selectblanksimple", "blog_slider_day_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_slider_day_fontstyle", $blog_slider_day_fontstyle);

        $blog_slider_day_fontweight = new QodeField("selectblanksimple", "blog_slider_day_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_slider_day_fontweight", $blog_slider_day_fontweight);

        $blog_slider_day_letterspacing = new QodeField("textsimple", "blog_slider_day_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("blog_slider_day_letterspacing", $blog_slider_day_letterspacing);

        $group3 = new QodeGroup("Blog Slider Spacing", "Define spacing for blog slider content");
        $panel4->addChild("group3", $group3);

        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);

        $blog_slider_title_bottom_margin = new QodeField("textsimple", "blog_slider_title_bottom_margin", "", "Title Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_slider_title_bottom_margin", $blog_slider_title_bottom_margin);

        $blog_slider_date_bottom_margin = new QodeField("textsimple", "blog_slider_date_bottom_margin", "", "Date Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_slider_date_bottom_margin", $blog_slider_date_bottom_margin);

        $blog_slider_day_margin = new QodeField("textsimple", "blog_slider_day_margin", "", "Day Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_slider_day_margin", $blog_slider_day_margin);

        $blog_slider_simple_subtitle = new QodeTitle("blog_slider_simple_subtitle", "Blog Simple Slider Style");
        $panel4->addChild("blog_slider_simple_subtitle", $blog_slider_simple_subtitle);

        $group4 = new QodeGroup("Title Style", "Define styles for title");
        $panel4->addChild("group4", $group4);

        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);

        $blog_slsimple_title_color = new QodeField("colorsimple", "blog_slsimple_title_color", "", "Title Color", "This is some description");
        $row1->addChild("blog_slsimple_title_color", $blog_slsimple_title_color);
        $blog_slsimple_title_hover_color = new QodeField("colorsimple", "blog_slsimple_title_hover_color", "", "Title Hover Color", "This is some description");
        $row1->addChild("blog_slsimple_title_hover_color", $blog_slsimple_title_hover_color);
        $blog_slsimple_title_fontsize = new QodeField("textsimple", "blog_slsimple_title_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_slsimple_title_fontsize", $blog_slsimple_title_fontsize);
        $blog_slsimple_title_lineheight = new QodeField("textsimple", "blog_slsimple_title_lineheight", "", "Line Height (px)", "This is some description");
        $row1->addChild("blog_slsimple_title_lineheight", $blog_slsimple_title_lineheight);

        $row2 = new QodeRow();
        $group4->addChild("row2", $row2);

        $blog_slsimple_title_texttransform = new QodeField("selectblanksimple", "blog_slsimple_title_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_slsimple_title_texttransform", $blog_slsimple_title_texttransform);
        $blog_slsimple_title_google_fonts = new QodeField("fontsimple", "blog_slsimple_title_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_slsimple_title_google_fonts", $blog_slsimple_title_google_fonts);
        $blog_slsimple_title_fontstyle = new QodeField("selectblanksimple", "blog_slsimple_title_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_slsimple_title_fontstyle", $blog_slsimple_title_fontstyle);
        $blog_slsimple_title_fontweight = new QodeField("selectblanksimple", "blog_slsimple_title_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("blog_slsimple_title_fontweight", $blog_slsimple_title_fontweight);

        $row3 = new QodeRow();
        $group4->addChild("row3", $row3);

        $blog_slsimple_title_letterspacing = new QodeField("textsimple", "blog_slsimple_title_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_slsimple_title_letterspacing", $blog_slsimple_title_letterspacing);

        $group5 = new QodeGroup("Post Info Style", "Define styles for post info");
        $panel4->addChild("group5", $group5);

        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);

        $blog_slsimple_post_info_color = new QodeField("colorsimple", "blog_slsimple_post_info_color", "", "Color", "This is some description");
        $row1->addChild("blog_slsimple_post_info_color", $blog_slsimple_post_info_color);

        $blog_slsimple_post_info_link_color = new QodeField("colorsimple", "blog_slsimple_post_info_link_color", "", "Link Color", "This is some description");
        $row1->addChild("blog_slsimple_post_info_link_color", $blog_slsimple_post_info_link_color);

        $blog_slsimple_post_info_link_hover_color = new QodeField("colorsimple", "blog_slsimple_post_info_link_hover_color", "", "Link Hover Color", "This is some description");
        $row1->addChild("blog_slsimple_post_info_link_hover_color", $blog_slsimple_post_info_link_hover_color);

        $blog_slsimple_post_info_fontsize = new QodeField("textsimple", "blog_slsimple_post_info_fontsize", "", "Font Size (px)", "This is some description");
        $row1->addChild("blog_slsimple_post_info_fontsize", $blog_slsimple_post_info_fontsize);

        $row2 = new QodeRow();
        $group5->addChild("row2", $row2);

        $blog_slsimple_post_info_lineheight = new QodeField("textsimple", "blog_slsimple_post_info_lineheight", "", "Line Height (px)", "This is some description");
        $row2->addChild("blog_slsimple_post_info_lineheight", $blog_slsimple_post_info_lineheight);

        $blog_slsimple_post_info_texttransform = new QodeField("selectblanksimple", "blog_slsimple_post_info_texttransform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("blog_slsimple_post_info_texttransform", $blog_slsimple_post_info_texttransform);

        $blog_slsimple_post_info_google_fonts = new QodeField("fontsimple", "blog_slsimple_post_info_google_fonts", "-1", "Font Family", "This is some description");
        $row2->addChild("blog_slsimple_post_info_google_fonts", $blog_slsimple_post_info_google_fonts);

        $blog_slsimple_post_info_fontstyle = new QodeField("selectblanksimple", "blog_slsimple_post_info_fontstyle", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("blog_slsimple_post_info_fontstyle", $blog_slsimple_post_info_fontstyle);

        $row3 = new QodeRow();
        $group5->addChild("row3", $row3);

        $blog_slsimple_post_info_fontweight = new QodeField("selectblanksimple", "blog_slsimple_post_info_fontweight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row3->addChild("blog_slsimple_post_info_fontweight", $blog_slsimple_post_info_fontweight);

        $blog_slsimple_post_info_letterspacing = new QodeField("textsimple", "blog_slsimple_post_info_letterspacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("blog_slsimple_post_info_letterspacing", $blog_slsimple_post_info_letterspacing);

        $group6 = new QodeGroup("Blog Slider Spacing", "Define spacing for blog slider content");
        $panel4->addChild("group6", $group6);

        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);

        $blog_slsimple_title_bottom_margin = new QodeField("textsimple", "blog_slsimple_title_bottom_margin", "", "Title Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_slsimple_title_bottom_margin", $blog_slsimple_title_bottom_margin);

        $blog_slsimple_post_info_bottom_margin = new QodeField("textsimple", "blog_slsimple_post_info_bottom_margin", "", "Post Info Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_slsimple_post_info_bottom_margin", $blog_slsimple_post_info_bottom_margin);

        $blog_slsimple_excerpt_bottom_margin = new QodeField("textsimple", "blog_slsimple_excerpt_bottom_margin", "", "Excerpt Margin Bottom (px)", "This is some description");
        $row1->addChild("blog_slsimple_excerpt_bottom_margin", $blog_slsimple_excerpt_bottom_margin);

        $group7 = new QodeGroup("Box style", "Define style for box");
        $panel4->addChild("group7", $group7);

        $row1 = new QodeRow();
        $group7->addChild("row1", $row1);

        $blog_slider_box_background_color = new QodeField("colorsimple", "blog_slider_box_background_color", "", "Background Color", "This is some description");
        $row1->addChild("blog_slider_box_background_color", $blog_slider_box_background_color);

        $blog_slider_box_background_opacity = new QodeField("textsimple", "blog_slider_box_background_opacity", "", "Background Opacity (0-1)", "This is some description");
        $row1->addChild("blog_slider_box_background_opacity", $blog_slider_box_background_opacity);

        $blog_slider_box_border_color = new QodeField("colorsimple", "blog_slider_box_border_color", "", "Border Color", "This is some description");
        $row1->addChild("blog_slider_box_border_color", $blog_slider_box_border_color);

        $blog_slider_box_border_opacity = new QodeField("textsimple", "blog_slider_box_border_opacity", "", "Border Opacity (0-1)", "This is some description");
        $row1->addChild("blog_slider_box_border_opacity", $blog_slider_box_border_opacity);

        $row2 = new QodeRow();
        $group7->addChild("row2", $row2);

        $blog_slider_box_padding_top = new QodeField("textsimple", "blog_slider_box_padding_top", "", "Padding Top (px)", "This is some description");
        $row2->addChild("blog_slider_box_padding_top", $blog_slider_box_padding_top);

        $blog_slider_box_padding_right = new QodeField("textsimple", "blog_slider_box_padding_right", "", "Padding Right (px)", "This is some description");
        $row2->addChild("blog_slider_box_padding_right", $blog_slider_box_padding_right);

        $blog_slider_box_padding_bottom = new QodeField("textsimple", "blog_slider_box_padding_bottom", "", "Padding Bottom (px)", "This is some description");
        $row2->addChild("blog_slider_box_padding_bottom", $blog_slider_box_padding_bottom);

        $blog_slider_box_padding_left = new QodeField("textsimple", "blog_slider_box_padding_left", "", "Padding Left (px)", "This is some description");
        $row2->addChild("blog_slider_box_padding_left", $blog_slider_box_padding_left);

        $row3 = new QodeRow();
        $group7->addChild("row3", $row3);

        $blog_slider_box_width = new QodeField("textsimple", "blog_slider_box_width", "", "Width (%)", "This is some description");
        $row2->addChild("blog_slider_box_width", $blog_slider_box_width);

        $panel5 = new QodePanel("Pagination Style", "panel_pagination");
        $blogPage->addChild("panel5", $panel5);

        $group_pagination_styles = qode_add_admin_group(array(
            'name'          => 'group_pagination_styles',
            'title'         => 'Pagination Style',
            'description'   => 'Define styles for pagination',
            'parent'        => $panel5
        ));

        $row_pagination_colors = qode_add_admin_row(array(
            'name'      => 'row_pagination_colors',
            'parent'    => $group_pagination_styles
        ));

            qode_add_admin_field(
                array(
                    'name'          => 'pagination_border_color',
                    'type'          => 'colorsimple',
                    'label'         => 'Pagination Border Color',
                    'description'   => '',
                    'parent'        => $row_pagination_colors
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_number_color',
                    'type'          => 'colorsimple',
                    'label'         => 'Pagination Number Color',
                    'description'   => '',
                    'parent'        => $row_pagination_colors
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_hover_background_color',
                    'type'          => 'colorsimple',
                    'label'         => 'Pagination Hover/Active Background Color',
                    'description'   => '',
                    'parent'        => $row_pagination_colors
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_hover_number_color',
                    'type'          => 'colorsimple',
                    'label'         => 'Pagination Hover/Active Number Color',
                    'description'   => '',
                    'parent'        => $row_pagination_colors
                )
            );


        $row_pagination_measures = qode_add_admin_row(array(
            'name'      => 'row_pagination_measures',
            'parent'    => $group_pagination_styles
        ));

            qode_add_admin_field(
                array(
                    'name'          => 'pagination_width',
                    'type'          => 'textsimple',
                    'label'         => 'Pagination Width (px)',
                    'description'   => '',
                    'parent'        => $row_pagination_measures
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_height',
                    'type'          => 'textsimple',
                    'label'         => 'Pagination Height (px)',
                    'description'   => '',
                    'parent'        => $row_pagination_measures
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_border_radius',
                    'type'          => 'textsimple',
                    'label'         => 'Pagination Border Radius (px)',
                    'description'   => '',
                    'parent'        => $row_pagination_measures
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_border_width',
                    'type'          => 'textsimple',
                    'label'         => 'Pagination Border Width (px)',
                    'description'   => '',
                    'parent'        => $row_pagination_measures
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_font_size',
                    'type'          => 'textsimple',
                    'label'         => 'Pagination Font Size (px)',
                    'description'   => '',
                    'parent'        => $row_pagination_measures
                )
            );
            qode_add_admin_field(
                array(
                    'name'          => 'pagination_space',
                    'type'          => 'textsimple',
                    'label'         => 'Pagination Space Between Items (px)',
                    'description'   => '',
                    'parent'        => $row_pagination_measures
                )
            );

    }
    add_action('qode_options_map','qode_blog_options_map',100);
}