# Coffee Devs - Astro + React

Modern website for Coffee Devs developer community, built with Astro and React.

## Features

- ⚡ Static site generation with Astro
- ⚡ Interactive React components
- 🎨 Tailwind CSS styling
- 🌍 Bilingual (ES/EN)
- 📱 Responsive design
- 📰 RSS blog feed integration
- 📧 Contact form with Formspree
- 🚀 Ready for Vercel/Netlify deployment

## Project Structure

```
src/
├── components/
│   ├── Hero.tsx           # Hero section
│   ├── Features.tsx       # Services/features section
│   ├── Blog.tsx          # Blog posts from RSS
│   └── Contact.tsx       # Contact form
├── layouts/
│   └── Layout.astro      # Main layout component
├── pages/
│   ├── index.astro       # Homepage (Spanish)
│   ├── services.astro    # Services page (Spanish)
│   ├── en/
│   │   ├── index.astro   # Homepage (English)
│   │   └── services.astro # Services page (English)
└── styles/
    └── global.css        # Global styles with Tailwind
```

## Getting Started

### Prerequisites
- Node.js 18+
- npm or pnpm

### Installation

```bash
npm install
# or
pnpm install
```

### Development

```bash
npm run dev
# Site runs at http://localhost:3000
```

### Build

```bash
npm run build
npm run preview
```

## Configuration

### Contact Form
Update Formspree endpoint in `src/components/Contact.tsx`:
```tsx
const response = await fetch('https://formspree.io/f/YOUR_FORM_ID', {
```

Get your form ID from https://formspree.io

### RSS Feed
Blog component fetches from `https://blog.coffeedevs.com/rss`

Update in `src/components/Blog.tsx` if blog URL changes.

### Localization
- Spanish (default): `/`
- English: `/en`

Add more locales in `astro.config.mjs` and create corresponding pages.

## Deployment

### Vercel
```bash
vercel deploy
```

### Netlify
```bash
netlify deploy --prod --dir=dist
```

### GitHub Pages
Configure in `astro.config.mjs` and push to `gh-pages` branch.

## Technology Stack

- **Astro 4.x** - Web framework
- **React 18.x** - UI components
- **Tailwind CSS 3.x** - Styling
- **TypeScript** - Type safety

## License

MIT

## Support

For questions or issues, open an issue on GitHub.
