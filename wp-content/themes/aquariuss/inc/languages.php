<?php

// Fallback Polylang functions in case the plugin is deactivated
if (!function_exists('pll_register_string')) {
    function pll_register_string($name, $string, $group = 'polylang', $multiline = false) {}
    function pll__($string) { return $string; }
    function pll_e($string) { echo $string; }
    function pll_current_language($value = 'slug') { return 'en'; }
    function pll_default_language($value = 'slug') { return 'en'; }
    function pll_get_post($post_id, $slug = '') { return $post_id; }
    function pll_get_term($term_id, $slug = '') { return $term_id; }
    function pll_count_posts($lang, $args = array()) { return 0; }
    function pll_the_languages($args = '') { return ''; }
}

function register_custom_strings() {
    pll_register_string('all', 'All', 'Translate');
    pll_register_string('review', 'Review', 'Translate');
    pll_register_string('contact_us', 'Contact Us', 'Translate');
    pll_register_string('visit_us', 'Visit Us', 'Translate');
    pll_register_string('call_us', 'Call Us', 'Translate');
    pll_register_string('follow_us', 'Follow Us', 'Translate');
    pll_register_string('view_more', 'View more', 'Translate');
    pll_register_string('view_details', 'View Details', 'Translate');
    pll_register_string('read_more', 'Read More', 'Translate');
    pll_register_string('read_less', 'Read Less', 'Translate');
    pll_register_string('continue_reading', 'Continue reading', 'Translate');
    pll_register_string('news', 'News', 'Translate');
    pll_register_string('show_all', 'Show all', 'Translate');
    pll_register_string('previous', 'Previous', 'Translate');
    pll_register_string('next', 'Next', 'Translate');
    pll_register_string('latest_articles', 'Latest Articles', 'Translate');
    pll_register_string('browse_categories', 'Browse by Categories', 'Translate');
    pll_register_string('related_posts', 'Related posts', 'Translate');
    pll_register_string('search', 'Search', 'Translate');
    pll_register_string('search_results', 'Search Results for', 'Translate');
    pll_register_string('no_results', 'No results found. Please try again with different keywords.', 'Translate');
    pll_register_string('all_categories', 'All Categories', 'Translate');
    pll_register_string('quick_search', 'Quick Search', 'Translate');
    pll_register_string('share_article', 'Share this article', 'Translate');
    pll_register_string('other_articles', 'Other Articles', 'Translate');
    pll_register_string('step', 'Step', 'Translate');
    pll_register_string('OEM_inquiries', 'Click Here for OEM Inquiries', 'Translate');
    pll_register_string('packaging', 'Packaging', 'Translate');
    pll_register_string('net_weight', 'Net weight', 'Translate');

    pll_register_string('faq', 'FAQ', 'Translate');
    pll_register_string('learn_more', 'Learn More', 'Translate');
    pll_register_string('view_all_news', 'View All News', 'Translate');
    pll_register_string('also_like', 'You May Also Like', 'Translate');
}
add_action('init', 'register_custom_strings');