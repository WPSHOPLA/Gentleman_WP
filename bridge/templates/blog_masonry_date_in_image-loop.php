<?php 
global $qode_options_proya;
$blog_enable_social_share = "";
if(isset($qode_options_proya['enable_social_share'])){
	$blog_enable_social_share = $qode_options_proya['enable_social_share'];
}
?>
<?php
$_post_format = get_post_format();
$thumb_size = 'full';
$thumb_size_temp = get_post_meta(get_the_ID(),"qode_post_style_masonry_date_image",true);
switch ($thumb_size_temp) {
	case 'portrait':
		$thumb_size = 'portfolio-portrait';
		break;
	case 'landscape':
		$thumb_size = 'portfolio-landscape';
		break;
	case 'square':
		$thumb_size = 'portfolio-square';
		break;
	default:
		$thumb_size = 'full';
		break;
}
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
				<?php if($_video_type == "youtube") { ?>
					<iframe name="fitvid-<?php the_ID(); ?>" src="//www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" width="805" height="403" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "vimeo"){ ?>
					<iframe name="fitvid-<?php the_ID(); ?>" src="//player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" width="805" height="403" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "self"){ ?> 
					<div class="video"> 
					<div class="mobile-video-image" style="background-image: url(<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>);"></div> 
					<div class="video-wrap"  > 
						<video class="video" poster="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" preload="auto"> 
							<?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo get_post_meta(get_the_ID(), "video_format_webm", true);  ?>"> <?php } ?> 
							<?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>"> <?php } ?> 
							<?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo get_post_meta(get_the_ID(), "video_format_ogv", true);  ?>"> <?php } ?> 
							<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"> 
								<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" /> 
								<param name="flashvars" value="controls=true&file=<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>" /> 
								<img itemprop="image" src="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" /> 
							</object> 
						</video>   
					</div></div> 
				<?php } ?>
				<div itemprop="dateCreated" class="time entry_date updated">
					<span class="time_day"><?php the_time('d'); ?></span>
					<span class="time_month"><?php the_time('M'); ?></span>
					<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/>
				</div>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<?php qode_excerpt(); ?>
					<div class="post_info">
						<?php if($blog_enable_social_share == "yes"){
							echo do_shortcode('[social_share_list]');
						} ?>
					</div>
				</div>
			</div>
		</article>	

<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail($thumb_size); ?>
				</a>
				<div itemprop="dateCreated" class="time entry_date updated">
					<span class="time_day"><?php the_time('d'); ?></span>
					<span class="time_month"><?php the_time('M'); ?></span>
					<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/>
				</div>
				<audio class="blog_audio" src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
					<?php _e("Your browser don't support audio player","qode"); ?>
				</audio>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<?php qode_excerpt(); ?>
					<div class="post_info">
						<?php if($blog_enable_social_share == "yes"){
							echo do_shortcode('[social_share_list]');
						} ?>
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_content_holder">
					<div class="post_text">
						<div class="post_text_inner">
							<i class="link_mark fa fa-link pull-left"></i>
							<div class="post_title entry_title">
								<p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
							</div>
							<div class="post_info">
								<?php if($blog_enable_social_share == "yes"){
									echo do_shortcode('[social_share_list]');
								} ?>
							</div>	
						</div>
					</div>
				</div>
			</article>
<?php
		break;
		case "gallery":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_image">
					<div class="flexslider">
						<ul class="slides">
							<?php
								$post_content = get_the_content();
								preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
								$array_id = explode(",", $ids[1]);
								
								foreach($array_id as $img_id){ ?>
									<li><a itemprop="url" target="_self" href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, $thumb_size ); ?></a></li>
								<?php } ?>
						</ul>
					</div>
					<div itemprop="dateCreated" class="time entry_date updated">
						<span class="time_day"><?php the_time('d'); ?></span>
						<span class="time_month"><?php the_time('M'); ?></span>
						<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/>
					</div>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
						<?php qode_excerpt(); ?>
						<div class="post_info">
							<?php if($blog_enable_social_share == "yes"){
								echo do_shortcode('[social_share_list]');
							} ?>
						</div>
					</div>
				</div>
			</article>
<?php
		break;
		case "quote":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text">
					<div class="post_text_inner">
						<i class="qoute_mark fa fa-quote-right pull-left"></i>
						<div class="post_title entry_title">
							<p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></p>
							<span class="quote_author">&mdash; <?php the_title(); ?></span>
						</div>
						<div class="post_info">
							<?php if($blog_enable_social_share == "yes"){
								echo do_shortcode('[social_share_list]');
							} ?>
						</div>	
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail($thumb_size); ?>
					</a>
					<div itemprop="dateCreated" class="time entry_date updated">
						<span class="time_day"><?php the_time('d'); ?></span>
						<span class="time_month"><?php the_time('M'); ?></span>
						<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/>
					</div>
				</div>
			<?php } ?>
			<div class="post_text">
				<div class="post_text_inner">
					<h5 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<?php qode_excerpt(); ?>
					<div class="post_info">
						<?php if($blog_enable_social_share == "yes"){
							echo do_shortcode('[social_share_list]');
						} ?>
					</div>
				</div>
			</div>
		</article>
<?php
}
?>		

