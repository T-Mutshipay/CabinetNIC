import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // ou 'media'
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                gold: '#C69043', 
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'Présentation1': "url('/img/Présentation1.jpg')",
              }
        },
    },
    plugins: [
        require('@tailwindcss/forms'), // Assurez-vous que le plugin est ajouté ici
        require('flowbite/plugin')
    ]
};
