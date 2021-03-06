let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// var bootstrap_sass = './node_modules/bootstrap-sass/';
mix.js('resources/assets/js/app.js', 'public/js')
    //.js('resources/assets/js/main_menu.js', 'public/js/components')
    .js('resources/assets/js/components/util.js', 'public/js/components')
    .js('resources/assets/js/components/modal.js', 'public/js/components')
    .js('resources/assets/js/components/modal-ajax.js', 'public/js/components')
   .sass('resources/assets/sass/app.scss', 'public/css')
  // .sass('resources/assets/sass/components/image-select-area.scss', 'public/css/components');

//mix.copy(bootstrap_sass+"assets/fonts/bootstrap",'public/fonts');