# CoffeeDevs - Astro Migration

This project has been migrated from Laravel to [Astro.build](https://astro.build).

## 🚀 What Changed

### Migration Summary
- **From:** Laravel PHP framework with Blade templates
- **To:** Astro static site generator
- **Contact Form:** Simplified to use `mailto:` link (no backend needed)

### Key Changes
1. **Removed Laravel backend** - No longer needed for a static marketing site
2. **Simplified contact form** - Now uses native email client via `mailto:contact@coffeedevs.com`
3. **Static site generation** - Faster, more secure, easier to deploy
4. **Same design** - All existing CSS, JS, and images preserved

## 📁 Project Structure

```
coffeedevs/
├── src/
│   ├── components/       # Reusable Astro components
│   │   ├── Header.astro
│   │   ├── Hero.astro
│   │   ├── Features.astro
│   │   ├── Blog.astro
│   │   ├── Contact.astro  # Simplified with mailto: link
│   │   └── Footer.astro
│   ├── layouts/
│   │   └── Layout.astro   # Main page layout
│   └── pages/
│       └── index.astro    # Homepage
├── public/               # Static assets (CSS, JS, images)
├── astro.config.mjs      # Astro configuration
├── package.json          # Dependencies
└── tsconfig.json         # TypeScript config
```

## 🧞 Commands

All commands are run from the root of the project, from a terminal:

| Command                   | Action                                           |
| :------------------------ | :----------------------------------------------- |
| `npm install`             | Installs dependencies                            |
| `npm run dev`             | Starts local dev server at `localhost:4321`      |
| `npm run build`           | Build your production site to `./dist/`          |
| `npm run preview`         | Preview your build locally, before deploying     |

## 🌐 Deployment

The built site (in `./dist/`) can be deployed to any static hosting service:
- **Netlify** - Drop the `dist` folder or connect your repo
- **Vercel** - Auto-deploys from Git
- **GitHub Pages** - Simple static hosting
- **Cloudflare Pages** - Fast global CDN
- **AWS S3 + CloudFront** - Traditional static hosting

## 📧 Contact Form

The contact section now uses a simple `mailto:` link that opens the user's default email client:

```html
<a href="mailto:contact@coffeedevs.com?subject=Project%20Inquiry">
  Talk to us
</a>
```

**To customize the email address:**
Edit `src/components/Contact.astro` and change `contact@coffeedevs.com` to your preferred email.

## 🎨 Styling

All original styles are preserved in the `public/css/` directory:
- `template.css` - Main template styles
- `app.css` - Application styles
- `animate.css` - Animation library
- `pace-flash.css` - Page loading indicator

## 📝 Original Laravel Files

The original Laravel files are still in the repository for reference:
- `resources/views/` - Original Blade templates
- `app/` - Laravel application code
- `config/` - Laravel configuration

These can be safely removed once the migration is verified.

## 🔗 Learn More

- [Astro Documentation](https://docs.astro.build)
- [Astro Discord Community](https://astro.build/chat)
