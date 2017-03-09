<?php
if(!function_exists('qode_get_gradient_left_to_right_styles')) {
    function qode_get_gradient_left_to_right_styles($string_add = '', $empty_val = false, $custom_val = false) {
        $styles = array(
            'qode-type1-gradient-left-to-right'.$string_add => 'Style 1'
        );

        if($empty_val) {
            $styles = array_merge(array(
                '' => ''
            ), $styles);
        }

        if($custom_val) {
            $styles = array_merge($styles,
                array(
                'qode-custom-gradient-top-to-bottom' => 'Custom (top to bottom)'
            ));
        }

        return $styles;
    }
}

if(!function_exists('qode_get_gradient_styles')) {
    function qode_get_gradient_bottom_to_top_styles($string_add = '', $empty_val = false) {
        $styles = array(
            'qode-type1-gradient-bottom-to-top'.$string_add => 'Style 1'
        );

        if($empty_val) {
            $styles = array_merge(array(
                '' => ''
            ), $styles);
        }

        return $styles;
    }
}

if(!function_exists('qode_get_gradient_left_bottom_to_right_top_styles')) {
    function qode_get_gradient_left_bottom_to_right_top_styles($string_add = '', $empty_val = false) {
        $styles = array(
            'qode-type1-gradient-left-bottom-to-right-top'.$string_add => 'Style 1'
        );

        if($empty_val) {
            $styles = array_merge(array(
                '' => ''
            ), $styles);
        }

        return $styles;
    }
}