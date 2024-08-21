import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { globSync } from "glob";

export default defineConfig({
    plugins: [
        laravel({
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            input: globSync("resources/{css,js,front}/**/*.{css,js,png,ico,jpg}"),
            refresh: true,
            // publicPath: "/public/",
        }),
    ],
});
