<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
		<div class="input">
            <label>Category (slug)</label>
            <input name="category" id="category" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Number</label>
            <input name="number" id="number" value="" maxlength="12" size="12" />
        </div>
		<div class="input">
			<label>Order By</label>
			<select name="order_by" id="order_by">
				<option value=""></option>
				<option value="date">Date</option>
				<option value="title">Title</option>
				<option value="rand">Random</option>
			</select>
		</div>
		<div class="input">
			<label>Order Type</label>
			<select name="order" id="order">
				<option value=""></option>
				<option value="DESC">Descending</option>
				<option value="ASC">Ascending</option>
			</select>
		</div>
        <div class="input">
            <label>Text color</label>
			<div class="colorSelector"><div style=""></div></div>
            <input name="text_color" id="text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Author Text color</label>
			<div class="colorSelector"><div style=""></div></div>
            <input name="author_text_color" id="author_text_color" value="" maxlength="12" size="12" />
        </div>
		<div class="input">
			<label>Author Text Font Size</label>
			<select name="author_text_font_weight" id="author_text_font_weight">
				<option value="">Default</option>
				<option value="100">Thin 100</option>
				<option value="200">Extra-Light 200</option>
				<option value="300">Light 300</option>
				<option value="400">Regular 400</option>
				<option value="500">Medium 500</option>
				<option value="600">Semi-Bold 600</option>
				<option value="700">Bold 700</option>
				<option value="800">Extra-Bold 800</option>
				<option value="900">Ultra-Bold 900</option>
			</select>
		</div>
		<div class="input">
			<label>Author Text Font Size</label>
			<input name="author_text_font_size" id="author_text_font_size" value="" maxlength="12" size="12" />
		</div>
        <div class="input">
            <label>Show navigation</label>
            <select name="show_navigation" id="show_navigation">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <input name="author_text_color" id="author_text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label>Navigation Style</label>
            <select name="navigation_style" id="navigation_style">
                <option value="dark">Dark</option>
                <option value="light">Light</option>
            </select>
        </div>
        <div class="input">
            <label>Auto rotate slides</label>
            <select name="auto_rotate_slides" id="auto_rotate_slides">
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="0">Disable</option>
            </select>
        </div>
        <div class="input">
            <label>Animation Type</label>
            <select name="animation_type" id="animation_type">
                <option value="fade">Fade</option>
                <option value="slide">Slide</option>
            </select>
        </div>
        <div class="input">
            <label>Animation speed</label>
            <input name="animation_speed" id="animation_speed" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>