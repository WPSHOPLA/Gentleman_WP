<?php
if (!function_exists('getCarouselSliderArray')){
	function getCarouselSliderArray() {
		$carousel_output = array("" => ""); 
    $terms = get_terms('carousels_category');
    $count = count($terms);
    if ( $count > 0 ):
        foreach ( $terms as $term ):
            $carousel_output[$term->name] = $term->slug;
        endforeach;
    endif;
		
    return $carousel_output;
	}
}
add_action('init', 'getCarouselSliderArray',1);
?>