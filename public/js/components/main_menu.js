/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(6);


/***/ }),

/***/ 6:
/***/ (function(module, exports) {

$(function () {

    var menu_container = $('#menu-container');
    var button = $('.main-menu__button, .splash');
    var splash = $('.splash');
    var body = $('body');

    var open_menu = function open_menu() {
        splash.css({ 'display': 'block' });
        body.css({ 'overflow': 'hidden' });
        setTimeout(function () {
            splash.css({ 'opacity': '0.8' });
            menu_container.addClass('menu-container--menu-open');
            //  $('.main-menu__button > span').css({'background': '#fff'})
        }, 150);
    };

    var close_menu = function close_menu() {

        setTimeout(function () {
            splash.css({ 'display': 'none' });
            body.css({ 'overflow': 'auto' });
        }, 150);
        splash.css({ 'opacity': '0' });
        menu_container.removeClass('menu-container--menu-open');
        //$('.main-menu__button > span').css({'background': '#000'})
    };

    $(body).resize(function () {
        if ($(window).innerWidth() < 767) {
            $(menu_container).css('height', window.innerHeight + 100);
            $(splash).css('height', window.innerHeight + 100);
        }
    });
    if ($(window).innerWidth() < 767) {
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

/***/ })

/******/ });