/*const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir(function(mix) {
    //mix.webpack('app.js');
    mix.scripts([
        'app.js'
    ], 'public/js/app.js', 'public/js')
    .version(["public/js/app.js"]);


});
*/

/*
var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

require('laravel-elixir-webpack-official');
elixir(mix => {
    mix.sass('app.scss').webpack('app.js');
});
*/
/*
elixir(function(mix) {
    mix.scripts([
        'app.js'
    ], 'public/js/app.js', 'public/js')
        .version(["public/js/app.js"]);

    mix.webpack('app.js');
});*/



/*
var elixir = require('laravel-elixir');
require('laravel-elixir-browserify-official');
require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.browserify('app.js');
});
*/

var elixir = require('laravel-elixir')

require('laravel-elixir-vue-2')

elixir(function(mix) {
    mix.webpack('app.js'); // resources/assets/js/app.js
})
