<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
	<div class="input">
    <label>Section Type</label>
    <select name="type" id="type">
        <option value="grid">In Grid</option>
        <option value="full_width">Full Width</option>
    </select>
  </div>
	<div class="input">
    <label>Text Align</label>
    <select name="text_align" id="text_align">
			<option value="left">Left</option>
			<option value="center">Center</option>
			<option value="right">Right</option>
    </select>
  </div>
	<div class="input">
		<label>Video background</label>
		<input name="video" id="video" type="checkbox" value="show_video" maxlength="200" size="60" />
	</div>
	<div class="input">
		<label>Video overlay</label>
		<input name="video_overlay" id="video_overlay" type="checkbox" value="show_video_overlay" maxlength="200" size="60" />
	</div>
	<div class="input">
		<label>Video background (webm) file url</label>
		<input name="video_webm" id="video_webm" value="" maxlength="200" size="60" />
	</div>
	<div class="input">
		<label>Video background (mp4) file url</label>
		<input name="video_mp4" id="video_mp4" value="" maxlength="200" size="60" />
	</div>
	<div class="input">
		<label>Video background (ogv) file url</label>
		<input name="video_ogv" id="video_ogv" value="" maxlength="200" size="60" />
	</div>
	<div class="input">
		<label>Video preview image</label>
		<input id="video_image" type="text" name="video_image" class="popup_image" value="" size="55" />
		<input class="upload_button" type="button" value="Upload file" id="popup_image_button">
	</div>
	<div class="input">
    <label>Backgroun Color</label>
		<div class="colorSelector"><div style=""></div></div>
    <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
    <label>Border Color</label>
		<div class="colorSelector"><div style=""></div></div>
    <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
    <label>Padding (left/right in px - full width only)</label>
    <input name="padding" id="padding" value="" size="11" />
  </div>
	<div class="input">
    <label>Padding (top/bottom in px)</label>
    <input name="padding_top_bottom" id="padding_top_bottom" value="" size="11" />
  </div>
  <div class="input">
      <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
  </div>
 
</form>
</div>