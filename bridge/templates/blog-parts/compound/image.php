<?php if ( has_post_thumbnail() ) { ?>
    <div class="post_image">
        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        	<span class="qodef-image-shader">
	            <?php the_post_thumbnail($image_size); ?>
	        </span>
        </a>
    </div>
<?php } ?>