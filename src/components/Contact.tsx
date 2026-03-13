import React from "react";
import { siteCopy, type SiteLocale } from "@utils/siteCopy";

export interface ContactProps {
  locale: SiteLocale;
}

export default function Contact({ locale }: ContactProps) {
  const copy = siteCopy[locale];

  return (
    <section id="contact" className="px-6 py-24">
      <div className="mx-auto max-w-6xl">
        <div className="mx-auto max-w-xl">
          <div className="text-center">
            <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
              {copy.contact.title}
            </h2>
            <p className="mt-4 text-lg leading-relaxed text-gray-500">
              {copy.contact.subtitle}
            </p>
          </div>

          <form
            action="https://formspree.io/f/xyzpqwer"
            method="POST"
            className="mt-12 space-y-5"
          >
            <div className="grid gap-5 sm:grid-cols-2">
              <div>
                <label htmlFor="name" className="sr-only">{copy.contact.form.name}</label>
                <input
                  id="name"
                  type="text"
                  name="name"
                  placeholder={copy.contact.form.name}
                  required
                  className="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-colors focus:border-gray-900"
                />
              </div>
              <div>
                <label htmlFor="email" className="sr-only">{copy.contact.form.email}</label>
                <input
                  id="email"
                  type="email"
                  name="email"
                  placeholder={copy.contact.form.email}
                  required
                  className="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-colors focus:border-gray-900"
                />
              </div>
            </div>

            <div>
              <label htmlFor="subject" className="sr-only">{copy.contact.form.subject}</label>
              <input
                id="subject"
                type="text"
                name="subject"
                placeholder={copy.contact.form.subject}
                required
                className="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-colors focus:border-gray-900"
              />
            </div>

            <div>
              <label htmlFor="message" className="sr-only">{copy.contact.form.messageTitle}</label>
              <textarea
                id="message"
                name="message"
                placeholder={copy.contact.form.message}
                rows={5}
                required
                className="w-full resize-none rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition-colors focus:border-gray-900"
              />
            </div>

            <button
              type="submit"
              className="w-full rounded-full bg-gray-900 px-8 py-3.5 text-base font-semibold text-white transition-all hover:bg-black hover:shadow-md"
            >
              {copy.contact.form.cta}
            </button>
          </form>
        </div>
      </div>
    </section>
  );
}
