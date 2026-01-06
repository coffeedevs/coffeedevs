import React, { useEffect, useState } from 'react';

export interface BlogProps {
  locale: 'es' | 'en';
}

export interface BlogPost {
  title: string;
  link: string;
  pubDate: string;
}

export default function Blog({ locale }: BlogProps) {
  const [posts, setPosts] = useState<BlogPost[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchBlog = async () => {
      try {
        // Fetch RSS feed from blog.coffeedevs.com
        const response = await fetch('https://blog.coffeedevs.com/rss', {
          headers: { 'Accept': 'application/rss+xml, application/xml, text/xml' }
        });
        const text = await response.text();
        
        // Parse RSS
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(text, 'text/xml');
        const items = xmlDoc.querySelectorAll('item');
        
        const blogPosts: BlogPost[] = [];
        items.forEach((item, idx) => {
          if (idx < 3) {
            const title = item.querySelector('title')?.textContent || '';
            const link = item.querySelector('link')?.textContent || '';
            const pubDate = item.querySelector('pubDate')?.textContent || '';
            blogPosts.push({ title, link, pubDate });
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

  const title = locale === 'es' ? 'Blog Reciente' : 'Recent Blog';

  if (loading) {
    return (
      <section className="py-20">
        <div className="max-w-7xl mx-auto px-4">
          <h2 className="text-4xl font-bold text-center mb-12">{title}</h2>
          <p className="text-center text-gray-600">
            {locale === 'es' ? 'Cargando posts...' : 'Loading posts...'}
          </p>
        </div>
      </section>
    );
  }

  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4">
        <h2 className="text-4xl font-bold text-center mb-12">{title}</h2>
        
        {posts.length > 0 ? (
          <div className="grid md:grid-cols-3 gap-8">
            {posts.map((post, idx) => (
              <a 
                key={idx}
                href={post.link} 
                target="_blank" 
                rel="noopener noreferrer"
                className="bg-white p-6 rounded-lg shadow hover:shadow-lg transition hover:text-blue-600"
              >
                <h3 className="font-bold mb-2 line-clamp-2">{post.title}</h3>
                <p className="text-sm text-gray-500">
                  {new Date(post.pubDate).toLocaleDateString(locale === 'es' ? 'es-ES' : 'en-US')}
                </p>
              </a>
            ))}
          </div>
        ) : (
          <p className="text-center text-gray-600">
            {locale === 'es' ? 'Sin posts disponibles.' : 'No posts available.'}
          </p>
        )}
      </div>
    </section>
  );
}
