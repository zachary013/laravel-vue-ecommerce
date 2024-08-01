import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import flowbitePlugin from "flowbite/plugin";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    100: "#5D001E", // Dark Scarlet
                    200: "#FFFFFF", // Light Gray
                    300: "#E3AFBC", // Pink
                    400: "#9A1750", // Dark Pink
                    500: "#EE4C7C", // Light Pink
                    600: "#E74C7C",
                    700: "#E3E2DF", // Light Gray
                },
            },
        },
    },

    plugins: [forms, flowbitePlugin],
};
