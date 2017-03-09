<?php

/*
   Interface: iLayoutNode
   A interface that implements Layout Node methods
*/
interface iLayoutNode
{
	public function hasChidren();
	public function getChild($key);
	public function addChild($key, $value);
}

/*
   Interface: iRender
   A interface that implements Render methods
*/
interface iRender
{
	public function render($factory);
}

/*
   Class: QodePanel
   A class that initializes Qode Panel
*/
class QodePanel implements iLayoutNode, iRender {

	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;

	function __construct($title="",$name="",$hidden_property="",$hidden_value="") {
		$this->children = array();
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
		}
		?>
		<div class="qodef-page-form-section-holder" id="qodef_<?php echo $this->name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<h3 class="qodef-page-section-title"><?php echo $this->title; ?></h3>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: QodeContainer
   A class that initializes Qode Container
*/
class QodeContainer implements iLayoutNode, iRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div class="qodef-page-form-container-holder" id="qodef_<?php echo $this->name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: QodeContainerNoStyle
   A class that initializes Qode Container without css classes
*/
class QodeContainerNoStyle implements iLayoutNode, iRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div id="qodef_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: QodeGroup
   A class that initializes Qode Group
*/
class QodeGroup implements iLayoutNode, iRender {

	public $children;
	public $title;
	public $description;

	function __construct($title="",$description="") {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $this->title; ?></h4>

				<p><?php echo $this->description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<?php
					foreach ($this->children as $child) {
						$this->renderChild($child, $factory);
					}
					?>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php
	}

	public function renderChild(iRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: QodeNotice
   A class that initializes Qode Notice
*/
class QodeNotice implements iRender {

	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$description="",$notice="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
		$this->notice = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>

		<div class="qodef-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo $this->title; ?></h4>

				<p><?php echo $this->description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="alert alert-warning">
						<?php echo $this->notice; ?>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php
	}
}

/*
   Class: QodeRow
   A class that initializes Qode Row
*/
class QodeRow implements iLayoutNode, iRender {

	public $children;
	public $next;

	function __construct($next=false) {
		$this->children = array();
		$this->next = $next;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		?>
		<div class="row<?php if ($this->next) echo " next-row"; ?>">
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: QodeTitle
   A class that initializes Qode Title
*/
class QodeTitle implements iRender {
    private $name;
    private $title;
    public $hidden_property;
    public $hidden_values = array();

    function __construct($name="",$title="",$hidden_property="",$hidden_value="") {
        $this->title = $title;
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            if (qodef_option_get_value($this->hidden_property)==$this->hidden_value)
                $hidden = true;
        }
        ?>
        <h5 class="qodef-page-section-subtitle" id="qodef_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
    <?php
    }
}

/*
   Class: QodeField
   A class that initializes Qode Field
*/
class QodeField implements iRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $qodeFramework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$qodeFramework->qodeOptions->addOption($this->name,$this->default_value, $type);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (qodef_option_get_value($this->hidden_property)==$value)
					$hidden = true;

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: QodeMetaField
   A class that initializes Qode Meta Field
*/
class QodeMetaField implements iRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $qodeFramework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$qodeFramework->qodeMetaBoxes->addOption($this->name,$this->default_value);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (qodef_option_get_value($this->hidden_property)==$value)
					$hidden = true;

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class QodeFieldType {

	abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );

}

class QodeFieldText extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 12;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo $col_width; ?>">
							<input type="text"
								   class="form-control qodef-input qodef-form-element"
								   name="<?php echo $name; ?>" value="<?php echo htmlspecialchars(qodef_option_get_value($name)); ?>"
								   placeholder=""/></div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldTextSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		?>


		<div class="col-lg-3" id="qodef_<?php echo $name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo $label; ?></em>
			<input type="text"
				   class="form-control qodef-input qodef-form-element"
				   name="<?php echo $name; ?>" value="<?php echo htmlspecialchars(qodef_option_get_value($name)); ?>"
				   placeholder=""/></div>
	<?php

	}

}

class QodeFieldTextArea extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->


			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control qodef-form-element"
									  name="<?php echo $name; ?>"
									  rows="5"><?php echo htmlspecialchars(qodef_option_get_value($name)); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldTextAreaSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		?>

		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control qodef-form-element"
					  name="<?php echo esc_attr($name); ?>"
					  rows="5"><?php echo qodef_option_get_value($name); ?></textarea>
		</div>
	<?php

	}

}

class QodeFieldColor extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>" class="my-color-field"/>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldColorSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		?>

		<div class="col-lg-3" id="qodef_<?php echo $name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo $label; ?></em>
			<input type="text" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>" class="my-color-field"/>
		</div>
	<?php

	}

}

class QodeFieldImage extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="qodef-media-uploader">
								<div<?php if (!qodef_option_has_value($name)) { ?> style="display: none"<?php } ?>
									class="qodef-media-image-holder">
									<img src="<?php if (qodef_option_has_value($name)) { echo qodef_get_attachment_thumb_url(qodef_option_get_value($name)); } ?>" alt=""
										 class="qodef-media-image img-thumbnail"/>
								</div>
								<div style="display: none"
									 class="qodef-media-meta-fields">
									<input type="hidden" class="qodef-media-upload-url"
										   name="<?php echo $name; ?>"
										   value="<?php echo qodef_option_get_value($name); ?>"/>
									<input type="hidden"
										   class="qodef-media-upload-height"
										   name="qode_options_theme[media-upload][height]"
										   value=""/>
									<input type="hidden"
										   class="qodef-media-upload-width"
										   name="qode_options_theme[media-upload][width]"
										   value=""/>
								</div>
								<a class="qodef-media-upload-btn btn btn-sm btn-primary"
								   href="javascript:void(0)"
								   data-frame-title="<?php _e('Select Image'); ?>"
								   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
								<a style="display: none;" href="javascript: void(0)"
								   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFont extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		global $fontArrays;
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element"
									name="<?php echo $name; ?>">
								<option value="-1">Default</option>
								<?php foreach($fontArrays as $fontArray) { ?>
									<option <?php if (qodef_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFontSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		global $fontArrays;
		?>


		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo $label; ?></em>
			<select class="form-control qodef-form-element"
					name="<?php echo $name; ?>">
				<option value="-1">Default</option>
				<?php foreach($fontArrays as $fontArray) { ?>
					<option <?php if (qodef_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
				<?php } ?>
			</select>
		</div>
	<?php

	}

}

class QodeFieldSelect extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="qodef-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo $value; ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo $value; ?>"
								<?php } ?>
									name="<?php echo $name; ?>">
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if (qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo $key; ?>"><?php echo $value; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldSelectBlank extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="qodef-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo $value; ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo $value; ?>"
								<?php } ?>
									name="<?php echo $name; ?>">
								<option <?php if (qodef_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if (qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo $key; ?>"><?php echo $value; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldSelectSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		?>


		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo $label; ?></em>
			<select class="form-control qodef-form-element"
					name="<?php echo $name; ?>">
				<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
					<option <?php if (qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo $key; ?>"><?php echo $value; ?></option>
				<?php } ?>
			</select>
		</div>
	<?php

	}

}

class QodeFieldSelectBlankSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		?>


		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo $label; ?></em>
			<select class="form-control qodef-form-element"
					name="<?php echo $name; ?>">
				<option <?php if (qodef_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
				<?php foreach($options as $key=>$value) { ?>
					<option <?php if (qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo $key; ?>"><?php echo $value; ?></option>
				<?php } ?>
			</select>
		</div>
	<?php

	}

}

class QodeFieldYesNo extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_yesno" value="yes"<?php if (qodef_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesno" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldYesNoSimple extends QodeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $qode_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>


        <div class="col-lg-3">
            <em class="qodef-field-description"><?php echo $label; ?></em>
            <p class="field switch">
                <label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
                       class="cb-enable<?php if (qodef_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
                <label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
                       class="cb-disable<?php if (qodef_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
                <input type="checkbox" id="checkbox" class="checkbox"
                       name="<?php echo $name; ?>_yesno" value="yes"<?php if (qodef_option_get_value($name) == "yes") { echo " selected"; } ?>/>
                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
            </p>
        </div>


    <?php

    }

}

class QodeFieldOnOff extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "on") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('On', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "off") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Off', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_onoff" value="on"<?php if (qodef_option_get_value($name) == "on") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_onoff" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldPortfolioFollow extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "portfolio_single_no_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_portfoliofollow" value="portfolio_single_follow"<?php if (qodef_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldZeroOne extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "1") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "0") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_zeroone" value="1"<?php if (qodef_option_get_value($name) == "1") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldImageVideo extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch switch-type">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "image") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Image', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "video") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Video', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_imagevideo" value="image"<?php if (qodef_option_get_value($name) == "image") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldYesEmpty extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_yesempty" value="yes"<?php if (qodef_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFlagPage extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_flagpage" value="page"<?php if (qodef_option_get_value($name) == "page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFlagPost extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "post") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_flagpost" value="post"<?php if (qodef_option_get_value($name) == "post") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFlagMedia extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "attachment") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_flagmedia" value="attachment"<?php if (qodef_option_get_value($name) == "attachment") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFlagPortfolio extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "portfolio_page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_flagportfolio" value="portfolio_page"<?php if (qodef_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldFlagProduct extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $qode_options_proya;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">

							<p class="field switch">
								<label data-hide="<?php echo $dependence_hide_on_yes; ?>" data-show="<?php echo $dependence_show_on_yes; ?>"
									   class="cb-enable<?php if (qodef_option_get_value($name) == "product") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('Yes', 'qode') ?></span></label>
								<label data-hide="<?php echo $dependence_show_on_yes; ?>" data-show="<?php echo $dependence_hide_on_yes; ?>"
									   class="cb-disable<?php if (qodef_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php _e('No', 'qode') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo $name; ?>_flagproduct" value="product"<?php if (qodef_option_get_value($name) == "product") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldRange extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$range_min = 0;
		$range_max = 1;
		$range_step = 0.01;
		$range_decimals = 2;
		if(isset($args["range_min"]))
			$range_min = $args["range_min"];
		if(isset($args["range_max"]))
			$range_max = $args["range_max"];
		if(isset($args["range_step"]))
			$range_step = $args["range_step"];
		if(isset($args["range_decimals"]))
			$range_decimals = $args["range_decimals"];
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="qodef-slider-range-wrapper">
								<div class="form-inline">
									<input type="text"
										   class="form-control qodef-form-element qodef-form-element-xsmall pull-left qodef-slider-range-value"
										   name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>

									<div class="qodef-slider-range small"
										 data-step="<?php echo $range_step; ?>" data-min="<?php echo $range_min; ?>" data-max="<?php echo $range_max; ?>" data-decimals="<?php echo $range_decimals; ?>" data-start="<?php echo qodef_option_get_value($name); ?>"></div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldRangeSimple extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		?>

		<div class="col-lg-3" id="qodef_<?php echo $name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="qodef-slider-range-wrapper">
				<div class="form-inline">
					<em class="qodef-field-description"><?php echo $label; ?></em>
					<input type="text"
						   class="form-control qodef-form-element qodef-form-element-xxsmall pull-left qodef-slider-range-value"
						   name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"/>

					<div class="qodef-slider-range xsmall"
						 data-step="0.01" data-max="1" data-start="<?php echo qodef_option_get_value($name); ?>"></div>
				</div>

			</div>
		</div>
	<?php

	}

}

class QodeFieldRadio extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value)
			$checked = "checked";
		$html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo $html;

	}

}

class QodeFieldCheckBox extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value)
			$checked = "checked";
		$html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo $html;

	}

}

class QodeFieldDate extends QodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo $name; ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo $label; ?></h4>

				<p><?php echo $description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo $col_width; ?>">
							<input type="text"
								   id = "portfolio_date"
								   class="datepicker form-control qodef-input qodef-form-element"
								   name="<?php echo $name; ?>" value="<?php echo qodef_option_get_value($name); ?>"
								/></div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class QodeFieldIconPack extends QodeFieldType {
    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $qodeIconCollections;

        $dependence = isset($args["dependence"]) ? true : false;
        $show = isset($args["show"]) ? $args["show"] : array();
        $hide = isset($args["hide"]) ? $args["hide"] : array();

        $icon_collections = $qodeIconCollections->getIconCollections();
        ?>

        <div class="qodef-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>

            <div class="qodef-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->
            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                                <?php foreach($show as $key=>$value) { ?>
                                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo $value; ?>"
                                <?php } ?>
                                <?php foreach($hide as $key=>$value) { ?>
                                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo $value; ?>"
                                <?php } ?>
                                    name="<?php echo $name; ?>">
                                <?php if(is_array($icon_collections) && count($icon_collections)) {
                                    foreach ($icon_collections as $collection_key => $collection_title) { ?>
                                        <option <?php if (qodef_option_get_value($name) == $collection_key) { echo "selected='selected'"; } ?> value="<?php echo esc_attr($collection_key); ?>"><?php echo esc_html($collection_title); ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
    <?php
    }
}

class QodeFieldFactory {

	public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {


		switch ( strtolower( $field_type ) ) {

			case 'text':
				$field = new QodeFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'textsimple':
				$field = new QodeFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'textarea':
				$field = new QodeFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'textareasimple':
				$field = new QodeFieldTextAreaSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'color':
				$field = new QodeFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'colorsimple':
				$field = new QodeFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'image':
				$field = new QodeFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'font':
				$field = new QodeFieldFont();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'fontsimple':
				$field = new QodeFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'select':
				$field = new QodeFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'selectblank':
				$field = new QodeFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'selectsimple':
				$field = new QodeFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'selectblanksimple':
				$field = new QodeFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'yesno':
				$field = new QodeFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

            case 'yesnosimple':
                $field = new QodeFieldYesNoSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;

			case 'onoff':
				$field = new QodeFieldOnOff();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'portfoliofollow':
				$field = new QodeFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'zeroone':
				$field = new QodeFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'imagevideo':
				$field = new QodeFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'yesempty':
				$field = new QodeFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'flagpost':
				$field = new QodeFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'flagpage':
				$field = new QodeFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'flagmedia':
				$field = new QodeFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'flagportfolio':
				$field = new QodeFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'flagproduct':
				$field = new QodeFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'range':
				$field = new QodeFieldRange();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'rangesimple':
				$field = new QodeFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'radio':
				$field = new QodeFieldRadio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'checkbox':
				$field = new QodeFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;

			case 'date':
				$field = new QodeFieldDate();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
            case 'iconpack':
                $field = new QodeFieldIconPack();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;
            case 'iconwithiconpack':
                $field = new QodeFieldIconWithIconPack();
                $field->render( $name, $label, $description, $options, $args, $hidden );
                break;
			default:
				break;

		}

	}

}

/*
   Class: QodeMultipleImages
   A class that initializes Qode Multiple Images
*/
class QodeMultipleImages implements iRender {
	private $name;
	private $label;
	private $description;


	function __construct($name,$label="",$description="") {
		global $qodeFramework;
		$this->name = $name;
		$this->label = $label;
		$this->description = $description;
		$qodeFramework->qodeMetaBoxes->addOption($this->name,"");
	}

	public function render($factory) {
		global $post;
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo $this->label; ?></h4>

				<p><?php echo $this->description; ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="qode-gallery-images-holder clearfix">
								<?php
								$portfolio_image_gallery_val = get_post_meta( $post->ID, 'qode_portfolio-image-gallery', true );
								if($portfolio_image_gallery_val!='' ) $portfolio_image_gallery_array=explode(',',$portfolio_image_gallery_val);

								if(isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array)!=0):

									foreach($portfolio_image_gallery_array as $gimg_id):

										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="qode-gallery-image-holder"><img src="'.$gimage_wp[0].'"/></li>';

									endforeach;

								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo $portfolio_image_gallery_val; ?>" id="qode_portfolio-image-gallery" name="qode_portfolio-image-gallery">
							<div class="qodef-gallery-uploader">
								<a class="qodef-gallery-upload-btn btn btn-sm btn-primary"
								   href="javascript:void(0)"><?php _e('Upload'); ?></a>
								<a class="qodef-gallery-clear-btn btn btn-sm btn-default pull-right"
								   href="javascript:void(0)"><?php _e('Remove All'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}
}

/*
   Class: QodeImagesVideos
   A class that initializes Qode Images Videos
*/
class QodeImagesVideos implements iRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		<div class="qodef_hidden_portfolio_images" style="display: none">
			<div class="qodef-page-form-section">


				<div class="qodef-field-desc">
					<h4><?php echo $this->label; ?></h4>

					<p><?php echo $this->description; ?></p>
				</div>
				<!-- close div.qodef-field-desc -->

				<div class="qodef-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="qodef-field-description">Order Number</em>
								<input type="text"
									   class="form-control qodef-input qodef-form-element"
									   id="portfolioimgordernumber_x"
									   name="portfolioimgordernumber_x"
									   placeholder=""/></div>
							<div class="col-lg-10">
								<em class="qodef-field-description">Image/Video title (only for gallery layout - Portfolio Style 6)</em>
								<input type="text"
									   class="form-control qodef-input qodef-form-element"
									   id="portfoliotitle_x"
									   name="portfoliotitle_x"
									   placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="qodef-field-description">Image</em>
								<div class="qodef-media-uploader">
									<div style="display: none"
										 class="qodef-media-image-holder">
										<img src="" alt=""
											 class="qodef-media-image img-thumbnail"/>
									</div>
									<div style="display: none"
										 class="qodef-media-meta-fields">
										<input type="hidden" class="qodef-media-upload-url"
											   name="portfolioimg_x"
											   id="portfolioimg_x"/>
										<input type="hidden"
											   class="qodef-media-upload-height"
											   name="qode_options_theme[media-upload][height]"
											   value=""/>
										<input type="hidden"
											   class="qodef-media-upload-width"
											   name="qode_options_theme[media-upload][width]"
											   value=""/>
									</div>
									<a class="qodef-media-upload-btn btn btn-sm btn-primary"
									   href="javascript:void(0)"
									   data-frame-title="<?php _e('Select Image'); ?>"
									   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
									<a style="display: none;" href="javascript: void(0)"
									   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="qodef-field-description">Video type</em>
								<select class="form-control qodef-form-element qodef-portfoliovideotype"
										name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube">Youtube</option>
									<option value="vimeo">Vimeo</option>
									<option value="self">Self hosted</option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="qodef-field-description">Video ID</em>
								<input type="text"
									   class="form-control qodef-input qodef-form-element"
									   id="portfoliovideoid_x"
									   name="portfoliovideoid_x"
									   placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="qodef-field-description">Video image</em>
								<div class="qodef-media-uploader">
									<div style="display: none"
										 class="qodef-media-image-holder">
										<img src="" alt=""
											 class="qodef-media-image img-thumbnail"/>
									</div>
									<div style="display: none"
										 class="qodef-media-meta-fields">
										<input type="hidden" class="qodef-media-upload-url"
											   name="portfoliovideoimage_x"
											   id="portfoliovideoimage_x"/>
										<input type="hidden"
											   class="qodef-media-upload-height"
											   name="qode_options_theme[media-upload][height]"
											   value=""/>
										<input type="hidden"
											   class="qodef-media-upload-width"
											   name="qode_options_theme[media-upload][width]"
											   value=""/>
									</div>
									<a class="qodef-media-upload-btn btn btn-sm btn-primary"
									   href="javascript:void(0)"
									   data-frame-title="<?php _e('Select Image'); ?>"
									   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
									<a style="display: none;" href="javascript: void(0)"
									   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="qodef-field-description">Video webm</em>
								<input type="text"
									   class="form-control qodef-input qodef-form-element"
									   id="portfoliovideowebm_x"
									   name="portfoliovideowebm_x"
									   placeholder=""/></div>
							<div class="col-lg-4">
								<em class="qodef-field-description">Video mp4</em>
								<input type="text"
									   class="form-control qodef-input qodef-form-element"
									   id="portfoliovideomp4_x"
									   name="portfoliovideomp4_x"
									   placeholder=""/></div>
							<div class="col-lg-4">
								<em class="qodef-field-description">Video ogv</em>
								<input type="text"
									   class="form-control qodef-input qodef-form-element"
									   id="portfoliovideoogv_x"
									   name="portfoliovideoogv_x"
									   placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="qodef_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;">Remove portfolio image/video</a>
							</div>
						</div>



					</div>
				</div>
				<!-- close div.qodef-section-content -->

			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'qode_portfolio_images', true );
		if (count($portfolio_images)>1) {
			usort($portfolio_images, "comparePortfolioImages");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			?>
			<div class="qodef_portfolio_image" rel="<?php echo $no; ?>" style="display: block;">

				<div class="qodef-page-form-section">


					<div class="qodef-field-desc">
						<h4><?php echo $this->label; ?></h4>

						<p><?php echo $this->description; ?></p>
					</div>
					<!-- close div.qodef-field-desc -->

					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="qodef-field-description">Order Number</em>
									<input type="text"
										   class="form-control qodef-input qodef-form-element"
										   id="portfolioimgordernumber_<?php echo $no; ?>"
										   name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber'])?stripslashes($portfolio_image['portfolioimgordernumber']):""; ?>"
										   placeholder=""/></div>
								<div class="col-lg-10">
									<em class="qodef-field-description">Image/Video title (only for gallery layout - Portfolio Style 6)</em>
									<input type="text"
										   class="form-control qodef-input qodef-form-element"
										   id="portfoliotitle_<?php echo $no; ?>"
										   name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle'])?stripslashes($portfolio_image['portfoliotitle']):""; ?>"
										   placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description">Image</em>
									<div class="qodef-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
											class="qodef-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo qodef_generate_filename(stripslashes($portfolio_image['portfolioimg']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' )); } ?>" alt=""
												 class="qodef-media-image img-thumbnail"/>
										</div>
										<div style="display: none"
											 class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url"
												   name="portfolioimg[]"
												   id="portfolioimg_<?php echo $no; ?>"
												   value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
											<input type="hidden"
												   class="qodef-media-upload-height"
												   name="qode_options_theme[media-upload][height]"
												   value=""/>
											<input type="hidden"
												   class="qodef-media-upload-width"
												   name="qode_options_theme[media-upload][width]"
												   value=""/>
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary"
										   href="javascript:void(0)"
										   data-frame-title="<?php _e('Select Image'); ?>"
										   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
										<a style="display: none;" href="javascript: void(0)"
										   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="qodef-field-description">Video type</em>
									<select class="form-control qodef-form-element qodef-portfoliovideotype"
											name="portfoliovideotype[]" id="portfoliovideotype_<?php echo $no; ?>">
										<option value=""></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube">Youtube</option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo">Vimeo</option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self">Self hosted</option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="qodef-field-description">Video ID</em>
									<input type="text"
										   class="form-control qodef-input qodef-form-element"
										   id="portfoliovideoid_<?php echo $no; ?>"
										   name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid'])?stripslashes($portfolio_image['portfoliovideoid']):""; ?>"
										   placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description">Video image</em>
									<div class="qodef-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
											class="qodef-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo qodef_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' )); } ?>" alt=""
												 class="qodef-media-image img-thumbnail"/>
										</div>
										<div style="display: none"
											 class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url"
												   name="portfoliovideoimage[]"
												   id="portfoliovideoimage_<?php echo $no; ?>"
												   value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
											<input type="hidden"
												   class="qodef-media-upload-height"
												   name="qode_options_theme[media-upload][height]"
												   value=""/>
											<input type="hidden"
												   class="qodef-media-upload-width"
												   name="qode_options_theme[media-upload][width]"
												   value=""/>
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary"
										   href="javascript:void(0)"
										   data-frame-title="<?php _e('Select Image'); ?>"
										   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
										<a style="display: none;" href="javascript: void(0)"
										   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="qodef-field-description">Video webm</em>
									<input type="text"
										   class="form-control qodef-input qodef-form-element"
										   id="portfoliovideowebm_<?php echo $no; ?>"
										   name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm'])?stripslashes($portfolio_image['portfoliovideowebm']):""; ?>"
										   placeholder=""/></div>
								<div class="col-lg-4">
									<em class="qodef-field-description">Video mp4</em>
									<input type="text"
										   class="form-control qodef-input qodef-form-element"
										   id="portfoliovideomp4_<?php echo $no; ?>"
										   name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4'])?stripslashes($portfolio_image['portfoliovideomp4']):""; ?>"
										   placeholder=""/></div>
								<div class="col-lg-4">
									<em class="qodef-field-description">Video ogv</em>
									<input type="text"
										   class="form-control qodef-input qodef-form-element"
										   id="portfoliovideoogv_<?php echo $no; ?>"
										   name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv'])?stripslashes($portfolio_image['portfoliovideoogv']):""; ?>"
										   placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="qodef_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;">Remove portfolio image/video</a>
								</div>
							</div>



						</div>
					</div>
					<!-- close div.qodef-section-content -->

				</div>
			</div>
			<?php
			$no++;
		}
		?>
		<br />
		<a class="qodef_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/" >Add portfolio image/video</a>


	<?php

	}
}


/*
   Class: QodeImagesVideos
   A class that initializes Qode Images Videos
*/
class QodeImagesVideosFramework implements iRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<!--Image hidden start-->
		<div class="qodef-hidden-portfolio-images"  style="display: none">
			<div class="qodef-portfolio-toggle-holder">
				<div class="qodef-portfolio-toggle qodef-toggle-desc">
					<span class="number">1</span><span class="qodef-toggle-inner">Image - <em>(Order Number, Image Title)</em></span>
				</div>
				<div class="qodef-portfolio-toggle qodef-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="qodef-portfolio-toggle-content">
				<div class="qodef-page-form-section">
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="qodef-media-uploader">
										<em class="qodef-field-description">Image </em>
										<div style="display: none" class="qodef-media-image-holder">
											<img src="" alt="" class="qodef-media-image img-thumbnail">
										</div>
										<div  class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value="">
											<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value="">
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image">Upload</a>
										<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm">Remove</a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="qodef-field-description">Order Number</em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
								</div>
								<div class="col-lg-8">
									<em class="qodef-field-description">Image Title (works only for Gallery portfolio type selected) </em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

						</div><!-- close div.container-fluid -->
					</div><!-- close div.qodef-section-content -->
				</div>
			</div>
		</div>
		<!--Image hidden End-->

		<!--Video Hidden Start-->
		<div class="qodef-hidden-portfolio-videos"  style="display: none">
			<div class="qodef-portfolio-toggle-holder">
				<div class="qodef-portfolio-toggle qodef-toggle-desc">
					<span class="number">2</span><span class="qodef-toggle-inner">Video - <em>(Order Number, Video Title)</em></span>
				</div>
				<div class="qodef-portfolio-toggle qodef-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="qodef-portfolio-toggle-content">
				<div class="qodef-page-form-section">
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="qodef-media-uploader">
										<em class="qodef-field-description">Cover Video Image </em>
										<div style="display: none" class="qodef-media-image-holder">
											<img src="" alt="" class="qodef-media-image img-thumbnail">
										</div>
										<div style="display: none" class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value="">
											<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value="">
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image">Upload</a>
										<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm">Remove</a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="qodef-field-description">Order Number</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
										</div>
										<div class="col-lg-10">
											<em class="qodef-field-description">Video Title (works only for Gallery portfolio type selected)</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="qodef-field-description">Video type</em>
											<select class="form-control qodef-form-element qodef-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube">Youtube</option>
												<option value="vimeo">Vimeo</option>
												<option value="self">Self hosted</option>
											</select>
										</div>
										<div class="col-lg-2 qodef-video-id-holder">
											<em class="qodef-field-description" id="videoId">Video ID</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" placeholder="">
										</div>
									</div>

									<div class="row next-row qodef-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="qodef-field-description">Video webm</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" placeholder="">
										</div>
										<div class="col-lg-4">
											<em class="qodef-field-description">Video mp4</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" placeholder="">
										</div>
										<div class="col-lg-4">
											<em class="qodef-field-description">Video ogv</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" placeholder="">
										</div>
									</div>
								</div>

							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div><!-- close div.container-fluid -->
					</div><!-- close div.qodef-section-content -->
				</div>
			</div>
		</div>
		<!--Video Hidden End-->


		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'qode_portfolio_images', true );
		if (count($portfolio_images)>1) {
			usort($portfolio_images, "comparePortfolioImages");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			if (isset($portfolio_image['portfolioimgtype']))
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			else {
				if (stripslashes($portfolio_image['portfolioimg']) == true)
					$portfolio_img_type = "image";
				else
					$portfolio_img_type = "video";
			}
			if ($portfolio_img_type == "image") {
				?>

				<div class="qodef-portfolio-images qodef-portfolio-media" rel="<?php echo $no; ?>">
					<div class="qodef-portfolio-toggle-holder">
						<div class="qodef-portfolio-toggle qodef-toggle-desc">
							<span class="number"><?php echo $no; ?></span><span class="qodef-toggle-inner">Image - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
						</div>
						<div class="qodef-portfolio-toggle qodef-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="qodef-portfolio-toggle-content" style="display: none">
						<div class="qodef-page-form-section">
							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="qodef-media-uploader">
												<em class="qodef-field-description">Image </em>
												<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
													class="qodef-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo qodef_generate_filename(stripslashes($portfolio_image['portfolioimg']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' )); } ?>" alt=""
														 class="qodef-media-image img-thumbnail"/>
												</div>
												<div style="display: none"
													 class="qodef-media-meta-fields">
													<input type="hidden" class="qodef-media-upload-url"
														   name="portfolioimg[]"
														   id="portfolioimg_<?php echo $no; ?>"
														   value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
													<input type="hidden"
														   class="qodef-media-upload-height"
														   name="qode_options_theme[media-upload][height]"
														   value=""/>
													<input type="hidden"
														   class="qodef-media-upload-width"
														   name="qode_options_theme[media-upload][width]"
														   value=""/>
												</div>
												<a class="qodef-media-upload-btn btn btn-sm btn-primary"
												   href="javascript:void(0)"
												   data-frame-title="<?php _e('Select Image'); ?>"
												   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
												<a style="display: none;" href="javascript: void(0)"
												   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="qodef-field-description">Order Number</em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo $no; ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber'])?stripslashes($portfolio_image['portfolioimgordernumber']):""; ?>" placeholder="">
										</div>
										<div class="col-lg-8">
											<em class="qodef-field-description">Image Title (works only for Gallery portfolio type selected) </em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo $no; ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle'])?stripslashes($portfolio_image['portfoliotitle']):""; ?>" placeholder="">
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo $no; ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo $no; ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo $no; ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideowebm_<?php echo $no; ?>" name="portfoliovideowebm[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo $no; ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfoliovideoogv_<?php echo $no; ?>" name="portfoliovideoogv[]">
									<input type="hidden" id="portfolioimgtype_<?php echo $no; ?>" name="portfolioimgtype[]" value="image">
								</div><!-- close div.container-fluid -->
							</div><!-- close div.qodef-section-content -->
						</div>
					</div>
				</div>

			<?php
			} else {
				?>
				<div class="qodef-portfolio-videos qodef-portfolio-media" rel="<?php echo $no; ?>">
					<div class="qodef-portfolio-toggle-holder">
						<div class="qodef-portfolio-toggle qodef-toggle-desc">
							<span class="number"><?php echo $no; ?></span><span class="qodef-toggle-inner">Video - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
						</div>
						<div class="qodef-portfolio-toggle qodef-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="qodef-portfolio-toggle-content" style="display: none">
						<div class="qodef-page-form-section">
							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="qodef-media-uploader">
												<em class="qodef-field-description">Cover Video Image </em>
												<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
													class="qodef-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo qodef_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' )); } ?>" alt=""
														 class="qodef-media-image img-thumbnail"/>
												</div>
												<div style="display: none"
													 class="qodef-media-meta-fields">
													<input type="hidden" class="qodef-media-upload-url"
														   name="portfoliovideoimage[]"
														   id="portfoliovideoimage_<?php echo $no; ?>"
														   value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
													<input type="hidden"
														   class="qodef-media-upload-height"
														   name="qode_options_theme[media-upload][height]"
														   value=""/>
													<input type="hidden"
														   class="qodef-media-upload-width"
														   name="qode_options_theme[media-upload][width]"
														   value=""/>
												</div>
												<a class="qodef-media-upload-btn btn btn-sm btn-primary"
												   href="javascript:void(0)"
												   data-frame-title="<?php _e('Select Image'); ?>"
												   data-frame-button-text="<?php _e('Select Image'); ?>"><?php _e('Upload'); ?></a>
												<a style="display: none;" href="javascript: void(0)"
												   class="qodef-media-remove-btn btn btn-default btn-sm"><?php _e('Remove', 'qode'); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="qodef-field-description">Order Number</em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo $no; ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber'])?stripslashes($portfolio_image['portfolioimgordernumber']):""; ?>" placeholder="">
												</div>
												<div class="col-lg-10">
													<em class="qodef-field-description">Video Title (works only for Gallery portfolio type selected) </em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo $no; ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle'])?stripslashes($portfolio_image['portfoliotitle']):""; ?>" placeholder="">
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="qodef-field-description">Video Type</em>
													<select class="form-control qodef-form-element qodef-portfoliovideotype"
															name="portfoliovideotype[]" id="portfoliovideotype_<?php echo $no; ?>">
														<option value=""></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube">Youtube</option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo">Vimeo</option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self">Self hosted</option>
													</select>
												</div>
												<div class="col-lg-2 qodef-video-id-holder">
													<em class="qodef-field-description">Video ID</em>
													<input type="text"
														   class="form-control qodef-input qodef-form-element"
														   id="portfoliovideoid_<?php echo $no; ?>"
														   name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid'])?stripslashes($portfolio_image['portfoliovideoid']):""; ?>"
														   placeholder=""/>
												</div>
											</div>

											<div class="row next-row qodef-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="qodef-field-description">Video webm</em>
													<input type="text"
														   class="form-control qodef-input qodef-form-element"
														   id="portfoliovideowebm_<?php echo $no; ?>"
														   name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm'])?stripslashes($portfolio_image['portfoliovideowebm']):""; ?>"
														   placeholder=""/></div>
												<div class="col-lg-4">
													<em class="qodef-field-description">Video mp4</em>
													<input type="text"
														   class="form-control qodef-input qodef-form-element"
														   id="portfoliovideomp4_<?php echo $no; ?>"
														   name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4'])?stripslashes($portfolio_image['portfoliovideomp4']):""; ?>"
														   placeholder=""/></div>
												<div class="col-lg-4">
													<em class="qodef-field-description">Video ogv</em>
													<input type="text"
														   class="form-control qodef-input qodef-form-element"
														   id="portfoliovideoogv_<?php echo $no; ?>"
														   name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv'])?stripslashes($portfolio_image['portfoliovideoogv']):""; ?>"
														   placeholder=""/></div>
											</div>
										</div>

									</div>
									<input type="hidden" id="portfolioimg_<?php echo $no; ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo $no; ?>" name="portfolioimgtype[]" value="video">
								</div><!-- close div.container-fluid -->
							</div><!-- close div.qodef-section-content -->
						</div>
					</div>
				</div>
			<?php
			}
			$no++;
		}
		?>

		<div class="qodef-portfolio-add">
			<a class="qodef-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i> Add Image</a>
			<a class="qodef-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i> Add Video</a>

			<a class="qodef-toggle-all-media btn btn-sm btn-default pull-right" href="#"> Expand All</a>
			<?php /* <a class="qodef-remove-last-row-media btn btn-sm btn-default pull-right" href="#"> Remove last row</a> */ ?>
		</div>


	<?php

	}
}


class QodeTwitterFramework implements  iRender {
	public function render($factory) {
		$twitterApi = QodeTwitterApi::getInstance();
		$message = '';

		if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
			if(!empty($_GET['oauth_token'])) {
				update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
			}

			if(!empty($_GET['oauth_verifier'])) {
				update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
			}

			$responseObj = $twitterApi->obtainAccessToken();
			if($responseObj->status) {
				$message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'qode');
			} else {
				$message = $responseObj->message;
			}
		}

		$buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'bridge') : esc_html__('Connect with Twitter', 'qode');
		?>
		<?php if($message !== '') { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html($message); ?></span>
			</div>
		<?php } ?>
		<div class="qodef-page-form-section" id="qodef_enable_social_share_twitter">

			<div class="qodef-field-desc">
				<h4><?php esc_html_e('Connect with Twitter', 'qode'); ?></h4>

				<p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'qode'); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a id="qodef-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
							<input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php }
}

class QodeInstagramFramework implements iRender {
    public function render($factory) {
        $instagram_api = QodeInstagramApi::getInstance();
        $message = '';

        //if code wasn't saved to database
		if(!get_option('qode_instagram_code')) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if(!empty($_GET['code'])) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'qode');
				
			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}

		$buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'qode') : esc_html__('Connect with Instagram', 'qode');

    ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="qodef-page-form-section" id="edgtf_enable_social_share">

            <div class="qodef-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'qode'); ?></h4>

                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'qode'); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
    <?php }
}

/*
   Class: QodeImagesVideos
   A class that initializes Qode Images Videos
*/
class QodeOptionsFramework implements iRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="qodef-portfolio-additional-item-holder" style="display: none">
			<div class="qodef-portfolio-toggle-holder">
				<div class="qodef-portfolio-toggle qodef-toggle-desc">
					<span class="number">1</span><span class="qodef-toggle-inner">Additional Sidebar Item <em>(Order Number, Item Title)</em></span>
				</div>
				<div class="qodef-portfolio-toggle qodef-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="qodef-portfolio-toggle-content">
				<div class="qodef-page-form-section">
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">

								<div class="col-lg-2">
									<em class="qodef-field-description">Order Number</em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" placeholder="">
								</div>
								<div class="col-lg-10">
									<em class="qodef-field-description">Item Title </em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="optionLabel_x" name="optionLabel_x" placeholder="">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description">Item Text</em>
									<textarea class="form-control qodef-input qodef-form-element" id="optionValue_x" name="optionValue_x" placeholder=""></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description">Enter Full URL for Item Text Link</em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="optionUrl_x" name="optionUrl_x" placeholder="">
								</div>
							</div>
						</div><!-- close div.qodef-section-content -->
					</div><!-- close div.container-fluid -->
				</div>
			</div>
		</div>
		<?php
		$no = 1;
		$portfolios = get_post_meta( $post->ID, 'qode_portfolios', true );
		if (count($portfolios)>1) {
			usort($portfolios, "comparePortfolioOptions");
		}
		while (isset($portfolios[$no-1])) {
			$portfolio = $portfolios[$no-1];
			?>
			<div class="qodef-portfolio-additional-item" rel="<?php echo $no; ?>">
				<div class="qodef-portfolio-toggle-holder">
					<div class="qodef-portfolio-toggle qodef-toggle-desc">
						<span class="number"><?php echo $no; ?></span><span class="qodef-toggle-inner">Additional Sidebar Item - <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
					</div>
					<div class="qodef-portfolio-toggle qodef-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="qodef-portfolio-toggle-content" style="display: none">
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">

									<div class="col-lg-2">
										<em class="qodef-field-description">Order Number</em>
										<input type="text" class="form-control qodef-input qodef-form-element" id="optionlabelordernumber_<?php echo $no; ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber'])?stripslashes($portfolio['optionlabelordernumber']):""; ?>" placeholder="">
									</div>
									<div class="col-lg-10">
										<em class="qodef-field-description">Item Title </em>
										<input type="text" class="form-control qodef-input qodef-form-element" id="optionLabel_<?php echo $no; ?>" name="optionLabel[]" value="<?php echo stripslashes($portfolio['optionLabel']); ?>" placeholder="">
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="qodef-field-description">Item Text</em>
										<textarea class="form-control qodef-input qodef-form-element" id="optionValue_<?php echo $no; ?>" name="optionValue[]" placeholder=""><?php echo stripslashes($portfolio['optionValue']); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="qodef-field-description">Enter Full URL for Item Text Link</em>
										<input type="text" class="form-control qodef-input qodef-form-element" id="optionUrl_<?php echo $no; ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" placeholder="">
									</div>
								</div>
							</div><!-- close div.qodef-section-content -->
						</div><!-- close div.container-fluid -->
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>

		<div class="qodef-portfolio-add">
			<a class="qodef-add-item btn btn-sm btn-primary" href="#"> Add New Item</a>


			<a class="qodef-toggle-all-item btn btn-sm btn-default pull-right" href="#"> Expand All</a>
			<?php /* <a class="qodef-remove-last-item-row btn btn-sm btn-default pull-right" href="#"> Remove Last Row</a> */ ?>
		</div>




	<?php

	}
}


class QodeImportExport implements iRender {

	private $title;
	private $name;


	function __construct($title="",$name="") {
		$this->title = $title;
		$this->name = $name;
	}

	public function render($factory) { ?>
		<div id="qode-metaboxes-general" class="wrap qodef-page qodef-page-info">
				<div class="qodef-page-form">
					<div class="qodef-page-form-section-holder clearfix">
						<h3 class="qodef-page-section-title"><?php echo $this->title; ?></h3>
						<div class="qodef-page-form-section">
							<div class="qodef-field-desc">
								<h4><?php esc_html_e('Export', 'qode'); ?></h4>
								<p><?php esc_html_e('Copy the code from this field and save it to a textual file to export your options. Save that textual file somewhere so you can later use it to import options if necessary.', 'qode'); ?></p>
							</div>
							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-12">
											<textarea name="export_theme_options" id="export_options" class="form-control qodef-form-element" rows="10" readonly><?php echo qode_export_theme_options(); ?></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="qodef-page-form-section" >
							<div class="qodef-field-desc">
								<h4><?php esc_html_e('Import', 'qode'); ?></h4>
								<p><?php esc_html_e('To import options, just paste the code you previously saved from the "Export" field into this field, and then click the "Import" button.', 'qode'); ?></p>
							</div>

							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-12">
											<textarea name="import_theme_options" id="import_theme_options" class="form-control qodef-form-element" rows="10"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="qodef-page-form-section" >
							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-12">
											<button type="button" class="btn btn-primary btn-sm " name="import" id="qodef-import-theme-options-btn" data-waiting-message="<?php esc_html_e('Please wait', 'qode'); ?>" data-confirm-message="<?php esc_html_e('Are you sure, you want to import Options now?', 'qode'); ?>">Import</button>
											<?php wp_nonce_field('qodef_import_theme_options_secret_value', 'qodef_import_theme_options_secret', false); ?>
											<span class="qodef-bckp-message"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="qodef-page-form-section">
							<div class="qodef-section-content">
								<div class="alert alert-warning">
									<strong><?php _e('Important notes:', 'qode') ?></strong>
									<ul>
										<li><?php _e('Please note that import process will overide all your existing options.', 'qode'); ?></li>
								</div>
							</div>
						</div>

					</div>

				</div>
		</div>

	<?php }
}