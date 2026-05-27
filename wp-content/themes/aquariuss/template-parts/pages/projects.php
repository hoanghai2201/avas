<?php
/**
 * Projects Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;

// Get current page for pagination
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
?>

<!-- Section 1: Banner Slider -->
<section class="section-1 position-relative">
    <div class="main-carousel js-flickity" data-flickity='{ "wrapAround": true, "pageDots": true, "prevNextButtons": false }'>
        <?php
            if(have_rows('slide')):
                while(have_rows('slide')) : the_row();
                    if(wp_is_mobile()){
                        $image = get_sub_field('image_mobile');
                    } else {
                        $image = get_sub_field('image_pc');
                    }
                    $link = esc_url(get_sub_field('link'));
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
            ?>
            <div class="carousel-cell w-100 position-relative">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" class="w-100 obj-fit-cover d-block" alt="<?php echo esc_attr($image['alt']); ?>" style="min-height: 400px; height: 100vh;">
                <?php else: ?>
                    <div class="w-100 d-block" style="min-height: 400px; height: 100vh; background:#1e3a5f;"></div>
                <?php endif; ?>
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(16,42,80,0.8) 0%, rgba(16,42,80,0.4) 50%, rgba(0,0,0,0) 100%);"></div>
                <div class="slider-content position-absolute top-50 translate-middle-y text-white px-3 px-md-5" style="left: 0; max-width: 800px;">
                    <div class="ps-md-5 ms-md-4">
                        <h1 class="fw-bold text-uppercase mb-2" style="font-size: clamp(32px, 5vw, 60px); line-height: 1.2;"><?php echo nl2br(esc_html($title)); ?></h1>
                        <p class="mb-4 text-light" style="font-size: clamp(16px, 2vw, 20px);"><?php echo nl2br(esc_html($desc)); ?></p>
                        <?php if($link): ?>
                        <a href="<?php echo $link; ?>" class="btn text-white fw-bold px-4 py-3 text-uppercase rounded-0" style="background-color: #d97539; border: none; font-size: 16px;">
                            Hotline <?php echo get_option('site_phone_number'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            endif;
        ?>
    </div>
</section>

<!-- Section 2: Projects List -->
<section id="section-2" class="py-5" style="background-color: #e5e5e5;">
    <div class="container py-4">
        
        <!-- Title Bar -->
        <div class="d-flex align-items-center mb-5" data-aos="fade-up">
            <h2 class="mb-0 text-uppercase fw-bold" style="font-size: clamp(24px, 3vw, 36px); color: #3e6896;">
                DỰ ÁN NỔI BẬT
            </h2>
        </div>

        <div class="row g-4">
            <?php
            $args = array(
                'post_type'      => 'project',
                'posts_per_page' => 9,
                'paged'          => $paged,
                'post_status'    => 'publish',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
                $delay = 0;
                while ($query->have_posts()): $query->the_post();
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $type = get_field('type');
                    $address = get_field('address');
            ?>
            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <div class="project-page-card">
                    <a href="<?php the_permalink(); ?>" class="d-block text-decoration-none">
                        <div class="project-page-img-wrap">
                            <?php if ($thumb): ?>
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else: ?>
                                <div class="project-page-placeholder"></div>
                            <?php endif; ?>
                        </div>
                        <div class="project-page-info">
                            <h3 class="project-page-title text-uppercase"><?php the_title(); ?></h3>
                            <?php if ($type): ?>
                                <p class="project-page-meta"><strong>Loại sản phẩm:</strong> <?php echo esc_html($type); ?></p>
                            <?php endif; ?>
                            <?php if ($address): ?>
                                <p class="project-page-meta"><strong>Khu vực/Địa chỉ:</strong> <?php echo esc_html($address); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                $delay += 50;
                if ($delay > 200) $delay = 0;
                endwhile;
            ?>
        </div>

        <!-- Pagination -->
        <div class="mt-5 text-center">
            <div class="custom-pagination">
                <?php
                    $total_pages = $query->max_num_pages;
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged'));
                        echo paginate_links(array(
                            'base'      => get_pagenum_link(1) . '%_%',
                            'format'    => 'page/%#%',
                            'current'   => $current_page,
                            'total'     => $total_pages,
                            'prev_text' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>',
                            'next_text' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>',
                        ));
                    }
                ?>
            </div>
        </div>
        <?php
            wp_reset_postdata();
        else:
        ?>
        <div class="text-center py-5">
            <p class="text-muted">Chưa có dự án nào được đăng.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Section 3: Testimonials -->
<section id="section-3" class="py-5" style="background-color: #e3e3e3; padding-bottom: 6rem !important;">
    <div class="container py-4">
        <?php
        $testimonials = [];
        if(have_rows('testimonials')) {
            while(have_rows('testimonials')) {
                the_row();
                $testimonials[] = [
                    'image' => get_sub_field('image'),
                    'desc'  => get_sub_field('desc')
                ];
            }
        }
        
        // Nhân bản các item nếu số lượng quá ít (< 6) để Flickity wrapAround mượt mà, không bị giật ngược
        if (!empty($testimonials) && count($testimonials) < 6) {
            $original_testimonials = $testimonials;
            while (count($testimonials) < 6) {
                $testimonials = array_merge($testimonials, $original_testimonials);
            }
        }
        ?>
        
        <?php if(!empty($testimonials)): ?>
        <div class="testimonial-wrapper position-relative mx-auto text-center" style="max-width: 900px;">
            
            <!-- Top Left Quote -->
            <div class="position-absolute" style="top: -20px; left: 0; color: #222;">
                <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            </div>

            <!-- Text Carousel -->
            <div class="testimonial-text-carousel js-flickity px-4 px-md-5" data-flickity='{ "wrapAround": true, "pageDots": false, "prevNextButtons": false, "draggable": false, "fade": true }'>
                <?php foreach($testimonials as $index => $t) : ?>
                <div class="w-100 testimonial-text-slide">
                    <p class="testimonial-text mb-0" style="font-size: 18px; line-height: 1.6; color: #111;">
                        <?php echo nl2br(esc_html($t['desc'])); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Bottom Right Quote -->
            <div class="position-absolute" style="bottom: 120px; right: 0; color: #222;">
                <svg width="45" height="45" viewBox="0 0 24 24" fill="currentColor"><path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.57-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/></svg>
            </div>

            <!-- Avatar Carousel -->
            <div class="testimonial-avatar-carousel js-flickity mx-auto mt-5" style="max-width: 500px;" data-flickity='{ "asNavFor": ".testimonial-text-carousel", "wrapAround": true, "pageDots": false, "prevNextButtons": true, "cellAlign": "center" }'>
                <?php foreach($testimonials as $t) : ?>
                <div class="testimonial-avatar-cell">
                    <?php if($t['image']): ?>
                        <img src="<?php echo esc_url($t['image']['url']); ?>" alt="<?php echo esc_attr($t['image']['alt']); ?>" class="testimonial-avatar-img rounded-circle object-fit-cover">
                    <?php else: ?>
                        <div class="testimonial-avatar-img rounded-circle bg-secondary"></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
        <?php endif; ?>
    </div>
</section>