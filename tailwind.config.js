const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'hero-pattern': "url('public/assets/img/login.png')",
                'footer-texture': "url('/img/footer-texture.png')",
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundImage: ['hover', 'focus'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
    backgroundImage: false,
};
