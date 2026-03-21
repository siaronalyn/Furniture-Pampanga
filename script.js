(function runMain() {
function main() {
(function() {
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

            hamburger.addEventListener('click', function(e) {
                e.preventDefault();
                toggleMenu();
            });

            navLinks.addEventListener('click', function(e) {
                var link = e.target && e.target.closest ? e.target.closest('a') : null;
                if (link) closeMenu();
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeMenu();
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 600) closeMenu();
            });
        });
    }

    setupMobileNav();

    var isProductPage = location.pathname.indexOf('product.html') !== -1;
    var params = isProductPage ? new URLSearchParams(location.search) : null;
    var productId = params ? params.get('id') : null;
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
            description: 'The Serin dining chair makes a bold statement with its dark brown leather or faux leather upholstery. The tufted high back and decorative studs along the edges add a touch of sophistication. Dark wooden legs complete the refined look.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Dark brown leather/faux leather, dark wood legs | Assembly: Required',
            care: 'Wipe with a damp cloth. Use leather conditioner for genuine leather. Avoid sharp objects and direct heat. Professional cleaning recommended for deep cleaning.'
        },
        calver: {
            name: 'Calver',
            shortDesc: 'High-back dining chair in light beige fabric with visible dark wood frame and distinctive brass caps on front legs.',
            description: 'The Calver features light beige fabric upholstery with a visible dark wood frame that outlines the back and seat. Its front legs are finished with distinctive brass caps, adding a subtle touch of luxury to your dining space.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Light beige fabric, dark wood frame, brass leg caps | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Polish brass caps occasionally. Avoid direct sunlight to prevent fading.'
        },
        elowen: {
            name: 'Elowen',
            shortDesc: 'High-back dining chair in light brown linen-textured fabric with a prominent dark wood frame from back to legs.',
            description: 'The Elowen dining chair offers a warm, natural look with its light brown, linen-textured fabric. A prominent dark wood frame encompasses the back and curves down to form the legs, creating a cohesive and sturdy design.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Linen-textured fabric, dark wood frame | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Avoid direct sunlight to prevent fading. Professional cleaning recommended for deep cleaning.'
        },
        ravelle: {
            name: 'Ravelle',
            shortDesc: 'Distinctly designed high-back dining chair with off-white upholstery and an elegant curved, wingback-like profile.',
            description: 'The Ravelle stands out with its unique curved profile. Off-white upholstery and a dark wood frame create an elegant, almost wingback-like high backrest. Dark wooden legs complete this statement piece for your dining room.',
            specifications: 'Dimensions: 24" W x 22" D x 42" H | Weight: 18 kg | Material: Off-white upholstery, dark wood frame and legs | Assembly: Required',
            care: 'Clean with a soft, dry cloth. For stains, use a mild detergent solution. Avoid direct sunlight to prevent fading. Professional cleaning recommended for deep cleaning.'
        }
    };

    if (isProductPage) {
        var productNameEl = document.querySelector('.product-title');
        var breadcrumbEl = document.getElementById('breadcrumb-product-name');
        var overlayEl = document.getElementById('productTitleOverlay');
        var breadcrumbCategory = document.getElementById('breadcrumb-category');
        var productShortDescEl = document.querySelector('.product-short-desc');

        var variant = params.get('variant');
        var sub = params.get('sub');
        var category = params.get('category');
        var subToKey = sub ? {
            'high-back': 'highback', 'low-back': 'lowback', 'upholstered': 'upholstered', 'padded': 'padded', 'solhiya': 'solhiya'
        }[sub] : null;

        /* Build storage key for any category+sub combination */
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
        var variantStorageKey = null;
        if (isChair && sub && subToKey) {
            variantStorageKey = 'furniturePampangaCatalogVariants_chair_' + subToKey;
        } else if (!isChair && category && sub && NON_CHAIR_SUB_MAP[category] && NON_CHAIR_SUB_MAP[category][sub]) {
            variantStorageKey = 'furniturePampangaCatalogVariants_' + NON_CHAIR_SUB_MAP[category][sub];
        }
        var variantData = null;
        if (variantStorageKey && variant) {
            try {
                var vRaw = localStorage.getItem(variantStorageKey);
                if (vRaw) { var vData = JSON.parse(vRaw); variantData = vData[variant] || null; }
            } catch (e) {}
        }

        var highBackInfo = (category === 'chair' && sub === 'high-back' && variant) ? HIGH_BACK_CHAIRS[variant] : null;

        if (highBackInfo) {
            var displayName = highBackInfo.name;
            if (productNameEl) productNameEl.textContent = displayName;
            if (breadcrumbEl) breadcrumbEl.textContent = displayName;
            if (overlayEl) overlayEl.textContent = displayName;
            if (productShortDescEl) productShortDescEl.textContent = highBackInfo.shortDesc;
            // Load tab content: check variant storage first, fallback to hardcoded
            var tabKey = 'furniturePampangaTabContent_chair_highback_' + variant;
            var tabRaw = null;
            try { tabRaw = localStorage.getItem(tabKey); } catch(e) {}
            var tabData = tabRaw ? JSON.parse(tabRaw) : null;
            var descEl = document.querySelector('#description');
            var specEl = document.querySelector('#specifications');
            var careEl = document.querySelector('#care');
            if (descEl) descEl.innerHTML = '<p>' + ((tabData && tabData.description) || highBackInfo.description).replace(/\n/g, '</p><p>') + '</p>';
            if (specEl) specEl.innerHTML = '<ul><li>' + ((tabData && tabData.specifications) || highBackInfo.specifications).replace(/\|/g, '</li><li>') + '</li></ul>';
            if (careEl) careEl.innerHTML = '<p>' + ((tabData && tabData.care) || highBackInfo.care).replace(/\n/g, '</p><p>') + '</p>';
        }

        if (variantData && (variantData.images || []).length > 0) {
            if (!highBackInfo) {
                var displayName = (variantData.name || variant).replace(/^\w/, function(c) { return c.toUpperCase(); });
                if (productNameEl) productNameEl.textContent = displayName;
                if (breadcrumbEl) breadcrumbEl.textContent = displayName;
                if (overlayEl) overlayEl.textContent = displayName;
            }
            var mainImg = document.getElementById('mainProductImage');
            var thumbBtns = document.querySelectorAll('.gallery-thumbnails .thumbnail');
            var images = variantData.images || [];
            var firstUrl = '';
            [0, 1, 2, 3].forEach(function(i) {
                var url = (images[i] || '').trim();
                if (thumbBtns[i]) {
                    var btn = thumbBtns[i];
                    btn.setAttribute('data-image', url);
                    var img = btn.querySelector('img');
                    if (img) { img.src = url || ''; img.alt = 'Thumbnail ' + (i + 1); }
                    if (url && !firstUrl) firstUrl = url;
                }
            });
            if (mainImg && firstUrl) mainImg.src = firstUrl;
            if (variantData.description && !highBackInfo) {
                var descEl = document.querySelector('#description');
                if (descEl) descEl.innerHTML = '<p>' + (variantData.description + '').replace(/\n/g, '</p><p>') + '</p>';
            }
        } else if (!highBackInfo && productName) {
            if (productNameEl) productNameEl.textContent = productName;
            if (breadcrumbEl) breadcrumbEl.textContent = productName;
            if (overlayEl) overlayEl.textContent = productName;
        }

        if (breadcrumbCategory && category) {
            var subParam = params.get('sub');
            breadcrumbCategory.href = 'catalog.html?category=' + encodeURIComponent(category) + (subParam ? '&sub=' + encodeURIComponent(subParam) : '');
            var catLabels = {
                'chair': 'Chair', 'bed': 'Bed', 'center-table': 'Center Table', 'ottoman': 'Ottoman',
                'table': 'Table', 'accent-chair': 'Accent Chair', 'console-table': 'Console Table',
                'bench': 'Bench', 'sofa': 'Sofa', 'night-table': 'Night Table',
                'barstool': 'Barstool', 'outdoor': 'Outdoor'
            };
            var subLabels = {
                'high-back': 'Dining Chair (High-Back)', 'low-back': 'Dining Chair (Low-Back)',
                'upholstered': 'Dining Chair (Upholstered)', 'padded': 'Padded Dining Chair',
                'solhiya': 'Solhiya Dining Chair'
            };
            breadcrumbCategory.textContent = (subParam && subLabels[subParam]) ? subLabels[subParam] : (catLabels[category] || category);
        }

        var STORAGE_KEY = 'furniturePampangaProductData';
        var data = {};
        try {
            var raw = localStorage.getItem(STORAGE_KEY);
            if (raw) data = JSON.parse(raw);
        } catch (e) {}

        if (!variantData && !highBackInfo && productId && data[productId]) {
            var product = data[productId];
            var images = product.images || [];
            var mainImg = document.getElementById('mainProductImage');
            var thumbBtns = document.querySelectorAll('.gallery-thumbnails .thumbnail');

            var firstUrl = '';
            [0, 1, 2, 3].forEach(function(i) {
                var url = (images[i] || '').trim();
                if (thumbBtns[i]) {
                    var btn = thumbBtns[i];
                    btn.setAttribute('data-image', url);
                    var img = btn.querySelector('img');
                    if (img) {
                        img.src = url || '';
                        img.alt = 'Thumbnail ' + (i + 1);
                    }
                    if (url && !firstUrl) firstUrl = url;
                }
            });
            if (mainImg && firstUrl) mainImg.src = firstUrl;

            var descEl = document.querySelector('#description');
            var specEl = document.querySelector('#specifications');
            var careEl = document.querySelector('#care');
            var reviewsEl = document.querySelector('#reviews');
            if (product.description && descEl) descEl.innerHTML = '<p>' + product.description.replace(/\n/g, '</p><p>') + '</p>';
            if (product.specifications && specEl) specEl.innerHTML = '<ul><li>' + product.specifications.replace(/\n/g, '</li><li>') + '</li></ul>';
            if (product.care && careEl) careEl.innerHTML = '<p>' + product.care.replace(/\n/g, '</p><p>') + '</p>';
            if (product.reviews && reviewsEl) reviewsEl.innerHTML = product.reviews;
        }

        var thumbnails = document.querySelectorAll('.gallery-thumbnails .thumbnail');
        var mainImg = document.getElementById('mainProductImage');
        thumbnails.forEach(function(btn) {
            btn.addEventListener('click', function() {
                thumbnails.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var src = btn.getAttribute('data-image') || (btn.querySelector('img') && btn.querySelector('img').src);
                if (mainImg && src) mainImg.src = src;
            });
        });

        // Finish swatches
        var finishImages = {
            'duco-white':  'assets/images/products/Ducco White .JPG',
            'duco-gold':   'assets/images/products/Ducco Gold .JPG',
            'ducco-black': 'assets/images/products/Ducco Black.JPG',
            'ash-gray':    'assets/images/products/Ash Gray .JPG',
            'walnut':      'assets/images/products/Walnut.JPG',
            'light-walnut':'assets/images/products/Light Walnut .JPG',
            'dark-walnut': 'assets/images/products/Dark Walnut.JPG',
            'wengue':      'assets/images/products/Wengue .JPG',
            'oak':         'assets/images/products/Oak Finish.JPG',
            'pinewood':    'assets/images/products/Pinewood Finish .JPG'
        };

        var finishSwatches = document.querySelectorAll('.finish-swatch');
        var finishSelect = document.getElementById('finishSelect');
        var mainImgEl = document.getElementById('mainProductImage');

        // Wrap each finish swatch with tooltip only
        finishSwatches.forEach(function(swatch) {
            var wrap = document.createElement('div');
            wrap.className = 'swatch-wrap';
            var tip = document.createElement('span');
            tip.className = 'swatch-tooltip';
            tip.textContent = swatch.getAttribute('title') || '';
            swatch.parentNode.insertBefore(wrap, swatch);
            wrap.appendChild(swatch);
            wrap.appendChild(tip);
        });
        finishSwatches = document.querySelectorAll('.finish-swatch');

        function setFinish(value) {
            finishSwatches.forEach(function(s) { s.classList.toggle('active', s.getAttribute('data-value') === value); });
            if (finishSelect) finishSelect.value = value;
            if (mainImgEl && finishImages[value]) mainImgEl.src = finishImages[value];
        }

        finishSwatches.forEach(function(swatch) {
            swatch.addEventListener('click', function() { setFinish(swatch.getAttribute('data-value')); });
        });
        if (finishSelect) finishSelect.addEventListener('change', function() {
            if (finishSelect.value) setFinish(finishSelect.value);
        });

        // Material swatches
        var fabricColors = {
            'Amalia':  ['Amalia Coffee Bean.jpg','Amalia Peach.jpg','Amalia Periscope.jpg','Amalia Sahara.jpg'],
            'Bailey':  ['IMG_4754.JPG','IMG_4756.JPG','IMG_4757.JPG','IMG_4758.JPG','IMG_4759.JPG','IMG_4760.JPG','IMG_4761.JPG','IMG_4762.JPG','IMG_4763.JPG','IMG_4764.JPG','IMG_4765.JPG','IMG_4766.JPG'],
            'Belfort': ['Belfort Beige 101.jpg','Belfort Blue 101.jpg','Belfort Gray 201.jpg','Belfort Khaki 201.jpg','Belfort Rust 101.jpg','Belfort White 101.jpg'],
            'Berlin':  ['IMG_4796.JPG','IMG_4797.JPG','IMG_4798.JPG','IMG_4799.JPG','IMG_4800.JPG'],
            'Cuba':    ['Cuba 01.jpg','Cuba 02.jpg','Cuba 03.jpg','Cuba 04.jpg','Cuba 05.jpg','Cuba 06.jpg'],
            'Faye':    ['Faye Brownstone_.jpg','Faye Mocha_.jpg','Faye Shale_.jpg','Faye Walnut_.jpg'],
            'Galaxy Soft': ['IMG_4785.JPG','IMG_4786.JPG','IMG_4787.JPG','IMG_4788.JPG','IMG_4789.JPG','IMG_4790.JPG','IMG_4791.JPG','IMG_4792.JPG','IMG_4793.JPG','IMG_4794.JPG','IMG_4795.JPG'],
            'Globus':  ['Globus 01.jpg','Globus 05.jpg','Globus 07.jpg','Globus 17.jpg','Globus 18.jpg']
        };
        var leatherColors = {
            'French Leather': ['French 260 .png','French 260-11.png','French 260-2.png','French 260-3.png','French 260-4.png','French 260-5.png','French 260-6.png'],
            'German Leather': ['30077.jpg','BG 1485.jpg','BG 6075.jpg','BG 6170.jpg','BN 3592.jpg','BN 3933.jpg','German BG 1535.jpg','YW 5238.jpg','YW 5375.jpg']
        };

        var materialSelect = document.getElementById('materialSelect');
        var materialSwatchesEl = document.getElementById('materialSwatches');
        var materialOptionGroup = materialSelect && materialSelect.closest ? materialSelect.closest('.option-group') : null;

        // Some product categories (tables) don't have fabric/leather material options.
        // Hide the Material section for those categories.
        var CATEGORIES_NO_MATERIAL = { 'table': true, 'center-table': true, 'night-table': true };
        if (category && CATEGORIES_NO_MATERIAL[category]) {
            if (materialOptionGroup) materialOptionGroup.style.display = 'none';
            if (materialSelect) materialSelect.value = '';
            if (materialSwatchesEl) materialSwatchesEl.innerHTML = '';
        }

        function renderMaterialSwatches(type) {
            if (!materialSwatchesEl) return;
            materialSwatchesEl.innerHTML = '';
            var groups = {};
            if (type === 'fabric-amalia') groups = { 'Amalia': fabricColors['Amalia'] };
            else if (type === 'fabric-bailey') groups = { 'Bailey': fabricColors['Bailey'] };
            else if (type === 'fabric-belfort') groups = { 'Belfort': fabricColors['Belfort'] };
            else if (type === 'fabric-berlin') groups = { 'Berlin': fabricColors['Berlin'] };
            else if (type === 'fabric-cuba') groups = { 'Cuba': fabricColors['Cuba'] };
            else if (type === 'fabric-faye') groups = { 'Faye': fabricColors['Faye'] };
            else if (type === 'fabric-galaxy') groups = { 'Galaxy Soft': fabricColors['Galaxy Soft'] };
            else if (type === 'fabric-globus') groups = { 'Globus': fabricColors['Globus'] };
            else if (type === 'french-leather') groups = { 'French Leather': leatherColors['French Leather'] };
            else if (type === 'german-leather') groups = { 'German Leather': leatherColors['German Leather'] };
            else groups = fabricColors;
            Object.keys(groups).forEach(function(groupName) {
                var groupEl = document.createElement('div');
                groupEl.className = 'material-swatch-group';
                var label = document.createElement('div');
                label.className = 'material-swatch-label';
                label.textContent = groupName;
                groupEl.appendChild(label);
                var row = document.createElement('div');
                row.className = 'material-swatch-row';
                var folder = 'assets/images/materials/' + groupName + '/';
                groups[groupName].forEach(function(file) {
                    var wrap = document.createElement('div');
                    wrap.className = 'swatch-wrap';
                    var sw = document.createElement('div');
                    sw.className = 'material-swatch';
                    var label = file.replace(/\.[^.]+$/, '');
                    sw.title = label;
                    sw.style.backgroundImage = 'url("' + folder + file + '")';
                    var tip = document.createElement('span');
                    tip.className = 'swatch-tooltip';
                    tip.textContent = label;
                    sw.addEventListener('click', function() {
                        materialSwatchesEl.querySelectorAll('.material-swatch').forEach(function(s) { s.classList.remove('active'); });
                        sw.classList.add('active');
                        if (mainImgEl) mainImgEl.src = folder + file;
                    });
                    wrap.appendChild(sw);
                    wrap.appendChild(tip);
                    row.appendChild(wrap);
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
        }

        // Load custom finishes from admin
        try {
            var customFinishes = JSON.parse(localStorage.getItem('furniturePampangaCustomFinishes') || '[]');
            if (customFinishes.length && finishSelect) {
                customFinishes.forEach(function(f) {
                    var opt = document.createElement('option');
                    opt.value = 'custom-' + f.name.toLowerCase().replace(/\s+/g, '-');
                    opt.textContent = f.name;
                    finishSelect.appendChild(opt);
                    var wrap = document.createElement('div');
                    wrap.className = 'swatch-wrap';
                    var sw = document.createElement('div');
                    sw.className = 'finish-swatch';
                    sw.setAttribute('data-value', opt.value);
                    sw.setAttribute('title', f.name);
                    sw.style.background = f.color;
                    var tip = document.createElement('span');
                    tip.className = 'swatch-tooltip';
                    tip.textContent = f.name;
                    wrap.appendChild(sw); wrap.appendChild(tip);
                    var swatchesContainer = document.getElementById('finishSwatches');
                    if (swatchesContainer) swatchesContainer.appendChild(wrap);
                    sw.addEventListener('click', function() { setFinish(opt.value); });
                });
            }
        } catch(e) {}

        // Load custom fabrics from admin
        try {
            var customFabrics = JSON.parse(localStorage.getItem('furniturePampangaCustomFabrics') || '[]');
            if (customFabrics.length && materialSelect && !(category && CATEGORIES_NO_MATERIAL[category])) {
                customFabrics.forEach(function(group) {
                    var optgroup = document.createElement('optgroup');
                    optgroup.label = group.name;
                    var opt = document.createElement('option');
                    opt.value = 'custom-fabric-' + group.name.toLowerCase().replace(/\s+/g, '-');
                    opt.textContent = group.name;
                    materialSelect.appendChild(opt);
                    fabricColors[group.name] = (group.swatches || []).map(function(sw) { return sw.url; });
                    // store full swatch data for rendering
                    fabricColors['__custom__' + group.name] = group.swatches || [];
                });
                // patch renderMaterialSwatches to handle custom fabrics
                var _origRender = renderMaterialSwatches;
                renderMaterialSwatches = function(type) {
                    var customGroup = customFabrics.find(function(g) {
                        return 'custom-fabric-' + g.name.toLowerCase().replace(/\s+/g, '-') === type;
                    });
                    if (customGroup) {
                        if (!materialSwatchesEl) return;
                        materialSwatchesEl.innerHTML = '';
                        var groupEl = document.createElement('div');
                        groupEl.className = 'material-swatch-group';
                        var lbl = document.createElement('div');
                        lbl.className = 'material-swatch-label';
                        lbl.textContent = customGroup.name;
                        groupEl.appendChild(lbl);
                        var row = document.createElement('div');
                        row.className = 'material-swatch-row';
                        (customGroup.swatches || []).forEach(function(sw) {
                            var wrap = document.createElement('div'); wrap.className = 'swatch-wrap';
                            var swEl = document.createElement('div'); swEl.className = 'material-swatch';
                            swEl.title = sw.name;
                            swEl.style.backgroundImage = 'url("' + sw.url + '")';
                            var tip = document.createElement('span'); tip.className = 'swatch-tooltip'; tip.textContent = sw.name;
                            swEl.addEventListener('click', function() {
                                materialSwatchesEl.querySelectorAll('.material-swatch').forEach(function(s) { s.classList.remove('active'); });
                                swEl.classList.add('active');
                                if (mainImgEl) mainImgEl.src = sw.url;
                            });
                            wrap.appendChild(swEl); wrap.appendChild(tip); row.appendChild(wrap);
                        });
                        groupEl.appendChild(row); materialSwatchesEl.appendChild(groupEl);
                    } else {
                        _origRender(type);
                    }
                };
            }
        } catch(e) {}

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

    // Home page: apply background image from admin (Home background image)
    // Note: the hero uses CSS background-image, so update the hero element itself.
    var hero = document.querySelector('.hero');
    if (hero) {
        try {
            var homeBg = (localStorage.getItem('furniturePampangaHomeBg') || '').trim();
            if (homeBg) {
                hero.style.setProperty('--home-hero-bg', 'url("' + homeBg.replace(/"/g, '\\"') + '")');
            }
        } catch (e) {}
    }
})();
}
if (window.runWhenStorageReady) {
    window.runWhenStorageReady(main);
} else {
    main();
}
})();
