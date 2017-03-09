<?php
$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
require_once( $path[0] . '/wp-load.php' );
 ?>

<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
    <div class="input">
        <label>Active element</label>
        <input name="active_element" id="active_element" value="" maxlength="100" size="55" />
    </div>
	<div class="input">
		<label>Image 1</label>
		<input id="image1" type="text" name="image1" class="popup_image" value="" size="55" />
		<input class="upload_button" type="button" value="Upload file" id="popup_image_button">
	</div>
	<div class="input">
		<label>Title 1</label>
		<input name="title1" id="title1" value="" maxlength="100" size="55" />
	</div>
	<div class="input">
		<label>Title Color 1</label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="title_color1" id="title_color1" value="" maxlength="12" size="12" />
	</div>
	<div class="input">
		<label>Text 1</label>
		<input name="text1" id="text1" value="" size="55" />
	</div>
  	<div class="input">
		<label>Text Color 1</label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="text_color1" id="text_color1" value="" maxlength="12" size="12" />
	</div>
	<div class="input">
    	<label>Link 1</label>
		<input name="link1" id="link1" value="" size="55" />
	</div>
	<div class="input">
    	<label>Link label 1</label>
		<input name="link_label1" id="link_label1" value="" size="55" />
	</div>
	<div class="input">
    	<label>Target 1</label>
		<select name="target1" id="target1">
			<option value="_self">Self</option>
			<option value="_blank">Blank</option>
		</select>
	</div>
	<div class="input">
		<label>Image 2</label>
		<input id="image2" type="text" name="image2" class="popup_image" value="" size="55" />
		<input class="upload_button" type="button" value="Upload file" id="popup_image_button">
	</div>
	<div class="input">
		<label>Title 2</label>
		<input name="title2" id="title2" value="" maxlength="100" size="55" />
	</div>
	<div class="input">
		<label>Title Color 2</label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="title_color2" id="title_color2" value="" maxlength="12" size="12" />
	</div>
	<div class="input">
    <label>Text 2</label>
		<input name="text2" id="text2" value="" size="55" />
	</div>
	<div class="input">
		<label>Text Color 2</label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="text_color2" id="text_color2" value="" maxlength="12" size="12" />
	</div>
	<div class="input">
    	<label>Link 2</label>
		<input name="link2" id="link2" value="" size="55" />
	</div>
	<div class="input">
    	<label>Link label 2</label>
		<input name="link_label2" id="link_label2" value="" size="55" />
	</div>
	<div class="input">
    	<label>Target 2</label>
      	<select name="target2" id="target2">
      		<option value="_self">Self</option>
			<option value="_blank">Blank</option>
		 	<option value="_parent">Parent</option>
		 	<option value="_top">Top</option>
		</select>
	</div>
	<div class="input">
		<label>Image 3</label>
		<input id="image3" type="text" name="image3" class="popup_image" value="" size="55" />
		<input class="upload_button" type="button" value="Upload file" id="popup_image_button">
	</div>
	<div class="input">
		<label>Title 3</label>
		<input name="title3" id="title3" value="" maxlength="100" size="55" />
	</div>
	<div class="input">
		<label>Title Color 3</label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="title_color3" id="title_color3" value="" maxlength="12" size="12" />
	</div>
	<div class="input">
    	<label>Text 3</label>
		<input name="text3" id="text3" value="" size="55" />
	</div>
	<div class="input">
		<label>Text Color 3</label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="text_color3" id="text_color3" value="" maxlength="12" size="12" />
	</div>
	<div class="input">
    <label>Link 3</label>
		<input name="link3" id="link3" value="" size="55" />
	</div>
	<div class="input">
    	<label>Link label 3</label>
		<input name="link_label3" id="link_label3" value="" size="55" />
	</div>
	<div class="input">
    	<label>Target 3</label>
		<select name="target3" id="target3">
			<option value="_self">Self</option>
			<option value="_blank">Blank</option>
		  	<option value="_parent">Parent</option>
		  	<option value="_top">Top</option>
      </select>
	</div>
	<div class="input">
		<input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
	</div>
</form>
</div>