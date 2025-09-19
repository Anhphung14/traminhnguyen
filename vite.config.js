import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    base: '/', // Đường dẫn tương đối, asset sẽ tự động dùng HTTPS nếu trang chính là HTTPS
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                // ...thêm các file khác nếu cần...
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    // Sử dụng cấu hình mặc định cho Vue 3
                    // Nếu dùng Vue 2, có thể cần sửa lại
                },
            },
        }),
    ],
    // Nếu cần cấu hình server cho Laravel
    server: {
        host: 'localhost',
        port: 5173,
        // ...existing code...
    },
    build: {
        rollupOptions: {
            external: [
                '/storage/logo.jpg', // Thêm asset ngoài dự án vào đây
                // ...thêm các file khác nếu cần...
            ],
        },
    },
});
