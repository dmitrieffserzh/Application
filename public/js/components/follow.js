// FOLLOW SYSTEM
$(document).on('click', '.follow', function () {
    var button = $(this).parent();
    var data   = $(this).data();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: data,
        type: 'POST',
        url: '/follow_handler',
        success: function (data) {
            if (data.success === true) {
                button.text('Отписаться');
                console.log(data);
            } else {
                button.text('Подписаться');
                console.log(data);
            }
        }
    });

    event.preventDefault();
});
