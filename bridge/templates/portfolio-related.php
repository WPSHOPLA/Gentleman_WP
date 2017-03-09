<?php
global $qode_options_proya;
if(isset($qode_options_proya['enable_portfolio_related']) && $qode_options_proya['enable_portfolio_related'] == 'yes') {
    $query = qode_get_related_post_type(get_the_ID(), array('posts_per_page' => '4'));
    $image_size = 'full';
    if(isset($qode_options_proya['portfolio_related_image_size']) && $qode_options_proya['portfolio_related_image_size'] !== '') {
        $image_size = $qode_options_proya['portfolio_related_image_size'];
    }

    if (is_object($query)) {?>
        <div class="qode_portfolio_related">
            <h4><?php esc_html_e('Related Projects', 'qode'); ?></h4>

            <div class="projects_holder_outer v4 portfolio_with_space portfolio_standard ">
                <div class="projects_holder clearfix v4 standard">
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                        $categories = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                        $category_html = '<span class="project_category">';
                        $k = 1;
                        foreach ($categories as $cat) {
                            $category_html .= $cat->name;
                            if (count($categories) != $k) {
                                $category_html .= ', ';
                            }
                            $k++;
                        }
                        $category_html .= '</span>';
                        ?>

                        <article class="mix">
                            <div class="image_holder">
                                <a itemprop="url" class="portfolio_link_for_touch" href="<?php echo esc_url(get_permalink()); ?>">
                                    <span class="image"><?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?></span>
                                </a>
                        <span class="text_holder">
                        <span class="text_outer">
                        <span class="text_inner">
                        <span class="feature_holder">
                        <span class="feature_holder_icons">
                            <a itemprop="url" class='preview qbutton small white' href='<?php echo esc_url(get_permalink()); ?>'
                               target='_self'> <?php _e('view', 'qode'); ?></a>
                        </span></span></span></span></span>
                            </div>
                            <div class="portfolio_description ">

                                <h5 itemprop="name" class="portfolio_title entry_title">
                                    <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
                                        <?php echo esc_attr(get_the_title()); ?>
                                    </a>
                                </h5>
                                <?php echo wp_kses_post($category_html); ?>
                            </div>

                        </article>

                    <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                    <div class="filler"></div>
                    <div class="filler"></div>
                    <div class="filler"></div>
                    <div class="filler"></div>
                </div>
            </div>
        </div>
    <?php }
}
?>