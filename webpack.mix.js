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
 const PATHS = {
    src: 'src',
    dist: '.',
    proxy: 'http://127.0.0.1/airlinesforrichpeople'
  };
mix.js('resources/assets/js/app.js', 'public/assets/js')
    .js('resources/assets/js/auth.js', 'public/assets/js/auth.js')
    .js('resources/assets/js/index_page.js', 'public/assets/js/index_page.js')
    .js('resources/assets/js/functions.js', 'public/assets/js/functions.js')
    .js('resources/assets/js/update_data_user.js', 'public/assets/js/update_data_user.js')
    .js('resources/assets/js/search_ticket_page.js', 'public/assets/js/search_ticket_page.js')
    .copy('resources/assets/images', 'public/assets/images')
    .sass('resources/assets/sass/style.scss', 'public/assets/css/style.css')
    .sass('resources/assets/sass/auth/auth.scss', 'public/assets/css/auth.css')
    .sass('resources/assets/sass/cabinet/my_profile.scss', 'public/assets/css/my_pofile.css')
    // .browserSync({ 
    //     proxy: 'http://127.0.0.1:8000'
    // });
mix.then(() => {
    minifier.minify('public/assets/css/style.css')
    minifier.minify('public/assets/css/auth.css')
});

