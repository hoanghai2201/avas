(function($) {
    $(document).ready(function() {
        // Ẩn wpcf7-spinner mặc định khi tải trang
        $('.wpcf7-spinner').hide();

        // Xử lý sự kiện trước khi gửi form
        document.addEventListener('wpcf7submit', function(event) {
            var $form = $(event.target);
            var $spinner = $form.find('.wpcf7-spinner');
            var $submitButton = $form.find('.wpcf7-submit');

            // Hiển thị spinner và vô hiệu hóa nút submit khi bắt đầu gửi
            $spinner.css('display', 'block');
            $spinner.css('visibility', 'visible');
            $submitButton.prop('disabled', true);
        }, false);

        // Xử lý sự kiện sau khi form gửi thành công
        document.addEventListener('wpcf7mailsent', function(event) {
            var $form = $(event.target);
            var $spinner = $form.find('.wpcf7-spinner');

            // Ẩn spinner và giữ nút submit ở trạng thái disabled
            $spinner.css('display', 'none');
            $spinner.css('visibility', 'hidden');
        }, false);

        // Xử lý sự kiện khi gửi form thất bại (lỗi validate hoặc server)
        document.addEventListener('wpcf7invalid', function(event) {
            var $form = $(event.target);
            var $spinner = $form.find('.wpcf7-spinner');
            var $submitButton = $form.find('.wpcf7-submit');

            // Ẩn spinner và bật lại nút submit
            $spinner.css('display', 'none');
            $spinner.css('visibility', 'hidden');
            $submitButton.prop('disabled', false);
        }, false);

        document.addEventListener('wpcf7mailfailed', function(event) {
            var $form = $(event.target);
            var $spinner = $form.find('.wpcf7-spinner');
            var $submitButton = $form.find('.wpcf7-submit');

            // Ẩn spinner và bật lại nút submit
            $spinner.css('display', 'none');
            $spinner.css('visibility', 'hidden');
            $submitButton.prop('disabled', false);
        }, false);
    });
})(jQuery);