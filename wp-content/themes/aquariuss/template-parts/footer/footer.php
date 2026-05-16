<?php
/**
 * Footer.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */
global $domain;
?>
<div class="c-footer-main py-4">
    <div class="container">
        <div class="row">
            <div class="text-center col-md-12 col-sm-12">
                <div class="box-social py-4">
                    <?php
                        if(have_rows('social', 'option')):
                            $i = 1;
                            while(have_rows('social', 'option')) : the_row();
                                $i++;
                                $image = get_sub_field('icon_social');
                                $link  = get_sub_field('link_social');
                                $page_id = url_to_postid($page_url);
                                ?>
                                <a target="_blank" title="<?php echo esc_attr($image['alt']); ?>" href="<?php echo esc_url($link); ?>">
                                    <img src="<?php echo esc_attr($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </a>
                                <?php
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
            <div class="c-footer-flex col-md-12 col-sm-12">
                <div class="c-footer-col is-col-12">
                    <div class="c-footer-content">
                        <div class="c-footer-list py-1">
                            <ul>
                                <?php
                                    $current_language = pll_current_language();
                                    if ($current_language == 'vi') {
                                        $menu_name = 'Menu Footer'; 
                                    } elseif ($current_language == 'en') {
                                        $menu_name = 'Menu Footer EN';
                                    }
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
                                    } else {
                                        echo 'Menu không tồn tại.';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="c-footer-bottom bg-red">
    <div class="container">
        <div class="row d-flex">
            <div class="text-center col-md-12 col-sm-12 py-2">
                <div class="c-copyright"><?php echo get_option('site_footer_text'); ?></div>
            </div>
        </div>
    </div>
</div>
<button id="backToTop" class="btn btn-primary back-to-top">
    <i class="bi bi-arrow-up-short"></i>
</button>