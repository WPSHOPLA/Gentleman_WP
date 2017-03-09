<?php 
global $qode_options_proya;
/* Set id on -1 beacause archive page id can have same id as some post and settings is not good */
if(is_category() || is_tag() || is_author()){
	$archive_id = $id;
	$id = -1;
}

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
    $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_proya['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_proya['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_proya['title_image'];
}
$title_image_height = "";
$title_image_width = "";
if(!empty($title_image)){
	$title_image_url_obj = parse_url($title_image);
  if (file_exists($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']))
		list($title_image_width, $title_image_height, $title_image_type, $title_image_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']);
}

if(get_post_meta($id, "qode_title-overlay-image", true) != ""){
 $title_overlay_image = get_post_meta($id, "qode_title-overlay-image", true);
}else{
	$title_overlay_image = $qode_options_proya['title_overlay_image'];
}

//is header some of sticky types and initially hidden
$is_header_initially_hidden = false;
if(isset($qode_options_proya['header_bottom_appearance']) && ($qode_options_proya['header_bottom_appearance'] == "stick" || $qode_options_proya['header_bottom_appearance'] == "stick menu_bottom" || $qode_options_proya['header_bottom_appearance'] == "stick_with_left_right_menu")){
	if(get_post_meta($id, "qode_page_hide_initial_sticky", true) !== "") {
		if(get_post_meta($id, "qode_page_hide_initial_sticky", true) === "yes") {
				$is_header_initially_hidden = true;
		}
	} else if(isset($qode_options_proya['hide_initial_sticky']) && $qode_options_proya['hide_initial_sticky'] == 'yes'){
		$is_header_initially_hidden = true;
	}
}


$header_height_padding = 0;
if (!empty($qode_options_proya['header_height'])) {
	$header_height = $qode_options_proya['header_height'];
} else {
	$header_height = 100;
}
if (isset($qode_options_proya['header_bottom_border_color']) && !empty($qode_options_proya['header_bottom_border_color'])) {
	$header_height = $header_height + 1;
}
if($qode_options_proya['header_bottom_appearance'] == 'stick menu_bottom'){
	$menu_bottom = '46';
	if(is_active_sidebar('header_fixed_right')){
		$menu_bottom = $menu_bottom + 22;
	}
} else {
	$menu_bottom = 0;
}
$nav_font_size = 7;
if(isset($qode_options_proya['menu_fontsize']) && $qode_options_proya['menu_fontsize'] != ""){
	$nav_font_size = $qode_options_proya['menu_fontsize'] / 2;
}
$header_top = 0;
if(isset($qode_options_proya['header_top_area']) && $qode_options_proya['header_top_area'] == "yes"){
	$header_top = 33;
}
$header_height_padding = $header_height + $menu_bottom + $header_top;
if ((isset($qode_options_proya['center_logo_image']) && $qode_options_proya['center_logo_image'] == "yes") || $qode_options_proya['header_bottom_appearance'] == 'fixed_hiding') {
    if(isset($qode_options_proya['logo_image'])){
                $logo_width = 0;
                $logo_height = 0;
                if (!empty($qode_options_proya['logo_image'])) {
                    $logo_url_obj = parse_url($qode_options_proya['logo_image']);
                    list($logo_width, $logo_height, $logo_type, $logo_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path']);
                }
            }
    if($qode_options_proya['header_bottom_appearance'] == 'stick menu_bottom'){
        $header_height_padding = $logo_height + 30 + $menu_bottom + $header_top; // 30 is top and bottom margin of centered logo
    } else if($qode_options_proya['header_bottom_appearance'] == 'fixed_hiding'){
        $header_height_padding = $logo_height/2 + 40 + $header_height + $header_top; // 40 is top and bottom margin of centered logo
    } else {
        $header_height_padding = $logo_height + 30 + $header_height + $header_top; // 30 is top and bottom margin of centered logo
    }
}

if($qode_options_proya['header_bottom_appearance'] == 'fixed_top_header' || $is_header_initially_hidden){ // because this header type never goes over slider, title or content (content top margin is 0, title padding is 0)
	
	$title_height = 100;
	if(get_post_meta($id, "qode_title-height", true) != ""){
		$title_height = get_post_meta($id, "qode_title-height", true);
	}else if($qode_options_proya['title_height'] != ''){
		$title_height = $qode_options_proya['title_height'];
	}
} else {

	$title_height = 100;
	if(get_post_meta($id, "qode_title-height", true) != ""){
		$title_height = get_post_meta($id, "qode_title-height", true);
	}else if($qode_options_proya['title_height'] != ''){
		$title_height = $qode_options_proya['title_height'];
	}else {
		if (isset($qode_options_proya['center_logo_image']) && $qode_options_proya['center_logo_image'] == "yes") {
			if($qode_options_proya['header_bottom_appearance'] == 'stick menu_bottom'){
				$title_height = $title_height + $logo_height + 30 + $menu_bottom + $header_top; // 30 is top and bottom margin of centered logo
			} else {
				$title_height = $header_height + $title_height + $logo_height + 30 + $header_top; // 30 is top and bottom margin of centered logo
			}
			
		} else {
			$title_height = $title_height + $header_height + $menu_bottom + $header_top;

		 }
	}
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_proya['fixed_title_image'];
}

$title_background_color = '';
if(get_post_meta($id, "qode_page-title-background-color", true) != ""){
 $title_background_color = get_post_meta($id, "qode_page-title-background-color", true);
}else{
	$title_background_color = $qode_options_proya['title_background_color'];
}

$show_title_image = true;
if(get_post_meta($id, "qode_show-page-title-image", true) == 'yes') {
	$show_title_image = false;
}
$qode_page_title_style = "standard";
if(get_post_meta($id, "qode_page_title_style", true) != ""){
	$qode_page_title_style = get_post_meta($id, "qode_page_title_style", true);
}else{
	if(isset($qode_options_proya['title_style'])) {
		$qode_page_title_style = $qode_options_proya['title_style'];
	} else {
		$qode_page_title_style = "standard";
	}
}

$animate_title_area = '';
if(get_post_meta($id, "qode_animate-page-title", true) != ""){
	$animate_title_area = get_post_meta($id, "qode_animate-page-title", true);
}else{
	$animate_title_area = $qode_options_proya['animate_title_area'];
}

if($animate_title_area == "text_right_left") {
	$animate_title_class = "animate_title_text";
} elseif($animate_title_area == "area_top_bottom"){
	$animate_title_class = "animate_title_area";
} else {
	$animate_title_class = "title_without_animation";
}

$page_title_fontsize = '';
if(get_post_meta($id, "qode_page_title_font_size", true) != ""){
	$page_title_fontsize = "title_size_" . get_post_meta($id, "qode_page_title_font_size", true);
}else{
	if(isset($qode_options_proya['predefined_title_sizes'])) {
		$page_title_fontsize = "title_size_" . $qode_options_proya['predefined_title_sizes'];
	}
}


$page_title_border_bottom_in_grid = false;
$page_title_border_bottom_in_grid_class = '';

if(isset($qode_options_proya['border_bottom_title_area']) && isset($qode_options_proya['border_bottom_in_grid_title_area']) && $qode_options_proya['border_bottom_in_grid_title_area'] == "yes" && $qode_options_proya['border_bottom_title_area'] == "yes") {
	$page_title_border_bottom_in_grid = true;
	$page_title_border_bottom_in_grid_class = " title_bottom_border_in_grid";
}


//init variables
$title_subtitle_padding 	= '';
$header_transparency 		= '';
$is_header_transparent  	= false;
$transparent_values_array 	= array('0.00', '0');
$solid_values_array			= array('', '1');
$header_bottom_border		= '';
$is_title_angled_enabled	= false;

//is header transparent not set on current page?
if(get_post_meta($id, "qode_header_color_transparency_per_page", true) === "") {
	//take global value set in Qode Options
	$header_transparency = $qode_options_proya['header_background_transparency_initial'];
} else {
	//take value set for current page
	$header_transparency = get_post_meta($id, "qode_header_color_transparency_per_page", true);
}

//is border bottom color for header set in Qode Options?
if(isset($qode_options_proya['header_bottom_border_color']) && !empty($qode_options_proya['header_bottom_border_color'])) {
	$header_bottom_border = $qode_options_proya['header_bottom_border_color'];
}

//is header completely transparent?
$is_header_transparent 	= in_array($header_transparency, $transparent_values_array);

//is header solid?
$is_header_solid		= in_array($header_transparency, $solid_values_array);


if($qode_options_proya['header_bottom_appearance'] == 'fixed_top_header' || $is_header_initially_hidden || qode_is_content_below_header()){  // because this header type never goes over slider, title or content (content top margin is 0, title padding is 0)

	$title_holder_height = 'style="padding-top:0;height:' . $title_height . 'px;"';
	$title_subtitle_padding = 'style="padding-top:0;"';
	
} else {

	//is header solid?
	if($is_header_solid) {
		$title_holder_height = 'style="padding-top:' . $header_height_padding . 'px;height:' . ($title_height - $header_height_padding) . 'px;"';
		$title_subtitle_padding = 'style="padding-top:' . $header_height_padding . 'px;"';
	} else {

		//is border for header bottom set?
		if ($header_bottom_border != '') {

			//center title between header and end of title section
			$title_holder_height = 'style="padding-top:' . $header_height_padding . 'px;height:' . ($title_height - $header_height_padding) . 'px;"';
			$title_subtitle_padding = 'style="padding-top:' . $header_height_padding . 'px;"';
		} else {

			//is header semi-transparent?
			if(!$is_header_transparent) {
				//center title between border and end of title section
				$title_holder_height = 'style="padding-top:' . $header_height_padding . 'px;height:' . ($title_height - $header_height_padding) . 'px;"';
				$title_subtitle_padding = 'style="padding-top:' . $header_height_padding . 'px;"';
			} else {
				//header is transparent. Center it between main menu item's text beginning and end of title section
				$title_holder_height = 'style="padding-top:'.(($header_height/2 - $nav_font_size) + $header_top) .'px;height:' . ($title_height - ($header_height/2 - $nav_font_size + $header_top)) . 'px;"';
				$title_subtitle_padding = 'style="padding-top:'.(($header_height/2 - $nav_font_size) + $header_top) .'px;"';
			}
		}
	}

}

//is title angled enabled
if(get_post_meta($id, "qode_enable_page_title_angled", true) == 'yes') {
	$is_title_angled_enabled = true;
} elseif(get_post_meta($id, "qode_enable_page_title_angled", true) == 'no') {
	$is_title_angled_enabled = false;
} elseif(get_post_meta($id, "qode_enable_page_title_angled", true) == '' && (isset($qode_options_proya['enable_title_angled']) && $qode_options_proya['enable_title_angled'] == 'yes')) {
	$is_title_angled_enabled = true;
} elseif(get_post_meta($id, "qode_enable_page_title_angled", true) == '' && (isset($qode_options_proya['enable_title_angled']) && $qode_options_proya['enable_title_angled'] == 'no')) {
	$is_title_angled_enabled = false;
} elseif(isset($qode_options_proya['enable_title_angled']) && $qode_options_proya['enable_title_angled'] == 'yes') {
	$is_title_angled_enabled = true;
}

//title angled background color
$title_angled_background_color = '';
if(get_post_meta($id, "qode_title_angled_section_color", true) != ""){
	$title_angled_background_color = esc_attr(get_post_meta($id, "qode_title_angled_section_color", true));
}else{
	if(isset($qode_options_proya['title_angled_section_color'])) {
		$title_angled_background_color = esc_attr($qode_options_proya['title_angled_section_color']);
	}
}


//title angled position
$title_angled_position = '';
if(get_post_meta($id, "qode_title_angled_section_direction", true) == 'from_left_to_right') {
	$title_angled_position = 'from_left_to_right';
}elseif(get_post_meta($id, "qode_title_angled_section_direction", true) == 'from_right_to_left') {
	$title_angled_position = 'from_right_to_left';
}elseif(get_post_meta($id, "qode_title_angled_section_direction", true) == '' && (isset($qode_options_proya['title_angled_section_direction']) && $qode_options_proya['title_angled_section_direction'] == 'from_left_to_right')) {
	$title_angled_position = 'from_left_to_right';
} elseif(get_post_meta($id, "qode_title_angled_section_direction", true) == '' && (isset($qode_options_proya['title_angled_section_direction']) && $qode_options_proya['title_angled_section_direction'] == 'from_right_to_left')) {
	$title_angled_position = 'from_right_to_left';
}

//is vertical menu activated in Qode Options?
if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] =='yes'){
	$title_subtitle_padding = 0;
	$title_holder_height = 100;
	$title_height = 100;
	if(get_post_meta($id, "qode_title-height", true) != ""){
		$title_holder_height = get_post_meta($id, "qode_title-height", true);
		$title_height = get_post_meta($id, "qode_title-height", true);
	}else if($qode_options_proya['title_height'] != ''){
		$title_holder_height = $qode_options_proya['title_height'];
		$title_height = $qode_options_proya['title_height'];
	}

}

$page_title_position = 'left';
$separator_title_position = 'left';
if(get_post_meta($id, "qode_page_title_position", true) != ""){
	$page_title_position = " position_" . get_post_meta($id, "qode_page_title_position", true);
	$separator_title_position = get_post_meta($id, "qode_page_title_position", true);
}else{
	$page_title_position = " position_" . $qode_options_proya['page_title_position'];
	$separator_title_position = $qode_options_proya['page_title_position'];
}

$enable_breadcrumbs = 'no';
if(get_post_meta($id, "qode_enable_breadcrumbs", true) != ""){
	$enable_breadcrumbs = get_post_meta($id, "qode_enable_breadcrumbs", true);
}elseif(isset($qode_options_proya['enable_breadcrumbs'])){
	$enable_breadcrumbs = $qode_options_proya['enable_breadcrumbs'];
}

$title_text_shadow = '';
if(get_post_meta($id, "qode_title_text_shadow", true) != ""){
	if(get_post_meta($id, "qode_title_text_shadow", true) == "yes"){
		$title_text_shadow = ' title_text_shadow';
	}
}else{
	if($qode_options_proya['title_text_shadow'] == "yes"){
		$title_text_shadow = ' title_text_shadow';
	}
}
$subtitle_color ="";
if(get_post_meta($id, "qode_page_subtitle_color", true) != ""){
	$subtitle_color = " style='color:" . get_post_meta($id, "qode_page_subtitle_color", true) . "';";
} else {
	$subtitle_color = "";
}

$text_above_title_color = array();
if(get_post_meta($id, "qode_page_text_above_title_color", true) != ""){
	$text_above_title_color[] = 'color:' . get_post_meta($id, "qode_page_text_above_title_color", true);
}

$separator_color ="";
if(get_post_meta($id, "qode_title_separator_color", true) != ""){
	$separator_color = " style='background-color:" . get_post_meta($id, "qode_title_separator_color", true) . "';";
} else {
	$separator_color = "";
}
$title_separator = "yes";
if(get_post_meta($id, "qode_separator_bellow_title", true)){
	$title_separator = get_post_meta($id, "qode_separator_bellow_title", true);
} elseif(isset($qode_options_proya['title_separator'])) {
	$title_separator = $qode_options_proya['title_separator'];
}

//SCROLL ANIMATIONS
//Whole Title Content Animation
$title_content_animation = 'no';
if (get_post_meta($id, 'page_page_title_whole_content_animations', true) !== '') {
	$title_content_animation = get_post_meta($id, 'page_page_title_whole_content_animations', true);
}
elseif (get_post_meta($id, 'page_page_title_whole_content_animations', true) == '' && isset($qode_options_proya['page_title_whole_content_animations']) && $qode_options_proya['page_title_whole_content_animations'] !== '') {
	$title_content_animation = $qode_options_proya['page_title_whole_content_animations'];
}

$page_title_content_animation_data = '';
if ($title_content_animation == 'yes') {

	$page_title_content_data_start = '0';
	$page_title_content_start_custom_style = 'opacity:1';
	$page_title_content_data_end = '300';
	$page_title_content_end_custom_style = 'opacity:0';

	if (get_post_meta($id, 'page_page_title_whole_content_data_start', true) == '' && isset($qode_options_proya['page_title_whole_content_data_start']) && $qode_options_proya['page_title_whole_content_data_start'] !== '') {
		$page_title_content_data_start = $qode_options_proya['page_title_whole_content_data_start'];
	} elseif (get_post_meta($id, 'page_page_title_whole_content_data_start', true) !== '') {
		$page_title_content_data_start = get_post_meta($id, 'page_page_title_whole_content_data_start', true);
	}

	if (get_post_meta($id, 'page_page_title_whole_content_start_custom_style', true) == '' && isset($qode_options_proya['page_title_whole_content_start_custom_style']) && $qode_options_proya['page_title_whole_content_start_custom_style'] !== '') {
		$page_title_content_start_custom_style = $qode_options_proya['page_title_whole_content_start_custom_style'];
	} elseif (get_post_meta($id, 'page_page_title_whole_content_start_custom_style', true) !== '') {
		$page_title_content_start_custom_style = get_post_meta($id, 'page_page_title_whole_content_start_custom_style', true);
	}

	if (get_post_meta($id, 'page_page_title_whole_content_data_end', true) == '' && isset($qode_options_proya['page_title_whole_content_data_end']) && $qode_options_proya['page_title_whole_content_data_end'] !== '') {
		$page_title_content_data_end = $qode_options_proya['page_title_whole_content_data_end'];
	} elseif (get_post_meta($id, 'page_page_title_whole_content_data_end', true) !== '') {
		$page_title_content_data_end = get_post_meta($id, 'page_page_title_whole_content_data_end', true);
	}

	if (get_post_meta($id, 'page_page_title_whole_content_end_custom_style', true) == '' && isset($qode_options_proya['page_title_whole_content_end_custom_style']) && $qode_options_proya['page_title_whole_content_end_custom_style'] !== '') {
		$page_title_content_end_custom_style = $qode_options_proya['page_title_whole_content_end_custom_style'];
	} elseif (get_post_meta($id, 'page_page_title_whole_content_end_custom_style', true) !== '') {
		$page_title_content_end_custom_style = get_post_meta($id, 'page_page_title_whole_content_end_custom_style', true);
	}

	$page_title_content_animation_data = ' data-'.$page_title_content_data_start.'="'.$page_title_content_start_custom_style.'" data-'.$page_title_content_data_end.'="'.$page_title_content_end_custom_style.'"';
}

//Title Scroll Animation
$title_animation = 'no';
if (get_post_meta($id, 'page_page_title_animations', true) !== '') {
	$title_animation = get_post_meta($id, 'page_page_title_animations', true);
}
elseif (get_post_meta($id, 'page_page_title_animations', true) == '' && isset($qode_options_proya['page_title_animations']) && $qode_options_proya['page_title_animations'] !== '') {
	$title_animation = $qode_options_proya['page_title_animations'];
}

$page_title_animation_data = "";
if($title_animation == 'yes') {

	$page_title_data_start = '0';
	$page_title_start_custom_style = 'opacity:1';
	$page_title_data_end = '300';
	$page_title_end_custom_style = 'opacity:0';

	if(get_post_meta($id, 'page_page_title_data_start', true) == '' && isset($qode_options_proya['page_title_data_start']) && $qode_options_proya['page_title_data_start'] !== '') {
		$page_title_data_start = $qode_options_proya['page_title_data_start'];
	} elseif(get_post_meta($id, 'page_page_title_data_start', true) !== '') {
		$page_title_data_start = get_post_meta($id, 'page_page_title_data_start', true);
	}

	if(get_post_meta($id, 'page_page_title_start_custom_style', true) == '' && isset($qode_options_proya['page_title_start_custom_style']) && $qode_options_proya['page_title_start_custom_style'] !== '') {
		$page_title_start_custom_style = $qode_options_proya['page_title_start_custom_style'];
	} elseif(get_post_meta($id, 'page_page_title_start_custom_style', true) !== '') {
		$page_title_start_custom_style = get_post_meta($id, 'page_page_title_start_custom_style', true);
	}

	if(get_post_meta($id, 'page_page_title_data_end', true) == '' && isset($qode_options_proya['page_title_data_end']) && $qode_options_proya['page_title_data_end'] !== '') {
		$page_title_data_end = $qode_options_proya['page_title_data_end'];
	} elseif(get_post_meta($id, 'page_page_title_data_end', true) !== '') {
		$page_title_data_end = get_post_meta($id, 'page_page_title_data_end', true);
	}

	if(get_post_meta($id, 'page_page_title_end_custom_style', true) == '' && isset($qode_options_proya['page_title_end_custom_style']) && $qode_options_proya['page_title_end_custom_style'] !== '') {
		$page_title_end_custom_style = $qode_options_proya['page_title_end_custom_style'];
	} elseif(get_post_meta($id, 'page_page_title_end_custom_style', true) !== '') {
		$page_title_end_custom_style = get_post_meta($id, 'page_page_title_end_custom_style', true);
	}

	$page_title_animation_data = ' data-'.$page_title_data_start.'="'.$page_title_start_custom_style.'" data-'.$page_title_data_end.'="'.$page_title_end_custom_style.'"';
}

//Separator scroll animation
$separator_animation = 'no';
if (get_post_meta($id, 'page_page_title_separator_animations', true) !== '') {
	$separator_animation = get_post_meta($id, 'page_page_title_separator_animations', true);
}
elseif(isset($qode_options_proya['page_title_separator_animations']) && $qode_options_proya['page_title_separator_animations'] !== '') {
	$separator_animation = $qode_options_proya['page_title_separator_animations'];
}

$page_title_separator_animation_data = "";
if($separator_animation == 'yes') {

	$page_title_separator_data_start = '0';
	$page_title_separator_start_custom_style = 'opacity:1';
	$page_title_separator_data_end = '300';
	$page_title_separator_end_custom_style = 'opacity:0';

	if(get_post_meta($id, 'page_page_title_separator_data_start', true) == '' && isset($qode_options_proya['page_title_separator_data_start']) && $qode_options_proya['page_title_separator_data_start'] !== '') {
		$page_title_separator_data_start = $qode_options_proya['page_title_separator_data_start'];
	} elseif (get_post_meta($id, 'page_page_title_separator_data_start', true) !== '') {
		$page_title_separator_data_start = get_post_meta($id, 'page_page_title_separator_data_start', true);
	}

	if(get_post_meta($id, 'page_page_title_separator_start_custom_style', true) == '' && isset($qode_options_proya['page_title_separator_start_custom_style']) && $qode_options_proya['page_title_separator_start_custom_style'] !== '') {
		$page_title_separator_start_custom_style = $qode_options_proya['page_title_separator_start_custom_style'];
	} elseif (get_post_meta($id, 'page_page_title_separator_start_custom_style', true) !== '') {
		$page_title_separator_start_custom_style = get_post_meta($id, 'page_page_title_separator_start_custom_style', true);
	}

	if(get_post_meta($id, 'page_page_title_separator_data_end', true) == '' && isset($qode_options_proya['page_title_separator_data_end']) && $qode_options_proya['page_title_separator_data_end'] !== '') {
		$page_title_separator_data_end = $qode_options_proya['page_title_separator_data_end'];
	} elseif (get_post_meta($id, 'page_page_title_separator_data_end', true) !== '') {
		$page_title_separator_data_end = get_post_meta($id, 'page_page_title_separator_data_end', true);
	}

	if(get_post_meta($id, 'page_page_title_separator_end_custom_style', true) == '' && isset($qode_options_proya['page_title_separator_end_custom_style']) && $qode_options_proya['page_title_separator_end_custom_style'] !== '') {
		$page_title_separator_end_custom_style = $qode_options_proya['page_title_separator_end_custom_style'];
	} elseif (get_post_meta($id, 'page_page_title_separator_end_custom_style', true) !== '') {
		$page_title_separator_end_custom_style = get_post_meta($id, 'page_page_title_separator_end_custom_style', true);
	}

	$page_title_separator_animation_data = ' data-'.$page_title_separator_data_start.'="'.$page_title_separator_start_custom_style.'" data-'.$page_title_separator_data_end.'="'.$page_title_separator_end_custom_style.'"';
}

//Subtitle scroll animation
$subtitle_animation = 'no';
if (get_post_meta($id, 'page_page_subtitle_animations', true) !== '') {
	$subtitle_animation = get_post_meta($id, 'page_page_subtitle_animations', true);
}
elseif (isset($qode_options_proya['page_subtitle_animations']) && $qode_options_proya['page_subtitle_animations'] !== '') {
	$subtitle_animation = $qode_options_proya['page_subtitle_animations'];
}

$page_subtitle_animation_data = "";
if ($subtitle_animation == 'yes') {

	$page_subtitle_data_start = '0';
	$page_subtitle_start_custom_style = 'opacity:1';
	$page_subtitle_data_end = '300';
	$page_subtitle_end_custom_style = 'opacity:0';

	if(get_post_meta($id, 'page_page_subtitle_data_start', true) == '' && isset($qode_options_proya['page_subtitle_data_start']) && ($qode_options_proya['page_subtitle_data_start'] !== '')) {
		$page_subtitle_data_start = $qode_options_proya['page_subtitle_data_start'];
	} elseif (get_post_meta($id, 'page_page_subtitle_data_start', true) !== '') {
		$page_subtitle_data_start = get_post_meta($id, 'page_page_subtitle_data_start', true);
	}

	if(get_post_meta($id, 'page_page_subtitle_start_custom_style', true) == '' && isset($qode_options_proya['page_subtitle_start_custom_style']) && ($qode_options_proya['page_subtitle_start_custom_style'] !== '')) {
		$page_subtitle_start_custom_style = $qode_options_proya['page_subtitle_start_custom_style'];
	} elseif (get_post_meta($id, 'page_page_subtitle_start_custom_style', true) !== '') {
		$page_subtitle_start_custom_style = get_post_meta($id, 'page_page_subtitle_start_custom_style', true);
	}

	if(get_post_meta($id, 'page_page_subtitle_data_end', true) == '' && isset($qode_options_proya['page_subtitle_data_end']) && ($qode_options_proya['page_subtitle_data_end'] !== '')) {
		$page_subtitle_data_end = $qode_options_proya['page_subtitle_data_end'];
	} elseif (get_post_meta($id, 'page_page_subtitle_data_end', true) !== '') {
		$page_subtitle_data_end = get_post_meta($id, 'page_page_subtitle_data_end', true);
	}

	if(get_post_meta($id, 'page_page_subtitle_end_custom_style', true) == '' && isset($qode_options_proya['page_subtitle_end_custom_style']) && ($qode_options_proya['page_subtitle_end_custom_style'] !== '')) {
		$page_subtitle_end_custom_style = $qode_options_proya['page_subtitle_end_custom_style'];
	} elseif (get_post_meta($id, 'page_page_subtitle_end_custom_style', true) !== '') {
		$page_subtitle_end_custom_style = get_post_meta($id, 'page_page_subtitle_end_custom_style', true);
	}

	$page_subtitle_animation_data = ' data-'.$page_subtitle_data_start.'="'.$page_subtitle_start_custom_style.'" data-'.$page_subtitle_data_end.'="'.$page_subtitle_end_custom_style.'"';

}

//Breadcrumbs scroll animation
$breadcrumbs_animation = 'no';
if (get_post_meta($id, 'page_page_title_breadcrumbs_animations', true) !== '') {
	$breadcrumbs_animation = get_post_meta($id, 'page_page_title_breadcrumbs_animations', true);
}
elseif (get_post_meta($id, 'page_page_title_breadcrumbs_animations', true) == '' && isset($qode_options_proya['page_title_breadcrumbs_animations']) && $qode_options_proya['page_title_breadcrumbs_animations'] !== '') {
	$breadcrumbs_animation = $qode_options_proya['page_title_breadcrumbs_animations'];
}

$page_title_breadcrumbs_animation_data = '';
if($enable_breadcrumbs == 'yes' && $breadcrumbs_animation == 'yes') {

	$page_title_breadcrumbs_data_start = '0';
	$page_title_breadcrumbs_start_custom_style = 'opacity:1';
	$page_title_breadcrumbs_data_end = '300';
	$page_title_breadcrumbs_end_custom_style = 'opacity:0';

	if(get_post_meta($id, 'page_page_title_breadcrumbs_data_start', true) == '' && isset($qode_options_proya['page_title_breadcrumbs_data_start']) && ($qode_options_proya['page_title_breadcrumbs_data_start'] !== '')) {
		$page_title_breadcrumbs_data_start = $qode_options_proya['page_title_breadcrumbs_data_start'];
	} elseif (get_post_meta($id, 'page_page_title_breadcrumbs_data_start', true) !== '') {
		$page_title_breadcrumbs_data_start = get_post_meta($id, 'page_page_title_breadcrumbs_data_start', true);
	}

	if(get_post_meta($id, 'page_page_title_breadcrumbs_start_custom_style', true) == '' && isset($qode_options_proya['page_title_breadcrumbs_start_custom_style']) && ($qode_options_proya['page_title_breadcrumbs_start_custom_style'] !== '')) {
		$page_title_breadcrumbs_start_custom_style = $qode_options_proya['page_title_breadcrumbs_start_custom_style'];
	} elseif (get_post_meta($id, 'page_page_title_breadcrumbs_start_custom_style', true) !== '') {
		$page_title_breadcrumbs_start_custom_style = get_post_meta($id, 'page_page_title_breadcrumbs_start_custom_style', true);
	}

	if(get_post_meta($id, 'page_page_title_breadcrumbs_data_end', true) == '' && isset($qode_options_proya['page_title_breadcrumbs_data_end']) && ($qode_options_proya['page_title_breadcrumbs_data_end'] !== '')) {
		$page_title_breadcrumbs_data_end = $qode_options_proya['page_title_breadcrumbs_data_end'];
	} elseif (get_post_meta($id, 'page_page_title_breadcrumbs_data_end', true) !== '') {
		$page_title_breadcrumbs_data_end = get_post_meta($id, 'page_page_title_breadcrumbs_data_end', true);
	}

	if(get_post_meta($id, 'page_page_title_breadcrumbs_end_custom_style', true) == '' && isset($qode_options_proya['page_title_breadcrumbs_end_custom_style']) && ($qode_options_proya['page_title_breadcrumbs_end_custom_style'] !== '')) {
		$page_title_breadcrumbs_end_custom_style = $qode_options_proya['page_title_breadcrumbs_end_custom_style'];
	} elseif (get_post_meta($id, 'page_page_title_breadcrumbs_end_custom_style', true) !== '') {
		$page_title_breadcrumbs_end_custom_style = get_post_meta($id, 'page_page_title_breadcrumbs_end_custom_style', true);
	}

	$page_title_breadcrumbs_animation_data = ' data-'.$page_title_breadcrumbs_data_start.'="'.$page_title_breadcrumbs_start_custom_style.'" data-'.$page_title_breadcrumbs_data_end.'="'.$page_title_breadcrumbs_end_custom_style.'"';
}

$animation = '';
if($title_content_animation == 'yes' || $title_animation == 'yes' || $separator_animation == 'yes' || $subtitle_animation == 'yes' || $breadcrumbs_animation == 'yes') {
	$animation = 'data-animation="yes"';
}

if(!qode_is_title_hidden()) { ?>
	<div class="title_outer <?php echo $animate_title_class.$title_text_shadow; if($responsive_title_image == 'yes' && $show_title_image == true){ echo ' with_image'; }?>"  <?php print $animation; ?>  <?php echo 'data-height="'.$title_height.'"'; if($title_height != '' && $animate_title_area == 'area_top_bottom'){ echo 'style="opacity:0;height:' . $header_height_padding .'px;"'; } ?>>
		<div class="title <?php echo $page_title_fontsize . " " . $page_title_position . " " . $page_title_border_bottom_in_grid_class; if($responsive_title_image == 'no' && $title_image != "" && ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") && $show_title_image == true){ echo ' has_fixed_background '; if($fixed_title_image == "yes_zoom"){ echo 'zoom_out '; } } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true){ echo ' has_background'; }  ?>" style="<?php if($responsive_title_image == 'no' && $title_image != "" && $show_title_image == true){ if($title_image_width != ''){ echo 'background-size:'.$title_image_width.'px auto;'; } echo 'background-image:url('.$title_image.');';  } if($title_height != ''){ echo 'height:'.$title_height.'px;'; } if($title_background_color != ''){ echo 'background-color:'.$title_background_color.';'; } ?>">
			<div class="image <?php if($responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true){ echo "responsive"; }else{ echo "not_responsive"; } ?>"><?php if($title_image != ""){ ?><img itemprop="image" src="<?php echo $title_image; ?>" alt="&nbsp;" /> <?php } ?></div>
			<?php if($title_overlay_image != ""){ ?>
				<div class="title_overlay" style="background-image:url('<?php echo $title_overlay_image; ?>');"></div>
			<?php } ?>
			<?php if(!qode_is_title_text_hidden()) { ?>
				<div class="title_holder" <?php print $page_title_content_animation_data; ?> <?php if($responsive_title_image != 'yes' && get_post_meta($id, "qode_show-page-title-image", true) == ""){ echo $title_holder_height; }?>>
					<div class="container">
						<div class="container_inner clearfix">
								<div class="title_subtitle_holder" <?php if($responsive_title_image == 'yes' && $show_title_image == true){ echo $title_subtitle_padding; }?>>
                                <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?><div class="overlapping_content_margin"><?php } ?>
                                <?php if(($responsive_title_image == 'yes' && $show_title_image == true) || ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") || ($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true)){ ?>
									<div class="title_subtitle_holder_inner">
								<?php } ?>
									<?php if(get_post_meta($id, "qode_page_text_above_title", true) != ""){ ?>
										<span class="text_above_title" <?php echo qode_get_inline_style($text_above_title_color); ?>><?php echo get_post_meta($id, "qode_page_text_above_title", true); ?></span>
									<?php } ?>
									<h1 <?php print $page_title_animation_data; if(get_post_meta($id, "qode_page-title-color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page-title-color", true) ?>" <?php } ?>><span><?php qode_title_text(); ?></span></h1>
									<?php if($title_separator == "yes"){ ?>
										<span class="separator small <?php echo $separator_title_position; ?>" <?php echo $separator_color; ?> <?php print $page_title_separator_animation_data; ?>></span>
									<?php } ?>
								
									<?php if(get_post_meta($id, "qode_page_subtitle", true) != ""){ ?>
										<?php if(get_post_meta($id, "qode_page_title_font_size", true) == "large") { ?>
											<h4 class="subtitle" <?php print $page_subtitle_animation_data; ?> <?php echo $subtitle_color; ?>><?php echo get_post_meta($id, "qode_page_subtitle", true); ?></h4>
										<?php } else { ?>
											<span class="subtitle" <?php print $page_subtitle_animation_data; ?> <?php echo $subtitle_color; ?>><?php echo get_post_meta($id, "qode_page_subtitle", true); ?></span>
										<?php } ?>
									<?php } ?>
									<?php if (function_exists('qode_custom_breadcrumbs') && $enable_breadcrumbs == "yes") { ?>
										<div class="breadcrumb" <?php print $page_title_breadcrumbs_animation_data; ?>> <?php qode_custom_breadcrumbs(); ?></div>
									<?php } ?>
								<?php if(($responsive_title_image == 'yes' && $show_title_image == true)  || ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") || ($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true)){ ?>
									</div>
								<?php } ?>
                                <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?></div><?php } ?>
                            </div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if ($is_title_angled_enabled)     { ?>
				<svg class="angled-section svg-title-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">
					<?php if($title_angled_position == 'from_left_to_right'){ ?>
						<polygon style="fill: <?php echo esc_attr($title_angled_background_color); ?>;" points="0,0 0,86 86,86" />
					<?php }
					if($title_angled_position == 'from_right_to_left'){ ?>
						<polygon style="fill: <?php echo esc_attr($title_angled_background_color); ?>;" points="0,86 86,0 86,86" />
					<?php } ?>
				</svg>
			<?php } ?>
		</div>
		<?php if($page_title_border_bottom_in_grid){ ?>
			<div class="title_border_in_grid_holder"></div>
		<?php } ?>
	</div>
<?php } ?>
<?php
	/* Return id for archive pages */
	if(is_category() || is_tag() || is_author()){
		$id = $archive_id;
	}
?>