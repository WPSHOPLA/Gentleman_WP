<?php
/*
Template Name: Blog Masonry Gallery
*/
?>
<?php get_header(); ?>
<?php
global $wp_query;
global $qode_template_name;
global $qode_page_id;
$qode_page_id = $wp_query->get_queried_object_id();
$id = $wp_query->get_queried_object_id();
$qode_template_name = get_page_template_slug($id);
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
$page_object = get_post( $id );
$content = $page_object->post_content;
$content = apply_filters( 'the_content', $content );
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = get_post_meta($id, "qode_show-sidebar", true);

if(get_post_meta($id, "qode_page_background_color", true) != ""){
    $background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
    $background_color = "";
}

if($qode_options_proya['number_of_chars_masonry'] != "") {
    qode_set_blog_word_count($qode_options_proya['number_of_chars_masonry']);
}
$category_filter = "no";
if(isset($qode_options_proya['blog_masonry_filter'])){
    $category_filter = $qode_options_proya['blog_masonry_filter'];
}
$container_inner_class = "";
if($category_filter == "yes"){
    $container_inner_class = " full_page_container_inner";
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
        var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
    </script>
<?php } ?>
<?php get_template_part( 'title' ); ?>

<?php
$revslider = get_post_meta($id, "qode_revolution-slider", true);
if (!empty($revslider)){ ?>
    <div class="q_slider"><div class="q_slider_inner">
            <?php echo do_shortcode($revslider); ?>
        </div></div>
<?php
}
?>
<?php
query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=' . $post_number );
if(isset($qode_options_proya['blog_page_range']) && $qode_options_proya['blog_page_range'] != ""){
    $blog_page_range = $qode_options_proya['blog_page_range'];
} else{
    $blog_page_range = $wp_query->max_num_pages;
}
?>
    <div class="full_width"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
        <div class="full_width_inner<?php echo $container_inner_class; ?>" <?php qode_inline_style($content_style_spacing); ?>>

            <?php echo $content; ?>

            <?php
            get_template_part('templates/blog', 'structure');
            ?>

        </div>
    </div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>