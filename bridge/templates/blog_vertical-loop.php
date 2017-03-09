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

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
if($paged == 1){
    $next_post_class = '';
	$preload_background_class = "preload_background";
}else{
    $next_post_class = 'next_post';
	$preload_background_class = "";
}

$number_of_pages = intval($wp_query->max_num_pages);
if($paged - 2 == 0){
	$previous_page = $number_of_pages;
}else if($paged - 2 < 0){
	$previous_page = $number_of_pages - 1;
}else{
	$previous_page = $paged - 2;
}

$_post_format = get_post_format();
?>
<?php
switch ($_post_format) {
    case "video":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($next_post_class); ?>>
            
			<div class="grid_section blog_load_next">
				<div class="section_inner">
					<div class="blog_vertical_loop_button_holder">
						<?php if(get_next_posts_link()) { ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><?php echo wp_kses_post(get_next_posts_link('')); ?></span></div>
						<?php }else{ ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link(1, true)); ?>"></a></span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
						<div class="grid_section blog_load_prev">
							<div class="section_inner">
								<div class="blog_vertical_loop_button_holder prev_post">
									<div class="last_page"><a href="<?php echo esc_url(get_pagenum_link($number_of_pages, true)); ?>"></a></div>
									<div class="blog_vertical_loop_back_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link($previous_page, true)); ?>"></a></span></div>
								</div>
							</div>
						</div>
                        <div class="post_image_inner">
							<a itemprop="url" class="<?php echo esc_attr($preload_background_class); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url('<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>');"></a>
							<div class="post_image_title"><div class="post_image_title_inner"><div class="grid_section"><div class="section_inner"><h2 itemprop="name" class="entry_title"><?php the_title(); ?></h2></div></div></div></div>
						</div>
                    </div>
                <?php } ?>
                <div class="grid_section">
                    <div class="section_inner">
                        <div class="post_text">
                            <div class="post_text_inner">
								<div class="post_info">
									<span itemprop="dateCreated" class="time entry_date updated"><?php the_time('d F, Y'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>
									<span class="category"><?php the_category(', '); ?></span>
									<?php if($blog_hide_comments != "yes"){ ?>
										<span class="post_comments_holder"><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a></span>
									<?php } ?>
									<?php if($blog_hide_author == "no") { ?>
										<span class="post_author">
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
									<?php } ?>
									<?php if( $qode_like == "on" ) { ?>
										<div class="blog_like">
											<?php if( function_exists('qode_like') ) qode_like(); ?>
										</div>
									<?php } ?>
									<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
										<?php echo do_shortcode('[social_share]'); ?>
									<?php } ?>
								</div>
								<h2 itemprop="name" class="entry_title">
                                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <?php the_content(); ?>
								<a itemprop="url" class="qbutton  small loop_more" href="<?php the_permalink(); ?>"><?php _e('See More', 'qode'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php
        break;
    case "audio":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($next_post_class); ?>>
            <div class="grid_section blog_load_next">
				<div class="section_inner">
					<div class="blog_vertical_loop_button_holder">
						<?php if(get_next_posts_link()) { ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><?php echo wp_kses_post(get_next_posts_link('')); ?></span></div>
						<?php }else{ ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link(1, true)); ?>"></a></span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
					
						<div class="grid_section blog_load_prev">
							<div class="section_inner">
								<div class="blog_vertical_loop_button_holder prev_post">
									<div class="last_page"><a href="<?php echo esc_url(get_pagenum_link($number_of_pages, true)); ?>"></a></div>
									<div class="blog_vertical_loop_back_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link($previous_page, true)); ?>"></a></span></div>
								</div>
							</div>
						</div>
						<div class="post_image_inner">
							<a itemprop="url" class="<?php echo esc_attr($preload_background_class); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');"></a>
							<div class="post_image_title"><div class="post_image_title_inner"><div class="grid_section"><div class="section_inner"><h2 itemprop="name" class="entry_title"><?php the_title(); ?></h2></div></div></div></div>
						</div>
                    </div>
                <?php } ?>
                <div class="grid_section">
                    <div class="section_inner">
                        <div class="post_text">
                            <div class="post_text_inner">
								<div class="post_info">
									<span itemprop="dateCreated" class="time entry_date updated"><?php the_time('d F, Y'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>
									<span class="category"><?php the_category(', '); ?></span>
									<?php if($blog_hide_comments != "yes"){ ?>
										<span class="post_comments_holder"><a itemprop="url" class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a></span>
									<?php } ?>
									<?php if($blog_hide_author == "no") { ?>
										<span class="post_author">
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
									<?php } ?>
									<?php if( $qode_like == "on" ) { ?>
										<div class="blog_like">
											<?php if( function_exists('qode_like') ) qode_like(); ?>
										</div>
									<?php } ?>
									<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
										<?php echo do_shortcode('[social_share]'); ?>
									<?php } ?>
								</div>
								<h2 itemprop="name" class="entry_title">
                                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <?php the_content(); ?>
								<a itemprop="url" class="qbutton  small loop_more" href="<?php the_permalink(); ?>"><?php _e('See More', 'qode'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php
        break;
    case "link":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($next_post_class); ?>>
            <div class="grid_section blog_load_next">
				<div class="section_inner">
					<div class="blog_vertical_loop_button_holder">
						<?php if(get_next_posts_link()) { ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><?php echo wp_kses_post(get_next_posts_link('')); ?></span></div>
						<?php }else{ ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link(1, true)); ?>"></a></span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
					
						<div class="grid_section blog_load_prev">
							<div class="section_inner">
								<div class="blog_vertical_loop_button_holder prev_post">
									<div class="last_page"><a href="<?php echo esc_url(get_pagenum_link($number_of_pages, true)); ?>"></a></div>
									<div class="blog_vertical_loop_back_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link($previous_page, true)); ?>"></a></span></div>
								</div>
							</div>
						</div>
						<div class="post_image_inner">
							<a itemprop="url" class="<?php echo esc_attr($preload_background_class); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');"></a>
							<div class="post_image_title"><div class="post_image_title_inner"><div class="grid_section"><div class="section_inner"><h2 itemprop="name" class="entry_title"><?php the_title(); ?></h2></div></div></div></div>
						</div>
                    </div>
                <?php } ?>
                <div class="grid_section">
                    <div class="section_inner">
                        <div class="post_text_columns">
                            <div class="post_text">
                                <div class="post_text_inner">
									<div class="post_info">
										<span itemprop="dateCreated" class="time entry_date updated"><?php the_time('d F, Y'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>
										<span class="category"><?php the_category(', '); ?></span>
										<?php if($blog_hide_comments != "yes"){ ?>
											<span class="post_comments_holder"><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a></span>
										<?php } ?>
										<?php if($blog_hide_author == "no") { ?>
											<span class="post_author">
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
										<?php } ?>
										<?php if( $qode_like == "on" ) { ?>
											<div class="blog_like">
												<?php if( function_exists('qode_like') ) qode_like(); ?>
											</div>
										<?php } ?>
										<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
											<?php echo do_shortcode('[social_share]'); ?>
										<?php } ?>
									</div>
									<i class="link_mark fa fa-link pull-left"></i>
									<div class="post_title entry_title">
										<p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
									</div>
                                </div>
	                           </div>
							<?php the_content();?>
							<a itemprop="url" class="qbutton  small loop_more" href="<?php the_permalink(); ?>"><?php _e('See More', 'qode'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php
        break;
    case "gallery":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($next_post_class); ?>>
            <div class="grid_section blog_load_next">
				<div class="section_inner">
					<div class="blog_vertical_loop_button_holder">
						<?php if(get_next_posts_link()) { ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><?php echo wp_kses_post(get_next_posts_link('')); ?></span></div>
						<?php }else{ ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link(1, true)); ?>"></a></span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
					
						<div class="grid_section blog_load_prev">
							<div class="section_inner">
								<div class="blog_vertical_loop_button_holder prev_post">
									<div class="last_page"><a href="<?php echo esc_url(get_pagenum_link($number_of_pages, true)); ?>"></a></div>
									<div class="blog_vertical_loop_back_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link($previous_page, true)); ?>"></a></span></div>
								</div>
							</div>
						</div>
						<div class="post_image_inner">
							<a itemprop="url" class="<?php echo esc_attr($preload_background_class); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');"></a>
							<div class="post_image_title"><div class="post_image_title_inner"><div class="grid_section"><div class="section_inner"><h2 itemprop="name" class="entry_title"><?php the_title(); ?></h2></div></div></div></div>
						</div>
                    </div>
                <?php } ?>
                <div class="grid_section">
                    <div class="section_inner">
                        <div class="post_text">
                            <div class="post_text_inner">
								<div class="post_info">
									<span itemprop="dateCreated" class="time entry_date updated"><?php the_time('d F, Y'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>
									<span class="category"><?php the_category(', '); ?></span>
									<?php if($blog_hide_comments != "yes"){ ?>
										<span class="post_comments_holder"><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a></span>
									<?php } ?>
									<?php if($blog_hide_author == "no") { ?>
										<span class="post_author">
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
									<?php } ?>
									<?php if( $qode_like == "on" ) { ?>
										<div class="blog_like">
											<?php if( function_exists('qode_like') ) qode_like(); ?>
										</div>
									<?php } ?>
									<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
										<?php echo do_shortcode('[social_share]'); ?>
									<?php } ?>
								</div>
								<h2 itemprop="name" class="entry_title">
									<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								</h2>
								<?php the_content();?>
								<a itemprop="url" class="qbutton small loop_more" href="<?php the_permalink(); ?>"><?php _e('See More', 'qode'); ?></a>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php
        break;
    case "quote":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class($next_post_class); ?>>
            <div class="grid_section blog_load_next">
				<div class="section_inner">
					<div class="blog_vertical_loop_button_holder">
						<?php if(get_next_posts_link()) { ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><?php echo wp_kses_post(get_next_posts_link('')); ?></span></div>
						<?php }else{ ?>
							<div class="blog_vertical_loop_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link(1, true)); ?>"></a></span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
						
						<div class="grid_section blog_load_prev">
							<div class="section_inner">
								<div class="blog_vertical_loop_button_holder prev_post">
									<div class="last_page"><a href="<?php echo esc_url(get_pagenum_link($number_of_pages, true)); ?>"></a></div>
									<div class="blog_vertical_loop_back_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link($previous_page, true)); ?>"></a></span></div>
								</div>
							</div>
						</div>
						<div class="post_image_inner">
							<a itemprop="url" class="<?php echo esc_attr($preload_background_class); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url('<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>');"></a>
							<div class="post_image_title"><div class="post_image_title_inner"><div class="grid_section"><div class="section_inner"><h2 itemprop="name" class="entry_title"><?php the_title(); ?></h2></div></div></div></div>
						</div>
                    </div>
                <?php } ?>
                <div class="grid_section">
                    <div class="section_inner">
                        <div class="post_text_columns">
                            <div class="post_text">
                                <div class="post_text_inner">

									<div class="post_info">
										<span itemprop="dateCreated" class="time entry_date updated"><?php the_time('d F, Y'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>
										<span class="category"><?php the_category(', '); ?></span>
										<?php if($blog_hide_comments != "yes"){ ?>
											<span class="post_comments_holder"><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a></span>
										<?php } ?>
										<?php if($blog_hide_author == "no") { ?>
											<span class="post_author">
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
										<?php } ?>
										<?php if( $qode_like == "on" ) { ?>
											<div class="blog_like">
												<?php if( function_exists('qode_like') ) qode_like(); ?>
											</div>
										<?php } ?>
										<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
											<?php echo do_shortcode('[social_share]'); ?>
										<?php } ?>
									</div>
									<i class="qoute_mark fa fa-quote-right pull-left"></i>
									<div class="post_title entry_title">
										<p><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></p>
										<span class="quote_author">&mdash; <?php the_title(); ?></span>
									</div>
									</div>
                                </div>
							<?php the_content(); ?>
							<a itemprop="url" class="qbutton  small loop_more" href="<?php the_permalink(); ?>"><?php _e('See More', 'qode'); ?></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </article>
        <?php
        break;
    default:
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class($next_post_class); ?>>
				<div class="grid_section blog_load_next">
					<div class="section_inner">
						<div class="blog_vertical_loop_button_holder">
							<?php if(get_next_posts_link()) { ?>
								<div class="blog_vertical_loop_button"><span class="button_icon" ><?php echo wp_kses_post(get_next_posts_link('')); ?></span></div>
							<?php }else{ ?>
								<div class="blog_vertical_loop_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link(1, true)); ?>"></a></span></div>
							<?php } ?>
						</div>
					</div>
				</div>
                <div class="post_content_holder">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="post_image">
							<div class="grid_section blog_load_prev">
								<div class="section_inner">
									<div class="blog_vertical_loop_button_holder prev_post">
										<div class="last_page"><a href="<?php echo esc_url(get_pagenum_link($number_of_pages, true)); ?>"></a></div>
										<div class="blog_vertical_loop_back_button"><span class="button_icon" ><a href="<?php echo esc_url(get_pagenum_link($previous_page, true)); ?>"></a></span></div>
									</div>
								</div>
							</div>
							<div class="post_image_inner">
								<a itemprop="url" class="<?php echo esc_attr($preload_background_class); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>');"></a>
								<div class="post_image_title"><div class="post_image_title_inner"><div class="grid_section"><div class="section_inner"><h2 itemprop="name" class="entry_title"><?php the_title(); ?></h2></div></div></div></div>
							</div>
                        </div>
                    <?php } ?>
                    <div class="grid_section">
                        <div class="section_inner">
                            <div class="post_text">
                                <div class="post_text_inner">
									<div class="post_info">
										<span itemprop="dateCreated" class="time entry_date updated"><?php the_time('d F, Y'); ?><meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(qode_get_page_id()); ?>"/></span>
										<span class="category"><?php the_category(', '); ?></span>
										<?php if($blog_hide_comments != "yes"){ ?>
											<span class="post_comments_holder"><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a></span>
										<?php } ?>
										<?php if($blog_hide_author == "no") { ?>
											<span class="post_author">
												<a itemprop="author" class="post_author_link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
											</span>
										<?php } ?>
										<?php if( $qode_like == "on" ) { ?>
											<div class="blog_like">
												<?php if( function_exists('qode_like') ) qode_like(); ?>
											</div>
										<?php } ?>
										<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
											<?php echo do_shortcode('[social_share]'); ?>
										<?php } ?>
									</div>
									<h2 itemprop="name" class="entry_title">
                                        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <?php the_content();?>
									<a itemprop="url" class="qbutton small loop_more" href="<?php the_permalink(); ?>"><?php _e('See More', 'qode'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php
}
?>

