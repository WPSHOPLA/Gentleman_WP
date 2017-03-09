<div class="post_title">
    <span class="category"><?php the_category(', '); ?><span class="date">  / <?php the_time('d.m.Y'); ?></span></span>
    <h2 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <?php echo do_shortcode('[vc_separator type="small" position="center" width="27" up="18" down="32"]'); ?>
</div>