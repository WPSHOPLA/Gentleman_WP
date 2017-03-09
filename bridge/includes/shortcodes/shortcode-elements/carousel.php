<?php
/* Qode Carousel shortcode */
if (!function_exists('qode_carousel')) {
    function qode_carousel( $atts, $content = null ) {
        $args = array(
            "carousel" => "",
            "number_of_visible_items" => "",
            "orderby"  => "date",
            "order"    => "ASC",
            "show_in_two_rows" => ""
        );
        extract(shortcode_atts($args, $atts));

        $html = "";
        $carousel_holder_classes = "";
        if ($carousel != "") {

            if($show_in_two_rows == 'yes') {
                $carousel_holder_classes = ' two_rows';
            }

            $visible_items = "";
            switch ($number_of_visible_items) {
                case 'four_items':
                    $visible_items = 4;
                    break;
                case 'five_items':
                    $visible_items = 5;
                    break;
                default:
                    $visible_items = "";
                    break;
            }

            $html .= "<div class='qode_carousels_holder clearfix" . $carousel_holder_classes  ."'><div class='qode_carousels' data-number-of-visible-items='".$visible_items."'><ul class='slides'>";

            $q = array('post_type'=> 'carousels', 'carousels_category' => $carousel, 'orderby' => $orderby, 'order' => $order, 'posts_per_page' => '-1');

            query_posts($q);

            if ( have_posts() ) : $postCount = 1; while ( have_posts() ) : the_post();

                if(get_post_meta(get_the_ID(), "qode_carousel-image", true) != ""){
                    $image = get_post_meta(get_the_ID(), "qode_carousel-image", true);
                } else {
                    $image = "";
                }

                if(get_post_meta(get_the_ID(), "qode_carousel-hover-image", true) != ""){
                    $hover_image = get_post_meta(get_the_ID(), "qode_carousel-hover-image", true);
                    $has_hover_image = "has_hover_image";
                } else {
                    $hover_image = "";
                    $has_hover_image = "";
                }

                if(get_post_meta(get_the_ID(), "qode_carousel-item-link", true) != ""){
                    $link = get_post_meta(get_the_ID(), "qode_carousel-item-link", true);
                } else {
                    $link = "";
                }

                if(get_post_meta(get_the_ID(), "qode_carousel-item-target", true) != ""){
                    $target = get_post_meta(get_the_ID(), "qode_carousel-item-target", true);
                } else {
                    $target = "_self";
                }

                $title = get_the_title();

                //is current item not on even position in array and two rows option is chosen?
                if($postCount % 2 !== 0 && $show_in_two_rows == 'yes') {
                    $html .= "<li class='item'>";
                } elseif($show_in_two_rows == '') {
                    $html .= "<li class='item'>";
                }
                $html .= '<div class="carousel_item_holder">';
                if($link != ""){
                    $html .= "<a itemprop='url' href='".$link."' target='".$target."'>";
                }

                $first_image = qode_get_attachment_id_from_url($image);

                if($image != ""){
                    $html .= "<span class='first_image_holder ".$has_hover_image."'>";

                    if(is_int($first_image)) {
                        $html .= wp_get_attachment_image($first_image, 'full');
                    } else {
                        $html .= '<img itemprop="image" src="'.$image.'" alt="carousel image" />';
                    }


                    $html .= "</span>";
                }

                $second_image = qode_get_attachment_id_from_url($hover_image);

                if($hover_image != ""){
                    $html .= "<span class='second_image_holder ".$has_hover_image."'>";

                    if(is_int($second_image)) {
                        $html .= wp_get_attachment_image($second_image, 'full');
                    } else {
                        $html .= '<img itemprop="image" src="'.$hover_image.'" alt="carousel image" />';
                    }


                    $html .= "</span>";
                }

                if($link != ""){
                    $html .= "</a>";
                }

                $html .= '</div>';

                //is current item on even position in array and two rows option is chosen?
                if($postCount % 2 == 0 && $show_in_two_rows == 'yes') {
                    $html .= "</li>";
                } elseif($show_in_two_rows == '') {
                    $html .= "</li>";
                }

                $postCount++;

            endwhile;

            else:
                $html .= __('Sorry, no posts matched your criteria.','qode');
            endif;

            wp_reset_query();

            $html .= "</ul>";
            $html .= "</div></div>";

        }

        return $html;
    }
    add_shortcode('qode_carousel', 'qode_carousel');
}