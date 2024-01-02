/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#DCDAB6",
                secondary: "#3B6EAA",
                tertiary: "#41651D",
                background: "#F5F5F5"
            }
        },
        fontFamily: {
            inter: "Inter"
        }
    },
    plugins: [],
}

