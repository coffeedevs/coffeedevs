/** @type {import('tailwindcss').Config} */
export default {
  content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
  theme: {
    extend: {
      colors: {
        coffee: {
          50: '#faf8f6',
          100: '#f5f1ed',
          900: '#1a0e0a',
        }
      },
      fontFamily: {
        sans: ['Gotham Rounded', 'Open Sans', 'sans-serif'],
        display: ['Gotham Rounded', 'Raleway', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
