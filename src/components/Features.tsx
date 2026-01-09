import React from 'react';

export interface FeaturesProps {
  locale: 'es' | 'en';
}

export default function Features() {
  const features = [
    { icon: '/images/custom.png', title: "Goal-Oriented", description: "Our app is designed to help you achieve your career goals, with features that guide you through your certification journey step by step." },
    { icon: '/images/design.png', title: "User-Focused", description: "Every feature is crafted with your success in mind, ensuring you have everything you need to reach your full potential." },
    { icon: '/images/mobile.png', title: "Continuous Growth", description: "We're constantly evolving our app to better support your journey, adding new features and content to help you stay ahead." },
  ];

  return (
    <section id="features">
      <h1 className="section-title">Your Success is Our Mission</h1>

      <div className="row">
        {features.map((feature, idx) => (
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
          Start Your Journey
        </a>
      </div>
    </section>
  );
}
