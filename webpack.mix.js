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

mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/auth.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/auth/auth.scss', 'public/css')
  .sourceMaps(true, 'source-map')
  .options({
    processCssUrls: false // Do not touch stylesheet url()'s
  })
  .version()
  // .browserSync('http://127.0.0.1:8000/');
