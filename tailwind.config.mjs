/** @type {import('tailwindcss').Config} */
export default {
  content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
  theme: {
    extend: {
      colors: {
        primary: '#f15f4c',
        secondary: '#e74430',
        accent: '#a855f7',
        'dark-bg': '#0a0a0a',
        'dark-surface': '#1a1a1a',
        'warm-brown': '#2d2416',
      },
    },
  },
  plugins: [],
}
