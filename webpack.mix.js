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
        'resources/assets/css/libs/sweetalert2.min.css'
    ], 'public/css/library.css')
    .scripts([
      'resources/assets/js/libs/sweetalert2.min.js'
    ], 'public/js/library.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
