const mix = require('laravel-mix');

// Admin
mix.webpackConfig({
    output: {
        path:__dirname+'/dist/frontend',
    }

});

mix.sass('sass/app.scss','css');
mix.sass('sass/frontend.scss','css');
mix.sass('sass/contact.scss','css');
mix.sass('sass/rtl.scss','css');
mix.sass('module/user/scss/user.scss','module/user/css');
mix.sass('module/property/scss/map.scss','module/property/css');
