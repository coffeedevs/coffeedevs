import React from 'react';
import { siteCopy, type SiteLocale } from '@utils/siteCopy';

export interface HeroProps {
  locale: SiteLocale;
}

export default function Hero({ locale }: HeroProps) {
  const copy = siteCopy[locale];

  return (
    <section id="fold">
      <div style={{ position: 'relative', zIndex: 1 }}>
        <h1>CoffeeDevs</h1>
        <h2 style={{ maxWidth: '800px', margin: '0 auto 2.5rem' }}>
          {copy.hero.subtitle}
        </h2>
        <a href="#contact" className="btn btn-primary btn-lg">
          {copy.hero.cta}
        </a>
      </div>
    </section>
  );
}
