<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} else {
	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	if ( file_exists( $root.'/wp-load.php' ) ) {
    	require_once( $root.'/wp-load.php' );
	}
}
header("Content-type: text/css; charset=utf-8");
?>
@media only screen and (max-width: 1000px){
	<?php if (!empty($qode_options_proya['header_background_color'])) { ?>
	.header_bottom {
		background-color: <?php echo $qode_options_proya['header_background_color'];  ?>;
	}
	<?php } ?>
	<?php if (!empty($qode_options_proya['mobile_background_color'])) { ?>
		.header_bottom,
		nav.mobile_menu{
			background-color: <?php echo $qode_options_proya['mobile_background_color'];  ?> !important;
		}
	<?php } ?>
	<?php if (isset($qode_options_proya['blog_slider_box_width']) && $qode_options_proya['blog_slider_box_width']!== '' && $qode_options_proya['blog_slider_box_width'] <= 40){ ?>
		.blog_slider_holder .blog_slider.simple_slider .blog_text_holder_inner2{
			width: <?php echo $qode_options_proya['blog_slider_box_width']*1.3;?>%;
		}
	<?php }
	?>
	<?php if (isset($qode_options_proya['margin_after_title_responsive']) && $qode_options_proya['margin_after_title_responsive'] !== '' ) { ?>
		.content .container .container_inner.default_template_holder,
		.content .container .container_inner.page_container_inner {
			padding-top:<?php echo $qode_options_proya['margin_after_title_responsive'];  ?>px !important; /*important because of the inline style on page*/
		}
	<?php } ?>
}
@media only screen and (min-width: 480px) and (max-width: 768px){
	
	<?php if (isset($qode_options_proya['parallax_minheight']) && !empty($qode_options_proya['parallax_minheight'])) { ?>
        section.parallax_section_holder{
			height: auto !important;
			min-height: <?php echo $qode_options_proya['parallax_minheight']; ?>px;
		}
	<?php } ?>
	<?php if (isset($qode_options_proya['header_background_color_mobile']) &&  !empty($qode_options_proya['header_background_color_mobile'])) { ?>
		header{
			background-color: <?php echo $qode_options_proya['header_background_color_mobile'];  ?> !important;
			background-image:none;
		}
	<?php } ?>
}
@media only screen and (max-width: 768px){
	<?php if ((isset($qode_options_proya['h1_fontsize_tablet']) && $qode_options_proya['h1_fontsize_tablet'] !== '') || (isset($qode_options_proya['h1_lineheight_tablet']) && $qode_options_proya['h1_lineheight_tablet'] !== '') || (isset($qode_options_proya['h1_letterspacing_tablet']) && $qode_options_proya['h1_letterspacing_tablet'] !== '')) { ?>
		h1 {
			<?php if (isset($qode_options_proya['h1_fontsize_tablet']) && $qode_options_proya['h1_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['h1_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h1_lineheight_tablet']) && $qode_options_proya['h1_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['h1_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h1_letterspacing_tablet']) && $qode_options_proya['h1_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h1_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h2_fontsize_tablet']) && $qode_options_proya['h2_fontsize_tablet'] !== '') || (isset($qode_options_proya['h2_lineheight_tablet']) && $qode_options_proya['h2_lineheight_tablet'] !== '') || (isset($qode_options_proya['h2_letterspacing_tablet']) && $qode_options_proya['h2_letterspacing_tablet'] !== '')) { ?>
		h2 {
			<?php if (isset($qode_options_proya['h2_fontsize_tablet']) && $qode_options_proya['h2_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['h2_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h2_lineheight_tablet']) && $qode_options_proya['h2_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['h2_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h2_letterspacing_tablet']) && $qode_options_proya['h2_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h2_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h3_fontsize_tablet']) && $qode_options_proya['h3_fontsize_tablet'] !== '') || (isset($qode_options_proya['h3_lineheight_tablet']) && $qode_options_proya['h3_lineheight_tablet'] !== '') || (isset($qode_options_proya['h3_letterspacing_tablet']) && $qode_options_proya['h3_letterspacing_tablet'] !== '')) { ?>
		h3 {
			<?php if (isset($qode_options_proya['h3_fontsize_tablet']) && $qode_options_proya['h3_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['h3_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h3_lineheight_tablet']) && $qode_options_proya['h3_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['h3_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h3_letterspacing_tablet']) && $qode_options_proya['h3_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h3_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h4_fontsize_tablet']) && $qode_options_proya['h4_fontsize_tablet'] !== '') || (isset($qode_options_proya['h4_lineheight_tablet']) && $qode_options_proya['h4_lineheight_tablet'] !== '') || (isset($qode_options_proya['h4_letterspacing_tablet']) && $qode_options_proya['h4_letterspacing_tablet'] !== '')) { ?>
		h4 {
			<?php if (isset($qode_options_proya['h4_fontsize_tablet']) && $qode_options_proya['h4_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['h4_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h4_lineheight_tablet']) && $qode_options_proya['h4_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['h4_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h4_letterspacing_tablet']) && $qode_options_proya['h4_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h4_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h5_fontsize_tablet']) && $qode_options_proya['h5_fontsize_tablet'] !== '') || (isset($qode_options_proya['h5_lineheight_tablet']) && $qode_options_proya['h5_lineheight_tablet'] !== '') || (isset($qode_options_proya['h5_letterspacing_tablet']) && $qode_options_proya['h5_letterspacing_tablet'] !== '')) { ?>
		h5 {
			<?php if (isset($qode_options_proya['h5_fontsize_tablet']) && $qode_options_proya['h5_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['h5_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h5_lineheight_tablet']) && $qode_options_proya['h5_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['h5_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h5_letterspacing_tablet']) && $qode_options_proya['h5_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h5_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h6_fontsize_tablet']) && $qode_options_proya['h6_fontsize_tablet'] !== '') || (isset($qode_options_proya['h6_lineheight_tablet']) && $qode_options_proya['h6_lineheight_tablet'] !== '') || (isset($qode_options_proya['h6_letterspacing_tablet']) && $qode_options_proya['h6_letterspacing_tablet'] !== '')) { ?>
		h6 {
			<?php if (isset($qode_options_proya['h6_fontsize_tablet']) && $qode_options_proya['h6_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['h6_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h6_lineheight_tablet']) && $qode_options_proya['h6_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['h6_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h6_letterspacing_tablet']) && $qode_options_proya['h6_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h6_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['text_fontsize_tablet']) && $qode_options_proya['text_fontsize_tablet'] !== '') || (isset($qode_options_proya['text_lineheight_tablet']) && $qode_options_proya['text_lineheight_tablet'] !== '') || (isset($qode_options_proya['text_letterspacing_tablet']) && $qode_options_proya['text_letterspacing_tablet'] !== '')) { ?>
		body,
		p {
			<?php if (isset($qode_options_proya['text_fontsize_tablet']) && $qode_options_proya['text_fontsize_tablet'] !== '') { ?>font-size: <?php echo $qode_options_proya['text_fontsize_tablet']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['text_lineheight_tablet']) && $qode_options_proya['text_lineheight_tablet'] !== '') { ?>line-height: <?php echo $qode_options_proya['text_lineheight_tablet']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['text_letterspacing_tablet']) && $qode_options_proya['text_letterspacing_tablet'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['text_letterspacing_tablet']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if (isset($qode_options_proya['footer_bottom_padding_right']) && $qode_options_proya['footer_bottom_padding_right'] != "" && $qode_options_proya['footer_bottom_padding_right'] > 10){ ?>
		.footer_bottom_holder{
			padding-right:10px;
		}
	<?php }
	if (isset($qode_options_proya['footer_bottom_padding_left']) && $qode_options_proya['footer_bottom_padding_left'] != "" && $qode_options_proya['footer_bottom_padding_left'] > 10){ ?>
		.footer_bottom_holder{
			padding-left:10px;
		}
	<?php } ?>

	<?php if (isset($qode_options_proya['blog_slider_box_width']) && $qode_options_proya['blog_slider_box_width'] !== '' && $qode_options_proya['blog_slider_box_width'] < 65){ ?>
		.blog_slider_holder .blog_slider.simple_slider .blog_text_holder_inner2 {
			width: 65%;
		}
	<?php }
	?>
}
@media only screen and (max-width: 600px) {
	<?php if ((isset($qode_options_proya['h1_fontsize_mobile']) && $qode_options_proya['h1_fontsize_mobile'] !== '') || (isset($qode_options_proya['h1_lineheight_mobile']) && $qode_options_proya['h1_lineheight_mobile'] !== '') || (isset($qode_options_proya['h1_letterspacing_mobile']) && $qode_options_proya['h1_letterspacing_mobile'] !== '')) { ?>
		h1 {
			<?php if (isset($qode_options_proya['h1_fontsize_mobile']) && $qode_options_proya['h1_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['h1_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h1_lineheight_mobile']) && $qode_options_proya['h1_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['h1_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h1_letterspacing_mobile']) && $qode_options_proya['h1_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h1_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h2_fontsize_mobile']) && $qode_options_proya['h2_fontsize_mobile'] !== '') || (isset($qode_options_proya['h2_lineheight_mobile']) && $qode_options_proya['h2_lineheight_mobile'] !== '') || (isset($qode_options_proya['h2_letterspacing_mobile']) && $qode_options_proya['h2_letterspacing_mobile'] !== '')) { ?>
		h2 {
			<?php if (isset($qode_options_proya['h2_fontsize_mobile']) && $qode_options_proya['h2_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['h2_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h2_lineheight_mobile']) && $qode_options_proya['h2_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['h2_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h2_letterspacing_mobile']) && $qode_options_proya['h2_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h2_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h3_fontsize_mobile']) && $qode_options_proya['h3_fontsize_mobile'] !== '') || (isset($qode_options_proya['h3_lineheight_mobile']) && $qode_options_proya['h3_lineheight_mobile'] !== '') || (isset($qode_options_proya['h3_letterspacing_mobile']) && $qode_options_proya['h3_letterspacing_mobile'] !== '')) { ?>
		h3 {
			<?php if (isset($qode_options_proya['h3_fontsize_mobile']) && $qode_options_proya['h3_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['h3_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h3_lineheight_mobile']) && $qode_options_proya['h3_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['h3_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h3_letterspacing_mobile']) && $qode_options_proya['h3_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h3_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h4_fontsize_mobile']) && $qode_options_proya['h4_fontsize_mobile'] !== '') || (isset($qode_options_proya['h4_lineheight_mobile']) && $qode_options_proya['h4_lineheight_mobile'] !== '') || (isset($qode_options_proya['h4_letterspacing_mobile']) && $qode_options_proya['h4_letterspacing_mobile'] !== '')) { ?>
		h4 {
			<?php if (isset($qode_options_proya['h4_fontsize_mobile']) && $qode_options_proya['h4_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['h4_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h4_lineheight_mobile']) && $qode_options_proya['h4_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['h4_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h4_letterspacing_mobile']) && $qode_options_proya['h4_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h4_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h5_fontsize_mobile']) && $qode_options_proya['h5_fontsize_mobile'] !== '') || (isset($qode_options_proya['h5_lineheight_mobile']) && $qode_options_proya['h5_lineheight_mobile'] !== '') || (isset($qode_options_proya['h5_letterspacing_mobile']) && $qode_options_proya['h5_letterspacing_mobile'] !== '')) { ?>
		h5 {
			<?php if (isset($qode_options_proya['h5_fontsize_mobile']) && $qode_options_proya['h5_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['h5_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h5_lineheight_mobile']) && $qode_options_proya['h5_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['h5_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h5_letterspacing_mobile']) && $qode_options_proya['h5_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h5_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['h6_fontsize_mobile']) && $qode_options_proya['h6_fontsize_mobile'] !== '') || (isset($qode_options_proya['h6_lineheight_mobile']) && $qode_options_proya['h6_lineheight_mobile'] !== '') || (isset($qode_options_proya['h6_letterspacing_mobile']) && $qode_options_proya['h6_letterspacing_mobile'] !== '')) { ?>
		h6 {
			<?php if (isset($qode_options_proya['h6_fontsize_mobile']) && $qode_options_proya['h6_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['h6_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['h6_lineheight_mobile']) && $qode_options_proya['h6_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['h6_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['h6_letterspacing_mobile']) && $qode_options_proya['h6_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['h6_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>

	<?php if ((isset($qode_options_proya['text_fontsize_mobile']) && $qode_options_proya['text_fontsize_mobile'] !== '') || (isset($qode_options_proya['text_lineheight_mobile']) && $qode_options_proya['text_lineheight_mobile'] !== '') || (isset($qode_options_proya['text_letterspacing_mobile']) && $qode_options_proya['text_letterspacing_mobile'] !== '')) { ?>
		body,
		p {
			<?php if (isset($qode_options_proya['text_fontsize_mobile']) && $qode_options_proya['text_fontsize_mobile'] !== '') { ?>font-size: <?php echo $qode_options_proya['text_fontsize_mobile']; ?>px; <?php } ?>
			<?php if (isset($qode_options_proya['text_lineheight_mobile']) && $qode_options_proya['text_lineheight_mobile'] !== '') { ?>line-height: <?php echo $qode_options_proya['text_lineheight_mobile']; ?>px; <?php } ?>
		    <?php if (isset($qode_options_proya['text_letterspacing_mobile']) && $qode_options_proya['text_letterspacing_mobile'] !== '') { ?>letter-spacing: <?php echo $qode_options_proya['text_letterspacing_mobile']; ?>px; <?php } ?>
		}
	<?php } ?>
}
@media only screen and (max-width: 480px){

	<?php if (isset($qode_options_proya['parallax_minheight']) && !empty($qode_options_proya['parallax_minheight'])) { ?>
		section.parallax_section_holder {
			height: auto !important;
			min-height: <?php echo $qode_options_proya['parallax_minheight']; ?>px;
		}
	<?php } ?>

	<?php if (isset($qode_options_proya['header_background_color_mobile']) &&  !empty($qode_options_proya['header_background_color_mobile'])) { ?>
		header {
			background-color: <?php echo $qode_options_proya['header_background_color_mobile'];  ?> !important;
			background-image:none;
		}
	<?php } ?>
	<?php if (isset($qode_options_proya['footer_bottom_text_line_height']) && $qode_options_proya['footer_bottom_text_line_height'] !== "") { ?>
		.footer_bottom {
			line-height: <?php echo $qode_options_proya['footer_bottom_text_line_height']; ?>px;
		}
	<?php } ?>

	<?php if (isset($qode_options_proya['footer_top_padding_right']) && $qode_options_proya['footer_top_padding_right'] != "" && $qode_options_proya['footer_top_padding_right'] > 10){ ?>
		.footer_top.footer_top_full {
			padding-right:10px;
		}
	<?php }
	if (isset($qode_options_proya['footer_top_padding_left']) && $qode_options_proya['footer_top_padding_left'] != "" && $qode_options_proya['footer_top_padding_left'] > 10){ ?>
		.footer_top.footer_top_full {
			padding-left:10px;
		}
	<?php } ?>
}