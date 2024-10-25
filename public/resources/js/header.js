document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header');
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    const loginBtn = document.querySelector('.login-btn');

    // Efecto de scroll en el header
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Toggle del menú móvil
    menuToggle.addEventListener('click', () => {
        mobileNav.style.display = mobileNav.style.display === 'flex' ? 'none' : 'flex';
        menuToggle.setAttribute('aria-expanded', mobileNav.style.display === 'flex');
    });

    // Cerrar menú móvil al hacer clic fuera
    document.addEventListener('click', (e) => {
        if (!mobileNav.contains(e.target) && !menuToggle.contains(e.target)) {
            mobileNav.style.display = 'none';
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // Scroll suave para los enlaces de navegación
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});