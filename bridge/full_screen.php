<?php 
/*
Template Name: Full Screen Sections
*/ 
?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();

$full_screen_holder_style = "";

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$full_screen_holder_style .= "background-color:".get_post_meta($id, "qode_page_background_color", true).";";
}else{
	$full_screen_holder_style .= "";
}

$header_bottom_appearance = 'regular';
if(isset($qode_options_proya['header_bottom_appearance'])){
	$header_bottom_appearance = $qode_options_proya['header_bottom_appearance'];
}

$enable_vertical_menu = false;
if(isset($qode_options_proya['vertical_area']) && $qode_options_proya['vertical_area'] =='yes'){
	$enable_vertical_menu = true;
}

if(!$enable_vertical_menu){
	if($header_bottom_appearance == 'regular' || $header_bottom_appearance == 'stick' || $header_bottom_appearance == 'stick_with_left_right_menu'){
		$header_height = 100;
		if(!empty($qode_options_proya['header_height'])){
			$header_height = $qode_options_proya['header_height'];
		}
		$full_screen_holder_style .= "margin-top:".(-$header_height)."px;";
	} else {
		$full_screen_holder_style .= "";
	}
}

$content_style_spacing = "";
if(get_post_meta($id, "qode_margin_after_title", true) != ""){
	if(get_post_meta($id, "qode_margin_after_title_mobile", true) == 'yes'){
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px !important";
	}else{
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px";
	}
}

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

?>
<?php get_header(); ?>

<div class="full_screen_preloader"><div class="ajax_loader"><div class="ajax_loader_1"><?php echo qode_loading_spinners(true); ?></div></div></div>

<div class="full_screen_holder"<?php if($full_screen_holder_style != "") { echo " style='".$full_screen_holder_style."'";} ?>>
	<?php if (!isset($qode_options_proya['fss_navigation_button_position']) || $qode_options_proya['fss_navigation_button_position'] !== 'side_by_side'){?>
	<div class="full_screen_navigation_holder up_arrow"><div class="full_screen_navigation_inner"><a id="up_fs_button" href="#" target="_self"><i class='fa fa-angle-up'></i></a></div></div>
	<?php } ?>
	<div class="full_screen_inner" <?php qode_inline_style($content_style_spacing); ?>>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<?php the_content(); ?>

		<?php endwhile; endif; ?>

	</div>
	<?php if (!isset($qode_options_proya['fss_navigation_button_position']) || $qode_options_proya['fss_navigation_button_position'] !== 'side_by_side'){?>
	<div class="full_screen_navigation_holder down_arrow"><div class="full_screen_navigation_inner"><a id="down_fs_button" href="#" target="_self"><i class='fa fa-angle-down'></i></a></div></div>
	<?php } ?>

	<?php if (isset($qode_options_proya['fss_navigation_button_position']) && $qode_options_proya['fss_navigation_button_position'] == 'side_by_side'){?>
	<div class="full_screen_navigation_holder side_by_side">
		<div class="full_screen_navigation_inner up_arrow"><a id="up_fs_button" href="#" target="_self"><i class='fa fa-angle-up'></i></a></div>
		<div class="full_screen_navigation_inner down_arrow"><a id="down_fs_button" href="#" target="_self"><i class='fa fa-angle-down'></i></a></div>
	</div>
	<?php } ?>
</div>

<?php get_footer(); ?>