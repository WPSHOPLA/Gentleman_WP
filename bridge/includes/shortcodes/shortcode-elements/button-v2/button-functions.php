<?php

if(!function_exists('qode_get_button_v2_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function qode_get_button_v2_html($params) {
        $button_html = qode_execute_shortcode('qode_button_v2', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}