// FOLLOW SYSTEM
$(document).on('click', '.follow', function () {
    var elem = $(this).parent();
    var data   = $(this).data();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: data,
        type: 'POST',
        url: '/follow_handler',
        success: function (data) {
            if (data.success === true) {
                elem.find('.follow').text('Отписаться');
                console.log(data);
            } else {
                elem.find('.follow').text('Подписаться');
                console.log(data);
            }
        }
    });

    event.preventDefault();
});
