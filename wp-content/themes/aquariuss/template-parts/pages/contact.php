<?php
/**
 * Home Page.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<section id="section-1" class="py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 col-sm-12">
                <div class="box-contact">
                <h1 class="fs-50 fw-400"><?php echo get_field('title'); ?></h1>
                <?php
                    if(have_rows('list_info')):
                        $i = 0;
                        while(have_rows('list_info')) : the_row();
                            $i++;
                            $title = get_sub_field('title');
                            $desc  = get_sub_field('description');
                        ?>
                        <div class="info-contact">
                            <div class="row-info">
                                <span class="title-info"><?php echo $title; ?></span>
                                <span class="desc-info"><?php echo nl2br(esc_html($desc)); ?></span>
                            </div>
                        </div>
                        <?php
                        endwhile;
                    endif;
                ?>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="col-inner relative">
                    <?php
                        $contact_form = get_field('form_contact');
                        if ($contact_form) {
                            $form_id = $contact_form->ID;
                            echo do_shortcode('[contact-form-7 id="'.$form_id.'" title="Form Contact"]');
                        } else {
                            echo do_shortcode('[contact-form-7 id="dc41220" title="Form Contact"]');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-2" class="box-maps">
    <?php echo get_field('maps'); ?>
</section>