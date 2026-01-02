import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/src/main.jsx',
            refresh: true,
        }),
        react(),
    ],
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
    },
    server: {
        host: 'localhost',
        port: 3000,
        strictPort: true,
    },
});
