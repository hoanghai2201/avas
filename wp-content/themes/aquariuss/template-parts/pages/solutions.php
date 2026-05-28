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
                    <p class="mb-4 text-light" style="font-size: clamp(16px, 2vw, 20px);"><?php echo wp_kses_post($desc); ?></p>
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
<section id="section-2" class="py bg-white">
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
        ?>
        <div class="row align-items-center g-5 mb-5 <?php echo $is_reverse ? 'flex-row-reverse' : ''; ?>" data-aos="fade-up" data-aos-delay="<?php echo ($i % 3) * 100; ?>">
            <!-- Image Box Column -->
            <div class="col-lg-6">
                <div class="card rounded-0 bg-white" style="border: 1px solid #b5b5b5; padding: 20px;">
                    <a href="<?php the_permalink(); ?>" class="d-block overflow-hidden">
                        <?php if ($thumb): ?>
                            <img src="<?php echo esc_url($thumb); ?>" class="w-100 obj-fit-cover" alt="<?php the_title(); ?>" style="height: 280px; transition: transform 0.3s ease;">
                        <?php else: ?>
                            <div class="w-100" style="height: 280px; background:#dde3ec;"></div>
                        <?php endif; ?>
                    </a>
                    <div class="card-body text-center py-4 pm-0">
                        <h4 class="mb-0 fw-bold text-uppercase hidden-mobile" style="color: #0b4e8c; font-size: 16px;"><a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: inherit;"><?php the_title(); ?></a></h4>
                    </div>
                </div>
            </div>

            <!-- Text Column -->
            <div class="col-lg-6 mmt-1">
                <div class="<?php echo !$is_reverse ? 'ps-lg-4' : 'pe-lg-4'; ?>">
                    <h3 class="fw-bold mb-3 text-uppercase" style="color: #0b4e8c; font-size: 20px;"><a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: inherit;"><?php the_title(); ?></a></h3>
                    <div class="text-dark" style="line-height: 1.6; font-size: 14px;">
                        <?php 
                        $text = get_the_excerpt() ? get_the_excerpt() : get_the_content();
                        echo wpautop(wp_trim_words($text, 30, '...'));
                        ?>
                    </div>
                </div>
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
<section id="section-3" class="why-choose-wrap">
    <!-- Orange Title Banner -->
    <div class="w-100 py-4 text-center" style="background-color: #d97539;">
        <h2 class="mb-0 text-uppercase fw-bold text-white" style="font-size: clamp(20px, 3vw, 30px); letter-spacing: 1px;" data-aos="fade-up">
            <?php echo get_field('title_sec3') ? get_field('title_sec3') : 'TẠI SAO NÊN LỰA CHỌN AVAS?'; ?>
        </h2>
    </div>
    <!-- Content Area -->
    <div class="py-5" style="background-color: #fff;">
        <div class="container py-3">
            <div class="row align-items-center g-4">
                <!-- Left: Icon Grid -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <?php if(have_rows('list_sec3')):
                            $delay = 100;
                            while(have_rows('list_sec3')): the_row();
                                $icon  = get_sub_field('icon');
                                if (!$icon) $icon = get_sub_field('image');
                                $title = get_sub_field('title');
                        ?>
                        <div class="col-4 col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="text-center">
                                <!-- Blue Square Icon -->
                                <div class="mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px; background-color: #0b4e8c; padding: 20px;">
                                    <?php if($icon): ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 52px; height: 52px; object-fit: contain; filter: brightness(0) invert(1);">
                                    <?php endif; ?>
                                </div>
                                <p class="fw-bold text-uppercase text-dark mb-0 w-50 mx-auto" style="font-size: 12px; line-height: 1.4; letter-spacing: 0.3px;"><?php echo esc_html($title); ?></p>
                            </div>
                        </div>
                        <?php
                            $delay += 80;
                            endwhile;
                        endif; ?>
                    </div>
                </div>

                <!-- Right: Image -->
                <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="200">
                    <?php $image_sec3 = get_field('image_sec3'); if($image_sec3): ?>
                        <img src="<?php echo esc_url($image_sec3['url']); ?>" alt="<?php echo esc_attr($image_sec3['alt']); ?>" class="img-fluid" style="max-height: 420px; object-fit: contain;">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
