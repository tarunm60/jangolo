const mix = require('laravel-mix');

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

mix
    .js('resources/assets/js/app.js', 'public/js/')
    .js('resources/assets/js/jangolo/jquery-1.12.2.min.js', 'public/js/')
    .js('resources/assets/js/jangolo/bootstrap.min.js', 'public/js/')
    // .js('resources/assets/js/jangolo/angular.min.js', 'public/js/')
    .js('resources/assets/js/jangolo/jangolo.js', 'public/js/')
    // .js('resources/assets/js/jangolo/jangoloangular.js', 'public/js/')
    // .sass('resources/assets/sass/app.scss', 'public/css/')
    .styles([
        'resources/assets/css/jangolo.css',
        'resources/assets/css/farm_shop.css',
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/font-awesome.min.css'
    ], 'public/css/all.css')
;


// mix.combine([
//         'resources/assets/js/app.js',
//         'resources/assets/js/bootstrap.js',
//         'resources/assets/js/jangolo/jquery-3.2.1.min.js',
//         'resources/assets/js/jangolo/angular.min.js',
//         'resources/assets/js/jangolo/bootstrap.js',
//         'resources/assets/js/jangolo/jangolo.js'
//     ]
//     , 'public/js/app.js')
//     .combine([
//             // 'resources/assets/sass/app.scss',
//             'resources/assets/css/jangolo.css',
//             'resources/assets/css/jangolo.css',
//             'resources/assets/css/farm_shop.css',
//             'resources/assets/css/bootstrap.min.css',
//             'resources/assets/css/font-awesome.min.css'
//         ]
//         , 'public/css/app.css').version();

