(function() {
    var FALLBACK_PRODUCT_IMAGE = 'assets/images/products/product-detail-layout.png';
    var FALLBACK_PROMO_IMAGE = 'assets/images/promotional/chair-room.png';
    var FALLBACK_EDITOR_PICKS = [
        'assets/images/editor-picks/chair-1.png',
        'assets/images/editor-picks/chair-2.png',
        'assets/images/editor-picks/chair-3.png',
        'assets/images/editor-picks/chair-1.png'
    ];

    function normalizeImageUrl(url) {
        var value = (url || '').trim();
        if (!value) return '';
        if (/^(https?:)?\/\//i.test(value) || /^data:/i.test(value) || /^blob:/i.test(value)) {
            return value.replace(/\\/g, '/');
        }

        value = value.replace(/\\/g, '/');
        value = value.replace(/^\.\/+/, '');

        // If URL was saved with project folder prefix, keep only relative path.
        var projectPrefix = '/furniture-pampanga/';
        var lower = value.toLowerCase();
        var idx = lower.indexOf(projectPrefix);
        if (idx >= 0) value = value.slice(idx + projectPrefix.length);

        // Convert root "/assets/..." to project-relative path.
        if (/^\/assets\//i.test(value)) value = value.slice(1);

        // Local filesystem paths are not web URLs.
        if (/^[a-z]:\//i.test(value)) return '';
        return value;
    }

    function safeSetImage(imgEl, url, fallback) {
        if (!imgEl) return;
        var cleanUrl = normalizeImageUrl(url);
        var fallbackUrl = normalizeImageUrl(fallback);
        imgEl.onerror = function() {
            if (fallbackUrl && imgEl.getAttribute('src') !== fallbackUrl) imgEl.setAttribute('src', fallbackUrl);
        };
        imgEl.setAttribute('src', cleanUrl || fallbackUrl);
    }

    function setupMobileNav() {
        var headers = document.querySelectorAll('.header');
        headers.forEach(function(header, idx) {
            var hamburger = header.querySelector('.hamburger');
            var navLinks = header.querySelector('.nav-links');
            if (!hamburger || !navLinks) return;
            if (!navLinks.id) navLinks.id = 'primary-nav-links-' + idx;
            hamburger.setAttribute('aria-controls', navLinks.id);
            hamburger.setAttribute('aria-expanded', header.classList.contains('menu-open') ? 'true' : 'false');
            function closeMenu() {
                header.classList.remove('menu-open');
                hamburger.setAttribute('aria-expanded', 'false');
            }
            function toggleMenu() {
                var open = header.classList.toggle('menu-open');
                hamburger.setAttribute('aria-expanded', open ? 'true' : 'false');
            }
            hamburger.addEventListener('click', function(e) { e.preventDefault(); toggleMenu(); });
            navLinks.addEventListener('click', function(e) {
                var link = e.target && e.target.closest ? e.target.closest('a') : null;
                if (link) closeMenu();
            });
            document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeMenu(); });
            window.addEventListener('resize', function() { if (window.innerWidth > 600) closeMenu(); });
        });
    }

    setupMobileNav();

    var isProductPage = location.pathname.indexOf('product.php') !== -1 || location.pathname.indexOf('product.html') !== -1;
    var params = isProductPage ? new URLSearchParams(location.search) : null;
    var productName = params ? params.get('name') : null;

    var HIGH_BACK_CHAIRS = {
        valen: {
            name: 'Valen',
            shortDesc: 'Elegant high-back dining chair with off-white upholstery and dark wooden legs. Simple, classic design for a timeless dining space.',
            description: 'The Valen dining chair brings understated elegance to your table. Crafted with premium off-white upholstery and sturdy dark wood legs, its high backrest offers excellent support. The clean lines and classic silhouette suit both traditional and contemporary settings.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Off-white upholstery, dark wood legs | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Avoid direct sunlight to prevent fading. Professional cleaning recommended for deep cleaning.'
        },
        aurex: {
            name: 'Aurex',
            shortDesc: 'Light cream high-back dining chair with dark tapered wooden legs. Clean, modern silhouette for a fresh look.',
            description: 'The Aurex combines comfort and style with its light cream or beige upholstery and dark, slightly tapered wooden legs. The high back and modern silhouette make it a versatile choice for any dining room.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Light cream upholstery, dark wood legs | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Avoid direct sunlight to prevent fading. Professional cleaning recommended for deep cleaning.'
        },
        serin: {
            name: 'Serin',
            shortDesc: 'Sophisticated dark brown high-back dining chair with tufted back and decorative studs. Leather or faux leather finish.',
            description: 'The Serin dining chair makes a bold statement with its dark brown leather or faux leather upholstery. The tufted high back and decorative studs along the edges add a touch of sophistication.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Dark brown leather/faux leather, dark wood legs | Assembly: Required',
            care: 'Wipe with a damp cloth. Use leather conditioner for genuine leather. Avoid sharp objects and direct heat.'
        },
        calver: {
            name: 'Calver',
            shortDesc: 'High-back dining chair in light beige fabric with visible dark wood frame and distinctive brass caps on front legs.',
            description: 'The Calver features light beige fabric upholstery with a visible dark wood frame that outlines the back and seat. Its front legs are finished with distinctive brass caps.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Light beige fabric, dark wood frame, brass leg caps | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Polish brass caps occasionally.'
        },
        elowen: {
            name: 'Elowen',
            shortDesc: 'High-back dining chair in light brown linen-textured fabric with a prominent dark wood frame from back to legs.',
            description: 'The Elowen dining chair offers a warm, natural look with its light brown, linen-textured fabric. A prominent dark wood frame encompasses the back and curves down to form the legs.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Linen-textured fabric, dark wood frame | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Avoid direct sunlight to prevent fading.'
        },
        ravelle: {
            name: 'Ravelle',
            shortDesc: 'Distinctly designed high-back dining chair with off-white upholstery and an elegant curved, wingback-like profile.',
            description: 'The Ravelle stands out with its unique curved profile. Off-white upholstery and a dark wood frame create an elegant, almost wingback-like high backrest.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Off-white upholstery, dark wood frame and legs | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Avoid direct sunlight to prevent fading.'
        }
    };

    if (isProductPage) {
        var productNameEl = document.querySelector('.product-title');
        var breadcrumbEl = document.getElementById('breadcrumb-product-name');
        var overlayEl = document.getElementById('productTitleOverlay');
        var breadcrumbCategory = document.getElementById('breadcrumb-category');
        var productShortDescEl = document.querySelector('.product-short-desc');
        var mainImgEl = document.getElementById('mainProductImage');
        var finishSelect = document.getElementById('finishSelect');
        var materialSelect = document.getElementById('materialSelect');
        var materialSwatchesEl = document.getElementById('materialSwatches');
        var finishSwatchesEl = document.getElementById('finishSwatches');

        var variant = params.get('variant');
        var sub = params.get('sub');
        var category = params.get('category');

        // If product.php is opened without full query params, use a safe default
        // so uploaded admin images still appear on the page.
        if (!category) category = 'chair';
        if (!sub) sub = 'high-back';
        if (!variant) variant = (category === 'chair') ? 'valen' : '01';

        var subToKey = sub ? {
            'high-back': 'highback', 'low-back': 'lowback', 'upholstered': 'upholstered', 'padded': 'padded', 'solhiya': 'solhiya'
        }[sub] : null;

        var NON_CHAIR_SUB_MAP = {
            'bed': { 'queen':'bed_queen','king':'bed_king','single-loft':'bed_singleloft','double-deck':'bed_doubledeck','platform':'bed_platform' },
            'center-table': { 'square-coffee':'center_squarecoffee','nesting':'center_nesting','marble-top':'center_marbletop','oval':'center_oval' },
            'ottoman': { 'round-storage':'ottoman_roundstorage','square-fabric':'ottoman_squarefabric','leather-padded':'ottoman_leatherpadded','bench':'ottoman_bench' },
            'table': { 'acacia':'table_acacia','solid-wood':'table_solidwood','marble':'table_marble','glass':'table_glass','executive':'table_executive' },
            'accent-chair': { 'lounge':'accent_lounge','wingback':'accent_wingback','barrel':'accent_barrel','slipper':'accent_slipper','solhiya':'accent_solhiya' },
            'console-table': { 'drawers':'console_drawers','minimalist':'console_minimalist','industrial':'console_industrial','glass':'console_glass' },
            'bench': { 'padded-entry':'bench_paddedentry','solid-wood':'bench_solidwood','outdoor-garden':'bench_outdoorgarden','bedroom-end':'bench_bedroomend' },
            'sofa': { 'fully-upholstered':'sofa_fullyupholstered','wood-frame':'sofa_woodframe','l-shaped':'sofa_lshaped','loveseat':'sofa_loveseat','recliner':'sofa_recliner' },
            'night-table': { 'accent':'night_accent','square-side':'night_squareside','round-end':'night_roundend','floating':'night_floating' },
            'barstool': { 'wood-upholstered':'barstool_woodupholstered','industrial-metal':'barstool_industrialmetal','adjustable':'barstool_adjustable','backless':'barstool_backless' },
            'outdoor': { 'patio-dining':'outdoor_patiodining','wicker-lounge':'outdoor_wickerlounge','garden-side':'outdoor_gardenside','poolside':'outdoor_poolside' }
        };

        var isChair = category === 'chair';
        var highBackInfo = (isChair && sub === 'high-back' && variant) ? HIGH_BACK_CHAIRS[variant] : null;

        var subcategoryKey = null;
        if (isChair && sub && subToKey) subcategoryKey = 'chair_' + subToKey;
        else if (!isChair && category && sub && NON_CHAIR_SUB_MAP[category] && NON_CHAIR_SUB_MAP[category][sub]) subcategoryKey = NON_CHAIR_SUB_MAP[category][sub];

        // Load variant images
        if (subcategoryKey && variant) {
            fetch('api.php?path=variant-details/' + subcategoryKey)
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    var vd = data[variant] || null;
                    if (vd && (vd.images || []).length > 0) {
                        if (!highBackInfo) {
                            var dn = (vd.name || variant).replace(/^\w/, function(c) { return c.toUpperCase(); });
                            if (productNameEl) productNameEl.textContent = dn;
                            if (breadcrumbEl) breadcrumbEl.textContent = dn;
                            if (overlayEl) overlayEl.textContent = dn;
                        }
                        var thumbBtns = document.querySelectorAll('.gallery-thumbnails .thumbnail');
                        var images = vd.images || [];
                        var nonEmptyImages = images.filter(function(u) { return (u || '').trim(); });
                        var firstUrl = '';
                        [0,1,2,3].forEach(function(i) {
                            var url = normalizeImageUrl(images[i] || '');
                            if (thumbBtns[i]) {
                                thumbBtns[i].setAttribute('data-image', url);
                                var img = thumbBtns[i].querySelector('img');
                                if (img) {
                                    safeSetImage(img, url, FALLBACK_PRODUCT_IMAGE);
                                    img.alt = 'Thumbnail ' + (i+1);
                                }
                                if (url && !firstUrl) firstUrl = url;
                            }
                        });
                        if (mainImgEl) safeSetImage(mainImgEl, firstUrl, FALLBACK_PRODUCT_IMAGE);

                        // Product detail images should come from variant-details only.
                        // If no uploaded variant image exists, keep the static placeholder.
                        if (nonEmptyImages.length === 0 && mainImgEl) {
                            safeSetImage(mainImgEl, '', FALLBACK_PRODUCT_IMAGE);
                        }
                    }
                }).catch(function() {});
        }

        // High-back chair info
        if (highBackInfo) {
            if (productNameEl) productNameEl.textContent = highBackInfo.name;
            if (breadcrumbEl) breadcrumbEl.textContent = highBackInfo.name;
            if (overlayEl) overlayEl.textContent = highBackInfo.name;
            if (productShortDescEl) productShortDescEl.textContent = highBackInfo.shortDesc;
            fetch('api.php?path=product-details&subcategory=chair_highback&variant=' + variant)
                .then(function(r) { return r.json(); })
                .then(function(d) {
                    var descEl = document.querySelector('#description');
                    var specEl = document.querySelector('#specifications');
                    var careEl = document.querySelector('#care');
                    if (descEl) descEl.innerHTML = '<p>' + ((d.description) || highBackInfo.description).replace(/\n/g, '</p><p>') + '</p>';
                    if (specEl) specEl.innerHTML = '<ul><li>' + ((d.specifications) || highBackInfo.specifications).replace(/\|/g, '</li><li>') + '</li></ul>';
                    if (careEl) careEl.innerHTML = '<p>' + ((d.care) || highBackInfo.care).replace(/\n/g, '</p><p>') + '</p>';
                }).catch(function() {
                    var descEl = document.querySelector('#description');
                    var specEl = document.querySelector('#specifications');
                    var careEl = document.querySelector('#care');
                    if (descEl) descEl.innerHTML = '<p>' + highBackInfo.description + '</p>';
                    if (specEl) specEl.innerHTML = '<ul><li>' + highBackInfo.specifications.replace(/\|/g, '</li><li>') + '</li></ul>';
                    if (careEl) careEl.innerHTML = '<p>' + highBackInfo.care + '</p>';
                });
        }

        if (!highBackInfo && productName) {
            if (productNameEl) productNameEl.textContent = productName;
            if (breadcrumbEl) breadcrumbEl.textContent = productName;
            if (overlayEl) overlayEl.textContent = productName;
        } else if (!highBackInfo && !productName) {
            if (productNameEl) productNameEl.textContent = 'Product Details';
            if (breadcrumbEl) breadcrumbEl.textContent = 'Product Details';
            if (overlayEl) overlayEl.textContent = 'Product Details';
        }

        // Breadcrumb
        if (breadcrumbCategory && category) {
            var subParam = params.get('sub');
            breadcrumbCategory.href = 'catalog.php?category=' + encodeURIComponent(category) + (subParam ? '&sub=' + encodeURIComponent(subParam) : '');
            var catLabels = { 'chair':'Chair','bed':'Bed','center-table':'Center Table','ottoman':'Ottoman','table':'Table','accent-chair':'Accent Chair','console-table':'Console Table','bench':'Bench','sofa':'Sofa','night-table':'Night Table','barstool':'Barstool','outdoor':'Outdoor' };
            var subLabels = { 'high-back':'Dining Chair (High-Back)','low-back':'Dining Chair (Low-Back)','upholstered':'Dining Chair (Upholstered)','padded':'Padded Dining Chair','solhiya':'Solhiya Dining Chair' };
            breadcrumbCategory.textContent = (subParam && subLabels[subParam]) ? subLabels[subParam] : (catLabels[category] || category);
        }

        // Thumbnails
        var thumbnails = document.querySelectorAll('.gallery-thumbnails .thumbnail');
        thumbnails.forEach(function(btn) {
            btn.addEventListener('click', function() {
                thumbnails.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var src = btn.getAttribute('data-image') || (btn.querySelector('img') && btn.querySelector('img').src);
                if (mainImgEl && src) safeSetImage(mainImgEl, src, FALLBACK_PRODUCT_IMAGE);
            });
        });

        // ── Finish swatches ──
        var finishImages = {
            'duco-white':   'assets/images/products/Ducco White .JPG',
            'duco-gold':    'assets/images/products/Ducco Gold .JPG',
            'ducco-black':  'assets/images/products/Ducco Black.JPG',
            'ash-gray':     'assets/images/products/Ash Gray .JPG',
            'walnut':       'assets/images/products/Walnut.JPG',
            'light-walnut': 'assets/images/products/Light Walnut .JPG',
            'dark-walnut':  'assets/images/products/Dark Walnut.JPG',
            'wengue':       'assets/images/products/Wengue .JPG',
            'oak':          'assets/images/products/Oak Finish.JPG',
            'pinewood':     'assets/images/products/Pinewood Finish .JPG'
        };

        function makeTooltipWrap(el, name) {
            var wrap = document.createElement('div');
            wrap.className = 'swatch-wrap';
            var tip = document.createElement('span');
            tip.className = 'swatch-tooltip';
            tip.textContent = name;
            wrap.appendChild(el);
            wrap.appendChild(tip);
            return wrap;
        }

        // Wrap static finish swatches with tooltip
        if (finishSwatchesEl) {
            Array.prototype.slice.call(finishSwatchesEl.children).forEach(function(sw) {
                if (sw.classList.contains('finish-swatch')) {
                    var name = sw.getAttribute('title') || '';
                    var wrap = makeTooltipWrap(sw, name);
                    finishSwatchesEl.appendChild(wrap);
                }
            });
        }

        function setFinish(value) {
            if (!finishSwatchesEl) return;
            finishSwatchesEl.querySelectorAll('.finish-swatch').forEach(function(s) {
                s.classList.toggle('active', s.getAttribute('data-value') === value);
            });
            if (finishSelect) finishSelect.value = value;
            if (mainImgEl && finishImages[value]) { safeSetImage(mainImgEl, finishImages[value], FALLBACK_PRODUCT_IMAGE); return; }
            finishSwatchesEl.querySelectorAll('.finish-swatch').forEach(function(s) {
                if (s.getAttribute('data-value') === value && s.style.backgroundImage && mainImgEl) {
                    var url = s.style.backgroundImage.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
                    if (url) safeSetImage(mainImgEl, url, FALLBACK_PRODUCT_IMAGE);
                }
            });
        }

        if (finishSwatchesEl) {
            finishSwatchesEl.addEventListener('click', function(e) {
                var sw = e.target.closest ? e.target.closest('.finish-swatch') : null;
                if (sw) setFinish(sw.getAttribute('data-value'));
            });
        }
        if (finishSelect) {
            finishSelect.addEventListener('change', function() {
                if (finishSelect.value) setFinish(finishSelect.value);
            });
        }

        // Load custom finishes from API
        fetch('api.php?path=finishes')
            .then(function(r) { return r.json(); })
            .then(function(finishes) {
                if (!finishes || !finishes.length || !finishSwatchesEl) return;
                finishes.forEach(function(f) {
                    var val = 'custom-' + f.name.toLowerCase().replace(/\s+/g, '-');
                    if (finishSelect) {
                        var opt = document.createElement('option');
                        opt.value = val;
                        opt.textContent = f.name;
                        finishSelect.appendChild(opt);
                    }
                    var sw = document.createElement('div');
                    sw.className = 'finish-swatch';
                    sw.setAttribute('data-value', val);
                    sw.setAttribute('title', f.name);
                    if (f.img_url) {
                        sw.style.backgroundImage = 'url("' + f.img_url + '")';
                        sw.style.backgroundSize = 'cover';
                        sw.style.backgroundPosition = 'center';
                    } else {
                        sw.style.background = f.color || '#ccc';
                    }
                    finishSwatchesEl.appendChild(makeTooltipWrap(sw, f.name));
                });
            }).catch(function() {});

        // ── Material / Fabric swatches ──
        var CATEGORIES_NO_MATERIAL = { 'table': true, 'center-table': true, 'night-table': true };
        if (category && CATEGORIES_NO_MATERIAL[category]) {
            var matGroup = materialSelect ? materialSelect.closest('.option-group') : null;
            if (matGroup) matGroup.style.display = 'none';
        }

        var fabricColors = {
            'Amalia':      ['Amalia Coffee Bean.jpg','Amalia Peach.jpg','Amalia Periscope.jpg','Amalia Sahara.jpg'],
            'Bailey':      ['IMG_4754.JPG','IMG_4756.JPG','IMG_4757.JPG','IMG_4758.JPG','IMG_4759.JPG','IMG_4760.JPG','IMG_4761.JPG','IMG_4762.JPG','IMG_4763.JPG','IMG_4764.JPG','IMG_4765.JPG','IMG_4766.JPG'],
            'Belfort':     ['Belfort Beige 101.jpg','Belfort Blue 101.jpg','Belfort Gray 201.jpg','Belfort Khaki 201.jpg','Belfort Rust 101.jpg','Belfort White 101.jpg'],
            'Berlin':      ['IMG_4796.JPG','IMG_4797.JPG','IMG_4798.JPG','IMG_4799.JPG','IMG_4800.JPG'],
            'Cuba':        ['Cuba 01.jpg','Cuba 02.jpg','Cuba 03.jpg','Cuba 04.jpg','Cuba 05.jpg','Cuba 06.jpg'],
            'Faye':        ['Faye Brownstone_.jpg','Faye Mocha_.jpg','Faye Shale_.jpg','Faye Walnut_.jpg'],
            'Galaxy Soft': ['IMG_4785.JPG','IMG_4786.JPG','IMG_4787.JPG','IMG_4788.JPG','IMG_4789.JPG','IMG_4790.JPG','IMG_4791.JPG','IMG_4792.JPG','IMG_4793.JPG','IMG_4794.JPG','IMG_4795.JPG'],
            'Globus':      ['Globus 01.jpg','Globus 05.jpg','Globus 07.jpg','Globus 17.jpg','Globus 18.jpg']
        };
        var leatherColors = {
            'French Leather': ['French 260 .png','French 260-11.png','French 260-2.png','French 260-3.png','French 260-4.png','French 260-5.png','French 260-6.png'],
            'German Leather': ['30077.jpg','BG 1485.jpg','BG 6075.jpg','BG 6170.jpg','BN 3592.jpg','BN 3933.jpg','German BG 1535.jpg','YW 5238.jpg','YW 5375.jpg']
        };

        function renderMaterialSwatches(type) {
            if (!materialSwatchesEl) return;
            materialSwatchesEl.innerHTML = '';
            var typeMap = {
                'fabric-amalia':   { 'Amalia': fabricColors['Amalia'] },
                'fabric-bailey':   { 'Bailey': fabricColors['Bailey'] },
                'fabric-belfort':  { 'Belfort': fabricColors['Belfort'] },
                'fabric-berlin':   { 'Berlin': fabricColors['Berlin'] },
                'fabric-cuba':     { 'Cuba': fabricColors['Cuba'] },
                'fabric-faye':     { 'Faye': fabricColors['Faye'] },
                'fabric-galaxy':   { 'Galaxy Soft': fabricColors['Galaxy Soft'] },
                'fabric-globus':   { 'Globus': fabricColors['Globus'] },
                'french-leather':  { 'French Leather': leatherColors['French Leather'] },
                'german-leather':  { 'German Leather': leatherColors['German Leather'] }
            };

            // Custom fabric from API
            if (type && type.indexOf('custom-fabric-') === 0 && window._customFabricsData) {
                var groupName = type.replace('custom-fabric-', '').replace(/-/g, ' ');
                var found = null;
                window._customFabricsData.forEach(function(g) {
                    if (g.group_name.toLowerCase() === groupName.toLowerCase()) found = g;
                });
                if (found) {
                    var swatches = typeof found.swatches === 'string' ? JSON.parse(found.swatches) : (found.swatches || []);
                    var groupEl = document.createElement('div'); groupEl.className = 'material-swatch-group';
                    var lbl = document.createElement('div'); lbl.className = 'material-swatch-label'; lbl.textContent = found.group_name;
                    groupEl.appendChild(lbl);
                    var row = document.createElement('div'); row.className = 'material-swatch-row';
                    swatches.forEach(function(sw) {
                        var el = document.createElement('div'); el.className = 'material-swatch';
                        el.style.backgroundImage = 'url("' + sw.url + '")';
                        el.style.backgroundSize = 'cover'; el.style.backgroundPosition = 'center';
                        el.addEventListener('click', function() {
                            materialSwatchesEl.querySelectorAll('.material-swatch').forEach(function(s) { s.classList.remove('active'); });
                            el.classList.add('active');
                            if (mainImgEl) safeSetImage(mainImgEl, sw.url, FALLBACK_PRODUCT_IMAGE);
                        });
                        row.appendChild(makeTooltipWrap(el, sw.name));
                    });
                    groupEl.appendChild(row);
                    materialSwatchesEl.appendChild(groupEl);
                }
                return;
            }

            var groups = typeMap[type] || fabricColors;
            Object.keys(groups).forEach(function(gName) {
                var groupEl = document.createElement('div'); groupEl.className = 'material-swatch-group';
                var lbl = document.createElement('div'); lbl.className = 'material-swatch-label'; lbl.textContent = gName;
                groupEl.appendChild(lbl);
                var row = document.createElement('div'); row.className = 'material-swatch-row';
                var folder = 'assets/images/materials/' + gName + '/';
                groups[gName].forEach(function(file) {
                    var label = file.replace(/\.[^.]+$/, '');
                    var el = document.createElement('div'); el.className = 'material-swatch';
                    el.style.backgroundImage = 'url("' + folder + file + '")';
                    el.style.backgroundSize = 'cover'; el.style.backgroundPosition = 'center';
                    el.addEventListener('click', function() {
                        materialSwatchesEl.querySelectorAll('.material-swatch').forEach(function(s) { s.classList.remove('active'); });
                        el.classList.add('active');
                        if (mainImgEl) safeSetImage(mainImgEl, folder + file, FALLBACK_PRODUCT_IMAGE);
                    });
                    row.appendChild(makeTooltipWrap(el, label));
                });
                groupEl.appendChild(row);
                materialSwatchesEl.appendChild(groupEl);
            });
        }

        if (materialSelect && !(category && CATEGORIES_NO_MATERIAL[category])) {
            materialSelect.addEventListener('change', function() {
                if (materialSelect.value) renderMaterialSwatches(materialSelect.value);
                else if (materialSwatchesEl) materialSwatchesEl.innerHTML = '';
            });
            // Load custom fabrics from API and append to dropdown
            fetch('api.php?path=fabrics')
                .then(function(r) { return r.json(); })
                .then(function(fabrics) {
                    if (!fabrics || !fabrics.length) return;
                    window._customFabricsData = fabrics;
                    fabrics.forEach(function(group) {
                        var opt = document.createElement('option');
                        opt.value = 'custom-fabric-' + group.group_name.toLowerCase().replace(/\s+/g, '-');
                        opt.textContent = group.group_name;
                        materialSelect.appendChild(opt);
                    });
                }).catch(function() {});
            // Show initial material/fabric swatches so the section is not empty.
            if (!materialSelect.value) materialSelect.value = 'fabric-amalia';
            renderMaterialSwatches(materialSelect.value);
        }

        // Tabs
        var tabBtns = document.querySelectorAll('.product-tabs .tab-btn');
        var tabPanes = document.querySelectorAll('.tab-content .tab-pane');
        tabBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var tabId = btn.getAttribute('data-tab');
                tabBtns.forEach(function(b) { b.classList.remove('active'); });
                tabPanes.forEach(function(p) { p.classList.remove('active'); });
                btn.classList.add('active');
                var pane = document.getElementById(tabId);
                if (pane) pane.classList.add('active');
            });
        });
    }

    // Home page images from API
    if (document.querySelector('.editors-picks') && !isProductPage) {
        fetch('api.php?path=site-images')
            .then(function(r) { return r.json(); })
            .then(function(data) {
                var hero = data.hero && data.hero.homeBg;
                if (hero) {
                    var heroImg = document.querySelector('.hero-image img');
                    var heroSection = document.querySelector('.hero');
                    var heroUrl = normalizeImageUrl(hero.url);
                    if (heroImg) safeSetImage(heroImg, heroUrl, 'assets/images/hero/hero-banner.png');
                    if (heroSection) {
                        var bg = heroUrl || 'assets/images/hero/hero-banner.png';
                        heroSection.style.setProperty('--home-hero-bg', 'url("' + bg + '")');
                    }
                }
                var picks = document.querySelectorAll('.editors-picks .product-card');
                [0,1,2,3].forEach(function(i) {
                    var pick = data.editorPicks && data.editorPicks['pick' + i];
                    if (picks[i]) {
                        var img = picks[i].querySelector('.product-image img');
                        var pickUrl = pick && pick.url ? pick.url : '';
                        safeSetImage(img, pickUrl, FALLBACK_EDITOR_PICKS[i]);
                    }
                });
                var promo = data.promo && data.promo.promoBanner;
                var promoImg = document.querySelector('.promo-image img');
                safeSetImage(promoImg, promo && promo.url ? promo.url : '', FALLBACK_PROMO_IMAGE);
            }).catch(function() {
                var picks = document.querySelectorAll('.editors-picks .product-card .product-image img');
                [0,1,2,3].forEach(function(i) { if (picks[i]) safeSetImage(picks[i], '', FALLBACK_EDITOR_PICKS[i]); });
                safeSetImage(document.querySelector('.promo-image img'), '', FALLBACK_PROMO_IMAGE);
            });
    }
})();
