<?php 
global $qode_options_proya;

$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
}

$params = array(
    'blog_hide_comments' => $blog_hide_comments
);

$_post_format = get_post_format();
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php qode_get_template_part('templates/blog-parts/pinterest/video'); ?>
            <?php qode_get_template_part('templates/blog-parts/pinterest/text','',$params); ?>
		</article>

<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php qode_get_template_part('templates/blog-parts/pinterest/audio'); ?>
            <?php qode_get_template_part('templates/blog-parts/pinterest/text','',$params); ?>
		</article>
<?php
		break;
		case "link":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php qode_get_template_part('templates/blog-parts/pinterest/link'); ?>
			</article>
<?php
		break;
        case "quote":
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php qode_get_template_part('templates/blog-parts/pinterest/quote'); ?>
            </article>
            <?php
        break;
		case "gallery":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php qode_get_template_part('templates/blog-parts/pinterest/gallery'); ?>
                <?php qode_get_template_part('templates/blog-parts/pinterest/text','',$params); ?>
			</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php qode_get_template_part('templates/blog-parts/pinterest/image'); ?>
            <?php qode_get_template_part('templates/blog-parts/pinterest/text','',$params); ?>
		</article>
<?php
}
?>		

