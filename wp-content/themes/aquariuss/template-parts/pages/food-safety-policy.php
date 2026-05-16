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
<section id="section-2" class="py-4">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <div class="desc-box ptm-0">
                    <h3 class="title-big fw-400 fs-50 pt-2 pb-3" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title'); ?></h3>
                    <div class="detail-box-large" data-aos="fade-up" data-aos-delay="200">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>