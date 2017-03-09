<?php
if(!function_exists('qode_design_styles')) {
    /**
     * Generates general custom styles
     */
    function qode_design_styles() {

        if(qode_options()->getOptionValue('gradient_style1_start_color') !== '#31c8a2' && qode_options()->getOptionValue('gradient_style1_start_color') !== '' &&
           qode_options()->getOptionValue('gradient_style1_end_color') !== '#ae66fd' && qode_options()->getOptionValue('gradient_style1_end_color') !== ''
        ) {

            echo qode_dynamic_css('.qode-type1-gradient-left-to-right', array(
                'background' => '-webkit-linear-gradient(left,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-o-linear-gradient(right,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-moz-linear-gradient(right,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => 'linear-gradient(to right,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
            ));

            echo qode_dynamic_css('.qode-type1-gradient-bottom-to-top, .qode-type1-gradient-bottom-to-top-after:after', array(
                'background' => '-webkit-linear-gradient(bottom,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-o-linear-gradient(top,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-moz-linear-gradient(top,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => 'linear-gradient(to top,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
            ));

            echo qode_dynamic_css('.qode-type1-gradient-left-bottom-to-right-top', array(
                'background' => '-webkit-linear-gradient(right top,'.qode_options()->getOptionValue('gradient_style1_end_color').', '.qode_options()->getOptionValue('gradient_style1_start_color').')',
                'background' => '-o-linear-gradient(right top,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => '-moz-linear-gradient(right top,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
                'background' => 'linear-gradient(to right top,'.qode_options()->getOptionValue('gradient_style1_start_color').', '.qode_options()->getOptionValue('gradient_style1_end_color').')',
            ));

            echo qode_dynamic_css('.qode-type1-gradient-left-to-right-2x', array(
                'background'      => '-webkit-linear-gradient(left,'.qode_options()->getOptionValue('gradient_style1_start_color').' 0%, '.qode_options()->getOptionValue('gradient_style1_end_color').' 50% ,'.qode_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background'      => '-o-linear-gradient(right,'.qode_options()->getOptionValue('gradient_style1_start_color').' 0%, '.qode_options()->getOptionValue('gradient_style1_end_color').' 50% ,'.qode_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background'      => '-moz-linear-gradient(right,'.qode_options()->getOptionValue('gradient_style1_start_color').' 0%, '.qode_options()->getOptionValue('gradient_style1_end_color').' 50% ,'.qode_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background'      => 'linear-gradient(to right,'.qode_options()->getOptionValue('gradient_style1_start_color').' 0%, '.qode_options()->getOptionValue('gradient_style1_end_color').' 50%,'.qode_options()->getOptionValue('gradient_style1_start_color').' 100%)',
                'background-size' => '200% 200%'
            ));

            echo qode_dynamic_css('.qode-type1-gradient-left-to-right-text i, .qode-type1-gradient-left-to-right-text i:before, .qode-type1-gradient-left-to-right-text span', array(
                'background'              => '-webkit-linear-gradient(right top,'.qode_options()->getOptionValue('gradient_style1_end_color').', '.qode_options()->getOptionValue('gradient_style1_start_color').')',
                'color'                   => qode_options()->getOptionValue('gradient_style1_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo qode_dynamic_css('.qode-type1-gradient-bottom-to-top-text i, .qode-type1-gradient-bottom-to-top-text i:before, .qode-type1-gradient-bottom-to-top-text span, .qode-type1-gradient-bottom-to-top-text span span', array(
                'background'              => '-webkit-linear-gradient(bottom,'.qode_options()->getOptionValue('gradient_style1_end_color').', '.qode_options()->getOptionValue('gradient_style1_start_color').')',
                'color'                   => qode_options()->getOptionValue('gradient_style1_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

            echo qode_dynamic_css('.qode-type1-gradient-bottom-to-top-text-hover:hover i, .qode-type1-gradient-bottom-to-top-text-hover:hover i:before, .qode-type1-gradient-bottom-to-top-text-hover:hover span, .qode-type1-gradient-bottom-to-top-text-hover:hover span span', array(
                'background'              => '-webkit-linear-gradient(bottom,'.qode_options()->getOptionValue('gradient_style1_end_color').', '.qode_options()->getOptionValue('gradient_style1_start_color').')',
                'color'                   => qode_options()->getOptionValue('gradient_style1_start_color'),
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent'
            ));

        }

    }

    add_action('qode_style_dynamic', 'qode_design_styles');
}