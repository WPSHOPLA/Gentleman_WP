<?php
if (!function_exists('register_button')){
    function register_button( $buttons ){
        array_push( $buttons, "|", "qode_shortcodes" );
        return $buttons;
    }
}

if (!function_exists('add_plugin')){
    function add_plugin( $plugin_array ) {
        $plugin_array['qode_shortcodes'] = get_template_directory_uri() . '/includes/shortcodes/qode_shortcodes.js';
        return $plugin_array;
    }
}

if (!function_exists('qode_shortcodes_button')){
    function qode_shortcodes_button(){
        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
            return;
        }

        if ( get_user_option('rich_editing') == 'true' ) {
            add_filter( 'mce_external_plugins', 'add_plugin' );
            add_filter( 'mce_buttons', 'register_button' );
        }
    }
}
add_action('init', 'qode_shortcodes_button');


if (!function_exists('num_shortcodes')){
    function num_shortcodes($content){
        $columns = substr_count( $content, '[pricing_cell' );
        return $columns;
    }
}

include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/accordion.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/action.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/animation-holder.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/banner.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/blockquote.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/blog-slider.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/button.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/carousel.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/countdown.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/counter.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/cover-boxes.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/custom-font.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/dropcaps.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/expanding-images.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/google-map.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/highlights.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/icon.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/icon-list-item.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/icon-text.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/image-hover.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/image-slider-no-space.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/image-with-text.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/image-with-text-over.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/latest-posts.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/latest-posts-two.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/line-graph.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/masonry-blog.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/masonry-gallery.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/message.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/ordered-list.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/parallax-layers.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/pie-chart.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/pie-chart-doughnut.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/pie-chart-full.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/pie-chart-with-icon.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/portfolio-list.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/portfolio-slider.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/product-list-elegant.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/product-list-masonry.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/product-list-pinterest.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/progress-bar.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/progress-bar-icon.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/progress-bar-vertical.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/separator-with-icon.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/service-table.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/slider.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/social-icons.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/social-share.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/social-share-list.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/team.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/testimonials.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/testimonials-carousel.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/testimonials-masonry.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/text-marquee.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/unordered-list.php';
include_once QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/video-box.php';

//shortcodes v2
if(!function_exists('qode_load_shortcode_interface')) {
    function qode_load_shortcode_interface() {
        include_once QODE_ROOT_DIR.'/includes/shortcodes/lib/shortcode-interface.php';
        include_once QODE_ROOT_DIR.'/includes/shortcodes/lib/load.php';
    }
    add_action('qode_before_options_map', 'qode_load_shortcode_interface');
}

if(!function_exists('qode_load_shortcodes')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes/shortcode-elements folder
     * and loads load.php file in each. Hooks to qode_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function qode_load_shortcodes() {
        foreach(glob(QODE_ROOT_DIR.'/includes/shortcodes/shortcode-elements/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }

        include_once QODE_ROOT_DIR.'/includes/shortcodes/lib/shortcode-loader.inc';

    }

    add_action('qode_before_options_map', 'qode_load_shortcodes');
}
