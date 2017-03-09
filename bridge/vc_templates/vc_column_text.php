<?php

if(version_compare(qode_get_vc_version(), '4.5.9') >= 0) {
	/**
	 * Shortcode attributes
	 * @var $atts
	 * @var $el_class
	 * @var $css_animation
	 * @var $css
	 * @var $content - shortcode content
	 * Shortcode class
	 * @var $this WPBakeryShortCode_VC_Column_text
	 */
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	$el_class = $this->getExtraClass( $el_class );
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	
	/*
	 Css animations are disabled in extend vc
	*/
	
	//$css_class .= $this->getCSSAnimation( $css_animation );
	
	$output .= "\n\t" . '<div class="' . esc_attr( $css_class ) . '">';
	$output .= "\n\t\t" . '<div class="wpb_wrapper">';
	$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content, true );
	$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
	$output .= "\n\t" . '</div> ' . $this->endBlockComment( $this->getShortcode() );
	
	echo $output;

} else {

	$output = $el_class = $css_animation = '';
	
	extract( shortcode_atts( array(
		'el_class' => '',
		'css_animation' => '',
		'css' => ''
	), $atts ) );
	
	$el_class = $this->getExtraClass( $el_class );
	
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	$css_class .= $this->getCSSAnimation( $css_animation );
	$output .= "\n\t" . '<div class="' . esc_attr( $css_class ) . '">';
	$output .= "\n\t\t" . '<div class="wpb_wrapper">';
	$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content, true );
	$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
	$output .= "\n\t" . '</div> ' . $this->endBlockComment( '.wpb_text_column' );
	
	echo $output;	
}