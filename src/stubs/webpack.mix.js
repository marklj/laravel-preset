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

require('laravel-mix-purgecss');

mix
  .js('resources/js/app.js', 'public/js')
  .extract(['vue', 'axios'])
  .webpackConfig({
    resolve: {
      alias: { vue$: 'vue/dist/vue.runtime.js' },
    },
  })
  .postCss('resources/css/app.css', 'public/css')
  .options({
    postCss: [
      require('postcss-import')(),
      require('tailwindcss')(/* './path/to/tailwind.js' */),
      require('postcss-nesting')(),
    ],
  })
  .purgeCss();

if (mix.inProduction()) {
  mix.version();
}
