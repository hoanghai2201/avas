<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>

<!-- Section 1: Hero Slider -->
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

<!-- Section 2: About Us -->
<section id="section-2" class="py-5 overflow-hidden">
    <div class="container py-4 py-md-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-4 text-center text-lg-start">
                <?php 
                $sec2_image = get_field('sec2_image'); 
                if($sec2_image): ?>
                    <img src="<?php echo esc_url($sec2_image['url']); ?>" alt="<?php echo esc_attr($sec2_image['alt']); ?>" class="img-fluid sec2-img-custom">
                <?php endif; ?>
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h3 class="text-uppercase fw-bold text-blue mb-1" style="color: #3e6896; font-size: clamp(24px, 3vw, 32px);"><?php echo get_field('sec2_title1'); ?></h3>
                <h2 class="text-uppercase fw-bold text-orange mb-4" style="color: #d97539; font-size: clamp(28px, 4vw, 40px);"><?php echo get_field('sec2_title2'); ?></h2>
                <div class="mb-4 text-dark fs-14 fw-normal" style="line-height: 1.7; text-align: justify;">
                    <?php echo wpautop(get_field('sec2_desc')); ?>
                </div>
                
                <div class="row text-center mb-5 sec2-stats g-2 g-md-0 mt-4">
                    <div class="col-6 col-md-3 border-md-end mb-3 mb-md-0">
                        <h3 class="fw-bold text-blue mb-1" style="color: #3e6896; font-size: clamp(30px, 4vw, 40px);"><?php echo get_field('sec2_num1'); ?></h3>
                        <p class="small text-dark fw-medium mb-0">Dự án hoàn thành</p>
                    </div>
                    <div class="col-6 col-md-3 border-md-end mb-3 mb-md-0">
                        <h3 class="fw-bold text-blue mb-1" style="color: #3e6896; font-size: clamp(30px, 4vw, 40px);"><?php echo get_field('sec2_num2'); ?></h3>
                        <p class="small text-dark fw-medium mb-0">Đối tác</p>
                    </div>
                    <div class="col-6 col-md-3 border-md-end">
                        <h3 class="fw-bold text-blue mb-1" style="color: #3e6896; font-size: clamp(30px, 4vw, 40px);"><?php echo get_field('sec2_num3'); ?></h3>
                        <p class="small text-dark fw-medium mb-0">Nhân sự</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <h3 class="fw-bold text-blue mb-1" style="color: #3e6896; font-size: clamp(30px, 4vw, 40px);"><?php echo get_field('sec2_num4'); ?></h3>
                        <p class="small text-dark fw-medium mb-0">Phản hồi tích cực</p>
                    </div>
                </div>
                
                <?php $sec2_readmore = get_field('sec2_readmore'); if($sec2_readmore): ?>
                    <div class="text-center text-lg-start mt-2">
                        <a href="<?php echo get_permalink($sec2_readmore->ID); ?>" class="btn text-white px-5 py-2 fw-bold rounded-0" style="background-color: #3e6896;">XEM THÊM</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Services -->
<section id="section-3" class="py-5" style="background: linear-gradient(135deg, #102a50 0%, #1a427d 100%);">
    <div class="container py-4 py-md-5">
        <h2 class="text-white text-uppercase fw-bold mb-5 pb-3 text-center text-md-start title-with-line" data-aos="fade-up" style="font-size: 32px; position: relative;">
            <?php echo get_field('sec3_title'); ?>
            <span style="position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background-color: #d97539;"></span>
        </h2>
        
        <div class="row g-4 g-lg-5 pt-4">
            <?php
            if(have_rows('list_services')):
                while(have_rows('list_services')) : the_row();
                    $image_pc = get_sub_field('image_pc');
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
            ?>
            <div class="col-lg-3 col-md-6 pt-5 pt-md-0 mt-5 mt-md-4" data-aos="fade-up">
                <div class="service-card bg-white px-3 pb-4 text-center position-relative h-100 d-flex flex-column" style="border-radius: 0; margin-top: 40px;">
                    <div class="service-icon-wrap position-absolute start-50 translate-middle" style="top: 0;">
                        <div class="service-icon bg-orange rounded-circle d-flex align-items-center justify-content-center border border-4 border-white" style="width: 90px; height: 90px; background-color: #d97539; box-shadow: 0 0 0 4px #d97539;">
                            <img src="<?php echo esc_url($image_pc['url']); ?>" alt="<?php echo esc_attr($image_pc['alt']); ?>" style="max-width: 45px; max-height: 45px; filter: brightness(0) invert(1);">
                        </div>
                    </div>
                    <div class="pt-5 mt-4 flex-grow-1">
                        <h5 class="text-uppercase fw-bold text-blue mb-3" style="color: #3e6896; font-size: 16px; min-height: 40px;"><?php echo esc_html($title); ?></h5>
                        <p class="text-dark small mb-4" style="font-size: 13px; line-height: 1.6;"><?php echo esc_html($desc); ?></p>
                    </div>
                    <div class="mt-auto pb-2">
                        <?php if($link): ?>
                        <a href="<?php echo get_permalink($link->ID); ?>" class="btn btn-outline-orange text-orange fw-medium px-4 py-1 rounded-pill" style="color: #d97539; border: 1px solid #d97539; font-size: 13px;">Xem thêm</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Section 4: Solutions -->
<section id="section-4" class="py-5" style="background-color: #e6e7e8;">
    <div class="container py-4 py-md-5">
        <h2 class="text-uppercase fw-bold text-blue mb-5 pb-3 text-center text-md-start title-with-line" style="color: #3e6896; font-size: 32px; position: relative;" data-aos="fade-up">
            <?php echo get_field('sec4_title'); ?>
            <span style="position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background-color: #d97539;"></span>
        </h2>
        
        <div class="row g-4">
            <?php
            $sec4_solutions = get_field('sec4_solutions');
            if($sec4_solutions):
                foreach($sec4_solutions as $post): 
                    setup_postdata($post);
            ?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="solution-card bg-white h-100 shadow-sm border border-light p-2">
                    <a href="<?php the_permalink(); ?>" class="d-block overflow-hidden">
                        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large'); ?>" class="w-100 obj-fit-cover" style="height: 200px;" alt="<?php the_title(); ?>">
                    </a>
                    <div class="p-3 text-center">
                        <h6 class="text-uppercase fw-bold text-blue mb-2" style="color: #3e6896; font-size: 14px;">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: inherit;"><?php the_title(); ?></a>
                        </h6>
                        <p class="small text-dark mb-0" style="font-size: 12px; line-height: 1.5;"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
                wp_reset_postdata();
            endif; 
            ?>
        </div>
    </div>
</section>

<!-- Section 5: Capabilities -->
<section id="section-5" class="py-0 position-relative bg-blue-dark overflow-hidden" style="background-color: #102a50;">
    <div class="row g-0">
        <div class="col-lg-6 position-relative z-1">
            <?php $sec5_image = get_field('sec5_image'); if($sec5_image): ?>
                <div class="h-100 w-100 sec5-img-wrap">
                    <img src="<?php echo esc_url($sec5_image['url']); ?>" class="w-100 h-100 obj-fit-cover d-block" style="min-height: 400px;" alt="<?php echo esc_attr($sec5_image['alt']); ?>">
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-6 text-white p-4 p-md-5 d-flex flex-column justify-content-center position-relative z-2 sec5-content-wrap">
            <div class="px-md-4 py-4 py-md-5 text-center text-md-start">
                <h2 class="text-uppercase fw-bold mb-3" style="font-size: clamp(28px, 3vw, 36px);"><?php echo get_field('sec5_title'); ?></h2>
                <div class="mb-5" style="font-size: 15px; line-height: 1.8; opacity: 0.9;">
                    <?php echo wpautop(get_field('sec5_desc')); ?>
                </div>
                
                <div class="row text-center justify-content-center justify-content-md-start mb-5 g-4">
                    <?php
                    if(have_rows('capacitys')):
                        while(have_rows('capacitys')) : the_row();
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                    ?>
                    <div class="col-4 col-sm-3 px-2">
                        <div class="capability-icon bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow" style="width: 80px; height: 80px;">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($title); ?>" style="max-width: 40px; max-height: 40px;">
                        </div>
                        <p class="small fw-bold text-uppercase px-1 mb-0" style="font-size: 13px; color: #3e6896;"><?php echo esc_html($title); ?></p>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                
                <div class="mb-5 d-flex gap-3 align-items-start justify-content-center justify-content-md-start text-start">
                    <span style="font-size: 50px; color: #fff; line-height: 0.8; font-family: serif; opacity: 0.8;">&ldquo;</span>
                    <p class="mb-0 fst-italic fw-medium pt-2" style="font-size: clamp(18px, 2vw, 22px);"><?php echo get_field('slogan'); ?></p>
                </div>
                
                <?php $sec5_readmore = get_field('sec5_readmore'); if($sec5_readmore): ?>
                    <div class="text-center">
                        <a href="<?php echo get_permalink($sec5_readmore->ID); ?>" class="btn text-white px-5 py-2 fw-bold text-uppercase rounded-0" style="background-color: #d97539;">XEM THÊM</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Projects -->
<section id="section-6" class="py-5 bg-white">
    <div class="container py-4 py-md-5">
        <h2 class="text-uppercase fw-bold text-blue mb-5 pb-3 text-center text-md-start title-with-line" style="color: #3e6896; font-size: 32px; position: relative;" data-aos="fade-up">
            <?php echo get_field('sec6_title'); ?>
            <span style="position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background-color: #d97539;"></span>
        </h2>
        
        <div class="carousel project-carousel js-flickity" data-flickity='{ "cellAlign": "left", "wrapAround": true, "pageDots": false, "groupCells": 1 }'>
            <?php
            $args = array(
                'post_type'      => 'project',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
            );
            $project_query = new WP_Query($args);
            
            if($project_query->have_posts()):
                while($project_query->have_posts()): 
                    $project_query->the_post();
            ?>
            <div class="carousel-cell px-3">
                <div class="project-card">
                    <a href="<?php the_permalink(); ?>" class="d-block mb-3">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="w-100 obj-fit-cover" style="height: 380px;" alt="<?php the_title(); ?>">
                    </a>
                    <h6 class="text-uppercase fw-bold text-blue mb-1" style="color: #3e6896; font-size: 15px;">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: inherit;"><?php the_title(); ?></a>
                    </h6>
                    <?php 
                    $project_type = get_field('type', get_the_ID());
                    $project_address = get_field('address', get_the_ID());
                    if ($project_type): ?>
                        <p class="text-dark mb-0 mt-2" style="font-size: 13px;">Loại sản phẩm: <?php echo esc_html($project_type); ?></p>
                    <?php endif; ?>
                    <?php if ($project_address): ?>
                        <p class="text-dark mb-0" style="font-size: 13px;"><?php echo esc_html($project_address); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif; 
            ?>
        </div>
    </div>
</section>

<!-- Section 7: News -->
<section id="section-7" class="py-5 bg-white">
    <div class="container pb-4 pb-md-5">
        <h2 class="text-uppercase fw-bold text-blue mb-5 pb-3 text-center text-md-start title-with-line" style="color: #3e6896; font-size: 30px; position: relative;" data-aos="fade-up">
            <?php echo get_field('sec7_title'); ?>
            <span style="position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background-color: #d97539;"></span>
        </h2>
        
        <div class="row g-4 mt-2">
            <?php
            $sec7_news = get_field('sec7_news');
            if($sec7_news && count($sec7_news) > 0):
                $main_news = $sec7_news[0];
            ?>
            <div class="col-lg-6" data-aos="fade-up">
                <div class="main-news-card bg-white h-100 border" style="border-color: #eaeaea;">
                    <a href="<?php echo get_permalink($main_news->ID); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url($main_news->ID, 'large'); ?>" class="w-100 obj-fit-cover" style="height: 340px;" alt="<?php echo get_the_title($main_news->ID); ?>">
                    </a>
                    <div class="p-4">
                        <h5 class="fw-bold mb-3" style="font-size: 18px;"><a href="<?php echo get_permalink($main_news->ID); ?>" class="text-decoration-none text-dark"><?php echo get_the_title($main_news->ID); ?></a></h5>
                        <p class="text-dark mb-4 fs-14" style="line-height: 1.6;"><?php echo wp_trim_words(get_the_excerpt($main_news->ID), 30); ?></p>
                        <a href="<?php echo get_permalink($main_news->ID); ?>" class="btn text-white px-4 py-2 rounded-0 fw-medium" style="background-color: #3e6896; font-size: 13px;">ĐỌC THÊM</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex flex-column h-100 gap-4">
                    <?php
                    for($i = 1; $i < min(3, count($sec7_news)); $i++):
                        $sub_news = $sec7_news[$i];
                    ?>
                    <div class="sub-news-card bg-white d-flex border" style="height: 230px; border-color: #eaeaea;">
                        <div class="w-50 h-100">
                            <a href="<?php echo get_permalink($sub_news->ID); ?>" class="d-block h-100">
                                <img src="<?php echo get_the_post_thumbnail_url($sub_news->ID, 'medium'); ?>" class="w-100 h-100 obj-fit-cover" alt="<?php echo get_the_title($sub_news->ID); ?>">
                            </a>
                        </div>
                        <div class="w-50 p-4 d-flex flex-column justify-content-center">
                            <h6 class="fw-bold mb-3" style="font-size: 16px; line-height: 1.4;"><a href="<?php echo get_permalink($sub_news->ID); ?>" class="text-decoration-none text-dark"><?php echo get_the_title($sub_news->ID); ?></a></h6>
                            <p class="text-dark small mb-4" style="line-height: 1.5;"><?php echo wp_trim_words(get_the_excerpt($sub_news->ID), 12); ?></p>
                            <div>
                                <a href="<?php echo get_permalink($sub_news->ID); ?>" class="btn text-white px-3 py-2 rounded-0 fw-medium" style="background-color: #3e6896; font-size: 12px;">ĐỌC THÊM</a>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section 8: Testimonials & Sponsors -->
<section id="section-8" class="py-5" style="background: linear-gradient(135deg, #102a50 0%, #1a427d 100%); min-height: 600px;">
    <div class="container py-4 py-md-5">
        <div class="row mb-5 align-items-center">
            <div class="col-lg-4 text-white pe-lg-5 mb-5 mb-lg-0 text-center text-md-start" data-aos="fade-up">
                <h2 class="text-uppercase fw-bold mb-4" style="font-size: 32px;"><?php echo get_field('sec8_title'); ?></h2>
                <div style="font-size: 14px; line-height: 1.6; opacity: 0.85;">
                    <?php echo wpautop(get_field('sec8_desc')); ?>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4">
                    <?php
                    if(have_rows('sec8_rate')):
                        while(have_rows('sec8_rate')) : the_row();
                    ?>
                    <div class="col-md-6">
                        <div class="testimonial-card bg-white p-4 p-md-5 h-100 position-relative d-flex flex-column" style="border-radius: 0;">
                            <div class="quote-icon position-absolute top-0 start-0 ms-4 mt-3" style="color: #102a50; font-size: 50px; font-family: Georgia, serif; line-height: 1;">
                                &ldquo;
                            </div>
                            <div class="mt-4 mb-4 text-dark pt-4" style="font-size: 13px; line-height: 1.6; font-weight: 500;">
                                <?php echo wpautop(get_sub_field('desc')); ?>
                            </div>
                            <div class="text-end mt-auto pt-4">
                                <h6 class="mb-1 text-dark fw-bold" style="font-size: 13px;"><?php echo esc_html(get_sub_field('customer_name')); ?></h6>
                                <p class="small text-dark mb-0" style="font-size: 12px;"><?php echo esc_html(get_sub_field('position')); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center mt-5 pt-3 pt-md-5">
            <div class="col-12 text-center d-flex flex-wrap justify-content-center gap-2 gap-md-3">
                <?php
                if(have_rows('sec8_sponsors')):
                    while(have_rows('sec8_sponsors')) : the_row();
                        $image = get_sub_field('image');
                ?>
                <div class="sponsor-logo bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: clamp(80px, 12vw, 130px); height: clamp(80px, 12vw, 130px); padding: 15px;">
                    <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr(get_sub_field('sponsor_name')); ?>">
                </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
