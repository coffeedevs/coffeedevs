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
    <section id="features" className="section section-center section-features" style={{ padding: '80px 0', backgroundColor: '#f9f9f9' }}>
      <div className="container">
        <h1 className="section-title text-center" style={{ marginBottom: '60px' }}>
          <span>{locale === 'es' ? 'Nuestros Servicios' : 'Our Services'}</span>
        </h1>
        
        <div className="row wow fadeInUp">
          {features[locale].map((feature, idx) => (
            <div key={idx} className="col-md-4" style={{ marginBottom: '30px', textAlign: 'center' }}>
              <div className="service">
                <div className="service-icon" style={{ marginBottom: '20px' }}>
                  <img src={feature.icon} alt={feature.title} style={{ height: '80px', width: 'auto' }} />
                </div>
                <h2 style={{ fontSize: '20px', marginBottom: '15px' }}>{feature.title}</h2>
                <p style={{ color: '#666', fontSize: '16px', lineHeight: '1.6' }}>
                  {feature.description}
                </p>
              </div>
            </div>
          ))}
        </div>

        <div style={{ textAlign: 'center', marginTop: '40px' }}>
          <a href="#contact" className="btn btn-primary btn-lg">
            {locale === 'es' ? 'Trabajemos juntos' : 'Let\'s work together'}
          </a>
        </div>
      </div>
    </section>
  );
}
