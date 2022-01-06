const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
<<<<<<< HEAD
    content: [
=======
    mode: 'jit',
    purge: [
>>>>>>> 9caac8dc45f3eaa383ea36ec2e8ec22d6f74fbff
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
