import React from 'react';
import { siteCopy, type SiteLocale } from '@utils/siteCopy';

export interface ProcessProps {
  locale: SiteLocale;
}

export default function Process({ locale }: ProcessProps) {
  const copy = siteCopy[locale];

  return (
    <section className="px-6 py-24">
      <div className="mx-auto max-w-6xl">
        <div className="mx-auto max-w-2xl text-center">
          <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            {copy.process.title}
          </h2>
          <p className="mt-4 text-lg leading-relaxed text-gray-500">
            {copy.process.subtitle}
          </p>
        </div>

        <div className="mt-16 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          {copy.process.steps.map((step, idx) => (
            <div key={idx} className="relative">
              <span className="text-5xl font-extrabold text-gray-100">
                {step.number}
              </span>
              <h3 className="mt-4 text-base font-semibold text-gray-900">
                {step.title}
              </h3>
              <p className="mt-2 text-sm leading-relaxed text-gray-500">
                {step.text}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
