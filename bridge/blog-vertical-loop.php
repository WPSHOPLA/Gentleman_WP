<?php
	/*
	Template Name: Blog Vertical Loop
	*/
?>
<?php get_header(); ?>
<?php
global $wp_query;
global $qode_template_name;
$id = qode_get_page_id();
$qode_template_name = get_page_template_slug($id);
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = esc_attr(get_post_meta($id, "qode_show-posts-per-page", true));
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = get_post_meta($id, "qode_show-sidebar", true);

if(get_post_meta($id, "qode_page_background_color", true) != ""){
    $background_color = 'background-color: '.esc_attr(get_post_meta($id, "qode_page_background_color", true));
}else{
    $background_color = "";
}

if(isset($qode_options_proya['blog_vertical_loop_type_number_of_chars']) && $qode_options_proya['blog_vertical_loop_type_number_of_chars'] != "") {
    qode_set_blog_word_count(esc_attr($qode_options_proya['blog_vertical_loop_type_number_of_chars']));
}

$content_style_spacing = "";
if(get_post_meta($id, "qode_margin_after_title", true) != ""){
	if(get_post_meta($id, "qode_margin_after_title_mobile", true) == 'yes'){
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px !important";
	}else{
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px";
	}
}

?>
<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
    <script>
        var page_scroll_amount_for_sticky = <?php echo esc_attr(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)); ?>;
    </script>
<?php } ?>

<?php
	query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=1');
?>
    <div class="full_width blog_vertical_loop"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
        <div class="full_width_inner" <?php qode_inline_style($content_style_spacing); ?>>
            <div class="blog_holder blog_vertical_loop_type">
                <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('templates/blog_vertical', 'loop'); ?>
                <?php endwhile; ?>

                <?php else: //If no posts are present ?>
                    <div class="entry">
                        <p><?php _e('No posts were found.', 'qode'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>