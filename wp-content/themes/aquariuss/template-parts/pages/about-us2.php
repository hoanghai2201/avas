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
    <div class="box-banner relative">
        <?php
            if(wp_is_mobile()){
                $image = get_field('image_mobile_s1');
            } else {
                $image = get_field('image_s1');
            }
        ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <div class="desc-banner pleft">
            <h3 class="title-big text-white"><?php echo get_field('title_s1'); ?></h3>
            <div class="detail-banner">
                <?php echo nl2br(esc_html(get_field('desc_s1'))); ?>
            </div>
        </div>
    </div>
</section>

<section id="section-2" class="py-5">
    <div class="row">
        <div class="col-lg-7 col-sm-12 col-xs-12 has-hover" data-aos="fade-up" data-aos-delay="100">
            <div class="overhidden">
                <img src="<?php echo esc_url(get_field('image_s2')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s2')['alt']); ?>" class="image-zoom" />
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="desc-box pl-5p pt-1">
                <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s2'); ?></h3>
                <div class="detail-banner" data-aos="fade-up" data-aos-delay="200">
                    <?php echo nl2br(esc_html(get_field('desc_s2'))); ?>
                </div>
                <div class="pt-4">
                    <a class="button btn-default mt-3" href="<?php echo esc_url(get_field('button_s2')); ?>"  data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-sm-12 col-xs-12 hidden-mobile">
        </div>
    </div>
</section>

<section id="section-3" class="py-5">
    <div class="row">
        <div class="col-lg-1 col-sm-12 col-xs-12 hidden-mobile">
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12 od-2">
            <div class="desc-box pr-5p pt-1">
                <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s3'); ?></h3>
                <div class="detail-banner" data-aos="fade-up" data-aos-delay="200">
                    <?php echo nl2br(esc_html(get_field('desc_s3'))); ?>
                </div>
                <div class="pt-4">
                    <a class="button btn-default mt-3" href="<?php echo esc_url(get_field('button_s3')); ?>"  data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-12 col-xs-12 has-hover od-1">
            <div class="overhidden" data-aos="fade-up" data-aos-delay="100">
                <img src="<?php echo esc_url(get_field('image_s3')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s3')['alt']); ?>" class="image-zoom" />
            </div>
        </div>
    </div>
</section>

<section id="section-4" class="py-5">
    <div class="row">
        <div class="col-lg-7 col-sm-12 col-xs-12 has-hover">
            <div class="overhidden" data-aos="fade-up" data-aos-delay="100">
                <img src="<?php echo esc_url(get_field('image_s4')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s4')['alt']); ?>" class="image-zoom" />
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="desc-box pl-5p pt-1">
                <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s4'); ?></h3>
                <div class="detail-banner" data-aos="fade-up" data-aos-delay="200">
                    <?php echo nl2br(esc_html(get_field('desc_s4'))); ?>
                </div>
                <div class="pt-4">
                    <a class="button btn-default mt-3" href="<?php echo esc_url(get_field('button_s4')); ?>"  data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-sm-12 col-xs-12 hidden-mobile">
        </div>
    </div>
</section>

<section id="section-5" class="py-5">
    <div class="row">
        <div class="col-lg-1 col-sm-12 col-xs-12 hidden-mobile">
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12 od-2">
            <div class="desc-box pr-5p pt-1">
                <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s5'); ?></h3>
                <div class="detail-banner" data-aos="fade-up" data-aos-delay="200">
                    <?php echo nl2br(esc_html(get_field('desc_s5'))); ?>
                </div>
                <div class="pt-4">
                    <a class="button btn-default mt-3" href="<?php echo esc_url(get_field('button_s5')); ?>"  data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-12 col-xs-12 has-hover od-1">
            <div class="overhidden" data-aos="fade-up" data-aos-delay="100">
                <img src="<?php echo esc_url(get_field('image_s5')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s5')['alt']); ?>" class="image-zoom" />
            </div>
        </div>
    </div>
</section>

<section id="section-6" class="py-5 bg-pink-2">
    <div class="container">
        <div class="row">
            <div class="box-title-thin pb-4" data-aos="fade-up" data-aos-delay="100">
                <h2><?php echo get_field('title_s6'); ?></h2>
            </div>
            <?php
                if(have_rows('list_link')):
                    $i = 1;
                    while(have_rows('list_link')) : the_row();
                        $i++;
                        $page_url = get_sub_field('button_link');
                        $page_id = url_to_postid($page_url);
                        if($page_id):
                            $page = get_post($page_id);
                            if($page):
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-center" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>00">
                                    <a href="<?php echo esc_url(get_permalink($page_id)); ?>" title="<?php echo esc_html($page->post_title); ?>" class="btn-policies"><?php echo esc_html($page->post_title); ?></a>
                                </div>
                                <?php
                            endif;
                        endif;
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>

<section id="section-7" class="pb-3">
    <div class="box-banner relative">
        <?php
            if(wp_is_mobile()){
                $image = get_field('image_mobile_s7');
            } else {
                $image = get_field('image_s7');
            }
        ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <div class="desc-banner bg-2">
            <h3 class="title-big" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s7'); ?></h3>
            <div class="detail-banner" data-aos="fade-up" data-aos-delay="200">
                <?php echo nl2br(esc_html(get_field('desc_s7'))); ?>
            </div>
            <div class="pt-4">
                <a style="border: 0;" class="button btn-default" href="<?php echo esc_url(get_field('button_s7')); ?>"  data-aos="fade-up"><?php echo pll__('Learn More'); ?></a>
            </div>
        </div>
    </div>
</section>