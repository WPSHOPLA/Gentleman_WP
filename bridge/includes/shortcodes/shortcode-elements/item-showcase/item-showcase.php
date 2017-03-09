<?php
namespace Bridge\Shortcodes\ItemShowcase;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ItemShowcase
 */
class ItemShowcase implements ShortcodeInterface {
    /**
     * @var string
     */
	private $base; 
	
    /**
     * ItemShowcase constructor.
     */
	function __construct() {
		$this->base = 'qode_item_showcase';

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
			'name' => 'Qode Item Showcase',
			'base' => $this->base,
			'category' => 'by QODE',
			'icon' => 'icon-wpb-showcase extended-custom-icon-qode',
            'as_parent' => array('only' => 'qode_item_showcase_list_item'),
            'js_view' => 'VcColumnView',
            'content_element' => true,
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => 'Image',
                    'param_name' => 'item_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => 'Image Top Offset',
                    'admin_label' => true,
                    'value' => '-70px',
                    'save_always' => true,
                    'param_name' => 'image_top_offset',
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'item_image'    => '',
            'image_top_offset' => '',
        );

		$params = shortcode_atts($args, $atts);

        extract($params);

        $html = '';

        $item_showcase_classes = array();
        $item_showcase_classes[] = 'clearfix qode-item-showcase';
        $item_showcase_class = implode(' ', $item_showcase_classes);

        $item_image_style = '';
        $item_image_style .= 'margin-top:' . qode_filter_px($image_top_offset) . 'px;';

        $html .= '<div '. qode_get_class_attribute($item_showcase_class) . '>';
            $html .= '<div class="qode-item-image" '. qode_get_inline_style($item_image_style)  .'>';
                if ($item_image != '') {
                    $html .= '<img class="qode-lazy-image" src="#" alt="item showcase image" data-image="'.wp_get_attachment_image_url($item_image, 'full').'" data-lazy="true" />';
                }
            $html .= '</div>';
            $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

	}

}