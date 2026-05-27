<?php
/**
 * Contact Page Template.
 *
 * @package          Aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
get_header();

$bg = get_field('background');
$bg_url = $bg ? esc_url($bg['url']) : '';
$title = get_field('title');
$desc = get_field('desc');
$hotline = get_field('hotline');
$map = get_field('map');
?>

<div class="contact-page-wrapper">
    
    <!-- Hero Section -->
    <div class="contact-hero position-relative" style="background-image: url('<?php echo $bg_url; ?>');">
        <div class="contact-hero-overlay"></div>
        
        <div class="container position-relative" style="z-index: 2; padding-top: 5rem; padding-bottom: 5rem;">
            <!-- Hero Text Content -->
            <div class="contact-hero-content text-center text-white mb-5">
                <?php if($title): ?>
                    <h1 class="contact-title text-uppercase fw-bold mb-2"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>
                
                <?php if($desc): ?>
                    <p class="contact-desc mb-3"><?php echo nl2br(esc_html($desc)); ?></p>
                <?php endif; ?>
                
                <?php if($hotline): ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $hotline)); ?>" class="contact-hotline-btn">
                        <?php echo esc_html($hotline); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Contact Form Box -->
            <div class="contact-form-container mx-auto">
                <div class="contact-form-box bg-white mx-auto">
                    
                    <!-- Icon top -->
                    <div class="contact-icon-wrap text-center">
                        <div class="contact-icon-circle mx-auto d-flex align-items-center justify-content-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 6l-10 7L2 6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <div class="contact-form-intro text-center mt-3 mb-4">
                        <p class="mb-0" style="color: #0056a8; font-size: 15px; font-weight: 500;">Vui lòng điền thông tin để AVAS hỗ trợ tư vấn</p>
                    </div>

                    <!-- CF7 Form -->
                    <div class="contact-cf7-wrap">
                        <?php echo do_shortcode('[contact-form-7 id="dc41220" title="Form Contact"]'); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="contact-map-section">
        <?php if($map): ?>
            <div class="map-iframe-wrap w-100">
                <?php echo $map; ?>
            </div>
        <?php else: ?>
            <!-- Lấy giá trị map cũ nếu map mới trống -->
            <div class="map-iframe-wrap w-100">
                <?php echo get_field('maps'); ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>