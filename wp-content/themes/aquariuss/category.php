<?php
/**
 * The blog template file.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */

get_header();
?>

<div id="content" class="blog-wrapper blog-archive page-wrapper">
    <?php
        if (is_category()) {
            $current_category = get_queried_object();
            $current_category_id = pll_get_term($current_category->term_id);
            if(in_array($current_category_id, [51,152])) {
                get_template_part('template-parts/category/category-events');
            }elseif(in_array($current_category_id, [228,230,232,234])) { // 228,230: local
                get_template_part('template-parts/category/elegance-list');
            }elseif(in_array($current_category_id, [236,244,318,320])) { // 236,244: local
                get_template_part('template-parts/category/talents');
            }else{
                get_template_part('template-parts/category/category');
            }
        }
    ?>
</div>

<?php get_footer(); ?>