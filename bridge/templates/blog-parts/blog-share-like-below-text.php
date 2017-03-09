<?php if($blog_share_like_layout == 'below_post_text') { ?>
    <div class="icon_social_holder">
        <?php echo do_shortcode('[social_share show_share_icon="yes"]'); ?>
        <div class="qode_print">
            <a href="#" onClick="window.print();return false;" class="qode_print_page">
                <span class="icon-basic-printer qode_icon_printer"></span>
                <span class="eltd-printer-title"><?php esc_html_e("Print page", "qode") ?></span>
            </a>
        </div>
        <?php if($qode_like == "on") { ?>
            <div class="qode_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
        <?php } ?>
    </div>
<?php } ?>