const mix = require("laravel-mix");

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

mix.js("resources/js/admin/app.js", "public/js/admin/app_admin.min.js").vue()
    .js("resources/js/client/app.js", "public/js/client/app_client.min.js").vue()   
    .sass("resources/sass/app.sass","public/css/app.min.css");