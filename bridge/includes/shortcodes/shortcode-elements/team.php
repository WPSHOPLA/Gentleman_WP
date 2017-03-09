<?php
/* Team shortcode */
if (!function_exists('q_team')) {
    function q_team($atts, $content = null) {
        $args = array(
            "type"						=> "",
            "team_image"				=> "",
            "team_name"					=> "",
            "name_color"				=> "",
            "team_position"				=> "",
            "position_color"			=> "",
            "team_description"			=> "",
            "background_color"			=> "",
            "overlay_color"				=> "",
            "box_border"				=> "",
            "box_border_width"			=> "",
            "box_border_color"			=> "",
            "show_separator"			=> "",
            "separator_color"			=> "",
            "icons_color"				=> "",
            "team_social_icon_1"		=> "",
            "team_social_icon_1_link"	=> "",
            "team_social_icon_1_target"	=> "",
            "team_social_icon_2"		=> "",
            "team_social_icon_2_link"	=> "",
            "team_social_icon_2_target"	=> "",
            "team_social_icon_3"		=> "",
            "team_social_icon_3_link"	=> "",
            "team_social_icon_3_target"	=> "",
            "team_social_icon_4"		=> "",
            "team_social_icon_4_link"	=> "",
            "team_social_icon_4_target"	=> "",
            "team_social_icon_5"		=> "",
            "team_social_icon_5_link"	=> "",
            "team_social_icon_5_target"	=> "",
            "title_tag"					=> "h3"
        );

        extract(shortcode_atts($args, $atts));
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
        $team_image_title = '';
        if(is_numeric($team_image)) {
            $team_image_src = wp_get_attachment_url( $team_image );
            $team_image_title = get_the_title($team_image);
        } else {
            $team_image_src = $team_image;
        }

        $q_team_style = "";
        if($background_color != ""){
            $q_team_style .= " style='";

            $q_team_style .= 'background-color:' . $background_color . ';';

            $q_team_style .= "'";
        }

        $qteam_box_style = "";
        if($box_border == "yes"){

            $qteam_box_style .= "style=";

            $qteam_box_style .= "border-style:solid;";
            if($box_border_color != "" ){
                $qteam_box_style .= "border-color:" . $box_border_color . ";";
            }
            if($box_border_width != "" ){
                $qteam_box_style .= "border-width:" . $box_border_width . "px;";
            }

            $qteam_box_style .= "'";

        }

        $qteam_info_on_hover_box_style = "style= '";
        if ($type == "info_on_hover" && $overlay_color != "") {
            $qteam_info_on_hover_box_style .= "background-color:" . $overlay_color . ";";
        }
        $qteam_info_on_hover_box_style .= "'";

        $name_style = "style = '";
        if ($name_color !== "") {
            $name_style .= 'color: ' . $name_color . ';';
        }
        $name_style .= "'";

        $position_style = "style = '";
        if ($position_color !== "") {
            $position_style .= 'color: ' . $position_color . ';';
        }
        $position_style .= "'";

        $separator_style = "style = '";
        if ($separator_color !== "") {
            $separator_style .= 'background-color: ' . $separator_color . ';';
        }
        $separator_style .= "'";

        if ($type == "info_on_hover") {
            $html =  "<div class='q_team info_on_hover' ". $q_team_style .">";
            $html .=  "<div class='q_team_inner'>";
            if($team_image != "") {
                $html .=  "<div class='q_team_image'>";
                $html .= "<img itemprop='image' src='$team_image_src' alt='$team_image_title' />";

                $html .=  "<div class='q_team_text' ". $qteam_info_on_hover_box_style .">";
                $html .=  "<div class='q_team_text_holder'>";
                $html .=  "<div class='q_team_text_holder_inner'>";
                $html .=  "<div class='q_team_text_inner'>";
                $html .=  "<div class='q_team_title_holder'>";
                $html .=  "<$title_tag class='q_team_name' " . $name_style . ">";
                $html .= $team_name;
                $html .=  "</$title_tag>";
                if($team_position != "") {
                    $html .= "<span " . $position_style . ">" . $team_position . "</span>";
                }
                $html .=  "</div>";
                if($show_separator != "no"){
                    $html .=  "<div class='separator small center' " . $separator_style . "></div>";
                }
                $html .=  "</div>";
                $html .=  "<div class='q_team_social_holder'>";
                if($team_social_icon_1 != "") {
                    $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_1 .'" size="fa-2x" link="' . $team_social_icon_1_link . '" target="' . $team_social_icon_1_target . '" icon_color="' . $icons_color . '"]');
                }
                if($team_social_icon_2 != "") {
                    $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_2 .'" size="fa-2x" link="' . $team_social_icon_2_link . '" target="' . $team_social_icon_2_target . '" icon_color="' . $icons_color . '"]');
                }
                if($team_social_icon_3 != "") {
                    $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_3 .'" size="fa-2x" link="' . $team_social_icon_3_link . '" target="' . $team_social_icon_3_target . '" icon_color="' . $icons_color . '"]');
                }
                if($team_social_icon_4 != "") {
                    $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_4 .'" size="fa-2x" link="' . $team_social_icon_4_link . '" target="' . $team_social_icon_4_target . '" icon_color="' . $icons_color . '"]');
                }
                if($team_social_icon_5 != "") {
                    $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_5 .'" size="fa-2x" link="' . $team_social_icon_5_link . '" target="' . $team_social_icon_5_target . '" icon_color="' . $icons_color . '"]');
                }

                $html .=  "</div>";
                $html .=  "</div>";
                $html .=  "</div>";
                $html .=  "</div>";
                $html .=  "</div>";

                $html .=  "</div>";
            }

            if($team_description != "") {
                $html .= "<div class='q_team_description_wrapper' ".$qteam_box_style.">";
                $html .= "<div class='q_team_description'>";
                $html .= "<div class='q_team_description_inner'>";
                $html .= "<p>".$team_description."</p>";
                $html .= "</div>"; // close q_team_description_inner
                $html .= "</div>"; // close q_team_description
                $html .= "</div>"; // close q_team_description_wrapper
            }

            $html .=  "</div>";
        }
        else {
            $html =  "<div class='q_team'". $q_team_style .">";
            $html .=  "<div class='q_team_inner'>";
            if($team_image != "") {
                $html .=  "<div class='q_team_image'>";
                $html .= "<img itemprop='image' src='$team_image_src' alt='$team_image_title' />";

                if($team_description != "") {
                    $html .= "<div class='q_team_description_wrapper'>";
                    $html .= "<div class='q_team_description'>";
                    $html .= "<div class='q_team_description_inner'>";
                    $html .= "<p>".$team_description."</p>";
                    $html .= "</div>"; // close q_team_description_inner
                    $html .= "</div>"; // close q_team_description
                    $html .= "</div>"; // close q_team_description_wrapper
                }

                $html .=  "</div>";
            }
            $html .=  "<div class='q_team_text' ". $qteam_box_style .">";
            $html .=  "<div class='q_team_text_inner'>";
            $html .=  "<div class='q_team_title_holder'>";
            $html .=  "<$title_tag class='q_team_name' " . $name_style . ">";
            $html .= $team_name;
            $html .=  "</$title_tag>";
            if($team_position != "") {
                $html .= "<span " . $position_style . ">" . $team_position . "</span>";
            }
            $html .=  "</div>";
            if($show_separator != "no"){
                $html .=  "<div class='separator small center' " . $separator_style . "></div>";
            }
            $html .=  "</div>";
            $html .=  "<div class='q_team_social_holder'>";
            if($team_social_icon_1 != "") {
                $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_1 .'" size="fa-2x" link="' . $team_social_icon_1_link . '" target="' . $team_social_icon_1_target . '" icon_color="' . $icons_color . '"]');
            }
            if($team_social_icon_2 != "") {
                $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_2 .'" size="fa-2x" link="' . $team_social_icon_2_link . '" target="' . $team_social_icon_2_target . '" icon_color="' . $icons_color . '"]');
            }
            if($team_social_icon_3 != "") {
                $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_3 .'" size="fa-2x" link="' . $team_social_icon_3_link . '" target="' . $team_social_icon_3_target . '" icon_color="' . $icons_color . '"]');
            }
            if($team_social_icon_4 != "") {
                $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_4 .'" size="fa-2x" link="' . $team_social_icon_4_link . '" target="' . $team_social_icon_4_target . '" icon_color="' . $icons_color . '"]');
            }
            if($team_social_icon_5 != "") {
                $html .=  do_shortcode('[social_icons type="normal_social" icon="'. $team_social_icon_5 .'" size="fa-2x" link="' . $team_social_icon_5_link . '" target="' . $team_social_icon_5_target . '" icon_color="' . $icons_color . '"]');
            }

            $html .=  "</div>";
            $html .=  "</div>";
            $html .=  "</div>";
            $html .=  "</div>";
        }
        return $html;
    }
    add_shortcode('q_team', 'q_team');
}