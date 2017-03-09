<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Size</label>
            <select name="size" id="size">
                <option value=""></option>
                <option value="fa-lg">Tiny</option>
                <option value="fa-2x">Small</option>
                <option value="fa-3x">Medium</option>
                <option value="fa-4x">Large</option>
                <option value="fa-5x">Very Large</option>
            </select>
        </div>
        <div class="input">
            <label>Custom Size (px)</label>
            <input name="custom_size" id="custom_size" value="" maxlength="10" size="10" />
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
            <label>Type</label>
            <select name="type" id="type">
                <option value="normal">Normal</option>
                <option value="circle">Circle</option>
                <option value="square">Square</option>
            </select>
        </div>
        <div class="input">
            <label>Position</label>
            <select name="position" id="position">
                <option value="">Normal</option>
                <option value="left">Left</option>
                <option value="center">Center</option>
                <option value="right">Right</option>
            </select>
        </div>
        <div class="input">
            <label>Border</label>
            <select name="border" id="border">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="input">
            <label>Border Color (Only for Square type)</label>
            <div class="colorSelector"><div style=""></div></div>
            <input type="text" name="border_color" id="border_color" value="" size="12" maxlength="12" />
        </div>
        <div class="input">
            <label>Border Width (px) (Only for Square type)</label>
            <input name="border_width" id="border_width" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label>Icon Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Background Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Margin (top right bottom left):</label>
            <input name="margin" id="margin" value="" maxlength="12" size="12" />
        </div>
        <div class="input">    
            <label>Icon Animation</label>
            <select name="icon_animation" id="icon_animation">
                <option value="">No</option>
                <option value="q_icon_animation">Yes</option>
            </select>
        </div>
        <div class="input">    
            <label>Icon Animation Delay</label>
            <input name="icon_animation_delay" id="icon_animation_delay" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label>Link</label>
            <input name="link" id="link" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <label>Target</label>
            <select name="target" id="target">
                <option value="_self">Self</option>
                <option value="_blank">Blank</option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>

</div>