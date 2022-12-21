const mix = require('laravel-mix');

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

//mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

const vendorPath = 'public/assets/vendor';

const vendorDependencies = [
    'autosize', 'axios', 'bootstrap', 'chart.js', 'clipboard', 'easymde', '@simonwep/pickr:pickr',
];

for (const name of vendorDependencies) {
    const split = name.includes(':') ? name.split(':', 2) : [name, name];

    mix.copyDirectory(`node_modules/${split[0]}/dist`, `${vendorPath}/${split[1]}`);
}

mix.disableSuccessNotifications()
    .setPublicPath('public/assets/')
    .sass('resources/sass/admin/admin.scss', `${vendorPath}/admin.css`)
    .js('resources/js/admin/admin.js', `${vendorPath}/admin.js`)
    .sass('node_modules/bootstrap-icons/font/bootstrap-icons.scss', `${vendorPath}/bootstrap-icons/bootstrap-icons.css`)
    .copyDirectory('node_modules/bootstrap-icons/font/fonts', `${vendorPath}/bootstrap-icons/fonts`)
    .copyDirectory('node_modules/tinymce', `${vendorPath}/tinymce`)
    .copyDirectory('node_modules/flatpickr/dist/*.css', `${vendorPath}/flatpickr/css`)
    .copyDirectory('node_modules/flatpickr/dist/*.js', `${vendorPath}/flatpickr/js`)
    .copy('node_modules/sortablejs/Sortable.min.js', `${vendorPath}/sortablejs/Sortable.min.js`)
    .options({
        processCssUrls: false
    });
