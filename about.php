<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Furniture Pampanga</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="about-page">
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="assets/logo.png" alt="Furniture Pampanga Logo" class="logo-icon" />
                <span class="logo-text">Furniture Pampanga and Woodworks</span>
            </div>
            <nav class="nav">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <li><a href="about.php" class="active">About</a></li>
                    <li><a href="team.php">Team</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <button class="icon-btn" aria-label="Search">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M9 17A8 8 0 1 0 9 1a8 8 0 0 0 0 16zM19 19l-4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="icon-btn" aria-label="User">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM10 11a6 6 0 0 0-6 6v1h12v-1a6 6 0 0 0-6-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="icon-btn" aria-label="Cart">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M3 3h2l.4 2M7 13h10l-2-8H5.4M7 13L5.4 5M7 13l-1.5 1.5M17 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <button class="hamburger" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Hero -->
    <section class="about-hero">
        <div class="about-hero-bg" aria-hidden="true"></div>
        <div class="about-hero-content">
            <p class="about-hero-eyebrow">COMPANY OVERVIEW</p>
            <h1 class="about-hero-title">Furniture Pampanga & Woodworks</h1>
            <p class="about-hero-subtitle">Quality custom furniture and woodworks crafted for homes and spaces across Pampanga and beyond.</p>
        </div>
    </section>

    <!-- Overview blocks -->
    <main class="about-overview">

        <!-- What We Create -->
        <section class="about-block">
            <div class="about-block-media">
                <img src="assets/images/about/work-gallery.png" alt="Our furniture work" loading="lazy" />
            </div>
            <div class="about-block-card">
                <p class="about-block-kicker">WHAT WE CREATE</p>
                <h2 class="about-block-title">Our Work</h2>
                <p class="about-block-desc">
                    From full bedroom sets to complete living room collections — here's a look at some of the pieces and spaces we've built for our clients across Pampanga and beyond.
                </p>
                <a class="about-block-link" href="catalog.php">Explore the catalog</a>
            </div>
        </section>

        <!-- Happy Clients -->
        <section class="about-block about-block--reverse">
            <div class="about-block-media">
                <img src="assets/images/about/clients-collage.png" alt="Happy clients" loading="lazy" />
            </div>
            <div class="about-block-card">
                <p class="about-block-kicker">HAPPY CLIENTS</p>
                <h2 class="about-block-title">Families We've Served</h2>
                <p class="about-block-desc">
                    Nothing makes us prouder than seeing our clients happy with their new furniture. These are some of the families and homeowners we've had the pleasure of working with.
                </p>
                <a class="about-block-link" href="contact.php">Work with us</a>
            </div>
        </section>

        <!-- What We Can Do -->
        <section class="about-block">
            <div class="about-block-media about-block-media--services">
                <div class="about-services-list">
                    <div class="about-service-item">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12v10H6z"/><path d="M4 13h16v3H4z"/><path d="M7 16v5M17 16v5"/></svg>
                        <span>Custom Furniture</span>
                    </div>
                    <div class="about-service-item">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                        <span>Interior Furnishing</span>
                    </div>
                    <div class="about-service-item">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg>
                        <span>Home & Condo Setup</span>
                    </div>
                    <div class="about-service-item">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                        <span>Design Consultation</span>
                    </div>
                    <div class="about-service-item">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg>
                        <span>Custom Orders</span>
                    </div>
                    <div class="about-service-item">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 3v5h-7V8zM5 17v2M19 17v2"/></svg>
                        <span>Delivery & Installation</span>
                    </div>
                </div>
            </div>
            <div class="about-block-card">
                <p class="about-block-kicker">WHAT WE CAN DO</p>
                <h2 class="about-block-title">Our Services</h2>
                <p class="about-block-desc">
                    From concept to delivery — we handle custom furniture, full room furnishing, home and condo setups, design consultation, custom orders, and installation. Whatever your space needs, we've got it covered.
                </p>
                <a class="about-block-link" href="contact.php">Get in touch</a>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <ul>
                        <li><a href="about.php">Company Overview</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="https://www.facebook.com/furniturepampanga" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/furniturepampanga" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Furniture Pampanga. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
    (function() {
        function applyAboutImages() {
            fetch('api.php?path=site-images')
                .then(function(r){ return r.json(); })
                .then(function(d){
                    var about = d.about || {};
                    var map = [
                        { key: 'aboutHero',   sel: '.about-hero-bg' },
                        { key: 'aboutBlock1', sel: '.about-block:nth-of-type(1) .about-block-media img' },
                        { key: 'aboutBlock2', sel: '.about-block:nth-of-type(2) .about-block-media img' },
                        { key: 'aboutBlock3', sel: '.about-block:nth-of-type(3) .about-block-media img' }
                    ];
                    map.forEach(function(item){
                        var entry = about[item.key];
                        var url = entry && entry.url ? entry.url.trim() : '';
                        if (!url) return;
                        var el = document.querySelector(item.sel);
                        if (!el) return;
                        if (el.tagName === 'IMG') { el.src = url; }
                        else { el.style.backgroundImage = 'url("' + url + '")'; el.style.backgroundSize = 'cover'; el.style.backgroundPosition = 'center'; }
                    });
                }).catch(function(){});
        }
        applyAboutImages();
    })();
    </script>
</body>
</html>
