<?php
/**
 * News Page.
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

<!-- Section 2: News List -->
<section id="section-2" class="py-5" style="background-color: #e5e5e5;">
    <div class="container py-4 py-md-5">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'category_name' => 'tin-tuc',
            'posts_per_page' => 7,
            'paged' => $paged
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            $post_count = 0;
            ?>
            
            <div class="news-list-container">
                <?php while ($query->have_posts()) : $query->the_post(); 
                    $post_count++;
                    
                    if ($post_count == 1):
                        // FEATURED POST (FIRST POST)
                ?>
                    <div class="row align-items-center mb-5 pb-5 border-bottom border-secondary border-opacity-25" data-aos="fade-up">
                        <div class="col-lg-6 mb-4 mb-lg-0 pe-lg-5">
                            <a href="<?php the_permalink(); ?>" class="d-block overflow-hidden">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="img-fluid w-100 obj-fit-cover rounded-0 hover-scale" style="height: 400px; transition: transform 0.3s ease;" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                        <div class="col-lg-6 ps-lg-4">
                            <h3 class="fw-bold text-uppercase mb-3" style="font-size: 24px; line-height: 1.4;">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue"><?php the_title(); ?></a>
                            </h3>
                            <div class="text-dark small mb-3" style="font-size: 13px;">
                                <?php echo get_the_date('d/m/Y'); ?>
                            </div>
                            <div class="text-dark mb-4" style="line-height: 1.6; font-size: 14px;">
                                <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn text-white rounded-0 px-4 py-2" style="background-color: #3e6896; border: none; font-size: 13px; font-weight: 500;">
                                ĐỌC THÊM
                            </a>
                        </div>
                    </div>
                    
                    <!-- Bắt đầu Grid cho các bài viết còn lại -->
                    <div class="row g-5">
                <?php else: 
                    // 6 SMALLER POSTS
                ?>
                    <div class="col-lg-4 col-md-6 mb-2" data-aos="fade-up" data-aos-delay="<?php echo ($post_count * 50); ?>">
                        <div class="news-item h-100 d-flex flex-column">
                            <a href="<?php the_permalink(); ?>" class="d-block mb-3 overflow-hidden">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" class="img-fluid w-100 obj-fit-cover rounded-0 hover-scale" style="height: 240px; transition: transform 0.3s ease;" alt="<?php the_title(); ?>">
                            </a>
                            <div class="text-dark small mb-2" style="font-size: 12px;">
                                <?php echo get_the_date('d/m/Y'); ?>
                            </div>
                            <h4 class="fw-bold text-uppercase mb-3" style="font-size: 16px; line-height: 1.5;">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue"><?php the_title(); ?></a>
                            </h4>
                            <div class="text-dark mb-4 flex-grow-1" style="font-size: 13px; line-height: 1.6;">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            <div class="mt-auto">
                                <a href="<?php the_permalink(); ?>" class="btn text-white rounded-0 px-4 py-2" style="background-color: #3e6896; border: none; font-size: 12px; font-weight: 500;">
                                    ĐỌC THÊM
                                </a>
                            </div>
                        </div>
                    </div>
                <?php 
                    endif; 
                endwhile; 
                
                // Đóng Grid nếu có bài viết nhỏ
                if ($post_count > 1): 
                ?>
                    </div> <!-- end row g-5 -->
                <?php endif; ?>
            </div>

            <!-- Phân trang -->
            <?php
            $total_pages = $query->max_num_pages;
            if ($total_pages > 1) {
                $current_page = max(1, get_query_var('paged'));
                echo '<div class="custom-pagination mt-5 pt-4 text-center d-flex justify-content-center align-items-center gap-2">';
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => 'page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                    'next_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>',
                    'type' => 'plain',
                    'mid_size' => 2
                ));
                echo '</div>';
            }
            ?>
            
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-center">Chưa có bài viết nào.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>