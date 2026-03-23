CREATE DATABASE IF NOT EXISTS furniture_pampanga CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE furniture_pampanga;

CREATE TABLE IF NOT EXISTS site_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(100) NOT NULL,
    item_key VARCHAR(100) NOT NULL,
    url TEXT NOT NULL,
    name VARCHAR(255),
    UNIQUE KEY unique_section_key (section, item_key)
);

CREATE TABLE IF NOT EXISTS finishes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    color VARCHAR(20) DEFAULT '#cccccc',
    img_url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS fabrics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_name VARCHAR(255) NOT NULL,
    swatches JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subcategory VARCHAR(100) NOT NULL,
    variant VARCHAR(100) NOT NULL,
    description TEXT,
    specifications TEXT,
    care TEXT,
    UNIQUE KEY unique_sub_variant (subcategory, variant)
);

CREATE TABLE IF NOT EXISTS catalog_listings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subcategory VARCHAR(100) NOT NULL,
    item_id VARCHAR(100) NOT NULL,
    name VARCHAR(255),
    url TEXT,
    UNIQUE KEY unique_cat_item (subcategory, item_id)
);

CREATE TABLE IF NOT EXISTS variant_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subcategory VARCHAR(100) NOT NULL,
    variant_id VARCHAR(100) NOT NULL,
    name VARCHAR(255),
    img_index TINYINT NOT NULL,
    url TEXT,
    UNIQUE KEY unique_var_img (subcategory, variant_id, img_index)
);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    img_url TEXT,
    subs JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Default admin: username=admin, password=furniture2024
INSERT IGNORE INTO admins (username, password) VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Default finishes
INSERT IGNORE INTO finishes (id, name, color) VALUES
(1, 'Duco White',    '#f5f5f0'),
(2, 'Duco Gold',     '#c9a84c'),
(3, 'Ducco Black',   '#1a1a1a'),
(4, 'Ash Gray',      '#9e9e9e'),
(5, 'Walnut',        '#5c3d2e'),
(6, 'Light Walnut',  '#a0724a'),
(7, 'Dark Walnut',   '#3b2314'),
(8, 'Wengue',        '#2c1a0e'),
(9, 'Oak Finish',    '#c8a96e'),
(10,'Pinewood Finish','#d4a96a');

-- Default fabrics
INSERT IGNORE INTO fabrics (id, group_name, swatches) VALUES
(1,  'Amalia',        '[]'),
(2,  'Bailey',        '[]'),
(3,  'Belfort',       '[]'),
(4,  'Berlin',        '[]'),
(5,  'Cuba',          '[]'),
(6,  'Faye',          '[]'),
(7,  'Galaxy Soft',   '[]'),
(8,  'Globus',        '[]'),
(9,  'French Leather','[]'),
(10, 'German Leather','[]');
