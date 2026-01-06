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
      // Using Formspree for contact form
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
        setTimeout(() => setSubmitted(false), 3000);
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
      title: 'Contacto',
      name: 'Nombre',
      email: 'Email',
      message: 'Mensaje',
      submit: 'Enviar',
      success: '¡Mensaje enviado!',
      error: 'Error al enviar'
    },
    en: {
      title: 'Contact',
      name: 'Name',
      email: 'Email',
      message: 'Message',
      submit: 'Send',
      success: 'Message sent!',
      error: 'Error sending message'
    }
  };

  const text = labels[locale];

  return (
    <section className="py-20">
      <div className="max-w-2xl mx-auto px-4">
        <h2 className="text-4xl font-bold text-center mb-12">{text.title}</h2>
        
        <form onSubmit={handleSubmit} className="space-y-6">
          <div>
            <label className="block text-sm font-medium mb-2">{text.name}</label>
            <input
              type="text"
              name="name"
              required
              className="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
          </div>

          <div>
            <label className="block text-sm font-medium mb-2">{text.email}</label>
            <input
              type="email"
              name="email"
              required
              className="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
          </div>

          <div>
            <label className="block text-sm font-medium mb-2">{text.message}</label>
            <textarea
              name="message"
              required
              rows={5}
              className="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            ></textarea>
          </div>

          {submitted && (
            <div className="p-4 bg-green-100 text-green-800 rounded-lg">
              ✓ {text.success}
            </div>
          )}

          {error && (
            <div className="p-4 bg-red-100 text-red-800 rounded-lg">
              ✗ {error}
            </div>
          )}

          <button
            type="submit"
            disabled={loading}
            className="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 disabled:opacity-50 transition"
          >
            {loading ? '...' : text.submit}
          </button>
        </form>
      </div>
    </section>
  );
}
