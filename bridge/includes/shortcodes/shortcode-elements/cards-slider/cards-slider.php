<?php

namespace Bridge\Shortcodes\CardsSlider;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CardsSlider
 */
class CardsSlider implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * CardsSlider constructor.
	 */
	public function __construct() {

        $this->base = 'qode_cards_slider';

		add_action('qode_vc_map', array($this, 'vcMap'));
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 *
	 */
	public function vcMap() {

		vc_map(array(
			'name'                    => 'Cards Slider Holder',
			'base'                    => $this->base,
			'as_parent'               => array('only' => 'qode_cards_slider_item'),
			'content_element'         => true,
			'category'                => 'by QODE',
			'icon'                    => 'icon-wpb-cards-slider extended-custom-icon-qode',
			'js_view'                 => 'VcColumnView',

		));
	}

	/**
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
		$default_attrs = array(

        );
		$params        = shortcode_atts($default_attrs, $atts);

		$params['content'] = $content;

		return qode_get_shortcode_template_part('templates/cards-slider-holder', 'cards-slider', '', $params);
	}
}