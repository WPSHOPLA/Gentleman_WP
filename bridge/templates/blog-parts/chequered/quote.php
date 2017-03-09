<a itemprop="url" class="ql_full_link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
<div class="post_content_holder">
    <i class="qoute_mark icon_quotations"></i>
    <div class="post_text">
        <div class="post_text_inner">
            <div class="post_title entry_title">
                <p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></p>
                <span class="quote_author"><?php the_title(); ?></span>
            </div>
        </div>
    </div>
</div>