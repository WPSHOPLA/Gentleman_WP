<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

        <p class="woocommerce-message"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

        <p class="woocommerce-message"><?php
            if ( is_user_logged_in() )
                _e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
            else
                _e( 'Please attempt your purchase again.', 'woocommerce' );
        ?></p>

        <p class="woocommerce-message">
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

        <p class="woocommerce-message"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

        <ul class="order_details clearfix">
            <li class="order">
                <span><?php _e( 'Order:', 'woocommerce' ); ?></span>
                <p><?php echo $order->get_order_number(); ?></p>
            </li>
            <li class="date">
                <span><?php _e( 'Date:', 'woocommerce' ); ?></span>
                <p><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></p>
            </li>
            <li class="total">
                <span><?php _e( 'Total:', 'woocommerce' ); ?></span>
                <p><?php echo $order->get_formatted_order_total(); ?></p>
            </li>
            <?php if ( $order->payment_method_title ) : ?>
            <li class="method">
                <span><?php _e( 'Payment method:', 'woocommerce' ); ?></span>
                <p><?php echo $order->payment_method_title; ?></p>
            </li>
            <?php endif; ?>
        </ul>
        <div class="clear"></div>

    <?php endif; ?>

    <div class="order-details-wrapper">
        <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
        <?php do_action( 'woocommerce_thankyou', $order->id ); ?>
    </div>


<?php else : ?>

    <p class="message"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>