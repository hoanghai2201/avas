<?php
/**
 * Services Page.
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
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(16,42,80,0.8) 0%, rgba(16,42,80,0.4) 50%, rgba(0,0,0,0) 100%);"></div>
                <div class="slider-content position-absolute top-50 translate-middle-y text-white px-3 px-md-5" style="left: 0; max-width: 800px;">
                    <div class="ps-md-5 ms-md-4">
                        <h1 class="fw-bold text-uppercase mb-2" style="font-size: clamp(32px, 5vw, 60px); line-height: 1.2;"><?php echo nl2br(esc_html($title)); ?></h1>
                        <p class="mb-4 text-light" style="font-size: clamp(16px, 2vw, 20px);"><?php echo wp_kses_post($desc); ?></p>
                        <?php if($link): ?>
                        <a href="<?php echo $link; ?>" class="btn text-white fw-bold px-4 py-3 text-uppercase rounded-0" style="background-color: #F96305; border: none; font-size: 16px;">
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

<!-- Section 2: QUY TRÌNH LÀM VIỆC -->
<section id="section-2" class="py-5" style="background-color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="text-uppercase fw-bold text-blue mb-3" style="color: #3e6896; font-size: 32px;" data-aos="fade-up">
                <?php echo get_field('title_sec2'); ?>
            </h2>
            <div class="text-dark mx-auto" style="max-width: 800px; font-size: 16px; line-height: 1.6;" data-aos="fade-up" data-aos-delay="100">
                <?php echo wpautop(get_field('desc_sec2')); ?>
            </div>
        </div>

        <div class="process-timeline position-relative d-none d-lg-block mt-5 pt-4" style="min-height: 300px;">
            <?php 
            $services = get_field('services_sec2');
            if($services): 
                $count = count($services);
            ?>
            
            <!-- SVG Connectors -->
            <svg class="position-absolute w-100 h-100" style="top: 0; left: 0; z-index: 1; pointer-events: none;">
                <defs>
                    <marker id="arrow" viewBox="0 0 10 10" refX="8" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
                        <path d="M 0 0 L 10 5 L 0 10 z" fill="#3e6896" />
                    </marker>
                </defs>
                <?php
                for($i = 0; $i < $count - 1; $i++):
                    $is_odd = ($i % 2 == 0);
                    $x1 = ($i + 0.5) * (100 / $count);
                    $x2 = ($i + 1.5) * (100 / $count);
                    
                    $y1 = $is_odd ? 40 : 164;
                    $y2 = $is_odd ? 164 : 40;
                    
                    echo '<line x1="'.$x1.'%" y1="'.$y1.'" x2="'.$x2.'%" y2="'.$y2.'" stroke="#3e6896" stroke-width="2" stroke-dasharray="5,5" marker-end="url(#arrow)" />';
                endfor;
                ?>
            </svg>

            <div class="row g-0 text-center position-relative" style="z-index: 2;">
                <?php foreach($services as $index => $item):
                    $is_odd = ($index % 2 == 0);
                    $title = isset($item['title']) ? $item['title'] : '';
                    $desc = isset($item['desc']) ? $item['desc'] : (isset($item['description']) ? $item['description'] : '');
                    $icon = isset($item['icon']) ? $item['icon'] : (isset($item['image']) ? $item['image'] : '');
                ?>
                <div class="col px-2">
                    <?php if($is_odd): ?>
                        <!-- Icon High -->
                        <div class="process-icon-wrap mx-auto d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background-color: #3e6896; " data-aos="zoom-in" data-aos-delay="<?php echo $index * 100; ?>">
                            <?php if($icon): ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="icon" style="width: 35px; height: 35px; filter: brightness(0) invert(1); object-fit: contain;">
                            <?php endif; ?>
                        </div>
                        <!-- Text Low -->
                        <div class="mt-3 pt-4 px-2" data-aos="fade-up" data-aos-delay="<?php echo $index * 100 + 100; ?>">
                            <h5 class="fw-bold text-dark mb-2" style="font-size: 15px;"><?php echo esc_html($title); ?></h5>
                            <div class="small text-muted" style="font-size: 13px; line-height: 1.5; text-align: center;"><?php echo wpautop($desc); ?></div>
                        </div>
                    <?php else: ?>
                        <!-- Text High -->
                        <div class="mb-3 px-2" style="height: 90px; display: flex; flex-direction: column; justify-content: flex-end;" data-aos="fade-down" data-aos-delay="<?php echo $index * 100 + 100; ?>">
                            <h5 class="fw-bold text-dark mb-2" style="font-size: 15px;"><?php echo esc_html($title); ?></h5>
                            <div class="small text-muted" style="font-size: 13px; line-height: 1.5; text-align: center;"><?php echo wpautop($desc); ?></div>
                        </div>
                        <!-- Icon Low -->
                        <div class="process-icon-wrap mx-auto d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background-color: #3e6896;  margin-top: 18px;" data-aos="zoom-in" data-aos-delay="<?php echo $index * 100; ?>">
                            <?php if($icon): ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="icon" style="width: 35px; height: 35px; filter: brightness(0) invert(1); object-fit: contain;">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Mobile view for process -->
        <div class="process-timeline-mobile d-block d-lg-none mt-4">
            <?php if($services): 
                $count = count($services);
                foreach($services as $index => $item):
                    $title = isset($item['title']) ? $item['title'] : '';
                    $desc = isset($item['desc']) ? $item['desc'] : (isset($item['description']) ? $item['description'] : '');
                    $icon = isset($item['icon']) ? $item['icon'] : (isset($item['image']) ? $item['image'] : '');
            ?>
            <div class="d-flex mb-4 align-items-start position-relative" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <?php if($index < $count - 1): ?>
                    <!-- Vertical line connector -->
                    <div style="position: absolute; left: 30px; top: 60px; bottom: -20px; width: 2px; border-left: 2px dashed #3e6896; z-index: 1;"></div>
                <?php endif; ?>
                <div class="flex-shrink-0" style="position: relative; z-index: 2;">
                    <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background-color: #3e6896; border: 3px solid #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                        <?php if($icon): ?>
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="icon" style="width: 25px; height: 25px; filter: brightness(0) invert(1); object-fit: contain;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3 pt-2">
                    <h5 class="fw-bold text-dark mb-2" style="font-size: 15px;"><?php echo esc_html($title); ?></h5>
                    <div class="small text-muted" style="font-size: 13px; line-height: 1.5;"><?php echo wpautop($desc); ?></div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Section 3: SẢN PHẨM DỊCH VỤ -->
<section id="section-3" class="py-5" style="background-color: #fff;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="text-uppercase fw-bold text-blue mb-3" style="color: #3e6896; font-size: 32px;" data-aos="fade-up">
                <?php echo get_field('title_sec3'); ?>
            </h2>
            <div class="text-dark mx-auto" style="max-width: 800px; font-size: 16px; line-height: 1.6;" data-aos="fade-up" data-aos-delay="100">
                <?php echo wpautop(get_field('desc_sec3')); ?>
            </div>
        </div>

        <div class="row g-4 mt-2 g-4 g-lg-5">
            <?php
            $args = array(
                'post_type' => 'post',
                'category_name' => 'dich-vu',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                $i = 1;
                while ($query->have_posts()): $query->the_post();
                    $num = sprintf("%02d", $i);
            ?>
            <div class="col-lg-6 mb-3" data-aos="fade-up" data-aos-delay="<?php echo ($i % 4) * 100; ?>">
                <div class="service-card h-100 bg-white rounded-0 shadow-sm border-0 position-relative d-flex flex-column transition-all">
                    <div class="p-4 p-md-5 d-flex flex-column flex-grow-1">
                        <h4 class="fw-bold mb-3 d-flex align-items-center text-uppercase" style="font-size: 18px; color: #3e6896;">
                            <span style="color: #F96305; margin-right: 12px; font-size: 20px;"><?php echo $num; ?>.</span> 
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: inherit; transition: color 0.3s;"><?php the_title(); ?></a>
                        </h4>
                        <div class="text-dark small mb-4 flex-grow-1" style="font-size: 14px; line-height: 1.6; text-align: justify;">
                            <?php echo wp_trim_words(get_the_excerpt(), 40); ?>
                        </div>
                        <div class="text-end mt-auto">
                            <a href="<?php the_permalink(); ?>" class="d-inline-flex align-items-center justify-content-center text-decoration-none" style="width: 40px; height: 40px; border: 1px solid #c0c0c0; color: #a0aec0; transition: all 0.3s;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php if (has_post_thumbnail()): ?>
                    <div class="w-100" style="height: 300px; overflow: hidden;">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="w-100 h-100 obj-fit-cover" style="transition: transform 0.5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'" alt="<?php the_title(); ?>">
                    </div>
                    <?php else: ?>
                    <div class="w-100 bg-light" style="height: 300px;"></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
                $i++;
                endwhile; 
                wp_reset_postdata();
            endif; 
            ?>
        </div>
    </div>
</section>

<!-- Section 4: PHƯƠNG CHÂM HOẠT ĐỘNG -->
<section id="section-4" class="py-5" style="background-color: #fff; padding-bottom: 5rem !important;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="text-uppercase fw-bold text-blue mb-3" style="color: #3e6896; font-size: 32px;" data-aos="fade-up">
                <?php echo get_field('title_sec4'); ?>
            </h2>
            <div class="text-dark mx-auto" style="max-width: 800px; font-size: 16px; line-height: 1.6;" data-aos="fade-up" data-aos-delay="100">
                <?php echo wpautop(get_field('desc_sec4')); ?>
            </div>
        </div>

        <div class="row g-4 justify-content-center mt-4">
            <?php if(have_rows('list_sec4')): 
                $delay = 100;
                while(have_rows('list_sec4')): the_row();
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                    if (!$desc) $desc = get_sub_field('description');
                    $icon = get_sub_field('icon');
                    if (!$icon) $icon = get_sub_field('image');
            ?>
            <div class="col-lg-4 col-md-6 text-center px-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <div class="mx-auto mb-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 110px; height: 110px; background-color: #1e5088; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <?php if($icon): ?>
                        <img src="<?php echo esc_url($icon['url']); ?>" alt="icon" style="width: 50px; height: 50px; filter: brightness(0) invert(1); object-fit: contain;">
                    <?php endif; ?>
                </div>
                <h4 class="fw-bold text-uppercase mb-3" style="font-size: 18px; color: #1a1a1a;"><?php echo esc_html($title); ?></h4>
                <div class="text-dark small mx-auto w-50" style="font-size: 14px; line-height: 1.6; max-width: 90%;">
                    <?php echo wpautop($desc); ?>
                </div>
            </div>
            <?php 
                $delay += 100;
                endwhile; 
            endif; ?>
        </div>
    </div>
</section>