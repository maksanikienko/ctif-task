import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({

    plugins: [
        laravel({
            input: [  'resources/js/admin-app.js', 'resources/js/main-app.js'],
            refresh: true,
        }),
        vue(),

    ],
});
