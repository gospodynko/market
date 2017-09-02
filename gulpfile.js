const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

var path = {
	'vendors':'public/css/vendor/'
};
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('main.scss')
        .sass('admin.scss')
        .sass('/user-admin/useradmin.scss')
        .webpack('app.js')
        .webpack('appUserAdmin.js');
});
