<?php
/**
 * The blog template file.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */
get_header();

if(is_front_page()){
	get_template_part('template-parts/pages/home');
}

if(is_page('contact-us')){
	get_template_part('template-parts/pages/contact');
}

if(is_page('about-us') || is_page('oem')){
	get_template_part('template-parts/pages/about-us');
}

if(is_page('about-our-factory')){
	get_template_part('template-parts/pages/about-our-factory');
}

if(is_page('company-profile')){
	get_template_part('template-parts/pages/company-profile');
}

if(is_page('our-team')){
	get_template_part('template-parts/pages/our-team');
}

if(is_page('core-values')){
	get_template_part('template-parts/pages/core-values');
}

if(is_page('history')){
	get_template_part('template-parts/pages/history');
}

if(is_page('oem-inquiries')){
	get_template_part('template-parts/pages/oem-inquiries');
}

if(is_page('factory-tour')){
	get_template_part('template-parts/pages/factory-tour');
}

if(is_page('food-safety')){
	get_template_part('template-parts/pages/food-safety');
}

if(is_page('oem-process')){
	get_template_part('template-parts/pages/oem-process');
}

if(is_page('oem-works')){
	get_template_part('template-parts/pages/oem-works');
}

if(is_page('product')){
	get_template_part('template-parts/pages/product');
}

if(is_page('view-pdf')){
	get_template_part('template-parts/pages/view-pdf');
}

if(is_page('food-safety-policy')){
	get_template_part('template-parts/pages/food-safety-policy');
}

if(is_page('company-policies') || is_page('general-policies-and-regulations') || is_page('payment-policies') || is_page('privacy-policies') || is_page('return-policies') || is_page('shipping-policies') || is_page('terms-and-conditions')){
	get_template_part('template-parts/pages/policies');
}

if(is_page('faq')){
	get_template_part('template-parts/pages/faq');
}

get_footer();
?>