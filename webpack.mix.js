let mix = require("laravel-mix");
require("laravel-mix-purgecss");

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
  .disableNotifications()
  .js("resources/assets/js/app.js", "public/js")
  .postCss("resources/assets/css/app.css", "public/css")
  .options({
    postCss: [
      require("postcss-import")(),
      // require("postcss-flexibility")(),
      require("tailwindcss")("./tailwind.js"),
      require("postcss-cssnext")({
        // Laravel Mix adds autoprefixer already, don't need to run it twice
        features: { autoprefixer: false }
      })
    ]
  })
  .purgeCss();

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
