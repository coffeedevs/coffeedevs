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
            
            // Try to extract image from content
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

  const title = locale === 'es' ? 'Blog' : 'Blog';

  return (
    <section id="blog" className="section section-center section-features" style={{ padding: '80px 0', backgroundColor: '#f9f9f9' }}>
      <div className="container">
        <h1 className="section-title" style={{ marginBottom: '60px' }}>
          <span>{title}</span>
        </h1>
        
        {loading ? (
          <p style={{ color: '#666', marginBottom: '40px' }}>
            {locale === 'es' ? 'Cargando posts...' : 'Loading posts...'}
          </p>
        ) : posts.length > 0 ? (
          <div className="row wow bounceInUp">
            {posts.map((post, idx) => (
              <a 
                key={idx}
                href={post.link}
                target="_blank"
                rel="noopener noreferrer"
                style={{ textDecoration: 'none', color: 'inherit' }}
              >
                <div className="col-md-4" style={{ marginBottom: '30px' }}>
                  <div className="premium-card" style={{
                    backgroundColor: '#fff',
                    borderRadius: '4px',
                    overflow: 'hidden',
                    boxShadow: '0 2px 8px rgba(0, 0, 0, 0.1)',
                    transition: 'transform 0.3s, box-shadow 0.3s',
                    cursor: 'pointer'
                  }}
                  onMouseEnter={(e) => {
                    e.currentTarget.style.transform = 'translateY(-5px)';
                    e.currentTarget.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
                  }}
                  onMouseLeave={(e) => {
                    e.currentTarget.style.transform = 'translateY(0)';
                    e.currentTarget.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.1)';
                  }}>
                    <div style={{
                      height: '180px',
                      width: '100%',
                      backgroundImage: `url(${post.image})`,
                      backgroundSize: 'cover',
                      backgroundPosition: 'center'
                    }}></div>
                    <div className="premium-info" style={{ padding: '20px' }}>
                      <header>
                        <h3 style={{ fontSize: '16px', fontWeight: '600', marginBottom: '10px', color: '#333' }}>
                          {post.title}
                        </h3>
                        <time style={{ fontSize: '12px', color: '#999' }}>
                          {new Date(post.pubDate).toLocaleDateString(locale === 'es' ? 'es-ES' : 'en-US')}
                        </time>
                      </header>
                    </div>
                  </div>
                </div>
              </a>
            ))}
          </div>
        ) : (
          <p style={{ color: '#666' }}>
            {locale === 'es' ? 'Sin posts disponibles.' : 'No posts available.'}
          </p>
        )}

        <div style={{ marginTop: '40px' }}>
          <a href="https://blog.coffeedevs.com" target="_blank" rel="noopener noreferrer" className="btn btn-primary">
            {locale === 'es' ? 'Ver más posts' : 'View more posts'}
          </a>
        </div>
      </div>
    </section>
  );
}
