const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        '/vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                treb: ['Trebuchet MS', ...defaultTheme.fontFamily.sans]
            },
            listStyleType: {
                square: 'square'
            },
            colors: {
                aspektin: '#A220E8',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
}
