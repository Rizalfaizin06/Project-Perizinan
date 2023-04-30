/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}", "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins']
        },
        colors: {
          primary: '#10aedb',
          secondary: '#e4eeff',
          separate: '#f9f9fb',
          dark: '#0f172a',
        }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
