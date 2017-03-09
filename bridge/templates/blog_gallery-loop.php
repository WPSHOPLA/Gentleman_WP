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
$thumb_height = 800;
$thumb_width = 645;
$post_size_class = 'default';


$params = array(
    'blog_enable_social_share' => $blog_enable_social_share,
    'blog_hide_author' => $blog_hide_author,
    'thumb_width' => $thumb_width,
    'thumb_height' => $thumb_height
);

?>
<?php
	switch ($_post_format) {
		case "gallery":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
                <div class="post_content_holder">
					<div class="post_overlay"></div>
                    <?php qode_get_template_part('templates/blog-parts/gallery/gallery','',$params); ?>
                    <?php qode_get_template_part('templates/blog-parts/gallery/text','',$params); ?>
                </div>
			</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
            <div class="post_content_holder">
				<div class="post_overlay"></div>
                <?php qode_get_template_part('templates/blog-parts/gallery/image','',$params); ?>
                <?php qode_get_template_part('templates/blog-parts/gallery/text','',$params); ?>
            </div>
		</article>
<?php
}
?>		

