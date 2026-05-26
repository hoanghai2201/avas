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

<!-- Section 2: Company Info -->
<section id="section-2" class="py-5" style="background-color: #e5e5e5;">
    <div class="container py-4 py-md-5">
        <div class="row align-items-center">
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
<section id="section-3" class="position-relative pt-5" style="background-color: #e5e5e5;">
    <!-- Box Video thu nhỏ (khoảng 80%) và nằm đè lên biên giới 2 khối màu -->
    <div class="container position-relative" style="z-index: 2;">
        <div class="mx-auto shadow-lg bg-dark position-relative" style="max-width: 900px; aspect-ratio: 16/9; overflow: hidden;">
            <?php 
            $sec3_image_video = get_field('sec3_image_video');
            $sec3_video = get_field('sec3_video'); 
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
                    <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="48" stroke="white" stroke-width="4" fill="transparent"/>
                        <path d="M40 30 L40 70 L75 50 Z" fill="white"/>
                    </svg>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Stats and Vision/Mission Block (Nền xanh kéo lên để video đè lên) -->
    <div class="stats-vision-mission-wrap w-100 position-relative" style="background: url('<?php echo get_template_directory_uri(); ?>/images/bg-pattern.png') #0a2558 no-repeat left center; background-size: cover; margin-top: -150px; padding-top: 200px; padding-bottom: 80px; z-index: 1;">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- Tầm nhìn (Vision) -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <!-- Sửa lại: Có viền cam ở DƯỚI ĐÁY -->
                    <div class="bg-white p-4 h-100 shadow-sm position-relative d-flex flex-column justify-content-center" style="border-bottom: 6px solid #d97539;">
                        <?php $sec3_icon1 = get_field('sec3_icon1'); if($sec3_icon1): ?>
                            <!-- Icon lơ lửng góc trên trái -->
                            <div class="position-absolute d-flex align-items-center justify-content-center" style="top: -25px; left: -15px; background: #d97539; width: 60px; height: 60px;">
                                <img src="<?php echo esc_url($sec3_icon1['url']); ?>" alt="Tầm nhìn" style="width: 32px; height: 32px; filter: brightness(0) invert(1);">
                            </div>
                        <?php endif; ?>
                        <h4 class="fw-bold text-dark mt-3 mb-2" style="font-size: 20px; padding-left: 15px;"><?php echo get_field('sec3_title1'); ?></h4>
                        <div class="text-dark small" style="line-height: 1.5; font-size: 13px;">
                            <?php echo wpautop(get_field('sec3_desc1')); ?>
                        </div>
                    </div>
                </div>
                
                <!-- Stats -->
                <div class="col-lg-4 mb-4 mb-lg-0 px-lg-4 d-flex align-items-center">
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
                            <div class="position-absolute d-flex align-items-center justify-content-center" style="top: -25px; left: -15px; background: #d97539; width: 60px; height: 60px;">
                                <img src="<?php echo esc_url($sec3_icon2['url']); ?>" alt="Sứ mệnh" style="width: 32px; height: 32px; filter: brightness(0) invert(1);">
                            </div>
                        <?php endif; ?>
                        <h4 class="fw-bold text-dark mt-3 mb-2" style="font-size: 20px; padding-left: 15px;"><?php echo get_field('sec3_title2'); ?></h4>
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
<section id="section-4" class="py-5" style="background-color: #e5e5e5;">
    <div class="container py-4 py-md-5">
        <div class="row align-items-stretch">
            <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5 d-flex flex-column justify-content-center">
                <h2 class="text-uppercase fw-bold text-blue mb-5 pb-2" style="color: #3e6896; font-size: 28px;" data-aos="fade-up">
                    <?php echo get_field('sec4_title'); ?>
                </h2>
                
                <?php if(have_rows('values')): ?>
                    <div class="core-values-list">
                        <?php while(have_rows('values')): the_row(); 
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $desc = get_sub_field('desc');
                            if (!$desc) $desc = get_sub_field('description');
                        ?>
                        <div class="d-flex align-items-start mb-4" data-aos="fade-up">
                            <div class="flex-shrink-0 me-3" style="width: 50px; height: 50px; background-color: #3e6896; display: flex; align-items: center; justify-content: center;">
                                <?php if($icon): ?>
                                    <!-- Đổi filter để icon màu trắng nét thanh -->
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="icon" style="width: 28px; height: 28px; filter: brightness(0) invert(1); object-fit: contain;">
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow-1 pt-1">
                                <h5 class="fw-bold mb-1 text-dark" style="font-size: 16px;"><?php echo esc_html($title); ?></h5>
                                <div class="text-dark small" style="line-height: 1.5; font-size: 12px;">
                                    <?php echo wpautop($desc); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7">
                <?php $sec4_image = get_field('sec4_image'); if($sec4_image): ?>
                    <img src="<?php echo esc_url($sec4_image['url']); ?>" class="w-100 h-100 rounded-0 obj-fit-cover" style="min-height: 400px;" alt="Giá trị cốt lõi">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Capabilities -->
<section id="section-5" class="py-5 bg-white position-relative" style="background: url('<?php echo get_template_directory_uri(); ?>/images/bg-pattern-light.png') no-repeat left center;">
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
            <!-- Bỏ viền, thêm shadow lớn hơn giống thẻ nổi bật -->
            <div class="card mb-4 border-0 shadow bg-white rounded-4" style="border-radius: 16px; overflow: hidden;" data-aos="fade-up">
                <div class="row g-0 align-items-stretch">
                    <div class="col-md-5">
                        <?php if($image): ?>
                            <!-- Ảnh luôn ở trái, full height -->
                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid w-100 h-100 obj-fit-cover" alt="<?php echo esc_attr($title); ?>" style="min-height: 250px;">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 position-relative">
                            <!-- Đường kẻ cam ở lề trái của text -->
                            <div class="position-absolute h-50" style="width: 5px; background: #d97539; left: 0; top: 25%; border-radius: 0 4px 4px 0;"></div>
                            
                            <h4 class="card-title fw-bold text-blue mb-3 ms-4" style="color: #3e6896; font-size: 20px;"><?php echo esc_html($title); ?></h4>
                            <div class="card-text text-dark ms-4" style="line-height: 1.6; font-size: 13px;">
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
                global $post;
                
                // Left Column - Main Post
                ?>
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <?php 
                    $post = $main_post; 
                    setup_postdata($post); 
                    ?>
                    <!-- Thẻ bài viết lớn có viền mỏng -->
                    <div class="card h-100 border border-light rounded-0 shadow-sm bg-white">
                        <a href="<?php the_permalink(); ?>" class="d-block">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="card-img-top obj-fit-cover rounded-0" style="height: 380px;" alt="<?php the_title(); ?>">
                        </a>
                        <div class="card-body p-4 p-lg-5">
                            <h5 class="card-title fw-bold text-uppercase mb-3" style="font-size: 16px; line-height: 1.5;">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue"><?php the_title(); ?></a>
                            </h5>
                            <p class="card-text text-dark small mb-4" style="font-size: 13px; line-height: 1.6;">
                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn text-white rounded-0 fw-medium px-4 py-2" style="background-color: #3e6896; border: none; font-size: 12px;">ĐỌC THÊM</a>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Other Posts -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="row g-4 flex-column h-100">
                        <?php 
                        // Loop through remaining posts (up to 2)
                        $sub_posts = array_slice($sec6_posts, 1, 2);
                        foreach($sub_posts as $sub_post):
                            $post = $sub_post;
                            setup_postdata($post);
                        ?>
                        <div class="col-12 flex-grow-1">
                            <div class="card border border-light rounded-0 shadow-sm h-100 bg-white">
                                <div class="row g-0 h-100">
                                    <div class="col-md-5">
                                        <a href="<?php the_permalink(); ?>" class="d-block h-100">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" class="w-100 h-100 obj-fit-cover rounded-0" style="min-height: 200px;" alt="<?php the_title(); ?>">
                                        </a>
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="card-body p-4">
                                            <h6 class="card-title fw-bold text-uppercase mb-3" style="font-size: 14px; line-height: 1.5;">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue"><?php the_title(); ?></a>
                                            </h6>
                                            <p class="card-text text-dark small mb-0" style="font-size: 12px; line-height: 1.5;">
                                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        endforeach; 
                        ?>
                    </div>
                </div>
            <?php 
                wp_reset_postdata();
            endif; 
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>