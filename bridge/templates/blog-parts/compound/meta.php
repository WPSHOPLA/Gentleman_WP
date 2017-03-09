
<div class="post_meta">
    <div class="three_columns">
        <div class="column1">
            <div class="column_inner">
                <?php if($blog_hide_comments != "yes"){ ?>
                    <a itemprop="url" class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a>
                <?php } ?>
            </div>
        </div>
        <div class="column2">
            <div class="column_inner">
                <a itemprop="url" href="<?php the_permalink(); ?>" class="qbutton small"><?php _e('Continue Reading','qode'); ?></a>
            </div>
        </div>
        <div class="column3">
            <div class="column_inner">
                <?php if( $qode_like == "on" ) { ?>
                    <div class="blog_like">
                        <?php if( function_exists('qode_like') ) qode_like(); ?>
                    </div>
                <?php } ?>
                <?php if($enable_social_share == "yes") { ?>
                    <?php echo do_shortcode('[social_share]'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>