<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Type</label>
            <select name="full_width" id="full_width">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="input">
            <label>Content in grid</label>
            <select name="content_in_grid" id="content_in_grid">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
         <div class="input">
            <label>Type</label>
            <select name="type" id="type">
                <option value="normal">Normal</option>
                <option value="simple">Simple</option>
                <option value="with_icon">With Icon</option>
            </select>
        </div>
		<div class="input">
            <label>Icon (Only for 'With Icon' type)</label>
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
                <option value=""></option>
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
            <label>Show button</label>
            <select name="show_button" id="show_button">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="input">
            <label>Button Text</label>
            <input name="button_text" id="button_text" value="" size="55" />
        </div>
        <div class="input">
            <label>Button Link</label>
            <input name="button_link" id="button_link" value="" size="55" />
        </div>
        <div class="input">
            <label>Button Target</label>
            <select name="button_target" id="button_target">
                <option value=""></option>
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
            </select>
        </div>
        <div class="input">
            <label>Button Text Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_text_color" id="button_text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Button hover text color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_hover_text_color" id="button_hover_text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Button Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_background_color" id="button_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Button Hover Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_hover_background_color" id="button_hover_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Button Border Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_border_color" id="button_border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Button Hover Border Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_hover_border_color" id="button_hover_border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>