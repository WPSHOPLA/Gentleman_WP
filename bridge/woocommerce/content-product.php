<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $qode_options_proya;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}

?>
<li <?php post_class(); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
        <div class="top-product-section">

            <a itemprop="url" href="<?php the_permalink(); ?>" class="product-category">
                <span class="image-wrapper">
                <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );
                ?>
                </span>
            </a>

			<?php do_action('qode_woocommerce_after_product_image'); ?>

        </div>
        <?php if(isset($qode_options_proya['woo_products_show_categories']) && $qode_options_proya['woo_products_show_categories'] == 'yes') {
            echo $product->get_categories(', ','<div class="product-categories">','</div>');
        } ?>
        <a itemprop="url" href="<?php the_permalink(); ?>" class="product-category product-info">
            <h6 itemprop="name"><?php the_title(); ?></h6>

            <?php if(isset($qode_options_proya['woo_products_show_title_sep']) && $qode_options_proya['woo_products_show_title_sep'] == 'yes') { ?>
                <div class="separator after-title-spearator small center"></div>
            <?php } ?>

            <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
        </a>

        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>