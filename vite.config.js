import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
     "builds": [
    {
      "src": "index.php",
      "use": "@vercel/php"
    },
    {
      "src": "public/build/**/*",
      "use": "@vercel/static"
    }
  ],
  "outputDirectory": "public/build",
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
