<?php
$title = "Contact Us - MissLimSharing";
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
            <h1>Contact Us</h1>
            <p>We'd love to hear from you. Get in touch with our team.</p>
            <div class="breadcrumb">
                <a href="/">Home</a> <span>/</span> <span>Contact</span>
            </div>
        </div>
    </section>

    <!-- Contact Layout -->
    <div class="container">
        <div class="contact-layout">
            <!-- Contact Form -->
            <div class="contact-form-section reveal">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                <form class="contact-form" onsubmit="event.preventDefault(); alert('Thank you! We will get back to you shortly.');">
                    <div class="form-row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Your first name" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Your last name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="your@email.com" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" placeholder="+60 12 345 6789">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <select>
                            <option value="">Select a subject</option>
                            <option>General Enquiry</option>
                            <option>Booking Enquiry</option>
                            <option>Partnership Opportunity</option>
                            <option>Feedback / Complaint</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea placeholder="Tell us how we can help you..." rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-secondary">Send Message &#8594;</button>
                </form>
            </div>

            <!-- Contact Info Card -->
            <div class="contact-info-section reveal">
                <h2>Get in Touch</h2>
                <p>Have questions about a homestay or need help with a booking? Reach out to us anytime.</p>
                <ul class="contact-info-list">
                    <li class="contact-info-item">
                        <div class="contact-info-icon">&#128205;</div>
                        <div>
                            <h4>Our Office</h4>
                            <p>123 Jalan Merdeka<br>Kuala Lumpur 50050<br>Malaysia</p>
                        </div>
                    </li>
                    <li class="contact-info-item">
                        <div class="contact-info-icon">&#128222;</div>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:+60312345678">+603 1234 5678</a>
                        </div>
                    </li>
                    <li class="contact-info-item">
                        <div class="contact-info-icon">&#9993;</div>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:info@misslimsharing.com">info@misslimsharing.com</a>
                        </div>
                    </li>
                    <li class="contact-info-item">
                        <div class="contact-info-icon">&#128339;</div>
                        <div>
                            <h4>Business Hours</h4>
                            <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM<br>Sun: Closed</p>
                        </div>
                    </li>
                </ul>
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7925372121744!2d101.69373!3d3.1478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49c701efeae7%3A0xf4d98e5b2f1c287d!2sKuala%20Lumpur%20City%20Centre!5e0!3m2!1sen!2smy!4v1709123456789!5m2!1sen!2smy" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <section class="cta-section" style="margin-top: 3rem;">
        <div class="container">
            <h2>Prefer to Chat Directly?</h2>
            <p>Reach us on WhatsApp for instant responses about bookings and enquiries.</p>
            <a href="https://wa.me/60312345678" class="btn-secondary" target="_blank">&#128172; Chat on WhatsApp</a>
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
