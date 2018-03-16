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
   .copyDirectory('resources/assets/js/oneSignal/', 'public')
   .copyDirectory('resources/assets/js/preloadingEffekt/', 'public/js')
   .copyDirectory('resources/assets/sass/preloadingEffekt/', 'public/css')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .browserSync({
        proxy: 'localhost:8000'
    });
