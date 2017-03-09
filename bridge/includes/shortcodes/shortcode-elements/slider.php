<?php
/* Qode Slider shortcode */
if (!function_exists('qode_slider')) {
    function qode_slider( $atts, $content = null ) {
        global $qode_options_proya;
		global $qodeIconCollections;
        extract(shortcode_atts(array("slider"=>"", "height"=>"", "responsive_height"=>"", "auto_start"=>"", "animation_type"=>"", "slide_animation"=>"6000", "show_navigation_arrows"=>"", "anchor" => ""), $atts));
        $html = "";

        if ($slider != "") {
            $args = array(
                'post_type'=> 'slides',
                'slides_category' => $slider,
                'orderby' => "menu_order",
                'order' => "ASC",
                'posts_per_page' => -1
            );

            $slider_id = get_term_by('slug',$slider,'slides_category')->term_id;
            $slider_meta = get_option( "taxonomy_term_".$slider_id );
            $slider_header_effect =  $slider_meta['header_effect'];
            if($slider_header_effect == 'yes'){
                $header_effect_class = 'header_effect';
            }else{
                $header_effect_class = '';
            }

            $slider_css_position_class = '';

            if(isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] == "fixed_top_header"){
                $slider_parallax = 'no';
            }else{
                $slider_parallax = 'yes';
                if(isset($slider_meta['slider_parallax_effect'])){
                    $slider_parallax = $slider_meta['slider_parallax_effect'];
                }
            }

            if ($slider_parallax == 'no' || (isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes' && ((isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'yes') || (isset($qode_options_proya['paspartu_on_bottom_slider']) && $qode_options_proya['paspartu_on_bottom_slider'] == 'yes')))) {
                $data_parallax_effect = 'data-parallax="no"';
                $slider_css_position_class = 'relative_position';
            } else {
                $data_parallax_effect = 'data-parallax="yes"';
            }

            $slider_thumbs =  'no';
            if($slider_thumbs == 'yes'){
                $slider_thumbs_class = 'slider_thumbs';
            }else{
                $slider_thumbs_class = '';
            }

            $slider_advanced_responsiveness_class = '';
            $responsive_coefficients_graphic_data = '';
            $responsive_coefficients_title_data = '';
            $responsive_coefficients_subtitle_data = '';
            $responsive_coefficients_text_data = '';
            $responsive_coefficients_button_data = '';
            if(isset($slider_meta['slider_advanced_responsiveness']) && $slider_meta['slider_advanced_responsiveness'] == 'yes'){
                $slider_advanced_responsiveness_class .= 'advanced_responsiveness';

                if (isset($slider_meta['breakpoint1_graphic']) && $slider_meta['breakpoint1_graphic'] != '') {
                    $breakpoint1_graphic = esc_attr($slider_meta['breakpoint1_graphic']);
                } else {
                    $breakpoint1_graphic = 1;
                }
                if (isset($slider_meta['breakpoint2_graphic']) && $slider_meta['breakpoint2_graphic'] != '') {
                    $breakpoint2_graphic = esc_attr($slider_meta['breakpoint2_graphic']);
                } else {
                    $breakpoint2_graphic = 1;
                }
                if (isset($slider_meta['breakpoint3_graphic']) && $slider_meta['breakpoint3_graphic'] != '') {
                    $breakpoint3_graphic = esc_attr($slider_meta['breakpoint3_graphic']);
                } else {
                    $breakpoint3_graphic = 0.8;
                }
                if (isset($slider_meta['breakpoint4_graphic']) && $slider_meta['breakpoint4_graphic'] != '') {
                    $breakpoint4_graphic = esc_attr($slider_meta['breakpoint4_graphic']);
                } else {
                    $breakpoint4_graphic = 0.7;
                }
                if (isset($slider_meta['breakpoint5_graphic']) && $slider_meta['breakpoint5_graphic'] != '') {
                    $breakpoint5_graphic = esc_attr($slider_meta['breakpoint5_graphic']);
                } else {
                    $breakpoint5_graphic = 0.6;
                }
                if (isset($slider_meta['breakpoint6_graphic']) && $slider_meta['breakpoint6_graphic'] != '') {
                    $breakpoint6_graphic = esc_attr($slider_meta['breakpoint6_graphic']);
                } else {
                    $breakpoint6_graphic = 0.5;
                }
                if (isset($slider_meta['breakpoint7_graphic']) && $slider_meta['breakpoint7_graphic'] != '') {
                    $breakpoint7_graphic = esc_attr($slider_meta['breakpoint7_graphic']);
                } else {
                    $breakpoint7_graphic = 0.4;
                }

                if (isset($slider_meta['breakpoint1_title']) && $slider_meta['breakpoint1_title'] != '') {
                    $breakpoint1_title = esc_attr($slider_meta['breakpoint1_title']);
                } else {
                    $breakpoint1_title = 1;
                }
                if (isset($slider_meta['breakpoint2_title']) && $slider_meta['breakpoint2_title'] != '') {
                    $breakpoint2_title = esc_attr($slider_meta['breakpoint2_title']);
                } else {
                    $breakpoint2_title = 1;
                }
                if (isset($slider_meta['breakpoint3_title']) && $slider_meta['breakpoint3_title'] != '') {
                    $breakpoint3_title = esc_attr($slider_meta['breakpoint3_title']);
                } else {
                    $breakpoint3_title = 0.8;
                }
                if (isset($slider_meta['breakpoint4_title']) && $slider_meta['breakpoint4_title'] != '') {
                    $breakpoint4_title = esc_attr($slider_meta['breakpoint4_title']);
                } else {
                    $breakpoint4_title = 0.7;
                }
                if (isset($slider_meta['breakpoint5_title']) && $slider_meta['breakpoint5_title'] != '') {
                    $breakpoint5_title = esc_attr($slider_meta['breakpoint5_title']);
                } else {
                    $breakpoint5_title = 0.6;
                }
                if (isset($slider_meta['breakpoint6_title']) && $slider_meta['breakpoint6_title'] != '') {
                    $breakpoint6_title = esc_attr($slider_meta['breakpoint6_title']);
                } else {
                    $breakpoint6_title = 0.5;
                }
                if (isset($slider_meta['breakpoint7_title']) && $slider_meta['breakpoint7_title'] != '') {
                    $breakpoint7_title = esc_attr($slider_meta['breakpoint7_title']);
                } else {
                    $breakpoint7_title = 0.4;
                }

                if (isset($slider_meta['breakpoint1_subtitle']) && $slider_meta['breakpoint1_subtitle'] != '') {
                    $breakpoint1_subtitle = esc_attr($slider_meta['breakpoint1_subtitle']);
                } else {
                    $breakpoint1_subtitle = 1;
                }
                if (isset($slider_meta['breakpoint2_subtitle']) && $slider_meta['breakpoint2_subtitle'] != '') {
                    $breakpoint2_subtitle = esc_attr($slider_meta['breakpoint2_subtitle']);
                } else {
                    $breakpoint2_subtitle = 1;
                }
                if (isset($slider_meta['breakpoint3_subtitle']) && $slider_meta['breakpoint3_subtitle'] != '') {
                    $breakpoint3_subtitle = esc_attr($slider_meta['breakpoint3_subtitle']);
                } else {
                    $breakpoint3_subtitle = 0.8;
                }
                if (isset($slider_meta['breakpoint4_subtitle']) && $slider_meta['breakpoint4_subtitle'] != '') {
                    $breakpoint4_subtitle = esc_attr($slider_meta['breakpoint4_subtitle']);
                } else {
                    $breakpoint4_subtitle = 0.7;
                }
                if (isset($slider_meta['breakpoint5_subtitle']) && $slider_meta['breakpoint5_subtitle'] != '') {
                    $breakpoint5_subtitle = esc_attr($slider_meta['breakpoint5_subtitle']);
                } else {
                    $breakpoint5_subtitle = 0.6;
                }
                if (isset($slider_meta['breakpoint6_subtitle']) && $slider_meta['breakpoint6_subtitle'] != '') {
                    $breakpoint6_subtitle = esc_attr($slider_meta['breakpoint6_subtitle']);
                } else {
                    $breakpoint6_subtitle = 0.5;
                }
                if (isset($slider_meta['breakpoint7_subtitle']) && $slider_meta['breakpoint7_subtitle'] != '') {
                    $breakpoint7_subtitle = esc_attr($slider_meta['breakpoint7_subtitle']);
                } else {
                    $breakpoint7_subtitle = 0.4;
                }

                if (isset($slider_meta['breakpoint1_text']) && $slider_meta['breakpoint1_text'] != '') {
                    $breakpoint1_text = esc_attr($slider_meta['breakpoint1_text']);
                } else {
                    $breakpoint1_text = 1;
                }
                if (isset($slider_meta['breakpoint2_text']) && $slider_meta['breakpoint2_text'] != '') {
                    $breakpoint2_text = esc_attr($slider_meta['breakpoint2_text']);
                } else {
                    $breakpoint2_text = 1;
                }
                if (isset($slider_meta['breakpoint3_text']) && $slider_meta['breakpoint3_text'] != '') {
                    $breakpoint3_text = esc_attr($slider_meta['breakpoint3_text']);
                } else {
                    $breakpoint3_text = 0.8;
                }
                if (isset($slider_meta['breakpoint4_text']) && $slider_meta['breakpoint4_text'] != '') {
                    $breakpoint4_text = esc_attr($slider_meta['breakpoint4_text']);
                } else {
                    $breakpoint4_text = 0.7;
                }
                if (isset($slider_meta['breakpoint5_text']) && $slider_meta['breakpoint5_text'] != '') {
                    $breakpoint5_text = esc_attr($slider_meta['breakpoint5_text']);
                } else {
                    $breakpoint5_text = 0.6;
                }
                if (isset($slider_meta['breakpoint6_text']) && $slider_meta['breakpoint6_text'] != '') {
                    $breakpoint6_text = esc_attr($slider_meta['breakpoint6_text']);
                } else {
                    $breakpoint6_text = 0.5;
                }
                if (isset($slider_meta['breakpoint7_text']) && $slider_meta['breakpoint7_text'] != '') {
                    $breakpoint7_text = esc_attr($slider_meta['breakpoint7_text']);
                } else {
                    $breakpoint7_text = 0.4;
                }

                if (isset($slider_meta['breakpoint1_button']) && $slider_meta['breakpoint1_button'] != '') {
                    $breakpoint1_button = esc_attr($slider_meta['breakpoint1_button']);
                } else {
                    $breakpoint1_button = 1;
                }
                if (isset($slider_meta['breakpoint2_button']) && $slider_meta['breakpoint2_button'] != '') {
                    $breakpoint2_button = esc_attr($slider_meta['breakpoint2_button']);
                } else {
                    $breakpoint2_button = 1;
                }
                if (isset($slider_meta['breakpoint3_button']) && $slider_meta['breakpoint3_button'] != '') {
                    $breakpoint3_button = esc_attr($slider_meta['breakpoint3_button']);
                } else {
                    $breakpoint3_button = 0.8;
                }
                if (isset($slider_meta['breakpoint4_button']) && $slider_meta['breakpoint4_button'] != '') {
                    $breakpoint4_button = esc_attr($slider_meta['breakpoint4_button']);
                } else {
                    $breakpoint4_button = 0.7;
                }
                if (isset($slider_meta['breakpoint5_button']) && $slider_meta['breakpoint5_button'] != '') {
                    $breakpoint5_button = esc_attr($slider_meta['breakpoint5_button']);
                } else {
                    $breakpoint5_button = 0.6;
                }
                if (isset($slider_meta['breakpoint6_button']) && $slider_meta['breakpoint6_button'] != '') {
                    $breakpoint6_button = esc_attr($slider_meta['breakpoint6_button']);
                } else {
                    $breakpoint6_button = 0.5;
                }
                if (isset($slider_meta['breakpoint7_button']) && $slider_meta['breakpoint7_button'] != '') {
                    $breakpoint7_button = esc_attr($slider_meta['breakpoint7_button']);
                } else {
                    $breakpoint7_button = 0.4;
                }

                $responsive_coefficients_graphic_data = 'data-q_responsive_graphic_coefficients = "' . esc_attr($breakpoint1_graphic . ',' . $breakpoint2_graphic . ',' . $breakpoint3_graphic . ',' . $breakpoint4_graphic . ',' . $breakpoint5_graphic . ',' . $breakpoint6_graphic . ',' . $breakpoint7_graphic) . '"';
                $responsive_coefficients_title_data = 'data-q_responsive_title_coefficients = "' . esc_attr($breakpoint1_title . ',' . $breakpoint2_title . ',' . $breakpoint3_title . ',' . $breakpoint4_title . ',' . $breakpoint5_title . ',' . $breakpoint6_title . ',' . $breakpoint7_title) . '"';
                $responsive_coefficients_subtitle_data = 'data-q_responsive_subtitle_coefficients = "' . esc_attr($breakpoint1_subtitle . ',' . $breakpoint2_subtitle . ',' . $breakpoint3_subtitle . ',' . $breakpoint4_subtitle . ',' . $breakpoint5_subtitle . ',' . $breakpoint6_subtitle . ',' . $breakpoint7_subtitle) . '"';
                $responsive_coefficients_text_data = 'data-q_responsive_text_coefficients = "' . esc_attr($breakpoint1_text . ',' . $breakpoint2_text . ',' . $breakpoint3_text . ',' . $breakpoint4_text . ',' . $breakpoint5_text . ',' . $breakpoint6_text . ',' . $breakpoint7_text) . '"';
                $responsive_coefficients_button_data = 'data-q_responsive_button_coefficients = "' . esc_attr($breakpoint1_button . ',' . $breakpoint2_button . ',' . $breakpoint3_button . ',' . $breakpoint4_button . ',' . $breakpoint5_button . ',' . $breakpoint6_button . ',' . $breakpoint7_button) . '"';

            }

            if($height == "" || $height == "0"){
                $full_screen_class = "full_screen";
                $responsive_height_class = "";
                $slide_height = "";
                $data_height = "";
            }else{
                $full_screen_class = "";
                if($responsive_height == "yes"){
                    $responsive_height_class = "responsive_height";
                }else{
                    $responsive_height_class = "";
                }
                $slide_height = "height: ".$height."px;";
                $data_height = "data-height='".$height."'";
            }

            $anchor_data = '';
            if($anchor != "") {
                $anchor_data .= 'data-q_id = "#'.$anchor.'"';
            }

            $slider_transparency_class = "header_not_transparent";
            if(isset($qode_options_proya['header_background_transparency_initial']) && $qode_options_proya['header_background_transparency_initial'] != "1" && $qode_options_proya['header_background_transparency_initial'] != ""){
                $slider_transparency_class = "";
            }

            $auto = "true";
            if($auto_start != ""){
                $auto = $auto_start;
            }

            if($auto == "true"){
                $auto_start_class = "q_auto_start";
            } else {
                $auto_start_class = "";
            }

            if($slide_animation != ""){
                $slide_animation = 'data-slide_animation="'.$slide_animation.'"';
            } else {
                $slide_animation = 'data-slide_animation=""';
            }

			switch ($animation_type) {
				case 'fade':
					$animation_type_class = 'fade';
					break;
				case 'slide-vertical-up':
					$animation_type_class = 'vertical_up';
					break;
				case 'slide-vertical-down':
					$animation_type_class = 'vertical_down';
					break;
				case 'slide-cover':
					$animation_type_class = 'slide_cover';
					break;
				default:
					$animation_type_class = '';
			}

            /**************** Count positioning of navigation arrows and preloader depending on header transparency and layout - START ****************/

            global $wp_query;

            $page_id = $wp_query->get_queried_object_id();
            $header_height_padding = 0;

            $paspartu = false;
            if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){
                $paspartu = true;
            }

            $paspartu_on_top = false;
            if(isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'yes'){
                $paspartu_on_top = true;
            }

            $paspartu_on_bottom_slider = false;
            if(isset($qode_options_proya['paspartu_on_bottom_slider']) && $qode_options_proya['paspartu_on_bottom_slider'] == 'yes'){
                $paspartu_on_bottom_slider = true;
            }

            if (!empty($qode_options_proya['header_height'])) {
                $header_height = $qode_options_proya['header_height'];
            } else {
                $header_height = 100;
            }
            if($qode_options_proya['header_bottom_appearance'] == 'stick menu_bottom'){
                $menu_bottom = '46';
                if(is_active_sidebar('header_fixed_right')){
                    $menu_bottom = $menu_bottom + 22;
                }
            } else {
                $menu_bottom = 0;
            }

            $header_top = 0;
            if(isset($qode_options_proya['header_top_area']) && $qode_options_proya['header_top_area'] == "yes"){
                $header_top = 34;
            }

            if(isset($qode_options_proya['logo_image'])){
                $logo_width = 0;
                $logo_height = 0;
                if (!empty($qode_options_proya['logo_image'])) {
                    $logo_url_obj = parse_url($qode_options_proya['logo_image']);
                    list($logo_width, $logo_height, $logo_type, $logo_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path']);
                }
            }

            if((get_post_meta($page_id, "qode_header_color_transparency_per_page", true) == "" || get_post_meta($page_id, "qode_header_color_transparency_per_page", true) == "1") && ($qode_options_proya['header_background_transparency_initial'] == "" || $qode_options_proya['header_background_transparency_initial'] == "1") && ($paspartu == false || $paspartu_on_top == false)){
                $header_height_padding = $header_height + $menu_bottom + $header_top;
                if (isset($qode_options_proya['center_logo_image']) && $qode_options_proya['center_logo_image'] == "yes") {
                    $header_height_padding = $logo_height + 30 + $menu_bottom + $header_top; // 30 is top and bottom margin of centered logo
                }
            }
            if($header_height_padding != 0){
                $navigation_margin_top = 'style="margin-top:'. ($header_height_padding/2 - 30).'px;"'; // 30 is top and bottom margin of centered logo
                $loader_margin_top = 'style="margin-top:'. ($header_height_padding/2).'px;"';
            }
            else {
                $navigation_margin_top = '';
                $loader_margin_top = '';
            }

            /**************** Count positioning of navigation arrows and preloader depending on header transparency and layout - END ****************/

            /**************** Custom cursor - START ****************/
            $custom_cursor = "";
            if(isset($qode_options_proya['qs_enable_navigation_custom_cursor']) && ($qode_options_proya['qs_enable_navigation_custom_cursor']=="yes")){
                $custom_cursor = "has_custom_cursor";
            }
            /**************** Custom cursor - END ****************/

            if(($paspartu == true && ($paspartu_on_top == true || $paspartu_on_bottom_slider == true)) || $slider_parallax == "no"){
                $data_parallax_transform = '';
            }else{
                $data_parallax_transform = 'data-start="transform: translateY(0px);" data-1440="transform: translateY(-500px);"';
            }

            $html .= '<div id="qode-'.$slider.'" '.$anchor_data.' ' . $responsive_coefficients_graphic_data . ' ' . $responsive_coefficients_title_data . ' ' . $responsive_coefficients_subtitle_data . ' ' . $responsive_coefficients_text_data . ' ' . $responsive_coefficients_button_data . ' class="carousel slide '.$animation_type_class.' '.$full_screen_class.' '.$responsive_height_class.' '.$auto_start_class.' '.$header_effect_class.' '.$slider_thumbs_class.' '.$slider_transparency_class.' ' . $custom_cursor . ' '.$slider_advanced_responsiveness_class.'" '.$slide_animation.' '.$data_height.' '.$data_parallax_effect.' style="'.$slide_height.'"><div class="qode_slider_preloader"><div class="ajax_loader" '.$loader_margin_top.'><div class="ajax_loader_1">'.qode_loading_spinners(true).'</div></div></div>';
            $html .= '<div class="carousel-inner '.$slider_css_position_class.'" '.$data_parallax_transform.'>';
            query_posts( $args );


            $found_slides =  $wp_query->post_count;

            if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post();
                $active_class = '';
                if($postCount == 0){
                    $active_class = 'active';
                }else{
                    $active_class = 'inactive';
                }

                $slide_type = get_post_meta(get_the_ID(), "qode_slide-background-type", true);

                $image = get_post_meta(get_the_ID(), "qode_slide-image", true);
                $image_overlay_pattern = get_post_meta(get_the_ID(), "qode_slide-overlay-image", true);
                $thumbnail = get_post_meta(get_the_ID(), "qode_slide-thumbnail", true);
                $thumbnail_attributes = qode_get_attachment_meta_from_url($thumbnail, array('width','height'));
                $thumbnail_attributes_width = '';
                $thumbnail_attributes_height = '';
                if($thumbnail_attributes == true){
                    $thumbnail_attributes_width = $thumbnail_attributes['width'];
                    $thumbnail_attributes_height = $thumbnail_attributes['height'];
                }
                $thumbnail_animation = get_post_meta(get_the_ID(), "qode_slide-thumbnail-animation", true);

                $thumbnail_link = "";
                if(get_post_meta(get_the_ID(), "qode_slide-thumbnail-link", true) != ""){
                    $thumbnail_link = get_post_meta(get_the_ID(), "qode_slide-thumbnail-link", true);
                }
                $svg_link = "";
                if (get_post_meta(get_the_ID(), "qode_slide_svg_link", true) != "") {
                    $svg_link = esc_url(get_post_meta(get_the_ID(), "qode_slide_svg_link", true));
                }

                $video_webm = get_post_meta(get_the_ID(), "qode_slide-video-webm", true);
                $video_mp4 = get_post_meta(get_the_ID(), "qode_slide-video-mp4", true);
                $video_ogv = get_post_meta(get_the_ID(), "qode_slide-video-ogv", true);
                $video_image = get_post_meta(get_the_ID(), "qode_slide-video-image", true);
                $video_overlay = get_post_meta(get_the_ID(), "qode_slide-video-overlay", true);
                $video_overlay_image = get_post_meta(get_the_ID(), "qode_slide-video-overlay-image", true);

                $content_animation = '';
                $content_animation .= get_post_meta(get_the_ID(), "qode_slide-content-animation", true);
                if(get_post_meta(get_the_ID(), 'qode_slide-subtitle', true) != '') {
                    if(get_post_meta(get_the_ID(), 'qode_slide-subtitle-position', true) == "bellow_title"){
                        $content_animation .= ' subtitle_bellow_title';
                    }else{
                        $content_animation .= ' subtitle_above_title';
                    }
                }else{
                    $content_animation .= ' no_subtitle';
                }
                if(get_post_meta(get_the_ID(), "qode_slide-separator-after-title", true) == 'yes') {
                    $content_animation .= ' has_separator';
                }else{
                    $content_animation .= ' no_separator';
                }

                $title_color = "";
                if(get_post_meta(get_the_ID(), "qode_slide-title-color", true) != ""){
                    $title_color .= "color: ". get_post_meta(get_the_ID(), "qode_slide-title-color", true) . ";";
                }
                $title_font_size = "";
                $title_classes   = 'q_slide_title ';
                if(get_post_meta(get_the_ID(), "qode_slide-title-font-size", true) != ""){
                    $title_font_size .= "font-size: ". get_post_meta(get_the_ID(), "qode_slide-title-font-size", true) . "px;";

                    if((int)get_post_meta(get_the_ID(), "qode_slide-title-font-size", true) > 150) {
                        $title_classes .= 'large';
                    }
                }

                $title_line_height = "";
                if(get_post_meta(get_the_ID(), "qode_slide-title-line-height", true) != ""){
                    $title_line_height .= "line-height: ". get_post_meta(get_the_ID(), "qode_slide-title-line-height", true) . "px;";
                }
                $title_font_family = "";
                if((get_post_meta(get_the_ID(), "qode_slide-title-font-family", true) !== "-1") && (get_post_meta(get_the_ID(), "qode_slide-title-font-family", true) !== "")){
                    $title_font_family .= "font-family: '". str_replace('+', ' ', get_post_meta(get_the_ID(), "qode_slide-title-font-family", true)) . "';";
                }
                $title_font_style = "";
                if(get_post_meta(get_the_ID(), "qode_slide-title-font-style", true) != ""){
                    $title_font_style .= "font-style: ". get_post_meta(get_the_ID(), "qode_slide-title-font-style", true) . ";";
                }
                $title_font_weight = "";
                if(get_post_meta(get_the_ID(), "qode_slide-title-font-weight", true) != ""){
                    $title_font_weight .= "font-weight: ". get_post_meta(get_the_ID(), "qode_slide-title-font-weight", true) . ";";
                }

                $title_letter_spacing = "";
                if(get_post_meta(get_the_ID(), "qode_slide-title-letter-spacing", true) != ""){
                    $title_letter_spacing .= "letter-spacing: ". get_post_meta(get_the_ID(), "qode_slide-title-letter-spacing", true) . "px;";
                }

                $title_text_transform = "";
                if(get_post_meta(get_the_ID(), "qode_slide-title-text-transform", true) != ""){
                    $title_text_transform .= "text-transform: ". get_post_meta(get_the_ID(), "qode_slide-title-text-transform", true) . ";";
                }

                $button_style = "";
                $slide_text_styles_string   = '';
                $slide_text_styles 			= array();

                $slide_text_shadow  	    = get_post_meta(get_the_ID(), 'qode_slide-hide-shadow', true);
                $slide_text_color    	    = get_post_meta(get_the_ID(), 'qode_slide-text-color', true);
                $slide_text_font_size  	    = get_post_meta(get_the_ID(), 'qode_slide-text-font-size', true);
                $slide_text_line_height     = get_post_meta(get_the_ID(), 'qode_slide-text-line-height', true);
                $slide_text_font_family     = get_post_meta(get_the_ID(), 'qode_slide-text-font-family', true);
                $slide_text_font_style      = get_post_meta(get_the_ID(), 'qode_slide-text-font-style', true);
                $slide_text_font_weight     = get_post_meta(get_the_ID(), 'qode_slide-text-font-weight', true);
                $slide_text_text_transform  = get_post_meta(get_the_ID(), 'qode_slide-text-text-transform', true);
                $slide_text_padding_top     = get_post_meta(get_the_ID(), 'qode_slide_text_padding_top', true);
                $slide_text_padding_right   = get_post_meta(get_the_ID(), 'qode_slide_text_padding_right', true);
                $slide_text_padding_bottom  = get_post_meta(get_the_ID(), 'qode_slide_text_padding_bottom', true);
                $slide_text_padding_left    = get_post_meta(get_the_ID(), 'qode_slide_text_padding_left', true);

                if($slide_text_shadow == 'yes') {
                    $slide_text_styles[] = "text-shadow: none;";
                }

                if($slide_text_color !== '') {
                    $slide_text_styles[] = 'color: '.$slide_text_color;
                    $button_style = " style='border-color:". get_post_meta(get_the_ID(), "qode_slide-text-color", true) . ";color:". get_post_meta(get_the_ID(), "qode_slide-text-color", true) . ";'";
                }

                if($slide_text_font_size !== '') {
                    $slide_text_styles[] = 'font-size: '.$slide_text_font_size.'px';
                }

                if($slide_text_line_height !== '') {
                    $slide_text_styles[] = 'line-height: '.$slide_text_line_height.'px';
                }

                if(($slide_text_font_family !== '-1') && ($slide_text_font_family !== '')) {
                    $slide_text_styles[] = 'font-family: '. str_replace('+', ' ', $slide_text_font_family);
                }

                if($slide_text_font_style !== '') {
                    $slide_text_styles[] = 'font-style: '.$slide_text_font_style;
                }

                if($slide_text_font_weight !== '') {
                    $slide_text_styles[] = 'font-weight: '.$slide_text_font_weight;
                }

                if($slide_text_text_transform !== '') {
                    $slide_text_styles[] = 'text-transform: '.$slide_text_text_transform;
                }

                if($slide_text_padding_top !== '') {
                    $slide_text_styles[] = 'padding-top: '.$slide_text_padding_top.'px';
                }

                if($slide_text_padding_right !== '') {
                    $slide_text_styles[] = 'padding-right: '.$slide_text_padding_right.'px';
                }

                if($slide_text_padding_bottom !== '') {
                    $slide_text_styles[] = 'padding-bottom: '.$slide_text_padding_bottom.'px';
                }

                if($slide_text_padding_left !== '') {
                    $slide_text_styles[] = 'padding-left: '.$slide_text_padding_left.'px';
                }

                if(is_array($slide_text_styles) && count($slide_text_styles)) {
                    $slide_text_styles_string = 'style="'.implode(';', $slide_text_styles).'"';
                }

                $graphic_alignment = get_post_meta(get_the_ID(), "qode_slide-graphic-alignment", true);
                $content_alignment = get_post_meta(get_the_ID(), "qode_slide-content-alignment", true);

                $separate_text_graphic = get_post_meta(get_the_ID(), "qode_slide-separate-text-graphic", true);

                $animate_image_class = "";
                $animate_image_data = "";
                if (get_post_meta(get_the_ID(), "qode_enable_image_animation", true) == "yes") {
                    $animate_image_class .= "animate_image ";
                    $animate_image_class .= get_post_meta(get_the_ID(), "qode_enable_image_animation_type", true);
                    $animate_image_data .= "data-animate_image='".get_post_meta(get_the_ID(), "qode_enable_image_animation_type", true)."'";
                }

                $content_full_width_class = "";
                if(get_post_meta(get_the_ID(), "qode_slide_vertical_content_full_width", true) == "yes" && get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                    $content_full_width_class = "slide_full_width";
                }

                $content_vertical_middle_position_class = "";
                $slide_item_padding = "";

                if (get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle-type", true) == 'window_top') {
                    $slide_item_padding_value = 0;
                } else {
                    if (isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes' && isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'yes' && $qode_options_proya['paspartu_on_top_fixed'] && $qode_options_proya['paspartu_on_top_fixed'] == 'no') {
                        $slide_item_padding_value = 0;
                    }else{
                        $slide_item_padding_value = $header_height + $menu_bottom + $header_top;
                        if((isset($qode_options_proya['center_logo_image']) && $qode_options_proya['center_logo_image'] == "yes" && $qode_options_proya['header_bottom_appearance'] !== 'stick menu_bottom' && $qode_options_proya['header_bottom_appearance'] !== 'stick_with_left_right_menu') || $qode_options_proya['header_bottom_appearance'] == "fixed_hiding") {
                            $slide_item_padding_value = $logo_height + 20 + $header_height + $menu_bottom + $header_top; // 20 is top margin of centered logo
                        }
                    }
                }

                if (get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes") {
                    $content_vertical_middle_position_class .= " content_vertical_middle";
                    $slide_item_padding = "padding-top: " . esc_attr($slide_item_padding_value) . "px;";
                    $vertical_content_width = "";
                    $vertical_content_xaxis = "";

                    $content_width = "";
                    $content_xaxis = "";
                    $content_yaxis_start = "";
                    $content_yaxis_end = "";
                    $graphic_width = "";
                    $graphic_xaxis = "";
                    $graphic_yaxis_start = "";
                    $graphic_yaxis_end = "";

                    if(get_post_meta(get_the_ID(), "qode_slide_vertical_content_width", true) != ""){
                        $vertical_content_width = "width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_vertical_content_width", true)) . "%; position:relative; ";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_vertical_content_left", true) != "") {
                        $vertical_content_xaxis = "left:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_vertical_content_left", true)) . "%;";
                    }else if (get_post_meta(get_the_ID(), "qode_slide_vertical_content_right", true) != "") {
                        $vertical_content_xaxis = "right:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_vertical_content_right", true)) . "%;";
                    }
                }else {

                    if (get_post_meta(get_the_ID(), "qode_slide-content-width", true) != "") {
                        $content_width = "width:" . get_post_meta(get_the_ID(), "qode_slide-content-width", true) . "%;";
                    } else {
                        $content_width = "width:50%;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-content-left", true) != "") {
                        $content_xaxis = "left:" . get_post_meta(get_the_ID(), "qode_slide-content-left", true) . "%;";
                    } else {
                        if (get_post_meta(get_the_ID(), "qode_slide-content-right", true) != "") {
                            $content_xaxis = "right:" . get_post_meta(get_the_ID(), "qode_slide-content-right", true) . "%;";
                        } else {
                            $content_xaxis = "left: 25%;";
                        }
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-content-top", true) != "") {
                        $content_yaxis_start = "top:" . get_post_meta(get_the_ID(), "qode_slide-content-top", true) . "%;";
                        $content_yaxis_end = "top:" . (get_post_meta(get_the_ID(), "qode_slide-content-top", true) - 10) . "%;";
                    } else {
                        if (get_post_meta(get_the_ID(), "qode_slide-content-bottom", true) != "") {
                            $content_yaxis_start = "bottom:" . get_post_meta(get_the_ID(), "qode_slide-content-bottom", true) . "%;";
                            $content_yaxis_end = "bottom:" . (get_post_meta(get_the_ID(), "qode_slide-content-bottom", true) + 10) . "%;";
                        } else {
                            $content_yaxis_start = "top: 20%;";
                            $content_yaxis_end = "top: 10%;";
                        }
                    }

                    if (get_post_meta(get_the_ID(), "qode_slide-graphic-width", true) != "") {
                        $graphic_width = "width:" . get_post_meta(get_the_ID(), "qode_slide-graphic-width", true) . "%;";
                    } else {
                        $graphic_width = "width:50%;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-graphic-left", true) != "") {
                        $graphic_xaxis = "left:" . get_post_meta(get_the_ID(), "qode_slide-graphic-left", true) . "%;";
                    } else {
                        if (get_post_meta(get_the_ID(), "qode_slide-graphic-right", true) != "") {
                            $graphic_xaxis = "right:" . get_post_meta(get_the_ID(), "qode_slide-graphic-right", true) . "%;";
                        } else {
                            $graphic_xaxis = "left: 25%;";
                        }
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-graphic-top", true) != "") {
                        $graphic_yaxis_start = "top:" . get_post_meta(get_the_ID(), "qode_slide-graphic-top", true) . "%;";
                        $graphic_yaxis_end = "top:" . (get_post_meta(get_the_ID(), "qode_slide-graphic-top", true) - 10) . "%;";
                    } else {
                        if (get_post_meta(get_the_ID(), "qode_slide-graphic-bottom", true) != "") {
                            $graphic_yaxis_start = "bottom:" . get_post_meta(get_the_ID(), "qode_slide-graphic-bottom", true) . "%;";
                            $graphic_yaxis_end = "bottom:" . (get_post_meta(get_the_ID(), "qode_slide-graphic-bottom", true) + 10) . "%;";
                        } else {
                            $graphic_yaxis_start = "top: 20%;";
                            $graphic_yaxis_end = "top: 10%;";
                        }
                    }
                }

                //SCROLL ANIMATIONS
                $slide_data_start = '';
                $slide_data_end = '';
                $slide_title_data = '';
                $slide_subtitle_data = '';
                $slide_graphics_data = '';
                $slide_text_data = '';
                $slide_button_1_data = '';
                $slide_button_2_data = '';
                $slide_separator_bottom_data = '';
                $slide_svg_data = '';

                $qode_slide_general_animation_var = 'yes';
                if (get_post_meta(get_the_ID(), "qode_slide_general_animation", true) === "no") {
                    $qode_slide_general_animation_var = "no";
                }

                if ($qode_slide_general_animation_var === "yes") {

                    //Default values for data start and data end animation
                    $qode_slide_data_start = '0';
                    $qode_slide_data_end = '300';
                    $qode_slide_data_start_custom_style = ' opacity: 1;';
                    $qode_slide_data_end_custom_style = ' opacity: 0;';


                    if (get_post_meta(get_the_ID(), "qode_slide_data_start", true) != "") {
                        $qode_slide_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_start_custom_style", true) != "") {
                        $qode_slide_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_end", true) != "") {
                        $qode_slide_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_end_custom_style", true) != "") {
                        $qode_slide_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_end_custom_style", true));
                    }

                    $slide_data_start = ' data-' . $qode_slide_data_start . '="' . $qode_slide_data_start_custom_style . ' ' . $content_width . ' ' . $content_xaxis . ' ' . $content_yaxis_start . '"';
                    $slide_data_end = ' data-' . $qode_slide_data_end . '="' . $qode_slide_data_end_custom_style . ' ' . $content_xaxis . ' ' . $content_yaxis_end . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_title_animation_scroll", true) == "yes") {

                    //Title options
                    $slide_title_data_start = '0';
                    $slide_title_data_start_custom_style = ' opacity: 1;';
                    $slide_title_data_end = '300';
                    $slide_title_data_end_custom_style = ' opacity:0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_title_start", true) != "") {
                        $slide_title_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_title_start_custom_style", true) != "") {
                        $slide_title_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_title_end", true) != "") {
                        $slide_title_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_title_end_custom_style", true) != "") {
                        $slide_title_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_end_custom_style", true));
                    }

                    $slide_title_data = 'data-' . $slide_title_data_start . '="' . $slide_title_data_start_custom_style . '" data-' . $slide_title_data_end . '="' . $slide_title_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_subtitle_animation_scroll", true) == "yes") {

                    //Subtitle options
                    $slide_subtitle_data_start = '0';
                    $slide_subtitle_data_start_custom_style = ' opacity: 1;';
                    $slide_subtitle_data_end = '300';
                    $slide_subtitle_data_end_custom_style = ' opacity:0;';


                    if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start", true) != "") {
                        $slide_subtitle_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start_custom_style", true) != "") {
                        $slide_subtitle_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end", true) != "") {
                        $slide_subtitle_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end_custom_style", true) != "") {
                        $slide_subtitle_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end_custom_style", true));
                    }

                    $slide_subtitle_data = 'data-' . $slide_subtitle_data_start . '="' . $slide_subtitle_data_start_custom_style . '" data-' . $slide_subtitle_data_end . '="' . $slide_subtitle_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_graphic_animation_scroll", true) == "yes") {

                    //Graphics options
                    $slide_graphics_data_start = '0';
                    $slide_graphics_data_start_custom_style = ' opacity: 1;';
                    $slide_graphics_data_end = '300';
                    $slide_graphics_data_end_custom_style = ' opacity: 0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_start", true) != "") {
                        $slide_graphics_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_start_custom_style", true) != "") {
                        $slide_graphics_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_end", true) != "") {
                        $slide_graphics_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_end_custom_style", true) != "") {
                        $slide_graphics_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_end_custom_style", true));
                    }

                    $slide_graphics_data = 'data-' . $slide_graphics_data_start . '="' . $slide_graphics_data_start_custom_style . '" data-' . $slide_graphics_data_end . '="' . $slide_graphics_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_text_animation_scroll", true) == "yes") {

                    //Text options
                    $slide_text_data_start = '0';
                    $slide_text_data_start_custom_style = ' opacity: 1;';
                    $slide_text_data_end = '300';
                    $slide_text_data_end_custom_style = ' opacity: 0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_text_start", true) != "") {
                        $slide_text_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_text_start_custom_style", true) != "") {
                        $slide_text_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_text_end", true) != "") {
                        $slide_text_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_text_end_custom_style", true) != "") {
                        $slide_text_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_end_custom_style", true));
                    }

                    $slide_text_data = 'data-' . $slide_text_data_start . '="' . $slide_text_data_start_custom_style . '" data-' . $slide_text_data_end . '="' . $slide_text_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_button1_animation_scroll", true) == "yes") {

                    //Button 1 options
                    $slide_button_1_data_start = '0';
                    $slide_button_1_data_start_custom_style = ' opacity: 1;';
                    $slide_button_1_data_end = '300';
                    $slide_button_1_data_end_custom_style = ' opacity: 0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_start", true) != "") {
                        $slide_button_1_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_start_custom_style", true) != "") {
                        $slide_button_1_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_end", true) != "") {
                        $slide_button_1_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_end_custom_style", true) != "") {
                        $slide_button_1_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_end_custom_style", true));
                    }

                    $slide_button_1_data = 'data-' . $slide_button_1_data_start . '="' . $slide_button_1_data_start_custom_style . '" data-' . $slide_button_1_data_end . '="' . $slide_button_1_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_button2_animation_scroll", true) == "yes") {

                    //Button 2 options
                    $slide_button_2_data_start = '0';
                    $slide_button_2_data_start_custom_style = ' opacity: 1;';
                    $slide_button_2_data_end = '300';
                    $slide_button_2_data_end_custom_style = ' opacity: 0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_start", true) != "") {
                        $slide_button_2_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_start_custom_style", true) != "") {
                        $slide_button_2_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_end", true) != "") {
                        $slide_button_2_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_end_custom_style", true) != "") {
                        $slide_button_2_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_end_custom_style", true));
                    }

                    $slide_button_2_data = 'data-' . $slide_button_2_data_start . '="' . $slide_button_2_data_start_custom_style . '" data-' . $slide_button_2_data_end . '="' . $slide_button_2_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_separator_bottom_animation_scroll", true) == "yes") {

                    //Separator bottom options
                    $slide_separator_bottom_data_start = '0';
                    $slide_separator_bottom_data_start_custom_style = ' opacity: 1;';
                    $slide_separator_bottom_data_end = '300';
                    $slide_separator_bottom_data_end_custom_style = ' opacity: 0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start", true) != "") {
                        $slide_separator_bottom_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start_custom_style", true) != "") {
                        $slide_separator_bottom_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end", true) != "") {
                        $slide_separator_bottom_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end_custom_style", true) != "") {
                        $slide_separator_bottom_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end_custom_style", true));
                    }

                    $slide_separator_bottom_data = 'data-' . $slide_separator_bottom_data_start . '="' . $slide_separator_bottom_data_start_custom_style . '" data-' . $slide_separator_bottom_data_end . '="' . $slide_separator_bottom_data_end_custom_style . '"';

                }

                if (get_post_meta(get_the_ID(), "qode_slide_svg_animation_scroll", true) == "yes") {

                    //SVG options
                    $slide_svg_data_start = '0';
                    $slide_svg_data_start_custom_style = ' opacity: 1;';
                    $slide_svg_data_end = '300';
                    $slide_svg_data_end_custom_style = ' opacity: 0;';

                    if (get_post_meta(get_the_ID(), "qode_slide_data_svg_start", true) != "") {
                        $slide_svg_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_start", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_svg_start_custom_style", true) != "") {
                        $slide_svg_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_start_custom_style", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_svg_end", true) != "") {
                        $slide_svg_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_end", true));
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide_data_svg_end_custom_style", true) != "") {
                        $slide_svg_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_end_custom_style", true));
                    }

                    $slide_svg_data = 'data-' . $slide_svg_data_start . '="' . $slide_svg_data_start_custom_style . '" data-' . $slide_svg_data_end . '="' . $slide_svg_data_end_custom_style . '"';

                }

                //SVG
                $svg = '';
                $svg_frame_rate = '';
                if (get_post_meta(get_the_ID(), "qode_slide_svg_source", true) != "") {
                    $svg = get_post_meta(get_the_ID(), "qode_slide_svg_source", true);
                }
                $svg_drawing = "no";
                if (get_post_meta(get_the_ID(), "qode_slide_svg_drawing", true) == "yes") {
                    $svg_drawing = get_post_meta(get_the_ID(), "qode_slide_svg_drawing", true);

                    $svg_frame_rate = '100';
                    if (get_post_meta(get_the_ID(), "qode_slide_svg_frame_rate", true) !== "") {
                        $svg_frame_rate = esc_attr(get_post_meta(get_the_ID(), "qode_slide_svg_frame_rate", true));
                    }
                }

                $header_style = "";
                if(get_post_meta(get_the_ID(), "qode_slide-header-style", true) != ""){
                    $header_style = get_post_meta(get_the_ID(), "qode_slide-header-style", true);
                }

                $navigation_color = "";
                if(get_post_meta(get_the_ID(), "qode_slide-navigation-color", true) != ""){
                    $navigation_color = 'data-navigation-color="'.get_post_meta(get_the_ID(), "qode_slide-navigation-color", true).'"';
                }

                $title = get_the_title();

                $html .= '<div class="item '.$header_style.' '.$animate_image_class.' '.$content_vertical_middle_position_class.' '.$content_full_width_class.'" '.$navigation_color.' '.$animate_image_data.' style="'.$slide_height.' '.$slide_item_padding.' ">';
                if($slide_type == 'video'){

                    $html .= '<div class="video"><div class="mobile-video-image" style="background-image: url('.$video_image.')"></div><div class="video-overlay';
                    if($video_overlay == "yes"){
                        $html .= ' active';
                    }
                    $html .= '"';
                    if($video_overlay_image != ""){
                        $html .= ' style="background-image:url('.$video_overlay_image.');"';
                    }
                    $html .= '>';
                    if($video_overlay_image != ""){
                        $html .= '<img itemprop="image" src="'.$video_overlay_image.'" alt="" />';
                    }else{
                        $html .= '<img itemprop="image" src="'.get_template_directory_uri().'/css/img/pixel-video.png" alt="" />';
                    }
                    $html .= '</div><div class="video-wrap">

									<video class="video" width="1920" height="800" poster="'.$video_image.'" controls="controls" preload="auto" loop autoplay muted>';
                    if(!empty($video_webm)) { $html .= '<source type="video/webm" src="'.$video_webm.'">'; }
                    if(!empty($video_mp4)) { $html .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
                    if(!empty($video_ogv)) { $html .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
                    $html .='<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/js/flashmediaelement.swf">
													<param name="movie" value="'.get_template_directory_uri().'/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&file='.$video_mp4.'" />
													<img itemprop="image" src="'.$video_image.'" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
											</object>
									</video>
							</div></div>';
                }else{
                    $html .= '<div class="image" style="background-image:url('.$image.');">';
                    if($slider_thumbs == 'no'){
                        $html .= '<img itemprop="image" src="'.$image.'" alt="'.$title.'">';
                    }

                    if($image_overlay_pattern !== ""){
                        $html .= '<div class="image_pattern"';
                        $html .= 'style="background-image:url('.$image_overlay_pattern.');"';
                        $html .= '></div>';
                    }

                    $html .= '</div>';
                }

                $html_thumb = "";
                if($thumbnail != ""){
                    $html_thumb .= '<div '.$slide_graphics_data.'>';
                    $html_thumb .= '<div class="thumb '.$thumbnail_animation.'">';
                    if($thumbnail_link != ""){
                        $html_thumb .= '<a itemprop="url" href="'.$thumbnail_link.'" target="_self">';
                    }

                    $html_thumb .= '<img itemprop="image" data-width="'.esc_attr($thumbnail_attributes_width).'" data-height="'.esc_attr($thumbnail_attributes_height).'" src="'.$thumbnail.'" alt="'.$title.'">';

                    if($thumbnail_link != ""){
                        $html_thumb .= '</a>';
                    }
                    $html_thumb .= '</div></div>';
                }

                //SVG
                if ( $svg != "" ) {
                    $html_thumb .= '<div '.$slide_svg_data.'>';
                    $html_thumb .= '<div class="qode_slide-svg-holder" data-svg-drawing="'.$svg_drawing.'" data-svg-frames="'.$svg_frame_rate.'">';

                    if ($svg_link != "") {
                        $html_thumb .= '<a itemprop="url" href="' . $svg_link . '" target="_self">';
                    }

                    $html_thumb .= $svg;

                    if ($svg_link != "") {
                        $html_thumb .= '</a>';
                    }

                    $html_thumb .= '</div></div>';
                }

                $text_shadow = "";
                if(get_post_meta(get_the_ID(), "qode_slide-hide-shadow", true) == true){
                    $text_shadow = "text-shadow: none;";
                }

                $html_text = "";
                $html_text .= '<div class="text '.$content_animation.'">';

                //generate slide subtitle section
                if(get_post_meta(get_the_ID(), 'qode_slide-subtitle', true) != '') {
                    //init variables
                    $slide_subtitle_classes			= array('q_slide_subtitle');
                    $slide_subtitle_styles_string   = '';
                    $slide_subtitle_styles 			= array();
                    $slide_subtitle_color  			= get_post_meta(get_the_ID(), 'qode_slide-subtitle-color', true);
                    $slide_subtitle_font_size  		= get_post_meta(get_the_ID(), 'qode_slide-subtitle-font-size', true);
                    $slide_subtitle_line_height  	= get_post_meta(get_the_ID(), 'qode_slide-subtitle-line-height', true);
                    $slide_subtitle_font_family  	= get_post_meta(get_the_ID(), 'qode_slide-subtitle-font-family', true);
                    $slide_subtitle_font_style   	= get_post_meta(get_the_ID(), 'qode_slide-subtitle-font-style', true);
                    $slide_subtitle_font_weight   	= get_post_meta(get_the_ID(), 'qode_slide-subtitle-font-weight', true);
                    $slide_subtitle_text_transform  = get_post_meta(get_the_ID(), 'qode_slide-subtitle-text-transform', true);
                    $slide_subtitle_letter_spacing 	= get_post_meta(get_the_ID(), 'qode_slide-subtitle-letter-spacing', true);
                    $slide_subtitle_position	   	= get_post_meta(get_the_ID(), 'qode_slide-subtitle-position', true);
                    $slide_subtitle_bg_color		= get_post_meta(get_the_ID(), 'qode_slide-subtitle-background-color', true);
                    $slide_subtitle_bg_transparency = get_post_meta(get_the_ID(), 'qode_slide-subtitle-bg-color-transparency', true);
                    $slide_subtitle_margin_bottom = get_post_meta(get_the_ID(), 'qode_slide_subtitle_margin_bottom', true);
                    $slide_subtitle_padding_top = get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_top', true);
                    $slide_subtitle_padding_right = get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_right', true);
                    $slide_subtitle_padding_bottom = get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_bottom', true);
                    $slide_subtitle_padding_left = get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_left', true);

                    if($slide_subtitle_color !== '') {
                        $slide_subtitle_styles[] = 'color: '.$slide_subtitle_color;
                    }

                    if($slide_subtitle_font_size !== '') {
                        $slide_subtitle_styles[] = 'font-size: '.$slide_subtitle_font_size.'px';
                    }

                    if($slide_subtitle_line_height !== '') {
                        $slide_subtitle_styles[] = 'line-height: '.$slide_subtitle_line_height.'px';
                    }

                    if(($slide_subtitle_font_family !== '-1') && ($slide_subtitle_font_family !== '')) {
                        $slide_subtitle_styles[] = 'font-family: '. str_replace('+', ' ', $slide_subtitle_font_family);
                    }

                    if($slide_subtitle_font_style !== '') {
                        $slide_subtitle_styles[] = 'font-style: '.$slide_subtitle_font_style;
                    }

                    if($slide_subtitle_font_weight !== '') {
                        $slide_subtitle_styles[] = 'font-weight: '.$slide_subtitle_font_weight;
                    }

                    if($slide_subtitle_text_transform !== '') {
                        $slide_subtitle_styles[] = 'text-transform: '.$slide_subtitle_text_transform;
                    }

                    if($slide_subtitle_letter_spacing !== '') {
                        $slide_subtitle_styles[] = 'letter-spacing: '.$slide_subtitle_letter_spacing.'px';
                    }

                    if($text_shadow !== '') {
                        $slide_subtitle_styles[] = $text_shadow;
                    }

                    if(count($slide_subtitle_styles)) {
                        $slide_subtitle_styles_string = 'style="'.implode(';', $slide_subtitle_styles).'"';
                    }

                    $slide_subtitle_span_styles = array();
                    $slide_subtitle_span_styles_string = '';
                    if($slide_subtitle_bg_color) {
                        $slide_subtitle_classes[] = 'with_background_color';
                        $slide_subtitle_init_transparency = 1;
                        if($slide_subtitle_bg_transparency !== '') {
                            $slide_subtitle_init_transparency = $slide_subtitle_bg_transparency;
                        }

                        $slide_subtitle_span_styles[] = 'background-color: '.qode_rgba_color($slide_subtitle_bg_color, $slide_subtitle_init_transparency);
                    }

                    if($slide_subtitle_margin_bottom !== '') {
                        $slide_subtitle_span_styles[] = 'margin-bottom: '.$slide_subtitle_margin_bottom.'px';
                    }

                    if($slide_subtitle_padding_top !== '') {
                        $slide_subtitle_span_styles[] = 'padding-top: '.$slide_subtitle_padding_top.'px';
                    }

                    if($slide_subtitle_padding_right !== '') {
                        $slide_subtitle_span_styles[] = 'padding-right: '.$slide_subtitle_padding_right.'px';
                    }

                    if($slide_subtitle_padding_bottom !== '') {
                        $slide_subtitle_span_styles[] = 'padding-bottom: '.$slide_subtitle_padding_bottom.'px';
                    }

                    if($slide_subtitle_padding_left !== '') {
                        $slide_subtitle_span_styles[] = 'padding-left: '.$slide_subtitle_padding_left.'px';
                    }

                    if(is_array($slide_subtitle_span_styles) && count($slide_subtitle_span_styles)) {
                        $slide_subtitle_span_styles_string = 'style="'.implode(';', $slide_subtitle_span_styles).'"';
                    }

                    if($slide_subtitle_position != "bellow_title") {
                        $html_text .= '<div '.$slide_subtitle_data.'>';
                        $html_text .= '<h4 class="'.implode(' ', $slide_subtitle_classes).'" '.$slide_subtitle_styles_string.'><span '.$slide_subtitle_span_styles_string.'>'.get_post_meta(get_the_ID(), 'qode_slide-subtitle', true).'</span></h4>';
                        $html_text .= '</div>';
                    }
                }

                if(get_post_meta(get_the_ID(), "qode_slide-hide-title", true) != true){

                    $slide_title_border_styles_string  = '';
                    //is border around title option checked?
                    if(get_post_meta(get_the_ID(), "qode_slide-border-around-title", true) == 'yes') {
                        //add class for aditional styling
                        $title_classes .= ' with_title_border';

                        //init variables
                        $slide_title_border_styles 			= array();
                        $slide_title_border_color  			= get_post_meta(get_the_ID(), 'qode_slide-border-around-title-color', true);
                        $slide_title_border_transparency 	= get_post_meta(get_the_ID(), 'qode_slide-border-around-title-transparency', true);

                        //is title border color not set and header style is set?
                        if($slide_title_border_color === '' && $header_style !== '') {
                            //set predefined border color based on header style
                            switch($header_style) {
                                case 'light':
                                    $slide_title_border_color = '#fff';
                                    break;
                                case 'dark':
                                    $slide_title_border_color = '#000';
                                    break;
                                default:
                                    break;
                            }
                        }

                        //set border property
                        $slide_title_border_styles[] = 'border: 3px solid';

                        //is border color set?
                        if($slide_title_border_color !== '') {
                            //is border transparency set?
                            if($slide_title_border_transparency !== '') {
                                //set border color property with semi transparent color
                                $slide_title_border_styles[] = 'border-color: '.qode_rgba_color($slide_title_border_color, $slide_title_border_transparency);
                            } else {
                                //set border color property
                                $slide_title_border_styles[] = 'border-color: '.$slide_title_border_color;
                            }

                        }

                        //implode styles in a string so it can be used in style attribute
                        $slide_title_border_styles_string .= implode(';', $slide_title_border_styles).';';
                    }

                    $slide_title_bg_color	   		= get_post_meta(get_the_ID(), "qode_slide-title-background-color", true);
                    $slide_title_bg_transparency 	= get_post_meta(get_the_ID(), "qode_slide-title-bg-color-transparency", true);

                    $slide_title_background_styles = array();
                    $slide_title_background_styles_string = '';
                    if($slide_title_bg_color) {
                        $title_classes .= ' with_background_color';
                        $slide_title_init_transparency = 1;
                        if($slide_title_bg_transparency !== '') {
                            $slide_title_init_transparency = $slide_title_bg_transparency;
                        }

                        $slide_title_background_styles[] = 'background-color: '.qode_rgba_color($slide_title_bg_color, $slide_title_init_transparency);
                    }

                    if(is_array($slide_title_background_styles) && count($slide_title_background_styles)) {
                        $slide_title_background_styles_string = implode(';', $slide_title_background_styles);
                    }

                    $html_text .= '<div '.$slide_title_data.'>';
                    $html_text .= '<h2 class="'.$title_classes.'" style="'.$title_color.$title_font_size.$title_line_height.$title_font_family.$title_font_style.$title_font_weight.$text_shadow.$title_letter_spacing.$title_text_transform.'"><span style="'.$slide_title_border_styles_string.$slide_title_background_styles_string.'">'.get_the_title().'</span></h2>';
                    $html_text .= '</div>';
                }
                if(get_post_meta(get_the_ID(), 'qode_slide-subtitle', true) != '' && $slide_subtitle_position == "bellow_title") {
                    $html_text .= '<div '.$slide_subtitle_data.'>';
                    $html_text .= '<h4 class="q_slide_subtitle" '.$slide_subtitle_styles_string.'><span '.$slide_subtitle_span_styles_string.'>'.get_post_meta(get_the_ID(), 'qode_slide-subtitle', true).'</span></h4>';
                    $html_text .= '</div>';
                }
                //is separator after title option selected for current slide?
                if(get_post_meta(get_the_ID(), "qode_slide-separator-after-title", true) == 'yes') {

                    //init variables
                    $slide_separator_styles 		= '';
                    $slide_separator_color  		= get_post_meta(get_the_ID(), "qode_slide-separator-color", true);
                    $slide_separator_transparency  	= get_post_meta(get_the_ID(), "qode_slide-separator-transparency", true);
                    $slide_separator_width			= get_post_meta(get_the_ID(), "qode_slide-separator-width", true);

                    //is separator color chosen?
                    if($slide_separator_color !== '') {
                        //is separator transparenct set?
                        if($slide_separator_transparency !== '') {
                            //get rgba color value
                            $slide_separator_rgba_color = qode_rgba_color($slide_separator_color, $slide_separator_transparency);

                            //set color style
                            $slide_separator_styles .= 'background-color: '.$slide_separator_rgba_color.';';
                        } else {
                            //set color without transparency
                            $slide_separator_styles .= 'background-color: '.$slide_separator_color.';';
                        }
                    }

                    //is separator width set?
                    if($slide_separator_width !== '') {
                        //set separator width
                        $slide_separator_styles .= 'width: '.$slide_separator_width.'%;';
                    }

                    //append separator html
                    $html_text .= '<div style="'.$slide_separator_styles.'" class="separator small" ' . $slide_separator_bottom_data . '></div>';
                }

                $html_text .= '<p class="q_slide_text" '.$slide_text_styles_string.' '.$slide_text_data.'><span>'.get_post_meta(get_the_ID(), "qode_slide-text", true).'</span></p>';

                $button_hover_type1 = '';
                if (get_post_meta(get_the_ID(), "qode_slide-button-hover-type", true) != "") {
                    $button_hover_type1 = get_post_meta(get_the_ID(), "qode_slide-button-hover-type", true);
                }

                if(get_post_meta(get_the_ID(), "qode_slide-button-label", true) != "" && get_post_meta(get_the_ID(), "qode_slide-button-link", true) != ""){

					$first_button_icon_html = '';
					if(get_post_meta(get_the_ID(), 'qode_slide_button1_icon_pack', true) !== 'no_icon') {
						$first_btn_icon_collection = $qodeIconCollections->getIconCollection(get_post_meta(get_the_ID(), 'qode_slide_button1_icon_pack', true));


						if(is_object($first_btn_icon_collection) && method_exists($first_btn_icon_collection, 'render')
							&& get_post_meta(get_the_ID(), 'qode_slide_button1_icon_'.$first_btn_icon_collection->param, true) !== '') {
							$first_button_icon_html = $first_btn_icon_collection->render(
								get_post_meta(get_the_ID(), 'qode_slide_button1_icon_'.$first_btn_icon_collection->param, true),
								array(
									'icon_attributes' => array(
										'class' => 'button_icon qode_button_icon_element'
									)
								)
							);
						}
					}



                    $html_text .= '<a itemprop="url" class="qbutton green '. esc_attr($button_hover_type1) .'" href="'.get_post_meta(get_the_ID(), "qode_slide-button-link", true).'" ' . $slide_button_1_data . '>'.get_post_meta(get_the_ID(), "qode_slide-button-label", true). $first_button_icon_html .'</a>';
                }

                $button_hover_type2 = '';
                if (get_post_meta(get_the_ID(), "qode_slide-button-hover-type2", true) != "") {
                    $button_hover_type2 = get_post_meta(get_the_ID(), "qode_slide-button-hover-type2", true);
                }

                if(get_post_meta(get_the_ID(), "qode_slide-button-label2", true) != "" && get_post_meta(get_the_ID(), "qode_slide-button-link2", true) != ""){

					$second_button_icon_html = '';
					if(get_post_meta(get_the_ID(), 'qode_slide_button2_icon_pack', true) !== 'no_icon') {
						$second_btn_icon_collection = $qodeIconCollections->getIconCollection(get_post_meta(get_the_ID(), 'qode_slide_button2_icon_pack', true));


						if(is_object($second_btn_icon_collection) && method_exists($second_btn_icon_collection, 'render')
							&& get_post_meta(get_the_ID(), 'qode_slide_button2_icon_'.$second_btn_icon_collection->param, true) !== '') {
							$second_button_icon_html = $second_btn_icon_collection->render(
								get_post_meta(get_the_ID(), 'qode_slide_button2_icon_'.$second_btn_icon_collection->param, true),
								array(
									'icon_attributes' => array(
										'class' => 'button_icon qode_button_icon_element'
									)
								)
							);
						}
					}


					$html_text .= '<a itemprop="url" class="qbutton white '. esc_attr($button_hover_type2) .'"' . $button_style . ' href="'.get_post_meta(get_the_ID(), "qode_slide-button-link2", true).'"  ' . $slide_button_2_data . '>'.get_post_meta(get_the_ID(), "qode_slide-button-label2", true). $second_button_icon_html  .'</a>';
                }

                if(get_post_meta(get_the_ID(), "qode_slide-anchor-button", true) !== '') {
                    $slide_anchor_style = array();
                    if($slide_text_color !== '') {
                        $slide_anchor_style[] = $slide_text_color;
                    }

                    if($slide_anchor_style !== '') {
                        $slide_anchor_style = 'style="'. implode(';', $slide_anchor_style).'"';
                    }

                    $html_text .= '<div class="slide_anchor_holder"><a '.$slide_anchor_style.' class="slide_anchor_button anchor" href="'.get_post_meta(get_the_ID(), "qode_slide-anchor-button", true).'"><i class="fa fa-angle-down"></i></a></div>';
                }

                $html_text .= '</div>';
                $html .= '<div class="slider_content_outer">';

                if($separate_text_graphic != 'yes'){
                    $html .= '<div class="slider_content ' . $content_alignment . '" style="' . $content_width . $content_xaxis . $content_yaxis_start . '" '.$slide_data_start.' '.$slide_data_end.'>';
                    if(get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                        $html .= '<div class="slider_content_inner ' . esc_attr($content_animation) . ' " '.qode_get_inline_style($vertical_content_width . $vertical_content_xaxis).'>';
                    }
                    $html .= $html_thumb;
                    $html .= $html_text;
                    if(get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                        $html .= '</div>';
                    }
                    $html .= '</div>';
                }else{
                    $html .= '<div class="slider_content '.$graphic_alignment.'" style="'.$graphic_width.$graphic_xaxis.$graphic_yaxis_start.'">';
                    if(get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                        $html .= '<div class="slider_content_inner" '.qode_get_inline_style($vertical_content_width . $vertical_content_xaxis).'>';
                    }
                    $html .= $html_thumb;
                    if(get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                        $html .= '</div>';
                    }
                    $html .= '</div>';
                    $html .= '<div class="slider_content ' . $content_alignment . '" style="' . $content_width . $content_xaxis . $content_yaxis_start . '" '.$slide_data_start.' '.$slide_data_end.'>';
                    if(get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                        $html .= '<div class="slider_content_inner" '.qode_get_inline_style($vertical_content_width . $vertical_content_xaxis).'>';
                    }
                    $html .= $html_text;
                    if(get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes"){
                        $html .= '</div>';
                    }
                    $html .= '</div>';
                }

                $html .= '</div>';
                $html .= '</div>';

                $postCount++;
            endwhile;
            else:
                $html .= __('Sorry, no slides matched your criteria.','qode');
            endif;
            wp_reset_query();

            $html .= '</div>';
            if($found_slides > 1){
                $html .= '<ol class="carousel-indicators" data-start="opacity: 1;" data-300="opacity:0;">';
                query_posts( $args );
                if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post();

                    $html .= '<li data-target="#qode-'.$slider.'" data-slide-to="'.$postCount.'"';
                    if($postCount == 0){
                        $html .= ' class="active"';
                    }
                    $html .= '></li>';

                    $postCount++;
                endwhile;
                else:
                    $html .= __('Sorry, no posts matched your criteria.','qode');
                endif;

                wp_reset_query();
                $html .= '</ol>';
                if($show_navigation_arrows != "no"){
                    $html .= '<a class="left carousel-control" href="#qode-'.$slider.'" data-slide="prev" data-start="opacity: 0.35;" data-300="opacity:0;"><span class="prev_nav" '.$navigation_margin_top.'><i class="fa fa-angle-left"></i></span><span class="thumb_holder" '.$navigation_margin_top.'><span class="thumb_top clearfix"><span class="arrow_left"><i class="fa fa-angle-left"></i></span><span class="numbers"><span class="prev"></span> / '.$postCount.'</span></span><span class="img_outer"><span class="img"></span></span></span></a>';
                    $html .= '<a class="right carousel-control" href="#qode-'.$slider.'" data-slide="next" data-start="opacity: 0.35;" data-300="opacity:0;"><span class="next_nav" '.$navigation_margin_top.'><i class="fa fa-angle-right"></i></span><span class="thumb_holder" '.$navigation_margin_top.'><span class="thumb_top clearfix"><span class="numbers"> <span class="next"></span> / '.$postCount.'</span><span class="arrow_right"><i class="fa fa-angle-right"></i></span></span><span class="img_outer"><span class="img"></span></span></span></a>';
                }
            }
            $html .= '</div>';
        }

        return $html;
    }
    add_shortcode('qode_slider', 'qode_slider');
}