<?php

namespace Bridge\Shortcodes\Lib;

use Bridge\Shortcodes\ButtonV2\ButtonV2;
use Bridge\Shortcodes\CallToActionSection\CallToActionSection;
use Bridge\Shortcodes\CardsSlider\CardsSlider;
use Bridge\Shortcodes\CardsSlider\CardsSliderItem;
use Bridge\Shortcodes\CardsGallery\CardsGallery;
use Bridge\Shortcodes\CrossfadeImages\CrossfadeImages;
use Bridge\Shortcodes\ItemShowcase\ItemShowcase;
use Bridge\Shortcodes\ItemShowcase\ItemShowcaseListItem;
use Bridge\Shortcodes\GradientIconWithText\GradientIconWithText;


/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {
	}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {
	}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {
	}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 *
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new ButtonV2());
		$this->addShortcode(new CallToActionSection());
		$this->addShortcode(new CardsSlider());
        $this->addShortcode(new CardsSliderItem());
        $this->addShortcode(new CardsGallery());
        $this->addShortcode(new CrossfadeImages());
        $this->addShortcode(new ItemShowcase());
        $this->addShortcode(new ItemShowcaseListItem());
        $this->addShortcode(new GradientIconWithText());
	}

	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}

	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();