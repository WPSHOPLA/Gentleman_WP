<?php 
global $qode_options_proya;
$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
}

$blog_hide_author = "";
if (isset($qode_options_proya['blog_hide_author'])) {
    $blog_hide_author = $qode_options_proya['blog_hide_author'];
}

$qode_like = "on";
if (isset($qode_options_proya['qode_like'])) {
	$qode_like = $qode_options_proya['qode_like'];
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post_content_holder">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post_image">
				<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('full'); ?>
				</a>
			</div>
		<?php } ?>
		<div class="post_text">
			<div class="post_text_inner">
				<h2 itemprop="name" class="entry_title"><span itemprop="dateCreated" class="date entry_date updated"><?php the_time('d M'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span> <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="post_info">
					<span class="time"><?php _e('Posted at','qode'); ?> <?php the_time('H:i'); ?><?php _e('h','qode'); ?></span>

					<?php $category = get_the_category(get_the_ID()); ?>
					<?php if(!empty($category)){ ?>
							<?php _e('in','qode'); ?>
							<?php the_category(', '); ?>
					<?php } 
					?>
					<?php if($blog_hide_author == "no") { ?>
						<span class="post_author">
                                    <?php _e('by','qode'); ?>
							<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
                                </span>
					<?php } ?>
					<?php if($blog_hide_comments != "yes"){ ?>
						<span class="dots"><i class="fa fa-square"></i></span><a itemprop="url" class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a>
					<?php } ?>
					<?php if( $qode_like == "on" ) { ?>
						<span class="dots"><i class="fa fa-square"></i></span><div class="blog_like">
							<?php if( function_exists('qode_like') ) qode_like(); ?>
						</div>
					<?php } ?>
					<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
						<span class="dots"><i class="fa fa-square"></i></span><?php echo do_shortcode('[social_share]'); ?>
					<?php } ?>
				</div>
				<?php
					$my_excerpt = get_the_excerpt();
					if ($my_excerpt != '') {
						echo $my_excerpt;
					}
				?>
				<div class="post_more">
					<a itemprop="url" href="<?php the_permalink(); ?>" class="qbutton small"><?php _e('Read More','qode'); ?></a>
				</div>
			</div>
		</div>
	</div>
</article>