<?php
$title = "MissLimSharing - Premium Homestays in Malaysia";
require __DIR__ . '/data/units.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <a href="/">MissLimSharing</a>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a href="/units" class="nav-link">Units</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-column">
                            <h3>By Location</h3>
                            <a href="/units">Kuala Lumpur</a>
                            <a href="/units">Penang</a>
                            <a href="/units">Ipoh</a>
                            <a href="/units">Johor Bahru</a>
                        </div>
                        <div class="dropdown-column">
                            <h3>By Management</h3>
                            <a href="/units">4Balance Homestay</a>
                            <a href="/units">Dato Villa</a>
                            <a href="/units">Desaru Homestay</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link nav-btn">Book Now</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Slider -->
    <section class="hero-section">
        <div class="hero-slider">
            <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1920&h=1080&fit=crop&q=80');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1920&h=1080&fit=crop&q=80');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1464207687429-7505649dae38?w=1920&h=1080&fit=crop&q=80');"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1920&h=1080&fit=crop&q=80');"></div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">&#127758; Malaysia’s Preferred Homestay Management</div>
            <h1 class="hero-title">Discover Your Perfect <span>Homestay</span> in Malaysia</h1>
            <p class="hero-subtitle">Explore premium homestays across Kuala Lumpur, Penang, Ipoh and Johor Bahru with unbeatable comfort and value.</p>
            
            <!-- Search Box Overlay -->
            <form class="hero-search" id="heroSearchForm" action="/units" method="GET">
                <div class="search-field">
                    <label>Location</label>
                    <select name="location" id="heroLocation">
                        <option value="">All Locations</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                        <option value="Penang">Penang</option>
                        <option value="Ipoh">Ipoh</option>
                        <option value="Johor Bahru">Johor Bahru</option>
                    </select>
                </div>
                <div class="search-field">
                    <label>Guests</label>
                    <select name="guests" id="heroGuests">
                        <option value="">Any</option>
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                        <option value="5">5 Guests</option>
                        <option value="6">6 Guests</option>
                        <option value="7">7 Guests</option>
                        <option value="8">8+ Guests</option>
                    </select>
                </div>
                <button type="submit" class="search-btn">&#128269; Search</button>
            </form>
        </div>

        <div class="hero-dots">
            <button class="hero-dot active" data-slide="0"></button>
            <button class="hero-dot" data-slide="1"></button>
            <button class="hero-dot" data-slide="2"></button>
            <button class="hero-dot" data-slide="3"></button>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section class="section">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge">Top Destinations</span>
                <h2 class="section-title">Explore Popular Locations</h2>
                <p class="section-desc">Find your ideal homestay in Malaysia's most beloved cities and getaway spots.</p>
            </div>
            <div class="destinations-grid">
                <div class="dest-card tall reveal">
                    <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=600&h=800&fit=crop&q=80" alt="Kuala Lumpur">
                    <div class="dest-card-overlay">
                        <h3>Kuala Lumpur</h3>
                        <p>City centre living</p>
                        <div class="dest-count">&#127968; 3 Homestays</div>
                    </div>
                </div>
                <div class="dest-card reveal">
                    <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=600&h=400&fit=crop&q=80" alt="Penang">
                    <div class="dest-card-overlay">
                        <h3>Penang</h3>
                        <p>Heritage & beaches</p>
                        <div class="dest-count">&#127968; 2 Homestays</div>
                    </div>
                </div>
                <div class="dest-card reveal">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=400&fit=crop&q=80" alt="Ipoh">
                    <div class="dest-card-overlay">
                        <h3>Ipoh</h3>
                        <p>Mountain retreats</p>
                        <div class="dest-count">&#127968; 1 Homestay</div>
                    </div>
                </div>
                <div class="dest-card reveal">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600&h=400&fit=crop&q=80" alt="Johor Bahru">
                    <div class="dest-card-overlay">
                        <h3>Johor Bahru</h3>
                        <p>Garden city escape</p>
                        <div class="dest-count">&#127968; 1 Homestay</div>
                    </div>
                </div>
                <div class="dest-card reveal">
                    <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?w=600&h=400&fit=crop&q=80" alt="Desaru">
                    <div class="dest-card-overlay">
                        <h3>Desaru</h3>
                        <p>Beachfront getaway</p>
                        <div class="dest-count">&#127968; 1 Homestay</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Homestays -->
    <section class="section" style="background: var(--gray-100);">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge">Our Best Picks</span>
                <h2 class="section-title">Featured Homestays</h2>
                <p class="section-desc">Hand-picked accommodations loved by our guests for comfort, location and value.</p>
            </div>
            <div class="featured-grid">
                <?php foreach (array_slice($units, 0, 6) as $unit): ?>
                <div class="tour-card reveal" data-slug="<?= htmlspecialchars($unit['slug']) ?>">
                    <div class="tour-card-img">
                        <img src="<?= $unit['image'] ?>" alt="<?= htmlspecialchars($unit['name']) ?>">
                        <?php if (!empty($unit['badge'])): ?>
                        <span class="tour-card-badge"><?= $unit['badge'] ?></span>
                        <?php endif; ?>
                        <button class="tour-card-wishlist">&#9825;</button>
                    </div>
                    <div class="tour-card-body">
                        <div class="tour-card-location">&#128205; <?= htmlspecialchars($unit['location']) ?></div>
                        <h3 class="tour-card-title"><?= htmlspecialchars($unit['name']) ?></h3>
                        <div class="tour-card-meta">
                            <span>&#128716; <?= $unit['beds'] ?></span>
                            <span>&#128703; <?= $unit['baths'] ?></span>
                            <?php $firstAmenity = $unit['amenities'][0] ?? null; if ($firstAmenity && isset($amenityMaster[$firstAmenity])): ?>
                            <span><?= $amenityMaster[$firstAmenity]['icon'] ?> <?= $firstAmenity ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="tour-card-footer">
                            <div class="tour-card-price">From RM<strong><?= $unit['price'] ?></strong>/night</div>
                            <div class="tour-card-rating">&#11088; <?= $unit['rating'] ?> <span>(<?= $unit['reviews'] ?>)</span></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-3">
                <a href="/units" class="btn-primary">View All Homestays &#8594;</a>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal">
                    <div class="stat-icon">&#127968;</div>
                    <div class="stat-number" data-target="8">0</div>
                    <div class="stat-label">Premium Homestays</div>
                </div>
                <div class="stat-item reveal">
                    <div class="stat-icon">&#128101;</div>
                    <div class="stat-number" data-target="1500">0</div>
                    <div class="stat-label">Happy Guests</div>
                </div>
                <div class="stat-item reveal">
                    <div class="stat-icon">&#128205;</div>
                    <div class="stat-number" data-target="4">0</div>
                    <div class="stat-label">Locations</div>
                </div>
                <div class="stat-item reveal">
                    <div class="stat-icon">&#11088;</div>
                    <div class="stat-number" data-target="4">0</div>
                    <div class="stat-label">Average Rating (4.8)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section features-section">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge">Why MissLimSharing</span>
                <h2 class="section-title">Why Guests Love Us</h2>
                <p class="section-desc">We go the extra mile to make your stay comfortable, safe and memorable.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card reveal">
                    <div class="feature-icon">&#128179;</div>
                    <h3>Best Price Guarantee</h3>
                    <p>Competitive pricing with no hidden fees. Book directly for the best rates available.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">&#9989;</div>
                    <h3>Verified Properties</h3>
                    <p>Every homestay is personally inspected and verified for quality and cleanliness standards.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">&#128222;</div>
                    <h3>24/7 Support</h3>
                    <p>Our dedicated team is available around the clock to assist you during your stay.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">&#128274;</div>
                    <h3>Secure Booking</h3>
                    <p>Safe and easy booking process with flexible cancellation policies for peace of mind.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section testimonials-section">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge">Testimonials</span>
                <h2 class="section-title">What Our Guests Say</h2>
                <p class="section-desc">Real reviews from real guests who have experienced our homestays.</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card reveal">
                    <div class="testimonial-stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
                    <p class="testimonial-text">"The Modern City Apartment in KL was absolutely perfect! Clean, well-located, and the host was incredibly responsive. Will definitely book again."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">AH</div>
                        <div class="testimonial-info">
                            <h4>Ahmad Hassan</h4>
                            <p>Stayed in Kuala Lumpur</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card reveal">
                    <div class="testimonial-stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
                    <p class="testimonial-text">"The Beach Villa in Penang exceeded our expectations. Stunning sea views, great amenities and the kids absolutely loved it. A memorable family trip!"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">SL</div>
                        <div class="testimonial-info">
                            <h4>Sarah Lim</h4>
                            <p>Stayed in Penang</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card reveal">
                    <div class="testimonial-stars">&#11088;&#11088;&#11088;&#11088;&#11088;</div>
                    <p class="testimonial-text">"Best value for money! The Mountain Retreat in Ipoh was so peaceful and relaxing. The surrounding nature was breathtaking. Highly recommended!"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">RC</div>
                        <div class="testimonial-info">
                            <h4>Raj Chandran</h4>
                            <p>Stayed in Ipoh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA / Newsletter -->
    <section class="cta-section">
        <div class="container">
            <h2>Get Exclusive Deals & Updates</h2>
            <p>Subscribe to our newsletter and be the first to know about special offers and new homestay listings.</p>
            <form class="cta-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>MissLimSharing</h3>
                    <p>Your trusted platform for premium homestays across Malaysia. We connect travellers with exceptional, verified accommodations for unforgettable experiences.</p>
                    <div class="footer-social">
                        <a href="#" title="Facebook">FB</a>
                        <a href="#" title="Instagram">IG</a>
                        <a href="#" title="WhatsApp">WA</a>
                        <a href="#" title="YouTube">YT</a>
                    </div>
                </div>
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/units">All Units</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Locations</h4>
                    <ul>
                        <li><a href="/units">Kuala Lumpur</a></li>
                        <li><a href="/units">Penang</a></li>
                        <li><a href="/units">Ipoh</a></li>
                        <li><a href="/units">Johor Bahru</a></li>
                        <li><a href="/units">Desaru</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Contact Info</h4>
                    <div class="footer-contact-item">
                        <span class="icon">&#128205;</span>
                        <span>123 Jalan Merdeka, Kuala Lumpur 50050, Malaysia</span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="icon">&#128222;</span>
                        <span>+603 1234 5678</span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="icon">&#9993;</span>
                        <span>info@misslimsharing.com</span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="icon">&#128339;</span>
                        <span>Mon - Fri: 9AM - 6PM</span>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date("Y") ?> MissLimSharing. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
