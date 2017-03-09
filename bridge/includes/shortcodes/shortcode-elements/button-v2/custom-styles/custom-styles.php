<?php

if(!function_exists('qode_button_v2_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function qode_button_v2_typography_styles() {
        $selector = '.qode-btn';
        $styles = array();

        $font_family = qode_options()->getOptionValue('button_v2_font_family');
        if(qode_is_font_option_valid($font_family)) {
            $styles['font-family'] = qode_get_font_option_val($font_family);
        }

        $text_transform = qode_options()->getOptionValue('button_v2_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = qode_options()->getOptionValue('button_v2_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = qode_options()->getOptionValue('button_v2_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = qode_filter_px($letter_spacing).'px';
        }

        $font_weight = qode_options()->getOptionValue('button_v2_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo qode_dynamic_css($selector, $styles);
    }

    add_action('qode_style_dynamic', 'qode_button_v2_typography_styles');
}

if(!function_exists('qode_button_v2_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function qode_button_v2_solid_styles() {
        //solid styles
        $solid_selector = '.qode-btn.qode-btn-solid';
        $solid_icon_selector = '.qode-btn.qode-btn-solid .qode-button-v2-icon-holder';
        $solid_styles = array();
        $solid_icon_styles = array();

        if(qode_options()->getOptionValue('btn_v2_solid_text_color')) {
            $solid_styles['color'] = qode_options()->getOptionValue('btn_v2_solid_text_color');
        }

        if(qode_options()->getOptionValue('btn_v2_solid_border_color')) {
            $solid_styles['border-color'] = qode_options()->getOptionValue('btn_v2_solid_border_color');
        }

        if(qode_options()->getOptionValue('btn_v2_solid_bg_color')) {
            $solid_styles['background-color'] = qode_options()->getOptionValue('btn_v2_solid_bg_color');
        }

		if(qode_options()->getOptionValue('btn_v2_solid_icon_border_color')) {
			$solid_icon_styles['border-color'] = qode_options()->getOptionValue('btn_v2_solid_icon_border_color');
		}

        echo qode_dynamic_css($solid_selector, $solid_styles);
        echo qode_dynamic_css($solid_icon_selector, $solid_icon_styles);

        //solid hover styles
        if(qode_options()->getOptionValue('btn_v2_solid_hover_text_color')) {
            echo qode_dynamic_css(
                '.qode-btn.qode-btn-solid:not(.qode-btn-custom-hover-color):hover',
                array('color' => qode_options()->getOptionValue('btn_v2_solid_hover_text_color').'!important')
            );
        }

        if(qode_options()->getOptionValue('btn_v2_solid_hover_bg_color')) {
            echo qode_dynamic_css(
                '.qode-btn.qode-btn-solid:not(.qode-btn-custom-hover-bg):hover',
                array('background-color' => qode_options()->getOptionValue('btn_v2_solid_hover_bg_color').'!important')
            );
        }

		if(qode_options()->getOptionValue('btn_v2_solid_icon_border_hover_color')) {
            echo qode_dynamic_css(
                '.qode-btn.qode-btn-solid:hover .qode-button-v2-icon-holder',
                array('border-color' => qode_options()->getOptionValue('btn_v2_solid_icon_border_hover_color'))
            );
        }

    }

    add_action('qode_style_dynamic', 'qode_button_v2_solid_styles');
}