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
      // Using Formspree for contact form - UPDATE THIS WITH YOUR FORM ID
      const response = await fetch('https://formspree.io/f/xyzpqwer', {
        method: 'POST',
        body: formData,
        headers: {
          'Accept': 'application/json'
        }
      });

      if (response.ok) {
        setSubmitted(true);
        (e.target as HTMLFormElement).reset();
        setTimeout(() => setSubmitted(false), 5000);
      } else {
        setError(locale === 'es' ? 'Error al enviar el mensaje' : 'Error sending message');
      }
    } catch (err) {
      setError(locale === 'es' ? 'Error al enviar el mensaje' : 'Error sending message');
    } finally {
      setLoading(false);
    }
  };

  const labels = {
    es: {
      title: 'Consulta',
      subtitle: 'Cuéntanos sobre tu proyecto y nos pondremos en contacto contigo pronto.',
      subject: 'Asunto',
      name: 'Nombre',
      email: 'Email',
      message: 'Mensaje',
      submit: 'Enviar Consulta',
      success: '¡Gracias! Tu mensaje fue enviado correctamente.',
      error: 'Error al enviar'
    },
    en: {
      title: 'Contact Us',
      subtitle: 'Tell us about your project and we\'ll get back to you soon.',
      subject: 'Subject',
      name: 'Name',
      email: 'Email',
      message: 'Message',
      submit: 'Send',
      success: 'Thank you! Your message was sent successfully.',
      error: 'Error sending message'
    }
  };

  const text = labels[locale];

  return (
    <section id="contact" className="section section-center section-contact" style={{ padding: '80px 0' }}>
      <div className="container">
        <h1 className="section-title text-center" style={{ marginBottom: '40px' }}>
          <span>{text.title}</span>
        </h1>
        
        <div className="row" style={{ marginBottom: '40px' }}>
          <div className="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12" style={{ textAlign: 'center', color: '#666', marginBottom: '30px' }}>
            {text.subtitle}
          </div>
        </div>

        <div className="contacto-simple" id="contacto-simple">
          <div className="main-action">
            <form onSubmit={handleSubmit} style={{ maxWidth: '100%' }}>
              <div className="row">
                <div className="col-sm-6 col-sm-offset-3">
                  <div className="form-group">
                    <label className="sr-only">{text.subject}</label>
                    <input
                      type="text"
                      name="subject"
                      className="form-control"
                      placeholder={text.subject}
                      required
                    />
                  </div>

                  <div className="form-group">
                    <label className="sr-only">{text.name}</label>
                    <input
                      type="text"
                      name="name"
                      className="form-control"
                      placeholder={text.name}
                      required
                    />
                  </div>

                  <div className="form-group">
                    <label className="sr-only">{text.email}</label>
                    <input
                      type="email"
                      name="email"
                      className="form-control"
                      placeholder={text.email}
                      required
                    />
                  </div>

                  <div className="form-group">
                    <label className="sr-only">{text.message}</label>
                    <textarea
                      name="message"
                      className="form-control"
                      placeholder={text.message}
                      style={{ height: '100px' }}
                      rows={6}
                      required
                    ></textarea>
                  </div>

                  {submitted && (
                    <div className="alert alert-success" role="alert">
                      {text.success}
                    </div>
                  )}

                  {error && (
                    <div className="alert alert-danger" role="alert">
                      {error}
                    </div>
                  )}
                </div>
              </div>

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
        </div>
      </div>
    </section>
  );
}
