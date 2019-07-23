const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/admin/app.js', 'public/js/admin')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin/app.scss', 'public/css/admin')
   .tailwind();
