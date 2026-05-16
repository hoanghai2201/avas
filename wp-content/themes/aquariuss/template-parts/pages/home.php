<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section class="section-1">
    <div class="main-carousel">
        <?php
            if(have_rows('slide')):
                while(have_rows('slide')) : the_row();
                    if(wp_is_mobile()){
                        $image = get_sub_field('image_mobile');
                    } else {
                        $image = get_sub_field('image_pc');
                    }
                    $link = esc_url(get_sub_field('link'));
            ?>
            <div class="carousel-cell">
                <a href="<?php echo $link; ?>" title="<?php echo esc_attr($image['alt']); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" class="w-100" alt="<?php echo esc_attr($image['alt']); ?>">
                </a>
            </div>
            <?php
                endwhile;
            endif;
        ?>
    </div>
</section>

<section id="section-2" class="py-5 bg-pink category-project" data-aos="fade-up">
    <div class="container">
        <div class="row w-auto g-3 justify-center gmb-15">
            <?php
                if(have_rows('list_project')):
                    while(have_rows('list_project')) : the_row();
                        $image  = get_sub_field('image_pc');
                        $image2 = get_sub_field('image_hover');
                        $title  = esc_attr(get_sub_field('title'));
                        $link   = esc_url(get_sub_field('link'));
                ?>
                <div class="col-md-2 col-sm-4 col-xs-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="item-project align-center pointer">
                        <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
                            <img class="img-nohover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <img class="img-hover" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
                        </a>
                        <h3><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                    </div>
                </div>
                <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>

<section id="section-3" class="py-5">
    <div class="container">
        <div class="box-title mb-5" data-aos="fade-up">
            <h2><?php echo get_field('title_s3'); ?></h2>
        </div>
        <?php if(wp_is_mobile()): ?>
            <div class="carousel product-list product-mb js-flickity" data-flickity='{ "wrapAround": true, "pageDots": false, "groupCells": 1, "freeScroll": false, "cellAlign": "left" }'>
                <?php
                    if(have_rows('list_product')):
                        while(have_rows('list_product')) : the_row();
                            $image  = get_sub_field('image_pc');
                            $title  = esc_attr(get_sub_field('title'));
                            $isNew  = esc_attr(get_sub_field('is_new'));
                            $link   = esc_url(get_sub_field('link'));
                            $imgNew = esc_url(get_option('icon_new'));
                            if(empty($imgNew)){
                                $imgNew = $domain.'/wp-content/themes/aquariuss/images/new.svg';
                            }
                            if($isNew){
                                $imageNew = '<img class="new-img right" src="'.$imgNew.'">';
                            }else{
                                $imageNew = '';
                            }
                    ?>
                    <div class="carousel-cell">
                        <div class="new-product align-center has-hover" data-aos="fade-up" data-aos-delay="100">
                            <div class="product-new"><?php echo $imageNew; ?></div>
                            <a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><img class="product-img image-zoom" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></a>
                            <h3><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    endif;
                ?>
            </div>
        <?php else: ?>
            <div class="carousel product-list-pc js-flickity" data-flickity='{ "cellAlign": "left","imagesLoaded": true,"lazyLoad": 1,"wrapAround": true,"pageDots": false,"groupCells": 5, "freeScroll": false }'>
                <?php
                    if(have_rows('list_product')):
                        while(have_rows('list_product')) : the_row();
                            $image  = get_sub_field('image_pc');
                            $title  = esc_attr(get_sub_field('title'));
                            $isNew  = esc_attr(get_sub_field('is_new'));
                            $link   = esc_url(get_sub_field('link'));
                            $imgNew = esc_url(get_option('icon_new'));
                            if(empty($imgNew)){
                                $imgNew = $domain.'/wp-content/themes/aquariuss/images/new.svg';
                            }
                            if($isNew){
                                $imageNew = '<img class="new-img right" src="'.$imgNew.'">';
                            }else{
                                $imageNew = '';
                            }
                    ?>
                    <div class="carousel-cell">
                        <div class="new-product align-center has-hover" data-aos="fade-up" data-aos-delay="100">
                            <div class="product-new"><?php echo $imageNew; ?></div>
                            <a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><img class="product-img image-zoom" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></a>
                            <h3><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    endif;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section id="section-4" class="py-5 bg-gray">
    <div class="container">
        <div class="box-title mb-5" data-aos="fade-up">
            <h2><?php echo get_field('title_s4'); ?></h2>
        </div>
        <div class="row g-3 c-block mb-3 align-items-center">
            <div class="col-md-6 col-sm-12">
                <div class="relative box-color-img">
                    <div class="box-color" style="background: url(<?php echo esc_url(get_field('image_color')['url']); ?>) repeat top left;" data-aos="fade-up">
                        <div class="relative fulfill">
                            <div class="content-project">
                                <img src="<?php echo $domain; ?>/wp-content/themes/aquariuss/images/project-icon.svg" />
                                <div class="line"></div>
                                <span><?php echo esc_attr(get_field('title_lab')); ?></span>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo esc_url(get_field('image_lab')['url']); ?>" alt="<?php echo esc_attr(get_field('image_lab')['alt']); ?>" data-aos="fade-up" data-aos-delay="400" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <p class="fs-18 fw-500" data-aos="fade-up"><?php echo esc_attr(get_field('text_bold')); ?></p>
                <p data-aos="fade-up" data-aos-delay="400"><?php echo esc_attr(get_field('text_normal')); ?></p>
                <div class="align-center-mb">
                    <a class="button btn-default mt-3" href="<?php echo esc_url(get_field('link_s4')); ?>" data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-5" class="py-5 mb-4">
    <div class="container">
        <div class="box-title mb-5" data-aos="fade-up">
            <h2><?php echo get_field('title_s5'); ?></h2>
        </div>
        <div class="row g-4 align-items-stretch ptm-1">
            <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <?php
                    $one_post = get_field('main_news');
                    if($one_post): ?>
                    <div class="card main-card w-100 has-hover">
                        <div class="overhidden">
                            <a href="<?php echo get_permalink($one_post->ID); ?>" title="<?php echo get_the_title($one_post->ID); ?>">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($one_post, 'large')); ?>" class="card-img-top image-zoom" alt="<?php echo get_the_title($one_post->ID); ?>">
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-2"><?php echo get_the_date('F j, Y', $one_post->ID); ?></p>
                            <h5 class="card-title"><a href="<?php echo get_permalink($one_post->ID); ?>"><?php echo get_the_title($one_post->ID); ?></a></h5>
                            <p class="card-text hidden-mobile"><?php echo wp_trim_words(get_the_excerpt($one_post->ID), 30, '...'); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 d-flex pr-0 gym-3">
                <div class="row g-3 w-100 row-equal">
                    <?php
                        $list_subnews = get_field('small_news');
                        $i = 0;
                        if($list_subnews): ?>
                            <?php foreach($list_subnews as $post):
                                $i++;
                                setup_postdata($post); 
                                $publish_date = get_the_date('F j, Y'); ?>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>00">
                                    <div class="card small-card has-hover">
                                        <div class="overhidden">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'medium')); ?>" class="card-img-top image-zoom" alt="<?php the_title(); ?>">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted mb-2"><?php echo esc_html($publish_date); ?></p>
                                            <h6 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="align-center">
                <a class="button btn-default mt-3" href="<?php echo esc_url(get_field('link_all_news')); ?>" data-aos="fade-up">
                    <?php echo pll__('View All News'); ?>
                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.83333 1.33331L13.5 5.99998M13.5 5.99998L8.83333 10.6666M13.5 5.99998L1.5 5.99998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="section-6" class="bg-contact py-5">
    <div class="container">
        <div class="g-3 c-block mb-3">
            <div class="box-info" data-aos="fade-up" data-aos-delay="100">
                <div class="box-title mb-4">
                    <h2><?php echo esc_attr(get_field('title_s61')); ?></h2>
                </div>
                <div class="align-center">
                    <p><?php echo esc_attr(get_field('description_box_1')); ?></p>
                    <a class="btn-second mt-4" href="<?php echo esc_url(get_field('link_button_1')); ?>"><?php echo esc_attr(get_field('text_button_1')); ?></a>
                </div>
            </div>
            <div class="box-info" data-aos="fade-up" data-aos-delay="200">
                <div class="box-title mb-4">
                    <h2><?php echo esc_attr(get_field('title_s62')); ?></h2>
                </div>
                <div class="align-center">
                    <div class="py-4 mb-2 d-flex align-items-center justify-center">
                        <img src="<?php echo $domain; ?>/wp-content/themes/aquariuss/images/phone2.svg" /><a href="tel:<?php echo str_replace(['.','+','(',')',' '],'', get_field('description_box_2')); ?>" class="f-big"><?php echo esc_attr(get_field('description_box_2')); ?></a>
                    </div>
                    <a class="btn-second" href="<?php echo esc_attr(get_field('link_button_2')); ?>">
                        <?php echo esc_attr(get_field('text_button_2')); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
