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
      },
    },
  },
  plugins: [require('tailwindcss-primeui')],
}

