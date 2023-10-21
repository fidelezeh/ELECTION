import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "ventis_color": '#4584c4',
                "sfe_color": '#4A9F04',
                "mycolor": '#4FBA74',
                "mycolor1":'#DFF2D8',
                "mycolor2":'#CCEBC1',

                "mycolor3":'#E0EBF5',
                "mycolor4":'#C1D7EB',

                "color_att":'#3C6997',
                "color_rem":'#40454F',
                "color_rej":'#EBEBEB',
            },
        },
    },

    plugins: [forms],
};
