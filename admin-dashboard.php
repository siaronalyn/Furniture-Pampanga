<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel - Furniture Pampanga</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .admin-dashboard { max-width:1200px; margin:0 auto; padding:2rem; }
        .dashboard-header { text-align:center; margin-bottom:3rem; }
        .dashboard-header h1 { font-family:'Bodoni Moda',serif; font-size:2.5rem; color:var(--text); margin-bottom:0.5rem; }
        .dashboard-header p { color:var(--text-muted); font-size:1.1rem; }
        .dashboard-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:2rem; margin-bottom:3rem; }
        .dashboard-card { background:var(--bg-light); border:1px solid var(--border-color); border-radius:8px; padding:2rem; text-align:center; transition:transform 0.2s,box-shadow 0.2s; }
        .dashboard-card:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(0,0,0,0.1); }
        .dashboard-card-icon { font-size:3rem; margin-bottom:1rem; display:block; }
        .dashboard-card h3 { font-family:'Bodoni Moda',serif; font-size:1.5rem; color:var(--text); margin-bottom:0.5rem; }
        .dashboard-card p { color:var(--text-muted); margin-bottom:1.5rem; line-height:1.5; }
        .dashboard-card .btn-primary { background:var(--accent); color:white; border:none; padding:0.75rem 1.5rem; border-radius:4px; text-decoration:none; display:inline-block; font-weight:500; transition:background 0.2s; }
        .dashboard-card .btn-primary:hover { background:var(--accent-hover,#d4a574); }
        .quick-stats { background:var(--bg-light); border:1px solid var(--border-color); border-radius:8px; padding:2rem; margin-bottom:2rem; }
        .quick-stats h2 { font-family:'Bodoni Moda',serif; font-size:1.8rem; color:var(--text); margin-bottom:1.5rem; text-align:center; }
        .stats-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.5rem; }
        .stat-item { text-align:center; padding:1rem; background:white; border-radius:6px; border:1px solid var(--border-color); }
        .stat-number { font-size:2rem; font-weight:700; color:var(--accent); display:block; margin-bottom:0.5rem; }
        .stat-label { color:var(--text-muted); font-size:0.9rem; text-transform:uppercase; letter-spacing:0.5px; }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header-inner">
            <div class="admin-header-brand">
                <img src="assets/logo.png" alt="Logo" class="logo-icon" />
                <span>Admin Panel</span>
            </div>
            <nav class="admin-header-nav">
                <a href="admin-dashboard.php" class="admin-nav-link active">🏠 Dashboard</a>
                <a href="admin.php" class="admin-nav-link">🖼️ Manage Content</a>
                <a href="#" onclick="adminLogout(); return false;" class="admin-nav-link admin-logout">Logout</a>
            </nav>
        </div>
    </header>

    <main class="admin-dashboard">
        <div class="dashboard-header">
            <h1>Admin Control Panel</h1>
            <p>Manage your furniture website content and settings</p>
        </div>

        <div class="quick-stats">
            <h2>Quick Statistics</h2>
            <div class="stats-grid">
                <div class="stat-item"><span class="stat-number" id="statSiteImages">—</span><span class="stat-label">Site Images</span></div>
                <div class="stat-item"><span class="stat-number" id="statCatalogListings">—</span><span class="stat-label">Catalog Listings</span></div>
                <div class="stat-item"><span class="stat-number" id="statVariants">—</span><span class="stat-label">Variant Images</span></div>
                <div class="stat-item"><span class="stat-number" id="statCategories">—</span><span class="stat-label">Categories</span></div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <span class="dashboard-card-icon">🖼️</span>
                <h3>Image Management</h3>
                <p>Upload and manage product images, hero banners, and catalog listings for all furniture items.</p>
                <a href="admin.php" class="btn-primary">Manage Images</a>
            </div>
            <div class="dashboard-card">
                <span class="dashboard-card-icon">📝</span>
                <h3>Product Content</h3>
                <p>Edit product descriptions, specifications, and care instructions for each variant.</p>
                <a href="admin.php" class="btn-primary">Edit Content</a>
            </div>
            <div class="dashboard-card">
                <span class="dashboard-card-icon">🏷️</span>
                <h3>Catalog Listings</h3>
                <p>Manage catalog display images and organize products by category and subcategory.</p>
                <a href="admin.php" class="btn-primary">Manage Catalog</a>
            </div>
            <div class="dashboard-card">
                <span class="dashboard-card-icon">🎨</span>
                <h3>Variant Details</h3>
                <p>Set up individual product variants with custom images and names.</p>
                <a href="admin.php" class="btn-primary">Configure Variants</a>
            </div>
            <div class="dashboard-card">
                <span class="dashboard-card-icon">📂</span>
                <h3>Categories & Finishes</h3>
                <p>Manage categories, finishes, and fabric/material swatches.</p>
                <a href="admin.php" class="btn-primary">Manage</a>
            </div>
            <div class="dashboard-card">
                <span class="dashboard-card-icon">🖼️</span>
                <h3>About Page</h3>
                <p>Update hero and section images for the About page.</p>
                <a href="admin.php" class="btn-primary">Edit About</a>
            </div>
        </div>
    </main>

    <script>
        async function adminLogout() {
            await fetch('api.php?path=auth/logout', { method: 'POST' });
            window.location.href = 'admin-login.php';
        }

        // PHP session auth guard
        fetch('api.php?path=auth/check').then(r => r.json()).then(d => {
            if (!d.ok) window.location.href = 'admin-login.php';
        }).catch(() => { window.location.href = 'admin-login.php'; });

        // Load stats from API
        Promise.all([
            fetch('api.php?path=site-images').then(r => r.json()).catch(() => ({})),
            fetch('api.php?path=categories').then(r => r.json()).catch(() => [])
        ]).then(([siteImages, categories]) => {
            // Count site images
            var imgCount = 0;
            Object.values(siteImages).forEach(section => { imgCount += Object.keys(section).length; });
            document.getElementById('statSiteImages').textContent = imgCount;
            document.getElementById('statCategories').textContent = Array.isArray(categories) ? categories.length : '—';
        });

        // Count catalog listings and variants via separate calls
        (async function() {
            try {
                // Sample a few subcategories to get a rough count
                var subs = ['chair_highback','bed_queen','sofa_fullyupholstered','table_acacia'];
                var catalogTotal = 0, variantTotal = 0;
                for (var s of subs) {
                    var cl = await fetch('api.php?path=catalog-listings/' + s).then(r => r.json()).catch(() => ({}));
                    catalogTotal += Object.keys(cl).length;
                    var vd = await fetch('api.php?path=variant-details/' + s).then(r => r.json()).catch(() => ({}));
                    Object.values(vd).forEach(v => { variantTotal += (v.images||[]).filter(u => u).length; });
                }
                document.getElementById('statCatalogListings').textContent = catalogTotal + '+';
                document.getElementById('statVariants').textContent = variantTotal + '+';
            } catch(e) {}
        })();
    </script>
</body>
</html>
