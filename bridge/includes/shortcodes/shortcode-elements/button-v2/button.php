<?php
namespace Bridge\Shortcodes\ButtonV2;

use Bridge\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package Bridge\Shortcodes\Lib\ShortcodeInterface
 */
class ButtonV2 implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qode_button_v2';

        add_action('qode_vc_map', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Qode Button V2', 'qode'),
            'base'                      => $this->base,
            'category'                  => 'by QODE',
            'icon'                      => 'icon-wpb-button-v2 extended-custom-icon-qode',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Text',
                        'param_name'  => 'text',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Link',
                        'param_name'  => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Link Target',
                        'param_name'  => 'target',
                        'value'       => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Custom CSS class',
                        'param_name'  => 'custom_class',
                        'admin_label' => true
                    )
                ),
               qode_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Color',
                        'param_name'  => 'color',
                        'group'       => 'Design Options',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Hover Color',
                        'param_name'  => 'hover_color',
                        'group'       => 'Design Options',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Background Color',
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'group'       => 'Design Options'
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Hover Background Color',
                        'param_name'  => 'hover_background_color',
                        'admin_label' => true,
                        'group'       => 'Design Options'
                    ),
					array(
						'type'        => 'colorpicker',
						'heading'     => 'Icon Left Border Color',
						'param_name'  => 'icon_border_color',
						'admin_label' => true,
						'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
						'group'       => 'Design Options'
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => 'Hover Icon Left Border Color',
						'param_name'  => 'icon_border_hover_color',
						'admin_label' => true,
						'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
						'group'       => 'Design Options'
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Enable Shadow',
						'param_name'  => 'enable_shadow',
						'value'       => array(
							'No'  	=> 'no',
							'Yes' 	=> 'yes'
						),
						'group'       => 'Design Options'
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Enable Icon Gradient',
						'param_name'  => 'enable_icon_gradient',
						'value'       => array(
							'No'  	=> 'no',
							'Yes' 	=> 'yes'
						),
						'group'       => 'Design Options',
						'dependency' => array('element' => 'icon_pack', 'not_empty' => true)
					),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Font Size (px)',
                        'param_name'  => 'font_size',
                        'admin_label' => true,
                        'group'       => 'Design Options'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Font Weight',
                        'param_name'  => 'font_weight',
                        'value'       => array_flip(qode_get_font_weight_array(true)),
                        'admin_label' => true,
                        'group'       => 'Design Options'
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Margin',
                        'param_name'  => 'margin',
                        'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'qode'),
                        'admin_label' => true,
                        'group'       => 'Design Options'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Hover Effect',
                        'param_name'  => 'hover_effect',
                        'value'       => array(
                            'Default'    => '',
                            '3D Rotate'   => '3d_rotate',
                            'Shadow Enhance'   => 'shadow_enhance',
                        ),
                        'save_always' => true,
                        'group'       => 'Advanced Options',
                    ),
                )
            ) //close array_merge
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => '',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'icon_border_color' 	 => '',
            'icon_border_hover_color'=> '',
            'enable_shadow'          => '',
            'font_size'              => '',
            'font_weight'            => '',
            'margin'                 => '',
            'custom_class'           => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'hover_animation'        => '',
            'enable_icon_gradient'   => '',
            'hover_effect'           => '',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, qode_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
            $iconPackName   = qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']				= $this->getButtonClasses($params);
        $params['button_icon_holder_classes']	= $this->getButtonIconHolderClasses($params);
        $params['button_custom_attrs']			= !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']				= $this->getButtonStyles($params);
        $params['button_icon_holder_styles']	= $this->getButtonIconHolderStyles($params);
        $params['button_data']					= $this->getButtonDataAttr($params);
        $params['button_icon_holder_data']		= $this->getButtonIconHolderDataAttr($params);

        return qode_get_shortcode_template_part('templates/'.$params['html_type'], 'button-v2', $params['hover_animation'], $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color']) && $params['type'] !== 'outline') {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.qode_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

	/**
	 * Returns array of button icon holder styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonIconHolderStyles($params) {
		$styles = array();

		if(!empty($params['icon_border_color'])) {
			$styles[] = 'border-color: '.$params['icon_border_color'];
		}


		return $styles;
	}

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

	/**
	 *
	 * Returns array of button icon holder data attr
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonIconHolderDataAttr($params) {
		$data = array();

		if(!empty($params['icon_border_hover_color'])) {
			$data['data-hover-icon-border-color'] = $params['icon_border_hover_color'];
		}

		return $data;
	}

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'qode-btn',
            'qode-btn-'.$params['size'],
            'qode-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'qode-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'qode-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'qode-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'qode-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if(!empty($params['hover_animation'])) {
            $buttonClasses[] = 'qode-btn-'.$params['hover_animation'];
        }

		if($params['enable_shadow'] === 'yes') {
            $buttonClasses[] = 'qode-btn-with-shadow';
        }

        if($params['hover_effect'] === '') {
            $buttonClasses[] = 'qode-btn-default-hover';
        } else {
            if ($params['hover_effect'] === '3d_rotate') {
                $buttonClasses[] = 'qode-btn-3d-hover';
            }
            if ($params['hover_effect'] === 'shadow_enhance') {
                $buttonClasses[] = 'qode-btn-shadow-hover';
            }
        }

        return implode(' ', $buttonClasses);
    }

	/**
	 * Returns array of HTML classes for button icon holder
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonIconHolderClasses($params) {
		$buttonClasses = array(
			'qode-button-v2-icon-holder'
		);

		if( $params['enable_icon_gradient'] === 'yes') {
			$buttonClasses[] = 'qode-type1-gradient-bottom-to-top-text';
		}

		return implode(' ', $buttonClasses);
	}
}