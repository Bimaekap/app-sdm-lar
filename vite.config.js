import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { NodePackageImporter } from 'sass';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
          scss: {
            api: "modern-compiler",
            importers: [new NodePackageImporter()],
          },
        },
      },
});
