<?php
/**
 * About Us Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
get_header();
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
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(16,42,80,0.8) 0%, rgba(16,42,80,0.4) 50%, rgba(0,0,0,0) 100%);"></div>
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

<!-- Section 2: Company Info -->
 <?php $sec2_bg = get_field('sec2_bg'); ?>
<section id="section-2" class="" style="background: url('<?php echo esc_url($sec2_bg['url']); ?>') no-repeat center center;background-size: 100% 100%;">
    <div class="container py-4 py-md-5">
        <div class="row align-items-center box-s2">
            <!-- Tỉ lệ 50-50 theo yêu cầu -->
            <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-4">
                <?php 
                $sec2_image = get_field('sec2_image'); 
                if($sec2_image): ?>
                    <img src="<?php echo esc_url($sec2_image['url']); ?>" alt="<?php echo esc_attr($sec2_image['alt']); ?>" class="img-fluid rounded-0 w-100 obj-fit-cover" style="height: 450px;">
                <?php endif; ?>
            </div>
            <div class="col-lg-6 ps-lg-4">
                <h2 class="text-uppercase fw-bold text-blue mb-1" style="color: #3e6896; font-size: 32px; letter-spacing: 0.5px;" data-aos="fade-up">
                    <?php echo get_field('sec2_title1'); ?>
                </h2>
                <h2 class="text-uppercase fw-bold mb-4" style="color: #d97539; font-size: 32px; letter-spacing: 0.5px;" data-aos="fade-up" data-aos-delay="100">
                    <?php echo get_field('sec2_title2'); ?>
                </h2>
                <div class="text-dark mb-4 sec2-desc" style="line-height: 1.6; font-size: 14px; text-align: justify;" data-aos="fade-up" data-aos-delay="200">
                    <?php echo wpautop(get_field('sec2_desc')); ?>
                </div>
                
                <?php 
                $sec2_readmore = get_field('sec2_readmore'); 
                if($sec2_readmore): 
                    $btn_link = is_object($sec2_readmore) ? get_permalink($sec2_readmore->ID) : $sec2_readmore;
                ?>
                    <a href="<?php echo esc_url($btn_link); ?>" class="btn text-white text-uppercase px-4 py-2 mt-2 fw-medium" data-aos="fade-up" data-aos-delay="300" style="background-color: #3e6896; border: none; border-radius: 0; font-size: 13px;">
                        Xem thêm
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Vision, Mission & Stats -->
<!-- Khối trên màu xám chứa một nửa video -->
<section id="section-3" class="position-relative pt-0" style="background-color: #fff;">
    <!-- Box Video thu nhỏ (khoảng 80%) và nằm đè lên biên giới 2 khối màu -->
    <div class="container position-relative" style="z-index: 2;">
        <div class="mx-auto shadow-lg bg-dark position-relative" style="max-width: 900px; aspect-ratio: 16/9; overflow: hidden;">
            <?php 
            $sec3_image_video = get_field('sec3_image_video');
            $sec3_video = get_field('sec3_video'); 
            $sec3_bg = get_field('sec3_bg'); 
            ?>
            <!-- Image Thumbnail -->
            <?php if($sec3_image_video): ?>
                <img id="sec3-thumbnail" src="<?php echo esc_url($sec3_image_video['url']); ?>" class="w-100 h-100 obj-fit-cover position-absolute top-0 start-0" alt="Video thumbnail">
            <?php endif; ?>
            
            <!-- Overlay -->
            <div id="sec3-overlay" class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.3);"></div>
            
            <!-- Video Element (Hidden by default) -->
            <?php if($sec3_video): ?>
                <video id="sec3-video-el" class="w-100 h-100 position-absolute top-0 start-0 d-none" controls style="object-fit: cover;">
                    <source src="<?php echo esc_url($sec3_video['url']); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                
                <!-- Play Button -->
                <button id="sec3-play-btn" class="position-absolute top-50 start-50 translate-middle bg-transparent border-0 p-0" style="cursor: pointer; z-index: 3;" onclick="playSec3Video()">
                    <svg width="166" height="166" viewBox="0 0 166 166" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M82.8699 165.74C71.6799 165.74 60.8299 163.55 50.6099 159.23C40.7399 155.06 31.8798 149.08 24.2698 141.47C16.6598 133.86 10.69 125 6.51001 115.13C2.19001 104.91 0 94.0599 0 82.8699C0 71.6799 2.19001 60.8299 6.51001 50.6099C10.68 40.7399 16.6598 31.88 24.2698 24.27C31.8798 16.66 40.7399 10.69 50.6099 6.51001C60.8299 2.19001 71.6799 0 82.8699 0C94.0599 0 104.91 2.19001 115.13 6.51001C125 10.68 133.86 16.66 141.47 24.27C149.08 31.88 155.05 40.7399 159.23 50.6099C163.55 60.8299 165.74 71.6799 165.74 82.8699C165.74 94.0599 163.55 104.91 159.23 115.13C155.06 125 149.08 133.86 141.47 141.47C133.86 149.08 125 155.05 115.13 159.23C104.91 163.55 94.0599 165.74 82.8699 165.74ZM82.8699 8.47998C72.8299 8.47998 63.0799 10.4499 53.9199 14.3199C45.0599 18.0699 37.1098 23.43 30.2698 30.26C23.4398 37.09 18.0698 45.0499 14.3298 53.9099C10.4498 63.0799 8.48999 72.8199 8.48999 82.8599C8.48999 92.8999 10.4598 102.65 14.3298 111.81C18.0798 120.67 23.4398 128.62 30.2698 135.46C37.0998 142.29 45.0599 147.66 53.9199 151.4C63.0899 155.28 72.8299 157.24 82.8699 157.24C92.9099 157.24 102.66 155.27 111.82 151.4C120.68 147.65 128.63 142.29 135.47 135.46C142.3 128.63 147.67 120.67 151.41 111.81C155.29 102.64 157.25 92.8999 157.25 82.8599C157.25 72.8199 155.28 63.0699 151.41 53.9099C147.66 45.0499 142.3 37.1 135.47 30.26C128.64 23.43 120.68 18.0599 111.82 14.3199C102.65 10.4399 92.9099 8.47998 82.8699 8.47998Z" fill="white"/>
                        <path d="M65.3899 127.17C63.4899 127.17 61.5798 126.72 59.8198 125.81C55.7598 123.72 53.23 119.58 53.23 115V50.7098C53.23 46.1398 55.7598 41.9997 59.8198 39.8997C63.8798 37.8097 68.7199 38.1599 72.4399 40.8099L117.51 72.9598C120.7 75.2398 122.61 78.9397 122.61 82.8597C122.61 86.7797 120.7 90.4798 117.51 92.7598L72.4399 124.91C70.3299 126.41 67.8699 127.18 65.3899 127.18V127.17ZM65.4199 47.0298C64.6499 47.0298 64.03 47.2797 63.7 47.4497C63.1 47.7597 61.71 48.6898 61.71 50.7098V115C61.71 117.02 63.1 117.95 63.7 118.26C64.3 118.57 65.86 119.16 67.51 117.99L112.58 85.8399C113.56 85.1399 114.12 84.0597 114.12 82.8597C114.12 81.6597 113.56 80.5697 112.58 79.8797L67.51 47.7298C66.77 47.1998 66.0499 47.0298 65.4199 47.0298Z" fill="white"/>
                    </svg>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Stats and Vision/Mission Block (Nền xanh kéo lên để video đè lên) -->
    <div class="stats-vision-mission-wrap w-100 position-relative" style="background: url('<?php if( $sec3_bg ): echo esc_url($sec3_bg['url']); endif; ?>') #0a2558 no-repeat left center; background-size: cover; margin-top: -150px; padding-top: 200px; padding-bottom: 80px; z-index: 1;">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- Tầm nhìn (Vision) -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <!-- Sửa lại: Có viền cam ở DƯỚI ĐÁY -->
                    <div class="bg-white p-4 h-100 shadow-sm position-relative d-flex flex-column justify-content-center" style="border-bottom: 6px solid #d97539;">
                        <?php $sec3_icon1 = get_field('sec3_icon1'); if($sec3_icon1): ?>
                            <!-- Icon lơ lửng góc trên trái -->
                            <div class="position-absolute d-flex align-items-center justify-content-center w-60" style="top: -25px; left: 20px; background: #d97539; width: 60px; height: 60px;">
                                <img src="<?php echo esc_url($sec3_icon1['url']); ?>" alt="Tầm nhìn" style="max-width: 32px; filter: brightness(0) invert(1);">
                            </div>
                        <?php endif; ?>
                        <h4 class="fw-bold text-dark mt-3 mb-2" style="font-size: 20px; padding:15px 0 3px;"><?php echo get_field('sec3_title1'); ?></h4>
                        <div class="text-dark small" style="line-height: 1.5; font-size: 13px;">
                            <?php echo wpautop(get_field('sec3_desc1')); ?>
                        </div>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="col-lg-4 mb-4 mb-lg-0 px-lg-4 d-flex align-items-center mmb-3">
                    <div class="row text-white text-center g-4 w-100">
                        <div class="col-6">
                            <h2 class="fw-bold mb-1" style="font-size: 36px;"><?php echo get_field('sec3_num1'); ?></h2>
                            <p class="mb-0 small text-light" style="font-size: 13px;"><?php echo get_field('sec3_desc_num1') ? get_field('sec3_desc_num1') : 'Dự án hoàn thành'; ?></p>
                        </div>
                        <div class="col-6">
                            <h2 class="fw-bold mb-1" style="font-size: 36px;"><?php echo get_field('sec3_num2'); ?></h2>
                            <p class="mb-0 small text-light" style="font-size: 13px;"><?php echo get_field('sec3_desc_num2') ? get_field('sec3_desc_num2') : 'Đối tác'; ?></p>
                        </div>
                        <div class="col-6 mt-4">
                            <h2 class="fw-bold mb-1" style="font-size: 36px;"><?php echo get_field('sec3_num3'); ?></h2>
                            <p class="mb-0 small text-light" style="font-size: 13px;"><?php echo get_field('sec3_desc_num3') ? get_field('sec3_desc_num3') : 'Nhân sự'; ?></p>
                        </div>
                        <div class="col-6 mt-4">
                            <h2 class="fw-bold mb-1" style="font-size: 36px;"><?php echo get_field('sec3_num4'); ?></h2>
                            <p class="mb-0 small text-light" style="font-size: 13px;"><?php echo get_field('sec3_desc_num4') ? get_field('sec3_desc_num4') : 'Phản hồi tích cực'; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Sứ mệnh (Mission) -->
                <div class="col-lg-4">
                    <div class="bg-white p-4 h-100 shadow-sm position-relative d-flex flex-column justify-content-center" style="border-bottom: 6px solid #d97539;">
                        <?php $sec3_icon2 = get_field('sec3_icon2'); if($sec3_icon2): ?>
                            <div class="position-absolute d-flex align-items-center justify-content-center w-60" style="top: -25px; left: 20px; background: #d97539; width: 60px; height: 60px;">
                                <img src="<?php echo esc_url($sec3_icon2['url']); ?>" alt="Sứ mệnh" style="max-width: 32px; filter: brightness(0) invert(1);">
                            </div>
                        <?php endif; ?>
                        <h4 class="fw-bold text-dark mt-3 mb-2" style="font-size: 20px; padding: 15px 0 3px;"><?php echo get_field('sec3_title2'); ?></h4>
                        <div class="text-dark small" style="line-height: 1.5; font-size: 13px;">
                            <?php echo wpautop(get_field('sec3_desc2')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script xử lý Video -->
<script>
function playSec3Video() {
    var video = document.getElementById('sec3-video-el');
    var thumbnail = document.getElementById('sec3-thumbnail');
    var overlay = document.getElementById('sec3-overlay');
    var playBtn = document.getElementById('sec3-play-btn');
    
    if(video) {
        // Hiện video, ẩn ảnh và nút
        video.classList.remove('d-none');
        if(thumbnail) thumbnail.classList.add('d-none');
        if(overlay) overlay.classList.add('d-none');
        if(playBtn) playBtn.classList.add('d-none');
        
        video.play();
    }
}
</script>

<!-- Section 4: Core Values -->
<section id="section-4" class="py-2" style="background-color: #fff;">
    <div class="container py-4 py-md-5 box-s2">
        <div class="row align-items-stretch">
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5 d-flex flex-column justify-content-center">
                <h2 class="text-uppercase fw-bold text-blue mb-5 pb-2" style="color: #3e6896; font-size: 28px;" data-aos="fade-up">
                    <?php echo get_field('sec4_title'); ?>
                </h2>
                
                <?php if(have_rows('values')): ?>
                    <div class="core-values-list">
                        <?php while(have_rows('values')): the_row(); 
                            $icon_field = get_sub_field('image');
                            $icon_url = '';
                            if (is_array($icon_field) && isset($icon_field['url'])) {
                                $icon_url = $icon_field['url'];
                            } elseif (is_numeric($icon_field)) {
                                $icon_url = wp_get_attachment_url($icon_field);
                            } elseif (is_string($icon_field) && filter_var($icon_field, FILTER_VALIDATE_URL)) {
                                $icon_url = $icon_field;
                            }
                            
                            $title = get_sub_field('title');
                            $desc = get_sub_field('desc');
                            if (!$desc) $desc = get_sub_field('description');
                        ?>
                        <div class="d-flex align-items-start mb-4" data-aos="fade-up">
                            <div class="flex-shrink-0 me-3" style="width: 50px; height: 50px; background-color: #3e6896; display: flex; align-items: center; justify-content: center;">
                                <?php if($icon_url): ?>
                                    <!-- Đổi filter để icon màu trắng nét thanh -->
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="icon" style="width: 28px; height: 28px; filter: brightness(0) invert(1); object-fit: contain;">
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-1 text-dark" style="font-size: 16px;"><?php echo esc_html($title); ?></h5>
                                <div class="text-dark small text-s4" style="line-height: 1.5; font-size: 12px;">
                                    <?php echo wpautop($desc); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7 img-large-s4">
                <?php $sec4_image = get_field('sec4_image'); if($sec4_image): ?>
                    <img src="<?php echo esc_url($sec4_image['url']); ?>" class="w-100 h-100 rounded-0 obj-fit-cover" style="min-height: 400px;" alt="Giá trị cốt lõi">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $sec5_bg = get_field('sec5_bg'); ?>
<!-- Section 5: Capabilities -->
<section id="section-5" class="py bg-white position-relative" style="background: url('<?php echo esc_url($sec5_bg['url']); ?>') no-repeat left center;">
    <div class="container py-4 py-md-5">
        <h2 class="text-uppercase fw-bold text-blue mb-5 pb-3 text-center text-md-start" style="color: #3e6896; font-size: 28px;" data-aos="fade-up">
            <?php echo get_field('sec5_title'); ?>
        </h2>
        
        <div class="capability-cards">
            <?php if(have_rows('sec5_capacitys')): 
                while(have_rows('sec5_capacitys')): the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                    if (!$desc) $desc = get_sub_field('description');
            ?>
            <div class="mb-5 item-capability" data-aos="fade-up">
                <div class="row align-items-stretch justify-content-between g-4 g-lg-5">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <?php if($image): ?>
                            <!-- Ảnh luôn ở trái, full height -->
                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid w-100 h-100 obj-fit-cover" alt="<?php echo esc_attr($title); ?>" style="min-height: 250px;">
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 mmb-3">
                        <div class="card-body p-4 p-lg-5 position-relative h-100 d-flex flex-column justify-content-center bg-white wm-100">
                            <!-- Đường kẻ cam ở lề trái của text -->
                            <div class="position-absolute h-70" style="width: 15px; background: #d97539; left: -1px; top: 15%; border-radius: 0 20px 20px 0;"></div>
                            <h4 class="card-title fw-bold text-blue mb-4 ms-3" style="color: #3e6896; font-size: 22px;"><?php echo esc_html($title); ?></h4>
                            <div class="card-text text-dark ms-3" style="line-height: 1.8; font-size: 15px;">
                                <?php echo wpautop($desc); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<!-- Section 6: News -->
<section id="section-6" class="py-5 bg-white">
    <div class="container pb-4 pb-md-5">
        <h2 class="text-uppercase fw-bold text-blue mb-4 pb-2 text-center text-md-start" style="color: #3e6896; font-size: 28px;" data-aos="fade-up">
            <?php 
            $sec6_title_link = get_field('sec6_title_link');
            $sec6_title = get_field('sec6_title');
            if($sec6_title_link):
                $news_link = is_object($sec6_title_link) ? get_permalink($sec6_title_link->ID) : $sec6_title_link;
            ?>
                <a href="<?php echo esc_url($news_link); ?>" class="text-decoration-none" style="color: inherit;"><?php echo $sec6_title; ?></a>
            <?php else: ?>
                <?php echo $sec6_title; ?>
            <?php endif; ?>
        </h2>
        
        <div class="row g-4">
            <?php
            $sec6_posts = get_field('sec6_posts');
            
            // If empty, query latest 3 posts
            if (empty($sec6_posts)) {
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                $sec6_posts = $query->posts;
            } else if (is_object($sec6_posts)) {
                $sec6_posts = array($sec6_posts);
            }

            if($sec6_posts && count($sec6_posts) > 0):
                // Main post
                $main_post = $sec6_posts[0];
                ?>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="main-news-card bg-white border d-flex flex-column h-100" style="border-color: #eaeaea;">
                        <a href="<?php echo get_permalink($main_post->ID); ?>" class="d-block overflow-hidden flex-shrink-0">
                            <img src="<?php echo get_the_post_thumbnail_url($main_post->ID, 'large'); ?>" class="w-100 h-auto obj-fit-cover" alt="<?php echo get_the_title($main_post->ID); ?>">
                        </a>
                        <div class="p-4 flex-grow-1">
                            <h5 class="fw-bold mb-3" style="font-size: 18px;"><a href="<?php echo get_permalink($main_post->ID); ?>" class="text-decoration-none text-dark"><?php echo get_the_title($main_post->ID); ?></a></h5>
                            <p class="text-dark mb-3 fs-14" style="line-height: 1.6;"><?php echo wp_trim_words(get_the_excerpt($main_post->ID), 30); ?></p>
                            <div class="mmt-1">
                                <a href="<?php echo get_permalink($main_post->ID); ?>" class="btn text-white px-4 py-2 rounded-0 fw-medium" style="background-color: #3e6896; font-size: 13px;">ĐỌC THÊM</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex flex-column h-100 gap-4">
                        <?php
                        for($i = 1; $i < min(3, count($sec6_posts)); $i++):
                            $sub_post = $sec6_posts[$i];
                        ?>
                        <div class="sub-news-card bg-white d-flex flex-grow-1 border overflow-hidden" style="border-color: #eaeaea; min-height: 0;">
                            <div class="w-50 position-relative h-100">
                                <a href="<?php echo get_permalink($sub_post->ID); ?>" class="d-block h-100 w-100 overflow-hidden position-absolute top-0 start-0">
                                    <img src="<?php echo get_the_post_thumbnail_url($sub_post->ID, 'medium'); ?>" class="w-100 h-100 obj-fit-cover" alt="<?php echo get_the_title($sub_post->ID); ?>">
                                </a>
                            </div>
                            <div class="w-50 p-4 d-flex flex-column justify-content-center">
                                <h6 class="fw-bold mb-3" style="font-size: 16px; line-height: 1.4;"><a href="<?php echo get_permalink($sub_post->ID); ?>" class="text-decoration-none text-dark"><?php echo get_the_title($sub_post->ID); ?></a></h6>
                                <p class="text-dark small mb-4" style="line-height: 1.5;"><?php echo wp_trim_words(get_the_excerpt($sub_post->ID), 12); ?></p>
                                <div>
                                    <a href="<?php echo get_permalink($sub_post->ID); ?>" class="btn text-white px-3 py-2 rounded-0 fw-medium" style="background-color: #3e6896; font-size: 12px;">ĐỌC THÊM</a>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php 
            endif; 
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>