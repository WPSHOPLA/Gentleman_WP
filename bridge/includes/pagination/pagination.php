<?php

if (!function_exists('pagination')) {
function pagination($pages = '', $range = 4, $paged = 1){  
	global $qode_options_proya;
    $showitems = $range+1;  
 
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1;
        }
    }   
 
    if(1 != $pages){
        echo "<div class='pagination'><ul>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='first'><a itemprop='url' href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a></li>";
		echo "<li class='prev";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
			echo " prev_first";
		}
		echo "'><a itemprop='url' href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i></a></li>";
 
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a itemprop='url' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
            }
        }
		
        echo "<li class='next";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
			echo " next_last";
		}
		echo "'><a href=\"";
		if($pages > $paged){
			echo get_pagenum_link($paged + 1);
		} else {
			echo get_pagenum_link($paged);
		}
		echo "\"><i class='fa fa-angle-right'></i></a></li>";  
		 
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='last'><a itemprop='url' href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a></li>";
        echo "</ul></div>\n";
    }
}
}
?>