<?php

if(!function_exists('qode_woocommerce_options_map')) {
    /**
     * WooCommerce options page
     */
    function qode_woocommerce_options_map()
    {

        $woocommerce_page = new QodeAdminPage("_woocommerce", "WooCommerce", "fa fa-shopping-cart");

        qode_framework()->qodeOptions->addAdminPage("woocommerce", $woocommerce_page);

        $product_list_panel = new QodePanel("Product List", "product_list_panel");
        $woocommerce_page->addChild($product_list_panel->name, $product_list_panel);

        $woo_products_list_number = new QodeField("select", "woo_products_list_number", "columns-3", "Product List and Related Products Columns Number", "Choose number of columns for product listing and related products on single product", array(
            "columns-3" => "3 Columns (2 with sidebar)",
            "columns-4" => "4 Columns (3 with sidebar)"
        ));

        $product_list_panel->addChild("woo_products_list_number", $woo_products_list_number);

        $product_info_box_color = new QodeField('color', 'woo_product_info_box_color', '', 'Product Info Box Background Color', 'Set background color of the box that holds product information');
        $product_list_panel->addChild('woo_product_info_box_color', $product_info_box_color);

        $product_show_categories = new QodeField('yesno','woo_products_show_categories','no','Show Categories Above Title ','Enabling this option will display categories above title');
        $product_list_panel->addChild('woo_products_show_categories', $product_show_categories);

        //Title Separator
        $product_title_show_sep = new QodeField(
            'yesno',
            'woo_products_show_title_sep',
            'no',
            'Show Separator After Product Title ',
            'Enabling this option will display small separator after product title',
            array(),
            array(
                "dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#qodef_woo_products_title_sep_container"
            )
        );

        $product_list_panel->addChild('woo_products_show_title_sep', $product_title_show_sep);

        $product_title_sep_container = new QodeContainer('woo_products_title_sep_container', 'woo_products_show_title_sep', 'no');
        $product_list_panel->addChild('woo_products_title_sep_container', $product_title_sep_container);

            $group10 = new QodeGroup("Separator Styles", "Define style for product title separator ");
            $product_title_sep_container->addChild("group10", $group10);

            $row1 = new QodeRow();
            $group10->addChild("row1", $row1);

                $woo_products_title_separator_color = new QodeField("colorsimple", "woo_products_title_separator_color", "", "Color", "This is some description");
                $row1->addChild("woo_products_title_separator_color", $woo_products_title_separator_color);

                $woo_products_title_separator_thickness = new QodeField("textsimple", "woo_products_title_separator_thickness", "", "Thickness (px)");
                $row1->addChild("woo_products_title_separator_thickness", $woo_products_title_separator_thickness);

                $woo_products_title_separator_margin_top = new QodeField("textsimple", "woo_products_title_separator_margin_top", "", "Margin Top (px)", "This is some description");
                $row1->addChild("woo_products_title_separator_margin_top", $woo_products_title_separator_margin_top);

                $woo_products_title_separator_margin_bottom = new QodeField("textsimple", "woo_products_title_separator_margin_bottom", "", "Margin Bottom (px)", "This is some description");
                $row1->addChild("woo_products_title_separator_margin_bottom", $woo_products_title_separator_margin_bottom);

        $woo_products_show_order_by = new QodeField('yesno','woo_products_show_order_by','yes','Show Orderby Dropdown','');
        $product_list_panel->addChild('woo_products_show_order_by', $woo_products_show_order_by);

        //Product Title
        $group3 = new QodeGroup("Product Title", "Define product title text style");
        $product_list_panel->addChild("group3", $group3);

        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);

        $woo_products_title_color = new QodeField("colorsimple", "woo_products_title_color", "", "Text Color");
        $row1->addChild("woo_products_title_color", $woo_products_title_color);

        $woo_products_title_font_size = new QodeField("textsimple", "woo_products_title_font_size", "", "Font Size (px)");
        $row1->addChild("woo_products_title_font_size", $woo_products_title_font_size);

        $woo_products_title_line_height = new QodeField("textsimple", "woo_products_title_line_height", "", "Line Height (px)");
        $row1->addChild("woo_products_title_line_height", $woo_products_title_line_height);

        $woo_products_title_text_transform = new QodeField("selectblanksimple", "woo_products_title_text_transform", "", "Text Transform", "", qode_get_text_transform_array());
        $row1->addChild("woo_products_title_text_transform", $woo_products_title_text_transform);

        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);

        $woo_products_title_font_family = new QodeField("fontsimple", "woo_products_title_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_products_title_font_family", $woo_products_title_font_family);

        $woo_products_title_font_style = new QodeField("selectblanksimple", "woo_products_title_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_products_title_font_style", $woo_products_title_font_style);

        $woo_products_title_font_weight = new QodeField("selectblanksimple", "woo_products_title_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_products_title_font_weight", $woo_products_title_font_weight);

        $woo_products_title_letter_spacing = new QodeField("textsimple", "woo_products_title_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("woo_products_title_letter_spacing", $woo_products_title_letter_spacing);

        $row3 = new QodeRow(true);
        $group3->addChild("row3", $row3);

        $woo_products_title_hover_color = new QodeField("colorsimple", "woo_products_title_hover_color", "", "Hover Text Color", "This is some description");
        $row3->addChild("woo_products_title_hover_color", $woo_products_title_hover_color);

        $woo_products_title_line_margin_bottom = new QodeField("textsimple", "woo_products_title_line_margin_bottom", "", "Margin Bottom (px)", "This is some description");
        $row3->addChild("woo_products_title_line_margin_bottom", $woo_products_title_line_margin_bottom);

        $woo_products_title_text_align = new QodeField("selectblanksimple", "woo_products_title_text_align", "", "Text align", "This is some description", array(
            "center" => "Center",
            "left" => "Left",
            "right" => "Right"
        ));
        $row3->addChild("woo_products_title_text_align", $woo_products_title_text_align);


        //Product price
        $group4 = new QodeGroup("Product Price", "Define product price text style");
        $product_list_panel->addChild("group4", $group4);

        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);

        $woo_products_price_color = new QodeField("colorsimple", "woo_products_price_color", "", "Text Color", "This is some description");
        $row1->addChild("woo_products_price_color", $woo_products_price_color);

        $woo_products_price_font_size = new QodeField("textsimple", "woo_products_price_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("woo_products_price_font_size", $woo_products_price_font_size);

        $woo_products_price_line_height = new QodeField("textsimple", "woo_products_price_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("woo_products_price_line_height", $woo_products_price_line_height);

        $woo_products_price_text_transform = new QodeField("selectblanksimple", "woo_products_price_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("woo_products_price_text_transform", $woo_products_price_text_transform);

        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);

        $woo_products_price_font_family = new QodeField("fontsimple", "woo_products_price_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_products_price_font_family", $woo_products_price_font_family);

        $woo_products_price_font_style = new QodeField("selectblanksimple", "woo_products_price_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_products_price_font_style", $woo_products_price_font_style);

        $woo_products_price_font_weight = new QodeField("selectblanksimple", "woo_products_price_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_products_price_font_weight", $woo_products_price_font_weight);

        $woo_products_price_letter_spacing = new QodeField("textsimple", "woo_products_price_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("woo_products_price_letter_spacing", $woo_products_price_letter_spacing);

        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);

        $woo_products_price_old_font_size = new QodeField("textsimple", "woo_products_price_old_font_size", "", "Old Price Font Size (px)", "This is some description");
        $row3->addChild("woo_products_price_old_font_size", $woo_products_price_old_font_size);

        $woo_products_price_old_color = new QodeField("colorsimple", "woo_products_price_old_color", "", "Old Price Color", "This is some description");
        $row3->addChild("woo_products_price_old_color", $woo_products_price_old_color);

        $woo_products_price_text_align = new QodeField("selectblanksimple", "woo_products_price_text_align", "", "Text align", "This is some description", array(
            "center" => "Center",
            "left" => "Left",
            "right" => "Right"
        ));
        $row3->addChild("woo_products_price_text_align", $woo_products_price_text_align);

        //Product sale
        $group5 = new QodeGroup("Product Sale", "Define product sale text style");
        $product_list_panel->addChild("group5", $group5);

        $row1 = new QodeRow();
        $group5->addChild("row1", $row1);

        $woo_products_sale_color = new QodeField("colorsimple", "woo_products_sale_color", "", "Text Color", "This is some description");
        $row1->addChild("woo_products_sale_color", $woo_products_sale_color);

        $woo_products_sale_font_size = new QodeField("textsimple", "woo_products_sale_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("woo_products_sale_font_size", $woo_products_sale_font_size);

        $woo_products_sale_text_transform = new QodeField("selectblanksimple", "woo_products_sale_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("woo_products_sale_text_transform", $woo_products_sale_text_transform);

        $woo_products_sale_letter_spacing = new QodeField("textsimple", "woo_products_sale_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("woo_products_sale_letter_spacing", $woo_products_sale_letter_spacing);

        $row2 = new QodeRow(true);
        $group5->addChild("row2", $row2);

        $woo_products_sale_font_family = new QodeField("fontsimple", "woo_products_sale_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_products_sale_font_family", $woo_products_sale_font_family);

        $woo_products_sale_font_style = new QodeField("selectblanksimple", "woo_products_sale_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_products_sale_font_style", $woo_products_sale_font_style);

        $woo_products_sale_font_weight = new QodeField("selectblanksimple", "woo_products_sale_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_products_sale_font_weight", $woo_products_sale_font_weight);

        $woo_products_sale_border_radius = new QodeField("textsimple", "woo_products_sale_border_radius", "", "Border Radius (px)", "This is some description");
        $row2->addChild("woo_products_sale_border_radius", $woo_products_sale_border_radius);

        $row3 = new QodeRow(true);
        $group5->addChild("row3", $row3);

        $woo_products_sale_background_color = new QodeField("colorsimple", "woo_products_sale_background_color", "", "Background Color", "This is some description");
        $row3->addChild("woo_products_sale_background_color", $woo_products_sale_background_color);


        $woo_products_sale_width = new QodeField("textsimple", "woo_products_sale_width", "", "Width (px)", "This is some description");
        $row3->addChild("woo_products_sale_width", $woo_products_sale_width);

        $woo_products_sale_height = new QodeField("textsimple", "woo_products_sale_height", "", "Height (px)", "This is some description");
        $row3->addChild("woo_products_sale_height", $woo_products_sale_height);

        $woo_products_sale_show_sep = new QodeField("yesnosimple", "woo_products_sale_show_sep", "yes", "Show Separator");
        $row3->addChild("woo_products_sale_show_sep", $woo_products_sale_show_sep);

        //Product out of stock

        $group6 = new QodeGroup('Product "Out Of Stock"', "Define 'Out Of Stock' text style");
        $product_list_panel->addChild("group6", $group6);

        $row1 = new QodeRow();
        $group6->addChild("row1", $row1);

        $woo_products_out_of_stock_color = new QodeField("colorsimple", "woo_products_out_of_stock_color", "", "Text Color", "This is some description");
        $row1->addChild("woo_products_out_of_stock_color", $woo_products_out_of_stock_color);

        $woo_products_out_of_stock_font_size = new QodeField("textsimple", "woo_products_out_of_stock_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("woo_products_out_of_stock_font_size", $woo_products_out_of_stock_font_size);

        $woo_products_out_of_stock_text_transform = new QodeField("selectblanksimple", "woo_products_out_of_stock_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("woo_products_out_of_stock_text_transform", $woo_products_out_of_stock_text_transform);

        $woo_products_out_of_stock_letter_spacing = new QodeField("textsimple", "woo_products_out_of_stock_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row1->addChild("woo_products_out_of_stock_letter_spacing", $woo_products_out_of_stock_letter_spacing);

        $row2 = new QodeRow(true);
        $group6->addChild("row2", $row2);

        $woo_products_out_of_stock_font_family = new QodeField("fontsimple", "woo_products_out_of_stock_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_products_out_of_stock_font_family", $woo_products_out_of_stock_font_family);

        $woo_products_out_of_stock_font_style = new QodeField("selectblanksimple", "woo_products_out_of_stock_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_products_out_of_stock_font_style", $woo_products_out_of_stock_font_style);

        $woo_products_out_of_stock_font_weight = new QodeField("selectblanksimple", "woo_products_out_of_stock_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_products_out_of_stock_font_weight", $woo_products_out_of_stock_font_weight);

        $woo_products_out_of_stock_border_radius = new QodeField("textsimple", "woo_products_out_of_stock_border_radius", "", "Border Radius (px)", "This is some description");
        $row2->addChild("woo_products_out_of_stock_border_radius", $woo_products_out_of_stock_border_radius);

        $row3 = new QodeRow(true);
        $group6->addChild("row3", $row3);

        $woo_products_out_of_stock_background_color = new QodeField("colorsimple", "woo_products_out_of_stock_background_color", "", "Background Color", "This is some description");
        $row3->addChild("woo_products_out_of_stock_background_color", $woo_products_out_of_stock_background_color);

        $woo_products_out_of_stock_width = new QodeField("textsimple", "woo_products_out_of_stock_width", "", "Width (px)", "This is some description");
        $row3->addChild("woo_products_out_of_stock_width", $woo_products_out_of_stock_width);

        $woo_products_out_of_stock_height = new QodeField("textsimple", "woo_products_out_of_stock_height", "", "Height (px)", "This is some description");
        $row3->addChild("woo_products_out_of_stock_height", $woo_products_out_of_stock_height);

        //Product add to cart
        $products_add_to_cart_subtitle = new QodeGroup('"Add to cart" button', 'Define styles for add to cart button');
        $product_list_panel->addChild("products_add_to_cart_subtitle", $products_add_to_cart_subtitle);

        $row1 = new QodeRow();
        $products_add_to_cart_subtitle->addChild("row1", $row1);

        $woo_products_add_to_cart_color = new QodeField("colorsimple", "woo_products_add_to_cart_color", "", "Text Color", "This is some description");
        $row1->addChild("woo_products_add_to_cart_color", $woo_products_add_to_cart_color);

        $woo_products_add_to_cart_hover_color = new QodeField("colorsimple", "woo_products_add_to_cart_hover_color", "", "Hover Text Color", "This is some description");
        $row1->addChild("woo_products_add_to_cart_hover_color", $woo_products_add_to_cart_hover_color);

        $woo_products_add_to_cart_font_size = new QodeField("textsimple", "woo_products_add_to_cart_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("woo_products_add_to_cart_font_size", $woo_products_add_to_cart_font_size);

        $woo_products_add_to_cart_line_height = new QodeField("textsimple", "woo_products_add_to_cart_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("woo_products_add_to_cart_line_height", $woo_products_add_to_cart_line_height);

        $row2 = new QodeRow(true);
        $products_add_to_cart_subtitle->addChild("row2", $row2);

        $woo_products_add_to_cart_text_transform = new QodeField("selectblanksimple", "woo_products_add_to_cart_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row2->addChild("woo_products_add_to_cart_text_transform", $woo_products_add_to_cart_text_transform);

        $woo_products_add_to_cart_font_family = new QodeField("fontsimple", "woo_products_add_to_cart_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_products_add_to_cart_font_family", $woo_products_add_to_cart_font_family);

        $woo_products_add_to_cart_font_style = new QodeField("selectblanksimple", "woo_products_add_to_cart_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_products_add_to_cart_font_style", $woo_products_add_to_cart_font_style);

        $woo_products_add_to_cart_font_weight = new QodeField("selectblanksimple", "woo_products_add_to_cart_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_products_add_to_cart_font_weight", $woo_products_add_to_cart_font_weight);

        $row3 = new QodeRow(true);
        $products_add_to_cart_subtitle->addChild("row3", $row3);

        $woo_products_add_to_cart_letter_spacing = new QodeField("textsimple", "woo_products_add_to_cart_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row3->addChild("woo_products_add_to_cart_letter_spacing", $woo_products_add_to_cart_letter_spacing);

        $woo_products_add_to_cart_background_color = new QodeField("colorsimple", "woo_products_add_to_cart_background_color", "", "Background Color", "This is some description");
        $row3->addChild("woo_products_add_to_cart_background_color", $woo_products_add_to_cart_background_color);

        $woo_products_add_to_cart_background_hover_color = new QodeField("colorsimple", "woo_products_add_to_cart_background_hover_color", "", "Hover Background Color", "This is some description");
        $row3->addChild("woo_products_add_to_cart_background_hover_color", $woo_products_add_to_cart_background_hover_color);

        $woo_products_add_to_cart_border_radius = new QodeField("textsimple", "woo_products_add_to_cart_border_radius", "", "Border radius (px)", "This is some description");
        $row3->addChild("woo_products_add_to_cart_border_radius", $woo_products_add_to_cart_border_radius);

        $row4 = new QodeRow();
        $products_add_to_cart_subtitle->addChild("row4", $row4);

        $woo_products_add_to_cart_border_color = new QodeField("colorsimple", "woo_products_add_to_cart_border_color", "", "Border Color", "This is some description");
        $row4->addChild("woo_products_add_to_cart_border_color", $woo_products_add_to_cart_border_color);

        $woo_products_add_to_cart_border_hover_color = new QodeField("colorsimple", "woo_products_add_to_cart_border_hover_color", "", "Border Hover Color", "This is some description");
        $row4->addChild("woo_products_add_to_cart_border_hover_color", $woo_products_add_to_cart_border_hover_color);

        $woo_products_add_to_cart_border_width = new QodeField("textsimple", "woo_products_add_to_cart_border_width", "", "Border Width (px)", "This is some description");
        $row4->addChild("woo_products_add_to_cart_border_width", $woo_products_add_to_cart_border_width);

		$woo_products_add_to_cart_hover_type = new QodeField("selectsimple","woo_products_add_to_cart_hover_type","","Button Hover Type","This is some description",array(
			"" => "Default",
			"enlarge" => "Enlarge"
		));
		$row4->addChild("woo_products_add_to_cart_hover_type",$woo_products_add_to_cart_hover_type);

        //Product single
        $product_single_panel = new QodePanel('Product Single', 'product_single_panel');

        $woocommerce_page->addChild('product_single_panel', $product_single_panel);

		$woo_product_single_type = new QodeField("select","woo_product_single_type","","Product Type","Choose product type",array(
			"" => "Default",
			"wide-gallery" => "Wide Gallery",
			"tabs-on-bottom" => "Tabs on Bottom"
		));
		$product_single_panel->addChild("woo_product_single_type",$woo_product_single_type);

		$woo_product_single_related_post_tag = new QodeField("select","woo_product_single_related_post_tag","","Related and Upsells Sections H Tag","Choose h tag for related and upsells sections heading. Default is h4",array(
			""	 => "Default",
			"h2" => "h2",
			"h3" => "h3",
			"h4" => "h4",
			"h5" => "h5",
			"h6" => "h6"
		));
		$product_single_panel->addChild("woo_product_single_related_post_tag",$woo_product_single_related_post_tag);

        //Product single title
        $group3 = new QodeGroup("Product Title", "Define product title text style");
        $product_single_panel->addChild("group3", $group3);

        $row1 = new QodeRow();
        $group3->addChild("row1", $row1);

        $woo_product_single_title_color = new QodeField("colorsimple", "woo_product_single_title_color", "", "Text Color");
        $row1->addChild("woo_product_single_title_color", $woo_product_single_title_color);

        $woo_product_single_title_font_size = new QodeField("textsimple", "woo_product_single_title_font_size", "", "Font Size (px)");
        $row1->addChild("woo_product_single_title_font_size", $woo_product_single_title_font_size);

        $woo_product_single_title_line_height = new QodeField("textsimple", "woo_product_single_title_line_height", "", "Line Height (px)");
        $row1->addChild("woo_product_single_title_line_height", $woo_product_single_title_line_height);

        $woo_product_single_title_text_transform = new QodeField("selectblanksimple", "woo_product_single_title_text_transform", "", "Text Transform", "", qode_get_text_transform_array());
        $row1->addChild("woo_product_single_title_text_transform", $woo_product_single_title_text_transform);

        $row2 = new QodeRow(true);
        $group3->addChild("row2", $row2);

        $woo_product_single_title_font_family = new QodeField("fontsimple", "woo_product_single_title_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_product_single_title_font_family", $woo_product_single_title_font_family);

        $woo_product_single_title_font_style = new QodeField("selectblanksimple", "woo_product_single_title_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_product_single_title_font_style", $woo_product_single_title_font_style);

        $woo_product_single_title_font_weight = new QodeField("selectblanksimple", "woo_product_single_title_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_product_single_title_font_weight", $woo_product_single_title_font_weight);

        $woo_product_single_title_letter_spacing = new QodeField("textsimple", "woo_product_single_title_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("woo_product_single_title_letter_spacing", $woo_product_single_title_letter_spacing);

        $row3 = new QodeRow(true);
        $group3->addChild("row3", $row3);

        $woo_product_single_title_line_margin_bottom = new QodeField("textsimple", "woo_product_single_title_line_margin_bottom", "", "Margin Bottom (px)", "This is some description");
        $row3->addChild("woo_product_single_title_line_margin_bottom", $woo_product_single_title_line_margin_bottom);

        //Product single price
        $group4 = new QodeGroup("Product Price", "Define product price text style");
        $product_single_panel->addChild("group4", $group4);

        $row1 = new QodeRow();
        $group4->addChild("row1", $row1);

        $woo_product_single_price_color = new QodeField("colorsimple", "woo_product_single_price_color", "", "Text Color", "This is some description");
        $row1->addChild("woo_product_single_price_color", $woo_product_single_price_color);

        $woo_product_single_price_font_size = new QodeField("textsimple", "woo_product_single_price_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("woo_product_single_price_font_size", $woo_product_single_price_font_size);

        $woo_product_single_price_line_height = new QodeField("textsimple", "woo_product_single_price_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("woo_product_single_price_line_height", $woo_product_single_price_line_height);

        $woo_product_single_price_text_transform = new QodeField("selectblanksimple", "woo_product_single_price_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("woo_product_single_price_text_transform", $woo_product_single_price_text_transform);

        $row2 = new QodeRow(true);
        $group4->addChild("row2", $row2);

        $woo_product_single_price_font_family = new QodeField("fontsimple", "woo_product_single_price_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_product_single_price_font_family", $woo_product_single_price_font_family);

        $woo_product_single_price_font_style = new QodeField("selectblanksimple", "woo_product_single_price_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_product_single_price_font_style", $woo_product_single_price_font_style);

        $woo_product_single_price_font_weight = new QodeField("selectblanksimple", "woo_product_single_price_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_product_single_price_font_weight", $woo_product_single_price_font_weight);

        $woo_product_single_price_letter_spacing = new QodeField("textsimple", "woo_product_single_price_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("woo_product_single_price_letter_spacing", $woo_product_single_price_letter_spacing);

        $row3 = new QodeRow(true);
        $group4->addChild("row3", $row3);

        $woo_product_single_price_old_font_size = new QodeField("textsimple", "woo_product_single_price_old_font_size", "", "Old Price Font Size (px)", "This is some description");
        $row3->addChild("woo_product_single_price_old_font_size", $woo_product_single_price_old_font_size);

        $woo_product_single_price_old_color = new QodeField("colorsimple", "woo_product_single_price_old_color", "", "Old Price Color", "This is some description");
        $row3->addChild("woo_product_single_price_old_color", $woo_product_single_price_old_color);

        //Quantity buttons
        $quantity_buttons_group = new QodeGroup('Quantity Buttons', 'Define styles for quantity buttons');
        $product_single_panel->addChild('quantity_buttons_group', $quantity_buttons_group);

        $quantity_button_background_color = new QodeField('colorsimple', 'quantity_button_background_color', '', 'Background Color');
        $quantity_buttons_group->addChild('quantity_button_background_color', $quantity_button_background_color);

        $quantity_button_hover_background_color = new QodeField('colorsimple', 'quantity_hover_button_background_color', '', 'Hover Background Color');
        $quantity_buttons_group->addChild('quantity_hover_button_background_color', $quantity_button_hover_background_color);

        $quantity_button_icon_color = new QodeField('colorsimple', 'quantity_button_icon_color', '', 'Icon Color');
        $quantity_buttons_group->addChild('quantity_button_icon_color', $quantity_button_icon_color);

        $quantity_button_icon_hover_color = new QodeField('colorsimple', 'quantity_button_icon_hover_color', '', 'Icon Hover Color');
        $quantity_buttons_group->addChild('quantity_button_icon_hover_color', $quantity_button_icon_hover_color);

        //Cart page
        $panel_cart_page = new QodePanel('Cart Page', 'panel_cart_page');
        $woocommerce_page->addChild('panel_cart_page', $panel_cart_page);

        $cart_title_size = new QodeField('text', 'woo_cart_title_size', '', 'Title Size (px)', 'Define size for titles that are displayed on cart page', '', array('col_width' => 3));
        $panel_cart_page->addChild('woo_cart_title_size', $cart_title_size);

        $cart_title_line_height = new QodeField('text', 'woo_cart_title_line_height', '', 'Line Height (px)', 'Define line height for titles that are displayed on cart page', '', array('col_width' => 3));
        $panel_cart_page->addChild('woo_cart_title_line_height', $cart_title_line_height);

        $cart_title_letter_spacing = new QodeField('text', 'woo_cart_title_letter_spacing', '', 'Letter Spacing (px)', 'Define letter spacing for titles that are displayed on cart page', '', array('col_width' => 3));
        $panel_cart_page->addChild('woo_cart_title_letter_spacing', $cart_title_letter_spacing);

        //Product List - Elegant Shortcode
        $panel_product_list_shortcode_page = new QodePanel('Product List - Elegant Shortcode', 'panel_product_list_shortcode_page');
        $woocommerce_page->addChild('panel_product_list_shortcode_page', $panel_product_list_shortcode_page);

        $product_list_first_background_color = new QodeField('color', 'product_list_first_background_color', '', 'First Background Color');
        $panel_product_list_shortcode_page->addChild('product_list_first_background_color', $product_list_first_background_color);

        $product_list_second_background_color = new QodeField('color', 'product_list_second_background_color', '', 'Second Background Color');
        $panel_product_list_shortcode_page->addChild('product_list_second_background_color', $product_list_second_background_color);

        //Product category
        $group_ples = new QodeGroup("Product Category", "Define product category text style");
        $panel_product_list_shortcode_page->addChild("group_ples", $group_ples);

        $row1 = new QodeRow();
        $group_ples->addChild("row1", $row1);

        $woo_product_list_elegant_category_color = new QodeField("colorsimple", "woo_product_list_elegant_category_color", "", "Text Color", "This is some description");
        $row1->addChild("woo_product_list_elegant_category_color", $woo_product_list_elegant_category_color);

        $woo_product_list_elegant_category_font_size = new QodeField("textsimple", "woo_product_list_elegant_category_font_size", "", "Font Size (px)", "This is some description");
        $row1->addChild("woo_product_list_elegant_category_font_size", $woo_product_list_elegant_category_font_size);

        $woo_product_list_elegant_category_line_height = new QodeField("textsimple", "woo_product_list_elegant_category_line_height", "", "Line Height (px)", "This is some description");
        $row1->addChild("woo_product_list_elegant_category_line_height", $woo_product_list_elegant_category_line_height);

        $woo_product_list_elegant_category_text_transform = new QodeField("selectblanksimple", "woo_product_list_elegant_category_text_transform", "", "Text Transform", "This is some description", qode_get_text_transform_array());
        $row1->addChild("woo_product_list_elegant_category_text_transform", $woo_product_list_elegant_category_text_transform);

        $row2 = new QodeRow(true);
        $group_ples->addChild("row2", $row2);

        $woo_product_list_elegant_category_font_family = new QodeField("fontsimple", "woo_product_list_elegant_category_font_family", "-1", "Font Family", "This is some description");
        $row2->addChild("woo_product_list_elegant_category_font_family", $woo_product_list_elegant_category_font_family);

        $woo_product_list_elegant_category_font_style = new QodeField("selectblanksimple", "woo_product_list_elegant_category_font_style", "", "Font Style", "This is some description", qode_get_font_style_array());
        $row2->addChild("woo_product_list_elegant_category_font_style", $woo_product_list_elegant_category_font_style);

        $woo_product_list_elegant_category_font_weight = new QodeField("selectblanksimple", "woo_product_list_elegant_category_font_weight", "", "Font Weight", "This is some description", qode_get_font_weight_array());
        $row2->addChild("woo_product_list_elegant_category_font_weight", $woo_product_list_elegant_category_font_weight);

        $woo_product_list_elegant_category_letter_spacing = new QodeField("textsimple", "woo_product_list_elegant_category_letter_spacing", "", "Letter Spacing (px)", "This is some description");
        $row2->addChild("woo_product_list_elegant_category_letter_spacing", $woo_product_list_elegant_category_letter_spacing);

        $row3 = new QodeRow(true);
        $group_ples->addChild("row3", $row3);

        $woo_product_list_elegant_category_hover_color = new QodeField("colorsimple", "woo_product_list_elegant_category_hover_color", "", "Hover Color", "This is some description");
        $row3->addChild("woo_product_list_elegant_category_hover_color", $woo_product_list_elegant_category_hover_color);

        //Dropdown Cart
        $panel_dropdown_cart = new QodePanel('Dropdown Cart', 'panel_dropdown_cart');
        $woocommerce_page->addChild('panel_dropdown_cart', $panel_dropdown_cart);

        $woo_cart_type = new QodeField('select', 'woo_cart_type', '', 'Cart Icon Type', 'Choose icon type for dropdown cart icon', array(
        	'' => 'Default',
        	'font-elegant' => 'Font Elegant Icon'
    	));
        $panel_dropdown_cart->addChild('woo_cart_type', $woo_cart_type);

    }
    add_action('qode_options_map','qode_woocommerce_options_map',200);
}