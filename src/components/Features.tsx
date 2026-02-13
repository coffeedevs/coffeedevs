import React from 'react';
import { siteCopy, type SiteLocale } from '@utils/siteCopy';

export interface FeaturesProps {
  locale: SiteLocale;
}

export default function Features({ locale }: FeaturesProps) {
  const copy = siteCopy[locale];

  return (
    <section id="features">
      <h1 className="section-title">{copy.features.title}</h1>

      <div className="row">
        {copy.features.items.map((feature, idx) => (
          <div key={idx}>
            <div className="service">
              <div className="service-icon">
                <img src={feature.icon} alt={feature.title} />
              </div>
              <h2>{feature.title}</h2>
              <p>{feature.text}</p>
            </div>
          </div>
        ))}
      </div>

      <div style={{ textAlign: 'center', marginTop: '2rem' }}>
        <a href="#contact" className="btn btn-primary btn-lg">
          {copy.features.cta}
        </a>
      </div>
    </section>
  );
}
