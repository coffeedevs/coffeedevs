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
│   ├── components/          # Reusable Astro components
│   │   ├── Header.astro
│   │   ├── Hero.astro
│   │   ├── Features.astro
│   │   ├── Blog.astro
│   │   ├── Contact.astro    # Simplified with mailto: link
│   │   └── Footer.astro
│   ├── layouts/
│   │   └── Layout.astro     # Main page layout
│   └── pages/
│       └── index.astro      # Homepage
├── public/                  # Static assets (CSS, JS, images, fonts)
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files
│   ├── images/             # Image assets
│   ├── fonts/              # Web fonts
│   └── _redirects          # Netlify redirects
├── astro.config.mjs        # Astro configuration
├── netlify.toml            # Netlify deployment config
├── package.json            # NPM dependencies (Astro only!)
├── tsconfig.json           # TypeScript config
└── README-ASTRO.md         # This file
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

### Deploy to Netlify (Recommended) 🎯

This project is pre-configured for Netlify deployment with `netlify.toml` configuration.

#### Option 1: Deploy from Git (Recommended)

1. **Push your code to GitHub** (already done!)
2. **Connect to Netlify:**
   - Go to [netlify.com](https://netlify.com) and sign in
   - Click "Add new site" → "Import an existing project"
   - Choose GitHub and select the `coffeedevs` repository
   - Select the branch: `claude/migrate-astro-simplify-contact-01UaTpMha4HYq1Mavs4aiNYh` (or main after merging)
3. **Netlify will auto-detect the settings:**
   - Build command: `npm run build` (from `netlify.toml`)
   - Publish directory: `dist` (from `netlify.toml`)
   - Node version: 18 (from `netlify.toml`)
4. **Click "Deploy site"** - That's it! 🚀

Netlify will automatically rebuild and deploy whenever you push changes to your repository.

#### Option 2: Manual Deploy

```bash
# Install Netlify CLI
npm install -g netlify-cli

# Build the site
npm run build

# Deploy to Netlify
netlify deploy --prod
```

#### What's Included in Netlify Configuration

The `netlify.toml` file includes:
- ✅ Build command and output directory
- ✅ Node.js version specification (v18)
- ✅ Security headers (X-Frame-Options, XSS Protection, etc.)
- ✅ Asset caching rules (1 year for CSS, JS, images, fonts)
- ✅ Redirect rules for proper routing

### Other Deployment Options

The built site (in `./dist/`) can also be deployed to:
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

## 🧹 Clean Codebase

All PHP/Laravel dependencies and files have been removed:
- ✅ Removed `composer.json` and `composer.lock`
- ✅ Removed Laravel directories (`app/`, `resources/`, `config/`, etc.)
- ✅ Removed build tools (`gulpfile.js`, `webpack.config.js`)
- ✅ Removed PHP files (`artisan`, `server.php`, `phpunit.xml`)
- ✅ Kept only `public/` (static assets) and `src/` (Astro source)

The project is now a clean, modern Astro site with no PHP dependencies!

## 🔗 Learn More

- [Astro Documentation](https://docs.astro.build)
- [Astro Discord Community](https://astro.build/chat)
