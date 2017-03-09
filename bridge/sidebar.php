<?php 
global $qode_options_proya;
global $qode_page_id;
$sidebar_id =  $qode_page_id;
?>
	<div class="column_inner">
		<aside class="sidebar">
			<?php	
			$sidebar = "";

            $is_woocommerce=false;
            if(function_exists("is_woocommerce")) {
                $is_woocommerce = is_woocommerce();
                if($is_woocommerce){
					$sidebar_id = get_option('woocommerce_shop_page_id');
                }
            }
		
			if(get_post_meta($sidebar_id, 'qode_choose-sidebar', true) != ""){
				$sidebar = get_post_meta($sidebar_id, 'qode_choose-sidebar', true);
			}else{
				if (is_singular("post")) {
					if($qode_options_proya['blog_single_sidebar_custom_display'] != ""){
						$sidebar = $qode_options_proya['blog_single_sidebar_custom_display'];
					}else{
						$sidebar = "Sidebar";
					}
				} elseif(is_singular("portfolio_page") && $qode_options_proya['portfolio_single_sidebar_custom_display'] != ""){
					$sidebar = $qode_options_proya['portfolio_single_sidebar_custom_display'];
				}else {
					$sidebar = "Sidebar Page";
				}
			}
			?>
				
			<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar)) : 
			endif;  ?>
		</aside>
	</div>
