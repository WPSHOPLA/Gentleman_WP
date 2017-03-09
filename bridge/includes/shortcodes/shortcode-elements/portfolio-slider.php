<?php
/* Portfolio Slider shortcode */
if (!function_exists('portfolio_slider')) {
    function portfolio_slider( $atts, $content = null ) {

        global $portfolio_project_id;
        global $qode_options_proya;
        $portfolio_qode_like = "on";
        if (isset($qode_options_proya['portfolio_qode_like'])) {
            $portfolio_qode_like = $qode_options_proya['portfolio_qode_like'];
        }

        $args = array(
            "order_by"          =>  "menu_order",
            "order"             =>  "ASC",
            "number"            =>  "-1",
            "category"          =>  "",
            "selected_projects" =>  "",
            "number_of_items"	=>  "",
            "lightbox"          =>  "",
            "title_tag"         =>  "h3",
            "separator"         =>  "",
            "hide_button"		=>  "",
            "image_size"        =>  "portfolio-square",
            "enable_navigation" =>  ""
        );
        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = "";
        $data_attr = "";

        if ($number_of_items !== ''){
            $data_attr .= " data-number_of_items='".$number_of_items."' ";
        }

        $html .= "<div class='portfolio_slider_holder clearfix'><div class='portfolio_slider' " . $data_attr . " ><ul class='portfolio_slides'>";

        if ($category == "") {
            $q = array(
                'post_type' => 'portfolio_page',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        } else {
            $q = array(
                'post_type' => 'portfolio_page',
                'portfolio_category' => $category,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        }

        $project_ids = null;
        if ($selected_projects != "") {
            $project_ids = explode(",", $selected_projects);
            $q['post__in'] = $project_ids;
        }

        query_posts($q);

        if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post();

            $title = get_the_title();
            $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');

            //get proper image size
            switch($image_size) {
                case 'landscape':
                    $thumb_size = 'portfolio-landscape';
                    break;
                case 'portfolio_slider':
                    $thumb_size = 'portfolio_slider';
                    break;
                case 'portrait':
                    $thumb_size = 'portfolio-portrait';
                    break;
                case 'square':
                    $thumb_size = 'portfolio-square';
                    break;
                default:
                    $thumb_size = 'full';
                    break;
            }

            $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), $thumb_size);

            if(get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != ""){
                $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
            } else {
                $large_image = $featured_image_array[0];
            }

            $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
            $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();

            if(get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true) != ""){
                $custom_portfolio_link_target = get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true);
            } else {
                $custom_portfolio_link_target = '_blank';
            }

            $target = $custom_portfolio_link != "" ? $custom_portfolio_link_target : '_self';

            $html .= "<li class='item'>";

            $html .= "<div class='image_holder'>";
            $html .= "<span class='image'>";
            $html .= "<span class='image_pixel_hover'></span>";
            $html .= "<a itemprop='url' href='" . $portfolio_link . "' target='".$target."'>";
            $html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
            $html .= "</a>";
            $html .= "</span>"; /* close span.image */

            $html .= "<div class='hover_feature_holder'>";
            $html .= '<div class="hover_feature_holder_outer">';
            $html .= '<div class="hover_feature_holder_inner">';
            $html .= '<'.$title_tag.' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'>';
            $separator_class = "";
            if($separator == "no"){
                $separator_class = " transparent";
            }

            $html .= '<span class="separator small' . $separator_class .'"></span>';
            $html .= '<div class="project_category">';
            $k = 1;
            foreach ($terms as $term) {
                $html .= "$term->name";
                if (count($terms) != $k) {
                    $html .= ', ';
                }
                $k++;
            }
            $html .= '</div>'; /* close div.project_category */

            if ($lightbox == "yes") {
                $html .= "<a itemprop='image' class='lightbox qbutton white small' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[portfolio_slider]'>".__('zoom', 'qode')."</a>";
            }
            if ($hide_button !== 'yes'){
                $html .= '<a itemprop="url" href="' . $portfolio_link . '" target="'.$target.'" class="qbutton white small">'.__('view', 'qode').'</a>';
            }
            $html .= '</div>'; /* close div.hover_feature_holder_inner */
            $html .= '</div>'; /* close div.hover_feature_holder_outer */
            $html .= "</div>"; /* close div.hover_feature_holder */
            $html .= "</div>"; /* close div.image_holder */

            $html .= "</li>";

            $postCount++;

        endwhile;

        else:
            $html .= __('Sorry, no posts matched your criteria.','qode');
        endif;

        wp_reset_query();

        $html .= "</ul>";
        if($enable_navigation){
            $html .= '<ul class="caroufredsel-direction-nav"><li><a id="caroufredsel-prev" class="caroufredsel-prev" href="#"><div><i class="fa fa-angle-left"></i></div></a></li><li><a class="caroufredsel-next" id="caroufredsel-next" href="#"><div><i class="fa fa-angle-right"></i></div></a></li></ul>';
        }
        $html .= "</div></div>";

        return $html;
    }
    add_shortcode('portfolio_slider', 'portfolio_slider');
}