<?php
$output = $el_class = $css = $el_id = $after_wrapper_open = $before_wrapper_close = '';
extract(shortcode_atts(array(
	'el_class' => '',
	'row_type' => 'row',
	'use_as_box' => '',
	'use_row_as_full_screen_section' => '',
	'type' => 'full_width',
	'expandable_content_top_padding'=>'',
    'header_style' => '',
	'parallax_content_width' => 'in_grid',
	'anchor' => '',
	'in_content_menu'=>'',
	'content_menu_title' => '',
	'content_menu_icon' => '',
	'angled_section' => '',
	'angled_section_direction' => '',
	'angled_section_position' => 'both',
	'video' => '',
	'video_overlay' => '',
	'video_overlay_image' => '',
	'video_webm' => '',
	'video_mp4' => '',
	'video_ogv' => '',
	'video_image' => '',
	'background_color' => '',
    'full_screen_section_height' => 'no',
    'vertically_align_content_in_middle' => 'no',
	'section_height' => '',
    'parallax_speed' => '1',
	'background_image' => '',
	'background_image_as_pattern' => 'without_pattern',
	'border_color' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'side_padding' => '',
	'row_negative_margin' => '',
	'parallax_side_padding' => '',
	'text_align' => is_rtl() ? 'right' : 'left',
	'more_button_label' =>'More Facts',
	'less_button_label'=>'Less Facts',
	'button_position'=>'center',
	'color'=>'',
	'hover_color'=>'',
	'content_background_color' => '',
	'css_animation'=>'',
	'transition_delay'=>'',
	'css' => '',
    'el_id' => ''
), $atts));

//wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
//wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row section vc_row-fluid '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if($type == "grid"){
	$css_class_type =  " grid_section";
} else {
	$css_class_type =  "";
}

if($type == "grid"){
	$css_class_type_inner =  " section_inner";
} else {
	$css_class_type_inner =  " full_section_inner";
}

$header_style_data = '';
if($header_style != ""){
    $header_style_data =  'data-q_header_style="'.$header_style.'"';
}

$css_class_video =  "";
if($video == "show_video"){
	$css_class_video =  " video_section";
}

$css_class_in_content_menu =  "";
if($in_content_menu == "in_content_menu"){
	$css_class_in_content_menu =  " in_content_menu";
}

$_image ="";
if($background_image != '' || $background_image != ' ') { 
	$_image = wp_get_attachment_image_src( $background_image, 'full');
}

$overlay_image ="";
if($video_overlay_image != '' && $video_overlay_image != ' ') { 
	$overlay_image = wp_get_attachment_image_src( $video_overlay_image, 'full');
}

if($css_animation != ""){
	$clsss_css_animation =  "  " . $css_animation;
} else {
	$clsss_css_animation =  "";
}
$delay = "";
if($transition_delay != ""){
	$delay = " style='transition-delay:" . $transition_delay . "ms; -webkit-animation-delay:" . $transition_delay . "ms; animation-delay:" . $transition_delay . "ms;'";
}
$anchor_id = "";
if($anchor != ""){
	$anchor_id = ' data-q_id="#'.$anchor.'"';
}

$menu_title = "";
if($content_menu_title != ""){
	$menu_title = ' data-q_title="'.$content_menu_title.'"';
}

$menu_icon = "";
if($content_menu_icon != ""){
	$menu_icon = ' data-q_icon="'.$content_menu_icon.'"';
}

$use_row_as_box_class="";
if($use_as_box == 'use_row_as_box'){
	$use_row_as_box_class = ' use_row_as_box';
}

$row_negative_margin_class="";
if($row_negative_margin == 'disable_negative_margin'){
	$row_negative_margin_class = ' disable_negative_margin';
}

$full_screen_section_class = "";
if($use_row_as_full_screen_section == "yes"){
	$full_screen_section_class = " full_screen_section";
}

if($angled_section == 'yes') {

	if($background_color != ""){
		$angled_section_style = 'style="fill:'.$background_color.';"';
	}
	else
		$angled_section_style = "";
}

$parallax_section_classes = '';
if($full_screen_section_height == 'yes'){
    $parallax_section_classes .=  ' qode_full_screen_height_parallax';

    if($vertically_align_content_in_middle == 'yes'){
        $parallax_section_classes .= ' qode_vertical_middle_align';

        $after_wrapper_open .= '<div class="parallax_content_outer">';
        $before_wrapper_close .= '</div>';
    }

}

$row_id = '';
if($el_id !== '') {
    $row_id = 'id="'.esc_attr($el_id).'"';
}

if($row_type == 'row') {
	$output .= '<div '.$row_id.' '.$anchor_id.' '.$menu_title.' '.$menu_icon.' '.$header_style_data.' class="' . $css_class . $css_class_type . $css_class_in_content_menu . $css_class_video . $use_row_as_box_class . $row_negative_margin_class  . $full_screen_section_class .'"';
	if($background_color != "" || $border_color != "" || $padding_top != "" || $padding_bottom != "" || $text_align != "" || $_image != ""){
			$output .= " style='";
				if($background_color != ""){
					$output .="background-color:".$background_color.";";
				}
				if($_image != ""){
					if($background_image_as_pattern != "without_pattern") {
						$output .="background-image: url(".$_image[0].");";
						$output .="background-repeat: repeat;";
						$output .="background-position: 0 0;";
						$output .="background-size: inherit;";
					} else {
						$output .="background-image:url(".$_image[0].");";
					}
				}
				if($border_color != ""){
					if($use_as_box == 'use_row_as_box') {
						$output .=" border: 1px solid ".$border_color.";";
					}else {
						$output .=" border-bottom: 1px solid ".$border_color.";";
					}
				}
				if($padding_top != ""){
					$output .=" padding-top:".$padding_top."px;";
				}
				if($padding_bottom != ""){
					$output .=" padding-bottom:".$padding_bottom."px;";
				}
				$output .= ' text-align:' . $text_align . ';';
				$output.="'";
		}
	$output.=">";

	if($angled_section == 'yes' && $angled_section_position != 'bottom') {
		$output .= '<svg class="angled-section svg-top" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">';
		if($angled_section_direction == 'from_left_to_right'){
			$output .= '<polygon points="0,0 0,86 86,86" ' . $angled_section_style . ' />';
		}
		if($angled_section_direction == 'from_right_to_left'){
			$output .= '<polygon points="0,86 86,0 86,86" ' . $angled_section_style . ' />';
		}
		$output .= '</svg>';
	}

	if($video == "show_video"){
		$v_image = wp_get_attachment_url($video_image);
		$v_overlay_image = wp_get_attachment_url($video_overlay_image);

		if($use_row_as_full_screen_section == "yes"){
			$output .= '<div class="video-overlay';
							if($video_overlay == "show_video_overlay"){
								$output .= ' active';
							}
							$output .= '"';
							$output .= ($overlay_image !== '' && $overlay_image !== ' ') ? " style='background-image:url(" . $overlay_image[0] . ");'" : '';
							$output .= '></div><div class="video-wrap">';
			$output .= '<video class="full_screen_sections_video" width="1920" height="800" poster="'.$v_image.'" controls="controls" preload="auto" loop autoplay muted>';
							if(!empty($video_webm)) { $output .= '<source type="video/webm" src="'.$video_webm.'">'; }
							if(!empty($video_mp4)) { $output .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
							if(!empty($video_ogv)) { $output .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
							$output .='<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/js/flashmediaelement.swf">
										<param name="movie" value="'.get_template_directory_uri().'/js/flashmediaelement.swf" />
										<param name="flashvars" value="controls=true&file='.$video_mp4.'" />
										<img itemprop="image" src="'.$v_image.'" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
								</object>
						</video>
						</div>';
		} else {
		
			$output .= '<div class="mobile-video-image" style="background-image: url('.$v_image.')"></div><div class="video-overlay';
								if($video_overlay == "show_video_overlay"){
									$output .= ' active';
								}
								$output .= '"';
								$output .= ($overlay_image !== '' && $overlay_image !== ' ') ? " style='background-image:url(" . $overlay_image[0] . ");'" : '';
								$output .= '></div><div class="video-wrap">
									
									<video class="video" width="1920" height="800" poster="'.$v_image.'" controls="controls" preload="auto" loop autoplay muted>';
											if(!empty($video_webm)) { $output .= '<source type="video/webm" src="'.$video_webm.'">'; }
											if(!empty($video_mp4)) { $output .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
											if(!empty($video_ogv)) { $output .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
										 $output .='<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/js/flashmediaelement.swf">
													<param name="movie" value="'.get_template_directory_uri().'/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&file='.$video_mp4.'" />
													<img itemprop="image" src="'.$v_image.'" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
											</object>
									</video>		
							</div>';
		}					
	}
	$output .= '<div class="' . $css_class_type_inner . ' clearfix"';
	if($side_padding != ""){
			$output .= " style='padding: 0% ".$side_padding."%'";
		}
	$output .= '>';
	if($type == "grid"){
		$output .= "<div class='section_inner_margin clearfix'>";
	}
	if($row_type == "row" && $css_animation != ""){
		$output .= '<div class="'. $clsss_css_animation .'"><div'. $delay .'>';
	}
}else if($row_type == 'parallax'){
    $output .='<section '.$row_id.' '.$anchor_id.' '.$menu_title.' '.$menu_icon.' '.$header_style_data.' data-speed="'. $parallax_speed .'" class="parallax_section_holder '.$el_class.' '.$parallax_section_classes.$css_class_in_content_menu.'" style = "';
    $output .= ($section_height !='' || $section_height!=' ') ? ' height:' . $section_height . 'px;' : '';
    $output .= ($background_image !== '' || $background_image !== ' ') ? " background-image:url('" . $_image[0] . "');" : "";
    $output .= '"';
    $output .= '>';
    $output .= $after_wrapper_open;
	if($parallax_content_width == "full_width"){
		$parallax_padding = "";
		if($parallax_side_padding != ""){
			$parallax_padding .= " style='padding: 0% ".$parallax_side_padding."%'";
		}
		$output .='<div class="parallax_content_full_width ' . $text_align . '" '. $parallax_padding .'>';
	}else{
		$output .='<div class="parallax_content ' . $text_align . '">';
	}
	$output .= "<div class='parallax_section_inner_margin clearfix'>";

}else if($row_type == 'expandable') {
	$output .= '<div '.$row_id.' '.$anchor_id.' '.$menu_title.' '.$menu_icon.' '.$header_style_data.' class="' . $css_class . $css_class_in_content_menu .'"';
	if($text_align != ""){
			$output .= " style='";
				$output .= ' text-align:' . $text_align . ';';
				$output.="'";
		}
	$output.=">";
	$output .= '<div class="more_facts_holder"';
	if($background_color != ""){
		$output .= " style='";
		if($background_color != ""){
			$output .= "background-color: ".$background_color.";";
		}
		$output .= "'";
	}
	$output .= '>';
	$output .= '<div class="more_facts_button_holder ' . $button_position . '">';
	$output .= '<span class="more_facts_button" data-color="'. $color . '" data-hovercolor="'. $hover_color . '" data-morefacts="'. $more_button_label .'" data-lessfacts="'. $less_button_label . '"';
	if($color != ""){
		$output .= " style='";
		if($color != ""){
			$output .= " color: ".$color.";";
		}
		$output .= "'";
	}
	$output .='><span class="more_facts_button_text">'. $more_button_label .'</span><span class="more_facts_button_arrow"><i class="fa fa-angle-down"></i> </span></span>';
	$output .= '</div>';

	$output .= '<div class="more_facts_outer">';
	$output .= '<div class="more_facts_inner_holder"';
	$output .= '><div class="more_facts_inner" data-expandable_content_top_padding="'. $expandable_content_top_padding . '">';

} else if($row_type == 'content_menu'){
    $output .= '<nav '.$row_id.' class="content_menu"';
    if($background_color != ""){
        $output .= " style='background-color:".$background_color.";'";
    }
    $output .= '>';
    $output .= "<div class='nav_select_menu clearfix'><div class='nav_select_button'><i class='fa fa-bars'></i></div></div>";
}
if($row_type != 'content_menu'){
	$output .= wpb_js_remove_wpautop($content);
}
if($row_type == 'row') {
	if($css_animation != "") { 
		$output .= '</div></div>';
	}
		if($type == "grid"){
			$output .= "</div>";
		}
		$output .= '</div>';

	if($angled_section == 'yes' && $angled_section_position != 'top') {
		$output .= '<svg class="angled-section svg-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">';
		if($angled_section_direction == 'from_left_to_right'){
			$output .= '<polygon points="0,0 86,0 86,86" ' . $angled_section_style . ' />';
		}
		if($angled_section_direction == 'from_right_to_left'){
			$output .= '<polygon points="0,0 0,86 86,0" ' . $angled_section_style . ' />';
		}
		$output .= '</svg>';
	}

	$output .= '</div>'.$this->endBlockComment('row');
}elseif($row_type == 'parallax'){
	$output .= '</div></div>';
    $output .= $before_wrapper_close;
    $output .= '</section>'.$this->endBlockComment('row');
	
}elseif($row_type == 'expandable'){
	$output .= '</div></div></div></div></div>'.$this->endBlockComment('row');
}else if($row_type == 'content_menu'){
	$output .= '</nav>';
}
echo $output;