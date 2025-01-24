import defaultTheme from 'tailwindcss/defaultTheme';
const plugin = require('tailwindcss/plugin')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins :['Poppins', 'serif'],
                // sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'widget-1' : '#03346E',
                'widget-2' : '#5C5470',
                'widget-3' : '#512B81',
            }
        },
    },
    plugins: [
    
    ],
};
