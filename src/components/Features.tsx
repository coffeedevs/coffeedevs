import React from 'react';
import { siteCopy, type SiteLocale } from '@utils/siteCopy';

export interface FeaturesProps {
  locale: SiteLocale;
}

export default function Features({ locale }: FeaturesProps) {
  const copy = siteCopy[locale];

  return (
    <section id="features" className="border-t border-gray-100 bg-gray-50/50 px-6 py-24">
      <div className="mx-auto max-w-6xl">
        <div className="mx-auto max-w-2xl text-center">
          <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            {copy.features.title}
          </h2>
          <p className="mt-4 text-lg leading-relaxed text-gray-500">
            {copy.features.subtitle}
          </p>
        </div>

        <div className="mt-16 grid gap-6 sm:grid-cols-2">
          {copy.features.items.map((feature, idx) => (
            <div
              key={idx}
              className="group rounded-2xl border border-gray-200 bg-white p-8 transition-all hover:border-gray-300 hover:shadow-md"
            >
              <div className="mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100">
                <img src={feature.icon} alt="" className="h-6 w-6 object-contain" />
              </div>
              <h3 className="text-lg font-semibold text-gray-900">
                {feature.title}
              </h3>
              <p className="mt-3 text-sm leading-relaxed text-gray-500">
                {feature.text}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
