const mix = require('laravel-mix');
let minifier = require('minifier');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/assets/js')
    .copy('resources/assets/images', 'public/assets/images')
    .sass('resources/assets/sass/style.scss', 'public/assets/css/style.css')
    .version()
    .sass('resources/assets/sass/auth/auth.scss', 'public/assets/css/auth.css')
    .version();
mix.then(() => {
    minifier.minify('public/assets/css/style.css')
    minifier.minify('public/assets/css/auth.css')
});