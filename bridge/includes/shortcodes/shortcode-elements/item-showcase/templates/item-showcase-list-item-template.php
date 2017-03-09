<?php
$icon_html = '<i class="'.$icon_params.'" style="color:'.$icon_color.'; background-color:'.$icon_background_color.';"></i>';
?>
<div class="qode-item <?php echo esc_attr($item_showcase_list_item_class); ?>">
	<?php if ( $item_position == 'right' && !empty($icon_params)) { ?>
		<div class="qode-item-icon">
			<?php if ($item_link != '' ) { ?>
				<a href="<?php esc_url($item_link) ?>">
			<?php } ?>
			<?php
				print $icon_html;
			?>
			<?php if ($item_link != '' ) { ?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="qode-item-content">
		<?php if ($item_title != '') { ?>
		<div class="qode-showcase-title-holder">
			<?php if ($item_link != '' ) { ?>
				<a href="<?php esc_url($item_link) ?>">
			<?php } ?>
				<h4 class="qode-showcase-title"><?php echo esc_attr($item_title) ?></h4>
			<?php if ($item_link != '' ) { ?>
				</a>
			<?php } ?>
		</div>
		<?php } if ($item_text != '') { ?>
		<div class="qode-showcase-text-holder">
			<p class="qode-showcase-text"><?php echo esc_attr($item_text) ?></p>
		</div>
		<?php } ?>
	</div>
	<?php if($item_position == 'left' && !empty($icon_params)) { ?>
		<div class="qode-item-icon">
			<?php if ($item_link != '' ) { ?>
				<a href="<?php esc_url($item_link) ?>">
			<?php } ?>
			<?php
				print $icon_html;
			?>
			<?php if ($item_link != '' ) { ?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>