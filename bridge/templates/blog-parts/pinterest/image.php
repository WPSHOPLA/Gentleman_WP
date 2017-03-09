<?php if ( has_post_thumbnail() ) { ?>
    <div class="post_image">
        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('full'); ?>
        </a>
    </div>
<?php } ?>