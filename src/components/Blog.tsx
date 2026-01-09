import React, { useEffect, useState } from 'react';

export interface BlogProps {
  locale: 'es' | 'en';
}

export interface BlogPost {
  title: string;
  link: string;
  pubDate: string;
  image?: string;
}

export default function Blog() {
  const [posts, setPosts] = useState<BlogPost[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchBlog = async () => {
      try {
        const response = await fetch('https://blog.coffeedevs.com/rss', {
          headers: { 'Accept': 'application/rss+xml, application/xml, text/xml' }
        });
        const text = await response.text();

        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(text, 'text/xml');
        const items = xmlDoc.querySelectorAll('item');

        const blogPosts: BlogPost[] = [];
        items.forEach((item, idx) => {
          if (idx < 3) {
            const title = item.querySelector('title')?.textContent || '';
            const link = item.querySelector('link')?.textContent || '';
            const pubDate = item.querySelector('pubDate')?.textContent || '';
            const content = item.querySelector('description')?.textContent || '';
            const imgMatch = content.match(/<img[^>]+src="([^">]+)"/);
            const image = imgMatch ? imgMatch[1] : '/images/bg-pattern.png';

            blogPosts.push({ title, link, pubDate, image });
          }
        });

        setPosts(blogPosts);
      } catch (error) {
        console.error('Error fetching blog:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchBlog();
  }, []);

  return (
    <section id="blog">
      <h1 className="section-title">Blog</h1>

      {loading ? (
        <p style={{ textAlign: 'center', color: 'var(--muted-foreground)' }}>
          Loading posts...
        </p>
      ) : posts.length > 0 ? (
        <div className="row">
          {posts.map((post, idx) => (
            <a
              key={idx}
              href={post.link}
              target="_blank"
              rel="noopener noreferrer"
              style={{ textDecoration: 'none', color: 'inherit' }}
            >
              <div className="premium-card">
                <div style={{
                  backgroundImage: `url(${post.image})`,
                  backgroundSize: 'cover',
                  backgroundPosition: 'center',
                }}></div>
                <div className="premium-info">
                  <h3>{post.title}</h3>
                  <time>
                    {new Date(post.pubDate).toLocaleDateString('en-US')}
                  </time>
                </div>
              </div>
            </a>
          ))}
        </div>
      ) : (
        <p style={{ textAlign: 'center', color: 'var(--muted-foreground)' }}>
          No posts available.
        </p>
      )}

      <div style={{ textAlign: 'center', marginTop: '2rem' }}>
        <a href="https://blog.coffeedevs.com" target="_blank" rel="noopener noreferrer" className="btn btn-primary">
          View more posts
        </a>
      </div>
    </section>
  );
}
