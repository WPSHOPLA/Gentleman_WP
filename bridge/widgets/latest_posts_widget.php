<?php

class Qode_Latest_Posts extends QodeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'qode_latest_posts', // Base ID
			'Qode Latest Post', // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'qode' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'title',
				'type' => 'textfield',
				'title' => 'Title'
			),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => 'Number of posts'
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => 'Order By',
				'options' => array(
					'title' => 'Title',
					'date' => 'Date'
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => 'Order',
				'options' => array(
					'ASC' => 'ASC',
					'DESC' => 'DESC'
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => 'Category Slug'
			),
//			array(
//				'name' => 'text_length',
//				'type' => 'textfield',
//				'title' => 'Number of characters'
//			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => 'Title Tag',
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'image_in_box';

		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h5';
		}
		$params['text_length'] = '0';
		$params['display_category'] = '0';
		$params['display_time'] = '1';
		$params['display_comments'] = '0';
		$params['display_like'] = '0';
		$params['display_share'] = '0';

		echo '<div class="widget qode_latest_posts_widget">';
		if($params['title'] != '') {
			print $args['before_title'] . $params['title'] . $args['after_title'];
		}
		echo qode_execute_shortcode('latest_post', $params);

		echo '</div>'; //close qode_latest_posts_widget
	}
}
