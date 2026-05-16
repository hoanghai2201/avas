<?php
/**
 * Home Page.
 *
 * @package          Aquariuss\Templates
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
<section id="section-2" class="py-3">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <div class="desc-box has-btn btn-has-arrow ptm-0">
                    <h3 class="title-big fw-400 fs-50 pt-2 pb-3" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_1'); ?></h3>
                    <div class="detail-box-large fs-22" data-aos="fade-up" data-aos-delay="200">
                        <?php echo get_field('description_1'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-3" class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="info-item-large-2">
                    <div class="desc-box ptm-0">
                        <h3 class="title-big fw-400 fs-38 pb-2" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_2'); ?></h3>
                        <div class="detail-box-large fs-20" data-aos="fade-up" data-aos-delay="200">
                            <?php echo get_field('description_2'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-4" class="py-3">
    <div class="container pt-2 scroll-x">
        <div class="row w-fit-content g-0 justify-center">
            <?php
                if(have_rows('list_info')):
                    $i = 0;
                    while(have_rows('list_info')) : the_row();
                        $i++;
                        $image  = get_sub_field('image');
                        $title  = esc_attr(get_sub_field('title'));
                        $desc   = get_sub_field('description');
                ?>
                <div class="col" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>00">
                    <div class="align-center pointer">
                        <div class="image-fat img-70">
                            <div class="overhidden" data-aos="fade-up" data-aos-delay="300">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                        <div class="head-food">
                            <h3><a title="<?php echo $title; ?>"><?php echo nl2br(esc_html($title)); ?></a></h3>
                        </div>
                        <div class="description-fat text-left" style="padding-left: 0;padding-right: 0;">
                            <?php echo $desc; ?>
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
<section id="section-5" class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="info-item-large">
                    <div class="desc-box ptm-0">
                        <div class="detail-box-large fs-20" data-aos="fade-up" data-aos-delay="100">
                            <?php echo get_field('description_3'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>