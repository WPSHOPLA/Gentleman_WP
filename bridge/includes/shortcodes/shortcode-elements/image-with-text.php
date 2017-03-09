<?php
/* Image with text shortcode */
if (!function_exists('image_with_text')) {

    function image_with_text($atts, $content = null) {
        $args = array(
            "image" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h3"
        );
        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = '';
        $html .= '<div class="image_with_text">';
        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }
        $html .= '<img itemprop="image" src="' . $image_src . '" alt="' . $title . '" />';
        $html .= '<'.$title_tag.' ';
        if ($title_color != "") {
            $html .= 'style="color:' . $title_color . ';"';
        }
        $html .= '>' . $title . '</'.$title_tag.'>';
        $html .= '<span style="margin: 6px 0px;" class="separator transparent"></span>';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;
    }
    add_shortcode('image_with_text', 'image_with_text');
}