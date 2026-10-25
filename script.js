'use strict';

document.addEventListener('DOMContentLoaded', () => {
    /* ====== MENÚ MÓVIL ====== */
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    const toggleMenu = () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
        document.body.classList.toggle('menu-open');
    };

    const closeMenu = () => {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
        document.body.classList.remove('menu-open');
    };

    hamburger.addEventListener('click', toggleMenu);
    navLinks.forEach(link => link.addEventListener('click', closeMenu));

    /* ====== FOTO DE PERFIL EN EL HERO ====== */
    const heroPhoto = document.getElementById('hero-photo');
    const avatarInitials = document.querySelector('.avatar-initials');

    if (heroPhoto) {
        heroPhoto.addEventListener('error', () => {
            heroPhoto.remove();
            if (avatarInitials) avatarInitials.style.display = 'flex';
        });
    }

    /* ====== TOGGLE DE TEMA (CLARO / OSCURO) ====== */
    const themeToggle = document.getElementById('theme-toggle');

    const getInitialTheme = () => {
        const saved = localStorage.getItem('theme');
        return saved === 'dark' || saved === 'light' ? saved : 'light';
    };

    const applyTheme = (theme) => {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    };

    const initialTheme = getInitialTheme();
    applyTheme(initialTheme);

    themeToggle.addEventListener('click', () => {
        const current = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        applyTheme(current);
    });

    /* ====== NAVBAR AL HACER SCROLL ====== */
    const navbar = document.querySelector('.navbar');

    const updateNavbar = () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    };

    /* ====== NAVEGACIÓN ACTIVA (SCROLLSPY) ====== */
    const sections = document.querySelectorAll('section[id], footer');

    const updateActiveLink = () => {
        const scrollPos = window.scrollY + 120;
        let currentSection = 'inicio';

        sections.forEach(section => {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            if (scrollPos >= top && scrollPos < top + height) {
                currentSection = section.id;
            }
        });

        navLinks.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === `#${currentSection}`);
        });
    };

    /* ====== EFECTO TYPING PARA EL ROL ====== */
    const typedElement = document.getElementById('typed-role');
    const roles = [
        'Desarrollador Web',
        'Frontend Developer',
        'Apasionado por la Tecnología',
        'Creador de Experiencias Digitales'
    ];
    let roleIndex = 0;
    let charIndex = 0;
    let deleting = false;

    const typeEffect = () => {
        const currentRole = roles[roleIndex];

        typedElement.textContent = currentRole.substring(0, charIndex);

        if (!deleting && charIndex < currentRole.length) {
            charIndex++;
            setTimeout(typeEffect, 80);
        } else if (!deleting && charIndex === currentRole.length) {
            deleting = true;
            setTimeout(typeEffect, 2200);
        } else if (deleting && charIndex > 0) {
            charIndex--;
            setTimeout(typeEffect, 40);
        } else {
            deleting = false;
            roleIndex = (roleIndex + 1) % roles.length;
            setTimeout(typeEffect, 300);
        }
    };

    /* ====== CONTADORES ANIMADOS ====== */
    const statNumbers = document.querySelectorAll('.stat-number');
    let countersAnimated = false;

    const animateCounters = () => {
        if (countersAnimated) return;
        countersAnimated = true;

        statNumbers.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'), 10);
            const duration = 2000;
            const start = 0;
            const startTime = performance.now();

            const updateCounter = (currentTime) => {
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                counter.textContent = Math.floor(eased * (target - start) + start);
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            requestAnimationFrame(updateCounter);
        });
    };

    /* ====== BARRAS DE PROGRESO DE HABILIDADES ====== */
    const progressBars = document.querySelectorAll('.progress');
    let progressAnimated = false;

    const animateProgress = () => {
        if (progressAnimated) return;
        progressAnimated = true;

        progressBars.forEach(bar => {
            const targetWidth = bar.getAttribute('data-progress') + '%';
            setTimeout(() => {
                bar.style.width = targetWidth;
            }, 300);
        });
    };

    /* ====== REVEAL ON SCROLL ====== */
    const observerConfig = { threshold: 0.15 };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('active');
            if (entry.target.classList.contains('section-title')) {
                entry.target.classList.add('reveal-visible');
            }
            revealObserver.unobserve(entry.target);
        });
    }, observerConfig);

    const initReveal = () => {
        const sections = document.querySelectorAll('.section');

        sections.forEach(section => {
            const content = section.querySelectorAll('h2, h3, p, .stats, .skill-card, .project-card, .contact-form, .contact-info');

            content.forEach((el, index) => {
                const delay = index % 3;
                el.classList.add(`reveal reveal-delay-${delay}`);
            });
        });

        document.querySelectorAll('.reveal, .section-title').forEach(el => {
            revealObserver.observe(el);
        });
    };

    /* ====== EFECTO TILT EN LAS TARJETAS ====== */
    const tiltCards = document.querySelectorAll('[data-tilt]');

    const handleTilt = (card) => {
        const maxTilt = 8;
        card.addEventListener('mousemove', (e) => {
            if (window.innerWidth < 768) return;
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            card.style.transform = `perspective(1000px) rotateY(${x * maxTilt}deg) rotateX(${-y * maxTilt}deg) translateY(-8px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    };

    tiltCards.forEach(handleTilt);

    /* ====== FORMULARIO DE CONTACTO ====== */
    const contactForm = document.getElementById('contact-form');

    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const submitted = contactForm.querySelector('button[type="submit"]');
        submitted.disabled = true;
        submitted.textContent = 'Enviando...';

        setTimeout(() => {
            const successMessage = document.createElement('div');
            successMessage.className = 'form-success';
            successMessage.textContent = '¡Mensaje enviado con éxito! Te responderé pronto.';
            contactForm.replaceWith(successMessage);
        }, 1200);
    });

    /* ====== BOTÓN VOLVER ARRIBA ====== */
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        backToTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ====== EVENT LISTENERS ====== */
    window.addEventListener('scroll', () => {
        requestAnimationFrame(() => {
            updateNavbar();
            updateActiveLink();

            const statsSection = document.querySelector('.stats');
            if (statsSection && isElementInViewport(statsSection)) {
                animateCounters();
            }

            const skillSection = document.querySelector('#habilidades');
            if (skillSection && isElementInViewport(skillSection)) {
                animateProgress();
            }
        });
    }, { passive: true });

    /* ====== UTILIDADES ====== */
    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return rect.top < window.innerHeight && rect.bottom > 0;
    }

    /* ====== INICIALIZACIÓN ====== */
    updateNavbar();
    updateActiveLink();
    initReveal();
    typeEffect();

    /* ====== CHECKS INICIALES DE VIEWPORT ====== */
    const statsSection = document.querySelector('.stats');
    if (statsSection && isElementInViewport(statsSection)) animateCounters();

    const skillSection = document.querySelector('#habilidades');
    if (skillSection && isElementInViewport(skillSection)) animateProgress();
});