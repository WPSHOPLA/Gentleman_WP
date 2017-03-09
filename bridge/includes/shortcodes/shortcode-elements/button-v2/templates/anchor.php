<?php $icon_start_html = ($icon_pack) ? '<span '.qode_get_class_attribute($button_icon_holder_classes). ' '. qode_get_inline_style($button_icon_holder_styles) . ' '. qode_get_inline_attrs($button_icon_holder_data) .'>' : ''; ?>
<?php $icon_end_html = ($icon_pack) ? '</span>' : ''; ?>

<?php if ($hover_effect == '3d_rotate')  { ?>
	<div class="qode-3d-button-holder">
<?php } ?>

	<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php qode_inline_style($button_styles); ?> <?php qode_class_attribute($button_classes); ?> <?php echo qode_get_inline_attrs($button_data); ?> <?php echo qode_get_inline_attrs($button_custom_attrs); ?>>
	    <span class="qode-btn-text"><?php echo esc_html($text); ?></span><?php print $icon_start_html; echo qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-button-v2-icon-holder-inner'))); print $icon_end_html;  ?>
	</a>

<?php if ($hover_effect == '3d_rotate')  { ?>
		<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php qode_inline_style($button_styles); ?> <?php qode_class_attribute($button_classes); ?> <?php echo qode_get_inline_attrs($button_data); ?> <?php echo qode_get_inline_attrs($button_custom_attrs); ?>>
		    <span class="qode-btn-text"><?php echo esc_html($text); ?></span><?php print $icon_start_html; echo qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-button-v2-icon-holder-inner'))); print $icon_end_html;  ?>
		</a>
	</div>
<?php } ?>