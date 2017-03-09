<?php
global $qode_options_proya;
$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
}

$blog_hide_author = "";
if (isset($qode_options_proya['blog_hide_author'])) {
    $blog_hide_author = $qode_options_proya['blog_hide_author'];
}

$qode_like = "on";
if (isset($qode_options_proya['qode_like'])) {
	$qode_like = $qode_options_proya['qode_like'];
}

$enable_social_share = 'no';
if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") {
    $enable_social_share = 'yes';
}

$post_layout = qode_check_post_layout(get_the_ID());
$gallery_post_layout = qode_check_gallery_post_layout(get_the_ID());

$params = array(
    'blog_hide_comments' => $blog_hide_comments,
    'blog_hide_author' => $blog_hide_author,
    'qode_like' => $qode_like,
    'enable_social_share' => $enable_social_share,
    'gallery_post_layout' => $gallery_post_layout
);

$_post_format = get_post_format();
?>

<?php
switch ($_post_format) {
    case "video": ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('sticky'); ?>>
            <div class="post_content_holder">
                <?php qode_get_template_part('templates/blog-parts/compound/video','',$params); ?>
                <?php get_template_part('templates/blog-parts/compound/title'); ?>
                <?php qode_get_template_part('templates/blog-parts/compound/text','',$params); ?>
                <?php qode_get_template_part('templates/blog-parts/compound/meta','',$params); ?>
            </div>
        </article>
    <?php
    break;
    case "gallery": ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('sticky'); ?>>
            <div class="post_content_holder">
                <?php qode_get_template_part('templates/blog-parts/compound/gallery','',$params); ?>
                <?php get_template_part('templates/blog-parts/compound/title'); ?>
                <?php qode_get_template_part('templates/blog-parts/compound/text','',$params); ?>
                <?php qode_get_template_part('templates/blog-parts/compound/meta','',$params); ?>
            </div>
        </article>
    <?php
    break;
    default:
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('sticky'); ?>>
            <div class="post_content_holder">
                <?php switch ($post_layout){
                    case 'split': ?>
                        <?php get_template_part('templates/blog-parts/compound/title'); ?>
                        <div class="two_columns_50_50">
                            <div class="column1">
                                <div class="column_inner">
                                    <?php qode_get_template_part('templates/blog-parts/compound/image', '', array('image_size' => 'portfolio_masonry_tall')); ?>
                                </div>
                            </div>
                            <div class="column2">
                                <div class="column_inner">
                                    <?php qode_get_template_part('templates/blog-parts/compound/text','',$params); ?>
                                </div>
                            </div>
                        </div>
                        <?php qode_get_template_part('templates/blog-parts/compound/meta','',$params); ?>
                        <?php break;
                    default:
                        qode_get_template_part('templates/blog-parts/compound/image', '', array('image_size' => 'full'));
                        get_template_part('templates/blog-parts/compound/title');
                        qode_get_template_part('templates/blog-parts/compound/text','',$params);
                        qode_get_template_part('templates/blog-parts/compound/meta','',$params);
                        break;
                } ?>
            </div>
        </article>
    <?php
    break;
}
?>

