<?php if($blog_share_like_layout == 'in_post_info') { ?>
    <?php if ($qode_like == "on") { ?>
        <span class="dots"><i class="fa fa-square"></i></span>
        <div class="blog_like">
            <?php if (function_exists('qode_like')) qode_like(); ?>
        </div>
    <?php } ?>
    <?php if ($enable_social_share == "yes") { ?>
        <span class="dots"><i class="fa fa-square"></i></span><?php echo do_shortcode('[social_share]'); ?>
    <?php }
} ?>