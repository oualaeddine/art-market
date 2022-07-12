import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import * as path from "path";

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',

            'resources/sass/bootstrap.scss',

            'resources/js/app.js',
            'resources/js/card-js.min.js',
            'resources/js/fancybox.js',
            'resources/js/jquery.countdown.min.js',
            'resources/js/jquery.magnific-popup.min.js',
            'resources/js/jquery.min.js',
            'resources/js/jquery.nice-select.min.js',
            'resources/js/nouislider.min.js',
            'resources/js/share-buttons.js',
            'resources/js/slick.min.js',
            'resources/js/sticky-sidebar.min.js',
            'resources/js/wNumb.js',
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
