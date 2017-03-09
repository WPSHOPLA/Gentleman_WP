<?php
namespace Bridge\Shortcodes\ItemShowcase;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class ItemShowcaseListItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qode_item_showcase_list_item';
		add_action('qode_vc_map', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){

			global $qodeIconCollections;

			vc_map( 
				array(
					'name' => 'Qode Item Showcase List Item',
					'base' => $this->base,
					'as_child' => array('only' => 'qode_item_showcase'),
					'content_element' => true,
					'category' => 'by QODE',
					'icon' => 'icon-wpb-showcase-list-item extended-custom-icon-qode',
					'show_settings_on_create' => true,
					'params' => array_merge(
				        $qodeIconCollections->getVCParamsArray(),
						array(
							array(
								'type'        => 'dropdown',
								'admin_label' => true,
								'heading'     => 'Item Position',
								'param_name'  => 'item_position',
								'value'       => array(
									'Left'  => 'left',
									'Right' => 'right'
								),
								'save_always' => true
							),
							array(
								'type'        => 'textfield',
								'heading'     => 'Item Title',
								'admin_label' => true,
								'param_name'  => 'item_title',
							),
							array(
								'type'        => 'textfield',
								'heading'     => 'Item Text',
								'admin_label' => true,
								'param_name'  => 'item_text',
							),
							array(
								'type'       => 'textfield',
								'heading'    => 'Item Link',
								'param_name' => 'item_link',
								'dependency' => array( 'element' => 'item_title', 'not_empty' => true )
							),
							array(
								'type' => 'colorpicker',
								'heading' => 'Icon Color',
								'param_name' => 'icon_color',
								'description' => ''
							),
							array(
								'type' => 'colorpicker',
								'heading' => 'Icon Background Color',
								'param_name' => 'icon_background_color',
								'description' => ''
							),
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		global $qodeIconCollections;

		$default_atts = array(
			'item_position' => '',
			'icon_color' => '',
			'icon_background_color' => '',
			'item_title' => '',
			'item_text' => '',
			'item_link' => '',
		);


		$default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

		$params = shortcode_atts($default_atts, $atts);

		extract($params);

		$params['item_showcase_list_item_class'] = $this->getItemShowcaseListItemClass($params);
		$params['icon_styles'] = $this->getIconStyles($params);
		$params['icon_params'] = $this->getIconHtml($params);

		$html = qode_get_shortcode_template_part('templates/item-showcase-list-item-template', 'item-showcase', '', $params);

		return $html;
	}


	/**
	 * Generates icon html
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconHtml($params){

		$icon_params = array();

		if($params['icon_pack'] != '') {
			$icon_params['icon_pack'] = $params['icon_pack'];
		}

		if($params['icon_pack'] == '') {
			$icon_params['icon'] = $params['icon'].' fa';
		} else if($params['icon_pack'] == 'font_elegant') {
			$icon_params['icon'] = $params['fe_icon'];
		} else if($params['icon_pack'] == 'linea_icons') {
			$icon_params['icon'] = $params['linea_icon'];
		}

		return implode(' ', $icon_params);
	}

	/**
	 * Generates icon styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconStyles($params){

		$iconStylesArray = array();
		if(!empty($params['icon_color'])) {
			$iconStylesArray[] = 'color:' . $params['icon_color'];
		}

		if(!empty($params['icon_background_color'])) {
			$iconStylesArray[] = 'background-color:' . $params['icon_background_color'];
		}

		return implode(';', $iconStylesArray);
	}

	/**
	 * Return Item Showcase List Item Classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getItemShowcaseListItemClass($params) {

		$item_showcase_list_item_class = array();

		if ($params['item_position'] !== '') {
			$item_showcase_list_item_class[] = 'qode-item-'. $params['item_position'];
		}

		return implode(' ', $item_showcase_list_item_class);

	}

}
