import React, { useState } from 'react';

export interface ContactProps {
  locale: 'es' | 'en';
}

export default function Contact() {
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
        setError('Error sending');
      }
    } catch (err) {
      setError('Error sending');
    } finally {
      setLoading(false);
    }
  };

  return (
    <section id="contact">
      <h1 className="section-title">Get in Touch</h1>
      <p style={{ textAlign: 'center', color: 'var(--muted-foreground)', marginBottom: '2rem' }}>
        Have questions about our apps or interested in partnering with us? We'd love to hear from you!
      </p>

      <div className="contacto-simple">
        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label>Subject</label>
            <input
              type="text"
              name="subject"
              className="form-control"
              placeholder="How can we help?"
              required
            />
          </div>

          <div className="form-group">
            <label>Name</label>
            <input
              type="text"
              name="name"
              className="form-control"
              placeholder="Your name"
              required
            />
          </div>

          <div className="form-group">
            <label>Email</label>
            <input
              type="email"
              name="email"
              className="form-control"
              placeholder="your@email.com"
              required
            />
          </div>

          <div className="form-group">
            <label>Message</label>
            <textarea
              name="message"
              className="form-control"
              placeholder="Your message"
              rows={5}
              required
            ></textarea>
          </div>

          {submitted && (
            <div className="alert alert-success">
              ✓ Thank you! Your message was sent.
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
              {loading ? '...' : 'Send Message'}
            </button>
          </div>
        </form>
      </div>
    </section>
  );
}
