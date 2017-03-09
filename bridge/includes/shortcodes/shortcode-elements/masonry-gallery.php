<?php
/* Masonry Gallery shortcode*/
if (!function_exists('qode_masonry_gallery')) {

    function qode_masonry_gallery($atts, $content = null){
        global $wp_query, $qodeIconCollections;
        $default_args = array(
            'category' => '',
            'number' => -1,
            'order' => 'DESC',
            'parallax_item_speed' => '0.3',
            'parallax_item_offset' => '0',
        );

        extract(shortcode_atts($default_args, $atts));

        $parallax_item_speed = esc_attr($parallax_item_speed);
        $parallax_item_offset = esc_attr($parallax_item_offset);

        $html = '';

        /* Query for items */
        $query_args = array(
            'post_type' => 'masonry_gallery',
            'orderby' => 'date',
            'order' => $order,
            'posts_per_page' => $number
        );

        if ($category != "") {
            $query_args['masonry_gallery_category'] = $category;
        }
        $query = new $wp_query( $query_args );

        switch ($number) {
            case 1:
                $item_number_class = 'one_column';
                break;
            case 2:
                $item_number_class = 'two_columns';
                break;
            case 3:
                $item_number_class = 'three_columns';
                break;
            default:
                $item_number_class = '';
                break;
        }

        $html .= '<div class="masonry_gallery_holder ' . $item_number_class . ' " data-parallax_item_speed="'.$parallax_item_speed.'" data-parallax_item_offset="'.$parallax_item_offset.'"><div class="grid-sizer"></div>';

        if ($query->have_posts()) :
            while ( $query->have_posts() ) : $query->the_post();

                $item_type = '';
                $item_class = '';
                $item_text = '';
                $item_link = '';
                $item_button_label = '';
                $item_icon = '';
                $item_link_target = '_self';
                $item_parallax_class = "";

                if (get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_type', true) !== '') {
                    $item_type = get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_type', true);
                }
                if (get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_size', true) !== '') {
                    $item_class = get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_size', true);
                }
                if (get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_text', true) !== '') {
                    $item_text = get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_text', true);
                }
                if (get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_link', true) !== '') {
                    $item_link = get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_link', true);
                }
                if (get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_link_target', true) !== '') {
                    $item_link_target = get_post_meta(get_the_ID(), 'qode_masonry_gallery_item_link_target', true);
                }
                $masonry_parallax = get_post_meta(get_the_ID(), "qode_masonry_item_parallax", true);

                if($masonry_parallax == "yes"){
                    $item_parallax_class = " parallax_item";
                }

                switch ($item_class) {
                    case 'square_big':
                        $gallery_thumb_size = 'portfolio_masonry_large';
                        break;
                    case 'square_small':
                        $gallery_thumb_size = 'portfolio-square';
                        break;
                    case 'rectangle_portrait':
                        $gallery_thumb_size = 'portfolio_masonry_tall';
                        break;
                    case 'rectangle_landscape':
                        $gallery_thumb_size = 'portfolio_masonry_wide';
                        break;
                    default:
                        $gallery_thumb_size = 'portfolio-square';
                        break;
                }

                $html .= '<article class="masonry_gallery_item ' . esc_attr($item_class) . ' ' .esc_attr($item_type). ' '. esc_attr($item_parallax_class) .'">';

                switch($item_type) {
                    case 'with_button':

                        //With Button Type
                        if (get_post_meta(get_the_ID(), 'qode_masonry_gallery_button_label', true) !== '') {
                            $item_button_label = get_post_meta(get_the_ID(), 'qode_masonry_gallery_button_label', true);
                        }

                        if (has_post_thumbnail()) {
                            $html .= '<div class = "masonry_gallery_image_holder">';
                            $html .= get_the_post_thumbnail(get_the_ID(),$gallery_thumb_size);
                            $html .= '</div>';
                        }

                        $html .= '<div class="masonry_gallery_item_outer"><div class="masonry_gallery_item_inner"><div class="masonry_gallery_item_content">';

                        $html .= '<h3 itemprop="name">' . get_the_title() . '</h3>';
                        $html .= '<p class="masonry_gallery_item_text">' . esc_html($item_text) . '</p>';

                        if ($item_link !== '' && $item_button_label !== '') {
                            $html .= '<a itemprop="url" href="'.esc_url($item_link).'" class="qbutton masonry_gallery_item_button" target="'.esc_attr($item_link_target).'">'.$item_button_label.'</a>';
                        }

                        $html .= '</div></div></div>';

                        break;

                    case 'with_icon':

                        //With Icon Type
                        if ($item_link !== '') {
                            $html .= '<a itemprop="url" href="'.esc_url($item_link).'" target="'.esc_attr($item_link_target).'">';
                        }

                        if (has_post_thumbnail()) {
                            $html .= '<div class = "masonry_gallery_image_holder">';
                            $html .= get_the_post_thumbnail(get_the_ID(),$gallery_thumb_size);
                            $html .= '</div>';
                        }

                        $html .= '<div class="masonry_gallery_item_outer"><div class="masonry_gallery_item_inner"><div class="masonry_gallery_item_content">';

                        $item_icon_pack = get_post_meta(get_the_ID(), "qode_masonry_gallery_item_with_icon_icon_pack", true) != '' ? get_post_meta(get_the_ID(), "qode_masonry_gallery_item_with_icon_icon_pack", true) : 'font_awesome';

                        //Get icon pack
                        if ($item_icon_pack != ''){
                            $icon_collection_obj = $qodeIconCollections->getIconCollection($item_icon_pack);

                            //Get icon pack param
                            $item_icon_param = $icon_collection_obj->param;

                            //Get icon
                            if (get_post_meta(get_the_ID(), "qode_masonry_gallery_item_with_icon_".$item_icon_param, true) !== '') {
                                $item_icon = get_post_meta(get_the_ID(), "qode_masonry_gallery_item_with_icon_".$item_icon_param, true);
                            }

                            //Render icon
                            if (method_exists($icon_collection_obj, 'render') && $item_icon !== '') {
                                $html .= '<div class="masonry_gallery_item_icon">'.$icon_collection_obj->render($item_icon).'</div>';
                            }

                        }

                        $html .= '<h3 itemprop="name">' . get_the_title() . '</h3>';
                        $html .= '<p class="masonry_gallery_item_text">' . esc_html($item_text) . '</p>';


                        $html .= '</div></div></div>';

                        if ($item_link !== '') {
                            $html .= '</a>';
                        }
                        break;

                    case 'standard':

                        //Only image
                        if ($item_link !== '') {
                            $html .= '<a itemprop="url" href="'.esc_url($item_link).'" target="'.esc_attr($item_link_target).'">';
                        }

                        if (has_post_thumbnail()) {
                            $html .= '<div class = "masonry_gallery_image_holder">';
                            $html .= get_the_post_thumbnail(get_the_ID(),$gallery_thumb_size);
                            $html .= '</div>';
                        }


                        $html .= '<div class="masonry_gallery_item_outer">';

                        $html .= '<div class="masonry_gallery_item_inner">';

                        $html .= '<div class="masonry_gallery_item_content">';

                        $html .= '<h3 itemprop="name">' . get_the_title() . '</h3>';


                        $html .= '</div></div></div>';

                        if ($item_link !== '') {
                            $html .= '</a>';
                        }
                        break;
                }

                $html .= '</article>';

            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        $html .= '</div>';

        return $html;
    }
    add_shortcode('qode_masonry_gallery', 'qode_masonry_gallery');
}