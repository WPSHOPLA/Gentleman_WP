<div class="post_text">
    <div class="post_text_inner">
		<span itemprop="dateCreated" class="date entry_date updated">
			<?php the_time(get_option('date_format')); ?>
			<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/>
		</span>
        <h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
        <div class="post_info">
			<?php the_category(' / '); ?>
        </div>
    </div>
</div>