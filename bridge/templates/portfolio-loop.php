<?php
global $qode_options_proya;
$id = get_the_ID();


$portfolio_qode_like = "on";
if (isset($qode_options_proya['portfolio_qode_like'])) {
	$portfolio_qode_like = $qode_options_proya['portfolio_qode_like'];
}

//is lightbox turned on for image single project?
$lightbox_single_project = "no";
if (isset($qode_options_proya['lightbox_single_project'])){
	$lightbox_single_project = $qode_options_proya['lightbox_single_project'];
}

//is lightbox turned on for video single project?
$lightbox_video_single_project  = 'no';
if (isset($qode_options_proya['lightbox_video_single_project'])) {
	$lightbox_video_single_project = $qode_options_proya['lightbox_video_single_project'];
}

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

$portfolio_text_follow = "portfolio_single_follow";
if (isset($qode_options_proya['portfolio_text_follow'])) {
    $portfolio_text_follow = $qode_options_proya['portfolio_text_follow'];
}

$porftolio_template = 1;
$portfolio_class = 'portfolio_template_1';
if(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) != ""){
    $porftolio_template = get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);
    $portfolio_class = 'portfolio_template_'.get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);
}elseif(isset($qode_options_proya['portfolio_style'])){
    $porftolio_template = $qode_options_proya['portfolio_style'];
    $porftolio_class = 'portfolio_template_'.$qode_options_proya['portfolio_style'];
}

$porftolio_single_template = get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);

$columns_number = "v4";
if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) != ""){
	if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 2){
		$columns_number = "v2";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 3){
		$columns_number = "v3";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 4){
		$columns_number = "v4";
	}
}else{
	if(isset($qode_options_proya['portfolio_columns_number'])){
		if($qode_options_proya['portfolio_columns_number'] == 2){
			$columns_number = "v2";
		} else if($qode_options_proya['portfolio_columns_number'] == 3) {
			$columns_number = "v3";
		} else if($qode_options_proya['portfolio_columns_number'] == 4) {
			$columns_number = "v4";
		}
	}
}

$disable_portfolio_single_title_label = true;
if(isset($qode_options_proya['disable_portfolio_single_title_label']) && $qode_options_proya['disable_portfolio_single_title_label'] === 'yes'){
    $disable_portfolio_single_title_label = false;
}
?>
<?php if(post_password_required()) {
	echo get_the_password_form();
} else { ?>

	<?php if($porftolio_template != "7"){
       $protocol = is_ssl() ? "https:" : "http:";
	?>
	<div class="portfolio_single <?php echo esc_attr($portfolio_class); ?>">
	<?php switch ($porftolio_template) {
		case 1: ?>
			<div class="two_columns_66_33 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_images">
							<?php

							$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
							if ($portfolio_m_images){
								$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
								foreach($portfolio_image_gallery_array as $gimg_id){
									$title = get_the_title($gimg_id);
									$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
									?>
									<?php if($lightbox_single_project == "yes"){ ?>
										<a itemprop="image" class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo $image_src; ?>" data-rel="prettyPhoto[single_pretty_photo]">
											<img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
										</a>
									<?php } else { ?>
										<img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
								<?php }
								}
							}
							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
							if ($portfolio_images){
								usort($portfolio_images, "comparePortfolioImages");
								foreach($portfolio_images as $portfolio_image){
									?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>
										<?php
										global $wpdb;
										$image_src = $portfolio_image['portfolioimg'];
										$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
										$id = $wpdb->get_var($query);
										$title = get_the_title($id);
										$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
										?>
										<?php if($lightbox_single_project == "yes"){ ?>
											<a itemprop="image" class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
												<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
											</a>
										<?php } else { ?>
											<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
										<?php } ?>

									<?php }else{ ?>

										<?php
										$portfoliovideotype = "";
										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
										switch ($portfoliovideotype){
											case "youtube": ?>
												<?php if($lightbox_video_single_project == "yes"){ ?>
													<?php
														$vidID = $portfolio_image['portfoliovideoid'];  
													    $url = "http://gdata.youtube.com/feeds/api/videos/".$vidID."?alt=json";
													    $xml = json_decode(@file_get_contents($url), true);

													    if(is_array($xml['entry']['title'])){
													    	$video_title = array_shift($xml['entry']['title']);
													    } else {
													    	$video_title = "";
													    }
													    
													    $thumbnail = "http://img.youtube.com/vi/".$vidID."/maxresdefault.jpg";
													?>
													<a itemprop="image" class="lightbox_single_portfolio video_in_lightbox" title="<?php echo $video_title; ?>" href="<?php echo $protocol;?>//www.youtube.com/watch?feature=player_embedded&v=<?php echo $vidID; ?>" rel="prettyPhoto[single_pretty_photo]">
														<i class="fa fa-play"></i>
														<img itemprop="image" width="100%" src="<?php echo $thumbnail; ?>"></img>
													</a>
												<?php } else { ?>
													<iframe width="100%" src="//www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
												<?php } ?>
												<?php	break;
											case "vimeo": ?>
												<?php if($lightbox_video_single_project == "yes"){ ?>
													<?php
														$vidID = $portfolio_image['portfoliovideoid'];
														$url = "http://vimeo.com/api/v2/video/".$vidID.".php";
													    $xml = unserialize(@file_get_contents($url));

												   		$video_title = $xml[0]['title'];
													    $thumbnail = $xml[0]['thumbnail_large'];
													?>
													<a itemprop="image" class="lightbox_single_portfolio video_in_lightbox" title="<?php echo $video_title; ?>" href="<?php echo $protocol;?>//vimeo.com/<?php echo $vidID; ?>" rel="prettyPhoto[single_pretty_photo]">
														<i class="fa fa-play"></i>
														<img itemprop="image" width="100%" src="<?php echo $thumbnail; ?>"></img>
													</a>
												<?php } else { ?>
													<iframe src="//player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												<?php } ?>
												<?php break;
											case "self": ?>
												<div class="video">
													<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
													<div class="video-wrap"  >
														<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
															<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
															<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
															<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
															<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
																<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
																<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
																<img itemprop="image" src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
															</object>
														</video>
													</div></div>
												<?php break;
										} ?>

									<?php } ?>
								<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail <?php echo $portfolio_text_follow; ?> clearfix">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a itemprop="url" href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p class="entry_date updated"><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<?php if($disable_portfolio_single_title_label) { ?>
								<h6><?php echo _e('About This Project','qode'); ?></h6>
							<?php } ?>
							<div class="info portfolio_content">
								<?php the_content(); ?>
							</div>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php get_template_part('templates/portfolio','navigation'); ?>

			<?php	break;
		case 2: ?>
			<div class="two_columns_66_33 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="flexslider">
							<ul class="slides">
								<?php
								$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
								if ($portfolio_m_images){
									$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
									foreach($portfolio_image_gallery_array as $gimg_id){
										$title = get_the_title($gimg_id);
										$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
										?>
											<li class="slide">
												<img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
											</li>
									<?php
									}
								}
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									usort($portfolio_images, "comparePortfolioImages");
									foreach($portfolio_images as $portfolio_image){
										?>

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>
											<?php
											global $wpdb;
											$image_src = $portfolio_image['portfolioimg'];
											$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
											$id = $wpdb->get_var($query);
											$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
											?>
											<li class="slide">
												<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
											</li>
										<?php }else{ ?>

											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<li class="slide">
														<iframe width="100%" src="//www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
													</li>
													<?php	break;
												case "vimeo": ?>
													<li class="slide">
														<iframe src="//player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													</li>
													<?php break;
												case "self": ?>
													<li class="slide">
														<div class="video">
															<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
															<div class="video-wrap"  >
																<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
																	<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
																	<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
																	<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
																	<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
																		<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
																		<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
																		<img itemprop="image" src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
																	</object>
																</video>
															</div></div>
													</li>
													<?php break;

											} ?>

										<?php } ?>

									<?php
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){

									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a itemprop="url" href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p class="entry_date updated"><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="info portfolio_content">
								<?php if($disable_portfolio_single_title_label) { ?>
									<h6><?php echo _e('About This Project','qode'); ?></h6>
								<?php } ?>
								<?php the_content(); ?>
							</div>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php get_template_part('templates/portfolio','navigation'); ?>

			<?php	break;
		case 3: ?>
			<div class="flexslider">
				<ul class="slides">
					<?php
					$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
					if ($portfolio_m_images){
						$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
						foreach($portfolio_image_gallery_array as $gimg_id){
							$title = get_the_title($gimg_id);
							$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
							?>
								<li class="slide">
									<img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
								</li>
						<?php
						}
					}
					$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
					if ($portfolio_images){
						foreach($portfolio_images as $portfolio_image){
							usort($portfolio_images, "comparePortfolioImages");
							?>

							<?php if($portfolio_image['portfolioimg'] != ""){ ?>
								<?php
								global $wpdb;
								$image_src = $portfolio_image['portfolioimg'];
								$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
								$id = $wpdb->get_var($query);
								$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
								?>
								<li class="slide">
									<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</li>
							<?php }else{ ?>

								<?php
								$portfoliovideotype = "";
								if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
								switch ($portfoliovideotype){
									case "youtube": ?>
										<li class="slide">
											<iframe width="100%" src="//www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
										</li>
										<?php	break;
									case "vimeo": ?>
										<li class="slide">
											<iframe src="//player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										</li>
										<?php break;
									case "self": ?>
										<div class="video">
											<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
											<div class="video-wrap"  >
												<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
													<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
													<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
														<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
														<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
														<img itemprop="image" src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
													</object>
												</video>
											</div></div>
										<?php break;
								} ?>

							<?php } ?>

						<?php
						}
					}
					?>
				</ul>
			</div>
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
							<?php if($disable_portfolio_single_title_label) { ?>
								<h3><?php echo _e('About This Project','qode'); ?></h3>
							<?php } ?>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a itemprop="url" href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p class="entry_date updated"><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php get_template_part('templates/portfolio','navigation'); ?>

			<?php	break;
		case 4: ?>
			<?php the_content(); ?>

            <?php get_template_part('templates/portfolio','navigation'); ?>
			<?php	break;
		case 5: ?>
			<div class="portfolio_images">
				<?php
				$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
				if ($portfolio_m_images){
					$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
					foreach($portfolio_image_gallery_array as $gimg_id){
						$title = get_the_title($gimg_id);
						$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
						?>
						<?php if($lightbox_single_project == "yes"){ ?>
							<a itemprop="image" class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo $image_src; ?>" data-rel="prettyPhoto[single_pretty_photo]">
								<img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
							</a>
						<?php } else { ?>
							<img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
					<?php }
					}
				}
				$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
				if ($portfolio_images){
					usort($portfolio_images, "comparePortfolioImages");
					foreach($portfolio_images as $portfolio_image){
						?>

						<?php if($portfolio_image['portfolioimg'] != ""){ ?>

							<?php
							global $wpdb;
							$image_src = $portfolio_image['portfolioimg'];
							$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
							$id = $wpdb->get_var($query);
							$title = get_the_title($id);
							$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
							?>

							<?php if($lightbox_single_project == "yes"){ ?>
								<a itemprop="image" class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
									<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</a>
							<?php } else { ?>
								<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
							<?php } ?>

						<?php }else{ ?>

							<?php
							$portfoliovideotype = "";
							if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
							switch ($portfoliovideotype){
								case "youtube": ?>
									<?php if($lightbox_video_single_project == "yes"){ ?>
										<?php
											$vidID = $portfolio_image['portfoliovideoid'];  
										    $url = "http://gdata.youtube.com/feeds/api/videos/".$vidID."?alt=json";
										    $xml = json_decode(@file_get_contents($url), true);

										    if(is_array($xml['entry']['title'])){
										    	$video_title = array_shift($xml['entry']['title']);
										    } else {
										    	$video_title = "";
										    }
										    
										    $thumbnail = "http://img.youtube.com/vi/".$vidID."/maxresdefault.jpg";
										?>
										<a itemprop="image" class="lightbox_single_portfolio video_in_lightbox" title="<?php echo $video_title; ?>" href="<?php echo $protocol;?>//www.youtube.com/watch?feature=player_embedded&v=<?php echo $vidID; ?>" rel="prettyPhoto[single_pretty_photo]">
											<i class="fa fa-play"></i>
											<img itemprop="image" width="100%" src="<?php echo $thumbnail; ?>"></img>
										</a>
									<?php } else { ?>
										<iframe width="100%" src="//www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
									<?php } ?>
									<?php	break;
								case "vimeo": ?>
									<?php if($lightbox_video_single_project == "yes"){ ?>
										<?php
											$vidID = $portfolio_image['portfoliovideoid'];
											$url = "http://vimeo.com/api/v2/video/".$vidID.".php";
										    $xml = unserialize(@file_get_contents($url));

									   		$video_title = $xml[0]['title'];
										    $thumbnail = $xml[0]['thumbnail_large'];
										?>
										<a itemprop="image" class="lightbox_single_portfolio video_in_lightbox" title="<?php echo $video_title; ?>" href="<?php echo $protocol;?>//vimeo.com/<?php echo $vidID; ?>" rel="prettyPhoto[single_pretty_photo]">
											<i class="fa fa-play"></i>
											<img itemprop="image" width="100%" src="<?php echo $thumbnail; ?>"></img>
										</a>
									<?php } else { ?>
										<iframe src="//player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									<?php } ?>
									<?php break;
								case "self": ?>
									<div class="video">
										<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
										<div class="video-wrap"  >
											<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
												<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
												<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
												<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
												<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
													<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
													<img itemprop="image" src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
												</object>
											</video>
										</div></div>
									<?php break;
							} ?>

						<?php } ?>

					<?php
					}
				}
				?>
			</div>
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
							<?php if($disable_portfolio_single_title_label) { ?>
								<h3><?php echo _e('About This Project','qode'); ?></h3>
							<?php } ?>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail <?php echo $portfolio_text_follow; ?>">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a itemprop="url" href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p class="entry_date updated"><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php get_template_part('templates/portfolio','navigation'); ?>
			<?php	break;
		case 6: ?>
			<div class="portfolio_gallery">
				<?php
				$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
                if ($portfolio_m_images){
                    $portfolio_image_gallery_array=explode(',',$portfolio_m_images);
                    foreach($portfolio_image_gallery_array as $gimg_id){
                        $title = get_the_title($gimg_id);
                        $alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
						$portfolio_gallery_thumb_size = get_post_meta($id, 'qode_portfolio_gallery_image_orientation', true);
						$portfolio_gallery_thumb_size = (!empty($portfolio_gallery_thumb_size)) ? get_post_meta($id, 'qode_portfolio_gallery_image_orientation', true) : 'full';

						$original_img = wp_get_attachment_image_src($gimg_id, 'full');
						if(is_array($original_img)) {
							$original_img = $original_img[0];
						}

                        $image_src = wp_get_attachment_image_src($gimg_id, $portfolio_gallery_thumb_size);
                        if (is_array($image_src)) {
							$image_src = $image_src[0];
						}

                        ?>
                        <?php if($lightbox_single_project == "yes"){ ?>
                            <a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $title;  ?>" href="<?php echo $original_img; ?>" data-rel="prettyPhoto[single_pretty_photo]">
                                <span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $title;  ?></h6></span></span>
                                <img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
                            </a>
                        <?php } else { ?>
                            <a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
                                <span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $title;  ?></h6></span></span>
                                <img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
                            </a>
                        <?php }
                    }
                }
				$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
				if ($portfolio_images){
					usort($portfolio_images, "comparePortfolioImages");
					foreach($portfolio_images as $portfolio_image){
						?>

						<?php if($portfolio_image['portfolioimg'] != ""){ ?>
							<?php
							global $wpdb;
							$image_src = $portfolio_image['portfolioimg'];
							$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
							$id = $wpdb->get_var($query);
							$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
							?>
							<?php if($lightbox_single_project == "yes"){ ?>
								<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
									<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
									<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</a>
							<?php } else { ?>
								<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
									<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
									<img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</a>
							<?php } ?>

						<?php }else{ ?>

							<?php
							$portfoliovideotype = "";
							if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
							switch ($portfoliovideotype){
								case "youtube": ?>
									<?php if($lightbox_single_project == "yes"){ ?>
										<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo $protocol;?>//www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
											<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
											<img itemprop="image" width="100%" src="//img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg" />
										</a>
									<?php } else { ?>
										<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
											<iframe width="100%" src="//www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
										</a>
									<?php } ?>
									<?php	break;
								case "vimeo": ?>
									<?php if($lightbox_single_project == "yes"){
										$videoid = $portfolio_image['portfoliovideoid'];
										$xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$videoid.".xml");
										$xml = $xml->video;
										$xml_pic = $xml->thumbnail_large; ?>
										<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo $protocol;?>//vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
											<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
											<img itemprop="image" width="100%" src="<?php echo $xml_pic;  ?>" />
										</a>
									<?php } else { ?>
										<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="">
											<iframe src="//player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										</a>
									<?php } ?>

									<?php break;
								case "self": ?>

									<a itemprop="image" class="lightbox_single_portfolio <?php echo $columns_number; ?>" onclick='return false;' href="#">
										<div class="video">
											<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
											<div class="video-wrap"  >
												<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
													<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
													<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
														<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
														<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
														<img itemprop="image" src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
													</object>
												</video>
											</div>
										</div>
									</a>

									<?php break;
							} ?>

						<?php } ?>

					<?php
					}
				}
				?>
			</div>
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
							<?php if($disable_portfolio_single_title_label) { ?>
								<h3><?php echo _e('About This Project','qode'); ?></h3>
							<?php } ?>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a itemprop="url" href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p class="entry_date updated"><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php get_template_part('templates/portfolio','navigation'); ?>
			<?php
        break;
        case 8: ?>
            <div class="flexslider">
                <ul class="slides">
                    <?php
                    $portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
                    if ($portfolio_m_images){
                        $portfolio_image_gallery_array=explode(',',$portfolio_m_images);
                        foreach($portfolio_image_gallery_array as $gimg_id){
                            $title = get_the_title($gimg_id);
                            $alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
                            $image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
                            if (is_array($image_src)) $image_src = $image_src[0];
                            ?>
                            <li class="slide">
                                <img itemprop="image" src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
                            </li>
                        <?php
                        }
                    }
                    $portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
                    if ($portfolio_images){
                        foreach($portfolio_images as $portfolio_image){
                            usort($portfolio_images, "comparePortfolioImages");
                            ?>

                            <?php if($portfolio_image['portfolioimg'] != ""){ ?>
                                <?php
                                global $wpdb;
                                $image_src = $portfolio_image['portfolioimg'];
                                $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
                                $id = $wpdb->get_var($query);
                                $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                                ?>
                                <li class="slide">
                                    <img itemprop="image" src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
                                </li>
                            <?php }else{ ?>

                                <?php
                                $portfoliovideotype = "";
                                if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
                                switch ($portfoliovideotype){
                                    case "youtube": ?>
                                        <li class="slide">
                                            <iframe width="100%" src="//www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
                                        </li>
                                        <?php	break;
                                    case "vimeo": ?>
                                        <li class="slide">
                                            <iframe src="//player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                        </li>
                                        <?php break;
                                    case "self": ?>
                                        <div class="video">
                                            <div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
                                            <div class="video-wrap"  >
                                                <video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
                                                    <?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
                                                    <?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
                                                    <?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
                                                    <object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
                                                        <param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
                                                        <param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
                                                        <img itemprop="image" src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
                                                    </object>
                                                </video>
                                            </div></div>
                                        <?php break;
                                } ?>

                            <?php } ?>

                        <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="icon_social_holder">
                <?php echo do_shortcode('[social_share show_share_icon="yes"]'); ?>
                <div class="qode_print">
                    <a href="#" onClick="window.print();return false;" class="qode_print_page">
                        <span class="icon-basic-printer qode_icon_printer"></span>
                        <span class="eltd-printer-title"><?php esc_html_e("Print page", "qode") ?></span>
                    </a>
                </div>
                <?php if($portfolio_qode_like == "on") { ?>
                    <div class="qode_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
                <?php } ?>
            </div>
            <div class="two_columns_75_25 clearfix portfolio_container">
                <div class="column1">
                    <div class="column_inner">
                        <div class="portfolio_single_text_holder">
                            <?php if($disable_portfolio_single_title_label) { ?>
								<h3><?php echo _e('About This Project','qode'); ?></h3>
							<?php } ?>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="column2">
                    <div class="column_inner">
                        <div class="portfolio_detail">
                            <?php
                            $portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
                            if ($portfolios){
                                usort($portfolios, "comparePortfolioOptions");
                                foreach($portfolios as $portfolio){
                                    ?>
                                    <div class="info portfolio_custom_field">
                                        <?php if($portfolio['optionLabel'] != ""): ?>
                                            <h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
                                        <?php endif; ?>
                                        <p>
                                            <?php if($portfolio['optionUrl'] != ""): ?>
                                                <a itemprop="url" href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
                                                    <?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
                                                </a>
                                            <?php else:?>
                                                <?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                            <?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
                                <div class="info portfolio_custom_date">
                                    <h6><?php _e('Date','qode'); ?></h6>
                                    <p class="entry_date updated"><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></p>
                                </div>
                            <?php endif; ?>
                            <?php
                            $terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
                            $counter = 0;
                            $all = count($terms);
                            if($all > 0){
                                ?>
                                <div class="info portfolio_categories">
                                    <h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

                                                    foreach($terms as $term) {
                                                        $counter++;
                                                        if($counter < $all){ $after = ', ';}
                                                        else{ $after = ''; }
                                                        echo $term->name.$after;
                                                    }
                                                    ?>
													</span>
                                </div>
                            <?php } ?>
                            <?php
                            $portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

                            if(is_array($portfolio_tags) && count($portfolio_tags)) {
                                foreach ($portfolio_tags as $portfolio_tag) {
                                    $portfolio_tags_array[] = $portfolio_tag->name;
                                }

                                ?>
                                <div class="info portfolio_tags">
                                    <h6><?php _e('Tags', 'qode') ?></h6>
                                    <span class="category">
                                        <?php echo implode(', ', $portfolio_tags_array) ?>
                                    </span>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('templates/portfolio','navigation'); ?>
        <?php break;
	}
	?>
	</div>
			<?php } ?>
			<?php switch ($porftolio_template) {
				case 7: ?>
					<div class="full_width">
						<div class="full_width_inner">
							<div class="portfolio_single">
								<?php the_content(); ?>

								<div class="container">
									<div class="container_inner clearfix">
                                        <?php get_template_part('templates/portfolio','navigation'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php break;
			} ?>
<?php } ?>