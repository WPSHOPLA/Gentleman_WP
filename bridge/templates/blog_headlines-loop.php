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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 itemprop="name" class="entry_title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
</article>

