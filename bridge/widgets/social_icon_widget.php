<?php

class Qode_Social_Icon extends WP_Widget {
    public function __construct() {
		parent::__construct(
	 		'qode_social_icon_widget', // Base ID
			'Qode Social Icon', // Name
			array( 'description' => esc_html__( 'Qode Social Icon Widget', 'qode' ), ) // Args
		);
	}
    
    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $params         = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        $params .= " use_custom_size='yes' ";

        //finally call the shortcode
        echo do_shortcode("[social_icons $params]");
	}

 	public function form($instance) {

        //set widget values
        $type                   = isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : 'normal_social';
        $icon_pack              = isset( $instance['icon_pack'] ) ? esc_attr( $instance['icon_pack'] ) : 'font_awesome';
        $icon                   = isset( $instance['icon'] ) ? esc_attr( $instance['icon'] ) : '';
        $fe_icon                = isset( $instance['fe_icon'] ) ? esc_attr( $instance['fe_icon'] ) : '';
        $custom_size            = isset( $instance['custom_size'] ) ? esc_attr( $instance['custom_size'] ) : '';
        $custom_shape_size      = isset( $instance['custom_shape_size'] ) ? esc_attr( $instance['custom_shape_size'] ) : '';
        $link                   = isset( $instance['link'] ) ? esc_attr( $instance['link'] ) : '';
        $target                 = isset( $instance['target'] ) ? esc_attr( $instance['target'] ) : '_self';
        $icon_color             = isset( $instance['icon_color'] ) ? esc_attr( $instance['icon_color'] ) : '';
        $icon_hover_color       = isset( $instance['icon_hover_color'] ) ? esc_attr( $instance['icon_hover_color'] ) : '';
        $background_color       = isset( $instance['background_color'] ) ? esc_attr( $instance['background_color'] ) : '';
        $background_hover_color = isset( $instance['background_hover_color'] ) ? esc_attr( $instance['background_hover_color'] ) : '';
        $border_width           = isset( $instance['border_width'] ) ? esc_attr( $instance['border_width'] ) : '';
        $border_radius          = isset( $instance['border_radius'] ) ? esc_attr( $instance['border_radius'] ) : '';
        $border_color           = isset( $instance['border_color'] ) ? esc_attr( $instance['border_color'] ) : '';
        $border_hover_color     = isset( $instance['border_hover_color'] ) ? esc_attr( $instance['border_hover_color'] ) : '';
        $icon_margin            = isset( $instance['icon_margin'] ) ? esc_attr( $instance['icon_margin'] ) : '';

        $fa_icons_array = array(
            ""                      => "",
            'fa-500px'              =>  '500px',
            "fa-adn"                => "ADN",
            'fa-amazon'             => 'Amazon',
            "fa-android"            => "Android",
            "fa-apple"              => "Apple",
            "fa-behance"            => "Behance",
            "fa-behance-square"     => "Behance Square",
            "fa-bitbucket"          => "Bitbucket",
            "fa-bitbucket-sign"     => "Bitbucket-Sign",
            "fa-bitcoin"            => "Bitcoin",
            "fa-btc"                => "BTC",
            "fa-css3"               => "CSS3",
            "fa-dribbble"           => "Dribbble",
            "fa-dropbox"            => "Dropbox",
            "fa-facebook"           => "Facebook",
            "fa-facebook-sign"      => "Facebook-Sign",
            "fa-flickr"             => "Flickr",
            "fa-foursquare"         => "Foursquare",
            "fa-github"             => "GitHub",
            "fa-github-alt"         => "GitHub-Alt",
            "fa-github-sign"        => "GitHub-Sign",
            "fa-gittip"             => "Gittip",
            "fa-google-plus"        => "Google Plus",
            "fa-google-plus-sign"   => "Google Plus-Sign",
            "fa-html5"              => "HTML5",
            "fa-instagram"          => "Instagram",
            "fa-linkedin"           => "LinkedIn",
            "fa-linkedin-sign"      => "LinkedIn-Sign",
            "fa-linux"              => "Linux",
            "fa-envelope"           => "Mail",
            "fa-envelope-o"         => "Mail Alt",
            "fa-envelope-square"    => "Mail Square",
            "fa-maxcdn"             => "MaxCDN",
            "fa-paypal"             => "Paypal",
            "fa-pinterest"          => "Pinterest",
            "fa-pinterest-sign"     => "Pinterest-Sign",
            "fa-renren"             => "Renren",
            "fa-skype"              => "Skype",
            "fa-stackexchange"      => "StackExchange",
            'fa-tripadvisor'        => 'Trip Advisor',
            "fa-trello"             => "Trello",
            "fa-tumblr"             => "Tumblr",
            "fa-tumblr-sign"        => "Tumblr-Sign",
            "fa-twitter"            => "Twitter",
            "fa-twitter-sign"       => "Twitter-Sign",
            'fa-vimeo'              => 'Vimeo',
            'fa-vimeo-square'       => 'Vimeo Square',
            'fa-vine'               => 'Vine',
            "fa-vk"                 => "VK",
            "fa-weibo"              => "Weibo",
            'fa-wikipedia-w'        => 'Wikipedia',
            "fa-windows"            => "Windows",
            'fa-wordpress'          => 'Wordpress',
            "fa-xing"               => "Xing",
            "fa-xing-sign"          => "Xing-Sign",
            "fa-youtube"            => "YouTube",
            "fa-youtube-play"       => "YouTube Play",
            "fa-youtube-sign"       => "YouTube-Sign"
        );

        $fe_icons_array = array(
            "" => "",
            "social_blogger" => "Blogger",
            "social_blogger_circle" => "Blogger circle",
            "social_blogger_square" => "Blogger square",
            "social_delicious" => "Delicious",
            "social_delicious_circle" => "Delicious circle",
            "social_delicious_square" => "Delicious square",
            "social_deviantart" => "Deviantart",
            "social_deviantart_circle" => "Deviantart circle",
            "social_deviantart_square" => "Deviantart square",
            "social_dribbble" => "Dribbble",
            "social_dribbble_circle" => "Dribbble circle",
            "social_dribbble_square" => "Dribbble square",
            "social_facebook" => "Facebook",
            "social_facebook_circle" => "Facebook circle",
            "social_facebook_square" => "Facebook square",
            "social_flickr" => "Flickr",
            "social_flickr_circle" => "Flickr circle",
            "social_flickr_square" => "Flickr square",
            "social_googledrive" => "Googledrive",
            "social_googledrive_alt2" => "Googledrive alt2",
            "social_googledrive_square" => "Googledrive square",
            "social_googleplus" => "Googleplus",
            "social_googleplus_circle" => "Googleplus circle",
            "social_googleplus_square" => "Googleplus square",
            "social_instagram" => "Instagram",
            "social_instagram_circle" => "Instagram circle",
            "social_instagram_square" => "Instagram square",
            "social_linkedin" => "Linkedin",
            "social_linkedin_circle" => "Linkedin circle",
            "social_linkedin_square" => "Linkedin square",
            "social_myspace" => "Myspace",
            "social_myspace_circle" => "myspace circle",
            "social_myspace_square" => "myspace square",
            "social_picassa" => "Picassa",
            "social_picassa_circle" => "Picassa circle",
            "social_picassa_square" => "Picassa square",
            "social_pinterest" => "Pinterest",
            "social_pinterest_circle" => "Pinterest circle",
            "social_pinterest_square" => "Pinterest square",
            "social_rss" => "Rss",
            "social_rss_circle" => "Rss circle",
            "social_rss_square" => "Rss square",
            "social_share" => "Share",
            "social_share_circle" => "Share circle",
            "social_share_square" => "Share square",
            "social_skype" => "Skype",
            "social_skype_circle" => "Skype circle",
            "social_skype_square" => "Skype square",
            "social_spotify" => "Spotify",
            "social_spotify_circle" => "Spotify circle",
            "social_spotify_square" => "Spotify square",
            "social_stumbleupon_circle" => "Stumbleupon circle",
            "social_stumbleupon_square" => "Stumbleupon square",
            "social_tumbleupon" => "Stumbleupon",
            "social_tumblr" => "Tumblr",
            "social_tumblr_circle" => "Tumblr circle",
            "social_tumblr_square" => "Tumblr square",
            "social_twitter" => "Twitter",
            "social_twitter_circle" => "Twitter circle",
            "social_twitter_square" => "Twitter square",
            "social_vimeo" => "Vimeo",
            "social_vimeo_circle" => "Vimeo circle",
            "social_vimeo_square" => "Vimeo square",
            "social_wordpress" => "Wordpress",
            "social_wordpress_circle" => "Wordpress circle",
            "social_wordpress_square" => "Wordpress square",
            "social_youtube" => "Youtube",
            "social_youtube_circle" => "Youtube circle",
            "social_youtube_square" => "Youtube square"
        );
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'type' ); ?>">Type</label>
            <select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>">
                <option value="normal_social" <?php if(esc_attr($type) == "normal_social"){echo 'selected="selected"';} ?>>Normal</option>
                <option value="circle_social" <?php if(esc_attr($type) == "circle_social"){echo 'selected="selected"';} ?>>Circle</option>
                <option value="square_social" <?php if(esc_attr($type) == "square_social"){echo 'selected="selected"';} ?>>Square</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'icon_pack' ); ?>">Icon Pack</label>
            <select id="<?php echo $this->get_field_id( 'icon_pack' ); ?>" name="<?php echo $this->get_field_name( 'icon_pack' ); ?>">
                <option value="font_awesome" <?php if(esc_attr($icon_pack) == "font_awesome"){echo 'selected="selected"';} ?>>Font Awesome</option>
                <option value="font_elegant" <?php if(esc_attr($icon_pack) == "font_elegant"){echo 'selected="selected"';} ?>>Font Elegant</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'icon' ); ?>">Font Awesome Icon</label>
            <select id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
                <?php foreach ($fa_icons_array as $key => $value) { ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php if(esc_attr($icon) == esc_attr($key)){echo 'selected="selected"';} ?>><?php echo esc_attr($value); ?></option>
                <?php } ?>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'fe_icon' ); ?>">Font Elegant Icon</label>
            <select id="<?php echo $this->get_field_id( 'fe_icon' ); ?>" name="<?php echo $this->get_field_name( 'fe_icon' ); ?>">
                <?php foreach ($fe_icons_array as $key => $value) { ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php if(esc_attr($fe_icon) == esc_attr($key)){echo 'selected="selected"';} ?>><?php echo esc_attr($value); ?></option>
                <?php } ?>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('custom_size'); ?>">Custom Size (px)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('custom_size'); ?>" name="<?php echo $this->get_field_name('custom_size'); ?>" type="text" value="<?php echo esc_attr($custom_size); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('custom_shape_size'); ?>">Custom Shape Size (px) - (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('custom_shape_size'); ?>" name="<?php echo $this->get_field_name('custom_shape_size'); ?>" type="text" value="<?php echo esc_attr($custom_shape_size); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">Link</label>
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'target' ); ?>">Target</label>
            <select id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>">
                <option value="_self" <?php if(esc_attr($target) == "_self"){echo 'selected="selected"';} ?>>Same Window</option>
                <option value="_blank" <?php if(esc_attr($target) == "_blank"){echo 'selected="selected"';} ?>>New Window</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('icon_color'); ?>">Color</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_color'); ?>" name="<?php echo $this->get_field_name('icon_color'); ?>" type="text" value="<?php echo esc_attr($icon_color); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('icon_hover_color'); ?>">Hover Color</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_hover_color'); ?>" name="<?php echo $this->get_field_name('icon_hover_color'); ?>" type="text" value="<?php echo esc_attr($icon_hover_color); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('background_color'); ?>">Background Color (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('background_color'); ?>" name="<?php echo $this->get_field_name('background_color'); ?>" type="text" value="<?php echo esc_attr($background_color); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('background_hover_color'); ?>">Background Hover Color (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('background_hover_color'); ?>" name="<?php echo $this->get_field_name('background_hover_color'); ?>" type="text" value="<?php echo esc_attr($background_hover_color); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('border_width'); ?>">Border Width (px) - (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('border_width'); ?>" name="<?php echo $this->get_field_name('border_width'); ?>" type="text" value="<?php echo esc_attr($border_width); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('border_radius'); ?>">Border Radius (px) - (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('border_radius'); ?>" name="<?php echo $this->get_field_name('border_radius'); ?>" type="text" value="<?php echo esc_attr($border_radius); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('border_color'); ?>">Border Color (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" type="text" value="<?php echo esc_attr($border_color); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('border_hover_color'); ?>">Border Hover Color (Only For Circle and Square Type)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('border_hover_color'); ?>" name="<?php echo $this->get_field_name('border_hover_color'); ?>" type="text" value="<?php echo esc_attr($border_hover_color); ?>" />
        </p>
                                  
        <p>
            <label for="<?php echo $this->get_field_id('icon_margin'); ?>">Margin (top right bottom left)</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_margin'); ?>" name="<?php echo $this->get_field_name('icon_margin'); ?>" type="text" value="<?php echo esc_attr($icon_margin); ?>" />
        </p>

		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
        $instance = array();

        $instance['type']                   = $new_instance['type'];
        $instance['icon_pack']              = $new_instance['icon_pack'];
        $instance['icon']                   = $new_instance['icon'];
        $instance['fe_icon']                = $new_instance['fe_icon'];
		$instance['custom_size']            = $new_instance['custom_size'];
        $instance['custom_shape_size']      = $new_instance['custom_shape_size'];
        $instance['link']                   = $new_instance['link'];
        $instance['target']                 = $new_instance['target'];
        $instance['icon_color']             = $new_instance['icon_color'];
        $instance['icon_hover_color']       = $new_instance['icon_hover_color'];
        $instance['background_color']       = $new_instance['background_color'];
        $instance['background_hover_color'] = $new_instance['background_hover_color'];
        $instance['border_width']           = $new_instance['border_width'];
        $instance['border_radius']          = $new_instance['border_radius'];
        $instance['border_color']           = $new_instance['border_color'];
        $instance['border_hover_color']     = $new_instance['border_hover_color'];
        $instance['icon_margin']            = $new_instance['icon_margin'];

		return $instance;
	}
}

function qode_social_icon_widget_load(){   
	register_widget('Qode_Social_Icon');
}

add_action('widgets_init', 'qode_social_icon_widget_load');