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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(3);


/***/ }),

/***/ 3:
/***/ (function(module, exports) {

// MODAL WINDOW
$(function () {
        $('.ajax-modal').on('click', function (event) {

                event.preventDefault();

                // MODAL
                var modal_window = $('.modal');
                var modal_container = $('.modal-dialog');
                var modal_content = '.modal-body';

                // DATA
                var data_url = $(this).data('url');
                var data_name = $(this).data('name');
                var data_content = $(this).data('content');
                var modal_size = $(this).data('modal-size');

                if (modal_size) modal_window.find(modal_container).addClass(modal_size);

                modal_window.find(modal_container).append('<div class="modal-content">' + '<div class="modal-header">' + '<h6 class="modal-title">' + data_name + '</h6>' + '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' + '<span aria-hidden="true">&times;</span>' + '</button>' + '</div>' + '<div class="modal-body">' + '</div>' + '</div>');

                $.ajax({
                        url: data_url,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type: 'POST',
                        success: function success(data) {
                                modal_window.find(modal_content).append(data.html);
                        },
                        complete: function complete() {
                                modal_window.modal('show');
                        }
                });

                if (data_content) {
                        modal_window.find(modal_content).append(data_content);
                }

                // CLEAR MODAL CONTENT
                modal_window.on('hidden.bs.modal', function () {
                        $(this).find(modal_container).children().remove();
                        if (modal_size) modal_window.find(modal_container).removeClass(modal_size);
                });
        });
});

/***/ })

/******/ });