<?php
/**
 * Single Project Template.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */

get_header();
global $domain;
the_post();

$current_id   = get_the_ID();
$current_lang = function_exists('pll_get_post_language') ? pll_get_post_language($current_id) : '';
$terms        = wp_get_post_terms($current_id, 'project_category');
$terms_ids    = wp_get_post_terms($current_id, 'project_category', ['fields' => 'ids']);
$galleries    = get_field('galleries');
$proj_type    = get_field('type');
$proj_address = get_field('address');
$thumb        = get_the_post_thumbnail_url($current_id, 'full');
?>

<!-- =============================================
     SECTION 1: Hero Gallery Slider
     ============================================= -->
<section class="proj-hero">

    <?php if ($galleries) : ?>

    <!-- Main large slider -->
    <div class="proj-main-gallery js-flickity proj-main-js"
         data-flickity='{ "wrapAround": true, "pageDots": false, "prevNextButtons": true, "imagesLoaded": true }'>
        <?php foreach ($galleries as $img) :
            $src = ! empty($img['sizes']['large']) ? $img['sizes']['large'] : $img['url'];
        ?>
        <div class="proj-slide-cell">
            <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="proj-main-img">
            <div class="proj-slide-overlay"></div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Thumbnail nav strip -->
    <?php if (count($galleries) > 1) : ?>
    <div class="proj-thumb-gallery js-flickity proj-thumb-js container"
         data-flickity='{ "asNavFor": ".proj-main-js", "contain": true, "pageDots": false, "prevNextButtons": false, "cellAlign": "left", "wrapAround": false }'>
        <?php foreach ($galleries as $img) :
            $thumb_src = ! empty($img['sizes']['thumbnail']) ? $img['sizes']['thumbnail'] : $img['url'];
        ?>
        <div class="proj-thumb-cell">
            <img src="<?php echo esc_url($thumb_src); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="proj-thumb-img">
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php elseif ($thumb) : ?>
    <!-- Fallback: post thumbnail -->
    <div class="proj-hero-fallback">
        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="proj-main-img">
        <div class="proj-slide-overlay"></div>
    </div>
    <?php endif; ?>

    <!-- Title overlay on hero -->
    <div class="proj-hero-title-bar">
        <div class="container">
            <?php if ($terms) : ?>
            <div class="proj-cat-badges mb-2">
                <?php foreach ($terms as $term) : ?>
                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="proj-cat-badge">
                        <?php echo esc_html($term->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <h1 class="proj-hero-title"><?php the_title(); ?></h1>
            <div class="proj-hero-meta">
                <?php if ($proj_type) : ?>
                <span class="proj-meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                    <?php echo esc_html($proj_type); ?>
                </span>
                <?php endif; ?>
                <?php if ($proj_address) : ?>
                <span class="proj-meta-item">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <?php echo esc_html($proj_address); ?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>

<!-- =============================================
     SECTION 2: Project Info + Content
     ============================================= -->
<section class="proj-content-section py-5">
    <div class="container">

        <!-- Info chips bar -->
        <?php if ($proj_type || $proj_address) : ?>
        <div class="proj-info-bar d-flex flex-wrap gap-3 mb-5" data-aos="fade-up">
            <?php if ($proj_type) : ?>
            <div class="proj-info-chip">
                <div class="proj-info-chip-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                </div>
                <div class="proj-info-chip-text">
                    <span class="proj-info-label">Loại công trình</span>
                    <strong class="proj-info-value"><?php echo esc_html($proj_type); ?></strong>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($proj_address) : ?>
            <div class="proj-info-chip">
                <div class="proj-info-chip-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div class="proj-info-chip-text">
                    <span class="proj-info-label">Địa chỉ</span>
                    <strong class="proj-info-value"><?php echo esc_html($proj_address); ?></strong>
                </div>
            </div>
            <?php endif; ?>

            <div class="proj-info-chip">
                <div class="proj-info-chip-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <div class="proj-info-chip-text">
                    <span class="proj-info-label">Hoàn thành</span>
                    <strong class="proj-info-value"><?php echo get_the_date('Y'); ?></strong>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Post content -->
        <div class="proj-article" data-aos="fade-up" data-aos-delay="100">
            <div class="proj-article-divider mb-4">
                <div class="proj-divider-bar"></div>
                <span class="proj-divider-label text-uppercase fw-bold">Mô tả dự án</span>
            </div>
            <div class="proj-body entry-content">
                <?php the_content(); ?>
            </div>
        </div>

    </div>
</section>

<!-- =============================================
     SECTION 3: Related Projects
     ============================================= -->
<?php
$category_ids = ! empty($terms) && ! is_wp_error($terms) ? wp_list_pluck($terms, 'term_id') : [];
$related_args = [
    'post_type'      => 'project',
    'posts_per_page' => 8,
    'post__not_in'   => [$current_id],
    'orderby'        => 'date',
    'order'          => 'DESC',
];
if ($category_ids) {
    $related_args['tax_query'] = [[
        'taxonomy' => 'project_category',
        'field'    => 'term_id',
        'terms'    => $category_ids,
    ]];
}
if ($current_lang) $related_args['lang'] = $current_lang;
$related = new WP_Query($related_args);
?>

<?php if ($related->have_posts()) : ?>
<section class="proj-related-section py-5">
    <div class="container">

        <div class="proj-section-header d-flex align-items-center mb-4" data-aos="fade-up">
            <div class="proj-section-bar me-3"></div>
            <h2 class="proj-section-title mb-0 text-uppercase">Dự án liên quan</h2>
        </div>

        <div class="proj-related-carousel js-flickity"
             data-flickity='{ "wrapAround": true, "pageDots": false, "prevNextButtons": true, "groupCells": true, "cellAlign": "left" }'>
            <?php while ($related->have_posts()) : $related->the_post();
                $rel_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                $rel_type = get_field('type');
                $rel_addr = get_field('address');
            ?>
            <div class="proj-related-cell">
                <a href="<?php the_permalink(); ?>" class="proj-related-card d-block text-decoration-none">
                    <div class="proj-related-img-wrap overflow-hidden">
                        <?php if ($rel_img) : ?>
                            <img src="<?php echo esc_url($rel_img); ?>" alt="<?php the_title_attribute(); ?>" class="proj-related-img">
                        <?php else : ?>
                            <div class="proj-related-img-placeholder"></div>
                        <?php endif; ?>
                        <div class="proj-related-hover-overlay">
                            <span class="proj-related-view-btn">Xem dự án</span>
                        </div>
                    </div>
                    <div class="proj-related-info pt-3 px-1">
                        <h4 class="proj-related-title"><?php the_title(); ?></h4>
                        <?php if ($rel_addr) : ?>
                            <p class="proj-related-addr">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <?php echo esc_html($rel_addr); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
