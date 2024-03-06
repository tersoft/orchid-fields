const mix = require('laravel-mix');

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

mix.js([
    //'resources/js/vendor/rater.js', // Если нет в npm а только можно скачать плагин, то здесь можно подгрузить
    'resources/js/orchid_fields.js'
], 'public/js/orchid_fields.js');
