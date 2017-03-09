<?php
/* Social Share shortcode */
if (!function_exists('social_share_list')) {
    function social_share_list($atts, $content = null) {
        global $qode_options_proya;
        if(isset($qode_options_proya['twitter_via']) && !empty($qode_options_proya['twitter_via'])) {
            $twitter_via = " via " . $qode_options_proya['twitter_via'] . " ";
        } else {
            $twitter_via = 	"";
        }
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $html = "";
        if(isset($qode_options_proya['enable_social_share']) && $qode_options_proya['enable_social_share'] == "yes") {
            $post_type = get_post_type();

            if(isset($qode_options_proya["post_types_names_$post_type"])) {
                if($qode_options_proya["post_types_names_$post_type"] == $post_type) {
                    $html .= '<div class="social_share_list_holder">';
                    $html .= "<span>".__('Share on: ', 'qode')."</span>";
                    $html .= '<ul>';

                    $is_mobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                        '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                        '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );

                    if(isset($qode_options_proya['enable_facebook_share']) &&  $qode_options_proya['enable_facebook_share'] == "yes") {
                        $html .= '<li class="facebook_share">';

                        // if mobile, use different link to sharer.php service
                        if($is_mobile) {
                            $html .= '<a title="'.__("Share on Facebook","qode").'" href="javascript:void(0)" onclick="window.open(\'http://m.facebook.com/sharer.php?u=' . urlencode(get_permalink());
                        }
                        else {
                            $html .= '<a title="'.__("Share on Facebook","qode").'" href="javascript:void(0)" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(qode_addslashes(get_the_title())) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;p[images][0]=';
                            if(function_exists('the_post_thumbnail')) {
                                $html .=  wp_get_attachment_url(get_post_thumbnail_id());
                            }
                        }

                        $html .= '&amp;p[summary]=' . urlencode(qode_addslashes(strip_tags(get_the_excerpt())));

                        $html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');">';
                        if(!empty($qode_options_proya['facebook_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya["facebook_icon"] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-facebook"></i>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }

                    if($qode_options_proya['enable_twitter_share'] == "yes") {
                        $html .= '<li class="twitter_share">';

                        // if mobile use different link to update status service
                        if($is_mobile) {
                            $html .= '<a href="#" title="'.__("Share on Twitter", 'qode').'" onclick="popUp=window.open(\'http://twitter.com/intent/tweet?text=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
                        }
                        else {
                            $html .= '<a href="#" title="'.__("Share on Twitter", 'qode').'" onclick="popUp=window.open(\'http://twitter.com/home?status=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
                        }


                        if(!empty($qode_options_proya['twitter_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya["twitter_icon"] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-twitter"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if($qode_options_proya['enable_google_plus'] == "yes") {
                        $html .= '<li  class="google_share">';
                        $html .= '<a href="#" title="'.__("Share on Google+","qode").'" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if(!empty($qode_options_proya['google_plus_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya['google_plus_icon'] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-google-plus"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if(isset($qode_options_proya['enable_linkedin']) && $qode_options_proya['enable_linkedin'] == "yes") {
                        $html .= '<li  class="linkedin_share">';
                        $html .= '<a href="#" class="'.__("Share on LinkedIn","qode").'" onclick="popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()). '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if(!empty($qode_options_proya['linkedin_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya['linkedin_icon'] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-linkedin"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if(isset($qode_options_proya['enable_tumblr']) && $qode_options_proya['enable_tumblr'] == "yes") {
                        $html .= '<li  class="tumblr_share">';
                        $html .= '<a href="#" title="'.__("Share on Tumblr","qode").'" onclick="popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode(get_permalink()). '&amp;name=' . urlencode(get_the_title()) .'&amp;description='.urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if(!empty($qode_options_proya['tumblr_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya['tumblr_icon'] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-tumblr"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if(isset($qode_options_proya['enable_pinterest']) && $qode_options_proya['enable_pinterest'] == "yes") {
                        $html .= '<li  class="pinterest_share">';
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $html .= '<a href="#" title="'.__("Share on Pinterest","qode").'" onclick="popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()). '&amp;description=' . qode_addslashes(get_the_title()) .'&amp;media='.urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if(!empty($qode_options_proya['pinterest_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya['pinterest_icon'] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-pinterest"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if(isset($qode_options_proya['enable_vk']) && $qode_options_proya['enable_vk'] == "yes") {
                        $html .= '<li  class="vk_share">';
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $html .= '<a href="#" title="'.__("Share on VK","qode").'" onclick="popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode(get_permalink()). '&amp;title=' . urlencode(get_the_title()) .'&amp;description=' . urlencode(get_the_excerpt()) .'&amp;image='.urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if(!empty($qode_options_proya['vk_icon'])) {
                            $html .= '<img itemprop="image" src="' . $qode_options_proya['vk_icon'] . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-vk"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }

                    $html .= '</ul>'; //close ul
                    $html .= '</div>'; //close div.social_share_list_holder
                }
            }
        }
        return $html;
    }
    add_shortcode('social_share_list', 'social_share_list');
}