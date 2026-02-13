export type SiteLocale = "es" | "en";

export interface BlogSectionCopy {
  title: string;
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
    subtitle: string;
    cta: string;
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
    cta: string;
    items: Array<{
      title: string;
      text: string;
      icon: string;
    }>;
  };
  blog: BlogSectionCopy;
  contact: ContactSectionCopy;
  footer: string;
}

export const siteCopy: Record<SiteLocale, SiteCopy> = {
  es: {
    metaDescription:
      "CoffeeDevs es una agencia de desarrollo de software personalizado enfocado en proveer soluciones de negocios a través de implementaciones tecnológicas. Nuestra experiencia abarca comercio electrónico, sistemas de gestión, plataformas y aplicaciones móviles.",
    hero: {
      subtitle: "Desarrollo profesional de software",
      cta: "Trabajemos juntos",
    },
    nav: {
      home: "Inicio",
      features: "Lo que hacemos",
      contact: "Contacto",
      blog: "Visita el Blog!",
      localeSwitch: "English",
      localeSwitchHref: "/en/",
    },
    features: {
      title: "Lo que hacemos",
      cta: "Envíanos hoy un email",
      items: [
        {
          icon: "/images/custom.png",
          title: "Desarrollo de software personalizado",
          text: "Así seas una start-up o una empresa ya establecida, estamos dispuestos a asistirte en cada etapa del ciclo de vida del desarrollo de software, en su conceptualización y en la consultoría necesaria para su desarrollo y soporte.",
        },
        {
          icon: "/images/design.png",
          title: "Desarrollo de aplicaciones web",
          text: "Nuestros ingenieros en software tienen una amplia experiencia en construcción de aplicaciones web. También son expertos en múltiples verticales y dominios de negocio, incluyendo e-commerce, e-learning, sistemas de gestión, de stock, CRM, ERP y demás.",
        },
        {
          icon: "/images/mobile.png",
          title: "Desarrollo de aplicaciones móviles",
          text: "Producimos aplicaciones móviles altamente usables y potentes que resuelven problemas de negocio, atraen y fidelizan usuarios, y refuerzan la marca. Construimos aplicaciones nativas e híbridas tanto para Android como para iOS.",
        },
      ],
    },
    blog: {
      title: "Lo último del Blog",
      cta: "Visita el Blog!",
      empty: "No hay publicaciones disponibles.",
    },
    contact: {
      title: "Haznos tu consulta!",
      subtitle: "Envianos tu consulta y te contestaremos en seguida!",
      form: {
        subject: "Asunto",
        name: "Nombre",
        email: "Email",
        message: "Cuentanos un poco de tu proyecto o idea y qué crees que necesitas",
        messageTitle: "Tu consulta",
        cta: "Enviar!",
      },
    },
    footer: "Desarrollo profesional de software",
  },
  en: {
    metaDescription:
      "CoffeeDevs is a custom software development agency focused on providing business solutions through technology. Our experience ranges from e-commerce through CRM's to mobile applications.",
    hero: {
      subtitle: "Professional software development",
      cta: "Let's work together",
    },
    nav: {
      home: "Home",
      features: "What we do",
      contact: "Contact",
      blog: "Visit the Blog!",
      localeSwitch: "Español",
      localeSwitchHref: "/",
    },
    features: {
      title: "What we do",
      cta: "Email us today",
      items: [
        {
          icon: "/images/custom.png",
          title: "Custom Software Development",
          text: "Whether you are a start-up or an established business, we are ready to assist you at every stage of the software development life cycle — from conceptualization and consulting to development and support.",
        },
        {
          icon: "/images/design.png",
          title: "Web Application Development",
          text: "Our software engineers have a wealth of experience in building web applications. We are also experts in many verticals and business domains, including e-Commerce, e-Learning, AdTech, Finance, Entertainment, and more.",
        },
        {
          icon: "/images/mobile.png",
          title: "Mobile Application Development",
          text: "Develop powerful, highly usable mobile apps that solve business problems, attract users, and reinforce your brand. We build native, hybrid, and cross-platform apps that run on all major operating systems such as iOS and Android.",
        },
      ],
    },
    blog: {
      title: "Latest posts from our blog",
      cta: "Visit the Blog!",
      empty: "No posts available.",
    },
    contact: {
      title: "Send us your questions!",
      subtitle: "We'll answer right away!",
      form: {
        subject: "Subject",
        name: "Your name",
        email: "Your email",
        message: "Tell us something about your idea or project and what can we help you with.",
        messageTitle: "Your message",
        cta: "Talk to us",
      },
    },
    footer: "Professional software development",
  },
};
