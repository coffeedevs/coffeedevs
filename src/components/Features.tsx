import React from 'react';

export interface FeaturesProps {
  locale: 'es' | 'en';
}

export default function Features({ locale }: FeaturesProps) {
  const features = {
    es: [
      { icon: '💻', title: 'Desarrollo Web', description: 'Soluciones modernas y escalables' },
      { icon: '📱', title: 'Aplicaciones Móviles', description: 'iOS y Android de calidad' },
      { icon: '🎨', title: 'Diseño UI/UX', description: 'Interfaces hermosas y funcionales' },
    ],
    en: [
      { icon: '💻', title: 'Web Development', description: 'Modern and scalable solutions' },
      { icon: '📱', title: 'Mobile Apps', description: 'Quality iOS and Android apps' },
      { icon: '🎨', title: 'UI/UX Design', description: 'Beautiful and functional interfaces' },
    ]
  };

  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4">
        <h2 className="text-4xl font-bold text-center mb-12">{locale === 'es' ? 'Nuestros Servicios' : 'Our Services'}</h2>
        
        <div className="grid md:grid-cols-3 gap-8">
          {features[locale].map((feature, idx) => (
            <div key={idx} className="bg-white p-8 rounded-lg shadow hover:shadow-lg transition">
              <div className="text-4xl mb-4">{feature.icon}</div>
              <h3 className="text-xl font-bold mb-2">{feature.title}</h3>
              <p className="text-gray-600">{feature.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
