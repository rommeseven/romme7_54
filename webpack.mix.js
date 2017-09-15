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

mix.copy('resources/assets/cms/other', 'public/other', false);   
mix.copy('resources/assets/cms/img', 'public/img', false);   
mix.js('resources/assets/cms/js/app.js', 'public/js');
mix.sass('resources/assets/cms/sass/app.scss', 'public/css').version();

mix.copy('resources/assets/frontend/other', 'public/other', false);   
mix.copy('resources/assets/frontend/img', 'public/img', false);   


mix.js('resources/assets/frontend/js/public.js', 'public/js')
   .sass('resources/assets/frontend/sass/public.scss', 'public/css')
   .version();

