<?php
/**
 * Footer.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<div class="c-footer-main py-4">
    <div class="container">
        <div class="row custom-footer-row">
            
            <!-- Col 1: Company Info -->
            <div class="col-lg-5 col-md-12 mb-4 mb-lg-0 footer-col-info">
                <div class="footer-logo mb-4">
                    <a href="<?php echo $domain; ?>">
                        <img src="<?php echo esc_url(get_option('site_logo')); ?>" alt="<?php echo get_bloginfo('name') ?>" />
                    </a>
                </div>
                <div class="footer-company-info">
                    <h4 class="company-name"><?php echo get_option('site_title'); ?></h4>
                    <p>Trụ sở Hà Nội: <?php echo get_option('site_address'); ?></p>
                    <p>Văn phòng HCM: <?php echo get_option('site_address2'); ?></p>
                    <p>Hotline hỗ trợ: <?php echo get_option('site_phone_number'); ?></p>
                </div>
            </div>

            <!-- Col 2: Menu Footer 1 -->
            <div class="col-lg-1-5 col-md-6 mb-4 mb-lg-0 footer-col-menu">
                <div class="c-footer-list">
                    <ul class="list-unstyled">
                        <?php
                            $menu_name = 'Menu Footer 1'; 
                            $menu_items = wp_get_nav_menu_items($menu_name);
                            if ($menu_items) {
                                foreach ($menu_items as $item) {
                                    if ($item->menu_item_parent == 0) {
                                        $title = $item->title;
                                        $url = $item->url;
                                        echo '<li>';
                                            echo '<a title="'.esc_html($title).'" href="'.esc_url($url).'">'.esc_html($title).'</a>';
                                        echo '</li>';
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Col 3: Menu Footer 2 and Social -->
            <div class="col-lg-1-5 col-md-6 mb-4 mb-lg-0 footer-col-menu">
                <div class="c-footer-list">
                    <ul class="list-unstyled">
                        <?php
                            $menu_name = 'Menu Footer 2'; 
                            $menu_items = wp_get_nav_menu_items($menu_name);
                            if ($menu_items) {
                                foreach ($menu_items as $item) {
                                    if ($item->menu_item_parent == 0) {
                                        $title = $item->title;
                                        $url = $item->url;
                                        echo '<li>';
                                            echo '<a title="'.esc_html($title).'" href="'.esc_url($url).'">'.esc_html($title).'</a>';
                                        echo '</li>';
                                    }
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="box-social mt-4">
                    
                </div>
            </div>

            <!-- Col 4: Contact Form -->
            <div class="col-lg-4 col-md-12 footer-col-contact">
                <div class="footer-contact-box">
                    <h4 class="footer-heading">LIÊN HỆ NHẬN TƯ VẤN</h4>
                    <?php echo do_shortcode('[contact-form-7 id="c4ae206" title="Contact Bottom"]'); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="c-footer-bottom custom-footer-bottom">
    <div class="container">
        <div class="row d-flex">
            <div class="text-center col-md-12 col-sm-12 py-2">
            </div>
        </div>
    </div>
</div>
<button id="backToTop" class="btn btn-primary back-to-top">
    <i class="bi bi-arrow-up-short"></i>
</button>