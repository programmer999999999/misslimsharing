<?php
$title = "About Us - MissLimSharing";
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
    <nav class="navbar scrolled">
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

    <!-- Page Banner -->
    <section class="page-banner">
        <div class="container">
            <h1>About Us</h1>
            <p>Learn about our story and mission</p>
            <div class="breadcrumb">
                <a href="/">Home</a> <span>/</span> <span>About</span>
            </div>
        </div>
    </section>

    <!-- About Intro -->
    <div class="container">
        <div class="about-intro">
            <div class="about-intro-img reveal">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=700&h=500&fit=crop&q=80" alt="About MissLimSharing">
                <div class="exp-badge">
                    <span class="number">5+</span>
                    <span class="label">Years Experience</span>
                </div>
            </div>
            <div class="about-intro-content reveal">
                <span class="section-badge">About MissLimSharing</span>
                <h2>Your Trusted Homestay Partner in Malaysia</h2>
                <p>Welcome to MissLimSharing, your premier platform for discovering and booking premium homestays across Malaysia. We are dedicated to providing travellers with authentic, comfortable and affordable accommodation options in some of the most beautiful destinations in the country.</p>
                <p>Our mission is to connect travellers with exceptional homestays that offer genuine hospitality and memorable experiences. We believe in supporting local homestay owners and creating opportunities for both hosts and guests to build lasting connections.</p>
                <ul class="about-list">
                    <li><span class="check">&#10003;</span> Wide selection across major Malaysian cities</li>
                    <li><span class="check">&#10003;</span> Verified and quality-checked accommodations</li>
                    <li><span class="check">&#10003;</span> Competitive pricing and special deals</li>
                    <li><span class="check">&#10003;</span> 24/7 customer support</li>
                    <li><span class="check">&#10003;</span> Secure and easy booking process</li>
                </ul>
                <a href="/units" class="btn-primary">Explore Our Units &#8594;</a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
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

    <!-- Our Team -->
    <section class="section">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge">Our Team</span>
                <h2 class="section-title">Meet the People Behind MissLimSharing</h2>
                <p class="section-desc">A dedicated team working to bring you the best homestay experience in Malaysia.</p>
            </div>
            <div class="team-grid">
                <div class="team-card reveal">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop&q=80" alt="Miss Lim">
                    </div>
                    <div class="team-card-body">
                        <h3>Miss Lim</h3>
                        <p>Founder &amp; CEO</p>
                    </div>
                </div>
                <div class="team-card reveal">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop&q=80" alt="David Tan">
                    </div>
                    <div class="team-card-body">
                        <h3>David Tan</h3>
                        <p>Operations Manager</p>
                    </div>
                </div>
                <div class="team-card reveal">
                    <div class="team-card-img">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=400&fit=crop&q=80" alt="Aisha Rahman">
                    </div>
                    <div class="team-card-body">
                        <h3>Aisha Rahman</h3>
                        <p>Guest Relations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us (mini) -->
    <section class="section features-section">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge">Our Promise</span>
                <h2 class="section-title">What Sets Us Apart</h2>
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
                    <p>Every homestay is personally inspected and verified for quality and cleanliness.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">&#128222;</div>
                    <h3>24/7 Support</h3>
                    <p>Our team is available around the clock to assist you during your stay.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">&#128274;</div>
                    <h3>Secure Booking</h3>
                    <p>Safe booking process with flexible cancellation policies for peace of mind.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Find Your Perfect Stay?</h2>
            <p>Browse our collection of premium homestays and book your next Malaysian getaway today.</p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="/units" class="btn-secondary">Browse Homestays &#8594;</a>
                <a href="/contact" class="btn-primary">Contact Us</a>
            </div>
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
