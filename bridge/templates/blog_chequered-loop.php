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
$post_size_class = 'default';

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
			<?php qode_get_template_part('templates/blog-parts/chequered/link','',$params); ?>
		</article>
		<?php
		break;
	case "gallery":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
			<div class="post_content_holder">
				<?php qode_get_template_part('templates/blog-parts/chequered/gallery','',$params); ?>
				<?php qode_get_template_part('templates/blog-parts/chequered/text','',$params); ?>
			</div>
		</article>
		<?php
		break;
	case "quote":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
			<?php qode_get_template_part('templates/blog-parts/chequered/quote','',$params); ?>
		</article>
		<?php
		break;
	case "video":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
			<div class="post_content_holder">
				<span class="video_icon arrow_triangle-right"></span>
				<?php qode_get_template_part('templates/blog-parts/chequered/image','',$params); ?>
				<?php qode_get_template_part('templates/blog-parts/chequered/text','',$params); ?>
			</div>
		</article>
		<?php
		break;
	case "audio":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
			<div class="post_content_holder">
				<span class="video_icon icon_music"></span>
				<?php qode_get_template_part('templates/blog-parts/chequered/image','',$params); ?>
				<?php qode_get_template_part('templates/blog-parts/chequered/text','',$params); ?>
			</div>
		</article>
		<?php
		break;
	default:
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class($post_size_class); ?>>
			<div class="post_content_holder">
				<?php qode_get_template_part('templates/blog-parts/chequered/image','',$params); ?>
				<?php qode_get_template_part('templates/blog-parts/chequered/text','',$params); ?>
			</div>
		</article>
		<?php
}
?>		

