const plugin = require('tailwindcss/plugin')

module.exports = {
  purge: [

    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',

  ],
  darkMode: false, // or 'media' or 'class'
  // theme: {
  //   colors: {
  //     gray: '#ccc',
  //     // blue: colors.lightBlue,
  //     // red: colors.rose,
  //     // pink: colors.fuchsia,
  //   },
  //   fontFamily: {
  //     sans: ['Graphik', 'sans-serif'],
  //     serif: ['Merriweather', 'serif'],
  //   },
  //   extend: {
  //     spacing: {
  //       '128': '32rem',
  //       '144': '36rem',
  //     },
  //     borderRadius: {
  //       '4xl': '2rem',
  //     }
  //   }
  // },
  // prefix: 'tw-',
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
