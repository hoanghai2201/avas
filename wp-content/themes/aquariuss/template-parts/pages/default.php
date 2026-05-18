<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-1" class="pb-5">
    <div class="box-banner banner-about relative">
        <?php
            if(wp_is_mobile()){
                $image = get_field('image_mobile_s1');
            } else {
                $image = get_field('image_s1');
            }
        ?>
        <div class="box-image-banner relative">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <h3 class="title-big show-mobile hidden-pc text-white"><?php echo get_field('title_s1'); ?></h3>
        </div>
        <div class="desc-banner pleft">
            <div class="detail-banner">
                <h3 class="title-big fs-62 text-white show-pc hidden-mobile"><?php echo get_field('title_s1'); ?></h3>
                <?php echo esc_attr(get_field('desc_s1')); ?>
            </div>
        </div>
    </div>
</section>

<section id="section-2" class="mt-3">
    <div class="about-box">
        <?php
            if(have_rows('list_info')):
                $i = 1;
                while(have_rows('list_info')) : the_row();
                    $i++;
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $desc  = get_sub_field('description');
                    $link  = get_sub_field('link_button');
                ?>
                <?php if($i%2 == 0): ?>
                    <div class="about-iteam">
                        <div class="image-about w55p has-hover od-1">
                            <div class="overhidden" data-aos="fade-up" data-aos-delay="300">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                        <div class="info-about w41p p-right od-2">
                            <div class="desc-box">
                                <h3 class="title-big fw-400 fs-50 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo nl2br($title); ?></h3>
                                <div class="detail-box" data-aos="fade-up" data-aos-delay="200">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </div>
                                <div class="align-center-mb">
                                    <a class="button btn-default mt-5 mtm-12" href="<?php echo esc_url($link); ?>" data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="about-iteam">
                        <div class="info-about p-left w41p od-2">
                            <div class="desc-box ptm-0">
                                <h3 class="title-big fw-400 fs-50 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo $title; ?></h3>
                                <div class="detail-box" data-aos="fade-up" data-aos-delay="200">
                                    <?php echo nl2br(esc_html($desc)); ?>
                                </div>
                                <div class="align-center-mb">
                                    <a class="button btn-default mt-5 mtm-12" href="<?php echo esc_url($link); ?>" data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="image-about w55p od-1 has-hover">
                            <div class="overhidden" data-aos="fade-up" data-aos-delay="100">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</section>