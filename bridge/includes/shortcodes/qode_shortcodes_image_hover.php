<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Image</label>
            <input id="image" type="text" name="image" class="popup_image" id="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Hover Image</label>
            <input id="hover_image" type="text" name="hover_image" class="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Link</label>
            <input name="link" id="link" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <label>Target</label>
            <select name="target">
                <option value=""></option>
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
            </select>
        </div>
        <div class="input">
            <label>Animation</label>
            <select name="animation">
                <option value=""></option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="input">
            <label>Transition delay (in miliseconds)</label>
            <input name="transition_delay" id="transition_delay" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>