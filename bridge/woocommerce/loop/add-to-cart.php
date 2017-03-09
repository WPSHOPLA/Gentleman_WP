<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
global $qode_options_proya;

$button_classes = ' qbutton add-to-cart-button';
if (isset($qode_options_proya['woo_products_add_to_cart_hover_type']) && $qode_options_proya['woo_products_add_to_cart_hover_type'] !== ''){
	$button_classes .= ' enlarge';
}

if ( ! $product->is_in_stock() ) : ?>
    <span class="onsale out-of-stock-button">
        <span class="out-of-stock-button-inner">
            <?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Out of stock', 'woocommerce' ) ); ?>
        </span>
    </span>
<?php else :
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<span class="add-to-cart-button-outer"><span class="add-to-cart-button-inner"><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="qbutton add-to-cart-button %s">%s</a></span></span>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( (isset( $class ) ? $class : 'button').$button_classes ),
		esc_html( $product->add_to_cart_text() )
	),
$product );

endif; 
?>