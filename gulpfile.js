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
        'component/blog.js',
        'component/pollCreate.js',
        'vendor/tinymce.min.js',
        'vendor/picker.js',
        'vendor/picker.date.js',
        'main.js'
    ], 'public/js/main.js');

    mix.styles([
        'vendor/popup.min.css',
        'vendor/semantic.min.css',
        'vendor/classic.css',
        'vendor/classic.date.css',
        'vendor/rtl.css',
        'vendor/font-awesome.min.css'
    ], 'public/css/vendor.css');
});
