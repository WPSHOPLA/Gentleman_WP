<?php
global $qode_page_id;
global $qode_options_proya;
$filter = "no";
if(isset($qode_options_proya['blog_masonry_filter'])){
	$filter = $qode_options_proya['blog_masonry_filter'];
}
$page_category = get_post_meta($qode_page_id, "qode_choose-blog-category", true);
if(is_category()){
	$page_category = get_query_var( 'cat' );
}
if ($page_category == "" && !is_category()) {
                $args = array(
                    'parent' => 0
                );
                $categories = get_categories( $args );
            } else {
                $args = array(
                    'parent' => $page_category
                );
                $categories = get_categories( $args );
            }
if ($filter == "yes" && count($categories) > 0) {	?>

			<div class="filter_outer">
				<div class="filter_holder">
					<ul>
						<li class="filter" data-filter="*"><span><?php _e('All', 'qode'); ?></span></li>
						<?php foreach ($categories as $category) { ?>
							 <li class="filter" data-filter="<?php echo ".category-" . $category->slug; ?>"><span><?php echo $category->name; ?></span></li>
						<?php } ?>
					</ul>
				</div>
			</div>

      <?php  }
?>
