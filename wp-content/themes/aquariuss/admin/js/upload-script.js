jQuery(document).ready(function($){
    var mediaUploader, mediaUploader1, mediaUploader2, mediaUploader3, mediaUploader4, mediaUploader5, mediaUploader6;
    $('#upload-logo-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Logo',
            button: {
                text: 'Choose Logo'
            }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#site_logo').val(attachment.url);
        });
        mediaUploader.open();
    });

    $('#upload-favicon-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader1) {
            mediaUploader1.open();
            return;
        }
        mediaUploader1 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Favicon',
            button: {
                text: 'Choose Favicon'
            }, multiple: false });
        mediaUploader1.on('select', function() {
            var attachment = mediaUploader1.state().get('selection').first().toJSON();
            $('#site_favicon').val(attachment.url);
        });
        mediaUploader1.open();
    });
    
    $('#upload-logoft-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader2) {
            mediaUploader2.open();
            return;
        }
        mediaUploader2 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Logo Footer',
            button: {
                text: 'Choose Logo Footer'
            }, multiple: false });
        mediaUploader2.on('select', function() {
            var attachment = mediaUploader2.state().get('selection').first().toJSON();
            $('#site_logo_footer').val(attachment.url);
        });
        mediaUploader2.open();
    });

    $('#upload-logomb-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader3) {
            mediaUploader3.open();
            return;
        }
        mediaUploader3 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Logo Menu Mobile',
            button: {
                text: 'Choose Logo Menu Mobile'
            }, multiple: false });
        mediaUploader3.on('select', function() {
            var attachment = mediaUploader3.state().get('selection').first().toJSON();
            $('#site_logo_mb').val(attachment.url);
        });
        mediaUploader3.open();
    });
    
    $('#upload-bgnews-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader5) {
            mediaUploader5.open();
            return;
        }
        mediaUploader5 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Background Tin tức',
            button: {
                text: 'Choose Background Tin tức'
            }, multiple: false });
        mediaUploader5.on('select', function() {
            var attachment = mediaUploader5.state().get('selection').first().toJSON();
            $('#site_bg_news').val(attachment.url);
        });
        mediaUploader5.open();
    });
    
    $('#upload-bgmbnews-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader6) {
            mediaUploader6.open();
            return;
        }
        mediaUploader6 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Background Mobile Tin tức',
            button: {
                text: 'Choose Background Mobile Tin tức'
            }, multiple: false });
        mediaUploader6.on('select', function() {
            var attachment = mediaUploader6.state().get('selection').first().toJSON();
            $('#site_bg_mb_news').val(attachment.url);
        });
        mediaUploader6.open();
    });

    $('#upload-icon-new').click(function(e) {
        e.preventDefault();
        if (mediaUploader4) {
            mediaUploader3.open();
            return;
        }
        mediaUploader4 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Icon New',
            button: {
                text: 'Choose Icon New'
            }, multiple: false });
        mediaUploader4.on('select', function() {
            var attachment = mediaUploader4.state().get('selection').first().toJSON();
            $('#icon_new').val(attachment.url);
        });
        mediaUploader4.open();
    });

    var mediaUploaderFloor;
    $('.upload_image_floor').click(function(e) {
        e.preventDefault();
        if (mediaUploaderFloor) {
            mediaUploaderFloor.open();
            return;
        }
        mediaUploaderFloor = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        mediaUploaderFloor.on('select', function() {
            var attachment = mediaUploaderFloor.state().get('selection').first().toJSON();
            $('#brand_floor_image').val(attachment.url);
        });
        mediaUploaderFloor.open();
    });
});