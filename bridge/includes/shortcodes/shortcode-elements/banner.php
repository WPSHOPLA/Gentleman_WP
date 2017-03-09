<?php
/* Banner shortcode */

if (!function_exists('qode_banner')) {

    function qode_banner($atts, $content = null) {
        $args = array(
			'image'					=> '',
			'link'					=> '',
			'vertical_alignment'	=> 'center',
			'target'				=> '_self'

        );
        extract(shortcode_atts($args, $atts));

		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
		$image_alt = '';
		$banner_classes = array('qode-banner');
		if($vertical_alignment != '') {
			$banner_classes[] = 'qode-banner-va-'.$vertical_alignment;
		}

		$html = '';
        $html .= '<div '. qode_get_class_attribute(implode(' ', $banner_classes)) .'>';

		if($link != '') {
			$html .= '<a class="qode-banner-link" href="'. esc_url($link) . '" target="'. $target .'"></a>';
		}

		if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
			$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
        } else {
            $image_src = $image;
        }
		$html .= '<div class="qode-banner-image">';
        	$html .= '<img itemprop="image" src="' . $image_src . '" alt="' . $image_alt . '" />';
		$html .= '</div>';

		$html .= '<div class="qode-banner-content">';
		$html .= '<div class="qode-banner-content-inner">';
			$html .= '<div class="qode-banner-text-holder">';
					$html .= do_shortcode($content);
			$html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
    add_shortcode('qode_banner', 'qode_banner');
}