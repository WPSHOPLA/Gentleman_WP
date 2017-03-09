<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Type</label>
            <select name="type" id="type">
                <option value="normal">Normal</option>
                <option value="with_icon">With Icon</option>
            </select>
        </div>
        <div class="input">
            <label>Icon</label>
            <select id="icon" name="icon">
                <option value=""></option>
                <?php
                $fa_icons = getFontAwesomeIconArray();
                foreach ($fa_icons as $key => $value) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
		<div class="input">
            <label>Icon Size</label>
            <select name="icon_size" id="icon_size">
                <option value="fa-lg">Small</option>
                <option value="fa-2x">Medium</option>
                <option value="fa-3x">Large</option>
            </select>
        </div>
        <div class="input">
            <label>Icon Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Icon Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_background_color" id="icon_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Custom Image</label>
            <input id="custom_icon" type="text" name="custom_icon" class="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label>Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>

        <div class="input">
            <label>Border Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Close Button Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="close_button_color" id="close_button_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>