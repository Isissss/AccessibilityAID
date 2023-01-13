import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/challenge.js',
                'resources/js/challengeForm.js',
                'resources/js/finishedChallenge.js',
                'resources/images/contrast_example_good.png',
                'resources/images/contrast_example_bad.png'

            ],
            refresh: true,
        }),
    ],
});
