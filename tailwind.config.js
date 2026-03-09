/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // Add your custom colors/fonts if needed
      colors: {
        primary: '#ef4444', // your red accent
      },
    },
  },
  plugins: [],
}