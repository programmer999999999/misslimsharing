<?php
$title = "Our Units - MissLimSharing";

// ============ LOAD SHARED UNIT DATA ============
require __DIR__ . '/data/units.php';

// Pre-compute counts for sidebar
$locationCounts = [];
$managementList = [];
$allAmenities   = [];
foreach ($units as $u) {
    $loc = $u['location'];
    $locationCounts[$loc] = ($locationCounts[$loc] ?? 0) + 1;
    $managementList[$u['management']] = true;
    foreach ($u['amenities'] as $a) {
        $allAmenities[$a] = true;
    }
}
ksort($allAmenities);
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
            <h1>Our Homestay Units</h1>
            <p>Browse all available homestays across Malaysia</p>
            <div class="breadcrumb">
                <a href="/">Home</a> <span>/</span> <span>Units</span>
            </div>
        </div>
    </section>

    <!-- Listing Section -->
    <section class="listing-section">
        <div class="container">
            <div class="listing-layout">
                <!-- Filter Sidebar -->
                <aside class="filter-sidebar" id="filterSidebar">
                    <!-- Location Filter -->
                    <div class="filter-group">
                        <h3>Location</h3>
                        <?php foreach ($locationCounts as $loc => $count): ?>
                        <label class="filter-option">
                            <input type="checkbox" name="filter-location" value="<?= htmlspecialchars($loc) ?>">
                            <?= htmlspecialchars($loc) ?> <span class="count">(<?= $count ?>)</span>
                        </label>
                        <?php endforeach; ?>
                    </div>

                    <!-- Guest Count Filter -->
                    <div class="filter-group">
                        <h3>Minimum Guests</h3>
                        <select id="filterGuests" class="sort-select" style="width:100%;">
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

                    <!-- Price Range Filter -->
                    <div class="filter-group">
                        <h3>Price Range (RM/night)</h3>
                        <div class="price-range">
                            <input type="number" id="filterPriceMin" placeholder="Min" min="0" step="10">
                            <span>-</span>
                            <input type="number" id="filterPriceMax" placeholder="Max" min="0" step="10">
                        </div>
                    </div>

                    <!-- Management Filter -->
                    <div class="filter-group">
                        <h3>Management</h3>
                        <?php foreach (array_keys($managementList) as $mgmt): ?>
                        <label class="filter-option">
                            <input type="checkbox" name="filter-management" value="<?= htmlspecialchars($mgmt) ?>">
                            <?= htmlspecialchars($mgmt) ?>
                        </label>
                        <?php endforeach; ?>
                    </div>

                    <!-- Amenities Filter -->
                    <div class="filter-group">
                        <h3>Amenities</h3>
                        <?php foreach (array_keys($allAmenities) as $amenity): ?>
                        <label class="filter-option">
                            <input type="checkbox" name="filter-amenity" value="<?= htmlspecialchars($amenity) ?>">
                            <?= htmlspecialchars($amenity) ?>
                        </label>
                        <?php endforeach; ?>
                    </div>

                    <button class="btn-secondary" style="width:100%;" id="clearFilters">Clear All Filters</button>
                </aside>

                <!-- Listing Content -->
                <div>
                    <div class="listing-header">
                        <p>Showing <strong id="visibleCount"><?= count($units) ?></strong> of <?= count($units) ?> homestays</p>
                        <select class="sort-select" id="sortSelect">
                            <option value="recommended">Sort by: Recommended</option>
                            <option value="price-asc">Price: Low to High</option>
                            <option value="price-desc">Price: High to Low</option>
                            <option value="rating-desc">Rating: High to Low</option>
                            <option value="guests-desc">Guests: High to Low</option>
                        </select>
                    </div>
                    <div class="listing-grid" id="listingGrid">
                        <?php foreach ($units as $i => $unit):
                            $amenitiesJson = htmlspecialchars(json_encode($unit['amenities']), ENT_QUOTES);
                        ?>
                        <div class="tour-card reveal"
                             data-name="<?= htmlspecialchars($unit['name']) ?>"
                             data-location="<?= htmlspecialchars($unit['location']) ?>"
                             data-price="<?= $unit['price'] ?>"
                             data-guests="<?= $unit['guests'] ?>"
                             data-rating="<?= $unit['rating'] ?>"
                             data-amenities="<?= $amenitiesJson ?>"
                             data-management="<?= htmlspecialchars($unit['management']) ?>"
                             data-index="<?= $i ?>"
                             data-slug="<?= htmlspecialchars($unit['slug']) ?>">
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
                                    <span>&#128101; <?= $unit['guests'] ?> Guests</span>
                                    <?php foreach (array_slice($unit['amenities'], 0, 3) as $a): ?>
                                    <span><?= $amenityMaster[$a]['icon'] ?? '' ?> <?= $a ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tour-card-footer">
                                    <div class="tour-card-price">From RM<strong><?= $unit['price'] ?></strong>/night</div>
                                    <div class="tour-card-rating">&#11088; <?= $unit['rating'] ?> <span>(<?= $unit['reviews'] ?>)</span></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- No results message -->
                    <div id="noResults" style="display:none; text-align:center; padding:3rem 1rem;">
                        <div style="font-size:3rem; margin-bottom:1rem;">&#128533;</div>
                        <h3 style="margin-bottom:0.5rem;">No homestays found</h3>
                        <p style="color:var(--gray-600);">Try adjusting your filters to see more results.</p>
                    </div>
                </div>
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
