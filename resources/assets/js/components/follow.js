// LIKE SYSTEM
$(document).on('click', '.follow', function () {
    var that_main = $(this).parent();
    var data = $(this).data();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: data,
        type: 'POST',
        url: '/follow_handler',
        success: function (result) {
            //that_main.find('.component-like__count').text(result.like_count);
            if (result.liked === true) {
                console.log(result);
               // that_main.find('.follow').removeClass('like--noliked').addClass('like--liked');
            } else {
                console.log(result);
                //that_main.find('.follow').removeClass('like--liked').addClass('like--noliked');
            }
        }
    });

    event.preventDefault();
});
