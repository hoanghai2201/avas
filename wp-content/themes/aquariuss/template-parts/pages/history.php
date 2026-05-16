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
                    <h2 class="title-big fw-400 fs-50" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title_s1'); ?></h2>
                        <?php echo get_field('desc_s1'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-3" class="pt-3">
    <div class="container">
        <?php
            if(have_rows('list_item')):
                $i = 1;
                while(have_rows('list_item')) : the_row();
                    $i++;
                    $image = get_sub_field('image');
                    $desc  = get_sub_field('description');
                ?>
                <?php if($i%2 == 0): ?>
                    <div class="row gx-6 mb-5 mbm-1">
                        <div class="col-lg-6 col-md-6 col-sm-12 od-2">
                            <div class="desc-box-normal ptm-0">
                                <div class="fs-20" data-aos="fade-up" data-aos-delay="200">
                                    <?php echo $desc; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 has-hover od-1">
                            <div class="overhidden" data-aos="fade-up" data-aos-delay="100">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row gx-6 mb-5 mbm-1">
                        <div class="col-lg-6 col-md-6 col-sm-12 has-hover">
                            <div class="overhidden" data-aos="fade-up" data-aos-delay="300">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="image-zoom" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="desc-box-normal">
                                <div class="fs-20" data-aos="fade-up" data-aos-delay="200">
                                    <?php echo $desc; ?>
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
</section>