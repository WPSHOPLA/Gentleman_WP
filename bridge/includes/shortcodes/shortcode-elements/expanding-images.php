<?php
/* Expanding Images shortcode */
if (!function_exists('expanding_images')) {

    function expanding_images($atts, $content = null) {
        $args = array(
            'hero_image'        => '',
            'link'              => '',
            'target'            => '_self',
            'title'             => '',
            'side_image_1'      => '',
            'side_image_1_link' => '',
            'side_image_2'      => '',
            'side_image_2_link' => '',
            'side_image_3'      => '',
            'side_image_3_link' => '',
            'side_image_4'      => '',
            'side_image_4_link' => '',
            'side_image_5'      => '',
            'side_image_5_link' => '',
            'side_image_6'      => '',
            'side_image_6_link' => '',
            'side_image_7'      => '',
            'side_image_7_link' => '',
            'side_image_8'      => '',
            'side_image_8_link' => '',
        );

        extract(shortcode_atts($args, $atts));

        //init variables
        $html  = "";
        $side_image = "";
        $side_image_link = "";
        $side_image_classes = "";
        $side_image_data_start ="";
        $side_image_data_end ="";

        $html .= "<div class='qode-expanding-images'>";
        $html .= "<div class='qode-expanding-images-inner'>"; 
        $html .= "<img class='qode-frame-image' src='". QODE_ROOT . "/css/img/expanding_images_laptop.png' alt='laptop frame' />"; 
        $html .= "<div class='qode-hero-image'>";

        if ($link != '') {
            $html .= "<a class='qode-hero-image-link' href=". esc_url($link)." target=". esc_attr($target).">";
        }
        if ($hero_image != '') {
            $html .= "<img class='qode-frame-image qode-lazy-image' src='#' alt='hero image' data-image='".wp_get_attachment_url($hero_image)."' data-lazy='true' />";
        }
        if ($title != '') {
            $html .= "<div class='qode-hero-image-title'><h3>". esc_html($title)."</h3></div>";
        }
        if ($link != '') {
            $html .= "</a>";
        }

        $html .= "</div>"; //close hero-image
        $html .= "</div>"; //close expanding-images inner

        $html .= "<div class='qode-side-images'>";

        for ($i = 1; $i <= 8; $i++) { 
            $side_image = eval('return $side_image_'. $i . ';');
            $side_image_link = eval('return $side_image_'. $i .'_link;');
            $side_image_classes = "qode-side-image qode-side-image-".$i." qode-lazy-image ";

            if ($side_image != '') {
                if ($i < 5) {
                    $side_image_classes .= "qode-side-image-inner";
                } else {
                    $side_image_classes .= "qode-side-image-outer";
                }

                switch($i) {
                    case '1':
                        $side_image_data_start = "data-bottom = 'transform:translate3d(70%,25%,0)'";
                        $side_image_data_end = "data--150-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '2':
                        $side_image_data_start = "data-100-bottom = 'transform:translate3d(70%,-25%,0)'";
                        $side_image_data_end = "data--50-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '3':
                        $side_image_data_start = "data-bottom = 'transform:translate3d(-70%,25%,0)'";
                        $side_image_data_end = "data--150-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '4':
                        $side_image_data_start = "data-100-bottom = 'transform:translate3d(-70%,-25%,0)'";
                        $side_image_data_end = "data--50-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '5':
                        $side_image_data_start = "data-bottom = 'transform:translate3d(180%,35%,0)'";
                        $side_image_data_end = "data--150-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '6':
                        $side_image_data_start = "data-100-bottom = 'transform:translate3d(180%,-35%,0)'";
                        $side_image_data_end = "data--50-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '7':
                        $side_image_data_start = "data-bottom = 'transform:translate3d(-180%,25%,0)'";
                        $side_image_data_end = "data--150-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    case '8':
                        $side_image_data_start = "data-100-bottom = 'transform:translate3d(-180%,-25%,0)'";
                        $side_image_data_end = "data--50-bottom = 'transform:translate3d(0,0,0)'";
                        break;
                    default: 
                        $side_image_data_start = "";
                        $side_image_data_end = "";
                        break;
                }

                if ($side_image_link != '') { 
                    $html .= "<a class='qode-side-image-link' href=". esc_url($side_image_link)." target=". esc_attr($target).">";
                }

                $html .= "<div ".$side_image_data_start." ".$side_image_data_end." class='". esc_attr($side_image_classes)."' data-image=".wp_get_attachment_url($side_image)." data-lazy='true' ></div>";

                if ($side_image_link != '') { 
                    $html .= "</a>";
                }
            }
        }

        $html .= "</div>"; //close side-images
        $html .= "</div>"; //close expanding-images

        return $html;
    }
    add_shortcode('expanding_images', 'expanding_images');
}