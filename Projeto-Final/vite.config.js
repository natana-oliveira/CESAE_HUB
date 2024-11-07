import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
 
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/login.css'
            ],
            refresh: true,
        }),
    ],
    server: {
        proxy: {
        '/api': 'http://localhost:8000',
        },
    },
});