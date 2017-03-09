<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
  <div class="input">
    <label>Type</label>
      <select name="accordion_type" id="accordion_type">
        <option value="accordion without_icon">Accordion</option>
        <option value="toggle without_icon">Toggle</option>
        <option value="accordion with_icon">Accordion With Icon</option>
        <option value="toggle with_icon">Toggle With Icon</option>
      </select>
  </div>
  <div class="input">
    <label>Title Color</label>
    <input name="title_color" id="title_color" value="" maxlength="10" size="10" />
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
    <label>Icon Color</label>
    <div class="colorSelector"><div style=""></div></div>
    <input name="icon_color" id="icon_color" value="" maxlength="10" size="10" />
  </div>
  <div class="input">
      <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
  </div>
</form>
</div>