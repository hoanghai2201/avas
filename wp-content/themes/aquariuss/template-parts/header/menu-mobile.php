<?php
/**
 * Footer.
 *
 * @package          Trang Tien Plaza\Templates
 * @trangtienplaza-version 1.0.0
 */
global $domain;
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
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

                            if ($has_submenu) {
                                echo '<li class="has-submenu">';
                                echo '<a class="nav-item-mb text-dark" href="'.esc_url($url).'">'.esc_html($title).'</a><i class="bi bi-chevron-right toggle-icon"></i>';   

                                echo '<ul class="sub-menu">';
                                foreach ($menu_items as $sub_item) {
                                    if ($sub_item->menu_item_parent == $item->ID) {
                                        $sub_title = $sub_item->title;
                                        $sub_url = $sub_item->url;
                                        echo '<li><a class="text-dark" href="'.esc_url($sub_url).'">'.esc_html($sub_title).'</a></li>';
                                    }
                                }
                                echo '</ul>';
                            }else{
                                echo '<li>';
                                echo '<a class="nav-item-mb text-dark" href="' . esc_url($url) . '">' . esc_html($title) . '</a>';
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