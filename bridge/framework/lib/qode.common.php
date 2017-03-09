<?php

$options_fontstyle = array( "normal" => "normal",
 "italic" => "italic"
);
$options_fontweight = array( "200" => "200",
 "300" => "300",
 "400" => "400",
 "500" => "500",
 "600" => "600",
 "700" => "700",
 "800" => "800",
 "900" => "900"
);
$options_texttransform = array( "none" => "None",
 "capitalize" => "Capitalize",
 "uppercase" => "Uppercase",
 "lowercase" => "Lowercase"
);

$options_fontdecoration = array( "none" => "none",
 "underline" => "underline"
);

if(!function_exists('qode_get_font_weight_array')) {
    /**
     * Returns array of font weights
     *
     * @param bool $first_empty whether to add empty first member
     * @return array
     */
    function qode_get_font_weight_array($first_empty = false) {
        $font_weights = array();

        if($first_empty) {
            $font_weights[''] = '';
        }

        $font_weights['100'] = 'Thin 100';
        $font_weights['200'] = 'Extra-Light 200';
        $font_weights['300'] = 'Light 300';
        $font_weights['400'] = 'Regular 400';
        $font_weights['500'] = 'Medium 500';
        $font_weights['600'] = 'Semi-Bold 600';
        $font_weights['700'] = 'Bold 700';
        $font_weights['800'] = 'Extra-Bold 800';
        $font_weights['900'] = 'Ultra-bold 900';

        return $font_weights;
    }
}

if(!function_exists('qode_get_text_transform_array')) {
    /**
     * Returns array of text transforms
     *
     * @param bool $first_empty
     * @return array
     */
    function qode_get_text_transform_array($first_empty = false) {
        $text_transforms = array();

        if($first_empty) {
            $text_transforms[''] = '';
        }

        $text_transforms['none'] = 'None';
        $text_transforms['capitalize'] = 'Capitalize';
        $text_transforms['uppercase'] = 'Uppercase';
        $text_transforms['lowercase'] = 'Lowercase';

        return $text_transforms;
    }
}

if(!function_exists('qode_get_font_style_array')) {
    /**
     * Returns array of font styles
     *
     * @param bool $first_empty
     * @return array
     */
    function qode_get_font_style_array($first_empty = false) {
        $font_styles = array(
            'normal' => 'normal',
            'italic' => 'italic'
        );

        return $first_empty ? array_merge(array('' => ''), $font_styles) : $font_styles;
    }
}

if(!function_exists('qode_get_text_decorations')) {
    /**
     * Returns array of text transforms
     *
     * @param bool $first_empty
     * @return array
     */
    function qode_get_text_decorations($first_empty = false) {
        $text_decorations = array(
            'none'      => 'none',
            'underline' => 'underline'
        );

        return $first_empty ? array_merge(array('' => ''), $text_decorations) : $text_decorations;
    }
}