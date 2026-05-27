<?php
/**
 * Solutions Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
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
            <img src="<?php echo esc_url($image['url']); ?>" class="w-100 obj-fit-cover d-block" alt="<?php echo esc_attr($image['alt']); ?>" style="min-height: 400px; height: 100vh;">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(16,42,80,0.82) 0%, rgba(16,42,80,0.45) 50%, rgba(0,0,0,0) 100%);"></div>
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

<!-- Section 2: Giải pháp - bài viết từ category 'giai-phap' -->
<section id="section-2" class="py-5" style="background-color: #f4f6f8;">
    <div class="container py-4">
        <?php
        $args = array(
            'post_type'      => 'post',
            'category_name'  => 'giai-phap',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        );
        $query = new WP_Query($args);

        if ($query->have_posts()):
            $i = 0;
            while ($query->have_posts()): $query->the_post();
                $is_reverse = ($i % 2 !== 0);
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $num   = sprintf('%02d', $i + 1);
        ?>
        <div class="solution-post-card <?php echo $is_reverse ? 'reverse' : ''; ?>" data-aos="fade-up" data-aos-delay="<?php echo ($i % 3) * 100; ?>">
            <div class="card-image">
                <?php if ($thumb): ?>
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>">
                <?php else: ?>
                    <div style="width:100%; height:100%; min-height:280px; background:#dde3ec;"></div>
                <?php endif; ?>
                <!-- Post label overlay at bottom -->
                <div class="position-absolute bottom-0 start-0 w-100 px-3 py-2" style="background: rgba(30,80,136,0.85);">
                    <p class="mb-0 text-white fw-bold text-uppercase" style="font-size:13px; letter-spacing:1px;"><?php the_title(); ?></p>
                </div>
            </div>

            <div class="card-body-content">
                <p class="post-label"><?php echo sprintf('Giải pháp %s', $num); ?></p>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 45, '...'); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="read-more">
                    Xem thêm
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
        <?php
            $i++;
            endwhile;
            wp_reset_postdata();
        else:
        ?>
        <div class="text-center py-5">
            <p class="text-muted">Chưa có giải pháp nào được đăng.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Section 3: Tại sao nên lựa chọn AVAS? -->
<section id="section-3" class="py-5 why-choose-wrap">
    <div class="container py-4">

        <!-- Title Bar -->
        <div class="d-flex align-items-center mb-5" data-aos="fade-up">
            <div class="flex-shrink-0 me-4" style="width:6px; height:40px; background:#d97539; border-radius:3px;"></div>
            <h2 class="mb-0 text-uppercase fw-bold" style="font-size: clamp(22px, 3vw, 32px); color: #1e3a5f;">
                <?php echo get_field('title_sec3') ? get_field('title_sec3') : 'TẠI SAO NÊN LỰA CHỌN AVAS?'; ?>
            </h2>
        </div>

        <div class="row align-items-center g-5">
            <!-- Left: Icon Grid -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <?php if(have_rows('list_sec3')):
                        $delay = 100;
                        while(have_rows('list_sec3')): the_row();
                            $icon  = get_sub_field('icon');
                            if (!$icon) $icon = get_sub_field('image');
                            $title = get_sub_field('title');
                            $desc  = get_sub_field('desc');
                            if (!$desc) $desc = get_sub_field('description');
                    ?>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="why-choose-icon-box">
                            <div class="icon-circle">
                                <?php if($icon): ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                                <?php endif; ?>
                            </div>
                            <p><?php echo esc_html($title); ?></p>
                            <?php if($desc): ?>
                                <div class="mt-2 text-muted" style="font-size:12px; line-height:1.5;"><?php echo wpautop($desc); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                        $delay += 80;
                        endwhile;
                    endif; ?>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                <?php $image_sec3 = get_field('image_sec3'); if($image_sec3): ?>
                    <div class="position-relative">
                        <!-- Decorative frame -->
                        <div class="position-absolute" style="top:-12px; right:-12px; width:100%; height:100%; border:4px solid #d97539; z-index:0;"></div>
                        <img src="<?php echo esc_url($image_sec3['url']); ?>" alt="<?php echo esc_attr($image_sec3['alt']); ?>" class="w-100 position-relative" style="z-index:1; object-fit:cover; min-height:340px; display:block;">
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>