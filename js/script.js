// ============ MAIN INITIALIZATION ============
document.addEventListener('DOMContentLoaded', function () {
    initHeroSlider();
    initNavigation();
    initRevealAnimations();
    initCounterAnimation();
    initWishlistButtons();
    initCardNavigationClick();
    initUnitFilters();
    initUnitDetail();
});

// ============ HERO SLIDER ============
let heroSlideIndex = 0;
let heroInterval;
const HERO_SLIDE_DURATION = 5000;

function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');

    if (slides.length === 0) return;

    slides[0].classList.add('active');
    if (dots[0]) dots[0].classList.add('active');

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => goToHeroSlide(i));
    });

    startHeroSlider();

    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', () => clearInterval(heroInterval));
        heroSection.addEventListener('mouseleave', startHeroSlider);
    }
}

function showHeroSlide(index) {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    if (slides.length === 0) return;

    if (index >= slides.length) index = 0;
    if (index < 0) index = slides.length - 1;
    heroSlideIndex = index;

    slides.forEach(s => s.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));

    slides[index].classList.add('active');
    if (dots[index]) dots[index].classList.add('active');
}

function goToHeroSlide(index) {
    clearInterval(heroInterval);
    showHeroSlide(index);
    startHeroSlider();
}

function startHeroSlider() {
    clearInterval(heroInterval);
    heroInterval = setInterval(() => {
        showHeroSlide(heroSlideIndex + 1);
    }, HERO_SLIDE_DURATION);
}

// ============ NAVIGATION ============
function initNavigation() {
    const navbar = document.querySelector('.navbar');
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const dropdown = document.querySelector('.dropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Scroll effect — only on pages with hero (no .scrolled class by default)
    if (navbar && !navbar.classList.contains('scrolled')) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    // Hamburger toggle
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });

        navMenu.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    // Desktop dropdown hover
    if (dropdown && dropdownMenu) {
        let dropdownTimeout;
        dropdown.addEventListener('mouseenter', () => {
            clearTimeout(dropdownTimeout);
            dropdownMenu.classList.add('show');
        });
        dropdown.addEventListener('mouseleave', () => {
            dropdownTimeout = setTimeout(() => {
                dropdownMenu.classList.remove('show');
            }, 200);
        });

        const dropdownLink = dropdown.querySelector('.nav-link');
        if (dropdownLink) {
            dropdownLink.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdownMenu.classList.toggle('show');
                }
            });
        }
    }

    // Close menu on outside click
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.navbar-container')) {
            if (navMenu && navMenu.classList.contains('active')) {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
    });
}

// ============ REVEAL ON SCROLL ============
function initRevealAnimations() {
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length === 0) return;

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('revealed');
                    }, i * 80);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        reveals.forEach(el => observer.observe(el));
    } else {
        reveals.forEach(el => el.classList.add('revealed'));
    }
}

// ============ COUNTER ANIMATION ============
function initCounterAnimation() {
    const counters = document.querySelectorAll('.stat-number[data-target]');
    if (counters.length === 0) return;

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    } else {
        counters.forEach(counter => {
            counter.textContent = counter.getAttribute('data-target');
        });
    }
}

function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-target'), 10);
    const duration = 2000;
    const start = performance.now();

    function update(now) {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = Math.round(eased * target);

        el.textContent = current.toLocaleString() + (target >= 100 ? '+' : '');

        if (progress < 1) {
            requestAnimationFrame(update);
        }
    }

    requestAnimationFrame(update);
}

// ============ WISHLIST TOGGLE ============
function initWishlistButtons() {
    document.querySelectorAll('.tour-card-wishlist').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const isFilled = this.textContent.trim() === '\u2665';
            this.textContent = isFilled ? '\u2661' : '\u2665';
            this.style.color = isFilled ? '' : '#ff6b35';
        });
    });
}

// ============ CARD NAVIGATION ============
function initCardNavigationClick() {
    document.querySelectorAll('.tour-card').forEach(card => {
        card.addEventListener('click', function (e) {
            // Prevent navigation if clicking on wishlist button
            if (e.target.closest('.tour-card-wishlist')) {
                return;
            }
            const slug = this.getAttribute('data-slug');
            if (slug) {
                window.location.href = `/units/${slug}`;
            }
        });
    });
}

// ============ SMOOTH SCROLL ============
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;
        const target = document.querySelector(href);
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});


// ================================================================
//  UNITS PAGE — FILTERING, SORTING & URL PARAMS
// ================================================================

function initUnitFilters() {
    const grid = document.getElementById('listingGrid');
    if (!grid) return; // Not on units page

    const cards          = Array.from(grid.querySelectorAll('.tour-card'));
    const visibleCountEl = document.getElementById('visibleCount');
    const noResultsEl    = document.getElementById('noResults');
    const sortSelect     = document.getElementById('sortSelect');
    const guestsSelect   = document.getElementById('filterGuests');
    const priceMin       = document.getElementById('filterPriceMin');
    const priceMax       = document.getElementById('filterPriceMax');
    const clearBtn       = document.getElementById('clearFilters');

    const locationBoxes   = Array.from(document.querySelectorAll('input[name="filter-location"]'));
    const managementBoxes = Array.from(document.querySelectorAll('input[name="filter-management"]'));
    const amenityBoxes    = Array.from(document.querySelectorAll('input[name="filter-amenity"]'));

    // ---- Read URL params and pre-fill filters ----
    const params = new URLSearchParams(window.location.search);

    const urlLocation = params.get('location');
    const urlGuests   = params.get('guests');

    if (urlLocation) {
        locationBoxes.forEach(cb => {
            if (cb.value === urlLocation) {
                cb.checked = true;
            }
        });
    }

    if (urlGuests) {
        guestsSelect.value = urlGuests;
    }

    // ---- Core filter function ----
    function applyFilters() {
        // Gather checked locations
        const checkedLocations = locationBoxes
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        // Gather checked management
        const checkedManagement = managementBoxes
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        // Gather checked amenities
        const checkedAmenities = amenityBoxes
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        // Guest count
        const minGuests = parseInt(guestsSelect.value, 10) || 0;

        // Price range
        const pMin = parseInt(priceMin.value, 10) || 0;
        const pMax = parseInt(priceMax.value, 10) || Infinity;

        let visibleCount = 0;

        cards.forEach(card => {
            const loc       = card.dataset.location;
            const price     = parseFloat(card.dataset.price);
            const guests    = parseInt(card.dataset.guests, 10);
            const amenities = JSON.parse(card.dataset.amenities);
            const mgmt      = card.dataset.management;

            let show = true;

            // Location filter
            if (checkedLocations.length > 0 && !checkedLocations.includes(loc)) {
                show = false;
            }

            // Management filter
            if (checkedManagement.length > 0 && !checkedManagement.includes(mgmt)) {
                show = false;
            }

            // Amenities filter (must have ALL checked amenities)
            if (checkedAmenities.length > 0) {
                const hasAll = checkedAmenities.every(a => amenities.includes(a));
                if (!hasAll) show = false;
            }

            // Guest count filter (unit must accommodate >= selected guests)
            if (minGuests > 0 && guests < minGuests) {
                show = false;
            }

            // Price range filter
            if (price < pMin || price > pMax) {
                show = false;
            }

            card.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        // Update count & no-results message
        visibleCountEl.textContent = visibleCount;
        noResultsEl.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // ---- Sorting function ----
    function applySort() {
        const value = sortSelect.value;
        const sorted = [...cards];

        switch (value) {
            case 'price-asc':
                sorted.sort((a, b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
                break;
            case 'price-desc':
                sorted.sort((a, b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
                break;
            case 'rating-desc':
                sorted.sort((a, b) => parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating));
                break;
            case 'guests-desc':
                sorted.sort((a, b) => parseInt(b.dataset.guests) - parseInt(a.dataset.guests));
                break;
            default: // recommended = original order
                sorted.sort((a, b) => parseInt(a.dataset.index) - parseInt(b.dataset.index));
                break;
        }

        // Re-append in sorted order
        sorted.forEach(card => grid.appendChild(card));
    }

    // ---- Bind event listeners ----
    locationBoxes.forEach(cb => cb.addEventListener('change', applyFilters));
    managementBoxes.forEach(cb => cb.addEventListener('change', applyFilters));
    amenityBoxes.forEach(cb => cb.addEventListener('change', applyFilters));
    guestsSelect.addEventListener('change', applyFilters);
    priceMin.addEventListener('input', debounce(applyFilters, 400));
    priceMax.addEventListener('input', debounce(applyFilters, 400));

    sortSelect.addEventListener('change', () => {
        applySort();
        applyFilters(); // Re-apply visibility after reorder
    });

    // Clear all filters
    clearBtn.addEventListener('click', () => {
        locationBoxes.forEach(cb => cb.checked = false);
        managementBoxes.forEach(cb => cb.checked = false);
        amenityBoxes.forEach(cb => cb.checked = false);
        guestsSelect.value = '';
        priceMin.value = '';
        priceMax.value = '';
        sortSelect.value = 'recommended';
        applySort();
        applyFilters();

        // Clear URL params without reload
        if (window.history.replaceState) {
            window.history.replaceState({}, '', window.location.pathname);
        }
    });

    // ---- Apply initial filters (from URL params) ----
    applyFilters();
}

// ---- Utility: debounce ----
function debounce(fn, delay) {
    let timer;
    return function (...args) {
        clearTimeout(timer);
        timer = setTimeout(() => fn.apply(this, args), delay);
    };
}


// ================================================================
//  UNIT DETAIL PAGE — Mosaic Gallery, Modal, Date Picker, Booking
// ================================================================

function initUnitDetail() {
    // Only run on unit detail page
    if (!window.unitData) return;

    const data = window.unitData;

    // ---- Gallery Modal ----
    initGalleryModal();

    // ---- Date Picker & Price Calculation ----
    const checkInEl    = document.getElementById('checkIn');
    const checkOutEl   = document.getElementById('checkOut');
    const nightCountEl = document.getElementById('nightCount');
    const nightPluralEl = document.getElementById('nightPlural');
    const nightTotalEl = document.getElementById('nightTotal');
    const totalPriceEl = document.getElementById('totalPrice');
    const bookBtn      = document.getElementById('bookNowBtn');

    if (!checkInEl || !checkOutEl) return;

    function calculateBooking() {
        const checkIn  = new Date(checkInEl.value);
        const checkOut = new Date(checkOutEl.value);

        // Ensure check-out is after check-in
        if (checkOut <= checkIn) {
            const next = new Date(checkIn);
            next.setDate(next.getDate() + 1);
            checkOutEl.value = formatDate(next);
            checkOutEl.min = formatDate(next);
            return calculateBooking();
        }

        // Update check-out min
        const minCheckOut = new Date(checkIn);
        minCheckOut.setDate(minCheckOut.getDate() + 1);
        checkOutEl.min = formatDate(minCheckOut);

        // Calculate nights
        const diffTime = checkOut - checkIn;
        const nights   = Math.max(1, Math.ceil(diffTime / (1000 * 60 * 60 * 24)));

        // Update UI
        nightCountEl.textContent = nights;
        nightPluralEl.textContent = nights > 1 ? 's' : '';

        const nightTotal = data.price * nights;
        nightTotalEl.textContent = 'RM' + nightTotal.toLocaleString();
        totalPriceEl.textContent = 'RM' + (nightTotal + data.cleaningFee).toLocaleString();

        // Update WhatsApp link
        updateWhatsAppLink(nights, checkIn, checkOut);
    }

    function updateWhatsAppLink(nights, checkIn, checkOut) {
        const ciStr = formatDisplayDate(checkIn);
        const coStr = formatDisplayDate(checkOut);
        const nightWord = nights === 1 ? 'one night' : nights + ' nights';

        const message = `Hi, I would like to book *${data.name}* from ${ciStr} to ${coStr} for ${nightWord}. Please let me know the availability. Thank you!`;

        bookBtn.href = `https://wa.me/${data.waNumber}?text=${encodeURIComponent(message)}`;
        bookBtn.target = '_blank';
        bookBtn.rel = 'noopener noreferrer';
    }

    function formatDate(d) {
        const yyyy = d.getFullYear();
        const mm   = String(d.getMonth() + 1).padStart(2, '0');
        const dd   = String(d.getDate()).padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
    }

    function formatDisplayDate(d) {
        const dd   = String(d.getDate()).padStart(2, '0');
        const mm   = String(d.getMonth() + 1).padStart(2, '0');
        const yyyy = d.getFullYear();
        return `${dd}/${mm}/${yyyy}`;
    }

    // Bind events
    checkInEl.addEventListener('change', calculateBooking);
    checkOutEl.addEventListener('change', calculateBooking);

    // Initial calculation
    calculateBooking();
}

// ================================================================
//  GALLERY MODAL — Full-screen lightbox with navigation
// ================================================================

function initGalleryModal() {
    const modal      = document.getElementById('galleryModal');
    const overlay    = document.getElementById('galleryModalOverlay');
    const closeBtn   = document.getElementById('galleryModalCloseBtn');
    const prevBtn    = document.getElementById('galleryPrev');
    const nextBtn    = document.getElementById('galleryNext');
    const modalImg   = document.getElementById('galleryModalImg');
    const counterEl  = document.getElementById('galleryModalCurrent');
    const showAllBtn = document.getElementById('showAllPhotos');

    if (!modal || !modalImg) return;

    const modalThumbs  = Array.from(modal.querySelectorAll('.gallery-modal-thumb'));
    const mosaicImages = Array.from(document.querySelectorAll('.gallery-mosaic-img'));
    const allSrcs      = modalThumbs.map(t => t.querySelector('img').src);
    let currentIndex   = 0;

    function openModal(startIndex) {
        currentIndex = startIndex || 0;
        showSlide(currentIndex);
        modal.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('open');
        document.body.style.overflow = '';
    }

    function showSlide(index) {
        if (index < 0) index = allSrcs.length - 1;
        if (index >= allSrcs.length) index = 0;
        currentIndex = index;

        modalImg.src = allSrcs[currentIndex];
        counterEl.textContent = currentIndex + 1;

        modalThumbs.forEach((t, i) => {
            t.classList.toggle('active', i === currentIndex);
        });
    }

    // Open from "Show all photos" button
    if (showAllBtn) {
        showAllBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            openModal(0);
        });
    }

    // Open from clicking any mosaic image
    mosaicImages.forEach(img => {
        img.addEventListener('click', () => {
            const idx = parseInt(img.dataset.index, 10) || 0;
            openModal(idx);
        });
    });

    // Close
    if (overlay) overlay.addEventListener('click', closeModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);

    // Navigation
    if (prevBtn) prevBtn.addEventListener('click', () => showSlide(currentIndex - 1));
    if (nextBtn) nextBtn.addEventListener('click', () => showSlide(currentIndex + 1));

    // Thumbnail clicks in modal
    modalThumbs.forEach((t, i) => {
        t.addEventListener('click', () => showSlide(i));
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('open')) return;
        if (e.key === 'Escape') closeModal();
        if (e.key === 'ArrowLeft') showSlide(currentIndex - 1);
        if (e.key === 'ArrowRight') showSlide(currentIndex + 1);
    });
}
