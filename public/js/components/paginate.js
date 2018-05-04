$(function(){

    var content = $("#content"),
        loading = "<img src='loading.gif' alt='Loading' />";

    // Подгрузка первых записей
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/posts",
        type: "POST",
        data: {type: "start"},
        success: function(data){

            if(data){

                content.append(data);
                content.find(".jscroll-loading:first").slideUp(700, function(){

                    $(this).remove();
                });

                // Вызываем плагин
                $("#content").jscroll({
                    autoTriggerUntil: 2,
                    loadingHtml: loading
                });
            };
        },
        beforeSend: function(){

            content.append("<div class='jscroll-loading'>" + loading + "</div>");
        }
    });
});