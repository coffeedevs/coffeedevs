import React from 'react';

export interface FeaturesProps {
  locale: 'es' | 'en';
}

export default function Features({ locale }: FeaturesProps) {
  const features = {
    es: [
      { icon: '/images/custom.png', title: 'Desarrollo Personalizado', description: 'Soluciones a medida para tus necesidades específicas' },
      { icon: '/images/design.png', title: 'Desarrollo Web', description: 'Aplicaciones web modernas y escalables' },
      { icon: '/images/mobile.png', title: 'Desarrollo Móvil', description: 'Aplicaciones iOS y Android de alta calidad' },
    ],
    en: [
      { icon: '/images/custom.png', title: 'Custom Development', description: 'Solutions tailored to your specific needs' },
      { icon: '/images/design.png', title: 'Web Development', description: 'Modern and scalable web applications' },
      { icon: '/images/mobile.png', title: 'Mobile Development', description: 'High-quality iOS and Android apps' },
    ]
  };

  return (
    <section id="features">
      <h1 className="section-title">{locale === 'es' ? 'Nuestros Servicios' : 'Our Services'}</h1>
      
      <div className="row">
        {features[locale].map((feature, idx) => (
          <div key={idx}>
            <div className="service">
              <div className="service-icon">
                <img src={feature.icon} alt={feature.title} />
              </div>
              <h2>{feature.title}</h2>
              <p>{feature.description}</p>
            </div>
          </div>
        ))}
      </div>

      <div style={{ textAlign: 'center', marginTop: '2rem' }}>
        <a href="#contact" className="btn btn-primary btn-lg">
          {locale === 'es' ? 'Trabajemos juntos' : 'Let\'s work together'}
        </a>
      </div>
    </section>
  );
}
