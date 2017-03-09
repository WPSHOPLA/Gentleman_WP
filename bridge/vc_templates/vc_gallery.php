<?php
// Code in else part is because of compatibility for older versions of VC.

if(version_compare(qode_get_vc_version(), '4.7.4') >= 0) {
	/**
	 * Shortcode attributes
	 * @var $atts
	 * @var $title
	 * @var $source
	 * @var $type
	 * @var $onclick
	 * @var $custom_links
	 * @var $custom_links_target
	 * @var $img_size
	 * @var $external_img_size
	 * @var $images
	 * @var $custom_srcs
	 * @var $el_class
	 * @var $interval
	 * @var $css
	 * Shortcode class
	 * @var $this WPBakeryShortCode_VC_gallery
	 */
	$title = $source = $type = $onclick = $custom_links = $custom_links_target = $img_size = $external_img_size = $images = $custom_srcs = $el_class = $interval = $css = '';
	$large_img_src = '';

	$attributes = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $attributes );

	$default_src = vc_asset_url( 'vc/no_image.png' );

	$gal_images = '';
	$link_start = '';
	$link_end = '';
	$el_start = '';
	$el_end = '';
	$slides_wrap_start = '';
	$slides_wrap_end = '';

	$el_class = $this->getExtraClass( $el_class );
	if ( 'nivo' === $type ) {
		$type = ' wpb_slider_nivo theme-default';
		wp_enqueue_script( 'nivo-slider' );
		wp_enqueue_style( 'nivo-slider-css' );
		wp_enqueue_style( 'nivo-slider-theme' );

		$slides_wrap_start = '<div class="nivoSlider">';
		$slides_wrap_end = '</div>';
	} else if ( 'flexslider' === $type || 'flexslider_fade' === $type || 'flexslider_slide' === $type || 'fading' === $type ) {
		$el_start = '<li>';
		$el_end = '</li>';
		$slides_wrap_start = '<ul class="slides">';
		$slides_wrap_end = '</ul>';
//		wp_enqueue_style( 'flexslider' );
//		wp_enqueue_script( 'flexslider' );
	} else if ( 'image_grid' === $type ) {
		//wp_enqueue_script( 'vc_grid-js-imagesloaded' );
		//wp_enqueue_script( 'isotope' );

//		$el_start = '<li class="isotope-item">';
//		$el_end = '</li>';
//		$slides_wrap_start = '<ul class="wpb_image_grid_ul">';
//		$slides_wrap_end = '</ul>';

		$li_classes = '';
		if ($grayscale == 'yes') {
			$li_classes .= 'grayscale';
		} else {
			$li_classes .= 'no_grayscale';
		}

		$el_start = '<li class="' . $li_classes . '">';
		$el_end = '</li>';
		$slides_wrap_start = '<div class="gallery_holder"><ul class="gallery_inner ' . $images_space . '  v' . $column_number . '">';
		$slides_wrap_end = '</ul></div>';

	}

	if ( 'link_image' === $onclick ) {
		//wp_enqueue_script( 'prettyphoto' );
		//wp_enqueue_style( 'prettyphoto' );
	}

	$flex_fx = '';
	$frame_class = '';
	if ( 'flexslider' === $type || 'flexslider_fade' === $type || 'fading' === $type ) {
		$type = ' wpb_flexslider flexslider_fade flexslider';
		$flex_fx = ' data-flex_fx="fade"';
	} else if ( 'flexslider_slide' === $type ) {
		$type = ' wpb_flexslider flexslider_slide flexslider';
		$flex_fx = ' data-flex_fx="slide"';
		if ($frame == "use_frame") {
			$frame_class = " have_frame";

		}
	} else if ( 'image_grid' === $type ) {
		$type = ' wpb_image_grid';
	}

    $control_nav_data = '';
    if($control_nav !== ''){
        $control_nav_data .= 'data-control="'. ($control_nav == 'yes' ? 'true' : 'false').'"';
    }

    $direction_nav_data = '';
    if($direction_nav !== ''){
        $direction_nav_data .= 'data-direction="'. ($direction_nav == 'yes' ? 'true' : 'false').'"';
    }

    $pause_on_hover_data = '';
    if($pause_on_hover !== ''){
        $pause_on_hover_data .= 'data-pasue-on-hover="'. ($pause_on_hover == 'yes' ? 'true' : 'false').'"';
    }

    $drag_data = '';
    if($enable_drag !== ''){
        $drag_data .= 'data-drag="'. ($enable_drag == 'yes' ? 'true' : 'false').'"';
    }

    $additional_classes = '';
    if($control_nav == 'yes'){
        $additional_classes .= ' has_control_nav';
    }
    if($enable_drag == 'yes'){
        $additional_classes .= ' drag_enabled';
    }


	if ( '' === $images ) {
		$images = '-1,-2,-3';
	}

	$pretty_rel_random = ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';

	if ( 'custom_link' === $onclick ) {
		$custom_links = vc_value_from_safe( $custom_links );
		$custom_links = explode( ',', $custom_links );
	}

	switch ( $source ) {
		case 'media_library':
			$images = explode( ',', $images );
			break;

		case 'external_link':
			$images = vc_value_from_safe( $custom_srcs );
			$images = explode( ',', $images );
			break;
	}
	foreach ( $images as $i => $image ) {
		switch ( $source ) {
			case 'media_library':
				if ( $image > 0 ) {
					$img = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $img_size ) );
					$thumbnail = $img['thumbnail'];
					$large_img_src = $img['p_img_large'][0];
				} else {
					$large_img_src = $default_src;
					$thumbnail = '<img itemprop="image" src="' . $default_src . '" />';
				}
				break;

			case 'external_link':
				$image = esc_attr( $image );
				$dimensions = vcExtractDimensions( $external_img_size );
				$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';
				$thumbnail = '<img itemprop="image" ' . $hwstring . ' src="' . $image . '" />';
				$large_img_src = $image;
				break;
		}
		$hover_image = '';
		if ($type == ' wpb_image_grid' && $grayscale == 'no') {
			$hover_image = '<span class="gallery_hover"><i class="fa fa-search"></i></span>';
		}

		$link_start = $link_end = '';

		switch ( $onclick ) {
			case 'img_link_large':
				$link_start = '<a itemprop="url" href="' . $large_img_src . '" target="' . $custom_links_target . '">' . $hover_image;
				$link_end = '</a>';
				break;

			case 'link_image':
				$link_start = '<a itemprop="image" class="qode-prettyphoto" href="' . $large_img_src . '"' . $pretty_rel_random . '>' . $hover_image;
				$link_end = '</a>';
				break;

			case 'custom_link':
				if ( ! empty( $custom_links[ $i ] ) ) {
					$link_start = '<a itemprop="url" href="' . $custom_links[ $i ] . '"' . ( ! empty( $custom_links_target ) ? ' target="' . $custom_links_target . '"' : '' ) . '>'. $hover_image;
					$link_end = '</a>';
				}
				break;
		}

		$gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
	}

	$class_to_filter = 'wpb_gallery wpb_content_element vc_clearfix';
	$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

	if ($frame == 'use_frame') {

		$css_class .= " frame_holder";
		if ($choose_frame == "frame2") {
			$css_class .= " frame_holder2";
		}
	}


	$output = '';
	$output .= '<div class="' . $css_class . '">';
	$output .= '<div class="wpb_wrapper">';
	$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_gallery_heading' ) );
	$output .= '<div class="wpb_gallery_slides' . $additional_classes . $type . $frame_class . '" data-interval="' . $interval . '"' . $flex_fx . $control_nav_data . $direction_nav_data . $pause_on_hover_data . $drag_data. '>' . $slides_wrap_start . $gal_images . $slides_wrap_end . '</div>';
	if ($frame == 'use_frame') {
		$output .= "<div class='gallery_frame'>";
		if ($choose_frame == "frame2") {
			$output .= "<img itemprop='image' src='" . get_template_directory_uri() . "/img/slider_frame-2.png'/>";
		} else {
			$output .= "<img itemprop='image' src='" . get_template_directory_uri() . "/img/slider_frame.png'/>";
		}
		$output .= "</div>";
	}

	$output .= '</div>';
	$output .= '</div>';

	echo $output;


}else {
	$output = $title = $type = $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $interval = $column_number = '';
	extract(shortcode_atts(array(
		'title' => '',
		'type' => 'flexslider',
		'frame' => '',
        'enable_drag' => '',
		'direction_nav' => '',
		'control_nav' => '',
		'pause_on_hover' => '',
		'onclick' => 'link_image',
		'custom_links' => '',
		'custom_links_target' => '',
		'img_size' => 'full',
		'images' => '',
		'el_class' => '',
		'interval' => '5',
		'column_number' => '3',
		'grayscale' => 'no',
		'choose_frame' => 'no',
		'images_space' => 'gallery_without_space',
	), $atts));
	$gal_images = '';
	$link_start = '';
	$link_end = '';
	$el_start = '';
	$el_end = '';
	$slides_wrap_start = '';
	$slides_wrap_end = '';

	$el_class = $this->getExtraClass($el_class);

	if ($type == 'nivo') {
		$type = ' wpb_slider_nivo theme-default';
		wp_enqueue_script('nivo-slider');
		wp_enqueue_style('nivo-slider-css');
		wp_enqueue_style('nivo-slider-theme');

		$slides_wrap_start = '<div class="nivoSlider">';
		$slides_wrap_end = '</div>';
	} else if ($type == 'flexslider' || $type == 'flexslider_fade' || $type == 'flexslider_slide' || $type == 'fading') {
		$el_start = '<li>';
		$el_end = '</li>';
		$slides_wrap_start = '<ul class="slides">';
		$slides_wrap_end = '</ul>';
		//wp_enqueue_style('flexslider');
		// wp_enqueue_script('flexslider');
	} else if ($type == 'image_grid') {
		wp_enqueue_script('isotope');
		$li_classes = '';
		if ($grayscale == 'yes') {
			$li_classes .= 'grayscale';
		} else {
			$li_classes .= 'no_grayscale';
		}

		$el_start = '<li class="' . $li_classes . '">';
		$el_end = '</li>';
		$slides_wrap_start = '<div class="gallery_holder"><ul class="gallery_inner ' . $images_space . '  v' . $column_number . '">';
		$slides_wrap_end = '</ul></div>';
	}

	if ($onclick == 'link_image') {
		wp_enqueue_script('prettyphoto');
		wp_enqueue_style('prettyphoto');
	}

	$flex_fx = '';
	$frame_class = '';
	if ($type == 'flexslider' || $type == 'flexslider_fade' || $type == 'fading') {
		$type = ' wpb_flexslider flexslider_fade flexslider';
		$flex_fx = ' data-flex_fx="fade"';
	} else if ($type == 'flexslider_slide') {
		$type = ' wpb_flexslider flexslider_slide flexslider';
		$flex_fx = ' data-flex_fx="slide"';
		if ($frame == "use_frame") {
			$frame_class = " have_frame";

		}
	} else if ($type == 'image_grid') {
		$type = ' wpb_image_grid';
	}

    $control_nav_data = '';
    if($control_nav !== ''){
        $control_nav_data .= 'data-control="'. ($control_nav == 'yes' ? true : false).'"';
    }

    $direction_nav_data = '';
    if($direction_nav !== ''){
        $direction_nav_data .= 'data-direction="'. ($direction_nav == 'yes' ? true : false).'"';
    }

    $pause_on_hover_data = '';
    if($pause_on_hover !== ''){
        $pause_on_hover_data .= 'data-pasue-on-hover="'. ($pause_on_hover == 'yes' ? true : false).'"';
    }

    $drag_data = '';
    if($enable_drag !== ''){
        $drag_data .= 'data-drag="'. ($enable_drag == 'yes' ? 'true' : 'false').'"';
    }

    $additional_classes = '';
    if($control_nav == 'yes'){
        $additional_classes .= ' has_control_nav';
    }
    if($enable_drag == 'yes'){
        $additional_classes .= ' drag_enabled';
    }

    /*
     else if ( $type == 'fading' ) {
        $type = ' wpb_slider_fading';
        $el_start = '<li>';
        $el_end = '</li>';
        $slides_wrap_start = '<ul class="slides">';
        $slides_wrap_end = '</ul>';
        wp_enqueue_script( 'cycle' );
    }*/

//if ( $images == '' ) return null;
	if ($images == '') $images = '-1,-2,-3';

	$pretty_rel_random = ' rel="prettyPhoto[rel-' . rand() . ']"'; //rel-'.rand();

	if ($onclick == 'custom_link') {
		$custom_links = explode(',', $custom_links);
	}
	$images = explode(',', $images);
	$i = -1;

	foreach ($images as $attach_id) {
		$i++;
		if ($attach_id > 0) {
			$post_thumbnail = wpb_getImageBySize(array('attach_id' => $attach_id, 'thumb_size' => $img_size));
		} else {
			$different_kitten = 400 + $i;
			$post_thumbnail = array();
			$post_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/' . $different_kitten . '/300" />';
			$post_thumbnail['p_img_large'][0] = 'http://placekitten.com/g/1024/768';
		}

		$thumbnail = $post_thumbnail['thumbnail'];
		$p_img_large = $post_thumbnail['p_img_large'];
		$link_start = $link_end = '';
		$hover_image = '';

		if ($type == ' wpb_image_grid' && $grayscale == 'no') {
			$hover_image = '<span class="gallery_hover"><i class="fa fa-search"></i></span>';
		}

		if ($onclick == 'link_image') {
			$link_start = '<a itemprop="image" class="prettyphoto" href="' . $p_img_large[0] . '"' . $pretty_rel_random . '>' . $hover_image;
			$link_end = '</a>';
		} else if ($onclick == 'custom_link' && isset($custom_links[$i]) && $custom_links[$i] != '') {
			$link_start = '<a itemprop="url" href="' . $custom_links[$i] . '"' . (!empty($custom_links_target) ? ' target="' . $custom_links_target . '"' : '') . '>' . $hover_image;
			$link_end = '</a>';
		}
		$gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
	}
	$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gallery wpb_content_element' . $el_class . ' clearfix', $this->settings['base']);
	if ($frame == 'use_frame') {

		$css_class .= " frame_holder";
		if ($choose_frame == "frame2") {
			$css_class .= " frame_holder2";
		}
	}
	$output .= "\n\t" . '<div class="' . $css_class . '">';
	$output .= "\n\t\t" . '<div class="wpb_wrapper">';
	$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_gallery_heading'));
	$output .= '<div class="wpb_gallery_slides' . $additional_classes . $type . $frame_class . '" data-interval="' . $interval . '"' . $flex_fx . $control_nav_data . $direction_nav_data . $pause_on_hover_data . $drag_data .'>' . $slides_wrap_start . $gal_images . $slides_wrap_end;
	$output .= '</div>';
	if ($frame == 'use_frame') {

		$output .= "<div class='gallery_frame'>";
		if ($choose_frame == "frame2") {
			$output .= "<img itemprop='image' src='" . get_template_directory_uri() . "/img/slider_frame-2.png'/>";
		} else {
			$output .= "<img itemprop='image' src='" . get_template_directory_uri() . "/img/slider_frame.png'/>";
		}
		$output .= "</div>";
	}

	$output .= "\n\t\t" . '</div> ' . $this->endBlockComment('.wpb_wrapper');
	$output .= "\n\t" . '</div> ' . $this->endBlockComment('.wpb_gallery');

	echo $output;
}