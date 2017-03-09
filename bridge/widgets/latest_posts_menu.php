<?php
class Latest_Posts_Menu extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'latest_posts_menu', // Base ID
			'Menu Latest Posts', // Name
			array( 'description' => __( 'Menu Latest Posts', 'qode' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('','qode') : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 10; 
		if ( empty( $instance['category'] ) || ! $category = absint( $instance['category'] ) )
 			$category = ''; 
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; ?>

		
		<?php
				global $qode_options_proya;
				$blog_hide_comments = "";
				if (isset($qode_options_proya['blog_hide_comments'])) {
					$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
				}
				$args = array(
					'order'=>'DESC', 
					'orderby'=>'date',
					'cat'=> $category,
					'posts_per_page'=>$number // Number of related posts to display.
				);
 				$related_query = new WP_Query($args);
				if ($related_query->have_posts()) {
			?>
			
			<div class="flexslider widget_flexslider">
				<ul class="slides">
            <?php
            while ($related_query->have_posts()) : $related_query->the_post();
            ?>
				<li>
					<a itemprop="url" href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail(get_the_id(),'menu-featured-post'); ?></a>
					<h3 itemprop="name"><a itemprop="url" href="<?php the_permalink() ?>" ><?php the_title();?> </a></h3>
					<span class="menu_recent_post_text">
						<?php _e('Posted in','qode'); ?> <?php the_category(', '); ?>
						<?php _e(' by','qode'); ?> <a itemprop="url" class="post_author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
					</span>
				</li>
            <?php
            endwhile;
            ?>
				</ul>
			</div>
        
 
<?php }
    wp_reset_query(); 

?>
	<?php	echo $after_widget;
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['category'] = (int) $new_instance['category']; 
		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$category    = isset( $instance['category'] ) ? absint( $instance['category'] ) : ''; 
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','qode'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Number of posts:','qode' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Category:','qode' ); ?></label> 
		<select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
		<option value="">All</option>
		<?php $categories = get_categories();
			foreach ( $categories as $cat ) { ?>
				<option value="<?php echo $cat->cat_ID ?>" <?php if(esc_attr($category) == $cat->cat_ID){echo 'selected="selected"';} ?>><?php echo $cat->name ?></option>
		<?php } ?>
		</select>
		</p>
		<?php 
	}

} 
add_action( 'widgets_init', create_function( '', 'register_widget( "Latest_Posts_Menu" );' ) );
?>