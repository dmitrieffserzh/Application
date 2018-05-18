// LIKE SYSTEM
$(document).on('click', '.like', function () {
    var that_main = $(this).parent();
    var data = $(this).data();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: data,
        type: 'POST',
        url: '/like',
        success: function (result) {
            that_main.find('.component-like__count').text(result.like_count);
            if (result.liked === true) {
                that_main.find('.like').removeClass('like--noliked').addClass('like--liked');
            } else {
                that_main.find('.like').removeClass('like--liked').addClass('like--noliked');
            }
        }
    });
    event.preventDefault();
});
