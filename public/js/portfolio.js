'use strict';

// Initialize AOS
document.addEventListener('DOMContentLoaded', function() {
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-out-cubic',
      once: true,
      offset: 100,
      disable: function() {
        return window.innerWidth < 768;
      }
    });
  }
});

// Navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar?.classList.toggle('scrolled', window.scrollY > 50);
}, { passive: true });

// Mobile menu
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');
let isMenuOpen = false;

hamburger?.addEventListener('click', (e) => {
  e.stopPropagation();
  isMenuOpen = !isMenuOpen;
  hamburger.classList.toggle('open', isMenuOpen);
  mobileMenu.classList.toggle('open', isMenuOpen);
  document.body.style.overflow = isMenuOpen ? 'hidden' : '';
});

document.querySelectorAll('.mob-link').forEach(link => {
  link.addEventListener('click', () => {
    isMenuOpen = false;
    hamburger?.classList.remove('open');
    mobileMenu?.classList.remove('open');
    document.body.style.overflow = '';
  });
});

document.addEventListener('click', (e) => {
  if (isMenuOpen && !mobileMenu?.contains(e.target) && !hamburger?.contains(e.target)) {
    isMenuOpen = false;
    hamburger?.classList.remove('open');
    mobileMenu?.classList.remove('open');
    document.body.style.overflow = '';
  }
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const targetId = this.getAttribute('href');
    if (targetId === '#') return;
    
    const target = document.querySelector(targetId);
    if (target) {
      e.preventDefault();
      const headerOffset = 100;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
      
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
    }
  });
});

// Active nav link on scroll
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
  const scrollY = window.pageYOffset + 150;
  
  sections.forEach(section => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.offsetHeight;
    const sectionId = section.getAttribute('id');
    
    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${sectionId}`) {
          link.classList.add('active');
        }
      });
    }
  });
}, { passive: true });

// Mobile touch improvements
if ('ontouchstart' in window) {
  document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('touchstart', function() {
      this.style.transform = 'translateY(-4px)';
    });
    card.addEventListener('touchend', function() {
      setTimeout(() => {
        this.style.transform = '';
      }, 300);
    });
  });
}

console.log('%c🚀 Portfolio loaded successfully!', 'color: #e63946; font-size: 14px; font-weight: bold;');