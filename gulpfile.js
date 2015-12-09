var elixir = require('laravel-elixir');

var bower_dir = 'vendor/bower_components/';
var node_dir = 'node_modules/';
var assets_dir = 'resources/assets/bootstrap/';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as copying vendor resources.
 |
 */

elixir(function (mix) {
    mix.less('app.less', 'resources/assets/css/')

        // Java script
        .copy(bower_dir + 'jquery/dist/jquery.min.js', 'resources/assets/js/vendor/jquery.js')
        .copy(node_dir + 'bootstrap-sass/assets/javascripts/bootstrap.js', 'resources/assets/js/vendor/bootstrap.js')
        .copy(assets_dir + 'dist/toolkit.js', 'resources/assets/js/vendor/bootstrap.js')
        .copy(node_dir + 'vue-strap/dist/vue-strap.js', 'resources/assets/js/vendor/vue-strap.js')
        .copy(bower_dir + 'eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'resources/assets/js/vendor/bootstrap-datetimepicker.js')
        .copy(bower_dir + 'moment/moment.js', 'resources/assets/js/vendor/moment.js')
        .copy(bower_dir + 'remarkable-bootstrap-notify/dist/bootstrap-notify.js', 'resources/assets/js/vendor/bootstrap-notify.js')
        .copy(bower_dir + 'highcharts/highcharts.js', 'resources/assets/js/vendor/highcharts.js')
        .copy(bower_dir + 'vue/dist/vue.js', 'resources/assets/js/vendor/vue.js')
        .copy(bower_dir + 'bootbox/bootbox.js', 'resources/assets/js/vendor/bootbox.js')
        .copy(bower_dir + 'vue-resource/dist/vue-resource.js', 'resources/assets/js/vendor/vue-resource.js')
        .copy(bower_dir + 'algoliasearch/dist/algoliasearch.jquery.js', 'resources/assets/js/vendor/algoliasearch.js')
        .copy(bower_dir + 'typeahead.js/dist/typeahead.jquery.js', 'resources/assets/js/vendor/typeahead.js')
        .copy(bower_dir + 'pusher/dist/pusher.js', 'resources/assets/js/vendor/pusher.js')
        .copy(bower_dir + 'socket.io-client/socket.io.js', 'resources/assets/js/vendor/socket.io.js')
        .copy(bower_dir + 'Bootflat/js/site.min.js', 'resources/assets/js/vendor/bootflat.js')
        .copy(bower_dir + 'dropzone/dist/dropzone.js', 'resources/assets/js/vendor/dropzone.js')
        .copy(bower_dir + 'jQuery.Marquee/jquery.marquee.js', 'resources/assets/js/vendor/marquee.js')
        .scripts(
            [
                'vendor/jquery.js',
                'vendor/moment.js',
                'vendor/bootstrap.js',
                'vendor/bootstrap-datetimepicker.js',
                'vendor/bootstrap-notify.js',
                'vendor/vue.js',
                'vendor/vue-resource.js',
                'vendor/typeahead.js',
                'vendor/bootbox.js',
                'vendor/highcharts.js',
                'vendor/pusher.js',
                'vendor/socket.io.js',
                'vendor/algoliasearch.js',
                'vendor/dropzone.js',
                'vendor/marquee.js',
                'custom/algolia.js',
            ], 'public/js/all.js')

        // CSS
        .copy(bower_dir + 'font-awesome/css/font-awesome.min.css', 'resources/assets/css/vendor/font-awesome.css')
        .copy(bower_dir + 'ionicons/css/ionicons.min.css', 'resources/assets/css/vendor/ionicons.css')
        .copy(bower_dir + 'nukacode-admin/css/admin.css', 'resources/assets/css/vendor/admin.css')
        .copy(bower_dir + 'animate.css/animate.css', 'resources/assets/css/vendor/animate.css')
        .copy(bower_dir + 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css', 'resources/assets/css/vendor/bootstrap-datetimepicker.css')
        .copy(bower_dir + 'dropzone/dist/dropzone.css', 'resources/assets/css/vendor/dropzone.css')
        .styles(
            [
                'app.css',
                'vendor/animate.css',
                'vendor/font-awesome.css',
                'vendor/ionicons.css',
                'vendor/dropzone.css',
                'custom/ss-pika.css',
            ], 'public/css/all.css')

        // Extras
        .copy(bower_dir + 'Bootflat/img', 'public/bootflat/img')
        .copy(bower_dir + 'Bootflat/bootflat/img', 'public/bootflat/img')
        .copy(bower_dir + 'font-awesome/fonts', 'public/fonts')
        .copy(bower_dir + 'ionicons/fonts', 'public/fonts')
        .copy(assets_dir + '/fonts', 'public/fonts')
        .copy('resources/assets/fonts/ss-pika', 'public/fonts')
});
