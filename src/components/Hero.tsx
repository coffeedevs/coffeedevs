import React from 'react';

export interface HeroProps {
  locale: 'es' | 'en';
}

export default function Hero({ locale }: HeroProps) {
  const content = {
    es: {
      title: 'Comunidad de Desarrollo',
      subtitle: 'Conectando desarrolladores apasionados',
      cta: 'Conócenos'
    },
    en: {
      title: 'Developer Community',
      subtitle: 'Connecting passionate developers',
      cta: 'Learn More'
    }
  };

  const text = content[locale];

  return (
    <section className="relative bg-gradient-to-r from-coffee-900 to-gray-900 text-white py-20">
      <div className="max-w-7xl mx-auto px-4 text-center">
        <h1 className="text-5xl font-bold mb-4">{text.title}</h1>
        <p className="text-xl text-gray-300 mb-8">{text.subtitle}</p>
        <button className="bg-white text-coffee-900 px-8 py-3 rounded font-bold hover:bg-gray-100 transition">
          {text.cta}
        </button>
      </div>
    </section>
  );
}
