<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Collection - Furniture Pampanga</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="assets/logo.png" alt="Furniture Pampanga Logo" class="logo-icon" />
                <span class="logo-text">Furniture Pampanga and Woodworks</span>
            </div>
            <nav class="nav">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="catalog.php" class="active">Catalog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="team.php">Team</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>
            </nav>
            <button class="hamburger" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <main class="catalog-page" id="catalogMain">
        <div class="container">
            <h1 class="page-title">Our Collection</h1>

            <div class="catalog-layout" id="catalogLayout">

            <!-- Left Filter Sidebar -->
            <aside class="catalog-filter-sidebar" id="catalogFilterBar">
                <div class="filter-section">
                    <span class="filter-section-title">Category</span>
                    <div class="filter-list" id="filterChips">
                        <button class="filter-item active" data-filter-cat="all">All</button>
                        <button class="filter-item" data-filter-cat="chair">Chair</button>
                        <button class="filter-item" data-filter-cat="bed">Bed</button>
                        <button class="filter-item" data-filter-cat="center-table">Center Table</button>
                        <button class="filter-item" data-filter-cat="ottoman">Ottoman</button>
                        <button class="filter-item" data-filter-cat="table">Table</button>
                        <button class="filter-item" data-filter-cat="accent-chair">Accent Chair</button>
                        <button class="filter-item" data-filter-cat="console-table">Console Table</button>
                        <button class="filter-item" data-filter-cat="bench">Bench</button>
                        <button class="filter-item" data-filter-cat="sofa">Sofa</button>
                        <button class="filter-item" data-filter-cat="night-table">Night Table</button>
                        <button class="filter-item" data-filter-cat="barstool">Barstool</button>
                        <button class="filter-item" data-filter-cat="outdoor">Outdoor</button>
                    </div>
                </div>
                <div class="filter-section">
                    <span class="filter-section-title">Fabric</span>
                    <div class="filter-list">
                        <button class="filter-item active" data-filter-fabric="all">All</button>
                        <button class="filter-item" data-filter-fabric="with">With Fabric</button>
                        <button class="filter-item" data-filter-fabric="without">Without Fabric</button>
                    </div>
                </div>
            </aside>

            <div class="catalog-main-content">
            <!-- Full category grid (shown when no subcategory in URL) -->
            <div class="product-categories-grid" id="categoriesGrid">
                <!-- Column 1 -->
                <div class="product-category" data-cat="chair" data-fabric="with">
                    <div class="category-header">
<div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 3h12v10H6z"/><path d="M4 13h16v3H4z"/><path d="M7 16v5M17 16v5"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=chair" class="category-title-link"><h3 class="category-title">Chair</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=chair&sub=high-back" class="product-item"><span class="product-number">01</span><span class="product-name">Dining Chair (High-Back)</span></a>
                        <a href="catalog.php?category=chair&sub=low-back" class="product-item"><span class="product-number">02</span><span class="product-name">Dining Chair (Low-Back)</span></a>
                        <a href="catalog.php?category=chair&sub=upholstered" class="product-item"><span class="product-number">03</span><span class="product-name">Dining Chair (Upholstered)</span></a>
                        <a href="catalog.php?category=chair&sub=padded" class="product-item"><span class="product-number">04</span><span class="product-name">Padded Dining Chair</span></a>
                        <a href="catalog.php?category=chair&sub=solhiya" class="product-item"><span class="product-number">05</span><span class="product-name">Solhiya Dining Chair</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="bed" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 7h18v5H3z"/><path d="M3 12h18v4H3z"/><path d="M5 16v4M19 16v4"/><path d="M7 7V5a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=bed" class="category-title-link"><h3 class="category-title">Bed</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=bed&sub=queen" class="product-item"><span class="product-number">01</span><span class="product-name">Queen Sized Bed</span></a>
                        <a href="catalog.php?category=bed&sub=king" class="product-item"><span class="product-number">02</span><span class="product-name">King Sized Bed</span></a>
                        <a href="catalog.php?category=bed&sub=single-loft" class="product-item"><span class="product-number">03</span><span class="product-name">Single Loft Bed</span></a>
                        <a href="catalog.php?category=bed&sub=double-deck" class="product-item"><span class="product-number">04</span><span class="product-name">Double Deck Bed</span></a>
                        <a href="catalog.php?category=bed&sub=platform" class="product-item"><span class="product-number">05</span><span class="product-name">Platform Bed</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="center-table" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 8h18v4H3z"/><path d="M6 12v8M18 12v8"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=center-table" class="category-title-link"><h3 class="category-title">Center Table</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=center-table&sub=square-coffee" class="product-item"><span class="product-number">01</span><span class="product-name">Square Coffee Table</span></a>
                        <a href="catalog.php?category=center-table&sub=nesting" class="product-item"><span class="product-number">02</span><span class="product-name">Nesting Table Set</span></a>
                        <a href="catalog.php?category=center-table&sub=marble-top" class="product-item"><span class="product-number">03</span><span class="product-name">Marble Top Table</span></a>
                        <a href="catalog.php?category=center-table&sub=oval" class="product-item"><span class="product-number">04</span><span class="product-name">Oval Center Table</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="ottoman" data-fabric="with">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="9" width="16" height="10" rx="5"/><path d="M8 19v2M16 19v2"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=ottoman" class="category-title-link"><h3 class="category-title">Ottoman</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=ottoman&sub=round-storage" class="product-item"><span class="product-number">01</span><span class="product-name">Round Storage Ottoman</span></a>
                        <a href="catalog.php?category=ottoman&sub=square-fabric" class="product-item"><span class="product-number">02</span><span class="product-name">Square Fabric Ottoman</span></a>
                        <a href="catalog.php?category=ottoman&sub=leather-padded" class="product-item"><span class="product-number">03</span><span class="product-name">Leather Padded Ottoman</span></a>
                        <a href="catalog.php?category=ottoman&sub=bench" class="product-item"><span class="product-number">04</span><span class="product-name">Bench Ottoman</span></a>
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="product-category" data-cat="table" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 7h20v5H2z"/><path d="M5 12v7M19 12v7"/><path d="M9 12v7M15 12v7"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=table" class="category-title-link"><h3 class="category-title">Table</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=table&sub=acacia" class="product-item"><span class="product-number">01</span><span class="product-name">Acacia Dining Table</span></a>
                        <a href="catalog.php?category=table&sub=solid-wood" class="product-item"><span class="product-number">02</span><span class="product-name">Solid Wood Dining Table</span></a>
                        <a href="catalog.php?category=table&sub=marble" class="product-item"><span class="product-number">03</span><span class="product-name">Marble Dining Table</span></a>
                        <a href="catalog.php?category=table&sub=glass" class="product-item"><span class="product-number">04</span><span class="product-name">Glass Dining Table</span></a>
                        <a href="catalog.php?category=table&sub=executive" class="product-item"><span class="product-number">05</span><span class="product-name">Executive Desk</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="accent-chair" data-fabric="with">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 4h12v8H6z"/><path d="M4 12h16v4H4z"/><path d="M7 16v4M17 16v4"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=accent-chair" class="category-title-link"><h3 class="category-title">Accent Chair</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=accent-chair&sub=lounge" class="product-item"><span class="product-number">01</span><span class="product-name">Lounge Accent Chair</span></a>
                        <a href="catalog.php?category=accent-chair&sub=wingback" class="product-item"><span class="product-number">02</span><span class="product-name">Wingback Chair</span></a>
                        <a href="catalog.php?category=accent-chair&sub=barrel" class="product-item"><span class="product-number">03</span><span class="product-name">Barrel Chair</span></a>
                        <a href="catalog.php?category=accent-chair&sub=slipper" class="product-item"><span class="product-number">04</span><span class="product-name">Slipper Chair</span></a>
                        <a href="catalog.php?category=accent-chair&sub=solhiya" class="product-item"><span class="product-number">05</span><span class="product-name">Solhiya Accent</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="console-table" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 7h20v4H2z"/><path d="M5 11v8M19 11v8"/><path d="M5 15h14"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=console-table" class="category-title-link"><h3 class="category-title">Console Table</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=console-table&sub=drawers" class="product-item"><span class="product-number">01</span><span class="product-name">Console with Drawers</span></a>
                        <a href="catalog.php?category=console-table&sub=minimalist" class="product-item"><span class="product-number">02</span><span class="product-name">Minimalist Entryway Table</span></a>
                        <a href="catalog.php?category=console-table&sub=industrial" class="product-item"><span class="product-number">03</span><span class="product-name">Industrial Console</span></a>
                        <a href="catalog.php?category=console-table&sub=glass" class="product-item"><span class="product-number">04</span><span class="product-name">Glass Console</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="bench" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 10h18v4H3z"/><path d="M5 14v5M19 14v5"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=bench" class="category-title-link"><h3 class="category-title">Bench</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=bench&sub=padded-entry" class="product-item"><span class="product-number">01</span><span class="product-name">Padded Entryway Bench</span></a>
                        <a href="catalog.php?category=bench&sub=solid-wood" class="product-item"><span class="product-number">02</span><span class="product-name">Solid Wood Bench</span></a>
                        <a href="catalog.php?category=bench&sub=outdoor-garden" class="product-item"><span class="product-number">03</span><span class="product-name">Outdoor Garden Bench</span></a>
                        <a href="catalog.php?category=bench&sub=bedroom-end" class="product-item"><span class="product-number">04</span><span class="product-name">Bedroom End Bench</span></a>
                    </div>
                </div>
                <!-- Column 3 -->
                <div class="product-category" data-cat="sofa" data-fabric="with">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 10c0-3.3 2.7-6 6-6h4c3.3 0 6 2.7 6 6v2H4v-2z"/><path d="M2 12h20v5H2z"/><path d="M5 17v3M19 17v3"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=sofa" class="category-title-link"><h3 class="category-title">Sofa</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=sofa&sub=fully-upholstered" class="product-item"><span class="product-number">01</span><span class="product-name">Fully Upholstered Sofa</span></a>
                        <a href="catalog.php?category=sofa&sub=wood-frame" class="product-item"><span class="product-number">02</span><span class="product-name">Wood-Frame Sofa</span></a>
                        <a href="catalog.php?category=sofa&sub=l-shaped" class="product-item"><span class="product-number">03</span><span class="product-name">L-Shaped Sectional</span></a>
                        <a href="catalog.php?category=sofa&sub=loveseat" class="product-item"><span class="product-number">04</span><span class="product-name">Loveseat</span></a>
                        <a href="catalog.php?category=sofa&sub=recliner" class="product-item"><span class="product-number">05</span><span class="product-name">Recliner Sofa</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="night-table" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <rect x="7" y="3" width="10" height="14" rx="1"/><path d="M7 10h10"/><path d="M9 17v4M15 17v4"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=night-table" class="category-title-link"><h3 class="category-title">Night Table</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=night-table&sub=accent" class="product-item"><span class="product-number">01</span><span class="product-name">Accent Night Table</span></a>
                        <a href="catalog.php?category=night-table&sub=square-side" class="product-item"><span class="product-number">02</span><span class="product-name">Square Side Table</span></a>
                        <a href="catalog.php?category=night-table&sub=round-end" class="product-item"><span class="product-number">03</span><span class="product-name">Round End Table</span></a>
                        <a href="catalog.php?category=night-table&sub=floating" class="product-item"><span class="product-number">04</span><span class="product-name">Floating Nightstand</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="barstool" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 4h8v8H8z"/><path d="M8 12v8M16 12v8"/><path d="M6 16h12"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=barstool" class="category-title-link"><h3 class="category-title">Barstool</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=barstool&sub=wood-upholstered" class="product-item"><span class="product-number">01</span><span class="product-name">Wood Upholstered Stool</span></a>
                        <a href="catalog.php?category=barstool&sub=industrial-metal" class="product-item"><span class="product-number">02</span><span class="product-name">Industrial Metal Stool</span></a>
                        <a href="catalog.php?category=barstool&sub=adjustable" class="product-item"><span class="product-number">03</span><span class="product-name">Adjustable Barstool</span></a>
                        <a href="catalog.php?category=barstool&sub=backless" class="product-item"><span class="product-number">04</span><span class="product-name">Backless Stool</span></a>
                    </div>
                </div>
                <div class="product-category" data-cat="outdoor" data-fabric="without">
                    <div class="category-header">
                        <div class="category-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 6h10v7H7z"/><path d="M5 13h14v4H5z"/><path d="M8 17v3M16 17v3"/><circle cx="18" cy="5" r="2"/><path d="M18 3v-1M18 8v1M15 5h-1M22 5h-1M16 3l-.7-.7M20.7 7.7l-.7-.7M20 3l.7-.7M15.3 7.7l.7-.7"/>
                            </svg>
                        </div>
                        <a href="catalog.php?category=outdoor" class="category-title-link"><h3 class="category-title">Outdoor</h3></a>
                    </div>
                    <div class="category-products">
                        <a href="catalog.php?category=outdoor&sub=patio-dining" class="product-item"><span class="product-number">01</span><span class="product-name">Patio Dining Set</span></a>
                        <a href="catalog.php?category=outdoor&sub=wicker-lounge" class="product-item"><span class="product-number">02</span><span class="product-name">Wicker Lounge Chair</span></a>
                        <a href="catalog.php?category=outdoor&sub=garden-side" class="product-item"><span class="product-number">03</span><span class="product-name">Garden Side Table</span></a>
                        <a href="catalog.php?category=outdoor&sub=poolside" class="product-item"><span class="product-number">04</span><span class="product-name">Poolside Lounger</span></a>
                    </div>
                </div>
            </div>
            </div><!-- end catalog-main-content -->
            </div><!-- end catalog-layout -->

            <!-- Single category listing (e.g. Dining Chair High-Back) - hidden by default, shown via JS when URL has ?category=chair&sub=high-back -->
            <div class="category-listing-page" id="categoryListing" style="display: none;">
                <nav class="catalog-breadcrumb">
                    <a href="catalog.php">Shop All Collection &gt;</a>
                </nav>
                <h2 class="category-listing-title" id="categoryListingTitle">Dining Chair (High-Back Category)</h2>
                <div class="category-products-grid" id="categoryProductsGrid">
                    <a href="product.php?category=chair&name=Dining+Chair+(High-Back)&id=chair-01&sub=high-back&variant=valen" class="category-product-card" data-listing-id="valen">
                        <div class="category-product-image"><img src="" alt="Valen" /></div>
                        <span class="category-product-number">01</span>
                        <h3 class="category-product-name">Valen</h3>
                        
                    </a>
                    <a href="product.php?category=chair&name=Dining+Chair+(High-Back)&id=chair-01&sub=high-back&variant=aurex" class="category-product-card" data-listing-id="aurex">
                        <div class="category-product-image"><img src="" alt="Aurex" /></div>
                        <span class="category-product-number">02</span>
                        <h3 class="category-product-name">Aurex</h3>
                        
                    </a>
                    <a href="product.php?category=chair&name=Dining+Chair+(High-Back)&id=chair-01&sub=high-back&variant=serin" class="category-product-card" data-listing-id="serin">
                        <div class="category-product-image"><img src="" alt="Serin" /></div>
                        <span class="category-product-number">03</span>
                        <h3 class="category-product-name">Serin</h3>
                        
                    </a>
                    <a href="product.php?category=chair&name=Dining+Chair+(High-Back)&id=chair-01&sub=high-back&variant=calver" class="category-product-card" data-listing-id="calver">
                        <div class="category-product-image"><img src="" alt="Calver" /></div>
                        <span class="category-product-number">04</span>
                        <h3 class="category-product-name">Calver</h3>
                        
                    </a>
                    <a href="product.php?category=chair&name=Dining+Chair+(High-Back)&id=chair-01&sub=high-back&variant=elowen" class="category-product-card" data-listing-id="elowen">
                        <div class="category-product-image"><img src="" alt="Elowen" /></div>
                        <span class="category-product-number">05</span>
                        <h3 class="category-product-name">Elowen</h3>
                        
                    </a>
                    <a href="product.php?category=chair&name=Dining+Chair+(High-Back)&id=chair-01&sub=high-back&variant=ravelle" class="category-product-card" data-listing-id="ravelle">
                        <div class="category-product-image"><img src="" alt="Ravelle" /></div>
                        <span class="category-product-number">06</span>
                        <h3 class="category-product-name">Ravelle</h3>
                        
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <ul>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
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
            var FALLBACK_LISTING_IMAGE = 'assets/images/products/product-detail-layout.png';
            var params = new URLSearchParams(location.search);
            var category = params.get('category');
            var sub = params.get('sub');
            var grid = document.getElementById('categoriesGrid');
            var listing = document.getElementById('categoryListing');
            var titleEl = document.getElementById('categoryListingTitle');
            var productsGridEl = document.getElementById('categoryProductsGrid');
            var layout = document.getElementById('catalogLayout');
            var sidebar = document.getElementById('catalogFilterBar');

            var CATEGORY_PRODUCTS = {
                chair: [
                    { name: 'Dining Chair (High-Back)', listingKey: 'chair_highback', subCategory: 'high-back' },
                    { name: 'Dining Chair (Low-Back)', listingKey: 'chair_lowback', subCategory: 'low-back' },
                    { name: 'Dining Chair (Upholstered)', listingKey: 'chair_upholstered', subCategory: 'upholstered' },
                    { name: 'Padded Dining Chair', listingKey: 'chair_padded', subCategory: 'padded' },
                    { name: 'Solhiya Dining Chair', listingKey: 'chair_solhiya', subCategory: 'solhiya' }
                ],
                bed: [
                    { name: 'Queen Sized Bed', listingKey: 'bed_queen', subCategory: 'queen' },
                    { name: 'King Sized Bed', listingKey: 'bed_king', subCategory: 'king' },
                    { name: 'Single Loft Bed', listingKey: 'bed_singleloft', subCategory: 'single-loft' },
                    { name: 'Double Deck Bed', listingKey: 'bed_doubledeck', subCategory: 'double-deck' },
                    { name: 'Platform Bed', listingKey: 'bed_platform', subCategory: 'platform' }
                ],
                'center-table': [
                    { name: 'Square Coffee Table', listingKey: 'center_squarecoffee', subCategory: 'square-coffee' },
                    { name: 'Nesting Table Set', listingKey: 'center_nesting', subCategory: 'nesting' },
                    { name: 'Marble Top Table', listingKey: 'center_marbletop', subCategory: 'marble-top' },
                    { name: 'Oval Center Table', listingKey: 'center_oval', subCategory: 'oval' }
                ],
                ottoman: [
                    { name: 'Round Storage Ottoman', listingKey: 'ottoman_roundstorage', subCategory: 'round-storage' },
                    { name: 'Square Fabric Ottoman', listingKey: 'ottoman_squarefabric', subCategory: 'square-fabric' },
                    { name: 'Leather Padded Ottoman', listingKey: 'ottoman_leatherpadded', subCategory: 'leather-padded' },
                    { name: 'Bench Ottoman', listingKey: 'ottoman_bench', subCategory: 'bench' }
                ],
                table: [
                    { name: 'Acacia Dining Table', listingKey: 'table_acacia', subCategory: 'acacia' },
                    { name: 'Solid Wood Dining Table', listingKey: 'table_solidwood', subCategory: 'solid-wood' },
                    { name: 'Marble Dining Table', listingKey: 'table_marble', subCategory: 'marble' },
                    { name: 'Glass Dining Table', listingKey: 'table_glass', subCategory: 'glass' },
                    { name: 'Executive Desk', listingKey: 'table_executive', subCategory: 'executive' }
                ],
                'accent-chair': [
                    { name: 'Lounge Accent Chair', listingKey: 'accent_lounge', subCategory: 'lounge' },
                    { name: 'Wingback Chair', listingKey: 'accent_wingback', subCategory: 'wingback' },
                    { name: 'Barrel Chair', listingKey: 'accent_barrel', subCategory: 'barrel' },
                    { name: 'Slipper Chair', listingKey: 'accent_slipper', subCategory: 'slipper' },
                    { name: 'Solhiya Accent', listingKey: 'accent_solhiya', subCategory: 'solhiya' }
                ],
                'console-table': [
                    { name: 'Console with Drawers', listingKey: 'console_drawers', subCategory: 'drawers' },
                    { name: 'Minimalist Entryway Table', listingKey: 'console_minimalist', subCategory: 'minimalist' },
                    { name: 'Industrial Console', listingKey: 'console_industrial', subCategory: 'industrial' },
                    { name: 'Glass Console', listingKey: 'console_glass', subCategory: 'glass' }
                ],
                bench: [
                    { name: 'Padded Entryway Bench', listingKey: 'bench_paddedentry', subCategory: 'padded-entry' },
                    { name: 'Solid Wood Bench', listingKey: 'bench_solidwood', subCategory: 'solid-wood' },
                    { name: 'Outdoor Garden Bench', listingKey: 'bench_outdoorgarden', subCategory: 'outdoor-garden' },
                    { name: 'Bedroom End Bench', listingKey: 'bench_bedroomend', subCategory: 'bedroom-end' }
                ],
                sofa: [
                    { name: 'Fully Upholstered Sofa', listingKey: 'sofa_fullyupholstered', subCategory: 'fully-upholstered' },
                    { name: 'Wood-Frame Sofa', listingKey: 'sofa_woodframe', subCategory: 'wood-frame' },
                    { name: 'L-Shaped Sectional', listingKey: 'sofa_lshaped', subCategory: 'l-shaped' },
                    { name: 'Loveseat', listingKey: 'sofa_loveseat', subCategory: 'loveseat' },
                    { name: 'Recliner Sofa', listingKey: 'sofa_recliner', subCategory: 'recliner' }
                ],
                'night-table': [
                    { name: 'Accent Night Table', listingKey: 'night_accent', subCategory: 'accent' },
                    { name: 'Square Side Table', listingKey: 'night_squareside', subCategory: 'square-side' },
                    { name: 'Round End Table', listingKey: 'night_roundend', subCategory: 'round-end' },
                    { name: 'Floating Nightstand', listingKey: 'night_floating', subCategory: 'floating' }
                ],
                barstool: [
                    { name: 'Wood Upholstered Stool', listingKey: 'barstool_woodupholstered', subCategory: 'wood-upholstered' },
                    { name: 'Industrial Metal Stool', listingKey: 'barstool_industrialmetal', subCategory: 'industrial-metal' },
                    { name: 'Adjustable Barstool', listingKey: 'barstool_adjustable', subCategory: 'adjustable' },
                    { name: 'Backless Stool', listingKey: 'barstool_backless', subCategory: 'backless' }
                ],
                outdoor: [
                    { name: 'Patio Dining Set', listingKey: 'outdoor_patiodining', subCategory: 'patio-dining' },
                    { name: 'Wicker Lounge Chair', listingKey: 'outdoor_wickerlounge', subCategory: 'wicker-lounge' },
                    { name: 'Garden Side Table', listingKey: 'outdoor_gardenside', subCategory: 'garden-side' },
                    { name: 'Poolside Lounger', listingKey: 'outdoor_poolside', subCategory: 'poolside' }
                ]
            };

            var SUB_TITLES = {
                chair: { 'high-back':'Dining Chair (High-Back)','low-back':'Dining Chair (Low-Back)','upholstered':'Dining Chair (Upholstered)','padded':'Padded Dining Chair','solhiya':'Solhiya Dining Chair' },
                bed: { 'queen':'Queen Sized Bed','king':'King Sized Bed','single-loft':'Single Loft Bed','double-deck':'Double Deck Bed','platform':'Platform Bed' },
                'center-table': { 'square-coffee':'Square Coffee Table','nesting':'Nesting Table Set','marble-top':'Marble Top Table','oval':'Oval Center Table' },
                ottoman: { 'round-storage':'Round Storage Ottoman','square-fabric':'Square Fabric Ottoman','leather-padded':'Leather Padded Ottoman','bench':'Bench Ottoman' },
                table: { 'acacia':'Acacia Dining Table','solid-wood':'Solid Wood Dining Table','marble':'Marble Dining Table','glass':'Glass Dining Table','executive':'Executive Desk' },
                'accent-chair': { 'lounge':'Lounge Accent Chair','wingback':'Wingback Chair','barrel':'Barrel Chair','slipper':'Slipper Chair','solhiya':'Solhiya Accent' },
                'console-table': { 'drawers':'Console with Drawers','minimalist':'Minimalist Entryway Table','industrial':'Industrial Console','glass':'Glass Console' },
                bench: { 'padded-entry':'Padded Entryway Bench','solid-wood':'Solid Wood Bench','outdoor-garden':'Outdoor Garden Bench','bedroom-end':'Bedroom End Bench' },
                sofa: { 'fully-upholstered':'Fully Upholstered Sofa','wood-frame':'Wood-Frame Sofa','l-shaped':'L-Shaped Sectional','loveseat':'Loveseat','recliner':'Recliner Sofa' },
                'night-table': { 'accent':'Accent Night Table','square-side':'Square Side Table','round-end':'Round End Table','floating':'Floating Nightstand' },
                barstool: { 'wood-upholstered':'Wood Upholstered Stool','industrial-metal':'Industrial Metal Stool','adjustable':'Adjustable Barstool','backless':'Backless Stool' },
                outdoor: { 'patio-dining':'Patio Dining Set','wicker-lounge':'Wicker Lounge Chair','garden-side':'Garden Side Table','poolside':'Poolside Lounger' }
            };

            var SUB_KEY_MAP = {
                chair: { 'high-back':'chair_highback','low-back':'chair_lowback','upholstered':'chair_upholstered','padded':'chair_padded','solhiya':'chair_solhiya' },
                bed: { 'queen':'bed_queen','king':'bed_king','single-loft':'bed_singleloft','double-deck':'bed_doubledeck','platform':'bed_platform' },
                'center-table': { 'square-coffee':'center_squarecoffee','nesting':'center_nesting','marble-top':'center_marbletop','oval':'center_oval' },
                ottoman: { 'round-storage':'ottoman_roundstorage','square-fabric':'ottoman_squarefabric','leather-padded':'ottoman_leatherpadded','bench':'ottoman_bench' },
                table: { 'acacia':'table_acacia','solid-wood':'table_solidwood','marble':'table_marble','glass':'table_glass','executive':'table_executive' },
                'accent-chair': { 'lounge':'accent_lounge','wingback':'accent_wingback','barrel':'accent_barrel','slipper':'accent_slipper','solhiya':'accent_solhiya' },
                'console-table': { 'drawers':'console_drawers','minimalist':'console_minimalist','industrial':'console_industrial','glass':'console_glass' },
                bench: { 'padded-entry':'bench_paddedentry','solid-wood':'bench_solidwood','outdoor-garden':'bench_outdoorgarden','bedroom-end':'bench_bedroomend' },
                sofa: { 'fully-upholstered':'sofa_fullyupholstered','wood-frame':'sofa_woodframe','l-shaped':'sofa_lshaped','loveseat':'sofa_loveseat','recliner':'sofa_recliner' },
                'night-table': { 'accent':'night_accent','square-side':'night_squareside','round-end':'night_roundend','floating':'night_floating' },
                barstool: { 'wood-upholstered':'barstool_woodupholstered','industrial-metal':'barstool_industrialmetal','adjustable':'barstool_adjustable','backless':'barstool_backless' },
                outdoor: { 'patio-dining':'outdoor_patiodining','wicker-lounge':'outdoor_wickerlounge','garden-side':'outdoor_gardenside','poolside':'outdoor_poolside' }
            };

            function showListing() {
                if (grid) grid.style.display = 'none';
                if (listing) listing.style.display = 'block';
                if (layout) layout.style.display = 'block';
                if (sidebar) sidebar.style.display = 'none';
            }

            if (category && sub && SUB_KEY_MAP[category] && SUB_KEY_MAP[category][sub]) {
                // Subcategory listing � load from API
                var subKey = SUB_KEY_MAP[category][sub];
                var subTitle = (SUB_TITLES[category] && SUB_TITLES[category][sub]) || sub;
                showListing();
                if (titleEl) titleEl.textContent = subTitle;

                var VARIANT_IDS = category === 'chair'
                    ? ['valen','aurex','serin','calver','elowen','ravelle']
                    : ['01','02','03','04','05','06'];

                Promise.all([
                    fetch('api.php?path=catalog-listings/' + subKey).then(r => r.json()).catch(() => ({})),
                    fetch('api.php?path=variant-details/' + subKey).then(r => r.json()).catch(() => ({}))
                ]).then(function(results) {
                    var listingData = results[0];
                    var variantData = results[1];

                    if (category === 'chair') {
                        // Chair: update existing static cards
                        document.querySelectorAll('.category-product-card[data-listing-id]').forEach(function(card) {
                            var id = card.getAttribute('data-listing-id');
                            var entry = listingData[id] || {};
                            var url = (entry.url || '').trim();
                            var name = (entry.name || '').trim();
                            var img = card.querySelector('.category-product-image img');
                            if (img) img.src = url || FALLBACK_LISTING_IMAGE;
                            if (name) { var nameEl = card.querySelector('.category-product-name'); if (nameEl) nameEl.textContent = name; }
                            card.href = 'product.php?category=chair&name=' + encodeURIComponent(subTitle) + '&sub=' + encodeURIComponent(sub) + '&variant=' + encodeURIComponent(id);
                        });
                    } else {
                        // Non-chair: build grid dynamically
                        productsGridEl.innerHTML = '';
                        VARIANT_IDS.forEach(function(vid, index) {
                            var entry = listingData[vid] || {};
                            var vInfo = variantData[vid] || {};
                            var name = (entry.name || vInfo.name || subTitle + ' ' + vid).trim();
                            var url = (entry.url || ((vInfo.images || [])[0]) || '').trim();
                            var card = document.createElement('a');
                            card.className = 'category-product-card';
                            card.href = 'product.php?category=' + encodeURIComponent(category) + '&name=' + encodeURIComponent(subTitle) + '&sub=' + encodeURIComponent(sub) + '&variant=' + encodeURIComponent(vid);
                            card.innerHTML = '<div class="category-product-image"><img src="' + (url || FALLBACK_LISTING_IMAGE) + '" alt="' + name.replace(/"/g,'&quot;') + '"></div>' +
                                '<span class="category-product-number">' + String(index+1).padStart(2,'0') + '</span>' +
                                '<h3 class="category-product-name">' + name.replace(/</g,'&lt;') + '</h3>';
                            productsGridEl.appendChild(card);
                        });
                    }
                });

            } else if (category && CATEGORY_PRODUCTS[category]) {
                // Category page (no sub) � show subcategory list with first listing image
                var products = CATEGORY_PRODUCTS[category];
                var catLabels = { 'bed':'Bed','center-table':'Center Table','ottoman':'Ottoman','table':'Table','accent-chair':'Accent Chair','console-table':'Console Table','bench':'Bench','sofa':'Sofa','night-table':'Night Table','barstool':'Barstool','outdoor':'Outdoor','chair':'Chair' };
                showListing();
                if (titleEl) titleEl.textContent = catLabels[category] || category;
                productsGridEl.innerHTML = '';
                products.forEach(function(item, index) {
                    var card = document.createElement('a');
                    card.className = 'category-product-card';
                    card.href = 'catalog.php?category=' + encodeURIComponent(category) + '&sub=' + encodeURIComponent(item.subCategory);
                    card.innerHTML = '<div class="category-product-image"><img src="' + FALLBACK_LISTING_IMAGE + '" alt="' + item.name.replace(/"/g,'&quot;') + '"></div>' +
                        '<span class="category-product-number">' + String(index+1).padStart(2,'0') + '</span>' +
                        '<h3 class="category-product-name">' + item.name.replace(/</g,'&lt;') + '</h3>';
                    productsGridEl.appendChild(card);
                    // Load first image from catalog-listings API
                    fetch('api.php?path=catalog-listings/' + item.listingKey).then(r => r.json()).then(function(data) {
                        var firstEntry = data['01'] || data['valen'] || data[Object.keys(data)[0]];
                        var url = firstEntry && firstEntry.url ? firstEntry.url.trim() : '';
                        var img = card.querySelector('.category-product-image img');
                        if (img) img.src = url || FALLBACK_LISTING_IMAGE;
                    }).catch(function(){});
                });
            } else if (category) {
                // Dynamic category from DB
                fetch('api.php?path=categories').then(function(r){ return r.json(); }).then(function(cats) {
                    var cat = cats.find(function(c) {
                        return c.name.toLowerCase().replace(/\s+/g,'-') === category;
                    });
                    if (!cat) return;
                    if (sub) {
                        // Sub listing — show items for this sub
                        showListing();
                        if (titleEl) titleEl.textContent = sub.replace(/-/g,' ').replace(/\b\w/g,function(l){return l.toUpperCase();});
                        productsGridEl.innerHTML = '';
                        var subKey = (category + '_' + sub).replace(/-/g,'');
                        Promise.all([
                            fetch('api.php?path=catalog-listings/' + subKey).then(r => r.json()).catch(function(){ return {}; }),
                            fetch('api.php?path=variant-details/' + subKey).then(r => r.json()).catch(function(){ return {}; })
                        ]).then(function(results) {
                            var listingData = results[0], variantData = results[1];
                            var ids = Object.keys(listingData).length ? Object.keys(listingData) : ['01','02','03','04','05','06'];
                            ids.forEach(function(vid, index) {
                                var entry = listingData[vid] || {};
                                var vInfo = variantData[vid] || {};
                                var name = (entry.name || vInfo.name || vid).trim();
                                var url = (entry.url || ((vInfo.images||[])[0]) || '').trim();
                                var card = document.createElement('a');
                                card.className = 'category-product-card';
                                card.href = 'product.php?category=' + encodeURIComponent(category) + '&name=' + encodeURIComponent(name) + '&sub=' + encodeURIComponent(sub) + '&variant=' + encodeURIComponent(vid);
                                card.innerHTML = '<div class="category-product-image"><img src="' + (url || FALLBACK_LISTING_IMAGE) + '" alt="' + name.replace(/"/g,'&quot;') + '"></div>' +
                                    '<span class="category-product-number">' + String(index+1).padStart(2,'0') + '</span>' +
                                    '<h3 class="category-product-name">' + name.replace(/</g,'&lt;') + '</h3>';
                                productsGridEl.appendChild(card);
                            });
                        });
                    } else {
                        // Category page — show subs list
                        showListing();
                        if (titleEl) titleEl.textContent = cat.name;
                        productsGridEl.innerHTML = '';
                        (cat.subs || []).forEach(function(subName, index) {
                            var subSlug = subName.toLowerCase().replace(/\s+/g,'-');
                            var card = document.createElement('a');
                            card.className = 'category-product-card';
                            card.href = 'catalog.php?category=' + encodeURIComponent(category) + '&sub=' + encodeURIComponent(subSlug);
                            card.innerHTML = '<div class="category-product-image"><img src="' + (cat.img_url || FALLBACK_LISTING_IMAGE) + '" alt="' + subName.replace(/"/g,'&quot;') + '"></div>' +
                                '<span class="category-product-number">' + String(index+1).padStart(2,'0') + '</span>' +
                                '<h3 class="category-product-name">' + subName.replace(/</g,'&lt;') + '</h3>';
                            productsGridEl.appendChild(card);
                        });
                    }
                }).catch(function(){});
            }

            // Load dynamic categories from DB and append to grid
            fetch('api.php?path=categories').then(function(r){ return r.json(); }).then(function(cats){
                if (!Array.isArray(cats) || !cats.length) return;
                var filterList = document.getElementById('filterChips');
                cats.forEach(function(cat) {
                    var slug = cat.name.toLowerCase().replace(/\s+/g, '-');
                    // Add to filter sidebar
                    if (filterList) {
                        var btn = document.createElement('button');
                        btn.className = 'filter-item';
                        btn.setAttribute('data-filter-cat', slug);
                        btn.textContent = cat.name;
                        filterList.appendChild(btn);
                        btn.addEventListener('click', function() {
                            document.querySelectorAll('[data-filter-cat]').forEach(function(b){ b.classList.remove('active'); });
                            btn.classList.add('active');
                            activeCat = slug;
                            applyFilters();
                        });
                    }
                    // Add to categories grid
                    if (grid) {
                        var div = document.createElement('div');
                        div.className = 'product-category';
                        div.setAttribute('data-cat', slug);
                        div.setAttribute('data-fabric', 'without');
                        var subsHtml = (cat.subs || []).map(function(sub, i) {
                            var subSlug = sub.toLowerCase().replace(/\s+/g, '-');
                            return '<a href="catalog.php?category=' + encodeURIComponent(slug) + '&sub=' + encodeURIComponent(subSlug) + '" class="product-item">' +
                                '<span class="product-number">' + String(i+1).padStart(2,'0') + '</span>' +
                                '<span class="product-name">' + sub.replace(/</g,'&lt;') + '</span></a>';
                        }).join('');
                        div.innerHTML =
                            '<div class="category-header">' +
                                (cat.img_url ? '<div class="category-icon"><img src="' + cat.img_url + '" style="width:32px;height:32px;object-fit:cover;border-radius:4px;"></div>' : '<div class="category-icon"></div>') +
                                '<a href="catalog.php?category=' + encodeURIComponent(slug) + '" class="category-title-link"><h3 class="category-title">' + cat.name.replace(/</g,'&lt;') + '</h3></a>' +
                            '</div>' +
                            '<div class="category-products">' + subsHtml + '</div>';
                        grid.appendChild(div);
                    }
                });
            }).catch(function(){});

            // Filter bar
            var activeCat = 'all', activeFabric = 'all';
            function applyFilters() {
                document.querySelectorAll('#categoriesGrid .product-category').forEach(function(card) {
                    var catMatch = activeCat === 'all' || card.dataset.cat === activeCat;
                    var fabricMatch = activeFabric === 'all' || card.dataset.fabric === activeFabric;
                    card.style.display = (catMatch && fabricMatch) ? '' : 'none';
                });
            }
            document.querySelectorAll('[data-filter-cat]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('[data-filter-cat]').forEach(function(b) { b.classList.remove('active'); });
                    btn.classList.add('active');
                    activeCat = btn.dataset.filterCat;
                    applyFilters();
                });
            });
            document.querySelectorAll('[data-filter-fabric]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('[data-filter-fabric]').forEach(function(b) { b.classList.remove('active'); });
                    btn.classList.add('active');
                    activeFabric = btn.dataset.filterFabric;
                    applyFilters();
                });
            });
        })();
    </script>
</body>
</html>
