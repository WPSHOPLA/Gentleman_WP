<?php
// Blog Slider shortcode
if (!function_exists('blog_slider')) {

    function blog_slider($atts, $content = null) {

        global $qode_options;

        $args = array(
            "type" => "",
            "auto_start" => "false",
            "info_position" => "",
            "hover_box_color" => "",
            "order_by" => "date",
            "order" => "ASC",
            "number" => "-1",
            "blogs_shown" => "",
            "category" => "",
            "selected_projects" => "",
            "day_color" => "",
            "day_font_size" => "",
            "month_color" => "",
            "month_font_size" => "",
            "post_info_position" => "",
            "show_date" => "yes",
            "date_color" => "",
            "show_categories" => "yes",
            "category_color" => "",
            "show_author" => "yes",
            "author_color" => "",
            "title_tag" => "h3",
            "title_color" => "",
            "image_size" => "full",
            "image_width" => "",
            "image_height" => "",
            "enable_navigation" => "",
            "add_class" => "",
            "show_read_more" => "default",
            "show_excerpt" => "no",
            "excerpt_length" => "",
            "excerpt_color" => "",
            "show_comments" => "no",
            "comments_color" => ""
        );
        extract(shortcode_atts($args, $atts));


        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = "";
        $data_attribute = "";

        if ($blogs_shown !== "" && $type != "simple") {
            $data_attribute .= " data-blogs_shown='" .$blogs_shown. "'";
        }

        $data_attribute .= " data-auto_start='" .$auto_start. "'";

        $title_color_style = '';

        if ($title_color != "") {
            $title_color_style .= 'style="';
            $title_color_style .= 'color: ' . $title_color . ';';
            $title_color_style .= '"';
        }

        $category_style = '';
        if ($category_color != '') {
            $category_style = 'style="color: ' . $category_color . ';"';
        }

        $hover_box_style = "";

        if ($hover_box_color != '') {
            $hover_box_style = 'style="background-color:' . $hover_box_color . ';"';
        }
        $day_style = "";
        if ($day_color !== "") {
            $day_style .= 'color: ' . $day_color . ';';
        }
        if ($day_font_size !== "") {
            $day_style .= 'font-size: ' . $day_font_size . 'px;';
        }

        $day_style = 'style= "'.$day_style.'"';

        $month_style = "";
        if ($month_color !== "") {
            $month_style .= 'color: ' . $month_color . ';';
        }
        if ($month_font_size !== "") {
            $month_style .= 'font-size: ' . $month_font_size . 'px;';
        }

        $month_style = 'style= "'.$month_style.'"';

        $date_style = "";
        if ($date_color !== "") {
            $date_style .= 'color: ' . $date_color . ';';
        }

        $date_style = 'style= "'.$date_style.'"';

        $author_style = "";
        if ($author_color !== "") {
            $author_style .= 'color: ' . $author_color . ';';
        }

        $author_style = 'style= "'.$author_style.'"';

        $comments_style = "";
        if ($comments_color !== "") {
            $comments_style .= 'color: ' . $comments_color . ';';
        }

        $comments_style = 'style= "'.$comments_style.'"';

        $excerpt_style = "";
        if ($excerpt_color !== "") {
            $excerpt_style .= 'color: ' . $excerpt_color . ';';
        }

        $excerpt_style = 'style= "'.$excerpt_style.'"';

        //get proper image size
        switch ($image_size) {
            case 'landscape':
                $thumb_size = 'portfolio-landscape';
                break;
            case 'portrait':
                $thumb_size = 'portfolio-portrait';
                break;
            default:
                $thumb_size = 'full';
                break;
        }

        $type_class = " blog_slider_carousel";
        if($type == "simple") {
            $type_class = " simple_slider";
        }


        $html .= "<div class='blog_slider_holder clearfix " . $add_class . "'><div class='blog_slider" .  $type_class . "'" . $data_attribute . "><ul class='blog_slides'>";

        if ($category == "") {
            $q = array(
                'post_type' => 'post',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        } else {
            $q = array(
                'post_type' => 'post',
                'category_name' => $category,
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

        if (have_posts()) : $postCount = 0;
            while (have_posts()) : the_post();

                if ($type == "" || $type == "carousel"){

                    $html .= "<li class='item'>";
                    $html .= '<div class="item_holder">';

                    $blog_info_class = "";
                    if ($info_position == "info_in_bottom_always"){
                        $blog_info_class .= "info_bottom";
                    }

                    $html .= '<div class="blog_text_holder ' . $blog_info_class . '" ' . $hover_box_style . '>';
                    $html .= '<div class="blog_text_holder_outer">';

                    if($info_position == "info_in_bottom_always"){
                        $html .= '<div class="blog_text_date_holder">';
                        $html .= '<div itemprop="dateCreated" class="blog_slider_date_holder entry_date updated">';
                        $html .= '<span class="blog_slider_day" '.$day_style.' >' . get_the_time('d') . '</span><span class="blog_slider_month" '.$month_style.'>' . get_the_time('M') . '</span>';
                        $html .= '<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></div>';
                        $html .= '</div>';

                        $html .= '<div class="blog_text_holder_inner">';
                        $html .= '<' . $title_tag . ' itemprop="name" class="blog_slider_title entry_title" ><a itemprop="url" href="' . get_permalink() . '" ' . $title_color_style . '>' . get_the_title() . '</a></' . $title_tag . '>';

                        if ($show_categories == 'yes') {
                            $html .= '<div class="blog_slider_categories">';


                            // get categories for specific article
                            $category_html = "";
                            $k = 1;
                            $cat = get_the_category();

                            foreach ($cat as $cats) {
                                $category_html = "$cats->name";
                                if (count($cat) != $k) {
                                    $category_html .= ' / ';
                                }
                                $html .= '<a itemprop="url" class="blog_project_category" ' . $category_style . ' href="' . get_category_link($cats->term_id) . '">' . $category_html . ' </a> ';
                                $k++;
                            }

                            $html.= '</div>';
                        }
                        if ($show_comments == "yes") {
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

                            $html .= '<a itemprop="url" class="blog_slider_post_comments" '.$comments_style.' href="' . get_comments_link() . '">';
                            if ($show_categories == 'yes'){
                                $html .= ' / ';
                            }
                            $html .= $comments_count_text;
                            $html .= '</a>';//close post_comments
                        }
                        $html .= '</div>';
                    }
                    else {
                        $html .= '<div class="blog_text_holder_inner">';

                        if ($show_date == 'yes') {
                            $html .= '<span itemprop="dateCreated" class="blog_slider_date_holder entry_date updated" ' . $date_style . '>';
                            $html .= get_the_time('F d, Y');
                            $html .= '<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>';
                        }


                        $html .= '<' . $title_tag . ' itemprop="name" class="blog_slider_title entry_title" ><a itemprop="url" href="' . get_permalink() . '" ' . $title_color_style . '>' . get_the_title() . '</a></' . $title_tag . '>';

                        if ($show_categories == 'yes') {
                            $html .= '<div class="blog_slider_categories">';


                            // get categories for specific article
                            $category_html = "";
                            $k = 1;
                            $cat = get_the_category();

                            foreach ($cat as $cats) {
                                $category_html = "$cats->name";
                                if (count($cat) != $k) {
                                    $category_html .= ' / ';
                                }
                                $html .= '<a itemprop="url" class="blog_project_category" ' . $category_style . ' href="' . get_category_link($cats->term_id) . '">' . $category_html . ' </a> ';
                                $k++;
                            }

                            $html.= '</div>';
                        }

                        $html .= '</div>'; // blog_text_holder_inner
                    }
                    $html .= '</div>';  // blog_text_holder_outer
                    $html .= '</div>'; // blog_text_holder

                    $html .= '<div class="blog_image_holder">';
                    $html .= '<span class="image">';
                    if ($image_size !== 'custom' || $image_width == '' || $image_height == ''){
                        $html.= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                    }
                    else{
                        $html.= qode_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$image_width,$image_height);
                    }
                    $html .= '</span>';
                    $html .= '</div>'; // close blog_image_holder
                    $html .= '</div>'; // close item_holder
                    $html .= "</li>";
                }
                else if ($type == "simple") {
                    $html .= '<li class="item">';
                    $html .= '<div class = "blog_post_holder">';
                    $html .= '<div class = "blog_image_holder">';
                    $html .= '<span class = "image">';
                    if ($image_size !== 'custom' || $image_width == '' || $image_height == ''){
                        $html.= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                    }
                    else{
                        $html.= qode_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$image_width,$image_height);
                    }
                    $html .= '</span>';
                    $html .= '</div>';//close blog_image_holder div
                    $html .= '<div class = "blog_text_wrapper">';
                    $html .= '<div class = "blog_text_holder_outer">';
                    $html .= '<div class = "blog_text_holder_inner">';
                    $html .= '<div class = "blog_text_holder_inner2"'. $hover_box_style.'>';
                    if ($post_info_position !== "above_title") {
                        $html .= '<'.$title_tag.' itemprop="name"  class= "blog_slider_simple_title entry_title" ><a itemprop="url" href="' . get_permalink() . '" ' . $title_color_style . '>' . get_the_title() . '</a></'.$title_tag.'>';
                    }
                    if($show_categories == "yes" || $show_author == "yes" || $show_date == "yes"){
                        $html .= '<div class="blog_slider_simple_info">';
                        if($show_categories == "yes"){
                            $html .= '<div class = "post_info_item category" >';
                            // get categories for specific article
                            $cat_html = "";
                            $k = 1;
                            $cat = get_the_category();

                            foreach ($cat as $cats) {
                                $cat_html = "$cats->name";
                                if (count($cat) != $k) {
                                    $cat_html .= ' / ';
                                }
                                $html .= '<a itemprop="url" class="blog_simple_slider_category" ' . $category_style . 'href="' . get_category_link($cats->term_id) . '">' . $cat_html . ' </a> ';
                                $k++;
                            }
                            $html .= '</div>'; //close post_info_item category div
                        }
                        if($show_author == "yes"){
                            $html .= '<div class = "post_info_item author" >';
                            $html .= '<a itemprop="author" href="' . get_author_posts_url(get_the_author_meta("ID")) . '" ' . $author_style . ' >' . get_the_author_meta("display_name") . '</a>';
                            $html .= '</div>'; //close post_info_item author div
                        }
                        if($show_date == "yes"){
                            $html .= '<div class = "post_info_item date"><span itemprop="dateCreated" class="entry_date updated" '. $date_style . '>' . get_the_time(get_option('date_format')) .'<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span></div>';
                        }
                        $html .= '</div>'; //close blog_slider_simple_info div
                    }
                    if ($post_info_position == "above_title") {
                        $html .= '<'.$title_tag.' itemprop="name" class= "blog_slider_simple_title entry_title" ><a itemprop="url" href="' . get_permalink() . '" ' . $title_color_style . '>' . get_the_title() . '</a></'.$title_tag.'>';
                    }
                    if ($show_excerpt == "yes") {
                        $excerpt = ($excerpt_length > 0) ? substr(get_the_excerpt(), 0, intval($excerpt_length)).'...' : get_the_excerpt();
                        $html .= '<p itemprop="description" class = "blog_slider_simple_excerpt" '.$excerpt_style.'>'.$excerpt.'</p>';
                    }
                    if($show_read_more == "yes"){
                        $html .= '<div class = "read_more_wrapper">';
                        $html .= '<a itemprop="url" href="'.get_the_permalink().'" target="_self" class="qbutton small read_more_button">'.__("Read More", "qode").'</a>';
                        $html .= '</div>'; //close read_more_wrapper div
                    }
                    $html .= '</div>'; //close blog_text_holder_inner2 div
                    $html .= '</div>'; //close blog_text_holder_inner div
                    $html .= '</div>'; //close blog_text_holder_outer div
                    $html .= '</div>'; //close blog_text_wrapper div
                    $html .= '</div>'; //close blog_post_holder div
                    $html .= '</li>'; //close li
                }
                $postCount++;

            endwhile;

        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();

        $html .= "</ul>";
        if ($enable_navigation) {
            $html .= '<ul class="caroufredsel-direction-nav"><li><a id="caroufredsel-prev" class="caroufredsel-prev" href="#"><div><i class="fa fa-angle-left"></i></div></a></li><li><a class="caroufredsel-next" id="caroufredsel-next" href="#"><div><i class="fa fa-angle-right"></i></div></a></li></ul>';
        }
        $html .= "</div></div>";

        return $html;
    }
    add_shortcode('blog_slider', 'blog_slider');
}