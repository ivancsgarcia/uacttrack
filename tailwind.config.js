/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "selector",
    content: ["./index.html", "./resources/**/*.{vue,js,ts,jsx,tsx,blade.php}"],
    theme: {
        extend: {
            colors: {
                "ua-blue": "#272F5C",
                "ua-gray": "#D9D9D9",
                "ua-yellow": "#FFDB7D",
            },
        },
    },
    plugins: [require("tailwindcss-primeui")],
};
