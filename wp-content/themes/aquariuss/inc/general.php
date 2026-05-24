<?php
// Thêm mục Setting
function add_general_settings_menu() {
    add_menu_page(
        'General Settings', // Tên trang (page title)
        'General Settings', // Tên trên menu (menu title)
        'manage_options',   // Quyền yêu cầu
        'general-settings', // Slug của trang
        'general_settings_page_markup', // Hàm hiển thị nội dung trang
        'dashicons-admin-generic', // Biểu tượng trên menu
        2 // Vị trí menu
    );
}
add_action('admin_menu', 'add_general_settings_menu');

function general_settings_page_markup() {
    // Kiểm tra quyền quản lý
    if (!current_user_can('manage_options')) {
        return;
    }

    // Lưu dữ liệu khi người dùng nhấn Submit
    if (isset($_POST['submit'])) {
        check_admin_referer('general_settings_save', 'general_settings_nonce'); // CSRF check
        update_option('site_favicon', esc_url($_POST['site_favicon'])); // Logo lưu dưới dạng URL
        update_option('site_logo', esc_url($_POST['site_logo'])); // Logo lưu dưới dạng URL
        update_option('site_logo_mb', esc_url($_POST['site_logo_mb'])); // Logo lưu dưới dạng URL
        update_option('site_phone_number', sanitize_text_field($_POST['site_phone_number']));
        update_option('site_address', sanitize_text_field($_POST['site_address']));
        update_option('site_address2', sanitize_text_field($_POST['site_address2']));
        update_option('site_footer_text', sanitize_text_field($_POST['site_footer_text']));
    }

    // Lấy dữ liệu đã lưu
    $favicon = get_option('site_favicon');
    $logo = get_option('site_logo');
    $logo_mb = get_option('site_logo_mb');
    $phone_number = get_option('site_phone_number');
    $address = get_option('site_address');
    $address2 = get_option('site_address2');
    $footer_text = get_option('site_footer_text');

    // Giao diện form để nhập số điện thoại, địa chỉ, logo
    ?>
    <div class="wrap">
        <h1>General Settings</h1>
        <form method="POST">
            <?php wp_nonce_field('general_settings_save', 'general_settings_nonce'); ?>
            <table class="form-table form-general">
                <tr valign="top">
                    <th scope="row">Favicon:</th>
                    <td>
                        <input type="text" id="site_favicon" name="site_favicon" value="<?php echo esc_attr($favicon); ?>" />
                        <input type="button" id="upload-favicon-button" class="button" value="Upload Favicon" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Logo:</th>
                    <td>
                        <input type="text" id="site_logo" name="site_logo" value="<?php echo esc_attr($logo); ?>" />
                        <input type="button" id="upload-logo-button" class="button" value="Upload Logo" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Logo Menu Mobile:</th>
                    <td>
                        <input type="text" id="site_logo_mb" name="site_logo_mb" value="<?php echo esc_attr($logo_mb); ?>" />
                        <input type="button" id="upload-logomb-button" class="button" value="Upload Logo" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Số điện thoại:</th>
                    <td><input type="text" name="site_phone_number" value="<?php echo esc_attr($phone_number); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Địa chỉ 1:</th>
                    <td><input type="text" name="site_address" value="<?php echo esc_attr($address); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Địa chỉ 2:</th>
                    <td><input type="text" name="site_address2" value="<?php echo esc_attr($address2); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer Text:</th>
                    <td><input type="text" name="site_footer_text" value="<?php echo esc_attr($footer_text); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function media_uploader_enqueue() {
    wp_enqueue_media();
    wp_enqueue_script('my-upload-script', get_template_directory_uri() . '/admin/js/upload-script.js?v=1.0.6', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'media_uploader_enqueue');

function general_settings_enqueue_admin_styles() {
    wp_enqueue_style('admin-custom-styles', get_template_directory_uri() . '/admin/css/style.css');
}
add_action('admin_enqueue_scripts', 'general_settings_enqueue_admin_styles');