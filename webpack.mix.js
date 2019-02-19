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


mix.webpackConfig({
  resolve: {
    modules: [
      path.resolve('./../base/resources/js'),
      path.resolve('./node_modules')
    ]
  }
});

mix.setPublicPath( path.resolve(__dirname) );

// backend
mix.sass('resources/scss/app.scss', 'assets/css/app.css', {
  includePaths: [
    'node_modules/foundation-sites/scss',
    './../base/resources/scss'
  ]
})
.js('resources/js/app.js', 'assets/js/app.js');

mix.browserSync({
  proxy: 'ipinclusive.work',
  notify: false,
  files: [
    "resources/**/*",
    "*.php",
    "partials/**/*.php",
    "functions/**/*.php",
  ]
});
