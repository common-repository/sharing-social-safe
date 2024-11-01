
jQuery(document).ready(function ($) {

    var mediaUploader;
    var getnameid = '';

    $('.mb-sss-upload-button').click(function (e) {

        e.preventDefault();

        getnameid = e.target.name;

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        mediaUploader.on('select', function (e) {

            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#' + getnameid).val(attachment.url);
            $('.' + getnameid).attr('src', attachment.url);
        });

        mediaUploader.open();
    });

    $('.mb-sss-upload-remove').click(function (e) {

        e.preventDefault();

        getnameid = e.target.name;
        $('#' + getnameid).val('');
        $('.' + getnameid).attr('src', '');
    });


});