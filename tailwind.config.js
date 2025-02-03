/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.css',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto, serif'],
            },
            colors: {
                rose: '#fda4af',
                hotPink: '#db2777',
                hotPinkHover: '#ec4899',
                lightPink: '#fce7f3',
                lightGray: '#f1f5f9',
                folder: '#fefce8'
            }
        },
    },
    plugins: [],
};
