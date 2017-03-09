<?php 
global $qode_options_proya;
$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
}
$blog_share_like_layout = 'in_post_info';
if (isset($qode_options_proya['blog_share_like_layout'])) {
    $blog_share_like_layout = $qode_options_proya['blog_share_like_layout'];
}
$enable_social_share = 'no';
if(isset($qode_options_proya['enable_social_share'])){
    $enable_social_share = $qode_options_proya['enable_social_share'];
}
$blog_author_info="no";
if (isset($qode_options_proya['blog_author_info'])) {
	$blog_author_info = $qode_options_proya['blog_author_info'];
}
$qode_like = "on";
if (isset($qode_options_proya['qode_like'])) {
    $qode_like = $qode_options_proya['qode_like'];
}

$gallery_post_layout = qode_check_gallery_post_layout(get_the_ID());

$params = array(
    'blog_share_like_layout' => $blog_share_like_layout,
    'enable_social_share' => $enable_social_share,
    'qode_like' => $qode_like
);

$_post_format = get_post_format();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post_content_holder">
		<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
			if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<?php if($_post_format == 'gallery') {

						$post_content = get_the_content();
						preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
						$array_id = explode(",", $ids[1]);
						$content =  str_replace($ids[0], "", $post_content);
						$filtered_content = apply_filters( 'the_content', $content);

						?>
							<div class="flexslider">
								<ul class="slides">
									<?php
									foreach ($array_id as $img_id) { ?>
										<li><a itemprop="url" href="<?php the_permalink(); ?>">
												<?php echo wp_get_attachment_image($img_id, 'full'); ?>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>

					<?php } else {
						the_post_thumbnail('full');
					} ?>
					<div class="single_top_part_holder">
						<div class="single_top_part">
							<div class="single_top_part_inner">
								<div class="grid_section">
									<div class="section_inner">
										<span class="post_category"><?php the_category(', '); ?></span>
										<h1 itemprop="name" class="entry_title"><?php the_title(); ?></h1>
										<div class="post_info">
											<span class="date entry_date updated" itemprop="dateCreated">
												<?php the_time(get_option('date_format')); ?>
												<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/>
											</span><span class="vertical_separator">|</span>
											<span class="post_author">
												<?php _e('by','qode'); ?>
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
											<?php if($blog_hide_comments != "yes"){ ?>
												<span class="vertical_separator">|</span>
												<a itemprop="url" class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a>
											<?php } ?>
											<?php if ($qode_like == "on") { ?>
												<span class="vertical_separator">|</span>
												<div class="blog_like">
													<?php if (function_exists('qode_like')) qode_like(); ?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } } ?>
		<div class="itp_post_text">
			<div class="post_text_inner">
				<?php
					if($_post_format == 'gallery') {
						print $filtered_content;
					} else {
						the_content();
					}
				?>
			</div>
		</div>
	</div>
			<div class="grid_section">
				<div class="section_inner">
					<div class="single_bottom_part">
						<div class="single_bottom_part_left">
							<?php if( has_tag()) { ?>
								<div class="single_tags clearfix">
									<div class="tags_text">
										<?php
										if ((isset($qode_options_proya['tags_border_style']) && $qode_options_proya['tags_border_style'] !== '') || (isset($qode_options_proya['tags_background_color']) && $qode_options_proya['tags_background_color'] !== '')){
											the_tags('', ' ', '');
										}
										else{
											the_tags('', ', ', '');
										}
										?>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="single_bottom_part_right">
							<?php
							if($blog_share_like_layout == 'below_post_text') {
								echo do_shortcode('[social_share_list]');
							}
							?>
						</div>
					</div>

					<?php
					$args_pages = array(
						'before'           => '<p class="single_links_pages">',
						'after'            => '</p>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
						'pagelink'         => '%'
					);

					wp_link_pages($args_pages);
					?>
					<?php if($blog_author_info == "yes") { ?>
						<div class="author_description">
							<div class="author_description_inner">
								<div class="image">
									<?php echo get_avatar(get_the_author_meta( 'ID' ), 75); ?>
								</div>
								<div class="author_text_holder">
									<h5 class="author_name vcard author">
				<span class="fu">
				<?php
				if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
					echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name');
				} else {
					echo get_the_author_meta('display_name');
				}
				?>
			    </span>
									</h5>
									<span class="author_email"><?php echo get_the_author_meta('email'); ?></span>
									<?php if(get_the_author_meta('description') != "") { ?>
										<div class="author_text">
											<p><?php echo get_the_author_meta('description') ?></p>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>


</article>