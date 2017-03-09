<?php
/* Portfolio list shortcode */
if (!function_exists('portfolio_list')) {

    function portfolio_list($atts, $content = null) {

        global $wp_query;
        global $portfolio_project_id;
        global $qode_options_proya;
        $portfolio_qode_like = "on";
        if (isset($qode_options_proya['portfolio_qode_like'])) {
            $portfolio_qode_like = $qode_options_proya['portfolio_qode_like'];
        }

        $args = array(
            "type"                  		    => "standard",
            "spacing"						    => "",
            "hover_type_standard"               => "default",
            "hover_type_text_on_hover_image"    => "default",
            "hover_type_text_before_hover"      => "default",
            "hover_type_masonry"                => "default",
            "box_border"            		    => "",
            "box_background_color"  		    => "",
            "box_border_color"      		    => "",
            "box_border_width"      		    => "",
            "columns"               		    => "3",
            "frame_around_item"                 => "no_frame",
            "portfolio_loading_type" 		    => "",
            "portfolio_loading_type_masonry"    => "",
            "grid_size"               		    => "",
            "image_size"            		    => "",
            "overlay_background_color"          => "",
            "order_by"              		    => "date",
            "order"                 		    => "ASC",
            "number"                		    => "-1",
            "filter"                		    => "no",
            "filter_color"          		    => "",
            "filter_order_by"          		    => "name",
            "filter_number_of_items"          	=> "",
            "lightbox"              		    => "yes",
            "view_button"           		    => "yes",
            "category"              		    => "",
            "selected_projects"     		    => "",
            "show_load_more"        		    => "yes",
            "show_title"             		    => "",
            "title_tag"             		    => "h5",
            "title_color"                       => "",
            "title_font_size"                   => "",
            "show_categories"                   => "",
            "category_color"                    => "",
            "portfolio_separator"   			=> "",
            "separator_color"                   => "",
            "text_align"			            => "",
            "row_height"                        => "",
            "justify_last_row"                  => "nojustify",
            "justify_threshold"                 => 0.75
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = "";
        $portfolio_holder_classes = array();
		$portfolio_holder_universal_classes = array();

        $_type_class = '';
        $_portfolio_space_class = '';
        $_portfolio_masonry_with_space_class = '';
        if ($type == "hover_text") {
            $_type_class = " hover_text";
			$portfolio_holder_classes[] = "portfolio_with_space portfolio_with_hover_text";
        } elseif ($type == "standard" || $type == "masonry_with_space" || $type == "masonry_with_space_without_description"){
            $_type_class = " standard";
			$portfolio_holder_classes[] = "portfolio_with_space portfolio_standard";
            if($type == "masonry_with_space" || $type == "masonry_with_space_without_description"){
				$portfolio_holder_classes[] = ' masonry_with_space';

                if($type == "masonry_with_space_without_description") {
					$portfolio_holder_classes[] .= ' masonry_with_space_only_image';
                }
            }
        } elseif ($type == "standard_no_space"){
            $_type_class = " standard_no_space";
			$portfolio_holder_classes[] = "portfolio_no_space portfolio_standard";
        } elseif ($type == "hover_text_no_space"){
            $_type_class = " hover_text no_space";
			$portfolio_holder_classes[] = "portfolio_no_space portfolio_with_hover_text";
        } elseif ($type == "justified_gallery"){
            $_type_class = " justified_gallery";
			$portfolio_holder_classes[] = "portfolio_no_space";
        }elseif ($type == "alternating_sizes") {
            $_type_class = " alternating_sizes";
			$portfolio_holder_classes[] = "portfolio_with_space portfolio_with_hover_text";
        }

        $article_style = "";
        if (($type == "masonry_with_space" || $type == 'masonry_with_space_without_description') && $spacing !== ''){
            $article_style .= "padding: 0 " . intval($spacing)/2 . "px;";
            $article_style .= "margin-bottom: ".$spacing."px !important;";
        }
        $article_style = "style='".$article_style."'";

        $portfolio_box_style = "";
        $portfolio_description_class = "";
        if($box_border == "yes" || $box_background_color != ""){

            $portfolio_box_style .= "style=";
            if($box_border == "yes"){
                $portfolio_box_style .= "border-style:solid;";
                if($box_border_color != "" ){
                    $portfolio_box_style .= "border-color:" . $box_border_color . ";";
                }
                if($box_border_width != "" ){
                    $portfolio_box_style .= "border-width:" . $box_border_width . "px;";
                }
            }
            if($box_background_color != ""){
                $portfolio_box_style .= "background-color:" . $box_background_color . ";";
            }
            $portfolio_box_style .= "'";

        }

        if($text_align !== '') {
            $portfolio_description_class .= 'text_align_'.$text_align;
        }

        $portfolio_separator_aignment = "center";
        if($text_align != ""){
            $portfolio_separator_aignment = $text_align;
        }

        // adding portfolio loading
        $portfolio_loading_class = '';
        if($portfolio_loading_type !== '' && (!in_array($type, array('masonry_with_space', 'masonry','masonry_with_space_without_description'))) ) {
            $portfolio_loading_class = $portfolio_loading_type;
        }
        elseif($portfolio_loading_type_masonry !== ''){
            $portfolio_loading_class = $portfolio_loading_type_masonry;
        }

        $filter_style = "";
        if($filter_color != ""){
            $filter_style = " style='";
            $filter_style .= "color:$filter_color";
            $filter_style .= "'";
        }

		$filter_number_html = '';
		$filter_classes = array();
		if($filter_number_of_items == 'yes'){
			$filter_number_html = '<span class="filter_number_of_items" '.$filter_style.'></span>';
			$filter_classes[] = 'portfolio_filter_with_number';
			$portfolio_holder_classes[] = 'portfolio_holder_fwn';
			$portfolio_holder_universal_classes[] = 'portfolio_holder_fwn';
		}

        // adding hover type
        $hover_type = "";
        if ($type == 'standard' || $type == 'standard_no_space' || $type == 'masonry_with_space') {
            $hover_type = $hover_type_standard;
        }
        if ($type == 'hover_text' || $type == 'hover_text_no_space' || $type == 'masonry_with_space_without_description' || $type == 'alternating_sizes') {
            $hover_type = $hover_type_text_on_hover_image;
        }
        if (in_array($type,array('masonry','masonry_gallery_with_space','justified_gallery'))) {
            $hover_type = $hover_type_masonry;
        }

        $overlay_styles= array();
        if($hover_type !== 'default' && $overlay_background_color !== '') {
            $overlay_styles[] = 'background-color: '.$overlay_background_color;
        }

        $title_styles = array();
        if($title_color !== '') {
            $title_styles[] = 'color: '.$title_color;
        }

        if($title_font_size !== '') {
            $title_styles[] = 'font-size: '.$title_font_size.'px';
        }

        $category_styles = array();
        if($category_color !== '') {
            $category_styles[] = 'color: '.$category_color;
        }

        $separator_styles = array();
        if($separator_color !== '') {
            $separator_styles[] = 'background-color: '.$separator_color;
        }

        if($columns == ""){
            $columns = '3';
        }

        $show_description_box = $show_title == 'no' && $show_categories == 'no' ? false : true;

        $frame_around_item_html = '';
        if(in_array($type,array('hover_text'))){
            switch ($frame_around_item){
                case 'monitor_frame':
                    $frame_around_item_html .= '<img itemprop="image" class="monitor_frame" alt="frame" src="' . QODE_ROOT . '/css/img/monitor_frame.png" />';
                    $_type_class .= ' monitor_frame';
                    break;
            }

        }

        if ($type == 'masonry' || $type == 'masonry_gallery_with_space') {
			$html .= '<div class="projects_masonry_wrapper ' . implode(' ', $portfolio_holder_universal_classes) . '">';
			if ($filter == "yes") {

                $html .= "<div class='filter_outer'>";
                $html .= "<div class='filter_holder'>
                        <ul>
                        <li class='filter' data-filter='*'>" . $filter_number_html . "<span>" . __('All', 'qode') . "</span></li>";
                if ($category == "") {
                    $args = array(
                        'parent' => 0,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                } else {
                    $top_category = get_term_by('slug', $category, 'portfolio_category');
                    $term_id = '';
                    if (isset($top_category->term_id))
                        $term_id = $top_category->term_id;
                    $args = array(
                        'parent' => $term_id,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                }
                foreach ($portfolio_categories as $portfolio_category) {
                    $html .= "<li class='filter' data-filter='.portfolio_category_$portfolio_category->term_id'>" . $filter_number_html . "<span>$portfolio_category->name</span>";
                    $args = array(
                        'child_of' => $portfolio_category->term_id
                    );
                    $html .= '</li>';
                }
                $html .= "</ul></div>";
                $html .= "</div>";


            }
			$portfolio_masonry_gallery_class = array();
            $grid_number_of_columns = "gs5";
            if($grid_size == 4){
                $grid_number_of_columns = "gs4";
            }
			if($grid_size == 3){
				$grid_number_of_columns = "gs3";
			}
			if($type == 'masonry_gallery_with_space') {
				$portfolio_masonry_gallery_class[] = 'portfolio_masonry_gallery_with_space';
			}
			$portfolio_masonry_gallery_class[] = $portfolio_loading_class;
			$portfolio_masonry_gallery_class[] = $grid_number_of_columns;
            $html .= '<div class="projects_masonry_holder portfolio_main_holder '. implode(' ',$portfolio_masonry_gallery_class) .'">';
            $html .= '<div class="qode-portfolio-masonry-gallery-grid-sizer"></div>';
            $html .= '<div class="qode-portfolio-masonry-gallery-grid-gutter"></div>';
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            if ($category == "") {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            } else {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'portfolio_category' => $category,
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            }
            $project_ids = null;
            if ($selected_projects != "") {
                $project_ids = explode(",", $selected_projects);
                $args['post__in'] = $project_ids;
            }
            query_posts($args);
            if (have_posts()) : while (have_posts()) : the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size

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

                $masonry_size = "default";
                $masonry_size = get_post_meta(get_the_ID(), "qode_portfolio_type_masonry_style", true);
                $image_size="";
                if($masonry_size == "large_width"){
                    $image_size = "portfolio_masonry_wide";
                }elseif($masonry_size == "large_height"){
                    $image_size = "portfolio_masonry_tall";
                }elseif($masonry_size == "large_width_height"){
                    $image_size = "portfolio_masonry_large";
                } else{
                    $image_size = "portfolio_masonry_regular";
                }

                if($type == "masonry_with_space"){
                    $image_size = "portfolio_masonry_with_space";
                }

                $slug_list_ = "pretty_photo_gallery";
                $title = get_the_title();
                $html .= "<article class='portfolio_masonry_item ";
                foreach ($terms as $term) {
                    $html .= "portfolio_category_$term->term_id ";
                }
                $html .=" " . $masonry_size;
                $html .="'>";
				if(get_post_meta(get_the_ID(), 'qode_show_badge', true) == "yes"){
					$html .= '<span class="qode-portfolio-new-badge">';
					if(get_post_meta(get_the_ID(), 'qode_badge_text', true) != ""){
						$html .= get_post_meta(get_the_ID(), 'qode_badge_text', true);
					}
					$html .= '</span>';
				}
                if($hover_type == 'default') {
                    $html .= "<div class='image_holder'>";
                    $html .= "<a itemprop='url' class='portfolio_link_for_touch' href='".$portfolio_link."' target='".$target."'>";
                    $html .= "<span class='image'>";
                    $html .= get_the_post_thumbnail(get_the_ID(), $image_size);
                    $html .= "</span>";
                    $html .= "</a>";
                    $html .= "<span class='text_holder'>";
                    $html .= "<span class='text_outer'>";
                    $html .= "<span class='text_inner'>";
                    $html .= '<div class="hover_feature_holder_title"><div class="hover_feature_holder_title_inner">';

                    if($show_title !== 'no') {
                        $html .= '<'.$title_tag.' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).' target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'>';
                    }

                    if($portfolio_separator == "yes"){
                        $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                    }

                    if($show_categories !== 'no') {
                        $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>';
                        $k = 1;
                        foreach ($terms as $term) {
                            $html .= "$term->name";
                            if (count($terms) != $k) {
                                $html .= ', ';
                            }
                            $k++;
                        }
                        $html .= '</span>';
                    }

                    $html .= '</div></div>';
                    if($lightbox == "yes" || $portfolio_qode_like == "on" || $view_button !== "no"){
                        $html .= "<span class='feature_holder'>";

                        $html .= '<span class="feature_holder_icons">';
                        if ($lightbox == "yes") {
                            $html .= "<a itemprop='image' class='lightbox qbutton small white' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'>" . __('zoom', 'qode'). "</a>";
                        }
                        if($view_button !== "no"){
                            $html .= "<a itemprop='url' class='preview qbutton small white' href='" . $portfolio_link . "' target='".$target."'>" . __('view', 'qode'). "</i></a>";
                        }
                        if ($portfolio_qode_like == "on") {
                            $html .= "<span class='portfolio_like qbutton small white'>";
                            $portfolio_project_id = get_the_ID();

                            if (function_exists('qode_like_portfolio_list')) {
                                $html .= qode_like_portfolio_list();
                            }
                            $html .= "</span>";
                        }
                        $html .= "</span>";

                        $html .= "</span>";
                    }
                    $html .= "</span></span></span>";
                    $html .= "</div>";
                } else {
                    $category_html = "";
                    $k = 1;
                    foreach ($terms as $term) {
                        $category_html .= "$term->name";
                        if (count($terms) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }

                    $show_icons = "yes";
                    // disable icons on this hover type
                    if ($hover_type == 'cursor_change_hover' || $hover_type == 'thin_plus_only' || $hover_type == 'split_up') {
                        $show_icons = "no";
                    }

                    $disable_link = 'no';
                    // disable link if icons are shown for these hover type
                    if (($hover_type == 'subtle_vertical_hover' || $hover_type == 'image_subtle_rotate_zoom_hover' || $hover_type == 'image_text_zoom_hover') && $show_icons == 'yes') {
                        $disable_link = "yes";
                    }

                    $html .= '<div class="item_holder ' . $hover_type . '">';

                    switch ($hover_type) {
                        case 'subtle_vertical_hover':
                        case 'image_subtle_rotate_zoom_hover':
                        case 'cursor_change_hover':
                        case 'image_text_zoom_hover':
                        case 'thin_plus_only':
                            if ( $show_icons == 'yes' || $hover_type == 'thin_plus_only' || $hover_type = 'cursor_change_hover') {
                                $html .= '<div class="text_holder">';
                                $html .= '<div class="text_holder_outer">';
                                $html .= '<div class="text_holder_inner">';
                                if($hover_type == 'thin_plus_only') {
                                    $html .= '<span class="thin_plus_only_icon">+</span>';
                                } else {
                                    if($show_title !== 'no') {
                                        $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                                    }

                                    if($portfolio_separator == "yes") {
                                        $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                                    }

                                    if($show_categories !== 'no') {
                                        $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                                    }

                                    if ($show_icons == 'yes') {
                                        $html .= '<div class="icons_holder">';

                                        if($lightbox == "yes") {
                                            $html .= '<a itemprop="image" class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                        }

                                        if ($portfolio_qode_like == "on" && function_exists('qode_like_portfolio_list')) {
                                            $html .= qode_like_portfolio_list('icon');
                                        }

                                        if($view_button !== "no") {
                                            $html .= '<a itemprop="url" class="preview" title="'.esc_html__('Go to Project', 'qode').'" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                        }

                                        $html .= '</div>'; // icons_holder
                                    }
                                }
                                $html .= '</div>'; // text_holder_inner
                                $html .= '</div>';  // text_holder_outer
                                $html .= '</div>'; // text_holder
                            }

                            break;
                        case 'slow_zoom':
                        case 'split_up':
                            $html .= '<div class="text_holder">';
                            $html .= '<div class="text_holder_outer">';
                            $html .= '<div class="text_holder_inner">';

                            if($show_title !== 'no') {
                                $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                            }

                            if($portfolio_separator == "yes") {
                                $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                            }

                            if($show_categories !== 'no') {
                                $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                            }

                            $html .= '</div>'; //text_holder_inner
                            $html .= '</div>'; // text_holder_outer
                            $html .= '</div>';  // text_holder
                            if ($show_icons == "yes") {
                                $html .= '<div class="icons_holder">';

                                if($lightbox == "yes") {
                                    $html .= '<a itemprop="image" class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                }

                                if ($portfolio_qode_like == "on" && function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list('icon');
                                }

                                if($view_button !== "no") {
                                    $html .= '<a itemprop="url" class="preview" title="Preview" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                }

                                $html .= '</div>';  // icons_holder
                            }

                            break;
                        case 'slide_up':
                            $html .= '<div class="portfolio_title_holder">';
                            $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                            $html .= '</div>';
                            break;
                    }

                    if($disable_link == 'no') {
                        $html .= '<a itemprop="url" class="portfolio_link_class" title="' . $title . '" href="' . $portfolio_link . '"></a>';
                    }

                    $html .= '<div '.qode_get_inline_style($overlay_styles).' class="portfolio_shader"></div>';
                    $html .= '<div class="image_holder">';
                    $html .= '<span class="image">';
                    $html .= get_the_post_thumbnail(get_the_ID(), $image_size);
                    $html .= '</span>';
                    $html .= '</div>'; // close text_holder
                    $html .= '</div>'; // close item_holder
                }

                $html .= "</article>";

            endwhile;
            else:
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
            <?php
            endif;
            wp_reset_query();
            $html .= "</div>";
            $html .= "</div>";
        } else if ($type == 'justified_gallery') {
            $html .= "<div class='projects_holder_outer justified_gallery " . implode(' ', $portfolio_holder_universal_classes) . "'>";
            if ($filter == "yes") {

                $html .= "<div class='filter_outer'>";
                $html .= "<div class='filter_holder'>
                        <ul>
                        <li class='filter' data-filter='*'>" . $filter_number_html . "<span>" . __('All', 'qode') . "</span></li>";
                if ($category == "") {
                    $args = array(
                        'parent' => 0,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                } else {
                    $top_category = get_term_by('slug', $category, 'portfolio_category');
                    $term_id = '';
                    if (isset($top_category->term_id))
                        $term_id = $top_category->term_id;
                    $args = array(
                        'parent' => $term_id,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                }
                foreach ($portfolio_categories as $portfolio_category) {
                    $html .= "<li class='filter' data-filter='.portfolio_category_$portfolio_category->term_id'>" . $filter_number_html . "<span>$portfolio_category->name</span>";
                    $args = array(
                        'child_of' => $portfolio_category->term_id
                    );
                    $html .= '</li>';
                }
                $html .= "</ul></div>";
                $html .= "</div>";
            }

            $thumb_size_class = "";
            //get proper image size
            switch($image_size) {
                case 'landscape':
                    $thumb_size_class = 'portfolio_landscape_image';
                    break;
                case 'portrait':
                    $thumb_size_class = 'portfolio_portrait_image';
                    break;
                case 'square':
                    $thumb_size_class = 'portfolio_square_image';
                    break;
                default:
                    $thumb_size_class = 'portfolio_full_image';
                    break;
            }

            $html .= "<div class='projects_holder portfolio_main_holder clearfix $thumb_size_class $portfolio_loading_class' ".($spacing != '' ? "data-spacing='$spacing'" : "")." ".($row_height != '' ? "data-row-height='$row_height'" : "")." ".($justify_last_row != "" ? "data-last-row='$justify_last_row'" : "")." ".($justify_threshold != '' ? "data-justify-threshold='$justify_threshold'" : "").">\n";
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            if ($category == "") {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            } else {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'portfolio_category' => $category,
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            }
            $project_ids = null;
            if ($selected_projects != "") {
                $project_ids = explode(",", $selected_projects);
                $args['post__in'] = $project_ids;
            }
            query_posts($args);
            if (have_posts()) : while (have_posts()) : the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                $html .= "<article class='";
                foreach ($terms as $term) {
                    $html .= "portfolio_category_$term->term_id ";
                }

                $title = get_the_title();
                $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size

                if(get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != ""){
                    $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
                } else {
                    $large_image = $featured_image_array[0];
                }

                $slug_list_ = "pretty_photo_gallery";

                //get proper image size
                switch($image_size) {
                    case 'landscape':
                        $thumb_size = 'portfolio-landscape';
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

                $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
                $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();

                if(get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true) != ""){
                    $custom_portfolio_link_target = get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true);
                } else {
                    $custom_portfolio_link_target = '_blank';
                }

                $target = $custom_portfolio_link != "" ? $custom_portfolio_link_target : '_self';

                $html .="' ";
                $html .= $article_style;
                $html .= ">";
				if(get_post_meta(get_the_ID(), 'qode_show_badge', true) == "yes"){
					$html .= '<span class="qode-portfolio-new-badge">';
					if(get_post_meta(get_the_ID(), 'qode_badge_text', true) != ""){
						$html .= get_post_meta(get_the_ID(), 'qode_badge_text', true);
					}
					$html .= '</span>';
				}
                $key_image_html = "";
                $key_image_html .=
                    '<a itemprop="url" class="portfolio_jg_image_link image_holder ' . $hover_type . '" href="'.$portfolio_link.'" target="'.$target.'">' .
                    get_the_post_thumbnail(get_the_ID(), 'full') .
                    '</a>'
                ;
                /*
                $html .=
                    '<div class="bezze">'.
                        '<div>Hello there, I\'m a caption</div>'.
                    '</div>'.
                '';
                */

                if($hover_type == 'default') {

                    $html .= $key_image_html;

                    $html .= "<span class='text_holder'>";
                    $html .= "<span class='text_outer'>";
                    $html .= "<span class='text_inner'>";
                    $html .= '<div class="hover_feature_holder_title"><div class="hover_feature_holder_title_inner">';

                    if($show_title !== 'no') {
                        $html .= '<'.$title_tag.' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).' target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'>';
                    }

                    if($portfolio_separator == "yes"){
                        $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                    }

                    if($show_categories !== 'no') {
                        $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>';
                        $k = 1;
                        foreach ($terms as $term) {
                            $html .= "$term->name";
                            if (count($terms) != $k) {
                                $html .= ', ';
                            }
                            $k++;
                        }
                        $html .= '</span>';
                    }

                    $html .= '</div></div>';
                    $html .= "<span class='feature_holder'>";
                    if($lightbox == "yes" || $portfolio_qode_like == "on" || $view_button !== "no"){
                        $html .= '<span class="feature_holder_icons">';
                        if ($lightbox == "yes") {
                            $html .= "<a itemprop='image' class='lightbox qbutton small white' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'>" . __('zoom', 'qode'). "</a>";
                        }
                        if($view_button !== "no"){
                            $html .= "<a itemprop='url' class='preview qbutton small white' href='" . $portfolio_link . "' target='".$target."'>" . __('view', 'qode'). "</a>";
                        }
                        if ($portfolio_qode_like == "on") {
                            $html .= "<span class='portfolio_like qbutton small white'>";
                            $portfolio_project_id = get_the_ID();

                            if (function_exists('qode_like_portfolio_list')) {
                                $html .= qode_like_portfolio_list();
                            }
                            $html .= "</span>";
                        }
                        $html .= "</span>";
                    }
                    $html .= "</span></span></span></span>";

                } else {
                    $category_html = "";
                    $k = 1;
                    foreach ($terms as $term) {
                        $category_html .= "$term->name";
                        if (count($terms) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }

                    $show_icons = "yes";
                    // disable icons on this hover type
                    if ($hover_type == 'cursor_change_hover' || $hover_type == 'thin_plus_only' || $hover_type == 'split_up') {
                        $show_icons = "no";
                    }

                    $disable_link = 'no';
                    // disable link if icons are shown for these hover type
                    if (($hover_type == 'subtle_vertical_hover' || $hover_type == 'image_subtle_rotate_zoom_hover' || $hover_type == 'image_text_zoom_hover') && $show_icons == 'yes') {
                        $disable_link = "yes";
                    }

                    $html .= '<div class="item_holder ' . $hover_type . '">';

                    switch ($hover_type) {
                        case 'subtle_vertical_hover':
                        case 'image_subtle_rotate_zoom_hover':
                        case 'image_text_zoom_hover':
                        case 'thin_plus_only':
                        case 'cursor_change_hover':
                            $html .= '<div class="text_holder">';
                            $html .= '<div class="text_holder_outer">';
                            $html .= '<div class="text_holder_inner">';
                            if($hover_type == 'thin_plus_only'){
                                $html .= '<span class="thin_plus_only_icon">+</span>';
                            }

                            else {
                                if($show_title !== 'no') {
                                    $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                                }

                                if($portfolio_separator == "yes") {
                                    $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                                }

                                if($show_categories !== 'no') {
                                    $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                                }
                            }

                            if($show_icons == 'yes') {
                                $html .= '<div class="icons_holder">';

                                if($lightbox == "yes") {
                                    $html .= '<a itemprop="image" class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                }

                                if ($portfolio_qode_like == "on" && function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list('icon');
                                }

                                if($view_button !== "no") {
                                    $html .= '<a itemprop="url" class="preview" title="'.esc_html__('Go to Project', 'qode').'" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                }

                                $html .= '</div>'; // icons_holder
                            }

                            $html .= '</div>'; // text_holder_inner
                            $html .= '</div>';  // text_holder_outer
                            $html .= '</div>'; // text_holder

                            break;
                        case 'slow_zoom':
                        case 'split_up':

                            $html .= '<div class="text_holder">';
                            $html .= '<div class="text_holder_outer">';
                            $html .= '<div class="text_holder_inner">';

                            if($show_title !== 'no') {
                                $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                            }

                            if($portfolio_separator == "yes") {
                                $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                            }

                            if($show_categories !== 'no') {
                                $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                            }

                            $html .= '</div>'; //text_holder_inner
                            $html .= '</div>';  // text_holder_outer
                            $html .= '</div>'; // text_holder


                            if ($show_icons == 'yes') {
                                $html .= '<div class="icons_holder">';

                                if($lightbox == "yes") {
                                    $html .= '<a itemprop="image" class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                }

                                if ($portfolio_qode_like == "on" && function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list('icon');
                                }

                                if($view_button !== "no") {
                                    $html .= '<a itemprop="url" class="preview" title="'.esc_html__('Go to Project', 'qode').'" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                }

                                $html .= '</div>';  // icons_holder
                            }
                            break;
                        case 'slide_up':
                            $html .= '<div class="portfolio_title_holder">';
                            $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                            $html .= '</div>';
                            break;
                    }

                    if($disable_link == 'no') {
                        $html .= '<a itemprop="url" class="portfolio_link_class" title="' . $title . '" href="' . $portfolio_link . '"></a>';
                    }

                    $html .= '<div '.qode_get_inline_style($overlay_styles).' class="portfolio_shader"></div>';
                    $html .= '</div>'; // close item_holder
                    $html .= $key_image_html;
                }

                $html .= "</article>\n";

            endwhile;

            else:
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
            <?php
            endif;


            $html .= "</div>";
            if (get_next_posts_link()) {
                if ($show_load_more == "yes" || $show_load_more == "") {
                    $html .= '<div class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="load_more">' . get_next_posts_link(__('Show more', 'qode')) . '</span></div>';
                    $html .= '<div class="portfolio_paging_loading"><a href="javascript: void(0)" class="qbutton">'.__('Loading...', 'qode').'</a></div>';
                }
            }
            $html .= "</div>";
            wp_reset_query();
        } else {
            $html .= "<div class='projects_holder_outer v$columns " . implode(" ", $portfolio_holder_classes) . "'>";
            if ($filter == "yes") {

                if($type == 'masonry_with_space' || $type == 'masonry_with_space_without_description'){
                    $html .= "<div class='filter_outer'>";
                    $html .= "<div class='filter_holder'>
						<ul>
						<li class='filter' data-filter='*'>" . $filter_number_html . "<span>" . __('All', 'qode') . "</span></li>";
                    if ($category == "") {
                        $args = array(
                            'parent' => 0,
                            'orderby' => $filter_order_by
                        );
                        $portfolio_categories = get_terms('portfolio_category', $args);
                    } else {
                        $top_category = get_term_by('slug', $category, 'portfolio_category');
                        $term_id = '';
                        if (isset($top_category->term_id))
                            $term_id = $top_category->term_id;
                        $args = array(
                            'parent' => $term_id,
                            'orderby' => $filter_order_by
                        );
                        $portfolio_categories = get_terms('portfolio_category', $args);
                    }
                    foreach ($portfolio_categories as $portfolio_category) {
                        $html .= "<li class='filter' data-filter='.portfolio_category_$portfolio_category->term_id'>" . $filter_number_html . "<span>$portfolio_category->name</span>";
                        $args = array(
                            'child_of' => $portfolio_category->term_id
                        );
                        $html .= '</li>';
                    }
                    $html .= "</ul></div>";
                    $html .= "</div>";

                }else{

                    $html .= "<div class='filter_outer'>";
                    $html .= "<div class='filter_holder'>
                            <ul>
                            <li class='filter' data-filter='all'>" . $filter_number_html . "<span". $filter_style .">" . __('All', 'qode') . "</span></li>";
                    if ($category == "") {
                        $args = array(
                            'parent' => 0,
                            'orderby' => $filter_order_by
                        );
                        $portfolio_categories = get_terms('portfolio_category', $args);
                    } else {
                        $top_category = get_term_by('slug', $category, 'portfolio_category');
                        $term_id = '';
                        if (isset($top_category->term_id))
                            $term_id = $top_category->term_id;
                        $args = array(
                            'parent' => $term_id,
                            'orderby' => $filter_order_by
                        );
                        $portfolio_categories = get_terms('portfolio_category', $args);
                    }
                    foreach ($portfolio_categories as $portfolio_category) {
                        $html .= "<li class='filter' data-filter='portfolio_category_$portfolio_category->term_id'>" . $filter_number_html . "<span". $filter_style .">$portfolio_category->name</span>";
                        $args = array(
                            'child_of' => $portfolio_category->term_id
                        );
                        $html .= '</li>';
                    }
                    $html .= "</ul></div>";
                    $html .= "</div>";
                }
            }

            $thumb_size_class = "";
            //get proper image size
            switch($image_size) {
                case 'landscape':
                    $thumb_size_class = 'portfolio_landscape_image';
                    break;
                case 'portrait':
                    $thumb_size_class = 'portfolio_portrait_image';
                    break;
                case 'square':
                    $thumb_size_class = 'portfolio_square_image';
                    break;
                default:
                    $thumb_size_class = 'portfolio_full_image';
                    break;
            }

            $html .= "<div class='projects_holder portfolio_main_holder clearfix v$columns$_type_class $thumb_size_class $portfolio_loading_class'>\n";
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            if ($category == "") {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            } else {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'portfolio_category' => $category,
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            }
            $project_ids = null;
            if ($selected_projects != "") {
                $project_ids = explode(",", $selected_projects);
                $args['post__in'] = $project_ids;
            }
			if($type == 'masonry_with_space' || $type == 'masonry_with_space_without_description') {
				$html .= '<div class="qode-portfolio-masonry-gallery-grid-sizer"></div>';
				$html .= '<div class="qode-portfolio-masonry-gallery-grid-gutter"></div>';
			}
            query_posts($args);
            if (have_posts()) : while (have_posts()) : the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                $html .= "<article class='mix ";
                foreach ($terms as $term) {
                    $html .= "portfolio_category_$term->term_id ";
                }

                $title = get_the_title();
                $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size

                if(get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != ""){
                    $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
                } else {
                    $large_image = $featured_image_array[0];
                }

                $slug_list_ = "pretty_photo_gallery";

                //get proper image size
                switch($image_size) {
                    case 'landscape':
                        $thumb_size = 'portfolio-landscape';
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

                if($type == "masonry_with_space" || $type == "masonry_with_space_without_description"){
                    $thumb_size = 'portfolio_masonry_with_space';
                }

                $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
                $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();

                if(get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true) != ""){
                    $custom_portfolio_link_target = get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true);
                } else {
                    $custom_portfolio_link_target = '_blank';
                }

                $target = $custom_portfolio_link != "" ? $custom_portfolio_link_target : '_self';

                $html .="' ";
                $html .= $article_style;
                $html .= ">";
                $html .= $frame_around_item_html;

				if(get_post_meta(get_the_ID(), 'qode_show_badge', true) == "yes"){
					$html .= '<span class="qode-portfolio-new-badge">';
					if(get_post_meta(get_the_ID(), 'qode_badge_text', true) != ""){
						$html .= get_post_meta(get_the_ID(), 'qode_badge_text', true);
					}
					$html .= '</span>';
				}

                if($hover_type == 'default') {
                    $html .= "<div class='image_holder'>";
                    $html .= "<a itemprop='url' class='portfolio_link_for_touch' href='".$portfolio_link."' target='".$target."'>";
                    $html .= "<span class='image'>";
                    $html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                    $html .= "</span>";
                    $html .= "</a>";

                    if ($type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space") {
                        $html .= "<span class='text_holder'>";
                        $html .= "<span class='text_outer'>";
                        $html .= "<span class='text_inner'>";
                        $html .= "<span class='feature_holder'>";
                        if($lightbox == "yes" || $portfolio_qode_like == "on" || $view_button !== "no"){
                            $html .= '<span class="feature_holder_icons">';
                            if ($lightbox == "yes") {
                                $html .= "<a itemprop='image' class='lightbox qbutton small white' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'>" . __('zoom', 'qode'). "</a>";
                            }
                            if($view_button !== "no"){
                                $html .= "<a itemprop='url' class='preview qbutton small white' href='" . $portfolio_link . "' target='".$target."'>" . __('view', 'qode'). "</a>";
                            }
                            if ($portfolio_qode_like == "on") {
                                $html .= "<span class='portfolio_like qbutton small white'>";
                                $portfolio_project_id = get_the_ID();

                                if (function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list();
                                }
                                $html .= "</span>";
                            }
                            $html .= "</span>";
                        }
                        $html .= "</span></span></span></span>";


                    } else if ($type == "hover_text" || $type == "hover_text_no_space" || $type = 'masonry_with_space_without_description') {

                        $html .= "<span class='text_holder'>";
                        $html .= "<span class='text_outer'>";
                        $html .= "<span class='text_inner'>";
                        $html .= '<div class="hover_feature_holder_title"><div class="hover_feature_holder_title_inner">';

                        if($show_title !== 'no') {
                            $html .= '<'.$title_tag.' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).' target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'>';
                        }

                        if($portfolio_separator == "yes"){
                            $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                        }

                        if($show_categories !== 'no') {
                            $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>';
                            $k = 1;
                            foreach ($terms as $term) {
                                $html .= "$term->name";
                                if (count($terms) != $k) {
                                    $html .= ', ';
                                }
                                $k++;
                            }
                            $html .= '</span>';
                        }

                        $html .= '</div></div>';
                        $html .= "<span class='feature_holder'>";
                        if($lightbox == "yes" || $portfolio_qode_like == "on" || $view_button !== "no"){
                            $html .= '<span class="feature_holder_icons">';
                            if ($lightbox == "yes") {
                                $html .= "<a itemprop='image' class='lightbox qbutton small white' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'>" . __('zoom', 'qode'). "</a>";
                            }
                            if($view_button !== "no"){
                                $html .= "<a itemprop='url' class='preview qbutton small white' href='" . $portfolio_link . "' target='".$target."'>" . __('view', 'qode'). "</a>";
                            }
                            if ($portfolio_qode_like == "on") {
                                $html .= "<span class='portfolio_like qbutton small white'>";
                                $portfolio_project_id = get_the_ID();

                                if (function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list();
                                }
                                $html .= "</span>";
                            }
                            $html .= "</span>";
                        }
                        $html .= "</span></span></span></span>";


                    }
                    $html .= "</div>";
                    if (($type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space") && $show_description_box) {
                        $html .= "<div class='portfolio_description ".$portfolio_description_class."'". $portfolio_box_style .">";

                        if($show_title !== 'no') {
                            $html .= '<'.$title_tag.' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).' target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'>';
                        }

                        if($portfolio_separator == "yes"){
                            $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                        }

                        if($show_categories !== 'no') {
                            $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>';
                            $k = 1;
                            foreach ($terms as $term) {
                                $html .= "$term->name";
                                if (count($terms) != $k) {
                                    $html .= ', ';
                                }
                                $k++;
                            }
                            $html .= '</span>';
                        }

                        $html .= '</div>';
                    }

                } else {
                    $category_html = "";
                    $k = 1;
                    foreach ($terms as $term) {
                        $category_html .= "$term->name";
                        if (count($terms) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }

                    $show_icons = "yes";
                    // disable icons on this hover type
                    if ($hover_type == 'cursor_change_hover' || $hover_type == 'thin_plus_only' || $hover_type == 'split_up' || $hover_type == 'grayscale') {
                        $show_icons = "no";
                    }

                    $disable_link = 'no';
                    // disable link if icons are shown for these hover type
                    if (($hover_type == 'subtle_vertical_hover' || $hover_type == 'image_subtle_rotate_zoom_hover' || $hover_type == 'image_text_zoom_hover') && $show_icons == 'yes') {
                        $disable_link = "yes";
                    }

                    $html .= '<div class="item_holder ' . $hover_type . '">';

                    switch ($hover_type) {
                        case 'subtle_vertical_hover':
                        case 'image_subtle_rotate_zoom_hover':
                        case 'image_text_zoom_hover':
                        case 'thin_plus_only':
                        case 'cursor_change_hover':
                        case 'grayscale':
                            $html .= '<div class="text_holder">';
                            $html .= '<div class="text_holder_outer">';
                            $html .= '<div class="text_holder_inner">';
                            if($hover_type == 'thin_plus_only'){
                                $html .= '<span class="thin_plus_only_icon">+</span>';
                            }

                            elseif (in_array($type, array('hover_text', 'hover_text_no_space', 'masonry_with_space_without_description'))) {
                                if($show_title !== 'no') {
                                    $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                                }

                                if($portfolio_separator == "yes") {
                                    $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                                }

                                if($show_categories !== 'no') {
                                    $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                                }
                            }

                            if($show_icons == 'yes') {
                                $html .= '<div class="icons_holder">';

                                if($lightbox == "yes") {
                                    $html .= '<a itemprop="image" class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                }

                                if ($portfolio_qode_like == "on" && function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list('icon');
                                }

                                if($view_button !== "no") {
                                    $html .= '<a itemprop="url" class="preview" title="'.esc_html__('Go to Project', 'qode').'" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                }

                                $html .= '</div>'; // icons_holder
                            }

                            $html .= '</div>'; // text_holder_inner
                            $html .= '</div>';  // text_holder_outer
                            $html .= '</div>'; // text_holder

                            break;
                        case 'slow_zoom':
                        case 'split_up':

                            if (in_array($type, array('hover_text', 'hover_text_no_space', 'masonry_with_space_without_description'))) {
                                $html .= '<div class="text_holder">';
                                $html .= '<div class="text_holder_outer">';
                                $html .= '<div class="text_holder_inner">';

                                if($show_title !== 'no') {
                                    $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                                }

                                if($portfolio_separator == "yes") {
                                    $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                                }

                                if($show_categories !== 'no') {
                                    $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                                }

                                $html .= '</div>'; //text_holder_inner
                                $html .= '</div>';  // text_holder_outer
                                $html .= '</div>'; // text_holder
                            }

                            if ($show_icons == 'yes') {
                                $html .= '<div class="icons_holder">';

                                if($lightbox == "yes") {
                                    $html .= '<a itemprop="image" class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                }

                                if ($portfolio_qode_like == "on" && function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list('icon');
                                }

                                if($view_button !== "no") {
                                    $html .= '<a itemprop="url" class="preview" title="'.esc_html__('Go to Project', 'qode').'" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                }

                                $html .= '</div>';  // icons_holder
                            }
                            break;
                        case 'slide_up':
                            $html .= '<div class="portfolio_title_holder">';
                            $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                            $html .= '</div>';
                            break;
                        case 'flip_from_left':
                            $html .= '<div class="portfolio_title_holder">';
                            $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                            $html .= '</div>';
                            break;
                    }

                    if($disable_link == 'no') {
                        $html .= '<a itemprop="url" class="portfolio_link_class" title="' . $title . '" href="' . $portfolio_link . '"></a>';
                    }

                    $html .= '<div '.qode_get_inline_style($overlay_styles).' class="portfolio_shader"></div>';
                    $html .= '<div class="image_holder">';
                    $html .= '<span class="image">';
                    $html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                    $html .= '</span>';
                    $html .= '</div>'; // close image_holder
                    $html .= '</div>'; // close item_holder
                    // portfolio description start

                    if ($type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space") {
                        $html .= "<div class='portfolio_description " . $portfolio_description_class . "' ". $portfolio_box_style .">";

                        if($show_title !== 'no') {
                            $html .= '<' . $title_tag . ' itemprop="name" class="portfolio_title entry_title"><a itemprop="url" href="' . $portfolio_link . '" target="' . $target . '" '.qode_get_inline_style($title_styles).'>' . get_the_title() . '</a></' . $title_tag . '>';
                        }

                        if($portfolio_separator == "yes") {
                            $html .= '<div '.qode_get_inline_style($separator_styles).' class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
                        }

                        if($show_categories !== 'no') {
                            $html .= '<span class="project_category" '.qode_get_inline_style($category_styles).'>' . $category_html . '</span>';
                        }

                        $html .= '</div>'; // close portfolio_description
                    }
                }

                $html .= "</article>\n";

            endwhile;

                $i = 1;
                while ($i <= $columns) {
                    $i++;
                    if ($columns != 1) {
                        $html .= "<div class='filler'></div>\n";
                    }
                }

            else:
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
            <?php
            endif;


            $html .= "</div>";
            if (get_next_posts_link()) {
                if ($show_load_more == "yes" || $show_load_more == "") {
                    $html .= '<div class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="load_more">' . get_next_posts_link(__('Show more', 'qode')) . '</span></div>';
                    $html .= '<div class="portfolio_paging_loading"><a href="javascript: void(0)" class="qbutton">'.__('Loading...', 'qode').'</a></div>';
                }
            }
            $html .= "</div>";
            wp_reset_query();
        }
        return $html;
    }
    add_shortcode('portfolio_list', 'portfolio_list');
}