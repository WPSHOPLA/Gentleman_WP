<div class="post_text">
    <div class="post_text_inner">
        <span class="icon_quotations icon" aria-hidden="true"></span>
        <h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><span><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></span></a></h5>
        <span class="quote_author">&mdash; <?php the_title(); ?></span>
    </div>
</div>