/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/css/**/*.css'
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
        'orbitron': ['Orbitron', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        'exo-2': ['Exo 2', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        'catamaran': ['Catamaran', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
