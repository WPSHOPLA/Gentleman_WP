<div class="qode-crossfade-images" >
	<?php if($link != '') { ?>
		<a class="qode-cfi-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($link_target) ?>"></a>
	<?php } ?>
	<div class="qode-cfi-img-holder" 
			style="	max-height:<?php echo esc_attr($initial_image_params['height']); ?>px;
					background-color: <?php echo esc_attr($background_color)?>;
			">
		<div class="qode-cfi-img-holder-inner">
			<img src="<?php echo esc_url($initial_image_params['url']);?>" alt="initial image" />
			<div class="qodef-cfi-image-hover qode-lazy-image" data-image="<?php echo esc_url($hover_image_params['url']);?>" data-lazy='true'></div>
		</div>
	</div>
	<?php if ($title != '') { ?>
		<div class="qode-cfi-title-holder">
			<h3 class="qode-cfi-title"><?php echo esc_attr($title) ?></h3>
		</div>
	<?php } ?>
</div>