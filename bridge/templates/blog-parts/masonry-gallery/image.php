<?php if ( has_post_thumbnail() ) { ?>
    <div class="post_image">
        <a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail($thumb_size); ?>
        </a>
        <?php get_template_part('templates/blog-parts/masonry-gallery/date'); ?>
    </div>
<?php } ?>