
<div class="pane card<?php echo esc_html($rand_number); ?> <?php echo esc_attr($additional_classes); ?>">
    <?php if($show_card){ ?>
    <div class="card" data-value="card<?php echo esc_html($rand_number); ?>"><div class="card-inner" <?php qode_inline_style(array($background_color,$header_image)); ?>></div></div>
    <?php } ?>
    <div class="qode-card-slider-holder-outer" <?php qode_inline_style(array($background_color)); ?>>
        <div class="qode-card-slider-holder" data-card-slide="1"  data-center="<?php echo esc_attr($center_slider); ?>" data-active-middle-slide="<?php echo esc_attr($active_middle_slide); ?>">
            <div class="controls arrows">
                <a data-direction="prev" href="#" class="button prev qode-type1-gradient-bottom-to-top-text"><span class="arrow_carrot-left"></span></a>
                <a data-direction="next" href="#" class="button next qode-type1-gradient-bottom-to-top-text"><span class="arrow_carrot-right"></span></a>
            </div>

            <?php if($show_bullets == 'yes'){ ?>
            <div class="controls bullets">
                <div class="dots">
                    <div class="dots-inner">
                        <?php foreach($images as $i=>$image) { ?>
                            <div class='dot' data-card-slide="<?php echo esc_attr($i+1); ?>"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="qode-card-slider clearfix">
                <?php foreach($images as $i=>$image) { ?>
                    <div class='slide' data-card-slide="<?php echo esc_attr($i+1); ?>">
                        <?php if($image['image_link'] !== ''){ ?>
                            <a href="<?php echo esc_url($image['image_link']) ?>" target="<?php echo esc_attr($image['image_target']) ?>">
                        <?php } ?>
                            <img src="#" alt="" class="qode-lazy-image" data-image="<?php echo esc_url($image['url']);?>" <?php qode_inline_style(array('width:'.$image['width'].'px','height:1px')); ?> data-ratio="<?php echo esc_attr($image['height']/$image['width']); ?>" data-lazy="true" />
                        <?php if($image['image_link'] !== ''){ ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
