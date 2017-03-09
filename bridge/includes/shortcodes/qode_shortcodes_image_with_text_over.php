<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Width</label>
            <select name="width" id="width">
                <option value=""></option>
                <option value="one_half">1/2</option>
                <option value="one_third">1/3</option>
                <option value="one_fourth">1/4</option>
            </select>
        </div>
        <div class="input">
            <label>Image</label>
            <input id="image" type="text" name="image" class="popup_image" id="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
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
                <option value="fa-lg">Tiny</option>
                <option value="fa-2x">Small</option>
                <option value="fa-3x">Medium</option>
                <option value="fa-4x">Large</option>
                <option value="fa-5x">Very Large</option>
            </select>
        </div>
        <div class="input">
            <label>Icon Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" size="12" />
        </div>
        <div class="input">
            <label>Title</label>
            <input name="title" id="title" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <label>Title Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="title_color" id="title_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Title Size</label>
            <input name="title_size" id="title_size" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <label>Title Tag</label>
            <select name="title_tag" id="title_tag">
                <option value=""></option>
                <option value="h2">h2</option>
                <option value="h3">h3</option>
                <option value="h4">h4</option>
                <option value="h5">h5</option>
                <option value="h6">h6</option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>