import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "sans-serif"],
            },
            colors: {
                gold: "#D39C32",
                "gold-bg": "#FFFAD7",
                "gold-bg-dark": "#F2E4CA",
                "gold-dark": "#AC802D",
                silver: "#D9D9D9",
            },
        },
    },
    plugins: [],
};
