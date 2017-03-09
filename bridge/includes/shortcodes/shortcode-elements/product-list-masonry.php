<?php
if (!function_exists('product_list_masonry') && function_exists("is_woocommerce")) {
    function product_list_masonry($atts, $content = null) {
        $args = array(
            "per_page"                  => "",
            "columns"                   => "",
            "category"                  => "",
            "order_by"                  => "",
            "order"                     => "",
            "title_tag"                 => "h5",
            "hover_background_color"    => "",
            "category_color"            => "",
            "show_separator"			=> "yes",
            "separator_color"           => "",
            "price_color"               => "",
            "price_font_size"           => "",
            "image_size"                => ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $category_style = '';
        if($category_color !== '') {
            $category_style .= ' style="color: '.$category_color.';"';
        }

        $separator_style = '';
        if($separator_color !== '') {
            $separator_style .= ' style="background-color: '.$separator_color.';"';
        }

        $price_style = '';
        if($price_color !== '' || $price_font_size !== '') {
            $price_style .= ' style="';

            if($price_color !== '') {
                $price_style .= 'color:'.$price_color.';';
            }
            if($price_font_size !== '') {
                $price_style .= 'font-size:'.$price_font_size.'px;';
            }

            $price_style .= '"';
        }

        $product_item_style = '';
        if($hover_background_color !== ''){
            $product_item_style .= 'style="background-color:'.$hover_background_color.';"';
        }

		$product_list_args =  array(
			'post_type' => 'product',
			'posts_per_page' => $per_page,
			'orderby' => $order_by,
			'order' => $order
		);

		if(!empty($category)){
			$product_list_args['product_cat'] = $category;
		}

        $q = new WP_Query($product_list_args);

        $html = "";
        $html .= "<div class='qode_product_list_masonry_holder $columns'><div class='qode_product_list_masonry_holder_inner'>";
        $html .= '<div class="qode_product_list_sizer"></div>';
        $html .= '<div class="qode_product_list_gutter"></div>';
        while ($q->have_posts()) : $q->the_post();

            global $product;

            $price = $product->get_price_html();

            $image = '';
            $product_image_size = 'shop_single';
            if($image_size === 'original') {
                $product_image_size = 'full';
            }else if ($image_size === 'square') {
                $product_image_size = 'portfolio_masonry_regular';
            }
            if ( has_post_thumbnail() ) {
                $image = get_the_post_thumbnail( get_the_ID(), $product_image_size);
            }

            $cat = $product->get_categories(', ');

            $title = get_the_title();

            $masonry_size_class = '';
            if(get_post_meta(get_the_ID(), 'qode_product_list_masonry_layout', true) !== ''){
                $masonry_size_class = get_post_meta(get_the_ID(), 'qode_product_list_masonry_layout', true);
            }

            $html .= '<div class="qode_product_list_item '.$masonry_size_class.'">';
            if($image !== '') {
                $html .= '<div class="qode_product_image">'.$image.'</div>';
            }
            $html .= '<div class="qode_product_list_item_inner" '.$product_item_style.'><div class="qode_product_list_item_table"><div class="qode_product_list_item_table_cell">';
            $html .= '<div class="qode_product_category" '.$category_style.'>'.$cat.'</div>';
            $html .= '<'.$title_tag.' itemprop="name" class="qode_product_title entry-title">'. $title .'</'.$title_tag.'>';
			if ($show_separator == 'yes') {
				$html .= '<div class="qode_product_separator separator center" '.$separator_style.'></div>';
			}
            $html .= '<div class="qode_product_price" '.$price_style.'>'.$price.'</div>';
            $html .= '</div>';

            $html .= '<a itemprop="url" class="product_list_link" href="'.get_the_permalink().'" target="_self"></a>';
            $html .= '</div></div></div>';

        endwhile;
        wp_reset_postdata();

        $html .= "</div></div>";

        return $html;
    }
    add_shortcode('product_list_masonry', 'product_list_masonry');
}