import React from 'react';

export interface HeroProps {
  locale: 'es' | 'en';
}

export default function Hero({ locale }: HeroProps) {
  const content = {
    es: {
      title: 'CoffeeDevs',
      subtitle: 'Desarrollo profesional de software',
      cta: 'Trabajemos juntos'
    },
    en: {
      title: 'CoffeeDevs',
      subtitle: 'Professional software development',
      cta: 'Let\'s work together'
    }
  };

  const text = content[locale];

  return (
    <section id="fold">
      <div style={{ position: 'relative', zIndex: 1 }}>
        <h1>{text.title}</h1>
        <h2>{text.subtitle}</h2>
        <a href="#contact" className="btn btn-primary btn-lg">
          {text.cta}
        </a>
      </div>
    </section>
  );
}
