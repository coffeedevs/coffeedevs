import React, { useState } from 'react';

export interface ContactProps {
  locale: 'es' | 'en';
}

export default function Contact({ locale }: ContactProps) {
  const [submitted, setSubmitted] = useState(false);
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);

  const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    const formData = new FormData(e.currentTarget);
    
    try {
      const response = await fetch('https://formspree.io/f/xyzpqwer', {
        method: 'POST',
        body: formData,
        headers: { 'Accept': 'application/json' }
      });

      if (response.ok) {
        setSubmitted(true);
        (e.target as HTMLFormElement).reset();
        setTimeout(() => setSubmitted(false), 5000);
      } else {
        setError(locale === 'es' ? 'Error al enviar' : 'Error sending');
      }
    } catch (err) {
      setError(locale === 'es' ? 'Error al enviar' : 'Error sending');
    } finally {
      setLoading(false);
    }
  };

  const labels = {
    es: {
      title: 'Contacto',
      subtitle: 'Cuéntanos sobre tu proyecto',
      subject: 'Asunto',
      name: 'Nombre',
      email: 'Email',
      message: 'Mensaje',
      submit: 'Enviar',
      success: '¡Gracias! Tu mensaje fue enviado.',
    },
    en: {
      title: 'Contact',
      subtitle: 'Tell us about your project',
      subject: 'Subject',
      name: 'Name',
      email: 'Email',
      message: 'Message',
      submit: 'Send',
      success: 'Thank you! Your message was sent.',
    }
  };

  const text = labels[locale];

  return (
    <section id="contact">
      <h1 className="section-title">{text.title}</h1>
      <p style={{ textAlign: 'center', color: 'var(--muted-foreground)', marginBottom: '2rem' }}>
        {text.subtitle}
      </p>

      <div className="contacto-simple">
        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label>{text.subject}</label>
            <input
              type="text"
              name="subject"
              className="form-control"
              placeholder={text.subject}
              required
            />
          </div>

          <div className="form-group">
            <label>{text.name}</label>
            <input
              type="text"
              name="name"
              className="form-control"
              placeholder={text.name}
              required
            />
          </div>

          <div className="form-group">
            <label>{text.email}</label>
            <input
              type="email"
              name="email"
              className="form-control"
              placeholder={text.email}
              required
            />
          </div>

          <div className="form-group">
            <label>{text.message}</label>
            <textarea
              name="message"
              className="form-control"
              placeholder={text.message}
              rows={5}
              required
            ></textarea>
          </div>

          {submitted && (
            <div className="alert alert-success">
              ✓ {text.success}
            </div>
          )}

          {error && (
            <div className="alert alert-danger">
              ✕ {error}
            </div>
          )}

          <div style={{ textAlign: 'center' }}>
            <button
              type="submit"
              disabled={loading}
              className="btn btn-primary btn-lg"
            >
              {loading ? '...' : text.submit}
            </button>
          </div>
        </form>
      </div>
    </section>
  );
}
