<?php

if ( ! function_exists('qode_get_related_post_type')) {
	/**
	 * Function for returning latest posts types
	 *
	 * @param $post_id
	 * @param array $options
	 * @return WP_Query
	 */
	function qode_get_related_post_type($post_id, $options = array()) {

		$post_type = get_post_type($post_id);
		//Get tags
		$tags = ($post_type == 'portfolio_page') ? wp_get_object_terms($post_id, 'portfolio_tag') : get_the_tags($post_id);
		//Get categories
		$categories = ($post_type == 'portfolio_page') ? wp_get_object_terms($post_id, 'portfolio_category') : get_the_category($post_id);

		$tag_ids = array();
		if ($tags) {
			foreach ($tags as $tag) {
				$tag_ids[] = $tag->term_id;
			}
		}

		$category_ids = array();
		if ($categories) {
			foreach ($categories as $category) {
				$category_ids[] = $category->term_id;
			}
		}

		$hasRelatedByTag = false;
		$hasRelatedByCategory = false;

		if ($tag_ids) {

			if ($post_type == 'portfolio_page') {
				$related_by_tag = qode_get_related_custom_post_type_by_param($post_id, $tag_ids, 'portfolio_tag', $options); //For Custom Posts
			} else {
				$related_by_tag = qode_get_related_posts($post_id, $tag_ids, 'tag', $options);
			}

			if (!empty($related_by_tag->posts)) {
				$hasRelatedByTag = true;
				return $related_by_tag;
			}
			$hasRelatedByTag = false;

		}
		if ($categories && !$hasRelatedByTag) {

			if ($post_type == 'portfolio_page') {
				$related_by_category = qode_get_related_custom_post_type_by_param($post_id, $category_ids, 'portfolio_category', $options);
			} else {
				$related_by_category = qode_get_related_posts($post_id, $category_ids, 'category', $options);
			}

			if (!empty($related_by_category->posts)) {
				$hasRelatedByCategory = true;
				return $related_by_category;
			}
			$hasRelatedByCategory = false;

		}

	}

}

if ( ! function_exists('qode_get_related_posts') ) {
	/**
	 * Function for related posts
	 *
	 * @param $post_id - Post ID
	 * @param $term_ids - Category or Tag IDs
	 * @param $slug - term slug for WP_Query
	 * @param array $options
	 * @return WP_Query
	 */
	function qode_get_related_posts($post_id, $term_ids, $slug, $options = array()) {

		//Query options
		$posts_per_page = -1;

		//Override query options
		extract($options);

		$args = array(
			'post__not_in'  => array($post_id),
			$slug . '__in'  => $term_ids,
			'order'         => 'DESC',
			'orderby'       => 'date',
			'posts_per_page'	=> $posts_per_page
		);

		$related_posts = new WP_Query($args);

		return $related_posts;

	}
}

if ( ! function_exists('qode_get_related_custom_post_type_by_param') ) {
	/**
	 * @param $post_id - Post ID
	 * @param $term_ids - Category or Tag IDs
	 * @param $taxonomy
	 * @param array $options
	 * @return WP_Query
	 */
	function qode_get_related_custom_post_type_by_param($post_id, $term_ids, $taxonomy, $options = array()) {

		//Query options
		$posts_per_page = -1;

		//Override query options
		extract($options);

		$args = array(
			'post__not_in'  => array($post_id),
			'order'         => 'DESC',
			'orderby'       => 'date',
			'posts_per_page'	=> $posts_per_page,
			'tax_query'     => array(
				array(
					'taxonomy'  => $taxonomy,
					'field'     => 'term_id',
					'terms'     => $term_ids,
				),
			)
		);

		$related_by_taxonomy = new WP_Query($args);

		return $related_by_taxonomy;

	}

}