<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-1" class="pb-3">
    <div class="box-breadcrumb align-center">
        <ul>
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
                                <li>
                                    <a href="<?php echo esc_url(get_permalink($page_id)); ?>" title="<?php echo esc_html($page->post_title); ?>" class="btn-breadcrumbs fw-400 fs-14"><?php echo esc_html($page->post_title); ?></a>
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.83333 1.33331L13.5 5.99998M13.5 5.99998L8.83333 10.6666M13.5 5.99998L1.5 5.99998" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #ED1B24;"></path>
                                    </svg>
                                </li>
                                <?php
                            endif;
                        endif;
                    endwhile;
                endif;
            ?>
        </ul>
    </div>
</section>

<section id="section-2" class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="desc-box">
                    <h2 class="title-big fw-400 fs-50 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s1'); ?></h2>
                    <div class="box-desc2" data-aos="fade-up" data-aos-delay="200">
                        <?php echo get_field('desc_s1'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-3" class="py-5 ptm-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 od-2">
                <div class="overhidden box-shadow" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?php echo esc_url(get_field('image_s21')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s21')['alt']); ?>" class="image-zoom" />
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 od-3">
                <div class="overhidden box-shadow" data-aos="fade-up" data-aos-delay="300">
                    <img src="<?php echo esc_url(get_field('image_s22')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s22')['alt']); ?>" class="image-zoom" />
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12 has-hover pl-5p pbm-0 od-1">
                <div class="desc-box short-line">
                    <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s2'); ?></h3>
                    <div class="detail-banner fs-20" data-aos="fade-up" data-aos-delay="200">
                        <?php echo get_field('desc_s2'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-4" class="py-5 ptm-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12 col-xs-12 ptm-0">
                <div class="desc-box short-line-2 pl-5p ptm-0">
                    <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s3'); ?></h3>
                    <div class="detail-banner fs-20" data-aos="fade-up" data-aos-delay="200">
                        <?php echo nl2br(esc_html(get_field('desc_s3'))); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-xs-12 has-hover pl-5p">
                <div class="overhidden" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?php echo esc_url(get_field('image_s3')['url']); ?>" alt="<?php echo esc_attr(get_field('image_s3')['alt']); ?>" class="image-zoom" />
                </div>
            </div>
        </div>
    </div>
</section>