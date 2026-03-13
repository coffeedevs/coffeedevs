export type SiteLocale = "es" | "en";

export interface BlogSectionCopy {
  title: string;
  subtitle: string;
  cta: string;
  empty: string;
}

export interface ContactSectionCopy {
  title: string;
  subtitle: string;
  form: {
    subject: string;
    name: string;
    email: string;
    message: string;
    messageTitle: string;
    cta: string;
  };
}

export interface SiteCopy {
  metaDescription: string;
  hero: {
    title: string;
    subtitle: string;
    cta: string;
    ctaSecondary: string;
  };
  nav: {
    home: string;
    features: string;
    contact: string;
    blog: string;
    localeSwitch: string;
    localeSwitchHref: string;
  };
  features: {
    title: string;
    subtitle: string;
    cta: string;
    items: Array<{
      title: string;
      text: string;
      icon: string;
    }>;
  };
  process: {
    title: string;
    subtitle: string;
    steps: Array<{
      number: string;
      title: string;
      text: string;
    }>;
  };
  blog: BlogSectionCopy;
  contact: ContactSectionCopy;
  footer: string;
}

export const siteCopy: Record<SiteLocale, SiteCopy> = {
  es: {
    metaDescription:
      "CoffeeDevs es una agencia de desarrollo de software personalizado enfocado en proveer soluciones de negocios a trav\u00E9s de implementaciones tecnol\u00F3gicas.",
    hero: {
      title: "Software que impulsa tu negocio",
      subtitle:
        "Dise\u00F1amos y construimos soluciones digitales a medida. Desde aplicaciones web hasta plataformas m\u00F3viles, transformamos ideas en productos que funcionan.",
      cta: "Hablemos de tu proyecto",
      ctaSecondary: "Lo que hacemos",
    },
    nav: {
      home: "Inicio",
      features: "Servicios",
      contact: "Contacto",
      blog: "Blog",
      localeSwitch: "EN",
      localeSwitchHref: "/en/",
    },
    features: {
      title: "Lo que hacemos",
      subtitle:
        "Acompa\u00F1amos a empresas en cada etapa del desarrollo de software, desde la conceptualizaci\u00F3n hasta la puesta en producci\u00F3n.",
      cta: "Envi\u00E1 tu consulta",
      items: [
        {
          icon: "/images/custom.png",
          title: "Software a medida",
          text: "Desarrollamos soluciones personalizadas que se adaptan a los procesos \u00FAnicos de tu negocio. Desde startups hasta empresas consolidadas.",
        },
        {
          icon: "/images/design.png",
          title: "Aplicaciones web",
          text: "Experiencia en e-commerce, sistemas de gesti\u00F3n, CRM, ERP y plataformas de todo tipo. Construimos aplicaciones web robustas y escalables.",
        },
        {
          icon: "/images/mobile.png",
          title: "Apps m\u00F3viles",
          text: "Aplicaciones nativas e h\u00EDbridas para iOS y Android. Dise\u00F1adas para resolver problemas reales y ofrecer una experiencia de usuario excepcional.",
        },
        {
          icon: "/images/innovation.png",
          title: "Consultor\u00EDa e IA",
          text: "Asesoramos en procesos de desarrollo, integraci\u00F3n de inteligencia artificial y adopci\u00F3n de nuevas tecnolog\u00EDas. Te ayudamos a potenciar tu equipo y tus productos con IA.",
        },
      ],
    },
    process: {
      title: "C\u00F3mo trabajamos",
      subtitle: "Un proceso claro y transparente, de principio a fin.",
      steps: [
        {
          number: "01",
          title: "Descubrimiento",
          text: "Entendemos tu negocio, tus usuarios y tus objetivos para definir el alcance del proyecto.",
        },
        {
          number: "02",
          title: "Dise\u00F1o y planificaci\u00F3n",
          text: "Definimos la arquitectura, las tecnolog\u00EDas y el roadmap de desarrollo.",
        },
        {
          number: "03",
          title: "Desarrollo iterativo",
          text: "Construimos en sprints cortos con entregas frecuentes para que veas el progreso en tiempo real.",
        },
        {
          number: "04",
          title: "Lanzamiento y soporte",
          text: "Desplegamos, monitoreamos y acompa\u00F1amos la evoluci\u00F3n continua del producto.",
        },
      ],
    },
    blog: {
      title: "Del blog",
      subtitle: "Ideas, aprendizajes y novedades del equipo.",
      cta: "Ver todos los posts",
      empty: "No hay publicaciones disponibles.",
    },
    contact: {
      title: "Empecemos a trabajar juntos",
      subtitle:
        "Contanos sobre tu proyecto o idea. Te respondemos en menos de 24 horas.",
      form: {
        subject: "Asunto",
        name: "Tu nombre",
        email: "Tu email",
        message:
          "Contanos un poco sobre tu proyecto o idea y qu\u00E9 cre\u00E9s que necesit\u00E1s",
        messageTitle: "Tu consulta",
        cta: "Enviar mensaje",
      },
    },
    footer: "Desarrollo profesional de software",
  },
  en: {
    metaDescription:
      "CoffeeDevs is a custom software development agency focused on providing business solutions through technology.",
    hero: {
      title: "Software that drives your business",
      subtitle:
        "We design and build custom digital solutions. From web applications to mobile platforms, we turn ideas into products that work.",
      cta: "Let's talk about your project",
      ctaSecondary: "What we do",
    },
    nav: {
      home: "Home",
      features: "Services",
      contact: "Contact",
      blog: "Blog",
      localeSwitch: "ES",
      localeSwitchHref: "/",
    },
    features: {
      title: "What we do",
      subtitle:
        "We partner with companies at every stage of software development, from concept to production.",
      cta: "Send us a message",
      items: [
        {
          icon: "/images/custom.png",
          title: "Custom Software",
          text: "We build tailored solutions that adapt to your unique business processes. From startups to established enterprises.",
        },
        {
          icon: "/images/design.png",
          title: "Web Applications",
          text: "Experience in e-commerce, management systems, CRM, ERP, and platforms of all kinds. We build robust, scalable web applications.",
        },
        {
          icon: "/images/mobile.png",
          title: "Mobile Apps",
          text: "Native and hybrid applications for iOS and Android. Designed to solve real problems and deliver an exceptional user experience.",
        },
        {
          icon: "/images/innovation.png",
          title: "Consulting & AI",
          text: "We advise on development processes, AI integration, and technology adoption. We help you empower your team and products with artificial intelligence.",
        },
      ],
    },
    process: {
      title: "How we work",
      subtitle: "A clear and transparent process, from start to finish.",
      steps: [
        {
          number: "01",
          title: "Discovery",
          text: "We understand your business, your users, and your goals to define the project scope.",
        },
        {
          number: "02",
          title: "Design & Planning",
          text: "We define the architecture, technologies, and development roadmap.",
        },
        {
          number: "03",
          title: "Iterative Development",
          text: "We build in short sprints with frequent deliveries so you can see progress in real time.",
        },
        {
          number: "04",
          title: "Launch & Support",
          text: "We deploy, monitor, and support the continuous evolution of your product.",
        },
      ],
    },
    blog: {
      title: "From the blog",
      subtitle: "Ideas, lessons, and news from the team.",
      cta: "View all posts",
      empty: "No posts available.",
    },
    contact: {
      title: "Let's start working together",
      subtitle:
        "Tell us about your project or idea. We'll get back to you within 24 hours.",
      form: {
        subject: "Subject",
        name: "Your name",
        email: "Your email",
        message:
          "Tell us about your project or idea and what you think you need",
        messageTitle: "Your message",
        cta: "Send message",
      },
    },
    footer: "Professional software development",
  },
};
