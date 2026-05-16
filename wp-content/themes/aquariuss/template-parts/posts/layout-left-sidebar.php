<?php
	do_action('flatsome_before_blog');
?>

<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="row row-large <?php if(get_theme_mod('blog_layout_divider', 1)) echo 'row-divided ';?>">
<div class="large-12 col div-no-padding">
	<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
</div>
	<div class="post-sidebar large-3 col">
		<?php get_sidebar(); ?>
	</div>

	<div class="large-9 col medium-col-first">
	<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>
	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single');
			comments_template();
		} elseif(get_theme_mod('blog_style_archive', '') && (is_archive() || is_search())){
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style_archive', '') );
		} else{
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style', 'normal') );
		}	?>
	</div>

</div>

<?php
	do_action('flatsome_after_blog');
?>
