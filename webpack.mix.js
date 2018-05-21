let mix = require("laravel-mix");
require("laravel-mix-purgecss");

mix
    .disableNotifications()
    .js("resources/assets/js/app.js", "public/js")
    .postCss("resources/assets/css/app.css", "public/css")
    .options({
        postCss: [
            require("postcss-import")(),
            require("tailwindcss")("./tailwind.js"),
            require("postcss-cssnext")({
                // Laravel Mix adds autoprefixer already, don't need to run it twice
                features: { autoprefixer: false }
            })
        ]
    })
    .purgeCss();

if (mix.inProduction()) {
    mix.version();
}
