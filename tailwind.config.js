/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
	  './resources/**/*.{js,ts,jsx,tsx}',
  ],
  theme: {
    minWidth: {
      '1/2': '50%',
    }
  },
  plugins: [],
}
