/**
 * Responsive JavaScript Enhancement
 * File: responsive.js
 * Place in: /public/assets/js/
 */

(function() {
    'use strict';

    // ===== MOBILE MENU TOGGLE =====
    function initMobileMenu() {
        // Create mobile menu button if not exists
        const navMenu = document.querySelector('.nav-menu');
        if (!navMenu) return;

        const headerNav = document.querySelector('.header-nav');
        if (!headerNav) return;

        // Create toggle button
        const toggleBtn = document.createElement('button');
        toggleBtn.className = 'mobile-menu-toggle show-mobile';
        toggleBtn.innerHTML = `
            <span style="font-size: 24px; color: #2777C4;">☰</span>
        `;
        toggleBtn.style.cssText = `
            display: none;
            background: none;
            border: none;
            padding: 8px;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
        `;

        // Add toggle functionality
        toggleBtn.addEventListener('click', function() {
            navMenu.classList.toggle('mobile-menu-open');
            const isOpen = navMenu.classList.contains('mobile-menu-open');
            this.innerHTML = isOpen 
                ? '<span style="font-size: 24px; color: #2777C4;">✕</span>'
                : '<span style="font-size: 24px; color: #2777C4;">☰</span>';
        });

        // Insert button
        const navLogo = document.querySelector('.nav-logo');
        if (navLogo && navLogo.parentNode === headerNav) {
            navLogo.parentNode.insertBefore(toggleBtn, navLogo.nextSibling);
        }

        // Add CSS for mobile menu
        const style = document.createElement('style');
        style.textContent = `
            @media (max-width: 768px) {
                .mobile-menu-toggle {
                    display: block !important;
                }
                
                .nav-menu {
                    display: none !important;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100vh;
                    background: white;
                    z-index: 9999;
                    padding: 60px 20px 20px;
                    overflow-y: auto;
                }
                
                .nav-menu.mobile-menu-open {
                    display: flex !important;
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 20px;
                }
                
                .nav-menu.mobile-menu-open > div {
                    width: 100%;
                    padding: 12px 0;
                    border-bottom: 1px solid #eee;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // ===== SMOOTH SCROLL =====
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // ===== LAZY LOAD IMAGES =====
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    // ===== VIEWPORT HEIGHT FIX (iOS) =====
    function fixViewportHeight() {
        // Fix 100vh on mobile browsers (especially iOS)
        const setVH = () => {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        };
        
        setVH();
        window.addEventListener('resize', setVH);
        window.addEventListener('orientationchange', setVH);
    }

    // ===== TOUCH DEVICE DETECTION =====
    function detectTouchDevice() {
        const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
        if (isTouchDevice) {
            document.body.classList.add('touch-device');
        }
    }

    // ===== RESIZE HANDLER =====
    let resizeTimer;
    function handleResize() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            // Add resize-specific logic here
            console.log('Window resized');
        }, 250);
    }

    // ===== TESTIMONIAL SWIPE (for mobile) =====
    function initTestimonialSwipe() {
        const testimonialSection = document.querySelector('.testimonial-section');
        if (!testimonialSection) return;

        let startX = 0;
        let currentIndex = 0;
        const testimonialCards = testimonialSection.querySelectorAll('.testimonial-card');
        
        if (testimonialCards.length === 0) return;

        testimonialSection.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, { passive: true });

        testimonialSection.addEventListener('touchend', (e) => {
            const endX = e.changedTouches[0].clientX;
            const diff = startX - endX;

            if (Math.abs(diff) > 50) { // Minimum swipe distance
                if (diff > 0 && currentIndex < testimonialCards.length - 1) {
                    // Swipe left - next
                    currentIndex++;
                } else if (diff < 0 && currentIndex > 0) {
                    // Swipe right - previous
                    currentIndex--;
                }
                
                // Scroll to the testimonial
                testimonialCards[currentIndex].scrollIntoView({
                    behavior: 'smooth',
                    inline: 'center',
                    block: 'nearest'
                });
            }
        }, { passive: true });
    }

    // ===== PREVENT ZOOM ON INPUT FOCUS (iOS) =====
    function preventZoomOnInput() {
        // Prevent zoom when focusing inputs on iOS
        if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
            const addMaximumScaleToMetaViewport = () => {
                const el = document.querySelector('meta[name=viewport]');
                if (el !== null) {
                    let content = el.getAttribute('content');
                    const re = /maximum-scale=[0-9.]+/g;

                    if (re.test(content)) {
                        content = content.replace(re, 'maximum-scale=1.0');
                    } else {
                        content = [content, 'maximum-scale=1.0'].join(', ');
                    }

                    el.setAttribute('content', content);
                }
            };

            const disableMaximumScale = () => {
                const el = document.querySelector('meta[name=viewport]');
                if (el !== null) {
                    let content = el.getAttribute('content');
                    content = content.replace(/maximum-scale=[0-9.]+/g, 'maximum-scale=10.0');
                    el.setAttribute('content', content);
                }
            };

            const inputs = document.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('focus', addMaximumScaleToMetaViewport);
                input.addEventListener('blur', disableMaximumScale);
            });
        }
    }

    // ===== SCROLL TO TOP BUTTON =====
    function initScrollToTop() {
        const scrollBtn = document.createElement('button');
        scrollBtn.className = 'scroll-to-top';
        scrollBtn.innerHTML = '↑';
        scrollBtn.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #2777C4;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        `;

        document.body.appendChild(scrollBtn);

        // Show/hide on scroll
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollBtn.style.opacity = '1';
                scrollBtn.style.visibility = 'visible';
            } else {
                scrollBtn.style.opacity = '0';
                scrollBtn.style.visibility = 'hidden';
            }
        });

        // Scroll to top on click
        scrollBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ===== FORM VALIDATION ENHANCEMENT =====
    function enhanceFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            
            inputs.forEach(input => {
                // Add visual feedback
                input.addEventListener('invalid', function(e) {
                    e.preventDefault();
                    this.style.borderColor = 'red';
                });

                input.addEventListener('input', function() {
                    if (this.validity.valid) {
                        this.style.borderColor = '';
                    }
                });
            });
        });
    }

    // ===== PERFORMANCE MONITORING =====
    function monitorPerformance() {
        if ('performance' in window) {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const perfData = performance.timing;
                    const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                    console.log(`Page load time: ${pageLoadTime}ms`);
                }, 0);
            });
        }
    }

    // ===== ORIENTATION CHANGE HANDLER =====
    function handleOrientationChange() {
        window.addEventListener('orientationchange', () => {
            // Reload page layout on orientation change
            setTimeout(() => {
                window.scrollTo(0, 0);
            }, 100);
        });
    }

    // ===== IMAGE ERROR HANDLER =====
    function handleImageErrors() {
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.style.display = 'none';
                console.warn('Image failed to load:', this.src);
            });
        });
    }

    // ===== EXTERNAL LINK HANDLER =====
    function handleExternalLinks() {
        document.querySelectorAll('a[href^="http"]').forEach(link => {
            if (link.hostname !== window.location.hostname) {
                link.setAttribute('target', '_blank');
                link.setAttribute('rel', 'noopener noreferrer');
            }
        });
    }

    // ===== INIT ALL =====
    function init() {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
            return;
        }

        console.log('Initializing responsive features...');

        // Initialize all features
        initMobileMenu();
        initSmoothScroll();
        initLazyLoad();
        fixViewportHeight();
        detectTouchDevice();
        initTestimonialSwipe();
        preventZoomOnInput();
        initScrollToTop();
        enhanceFormValidation();
        monitorPerformance();
        handleOrientationChange();
        handleImageErrors();
        handleExternalLinks();

        // Add resize listener
        window.addEventListener('resize', handleResize);

        console.log('Responsive features initialized!');
    }

    // Start initialization
    init();

})();

// ===== UTILITY FUNCTIONS =====

// Debounce function
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Get device type
function getDeviceType() {
    const width = window.innerWidth;
    if (width < 768) return 'mobile';
    if (width < 1024) return 'tablet';
    return 'desktop';
}

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        debounce,
        throttle,
        isInViewport,
        getDeviceType
    };
}