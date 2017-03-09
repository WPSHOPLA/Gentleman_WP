<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label>Type</label>
            <select name="type" id="type">
                <option value="normal">Normal</option>
                <option value="square">Square</option>
                <option value="circle">Circle</option>
            </select>
        </div>
        <div class="input">
            <label>Letter</label>
            <input type="text" name="letter" id="letter" value="" size="5"/>
        </div>
		<div class="input">
            <label>Font Size (px)</label>
            <input type="text" name="font_size" id="font_size" value="" size="5"/>
        </div>
        <div class="input">
            <label>Letter Color</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="color" id="color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Background Color (Only for Square and Circle type)</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Border Color (Only for Square and Circle type)</label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>