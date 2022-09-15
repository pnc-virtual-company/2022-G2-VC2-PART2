/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors:{
        warning : '#FFAD5C',
        primary : '#22BBEA',
        light_blue : '#BBD7E0',
        warning_300 : '#FFBD7C'
      }
    },
  },
  plugins: [
    
  ],
}
