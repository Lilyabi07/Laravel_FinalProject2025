/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
theme: {
    extend: {
      keyframes: {
        wave: {
         '0%': { transform: 'translateX(0)' },
        '100%': { transform: 'translateX(-200vw)' }, 
        }
      },
      animation: {
        'wave': 'wave 2s linear infinite',
      },
    },
  },
  plugins: [],
}