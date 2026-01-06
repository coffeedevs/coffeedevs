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
    <section 
      id="fold" 
      className="section-slide"
      style={{
        backgroundImage: 'url(/images/bg1.jpg)',
        backgroundSize: 'cover',
        backgroundPosition: 'center',
        backgroundAttachment: 'fixed',
        position: 'relative',
        minHeight: '100vh',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        marginTop: '50px'
      }}
    >
      <div style={{
        position: 'absolute',
        top: 0,
        left: 0,
        right: 0,
        bottom: 0,
        backgroundColor: 'rgba(0, 0, 0, 0.4)',
        zIndex: 1
      }}></div>
      
      <div style={{ position: 'relative', zIndex: 2, textAlign: 'center', color: 'white' }}>
        <h1 style={{
          fontSize: '80px',
          fontWeight: 'bold',
          marginBottom: '20px',
          textShadow: '2px 2px 4px rgba(0, 0, 0, 0.5)'
        }}>
          {text.title}
        </h1>
        <h2 style={{
          fontSize: '28px',
          fontWeight: '300',
          marginBottom: '30px',
          textShadow: '1px 1px 2px rgba(0, 0, 0, 0.5)'
        }}>
          {text.subtitle}
        </h2>
        <a 
          href="#contact" 
          className="btn btn-primary btn-lg"
          style={{ marginTop: '20px' }}
        >
          {text.cta}
        </a>
      </div>
    </section>
  );
}
