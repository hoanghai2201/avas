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
                <div class="desc-box ptm-0">
                    <h3 class="title-big fw-400 fs-50 pt-2 pb-3"><?php echo get_field('title'); ?></h3>
                    <div class="detail-box-large fs-22">
                        <?php echo get_field('description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-3" class="py-3">
    <div class="container scroll-x">
        <div class="row w-fit-content item-vertical justify-center">
            <?php
                if(have_rows('list_process')):
                    $i = 0;
                    while(have_rows('list_process')) : the_row();
                        $i++;
                        $image  = get_sub_field('image');
                        $title  = get_sub_field('title');
                        $desc   = get_sub_field('description');
                ?>
                <?php if(wp_is_mobile()): ?>
                    <div class="item-process">
                        <div class="step-mb">
                            <span class="text-step-mb"><?php echo pll__('Step'); ?> <?php echo $i; ?></span>
                            <h5><?php echo nl2br($title); ?></h5>
                        </div>
                        <div class="image-step-mb has-hover">
                            <div class="overhidden">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                        <div class="description-step-mb">
                            <?php echo $desc; ?>
                        </div>
                    </div>
                <?php else: ?>
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="content-process">
                        <div class="step">
                            <span class="text-step"><?php echo pll__('Step'); ?></span>
                            <span class="value-step"><?php echo ($i < 10) ? '0'.$i : $i; ?></span>
                        </div>
                        <div class="description-step">
                            <h5><?php echo nl2br($title); ?></h5>
                            <?php echo $desc; ?>
                        </div>
                        <div class="image-step has-hover">
                            <div class="overhidden">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</section>
<section id="section-4" class="pb-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="align-center">
                    <a class="btn-arr" href="<?php echo get_field('button_link'); ?>" data-aos="fade-up">
                        <?php echo pll__('Click Here for OEM Inquiries'); ?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.33333 3.3335L14 8.00016M14 8.00016L9.33333 12.6668M14 8.00016L2 8.00016" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>