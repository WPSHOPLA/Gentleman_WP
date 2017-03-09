<?php

function qode_flickr_load_widgets()

{

	register_widget('Qode_Flickr_Widget');

}



class Qode_Flickr_Widget extends WP_Widget {

	function __construct() {
		
		parent::__construct('qode-flickr-widget', 'Qode Flickr Widget', array('classname' => 'flickr', 'description' => 'Qode Flickr Widget for user photo stream!'), array('id_base' => 'qode-flickr-widget'));

		}

	function widget($args, $instance)

	{

		extract($args);

		$title = apply_filters('widget_title', $instance['title']);

		$user_name = $instance['user_name'];

		$number = $instance['number'];

		$under_text=$instance['under_text'];

		$img_widht=$instance['img_widht'];

		$img_height=$instance['img_height'];

		echo $before_widget;

		if($title!='') {

			echo $before_title.$title.$after_title;


		}

		if($user_name && $number) {

			$api_key = '04f2ebdf1f13890b64cb9c96d4108baf';

			

			@$userid = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.people.findByUsername&api_key='.$api_key.'&username='.urlencode($user_name).'&format=json');



			@$userid = trim($userid['body'], 'jsonFlickrApi()');

			@$userid = json_decode($userid);

			

			if($userid->user->id!='') {

				$url_item = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.urls.getUserPhotos&api_key='.$api_key.'&user_id='.$userid->user->id.'&format=json');

				$url_item = trim($url_item['body'], 'jsonFlickrApi()');

				$url_item = json_decode($url_item);

				

				$photos = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key='.$api_key.'&user_id='.$userid->user->id.'&per_page='.$number.'&format=json');

				$photos = trim($photos['body'], 'jsonFlickrApi()');

				$photos = json_decode($photos);

				?>

				<ul class='flickr_widget'>

					<?php foreach($photos->photos->photo as $photo): $photo = (array) $photo; ?>

					<li class='flickr_single_photo'>

						<a itemprop="url" href='<?php echo $url_item->user->url; ?><?php echo $photo['id']; ?>' target='_blank' title="<?php echo $photo['title']; ?>">

							<img itemprop="image" src='<?php $url = "http://farm" . $photo['farm'] . ".static.flickr.com/" . $photo['server'] . "/" . $photo['id'] . "_" . $photo['secret'] . '_s' . ".jpg"; echo $url; ?>' alt='<?php echo $photo['title']; ?>' width="<?php echo $img_widht; ?>" height="<?php echo $img_height; ?>" />

						</a>

					</li>

					<?php endforeach; ?>

				</ul>

				<?php

			} else {

				echo '<p>Invalid flickr username.</p>';

			}

		}

		if($under_text!=''){

			echo '<div class="widget_description"><p>' .$instance['under_text'] . '</p></div>';
		}

		echo $after_widget;

	}

	function form($instance)

	{

		$defaults = array('title' => 'Flickr Stream', 'user_name' => '', 'number' => 6,'under_text'=>'','img_widht'=>60,'img_height'=>60);

		$instance = wp_parse_args((array) $instance, $defaults); ?>	

		<p>

			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>

			<input style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('user_name'); ?>">Username:</label>

			<input style="width: 216px;" id="<?php echo $this->get_field_id('user_name'); ?>" name="<?php echo $this->get_field_name('user_name'); ?>" value="<?php echo $instance['user_name']; ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('number'); ?>">Number of photos to show:</label>

			<input style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('under_text'); ?>">Type text under widget(Optional):</label>

			<textarea style="resize:none; width:216px; height:50px;" id="<?php echo $this->get_field_id('under_text'); ?>" name="<?php echo $this->get_field_name('under_text'); ?>"><?php echo $instance['under_text']; ?></textarea>

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('img_widht'); ?>">Image width:</label>

			<input style="width: 30px;" id="<?php echo $this->get_field_id('img_widht'); ?>" name="<?php echo $this->get_field_name('img_widht'); ?>" value="<?php echo $instance['img_widht']; ?>" />

		</p>

		<p>

			<label for="<?php echo $this->get_field_id('img_height'); ?>">Image Height:</label>

			<input style="width: 30px;" id="<?php echo $this->get_field_id('img_height'); ?>" name="<?php echo $this->get_field_name('img_height'); ?>" value="<?php echo $instance['img_height']; ?>" />

		</p>		

	<?php

	}

	function update($new_instance, $old_instance)

	{

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['user_name'] = $new_instance['user_name'];

		$instance['number'] = $new_instance['number'];

		$instance['under_text'] = $new_instance['under_text'];	

		$instance['img_widht'] = $new_instance['img_widht'];

		$instance['img_height'] = $new_instance['img_height'];

		return $instance;

	}

}

add_action('widgets_init', 'qode_flickr_load_widgets');

?>