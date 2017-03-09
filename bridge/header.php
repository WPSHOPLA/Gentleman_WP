<?php global $qode_options_proya, $wp_query, $qode_toolbar, $qodeIconCollections; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
		echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
	} ?>

	<title><?php wp_title(''); ?></title>

	<?php
	/**
	 * qode_header_meta hook
	 *
	 * @see qode_header_meta() - hooked with 10
	 * @see qode_user_scalable_meta() - hooked with 10
	 */
	do_action('qode_header_meta');
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($qode_options_proya['favicon_image']); ?>">
	<link rel="apple-touch-icon" href="<?php echo esc_url($qode_options_proya['favicon_image']); ?>"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<?php
		$loading_animation = true;
		if (isset($qode_options_proya['loading_animation'])){ if($qode_options_proya['loading_animation'] == "off") { $loading_animation = false; }};

		if (isset($qode_options_proya['loading_image']) && $qode_options_proya['loading_image'] != ""){ $loading_image = $qode_options_proya['loading_image'];}else{ $loading_image =  ""; }
	?>
	<?php if($loading_animation){ ?>
		<div class="ajax_loader"><div class="ajax_loader_1"><?php if($loading_image != ""){ ?><div class="ajax_loader_2"><img itemprop="image" src="<?php echo $loading_image; ?>" alt="" /></div><?php } else{ qode_loading_spinners(); } ?></div></div>
	<?php } ?>
	<?php
		$enable_side_area = "yes";
		if (isset($qode_options_proya['enable_side_area'])){ if($qode_options_proya['enable_side_area'] == "no") { $enable_side_area = "no"; }};

        $enable_popup_menu = "no";
        if (isset($qode_options_proya['enable_popup_menu'])){
            if($qode_options_proya['enable_popup_menu'] == "yes" && has_nav_menu('popup-navigation')) {
                $enable_popup_menu = "yes";
            }
            if (isset($qode_options_proya['popup_menu_animation_style']) && !empty($qode_options_proya['popup_menu_animation_style'])) {
                $popup_menu_animation_style = 'qode_'.$qode_options_proya['popup_menu_animation_style'];
            }
        };
		
		$enable_fullscreen_search="no";
		if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == "yes" && isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "fullscreen_search" ){ 
			$enable_fullscreen_search="yes";
		}

		$fullscreen_search_animation="fade";
		if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "fullscreen_search" && isset($qode_options_proya['search_animation']) && $qode_options_proya['search_animation'] !== "" ){ 
			$fullscreen_search_animation = $qode_options_proya['search_animation'];
		}
		
		$enable_vertical_menu = false;
		if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] =='yes'){
			$enable_vertical_menu = true;
		}

        $header_button_size = '';
        if(isset($qode_options_proya['header_buttons_size'])){
            $header_button_size = $qode_options_proya['header_buttons_size'];
        }
	?>
	<?php if($enable_side_area == "yes" && $enable_popup_menu == 'no') {
		//generate side area classes
		$side_area_classes = '';

		if(isset($qode_options_proya['side_area_close_icon_style']) && $qode_options_proya['side_area_close_icon_style'] != '') {
			$side_area_classes .= $qode_options_proya['side_area_close_icon_style'];
		}
		if (isset($qode_options_proya['side_area_alignment']) && ($qode_options_proya['side_area_alignment'] !== '')) {
			$side_area_classes .= " side_area_alignment_" . $qode_options_proya['side_area_alignment'];
		}
	?>
		<section class="side_menu right <?php echo $side_area_classes; ?>">
            <?php if(isset($qode_options_proya['side_area_title']) && $qode_options_proya['side_area_title'] != "") { ?>
                <div class="side_menu_title">
                    <h5><?php echo $qode_options_proya['side_area_title'] ?></h5>
                </div>
            <?php } ?>
            <a href="#" target="_self" class="close_side_menu"></a>
			<?php dynamic_sidebar('sidearea'); ?>
		</section>
	<?php } ?>
	<?php if(isset($qode_toolbar)) include("toolbar_examples.php") ?>
	<div class="wrapper">
	<div class="wrapper_inner">
	<!-- Google Analytics start -->
	<?php if (isset($qode_options_proya['google_analytics_code'])){
				if($qode_options_proya['google_analytics_code'] != "") {
	?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $qode_options_proya['google_analytics_code']; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php }
		}
	?>
	<!-- Google Analytics end -->

<?php

$paspartu_header_alignment = false;
if(isset($qode_options_proya['paspartu_header_alignment']) && $qode_options_proya['paspartu_header_alignment'] == 'yes' && isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){$paspartu_header_alignment = true;}

$header_in_grid = true;
if((isset($qode_options_proya['header_in_grid']) && $qode_options_proya['header_in_grid'] == "no") || $paspartu_header_alignment){ $header_in_grid = false; }

	$menu_position = "right";
	if(isset($qode_options_proya['menu_position']) && $qode_options_proya['menu_position'] !== ''){$menu_position = $qode_options_proya['menu_position']; }

	$centered_logo = false;
	if (isset($qode_options_proya['center_logo_image'])){ if($qode_options_proya['center_logo_image'] == "yes") { $centered_logo = true; }};

    $centered_logo_animate = false;
    if (isset($qode_options_proya['center_logo_image_animate'])){ if($qode_options_proya['center_logo_image_animate'] == "yes") { $centered_logo_animate = true; }};

    if(isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] == "fixed_hiding"){
        $centered_logo = true;
        $centered_logo_animate = true;
    }

$display_header_top = "yes";
	if(isset($qode_options_proya['header_top_area'])){
		$display_header_top = $qode_options_proya['header_top_area'];
	}
	if (!empty($_SESSION['qode_proya_header_top'])){
		$display_header_top = $_SESSION['qode_proya_header_top'];
	}
	$header_top_area_scroll = "no";
	if(isset($qode_options_proya['header_top_area_scroll']))
		$header_top_area_scroll = $qode_options_proya['header_top_area_scroll'];
	if (!empty($_SESSION['qode_header_top'])) {
		if ($_SESSION['qode_header_top'] == "no")
			$header_top_area_scroll = "no";
		if ($_SESSION['qode_header_top'] == "yes")
			$header_top_area_scroll = "yes";
	}
	global $wp_query;
	$id = $wp_query->get_queried_object_id();
	$is_woocommerce=false;
	if(function_exists("is_woocommerce")) {
		$is_woocommerce = is_woocommerce();
		if($is_woocommerce){
			$id = get_option('woocommerce_shop_page_id');
		}
	}
	$header_style = "";
	if(get_post_meta($id, "qode_header-style", true) != ""){
		$header_style = get_post_meta($id, "qode_header-style", true);
	}else if(isset($qode_options_proya['header_style'])){
		$header_style = $qode_options_proya['header_style'];
	}

	$header_color_transparency_per_page = "";
	if($qode_options_proya['header_background_transparency_initial'] != "") {
		$header_color_transparency_per_page = $qode_options_proya['header_background_transparency_initial'];
	}
	if(get_post_meta($id, "qode_header_color_transparency_per_page", true) != ""){
		$header_color_transparency_per_page = get_post_meta($id, "qode_header_color_transparency_per_page", true);
	}

	$header_color_per_page = "style='";
	if(get_post_meta($id, "qode_header_color_per_page", true) != ""){
		if($header_color_transparency_per_page != ""){
			$header_background_color = qode_hex2rgb(get_post_meta($id, "qode_header_color_per_page", true));
			$header_color_per_page .= " background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
		}else{
			$header_color_per_page .= " background-color:" . get_post_meta($id, "qode_header_color_per_page", true) . ";";
		}
	} else if($header_color_transparency_per_page != "" && get_post_meta($id, "qode_header_color_per_page", true) == ""){
		$header_background_color = $qode_options_proya['header_background_color'] ? qode_hex2rgb($qode_options_proya['header_background_color']) : qode_hex2rgb("#ffffff");
		$header_color_per_page .= " background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}

	$header_top_color_per_page = "style='";
	if(get_post_meta($id, "qode_header_color_per_page", true) != ""){
		if($header_color_transparency_per_page != ""){
			$header_background_color = qode_hex2rgb(get_post_meta($id, "qode_header_color_per_page", true));
			$header_top_color_per_page .= "background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
		}else{
			$header_top_color_per_page .= "background-color:" . get_post_meta($id, "qode_header_color_per_page", true) . ";";
		}
	} else if($header_color_transparency_per_page != "" && get_post_meta($id, "qode_header_color_per_page", true) == ""){
        $header_background_color = $qode_options_proya['header_top_background_color'] ? qode_hex2rgb($qode_options_proya['header_top_background_color']) : qode_hex2rgb("#ffffff");
		$header_top_color_per_page .= "background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}
	$header_separator = qode_hex2rgb("#eaeaea");
	if(isset($qode_options_proya['header_separator_color']) && $qode_options_proya['header_separator_color'] != ""){
		$header_separator = qode_hex2rgb($qode_options_proya['header_separator_color']);
	}

	$header_color_per_page .="'";
	$header_top_color_per_page .="'";

    //generate header classes based on qode options
    $header_classes = '';
    if(is_active_sidebar('woocommerce_dropdown')) {
        $header_classes .= 'has_woocommerce_dropdown ';
    }

    if($display_header_top == "yes") {
        $header_classes .= ' has_top';
    }

    if($header_top_area_scroll == "yes") {
        $header_classes .= ' scroll_top';
    }

    if($centered_logo) {
        $header_classes .= ' centered_logo';
    }

    if($centered_logo_animate){
        $header_classes .= ' centered_logo_animate';
    }

    if(is_active_sidebar('header_fixed_right')) {
        $header_classes .= ' has_header_fixed_right';
    }

    if($qode_options_proya['header_top_area_scroll'] == 'no') {
        $header_classes .= ' scroll_header_top_area';
    }

    if(get_post_meta($id, "qode_header-style", true) != ""){
        $header_classes .= ' '.get_post_meta($id, "qode_header-style", true);
    } else if(isset($qode_options_proya['header_style'])){
        $header_classes .= ' '.$qode_options_proya['header_style'];
    }

    $header_bottom_appearance = 'fixed';
    if(isset($qode_options_proya['header_bottom_appearance'])){
        $header_classes .= ' '.$qode_options_proya['header_bottom_appearance'];
        $header_bottom_appearance = $qode_options_proya['header_bottom_appearance'];
    } else {
        $header_classes .= ' fixed';
    }

    $per_page_header_transparency = get_post_meta($id, 'qode_header_color_transparency_per_page', true);
	$header_transparency = '';

	if($per_page_header_transparency !== '') {
		$header_transparency = $per_page_header_transparency;
	} else {
		$header_transparency = $qode_options_proya['header_background_transparency_initial'];
	}

	$is_header_transparent  	= false;
	$transparent_values_array 	= array('0.00', '0');
    $sticky_headers_array       = array('stick','stick menu_bottom','stick_with_left_right_menu','stick compound');
    $fixed_headers_array        = array('fixed','fixed fixed_minimal','fixed_hiding','fixed_top_header');

	//is header transparent not set on current page?
	if(get_post_meta($id, "qode_header_color_transparency_per_page", true) === "" || get_post_meta($id, "qode_header_color_transparency_per_page", true) === false) {
		//take global value set in Qode Options
		$transparent_header = $qode_options_proya['header_background_transparency_initial'];
	} else {
		//take value set for current page
		$transparent_header = get_post_meta($id, "qode_header_color_transparency_per_page", true);
	}

	//is header completely transparent?
	$is_header_transparent 	= in_array($transparent_header, $transparent_values_array);
	if($is_header_transparent) {
        $header_classes .= ' transparent';
    }
	
	//is header transparent on scrolled window?
	if(isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] !== 'regular' &&
        ((!in_array($qode_options_proya['header_background_transparency_sticky'], $transparent_values_array) && in_array($qode_options_proya['header_bottom_appearance'], $sticky_headers_array)) ||
            (!in_array($qode_options_proya['header_background_transparency_scroll'], $transparent_values_array) && in_array($qode_options_proya['header_bottom_appearance'], $fixed_headers_array)))) {
		$header_classes .= ' scrolled_not_transparent';
	}

	$header_with_border = isset($qode_options_proya['header_bottom_border_color']) && $qode_options_proya['header_bottom_border_color'] != '';
	if($header_with_border) {
		$header_classes .= ' with_border';
	}

	//check if first level hover background color is set
	$has_first_lvl_bg_color = isset($qode_options_proya['menu_hover_background_color']) && $qode_options_proya['menu_hover_background_color'] !== '';
	if($has_first_lvl_bg_color) {
		$header_classes .= ' with_hover_bg_color';
	}

    if(isset($qode_options_proya['paspartu_header_alignment']) && $qode_options_proya['paspartu_header_alignment'] == 'yes' && isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){
        $header_classes .= ' paspartu_header_alignment';
    }

    if(isset($qode_options_proya['paspartu_header_inside']) && $qode_options_proya['paspartu_header_inside'] == 'yes' && isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){
        $header_classes .= ' paspartu_header_inside';
    }

    $vertical_area_background_image = "";
    if(isset($qode_options_proya['vertical_area_background_image']) && $qode_options_proya['vertical_area_background_image'] != "") {
        $vertical_area_background_image = $qode_options_proya['vertical_area_background_image'];
    }
    if(get_post_meta($id, "qode_page_vertical_area_background_image", true) != ""){
        $vertical_area_background_image = get_post_meta($id, "qode_page_vertical_area_background_image", true);
    }

    if(get_post_meta($id, "qode_header-style-on-scroll", true) != ""){
        if(get_post_meta($id, "qode_header-style-on-scroll", true) == "yes") {
            $header_classes .= ' header_style_on_scroll';
        }
    } else if(isset($qode_options_proya['enable_header_style_on_scroll']) && $qode_options_proya['enable_header_style_on_scroll'] == 'yes'){
        $header_classes .= ' header_style_on_scroll';
    }

    if($menu_position == 'left' && in_array($header_bottom_appearance, array('regular','fixed','stick'))){
        $header_classes .= ' menu_position_left';
    }
	
    if(qode_is_ajax_header_animation_enabled()){
        $header_classes .= ' ajax_header_animation';
    }

	$logo_height = 0;
	if(isset($qode_options_proya['logo_image'])){
		if (!empty($qode_options_proya['logo_image'])) {
			$logo_url_obj = parse_url($qode_options_proya['logo_image']);
			if (file_exists($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path'])) {
				list($logo_width, $logo_height, $logo_type, $logo_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path']);
			}
		}
	}
	
	$enable_search_left_sidearea_right = false;
	if(isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] =='fixed_hiding'){
		if(isset($qode_options_proya['search_left_sidearea_right']) && $qode_options_proya['search_left_sidearea_right'] =='yes'){
			$enable_search_left_sidearea_right = true;
		}
	}else{
		if(isset($qode_options_proya['search_left_sidearea_right_regular']) && $qode_options_proya['search_left_sidearea_right_regular'] =='yes'){
			$enable_search_left_sidearea_right = true;
		}
	}

    $overlapping_content = false;
    if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes'){
        $overlapping_content = true;
    }
	
?>
	<?php if($enable_vertical_menu) { ?>
		<?php
			$vertical_menu_style = "toggle";
			$vertical_area_scroll = "";
			if(isset($qode_options_proya['vertical_area_submenu_opening_type']) && $qode_options_proya['vertical_area_submenu_opening_type'] != "") {
				switch ($qode_options_proya['vertical_area_submenu_opening_type']) {
					case 'on_click':
						$vertical_menu_style = "on_click";
						break;
					case 'float':
						$vertical_menu_style = "float";
						break;					
					default:
						$vertical_menu_style = "toggle";
						break;
				}
			}
			if ($vertical_menu_style !== 'float') {
				$vertical_area_scroll = " with_scroll";
			}

            $page_vertical_area_background = "";
            if(get_post_meta($id, "qode_page_vertical_area_background", true) != ""){
                $page_vertical_area_background = 'style="background-color:'.get_post_meta($id, "qode_page_vertical_area_background", true).';"';
            }

            $vertically_center_content = '';
            if(qode_options()->getOptionValue('vertical_area_vertically_center_content') == 'yes'){
                $vertically_center_content = 'vertically_center_content';
            }
		?>
		<aside class="vertical_menu_area<?php echo $vertical_area_scroll; ?> <?php echo $header_style; ?> <?php echo esc_attr($vertically_center_content); ?>" <?php echo $page_vertical_area_background; ?>>
			<div class="vertical_menu_area_inner">
				<?php if(isset($qode_options_proya['vertical_area_type']) && $qode_options_proya['vertical_area_type'] == 'hidden') { ?>
					<a href="#" class="vertical_menu_hidden_button">
						<span class="vertical_menu_hidden_button_line"></span>
					</a>
				<?php } ?>

				<div class="vertical_area_background" <?php if($vertical_area_background_image != ""){ echo 'style="background-image:url('.$vertical_area_background_image.');"'; } ?>></div>

				<div class="vertical_logo_wrapper">
					<?php
					if (isset($qode_options_proya['logo_image']) && $qode_options_proya['logo_image'] != ""){ $logo_image = $qode_options_proya['logo_image'];}else{ $logo_image =  get_template_directory_uri().'/img/logo.png'; };
					if (isset($qode_options_proya['logo_image_light']) && $qode_options_proya['logo_image_light'] != ""){ $logo_image_light = $qode_options_proya['logo_image_light'];}else{ $logo_image_light =  get_template_directory_uri().'/img/logo.png'; };
					if (isset($qode_options_proya['logo_image_dark']) && $qode_options_proya['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_proya['logo_image_dark'];}else{ $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png'; };

					?>
					<div class="q_logo_vertical">
						<a itemprop="url" href="<?php echo home_url('/'); ?>">
							<img itemprop="image" class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/>
							<img itemprop="image" class="light" src="<?php echo $logo_image_light; ?>" alt="Logo"/>
							<img itemprop="image" class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/>
						</a>
					</div>

				</div>

				<nav class="vertical_menu dropdown_animation vertical_menu_<?php echo $vertical_menu_style; ?>">
					<?php

					wp_nav_menu( array( 'theme_location' => 'top-navigation' ,
						'container'  => '',
						'container_class' => '',
						'menu_class' => '',
						'menu_id' => '',
						'fallback_cb' => 'top_navigation_fallback',
						'link_before' => '<span>',
						'link_after' => '</span>',
						'walker' => new qode_type1_walker_nav_menu()
					));
					?>
				</nav>
				<div class="vertical_menu_area_widget_holder">
					<?php dynamic_sidebar('vertical_menu_area'); ?>
				</div>
			</div>
		</aside>
		<?php if((isset($qode_options_proya['vertical_area_type']) && ($qode_options_proya['vertical_area_type'] == 'hidden')) &&
			(isset($qode_options_proya['vertical_logo_bottom']) && $qode_options_proya['vertical_logo_bottom'] !== '')) { ?>
			<div class="vertical_menu_area_bottom_logo">
				<div class="vertical_menu_area_bottom_logo_inner">
					<a href="javascript: void(0)">
						<img itemprop="image" src="<?php echo esc_url($qode_options_proya['vertical_logo_bottom']); ?>" alt="vertical_menu_area_bottom_logo"/>
					</a>
				</div>
			</div>
		<?php } ?>
	<?php } ?>

<?php if(!$enable_vertical_menu){ ?>

<?php if($header_bottom_appearance == "regular" || $header_bottom_appearance == "fixed" || $header_bottom_appearance == "fixed_hiding" || $header_bottom_appearance == "stick" || $header_bottom_appearance == "stick menu_bottom" || $header_bottom_appearance == "stick_with_left_right_menu"){ ?>

<header class="<?php echo $header_classes; ?> page_header">
    <div class="header_inner clearfix">

	<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == "yes"){ ?>
	
		<?php if(($header_color_transparency_per_page == '' || $header_color_transparency_per_page == '1') && isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "search_slides_from_header_bottom"){ ?>
			<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_2" method="get">
				<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
                    <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
					 <?php } ?>
						<div class="form_holder_outer">
							<div class="form_holder">
								<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
								<a class="qode_search_submit" href="javascript:void(0)">
                                    <?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
								</a>
							</div>
						</div>
						<?php if($header_in_grid){ ?>
                        <?php if($overlapping_content) {?></div><?php } ?>
					</div>
				</div>
			<?php } ?>
			</form>

		<?php } else if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "search_covers_header") { ?>
			<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_3" method="get">
					<?php if($header_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
                        <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
					<?php } ?>
							<div class="form_holder_outer">
								<div class="form_holder">
									
									<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
									<div class="qode_search_close">
										<a href="#">
                                            <?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack')); ?>
										</a>
									</div>
								</div>
							</div>
					<?php if($header_in_grid){ ?>
                        <?php if($overlapping_content) {?></div><?php } ?>
						</div>
					</div>
					<?php } ?>
			</form>
		<?php } else { ?>
			<form role="search" id="searchform" action="<?php echo home_url('/'); ?>" class="qode_search_form" method="get">
				<?php if($header_in_grid){ ?>
					<div class="container">
					<div class="container_inner clearfix">
				<?php } ?>

                <?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack'), array('icon_attributes' => array('class' => 'qode_icon_in_search'))); ?>
				<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
				<input type="submit" value="Search" />

				<div class="qode_search_close">
					<a href="#">
                        <?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack'), array('icon_attributes' => array('class' => 'qode_icon_in_search'))); ?>
					</a>
				</div>
				<?php if($header_in_grid){ ?>
						</div>
					</div>
				<?php } ?>
			</form>
		<?php } ?>
		
	<?php } ?>
	<div class="header_top_bottom_holder">
	<?php if($display_header_top == "yes"){ ?>
		<div class="header_top clearfix" <?php echo $header_top_color_per_page; ?> >
			<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
                    <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
			<?php } ?>
					<div class="left">
						<div class="inner">
						<?php
							dynamic_sidebar('header_left');
						?>
						</div>
					</div>
					<div class="right">
						<div class="inner">
						<?php
							dynamic_sidebar('header_right');
						?>
						</div>
					</div>
				<?php if($header_in_grid){ ?>
                    <?php if($overlapping_content) {?></div><?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="header_bottom clearfix" <?php echo $header_color_per_page; ?> >
		    <?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
                    <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
			<?php } ?>
                <?php if($header_bottom_appearance == "stick_with_left_right_menu") { ?>
                    <nav class="main_menu drop_down left_side">
                        <?php
                        wp_nav_menu( array( 'theme_location' => 'left-top-navigation' ,
                            'container'  => '',
                            'container_class' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'fallback_cb' => 'top_navigation_fallback',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'walker' => new qode_type1_walker_nav_menu()
                        ));
                        ?>
                    </nav>
                <?php } ?>
					<div class="header_inner_left">
                        <?php if($centered_logo && $header_bottom_appearance !== "stick menu_bottom") {
                            dynamic_sidebar( 'header_left_from_logo' );
                        } ?>
						<?php if(qode_is_main_menu_set()) { ?>
							<div class="mobile_menu_button">
                                <span>
                                    <?php echo qode_get_mobile_menu_icon_html(); ?>
                                </span>
                            </div>
						<?php } ?>
						<div class="logo_wrapper">
                            <?php
							if (isset($qode_options_proya['logo_image']) && $qode_options_proya['logo_image'] != ""){ $logo_image = $qode_options_proya['logo_image'];}else{ $logo_image =  get_template_directory_uri().'/img/logo.png'; };
							if (isset($qode_options_proya['logo_image_light']) && $qode_options_proya['logo_image_light'] != ""){ $logo_image_light = $qode_options_proya['logo_image_light'];}else{ $logo_image_light =  get_template_directory_uri().'/img/logo.png'; };
							if (isset($qode_options_proya['logo_image_dark']) && $qode_options_proya['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_proya['logo_image_dark'];}else{ $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png'; };
							if (isset($qode_options_proya['logo_image_sticky']) && $qode_options_proya['logo_image_sticky'] != ""){ $logo_image_sticky = $qode_options_proya['logo_image_sticky'];}else{ $logo_image_sticky =  get_template_directory_uri().'/img/logo_black.png'; };
                            if (isset($qode_options_proya['logo_image_popup']) && $qode_options_proya['logo_image_popup'] != ""){ $logo_image_popup = $qode_options_proya['logo_image_popup'];}else{ $logo_image_popup =  get_template_directory_uri().'/img/logo_white.png'; };
                            if (isset($qode_options_proya['logo_image_fixed_hidden']) && $qode_options_proya['logo_image_fixed_hidden'] != ""){ $logo_image_fixed_hidden = $qode_options_proya['logo_image_fixed_hidden'];}else{ $logo_image_fixed_hidden =  get_template_directory_uri().'/img/logo.png'; };
							if (isset($qode_options_proya['logo_image_mobile']) && $qode_options_proya['logo_image_mobile'] != ""){
								$logo_image_mobile = $qode_options_proya['logo_image_mobile'];
							}else{
								$logo_image_mobile = $logo_image;
							}

							?>
							<div class="q_logo">
								<a itemprop="url" href="<?php echo home_url('/'); ?>">
									<img itemprop="image" class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/>
									<img itemprop="image" class="light" src="<?php echo $logo_image_light; ?>" alt="Logo"/>
									<img itemprop="image" class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/>
									<img itemprop="image" class="sticky" src="<?php echo $logo_image_sticky; ?>" alt="Logo"/>
									<img itemprop="image" class="mobile" src="<?php echo $logo_image_mobile; ?>" alt="Logo"/>
									<?php if($enable_popup_menu == 'yes'){ ?>
										<img itemprop="image" class="popup" src="<?php echo $logo_image_popup; ?>" alt="Logo"/>
									<?php } ?>
								</a>
							</div>
                            <?php if($header_bottom_appearance == "fixed_hiding") { ?>
                            <div class="q_logo_hidden"><a itemprop="url" href="<?php echo home_url('/'); ?>"><img itemprop="image" alt="Logo" src="<?php echo $logo_image_fixed_hidden; ?>" style="height: 100%;"></a></div>
                            <?php } ?>
						</div>
                        <?php if($header_bottom_appearance == "stick menu_bottom" && is_active_sidebar('header_fixed_right')){ ?>
                            <div class="header_fixed_right_area">
                                <?php dynamic_sidebar('header_fixed_right'); ?>
                            </div>
                        <?php } ?>
                        <?php if($centered_logo && $header_bottom_appearance !== "stick menu_bottom") {
                            dynamic_sidebar( 'header_right_from_logo' );
                        } ?>
					</div>
                    <?php if($header_bottom_appearance == "stick_with_left_right_menu") { ?>
                        <nav class="main_menu drop_down right_side">
                            <?php
                            wp_nav_menu( array( 'theme_location' => 'right-top-navigation' ,
                                'container'  => '',
                                'container_class' => '',
                                'menu_class' => '',
                                'menu_id' => '',
                                'fallback_cb' => 'top_navigation_fallback',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'walker' => new qode_type1_walker_nav_menu()
                            ));
                            ?>
                        </nav>
                    <?php } ?>
					<?php if($header_bottom_appearance != "stick menu_bottom" && $header_bottom_appearance != "stick_with_left_right_menu"){ ?>
                        <?php if($header_bottom_appearance == "fixed_hiding") { ?> <div class="holeder_for_hidden_menu"> <?php } //only for fixed with hiding menu ?>
                        <?php if(!$centered_logo) { ?>
							<div class="header_inner_right">
                                <div class="side_menu_button_wrapper right">
									<?php if(is_active_sidebar('header_bottom_right')) { ?>
										<div class="header_bottom_right_widget_holder"><?php dynamic_sidebar('header_bottom_right'); ?></div>
									<?php } ?>
									<?php if(is_active_sidebar('woocommerce_dropdown')) {
										dynamic_sidebar('woocommerce_dropdown');
									} ?>
                                    <div class="side_menu_button">
									
										<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
											$search_type_class = 'search_slides_from_window_top';
											if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] !== '') {
												$search_type_class = $qode_options_proya['search_type'];
											}
											if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == 'search_covers_header') {
												if (isset($qode_options_proya['search_cover_only_bottom_yesno']) && $qode_options_proya['search_cover_only_bottom_yesno']=='yes') {
													$search_type_class .= ' search_covers_only_bottom';
												}
											}
											?>
											<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
                                                <?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
											</a>
								
											<?php if($search_type_class == 'fullscreen_search' && $fullscreen_search_animation=='from_circle'){ ?>
												<div class="fullscreen_search_overlay"></div>
											<?php } ?>
										<?php } ?>
                                        <?php if($enable_popup_menu == "yes"){ ?>
                                            <a href="javascript:void(0)" class="popup_menu <?php echo $header_button_size.' '.$popup_menu_animation_style; ?>">
                                            	<?php if (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_awesome') { ?>
                                            		<i class="fa fa-bars"></i>
                                        		<?php } elseif (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_elegant') { ?>
                                        			<span class="icon_menu"></span>
                                        		<?php } else { ?>
                                            		<span class="popup_menu_inner"><i class="line">&nbsp;</i></span>
                                            	<?php } ?>	
                                        	</a>
                                        <?php } ?>
                                        <?php if($enable_side_area == "yes" && $enable_popup_menu == 'no'){ ?>
                                            <a class="side_menu_button_link <?php echo $header_button_size; ?>" href="javascript:void(0)">
                                                <?php echo qode_get_side_menu_icon_html(); ?>
                                            </a>
										<?php } ?>
                                    </div>
                                </div>
							</div>
						<?php } ?>
						
						<?php if($centered_logo == true && $enable_search_left_sidearea_right == true ) { ?>
							<div class="header_inner_right left_side">
								<div class="side_menu_button_wrapper">
									<div class="side_menu_button">
										<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
											$search_type_class = 'search_slides_from_window_top';
											if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] !== '') {
												$search_type_class = $qode_options_proya['search_type'];
											}
											if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == 'search_covers_header') {
												if (isset($qode_options_proya['search_cover_only_bottom_yesno']) && $qode_options_proya['search_cover_only_bottom_yesno']=='yes') {
													$search_type_class .= ' search_covers_only_bottom';
												}
											}
											?>
											<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
												<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
											</a>
								
											<?php if($search_type_class == 'fullscreen_search' && $fullscreen_search_animation=='from_circle'){ ?>
												<div class="fullscreen_search_overlay"></div>
											<?php } ?>
										<?php } ?>
	
									</div>
								</div>
							</div>
						<?php } ?>

						<nav class="main_menu drop_down <?php if($header_bottom_appearance != "stick menu_bottom"){ echo esc_attr($menu_position);} ?>">
						<?php

							wp_nav_menu( array( 'theme_location' => 'top-navigation' ,
																	'container'  => '',
																	'container_class' => '',
																	'menu_class' => '',
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type1_walker_nav_menu()
						 ));
						?>
						</nav>
						<?php if($centered_logo) { ?>
							<div class="header_inner_right">
                                <div class="side_menu_button_wrapper right">
									<?php if(is_active_sidebar('header_bottom_right')) { ?>
										<div class="header_bottom_right_widget_holder"><?php dynamic_sidebar('header_bottom_right'); ?></div>
									<?php } ?>
									<?php if(is_active_sidebar('woocommerce_dropdown')) {
										dynamic_sidebar('woocommerce_dropdown');
									} ?>
									<div class="side_menu_button">
                                        <?php if($enable_search_left_sidearea_right == false && isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
											$search_type_class = 'search_slides_from_window_top';
											if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] !== '') {
												$search_type_class = $qode_options_proya['search_type'];
											}
											if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == 'search_covers_header') {
												if (isset($qode_options_proya['search_cover_only_bottom_yesno']) && $qode_options_proya['search_cover_only_bottom_yesno']=='yes') {
													$search_type_class .= ' search_covers_only_bottom';
												}
											}
											?>
											<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
                                                <?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
											</a>
								
											<?php if($search_type_class == 'fullscreen_search' && $fullscreen_search_animation=='from_circle'){ ?>
												<div class="fullscreen_search_overlay"></div>
											<?php } ?>
										<?php } ?>
                                        <?php if($enable_popup_menu == "yes"){ ?>
                                            <a href="javascript:void(0)" class="popup_menu <?php echo $header_button_size.' '.$popup_menu_animation_style; ?>">
                                            	<?php if (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_awesome') { ?>
                                            		<i class="fa fa-bars"></i>
                                        		<?php } elseif (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_elegant') { ?>
                                        			<span class="icon_menu"></span>
                                        		<?php } else { ?>
                                            		<span class="popup_menu_inner"><i class="line">&nbsp;</i></span>
                                            	<?php } ?>	
                                        	</a>
                                        <?php } ?>
                                        <?php if($enable_side_area == "yes" && $enable_popup_menu == 'no'){ ?>
                                            <a class="side_menu_button_link <?php echo $header_button_size; ?>" href="javascript:void(0)">
                                                <?php echo qode_get_side_menu_icon_html(); ?>
                                            </a>
                                        <?php } ?>

                                    </div>
                                </div>
							</div>
						<?php } ?>
                        <?php if($header_bottom_appearance == "fixed_hiding") { ?> </div> <?php } //only for fixed with hiding menu ?>
					<?php }else if($header_bottom_appearance == "stick menu_bottom"){ ?>
						<div class="header_menu_bottom">
						    <div class="header_menu_bottom_inner">
								<?php if($centered_logo) { ?>
									<div class="main_menu_header_inner_right_holder with_center_logo">
								<?php } else { ?>
									<div class="main_menu_header_inner_right_holder">
								<?php } ?>
									<nav class="main_menu drop_down">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'top-navigation' ,
											'container'  => '',
											'container_class' => '',
											'menu_class' => 'clearfix',
											'menu_id' => '',
											'fallback_cb' => 'top_navigation_fallback',
											'link_before' => '<span>',
											'link_after' => '</span>',
											'walker' => new qode_type1_walker_nav_menu()
									 ));
									?>
									</nav>
									<div class="header_inner_right">
										<div class="side_menu_button_wrapper right">
											<?php if(is_active_sidebar('header_bottom_right')) { ?>
												<div class="header_bottom_right_widget_holder"><?php dynamic_sidebar('header_bottom_right'); ?></div>
											<?php } ?>
											<?php if(is_active_sidebar('woocommerce_dropdown')) {
												dynamic_sidebar('woocommerce_dropdown');
											} ?>
											<div class="side_menu_button">
												<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
													$search_type_class = 'search_slides_from_window_top';
													if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] !== '') {
														$search_type_class = $qode_options_proya['search_type'];
													}
													if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == 'search_covers_header') {
														if (isset($qode_options_proya['search_cover_only_bottom_yesno']) && $qode_options_proya['search_cover_only_bottom_yesno']=='yes') {
															$search_type_class .= ' search_covers_only_bottom';
														}
													}
													?>
													<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
                                                        <?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
													</a>
										
													<?php if($search_type_class == 'fullscreen_search' && $fullscreen_search_animation=='from_circle'){ ?>
														<div class="fullscreen_search_overlay"></div>
													<?php } ?>
												<?php } ?>
                                                <?php if($enable_popup_menu == "yes"){ ?>
                                                    <a href="javascript:void(0)" class="popup_menu <?php echo $header_button_size.' '.$popup_menu_animation_style; ?>">
		                                            	<?php if (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_awesome') { ?>
		                                            		<i class="fa fa-bars"></i>
		                                        		<?php } elseif (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_elegant') { ?>
		                                        			<span class="icon_menu"></span>
		                                        		<?php } else { ?>
		                                            		<span class="popup_menu_inner"><i class="line">&nbsp;</i></span>
		                                            	<?php } ?>	
		                                        	</a>
                                                <?php } ?>
                                                <?php if($enable_side_area == "yes" && $enable_popup_menu == 'no'){ ?>
													<a class="side_menu_button_link <?php echo $header_button_size; ?>" href="javascript:void(0)">
                                                        <?php echo qode_get_side_menu_icon_html(); ?>
													</a>
												<?php } ?>

											</div>
										</div>
									</div>
                                </div>
                        </div>
                    </div>
					<?php } ?>
					<nav class="mobile_menu">
                        <?php
                        if($header_bottom_appearance == "stick_with_left_right_menu") {
                            echo '<ul>';
                            wp_nav_menu( array( 'theme_location' => 'left-top-navigation' ,
                                'container'  => '',
                                'container_class' => '',
                                'menu_class' => '',
                                'menu_id' => '',
                                'fallback_cb' => '',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'walker' => new qode_type4_walker_nav_menu(),
                                'items_wrap'      => '%3$s'
                            ));
                            wp_nav_menu( array( 'theme_location' => 'right-top-navigation' ,
                                'container'  => '',
                                'container_class' => '',
                                'menu_class' => '',
                                'menu_id' => '',
                                'fallback_cb' => '',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'walker' => new qode_type4_walker_nav_menu(),
                                'items_wrap'      => '%3$s'
                            ));
                            echo '</ul>';
                        }else{
                            wp_nav_menu( array( 'theme_location' => 'top-navigation' ,
                                'container'  => '',
                                'container_class' => '',
                                'menu_class' => '',
                                'menu_id' => '',
                                'fallback_cb' => 'top_navigation_fallback',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'walker' => new qode_type2_walker_nav_menu()
                            ));
                        }
                        ?>
					</nav>
			<?php if($header_in_grid){ ?>
                    <?php if($overlapping_content) {?></div><?php } ?>
					</div>
				</div>
			<?php } ?>
	</div>
	</div>
	</div>

</header>
	<?php } else if($header_bottom_appearance == "fixed fixed_minimal"){ ?>
	
	<?php //FIXED MINIMAL Header Type ?>
	
	<header class="<?php echo $header_classes; ?> page_header">
		<div class="header_inner clearfix">
		<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == "yes"){ ?>
			<?php if(($header_color_transparency_per_page == '' || $header_color_transparency_per_page == '1') && isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "search_slides_from_header_bottom"){ ?>
				<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_2" method="get">
					<?php if($header_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
						<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
						 <?php } ?>
							<div class="form_holder_outer">
								<div class="form_holder">
									<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
									<a class="qode_search_submit" href="javascript:void(0)">
										<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
									</a>
								</div>
							</div>
							<?php if($header_in_grid){ ?>
							<?php if($overlapping_content) {?></div><?php } ?>
						</div>
					</div>
				<?php } ?>
				</form>
			<?php } else if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "search_covers_header") { ?>
				<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_3" method="get">
					<?php if($header_in_grid){ ?>
						<div class="container">
							<div class="container_inner clearfix">
							<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
						<?php } ?>
								<div class="form_holder_outer">
									<div class="form_holder">
										<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
										<div class="qode_search_close">
											<a href="#">
												<?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack')); ?>
											</a>
										</div>
									</div>
								</div>
						<?php if($header_in_grid){ ?>
							<?php if($overlapping_content) {?></div><?php } ?>
							</div>
						</div>
					<?php } ?>
				</form>
			<?php } else { ?>
				<form role="search" id="searchform" action="<?php echo home_url('/'); ?>" class="qode_search_form" method="get">
					<?php if($header_in_grid){ ?>
						<div class="container">
						<div class="container_inner clearfix">
					<?php } ?>

					<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack'), array('icon_attributes' => array('class' => 'qode_icon_in_search'))); ?>
					<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
					<input type="submit" value="Search" />

					<div class="qode_search_close">
						<a href="#">
							<?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack'), array('icon_attributes' => array('class' => 'qode_icon_in_search'))); ?>
						</a>
					</div>
					<?php if($header_in_grid){ ?>
							</div>
						</div>
					<?php } ?>
				</form>
			<?php } ?>
		<?php } ?>
			<div class="header_top_bottom_holder">
				<?php if($display_header_top == "yes"){ ?>
					<div class="header_top clearfix" <?php echo $header_top_color_per_page; ?> >
						<?php if($header_in_grid){ ?>
							<div class="container">
								<div class="container_inner clearfix">
								<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
						<?php } ?>
								<div class="left">
									<div class="inner">
									<?php
										dynamic_sidebar('header_left');
									?>
									</div>
								</div>
								<div class="right">
									<div class="inner">
									<?php
										dynamic_sidebar('header_right');
									?>
									</div>
								</div>
							<?php if($header_in_grid){ ?>
							<?php if($overlapping_content) {?></div><?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="header_bottom clearfix" <?php echo $header_color_per_page; ?> >
						<?php if($header_in_grid){ ?>
							<div class="container">
								<div class="container_inner clearfix">
								<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
						<?php } ?>
								<div class="header_inner_left">
									<div class="side_menu_button_wrapper left">
										<div class="side_menu_button">
											<?php if($enable_popup_menu == "yes"){ ?>
												<a href="javascript:void(0)" class="popup_menu <?php echo $header_button_size.' '.$popup_menu_animation_style; ?>">
	                                            	<?php if (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_awesome') { ?>
	                                            		<i class="fa fa-bars"></i>
	                                        		<?php } elseif (isset($qode_options_proya['font_icon_pack_icon_popup']) && $qode_options_proya['font_icon_pack_icon_popup'] == 'font_elegant') { ?>
	                                        			<span class="icon_menu"></span>
	                                        		<?php } else { ?>
	                                            		<span class="popup_menu_inner"><i class="line">&nbsp;</i></span>
	                                            	<?php } ?>	
	                                        	</a>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="logo_wrapper">
									<?php
									if (isset($qode_options_proya['logo_image']) && $qode_options_proya['logo_image'] != ""){ $logo_image = $qode_options_proya['logo_image'];}else{ $logo_image =  get_template_directory_uri().'/img/logo.png'; };
									if (isset($qode_options_proya['logo_image_light']) && $qode_options_proya['logo_image_light'] != ""){ $logo_image_light = $qode_options_proya['logo_image_light'];}else{ $logo_image_light =  get_template_directory_uri().'/img/logo.png'; };
									if (isset($qode_options_proya['logo_image_dark']) && $qode_options_proya['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_proya['logo_image_dark'];}else{ $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png'; };
									if (isset($qode_options_proya['logo_image_popup']) && $qode_options_proya['logo_image_popup'] != ""){ $logo_image_popup = $qode_options_proya['logo_image_popup'];}else{ $logo_image_popup =  get_template_directory_uri().'/img/logo_white.png'; };
									if (isset($qode_options_proya['logo_image_mobile']) && $qode_options_proya['logo_image_mobile'] != ""){
										$logo_image_mobile = $qode_options_proya['logo_image_mobile'];
									}else{
										$logo_image_mobile = $logo_image;
									}
									?>
									<div class="q_logo">
										<a itemprop="url" href="<?php echo home_url('/'); ?>">
											<img itemprop="image" class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/>
											<img itemprop="image" class="light" src="<?php echo $logo_image_light; ?>" alt="Logo"/>
											<img itemprop="image" class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/>
											<img itemprop="image" class="mobile" src="<?php echo $logo_image_mobile; ?>" alt="Logo"/>
											<?php if($enable_popup_menu == 'yes'){ ?>
												<img itemprop="image" class="popup" src="<?php echo $logo_image_popup; ?>" alt="Logo"/>
											<?php } ?>
										</a>
									</div>
								</div>
								<div class="header_inner_right">
									<div class="side_menu_button_wrapper right">
										<?php if(is_active_sidebar('woocommerce_dropdown')) {
											dynamic_sidebar('woocommerce_dropdown');
										} ?>
												
										<div class="side_menu_button">
											<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
												$search_type_class = 'search_slides_from_window_top';
												if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] !== '') {
													$search_type_class = $qode_options_proya['search_type'];
												}
												if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == 'search_covers_header') {
													if (isset($qode_options_proya['search_cover_only_bottom_yesno']) && $qode_options_proya['search_cover_only_bottom_yesno']=='yes') {
														$search_type_class .= ' search_covers_only_bottom';
													}
												}
												?>
												<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
													<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
												</a>
									
												<?php if($search_type_class == 'fullscreen_search' && $fullscreen_search_animation=='from_circle'){ ?>
													<div class="fullscreen_search_overlay"></div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
								</div>
						<?php if($header_in_grid){ ?>
						<?php if($overlapping_content) {?></div><?php } ?>
								</div>
							</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>
		
	
	<?php } else if($header_bottom_appearance == "fixed_top_header"){ ?>
	
	<?php //Fixed Header Top Header Type ?>
	
	<header class="<?php echo $header_classes; ?> page_header">
		<div class="header_inner clearfix">
		<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == "yes"){ ?>
				<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_3" method="get">
					<?php if($header_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
                        <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
					<?php } ?>
							<div class="form_holder_outer">
								<div class="form_holder">
									<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
									<div class="qode_search_close">
										<a href="#">
                                            <?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack')); ?>
										</a>
									</div>
								</div>
							</div>
					<?php if($header_in_grid){ ?>
                        <?php if($overlapping_content) {?></div><?php } ?>
						</div>
					</div>
					<?php } ?>
				</form>
		<?php } ?>
			<div class="header_top_bottom_holder">
				<?php if($display_header_top == "yes"){ ?>
					<div class="top_header clearfix" <?php echo $header_top_color_per_page; ?> >
						<?php if($header_in_grid){ ?>
							<div class="container">
								<div class="container_inner clearfix">
								<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
						<?php } ?>
								<div class="left">
									<div class="inner">
										<nav class="main_menu drop_down right">
										<?php
											wp_nav_menu( array( 
												'theme_location' => 'top-navigation' ,
												'container'  => '',
												'container_class' => '',
												'menu_class' => '',
												'menu_id' => '',
												'fallback_cb' => 'top_navigation_fallback',
												'link_before' => '<span>',
												'link_after' => '</span>',
												'walker' => new qode_type1_walker_nav_menu()
											));
										?>
										</nav>
										<?php if(qode_is_main_menu_set()) { ?>
											<div class="mobile_menu_button">
												<span>
													<?php echo qode_get_mobile_menu_icon_html(); ?>
												</span>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="right">
									<div class="inner">
										<div class="side_menu_button_wrapper right">
											<div class="header_bottom_right_widget_holder">
												<?php
												dynamic_sidebar('header_right');
												?>
											</div>
											<?php if(is_active_sidebar('woocommerce_dropdown')) {
												dynamic_sidebar('woocommerce_dropdown');
											} ?>
											<div class="side_menu_button">
												<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
													$search_type_class = 'search_covers_header';
													?>
													<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
														<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
													</a>
												<?php } ?>
												 <?php if($enable_side_area == "yes"){ ?>
													<a class="side_menu_button_link <?php echo $header_button_size; ?>" href="javascript:void(0)">
														<?php echo qode_get_side_menu_icon_html(); ?>
													</a>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<nav class="mobile_menu">
									<?php
										wp_nav_menu( array( 
											'theme_location' => 'top-navigation' ,
											'container'  => '',
											'container_class' => '',
											'menu_class' => '',
											'menu_id' => '',
											'fallback_cb' => 'top_navigation_fallback',
											'link_before' => '<span>',
											'link_after' => '</span>',
											'walker' => new qode_type2_walker_nav_menu()
										));
									?>
								</nav>
							<?php if($header_in_grid){ ?>
							<?php if($overlapping_content) {?></div><?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="bottom_header clearfix" <?php echo $header_color_per_page; ?> >
					<?php if($header_in_grid){ ?>
						<div class="container">
							<div class="container_inner clearfix">
							<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
					<?php } ?>
						<div class="header_inner_center">
							<div class="logo_wrapper" style="height: <?php echo $logo_height/2; ?>px;">
								<?php
								if (isset($qode_options_proya['logo_image']) && $qode_options_proya['logo_image'] != ""){ $logo_image = $qode_options_proya['logo_image'];}else{ $logo_image =  get_template_directory_uri().'/img/logo.png'; };
								if (isset($qode_options_proya['logo_image_light']) && $qode_options_proya['logo_image_light'] != ""){ $logo_image_light = $qode_options_proya['logo_image_light'];}else{ $logo_image_light =  get_template_directory_uri().'/img/logo.png'; };
								if (isset($qode_options_proya['logo_image_dark']) && $qode_options_proya['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_proya['logo_image_dark'];}else{ $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png'; };
								if (isset($qode_options_proya['logo_image_mobile']) && $qode_options_proya['logo_image_mobile'] != ""){
									$logo_image_mobile = $qode_options_proya['logo_image_mobile'];
								}else{
									$logo_image_mobile = $logo_image;
								}
								?>
								<div class="q_logo">
									<a itemprop="url" style="height: <?php echo $logo_height/2; ?>px;" href="<?php echo home_url('/'); ?>">
										<img itemprop="image" class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/>
										<img itemprop="image" class="light" src="<?php echo $logo_image_light; ?>" alt="Logo"/>
										<img itemprop="image" class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/>
										<img itemprop="image" class="mobile" src="<?php echo $logo_image_mobile; ?>" alt="Logo"/>
									</a>
								</div>
							</div>
							<?php
								dynamic_sidebar('header_bottom_center');
							?>
						</div>	
								
						<?php if($header_in_grid){ ?>
						<?php if($overlapping_content) {?></div><?php } ?>
								</div>
							</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>
	<?php } ?>
	
<?php } else{?>
	<header class="page_header <?php if($display_header_top == "yes"){ echo 'has_top'; }  if($header_top_area_scroll == "yes"){ echo ' scroll_top'; }?> <?php if($centered_logo){ echo " centered_logo"; } ?> <?php echo $header_bottom_appearance; ?>  <?php echo $header_style; ?> <?php if(is_active_sidebar('header_fixed_right')) { echo 'has_header_fixed_right'; } ?>">
        <div class="header_inner clearfix">
			<div class="header_bottom clearfix" <?php echo $header_color_per_page; ?> >
				<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
                        <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
						<?php } ?>
						<div class="header_inner_left">
							<?php if(qode_is_main_menu_set()) { ?>
								<div class="mobile_menu_button">
                                    <span>
                                        <?php echo qode_get_mobile_menu_icon_html(); ?>
                                    </span>
                                </div>
							<?php } ?>
							<div class="logo_wrapper">
								<?php
								if (isset($qode_options_proya['logo_image']) && $qode_options_proya['logo_image'] != ""){ $logo_image = $qode_options_proya['logo_image'];}else{ $logo_image =  get_template_directory_uri().'/img/logo.png'; };
								if (isset($qode_options_proya['logo_image_light']) && $qode_options_proya['logo_image_light'] != ""){ $logo_image_light = $qode_options_proya['logo_image_light'];}else{ $logo_image_light =  get_template_directory_uri().'/img/logo.png'; };
								if (isset($qode_options_proya['logo_image_dark']) && $qode_options_proya['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_proya['logo_image_dark'];}else{ $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png'; };
								if (isset($qode_options_proya['logo_image_sticky']) && $qode_options_proya['logo_image_sticky'] != ""){ $logo_image_sticky = $qode_options_proya['logo_image_sticky'];}else{ $logo_image_sticky =  get_template_directory_uri().'/img/logo_black.png'; };
                                if (isset($qode_options_proya['logo_image_popup']) && $qode_options_proya['logo_image_popup'] != ""){ $logo_image_popup = $qode_options_proya['logo_image_popup'];}else{ $logo_image_popup =  get_template_directory_uri().'/img/logo_white.png'; };
								if (isset($qode_options_proya['logo_image_mobile']) && $qode_options_proya['logo_image_mobile'] != ""){
									$logo_image_mobile = $qode_options_proya['logo_image_mobile'];
								}else{
									$logo_image_mobile = $logo_image;
								}
								?>
								<div class="q_logo">
									<a itemprop="url" href="<?php echo home_url('/'); ?>">
										<img itemprop="image" class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/>
										<img itemprop="image" class="light" src="<?php echo $logo_image_light; ?>" alt="Logo"/>
										<img itemprop="image" class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/>
										<img itemprop="image" class="sticky" src="<?php echo $logo_image_sticky; ?>" alt="Logo"/>
										<img itemprop="image" class="mobile" src="<?php echo $logo_image_mobile; ?>" alt="Logo"/>
										<?php if($enable_popup_menu == 'yes'){ ?>
											<img itemprop="image" class="popup" src="<?php echo $logo_image_popup; ?>" alt="Logo"/>
										<?php } ?>
									</a>
								</div>
							</div>
						</div>
						<?php if($header_in_grid){ ?>
                        <?php if($overlapping_content) {?></div><?php } ?>
					</div>
				</div>
			<?php } ?>
				<nav class="mobile_menu">
					<?php
					wp_nav_menu( array( 'theme_location' => 'top-navigation' ,
						'container'  => '',
						'container_class' => '',
						'menu_class' => '',
						'menu_id' => '',
						'fallback_cb' => 'top_navigation_fallback',
						'link_before' => '<span>',
						'link_after' => '</span>',
						'walker' => new qode_type2_walker_nav_menu()
					));
					?>
				</nav>
			</div>
		</div>
	</header>
<?php } ?>

    <?php if($qode_options_proya['show_back_button'] == "yes") { ?>
		<a id='back_to_top' href='#'>
			<span class="fa-stack">
				<i class="fa fa-arrow-up" style=""></i>
			</span>
		</a>
	<?php } ?>
    <?php if($enable_popup_menu == "yes"){ ?>
        <div class="popup_menu_holder_outer">
            <div class="popup_menu_holder">
                <div class="popup_menu_holder_inner">
                    <nav class="popup_menu">
                        <?php
                        wp_nav_menu( array( 'theme_location' => 'popup-navigation' ,
                            'container'  => '',
                            'container_class' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'fallback_cb' => 'top_navigation_fallback',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'walker' => new qode_type3_walker_nav_menu()
                        ));
                        ?>
                    </nav>
                    <?php
                    //Sidearea under menu
					if(is_active_sidebar('fullscreen_menu_area_widget')) : ?>
						<div class="popup_menu_widget_holder"><div>
							<?php dynamic_sidebar('fullscreen_menu_area_widget'); ?>
						</div></div>
					<?php endif;
					?>
                </div>
            </div>
        </div>
    <?php } ?>
	<?php if($enable_fullscreen_search=="yes"){ ?>
		<div class="fullscreen_search_holder <?php echo esc_attr($fullscreen_search_animation); ?>">
			<div class="close_container">
				<?php if($header_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix" >
                        <?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
				<?php } ?>
						<div class="search_close_holder">
							<div class="side_menu_button">
								<a class="fullscreen_search_close" href="javascript:void(0)">
                                    <?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack')); ?>
								</a>
							</div>
						</div>
				<?php if($header_in_grid){ ?>
                        <?php if($overlapping_content) {?></div><?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="fullscreen_search_table">
				<div class="fullscreen_search_cell">
					<div class="fullscreen_search_inner">
						<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="fullscreen_search_form" method="get">
							<div class="form_holder">
								<span class="search_label"><?php _e('Search:', 'qode'); ?></span>
								<div class="field_holder">
									<input type="text"  name="s" class="search_field" autocomplete="off" />
									<div class="line"></div>
								</div>
                                <a class="qode_search_submit search_submit" href="javascript:void(0)">
                                    <?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
                                </a>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

    <?php
        $content_class = "";
        if((get_post_meta($id, "qode_revolution-slider", true) == "" && qode_is_title_hidden() && !is_category() && !is_tag() && !is_author() && (isset($qode_options_proya['enable_google_map']) && ($header_transparency === '' || $header_transparency == 1))) || qode_is_content_below_header()){
            if($qode_options_proya['header_bottom_appearance'] == "fixed" || $qode_options_proya['header_bottom_appearance'] == "fixed fixed_minimal"){
                $content_class = "content_top_margin";
            }elseif(qode_is_content_below_header() && $qode_options_proya['header_bottom_appearance'] == "fixed_hiding"){
				$content_class = "content_top_margin";
			}else {
                $content_class = "content_top_margin_none";
            }
        }

        if(get_post_meta($id, "qode_revolution-slider", true) != ""){
            $content_class .= " has_slider";
        }
    ?>

	<?php
		if(isset($qode_options_proya['header_bottom_appearance']) && ($qode_options_proya['header_bottom_appearance'] == "stick" || $qode_options_proya['header_bottom_appearance'] == "stick menu_bottom" || $qode_options_proya['header_bottom_appearance'] == "stick_with_left_right_menu")){
			if(get_post_meta(qode_get_page_id(), "qode_page_hide_initial_sticky", true) !== ''){
				if(get_post_meta(qode_get_page_id(), "qode_page_hide_initial_sticky", true) == 'yes'){
					$content_class = " ";
				}
			}else if(isset($qode_options_proya['hide_initial_sticky']) && $qode_options_proya['hide_initial_sticky'] == 'yes') {
				$content_class = " ";
			}
		}
	?>
	
	
    <?php
    if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){

    $paspartu_additional_classes = "";
    if(isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'no'){
        $paspartu_additional_classes .= " disable_top_paspartu";
    }
    if(isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'no'){
        $paspartu_additional_classes .= " disable_bottom_paspartu";
    }
    if(isset($qode_options_proya['paspartu_on_bottom_slider']) && $qode_options_proya['paspartu_on_bottom_slider'] == 'yes'){
        $paspartu_additional_classes .= " paspartu_on_bottom_slider";
    }
    if((isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'yes' && isset($qode_options_proya['paspartu_on_bottom_fixed']) && $qode_options_proya['paspartu_on_bottom_fixed'] == 'yes') ||
        (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes')){
            $paspartu_additional_classes .= " paspartu_on_bottom_fixed";
    }
    ?>


    <div class="paspartu_outer <?php echo $paspartu_additional_classes; ?>">
        <?php if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'no') { ?>
            <div class="paspartu_middle_inner">
        <?php }?>

        <?php if((isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'yes' && isset($qode_options_proya['paspartu_on_top_fixed']) && $qode_options_proya['paspartu_on_top_fixed'] == 'yes') ||
            (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes')){ ?>
            <div class="paspartu_top"></div>
        <?php }?>

        <div class="paspartu_left"></div>
        <div class="paspartu_right"></div>
        <div class="paspartu_inner">
        <?php
        }
        ?>

<div class="content <?php echo $content_class; ?>">
<?php
$animation = get_post_meta($id, "qode_show-animation", true);
if (!empty($_SESSION['qode_animation']) && $animation == "")
	$animation = $_SESSION['qode_animation'];

?>
			<?php if($qode_options_proya['page_transitions'] == "1" || $qode_options_proya['page_transitions'] == "2" || $qode_options_proya['page_transitions'] == "3" || $qode_options_proya['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">

					<?php
					/**
					 * qode_ajax_meta hook
					 *
					 * @hooked qode_ajax_meta - 10
					 */
					do_action('qode_ajax_meta'); ?>

					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
			<?php if($qode_options_proya['page_transitions'] == "1" || $qode_options_proya['page_transitions'] == "2" || $qode_options_proya['page_transitions'] == "3" || $qode_options_proya['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<?php do_action('qode_visual_composer_custom_shortcodce_css');?>
			<?php } ?>
