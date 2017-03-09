<?php

add_action('init', 'create_post_type',0);

/* Create Portfolio, Testimonial, Slider and Carousel post type */
if (!function_exists('create_post_type')) {
	function create_post_type() {
		global $qode_options_proya;
		$slug = 'portfolio_page';
		if(isset($qode_options_proya['portfolio_single_slug'])) {
			if($qode_options_proya['portfolio_single_slug'] != ""){
				$slug = $qode_options_proya['portfolio_single_slug'];
			}
		}
		register_post_type( 'portfolio_page',
			array(
				'labels' => array(
					'name' => __( 'Portfolio','qode' ),
					'singular_name' => __( 'Portfolio Item','qode' ),
					'add_item' => __('New Portfolio Item','qode'),
					'add_new_item' => __('Add New Portfolio Item','qode'),
					'edit_item' => __('Edit Portfolio Item','qode')
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => $slug),
				'menu_position' => 4,
				'show_ui' => true,
		        'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments')
			)
		);

		register_post_type('testimonials',
			array(
				'labels' 		=> array(
				'name' 				=> __('Testimonials','qode' ),
				'singular_name' 	=> __('Testimonial','qode' ),
				'add_item'			=> __('New Testimonial','qode'),
				'add_new_item' 		=> __('Add New Testimonial','qode'),
				'edit_item' 		=> __('Edit Testimonial','qode')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true, 
				'rewrite' 		=> 	array('slug' => 'testimonials'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false, 
				'hierarchical'	=>	false,
		  'supports'		=>	array('title', 'thumbnail')
			)
		);
		
		register_post_type('slides',
			array(
				'labels' 		=> array(
				'name' 				=> __('Qode Slider','qode' ),
				'menu_name'	=> __('Qode Slider','qode' ),
				'all_items'	=> __('Slides','qode' ),
				'add_new' =>  __('Add New Slide','qode'),
				'singular_name' 	=> __('Slide','qode' ),
				'add_item'			=> __('New Slide','qode'),
				'add_new_item' 		=> __('Add New Slide','qode'),
				'edit_item' 		=> __('Edit Slide','qode')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true, 
				'rewrite' 		=> 	array('slug' => 'slides'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false, 
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'page-attributes'),
				'menu_icon'  =>  QODE_ROOT.'/img/favicon.ico'
			)
		);

	  register_post_type('carousels',
			array(
				'labels'    => array(
				'name'        => __('Qode Carousel','qode' ),
				'menu_name' => __('Qode Carousel','qode' ),
				'all_items' => __('Carousel Items','qode' ),
				'add_new' =>  __('Add New Carousel Item','qode'),
				'singular_name'   => __('Carousel Item','qode' ),
				'add_item'      => __('New Carousel Item','qode'),
				'add_new_item'    => __('Add New Carousel Item','qode'),
				'edit_item'     => __('Edit Carousel Item','qode')
				),
				'public'    =>  false,
				'show_in_menu'  =>  true, 
				'rewrite'     =>  array('slug' => 'carousels'),
				'menu_position' =>  4,
				'show_ui'   =>  true,
				'has_archive' =>  false, 
				'hierarchical'  =>  false,
				'supports'    =>  array('title','page-attributes'),
				'menu_icon'  =>  QODE_ROOT.'/img/favicon.ico'
			)
	  );

		register_post_type('masonry_gallery',
			array(
				'labels' 		=> array(
				'name' 				=> __('Masonry Gallery','qode' ),
				'all_items'			=> __('Masonry Gallery Items','qode'),
				'singular_name' 	=> __('Masonry Gallery Item','qode' ),
				'add_item'			=> __('New Masonry Gallery Item','qode'),
				'add_new_item' 		=> __('Add New Masonry Gallery Item','qode'),
				'edit_item' 		=> __('Edit Masonry Gallery Item','qode')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true,
				'rewrite' 		=> 	array('slug' => 'masonry_gallery'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false,
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'thumbnail')
			)
		);
		
	/* Create Portfolio Categories */

	  $labels = array(
			'name' => __( 'Portfolio Categories', 'qode' ),
			'singular_name' => __( 'Portfolio Category', 'qode' ),
			'search_items' =>  __( 'Search Portfolio Categories','qode' ),
			'all_items' => __( 'All Portfolio Categories','qode' ),
			'parent_item' => __( 'Parent Portfolio Category','qode' ),
			'parent_item_colon' => __( 'Parent Portfolio Category:','qode' ),
			'edit_item' => __( 'Edit Portfolio Category','qode' ), 
			'update_item' => __( 'Update Portfolio Category','qode' ),
			'add_new_item' => __( 'Add New Portfolio Category','qode' ),
			'new_item_name' => __( 'New Portfolio Category Name','qode' ),
			'menu_name' => __( 'Portfolio Categories','qode' ),
	  );     

	  register_taxonomy('portfolio_category',array('portfolio_page'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-category' ),
            'show_admin_column' => true
	  ));

	/* Create Portfolio Tags */

		$labels = array(
			'name' => __( 'Portfolio Tags', 'qode' ),
			'singular_name' => __( 'Portfolio Tag', 'qode' ),
			'search_items' =>  __( 'Search Portfolio Tags','qode' ),
			'all_items' => __( 'All Portfolio Tags','qode' ),
			'parent_item' => __( 'Parent Portfolio Tag','qode' ),
			'parent_item_colon' => __( 'Parent Portfolio Tags:','qode' ),
			'edit_item' => __( 'Edit Portfolio Tag','qode' ),
			'update_item' => __( 'Update Portfolio Tag','qode' ),
			'add_new_item' => __( 'Add New Portfolio Tag','qode' ),
			'new_item_name' => __( 'New Portfolio Tag Name','qode' ),
			'menu_name' => __( 'Portfolio Tags','qode' ),
		);

		register_taxonomy('portfolio_tag',array('portfolio_page'), array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-tag' ),
		));

	/* Create Testimonials Category */

	  $labels = array(
			'name' => __( 'Testimonials Categories', 'qode' ),
			'singular_name' => __( 'Testimonial Category', 'qode' ),
			'search_items' =>  __( 'Search Testimonials Categories','qode' ),
			'all_items' => __( 'All Testimonials Categories','qode' ),
			'parent_item' => __( 'Parent Testimonial Category','qode' ),
			'parent_item_colon' => __( 'Parent Testimonial Category:','qode' ),
			'edit_item' => __( 'Edit Testimonials Category','qode' ), 
			'update_item' => __( 'Update Testimonials Category','qode' ),
			'add_new_item' => __( 'Add New Testimonials Category','qode' ),
			'new_item_name' => __( 'New Testimonials Category Name','qode' ),
			'menu_name' => __( 'Testimonials Categories','qode' ),
	  );     

	  register_taxonomy('testimonials_category',array('testimonials'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'testimonials-category' ),
	  ));



	/* Create Slider Category */

	  $labels = array(
			'name' => __( 'Sliders', 'qode' ),
			'singular_name' => __( 'Slider', 'qode' ),
			'search_items' =>  __( 'Search Sliders','qode' ),
			'all_items' => __( 'All Sliders','qode' ),
			'parent_item' => __( 'Parent Slider','qode' ),
			'parent_item_colon' => __( 'Parent Slider:','qode' ),
			'edit_item' => __( 'Edit Slider','qode' ), 
			'update_item' => __( 'Update Slider','qode' ),
			'add_new_item' => __( 'Add New Slider','qode' ),
			'new_item_name' => __( 'New Slider Name','qode' ),
			'menu_name' => __( 'Sliders','qode' ),
	  );     

	  register_taxonomy('slides_category',array('slides'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'slides-category' ),
	  ));

	/* Create Carousel Category */

	  $labels = array(
			'name' => __( 'Carousels', 'qode' ),
			'singular_name' => __( 'Carousel', 'qode' ),
			'search_items' =>  __( 'Search Carousels','qode' ),
			'all_items' => __( 'All Carousels','qode' ),
			'parent_item' => __( 'Parent Carousel','qode' ),
			'parent_item_colon' => __( 'Parent Carousel:','qode' ),
			'edit_item' => __( 'Edit Carousel','qode' ), 
			'update_item' => __( 'Update Carousel','qode' ),
			'add_new_item' => __( 'Add New Carousel','qode' ),
			'new_item_name' => __( 'New Carousel Name','qode' ),
			'menu_name' => __( 'Carousels','qode' ),
	  );     

	  register_taxonomy('carousels_category',array('carousels'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'carousels-category' ),
	  ));


		$labels = array(
			'name' => __( 'Masonry Gallery Categories', 'taxonomy general name' ),
			'singular_name' => __( 'Masonry Gallery Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Masonry Gallery Categories','qode' ),
			'all_items' => __( 'All Masonry Gallery Categories','qode' ),
			'parent_item' => __( 'Parent Masonry Gallery Category','qode' ),
			'parent_item_colon' => __( 'Parent Masonry Gallery Category:','qode' ),
			'edit_item' => __( 'Edit Masonry Gallery Category','qode' ),
			'update_item' => __( 'Update Masonry Gallery Category','qode' ),
			'add_new_item' => __( 'Add New Masonry Gallery Category','qode' ),
			'new_item_name' => __( 'New Masonry Gallery Category Name','qode' ),
			'menu_name' => __( 'Masonry Gallery Categories','qode' ),
		);

		register_taxonomy('masonry_gallery_category', array('masonry_gallery'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'masonry-gallery-category' ),
		));

	}
}

?>