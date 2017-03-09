<?php
/* Testimonials Masonry shortcode */
if (!function_exists('testimonials_masonry')) {

    function testimonials_masonry($atts, $content = null) {
        $deafult_args = array(
            "order_by"					=> "date",
            "order"						=> "DESC",
            "category"					=> "",
            "author_image"				=> "",
            "title_tag"					=> 'h5',
            "title_size"				=> '',
            'background_color'			=> '',
            'author_size'				=> '',
            'main_title'				=> '',
            "main_title_tag"			=> 'h3',
            "main_title_size"			=> '',
            'description'				=> '',
            'button_text'				=> '',
            'button_link'				=> '',
            'button_bckg_color'			=> '',
            'link_target'				=> '_blank'
        );

        extract(shortcode_atts($deafult_args, $atts));

        $html = "";
        $testimonials_array = array();

        $args = array(
            'post_type' => 'testimonials',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => '8'
        );

        if ($category != "") {
            $args['testimonials_category'] = $category;
        }

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
        $main_title_tag = (in_array($main_title_tag, $headings_array)) ? $main_title_tag : $args['main_title_tag'];

        $title_style = '';

        if ($title_size !== ''){
            $valid_title_size = (strstr($title_size, 'px', true)) ? $title_size : $title_size.'px';
            $title_style .= "font-size: ".$valid_title_size.";";
        }

        if ($title_style !== ''){
        	$title_style = 'style="'.$title_style.'"';
        }

        $main_title_style = '';

        if ($title_size !== ''){
            $valid_title_size = (strstr($main_title_size, 'px', true)) ? $main_title_size : $main_title_size.'px';
            $main_title_style .= "font-size: ".$valid_title_size.";";
        }

        if ($main_title_style !== ''){
        	$main_title_style = 'style="'.$main_title_style.'"';
        }

        $testimonial_item_style = '';

        if ($background_color !== ''){
            $testimonial_item_style .= "background-color: ".$background_color.";";
        }

        if ($testimonial_item_style !== ''){
        	$testimonial_item_style = 'style="'.$testimonial_item_style.'"';
        }

        $author_style = '';

        if ($author_size !== ''){
            $valid_title_size = (strstr($author_size, 'px', true)) ? $author_size : $author_size.'px';
            $author_style .= "font-size: ".$valid_title_size.";";
        }

        if ($author_style !== ''){
        	$author_style = 'style="'.$author_style.'"';
        }

        $button_html = '';
        if($button_text !== ''){
			$params = array();
			$params['text'] = $button_text;
			if ($button_link !== ''){
				$params['link'] = $button_link;
			}
			if ($link_target !== ''){
				$params['target'] = $link_target;
			}
			if ($button_bckg_color !== ''){
				$params['color'] = '#fff';
				$params['background_color'] = $button_bckg_color;
				$params['border_color'] = $button_bckg_color;
			}
        	$button_html .= qode_execute_shortcode('button',$params);
        }

        $main_block_header = '';

        $main_block_header .= "<div class='testimonial_content'>";
        $main_block_header .= '<div class="testimonial_content_holder">';
        $main_block_header .= '<div class="testimonial_content_inner">';

        if ($main_title !== ''){
        	$main_block_header .= '<'.$main_title_tag.'  class="testimonials_header_title" '.$main_title_style.'>'.$main_title.'</'.$main_title_tag.'>';
            $main_block_header .= '<div class="testimonials_sep"></div>';
        }
        if ($description !== ''){
        	$main_block_header .= '<p class="testimonials_header_desc">'.$description.'</p>';
        }

        $main_block_header .= $button_html;

        $main_block_header .= "</div>"; //close testimonial_content_inner
        $main_block_header .= "</div>"; //close testimonial_content_holder
        $main_block_header .= "</div>"; //close testimonial_content


        $single = '';

        query_posts($args);
        if (have_posts()) :
            while (have_posts()) : the_post();
        		$single = '';

        		$title = get_the_title();
                $author = get_post_meta(get_the_ID(), "qode_testimonial-author", true);
                $text = get_post_meta(get_the_ID(), "qode_testimonial-text", true);
                $testimonial_author_image = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");

                $single .= '<div id="testimonials' . get_the_ID() . '" class="testimonial_content">';
                $single .= '<div class="testimonial_content_holder">';
                $single .= '<div class="testimonial_content_inner">';

                if($author_image == "yes" && $testimonial_author_image[0] !== null){
                    $single .= '<div class="testimonial_image_holder">';
                    $single .= '<img itemprop="image" src="'. $testimonial_author_image[0] .'" />';
                    $single .= '</div>';
                }

                $single .= '<'.$title_tag.' itemprop="name" class="testimonial_title" '.$title_style.'>'.$title.'</'.$title_tag.'>';
                $single .= '<div class="testimonials_sep"></div>';

                $single .= '<div class="testimonial_text_holder">';
                $single .= '<div class="testimonial_text_inner">';
                $single .= '<p>' . trim($text) . '</p>';

                $single .= '<h6 class="testimonial_author" '.$author_style.'>' . $author . '</h6>';
                $single .= '</div>'; //close testimonial_text_inner
                $single .= '</div>'; //close testimonial_text_holder

                $single .= '</div>'; //close testimonial_content_inner
                $single .= '</div>'; //close testimonial_content_holder
                $single .= '</div>'; //close testimonial_content

            	$testimonials_array[] = $single;
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();

        if (count($testimonials_array) >= 8){

	        $html .= "<div class='testimonials_masonry_holder clearfix'>";

	        $html .= "<div class='testimonials_block tstm_block_1'>";

	        $html .= "<div class='testimonials_item testimonials_header' ".$testimonial_item_style.">";
	        $html .= $main_block_header;
	        $html .= "</div>";

	        $html .= "<div class='testimonials_item' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[0];
	        $html .= "</div>";

	        $html .= "<div class='testimonials_item' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[1];
	        $html .= "</div>";

	        $html .= "</div>"; //close tstm_block_1

	        $html .= "<div class='testimonials_block tstm_block_2'>";

	        $html .= "<div class='testimonials_item' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[2];
	        $html .= "</div>";

	        $html .= "<div class='testimonials_item' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[3];
	        $html .= "</div>";

	        $html .= "<div class='testimonials_item tstm_item_large' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[4];
	        $html .= "</div>";

	        $html .= "</div>"; //close tstm_block_2

	        $html .= "<div class='testimonials_block tstm_block_3'>";

	        $html .= "<div class='testimonials_item tstm_item_large' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[5];
	        $html .= "</div>";

	        $html .= "<div class='testimonials_item' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[6];
	        $html .= "</div>";

	        $html .= "<div class='testimonials_item' ".$testimonial_item_style.">";
	        $html .= $testimonials_array[7];
	        $html .= "</div>";

	        $html .= "</div>"; //close tstm_block_3

	        $html .= '</div>'; //close testimonials_masonry_holder
	    }

        return $html;
    }
    add_shortcode('testimonials_masonry', 'testimonials_masonry');
}