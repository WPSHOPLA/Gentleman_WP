<div class="post_image">
    <?php
    $post_content = get_the_content();
    preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
    $array_id = explode(",", $ids[1]);
    switch ($gallery_post_layout) {
        case 'slider':
            ?>
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    foreach ($array_id as $img_id) { ?>
                        <li><a itemprop="url"
                               href="<?php the_permalink(); ?>">
                               <span class="qodef-image-shader"> 
                                   <?php echo wp_get_attachment_image($img_id, 'full'); ?>
                               </span>
                           </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php break;
        case 'masonry':
            echo qode_get_blog_gallery_layout($array_id,true);
            break;
    } ?>
</div>