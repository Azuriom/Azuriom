import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

// Relative to Vite's build output directory, resolve to public/assets/vendor.
const vendorDest = '../assets/vendor';

// stripBase counts segments to discard so files land at dest/ with their
// internal structure intact.

const copyDist = (pkg, name = pkg.split('/').pop()) => ({
    src: `node_modules/${pkg}/dist/**`,
    dest: `${vendorDest}/${name}`,
    rename: {stripBase: pkg.split('/').length + 2},
});

const copyPackage = (pkg, name = pkg.split('/').pop()) => ({
    src: `node_modules/${pkg}/**`,
    dest: `${vendorDest}/${name}`,
    rename: {stripBase: pkg.split('/').length + 1},
});

const copySubdir = (srcPath, destSubdir) => ({
    src: `node_modules/${srcPath}/**`,
    dest: `${vendorDest}/${destSubdir}/${srcPath.split('/').pop()}`,
    rename: {stripBase: srcPath.split('/').length + 1},
});

const copyGlob = (pattern, destSubdir) => ({
    src: `node_modules/${pattern}`,
    dest: `${vendorDest}/${destSubdir}`,
    rename: {stripBase: true},
});

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/admin/admin.js',
                'resources/sass/admin/admin.scss',
            ],
            refresh: true,
        }),

        // Vendor assets for themes. Only written during `vite build` (but not during `vite`)
        viteStaticCopy({
            targets: [
                copyDist('axios'),
                copyDist('bootstrap'),
                copyDist('easymde'),
                copyDist('@simonwep/pickr', 'pickr'),
                copyGlob('bootstrap-icons/font/bootstrap-icons.css', 'bootstrap-icons'),
                copySubdir('bootstrap-icons/font/fonts', 'bootstrap-icons'),
                copyPackage('tinymce'),
                copyGlob('flatpickr/dist/*.css', 'flatpickr/css'),
                copyGlob('flatpickr/dist/*.js', 'flatpickr/js'),
                copyGlob('flatpickr/dist/l10n/*.js', 'flatpickr/js/l10n'),
                copyGlob('sortablejs/Sortable.min.js', 'sortablejs'),
                copyGlob('chart.js/dist/chart.umd.js', 'chart.js'),
            ],
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: 'assets/[name].js',
                chunkFileNames: 'assets/[name].js',
                assetFileNames: 'assets/[name][extname]',
            },
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                // Silence deprecation warnings, see https://github.com/twbs/bootstrap/issues/40962
                silenceDeprecations: ['color-functions', 'global-builtin', 'import', 'if-function']
            },
        }
    },
});
