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
        'resources/assets/css/colors.css',
        'resources/assets/css/aram/bootstrap.min.css',
        'resources/assets/css/aram/flaticon.css',
        'resources/assets/css/aram/animate.css',
        'resources/assets/css/aram/font-awesome.min.css',
        'resources/assets/css/aram/material-design-iconic-font.min.css',
        'resources/assets/css/aram/plugins/animate.css',
        'resources/assets/css/aram/plugins/owl.theme.css',
        'resources/assets/css/aram/plugins/owl.carousel.css',
        'resources/assets/css/aram/plugins/owl.transitions.css',
        'resources/assets/css/aram/style.css',
        'resources/assets/css/aram/default.css',
        'resources/assets/css/aram/lightbox.css',
        'resources/assets/css/aram/meanmenu.css',
        'resources/assets/css/aram/date-picker.css',
        'resources/assets/css/aram/responsive.css',
   ], 'public/css/app.css');