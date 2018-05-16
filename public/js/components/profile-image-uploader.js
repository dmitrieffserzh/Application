$(document).ready(function () {
    $('#image_input').on('change', function () {

        var form = new FormData();
        var image = $(this)[0].files[0];
        form.append('image', image);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/image_upload',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            error: function (error) {
            },
            success: function (msg) {

                $('#image_change').attr('src', '/uploads/images/normals/' + msg.url);

                console.log(msg);
            },
            complete: function (msg) {

                console.log(msg);

                // $('.print-error-msg').find("ul").html('');
                // $('.print-error-msg').css('display', 'block');
                // $.each(msg, function (key, value) {
                //     $('.print-error-msg').find("ul").append('<li>' + value + '</li>');
                // });

            }
        });

    });
    //event.preventDefault();

});