<?php
/* Cover Boxes shortcode */
if (!function_exists('cover_boxes')) {
    function cover_boxes($atts, $content = null) {
        $args = array(
            "active_element"    => "1",
            "title1"            => "",
            "title_color1"      => "",
            "text1"             => "",
            "text_color1"       => "",
            "image1"            => "",
            "link1"             => "",
            "link_label1"       => "",
            "target1"           => "",
            "title2"            => "",
            "title_color2"      => "",
            "text2"             => "",
            "text_color2"       => "",
            "image2"            => "",
            "link2"             => "",
            "link_label2"       => "",
            "target2"           => "",
            "title3"            => "",
            "title_color3"      => "",
            "text3"             => "",
            "text_color3"       => "",
            "image3"            => "",
            "link3"             => "",
            "link_label3"       => "",
            "target3"           => "",
            "read_more_button_style"      => ""
        );
        extract(shortcode_atts($args, $atts));

        $html = "";
        $html .= "<div class='cover_boxes' data-active-element='".$active_element."'><ul class='clearfix'>";

        $html .= "<li>";
        $html .= "<div class='box'>";
        if($target1 != ""){
            $target1 = $target1;
        }else{
            $target1 = "_self";
        }
        if(is_numeric($image1)) {
            $image_src1 = wp_get_attachment_url( $image1 );
        }else {
            $image_src1 = $image1;
        }
        if(is_numeric($image2)) {
            $image_src2 = wp_get_attachment_url( $image2 );
        }else {
            $image_src2 = $image2;
        }
        if(is_numeric($image3)) {
            $image_src3 = wp_get_attachment_url( $image3 );
        }else {
            $image_src3 = $image3;
        }
        $html .= "<a itemprop='url' class='thumb' href='".$link1."' target='".$target1."'><img itemprop='image' alt='".$title1."' src='".$image_src1."' /></a>";
        if($title_color1 != ""){
            $color1 = " style='color:".$title_color1."''";
        }else{
            $color1 = "";
        }
        if($text_color1 != ""){
            $t_color1 = " style='color:".$text_color1."''";
        }else{
            $t_color1 = "";
        }
        $html .= "<div class='box_content'><h3 ".$color1.">".$title1."</h3>";
        $html .= "<p ".$t_color1.">".$text1."</p>";

        $button_class = "";
        $button_class_wrapper_open = "";
        $button_class_wrapper_close = "";
        if($read_more_button_style != "no"){
            $button_class = "qbutton tiny";
        }else {
            $button_class = "cover_boxes_read_more";
            $button_class_wrapper_open = "<h5>";
            $button_class_wrapper_close = "</h5>";
        }

        if($link_label1 != "") {
            $html .= $button_class_wrapper_open . "<a itemprop='url' class='".$button_class."' href='".$link1."' target='".$target1."'>".$link_label1."</a>" . $button_class_wrapper_close;
        }

        $html .= "</div></div>";
        $html .= "</li>";

        $html .= "<li>";
        $html .= "<div class='box'>";
        if($target2 != ""){
            $target2 = $target2;
        }else{
            $target2 = "_self";
        }
        $html .= "<a itemprop='url' class='thumb' href='".$link2."' target='".$target2."'><img itemprop='image' alt='".$title2."' src='".$image_src2."' /></a>";
        if($title_color2 != ""){
            $color2 = " style='color:".$title_color2."''";
        }else{
            $color2 = "";
        }
        if($text_color2 != ""){
            $t_color2 = " style='color:".$text_color2."''";
        }else{
            $t_color2 = "";
        }
        $html .= "<div class='box_content'><h3 ".$color2.">".$title2."</h3>";
        $html .= "<p ".$t_color2.">".$text2."</p>";

        if($link_label2 != "") {
            $html .= $button_class_wrapper_open . "<a itemprop='url' class='".$button_class."' href='".$link2."' target='".$target2."'>".$link_label2."</a>" . $button_class_wrapper_close;
        }

        $html .= "</div></div>";
        $html .= "</li>";

        $html .= "<li>";
        $html .= "<div class='box'>";
        if($target3 != ""){
            $target3 = $target3;
        }else{
            $target3 = "_self";
        }
        $html .= "<a itemprop='url' class='thumb' href='".$link3."' target='".$target3."'><img itemprop='image' alt='".$title3."' src='".$image_src3."' /></a>";
        if($title_color3 != ""){
            $color3 = " style='color:".$title_color3."''";
        }else{
            $color3 = "";
        }
        if($text_color3 != ""){
            $t_color3 = " style='color:".$text_color3."''";
        }else{
            $t_color3 = "";
        }
        $html .= "<div class='box_content'><h3 ".$color3.">".$title3."</h3>";
        $html .= "<p ".$t_color3.">".$text3."</p>";

        if($link_label3 != "") {
            $html .= $button_class_wrapper_open . "<a itemprop='url' class='".$button_class."' href='".$link3."' target='".$target3."'>".$link_label3."</a>" . $button_class_wrapper_close;
        }

        $html .= "</div></div>";
        $html .= "</li>";

        $html .= "</ul></div>";
        return $html;
    }
    add_shortcode('cover_boxes', 'cover_boxes');
}