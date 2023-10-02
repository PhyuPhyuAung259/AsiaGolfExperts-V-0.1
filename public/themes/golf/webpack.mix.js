const mix = require('laravel-mix');

// Admin
mix.webpackConfig({
    output: {
        path:__dirname+'/dist/frontend',
    }

});

mix.sass('sass/custom.scss','/css');
