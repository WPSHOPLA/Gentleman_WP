<?php
$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
require_once( $path[0] . '/wp-load.php' );
 ?>

<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
	 <div class="input">
        <label>Title</label>
        <input name="title" id="title" value="" />
    </div>
	<div class="input">
		<label>Title position</label>
			<select id="title_align" name="title_align">
				<option value=""></option>
				<option value="separator_align_center" class="separator_align_center">Align center</option>
				<option value="separator_align_left" class="separator_align_left">Align left</option>
				<option value="separator_align_right" class="separator_align_right">Align right</option>
			</select>
	</div>
	<div class="input">
		<label>Border</label>
			<select id="border" name="border">
				<option value="no">No</option>
				<option value="yes">Yes</option>
			</select>
	</div>
	<div class="input">
		<label>Border Color</label>
		<div class="colorSelector"><div style=""></div></div>
		<input type="text" name="border_color" id="border_color" value="" size="10" maxlength="10" />
	</div>
	<div class="input">
		<label>Background Color</label>
		<div class="colorSelector"><div style=""></div></div>
		<input type="text" name="background_color" id="background_color" value="" size="10" maxlength="10" />
	</div>
	<div class="input">
		<label>Text Color</label>
		<div class="colorSelector"><div style=""></div></div>
		<input type="text" name="text_color" id="text_color" value="" size="10" maxlength="10" />
	</div>
	<div class="input">
		<input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
	</div>
</form>
</div>