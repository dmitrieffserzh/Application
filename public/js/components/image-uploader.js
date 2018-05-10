(function ($) {
    $('#image-submit').on('click', function () {
        var form = new FormData();
        var image = $('#image')[0].files[0];
        form.append('image', image);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/image_upload',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            type: "post",
            complete: function (msg) {
                $('.print-error-msg').find("ul").html('');
                $('.print-error-msg').css('display', 'block');
                $.each(msg, function (key, value) {
                    $('.print-error-msg').find("ul").append('<li>' + value + '</li>');
                });

            }
        });
        event.preventDefault();
    });
});