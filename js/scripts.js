// scripts.js – čistá verze, bez chyb a bez “magie” na mobilech
document.addEventListener('DOMContentLoaded', () => {
  const mainNav = document.querySelector('#mainNav');
  if (!mainNav) return;

  // Shrink jen na desktopu (>= 992px). Na mobilech necháme navbar i logo v klidu.
  const handleShrink = () => {
    if (window.innerWidth >= 992 && window.scrollY > 0) {
      mainNav.classList.add('navbar-shrink');
    } else {
      mainNav.classList.remove('navbar-shrink');
    }
  };

  handleShrink();
  window.addEventListener('scroll', handleShrink);
  window.addEventListener('resize', handleShrink);

  // ScrollSpy (necháme jak je)
  if (typeof bootstrap !== 'undefined') {
    new bootstrap.ScrollSpy(document.body, {
      target: '#mainNav',
      rootMargin: '0px 0px -40%',
    });
  }

  // Zavřít mobilní menu po kliknutí na odkaz
  const navbarToggler = document.querySelector('.navbar-toggler');
  document.querySelectorAll('#navbarResponsive .nav-link').forEach(link => {
    link.addEventListener('click', () => {
      if (navbarToggler && window.getComputedStyle(navbarToggler).display !== 'none') {
        navbarToggler.click();
      }
    });
  });
});
