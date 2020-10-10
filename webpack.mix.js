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
    'autosize', 'axios', 'bootstrap', 'chart.js', 'clipboard', 'easymde', 'jquery', '@simonwep/pickr:pickr',
];

for (const name of vendorDependencies) {
    const split = name.includes(':') ? name.split(':', 2) : [name, name];

    mix.copyDirectory(`node_modules/${split[0]}/dist`, `${vendorPath}/${split[1]}`);
}

mix.setPublicPath('public/assets/')
    .copyDirectory('node_modules/tinymce', `${vendorPath}/tinymce`)
    .copyDirectory('node_modules/startbootstrap-sb-admin-2/css', `${vendorPath}/sb-admin-2/css`)
    .copyDirectory('node_modules/startbootstrap-sb-admin-2/js', `${vendorPath}/sb-admin-2/js`)
    .copyDirectory('node_modules/flatpickr/dist/*.css', `${vendorPath}/flatpickr/css`)
    .copyDirectory('node_modules/flatpickr/dist/*.js', `${vendorPath}/flatpickr/js`)
    .copy('node_modules/sortablejs/dist/sortable.umd.js', `${vendorPath}/sortablejs/Sortable.min.js`);

for (const path of ['css', 'js', 'sprites', 'webfonts']) {
    mix.copyDirectory(`node_modules/@fortawesome/fontawesome-free/${path}`, `${vendorPath}/fontawesome/${path}`);
}
