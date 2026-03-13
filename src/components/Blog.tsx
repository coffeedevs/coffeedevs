import React from "react";
import { siteCopy, type SiteLocale } from "@utils/siteCopy";
import type { BlogPost } from "@utils/rss";

export interface BlogProps {
  locale: SiteLocale;
  posts: BlogPost[];
}

export default function Blog({ locale, posts }: BlogProps) {
  const copy = siteCopy[locale];

  return (
    <section id="blog" className="border-t border-gray-100 bg-gray-50/50 px-6 py-24">
      <div className="mx-auto max-w-6xl">
        <div className="mx-auto max-w-2xl text-center">
          <h2 className="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            {copy.blog.title}
          </h2>
          <p className="mt-4 text-lg leading-relaxed text-gray-500">
            {copy.blog.subtitle}
          </p>
        </div>

        {posts.length > 0 ? (
          <div className="mx-auto mt-12 max-w-2xl">
            <div className="divide-y divide-gray-100 rounded-2xl border border-gray-200 bg-white">
              {posts.map((post, idx) => (
                <a
                  key={idx}
                  href={post.link}
                  className="group flex items-center justify-between px-6 py-5 transition-colors hover:bg-gray-50"
                >
                  <span className="text-sm font-medium text-gray-900 group-hover:text-black">
                    {post.title}
                  </span>
                  <svg
                    className="ml-4 h-4 w-4 flex-shrink-0 text-gray-300 transition-colors group-hover:text-gray-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    strokeWidth={1.5}
                  >
                    <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                  </svg>
                </a>
              ))}
            </div>
          </div>
        ) : (
          <p className="mt-12 text-center text-gray-400">{copy.blog.empty}</p>
        )}

        <div className="mt-8 text-center">
          <a
            href="https://blog.coffeedevs.com"
            className="inline-flex items-center text-sm font-medium text-gray-500 transition-colors hover:text-gray-900"
          >
            {copy.blog.cta}
            <svg className="ml-1.5 h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
              <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
          </a>
        </div>
      </div>
    </section>
  );
}
