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
    <section id="blog">
      <h1 className="section-title">{copy.blog.title}</h1>

      {posts.length > 0 ? (
        <ul className="blog-title-list">
          {posts.map((post, idx) => (
            <li key={idx}>
              <a href={post.link}>{post.title}</a>
            </li>
          ))}
        </ul>
      ) : (
        <p style={{ textAlign: "center", color: "var(--muted-foreground)" }}>
          {copy.blog.empty}
        </p>
      )}

      <div style={{ textAlign: "center", marginTop: "2rem" }}>
        <a href="https://blog.coffeedevs.com" className="btn btn-primary">
          {copy.blog.cta}
        </a>
      </div>
    </section>
  );
}
