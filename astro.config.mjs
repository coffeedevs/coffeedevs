import { defineConfig } from 'astro/config';
import react from '@astrojs/react';

export default defineConfig({
  // Enable React
  integrations: [react()],
  
  // Build options
  output: 'static',
  
  // i18n configuration
  i18n: {
    defaultLocale: 'es',
    locales: ['es', 'en'],
    routing: {
      prefixDefaultLocale: false
    }
  }
});
