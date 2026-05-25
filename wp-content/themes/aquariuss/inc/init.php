<?php
global $domain;
// $current_language = pll_current_language();
// $site_url = home_url();
$domain = get_option('siteurl'); //str_replace('/' . $current_language, '', $site_url);

function get_latest_posts_by_category($category_id, $num_post = 5, $offset = 0){
	$translated_category_id = pll_get_term($category_id);
    $args = array(
        'cat'            => $translated_category_id,
        'posts_per_page' => $num_post,
        'offset'         => $offset,
        'orderby'        => 'date', 
        'order'          => 'DESC',
    );
    $query = new WP_Query($args);
    return $query;
}

function get_category_title_by_id($category_id) {
	$translated_category_id = pll_get_term($category_id);
    $category = get_category($translated_category_id);
    if ($category) {
        return pll__($category->name);
    }
    return '';
}

function enqueue_cf7_custom_script() {
    wp_enqueue_script(
        'cf7-custom-script',
        get_template_directory_uri() . '/js/cf7-custom.js',
        array('jquery'), // Đảm bảo jQuery được tải trước
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_cf7_custom_script');

function custom_posts_per_page_by_category($query) {
    if ($query->is_category() && $query->is_main_query()) {
        $current_category = get_queried_object();
        if ($current_category) {
            $category_id = pll_get_term($current_category->term_id);
            if (wp_is_mobile()) {
                $query->set('posts_per_page', 9);
            } else {
                $query->set('posts_per_page', 9);
            }
        }
    }
    if($query->is_tax('luxury_category') && $query->is_main_query()){
        $current_category = get_queried_object();
        if ($current_category) {
            // Cả hai nhánh có cùng logic nên rút gọn lại
            if (wp_is_mobile()) {
                $query->set('posts_per_page', 6);
            } else {
                $query->set('posts_per_page', 9);
            }
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page_by_category');

function use_custom_single_template($template) {
    if(is_single() && in_category([236,244,318,320])) { // ID của chuyên mục  // 236,244: local
        $custom_template = locate_template('single-talents.php');
        if ($custom_template) {
            return $custom_template;
        }
    }
    return $template;
}
add_filter('single_template', 'use_custom_single_template');

function get_acf_checkbox_values($field_name) {
    $values = array();
    $posts = get_posts(array(
        'post_type' => 'post', // Loại bài viết
        'posts_per_page' => -1, // Lấy tất cả bài viết
        'fields' => 'ids', // Lấy ID để tối ưu hóa
    ));

    foreach ($posts as $post_id) {
        $field_values = get_post_meta($post_id, $field_name, true);
        if (is_array($field_values)) {
            foreach ($field_values as $value) {
                $values[] = $value;
            }
        }
    }

    return array_unique($values); // Loại bỏ giá trị trùng lặp
}

function get_all_brand_taxonomies() {
    // Lấy tất cả Brand Categories
    $brand_categories = get_terms([
        'taxonomy'   => 'brand_category',
        'hide_empty' => false, // Hiển thị cả các term không có bài viết
    ]);

    if (!empty($brand_categories) && !is_wp_error($brand_categories)) {
        $categories = array_map(function($term) {
            return [
                'id' => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
                'link' => get_term_link($term), // Polylang xử lý link tự động
            ];
        }, $brand_categories);
    } else {
        $categories = [];
    }

    // Lấy tất cả Brand Floors
    $brand_floors = get_terms([
        'taxonomy'   => 'brand_floor',
        'hide_empty' => false, // Hiển thị cả các term không có bài viết
    ]);

    if (!empty($brand_floors) && !is_wp_error($brand_floors)) {
        $floors = array_map(function($term) {
            return [
                'id' => $term->term_id,
                'name' => $term->name,
                'slug' => $term->slug,
                'link' => get_term_link($term), // Polylang xử lý link tự động
            ];
        }, $brand_floors);
    } else {
        $floors = [];
    }

    return [
        'categories' => $categories,
        'floors'     => $floors,
    ];
}

function search_only_in_titles($search, $wp_query) {
    global $wpdb;

    if ($wp_query->is_search() && !is_admin()) {
        $search_query = $wp_query->get('s');
        if (!empty($search_query)) {
            $search = $wpdb->prepare(" AND {$wpdb->posts}.post_title LIKE '%%%s%%' ", $search_query);
        }
    }

    return $search;
}
add_filter('posts_search', 'search_only_in_titles', 10, 2);

function search_in_luxury_and_brand($query) {
    if ($query->is_search && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', array('luxury', 'brand', 'post'));
    }
}
add_action('pre_get_posts', 'search_in_luxury_and_brand');

// function remove_default_favicons() {
//     remove_action('wp_head', 'wp_site_icon', 99);
// }
// add_action('after_setup_theme', 'remove_default_favicons');

function my_custom_body_classes($classes) {
    // Thêm class tùy chỉnh 'my-custom-class'
    $classes[] = 'lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow nav-dropdown-has-border';

    // if (is_home()) {
    //     $classes[] = 'home-page';
    // }

    return $classes;
}
add_filter('body_class', 'my_custom_body_classes');


function custom_polylang_langswitcher() {
  $output = '';
  if (function_exists('pll_the_languages')) {
    $args = [
      'show_flags' => 1,
      'show_names' => 1,
      'hide_if_empty' => 0,
      'hide_current' => 0,
      'echo' => 0,
    ];
    $output = '<ul class="polylang_langswitcher">'.pll_the_languages($args).'</ul>';
  }
  return $output;
}
add_shortcode('polylang_langswitcher', 'custom_polylang_langswitcher');

function custom_admin_css_for_specific_page() {
    $screen = get_current_screen();
    
    // Kiểm tra nếu đang ở trang chỉnh sửa post/page có ID 42
    if (isset($_GET['post']) && in_array((int) $_GET['post'], [41, 792]) && $screen->base == 'post') {
        echo '<style>
        		.postarea {
        			display: none;
        		}
        	  </style>';
    }
}
add_action( 'admin_enqueue_scripts', 'custom_admin_css_for_specific_page' );

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

function register_my_menu() {
    register_nav_menus(
        array(
            'main-menu' => __('Menu Main'),
            'footer-menu' => __('Menu Footer')
        )
    );
}
add_action('init', 'register_my_menu');

if (function_exists('max_mega_menu_is_enabled')) {
    // Gỡ bỏ mega menu
}

add_action( 'admin_init', 'disable_autosave' );
function disable_autosave() {
    wp_deregister_script( 'autosave' );
}

function set_dflip_slug_as_id($data, $postarr) {
    if ($data['post_type'] === 'dflip' && $data['post_status'] !== 'auto-draft') {
        // Nếu bài viết mới chưa có ID, đặt slug tạm thời
        if (empty($postarr['ID'])) {
            $data['post_name'] = sanitize_title(uniqid('dflip-')); // Tạo slug tạm thời
        } else {
            $data['post_name'] = (string) $postarr['ID']; // Đặt slug bằng ID
        }
    }
    return $data;
}
add_filter('wp_insert_post_data', 'set_dflip_slug_as_id', 10, 2);

// Thêm trường ảnh tùy chỉnh vào mục menu
function add_custom_image_field_to_menu($item_id, $item, $depth, $args) {
    // Lấy giá trị của ảnh từ meta
    $menu_item_image = get_post_meta($item_id, '_menu_item_image', true);

    ?>
    <p class="description description-wide">
        <label for="edit-menu-item-image-<?php echo $item_id; ?>">
            <?php _e( 'Menu Image (URL)', 'your-theme-text-domain' ); ?><br />
            <input type="text" id="edit-menu-item-image-<?php echo $item_id; ?>" class="widefat" name="menu-item-image[<?php echo $item_id; ?>]" value="<?php echo esc_attr($menu_item_image); ?>" />
        </label>
    </p>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'add_custom_image_field_to_menu', 10, 4);

function save_menu_item_image($menu_id, $menu_item_db_id) {
    if (isset($_POST['menu-item-image'][$menu_item_db_id])) {
        $image_url = $_POST['menu-item-image'][$menu_item_db_id];
        update_post_meta($menu_item_db_id, '_menu_item_image', esc_url_raw($image_url));
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_image');
    }
}
add_action('wp_update_nav_menu_item', 'save_menu_item_image', 10, 2);

//Tắt update polylang
add_filter('site_transient_update_plugins', function ($transient) {
    if (isset($transient->response['polylang/polylang.php'])) {
        unset($transient->response['polylang/polylang.php']);
    }
    return $transient;
});

function admin_styles() {
    wp_enqueue_style('admin-customize-styles', get_template_directory_uri() . '/admin/css/main.css');
}
add_action('admin_enqueue_scripts', 'admin_styles');

function add_data_sync_menu() {
    add_menu_page(
        'Data Sync',
        'Data Sync',
        'manage_options',
        'data-sync',
        'data_sync_main_page',
        'dashicons-update',
        2
    );

    add_submenu_page(
        'data-sync',
        'Page Sync',
        'Page Sync',
        'manage_options',
        'page-sync',
        'acf_sync_page_callback'
    );

    add_submenu_page(
        'data-sync',
        'Product Sync',
        'Product Sync',
        'manage_options',
        'product-sync',
        'acf_sync_product_callback'
    );
}
add_action('admin_menu', 'add_data_sync_menu');

// Trang chính Data Sync
function data_sync_main_page() {
    echo '<div class="wrap"><h1>Data Sync</h1>';
    echo '<p>Chọn một mục bên dưới để đồng bộ dữ liệu.</p>';
    echo '<ul>
            <li><a href="' . admin_url('admin.php?page=page-sync') . '">🔹 Đồng bộ Page</a></li>
            <li><a href="' . admin_url('admin.php?page=product-sync') . '">🔹 Đồng bộ Sản phẩm</a></li>
          </ul>';
    echo '</div>';
}

// Trang Page Sync
function acf_sync_page_callback() {
    display_sync_page('page');
}

// Trang Product Sync
function acf_sync_product_callback() {
    display_sync_page('project');
}

// Hiển thị danh sách bài viết theo loại (Page hoặc Project)
function display_sync_page($post_type) {
    echo '<div class="wrap"><h1>' . ucfirst($post_type) . ' Sync</h1>';
    echo '<p>Chọn bài viết để đồng bộ dữ liệu.</p>';

    // Nếu có form submit
    if (isset($_POST['sync_selected']) && !empty($_POST['selected_posts'])) {
        check_admin_referer('sync_action_' . $post_type, 'sync_nonce'); // CSRF check
        foreach ($_POST['selected_posts'] as $post_id) {
            copy_post_and_acf_data((int) $post_id);
        }
        echo '<p style="color: green;">✅ Đồng bộ thành công!</p>';
    }

    // Lấy danh sách bài viết thuộc post type
    $args = [
        'post_type'      => $post_type,
        'posts_per_page' => -1,
        'lang'           => 'en' // Chỉ lấy bài gốc (tiếng Anh)
    ];
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        echo '<form method="post">';
        wp_nonce_field('sync_action_' . $post_type, 'sync_nonce');
        echo '<table class="widefat fixed">';
        echo '<thead><tr><th style="width: 45px;">Chọn</th><th>Tiêu đề</th><th>Trạng thái</th></tr></thead>';
        echo '<tbody>';
        
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $translated_id = pll_get_post($post_id, 'vi');

            echo '<tr>';
            echo '<td><input type="checkbox" name="selected_posts[]" value="' . esc_attr($post_id) . '"></td>';
            echo '<td>' . get_the_title() . '</td>';
            echo '<td>' . ($translated_id ? '✅ Đã có bản dịch' : '❌ Chưa có bản dịch') . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<br><input type="submit" name="sync_selected" class="button button-primary" value="Đồng bộ các bài đã chọn">';
        echo '</form>';
    } else {
        echo '<p>❌ Không có bài viết nào.</p>';
    }

    wp_reset_postdata();
    echo '</div>';
}

// Hàm sao chép dữ liệu bài viết và ACF
function copy_post_and_acf_data($post_id) {
    if (!function_exists('pll_get_post')) {
        echo '<p style="color: red;">❌ Polylang chưa được kích hoạt!</p>';
        return;
    }

    $translated_id = pll_get_post($post_id, 'vi'); // Lấy ID bản dịch tiếng Việt
    
    if ($translated_id) {
        // Cập nhật nội dung bản dịch theo bản gốc
        $post_data = [
            'ID'           => $translated_id,
            'post_title'   => get_the_title($post_id),
            'post_content' => get_post_field('post_content', $post_id)
        ];
        wp_update_post($post_data);

        // Lấy và sao chép tất cả các trường ACF
        $fields = get_fields($post_id);
        if ($fields) {
            foreach ($fields as $field_name => $field_value) {
                update_field($field_name, $field_value, $translated_id);
            }
        }
    }
}

/**
 * Dump data.
 */
if (!function_exists('dd')) {
    function dd()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            echo '<pre>';
            var_dump($arg);
            echo '</pre>';
            echo '<br>';
        }
        die();
    }
}

