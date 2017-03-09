<?php
/* Latest post shortcode */
if (!function_exists('latest_post')) {
    function latest_post($atts, $content = null) {
        $blog_hide_comments = "";
        if (isset($qode_options_proya['blog_hide_comments'])) {
            $blog_hide_comments = $qode_options_proya['blog_hide_comments'];
        }

        $qode_like = "on";
        if (isset($qode_options_proya['qode_like'])) {
            $qode_like = $qode_options_proya['qode_like'];
        }

        $args = array(
            "type"       			=> "date_in_box",
            "number_of_posts"       => "",
            "number_of_colums"      => "",
            "number_of_rows"        => "1",
            "text_from_edge"      	=> "",
            "rows"                  => "",
            "order_by"              => "",
            "order"                 => "",
            "category"              => "",
            "text_length"           => "",
            "title_tag"             => "h5",
            "display_category"    	=> "0",
            "display_time"          => "1",
            "display_comments"      => "1",
            "display_like"          => "0",
            "display_share"         => "0",
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        if($type != "boxes" && $type != "dividers"){
            $q = new WP_Query(
                array('orderby' => $order_by, 'order' => $order, 'posts_per_page' => $number_of_posts, 'category_name' => $category)
            );
        } else {
            $q = new WP_Query(
                array('orderby' => $order_by, 'order' => $order, 'posts_per_page' => $number_of_colums*$number_of_rows, 'category_name' => $category)
            );
        }

        $columns_number = "";
        if($type == 'boxes' || $type == 'dividers') {
            if($number_of_colums == 2){
                $columns_number = "two_columns";
            } else if ($number_of_colums == 3) {
                $columns_number = "three_columns";
            } else if ($number_of_colums == 4) {
                $columns_number = "four_columns";
            }
        }

        //get number of rows class for boxes type
        $rows_number = "";
        if($type == 'boxes' || $type == 'dividers') {
            switch($number_of_rows) {
                case 1:
                    $rows_number = 'one_row';
                    break;
                case 2:
                    $rows_number = 'two_rows';
                    break;
                case 3:
                    $rows_number = 'three_rows';
                    break;
                case 4:
                    $rows_number = 'four_rows';
                    break;
                case 5:
                    $rows_number = 'five_rows';
                    break;
                default:
                    break;
            }
        }

        $html = "";
        $html .= "<div class='latest_post_holder $type $columns_number $rows_number'>";
        $html .= "<ul>";

        while ($q->have_posts()) : $q->the_post();
            $li_classes = "";

            $cat = get_the_category();

            $html .= '<li class="clearfix">';
            if($type == "date_in_box") {
                $html .= '<div itemprop="dateCreated" class="latest_post_date entry_date updated">';
                $html .= '<div class="post_publish_day">'.get_the_time('d').'</div>';
                $html .= '<div class="post_publish_month">'.get_the_time('M').'</div>';
                $html .= '<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></div>';
            }

            if($type == "boxes" || $type == 'dividers'){
                $html .= '<div class="boxes_image">';
                $html .= '<a itemprop="url" href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'latest_post_boxes').'</a>';
                $html .= '</div>';
            }
            $padding_latest_post = "";
            if($text_from_edge == "yes" && $type == "boxes"){
                $padding_latest_post = " style='padding-left:0;padding-right:0;'";
            }
            $html .= '<div class="latest_post"'. $padding_latest_post .'>';
            if($type == "image_in_box") {
                $html .= '<div class="latest_post_image clearfix">';
				$html .= '<a itemprop="url" href="'.get_permalink().'">';
            		$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
			    	$html .= '<img itemprop="image" src="'. $featured_image_array[0] .'" alt="" />';
				$html .= '</a>';
                $html .= '</div>';
            }
            $html .= '<div class="latest_post_text">';
            $html .= '<div class="latest_post_inner">';
            if ($type == "dividers") {
                $html .= '<div itemprop="dateCreated" class="latest_post_date entry_date updated">';
                $html .= '<div class="latest_post_day">'.get_the_time('d').'</div>';
                $html .= '<div class="latest_post_month">'.get_the_time('M').'</div>';
                $html .= '<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></div>';
            }
            $html .= '<div class="latest_post_text_inner">';
            if($type != "minimal") {
                $html .= '<'.$title_tag.' itemprop="name" class="latest_post_title entry_title"><a itemprop="url" href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>';
            }
            if($type != "minimal") {
                if($text_length != '0') {
                    $excerpt = ($text_length > 0) ? mb_substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();
                    $html .= '<p itemprop="description" class="excerpt">'.$excerpt.'...</p>';
                }

            }
            $html .= '<span class="post_infos">';
            if($display_time == '1'  && $type !== 'dividers'){
                $html .= '<span class="date_hour_holder">';
                if($type != 'date_in_box'){
                    $html .= '<span itemprop="dateCreated" class="date entry_date updated">' . get_the_time('d F, Y') . '<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>';
                } else {
                    $html .= '<span itemprop="dateCreated" class="date entry_date updated">' . get_the_time('g:h') . 'h<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>';
                }

                $html .= '</span>';//close date_hour_holder
            }
            if($display_category == '1'){
                if ($type == "dividers"){
                    foreach ($cat as $categ) {
                        $html .='<a itemprop="url" href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . '</a>';
                    }
                }
                else{
                    $html .= '<span class="dots"><i class="fa fa-square"></i></span>';
                    foreach ($cat as $categ) {
                        $html .=' <a itemprop="url" href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
                    }
                }
            }
            //generate comments part of description
            if ($blog_hide_comments != "yes" && $display_comments == "1") {
                $comments_count = get_comments_number();

                switch ($comments_count) {
                    case 0:
                        $comments_count_text = __('No comment', 'qode');
                        break;
                    case 1:
                        $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                        break;
                    default:
                        $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                        break;
                }
                if ($type != "dividers"){
                    $html .= '<span class="dots"><i class="fa fa-square"></i></span>';
                }
                $html .= '<a itemprop="url" class="post_comments" href="' . get_comments_link() . '">';
                $html .= $comments_count_text;
                $html .= '</a>';//close post_comments
            }

            if($qode_like == "on" && function_exists('qode_like')) {
                if($display_like == '1'){
                    if ($type != "dividers"){
                        $html .= '<span class="dots"><i class="fa fa-square"></i></span>';
                    }
                    $html .= '<span class="blog_like">'.qode_like_latest_posts().'</span>';
                }
            }
            if($display_share == '1'){
                if ($type != "dividers"){
                    $html .= '<span class="dots"><i class="fa fa-square"></i></span>';
                }
                $html .= do_shortcode('[social_share]');
            }
            $html .= '</span>'; //close post_infos span
            if($type == "minimal") {
                $html .= '<'.$title_tag.' itemprop="name" class="latest_post_title entry_title"><a itemprop="url" href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>';
            }
            $html .= '</div>'; //close latest_post_text_inner span
            $html .= '</div>'; //close latest_post_inner div
            $html .= '</div>'; //close latest_post_text div
            $html .= '</div>'; //close latest_post div

        endwhile;
        wp_reset_postdata();

        $html .= "</ul></div>";
        return $html;
    }
    add_shortcode('latest_post', 'latest_post');
}