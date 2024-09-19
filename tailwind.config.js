import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',  // Add Vue components if needed
        './resources/js/**/*.jsx',  // Add React components if needed
        './resources/**/*.blade.php', // Include all blade files (this line is redundant and can be removed)
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#ff5733', // Example primary color
                secondary: '#f0f0f0', // Example secondary color
            },
        },
    },

    plugins: [
        forms,
        // Add any other plugins here if needed
    ],
};
