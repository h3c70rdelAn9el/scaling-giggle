module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        main: '#2B1b2E',
        body: '#A35d5B',
        background: '#6B384A',
        content: '#E5D899'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
