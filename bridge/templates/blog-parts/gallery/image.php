<?php if ( has_post_thumbnail() ) { ?>
    <div class="post_image">
        <a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
			<?php echo qode_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$thumb_width,$thumb_height); ?>
        </a>
    </div>
<?php } ?>