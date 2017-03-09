<?php
//$qode_toolbar = true;
//$qode_landing = true;
//$qode_tour_popup = true;

include_once get_template_directory().'/theme-includes.php';

if(isset($qode_toolbar) && $qode_toolbar === true) {
	if (!function_exists('myStartSession')) {
		/**
		 * Function that sets session after theme is activated hook. Hooks to after_setup_theme action
		 */
		function myStartSession() {
			if(!session_id()) {
				session_start();
			}
			if (!empty($_GET['animation'])) {
				$_SESSION['qode_animation'] = $_GET['animation'];
			}

			if (isset($_SESSION['qode_animation']) && $_SESSION['qode_animation'] == "off") {
				$_SESSION['qode_animation'] = "";
			}
		}

		add_action('after_setup_theme', 'myStartSession', 1);
	}

	if (!function_exists('myEndSession')) {
		/**
		 * Function that ends session on wp_login and wp_logout action
		 */
		function myEndSession() {
			session_destroy();
		}

		add_action('wp_logout', 'myEndSession');
		add_action('wp_login', 'myEndSession');
	}
}

/* Add css */
if (!function_exists('qode_styles')) {
    function qode_styles() {
        global $qode_options_proya;
        global $wp_styles;
        global $is_chrome;
        global $is_safari;
        global $qode_toolbar;
        global $qode_landing;
        global $qode_tour_popup;
        global $woocommerce;

        wp_enqueue_style("default_style", QODE_ROOT . "/style.css");
        qode_icon_collections()->enqueueStyles();
        wp_enqueue_style("stylesheet", QODE_ROOT . "/css/stylesheet.min.css");

        if ($woocommerce) {
            wp_enqueue_style("woocommerce", QODE_ROOT . "/css/woocommerce.min.css");
            if(!empty($qode_options_proya['responsiveness']) && $qode_options_proya['responsiveness'] == 'yes') {
                wp_enqueue_style("woocommerce_responsive", QODE_ROOT . "/css/woocommerce_responsive.min.css");
            }
        }

        wp_enqueue_style("qode_print", QODE_ROOT . "/css/print.css");

        preg_match( "#Chrome/(.+?)\.#", $_SERVER['HTTP_USER_AGENT'], $match );
        if(!empty($match)){ $version = $match[1];}else{ $version = 0; }
        $mac_os = strpos($_SERVER['HTTP_USER_AGENT'], "Macintosh; Intel Mac OS X");

        if($is_chrome && ($mac_os !== false) && ($version > 21)) {
            wp_enqueue_style("mac_stylesheet", QODE_ROOT . "/css/mac_stylesheet.css");
        }

        if($is_chrome || $is_safari) {
            wp_enqueue_style("webkit", QODE_ROOT . "/css/webkit_stylesheet.css");
        }

        if($is_safari) {
            wp_enqueue_style("safari", QODE_ROOT . "/css/safari_stylesheet.css");
        }

		if (file_exists(dirname(__FILE__) ."/css/style_dynamic.css") && qode_is_css_folder_writable() && !is_multisite()) {
			wp_enqueue_style("style_dynamic", QODE_ROOT . "/css/style_dynamic.css", array(), filemtime(dirname(__FILE__) ."/css/style_dynamic.css"));
		} else {
			wp_enqueue_style("style_dynamic", QODE_ROOT . "/css/style_dynamic.php");
		}


        $responsiveness = "yes";
        if (isset($qode_options_proya['responsiveness']))
            $responsiveness = $qode_options_proya['responsiveness'];
        if ($responsiveness != "no"):
            wp_enqueue_style("responsive", QODE_ROOT . "/css/responsive.min.css");
            
			if (file_exists(dirname(__FILE__) ."/css/style_dynamic_responsive.css") && qode_is_css_folder_writable() && !is_multisite())
            	wp_enqueue_style("style_dynamic_responsive", QODE_ROOT . "/css/style_dynamic_responsive.css", array(), filemtime(dirname(__FILE__) ."/css/style_dynamic_responsive.css"));
            else
            	wp_enqueue_style("style_dynamic_responsive", QODE_ROOT . "/css/style_dynamic_responsive.php");
        endif;

		$vertical_area = "no";
		if (isset($qode_options_proya['vertical_area'])){
			$vertical_area = $qode_options_proya['vertical_area'];
		}
		if($vertical_area == "yes" && $responsiveness != "no"){
			wp_enqueue_style("vertical_responsive", QODE_ROOT . "/css/vertical_responsive.min.css");
		}

        //is toolbar turned on?
        if (isset($qode_toolbar)) {
            //include toolbar specific styles
            wp_enqueue_style("qode_toolbar", QODE_ROOT . "/css/toolbar.css");
        }

        //is landing turned on?
        if (isset($qode_landing)) {
            //include landing page specific styles
            wp_enqueue_style("qode_landing", get_home_url() . "/demo-files/landing/css/landing_stylesheet_stripped.css");
        }

        //is tour popup on?
        if (isset($qode_tour_popup)) {
            //include tour popup specific styles
            wp_enqueue_style("qode_tour_popup", get_home_url() . "/demo-files/landing/css/tour_popup_stylesheet.css");
        }

        //include Visual Composer styles
        if (class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style( 'js_composer_front' );
        }

		if(is_rtl()) {
			wp_enqueue_style('qode-rtl', QODE_ROOT.'/rtl.css');
		}
            
		if (file_exists(dirname(__FILE__) ."/css/custom_css.css") && qode_is_css_folder_writable() && !is_multisite())
        	wp_enqueue_style("custom_css", QODE_ROOT . "/css/custom_css.css", array(), filemtime(dirname(__FILE__) ."/css/custom_css.css"));
       	else
        	wp_enqueue_style("custom_css", QODE_ROOT . "/css/custom_css.php");
    }

	add_action('wp_enqueue_scripts', 'qode_styles');
}

if(!function_exists('qode_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function qode_google_fonts_styles() {
		global $qode_options_proya, $qodeFramework, $qode_toolbar;

		$font_weight_str 		= '100,200,300,400,500,600,700,800,900,300italic,400italic';
		$default_font_string 	= 'Raleway:'.$font_weight_str;

        $font_sipmle_field_array = array();
        if(is_array($qodeFramework->qodeOptions->getOptionsByType('fontsimple')) && count($qodeFramework->qodeOptions->getOptionsByType('fontsimple'))){
            $font_sipmle_field_array = $qodeFramework->qodeOptions->getOptionsByType('fontsimple');
        }

        $font_field_array = array();
        if(is_array($qodeFramework->qodeOptions->getOptionsByType('font')) && count($qodeFramework->qodeOptions->getOptionsByType('font'))){
            $font_field_array = $qodeFramework->qodeOptions->getOptionsByType('font');
        }

        $available_font_options = array_merge($font_sipmle_field_array, $font_field_array);

		//define available font options array
		$fonts_array = array();
		foreach($available_font_options as $font_option) {
			//is font set and not set to default and not empty?
			if(isset($qode_options_proya[$font_option]) && $qode_options_proya[$font_option] !== '-1' && $qode_options_proya[$font_option] !== '' && !qode_is_native_font($qode_options_proya[$font_option])) {
				$font_option_string = $qode_options_proya[$font_option].':'.$font_weight_str;
				if(!in_array($font_option_string, $fonts_array)) {
					$fonts_array[] = $font_option_string;
				}

			}
		}

		//add google fonts set in slider
		$args = array( 'post_type' => 'slides', 'posts_per_page' => -1);
		$loop = new WP_Query( $args );

		//for each slide defined
		while ( $loop->have_posts() ) : $loop->the_post();

			//is font family for title option chosen?
			if(get_post_meta(get_the_ID(), "qode_slide-title-font-family", true) != "") {
				$slide_title_font_family = get_post_meta(get_the_ID(), "qode_slide-title-font-family", true);
				$slide_title_font_string = $slide_title_font_family . ":".$font_weight_str;
				if(!in_array($slide_title_font_string, $fonts_array) && !qode_is_native_font($slide_title_font_family)) {
					//include that font
					array_push($fonts_array, $slide_title_font_string);
				}
			}

			//is font family defined for slide's text?
			if(get_post_meta(get_the_ID(), "qode_slide-text-font-family", true) != "") {
				$slide_text_font_family = get_post_meta(get_the_ID(), "qode_slide-text-font-family", true);
				$slide_text_font_string = $slide_text_font_family . ":".$font_weight_str;
				if(!in_array($slide_text_font_string, $fonts_array) && !qode_is_native_font($slide_text_font_family)) {
					//include that font
					array_push($fonts_array, $slide_text_font_string);
				}
			}

			//is font family defined for slide's subtitle?
			if(get_post_meta(get_the_ID(), "qode_slide-subtitle-font-family", true) != "") {
				$slide_subtitle_font_family = get_post_meta(get_the_ID(), "qode_slide-subtitle-font-family", true);
				$slide_subtitle_font_string = $slide_subtitle_font_family .":".$font_weight_str;
				if(!in_array($slide_subtitle_font_string, $fonts_array) && !qode_is_native_font($slide_subtitle_font_family)) {
					//include that font
					array_push($fonts_array, $slide_subtitle_font_string);
				}

			}
		endwhile;

		wp_reset_postdata();

		$fonts_array = array_diff($fonts_array, array("-1:".$font_weight_str));
		$google_fonts_string = implode( '|', $fonts_array);

		//is google font option checked anywhere in theme?
		if(count($fonts_array) > 0) {
			//include all checked fonts
			printf("<link href='//fonts.googleapis.com/css?family=".$default_font_string."|%s&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n", str_replace(' ', '+', $google_fonts_string));
		} else {
			//include default google font that theme is using
			printf("<link href='//fonts.googleapis.com/css?family=".$default_font_string."' rel='stylesheet' type='text/css'>\r\n");
		}

		if(isset($qode_toolbar)){
			printf("<link href='//fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>\r\n");
		}
	}

	add_action('wp_enqueue_scripts', 'qode_google_fonts_styles');
}

/* Add js */

if (!function_exists('qode_scripts')) {
    function qode_scripts() {
        global $qode_options_proya;
        global $is_chrome;
        global $is_opera;
        global $is_IE;
        global $qode_toolbar;
        global $qode_landing;
        global $qode_tour_popup;
        global $woocommerce;

        $smooth_scroll = true;
        if(isset($qode_options_proya['smooth_scroll']) && $qode_options_proya['smooth_scroll'] == "no"){
            $smooth_scroll = false;
        }

        wp_enqueue_script("jquery");
        wp_enqueue_script("plugins", QODE_ROOT."/js/plugins.js",array(),false,true);

        wp_enqueue_script("carouFredSel", QODE_ROOT."/js/jquery.carouFredSel-6.2.1.min.js",array(),false,true);
        wp_enqueue_script("lemmonSlider", QODE_ROOT."/js/lemmon-slider.min.js",array(),false,true);
        wp_enqueue_script("one_page_scroll", QODE_ROOT."/js/jquery.fullPage.min.js",array(),false,true);
        wp_enqueue_script("mousewheel", QODE_ROOT."/js/jquery.mousewheel.min.js",array(),false,true);
        wp_enqueue_script("touchSwipe", QODE_ROOT."/js/jquery.touchSwipe.min.js",array(),false,true);
        wp_enqueue_script("isotope", QODE_ROOT."/js/jquery.isotope.min.js",array(),false,true);
        wp_enqueue_script("stretch", QODE_ROOT."/js/jquery.stretch.js",array(),false,true);

        $mac_os = strpos($_SERVER['HTTP_USER_AGENT'], "Macintosh; Intel Mac OS X");
        if($smooth_scroll && $mac_os == false){
            wp_enqueue_script("TweenLite", QODE_ROOT."/js/TweenLite.min.js",array(),false,true);
			if(!qode_layer_slider_installed() || !qode_revolution_slider_installed()){
				wp_enqueue_script("ScrollToPlugin", QODE_ROOT."/js/ScrollToPlugin.min.js",array(),false,true);
			}
            wp_enqueue_script("smoothPageScroll", QODE_ROOT."/js/smoothPageScroll.min.js",array(),false,true);
        }


        if ( $is_IE ) {
            wp_enqueue_script("html5", QODE_ROOT."/js/html5.js",array(),false,false);
        }
        if((isset($qode_options_proya['enable_google_map']) && $qode_options_proya['enable_google_map'] == "yes") || qode_is_ajax_enabled() || qode_has_google_map_shortcode()) :

			if( (isset($qode_options_proya['google_maps_api_key']) && $qode_options_proya['google_maps_api_key'] != "")) {

				$google_maps_api_key = $qode_options_proya['google_maps_api_key'];
				wp_enqueue_script("google_map_api", "https://maps.googleapis.com/maps/api/js?key=" . $google_maps_api_key,array(),false,true);

			} else {

				wp_enqueue_script("google_map_api", "https://maps.googleapis.com/maps/api/js",array(),false,true);

			}


        endif;
        
		if (file_exists(dirname(__FILE__) ."/js/default_dynamic.js") && qode_is_js_folder_writable() && !is_multisite()) {
			wp_enqueue_script("default_dynamic", QODE_ROOT."/js/default_dynamic.js",array(), filemtime(dirname(__FILE__) ."/js/default_dynamic.js"),true);
		} else {
			wp_enqueue_script("default_dynamic", QODE_ROOT."/js/default_dynamic.php",array(),false,true);
		}
        	
        wp_enqueue_script("default", QODE_ROOT."/js/default.min.js",array(),false,true);

		if (file_exists(dirname(__FILE__) ."/js/custom_js.js") && qode_is_js_folder_writable() && !is_multisite()) {
			wp_enqueue_script("custom_js", QODE_ROOT."/js/custom_js.js",array(), filemtime(dirname(__FILE__) ."/js/custom_js.js"),true);
		} else {
			wp_enqueue_script("custom_js", QODE_ROOT."/js/custom_js.php",array(),false,true);
		}
        	
        global $wp_scripts;
        $wp_scripts->add_data('comment-reply', 'group', 1 );
        if ( is_singular() ) wp_enqueue_script( "comment-reply");

        $has_ajax = false;
        $qode_animation = "";
        if (isset($_SESSION['qode_proya_page_transitions']))
            $qode_animation = $_SESSION['qode_proya_page_transitions'];
        if (($qode_options_proya['page_transitions'] != "0") && (empty($qode_animation) || ($qode_animation != "no")))
            $has_ajax = true;
        elseif (!empty($qode_animation) && ($qode_animation != "no"))
            $has_ajax = true;

        if ($has_ajax) :
            wp_enqueue_script("ajax", QODE_ROOT."/js/ajax.min.js",array(),false,true);
        endif;
        wp_enqueue_script( 'wpb_composer_front_js' );

        if(isset($qode_options_proya['use_recaptcha']) && $qode_options_proya['use_recaptcha'] == "yes") :
        wp_enqueue_script("recaptcha_ajax", "http://www.google.com/recaptcha/api/js/recaptcha_ajax.js",array(),false,true);
        endif;

		//is toolbar enabled?
		if(isset($qode_toolbar)) {
			//include toolbar specific script
			wp_enqueue_script("qode_toolbar", QODE_ROOT."/js/toolbar.js",array(),false,true);
		}

		//is landing enabled?
		if(isset($qode_landing)) {
			wp_enqueue_script("mixitup", get_home_url() . "/demo-files/landing/js/jquery.mixitup.js",array(),false,true);
			wp_enqueue_script("mixitup_pagination", get_home_url() . "/demo-files/landing/js/jquery.mixitup-pagination.js",array(),false,true);
            wp_enqueue_script("qode_cookie", get_home_url() . "/demo-files/landing/js/js.cookie.js",array(),false,true);
            wp_enqueue_script("qode_landing", get_home_url() . "/demo-files/landing/js/landing_default.js",array(),false,true);
		}

        //is tour popup enabled?
        if(isset($qode_tour_popup)) {
            wp_enqueue_script("qode_cookie", get_home_url() . "/demo-files/landing/js/js.cookie.js",array(),false,true);
            wp_enqueue_script("qode_tour_popup", get_home_url() . "/demo-files/landing/js/tour_popup_default.js",array(),false,true);
        }

        if($woocommerce) {
            wp_enqueue_script("woocommerce-qode", QODE_ROOT."/js/woocommerce.js",array(),false,true);
            wp_enqueue_script("select2", QODE_ROOT."/js/select2.min.js",array(),false,true);
        }
    }

	add_action('wp_enqueue_scripts', 'qode_scripts');
}
/*Because of the bug when Revolution slider, Layer Slider and Smooth Scroll are enabled together (greensock.js doesn't have included ScrollTo so it need to be included before)*/

if(!function_exists('qode_scrollto_script')) {

	function qode_scrollto_script(){

		global $qode_options_proya;

		$smooth_scroll = true;
		if(isset($qode_options_proya['smooth_scroll']) && $qode_options_proya['smooth_scroll'] == "no"){
			$smooth_scroll = false;
		}
		$mac_os = strpos($_SERVER['HTTP_USER_AGENT'], "Macintosh; Intel Mac OS X");
		if($smooth_scroll && $mac_os == false && qode_layer_slider_installed() && qode_revolution_slider_installed()) {
			wp_enqueue_script("ScrollToPlugin", QODE_ROOT . "/js/ScrollToPlugin.min.js", array(), false, false);
		}
	}

	add_action('wp_enqueue_scripts', 'qode_scrollto_script', 1);

}
if(!function_exists('qode_init_page_id')) {
	/**
	 * Function that sets global $qode_page_id variable
	 */
	function qode_init_page_id() {
		global $wp_query;
		global $qode_page_id;

		$qode_page_id = $wp_query->get_queried_object_id();
	}

	add_action('get_header', 'qode_init_page_id');
}

/* Add admin js and css */

if (!function_exists('qode_admin_jquery')) {
    function qode_admin_jquery() {
        wp_enqueue_script('jquery');
        wp_enqueue_style('style', QODE_ROOT.'/css/admin/admin-style.css', false, '1.0', 'screen');
        wp_enqueue_style('colorstyle', QODE_ROOT.'/css/admin/colorpicker.css', false, '1.0', 'screen');
        wp_register_script('colorpickerss', QODE_ROOT.'/js/admin/colorpicker.js', array('jquery'), '1.0.0', false );
        wp_enqueue_script('colorpickerss');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('thickbox');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_register_script('default', QODE_ROOT.'/js/admin/default.js', array('jquery'), '1.0.0', false );
        wp_enqueue_script('default');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
    }
}
add_action('admin_enqueue_scripts', 'qode_admin_jquery');

if (!isset( $content_width )) $content_width = 1060;

/* Register Menus */

if (!function_exists('qode_register_menus')) {
	/**
	 * Function that registers menu positions
	 */
	function qode_register_menus() {
		global $qode_options_proya;

		if((isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] != "stick_with_left_right_menu") || (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes")){
			//header and left menu location
			register_nav_menus(
				array('top-navigation' => __( 'Top Navigation', 'qode')
				)
			);
		}

		//popup menu location
		register_nav_menus(
			array('popup-navigation' => __( 'Fullscreen Navigation', 'qode')
			)
		);

		if((isset($qode_options_proya['header_bottom_appearance']) && $qode_options_proya['header_bottom_appearance'] == "stick_with_left_right_menu") && (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "no")){
			//header left menu location
			register_nav_menus(
				array('left-top-navigation' => __( 'Left Top Navigation', 'qode')
				)
			);

			//header right menu location
			register_nav_menus(
				array('right-top-navigation' => __( 'Right Top Navigation', 'qode')
				)
			);
		}
	}

	add_action( 'after_setup_theme', 'qode_register_menus' );
}

if(!function_exists('qode_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function qode_theme_setup() {
        //add post formats support
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add feedlinks support
        add_theme_support( 'automatic-feed-links' );

        //add theme support for post thumbnails
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'portfolio-square', 570, 570, true );
        add_image_size( 'portfolio-portrait', 600, 800, true );
        add_image_size( 'portfolio-landscape', 800, 600, true );
        add_image_size( 'menu-featured-post', 345, 198, true );
        add_image_size( 'qode-carousel_slider', 400, 260, true );
        add_image_size( 'portfolio_slider', 500, 380, true );
        add_image_size( 'portfolio_masonry_regular', 500, 500, true );
        add_image_size( 'portfolio_masonry_wide', 1000, 500, true );
        add_image_size( 'portfolio_masonry_tall', 500, 1000, true );
        add_image_size( 'portfolio_masonry_large', 1000, 1000, true );
        add_image_size( 'portfolio_masonry_with_space', 700);
        add_image_size( 'latest_post_boxes', 539, 303, true );

        //enable rendering shortcodes in widgets
        add_filter('widget_text', 'do_shortcode');

        //enable rendering shortcodes in post excerpt
        //add_filter( 'the_excerpt', 'do_shortcode');

        //enable rendering shortcodes in call to action
        add_filter( 'call_to_action_widget', 'do_shortcode');

        load_theme_textdomain( 'qode', get_template_directory().'/languages' );
    }

    add_action('after_setup_theme', 'qode_theme_setup');
}

if (!function_exists('ajax_classes')) {
	/**
	 * Function that adds classes for ajax animation on body element
	 * @param $classes array of current body classes
 	 * @return array array of changed body classes
	 */
	function ajax_classes($classes) {
		global $qode_options_proya;
		$qode_animation="";
		if (isset($_SESSION['qode_animation'])) $qode_animation = $_SESSION['qode_animation'];
		if(($qode_options_proya['page_transitions'] === "0") && ($qode_animation == "no")) :
			$classes[] = '';
		elseif($qode_options_proya['page_transitions'] === "1" && (empty($qode_animation) || ($qode_animation != "no"))) :
			$classes[] = 'ajax_updown';
			$classes[] = 'page_not_loaded';
		elseif($qode_options_proya['page_transitions'] === "2" && (empty($qode_animation) || ($qode_animation != "no"))) :
			$classes[] = 'ajax_fade';
			$classes[] = 'page_not_loaded';
		elseif($qode_options_proya['page_transitions'] === "3" && (empty($qode_animation) || ($qode_animation != "no"))) :
			$classes[] = 'ajax_updown_fade';
			$classes[] = 'page_not_loaded';
		elseif($qode_options_proya['page_transitions'] === "4" && (empty($qode_animation) || ($qode_animation != "no"))) :
			$classes[] = 'ajax_leftright';
			$classes[] = 'page_not_loaded';
		elseif(!empty($qode_animation) && $qode_animation != "no") :
			$classes[] = 'page_not_loaded';
		else:
		$classes[] ="";
		endif;

		return $classes;
	}

	add_filter('body_class','ajax_classes');
}

/* Add class on body boxed layout */

if (!function_exists('boxed_class')) {
	/**
	 * Function that adds class on body for boxed layout
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function boxed_class($classes) {
		global $qode_options_proya;

		if(isset($qode_options_proya['boxed']) && $qode_options_proya['boxed'] == "yes" && isset($qode_options_proya['transparent_content']) && $qode_options_proya['transparent_content'] == 'no') :
			$classes[] = 'boxed';
		else:
		$classes[] ="";
		endif;

		return $classes;
	}

	add_filter('body_class','boxed_class');
}


/* Add class on body for vertical menu */

if (!function_exists('vertical_menu_class')) {

	/**
	 * Function that adds classes on body element for vertical menu
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function vertical_menu_class($classes) {
		global $qode_options_proya;
        global $wp_query;
		
		if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] =='yes') {
            $classes[] = 'vertical_menu_enabled';

            //left menu type class?
            if(isset($qode_options_proya['vertical_area_type']) && $qode_options_proya['vertical_area_type'] != '') {
                switch ($qode_options_proya['vertical_area_type']) {
                    case 'hidden':
                        $classes[] = ' vertical_menu_hidden';
						if(isset($qode_options_proya['vertical_logo_bottom']) && $qode_options_proya['vertical_logo_bottom'] !== '') {
							$classes[] = 'vertical_menu_hidden_with_logo';
						}
                        break;
                }
            }
		
			if(isset($qode_options_proya['vertical_area_type']) && $qode_options_proya['vertical_area_type'] =='hidden') {		
				if(isset($qode_options_proya['vertical_area_width']) && $qode_options_proya['vertical_area_width']=='width_290'){
					 $classes[] = ' vertical_menu_width_290';
				}
				elseif(isset($qode_options_proya['vertical_area_width']) && $qode_options_proya['vertical_area_width']=='width_350'){
					 $classes[] = ' vertical_menu_width_350';
				} 
				elseif(isset($qode_options_proya['vertical_area_width']) && $qode_options_proya['vertical_area_width']=='width_400'){
					 $classes[] = ' vertical_menu_width_400';
				} 
				else{
					$classes[] = ' vertical_menu_width_260';
				}
			}
			
        }

        $id = $wp_query->get_queried_object_id();

		if(qode_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}

        if(isset($qode_options_proya['vertical_area_transparency']) && $qode_options_proya['vertical_area_transparency'] =='yes' && get_post_meta($id, "qode_page_vertical_area_transparency", true) != "no"){
            $classes[] = ' vertical_menu_transparency vertical_menu_transparency_on';
        }else if(get_post_meta($id, "qode_page_vertical_area_transparency", true) == "yes"){
            $classes[] = ' vertical_menu_transparency vertical_menu_transparency_on';
        }

		return $classes;
    }

	add_filter('body_class','vertical_menu_class');
}

if (!function_exists('elements_animation_on_touch_class')) {
	/**
	 * Function that adds classes on body element for disabled animations on touch devices
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function elements_animation_on_touch_class($classes) {
		global $qode_options_proya;

		$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
										'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
										'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );

		if(isset($qode_options_proya['elements_animation_on_touch']) && $qode_options_proya['elements_animation_on_touch'] == "no" && $isMobile == true) :
			$classes[] = 'no_animation_on_touch';
		else:
		$classes[] ="";
		endif;

		return $classes;
	}

	add_filter('body_class','elements_animation_on_touch_class');
}

/* Add class on body for content negative margin */

if (!function_exists('content_negative_margin')) {

	/**
	 * Function that adds classes on body element for negative margin for content
	 * @param $classes array of current body classes
	 * @return array array of changed body classes
	 */
	function content_negative_margin($classes) {
        global $qode_options_proya;


        if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] =='no' && isset($qode_options_proya['move_content_up']) && $qode_options_proya['move_content_up'] == 'yes'){
            $classes[] = 'content_top_margin';
        }


        return $classes;
    }

	add_filter('body_class','content_negative_margin');
}

if(!function_exists('qode_hidden_title_body_class')) {
	/**
	 * Function that adds class to body element if title is hidden for current page
	 * @param $classes array of currently added classes for body element
	 * @return array array of modified classes
	 */
	function qode_hidden_title_body_class($classes) {
		$page_id = qode_get_page_id();
		if($page_id) {
			if(qode_is_title_hidden()) {
				$classes[] = 'qode-title-hidden';
			}
		}

		return $classes;
	}

	add_filter('body_class', 'qode_hidden_title_body_class');
}

if(!function_exists('qode_paspartu_body_class')) {
    /**
     * Function that adds paspartu class to body.
     * @param $classes array of body classes
     * @return array with paspartu body class added
     */
    function qode_paspartu_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes') {
            $classes[] = 'paspartu_enabled';

            if((isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'yes' && isset($qode_options_proya['paspartu_on_top_fixed']) && $qode_options_proya['paspartu_on_top_fixed'] == 'yes') ||
                (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes')) {
                $classes[] = 'paspartu_on_top_fixed';
            }

            if((isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'yes' && isset($qode_options_proya['paspartu_on_bottom_fixed']) && $qode_options_proya['paspartu_on_bottom_fixed'] == 'yes') ||
                (isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes')) {
                $classes[] = 'paspartu_on_bottom_fixed';
            }

            if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'no') {
                $classes[] = 'vertical_menu_outside_paspartu';
            }

            if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] == "yes" && isset($qode_options_proya['vertical_menu_inside_paspartu']) && $qode_options_proya['vertical_menu_inside_paspartu'] == 'yes') {
                $classes[] = 'vertical_menu_inside_paspartu';
            }

        }

        return $classes;
    }

    add_filter('body_class', 'qode_paspartu_body_class');
}

/* Add class on body depending on content width */

if (!function_exists('qode_content_width_class')) {
    /**
     * Function that adds class on body depending on content width
     * @param $classes array of current body classes
     * @return array array of changed body classes
     */
    function qode_content_width_class($classes){
        global $qode_options_proya;

        $classes[] = "";
        if (isset($qode_options_proya['initial_content_width']) && $qode_options_proya['initial_content_width'] !== "grid_1100") {
            $classes[] = 'qode_' . $qode_options_proya['initial_content_width'];
        }
        return $classes;
    }

    add_filter('body_class','qode_content_width_class');
}

if(!function_exists('qode_side_menu_body_class')) {
	/**
	 * Function that adds body classes for different side menu styles
	 * @param $classes array original array of body classes
	 * @return array modified array of classes
	 */
    function qode_side_menu_body_class($classes) {
            global $qode_options_proya;

			if(isset($qode_options_proya['enable_side_area']) && $qode_options_proya['enable_side_area'] == 'yes') {
										
					if(isset($qode_options_proya['side_area_type']) && $qode_options_proya['side_area_type'] == 'side_menu_slide_from_right') {
						$classes[] = 'side_menu_slide_from_right';
					}

					else if(isset($qode_options_proya['side_area_type']) && $qode_options_proya['side_area_type'] == 'side_menu_slide_with_content') {
						$classes[] = 'side_menu_slide_with_content';
						$classes[] = $qode_options_proya['side_area_slide_with_content_width'];
				   }
				   
				   else {
						$classes[] = 'side_area_uncovered_from_content';
					}
			}

        return $classes;
    }

    add_filter('body_class', 'qode_side_menu_body_class');
}

if(!function_exists('qode_full_screen_menu_body_class')) {
    /**
     * Function that adds body classes for different full screen menu types
     * @param $classes array original array of body classes
     * @return array modified array of classes
     */
    function qode_full_screen_menu_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['enable_popup_menu']) && $qode_options_proya['enable_popup_menu'] == 'yes') {
            if(isset($qode_options_proya['popup_menu_animation_style']) && !empty($qode_options_proya['popup_menu_animation_style'])) {
                $classes[] = 'qode_' . $qode_options_proya['popup_menu_animation_style'];
            }
        }

        return $classes;
    }

    add_filter('body_class', 'qode_full_screen_menu_body_class');
}

if(!function_exists('qode_overlapping_content_body_class')) {
    /**
     * Function that adds transparent content class to body.
     * @param $classes array of body classes
     * @return array with transparent content body class added
     */
    function qode_overlapping_content_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {
            $classes[] = 'overlapping_content';
        }

        return $classes;
    }

    add_filter('body_class', 'qode_overlapping_content_body_class');
}

if(!function_exists('qode_vss_responsive_body_class')) {
    /**
     * Function that adds vertical split slider responsive class to body.
     * @param $classes array of body classes
     * @return array with vertical split slider responsive body class added
     */
    function qode_vss_responsive_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['vss_responsive_advanced']) && $qode_options_proya['vss_responsive_advanced'] == 'yes') {
            $classes[] = 'vss_responsive_adv';
        }

        return $classes;
    }

    add_filter('body_class', 'qode_vss_responsive_body_class');
}

if(!function_exists('qode_footer_responsive_body_class')) {
	/**
     * Function that adds footer responsive class to body.
     * @param $classes array of body classes
     */
    function qode_footer_responsive_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['footer_top_responsive']) && $qode_options_proya['footer_top_responsive'] === 'yes') {
            $classes[] = 'footer_responsive_adv';
        }

        return $classes;
    }

    add_filter('body_class', 'qode_footer_responsive_body_class');
}

if(!function_exists('qode_top_header_responsive_body_class')) {
    function qode_top_header_responsive_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['hide_top_bar_on_mobile']) && $qode_options_proya['hide_top_bar_on_mobile'] === 'yes') {
            $classes[] = 'hide_top_bar_on_mobile_header';
        }

        return $classes;
    }

    add_filter('body_class', 'qode_top_header_responsive_body_class');
}

if(!function_exists('qode_content_sidebar_responsive_body_class')) {
    function qode_content_sidebar_responsive_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['content_sidebar_responsiveness']) && $qode_options_proya['content_sidebar_responsiveness'] === 'yes') {
            $classes[] = 'qode-content-sidebar-responsive';
        }

        return $classes;
    }

    add_filter('body_class', 'qode_content_sidebar_responsive_body_class');
}

if(!function_exists('qode_transparent_content_body_class')) {
    /**
     * Function that adds transparent content class to body.
     * @param $classes array of body classes
     * @return array with transparent content body class added
     */
    function qode_transparent_content_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['transparent_content']) && $qode_options_proya['transparent_content'] == 'yes') {
            $classes[] = 'transparent_content';
        }

        return $classes;
    }

    add_filter('body_class', 'qode_transparent_content_body_class');
}

if(!function_exists('qode_is_title_hidden')) {
	/**
	 * Function that check is title hidden on current page
	 * @param none
	 * @return true/false
	 */
	function qode_is_title_hidden() {
		global $qode_options_proya;
		$page_id = qode_get_page_id();

		$hide_page_title_area = false;
		if(get_post_meta($page_id, "qode_show-page-title", true) === 'yes'){
			$hide_page_title_area = true;
		}elseif(get_post_meta($page_id, "qode_show-page-title", true) === 'no'){
			$hide_page_title_area = false;
		}else{
			if(isset($qode_options_proya['dont_show_page_title']) && ($qode_options_proya['dont_show_page_title'] === 'yes')){
				$hide_page_title_area = true;
			}elseif(isset($qode_options_proya['dont_show_page_title']) && ($qode_options_proya['dont_show_page_title'] === 'no')){
				$hide_page_title_area = false;
			}
		}

		return $hide_page_title_area;
	}
}

if(!function_exists('qode_is_title_text_hidden')) {
	/**
	 * Function that check is title text hidden on current page
	 * @param none
	 * @return true/false
	 */
	function qode_is_title_text_hidden() {
		global $qode_options_proya;
		$page_id = qode_get_page_id();

		$hide_page_title_text = false;
		if(get_post_meta($page_id, "qode_show-page-title-text", true) === 'yes'){
			$hide_page_title_text = true;
		}elseif(get_post_meta($page_id, "qode_show-page-title-text", true) === 'no'){
			$hide_page_title_text = false;
		}else{
			if(isset($qode_options_proya['dont_show_page_title_text']) && ($qode_options_proya['dont_show_page_title_text'] === 'yes')){
				$hide_page_title_text = true;
			}elseif(isset($qode_options_proya['dont_show_page_title_text']) && ($qode_options_proya['dont_show_page_title_text'] === 'no')){
				$hide_page_title_text = false;
			}
		}
		return $hide_page_title_text;
	}
}

if(!function_exists('qode_is_content_below_header')) {
	/**
	 * Function that check is content below header on page
	 * @param none
	 * @return true/false
	 */
	function qode_is_content_below_header() {
		global $qode_options_proya;
		$page_id = qode_get_page_id();

		$content_below_header = false;
		if(get_post_meta($page_id, "qode_enable_content_top_margin", true) === 'yes'){
			$content_below_header = true;
		}elseif(get_post_meta($page_id, "qode_enable_content_top_margin", true) === 'no'){
			$content_below_header = false;
		}else{
			if(isset($qode_options_proya['enable_content_top_margin']) && ($qode_options_proya['enable_content_top_margin'] === 'yes')){
				$content_below_header = true;
			}elseif(isset($qode_options_proya['enable_content_top_margin']) && ($qode_options_proya['enable_content_top_margin'] === 'no')){
				$content_below_header = false;
			}
		}

		return $content_below_header;
	}
}

/* Excerpt more */

if (!function_exists('qode_excerpt_more')) {
	/**
	 * Function that adds three dots on excerpt
	 * @param $more string current more string
	 * @return string changed more string
	 */
	function qode_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'qode_excerpt_more');
}

if (!function_exists('qode_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 * @param $length int original value
	 * @return int changed value
	 */
	function qode_excerpt_length( $length ) {
		global $qode_options_proya;
		if($qode_options_proya['number_of_chars']){
			 return $qode_options_proya['number_of_chars'];
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'qode_excerpt_length', 999 );
}

if (!function_exists('the_excerpt_max_charlength')) {
	/**
	 * Function that sets character length for social share shortcode
	 * @param $charlength string original text
	 * @return string shortened text
	 */
	function the_excerpt_max_charlength($charlength) {
		global $qode_options_proya;
		if(isset($qode_options_proya['twitter_via']) && !empty($qode_options_proya['twitter_via'])) {
			$via = " via " . $qode_options_proya['twitter_via'] . " ";
		} else {
			$via = 	"";
		}
		$excerpt = get_the_excerpt();
		$charlength = 140 - (mb_strlen($via) + $charlength);

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength);
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut );
			} else {
				return $subex;
			}
		} else {
			return $excerpt;
		}
	}
}

if(!function_exists('qode_excerpt')) {
	/**
	* Function that cuts post excerpt to the number of word based on previosly set global
	* variable $word_count, which is defined in qode_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 * @changed in 4.3 version
	*/
	function qode_excerpt() {
		global $qode_options_proya, $word_count, $post;

		//does current post has read more tag set?
		if(qode_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			echo get_the_content('');
		}

		//is word count set to something different that 0?
        elseif($word_count != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
            $word_count = isset($word_count) && $word_count !== "" ? $word_count : $qode_options_proya['number_of_chars'];

			//if post excerpt field is filled take that as post excerpt, else that content of the post
            $post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
            $clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode (' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

				//add exerpt postfix
				$excert_postfix		= apply_filters('qode_excerpt_postfix', '...');

				//and finally implode words together
				$excerpt 			= implode (' ', $excerpt_word_array).$excert_postfix;

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p itemprop="description" class="post_excerpt">'.$excerpt.'</p>';
				}
			}
        }
	}
}

if(!function_exists('qode_set_blog_word_count')) {
	/**
	* Function that sets global blog word count variable used by qode_excerpt function
	*/
	function qode_set_blog_word_count($word_count_param) {
		global $word_count;

		$word_count = $word_count_param;
	}
}

/* Use slider instead of image for post */

if (!function_exists('slider_blog')) {
    function slider_blog($post_id) {
        $sliders = get_post_meta($post_id, "qode_sliders", true);
        $slider = $sliders[1];
        if($slider) {
            $html = "";
            $html .= '<div class="flexslider"><ul class="slides">';
            $i=0;
            while (isset($slider[$i])){
                $slide = $slider[$i];

                $href = $slide[link];
                $baseurl = home_url();
                $baseurl = str_replace('http://', '', $baseurl);
                $baseurl = str_replace('www', '', $baseurl);
                $host = parse_url($href, PHP_URL_HOST);
                if($host != $baseurl) {
                    $target = 'target="_blank"';
                }
                else {
                    $target = 'target="_self"';
                }

                $html .= '<li class="slide ' . $slide[imgsize] . '">';
                $html .= '<div class="image"><img src="' . $slide[img] . '" alt="' . $slide[title] . '" /></div>';

                $html .= '</li>';
                $i++;
            }
            $html .= '</ul></div>';
        }
        return $html;
    }
}


if (!function_exists('compareSlides')) {
	function compareSlides($a, $b){
		if (isset($a['ordernumber']) && isset($b['ordernumber'])) {
		if ($a['ordernumber'] == $b['ordernumber']) {
			return 0;
		}
		return ($a['ordernumber'] < $b['ordernumber']) ? -1 : 1;
	  }
	  return 0;
	}
}

if (!function_exists('comparePortfolioImages')) {
	/**
	 * Function that compares two portfolio image for sorting
	 * @param $a int first image
	 * @param $b int second image
	 * @return int result of comparison
	 */
	function comparePortfolioImages($a, $b) {
		if (isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
		if ($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
			return 0;
		}
		return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
	  }
	  return 0;
	}
}

if (!function_exists('comparePortfolioOptions')) {
	/**
	 * Function that compares two portfolio options for sorting
	 * @param $a int first option
	 * @param $b int second option
	 * @return int result of comparison
	 */
	function comparePortfolioOptions($a, $b){
		if (isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
		if ($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
			return 0;
		}
		return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
	  }
	  return 0;
	}
}

if (!function_exists('getPortfolionavigationPostCategoryAndTitle')) {
    /**
     * Function that compares two portfolio options for sorting
     * @param $post
     * @return html of navigation
     */
    function getPortfolionavigationPostCategoryAndTitle($post){
        $html_info = '<span class="post_info">';
        $categories = wp_get_post_terms($post->ID, 'portfolio_category');
        $html_info .= '<span class="categories">';
        $k = 1;
        foreach ($categories as $cat) {
            $html_info .= $cat->name;
            if (count($categories) != $k) {
                $html_info .= ', ';
            }
            $k++;
        }
        $html_info .= '</span>';

        if($post->post_title != '') {
            $html_info .= '<span class="h5">'.$post->post_title.'</span>';
        }
        $html_info .= '</span>';
        return $html_info;
    }
}

if (!function_exists('qode_gallery_upload_get_images')) {
	/**
	 * Function that outputs gallery list item for portfolio in portfolio admin page
	 *
	 */
	function qode_gallery_upload_get_images() {
		$ids=$_POST['ids'];
		$ids=explode(",",$ids);
		foreach($ids as $id):
			$image = wp_get_attachment_image_src($id,'thumbnail', true);
			echo '<li class="qode-gallery-image-holder"><img src="'.$image[0].'"/></li>';
		endforeach;
		exit;
	}

	add_action( 'wp_ajax_qode_gallery_upload_get_images', 'qode_gallery_upload_get_images');
}

if (!function_exists('qode_generate_dynamic_css_and_js')){
	/**
	 * Function that gets content of dynamic assets files and puts that in static ones
	 */
	function qode_generate_dynamic_css_and_js() {

		$qode_options_proya = get_option('qode_options_proya');
		if(qode_is_css_folder_writable()) {
			$css_dir = get_template_directory().'/css/';

			ob_start();
			include_once('css/style_dynamic.php');
			$css = ob_get_clean();
			file_put_contents($css_dir.'style_dynamic.css', $css, LOCK_EX);

			ob_start();
			include_once('css/style_dynamic_responsive.php');
			$css = ob_get_clean();
			file_put_contents($css_dir.'style_dynamic_responsive.css', $css, LOCK_EX);

			ob_start();
			include_once('css/custom_css.php');
			$css = ob_get_clean();
			file_put_contents($css_dir.'custom_css.css', $css, LOCK_EX);
		}

		if(qode_is_js_folder_writable()) {
			$js_dir = get_template_directory().'/js/';

			ob_start();
			include_once('js/default_dynamic.php');
			$js = ob_get_clean();
			file_put_contents($js_dir.'default_dynamic.js', $js, LOCK_EX);

			ob_start();
			include_once('js/custom_js.php');
			$js = ob_get_clean();
			file_put_contents($js_dir.'custom_js.js', $js, LOCK_EX);
		}
	}

	if(!is_multisite()) {
		add_action('qode_after_theme_option_save', 'qode_generate_dynamic_css_and_js');
	}
}

if (!function_exists('qode_hex2rgb')) {
	/**
	 * Function that transforms hex color to rgb color
	 * @param $hex string original hex string
	 * @return array array containing three elements (r, g, b)
	 */
	function qode_hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}
}

if(!function_exists('qode_addslashes')) {
	/**
	 * Function that checks if magic quotes are turned on (for older versions of php) and returns escaped string
	 * @param $str string string to be escaped
	 * @return string escaped string
	 */
	function qode_addslashes($str) {
		
		$str = addslashes($str);
		
		return $str;
	}
}

if(!function_exists('qode_is_archive_page')) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function qode_is_archive_page() {
		return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
	}
}

if(!function_exists('qode_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function qode_is_woocommerce_installed() {
		return function_exists('is_woocommerce');
	}
}

if(!function_exists('qode_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function qode_is_woocommerce_page() {
		return function_exists('is_woocommerce') && is_woocommerce();
	}
}

if(!function_exists('qode_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function qode_is_woocommerce_shop() {
		return function_exists('is_shop') && is_shop();
	}
}

if(!function_exists('qode_is_product_category')) {
	function qode_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if(!function_exists('qode_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function qode_get_woo_shop_page_id() {
		if(qode_is_woocommerce_installed()) {
			return get_option('woocommerce_shop_page_id');
		}
 	}
}

if(!function_exists('qode_woocommerce_columns_class')) {
    /**
     * Function that adds number of columns class to header tag
     * @param array array of classes from main filter
     * @return array array of classes with added bottom header appearance class
     */
    function qode_woocommerce_columns_class($classes) {
        global $qode_options_proya;

        if (qode_is_woocommerce_installed()) {
            $products_list_number = 'columns-4';
            if(isset($qode_options_proya['woo_products_list_number'])){
                $products_list_number = $qode_options_proya['woo_products_list_number'];
            }

            $classes[]= $products_list_number;
        }

        return $classes;
    }

    add_filter('body_class', 'qode_woocommerce_columns_class');
}


if(!function_exists('qode_woocommerce_single_type')) {
	function qode_woocommerce_single_type() {
		$type = '';
		if (qode_is_woocommerce_installed()) {
			$type = qode_options()->getOptionValue('woo_product_single_type');
		}
		return $type;
	}
}

if(!function_exists('qode_woocommerce_single_type_class')) {
	/**
	 * Function that adds single type on body
	 * @param array array of classes from main filter
	 * @return array array of classes with added  single type class
	 */
	function qode_woocommerce_single_type_class($classes) {

		if (qode_is_woocommerce_installed()) {
			$type = qode_woocommerce_single_type();
			if(!empty($type)) {
				$class = 'qode-product-single-' . $type;
				$classes[]= $class;
			}
		}

		return $classes;
	}

	add_filter('body_class', 'qode_woocommerce_single_type_class');
}

if(!function_exists('qode_get_page_template_name')) {
	/**
	 * Returns current template file name without extension
	 * @return string name of current template file
	 */
	function qode_get_page_template_name() {
		$file_name = '';
		$file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

		if($file_name_without_ext !== '') {
			$file_name = $file_name_without_ext;
		}

		return $file_name;
	}
}

if(!function_exists('qode_is_contact_page_template')) {
	/**
	 * Checks if current template page is contact page.
	 * @param string current page. Optional parameter. If not passed qode_get_page_template_name() function will be used
	 * @return bool
	 *
	 * @see qode_get_page_template_name()
	 */
	function qode_is_contact_page_template($current_page = '') {
		if($current_page == '') {
			$current_page = qode_get_page_template_name();
		}

		return in_array($current_page, array('contact-page'));
	}
}

if(!function_exists('qode_has_shortcode')) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 * @return bool whether content has shortcode or not
	 */
	function qode_has_shortcode($shortcode, $content = '') {
		$has_shortcode = false;

		if ($shortcode) {
			//if content variable isn't past
			if($content == '') {
				//take content from current post
				$current_post = get_post(get_the_ID());
				$content = $current_post->post_content;
			}

			//does content has shortcode added?
			if (stripos($content, '[' . $shortcode) !== false) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if(!function_exists('qode_has_google_map_shortcode')) {
	/**
	 * Function that checks Qode Google Map shortcode exists on a page
	 * @return bool
	 */
	function qode_has_google_map_shortcode() {
		$google_map_shortcode = 'qode_google_map';

		$slider_field = get_post_meta(qode_get_page_id(), 'qode_revolution-slider', true);

		$has_shortcode = qode_has_shortcode($google_map_shortcode) || qode_has_shortcode($google_map_shortcode, $slider_field);

		if($has_shortcode) {
			return true;
		}

		return false;
	}
}

if(!function_exists('qode_rgba_color')) {
	/**
	 * Function that generates rgba part of css color property
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 * @return string generated rgba string
	 */
	function qode_rgba_color($color, $transparency) {
		if($color !== '' && $transparency !== '') {
			$rgba_color = '';

			$rgb_color_array = qode_hex2rgb($color);
			$rgba_color .= 'rgba('.implode(', ', $rgb_color_array).', '.$transparency.')';

			return $rgba_color;
		}
	}
}

if (!function_exists('theme_version_class')) {
	/**
	 * Function that adds classes on body for version of theme
	 *
	 */
	function theme_version_class($classes) {
		$current_theme = wp_get_theme();
		$theme_prefix  = 'qode';

		//is child theme activated?
		if($current_theme->parent()) {
			//add child theme version
			$classes[] = $theme_prefix.'-child-theme-ver-'.$current_theme->get('Version');

			//get parent theme
			$current_theme = $current_theme->parent();
		}

		if($current_theme->exists() && $current_theme->get('Version') != "") {
			$classes[] = $theme_prefix.'-theme-ver-'.$current_theme->get('Version');
		}

		return $classes;
	}

	add_filter('body_class','theme_version_class');
}

if(!function_exists('qode_get_title_text')) {
	/**
	 * Function that returns current page title text. Defines qode_title_text filter
	 * @return string current page title text
	 *
	 * @see is_tag()
	 * @see is_date()
	 * @see is_author()
	 * @see is_category()
	 * @see is_home()
	 * @see is_search()
	 * @see is_404()
	 * @see get_queried_object_id()
	 * @see qode_is_woocommerce_installed()
	 *
	 * @since 4.3
	 * @version 0.1
	 *
	 */
	function qode_get_title_text() {
		global $qode_options_proya;

		$id 	= get_queried_object_id();
		$title 	= '';

		//is current page tag archive?
		if (is_tag()) {
			//get title of current tag
			$title = single_term_title("", false)." Tag";
		}

		//is current page date archive?
		elseif (is_date()) {
			//get current date archive format
			$title = get_the_time('F Y');
		}

		//is current page author archive?
		elseif (is_author()) {
			//get current author name
			$title = __('Author:', 'qode') . " " . get_the_author();
		}

		//us current page category archive
		elseif (is_category()) {
			//get current page category title
			$title = single_cat_title('', false);
		}

		//is current page blog post page and front page? Latest posts option is set in Settings -> Reading
		elseif (is_home() && is_front_page()) {
			//get site name from options
			$title = get_option('blogname');
		}

		//is current page search page?
		elseif (is_search()) {
			//get title for search page
			$title = __('Search', 'qode');
		}

		//is current page 404?
		elseif (is_404()) {
			//is 404 title text set in theme options?
			if($qode_options_proya['404_title'] != "") {
				//get it from options
				$title = $qode_options_proya['404_title'];
			} else {
				//get default 404 page title
				$title = __('404 - Page not found', 'qode');
			}
		}

		//is WooCommerce installed and is shop or single product page?
		elseif(qode_is_woocommerce_installed() && (qode_is_woocommerce_shop() || is_singular('product'))) {
			//get shop page id from options table
			$shop_id = get_option('woocommerce_shop_page_id');

			//get shop page and get it's title if set
			$shop = get_post($shop_id);
			if(isset($shop->post_title) && $shop->post_title !== '') {
				$title = $shop->post_title;
			}

		}

		//is WooCommerce installed and is current page product archive page?
		elseif(qode_is_woocommerce_installed() && (is_product_category() || is_product_tag())) {
			global $wp_query;

			//get current taxonomy and it's name and assign to title
			$tax 			= $wp_query->get_queried_object();
			$category_title = $tax->name;
			$title 			= $category_title;
		}

		//is current page some archive page?
		elseif (is_archive()) {
			$title = __('Archive','qode');
		}

		//current page is regular page
		else {
			$title = get_the_title($id);
		}

		$title = apply_filters('qode_title_text', $title);

		return $title;
	}
}

if(!function_exists('qode_title_text')) {
	/**
	 * Function that echoes title text.
	 *
	 * @see qode_get_title_text()
	 *
	 * @since 4.3
	 * @version 0.1
	 */
	function qode_title_text() {
		echo qode_get_title_text();
	}
}

if(!function_exists('qode_wp_title')) {
	/**
	 * Function that sets page's title. Hooks to wp_title filter
	 * @param $title string current page title
	 * @param $sep string title separator
	 * @return string changed title text if SEO plugins aren't installed
	 *
	 * @since 5.0
	 * @version 0.3
	 */
	function qode_wp_title($title, $sep) {
		global $qode_options_proya;

		//is SEO plugin installed?
		if(qode_seo_plugin_installed()) {
			//don't do anything, seo plugin will take care of it
		} else {
			//get current post id
			$id = qode_get_page_id();

			$sep = ' | ';
			$title_prefix = get_bloginfo('name');
			$title_suffix = '';

			//set unchanged title variable so we can use it later
			$unchanged_title = $title;

			//is qode seo enabled?
			if(isset($qode_options_proya['disable_qode_seo']) && $qode_options_proya['disable_qode_seo'] !== 'yes') {
				//get current post seo title
				$seo_title = get_post_meta($id, "qode_seo_title", true);

				//is current post seo title set?
				if($seo_title !== '') {
					$title_suffix = $seo_title;
				}
			}

			//title suffix is empty, which means that it wasn't set by qode seo
			if(empty($title_suffix)) {
				//if current page is front page append site description, else take original title string
				$title_suffix = is_front_page() ? get_bloginfo('description') : $unchanged_title;
			}

			//concatenate title string
			$title  = $title_prefix.$sep.$title_suffix;

			//return generated title string
			return $title;
		}
	}

	add_filter('wp_title', 'qode_wp_title', 10, 2);
}

if(!function_exists('qode_ajax_meta')) {
	/**
	 * Function that echoes meta data for ajax
	 *
	 * @since 5.0
	 * @version 0.2
	 */
	function qode_ajax_meta() {
		global $qode_options_proya;

        ?>

        <div class="seo_title"><?php wp_title(''); ?></div>

        <?php

        if(isset($qode_options_proya['disable_qode_seo']) && $qode_options_proya['disable_qode_seo'] == 'no') {
            $seo_description = get_post_meta(qode_get_page_id(), "qode_seo_description", true);
            $seo_keywords = get_post_meta(qode_get_page_id(), "qode_seo_keywords", true);
            ?>



            <?php if ($seo_description !== '') { ?>
                <div class="seo_description"><?php echo $seo_description; ?></div>
            <?php } else if ($qode_options_proya['meta_description']) { ?>
                <div class="seo_description"><?php echo $qode_options_proya['meta_description']; ?></div>
            <?php } ?>
            <?php if ($seo_keywords !== '') { ?>
                <div class="seo_keywords"><?php echo $seo_keywords; ?></div>
            <?php } else if ($qode_options_proya['meta_keywords']) { ?>
                <div class="seo_keywords"><?php echo $qode_options_proya['meta_keywords']; ?></div>
            <?php }
        }
	}

	add_action('qode_ajax_meta', 'qode_ajax_meta');
}

if(!function_exists('qode_header_meta')) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function qode_header_meta() {
		global $qode_options_proya;

		if(isset($qode_options_proya['disable_qode_seo']) && $qode_options_proya['disable_qode_seo'] == 'no') {

			$seo_description = get_post_meta(qode_get_page_id(), "qode_seo_description", true);
			$seo_keywords = get_post_meta(qode_get_page_id(), "qode_seo_keywords", true);
			?>

			<?php if($seo_description) { ?>
				<meta name="description" content="<?php echo $seo_description; ?>">
			<?php } else if($qode_options_proya['meta_description']){ ?>
				<meta name="description" content="<?php echo $qode_options_proya['meta_description'] ?>">
			<?php } ?>

			<?php if($seo_keywords) { ?>
				<meta name="keywords" content="<?php echo $seo_keywords; ?>">
			<?php } else if($qode_options_proya['meta_keywords']){ ?>
				<meta name="keywords" content="<?php echo $qode_options_proya['meta_keywords'] ?>">
			<?php }
		}

	}

	add_action('qode_header_meta', 'qode_header_meta');
}

if(!function_exists('qode_user_scalable_meta')) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to qode_header_meta action
	 */
	function qode_user_scalable_meta() {
		global $qode_options_proya;

		//is responsiveness option is chosen?
		if (isset($qode_options_proya['responsiveness']) && $qode_options_proya['responsiveness'] !== 'no') { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<?php }	else { ?>
			<meta name="viewport" content="width=1200,user-scalable=no">
		<?php }
	}

	add_action('qode_header_meta', 'qode_user_scalable_meta');
}

if(!function_exists('qode_get_attachment_meta')) {
	/**
	 * Function that returns attachment meta data from attachment id
	 * @param $attachment_id
	 * @param array $keys sub array of attachment meta
	 * @return array|mixed
	 */
	function qode_get_attachment_meta($attachment_id, $keys = array()) {
		$meta_data = array();

		//is attachment id set?
		if(!empty($attachment_id)) {
			//get all post meta for given attachment id
			$meta_data = get_post_meta($attachment_id, '_wp_attachment_metadata', true);

			//is subarray of meta array keys set?
			if(is_array($keys) && count($keys)) {
				$sub_array = array();

				//for each defined key
				foreach($keys as $key) {
					//check if that key exists in all meta array
					if(array_key_exists($key, $meta_data)) {
						//assign key from meta array for current key to meta subarray
						$sub_array[$key] = $meta_data[$key];
					}
				}

				//we want meta array to be subarray because that is what used wants to get
				$meta_data = $sub_array;
			}
		}

		//return meta array
		return $meta_data;
	}
}

if(!function_exists('qode_get_attachment_id_from_url')) {
	/**
	 * Function that retrieves attachment id for passed attachment url
	 * @param $attachment_url
	 * @return null|string
	 */
	function qode_get_attachment_id_from_url($attachment_url) {
		global $wpdb;
		$attachment_id = '';

		//is attachment url set?
		if($attachment_url !== '') {
			//prepare query
			$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$attachment_url'";

			//get attachment id
			$attachment_id = $wpdb->get_var($query);
		}

		//return it
		return $attachment_id;
	}
}

if(!function_exists('qode_get_attachment_meta_from_url')) {
	/**
	 * Function that returns meta array for give attachment url
	 * @param $attachment_url
	 * @param array $keys sub array of attachment meta
	 * @return array|mixed
	 *
	 * @see qode_get_attachment_id_from_url()
	 * @see qode_get_attachment_meta()
	 *
	 * @version 0.1
	 */
	function qode_get_attachment_meta_from_url($attachment_url, $keys = array()) {
		$attachment_meta = array();

		//get attachment id for attachment url
		$attachment_id 	= qode_get_attachment_id_from_url($attachment_url);

		//is attachment id set?
		if(!empty($attachment_id)) {
			//get post meta
			$attachment_meta = qode_get_attachment_meta($attachment_id, $keys);
		}

		//return post meta
		return $attachment_meta;
	}
}

if(!function_exists('qode_get_image_dimensions')) {
	/**
	 * Function that returns image sizes array. First looks in post_meta table if attachment exists in the database,
	 * if it doesn't than it uses getimagesize PHP function to get image sizes
	 * @param $url string url of the image
	 * @return array array of image sizes that containes height and width
	 *
	 * @see qode_get_attachment_meta_from_url()
	 * @uses getimagesize
	 *
	 * @version 0.1
	 */
	function qode_get_image_dimensions($url) {
		$image_sizes = array();

		//is url passed?
		if($url !== '') {
			//get image sizes from posts meta if attachment exists
			$image_sizes = qode_get_attachment_meta_from_url($url, array('width', 'height'));

			//image does not exists in post table, we have to use PHP way of getting image size
			if(!count($image_sizes)) {
				//can we open file by url?
				if(ini_get('allow_url_fopen') == 1 && file_exists($url)) {
					list($width, $height, $type, $attr) = getimagesize($url);
				} else {
					//we can't open file directly, have to locate it with relative path.
					$image_obj = parse_url($url);
					$image_relative_path = $_SERVER['DOCUMENT_ROOT'].$image_obj['path'];

					if(file_exists($image_relative_path)) {
						list($width, $height, $type, $attr) = getimagesize($image_relative_path);
					}
				}

				//did we get width and height from some of above methods?
				if(isset($width) && isset($height)) {
					//set them to our image sizes array
					$image_sizes = array(
						'width' => $width,
						'height' => $height
					);
				}
			}
		}

		return $image_sizes;
	}
}

if(!function_exists('qode_set_logo_sizes')) {
	/**
	 * Function that sets logo image dimensions to global qode options array so it can be used in the theme
	 */
	function qode_set_logo_sizes() {
		global $qode_options_proya;

		//get logo image size
		$logo_image_sizes = qode_get_image_dimensions($qode_options_proya['logo_image']);
		$qode_options_proya['logo_width'] = 280;
		$qode_options_proya['logo_height'] = 130;

		//is image width and height set?
		if(isset($logo_image_sizes['width']) && isset($logo_image_sizes['height'])) {
			//set those variables in global array
			$qode_options_proya['logo_width'] = $logo_image_sizes['width'];
			$qode_options_proya['logo_height'] = $logo_image_sizes['height'];
		}
	}

	//not used at the moment, so there is no need for action
	//add_action('init', 'qode_set_logo_sizes', 0);
}

if(!function_exists('qode_hide_initial_sticky_body_class')) {
    /**
     * Function that adds hidden initial sticky class to body.
     * @param $classes array of body classes
     * @return hidden initial sticky body class
     */
    function qode_hide_initial_sticky_body_class($classes) {
        global $qode_options_proya;

        if(isset($qode_options_proya['header_bottom_appearance']) && ($qode_options_proya['header_bottom_appearance'] == "stick" || $qode_options_proya['header_bottom_appearance'] == "stick menu_bottom" || $qode_options_proya['header_bottom_appearance'] == "stick_with_left_right_menu")){
			if(get_post_meta(qode_get_page_id(), "qode_page_hide_initial_sticky", true) !== ''){
				if(get_post_meta(qode_get_page_id(), "qode_page_hide_initial_sticky", true) == 'yes'){
					$classes[] = 'hide_inital_sticky';
				}
			}else if(isset($qode_options_proya['hide_initial_sticky']) && $qode_options_proya['hide_initial_sticky'] == 'yes') {
				$classes[] = 'hide_inital_sticky';
			}
        }

        return $classes;
    }

    add_filter('body_class', 'qode_hide_initial_sticky_body_class');
}

if(!function_exists('qode_seo_plugin_installed')) {
	/**
	 * Function that checks if popular seo plugins are installed
	 * @return bool
	 */
	function qode_seo_plugin_installed() {
		//is YOAST installed?
		if(defined('WPSEO_VERSION')) {
			return true;
		}

		return false;
	}
}



if(!function_exists('qode_contact_form_7_installed')) {
	/**
	 * Function that checks if contact form 7 installed
	 * @return bool
	 */
	function qode_contact_form_7_installed() {
		//is Contact Form 7 installed?
		if(defined('WPCF7_VERSION')) {
			return true;
		}

		return false;
	}
}

if(!function_exists('qode_revolution_slider_installed')) {
	/**
	 * Function that checks if revolution slider installed
	 * @return bool
	 */
	function qode_revolution_slider_installed() {
		//is Revolution Slider installed?
		if(class_exists('RevSliderFront')) {
			return true;
		}
		return false;
	}
}

if(!function_exists('qode_layer_slider_installed')) {
	/**
	 * Function that checks if layer slider installed
	 * @return bool
	 */
	function qode_layer_slider_installed() {
		//is Layer Slider installed?
		if(defined('LS_PLUGIN_VERSION')) {
			return true;
		}
		return false;
	}
}

if(!function_exists('qode_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function qode_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('qode_is_main_menu_set')) {
	/**
	 * Function that checks if any of main menu locations are set.
	 * Checks whether top-navigation location is set, or left-top-navigation and right-top-navigation is set
	 * @return bool
	 *
	 * @version 0.1
	 */
	function qode_is_main_menu_set() {
		$has_top_nav = has_nav_menu('top-navigation');
		$has_divided_nav = has_nav_menu('left-top-navigation') && has_nav_menu('right-top-navigation');

		return $has_top_nav || $has_divided_nav;
	}
}

if(!function_exists('qode_remove_yoast_json_on_ajax')) {
	/**
	 * Function that removes yoast json ld script
	 * that stops page transition to work on home page
	 * Hooks to wpseo_json_ld_output in order to disable json ld script
	 * @return bool
     *
     * @param $data array json ld data that is being passed to filter
	 *
	 * @version 0.2
	 */
	function qode_remove_yoast_json_on_ajax($data) {
		//is current request made through ajax?
		if(qode_is_ajax()) {
			//disable json ld script
			return array();
		}

		return $data;
	}

	//is yoast installed and it's version is greater or equal of 1.6?
	if(defined('WPSEO_VERSION') && version_compare(WPSEO_VERSION, '1.6') >= 0) {
		add_filter('wpseo_json_ld_output', 'qode_remove_yoast_json_on_ajax');
	}
}

if(!function_exists('qode_is_ajax')) {
	/**
	 * Function that checks if current request is ajax request
	 * @return bool whether it's ajax request or not
	 *
	 * @version 0.1
	 */
	function qode_is_ajax() {
		return !empty( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ]) && strtolower( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ]) == 'xmlhttprequest';
	}
}

if(!function_exists('qode_is_wpml_installed')) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function qode_is_wpml_installed() {
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if(!function_exists('qode_is_css_folder_writable')) {
	/**
	 * Function that checks if css folder is writable
	 * @return bool
	 *
	 * @version 0.1
	 * @uses is_writable()
	 */
	function qode_is_css_folder_writable() {
		$css_dir = get_template_directory().'/css';

		return is_writable($css_dir);
	}
}

if(!function_exists('qode_is_js_folder_writable')) {
	/**
	 * Function that checks if js folder is writable
	 * @return bool
	 *
	 * @version 0.1
	 * @uses is_writable()
	 */
	function qode_is_js_folder_writable() {
		$js_dir = get_template_directory().'/js';

		return is_writable($js_dir);
	}
}

if(!function_exists('qode_assets_folders_writable')) {
	/**
	 * Function that if css and js folders are writable
	 * @return bool
	 *
	 * @version 0.1
	 * @see qode_is_css_folder_writable()
	 * @see qode_is_js_folder_writable()
	 */
	function qode_assets_folders_writable() {
		return qode_is_css_folder_writable() && qode_is_js_folder_writable();
	}
}

if(!function_exists('qode_writable_assets_folders_notice')) {
	/**
	 * Function that prints notice that css and js folders aren't writable. Hooks to admin_notices action
	 *
	 * @version 0.1
	 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
	 */
	function qode_writable_assets_folders_notice() {
		global $pagenow;

		$is_theme_options_page = isset($_GET['page']) && strstr($_GET['page'], 'qode_theme_menu');

		if($pagenow === 'admin.php' && $is_theme_options_page) {
			if(!qode_assets_folders_writable()) { ?>
				<div class="error">
					<p><?php _e('Note that writing permissions aren\'t set for folders containing css and js files on your server.
					We recommend setting writing permissions in order to optimize your site performance.
					For further instructions, please refer to our <a target="_blank" href="http://demo.qodeinteractive.com/bridge-new-help/#!/getting_started">documentation</a>.', 'qode'); ?></p>
<!--					<p>--><?php //_e('It seams that css and js files in theme folder aren\'t writable.', 'qode'); ?><!--</p>-->
				</div>
			<?php }
		}
	}
	if(!is_multisite()) {
		add_action('admin_notices', 'qode_writable_assets_folders_notice');
	}
}

if(!function_exists('qode_localize_no_ajax_pages')) {
	/**
	 * Function that outputs no_ajax_obj javascript variable that is used default_dynamic.php.
	 * It is used for no ajax pages functionality
	 *
	 * Function hooks to wp_enqueue_scripts and uses wp_localize_script
	 *
	 * @see http://codex.wordpress.org/Function_Reference/wp_localize_script
	 *
	 * @uses qode_get_objects_without_ajax()
	 * @uses qode_get_pages_without_ajax()
	 * @uses qode_get_wpml_pages_for_current_page()
	 * @uses qode_get_woocommerce_pages()
	 *
	 * @version 0.1
	 */
	function qode_localize_no_ajax_pages() {
		global $qode_options_proya;

		//is ajax enabled?
		if(qode_is_ajax_enabled()) {
			$no_ajax_pages = array();

            //get objects that have ajax disabled and merge with main array
			$no_ajax_pages = array_merge($no_ajax_pages, qode_get_objects_without_ajax());

			//is wpml installed?
			if(qode_is_wpml_installed()) {
				//get translation pages for current page and merge with main array
				$no_ajax_pages = array_merge($no_ajax_pages, qode_get_wpml_pages_for_current_page());
			}

			//is woocommerce installed?
			if(qode_is_woocommerce_installed()) {
				//get all woocommerce pages and products and merge with main array
				$no_ajax_pages = array_merge($no_ajax_pages, qode_get_woocommerce_pages());
				$no_ajax_pages = array_merge($no_ajax_pages, qode_get_woocommerce_archive_pages());
			}

			//do we have some internal pages that won't to be without ajax?
			if (isset($qode_options_proya['internal_no_ajax_links'])) {
				//get array of those pages
				$options_no_ajax_pages_array = explode(',', $qode_options_proya['internal_no_ajax_links']);

				if(is_array($options_no_ajax_pages_array) && count($options_no_ajax_pages_array)) {
					$no_ajax_pages = array_merge($no_ajax_pages, $options_no_ajax_pages_array);
				}
			}

			//add logout url to main array
			$no_ajax_pages[] = htmlspecialchars_decode(wp_logout_url());

			//finally localize script so we can use it in default_dynamic
			wp_localize_script( 'default_dynamic', 'no_ajax_obj', array(
				'no_ajax_pages' => $no_ajax_pages
			));
		}
	}

	add_action('wp_enqueue_scripts', 'qode_localize_no_ajax_pages');
}

if(!function_exists('qode_get_woocommerce_pages')) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function qode_get_woocommerce_pages() {
		$woo_pages_array = array();

		if(qode_is_woocommerce_installed()) {
			if(get_option('woocommerce_shop_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option('woocommerce_shop_page_id')); }
			if(get_option('woocommerce_cart_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option('woocommerce_cart_page_id')); }
			if(get_option('woocommerce_checkout_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option('woocommerce_checkout_page_id')); }
			if(get_option('woocommerce_pay_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option(' woocommerce_pay_page_id ')); }
			if(get_option('woocommerce_thanks_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option(' woocommerce_thanks_page_id ')); }
			if(get_option('woocommerce_myaccount_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option(' woocommerce_myaccount_page_id ')); }
			if(get_option('woocommerce_edit_address_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option(' woocommerce_edit_address_page_id ')); }
			if(get_option('woocommerce_view_order_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option(' woocommerce_view_order_page_id ')); }
			if(get_option('woocommerce_terms_page_id') != ''){ $woo_pages_array[] = get_permalink(get_option(' woocommerce_terms_page_id ')); }

			$woo_products = get_posts(array('post_type' => 'product','post_status' => 'publish', 'posts_per_page' => '-1') );

			foreach($woo_products as $product) {
				$woo_pages_array[] = get_permalink($product->ID);
			}
		}

		return $woo_pages_array;
	}
}


if(!function_exists('qode_get_woocommerce_archive_pages')) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function qode_get_woocommerce_archive_pages() {
		$woo_pages_array = array();

		if(qode_is_woocommerce_installed()) {
			$terms = get_terms( array(
				'taxonomy' => array('product_cat','product_tag'),
				'hide_empty' => false,
			) );

			foreach($terms as $term) {
				$woo_pages_array[] = get_term_link($term->term_id);
			}
		}

		return $woo_pages_array;
	}
}

if(!function_exists('qode_get_objects_without_ajax')) {
	/**
	 * Function that returns urls of objects that have ajax disabled.
	 * Works for posts, pages and portfolio pages.
	 * @return array array of urls of posts that have ajax disabled
	 *
	 * @version 0.2
	 */
	function qode_get_objects_without_ajax() {
		$posts_without_ajax = array();

		$posts_args =  array(
			'post_type'  => array('post', 'portfolio_page', 'page'),
			'post_status' => 'publish',
			'meta_key' => 'qode_show-animation',
			'meta_value' => 'no_animation'
		);

		$posts_query = new WP_Query($posts_args);

		if($posts_query->have_posts()) {
			while($posts_query->have_posts()) {
				$posts_query->the_post();
				$posts_without_ajax[] = get_permalink(get_the_ID());
			}
		}

		wp_reset_postdata();

		return $posts_without_ajax;
	}
}

if(!function_exists('qode_get_pages_without_ajax')) {
	/**
	 * Function that returns urls of pages that have ajax disabled
	 * @return array array of urls of pages that have ajax disabled
	 *
	 * @version 0.1
	 */
	function qode_get_pages_without_ajax() {
		$pages_without_ajax = array();

		$pages_args = array(
			'post_type'  => 'page',
			'post_status' => 'publish',
			'meta_key' => 'qode_show-animation',
			'meta_value' => 'no_animation'
		);

		$pages_query = new WP_Query($pages_args);

		if($pages_query->have_posts()) {
			while($pages_query->have_posts()) {
				$pages_query->the_post();
				$pages_without_ajax[] = get_permalink(get_the_ID());
			}
		}

		wp_reset_postdata();

		return $pages_without_ajax;
	}
}

if(!function_exists('qode_get_wpml_pages_for_current_page')) {
	/**
	 * Function that returns urls translated pages for current page.
	 * @return array array of url urls translated pages for current page.
	 *
	 * @version 0.1
	 */
	function qode_get_wpml_pages_for_current_page() {
		$wpml_pages_for_current_page = array();

		if(qode_is_wpml_installed()) {
			$language_pages = icl_get_languages('skip_missing=0');

			foreach($language_pages as $key => $language_page) {
				$wpml_pages_for_current_page[] = $language_page["url"];
			}
		}

		return $wpml_pages_for_current_page;
	}
}

if(!function_exists('qode_is_ajax_enabled')) {
	/**
	 * Function that checks if ajax is enabled.
	 * @return bool
	 *
	 * @version 0.1
	 */
	function qode_is_ajax_enabled() {
		global $qode_options_proya;

		$has_ajax = false;

		if(isset($qode_options_proya['page_transitions']) && $qode_options_proya['page_transitions'] !== '0') {
			$has_ajax = true;
		}

		return $has_ajax;
	}
}

if(!function_exists('qode_is_ajax_header_animation_enabled')) {
    /**
     * Function that checks if header animation with ajax is enabled.
     * @return boolean
     *
     * @version 0.1
     */
    function qode_is_ajax_header_animation_enabled() {
        global $qode_options_proya;

        $has_header_animation = false;

        if(isset($qode_options_proya['page_transitions']) && $qode_options_proya['page_transitions'] !== '0' && isset($qode_options_proya['ajax_animate_header']) && $qode_options_proya['ajax_animate_header'] == 'yes') {
            $has_header_animation = true;
        }

        return $has_header_animation;
    }
}

if(!function_exists('qode_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see qode_is_woocommerce_installed()
	 * @see qode_is_woocommerce_shop()
	 */
	function qode_get_page_id() {
		if(qode_is_woocommerce_installed() && (qode_is_woocommerce_shop() || is_singular('product'))) {
			return qode_get_woo_shop_page_id();
		}

        if(is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}

if(!function_exists('rewrite_rules_on_theme_activation')) {
	/**
	 * Function that sets rewrite rules when our theme is activated
	 */
	function rewrite_rules_on_theme_activation() {
		flush_rewrite_rules();
	}

	add_action( 'after_switch_theme', 'rewrite_rules_on_theme_activation' );
}

if(!function_exists('qode_maintenance_mode')) {
    /**
     * Function that redirects user to desired landing page if maintenance mode is turned on in options
     */
    function qode_maintenance_mode() {
        global $qode_options_proya;
        
        $protocol = is_ssl() ? "https://" : "http://";
        if(isset($qode_options_proya['qode_maintenance_mode']) && $qode_options_proya['qode_maintenance_mode'] == 'yes' && isset($qode_options_proya['qode_maintenance_page']) && $qode_options_proya['qode_maintenance_page'] != ""
        && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))
        && !is_admin()
        && !is_user_logged_in()
        && $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] != get_permalink($qode_options_proya['qode_maintenance_page'])
        ) {

            wp_redirect(get_permalink($qode_options_proya['qode_maintenance_page']));
            exit;
        }
    }

    if(isset($qode_options_proya['qode_maintenance_mode']) && $qode_options_proya['qode_maintenance_mode'] == 'yes') {
        add_action('init', 'qode_maintenance_mode', 1);
    }
}

if(!function_exists('qode_visual_composer_installed')) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function qode_visual_composer_installed() {
		//is Visual Composer installed?
		if(class_exists('WPBakeryVisualComposerAbstract')) {
			return true;
		}

		return false;
	}
}

if(!function_exists('qode_visual_composer_custom_shortcodce_css')){
	function qode_visual_composer_custom_shortcodce_css(){
		if(qode_visual_composer_installed()){
			if(is_page() || is_single() || is_singular('portfolio_page')){
				$shortcodes_custom_css = get_post_meta( qode_get_page_id(), '_wpb_shortcodes_custom_css', true );
				if ( ! empty( $shortcodes_custom_css ) ) {
					echo '<style type="text/css" data-type="vc_shortcodes-custom-css-'.qode_get_page_id().'">';
					echo $shortcodes_custom_css;
					echo '</style>';
				}
				$post_custom_css = get_post_meta( qode_get_page_id(), '_wpb_post_custom_css', true );
				if ( ! empty( $post_custom_css ) ) {
					echo '<style type="text/css" data-type="vc_custom-css-'.qode_get_page_id().'">';
					echo $post_custom_css;
					echo '</style>';
				}
			}
		}
	}
	add_action('qode_visual_composer_custom_shortcodce_css', 'qode_visual_composer_custom_shortcodce_css');
}

if (!function_exists('qode_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function qode_vc_grid_elements_enabled() {

		global $qode_options_proya;
		$vc_grid_enabled = false;

		if (isset($qode_options_proya['enable_grid_elements']) && $qode_options_proya['enable_grid_elements'] == 'yes') {

			$vc_grid_enabled = true;

		}

		return $vc_grid_enabled;

	}

}

if(!function_exists('qode_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function qode_visual_composer_grid_elements() {

		global $qode_options_proya;

		if(!qode_vc_grid_elements_enabled()){

			remove_action( 'init', 'vc_grid_item_editor_create_post_type' );

		}
	}

	add_action('vc_after_init', 'qode_visual_composer_grid_elements', 12);
}

if(!function_exists('qode_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function qode_grid_elements_ajax_disable() {
		global $qode_options_proya;

		if(qode_vc_grid_elements_enabled()) {
			$qode_options_proya['page_transitions'] = '0';
		}
	}

	add_action('wp', 'qode_grid_elements_ajax_disable');
}


if(!function_exists('qode_get_vc_version')) {
    /**
     * Return Visual Composer version string
     *
     * @return bool|string
     */
    function qode_get_vc_version()
    {
        if (qode_visual_composer_installed()) {
            return WPB_VC_VERSION;
        }

        return false;
    }
}

if(!function_exists('qode_get_side_menu_icon_html')) {
    /**
     * Function that outputs html for side area icon opener.
     * Uses $qodeIconCollections global variable
     * @return string generated html
     */
    function qode_get_side_menu_icon_html() {
        global $qodeIconCollections, $qode_options_proya;

        $icon_html = '';

        $icon_pack = qodef_option_get_value('side_area_button_icon_pack');

        if(isset($icon_pack) && $icon_pack !== '') {
            $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
            $icon_field_name = 'side_area_icon_'. $icon_collection_obj->param;

            $side_area_icon = qodef_option_get_value($icon_field_name);

            if(isset($side_area_icon) && $side_area_icon !== ''){

                if (method_exists($icon_collection_obj, 'render')) {
                    $icon_html = $icon_collection_obj->render($side_area_icon);
                }
            }
        }

        return $icon_html;
    }
}

if(!function_exists('qode_get_mobile_menu_icon_html')) {
    /**
     * Function that outputs html for side area icon opener.
     * Uses $qodeIconCollections global variable
     * @return string generated html
     */
    function qode_get_mobile_menu_icon_html() {
        global $qodeIconCollections, $qode_options_proya;

        $icon_html = '';

        $icon_pack = qodef_option_get_value('mobile_menu_button_icon_pack');

        if(isset($icon_pack) && $icon_pack !== '') {
            $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
            $icon_field_name = 'mobile_menu_icon_'. $icon_collection_obj->param;

            $mobile_menu_icon = qodef_option_get_value($icon_field_name);

            if(isset($mobile_menu_icon) && $mobile_menu_icon !== ''){

                if (method_exists($icon_collection_obj, 'render')) {
                    $icon_html = $icon_collection_obj->render($mobile_menu_icon);
                }
            }
        }

        return $icon_html;
    }
}