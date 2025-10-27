window.addEventListener('DOMContentLoaded', event => {
    const navbar = document.querySelector('#mainNav');
    const logo = navbar?.querySelector('.navbar-brand img');

    // Původní funkce, která shrinkuje navbar
    function navbarShrink() {
        if (!navbar) return;

        // Pokud jsme nahoře
        if (window.scrollY === 0) {
            navbar.classList.remove('navbar-shrink');
        } else {
            navbar.classList.add('navbar-shrink');
        }
    }

    // === FIX PRO MOBILY ===
    if (window.innerWidth <= 991) {
        // Odpojíme původní chování
        window.removeEventListener('scroll', navbarShrink);
        document.removeEventListener('scroll', navbarShrink);

        // Nastavíme logo pevně
        if (logo) {
            logo.style.height = '70px';
            logo.style.marginTop = '15px';
            logo.style.transition = 'none';
        }

        // Zakážeme přidávání "navbar-shrink" na mobilech
        const observer = new MutationObserver(() => {
            if (navbar.classList.contains('navbar-shrink')) {
                navbar.classList.remove('navbar-shrink');
            }
        });
        observer.observe(navbar, { attributes: true, attributeFilter: ['class'] });

        // Ujistíme se, že se nespustí žádný shrink po načtení
        navbar.classList.remove('navbar-shrink');
    } else {
        // === DESKTOP – původní funkce zůstává ===
        navbarShrink();
        document.addEventListener('scroll', navbarShrink);
    }

    // ScrollSpy a zbytek Bootstrapu
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    }

    // Zavření menu při kliknutí (na mobilech)
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });
});
