<a itemprop="url" class="ql_full_link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
<div class="post_content_holder">
    <i class="qoute_mark icon_quotations"></i>
    <?php get_template_part('templates/blog-parts/masonry-gallery/date', 'blog-masonry-gallery'); ?>
    <div class="post_text">
        <div class="post_text_inner">
            <div class="post_title entry_title">
                <p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></p>
                <span class="quote_author">&mdash; <?php the_title(); ?></span>
            </div>
            <div class="post_info">
                <?php /* if($blog_enable_social_share == "yes"){
                    echo do_shortcode('[social_share_list]');
                } */ ?>
            </div>
        </div>
    </div>
</div>