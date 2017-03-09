<?php
class Woocommerce_Dropdown_Cart extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'woocommerce-dropdown-cart', // Base ID
			'Woocommerce Dropdown Cart', // Name
			array( 'description' => __( 'Woocommerce Dropdown Cart', 'qode' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		echo $before_widget;
		global $woocommerce;
		global $qode_options_proya;
		$cart_holder_class = 'header_cart';

		if (isset($qode_options_proya['woo_cart_type'])){
			$cart_type = $qode_options_proya['woo_cart_type'];
			switch ($cart_type) {
				case 'font-elegant':
					$cart_holder_class = "header_cart cart_icon";
					break;
				default:
					$cart_holder_class = "header_cart";
					break;
			}
		}
		?>
		<div class="shopping_cart_outer">
		<div class="shopping_cart_inner">
		<div class="shopping_cart_header">
			<a class="<?php echo esc_attr($cart_holder_class);?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><span class="header_cart_span"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>
			<div class="shopping_cart_dropdown">
			<div class="shopping_cart_dropdown_inner">
				<?php
					$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
					$list_class = array( 'cart_list', 'product_list_widget' );
				?>
					<ul class="<?php echo implode(' ', $list_class); ?>">

						<?php if ( !$cart_is_empty ) : ?>

							<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

								$_product = $cart_item['data'];

								// Only display if allowed
								if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
									continue;
								}

								// Get price
								$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

								$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
								?>

								<li>
									<a itemprop="url" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

										<?php echo $_product->get_image(); ?>

										<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

									</a>

									<?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>

									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</li>

							<?php endforeach; ?>

						<?php else : ?>

							<li><?php _e( 'No products in the cart.', 'woocommerce' ); ?></li>

						<?php endif; ?>

					</ul>
				</div>
			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>
			
			<?php endif; ?>

                <a itemprop="url" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="qbutton white view-cart"><?php _e( 'Cart', 'woocommerce' ); ?> <i class="fa fa-shopping-cart"></i></a>

                    <span class="total"><?php _e( 'Total', 'woocommerce' ); ?>:<span><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span></span>


			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>
			
			<?php endif; ?>
	</div>
</div>
		</div>
		</div>
	<?php
		echo $after_widget;
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		return $instance;
	}

} 
add_action( 'widgets_init', create_function( '', 'register_widget( "Woocommerce_Dropdown_Cart" );' ) );
?>
<?php 
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="header_cart_span"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
	<?php
		$fragments['span.header_cart_span'] = ob_get_clean();
		return $fragments;	
}
?>