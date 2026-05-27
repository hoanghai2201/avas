<?php
/**
 * Single Post Template.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */

get_header();
global $domain;
the_post(); // Run the loop once globally
?>

<!-- =============================================
     SECTION 1: Banner / Slider (Optional)
     ============================================= -->
<section class="single-hero position-relative">
    <?php if ( have_rows('slide') ) : ?>
        <!-- Has ACF slides -->
        <div class="main-carousel js-flickity" data-flickity='{ "wrapAround": true, "pageDots": true, "prevNextButtons": false, "autoPlay": 5000 }'>
            <?php while ( have_rows('slide') ) : the_row();
                $img = wp_is_mobile() ? get_sub_field('image_mobile') : get_sub_field('image_pc');
                if ( ! $img ) $img = wp_is_mobile() ? get_sub_field('image_pc') : get_sub_field('image_mobile');
                $slide_title   = get_sub_field('title');
                $slide_content = get_sub_field('content');
            ?>
            <div class="carousel-cell w-100 position-relative single-slide-cell">
                <?php if ( $img ) : ?>
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="single-slide-img w-100 obj-fit-cover d-block">
                <?php else : ?>
                    <div class="single-slide-img single-slide-placeholder"></div>
                <?php endif; ?>
                <div class="position-absolute top-0 start-0 w-100 h-100 single-slide-overlay"></div>
                <?php if ( $slide_title || $slide_content ) : ?>
                <div class="single-slide-content position-absolute text-white">
                    <?php if ( $slide_title ) : ?>
                        <h2 class="single-slide-title"><?php echo wp_kses_post($slide_title); ?></h2>
                    <?php endif; ?>
                    <?php if ( $slide_content ) : ?>
                        <div class="single-slide-desc"><?php echo wp_kses_post($slide_content); ?></div>
                    <?php endif; ?>
                    <?php $hotline = get_option('site_phone_number'); if ($hotline) : ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/\D/', '', $hotline)); ?>" class="btn single-slide-btn text-white fw-bold text-uppercase mt-3">
                            Hotline <?php echo esc_html($hotline); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>

    <?php else :
        // No slides — show thumbnail or default bg
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ( ! $thumb ) $thumb = get_option('site_bg_news');
    ?>
        <div class="single-hero-banner position-relative overflow-hidden">
            <?php if ( $thumb ) : ?>
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="single-hero-img w-100 obj-fit-cover d-block">
            <?php else : ?>
                <div class="single-hero-img single-hero-placeholder"></div>
            <?php endif; ?>
            <div class="position-absolute top-0 start-0 w-100 h-100 single-slide-overlay"></div>
            <div class="single-slide-content position-absolute text-white">
                <div class="single-hero-badge text-uppercase mb-2">
                    <?php $cats = get_the_category(); if ($cats) echo esc_html($cats[0]->name); ?>
                </div>
                <h1 class="single-slide-title"><?php the_title(); ?></h1>
                <div class="single-hero-meta mt-2 d-flex align-items-center gap-3">
                    <span class="single-hero-date">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <?php echo get_the_date('d/m/Y'); ?>
                    </span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<!-- =============================================
     SECTION 2: Post Content + Sidebar
     ============================================= -->
<section class="single-content-section py-5">
    <div class="container">
        <div class="row g-5">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">
                <article class="single-article">

                    <!-- Title & Meta (shown when there IS a slider — banner doesn't show title) -->
                    <?php if ( have_rows('slide') ) : ?>
                        <div class="single-title-block mb-4">
                            <div class="single-cat-badge mb-2">
                                <?php $cats = get_the_category(); if ($cats) : ?>
                                    <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>" class="single-cat-link text-uppercase">
                                        <?php echo esc_html($cats[0]->name); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <h1 class="single-post-title"><?php the_title(); ?></h1>
                            <div class="single-post-meta d-flex align-items-center gap-3 mt-2">
                                <span class="single-post-date">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    <?php echo get_the_date('d/m/Y'); ?>
                                </span>
                            </div>
                            <div class="single-title-divider mt-4"></div>
                        </div>
                    <?php else : ?>
                        <!-- No slider: title was in hero, just show date + divider -->
                        <div class="single-meta-bar d-flex align-items-center gap-3 mb-4">
                            <span class="single-post-date">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <?php echo get_the_date('d/m/Y'); ?>
                            </span>
                        </div>
                        <div class="single-page-title mb-4">
                            <h1 class="single-post-title"><?php the_title(); ?></h1>
                            <div class="single-title-divider mt-3"></div>
                        </div>
                    <?php endif; ?>

                    <!-- Post Body -->
                    <div class="single-post-body entry-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Social Share -->
                    <div class="single-share-bar mt-5 pt-4">
                        <?php
                        $post_url   = urlencode(get_permalink());
                        $share_links = [
                            'facebook'  => 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url,
                            'x'         => 'https://twitter.com/intent/tweet?url=' . $post_url,
                            'zalo'      => 'https://zalo.me/share?link=' . $post_url,
                        ];
                        ?>
                        <span class="single-share-label fw-bold text-uppercase" style="font-size:13px; letter-spacing:1px; color:#3e6896;">
                            <?php echo pll__('Share this article'); ?>
                        </span>
                        <div class="d-flex align-items-center gap-2 mt-2">
                            <a href="<?php echo esc_url($share_links['facebook']); ?>" target="_blank" rel="noopener" class="single-share-btn single-share-fb" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                            <a href="<?php echo esc_url($share_links['x']); ?>" target="_blank" rel="noopener" class="single-share-btn single-share-x" aria-label="X (Twitter)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="<?php echo esc_url($share_links['zalo']); ?>" target="_blank" rel="noopener" class="single-share-btn single-share-zalo" aria-label="Zalo">
                                <span style="font-size:12px; font-weight:700; line-height:1;">Zalo</span>
                            </a>
                        </div>
                    </div>

                </article>
            </div>

            <!-- SIDEBAR: Related Posts -->
            <div class="col-lg-4">
                <aside class="single-sidebar">
                    <div class="single-sidebar-header d-flex align-items-center mb-4">
                        <div class="sidebar-accent-bar me-3"></div>
                        <h3 class="sidebar-title mb-0 text-uppercase">Bài viết liên quan</h3>
                    </div>

                    <?php
                    $current_id = get_the_ID();
                    $cats       = wp_get_post_categories($current_id);
                    $related    = new WP_Query([
                        'category__in'   => $cats,
                        'post__not_in'   => [$current_id],
                        'posts_per_page' => 4,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ]);
                    if ( $related->have_posts() ) :
                        while ( $related->have_posts() ) : $related->the_post();
                            $rel_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    ?>
                    <article class="related-post-item d-flex gap-3 mb-4 align-items-start">
                        <a href="<?php the_permalink(); ?>" class="related-thumb-wrap flex-shrink-0 overflow-hidden">
                            <?php if ($rel_thumb) : ?>
                                <img src="<?php echo esc_url($rel_thumb); ?>" alt="<?php the_title_attribute(); ?>" class="related-thumb-img">
                            <?php else : ?>
                                <div class="related-thumb-placeholder"></div>
                            <?php endif; ?>
                        </a>
                        <div class="related-info">
                            <span class="related-date d-block mb-1"><?php echo get_the_date('d/m/Y'); ?></span>
                            <h5 class="related-title mb-0">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                        </div>
                    </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <p class="text-muted" style="font-size:14px;">Chưa có bài viết liên quan.</p>
                    <?php endif; ?>
                </aside>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>