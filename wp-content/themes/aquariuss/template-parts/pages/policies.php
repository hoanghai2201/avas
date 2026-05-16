<?php
/**
 * Home Page.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-2" class="py-4">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <div class="desc-box ptm-0">
                    <h3 class="title-big fw-400 fs-50 pt-2 pb-3" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title'); ?></h3>
                    <div class="detail-box-large fs-20" data-aos="fade-up" data-aos-delay="200">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>