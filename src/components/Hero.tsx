import React from 'react';

export interface HeroProps {
  locale: 'es' | 'en';
}

export default function Hero() {
  return (
    <section id="fold">
      <div style={{ position: 'relative', zIndex: 1 }}>
        <h1>CoffeeDevs</h1>
        <h2 style={{ maxWidth: '800px', margin: '0 auto 2.5rem' }}>
          Achieve Your Dreams Through Tech. We're a team of passionate developers building tools that help you reach your goals and transform your career.
        </h2>
        <a href="#contact" className="btn btn-primary btn-lg">
          Start Your Journey
        </a>
      </div>
    </section>
  );
}
