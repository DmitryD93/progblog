import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: {
                'css/app': 'resources/css/app.css',
                'css/fonts': 'resources/css/fonts.css',
                'js/app': 'resources/js/app.js'
            },
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/images/icons/*.svg',
                    dest: 'assets/images/icons'
                },
                {
                    src: 'resources/fonts/*',
                    dest: 'assets/fonts'
                }
            ]
        }),
        // tailwindcss(),
    ],
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name?.endsWith('.svg')) {
                        return 'assets/images/icons/[name][extname]';
                    }
                    if (assetInfo.name?.match(/\.(png|jpg|jpeg|gif|webp)$/)) {
                        return 'assets/images/[name][extname]';
                    }
                    if (assetInfo.name?.endsWith('.css')) {
                        return 'assets/css/[name][extname]';
                    }
                    if (assetInfo.name?.match(/\.(woff2|ttf|woff|eot)$/)) {
                        return 'assets/fonts/[name][extname]';
                    }
                    return 'assets/[name][extname]';
                },
                chunkFileNames: 'assets/js/[name].js',
                entryFileNames: 'assets/js/[name].js',
            }
        },
        assetsInlineLimit: (filePath) => {
            return filePath.match(/\.(svg|woff2|ttf|woff|eot|png|jpg|jpeg|gif|webp)$/) ? 0 : undefined;
        }
    }
});
