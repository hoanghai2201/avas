<?php
/**
 * Home Page.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-1" class="py-3">
    <div class="container">
        <div class="col-lg-12">
            <div class="info-item-large">
                <div class="desc-box ptm-0">
                    <h3 class="title-big fw-400 fs-50 pt-2 pb-3" data-aos="fade-up" data-aos-delay="100"><?php echo get_field('title'); ?></h3>
                    <div class="detail-box-large fs-22" data-aos="fade-up" data-aos-delay="200">
                        <?php echo get_field('description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-2" class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-sm-12">
                <div class="col-inner relative pt-4">
                    <?php
                        $contact_form = get_field('form_contact');
                        if ($contact_form) {
                            $form_id = $contact_form->ID;
                            echo do_shortcode('[contact-form-7 id="'.$form_id.'" title="OEM Inquiries"]');
                        } else {
                            echo do_shortcode('[contact-form-7 id="c4ae206" title="OEM Inquiries"]');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>