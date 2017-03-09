<?php

$id = get_the_ID();

$chosen_sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
$default_array = array('default', '');

if(!in_array($chosen_sidebar, $default_array)){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_proya['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments']))
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

$content_style_spacing = "";
if(get_post_meta($id, "qode_margin_after_title", true) != ""){
	if(get_post_meta($id, "qode_margin_after_title_mobile", true) == 'yes'){
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px !important";
	}else{
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px";
	}
}
$single_type = qode_get_meta_field_intersect('blog_single_type');
$single_loop = 'blog_single';
$single_grid = 'yes';
$single_class = array('blog_single', 'blog_holder');
if($single_type == 'image-title-post'){
	$single_loop = 'blog-single-image-title-post';
	$single_grid = 'no';
	$single_class[] = 'single_image_title_post';
}
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
		<script>
		var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
		</script>
	<?php } ?>
	<?php get_template_part( 'title' ); ?>
	<?php get_template_part( 'slider' ); ?>
				<?php if($single_type == 'image-title-post') : //this post type is full width ?>
					<div class="full_width" <?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
						<?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
							<div class="overlapping_content"><div class="overlapping_content_inner">
						<?php } ?>
						<div class="full_width_inner" <?php qode_inline_style($content_style_spacing); ?>>
				<?php else : // post type ?>
					<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
						<?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
							<div class="overlapping_content"><div class="overlapping_content_inner">
						<?php } ?>
								<div class="container_inner default_template_holder" <?php qode_inline_style($content_style_spacing); ?>>
				<?php endif; // post type end ?>
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div <?php qode_class_attribute(implode(' ', $single_class)) ?>>
						<?php 
							get_template_part('templates/' . $single_loop, 'loop');
						?>
						<?php if($single_grid == 'no'): ?>
							<div class="grid_section">
								<div class="section_inner">
						<?php endif; ?>
							<?php
								if($blog_hide_comments != "yes"){
									comments_template('', true);
								}else{
									echo "<br/><br/>";
								}
							?>
						<?php if($single_grid == 'no'): ?>
								</div>
							</div>
						<?php endif; ?>
                        </div>

                    <?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1">
						<?php endif; ?>
					
									<div class="column_inner">
										<div <?php qode_class_attribute(implode(' ', $single_class)) ?>>
											<?php
											get_template_part('templates/' . $single_loop, 'loop');
											?>
										</div>
										
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
										<div class="column_inner">
											<div <?php qode_class_attribute(implode(' ', $single_class)) ?>>
												<?php
												get_template_part('templates/' . $single_loop, 'loop');
												?>
											</div>
											<?php
												if($blog_hide_comments != "yes"){
													comments_template('', true); 
												}else{
													echo "<br/><br/>";
												}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
					</div>
                <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                    </div></div>
                <?php } ?>
                 </div>
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	