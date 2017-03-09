<a itemprop="url" class="ql_full_link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
<div class="post_content_holder">
    <i class="link_mark icon_link_alt"></i>
    <?php get_template_part('templates/blog-parts/masonry-gallery/date', 'blog-masonry-gallery'); ?>
    <div class="post_text">
        <div class="post_text_inner">
            <div class="post_title entry_title">
                <p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            </div>
            <div class="post_info">
                <?php /* if($blog_enable_social_share == "yes"){
                    echo do_shortcode('[social_share_list]');
                } */ ?>
            </div>
        </div>
    </div>
</div>