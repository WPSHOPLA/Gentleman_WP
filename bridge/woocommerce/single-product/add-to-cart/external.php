<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $qode_options_proya;

$button_classes = 'single_add_to_cart_button qbutton button alt';
if (isset($qode_options_proya['woo_products_add_to_cart_hover_type']) && $qode_options_proya['woo_products_add_to_cart_hover_type'] !== ''){
	$button_classes .= ' '.$qode_options_proya['woo_products_add_to_cart_hover_type'];
}
?>

<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

<p class="cart">
	<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="<?php echo esc_attr($button_classes);?>"><?php echo $button_text; ?></a>
</p>

<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>