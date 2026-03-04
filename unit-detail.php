<?php
/**
 * Unit Detail Page — Airbnb-style layout.
 *
 * The variable $unitSlug is set by router.php before this file is required.
 */

require __DIR__ . '/data/units.php';

// Find the unit by slug
$unit = null;
foreach ($units as $u) {
    if ($u['slug'] === $unitSlug) {
        $unit = $u;
        break;
    }
}

if (!$unit) {
    http_response_code(404);
    echo '<!DOCTYPE html><html><head><title>Unit Not Found</title><link rel="stylesheet" href="/css/style.css"></head><body style="display:flex;align-items:center;justify-content:center;height:100vh;background:var(--gray-100);"><div style="text-align:center;"><h1 style="font-size:3rem;margin-bottom:1rem;">404</h1><p>This unit does not exist.</p><a href="/units" style="display:inline-block;margin-top:1.5rem;padding:0.7rem 1.5rem;background:#1a6eb5;color:#fff;border-radius:8px;">Browse Units</a></div></body></html>';
    exit;
}

$title = htmlspecialchars($unit['name']) . ' — MissLimSharing';
$waNumber = '60188726162';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/css/style.css">
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
                            <a href="/units?location=Kuala+Lumpur">Kuala Lumpur</a>
                            <a href="/units?location=Penang">Penang</a>
                            <a href="/units?location=Ipoh">Ipoh</a>
                            <a href="/units?location=Johor+Bahru">Johor Bahru</a>
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

    <!-- Spacer for fixed nav -->
    <div style="height: 80px;"></div>

    <!-- Breadcrumb -->
    <section class="unit-breadcrumb">
        <div class="container">
            <a href="/">Home</a> <span>/</span>
            <a href="/units">Units</a> <span>/</span>
            <span><?= htmlspecialchars($unit['name']) ?></span>
        </div>
    </section>

    <!-- Title above gallery -->
    <section class="unit-title-bar">
        <div class="container">
            <h1 class="unit-page-title"><?= htmlspecialchars($unit['name']) ?></h1>
        </div>
    </section>

    <!-- Photo Gallery -->
    <section class="unit-gallery">
        <div class="container">
            <div class="gallery-mosaic">
                <div class="gallery-mosaic-main">
                    <img src="<?= $unit['images'][0] ?>" alt="<?= htmlspecialchars($unit['name']) ?>" data-index="0" class="gallery-mosaic-img">
                </div>
                <div class="gallery-mosaic-side">
                    <?php for ($i = 1; $i <= min(4, count($unit['images']) - 1); $i++): ?>
                    <div class="gallery-mosaic-thumb<?= ($i === min(4, count($unit['images']) - 1)) ? ' gallery-mosaic-last' : '' ?>">
                        <img src="<?= $unit['images'][$i] ?>" alt="Photo <?= $i + 1 ?>" data-index="<?= $i ?>" class="gallery-mosaic-img">
                        <?php if ($i === min(4, count($unit['images']) - 1)): ?>
                        <button class="gallery-show-all" id="showAllPhotos">
                            &#128247; Show All <?= count($unit['images']) ?> Photos
                        </button>
                        <?php endif; ?>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Modal / Lightbox -->
    <div class="gallery-modal" id="galleryModal">
        <div class="gallery-modal-overlay" id="galleryModalOverlay"></div>
        <div class="gallery-modal-content">
            <button class="gallery-modal-close-btn" id="galleryModalCloseBtn">&times;</button>
            <div class="gallery-modal-counter">
                <span id="galleryModalCurrent">1</span> / <?= count($unit['images']) ?>
            </div>
            <div class="gallery-modal-slider">
                <button class="gallery-modal-arrow gallery-modal-prev" id="galleryPrev">&#10094;</button>
                <div class="gallery-modal-img-wrap">
                    <img src="<?= $unit['images'][0] ?>" alt="" id="galleryModalImg">
                </div>
                <button class="gallery-modal-arrow gallery-modal-next" id="galleryNext">&#10095;</button>
            </div>
            <div class="gallery-modal-thumbs">
                <?php foreach ($unit['images'] as $i => $img): ?>
                <div class="gallery-modal-thumb <?= $i === 0 ? 'active' : '' ?>" data-index="<?= $i ?>">
                    <img src="<?= $img ?>" alt="Photo <?= $i + 1 ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Unit Content -->
    <section class="unit-detail-section">
        <div class="container">
            <div class="unit-detail-layout">
                <!-- Left: Info -->
                <div class="unit-detail-info">
                    <!-- Title & Location -->
                    <div class="unit-detail-header">
                        <h1><?= htmlspecialchars($unit['name']) ?></h1>
                        <div class="unit-detail-location">&#128205; <?= htmlspecialchars($unit['location']) ?></div>
                        <div class="unit-detail-rating">&#11088; <?= $unit['rating'] ?> <span>(<?= $unit['reviews'] ?> reviews)</span></div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="unit-quick-stats">
                        <div class="quick-stat">
                            <span class="quick-stat-icon">&#128101;</span>
                            <div>
                                <strong><?= $unit['guests'] ?> Guests</strong>
                                <span>Maximum</span>
                            </div>
                        </div>
                        <div class="quick-stat">
                            <span class="quick-stat-icon">&#128719;</span>
                            <div>
                                <strong><?= $unit['bedrooms'] ?> Bedroom<?= $unit['bedrooms'] > 1 ? 's' : '' ?></strong>
                                <span><?= $unit['beds'] ?></span>
                            </div>
                        </div>
                        <div class="quick-stat">
                            <span class="quick-stat-icon">&#128703;</span>
                            <div>
                                <strong><?= $unit['baths'] ?></strong>
                                <span>Bathroom<?= (int)filter_var($unit['baths'], FILTER_SANITIZE_NUMBER_INT) > 1 ? 's' : '' ?></span>
                            </div>
                        </div>
                        <div class="quick-stat">
                            <span class="quick-stat-icon">&#128179;</span>
                            <div>
                                <strong>RM<?= $unit['price'] ?></strong>
                                <span>per night</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="unit-section-block">
                        <h2>About This Place</h2>
                        <p><?= htmlspecialchars($unit['description']) ?></p>
                    </div>

                    <!-- Amenities -->
                    <div class="unit-section-block">
                        <h2>What This Place Offers</h2>
                        <div class="amenities-grid">
                            <?php foreach ($unit['amenities'] as $aKey):
                                $aDef = $amenityMaster[$aKey] ?? null;
                                if (!$aDef) continue;
                            ?>
                            <div class="amenity-item">
                                <span class="amenity-icon"><?= $aDef['icon'] ?></span>
                                <span><?= $aDef['label'] ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Check-in / Check-out -->
                    <div class="unit-section-block">
                        <h2>Check-in &amp; Check-out</h2>
                        <div class="checkin-info">
                            <div class="checkin-item">
                                <span class="checkin-icon">&#128277;</span>
                                <div>
                                    <strong>Check-in</strong>
                                    <span>After <?= $unit['check_in'] ?></span>
                                </div>
                            </div>
                            <div class="checkin-item">
                                <span class="checkin-icon">&#128682;</span>
                                <div>
                                    <strong>Check-out</strong>
                                    <span>Before <?= $unit['check_out'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- House Rules -->
                    <div class="unit-section-block">
                        <h2>House Rules</h2>
                        <ul class="house-rules-list">
                            <?php foreach ($unit['house_rules'] as $rule): ?>
                            <li>
                                <span class="rule-icon">&#9888;&#65039;</span>
                                <?= htmlspecialchars($rule) ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Google Map -->
                    <div class="unit-section-block">
                        <h2>Location</h2>
                        <p style="margin-bottom: 1rem; color: var(--gray-600);">&#128205; <?= htmlspecialchars($unit['location']) ?>, Malaysia</p>
                        <div class="unit-map">
                            <iframe
                                src="https://maps.google.com/maps?q=<?= $unit['lat'] ?>,<?= $unit['lng'] ?>&z=15&output=embed"
                                width="100%"
                                height="350"
                                style="border:0; border-radius: var(--radius-md);"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Right: Booking Sidebar -->
                <aside class="booking-sidebar" id="bookingSidebar">
                    <div class="booking-card">
                        <div class="booking-price-header">
                            <span class="booking-price">RM<strong><?= $unit['price'] ?></strong></span>
                            <span class="booking-per">/night</span>
                        </div>

                        <!-- Date Picker -->
                        <div class="booking-dates">
                            <div class="booking-date-field">
                                <label for="checkIn">Check-in</label>
                                <input type="date" id="checkIn" name="checkIn"
                                       min="<?= date('Y-m-d') ?>"
                                       value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="booking-date-field">
                                <label for="checkOut">Check-out</label>
                                <input type="date" id="checkOut" name="checkOut"
                                       min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
                                       value="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                            </div>
                        </div>

                        <!-- Price Breakdown -->
                        <div class="booking-breakdown" id="bookingBreakdown">
                            <div class="breakdown-row">
                                <span>RM<?= $unit['price'] ?> &times; <span id="nightCount">1</span> night<span id="nightPlural"></span></span>
                                <span id="nightTotal">RM<?= $unit['price'] ?></span>
                            </div>
                            <div class="breakdown-row">
                                <span>Cleaning fee</span>
                                <span>RM<?= $unit['cleaning_fee'] ?></span>
                            </div>
                            <div class="breakdown-total">
                                <span>Total</span>
                                <span id="totalPrice">RM<?= $unit['price'] + $unit['cleaning_fee'] ?></span>
                            </div>
                        </div>

                        <!-- Book Now -->
                        <a href="#" class="btn-book-now" id="bookNowBtn">
                            &#128172; Book via WhatsApp
                        </a>

                        <p class="booking-note">You won't be charged yet. Confirm your stay via WhatsApp.</p>
                    </div>
                </aside>
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
                        <li><a href="/units?location=Kuala+Lumpur">Kuala Lumpur</a></li>
                        <li><a href="/units?location=Penang">Penang</a></li>
                        <li><a href="/units?location=Ipoh">Ipoh</a></li>
                        <li><a href="/units?location=Johor+Bahru">Johor Bahru</a></li>
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

    <!-- Pass data to JS -->
    <script>
        window.unitData = {
            name:        <?= json_encode($unit['name']) ?>,
            slug:        <?= json_encode($unit['slug']) ?>,
            price:       <?= $unit['price'] ?>,
            cleaningFee: <?= $unit['cleaning_fee'] ?>,
            waNumber:    <?= json_encode($waNumber) ?>,
        };
    </script>
    <script src="/js/script.js"></script>
</body>
</html>
