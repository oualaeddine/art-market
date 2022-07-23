import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import * as path from "path";


export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/css/app-rtl.css',
            'resources/css/fancybox.min.css',

            'resources/css/bootstrap.css',
            'resources/css/bootstrap-rtl.css',

            'resources/js/shop.js',
            'resources/js/wilaya.js',
            // 'resources/js/app.js',
            // 'resources/js/card-js.min.js',
            // 'resources/js/fancybox.js',
            // 'resources/js/jquery.countdown.min.js',
            // 'resources/js/jquery.magnific-popup.min.js',
            // 'resources/js/jquery.min.js',
            // 'resources/js/jquery.nice-select.min.js',
            // 'resources/js/nouislider.min.js',
            // 'resources/js/share-buttons.js',
            // 'resources/js/slick.min.js',
            // 'resources/js/sticky-sidebar.min.js',
            // 'resources/js/wNumb.js',
            // 'resources/js/custom.js',
            // 'resources/js/vendor.min.js',
        ]),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
