<?php
/* Service table shortcode */
if (!function_exists('service_table')) {
    function service_table($atts, $content = null) {
        global $qode_options_proya;
        $args = array(
            "title"                    	=> "",
            "title_tag"                	=> "h3",
            "title_color"              	=> "",
            "title_background_type"    	=> "",
            "title_background_color"   	=> "",
            "background_image"         	=> "",
            "background_image_height"  	=> "",
            "icon"                     	=> "",
            "icon_size"                	=> "",
            "custom_size"              	=> "",
            "icon_color"				=> "",
            "border"					=> "",
            "border_width"              => "",
            "border_color"              => "",
            "content_background_color" 	=> ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $title_holder_style = "";
        $title_style = "";
        $title_classes = "";
        $icon_style = "";
        $content_style = "";
        $service_table_holder_style = "";
        $service_table_style = "";
        $background_image_src = "";

        if($title_background_type == "background_color_type"){
            if($title_background_color != ""){
                $title_holder_style .= "background-color: ".$title_background_color.";";
            }

        } else {
            if(is_numeric($background_image)) {
                $background_image_src = wp_get_attachment_url( $background_image );
            } else {
                $background_image_src = $background_image;
            }

            if(!empty($qode_options_proya['first_color'])){
                $service_table_style = $qode_options_proya['first_color'];
            } else {
                $service_table_style = "#00c6ff";
            }

            if($background_image != ""){
                $title_holder_style .= "background-image: url(".$background_image_src.");";
            }

            if($background_image_height != ""){
                $title_holder_style .= "height: ".$background_image_height."px;";
            }
        }
        if($border == "yes"){
            $service_table_holder_style .= " style='border-style:solid;";
            if($border_width != ""){
                $service_table_holder_style .= "border-width:". $border_width . "px;";
            }
            if($border_color != ""){
                $service_table_holder_style .= "border-color:". $border_color . ";";
            }
            $service_table_holder_style .="'";
        }
        if($title_color != ""){
            $title_style .= "color: ".$title_color.";";
        }

        $title_classes .= $title_background_type;

        if($custom_size != ""){
            $icon_style .= "font-size: ".$custom_size."px;";
        }

        if($icon_color != ""){
            $icon_style .= "color: ".$icon_color. " !important;"; //important because of the first color importance
        }

        if($content_background_color != ""){
            $content_style .= "background-color: ".$content_background_color.";";
        }

        $html .= "<div class='service_table_holder'". $service_table_holder_style ."><ul class='service_table_inner'>";

        $html .= "<li class='service_table_title_holder ".$title_classes."' style='".$title_holder_style."'>";

        $html .= "<div class='service_table_title_inner'><div class='service_table_title_inner2'>";

        if($title != ""){
            $html .= "<".$title_tag." class='service_title' style='".$title_style."'>".$title."</".$title_tag.">";
        }

        if($icon != ""){
            $html .= "<i class='fa ".$icon." ".$icon_size."' style='".$icon_style."'></i>";
        }

        $html .= "</div></div>";

        $html .= "</li>";

        $html .= "<li class='service_table_content' style='".$content_style."'>";

        $html .= do_shortcode($content);

        $html .= "</li>";

        $html .= "</ul></div>";

        return $html;
    }
    add_shortcode('service_table', 'service_table');
}