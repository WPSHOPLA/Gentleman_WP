<?php
if (!function_exists('product_list_elegant') && function_exists("is_woocommerce")) {
    function product_list_elegant($atts, $content = null) {
        $args = array(
            "per_page"          => "",
            "columns"           => "",
            "category"          => "",
            "order_by"          => "",
            "order"             => "",
            "title_tag"         => "h4",
            "holder_padding"    => "",
            "separator_color"   => "",
            "price_color"       => "",
            "price_font_size"   => "",
            "button_size"       => "",
            "button_hover_type"       => "",
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];


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
        $html .= "<div class='qode_product_list_holder $columns'><ul>";

        while ($q->have_posts()) : $q->the_post();

            global $product;

            $holder_style = '';
            if($holder_padding !== '') {
                $holder_style .= ' style="padding: '.$holder_padding.';"';
            }

            $image = '';
            if ( has_post_thumbnail() ) {
                $image = get_the_post_thumbnail();
            }

            $cat = $product->get_categories(' ');

            $title = get_the_title();

            $separator_style = '';
            if($separator_color !== '') {
                $separator_style .= ' style="background-color: '.$separator_color.';"';
            }

            $price = $product->get_price_html();

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

            $button_size_class = '';
            if($button_size !== '') {
                $button_size_class = $button_size;
            }

            $button_hover_type_class = ''; 
            if ($button_hover_type !== '') {
                $button_hover_type_class = $button_hover_type;
            }

            $button = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                esc_attr( $product->id ),
                esc_attr( $product->get_sku() ),
                esc_attr( 'qbutton '.$button_size_class .' '.$button_hover_type_class ),
                esc_html( $product->add_to_cart_text() )
            );

            $html .= '<li>';
            $html .= '<div class="product_list_inner" '.$holder_style.'>';

            $html .= '<div class="product_category">'.$cat.'</div>';

            $html .= '<'.$title_tag.' itemprop="name" class="product_title entry-title">'. $title .'</'.$title_tag.'>';

            $html .= '<div class="product_separator separator small center" '.$separator_style.'></div>';

            if($image !== '') {
                $html .= '<div class="product_image">'.$image.'</div>';
            }

            $html .= '<div class="product_price" '.$price_style.'>'.$price.'</div>';

            $html .= '<div class="product_button">'.$button.'</div>';

            $html .= '</div>';
            $html .= '<a itemprop="url" class="product_list_link" href="'.get_the_permalink().'" target="_self"></a>';
            $html .= '</li>';

        endwhile;
        wp_reset_postdata();

        $html .= "</ul></div>";

        return $html;
    }
    add_shortcode('product_list_elegant', 'product_list_elegant');
}