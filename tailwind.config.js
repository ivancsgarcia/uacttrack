/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'selector',
  content: [
    "./index.html",
    "./resources/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'ua-blue': '#272F5C',
        'ua-gray': '#D9D9D9',
      },
    },
  },
  plugins: [require('tailwindcss-primeui')],
}

