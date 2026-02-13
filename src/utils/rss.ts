export interface BlogPost {
  title: string;
  link: string;
  pubDate: string;
  image?: string;
}

const RSS_URLS = [
  "https://blog.coffeedevs.com/rss.xml",
  "https://blog.coffeedevs.com/rss",
];
const BLOG_HOME_URL = "https://blog.coffeedevs.com/";
const FALLBACK_IMAGE = "/images/bg-pattern.png";

function decodeHtmlEntities(value: string): string {
  return value
    .replace(/<!\[CDATA\[([\s\S]*?)\]\]>/g, "$1")
    .replace(/&amp;/g, "&")
    .replace(/&lt;/g, "<")
    .replace(/&gt;/g, ">")
    .replace(/&quot;/g, '"')
    .replace(/&#39;|&apos;/g, "'");
}

function extractTagValue(itemXml: string, tagName: string): string {
  const regex = new RegExp(`<${tagName}>([\\s\\S]*?)<\\/${tagName}>`, "i");
  const match = itemXml.match(regex);
  return match ? decodeHtmlEntities(match[1].trim()) : "";
}

function extractImageFromDescription(description: string): string | undefined {
  const imageMatch = description.match(/<img[^>]+src="([^">]+)"/i);
  if (imageMatch?.[1]) {
    return decodeHtmlEntities(imageMatch[1]);
  }
  return undefined;
}

function absoluteUrl(url: string): string {
  if (!url) return "";
  if (url.startsWith("http://") || url.startsWith("https://")) {
    return url;
  }
  if (url.startsWith("/")) {
    return `https://blog.coffeedevs.com${url}`;
  }
  return `https://blog.coffeedevs.com/${url}`;
}

function cleanText(value: string): string {
  return decodeHtmlEntities(value.replace(/<[^>]+>/g, " ").replace(/\s+/g, " ").trim());
}

async function fetchFromRss(limit: number): Promise<BlogPost[]> {
  for (const rssUrl of RSS_URLS) {
    try {
      const response = await fetch(rssUrl, {
        headers: { Accept: "application/rss+xml, application/xml, text/xml" },
      });
      if (!response.ok) {
        continue;
      }

      const xml = await response.text();
      const itemMatches = [...xml.matchAll(/<item>([\s\S]*?)<\/item>/gi)];
      if (itemMatches.length === 0) {
        continue;
      }

      return itemMatches.slice(0, limit).map((itemMatch) => {
        const itemXml = itemMatch[0];
        const title = extractTagValue(itemXml, "title");
        const link = absoluteUrl(extractTagValue(itemXml, "link"));
        const pubDate = extractTagValue(itemXml, "pubDate");
        const description = extractTagValue(itemXml, "description");
        const imageFromDescription = extractImageFromDescription(description);
        const image = imageFromDescription ? absoluteUrl(imageFromDescription) : FALLBACK_IMAGE;

        return {
          title,
          link,
          pubDate,
          image,
        };
      });
    } catch {
      // Try next URL.
    }
  }

  return [];
}

async function fetchFromBlogHome(limit: number): Promise<BlogPost[]> {
  try {
    const response = await fetch(BLOG_HOME_URL, {
      headers: { Accept: "text/html,application/xhtml+xml" },
    });

    if (!response.ok) {
      return [];
    }

    const html = await response.text();
    const articleMatches = [...html.matchAll(/<article[^>]*m-article-card[\s\S]*?<\/article>/gi)];
    const posts: BlogPost[] = [];
    const seenLinks = new Set<string>();

    for (const articleMatch of articleMatches) {
      if (posts.length >= limit) {
        break;
      }

      const article = articleMatch[0];
      const titleMatch = article.match(/<h2[^>]*m-article-card__title[^>]*>([\s\S]*?)<\/h2>/i);
      const linkMatch = article.match(/<a[^>]*m-article-card__info-link[^>]*href="([^"]+)"/i);
      const imageMatch = article.match(/<img[^>]*m-article-card__picture-background[^>]*src="([^"]+)"/i);

      if (!titleMatch?.[1] || !linkMatch?.[1]) {
        continue;
      }

      const link = absoluteUrl(linkMatch[1]);
      if (seenLinks.has(link)) {
        continue;
      }

      seenLinks.add(link);
      posts.push({
        title: cleanText(titleMatch[1]),
        link,
        pubDate: "",
        image: imageMatch?.[1] ? absoluteUrl(decodeHtmlEntities(imageMatch[1])) : FALLBACK_IMAGE,
      });
    }

    return posts;
  } catch {
    return [];
  }
}

export async function getLatestBlogPosts(limit: number = 3): Promise<BlogPost[]> {
  const rssPosts = await fetchFromRss(limit);
  if (rssPosts.length > 0) {
    return rssPosts;
  }

  return fetchFromBlogHome(limit);
}
