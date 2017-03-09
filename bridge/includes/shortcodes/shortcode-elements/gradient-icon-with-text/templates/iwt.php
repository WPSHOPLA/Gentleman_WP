<div <?php qode_class_attribute($holder_classes); ?>>
    <div class="qode-giwt-inner <?php echo esc_attr($gradient_classes); ?>">
        <?php if(!empty($link)) : ?>
            <a class="qode-iwt-link" href="<?php echo esc_attr($link); ?>" <?php qode_inline_attr($target, 'target'); ?>>
        <?php endif; ?>
            <span class="qode-giwt-icon-holder">
                <?php echo qode_get_shortcode_template_part('templates/icon', 'gradient-icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
            </span>
        <?php if(!empty($link)) : ?>
            </a>
        <?php endif; ?>
        <div class="qode-giwt-content-holder">
            <div class="qode-giwt-title-holder">
                <<?php echo esc_attr($title_tag); ?> <?php qode_inline_style($title_styles); ?>>
                    <?php if(!empty($link)) : ?>
                        <a class="qode-iwt-link" <?php qode_inline_style($title_styles); ?> href="<?php echo esc_attr($link); ?>" <?php qode_inline_attr($target, 'target'); ?>>
                    <?php endif; ?>
                        <?php echo esc_html($title); ?>
                    <?php if(!empty($link)) : ?>
                        </a>
                    <?php endif; ?>
                </<?php echo esc_attr($title_tag); ?>>
            </div>
        </div>
    </div>
</div>