<?php
/* Testimonials shortcode */
if (!function_exists('testimonials')) {

    function testimonials($atts, $content = null) {
        $deafult_args = array(
            "number"					=> "-1",
            "number_per_slide"			=> "1",
            "order_by"					=> "date",
            "order"						=> "DESC",
            "category"					=> "",
            "author_image"				=> "",
            "text_color"				=> "",
            "text_font_size"			=> "",
            "author_text_font_weight"	=> "",
            "author_text_color"			=> "",
            "author_text_font_size"		=> "",
            "show_navigation"			=> "",
            "navigation_style"			=> "",
            "auto_rotate_slides"		=> "",
            "animation_type"			=> "",
            "animation_speed"			=> ""
        );

        extract(shortcode_atts($deafult_args, $atts));

        $html                           = "";
        $testimonial_text_inner_styles  = "";
        $testimonial_p_style			= "";
        $navigation_button_radius		= "";
        $testimonial_name_styles        = "";

        if($text_font_size != "" || $text_color != ""){
            $testimonial_p_style = " style='";
            if($text_font_size != ""){
                $testimonial_p_style .= "font-size:". $text_font_size . "px;";
            }
            if($text_color != ""){
                $testimonial_p_style .= "color:". $text_color . ";";
            }
            $testimonial_p_style .= "'";
        }

        if($text_color != "") {
            $testimonial_text_inner_styles  .= "color: ".$text_color.";";
            $testimonial_name_styles        .= "color: ".$text_color.";";
        }

        if($author_text_font_weight != '') {
            $testimonial_name_styles .= 'font-weight: '.$author_text_font_weight.';';
        }

        if($author_text_color != "") {
            $testimonial_name_styles .= "color: ".$author_text_color.";";
        }

        if($author_text_font_size != "") {
            $testimonial_name_styles .= "font-size: ".$author_text_font_size."px;";
        }

        $args = array(
            'post_type' => 'testimonials',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => $number
        );

        if ($category != "") {
            $args['testimonials_category'] = $category;
        }

        $animation_type_data = 'fade';
        switch($animation_type) {
            case 'fade':
            case 'fade_option' :
                $animation_type_data = 'fade';
                break;
            case 'slide':
            case 'slide_option':
                $animation_type_data = 'slide';
                break;
            default:
                $animation_type_data = 'fade';
        }

        $html .= "<div class='testimonials_holder clearfix ".$navigation_style."'>";
        $html .= '<div class="testimonials testimonials_carousel" data-show-navigation="'.$show_navigation.'" data-animation-type="'.$animation_type_data.'" data-animation-speed="'.$animation_speed.'" data-auto-rotate-slides="'.$auto_rotate_slides.'" data-number-per-slide="'.$number_per_slide.'">';
        $html .= '<ul class="slides">';

        query_posts($args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), "qode_testimonial-author", true);
                $website = get_post_meta(get_the_ID(), "qode_testimonial_website", true);
                $company_position = get_post_meta(get_the_ID(), "qode_testimonial-company_position", true);
                $text = get_post_meta(get_the_ID(), "qode_testimonial-text", true);
                $testimonial_author_image = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");

                $html .= '<li id="testimonials' . get_the_ID() . '" class="testimonial_content">';
                $html .= '<div class="testimonial_content_inner"';

                $html .= '>';

                if($author_image == "yes"){
                    $html .= '<div class="testimonial_image_holder">';
                    $html .= '<img itemprop="image" src="'. $testimonial_author_image[0] .'" />';
                    $html .= '</div>';
                }
                $html .= '<div class="testimonial_text_holder">';
                $html .= '<div class="testimonial_text_inner" style="'.$testimonial_text_inner_styles.'">';
                $html .= '<p'. $testimonial_p_style .'>' . trim($text) . '</p>';

                $html .= '<p class="testimonial_author" style="'.$testimonial_name_styles.'">' . $author;

                if($website != "") {
                    $html .= '<span class="author_company_divider"> - </span><span class="author_company">' . $website.'</span>';
                }

                $html .= '</p>';
                $html .= '</div>'; //close testimonial_text_inner
                $html .= '</div>'; //close testimonial_text_holder

                $html .= '</div>'; //close testimonial_content_inner
                $html .= '</li>'; //close testimonials
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();
        $html .= '</ul>';//close slides
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
    add_shortcode('testimonials', 'testimonials');
}