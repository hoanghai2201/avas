<?php
require get_stylesheet_directory() . '/inc/init.php';
require get_stylesheet_directory() . '/inc/project.php';
require get_stylesheet_directory() . '/inc/general.php';
require get_stylesheet_directory() . '/inc/languages.php';

/**
 * Add custom page templates to the "Template" dropdown in Page Attributes.
 */
add_filter( 'theme_page_templates', 'aquariuss_custom_page_templates' );
function aquariuss_custom_page_templates( $templates ) {
    $templates['layout-home.php'] = 'Trang chủ';
    $templates['layout-about.php'] = 'Giới thiệu';
    $templates['layout-services.php'] = 'Dịch vụ';
    $templates['layout-solutions.php'] = 'Giải pháp';
    $templates['layout-projects.php'] = 'Dự án';
    $templates['layout-news.php'] = 'Tin tức';
    $templates['layout-contact.php'] = 'Liên hệ';
    return $templates;
}