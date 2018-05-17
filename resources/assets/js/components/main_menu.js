$(function () {

    var menu_container = $('#menu-container');
    var button = $('.main-menu__button, .splash');
    var splash = $('.splash');
    var body   = $('body');

    var open_menu = function () {
        splash.css({'display': 'block'});
        body.css({'overflow': 'hidden'});
        setTimeout(function () {
            splash.css({'opacity': '0.8'});
            menu_container.addClass('menu-container--menu-open');
          //  $('.main-menu__button > span').css({'background': '#fff'})
        }, 150)
    };

    var close_menu = function () {

        setTimeout(function () {
            splash.css({'display': 'none'});
            body.css({'overflow': 'auto'});
        }, 150)
        splash.css({'opacity': '0'});
        menu_container.removeClass('menu-container--menu-open');
        //$('.main-menu__button > span').css({'background': '#000'})
    };

    $(body).resize(function () {
        if($(window).innerWidth() < 767) {
            $(menu_container).css('height', window.innerHeight + 100);
            $(splash).css('height', window.innerHeight + 100);
        }
    });
    if($(window).innerWidth() < 767) {
        $(menu_container).css('height', window.innerHeight + 100);
        $(splash).css('height', window.innerHeight + 100);
    }

    // OPEN OR CLOSE MENU
    $(button).on('click', function () {
        if (menu_container.hasClass('menu-container--menu-open')) {
            close_menu();
        } else {
            open_menu();
        }
    });

    $('body').on('swipeleft', function (e) {
        open_menu();
    });
    $('body').on('swiperight', function (e) {
        close_menu();
    });
});