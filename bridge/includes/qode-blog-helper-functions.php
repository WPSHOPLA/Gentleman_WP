<?php
if ( ! function_exists( 'qode_blog_image_size_media' ) ) {
    /**
     * Add Blog Image Sizes option
     *
     * @param $form_fields array, fields to include in attachment form
     * @param $post object, attachment record in database
     *
     * @return mixed
     */
    function qode_blog_image_size_media( $form_fields, $post ) {

        $options = array(
            'default'   => esc_html__('Default', 'qode'),
            'large_height' => esc_html__('Large Height', 'qode'),
            'large_width' => esc_html__('Large Width', 'qode'),
            'large_width_height' => esc_html__('Large Width/Height', 'qode')
        );

        $html = '';
        $selected = get_post_meta( $post->ID, 'blog_image_size', true );

        $html .= '<select name="attachments['. $post->ID .'][blog-image-size]" class="blog-image-size" data-setting="blog-image-size">';
        // Browse and add the options
        foreach ( $options as $key => $value ) {
            if ( $key == $selected ) {
                $html .= '<option value="' . $key . '" selected>' . $value . '</option>';
            } else {
                $html .= '<option value="' . $key . '">' . $value . '</option>';
            }
        }

        $html .= '</select>';

        $form_fields['blog-image-size'] = array(
            'label' => 'Image Size (Blog Standard List)',
            'input' => 'html',
            'html' => $html,
            'value' => get_post_meta( $post->ID, 'blog_image_size', true )
        );

        return $form_fields;
    }

    add_filter( 'attachment_fields_to_edit', 'qode_blog_image_size_media', 10, 2 );

}

if ( ! function_exists( 'qode_blog_image_size_media_save' ) ) {
    /**
     * Save values of Portfolio Image sizes in media uploader
     *
     * @param $post array, the post data for database
     * @param $attachment array, attachment fields from $_POST form
     *
     * @return mixed
     */
    function qode_blog_image_size_media_save( $post, $attachment ) {

        if( isset( $attachment['blog-image-size'] ) ) {
            update_post_meta( $post['ID'], 'blog_image_size', $attachment['blog-image-size'] );
        }

        return $post;

    }

    add_filter( 'attachment_fields_to_save', 'qode_blog_image_size_media_save', 10, 2 );

}

if(! function_exists('qode_get_blog_gallery_layout')) {
    /**
     * Function get blog masonry layout for gallery post type
     *
     * return html
     */
    function qode_get_blog_gallery_layout($array_id, $wrap = false)
    {
        $html = '';

        $html .= '<div class="qode_blog_masonry_gallery">';
        $html .= '<div class="qode_blog_gallery_sizer"></div>';
        $html .= '<div class="qode_blog_gallery_gutter"></div>';


        if (isset($array_id) && count($array_id) !== 0) {

            foreach ($array_id as $image_gallery_id) {

                $image_size = get_post_meta($image_gallery_id, 'blog_image_size', true);
                $image_size_class = 'default';
                $image_size_value = 'portfolio_masonry_regular';
                if ($image_size) {
                    switch ($image_size) {
                        case 'large_width_height' :
                            $image_size_class = 'qode_blog_img_large_height_width';
                            $image_size_value = 'portfolio_masonry_large';
                            break;
                        case 'large_height' :
                            $image_size_class = 'qode_blog_img_large_height';
                            $image_size_value = 'portfolio_masonry_tall';
                            break;
                        case 'large_width' :
                            $image_size_class = 'qode_blog_img_large_width';
                            $image_size_value = 'portfolio_masonry_wide';
                            break;
                        default:
                            $image_size_class = 'default';
                            $image_size_value = 'portfolio_masonry_regular';
                            break;
                    }
                }

                $html .= '<div class="qode_blog_gallery_item ' . esc_attr($image_size_class) . '">';
                $html .= '<a href="' . wp_get_attachment_url($image_gallery_id) . '" data-rel="prettyPhoto[single_pretty_photo]" title="' . get_the_title($image_gallery_id) . ' ">';
                    if ($wrap) {
                        $html .= '<span class="qodef-image-shader">';
                    }
                $html .= wp_get_attachment_image($image_gallery_id, $image_size_value);
                    if ($wrap) {
                        $html .= '</span>';
                    }
                $html .= '</a>';
                $html .= '</div>';
            }

        }
        $html .= '</div>'; //close qodef-ptf-gallery

        return $html;
    }
}

if(! function_exists('qode_check_post_layout')){
    /**
     * Function check post layout
     *
     * return string
     */
    function qode_check_post_layout($id){
        $post_layout = get_post_meta($id, 'post_layout_meta', true);
        return $post_layout;
    }
}

if(! function_exists('qode_check_gallery_post_layout')){
    /**
     * Function check gallery post layout
     *
     * return string
     */
    function qode_check_gallery_post_layout($id){
        $gallery_post_layout = get_post_meta($id, 'gallery_type', true);
        return $gallery_post_layout;
    }
}

if(! function_exists('qode_blog_compound_get_sticky_posts')){
    /**
     * Function that returns sticky posts
     *
     * return html
     */
    function qode_blog_compound_get_sticky_posts($category,$paged){

        $args = array(
            'cat' => $category,
            'post_type' => 'post',
            'paged' => $paged,
            'post__in' => get_option('sticky_posts'),
            'post_status' => 'publish'
        );
        $blog_query = new WP_Query( $args );

        if ($blog_query->have_posts() && count (get_option('sticky_posts')) > 0) {
            echo '<div class="blog_compound sticky_posts">';
            while ($blog_query->have_posts()) {
                $blog_query->the_post();
                qode_get_template_part('templates/blog_compound_sticky', 'loop');
            }
            wp_reset_postdata();
            echo '</div>';
            echo do_shortcode('[vc_separator up="0" down="58"]');
        }
    }
}
