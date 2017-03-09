<?php
$slider_shortcode = get_post_meta(qode_get_page_id(), "qode_revolution-slider", true);
if (!empty($slider_shortcode)){ ?>
	<div class="q_slider"><div class="q_slider_inner">
			<?php echo do_shortcode($slider_shortcode); ?>
		</div></div>
	<?php
}
?>