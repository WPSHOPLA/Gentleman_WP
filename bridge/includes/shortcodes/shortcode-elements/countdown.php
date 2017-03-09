<?php
/* Countdown shortcode */
if (!function_exists('countdown')) {
    function countdown($atts, $content = null) {
        extract(shortcode_atts(array("year" => "", "month" => "", "day" => "", "hour" => "", "minute" => "", "month_label" => "", "day_label" => "", "hour_label" => "", "minute_label" => "", "second_label" => "", "month_singular_label" => "", "day_singular_label" => "", "hour_singular_label" => "", "minute_singular_label" => "", "second_singular_label" => "", "color" => "", "digit_font_size" => "", "label_font_size" => "", "font_weight" => "", "show_separator" => ""), $atts));
        $id = mt_rand(1000, 9999);
        $month_label_value = "Months";
        if($month_label != ""){
            $month_label_value = $month_label;
        }
        $day_label_value = "Days";
        if($day_label != ""){
            $day_label_value = $day_label;
        }
        $hour_label_value = "Hours";
        if($hour_label != ""){
            $hour_label_value = $hour_label;
        }
        $minute_label_value = "Minutes";
        if($minute_label != ""){
            $minute_label_value = $minute_label;
        }
        $second_label_value = "Seconds";
        if($second_label != ""){
            $second_label_value = $second_label;
        }

        $month_singular_label_value = "Month";
        if ($month_singular_label != "") {
            $month_singular_label_value = $month_singular_label;
        }
        $day_singular_label_value = "Day";
        if ($day_singular_label != "") {
            $day_singular_label_value = $day_singular_label;
        }
        $hour_singular_label_value = "Hour";
        if ($hour_singular_label != "") {
            $hour_singular_label_value = $hour_singular_label;
        }
        $minute_singular_label_value = "Minute";
        if ($minute_singular_label != "") {
            $minute_singular_label_value = $minute_singular_label;
        }
        $second_singular_label_value = "Second";
        if ($second_singular_label != "") {
            $second_singular_label_value = $second_singular_label;
        }

        $counter_style = "";
        if($color != "" || $font_weight != ''){
            $counter_style = "style='";
            if($color != ""){
                $counter_style .="color:".$color.";";
            }
            if($font_weight != ""){
                $counter_style .="font-weight:".$font_weight.";";
            }
            $counter_style .="'";
        }

        $data_attr = "";
        if ($year !== ''){
            $data_attr .= 'data-year = '.$year;
        }
        if ($month !== ''){
            $data_attr .= ' data-month = '.$month;
        }
        if ($day !== ''){
            $data_attr .= ' data-day = '.$day;
        }
        if ($hour !== ''){
            $data_attr .= ' data-hour = '.$hour;
        }
        if ($minute !== ''){
            $data_attr .= ' data-minute = '.$minute;
        }
        $data_attr .= ' data-monthsLabel = '.$month_label_value;
        $data_attr .= ' data-daysLabel = '.$day_label_value;
        $data_attr .= ' data-hoursLabel = '.$hour_label_value;
        $data_attr .= ' data-minutesLabel = '.$minute_label_value;
        $data_attr .= ' data-secondsLabel = '.$second_label_value;
        $data_attr .= ' data-monthLabel = '.$month_singular_label_value;
        $data_attr .= ' data-dayLabel = '.$day_singular_label_value;
        $data_attr .= ' data-hourLabel = '.$hour_singular_label_value;
        $data_attr .= ' data-minuteLabel = '.$minute_singular_label_value;
        $data_attr .= ' data-secondLabel = '.$second_singular_label_value;
        $data_attr .= ' data-tickf = setCountdownStyle'. $id;
        $data_attr .= ' data-timezone = '.get_option('gmt_offset');

        if ($digit_font_size !== ''){
            $data_attr .= ' data-digitfs = '.$digit_font_size;
        }
        if ($label_font_size !== ''){
            $data_attr .= ' data-labelfs = '.$label_font_size;
        }
        if ($color !== ''){
            $data_attr .= ' data-color = '.$color;
        }

        $html = "<div class='countdown ".$show_separator."' id='countdown".$id."' ".$counter_style." ".$data_attr."></div>";

        return $html;
    }
    add_shortcode('countdown', 'countdown');
}