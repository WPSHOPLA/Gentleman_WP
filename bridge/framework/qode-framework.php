<?php
require_once("lib/qode.layout.php");
require_once("lib/qode.optionsapi.inc");
require_once("lib/qode.framework.php");
require_once("lib/qode.functions.php");
require_once("lib/qode.common.php");
require_once("lib/qode.icons/qode.icons.php");
require_once("lib/google-fonts.php");
require_once("admin/options/qode-options-setup.php");
require_once("admin/meta-boxes/qode-meta-boxes-setup.php");

/**
 * Register styles and scripts
 */

function qode_admin_scripts_init() {
    wp_register_style('qodef-bootstrap', get_template_directory_uri().'/framework/admin/assets/css/qodef-bootstrap.css');
    wp_register_style('qodef-page-admin', get_template_directory_uri().'/framework/admin/assets/css/qodef-page.css');
    wp_register_style('qodef-options-admin', get_template_directory_uri().'/framework/admin/assets/css/qodef-options.css');
    wp_register_style('qodef-meta-boxes-admin', get_template_directory_uri().'/framework/admin/assets/css/qodef-meta-boxes.css');
    wp_register_style('qodef-ui-admin', get_template_directory_uri().'/framework/admin/assets/css/qodef-ui/qodef-ui.css');
    wp_register_style('qodef-forms-admin', get_template_directory_uri().'/framework/admin/assets/css/qodef-forms.css');
    wp_register_style('font-awesome-admin', get_template_directory_uri().'/framework/admin/assets/css/font-awesome/css/font-awesome.min.css');

    wp_register_script('bootstrap.min', get_template_directory_uri().'/framework/admin/assets/js/bootstrap.min.js');
    wp_register_script('jquery.nouislider.min', get_template_directory_uri().'/framework/admin/assets/js/qodef-ui/jquery.nouislider.min.js');
    wp_register_script('qodef-ui-admin', get_template_directory_uri().'/framework/admin/assets/js/qodef-ui/qodef-ui.js');
	wp_enqueue_script("qodef-twitter-connect", get_template_directory_uri().'/framework/admin/assets/js/qodef-twitter-connect.js', array(), false, true);
}
add_action('admin_init', 'qode_admin_scripts_init');

/**
 * Enqueue styles and scripts for admin page
 */

function enqueue_admin_styles() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style('qodef-bootstrap');
    wp_enqueue_style('qodef-page-admin');
    wp_enqueue_style('qodef-options-admin');
    wp_enqueue_style('qodef-ui-admin');
    wp_enqueue_style('jquery.nouislider.min');
    wp_enqueue_style('qodef-forms-admin');
    wp_enqueue_style('font-awesome-admin');
}

function enqueue_admin_scripts() {
    wp_enqueue_script('wp-color-picker'); //colorpicker
    wp_enqueue_script('bootstrap.min');
    wp_enqueue_media();
    wp_enqueue_script('jquery.nouislider.min');
    wp_enqueue_script('qodef-ui-admin');
}

function enqueue_meta_box_styles() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style('qodef-bootstrap');
    wp_enqueue_style('qodef-page-admin');
    wp_enqueue_style('qodef-meta-boxes-admin');
    wp_enqueue_style('qodef-ui-admin');
    wp_enqueue_style('jquery.nouislider.min');
    wp_enqueue_style('qodef-forms-admin');
    wp_enqueue_style('font-awesome-admin');
}

function enqueue_meta_box_scripts() {
    wp_enqueue_script('wp-color-picker'); //colorpicker
    wp_enqueue_script('bootstrap.min');
    wp_enqueue_media();
    wp_enqueue_script('jquery.nouislider.min');
    wp_enqueue_script('qodef-ui-admin');
}

global $qode_options_proya;
$qode_options_proya  = get_option('qode_options_proya');

function init_qode_theme_options() {
	global $qode_options_proya;
	global $qodeFramework;
	if(isset($qode_options_proya['reset_to_defaults'])){
		if( $qode_options_proya['reset_to_defaults'] == 'yes' ) delete_option( "qode_options_proya");
	}
	if (! get_option("qode_options_proya")) {
		add_option( "qode_options_proya",
			$qodeFramework->qodeOptions->options
		);
		$qode_options_proya = $qodeFramework->qodeOptions->options;
	}
}

function qode_theme_menu() {
	global $qodeFramework;
	init_qode_theme_options();
  	$page_hook_suffix = add_menu_page(
      'Qode Options',                   // The value used to populate the browser's title bar when the menu page is active
      'Qode Options',                   // The text of the menu in the administrator's sidebar
      'administrator',                  // What roles are able to access the menu
      'qode_theme_menu',                // The ID used to bind submenu items to this menu
      'qode_theme_display'              // The callback function used to render this menu
  	);
	foreach ($qodeFramework->qodeOptions->adminPages as $key=>$value ) {
		$slug = "";
		if (!empty($value->slug)) $slug = "_tab".$value->slug;
    	$subpage_hook_suffix = add_submenu_page(
    		'qode_theme_menu',
	        'Qode Options - '.$value->title,                   // The value used to populate the browser's title bar when the menu page is active
	        $value->title,                   // The text of the menu in the administrator's sidebar
	        'administrator',                  // What roles are able to access the menu
	        'qode_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
      		'qode_theme_display'              // The callback function used to render this menu
    	);
    	add_action('admin_print_scripts-'.$subpage_hook_suffix, 'enqueue_admin_scripts');
  		add_action('admin_print_styles-'.$subpage_hook_suffix, 'enqueue_admin_styles');
  	};
    add_action('admin_print_scripts-'.$page_hook_suffix, 'enqueue_admin_scripts');
  	add_action('admin_print_styles-'.$page_hook_suffix, 'enqueue_admin_styles');
}
add_action( 'admin_menu', 'qode_theme_menu' );



if(!function_exists('qode_add_theme_options_toolbar')) {
    /**
     * Adds a link to Qode Options in toolbar for easier access
     * @param $wp_admin_bar WP_Admin_Bar instance
     */
    function qode_add_theme_options_toolbar($wp_admin_bar) {
        if(!is_admin()) {
            $args = array(
                'id'    => 'qode_theme_menu',
                'title' => 'Qode Options',
                'href'  => admin_url('admin.php?page=qode_theme_menu'),
                'parent' => 'site-name'
            );

            $wp_admin_bar->add_node($args);
        }
    }

    add_action('admin_bar_menu', 'qode_add_theme_options_toolbar', 999);
}

function register_qode_theme_settings() {
    register_setting( 'qode_theme_menu', 'qode_options' );
}
add_action('admin_init', 'register_qode_theme_settings');

function strafter($string, $substring) {
  $pos = strpos($string, $substring);
  if ($pos === false)
   return NULL;
  else 
   return(substr($string, $pos+strlen($substring)));
}
function qode_get_admin_tab(){
	return isset($_GET['page']) ? strafter($_GET['page'],'tab') : NULL;
}

function qodef_save_options() {
	global $qode_options_proya;
	global $qodeFramework;
    if(current_user_can('administrator')){
        $_REQUEST = stripslashes_deep($_REQUEST);
        foreach ($qodeFramework->qodeOptions->options as $key => $value) {
            if (isset($_REQUEST[$key])) {
                $qode_options_proya[$key] = $_REQUEST[$key];
            }
        }
        update_option('qode_options_proya', $qode_options_proya);
        do_action('qode_after_theme_option_save');
        echo "Saved";

        die();
    }
}
add_action('wp_ajax_qodef_save_options', 'qodef_save_options');

function qode_theme_display() {
		global $qodeFramework;
		$tab    = qode_get_admin_tab();
		$active_page = $qodeFramework->qodeOptions->getAdminPageFromSlug($tab);
		if ($active_page == null) return;
	 ?>
    <div class="qodef-options-page qodef-page">

        <div class="qodef-page-header page-header clearfix">
            <img src="<?php echo get_template_directory_uri() . '/framework/admin/assets/img/qode-logo.png' ?>" alt="qode_logo" class="qodef-header-logo pull-left"/>
            <?php $current_theme = wp_get_theme(); ?>
            <h2 class="qodef-page-title pull-left">
                <?php echo $current_theme->get('Name'); ?>
                <small><?php echo $current_theme->get('Version') ?></small>
            </h2>
			<?php if($active_page->slug != '_importexport') { ?>
            	<div class="pull-right"> <input type="button" id="qode_top_save_button" class="btn btn-primary btn-sm pull-right" value="<?php _e('Save Changes', 'qode'); ?>"/></div>
			<?php } ?>
        </div> <!-- close div.qodef-page-header -->

        <div class="qodef-page-content-wrapper">
            <div class="qodef-page-content">
                <div class="qodef-page-navigation qodef-tabs-wrapper vertical left clearfix">

                    <div class="qodef-tabs-navigation-wrapper">
                        <ul class="nav nav-tabs">
                        	<?php
                        		foreach ($qodeFramework->qodeOptions->adminPages as $key=>$page ) {
                                    $slug = "";
                                    if (!empty($page->slug)) $slug = "_tab".$page->slug;
                                    $icon = $page->icon;
                            ?>
                            <li <?php if ($page->slug == $tab) echo "class=\"active\""; ?>>
                                <a href="<?php echo get_admin_url(); ?>admin.php?page=qode_theme_menu<?php echo $slug; ?>">
                                    <i class="fa fa-<?php echo $icon; ?> qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo $page->title; ?>"></i>
                                    <span><?php echo $page->title; ?></span>
                                </a>
                            </li>
                        	<?php } ?>
                        </ul>
                    </div> <!-- close div.qodef-tabs-navigation-wrapper -->

                    <div class="qodef-tabs-content">
                        <div class="tab-content">
                        	<?php
                        		foreach ($qodeFramework->qodeOptions->adminPages as $key=>$page ) {
                        			if ($page->slug == $tab) {
                        	?>
                            <div class="tab-pane fade<?php if ($page->slug == $tab) echo " in active"; ?>" id="<?php echo $key; ?>">
                                <div class="qodef-tab-content">
                                    <h2 class="qodef-page-title"><?php echo $page->title; ?></h2>

									<?php if($page->slug == '_importexport') { ?>

										<form method="post" class="qode_import_export_ajax_form">
											<div class="qodef-page-form">
												<?php $page->render(); ?>

											</div>
										</form>

									<?php } else { ?>
										<form method="post" class="qode_ajax_form">
											<div class="qodef-page-form">
												<?php $page->render(); ?>

												<div class="form-button-section clearfix">
													<div class="qodef-input-change">You should save your changes</div>
													<div class="qodef-changes-saved">All your changes are successfully saved</div>
													<div class="form-buttom-section-holder" id="anchornav">
														<div class="form-button-section-inner clearfix" >

															<div class="container-fluid">
																<div class="row">
																	<div class="col-lg-10">
																		<ul class="pull-left">
																			<li>Scroll To:</li>
																			<?php
																			foreach ($page->layout as $key=>$panel ) {
																				?>
																				<li><a href="#qodef_<?php echo $panel->name; ?>"><?php echo $panel->title; ?></a></li>
																				<?php
																			}
																			?>
																		</ul>
																	</div>
																	<div class="col-lg-2">
																		<input type="submit" class="btn btn-primary btn-sm pull-right" value="<?php _e('Save Changes', 'qode'); ?>"/>
																	</div>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</form>

									<?php } ?>

                                </div><!-- close qodef-tab-content -->
                            </div>
                           <?php
                        			}
                        		}
                        	?>
                        </div>
                    </div> <!-- close div.qodef-tabs-content -->

                </div> <!-- close div.qodef-page-navigation -->

            </div> <!-- close div.qodef-page-content -->

        </div> <!-- close div.qodef-page-content-wrapper -->

    </div> <!-- close div.qode-options-page -->
<?php }

function qode_meta_box_add() {
	global $qodeFramework;
	
	foreach ($qodeFramework->qodeMetaBoxes->metaBoxes as $key=>$box ) {
		$hidden = false;
		if (!empty($box->hidden_property)){
			foreach ($box->hidden_values as $value) {
				if (qodef_option_get_value($box->hidden_property)==$value)
					$hidden = true;
				
			}
		}
	    add_meta_box(
	        'qodef-meta-box-'.$key,
	        $box->title,
	        'qodef_render_meta_box',
	        $box->scope,
			'advanced',
			'high',
			array( 'box' => $box)
	    );
		if ($hidden) {
		    add_filter( 'postbox_classes_'.$box->scope.'_qodef-meta-box-'.$key, 'qode_meta_box_add_hidden_class' );
		}
	}

    add_action('admin_enqueue_scripts', 'enqueue_meta_box_styles');
    add_action('admin_enqueue_scripts', 'enqueue_meta_box_scripts');
}
add_action('add_meta_boxes', 'qode_meta_box_add');

function qode_meta_box_save( $post_id, $post ) {
	global $qodeFramework;

	$postTypes = array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels","masonry_gallery");
    //add product post type into array if woocommerce is installed
    if(qode_is_woocommerce_installed()){
        array_push($postTypes, "product");
    }
    if ( !isset( $_POST[ '_wpnonce' ] ))
        return;
    if ( !current_user_can( 'edit_post', $post_id ) )
		return;
	if ( ! in_array( $post->post_type, $postTypes ) )
		return;
	foreach ($qodeFramework->qodeMetaBoxes->options as $key=>$box ) {

		if ( isset( $_POST[ $key ] ) && trim( $_POST[ $key ] !== '') ) {

			$value = $_POST[ $key ];
			// Auto-paragraphs for any WYSIWYG
			update_post_meta( $post_id, $key, $value );
		} else {
			delete_post_meta( $post_id, $key );
		}
	}
				
	$portfolios = false;
	if (isset($_POST['optionLabel'])) {
		foreach ($_POST['optionLabel'] as $key => $value) {
			$portfolios_val[$key] = array('optionLabel'=>$value,'optionValue'=>$_POST['optionValue'][$key],'optionUrl'=>$_POST['optionUrl'][$key],'optionlabelordernumber'=>$_POST['optionlabelordernumber'][$key]); 
			$portfolios = true;
		
		}
	}	

	if ($portfolios) {
		update_post_meta( $post_id,  'qode_portfolios', $portfolios_val );
	} else {
		delete_post_meta( $post_id, 'qode_portfolios' );
	}
				
	$portfolio_images = false;
	if (isset($_POST['portfolioimg'])) {
		foreach ($_POST['portfolioimg'] as $key => $value) {
			$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key], 'portfolioimgtype'=>$_POST['portfolioimgtype'][$key] );
			$portfolio_images = true;
		}
	}
			
			
	if ($portfolio_images) {
		update_post_meta( $post_id,  'qode_portfolio_images', $portfolio_images_val );
	} else {
		delete_post_meta( $post_id,  'qode_portfolio_images' );
	}
}

add_action( 'save_post', 'qode_meta_box_save', 1, 2 );

function qodef_render_meta_box($post, $metabox) {?>
    <div class="qodef-meta-box qodef-page">
        <div class="qodef-meta-box-holder">

	<?php $metabox["args"]["box"]->render(); ?>

		</div>
	</div>
<?php
}

function qode_meta_box_add_hidden_class( $classes=array() ) {
    if( !in_array( 'qodef-meta-box-hidden', $classes ) )
        $classes[] = 'qodef-meta-box-hidden';
        
    return $classes;
}

/**
 * Remove the default Custom Fields meta box
 */

function removeDefaultCustomFields() {
    foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
        foreach ( array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels" ) as $postType ) {
            remove_meta_box( 'postcustom', $postType, $context );
        }
    }
}
add_action('do_meta_boxes','removeDefaultCustomFields');

if(!function_exists('qode_admin_notice')) {
    /**
     * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
     * @param $id string id of notice. It will be used to store notice dismis
     * @param $message string message to show to the user
     * @param $class string HTML class of notice
     * @param bool $is_dismisable whether notice is dismisable or not
     */
    function qode_admin_notice($id, $message, $class, $is_dismisable = true) {
        $is_dismised = get_user_meta(get_current_user_id(), 'dismis_'.$id);

        //if notice isn't dismissed
        if(!$is_dismised && is_admin()) {
            echo '<div style="display: block;" class="'.esc_attr($class).' is-dismissible notice">';
            echo '<p>';

            echo wp_kses_post($message);

            if($is_dismisable) {
                echo '<strong style="display: block; margin-top: 7px;"><a href="'.esc_url(add_query_arg('qode_dismis_notice', $id)).'">'.__('Dismiss this notice', 'qode').'</a></strong>';
            }

            echo '</p>';

            echo '</div>';
        }

    }
}

if(!function_exists('qode_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function qode_save_dismisable_notice() {
        if(is_admin() && !empty($_GET['qode_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['qode_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
        }
    }

    add_action('admin_init', 'qode_save_dismisable_notice');
}

if(!function_exists('qode_enqueue_style_scripts_slider_taxonomy')) {
	/**
	 * Enqueue style and scripts when on slider taxonomy page in admin
	 */
	function qode_enqueue_style_scripts_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			wp_enqueue_style('qodef-slider-category', get_template_directory_uri().'/framework/admin/assets/css/qodef-slider-category.css');
			wp_enqueue_script('qodef-slider-category', get_template_directory_uri().'/framework/admin/assets/js/qodef-slider-category.js');
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'qode_enqueue_style_scripts_slider_taxonomy');
}

if(!function_exists('qode_enqueue_nav_menu_script')) {
    /**
     * Function that enqueues styles and scripts necessary for menu administration page.
     * It checks $hook variable
     * @param $hook string current page hook to check
     */
    function qode_enqueue_nav_menu_script($hook) {
        if($hook == 'nav-menus.php') {
            wp_enqueue_script('qodef-nav-menu', get_template_directory_uri().'/framework/admin/assets/js/qodef-nav-menu.js');
            wp_enqueue_style('qodef-nav-menu', get_template_directory_uri().'/framework/admin/assets/css/qodef-nav-menu.css');
        }
    }

    add_action('admin_enqueue_scripts', 'qode_enqueue_nav_menu_script');
}

if(!function_exists('qode_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function qode_generate_icon_pack_options() {
        global $qodeIconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $qodeIconCollections->getIconCollection($icon_pack);

        if($collections_object) {
            $icons = $collections_object->getIconsArray();
            if(is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="'.esc_attr($key).'">'.esc_html($key).'</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'qode_generate_icon_pack_options');
}

if(!function_exists('qode_get_custom_sidebars')) {
    /**
     * Function that returns all custom made sidebars.
     *
     * @uses get_option()
     * @return array array of custom made sidebars where key and value are sidebar name
     */
    function qode_get_custom_sidebars() {
        $custom_sidebars = get_option('qode_sidebars');
        $formatted_array = array();

        if(is_array($custom_sidebars) && count($custom_sidebars)) {
            foreach ($custom_sidebars as $custom_sidebar) {
                $formatted_array[$custom_sidebar] = $custom_sidebar;
            }
        }

        return $formatted_array;
    }
}


if(!function_exists('qode_hook_twitter_request_ajax')) {
	/**
	 * Wrapper function for obtaining twitter request token.
	 * Hooks to wp_ajax_qode_twitter_obtain_request_token ajax action
	 *
	 * @see QodeTwitterApi::obtainRequestToken()
	 */
	function qode_hook_twitter_request_ajax() {
		QodeTwitterApi::getInstance()->obtainRequestToken();
	}

	add_action('wp_ajax_qode_twitter_obtain_request_token', 'qode_hook_twitter_request_ajax');
}