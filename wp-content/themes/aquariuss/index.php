<?php
/**
 * The blog template file.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */
get_header();

$page_template = get_page_template_slug( get_queried_object_id() );

if ( $page_template === 'layout-home.php' ) {
	get_template_part('template-parts/pages/home');
} elseif ( $page_template === 'layout-about.php' ) {
	get_template_part('template-parts/pages/about-us');
} elseif ( $page_template === 'layout-services.php' ) {
	get_template_part('template-parts/pages/services');
} elseif ( $page_template === 'layout-solutions.php' ) {
	get_template_part('template-parts/pages/solutions');
} elseif ( $page_template === 'layout-projects.php' ) {
	get_template_part('template-parts/pages/projects');
} elseif ( $page_template === 'layout-news.php' ) {
	get_template_part('template-parts/pages/news');
} elseif ( $page_template === 'layout-contact.php' ) {
	get_template_part('template-parts/pages/contact');
} else {
	if(is_front_page()){
		get_template_part('template-parts/pages/home');
	} else {
		get_template_part('template-parts/pages/default');
	}
}

get_footer();
?>