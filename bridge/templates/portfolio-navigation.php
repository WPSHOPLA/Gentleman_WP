<?php global $qode_options_proya;
$enable_navigation_title = isset($qode_options_proya['enable_navigation_title']) && $qode_options_proya['enable_navigation_title'] == 'yes';
$additional_navigation_class = $enable_navigation_title ? 'navigation_title' : '';

$navigation_through_category = false;
if (isset($qode_options_proya['portfolio_navigation_through_same_category']) && $qode_options_proya['portfolio_navigation_through_same_category'] === "yes") {
    $navigation_through_category = true;
}
?>
<div class="portfolio_navigation <?php echo esc_attr($additional_navigation_class); ?>">
    <div class="portfolio_prev">
        <?php
            if($navigation_through_category){
                $prev_html_info = '';
                if(get_previous_post() != "" && $enable_navigation_title){
                    $prev_post = get_previous_post();
                    $prev_html_info = getPortfolionavigationPostCategoryAndTitle($prev_post);
                }

                $prev_html = '<i class="fa fa-angle-left"></i>'.$prev_html_info;
                previous_post_link('%link', $prev_html, true,'','portfolio_category');
            } else {
                $prev_html_info = '';
                if(get_previous_post() != "" && $enable_navigation_title){
                    $prev_post = get_previous_post();
                    $prev_html_info = getPortfolionavigationPostCategoryAndTitle($prev_post);
                }

                $prev_html = '<i class="fa fa-angle-left"></i>'.$prev_html_info;
                previous_post_link('%link', $prev_html);
            }
        ?>
    </div>
    <?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
        <div class="portfolio_button"><a itemprop="url" href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
    <?php } ?>
    <div class="portfolio_next">
        <?php
            if($navigation_through_category){
                $next_html_info = '';
                if(get_next_post() != "" && $enable_navigation_title){
                    $next_post = get_next_post();
                    $next_html_info = getPortfolionavigationPostCategoryAndTitle($next_post);
                }
                $next_html = $next_html_info.'<i class="fa fa-angle-right"></i>';
                next_post_link('%link',$next_html, true,'','portfolio_category');
            } else {
                $next_html_info = '';
                if(get_next_post() != "" && $enable_navigation_title){
                    $next_post = get_next_post();
                    $next_html_info = getPortfolionavigationPostCategoryAndTitle($next_post);
                }
                $next_html = $next_html_info.'<i class="fa fa-angle-right"></i>';
                next_post_link('%link',$next_html);
            }
        ?>
    </div>
</div>