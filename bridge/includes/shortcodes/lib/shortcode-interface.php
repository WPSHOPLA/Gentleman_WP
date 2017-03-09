<?php

namespace Bridge\Shortcodes\Lib;

/**
 * Interface ShortcodeInterface
 */
interface ShortcodeInterface {
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase();

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap();

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render($atts, $content = null);

}