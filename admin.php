<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Images - Furniture Pampanga</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500;6..96,600;6..96,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .upload-field { display: flex; align-items: center; gap: 0.6rem; margin-bottom: 0.5rem; }
        .upload-field input[type=file] { display: none; }
        .upload-btn {
            background: var(--accent, #c8956c); color: #fff; border: none;
            padding: 0.45rem 1rem; border-radius: 5px; cursor: pointer;
            font-size: 0.85rem; font-family: 'DM Sans', sans-serif; white-space: nowrap;
            transition: background 0.2s;
        }
        .upload-btn:hover { background: #b07d58; }
        .upload-thumb {
            width: 48px; height: 48px; object-fit: cover; border-radius: 4px;
            border: 1px solid var(--border-color, #e8e0d5); display: none;
        }
        .upload-status { font-size: 0.8rem; color: var(--text-muted, #888); }
        .upload-status.ok { color: #2e7d32; }
        .upload-status.err { color: #c62828; }
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
                <a href="admin-dashboard.php" class="admin-nav-link">🏠 Dashboard</a>
                <a href="admin.php" class="admin-nav-link active">🖼️ Manage Content</a>
                <a href="#" onclick="adminLogout(); return false;" class="admin-nav-link admin-logout">Logout</a>
            </nav>
        </div>
    </header>

    <main class="admin-page">
        <div class="admin-container">
            <h1>Product Image  Manager</h1>
            <p class="admin-desc">Attached images for each product. Images will be saved and displayed on product detail pages.</p>


            <div class="admin-card home-bg-card">
                <h2>Home background image</h2>
                <p class="admin-desc" style="margin-bottom: 1rem;">upload ang mga images para sa hero/banner ng home page. Ito ang malaking background sa taas ng Home.</p>
                <div class="home-bg-preview-wrap">
                    <div class="preview-box home-bg-preview empty" id="homeBgPreview">Preview</div>
                </div>
                <div class="upload-field">
                    <button type="button" class="upload-btn" onclick="document.getElementById('homeBgFile').click()">📁 Choose Image</button>
                    <input type="file" id="homeBgFile" accept="image/*" />
                    <img class="upload-thumb" id="homeBgThumb" />
                    <span class="upload-status" id="homeBgStatus"></span>
                </div>
                <div class="admin-card-footer">
                    <button type="button" class="btn-save" id="saveHomeBgBtn">Save Home Background</button>
                    <span id="saveHomeBgStatus" style="margin-left: 1rem; color: var(--text-muted); font-size: 0.9rem;"></span>
                </div>
            </div>

            <!-- Editor's Picks -->
            <div class="admin-card">
                <h2>Editor's Picks (Home page)</h2>
                <p class="admin-desc" style="margin-bottom:1rem;">I-upload ang 4 na images para sa Editor's Picks section sa Home page.</p>
                <div style="display:flex;flex-wrap:wrap;gap:1rem;">
                    <div><label class="admin-label">Pick 1</label><div class="upload-field"><button type="button" class="upload-btn" onclick="document.getElementById('editorPick0File').click()">📁 Choose</button><input type="file" id="editorPick0File" accept="image/*" /><img class="upload-thumb" id="editorPick0Thumb" /><span class="upload-status" id="editorPick0Status"></span></div></div>
                    <div><label class="admin-label">Pick 2</label><div class="upload-field"><button type="button" class="upload-btn" onclick="document.getElementById('editorPick1File').click()">📁 Choose</button><input type="file" id="editorPick1File" accept="image/*" /><img class="upload-thumb" id="editorPick1Thumb" /><span class="upload-status" id="editorPick1Status"></span></div></div>
                    <div><label class="admin-label">Pick 3</label><div class="upload-field"><button type="button" class="upload-btn" onclick="document.getElementById('editorPick2File').click()">📁 Choose</button><input type="file" id="editorPick2File" accept="image/*" /><img class="upload-thumb" id="editorPick2Thumb" /><span class="upload-status" id="editorPick2Status"></span></div></div>
                    <div><label class="admin-label">Pick 4</label><div class="upload-field"><button type="button" class="upload-btn" onclick="document.getElementById('editorPick3File').click()">📁 Choose</button><input type="file" id="editorPick3File" accept="image/*" /><img class="upload-thumb" id="editorPick3Thumb" /><span class="upload-status" id="editorPick3Status"></span></div></div>
                </div>
                <div class="admin-card-footer">
                    <button type="button" class="btn-save" id="saveEditorPicksBtn">Save Editor's Picks</button>
                    <span id="saveEditorPicksStatus" style="margin-left: 1rem; color: var(--text-muted); font-size: 0.9rem;"></span>
                </div>
            </div>

            <!-- Promotional Banner -->
            <div class="admin-card">
                <h2>Promotional Banner (Home page)</h2>
                <p class="admin-desc" style="margin-bottom:1rem;">I-upload ang image para sa "Crafted for comfort" promo section sa Home page.</p>
                <div class="upload-field">
                    <button type="button" class="upload-btn" onclick="document.getElementById('promoBannerFile').click()">📁 Choose Image</button>
                    <input type="file" id="promoBannerFile" accept="image/*" />
                    <img class="upload-thumb" id="promoBannerThumb" />
                    <span class="upload-status" id="promoBannerStatus"></span>
                </div>
                <div class="admin-card-footer">
                    <button type="button" class="btn-save" id="savePromoBannerBtn">Save Promo Banner</button>
                    <span id="savePromoBannerStatus" style="margin-left: 1rem; color: var(--text-muted); font-size: 0.9rem;"></span>
                </div>
            </div>

            <div class="admin-card">
                <label class="admin-label" for="productId">Product (ID)</label>
                <select id="productId" class="admin-input product-id-select">
                    <option value="chair-01">Chair 01 - Dining Chair (High-Back)</option>
                    <option value="chair-02">Chair 02 - Dining Chair (Low-Back)</option>
                    <option value="chair-03">Chair 03 - Dining Chair (Upholstered)</option>
                    <option value="chair-04">Chair 04 - Padded Dining Chair</option>
                    <option value="chair-05">Chair 05 - Solhiya Dining Chair</option>
                    <option value="bed-01">Bed 01 - Queen Sized Bed</option>
                    <option value="bed-02">Bed 02 - King Sized Bed</option>
                    <option value="bed-03">Bed 03 - Single Loft Bed</option>
                    <option value="bed-04">Bed 04 - Double Deck Bed</option>
                    <option value="bed-05">Bed 05 - Platform Bed</option>
                    <option value="center-01">Center Table 01 - Square Coffee Table</option>
                    <option value="center-02">Center Table 02 - Nesting Table Set</option>
                    <option value="center-03">Center Table 03 - Marble Top Table</option>
                    <option value="center-04">Center Table 04 - Oval Center Table</option>
                    <option value="ottoman-01">Ottoman 01 - Round Storage Ottoman</option>
                    <option value="ottoman-02">Ottoman 02 - Square Fabric Ottoman</option>
                    <option value="ottoman-03">Ottoman 03 - Leather Padded Ottoman</option>
                    <option value="ottoman-04">Ottoman 04 - Bench Ottoman</option>
                    <option value="table-01">Table 01 - Acacia Dining Table</option>
                    <option value="table-02">Table 02 - Solid Wood Dining Table</option>
                    <option value="table-03">Table 03 - Marble Dining Table</option>
                    <option value="table-04">Table 04 - Glass Dining Table</option>
                    <option value="table-05">Table 05 - Executive Desk</option>
                    <option value="accent-01">Accent Chair 01 - Lounge Accent Chair</option>
                    <option value="accent-02">Accent Chair 02 - Wingback Chair</option>
                    <option value="accent-03">Accent Chair 03 - Barrel Chair</option>
                    <option value="accent-04">Accent Chair 04 - Slipper Chair</option>
                    <option value="accent-05">Accent Chair 05 - Solhiya Accent</option>
                    <option value="console-01">Console 01 - Console with Drawers</option>
                    <option value="console-02">Console 02 - Minimalist Entryway Table</option>
                    <option value="console-03">Console 03 - Industrial Console</option>
                    <option value="console-04">Console 04 - Glass Console</option>
                    <option value="bench-01">Bench 01 - Padded Entryway Bench</option>
                    <option value="bench-02">Bench 02 - Solid Wood Bench</option>
                    <option value="bench-03">Bench 03 - Outdoor Garden Bench</option>
                    <option value="bench-04">Bench 04 - Bedroom End Bench</option>
                    <option value="sofa-01">Sofa 01 - Fully Upholstered Sofa</option>
                    <option value="sofa-02">Sofa 02 - Wood-Frame Sofa</option>
                    <option value="sofa-03">Sofa 03 - L-Shaped Sectional</option>
                    <option value="sofa-04">Sofa 04 - Loveseat</option>
                    <option value="sofa-05">Sofa 05 - Recliner Sofa</option>
                    <option value="night-01">Night Table 01 - Accent Night Table</option>
                    <option value="night-02">Night Table 02 - Square Side Table</option>
                    <option value="night-03">Night Table 03 - Round End Table</option>
                    <option value="night-04">Night Table 04 - Floating Nightstand</option>
                    <option value="barstool-01">Barstool 01 - Wood Upholstered Stool</option>
                    <option value="barstool-02">Barstool 02 - Industrial Metal Stool</option>
                    <option value="barstool-03">Barstool 03 - Adjustable Barstool</option>
                    <option value="barstool-04">Barstool 04 - Backless Stool</option>
                    <option value="outdoor-01">Outdoor 01 - Patio Dining Set</option>
                    <option value="outdoor-02">Outdoor 02 - Wicker Lounge Chair</option>
                    <option value="outdoor-03">Outdoor 03 - Garden Side Table</option>
                    <option value="outdoor-04">Outdoor 04 - Poolside Lounger</option>
                </select>
            </div>

            <div class="admin-card">
                <h2>Product images</h2>
                <div class="image-preview-row">
                    <div class="preview-box empty" data-preview="0">Preview 1</div>
                    <div class="preview-box empty" data-preview="1">Preview 2</div>
                    <div class="preview-box empty" data-preview="2">Preview 3</div>
                    <div class="preview-box empty" data-preview="3">Preview 4</div>
                </div>
                <label class="admin-label">Image 1 (main)</label>
                <div class="upload-field"><button type="button" class="upload-btn product-upload-btn" data-index="0">📁 Choose Image</button><input type="file" class="product-file-input" data-index="0" accept="image/*" /><img class="upload-thumb product-thumb" data-index="0" /><span class="upload-status product-upload-status" data-index="0"></span></div>
                <label class="admin-label">Image 2</label>
                <div class="upload-field"><button type="button" class="upload-btn product-upload-btn" data-index="1">📁 Choose Image</button><input type="file" class="product-file-input" data-index="1" accept="image/*" /><img class="upload-thumb product-thumb" data-index="1" /><span class="upload-status product-upload-status" data-index="1"></span></div>
                <label class="admin-label">Image 3</label>
                <div class="upload-field"><button type="button" class="upload-btn product-upload-btn" data-index="2">📁 Choose Image</button><input type="file" class="product-file-input" data-index="2" accept="image/*" /><img class="upload-thumb product-thumb" data-index="2" /><span class="upload-status product-upload-status" data-index="2"></span></div>
                <label class="admin-label">Image 4</label>
                <div class="upload-field"><button type="button" class="upload-btn product-upload-btn" data-index="3">📁 Choose Image</button><input type="file" class="product-file-input" data-index="3" accept="image/*" /><img class="upload-thumb product-thumb" data-index="3" /><span class="upload-status product-upload-status" data-index="3"></span></div>
                <input type="hidden" class="admin-image-url" data-index="0" />
                <input type="hidden" class="admin-image-url" data-index="1" />
                <input type="hidden" class="admin-image-url" data-index="2" />
                <input type="hidden" class="admin-image-url" data-index="3" />
            </div>

            <div class="admin-card tab-content-editor">
                <h2>Product tab content</h2>
                <p class="admin-desc" style="margin-bottom: 1rem;">Piliin ang subcategory at variant, tapos i-edit ang Description, Specifications, at Care Instructions para sa specific na item.</p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 1rem;">
                    <div style="flex: 1; min-width: 180px;">
                        <label class="admin-label" for="tabContentSubcategory">Subcategory</label>
                        <select id="tabContentSubcategory" class="admin-input">
                            <optgroup label="Chair">
                                <option value="chair_highback">Dining Chair (High-Back)</option>
                                <option value="chair_lowback">Dining Chair (Low-Back)</option>
                                <option value="chair_upholstered">Dining Chair (Upholstered)</option>
                                <option value="chair_padded">Padded Dining Chair</option>
                                <option value="chair_solhiya">Solhiya Dining Chair</option>
                            </optgroup>
                            <optgroup label="Bed">
                                <option value="bed_queen">Queen Sized Bed</option>
                                <option value="bed_king">King Sized Bed</option>
                                <option value="bed_singleloft">Single Loft Bed</option>
                                <option value="bed_doubledeck">Double Deck Bed</option>
                                <option value="bed_platform">Platform Bed</option>
                            </optgroup>
                            <optgroup label="Center Table">
                                <option value="center_squarecoffee">Square Coffee Table</option>
                                <option value="center_nesting">Nesting Table Set</option>
                                <option value="center_marbletop">Marble Top Table</option>
                                <option value="center_oval">Oval Center Table</option>
                            </optgroup>
                            <optgroup label="Ottoman">
                                <option value="ottoman_roundstorage">Round Storage Ottoman</option>
                                <option value="ottoman_squarefabric">Square Fabric Ottoman</option>
                                <option value="ottoman_leatherpadded">Leather Padded Ottoman</option>
                                <option value="ottoman_bench">Bench Ottoman</option>
                            </optgroup>
                            <optgroup label="Table">
                                <option value="table_acacia">Acacia Dining Table</option>
                                <option value="table_solidwood">Solid Wood Dining Table</option>
                                <option value="table_marble">Marble Dining Table</option>
                                <option value="table_glass">Glass Dining Table</option>
                                <option value="table_executive">Executive Desk</option>
                            </optgroup>
                            <optgroup label="Accent Chair">
                                <option value="accent_lounge">Lounge Accent Chair</option>
                                <option value="accent_wingback">Wingback Chair</option>
                                <option value="accent_barrel">Barrel Chair</option>
                                <option value="accent_slipper">Slipper Chair</option>
                                <option value="accent_solhiya">Solhiya Accent</option>
                            </optgroup>
                            <optgroup label="Console Table">
                                <option value="console_drawers">Console with Drawers</option>
                                <option value="console_minimalist">Minimalist Entryway Table</option>
                                <option value="console_industrial">Industrial Console</option>
                                <option value="console_glass">Glass Console</option>
                            </optgroup>
                            <optgroup label="Bench">
                                <option value="bench_paddedentry">Padded Entryway Bench</option>
                                <option value="bench_solidwood">Solid Wood Bench</option>
                                <option value="bench_outdoorgarden">Outdoor Garden Bench</option>
                                <option value="bench_bedroomend">Bedroom End Bench</option>
                            </optgroup>
                            <optgroup label="Sofa">
                                <option value="sofa_fullyupholstered">Fully Upholstered Sofa</option>
                                <option value="sofa_woodframe">Wood-Frame Sofa</option>
                                <option value="sofa_lshaped">L-Shaped Sectional</option>
                                <option value="sofa_loveseat">Loveseat</option>
                                <option value="sofa_recliner">Recliner Sofa</option>
                            </optgroup>
                            <optgroup label="Night Table">
                                <option value="night_accent">Accent Night Table</option>
                                <option value="night_squareside">Square Side Table</option>
                                <option value="night_roundend">Round End Table</option>
                                <option value="night_floating">Floating Nightstand</option>
                            </optgroup>
                            <optgroup label="Barstool">
                                <option value="barstool_woodupholstered">Wood Upholstered Stool</option>
                                <option value="barstool_industrialmetal">Industrial Metal Stool</option>
                                <option value="barstool_adjustable">Adjustable Barstool</option>
                                <option value="barstool_backless">Backless Stool</option>
                            </optgroup>
                            <optgroup label="Outdoor">
                                <option value="outdoor_patiodining">Patio Dining Set</option>
                                <option value="outdoor_wickerlounge">Wicker Lounge Chair</option>
                                <option value="outdoor_gardenside">Garden Side Table</option>
                                <option value="outdoor_poolside">Poolside Lounger</option>
                            </optgroup>
                        </select>
                    </div>
                    <div style="flex: 1; min-width: 140px;">
                        <label class="admin-label" for="tabContentVariant">Variant (item)</label>
                        <select id="tabContentVariant" class="admin-input">
                            <option value="valen">01 – Valen</option>
                            <option value="aurex">02 – Aurex</option>
                            <option value="serin">03 – Serin</option>
                            <option value="calver">04 – Calver</option>
                            <option value="elowen">05 – Elowen</option>
                            <option value="ravelle">06 – Ravelle</option>
                        </select>
                    </div>
                </div>
                <div class="tab-editor-tabs">
                    <button type="button" class="tab-editor-btn active" data-tab="description">Description</button>
                    <button type="button" class="tab-editor-btn" data-tab="specifications">Specifications</button>
                    <button type="button" class="tab-editor-btn" data-tab="care">Care Instructions</button>
                </div>
                <div class="tab-editor-pane active" id="pane-description">
                    <label class="admin-label">Description</label>
                    <textarea class="admin-input tab-content-input" id="content-description" placeholder="Product description..."></textarea>
                </div>
                <div class="tab-editor-pane" id="pane-specifications">
                    <label class="admin-label">Specifications</label>
                    <textarea class="admin-input tab-content-input" id="content-specifications" placeholder="Dimensions, weight, material..."></textarea>
                </div>
                <div class="tab-editor-pane" id="pane-care">
                    <label class="admin-label">Care instructions</label>
                    <textarea class="admin-input tab-content-input" id="content-care" placeholder="Cleaning and care..."></textarea>
                </div>
            </div>

            <div class="admin-card">
                <button type="button" class="btn-save" id="saveProductData">Save for this variant</button>
                <span id="saveStatus" style="margin-left: 1rem; color: var(--text-muted); font-size: 0.9rem;"></span>
            </div>

            <div class="admin-card admin-card-catalog-listing">
                <h2>Catalog listing images – Lahat ng category</h2>
                <p class="admin-desc" style="margin-bottom: 1rem;">Piliin ang category at subcategory sa baba, tapos i-set ang image URL para sa bawat item (01–06) na lumalabas sa page na iyon.</p>
                <div class="admin-card-catalog-listing-select-wrap" style="margin-bottom: 1.25rem;">
                    <label class="admin-label" for="catalogListingSubcategory">Category – Subcategory</label>
                    <select id="catalogListingSubcategory" class="admin-input" style="max-width: 400px;">
                        <optgroup label="Chair">
                            <option value="chair_highback">Dining Chair (High-Back)</option>
                            <option value="chair_lowback">Dining Chair (Low-Back)</option>
                            <option value="chair_upholstered">Dining Chair (Upholstered)</option>
                            <option value="chair_padded">Padded Dining Chair</option>
                            <option value="chair_solhiya">Solhiya Dining Chair</option>
                        </optgroup>
                        <optgroup label="Bed">
                            <option value="bed_queen">Queen Sized Bed</option>
                            <option value="bed_king">King Sized Bed</option>
                            <option value="bed_singleloft">Single Loft Bed</option>
                            <option value="bed_doubledeck">Double Deck Bed</option>
                            <option value="bed_platform">Platform Bed</option>
                        </optgroup>
                        <optgroup label="Center Table">
                            <option value="center_squarecoffee">Square Coffee Table</option>
                            <option value="center_nesting">Nesting Table Set</option>
                            <option value="center_marbletop">Marble Top Table</option>
                            <option value="center_oval">Oval Center Table</option>
                        </optgroup>
                        <optgroup label="Ottoman">
                            <option value="ottoman_roundstorage">Round Storage Ottoman</option>
                            <option value="ottoman_squarefabric">Square Fabric Ottoman</option>
                            <option value="ottoman_leatherpadded">Leather Padded Ottoman</option>
                            <option value="ottoman_bench">Bench Ottoman</option>
                        </optgroup>
                        <optgroup label="Table">
                            <option value="table_acacia">Acacia Dining Table</option>
                            <option value="table_solidwood">Solid Wood Dining Table</option>
                            <option value="table_marble">Marble Dining Table</option>
                            <option value="table_glass">Glass Dining Table</option>
                            <option value="table_executive">Executive Desk</option>
                        </optgroup>
                        <optgroup label="Accent Chair">
                            <option value="accent_lounge">Lounge Accent Chair</option>
                            <option value="accent_wingback">Wingback Chair</option>
                            <option value="accent_barrel">Barrel Chair</option>
                            <option value="accent_slipper">Slipper Chair</option>
                            <option value="accent_solhiya">Solhiya Accent</option>
                        </optgroup>
                        <optgroup label="Console Table">
                            <option value="console_drawers">Console with Drawers</option>
                            <option value="console_minimalist">Minimalist Entryway Table</option>
                            <option value="console_industrial">Industrial Console</option>
                            <option value="console_glass">Glass Console</option>
                        </optgroup>
                        <optgroup label="Bench">
                            <option value="bench_paddedentry">Padded Entryway Bench</option>
                            <option value="bench_solidwood">Solid Wood Bench</option>
                            <option value="bench_outdoorgarden">Outdoor Garden Bench</option>
                            <option value="bench_bedroomend">Bedroom End Bench</option>
                        </optgroup>
                        <optgroup label="Sofa">
                            <option value="sofa_fullyupholstered">Fully Upholstered Sofa</option>
                            <option value="sofa_woodframe">Wood-Frame Sofa</option>
                            <option value="sofa_lshaped">L-Shaped Sectional</option>
                            <option value="sofa_loveseat">Loveseat</option>
                            <option value="sofa_recliner">Recliner Sofa</option>
                        </optgroup>
                        <optgroup label="Night Table">
                            <option value="night_accent">Accent Night Table</option>
                            <option value="night_squareside">Square Side Table</option>
                            <option value="night_roundend">Round End Table</option>
                            <option value="night_floating">Floating Nightstand</option>
                        </optgroup>
                        <optgroup label="Barstool">
                            <option value="barstool_woodupholstered">Wood Upholstered Stool</option>
                            <option value="barstool_industrialmetal">Industrial Metal Stool</option>
                            <option value="barstool_adjustable">Adjustable Barstool</option>
                            <option value="barstool_backless">Backless Stool</option>
                        </optgroup>
                        <optgroup label="Outdoor">
                            <option value="outdoor_patiodining">Patio Dining Set</option>
                            <option value="outdoor_wickerlounge">Wicker Lounge Chair</option>
                            <option value="outdoor_gardenside">Garden Side Table</option>
                            <option value="outdoor_poolside">Poolside Lounger</option>
                        </optgroup>
                    </select>
                </div>
                <div class="catalog-listing-preview-row"></div>
                <button type="button" class="btn-save" id="saveCatalogListing">Save catalog listing images</button>
                <span id="catalogListingStatus" style="margin-left: 1rem; color: var(--text-muted); font-size: 0.9rem;"></span>
            </div>

            <div class="admin-card admin-card-catalog-listing">
                <h2>Product detail per design (variant) – Lahat ng category</h2>
                <p class="admin-desc" style="margin-bottom: 1rem;">Kapag kinlick ang isang item sa grid, ibang design ang lalabas sa product detail. Piliin ang category at subcategory, tapos para sa bawat design (01–06) ilagay ang pangalan at 4 image URLs para sa gallery sa detail page.</p>
                <div class="admin-card-catalog-listing-select-wrap" style="margin-bottom: 1.25rem;">
                    <label class="admin-label" for="variantDetailSubcategory">Category – Subcategory</label>
                    <select id="variantDetailSubcategory" class="admin-input" style="max-width: 400px;">
                        <optgroup label="Chair">
                            <option value="chair_highback">Dining Chair (High-Back)</option>
                            <option value="chair_lowback">Dining Chair (Low-Back)</option>
                            <option value="chair_upholstered">Dining Chair (Upholstered)</option>
                            <option value="chair_padded">Padded Dining Chair</option>
                            <option value="chair_solhiya">Solhiya Dining Chair</option>
                        </optgroup>
                        <optgroup label="Bed">
                            <option value="bed_queen">Queen Sized Bed</option>
                            <option value="bed_king">King Sized Bed</option>
                            <option value="bed_singleloft">Single Loft Bed</option>
                            <option value="bed_doubledeck">Double Deck Bed</option>
                            <option value="bed_platform">Platform Bed</option>
                        </optgroup>
                        <optgroup label="Center Table">
                            <option value="center_squarecoffee">Square Coffee Table</option>
                            <option value="center_nesting">Nesting Table Set</option>
                            <option value="center_marbletop">Marble Top Table</option>
                            <option value="center_oval">Oval Center Table</option>
                        </optgroup>
                        <optgroup label="Ottoman">
                            <option value="ottoman_roundstorage">Round Storage Ottoman</option>
                            <option value="ottoman_squarefabric">Square Fabric Ottoman</option>
                            <option value="ottoman_leatherpadded">Leather Padded Ottoman</option>
                            <option value="ottoman_bench">Bench Ottoman</option>
                        </optgroup>
                        <optgroup label="Table">
                            <option value="table_acacia">Acacia Dining Table</option>
                            <option value="table_solidwood">Solid Wood Dining Table</option>
                            <option value="table_marble">Marble Dining Table</option>
                            <option value="table_glass">Glass Dining Table</option>
                            <option value="table_executive">Executive Desk</option>
                        </optgroup>
                        <optgroup label="Accent Chair">
                            <option value="accent_lounge">Lounge Accent Chair</option>
                            <option value="accent_wingback">Wingback Chair</option>
                            <option value="accent_barrel">Barrel Chair</option>
                            <option value="accent_slipper">Slipper Chair</option>
                            <option value="accent_solhiya">Solhiya Accent</option>
                        </optgroup>
                        <optgroup label="Console Table">
                            <option value="console_drawers">Console with Drawers</option>
                            <option value="console_minimalist">Minimalist Entryway Table</option>
                            <option value="console_industrial">Industrial Console</option>
                            <option value="console_glass">Glass Console</option>
                        </optgroup>
                        <optgroup label="Bench">
                            <option value="bench_paddedentry">Padded Entryway Bench</option>
                            <option value="bench_solidwood">Solid Wood Bench</option>
                            <option value="bench_outdoorgarden">Outdoor Garden Bench</option>
                            <option value="bench_bedroomend">Bedroom End Bench</option>
                        </optgroup>
                        <optgroup label="Sofa">
                            <option value="sofa_fullyupholstered">Fully Upholstered Sofa</option>
                            <option value="sofa_woodframe">Wood-Frame Sofa</option>
                            <option value="sofa_lshaped">L-Shaped Sectional</option>
                            <option value="sofa_loveseat">Loveseat</option>
                            <option value="sofa_recliner">Recliner Sofa</option>
                        </optgroup>
                        <optgroup label="Night Table">
                            <option value="night_accent">Accent Night Table</option>
                            <option value="night_squareside">Square Side Table</option>
                            <option value="night_roundend">Round End Table</option>
                            <option value="night_floating">Floating Nightstand</option>
                        </optgroup>
                        <optgroup label="Barstool">
                            <option value="barstool_woodupholstered">Wood Upholstered Stool</option>
                            <option value="barstool_industrialmetal">Industrial Metal Stool</option>
                            <option value="barstool_adjustable">Adjustable Barstool</option>
                            <option value="barstool_backless">Backless Stool</option>
                        </optgroup>
                        <optgroup label="Outdoor">
                            <option value="outdoor_patiodining">Patio Dining Set</option>
                            <option value="outdoor_wickerlounge">Wicker Lounge Chair</option>
                            <option value="outdoor_gardenside">Garden Side Table</option>
                            <option value="outdoor_poolside">Poolside Lounger</option>
                        </optgroup>
                    </select>
                </div>
                <div class="variant-detail-grid" id="variantDetailGrid">
                    <div class="variant-detail-item" data-variant-id="valen">
                        <h3 class="variant-detail-name-label">01 – Valen</h3>
                        <label class="admin-label">Pangalan sa detail page (optional)</label>
                        <input type="text" class="admin-input variant-detail-name" placeholder="Valen" />
                        <label class="admin-label">Image 1 (main)</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="valen" data-img-index="0">📁 Choose</button><input type="file" class="variant-file-input" data-variant="valen" data-img-index="0" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="valen" data-img-index="0" style="display:none"/><span class="upload-status variant-upload-status" data-variant="valen" data-img-index="0"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="0" />
                        <label class="admin-label">Image 2</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="valen" data-img-index="1">📁 Choose</button><input type="file" class="variant-file-input" data-variant="valen" data-img-index="1" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="valen" data-img-index="1" style="display:none"/><span class="upload-status variant-upload-status" data-variant="valen" data-img-index="1"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="1" />
                        <label class="admin-label">Image 3</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="valen" data-img-index="2">📁 Choose</button><input type="file" class="variant-file-input" data-variant="valen" data-img-index="2" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="valen" data-img-index="2" style="display:none"/><span class="upload-status variant-upload-status" data-variant="valen" data-img-index="2"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="2" />
                        <label class="admin-label">Image 4</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="valen" data-img-index="3">📁 Choose</button><input type="file" class="variant-file-input" data-variant="valen" data-img-index="3" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="valen" data-img-index="3" style="display:none"/><span class="upload-status variant-upload-status" data-variant="valen" data-img-index="3"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="3" />
                    </div>
                    <div class="variant-detail-item" data-variant-id="aurex">
                        <h3 class="variant-detail-name-label">02 – Aurex</h3>
                        <label class="admin-label">Pangalan sa detail page (optional)</label>
                        <input type="text" class="admin-input variant-detail-name" placeholder="Aurex" />
                        <label class="admin-label">Image 1 (main)</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="aurex" data-img-index="0">📁 Choose</button><input type="file" class="variant-file-input" data-variant="aurex" data-img-index="0" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="aurex" data-img-index="0" style="display:none"/><span class="upload-status variant-upload-status" data-variant="aurex" data-img-index="0"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="0" />
                        <label class="admin-label">Image 2</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="aurex" data-img-index="1">📁 Choose</button><input type="file" class="variant-file-input" data-variant="aurex" data-img-index="1" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="aurex" data-img-index="1" style="display:none"/><span class="upload-status variant-upload-status" data-variant="aurex" data-img-index="1"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="1" />
                        <label class="admin-label">Image 3</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="aurex" data-img-index="2">📁 Choose</button><input type="file" class="variant-file-input" data-variant="aurex" data-img-index="2" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="aurex" data-img-index="2" style="display:none"/><span class="upload-status variant-upload-status" data-variant="aurex" data-img-index="2"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="2" />
                        <label class="admin-label">Image 4</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="aurex" data-img-index="3">📁 Choose</button><input type="file" class="variant-file-input" data-variant="aurex" data-img-index="3" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="aurex" data-img-index="3" style="display:none"/><span class="upload-status variant-upload-status" data-variant="aurex" data-img-index="3"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="3" />
                    </div>
                    <div class="variant-detail-item" data-variant-id="serin">
                        <h3 class="variant-detail-name-label">03 – Serin</h3>
                        <label class="admin-label">Pangalan sa detail page (optional)</label>
                        <input type="text" class="admin-input variant-detail-name" placeholder="Serin" />
                        <label class="admin-label">Image 1 (main)</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="serin" data-img-index="0">📁 Choose</button><input type="file" class="variant-file-input" data-variant="serin" data-img-index="0" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="serin" data-img-index="0" style="display:none"/><span class="upload-status variant-upload-status" data-variant="serin" data-img-index="0"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="0" />
                        <label class="admin-label">Image 2</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="serin" data-img-index="1">📁 Choose</button><input type="file" class="variant-file-input" data-variant="serin" data-img-index="1" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="serin" data-img-index="1" style="display:none"/><span class="upload-status variant-upload-status" data-variant="serin" data-img-index="1"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="1" />
                        <label class="admin-label">Image 3</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="serin" data-img-index="2">📁 Choose</button><input type="file" class="variant-file-input" data-variant="serin" data-img-index="2" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="serin" data-img-index="2" style="display:none"/><span class="upload-status variant-upload-status" data-variant="serin" data-img-index="2"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="2" />
                        <label class="admin-label">Image 4</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="serin" data-img-index="3">📁 Choose</button><input type="file" class="variant-file-input" data-variant="serin" data-img-index="3" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="serin" data-img-index="3" style="display:none"/><span class="upload-status variant-upload-status" data-variant="serin" data-img-index="3"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="3" />
                    </div>
                    <div class="variant-detail-item" data-variant-id="calver">
                        <h3 class="variant-detail-name-label">04 – Calver</h3>
                        <label class="admin-label">Pangalan sa detail page (optional)</label>
                        <input type="text" class="admin-input variant-detail-name" placeholder="Calver" />
                        <label class="admin-label">Image 1 (main)</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="calver" data-img-index="0">📁 Choose</button><input type="file" class="variant-file-input" data-variant="calver" data-img-index="0" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="calver" data-img-index="0" style="display:none"/><span class="upload-status variant-upload-status" data-variant="calver" data-img-index="0"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="0" />
                        <label class="admin-label">Image 2</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="calver" data-img-index="1">📁 Choose</button><input type="file" class="variant-file-input" data-variant="calver" data-img-index="1" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="calver" data-img-index="1" style="display:none"/><span class="upload-status variant-upload-status" data-variant="calver" data-img-index="1"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="1" />
                        <label class="admin-label">Image 3</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="calver" data-img-index="2">📁 Choose</button><input type="file" class="variant-file-input" data-variant="calver" data-img-index="2" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="calver" data-img-index="2" style="display:none"/><span class="upload-status variant-upload-status" data-variant="calver" data-img-index="2"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="2" />
                        <label class="admin-label">Image 4</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="calver" data-img-index="3">📁 Choose</button><input type="file" class="variant-file-input" data-variant="calver" data-img-index="3" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="calver" data-img-index="3" style="display:none"/><span class="upload-status variant-upload-status" data-variant="calver" data-img-index="3"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="3" />
                    </div>
                    <div class="variant-detail-item" data-variant-id="elowen">
                        <h3 class="variant-detail-name-label">05 – Elowen</h3>
                        <label class="admin-label">Pangalan sa detail page (optional)</label>
                        <input type="text" class="admin-input variant-detail-name" placeholder="Elowen" />
                        <label class="admin-label">Image 1 (main)</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="elowen" data-img-index="0">📁 Choose</button><input type="file" class="variant-file-input" data-variant="elowen" data-img-index="0" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="elowen" data-img-index="0" style="display:none"/><span class="upload-status variant-upload-status" data-variant="elowen" data-img-index="0"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="0" />
                        <label class="admin-label">Image 2</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="elowen" data-img-index="1">📁 Choose</button><input type="file" class="variant-file-input" data-variant="elowen" data-img-index="1" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="elowen" data-img-index="1" style="display:none"/><span class="upload-status variant-upload-status" data-variant="elowen" data-img-index="1"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="1" />
                        <label class="admin-label">Image 3</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="elowen" data-img-index="2">📁 Choose</button><input type="file" class="variant-file-input" data-variant="elowen" data-img-index="2" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="elowen" data-img-index="2" style="display:none"/><span class="upload-status variant-upload-status" data-variant="elowen" data-img-index="2"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="2" />
                        <label class="admin-label">Image 4</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="elowen" data-img-index="3">📁 Choose</button><input type="file" class="variant-file-input" data-variant="elowen" data-img-index="3" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="elowen" data-img-index="3" style="display:none"/><span class="upload-status variant-upload-status" data-variant="elowen" data-img-index="3"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="3" />
                    </div>
                    <div class="variant-detail-item" data-variant-id="ravelle">
                        <h3 class="variant-detail-name-label">06 – Ravelle</h3>
                        <label class="admin-label">Pangalan sa detail page (optional)</label>
                        <input type="text" class="admin-input variant-detail-name" placeholder="Ravelle" />
                        <label class="admin-label">Image 1 (main)</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="ravelle" data-img-index="0">📁 Choose</button><input type="file" class="variant-file-input" data-variant="ravelle" data-img-index="0" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="ravelle" data-img-index="0" style="display:none"/><span class="upload-status variant-upload-status" data-variant="ravelle" data-img-index="0"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="0" />
                        <label class="admin-label">Image 2</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="ravelle" data-img-index="1">📁 Choose</button><input type="file" class="variant-file-input" data-variant="ravelle" data-img-index="1" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="ravelle" data-img-index="1" style="display:none"/><span class="upload-status variant-upload-status" data-variant="ravelle" data-img-index="1"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="1" />
                        <label class="admin-label">Image 3</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="ravelle" data-img-index="2">📁 Choose</button><input type="file" class="variant-file-input" data-variant="ravelle" data-img-index="2" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="ravelle" data-img-index="2" style="display:none"/><span class="upload-status variant-upload-status" data-variant="ravelle" data-img-index="2"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="2" />
                        <label class="admin-label">Image 4</label>
                        <div class="upload-field"><button type="button" class="upload-btn variant-upload-btn" data-variant="ravelle" data-img-index="3">📁 Choose</button><input type="file" class="variant-file-input" data-variant="ravelle" data-img-index="3" accept="image/*" style="display:none"/><img class="upload-thumb variant-thumb" data-variant="ravelle" data-img-index="3" style="display:none"/><span class="upload-status variant-upload-status" data-variant="ravelle" data-img-index="3"></span></div>
                        <input type="hidden" class="variant-detail-img" data-img-index="3" />
                    </div>
                </div>
                <button type="button" class="btn-save" id="saveVariantDetails">Save product detail per design</button>
                <span id="variantDetailStatus" style="margin-left: 1rem; color: var(--text-muted); font-size: 0.9rem;"></span>
            </div>
        </div>
    </main>

    <script>
        // PHP session auth guard
        fetch('api.php?path=auth/check').then(r => r.json()).then(d => {
            if (!d.ok) window.location.href = 'admin-login.php';
        }).catch(() => { window.location.href = 'admin-login.php'; });
        async function adminLogout() {
            await fetch('api.php?path=auth/logout', { method: 'POST' });
            window.location.href = 'admin-login.php';
        }

        // ── Generic upload helper – uploads to api.php ──
        function uploadImage(file, folder) {
            var formData = new FormData();
            formData.append('image', file);
            var f = (folder || 'misc').replace('/upload/', '');
            return fetch('api.php?path=upload/' + f, { method: 'POST', body: formData })
                .then(function(r) { if (!r.ok) throw new Error('Upload failed (' + r.status + ')'); return r.json(); })
                .then(function(data) { if (!data.url) throw new Error('No URL returned'); return data; });
        }
        function uploadImageUrl(file, folder) {
            return uploadImage(file, folder).then(function(data) { return data.url; });
        }

        function apiJson(path, options) {
            return fetch(path, options).then(function(r) {
                if (!r.ok) throw new Error('Request failed (' + r.status + ')');
                return r.text().then(function(t) {
                    try { return t ? JSON.parse(t) : {}; } catch(e) { return {}; }
                });
            });
        }

        // ── Save site image to API ──
        function saveSiteImage(section, item_key, url) {
            return apiJson('api.php?path=site-images', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ section: section, item_key: item_key, url: url })
            });
        }

        // ── Hero background upload ──
        document.getElementById('homeBgFile').addEventListener('change', async function () {
            const file = this.files[0]; if (!file) return;
            const status = document.getElementById('homeBgStatus');
            const thumb = document.getElementById('homeBgThumb');
            status.textContent = 'Uploading...'; status.className = 'upload-status';
            try {
                const data = await uploadImage(file, 'hero');
                await saveSiteImage('hero', 'homeBg', data.url);
                thumb.src = data.url; thumb.style.display = 'inline-block';
                const preview = document.getElementById('homeBgPreview');
                if (preview) { preview.classList.remove('empty'); preview.innerHTML = '<img src="' + data.url + '" alt="">'; }
                status.textContent = 'Saved!'; status.className = 'upload-status ok';
            } catch (e) { status.textContent = 'Error: ' + e.message; status.className = 'upload-status err'; }
        });

        // ── Editor's Picks uploads ──
        [0,1,2,3].forEach(function(i) {
            var input = document.getElementById('editorPick' + i + 'File');
            if (!input) return;
            input.addEventListener('change', async function() {
                var file = input.files[0]; if (!file) return;
                var status = document.getElementById('editorPick' + i + 'Status');
                var thumb = document.getElementById('editorPick' + i + 'Thumb');
                status.textContent = 'Uploading...'; status.className = 'upload-status';
                try {
                    var data = await uploadImage(file, 'catalog');
                    await saveSiteImage('editorPicks', 'pick' + i, data.url);
                    thumb.src = data.url; thumb.style.display = 'inline-block';
                    status.textContent = 'Saved!'; status.className = 'upload-status ok';
                } catch(e) { status.textContent = 'Error: ' + e.message; status.className = 'upload-status err'; }
            });
        });

        // ── Promotional Banner upload ──
        document.getElementById('promoBannerFile').addEventListener('change', async function() {
            var file = this.files[0]; if (!file) return;
            var status = document.getElementById('promoBannerStatus');
            var thumb = document.getElementById('promoBannerThumb');
            status.textContent = 'Uploading...'; status.className = 'upload-status';
            try {
                var data = await uploadImage(file, 'hero');
                await saveSiteImage('promo', 'promoBanner', data.url);
                thumb.src = data.url; thumb.style.display = 'inline-block';
                status.textContent = 'Saved!'; status.className = 'upload-status ok';
            } catch(e) { status.textContent = 'Error: ' + e.message; status.className = 'upload-status err'; }
        });

        // ── Load existing thumbs on page load from API ──
        fetch('api.php?path=site-images').then(function(r){ return r.json(); }).then(function(d){
            var pairs = [
                [d.hero && d.hero.homeBg, 'homeBgThumb', 'homeBgPreview'],
                [d.editorPicks && d.editorPicks.pick0, 'editorPick0Thumb', null],
                [d.editorPicks && d.editorPicks.pick1, 'editorPick1Thumb', null],
                [d.editorPicks && d.editorPicks.pick2, 'editorPick2Thumb', null],
                [d.editorPicks && d.editorPicks.pick3, 'editorPick3Thumb', null],
                [d.promo && d.promo.promoBanner, 'promoBannerThumb', null]
            ];
            pairs.forEach(function(p){
                var item = p[0]; if (!item) return;
                var thumb = document.getElementById(p[1]);
                if (thumb) { thumb.src = item.url; thumb.style.display = 'inline-block'; }
                if (p[2]) { var prev = document.getElementById(p[2]); if (prev) { prev.classList.remove('empty'); prev.innerHTML = '<img src="' + item.url + '" alt="">'; } }
            });
        }).catch(function(){});

        // ── Manual Save buttons for Home sections ──
        document.getElementById('saveHomeBgBtn').addEventListener('click', async function() {
            var status = document.getElementById('saveHomeBgStatus');
            var thumb = document.getElementById('homeBgThumb');
            var url = (thumb && thumb.getAttribute('src') ? thumb.getAttribute('src') : '').trim();
            if (!url) { status.textContent = 'No image selected yet.'; status.style.color = '#c62828'; return; }
            status.textContent = 'Saving...'; status.style.color = '';
            try {
                await saveSiteImage('hero', 'homeBg', url);
                status.textContent = 'Saved!';
                status.style.color = '#2e7d32';
            } catch(e) {
                status.textContent = 'Error: ' + e.message;
                status.style.color = '#c62828';
            }
            setTimeout(function(){ status.textContent = ''; status.style.color = ''; }, 2500);
        });

        document.getElementById('saveEditorPicksBtn').addEventListener('click', async function() {
            var status = document.getElementById('saveEditorPicksStatus');
            status.textContent = 'Saving...'; status.style.color = '';
            try {
                for (var i = 0; i < 4; i++) {
                    var thumb = document.getElementById('editorPick' + i + 'Thumb');
                    var url = (thumb && thumb.getAttribute('src') ? thumb.getAttribute('src') : '').trim();
                    if (!url) continue;
                    await saveSiteImage('editorPicks', 'pick' + i, url);
                }
                status.textContent = 'Saved!';
                status.style.color = '#2e7d32';
            } catch(e) {
                status.textContent = 'Error: ' + e.message;
                status.style.color = '#c62828';
            }
            setTimeout(function(){ status.textContent = ''; status.style.color = ''; }, 2500);
        });

        document.getElementById('savePromoBannerBtn').addEventListener('click', async function() {
            var status = document.getElementById('savePromoBannerStatus');
            var thumb = document.getElementById('promoBannerThumb');
            var url = (thumb && thumb.getAttribute('src') ? thumb.getAttribute('src') : '').trim();
            if (!url) { status.textContent = 'No image selected yet.'; status.style.color = '#c62828'; return; }
            status.textContent = 'Saving...'; status.style.color = '';
            try {
                await saveSiteImage('promo', 'promoBanner', url);
                status.textContent = 'Saved!';
                status.style.color = '#2e7d32';
            } catch(e) {
                status.textContent = 'Error: ' + e.message;
                status.style.color = '#c62828';
            }
            setTimeout(function(){ status.textContent = ''; status.style.color = ''; }, 2500);
        });
    </script>
    <script>
        function setupImagePreviews() {
            var inputs = document.querySelectorAll('.admin-image-url');
            var boxes = document.querySelectorAll('.preview-box');
            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    var idx = parseInt(input.getAttribute('data-index'), 10);
                    var box = document.querySelector('.preview-box[data-preview="' + idx + '"]');
                    if (!box) return;
                    var url = (input.value || '').trim();
                    if (url) {
                        box.classList.remove('empty');
                        box.innerHTML = '<img src="' + url + '" alt="Preview" onerror="this.parentElement.classList.add(\'empty\'); this.parentElement.innerHTML=\'Invalid\';">';
                    } else {
                        box.classList.add('empty');
                        box.innerHTML = 'Preview ' + (idx + 1);
                    }
                });
            });
        }

        function initTabContentEditor() {
            var tabs = document.querySelectorAll('.tab-editor-btn');
            var panes = document.querySelectorAll('.tab-editor-pane');
            tabs.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var tab = btn.getAttribute('data-tab');
                    tabs.forEach(function (b) { b.classList.remove('active'); });
                    panes.forEach(function (p) { p.classList.remove('active'); });
                    btn.classList.add('active');
                    var pane = document.getElementById('pane-' + tab);
                    if (pane) pane.classList.add('active');
                });
            });
        }

function loadHomeBgIntoForm() { /* loaded via site-images API fetch below */ }

        document.addEventListener('DOMContentLoaded', function () {
            // ── Product image uploads ──
            document.querySelectorAll('.product-upload-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var idx = btn.getAttribute('data-index');
                    document.querySelector('.product-file-input[data-index="' + idx + '"]').click();
                });
            });
            document.querySelectorAll('.product-file-input').forEach(function(input) {
                input.addEventListener('change', async function() {
                    var idx = input.getAttribute('data-index');
                    var file = input.files[0];
                    if (!file) return;
                    var status = document.querySelector('.product-upload-status[data-index="' + idx + '"]');
                    var thumb = document.querySelector('.product-thumb[data-index="' + idx + '"]');
                    var hidden = document.querySelector('.admin-image-url[data-index="' + idx + '"]');
                    var preview = document.querySelector('.preview-box[data-preview="' + idx + '"]');
                    status.textContent = 'Uploading...'; status.className = 'upload-status';
                    try {
                        var url = await uploadImageUrl(file, 'product');
                        hidden.value = url;
                        thumb.src = url; thumb.style.display = 'inline-block';
                        if (preview) { preview.classList.remove('empty'); preview.innerHTML = '<img src="' + url + '" alt="Preview">'; }
                        // Auto-save to variant-details API
                        var sub = document.getElementById('variantDetailSubcategory') ? document.getElementById('variantDetailSubcategory').value : '';
                        var variantId = document.getElementById('tabContentVariant') ? document.getElementById('tabContentVariant').value : '';
                        if (sub && variantId) {
                            var nameInput = document.querySelector('.variant-detail-name');
                            await fetch('api.php?path=variant-details/' + sub, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ variant_id: variantId, name: nameInput ? nameInput.value : '', img_index: parseInt(idx), url: url })
                            });
                            status.textContent = '✓ Saved'; status.className = 'upload-status ok';
                        } else {
                            status.textContent = '✓ Uploaded'; status.className = 'upload-status ok';
                        }
                    } catch(e) {
                        status.textContent = 'Error: ' + e.message; status.className = 'upload-status err';
                    }
                });
            });

            initTabContentEditor();
            function loadAllForms() {
                loadHomeBgIntoForm();
                loadCatalogListingIntoForm();
                loadVariantDetailsIntoForm();
            }


        function getTabContentKey() {
                var sub = document.getElementById('tabContentSubcategory');
                var variant = document.getElementById('tabContentVariant');
                return 'furniturePampangaTabContent_' + (sub ? sub.value : 'chair_highback') + '_' + (variant ? variant.value : 'valen');
            }
            function loadTabContentIntoForm() {
                var sub = document.getElementById('tabContentSubcategory').value;
                var variant = document.getElementById('tabContentVariant').value;
                fetch('api.php?path=product-details&subcategory=' + sub + '&variant=' + variant)
                    .then(function(r){ return r.json(); })
                    .then(function(d){
                        document.getElementById('content-description').value = d.description || '';
                        document.getElementById('content-specifications').value = d.specifications || '';
                        document.getElementById('content-care').value = d.care || '';
                    }).catch(function(){});
            }
            document.getElementById('tabContentSubcategory').addEventListener('change', loadTabContentIntoForm);
            document.getElementById('tabContentVariant').addEventListener('change', loadTabContentIntoForm);
            loadTabContentIntoForm();

            document.getElementById('saveProductData').addEventListener('click', async function () {
                var sub = document.getElementById('tabContentSubcategory').value;
                var variant = document.getElementById('tabContentVariant').value;
                var d = {
                    subcategory: sub,
                    variant: variant,
                    description: document.getElementById('content-description').value,
                    specifications: document.getElementById('content-specifications').value,
                    care: document.getElementById('content-care').value
                };
                var status = document.getElementById('saveStatus');
                status.textContent = 'Saving...';
                try {
                    await fetch('api.php?path=product-details', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(d) });
                    status.textContent = 'Saved!';
                } catch(e) { status.textContent = 'Error: ' + e.message; }
                setTimeout(function () { status.textContent = ''; }, 2000);
            });

            var CATALOG_LISTING_PREFIX = 'furniturePampangaCatalogListing_';
            function getCatalogListingStorageKey() {
                var sel = document.getElementById('catalogListingSubcategory');
                return CATALOG_LISTING_PREFIX + (sel && sel.value ? sel.value : 'chair_highback');
            }
            function getCatalogListingData() { return {}; }
            function setCatalogListingData(obj) {}
            function updateCatalogListingPreviews() {
                document.querySelectorAll('.catalog-listing-url').forEach(function (input) {
                    var id = input.getAttribute('data-listing-id');
                    var url = (input.value || '').trim();
                    var box = document.querySelector('.catalog-listing-preview-box[data-catalog-preview="' + id + '"]');
                    if (box) {
                        if (url) {
                            box.classList.remove('empty');
                            box.innerHTML = '<img src="' + url + '" alt="" onerror="this.parentElement.classList.add(\'empty\'); this.parentElement.innerHTML=\'Invalid\';">';
                        } else {
                            box.classList.add('empty');
                            box.innerHTML = 'Preview';
                        }
                    }
                });
            }
            var NUMERIC_VARIANTS = [
                {id:'01',label:'01'},{id:'02',label:'02'},{id:'03',label:'03'},
                {id:'04',label:'04'},{id:'05',label:'05'},{id:'06',label:'06'}
            ];
            var CATALOG_LISTING_ITEMS = {
                chair_highback: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_lowback: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_upholstered: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_padded: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_solhiya: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                bed_queen: NUMERIC_VARIANTS, bed_king: NUMERIC_VARIANTS, bed_singleloft: NUMERIC_VARIANTS, bed_doubledeck: NUMERIC_VARIANTS, bed_platform: NUMERIC_VARIANTS,
                center_squarecoffee: NUMERIC_VARIANTS, center_nesting: NUMERIC_VARIANTS, center_marbletop: NUMERIC_VARIANTS, center_oval: NUMERIC_VARIANTS,
                ottoman_roundstorage: NUMERIC_VARIANTS, ottoman_squarefabric: NUMERIC_VARIANTS, ottoman_leatherpadded: NUMERIC_VARIANTS, ottoman_bench: NUMERIC_VARIANTS,
                table_acacia: NUMERIC_VARIANTS, table_solidwood: NUMERIC_VARIANTS, table_marble: NUMERIC_VARIANTS, table_glass: NUMERIC_VARIANTS, table_executive: NUMERIC_VARIANTS,
                accent_lounge: NUMERIC_VARIANTS, accent_wingback: NUMERIC_VARIANTS, accent_barrel: NUMERIC_VARIANTS, accent_slipper: NUMERIC_VARIANTS, accent_solhiya: NUMERIC_VARIANTS,
                console_drawers: NUMERIC_VARIANTS, console_minimalist: NUMERIC_VARIANTS, console_industrial: NUMERIC_VARIANTS, console_glass: NUMERIC_VARIANTS,
                bench_paddedentry: NUMERIC_VARIANTS, bench_solidwood: NUMERIC_VARIANTS, bench_outdoorgarden: NUMERIC_VARIANTS, bench_bedroomend: NUMERIC_VARIANTS,
                sofa_fullyupholstered: NUMERIC_VARIANTS, sofa_woodframe: NUMERIC_VARIANTS, sofa_lshaped: NUMERIC_VARIANTS, sofa_loveseat: NUMERIC_VARIANTS, sofa_recliner: NUMERIC_VARIANTS,
                night_accent: NUMERIC_VARIANTS, night_squareside: NUMERIC_VARIANTS, night_roundend: NUMERIC_VARIANTS, night_floating: NUMERIC_VARIANTS,
                barstool_woodupholstered: NUMERIC_VARIANTS, barstool_industrialmetal: NUMERIC_VARIANTS, barstool_adjustable: NUMERIC_VARIANTS, barstool_backless: NUMERIC_VARIANTS,
                outdoor_patiodining: NUMERIC_VARIANTS, outdoor_wickerlounge: NUMERIC_VARIANTS, outdoor_gardenside: NUMERIC_VARIANTS, outdoor_poolside: NUMERIC_VARIANTS
            };
            function rebuildCatalogListingForm() {
                var sel = document.getElementById('catalogListingSubcategory');
                var key = sel ? sel.value : 'chair_highback';
                var items = CATALOG_LISTING_ITEMS[key] || [];
                var row = document.querySelector('.catalog-listing-preview-row');
                if (!row) return;
                row.innerHTML = '';
                items.forEach(function(item) {
                    var div = document.createElement('div');
                    div.className = 'catalog-listing-preview-item';
                    div.innerHTML = '<label class="admin-label">' + item.label + '</label>' +
                        '<input type="text" class="admin-input catalog-listing-name" data-listing-id="' + item.id + '" placeholder="Item name (e.g. Valen)" style="margin-bottom:0.4rem;" />' +
                        '<div class="preview-box catalog-listing-preview-box empty" data-catalog-preview="' + item.id + '">Preview</div>' +
                        '<div class="upload-field">' +
                            '<button type="button" class="upload-btn catalog-upload-btn" data-listing-id="' + item.id + '">📁 Choose Image</button>' +
                            '<input type="file" class="catalog-file-input" data-listing-id="' + item.id + '" accept="image/*" style="display:none" />' +
                            '<img class="upload-thumb catalog-thumb" data-listing-id="' + item.id + '" style="display:none" />' +
                            '<span class="upload-status catalog-upload-status" data-listing-id="' + item.id + '"></span>' +
                            '<button type="button" class="upload-btn catalog-remove-btn" data-listing-id="' + item.id + '" style="background:#c62828;display:none;">✕ Remove</button>' +
                        '</div>' +
                        '<input type="hidden" class="catalog-listing-url" data-listing-id="' + item.id + '" />';
                    row.appendChild(div);
                });
                setupCatalogListingPreviews();
            }
            function loadCatalogListingIntoForm() {
                rebuildCatalogListingForm();
                var sub = document.getElementById('catalogListingSubcategory').value;
                fetch('api.php?path=catalog-listings/' + sub)
                    .then(function(r){ return r.json(); })
                    .then(function(data){
                        document.querySelectorAll('.catalog-listing-url').forEach(function(input) {
                            var id = input.getAttribute('data-listing-id');
                            var url = (data[id] ? (data[id].url || '') : '').trim();
                            input.value = url;
                            var nameInput = document.querySelector('.catalog-listing-name[data-listing-id="' + id + '"]');
                            if (nameInput) nameInput.value = (data[id] && data[id].name ? data[id].name : '').trim();
                            var removeBtn = document.querySelector('.catalog-remove-btn[data-listing-id="' + id + '"]');
                            if (removeBtn) removeBtn.style.display = url ? 'inline-block' : 'none';
                        });
                        updateCatalogListingPreviews();
                    }).catch(function(){});
            }
            function setupCatalogListingPreviews() {
                var row = document.querySelector('.catalog-listing-preview-row');
                if (!row) return;
                row.querySelectorAll('.catalog-upload-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var id = btn.getAttribute('data-listing-id');
                        row.querySelector('.catalog-file-input[data-listing-id="' + id + '"]').click();
                    });
                });
                row.querySelectorAll('.catalog-file-input').forEach(function(input) {
                    input.addEventListener('change', async function() {
                        var id = input.getAttribute('data-listing-id');
                        var file = input.files[0];
                        if (!file) return;
                        var item = row.querySelector('.catalog-listing-preview-item [data-listing-id="' + id + '"]');
                        if (item) item = item.closest('.catalog-listing-preview-item');
                        var status = row.querySelector('.catalog-upload-status[data-listing-id="' + id + '"]');
                        var thumb = row.querySelector('.catalog-thumb[data-listing-id="' + id + '"]');
                        var hidden = row.querySelector('.catalog-listing-url[data-listing-id="' + id + '"]');
                        var box = row.querySelector('.catalog-listing-preview-box[data-catalog-preview="' + id + '"]');
                        var removeBtn = row.querySelector('.catalog-remove-btn[data-listing-id="' + id + '"]');
                        status.textContent = 'Uploading...';
                        status.className = 'upload-status';
                        try {
                            var url = await uploadImageUrl(file, 'catalog');
                            hidden.value = url;
                            thumb.src = url; thumb.style.display = 'inline-block';
                            if (box) { box.classList.remove('empty'); box.innerHTML = '<img src="' + url + '" alt="">'; }
                            if (removeBtn) removeBtn.style.display = 'inline-block';
                            var sub = document.getElementById('catalogListingSubcategory').value;
                            var nameInput = row.querySelector('.catalog-listing-name[data-listing-id="' + id + '"]');
                            await apiJson('api.php?path=catalog-listings/' + sub, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({
                                    item_id: id,
                                    url: (url || '').trim(),
                                    name: (nameInput ? nameInput.value : '').trim()
                                })
                            });
                            status.textContent = 'Uploaded + Saved!';
                            status.className = 'upload-status ok';
                        } catch(e) {
                            status.textContent = 'Error: ' + e.message;
                            status.className = 'upload-status err';
                        }
                    });
                });
                row.querySelectorAll('.catalog-remove-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var id = btn.getAttribute('data-listing-id');
                        var hidden = row.querySelector('.catalog-listing-url[data-listing-id="' + id + '"]');
                        var thumb = row.querySelector('.catalog-thumb[data-listing-id="' + id + '"]');
                        var box = row.querySelector('.catalog-listing-preview-box[data-catalog-preview="' + id + '"]');
                        var status = row.querySelector('.catalog-upload-status[data-listing-id="' + id + '"]');
                        if (hidden) hidden.value = '';
                        if (thumb) { thumb.src = ''; thumb.style.display = 'none'; }
                        if (box) { box.classList.add('empty'); box.innerHTML = 'Preview'; }
                        if (status) { status.textContent = ''; }
                        btn.style.display = 'none';
                        var sub = document.getElementById('catalogListingSubcategory').value;
                        var nameInput = row.querySelector('.catalog-listing-name[data-listing-id="' + id + '"]');
                        apiJson('api.php?path=catalog-listings/' + sub, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                item_id: id,
                                url: '',
                                name: (nameInput ? nameInput.value : '').trim()
                            })
                        }).catch(function(){});
                    });
                });
            }
            document.getElementById('saveCatalogListing').addEventListener('click', async function () {
                var sub = document.getElementById('catalogListingSubcategory').value;
                var status = document.getElementById('catalogListingStatus');
                status.textContent = 'Saving...'; status.style.color = '';
                var promises = [];
                document.querySelectorAll('.catalog-listing-url').forEach(function (input) {
                    var id = input.getAttribute('data-listing-id'); if (!id) return;
                    var nameInput = document.querySelector('.catalog-listing-name[data-listing-id="' + id + '"]');
                    promises.push(fetch('api.php?path=catalog-listings/' + sub, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ item_id: id, url: (input.value||'').trim(), name: (nameInput ? nameInput.value : '').trim() })
                    }));
                });
                try {
                    await Promise.all(promises);
                    status.textContent = 'Saved!';
                } catch(e) { status.textContent = 'Error: ' + e.message; status.style.color = '#c62828'; }
                setTimeout(function(){ status.textContent = ''; status.style.color = ''; }, 3000);
            });

            var VARIANT_PREFIX = 'furniturePampangaCatalogVariants_';
            function getVariantDetailKey() {
                var sel = document.getElementById('variantDetailSubcategory');
                return VARIANT_PREFIX + (sel && sel.value ? sel.value : 'chair_highback');
            }
            var VARIANT_DETAIL_ITEMS = {
                chair_highback: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_lowback: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_upholstered: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_padded: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}],
                chair_solhiya: [{id:'valen',label:'01 – Valen'},{id:'aurex',label:'02 – Aurex'},{id:'serin',label:'03 – Serin'},{id:'calver',label:'04 – Calver'},{id:'elowen',label:'05 – Elowen'},{id:'ravelle',label:'06 – Ravelle'}]
            };
            function getVariantItems() {
                var sel = document.getElementById('variantDetailSubcategory');
                var key = sel ? sel.value : 'chair_highback';
                if (VARIANT_DETAIL_ITEMS[key]) return VARIANT_DETAIL_ITEMS[key];
                // For non-chair: use CATALOG_LISTING_ITEMS
                return CATALOG_LISTING_ITEMS[key] || [];
            }
            function rebuildVariantDetailForm() {
                var grid = document.getElementById('variantDetailGrid');
                if (!grid) return;
                var items = getVariantItems();
                grid.innerHTML = '';
                items.forEach(function(item) {
                    var div = document.createElement('div');
                    div.className = 'variant-detail-item';
                    div.setAttribute('data-variant-id', item.id);
                    var html = '<h3 class="variant-detail-name-label">' + item.label + '</h3>' +
                        '<label class="admin-label">Pangalan sa detail page (optional)</label>' +
                        '<input type="text" class="admin-input variant-detail-name" placeholder="' + item.label.replace(/^\d+ – /, '') + '" />';
                    [0,1,2,3].forEach(function(idx) {
                        html += '<label class="admin-label">Image ' + (idx+1) + (idx===0?' (main)':'') + '</label>' +
                            '<div class="upload-field">' +
                                '<button type="button" class="upload-btn variant-upload-btn" data-variant="' + item.id + '" data-img-index="' + idx + '">📁 Choose</button>' +
                                '<input type="file" class="variant-file-input" data-variant="' + item.id + '" data-img-index="' + idx + '" accept="image/*" style="display:none"/>' +
                                '<img class="upload-thumb variant-thumb" data-variant="' + item.id + '" data-img-index="' + idx + '" style="display:none"/>' +
                                '<span class="upload-status variant-upload-status" data-variant="' + item.id + '" data-img-index="' + idx + '"></span>' +
                                '<button type="button" class="upload-btn variant-remove-btn" data-variant="' + item.id + '" data-img-index="' + idx + '" style="background:#c62828;display:none;">✕ Remove</button>' +
                            '</div>' +
                            '<input type="hidden" class="variant-detail-img" data-img-index="' + idx + '" />';
                    });
                    div.innerHTML = html;
                    grid.appendChild(div);
                });
                // re-attach upload listeners
                grid.querySelectorAll('.variant-upload-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var v = btn.getAttribute('data-variant'), i = btn.getAttribute('data-img-index');
                        grid.querySelector('.variant-file-input[data-variant="'+v+'"][data-img-index="'+i+'"]').click();
                    });
                });
                grid.querySelectorAll('.variant-file-input').forEach(function(input) {
                    input.addEventListener('change', async function() {
                        var v = input.getAttribute('data-variant'), i = input.getAttribute('data-img-index');
                        var file = input.files[0]; if (!file) return;
                        var block = grid.querySelector('.variant-detail-item[data-variant-id="'+v+'"]');
                        var status = block.querySelector('.variant-upload-status[data-img-index="'+i+'"]');
                        var thumb = block.querySelector('.variant-thumb[data-img-index="'+i+'"]');
                        var hidden = block.querySelector('.variant-detail-img[data-img-index="'+i+'"]');
                        var removeBtn = block.querySelector('.variant-remove-btn[data-img-index="'+i+'"]');
                        status.textContent = 'Uploading...'; status.className = 'upload-status';
                        try {
                            var url = await uploadImageUrl(file, 'variant');
                            hidden.value = url;
                            thumb.src = url; thumb.style.display = 'inline-block';
                            if (removeBtn) removeBtn.style.display = 'inline-block';
                            var sub = document.getElementById('variantDetailSubcategory').value;
                            var nameInput = block.querySelector('.variant-detail-name');
                            await apiJson('api.php?path=variant-details/' + sub, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({
                                    variant_id: v,
                                    name: (nameInput ? nameInput.value : '').trim(),
                                    img_index: parseInt(i, 10),
                                    url: (url || '').trim()
                                })
                            });
                            status.textContent = 'Uploaded + Saved!';
                            status.className = 'upload-status ok';
                        } catch(e) { status.textContent = 'Error: '+e.message; status.className = 'upload-status err'; }
                    });
                });
                grid.querySelectorAll('.variant-remove-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var v = btn.getAttribute('data-variant'), i = btn.getAttribute('data-img-index');
                        var block = grid.querySelector('.variant-detail-item[data-variant-id="'+v+'"]');
                        var hidden = block.querySelector('.variant-detail-img[data-img-index="'+i+'"]');
                        var thumb = block.querySelector('.variant-thumb[data-img-index="'+i+'"]');
                        var status = block.querySelector('.variant-upload-status[data-img-index="'+i+'"]');
                        if (hidden) hidden.value = '';
                        if (thumb) { thumb.src = ''; thumb.style.display = 'none'; }
                        if (status) status.textContent = '';
                        btn.style.display = 'none';
                        var sub = document.getElementById('variantDetailSubcategory').value;
                        var nameInput = block.querySelector('.variant-detail-name');
                        apiJson('api.php?path=variant-details/' + sub, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                variant_id: v,
                                name: (nameInput ? nameInput.value : '').trim(),
                                img_index: parseInt(i, 10),
                                url: ''
                            })
                        }).catch(function(){});
                    });
                });
            }
            function loadVariantDetailsIntoForm() {
                rebuildVariantDetailForm();
                var sub = document.getElementById('variantDetailSubcategory').value;
                fetch('api.php?path=variant-details/' + sub)
                    .then(function(r){ return r.json(); })
                    .then(function(data){
                        getVariantItems().forEach(function(item) {
                            var block = document.querySelector('.variant-detail-item[data-variant-id="'+item.id+'"]');
                            if (!block) return;
                            var saved = data[item.id] || {};
                            var nameInput = block.querySelector('.variant-detail-name');
                            if (nameInput) nameInput.value = (saved.name || '').trim();
                            [0,1,2,3].forEach(function(idx) {
                                var hidden = block.querySelector('.variant-detail-img[data-img-index="'+idx+'"]');
                                var thumb = block.querySelector('.variant-thumb[data-img-index="'+idx+'"]');
                                var removeBtn = block.querySelector('.variant-remove-btn[data-img-index="'+idx+'"]');
                                var url = ((saved.images||[])[idx]||'').trim();
                                if (hidden) hidden.value = url;
                                if (thumb && url) { thumb.src = url; thumb.style.display = 'inline-block'; }
                                if (removeBtn) removeBtn.style.display = url ? 'inline-block' : 'none';
                            });
                        });
                    }).catch(function(){});
            }
            document.getElementById('catalogListingSubcategory').addEventListener('change', loadCatalogListingIntoForm);
            document.getElementById('variantDetailSubcategory').addEventListener('change', loadVariantDetailsIntoForm);
            if (window.runWhenStorageReady) {
                window.runWhenStorageReady(loadAllForms);
            } else {
                loadAllForms();
            }
            document.getElementById('saveVariantDetails').addEventListener('click', async function () {
                var sub = document.getElementById('variantDetailSubcategory').value;
                var status = document.getElementById('variantDetailStatus');
                status.textContent = 'Saving...'; status.style.color = '';
                var promises = [];
                document.querySelectorAll('.variant-detail-item').forEach(function (block) {
                    var id = block.getAttribute('data-variant-id'); if (!id) return;
                    var nameInput = block.querySelector('.variant-detail-name');
                    var name = (nameInput ? nameInput.value : '').trim();
                    block.querySelectorAll('.variant-detail-img').forEach(function (input, idx) {
                        promises.push(fetch('api.php?path=variant-details/' + sub, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ variant_id: id, name: name, img_index: idx, url: (input.value||'').trim() })
                        }));
                    });
                });
                try {
                    await Promise.all(promises);
                    status.textContent = 'Saved!';
                } catch(e) { status.textContent = 'Error: ' + e.message; status.style.color = '#c62828'; }
                setTimeout(function(){ status.textContent = ''; status.style.color = ''; }, 3000);
            });


        });
    </script>


    <style>
        .cat-manager-item { background: var(--bg-light,#faf8f5); border: 1px solid var(--border-color,#e8e0d5); border-radius:8px; padding:1rem; margin-bottom:0.75rem; }
        .cat-manager-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:0.6rem; flex-wrap:wrap; gap:0.4rem; }
        .cat-manager-subs { display:flex; flex-wrap:wrap; gap:0.4rem; align-items:center; margin-bottom:0.5rem; }
        .cat-sub-tag { background:#e8e0d5; border-radius:20px; padding:0.2rem 0.6rem; font-size:0.82rem; display:flex; align-items:center; gap:0.3rem; }
        .cat-sub-del { background:none; border:none; cursor:pointer; color:#c62828; font-size:0.8rem; padding:0; line-height:1; }
        .cat-add-sub-row { display:flex; gap:0.5rem; align-items:center; flex-wrap:wrap; margin-top:0.6rem; }
        .finish-manager-item { display:flex; align-items:center; gap:0.6rem; padding:0.5rem 0; border-bottom:1px solid var(--border-color,#e8e0d5); flex-wrap:wrap; }
        .finish-manager-item:last-child { border-bottom:none; }
        .fabric-swatches-row { display:flex; flex-wrap:wrap; gap:0.5rem; align-items:flex-start; margin-bottom:0.5rem; }
        .fabric-swatch-item { display:flex; flex-direction:column; align-items:center; gap:0.2rem; position:relative; }
        .fabric-swatch-item .cat-sub-del { position:absolute; top:-4px; right:-4px; background:#c62828; color:#fff; border-radius:50%; width:16px; height:16px; font-size:10px; display:flex; align-items:center; justify-content:center; }
        .finish-img-preview { width:40px; height:40px; object-fit:cover; border-radius:4px; border:1px solid var(--border-color,#e8e0d5); display:none; }
    </style>

    <script>
    function escH(s) { return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }

   
    // ── Team Page Images ──
    (function(){
        var container = document.querySelector('.admin-container');
        if (!container) return;
        var card = document.createElement('div');
        card.className = 'admin-card';
        card.id = 'teamImagesCard';
        var members = [
            { id:'ceo',        label:'CEO' },
            { id:'finance',    label:'Finance Manager' },
            { id:'sales',      label:'Sales Manager' },
            { id:'production', label:'Production Manager' }
        ];
        card.innerHTML =
            '<h2>👥 Team page images</h2>' +
            '<p class="admin-desc">I-upload ang photos ng bawat team member.</p>' +
            members.map(function(m){
                return '<label class="admin-label">' + m.label + '</label>' +
                    '<div class="upload-field">' +
                        '<button type="button" class="upload-btn team-upload-btn" data-team-id="' + m.id + '">📁 Choose Image</button>' +
                        '<input type="file" class="team-file" data-team-id="' + m.id + '" accept="image/*" style="display:none" />' +
                        '<img class="upload-thumb team-thumb" data-team-id="' + m.id + '" style="display:none" />' +
                        '<span class="upload-status team-status" data-team-id="' + m.id + '"></span>' +
                    '</div>';
            }).join('') +
            '<div class="admin-card-footer">' +
                '<button type="button" class="btn-save" id="saveTeamBtn">💾 Save Team Images</button>' +
                '<span id="saveTeamStatus" style="margin-left:1rem;font-size:0.9rem;color:var(--text-muted);"></span>' +
            '</div>';
        var firstCard = container.querySelector('.admin-card');
        container.insertBefore(card, firstCard);

        fetch('api.php?path=site-images').then(r => r.json()).then(function(d){
            members.forEach(function(m){
                var saved = d.team && d.team[m.id];
                if (!saved) return;
                var thumb = card.querySelector('.team-thumb[data-team-id="'+m.id+'"]');
                if (thumb) { thumb.src = saved.url; thumb.style.display = 'inline-block'; }
            });
        }).catch(function(){});

        members.forEach(function(m){
            var fileInput = card.querySelector('.team-file[data-team-id="'+m.id+'"]');
            var btn = card.querySelector('.team-upload-btn[data-team-id="'+m.id+'"]');
            var status = card.querySelector('.team-status[data-team-id="'+m.id+'"]');
            var thumb = card.querySelector('.team-thumb[data-team-id="'+m.id+'"]');
            btn.addEventListener('click', function(){ fileInput.click(); });
            fileInput.addEventListener('change', async function(){
                var file = fileInput.files[0]; if (!file) return;
                status.textContent = 'Uploading...'; status.className = 'upload-status';
                try {
                    var data = await uploadImage(file, 'hero');
                    await saveSiteImage('team', m.id, data.url);
                    thumb.src = data.url; thumb.style.display = 'inline-block';
                    status.textContent = '✓ Saved'; status.className = 'upload-status ok';
                } catch(e){ status.textContent = 'Error: '+e.message; status.className = 'upload-status err'; }
            });
        });

        document.getElementById('saveTeamBtn').addEventListener('click', async function(){
            var st = document.getElementById('saveTeamStatus');
            st.textContent = 'Saving...'; st.style.color = '';
            try {
                for (var i = 0; i < members.length; i++) {
                    var thumb = card.querySelector('.team-thumb[data-team-id="'+members[i].id+'"]');
                    var url = (thumb && thumb.getAttribute('src') ? thumb.getAttribute('src') : '').trim();
                    if (!url) continue;
                    await saveSiteImage('team', members[i].id, url);
                }
                st.textContent = 'Saved!'; st.style.color = '#2e7d32';
            } catch(e){ st.textContent = 'Error: '+e.message; st.style.color = '#c62828'; }
            setTimeout(function(){ st.textContent = ''; st.style.color = ''; }, 2500);
        });
    })();

    // ── About Page Images ──
    (function(){
        var container = document.querySelector('.admin-container');
        if (!container) return;
        var card = document.createElement('div');
        card.className = 'admin-card';
        card.id = 'aboutImagesCard';
        var items = [
            { id:'aboutHero',   label:'Hero / Banner background' },
            { id:'aboutBlock1', label:'Section 1 – Furniture Design' },
            { id:'aboutBlock2', label:'Section 2 – Craftsmanship' },
            { id:'aboutBlock3', label:'Section 3 – Quality & Comfort' }
        ];
        card.innerHTML =
            '<h2>🖼️ About page images</h2>' +
            '<p class="admin-desc">I-upload ang images para sa About page sections.</p>' +
            items.map(function(item){
                return '<label class="admin-label">' + item.label + '</label>' +
                    '<div class="upload-field">' +
                        '<button type="button" class="upload-btn about-upload-btn" data-about-id="' + item.id + '">📁 Choose Image</button>' +
                        '<input type="file" class="about-file" data-about-id="' + item.id + '" accept="image/*" style="display:none" />' +
                        '<img class="upload-thumb about-thumb" data-about-id="' + item.id + '" style="display:none" />' +
                        '<span class="upload-status about-status" data-about-id="' + item.id + '"></span>' +
                    '</div>';
            }).join('') +
            '<div class="admin-card-footer">' +
                '<span class="admin-status-msg" id="aboutSaveStatus"></span>' +
            '</div>';
        var firstCard = container.querySelector('.admin-card');
        container.insertBefore(card, firstCard);

        // load saved thumbs from API
        fetch('api.php?path=site-images').then(r => r.json()).then(function(d){
            items.forEach(function(item){
                var saved = d.about && d.about[item.id];
                if (!saved) return;
                var thumb = card.querySelector('.about-thumb[data-about-id="'+item.id+'"]');
                if (thumb) { thumb.src = saved.url; thumb.style.display = 'inline-block'; }
            });
        }).catch(function(){});

        items.forEach(function(item){
            var fileInput = card.querySelector('.about-file[data-about-id="'+item.id+'"]');
            var btn = card.querySelector('.about-upload-btn[data-about-id="'+item.id+'"]');
            var status = card.querySelector('.about-status[data-about-id="'+item.id+'"]');
            var thumb = card.querySelector('.about-thumb[data-about-id="'+item.id+'"]');
            btn.addEventListener('click', function(){ fileInput.click(); });
            fileInput.addEventListener('change', async function(){
                var file = fileInput.files[0]; if (!file) return;
                status.textContent = 'Uploading...'; status.className = 'upload-status';
                try {
                    var data = await uploadImage(file, 'hero');
                    await saveSiteImage('about', item.id, data.url);
                    thumb.src = data.url; thumb.style.display = 'inline-block';
                    status.textContent = '✓ Saved'; status.className = 'upload-status ok';
                } catch(e){ status.textContent = 'Error: '+e.message; status.className = 'upload-status err'; }
            });
        });
    })();

    // ── Category & Item Manager ──
    (function(){
        var container = document.querySelector('.admin-container');
        if (!container) return;
        var card = document.createElement('div');
        card.className = 'admin-card';
        card.innerHTML =
            '<h2>📂 Category & Item Manager</h2>' +
            '<p class="admin-desc">Mag-add ng bagong category (may thumbnail image) at subcategory/items. Lalabas ito sa catalog.</p>' +
            '<div style="display:flex;gap:0.5rem;align-items:center;flex-wrap:wrap;margin-bottom:0.5rem;">' +
                '<input type="text" id="newCategoryName" class="admin-input" placeholder="Bagong category name..." style="max-width:200px;margin-bottom:0;" />' +
                '<button type="button" class="upload-btn" id="newCatImgBtn">📁 Category image</button>' +
                '<input type="file" id="newCatImgFile" accept="image/*" style="display:none" />' +
                '<img id="newCatImgThumb" class="upload-thumb" style="display:none" />' +
                '<span class="upload-status" id="newCatImgStatus"></span>' +
            '</div>' +
            '<input type="hidden" id="newCatImgUrl" />' +
            '<div style="display:flex;gap:0.5rem;align-items:center;flex-wrap:wrap;margin-bottom:1.25rem;">' +
                '<button type="button" class="btn-save" id="addCategoryBtn">+ Add Category</button>' +
            '</div>' +
            '<div id="categoryList"></div>' +
            '<div class="admin-card-footer" style="margin-top:1rem;">' +
                '<button type="button" class="btn-save" id="saveCategoriesBtn">💾 Save Categories</button>' +
                '<span id="saveCategoriesStatus" style="margin-left:1rem;font-size:0.9rem;color:var(--text-muted);"></span>' +
            '</div>';
        container.appendChild(card);

        var cats = [];

        function loadCats() {
            fetch('api.php?path=categories').then(r => r.json()).then(function(data){
                cats = Array.isArray(data) ? data : [];
                renderCats();
            }).catch(function(){ renderCats(); });
        }

        document.getElementById('newCatImgBtn').addEventListener('click', function(){ document.getElementById('newCatImgFile').click(); });
        document.getElementById('newCatImgFile').addEventListener('change', async function(){
            var file = this.files[0]; if (!file) return;
            var status = document.getElementById('newCatImgStatus');
            var thumb = document.getElementById('newCatImgThumb');
            status.textContent = 'Uploading...'; status.className = 'upload-status';
            try {
                var url = await uploadImageUrl(file, 'catalog');
                document.getElementById('newCatImgUrl').value = url;
                thumb.src = url; thumb.style.display = 'inline-block';
                status.textContent = '✓ Ready'; status.className = 'upload-status ok';
            } catch(e){ status.textContent = 'Error: '+e.message; status.className = 'upload-status err'; }
        });

        document.getElementById('addCategoryBtn').addEventListener('click', async function(){
            var name = (document.getElementById('newCategoryName').value||'').trim(); if (!name) return;
            var imgUrl = (document.getElementById('newCatImgUrl').value||'').trim();
            try {
                await fetch('api.php?path=categories', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ name: name, img_url: imgUrl, subs: [] })
                });
                document.getElementById('newCategoryName').value = '';
                document.getElementById('newCatImgUrl').value = '';
                document.getElementById('newCatImgThumb').style.display = 'none';
                document.getElementById('newCatImgStatus').textContent = '';
                loadCats();
            } catch(e) { alert('Error: ' + e.message); }
        });

        var DYNAMIC_OPTGROUP_ATTR = 'data-dynamic-cats';
        function injectDynamicCatsToSelects(catList) {
            var selects = ['tabContentSubcategory','catalogListingSubcategory','variantDetailSubcategory'];
            selects.forEach(function(selId) {
                var sel = document.getElementById(selId);
                if (!sel) return;
                // remove previously injected optgroups
                sel.querySelectorAll('optgroup[' + DYNAMIC_OPTGROUP_ATTR + ']').forEach(function(og){ og.remove(); });
                catList.forEach(function(cat) {
                    if (!cat.subs || !cat.subs.length) return;
                    var slug = cat.name.toLowerCase().replace(/\s+/g, '-');
                    var og = document.createElement('optgroup');
                    og.label = cat.name;
                    og.setAttribute(DYNAMIC_OPTGROUP_ATTR, '1');
                    cat.subs.forEach(function(sub) {
                        var subSlug = sub.toLowerCase().replace(/\s+/g, '-');
                        var key = (slug + '_' + subSlug).replace(/-/g, '');
                        var opt = document.createElement('option');
                        opt.value = key;
                        opt.textContent = sub;
                        og.appendChild(opt);
                    });
                    sel.appendChild(og);
                });
            });
        }

        function renderCats(){
            var list = document.getElementById('categoryList');
            list.innerHTML = '';
            injectDynamicCatsToSelects(cats);
            if (!cats.length){ list.innerHTML = '<p style="color:var(--text-muted);font-size:0.9rem;">Walang custom category pa.</p>'; return; }
            cats.forEach(function(cat){
                var div = document.createElement('div');
                div.className = 'cat-manager-item';
                div.innerHTML =
                    '<div class="cat-manager-header">' +
                        (cat.img_url ? '<img src="'+escH(cat.img_url)+'" style="width:48px;height:48px;object-fit:cover;border-radius:6px;border:1px solid #e5e5e5;" />' : '') +
                        '<strong style="flex:1;margin-left:0.5rem;">'+escH(cat.name)+'</strong>' +
                        '<button class="upload-btn" style="font-size:0.78rem;padding:0.25rem 0.6rem;" data-cat-img-btn="'+cat.id+'">📁 Change image</button>' +
                        '<input type="file" class="cat-img-file" data-ci="'+cat.id+'" accept="image/*" style="display:none" />' +
                        '<span class="upload-status cat-img-status" data-ci="'+cat.id+'"></span>' +
                        '<button class="upload-btn" style="background:#c62828;padding:0.3rem 0.7rem;font-size:0.78rem;" data-del-cat="'+cat.id+'">✕ Remove</button>' +
                    '</div>' +
                    '<div class="cat-manager-subs">' +
                        (cat.subs||[]).map(function(sub,si){
                            return '<span class="cat-sub-tag">'+escH(sub)+' <button class="cat-sub-del" data-ci="'+cat.id+'" data-si="'+si+'">✕</button></span>';
                        }).join('') +
                    '</div>' +
                    '<div class="cat-add-sub-row">' +
                        '<input type="text" class="admin-input cat-sub-input" data-ci="'+cat.id+'" placeholder="Add subcategory/item..." style="max-width:200px;padding:0.3rem 0.6rem;font-size:0.85rem;margin-bottom:0;" />' +
                        '<button class="upload-btn cat-add-sub-btn" data-ci="'+cat.id+'" style="padding:0.3rem 0.8rem;font-size:0.85rem;">+ Add item</button>' +
                    '</div>';
                list.appendChild(div);
            });
            list.querySelectorAll('[data-cat-img-btn]').forEach(function(btn){
                btn.addEventListener('click', function(){ list.querySelector('.cat-img-file[data-ci="'+btn.getAttribute('data-cat-img-btn')+'"]').click(); });
            });
            list.querySelectorAll('.cat-img-file').forEach(function(input){
                input.addEventListener('change', async function(){
                    var ci = input.getAttribute('data-ci');
                    var file = input.files[0]; if (!file) return;
                    var status = list.querySelector('.cat-img-status[data-ci="'+ci+'"]');
                    status.textContent = 'Uploading...'; status.className = 'upload-status';
                    try {
                        var url = await uploadImageUrl(file, 'catalog');
                        var cat = cats.find(c => String(c.id) === String(ci));
                        if (cat) {
                            await fetch('api.php?path=categories/' + ci, {
                                method: 'PUT',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ name: cat.name, img_url: url, subs: cat.subs || [] })
                            });
                        }
                        status.textContent = '✓ Updated'; status.className = 'upload-status ok';
                        loadCats();
                    } catch(e){ status.textContent = 'Error'; status.className = 'upload-status err'; }
                });
            });
            list.querySelectorAll('[data-del-cat]').forEach(function(btn){
                btn.addEventListener('click', async function(){
                    var ci = btn.getAttribute('data-del-cat');
                    await fetch('api.php?path=categories/' + ci, { method: 'DELETE' }).catch(() => {});
                    loadCats();
                });
            });
            list.querySelectorAll('.cat-sub-del').forEach(function(btn){
                btn.addEventListener('click', async function(){
                    var ci = btn.getAttribute('data-ci'), si = parseInt(btn.getAttribute('data-si'));
                    var cat = cats.find(c => String(c.id) === String(ci));
                    if (!cat) return;
                    cat.subs.splice(si, 1);
                    await fetch('api.php?path=categories/' + ci, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ name: cat.name, img_url: cat.img_url || '', subs: cat.subs })
                    }).catch(() => {});
                    loadCats();
                });
            });
            list.querySelectorAll('.cat-add-sub-btn').forEach(function(btn){
                btn.addEventListener('click', async function(){
                    var ci = btn.getAttribute('data-ci');
                    var input = list.querySelector('.cat-sub-input[data-ci="'+ci+'"]');
                    var val = (input ? input.value : '').trim(); if (!val) return;
                    var cat = cats.find(c => String(c.id) === String(ci));
                    if (!cat) return;
                    cat.subs = cat.subs || []; cat.subs.push(val);
                    await fetch('api.php?path=categories/' + ci, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ name: cat.name, img_url: cat.img_url || '', subs: cat.subs })
                    }).catch(() => {});
                    if (input) input.value = '';
                    loadCats();
                });
            });
        }
        loadCats();
    })();

    // ── Finish Manager ──
    (function(){
        var container = document.querySelector('.admin-container');
        if (!container) return;
        var card = document.createElement('div');
        card.className = 'admin-card';
        card.innerHTML =
            '<h2>🎨 Finish Manager</h2>' +
            '<p class="admin-desc">Mag-add ng bagong finish. Pwedeng color swatch o image (e.g. wood texture photo).</p>' +
            '<div style="display:flex;gap:0.5rem;align-items:center;flex-wrap:wrap;margin-bottom:0.5rem;">' +
                '<input type="text" id="newFinishName" class="admin-input" placeholder="Finish name (e.g. Sage Green)" style="max-width:200px;margin-bottom:0;" />' +
                '<input type="color" id="newFinishColor" value="#cccccc" title="Pick color" style="width:44px;height:38px;border:1px solid var(--border-color,#e5e5e5);border-radius:5px;cursor:pointer;padding:2px;" />' +
                '<button type="button" class="upload-btn" id="newFinishImgBtn">📁 Upload image (optional)</button>' +
                '<input type="file" id="newFinishImgFile" accept="image/*" style="display:none" />' +
                '<img id="newFinishImgThumb" class="upload-thumb" style="display:none" />' +
                '<span class="upload-status" id="newFinishImgStatus"></span>' +
            '</div>' +
            '<input type="hidden" id="newFinishImgUrl" />' +
            '<div style="margin-bottom:1.25rem;">' +
                '<button type="button" class="btn-save" id="addFinishBtn">+ Add Finish</button>' +
            '</div>' +
            '<div id="finishList"></div>' +
            '<div class="admin-card-footer" style="margin-top:1rem;">' +
                '<button type="button" class="btn-save" id="saveFinishesBtn">💾 Save Finishes</button>' +
                '<span id="saveFinishesStatus" style="margin-left:1rem;font-size:0.9rem;color:var(--text-muted);"></span>' +
            '</div>';
        container.appendChild(card);

        var finishes = [];

        function loadFinishes() {
            fetch('api.php?path=finishes').then(r => r.json()).then(function(data){
                finishes = Array.isArray(data) ? data : [];
                renderFinishes();
            }).catch(function(){ renderFinishes(); });
        }

        document.getElementById('newFinishImgBtn').addEventListener('click', function(){ document.getElementById('newFinishImgFile').click(); });
        document.getElementById('newFinishImgFile').addEventListener('change', async function(){
            var file = this.files[0]; if (!file) return;
            var status = document.getElementById('newFinishImgStatus');
            var thumb = document.getElementById('newFinishImgThumb');
            status.textContent = 'Uploading...'; status.className = 'upload-status';
            try {
                var url = await uploadImageUrl(file, 'catalog');
                document.getElementById('newFinishImgUrl').value = url;
                thumb.src = url; thumb.style.display = 'inline-block';
                status.textContent = '✓ Ready'; status.className = 'upload-status ok';
            } catch(e){ status.textContent = 'Error: '+e.message; status.className = 'upload-status err'; }
        });

        document.getElementById('addFinishBtn').addEventListener('click', async function(){
            var name = (document.getElementById('newFinishName').value||'').trim(); if (!name) return;
            var color = document.getElementById('newFinishColor').value || '#cccccc';
            var img = (document.getElementById('newFinishImgUrl').value||'').trim();
            try {
                await fetch('api.php?path=finishes', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ name: name, color: color, img_url: img })
                });
                document.getElementById('newFinishName').value = '';
                document.getElementById('newFinishImgUrl').value = '';
                document.getElementById('newFinishImgThumb').style.display = 'none';
                document.getElementById('newFinishImgStatus').textContent = '';
                loadFinishes();
            } catch(e) { alert('Error: ' + e.message); }
        });

        function renderFinishes(){
            var list = document.getElementById('finishList');
            list.innerHTML = '';
            if (!finishes.length){ list.innerHTML = '<p style="color:var(--text-muted);font-size:0.9rem;">Walang custom finish pa.</p>'; return; }
            finishes.forEach(function(f){
                var div = document.createElement('div');
                div.className = 'finish-manager-item';
                div.innerHTML =
                    (f.img_url
                        ? '<img src="'+escH(f.img_url)+'" style="width:40px;height:40px;object-fit:cover;border-radius:4px;border:1px solid #e5e5e5;" />'
                        : '<div style="width:32px;height:32px;border-radius:4px;border:1px solid #ccc;background:'+escH(f.color)+';flex-shrink:0;"></div>') +
                    '<span style="flex:1;font-weight:500;">'+escH(f.name)+'</span>' +
                    '<button class="upload-btn" style="font-size:0.78rem;padding:0.25rem 0.6rem;" data-finish-img-btn="'+f.id+'">📁 Change image</button>' +
                    '<input type="file" class="finish-img-file" data-fi="'+f.id+'" accept="image/*" style="display:none" />' +
                    '<span class="upload-status finish-img-status" data-fi="'+f.id+'"></span>' +
                    '<button class="upload-btn" style="background:#c62828;padding:0.25rem 0.6rem;font-size:0.78rem;" data-del-finish="'+f.id+'">✕</button>';
                list.appendChild(div);
            });
            list.querySelectorAll('[data-finish-img-btn]').forEach(function(btn){
                btn.addEventListener('click', function(){ list.querySelector('.finish-img-file[data-fi="'+btn.getAttribute('data-finish-img-btn')+'"]').click(); });
            });
            list.querySelectorAll('.finish-img-file').forEach(function(input){
                input.addEventListener('change', async function(){
                    var fi = input.getAttribute('data-fi');
                    var file = input.files[0]; if (!file) return;
                    var status = list.querySelector('.finish-img-status[data-fi="'+fi+'"]');
                    status.textContent = 'Uploading...'; status.className = 'upload-status';
                    try {
                        var url = await uploadImageUrl(file, 'catalog');
                        await fetch('api.php?path=finishes/' + fi + '/img', {
                            method: 'PATCH',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ img_url: url })
                        });
                        status.textContent = '✓ Updated'; status.className = 'upload-status ok';
                        loadFinishes();
                    } catch(e){ status.textContent = 'Error'; status.className = 'upload-status err'; }
                });
            });
            list.querySelectorAll('[data-del-finish]').forEach(function(btn){
                btn.addEventListener('click', async function(){
                    await fetch('api.php?path=finishes/' + btn.getAttribute('data-del-finish'), { method: 'DELETE' }).catch(() => {});
                    loadFinishes();
                });
            });
        }
        loadFinishes();
    })();

    // ── Fabric / Material Manager ──
    (function(){
        var container = document.querySelector('.admin-container');
        if (!container) return;
        var card = document.createElement('div');
        card.className = 'admin-card';
        card.innerHTML =
            '<h2>🧵 Fabric / Material Manager</h2>' +
            '<p class="admin-desc">Mag-add ng bagong fabric group (e.g. Velvet, Linen) at i-upload ang swatch images nito.</p>' +
            '<div style="display:flex;gap:0.5rem;align-items:center;flex-wrap:wrap;margin-bottom:1.25rem;">' +
                '<input type="text" id="newFabricGroupName" class="admin-input" placeholder="Group name (e.g. Velvet)" style="max-width:220px;margin-bottom:0;" />' +
                '<button type="button" class="btn-save" id="addFabricGroupBtn">+ Add Group</button>' +
            '</div>' +
            '<div id="fabricList"></div>' +
            '<div class="admin-card-footer" style="margin-top:1rem;">' +
                '<button type="button" class="btn-save" id="saveFabricsBtn">💾 Save Fabrics</button>' +
                '<span id="saveFabricsStatus" style="margin-left:1rem;font-size:0.9rem;color:var(--text-muted);"></span>' +
            '</div>';
        container.appendChild(card);

        var fabrics = [];

        function loadFabrics() {
            fetch('api.php?path=fabrics').then(r => r.json()).then(function(data){
                fabrics = Array.isArray(data) ? data : [];
                renderFabrics();
            }).catch(function(){ renderFabrics(); });
        }

        document.getElementById('addFabricGroupBtn').addEventListener('click', async function(){
            var input = document.getElementById('newFabricGroupName');
            var val = (input.value||'').trim(); if (!val) return;
            try {
                await fetch('api.php?path=fabrics', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ group_name: val, swatches: [] })
                });
                input.value = ''; loadFabrics();
            } catch(e) { alert('Error: ' + e.message); }
        });

        function renderFabrics(){
            var list = document.getElementById('fabricList');
            list.innerHTML = '';
            if (!fabrics.length){ list.innerHTML = '<p style="color:var(--text-muted);font-size:0.9rem;">Walang custom fabric/material pa.</p>'; return; }
            fabrics.forEach(function(group){
                var div = document.createElement('div');
                div.className = 'cat-manager-item';
                div.innerHTML =
                    '<div class="cat-manager-header">' +
                        '<strong>'+escH(group.group_name)+'</strong>' +
                        '<button class="upload-btn" style="background:#c62828;padding:0.3rem 0.7rem;font-size:0.78rem;" data-del-fabric-group="'+group.id+'">✕ Remove group</button>' +
                    '</div>' +
                    '<div class="fabric-swatches-row">' +
                        (group.swatches||[]).map(function(sw,si){
                            return '<div class="fabric-swatch-item">' +
                                '<img src="'+escH(sw.url)+'" style="width:48px;height:48px;object-fit:cover;border-radius:4px;border:1px solid #e5e5e5;" />' +
                                '<span style="font-size:0.72rem;max-width:56px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;text-align:center;">'+escH(sw.name)+'</span>' +
                                '<button class="cat-sub-del" data-gi="'+group.id+'" data-si="'+si+'">✕</button>' +
                            '</div>';
                        }).join('') +
                    '</div>' +
                    '<div class="cat-add-sub-row">' +
                        '<input type="text" class="admin-input fabric-swatch-name" data-gi="'+group.id+'" placeholder="Swatch name..." style="max-width:160px;padding:0.3rem 0.6rem;font-size:0.85rem;margin-bottom:0;" />' +
                        '<button class="upload-btn fabric-swatch-upload-btn" data-gi="'+group.id+'" style="padding:0.3rem 0.8rem;font-size:0.85rem;">📁 Upload swatch</button>' +
                        '<input type="file" class="fabric-swatch-file" data-gi="'+group.id+'" accept="image/*" style="display:none" />' +
                        '<span class="upload-status fabric-swatch-status" data-gi="'+group.id+'"></span>' +
                    '</div>';
                list.appendChild(div);
            });
            list.querySelectorAll('[data-del-fabric-group]').forEach(function(btn){
                btn.addEventListener('click', async function(){
                    await fetch('api.php?path=fabrics/' + btn.getAttribute('data-del-fabric-group'), { method: 'DELETE' }).catch(() => {});
                    loadFabrics();
                });
            });
            list.querySelectorAll('.cat-sub-del[data-gi]').forEach(function(btn){
                btn.addEventListener('click', async function(){
                    var gi = btn.getAttribute('data-gi'), si = parseInt(btn.getAttribute('data-si'));
                    var group = fabrics.find(f => String(f.id) === String(gi));
                    if (!group) return;
                    group.swatches.splice(si, 1);
                    await fetch('api.php?path=fabrics/' + gi, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ swatches: group.swatches })
                    }).catch(() => {});
                    loadFabrics();
                });
            });
            list.querySelectorAll('.fabric-swatch-upload-btn').forEach(function(btn){
                btn.addEventListener('click', function(){ list.querySelector('.fabric-swatch-file[data-gi="'+btn.getAttribute('data-gi')+'"]').click(); });
            });
            list.querySelectorAll('.fabric-swatch-file').forEach(function(input){
                input.addEventListener('change', async function(){
                    var gi = input.getAttribute('data-gi');
                    var file = input.files[0]; if (!file) return;
                    var nameInput = list.querySelector('.fabric-swatch-name[data-gi="'+gi+'"]');
                    var swatchName = (nameInput ? nameInput.value : '').trim() || file.name.replace(/\.[^.]+$/, '');
                    var status = list.querySelector('.fabric-swatch-status[data-gi="'+gi+'"]');
                    status.textContent = 'Uploading...'; status.className = 'upload-status';
                    try {
                        var url = await uploadImageUrl(file, 'catalog');
                        var group = fabrics.find(f => String(f.id) === String(gi));
                        if (!group) return;
                        group.swatches = group.swatches || []; group.swatches.push({ name: swatchName, url: url });
                        await fetch('api.php?path=fabrics/' + gi, {
                            method: 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ swatches: group.swatches })
                        });
                        if (nameInput) nameInput.value = '';
                        status.textContent = '✓ Added'; status.className = 'upload-status ok';
                        loadFabrics();
                    } catch(e){ status.textContent = 'Error: '+e.message; status.className = 'upload-status err'; }
                });
            });
        }
        loadFabrics();
    })();

    // ── Save buttons ──
    document.addEventListener('click', async function(e) {
        var id = e.target.id;
        if (id === 'saveCategoriesBtn') {
            var st = document.getElementById('saveCategoriesStatus');
            st.textContent = 'Saved!'; st.style.color = '#2e7d32';
            setTimeout(function(){ st.textContent = ''; st.style.color = ''; }, 2000);
        }
        if (id === 'saveFinishesBtn') {
            var st = document.getElementById('saveFinishesStatus');
            st.textContent = 'Saved!'; st.style.color = '#2e7d32';
            setTimeout(function(){ st.textContent = ''; st.style.color = ''; }, 2000);
        }
        if (id === 'saveFabricsBtn') {
            var st = document.getElementById('saveFabricsStatus');
            st.textContent = 'Saved!'; st.style.color = '#2e7d32';
            setTimeout(function(){ st.textContent = ''; st.style.color = ''; }, 2000);
        }
    });
    </script>

    <script src="script.js"></script>
</body>
</html>
