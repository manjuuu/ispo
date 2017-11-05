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

mix.js('resources/assets/js/app.js', 'public/js')
    .styles([
        'resources/assets/css/libs/sweetalert2.min.css',
        'resources/assets/css/libs/jquery-ui.css',
    ], 'public/css/library.css')
    .scripts([
      'resources/assets/js/libs/sweetalert2.min.js',
      'resources/assets/js/libs/rsv.min.js',
      'resources/assets/js/libs/jquery-ui.js',
    ], 'public/js/library.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
