<?php
/**
 * Header wrapper.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>
<div class="container orderby-mobile">
    <a class="navbar-brand od-1" href="<?php echo $domain; ?>" title="<?php echo get_bloginfo('name') ?>">
        <img class="logo-white" src="<?php echo esc_url(get_option('site_logo')); ?>" alt="<?php echo get_bloginfo('name') ?>" />
    </a>
    <button id="navbar-toggler" class="menu-trigger od-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
    <div class="collapse navbar-collapse d-none d-lg-flex">
        <ul class="navbar-nav mx-auto">
            <?php
                $current_language = pll_current_language();
                if ($current_language == 'vi') {
                    $menu_name = 'Menu Main'; 
                } elseif ($current_language == 'en') {
                    $menu_name = 'Menu Main EN';
                }
                $menu_items = wp_get_nav_menu_items($menu_name);
                if ($menu_items) {
                    foreach ($menu_items as $item) {
                        if ($item->menu_item_parent == 0) {
                            $title = $item->title;
                            $url = $item->url;

                            $has_submenu = false;
                            foreach ($menu_items as $sub_item) {
                                if ($sub_item->menu_item_parent == $item->ID) {
                                    $has_submenu = true;
                                    break;
                                }
                            }

                            if ($has_submenu) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="'.esc_url($url).'">'.esc_html($title).'</a>';
                                echo '<div class="mega-menu">';
                                echo '<div class="mega-menu-content">';
                                echo '<div class="menu-content">';
                                echo '<h5><a class="nav-link" title="'.esc_html($title).'" href="'.esc_url($url).'">'.esc_html($title).'<i class="bi bi-chevron-right"></i></a></h5>';
                                echo '<div class="mega-menu-list-wrap">';
                                $count = 0; // Biến đếm số lượng menu item trong nhóm
                                echo '<div class="col-md-4 col-sm-6"><ul class="list-unstyled">';
                                foreach ($menu_items as $sub_item) {
                                    if ($sub_item->menu_item_parent == $item->ID) {
                                        $sub_title = $sub_item->title;
                                        $sub_url = $sub_item->url;
                                        echo '<li><a class="text-dark" href="'.esc_url($sub_url).'">'.esc_html($sub_title).'</a></li>';
                                        $count++;
                                        if ($count % 3 == 0) {
                                            echo '</div><div class="col-md-4 col-sm-6"><ul class="list-unstyled">';
                                        }
                                    }
                                }
                                echo '</ul></div>';
                                echo '</div></div></div></div>';
                            }else{
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" title="'.esc_html($title).'" href="'.esc_url($url).'">'.esc_html($title).'</a>';
                            }

                            echo '</li>';
                        }
                    }
                } else {
                    echo 'Menu không tồn tại.';
                }
            ?>
        </ul>
    </div>
    
    <div id="box-search" class="position-relative od-2 box-search-mb">
        <button class="btn" id="search-btn">
            <img src="<?php echo $domain; ?>/wp-content/themes/aquariuss/images/search.svg" />
        </button>
        <div class="close-icon" onclick="close_search()">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="1.25" y1="-1.25" x2="24.3523" y2="-1.25" transform="matrix(0.717094 0.696976 -0.717094 0.696976 0.736816 2.02344)" stroke="black" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="1.25" y1="-1.25" x2="24.3523" y2="-1.25" transform="matrix(0.717094 -0.696976 0.717094 0.696976 2.42334 20.0303)" stroke="black" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
        </div>
        <div id="search-box" class="search-box">
            <div class="container">
                <div class="row g-3 mb-3 justify-center">
                    <div class="col-md-6 col-sm-12">
                        <form method="get" class="searchform" action="<?php echo $domain; ?>/" role="search">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6018 15.4258C12.187 16.4589 10.4421 17.0689 8.55444 17.0689C3.82995 17.0689 0 13.248 0 8.5345C0 3.82102 3.82995 0 8.55444 0C13.279 0 17.1088 3.82102 17.1088 8.5345C17.1088 10.4416 16.4819 12.2025 15.4224 13.6235C15.432 13.6324 15.4414 13.6415 15.4507 13.6509L19.6241 17.8145C20.1253 18.3146 20.1253 19.125 19.6241 19.6251C19.123 20.125 18.3106 20.125 17.8094 19.6251L13.6361 15.4613C13.6244 15.4497 13.613 15.4379 13.6018 15.4258ZM14.5425 8.5345C14.5425 11.8339 11.8616 14.5086 8.55444 14.5086C5.2473 14.5086 2.56633 11.8339 2.56633 8.5345C2.56633 5.23507 5.2473 2.56035 8.55444 2.56035C11.8616 2.56035 14.5425 5.23507 14.5425 8.5345Z" fill="#ED1B24"/>
                            </svg>
                            <input placeholder="Search this site" type="text" name="s" value="" id="s" tabindex="9" class="input-search" >
                            <button type="submit" class="btn-icon-search" name="action" value="search" aria-label="button">
                              <!-- SEARCH -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 5.061 8.707">
                                <path d="M377.82-97.27l4,4-4,4" transform="translate(-377.467 97.623)" fill="none" stroke="#333" stroke-width=".5"></path>
                              </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="language hidden-mobile">
        <ul>
            <?php
                $languages = pll_the_languages(array(
                    'dropdown' => 0,       // Hiển thị dưới dạng danh sách, không phải dropdown
                    'show_flags' => 0,     // Hiển thị cờ quốc gia
                    'show_names' => 0,     // Hiển thị tên ngôn ngữ
                    'hide_if_empty' => 0,  // Không ẩn nếu không có ngôn ngữ
                    'force_home' => 0,     // Không chuyển về trang chủ khi đổi ngôn ngữ
                    'raw' => 1             // Trả về kết quả dạng mảng
                ));

                if (!empty($languages)) {
                    foreach ($languages as $lang) {
                        if ($lang['current_lang']) {
                            echo '<li><a class="active">'.$lang['name'].'</a></li>';
                        } else {
                            echo '<li><a href="'.esc_url($lang['url']).'">'.$lang['name'].'</a></li>';
                        }                                    
                    }
                }
            ?>
        </ul>
    </div>
</div>