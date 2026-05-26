<?php
/**
 * Header wrapper.
 *
 * @package          aquariuss\Templates
 * @aquariuss-version 1.0.0
 */
global $domain;
?>

<div class="top-blue-bar d-none d-lg-block"></div>

<div class="container orderby-mobile custom-header-container">
    <a class="navbar-brand od-1" href="<?php echo $domain; ?>" title="<?php echo get_bloginfo('name') ?>">
        <img class="logo-white" src="<?php echo esc_url(get_option('site_logo')); ?>" alt="<?php echo get_bloginfo('name') ?>" />
    </a>
    <button id="navbar-toggler" class="menu-trigger od-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
    <div class="collapse navbar-collapse d-none d-lg-flex justify-content-end">
        <ul class="navbar-nav custom-navbar-nav">
            <?php
                $menu_name = 'Menu Main';
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

                            $current_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request));
                            $item_url = rtrim($url, '/');
                            $current_path = rtrim(parse_url($current_url, PHP_URL_PATH), '/');
                            $item_path = rtrim(parse_url($item_url, PHP_URL_PATH), '/');
                            // Also check by object ID (works for pages, custom post types)
                            $queried_id = get_queried_object_id();
                            $is_active = ($current_path === $item_path || ($item->object_id && $queried_id == $item->object_id));
                            $active_class = $is_active ? ' active' : '';

                            if ($has_submenu) {
                                echo '<li class="nav-item'.$active_class.'">';
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
                                echo '<li class="nav-item'.$active_class.'">';
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
</div>