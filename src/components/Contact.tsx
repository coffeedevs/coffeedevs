import React from "react";
import { siteCopy, type SiteLocale } from "@utils/siteCopy";

export interface ContactProps {
  locale: SiteLocale;
}

export default function Contact({ locale }: ContactProps) {
  const copy = siteCopy[locale];

  return (
    <section id="contact">
      <h1 className="section-title">{copy.contact.title}</h1>
      <p style={{ textAlign: "center", color: "var(--muted-foreground)", marginBottom: "2rem" }}>
        {copy.contact.subtitle}
      </p>

      <div className="contacto-simple">
        <form action="https://formspree.io/f/xyzpqwer" method="POST">
          <div className="form-group">
            <label className="sr-only">{copy.contact.form.subject}</label>
            <input
              type="text"
              name="subject"
              className="form-control"
              placeholder={copy.contact.form.subject}
              required
            />
          </div>

          <div className="form-group">
            <label className="sr-only">{copy.contact.form.name}</label>
            <input
              type="text"
              name="name"
              className="form-control"
              placeholder={copy.contact.form.name}
              required
            />
          </div>

          <div className="form-group">
            <label className="sr-only">{copy.contact.form.email}</label>
            <input
              type="email"
              name="email"
              className="form-control"
              placeholder={copy.contact.form.email}
              required
            />
          </div>

          <div className="form-group">
            <label className="sr-only">{copy.contact.form.messageTitle}</label>
            <textarea
              name="message"
              className="form-control"
              placeholder={copy.contact.form.message}
              rows={5}
              required
            ></textarea>
          </div>

          <div style={{ textAlign: "center" }}>
            <button type="submit" className="btn btn-primary btn-lg">
              {copy.contact.form.cta}
            </button>
          </div>
        </form>
      </div>
    </section>
  );
}
