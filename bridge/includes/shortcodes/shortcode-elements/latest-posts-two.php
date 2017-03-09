<?php
/* Latest post shortcode */
if (!function_exists('latest_post_two')) {
    function latest_post_two($atts, $content = null) {

        $args = array(
            "number_of_posts"           => "-1",
            "number_of_columns"         => "3",
            "order_by"                  => "",
            "order"                     => "",
            "category"                  => "",
            "text_length"               => "50",
            "title_tag"                 => "h5",
            "display_featured_images"   => "no",
            "title_color"               => "",
            "separator_color"           => "",
            "excerpt_color"             => "",
            "post_info_color"           => "",
            "post_info_separator_color" => "",
            "background_color"          => "",
            "featured_image_size"      	=> "",
            "image_width"				=> "",
            "image_height"				=> ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $q = new WP_Query(array('orderby' => $order_by, 'order' => $order, 'posts_per_page' => $number_of_posts, 'category_name' => $category));

        $columns_number = "";
        switch($number_of_columns) {
            case 1:
                $columns_number = 'one_column';
                break;
            case 2:
                $columns_number = 'two_columns';
                break;
            case 3:
                $columns_number = 'three_columns';
                break;
            case 4:
                $columns_number = 'four_columns';
                break;
            default:
                break;
        }

		$image_size = "portfolio_masonry_with_space";
        switch($featured_image_size) {
			case 'landscape':
				$image_size = 'portfolio-landscape';
				break;
			case 'portrait':
				$image_size = 'portfolio-portrait';
				break;
			case 'full':
				$image_size = 'full';
				break;
			default:
				$image_size = 'portfolio_masonry_with_space';
				break;
        }

        $title_style = '';
        if($title_color != "") {
            $title_style = "style='color: ".$title_color.";'";
        }

        $separator_style = '';
        if($separator_color != "") {
            $separator_style = "style='background-color: ".$separator_color.";'";
        }

        $excerpt_style = '';
        if($excerpt_color != "") {
            $excerpt_style = "style='color: ".$excerpt_color.";'";
        }

        $post_info_style = '';
        if($post_info_color != "") {
            $post_info_style = "style='color: ".$post_info_color.";'";
        }

        $post_info_holder_style = '';
        if($post_info_separator_color != "") {
            $post_info_holder_style = "style='border-color: ".$post_info_separator_color.";'";
        }

        $holder_style = '';
        if($background_color != "") {
            $holder_style = "style='background-color: ".$background_color.";'";
        }

        $html = "";
        $html .= "<div class='latest_post_two_holder $columns_number'>";
        $html .= "<ul>";

        while ($q->have_posts()) : $q->the_post();

            $html .= '<li class="clearfix">';
            if($display_featured_images === "yes") {
                $html .= '<div class="latest_post_two_image">';
                $html .= '<a itemprop="url" href="'.get_permalink().'">';

				if ($featured_image_size !== 'custom' || $image_width == '' || $image_height == ''){
					$html.= get_the_post_thumbnail(get_the_ID(), $image_size);
				}
				else{
					$html.= qode_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$image_width,$image_height);
				}
				$html .= '</a>';
                $html .= '</div>';
            }
            $html .= '<div class="latest_post_two_inner" '.$holder_style.'>';

            $html .= '<div class="latest_post_two_text">';

            $html .= '<'.$title_tag.' itemprop="name" class="latest_post_two_title entry_title"><a itemprop="url" href="' . get_permalink() . '" '.$title_style.'>' . get_the_title() . '</a></'.$title_tag.'>';

            $html .= '<div class="separator small left" '.$separator_style.'></div>';

            if($text_length != '0') {
                $excerpt = ($text_length > 0) ? mb_substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();
                $html .= '<p itemprop="description" class="latest_post_two_excerpt" '.$excerpt_style.'>'.$excerpt.'</p>';
            }

            $html .= '</div>';

            $html .= '<div class="latest_post_two_info" '.$post_info_holder_style.'>';
            $html .= '<div class="latest_post_two_info_inner" '.$post_info_style.'>';
            $html .= '<div class="post_info_author">';
            $html .= get_avatar(get_the_author_meta( 'ID' ), 30, '', esc_html__('Author Image', 'qode'));
            $html .= '<span class="post_info_author_name">'. get_the_author_meta('display_name') .'</span>';
            $html .= '</div>';

            $html .= '<div itemprop="dateCreated" class="post_info_date entry_date updated">' . get_the_time('d F, Y') . '<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</li>';

        endwhile;
        wp_reset_postdata();

        $html .= "</ul></div>";
        return $html;
    }
    add_shortcode('latest_post_two', 'latest_post_two');
}