<?php
namespace Bridge\Shortcodes\CrossfadeImages;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CrossfadeImages
 */
class CrossfadeImages implements ShortcodeInterface {
    /**
     * @var string
     */
	private $base; 
	
    /**
     * CrossfadeImages constructor.
     */
	function __construct() {
		$this->base = 'qode_crossfade_images';

		add_action('qode_vc_map', array($this, 'vcMap'));
	}
	
	/**
		* Returns base for shortcode
		* @return string
	 */
	public function getBase() {
		return $this->base;
	}	
    
	public function vcMap() {
						
		vc_map( array(
			'name' => 'Qode Crossfade Images',
			'base' => $this->base,
			'category' => 'by QODE',
			'icon' => 'icon-wpb-crossfade-images extended-custom-icon-qode',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => 'Initial Image',
                    'param_name' => 'initial_image'
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => 'Hover Image',
                    'param_name' => 'hover_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => 'Title',
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Link',
                    'param_name'  => 'link',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => 'Link target',
                    'param_name'  => 'link_target',
                    'description' => '',
                    'value'       => array(
                        'New Window' => '_blank',
                        'Same Window'  => '_self'
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'link', 'not_empty' => true )
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => 'Background Color',
                    'param_name'  => 'background_color',
                    'group'       => 'Design Options'
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'initial_image' => '',
            'hover_image'   => '',
            'title'         => '',
            'link'          => '',
            'link_target'   => '',
            'background_color'   => '',
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['initial_image_params'] = $this->getInitialImageParams($params);
        $params['hover_image_params'] = $this->getHoverImageParams($params);

        return qode_get_shortcode_template_part('templates/crossfade-images-template', 'crossfade-images', '', $params);
    }


    /**
     * Return Initial Image Params for Lazy Load
     *
     * @param $params
     *
     * @return array
     */
    private function getInitialImageParams($params) {
        $image_params = array();

        $image_params['image_id'] = $params['initial_image'];
        $image_original = wp_get_attachment_image_src($params['initial_image'], 'full');
        $image_params['url'] = $image_original[0];
        $image_params['title'] = get_the_title($params['initial_image']);
        $image_dimensions = qode_get_image_dimensions($image_params['url']);

        if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {
            if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                $image_params['height'] = $image_dimensions['height'];
                $image_params['width']  = $image_dimensions['width'];
            }
        }

        return $image_params;
    }

    /**
     * Return Initial Image Params for Lazy Load
     *
     * @param $params
     *
     * @return array
     */
    private function getHoverImageParams($params) {
        $image_params = array();

        $image_params['image_id'] = $params['hover_image'];
        $image_original = wp_get_attachment_image_src($params['hover_image'], 'full');
        $image_params['url'] = $image_original[0];
        $image_params['title'] = get_the_title($params['hover_image']);
        $image_dimensions = qode_get_image_dimensions($image_params['url']);

        if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {
            if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                $image_params['height'] = $image_dimensions['height'];
                $image_params['width']  = $image_dimensions['width'];
            }
        }

        return $image_params;
    }
}