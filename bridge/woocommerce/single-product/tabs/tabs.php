<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
$single_type = qode_woocommerce_single_type();
$tabs_position_class = 'left';
if($single_type == 'tabs-on-bottom'){
	$tabs_position_class = 'center';
}

if ( ! empty( $tabs ) ) : ?>
	<?php if($single_type != '') { ?>
		<div class="q_tabs horizontal <?php echo esc_attr__($tabs_position_class);?>">
			<ul class="tabs-nav">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>_tab">
						<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="tabs-container">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<div class="tab-content" id="tab-<?php echo esc_attr( $key ); ?>">
						<?php call_user_func( $tab['callback'], $key, $tab ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php } else { ?>

		<div class="q_accordion_holder toggle boxed woocommerce-accordion">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<h6 class="title-holder clearfix <?php echo esc_attr($key) ?>_tab">
					<span class="tab-title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
				</h6>
				<div class="accordion_content">
					<div class="accordion_content_inner">
						<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				</div>

			<?php endforeach; ?>
		</div>

	<?php } ?>

<?php endif; ?>