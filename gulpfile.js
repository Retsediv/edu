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
    mix.scripts([
        'vendor/jquery-2.1.4.min.js',
        'vendor/moment.min.js',
        'vendor/vue.js',
        'vendor/vue-resource.js',
        'vendor/popup.min.js',
        'vendor/semantic.min.js',
        'component/task.js',
        'main.js',
        'vendor/tinymce.min.js'
    ], 'public/js/main.js');

    mix.styles([
        'vendor/popup.min.css',
        'vendor/semantic.min.css',
        'vendor/font-awesome.min.css'
    ], 'public/css/vendor.css');
});
