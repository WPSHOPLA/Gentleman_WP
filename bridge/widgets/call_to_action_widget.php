<?php

class Call_To_Action extends WP_Widget {
    public function __construct() {
		parent::__construct(
	 		'call_to_action_widget', // Base ID
			'Call To Action', // Name
			array( 'description' => __( 'Call to Action Widget', 'qode' ), ) // Args
		);
	}
    
    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $content        = '';
        $params         = '';
        $content_key    = 'text';

        //is call to action text set?
        if(array_key_exists($content_key, $instance)) {
            //set shortcode's content and remove it from instance array
            $content = $instance[$content_key];
            unset($instance[$content_key]);
        }

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key = '$value' ";
            }
        }

        //finally call the shortcode
        echo do_shortcode("[action $params]".$content."[/action]");
	}

 	public function form($instance) {

        //set widget values
        $type                                       = isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : '';
        $full_width                                 = isset( $instance['full_width'] ) ? esc_attr( $instance['full_width'] ) : '';
        $content_in_grid                            = isset( $instance['content_in_grid'] ) ? esc_attr( $instance['content_in_grid'] ) : '';
        $text                                       = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : '';
        $text_color                                 = isset( $instance['text_color'] ) ? esc_attr( $instance['text_color'] ) : '';
        $text_size                                  = isset( $instance['text_size'] ) ? esc_attr( $instance['text_size'] ) : '';
        $text_letter_spacing                        = isset( $instance['text_letter_spacing'] ) ? esc_attr( $instance['text_letter_spacing'] ) : '';
        $text_font_weight                           = isset( $instance['text_font_weight'] ) ? esc_attr( $instance['text_font_weight'] ) : '';
        $background_color                           = isset( $instance['background_color'] ) ? esc_attr( $instance['background_color'] ) : '';
        $border_color                               = isset( $instance['border_color'] ) ? esc_attr( $instance['border_color'] ) : '';
        $padding_top                                = isset( $instance['padding_top'] ) ? esc_attr( $instance['padding_top'] ) : '';
        $padding_bottom                             = isset( $instance['padding_bottom'] ) ? esc_attr( $instance['padding_bottom'] ) : '';
        $show_button                                = isset( $instance['show_button'] ) ? esc_attr( $instance['show_button'] ) : '';
        $button_link                                = isset( $instance['button_link'] ) ? esc_attr( $instance['button_link'] ) : '';
        $button_text                                = isset( $instance['button_text'] ) ? esc_attr( $instance['button_text'] ) : '';
        $button_target                              = isset( $instance['button_target'] ) ? esc_attr( $instance['button_target'] ) : '';
        $button_text_color                          = isset( $instance['button_text_color'] ) ? esc_attr( $instance['button_text_color'] ) : '';
        $button_hover_text_color                    = isset( $instance['button_hover_text_color'] ) ? esc_attr( $instance['button_hover_text_color'] ) : '';
        $button_background_color                    = isset( $instance['button_background_color'] ) ? esc_attr( $instance['button_background_color'] ) : '';
        $button_hover_background_color              = isset( $instance['button_hover_background_color'] ) ? esc_attr( $instance['button_hover_background_color'] ) : '';
        $button_border_color                        = isset( $instance['button_border_color'] ) ? esc_attr( $instance['button_border_color'] ) : '';
        $button_hover_border_color                  = isset( $instance['button_hover_border_color'] ) ? esc_attr( $instance['button_hover_border_color'] ) : '';

		$font_weight_array = array(
			"" => "Default",
			"100" => "Thin 100",
			"200" => "Extra-Light 200",
			"300" => "Light 300",
			"400" => "Regular 400",
			"500" => "Medium 500",
			"600" => "Semi-Bold 600",
			"700" => "Bold 700",
			"800" => "Extra-Bold 800",
			"900" => "Ultra-Bold 900"
		);

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'full_width' ); ?>"><?php _e( 'Full Width:','qode'); ?></label>
            <select id="<?php echo $this->get_field_id( 'full_width' ); ?>" name="<?php echo $this->get_field_name( 'full_width' ); ?>">
                <option value="yes" <?php if(esc_attr($full_width) == "yes"){echo 'selected="selected"';} ?>><?php _e('Yes', 'qode') ?></option>
                <option value="no" <?php if(esc_attr($full_width) == "no"){echo 'selected="selected"';} ?>><?php _e('No', 'qode') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'content_in_grid' ); ?>"><?php _e( 'Content In Grid:','qode'); ?></label>
            <select id="<?php echo $this->get_field_id( 'content_in_grid' ); ?>" name="<?php echo $this->get_field_name( 'content_in_grid' ); ?>">
                <option value="yes" <?php if(esc_attr($content_in_grid) == "yes"){echo 'selected="selected"';} ?>><?php _e('Yes', 'qode') ?></option>
                <option value="no" <?php if(esc_attr($content_in_grid) == "no"){echo 'selected="selected"';} ?>><?php _e('No', 'qode') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:','qode'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" cols="5" rows="5"><?php echo esc_attr( $text ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'text_color' ); ?>"><?php _e( 'Text Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" type="text" value="<?php echo esc_attr( $text_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'text_size' ); ?>"><?php _e( 'Text Size:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_size' ); ?>" name="<?php echo $this->get_field_name( 'text_size' ); ?>" type="text" value="<?php echo esc_attr( $text_size ); ?>" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text_letter_spacing' ); ?>"><?php _e( 'Text Letter Spacing:','qode' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'text_letter_spacing' ); ?>" name="<?php echo $this->get_field_name( 'text_letter_spacing' ); ?>" type="text" value="<?php echo esc_attr( $text_letter_spacing ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text_font_weight' ); ?>"><?php _e( 'Text Font Weight:','qode'); ?></label>
			<select id="<?php echo $this->get_field_id( 'text_font_weight' ); ?>" name="<?php echo $this->get_field_name( 'text_font_weight' ); ?>">
				<?php foreach($font_weight_array as $font_weight_val => $font_weight_label) { ?>
					<option value="<?php echo $font_weight_val; ?>" <?php if(esc_attr($text_font_weight) == $font_weight_val){echo 'selected="selected"';} ?>><?php echo $font_weight_label; ?></option>
				<?php } ?>
			</select>
		</p>

        <p>
            <label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Type:','qode'); ?></label>
            <select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>">
                <option value="normal" <?php if(esc_attr($type) == "normal"){echo 'selected="selected"';} ?>><?php _e('Normal', 'qode') ?></option>
                <option value="with_icon" <?php if(esc_attr($type) == "with_icon"){echo 'selected="selected"';} ?>><?php _e('With Icon', 'qode') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" value="<?php echo esc_attr( $background_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'border_color' ); ?>"><?php _e( 'Border Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name( 'border_color' ); ?>" type="text" value="<?php echo esc_attr( $border_color ); ?>" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'padding_top' ); ?>"><?php _e( 'Padding Top (px):','qode' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'padding_top' ); ?>" name="<?php echo $this->get_field_name( 'padding_top' ); ?>" type="text" value="<?php echo esc_attr( $padding_top ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'padding_bottom' ); ?>"><?php _e( 'Padding Bottom (px):','qode' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'padding_bottom' ); ?>" name="<?php echo $this->get_field_name( 'padding_bottom' ); ?>" type="text" value="<?php echo esc_attr( $padding_bottom ); ?>" />
		</p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_button' ); ?>"><?php _e( 'Show Button:','qode'); ?></label>
            <select id="<?php echo $this->get_field_id( 'show_button' ); ?>" name="<?php echo $this->get_field_name( 'show_button' ); ?>">
                <option value="yes" <?php if(esc_attr($show_button) == "yes"){echo 'selected="selected"';} ?>><?php _e('Yes', 'qode') ?></option>
                <option value="no" <?php if(esc_attr($show_button) == "no"){echo 'selected="selected"';} ?>><?php _e('No', 'qode') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button Link:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_target' ); ?>"><?php _e( 'Button Target:','qode' ); ?></label>
            <select id="<?php echo $this->get_field_id( 'button_target' ); ?>" name="<?php echo $this->get_field_name( 'button_target' ); ?>">
                <option value="_blank" <?php if(esc_attr($button_target) == "_blank"){echo 'selected="selected"';} ?>>Blank</option>
                <option value="_self" <?php if(esc_attr($button_target) == "_self"){echo 'selected="selected"';} ?>>Self</option>
                <option value="_top" <?php if(esc_attr($button_target) == "_top"){echo 'selected="selected"';} ?>>Top</option>
                <option value="_parent" <?php if(esc_attr($button_target) == "_parent"){echo 'selected="selected"';} ?>>Parent</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_text_color' ); ?>"><?php _e( 'Button Text Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_text_color' ); ?>" name="<?php echo $this->get_field_name( 'button_text_color' ); ?>" type="text" value="<?php echo esc_attr( $button_text_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_hover_text_color' ); ?>"><?php _e( 'Button Hover Text Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_hover_text_color' ); ?>" name="<?php echo $this->get_field_name( 'button_hover_text_color' ); ?>" type="text" value="<?php echo esc_attr( $button_hover_text_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_background_color' ); ?>"><?php _e( 'Button Background Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_background_color' ); ?>" name="<?php echo $this->get_field_name( 'button_background_color' ); ?>" type="text" value="<?php echo esc_attr( $button_background_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_hover_background_color' ); ?>"><?php _e( 'Button Hover Background Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_hover_background_color' ); ?>" name="<?php echo $this->get_field_name( 'button_hover_background_color' ); ?>" type="text" value="<?php echo esc_attr( $button_hover_background_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_border_color' ); ?>"><?php _e( 'Button Border Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_border_color' ); ?>" name="<?php echo $this->get_field_name( 'button_border_color' ); ?>" type="text" value="<?php echo esc_attr( $button_border_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'button_hover_border_color' ); ?>"><?php _e( 'Button Hover Border Color:','qode' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_hover_border_color' ); ?>" name="<?php echo $this->get_field_name( 'button_hover_border_color' ); ?>" type="text" value="<?php echo esc_attr( $button_hover_border_color ); ?>" />
        </p>
        
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
        $instance = array();

		$instance['type']                                    = $new_instance['type'];
		$instance['full_width']                              = $new_instance['full_width'];
        $instance['content_in_grid']                         = $new_instance['content_in_grid'];
        $instance['text']                                    = strip_tags($new_instance['text']);
        $instance['text_color']                              = $new_instance['text_color'];
        $instance['text_size']                               = $new_instance['text_size'];
        $instance['text_letter_spacing']                    = $new_instance['text_letter_spacing'];
        $instance['text_font_weight']                        = $new_instance['text_font_weight'];
        $instance['background_color']                        = $new_instance['background_color'];
        $instance['border_color']                        	 = $new_instance['border_color'];
        $instance['padding_top']                        	 = $new_instance['padding_top'];
        $instance['padding_bottom']                        	 = $new_instance['padding_bottom'];
        $instance['show_button']                             = $new_instance['show_button'];
        $instance['button_text']                             = $new_instance['button_text'];
        $instance['button_link']                             = $new_instance['button_link'];
        $instance['button_target']                           = $new_instance['button_target'];
        $instance['button_text_color']                       = $new_instance['button_text_color'];
        $instance['button_hover_text_color']                 = $new_instance['button_hover_text_color'];
        $instance['button_background_color']                 = $new_instance['button_background_color'];
        $instance['button_hover_background_color']           = $new_instance['button_hover_background_color'];
        $instance['button_border_color']                     = $new_instance['button_border_color'];
        $instance['button_hover_border_color']               = $new_instance['button_hover_border_color'];

		return $instance;
	}
}

function qode_call_to_action_load(){   
	register_widget('Call_To_Action');
}

add_action('widgets_init', 'qode_call_to_action_load');
