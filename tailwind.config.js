import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import daisyui from 'daisyui';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './node_modules/daisyui/dist/**/*.js',
        './vendor/mary/ui/resources/**/*.blade.php',
        './vendor/robsontenorio/mary/src/View/Components/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    // theme: {
    //     extend: {
    //         fontFamily: {
    //             sans: ['Figtree', ...defaultTheme.fontFamily.sans],
    //         },
    //     },
    // },

    // plugins: [forms, typography, daisyui],
    plugins: [require('daisyui')],
};
