/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
        colors: {
            'primary': '#51247A',
        }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

