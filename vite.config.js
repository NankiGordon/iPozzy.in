import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',  // Your main JS file
        'resources/css/app.css', // Your main CSS file
      ],
      refresh: true,  // Enables auto-refresh when files change
    }),
  ],
});
