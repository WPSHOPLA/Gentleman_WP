<?php
class Qode_Sticky_Sidebar extends QodeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'qode_sticky_sidebar', // Base ID
			'Qode Sticky Sidebar', // Name
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'discussionwp' ), ) // Args
		);
		$this->setParams();
	}
	protected function setParams() {
		
	}
	public function widget( $args, $instance ) {
		echo '<div class="widget qode-widget-sticky-sidebar"></div>';
	}

}
