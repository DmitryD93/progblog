import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/fonts.css',
                'resources/js/app.js'
            ],
            refresh: true,
        })
    ],
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name?.endsWith('.css')) {
                        return 'css/[name].[hash][extname]';
                    }
                    // Шрифты → /public/build/fonts/[name].[hash][extname]
                    if (assetInfo.name?.match(/\.(woff2|ttf|woff|eot)$/)) {
                        return 'fonts/[name].[hash][extname]';
                    }
                    // SVG → /public/build/images/icons/[name].[hash][extname]
                    if (assetInfo.name?.endsWith('.svg')) {
                        return 'images/icons/[name].[hash][extname]';
                    }
                    // Изображения → /public/build/images/[name].[hash][extname]
                    if (assetInfo.name?.match(/\.(png|jpg|jpeg|gif|webp)$/)) {
                        return 'images/[name].[hash][extname]';
                    }
                    // Остальное → /public/build/assets/[name].[hash][extname]
                    return 'assets/[name].[hash][extname]';
                },
                // JS файлы → /public/build/js/[name].[hash].js
                entryFileNames: 'js/[name].[hash].js',
                chunkFileNames: 'js/[name].[hash].js'
            }
        }
    }
});
