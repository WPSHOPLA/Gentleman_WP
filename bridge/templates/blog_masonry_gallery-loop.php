<?php 
global $qode_options_proya;
$blog_enable_social_share = "";
if(isset($qode_options_proya['enable_social_share'])){
    $blog_enable_social_share = $qode_options_proya['enable_social_share'];
}

$blog_hide_author = "";
if(isset($qode_options_proya['blog_hide_author'])){
    $blog_hide_author = $qode_options_proya['blog_hide_author'];
}

$_post_format = get_post_format();
$thumb_size = 'portfolio_masonry_regular';
$thumb_size_temp = get_post_meta(get_the_ID(),"qode_post_style_masonry_gallery",true);
$post_size_class = 'default';
switch ($thumb_size_temp) {
	case 'large-height':
		$thumb_size = 'portfolio_masonry_tall';
        $post_size_class = $thumb_size_temp;
		break;
	case 'large-width':
		$thumb_size = 'portfolio_masonry_wide';
        $post_size_class = $thumb_size_temp;
		break;
	case 'large-width-height':
		$thumb_size = 'portfolio_masonry_large';
        $post_size_class = $thumb_size_temp;
		break;
	default:
		$thumb_size = 'portfolio_masonry_regular';
		break;
}

$params = array(
    'blog_enable_social_share' => $blog_enable_social_share,
    'blog_hide_author' => $blog_hide_author,
    'thumb_size' => $thumb_size
);

?>
<?php
	switch ($_post_format) {
		case "link":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
                <?php qode_get_template_part('templates/blog-parts/masonry-gallery/link','',$params); ?>
			</article>
<?php
		break;
		case "gallery":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
                <div class="post_content_holder">
                    <?php qode_get_template_part('templates/blog-parts/masonry-gallery/gallery','',$params); ?>
                    <?php qode_get_template_part('templates/blog-parts/masonry-gallery/text','',$params); ?>
                </div>
			</article>
<?php
		break;
		case "quote":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
            <?php qode_get_template_part('templates/blog-parts/masonry-gallery/quote','',$params); ?>
		</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
            <div class="post_content_holder">
                <?php qode_get_template_part('templates/blog-parts/masonry-gallery/image','',$params); ?>
                <?php qode_get_template_part('templates/blog-parts/masonry-gallery/text','',$params); ?>
            </div>
		</article>
<?php
}
?>		

