var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-black.min.css'
    ], 'public/css/app.css', 'resources/assets');

    mix.scripts([
        'plugins/jQuery/jQuery-2.1.4.min.js',
        'bootstrap/js/bootstrap.min.js',
        'dist/js/app.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.min.js'
    ], 'public/js/app.js', 'resources/assets');
});
