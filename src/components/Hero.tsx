import React from 'react';
import { siteCopy, type SiteLocale } from '@utils/siteCopy';

export interface HeroProps {
  locale: SiteLocale;
}

export default function Hero({ locale }: HeroProps) {
  const copy = siteCopy[locale];

  return (
    <section className="flex min-h-screen items-center justify-center px-6">
      <div className="mx-auto max-w-3xl text-center">
        <div className="mb-6 inline-flex items-center gap-2 rounded-full border border-gray-200 bg-gray-50 px-4 py-1.5">
          <span className="h-2 w-2 rounded-full bg-emerald-500" />
          <span className="text-sm font-medium text-gray-600">
            {locale === 'es' ? 'Disponibles para nuevos proyectos' : 'Available for new projects'}
          </span>
        </div>

        <h1 className="text-5xl font-extrabold leading-[1.1] tracking-tight text-gray-900 sm:text-6xl lg:text-7xl">
          {copy.hero.title}
        </h1>

        <p className="mx-auto mt-6 max-w-xl text-lg leading-relaxed text-gray-500">
          {copy.hero.subtitle}
        </p>

        <div className="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
          <a
            href="#contact"
            className="inline-flex items-center rounded-full bg-gray-900 px-8 py-3.5 text-base font-semibold text-white shadow-sm transition-all hover:bg-black hover:shadow-md"
          >
            {copy.hero.cta}
            <svg className="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
          </a>
          <a
            href="#features"
            className="inline-flex items-center rounded-full border border-gray-200 bg-white px-8 py-3.5 text-base font-semibold text-gray-700 transition-all hover:border-gray-300 hover:bg-gray-50"
          >
            {copy.hero.ctaSecondary}
          </a>
        </div>
      </div>
    </section>
  );
}
