<div class="post_image">
    <div class="flexslider">
        <ul class="slides">
            <?php
            $post_content = get_the_content();
            preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
            $array_id = explode(",", $ids[1]);

            foreach($array_id as $img_id){ ?>
                <li><a itemprop="url" target="_self" href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>