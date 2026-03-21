const mysql = require('mysql2/promise');

const pool = mysql.createPool({
    host: process.env.DB_HOST || 'localhost',
    user: process.env.DB_USER || 'root',
    password: process.env.DB_PASSWORD || '',
    database: process.env.DB_NAME || 'furniture_pampanga',
    waitForConnections: true,
    connectionLimit: 10
});

async function seedDatabase() {
    const conn = await pool.getConnection();
    try {
        await conn.beginTransaction();

        // Clear existing data
        await conn.query('DELETE FROM product_images');
        await conn.query('DELETE FROM products');
        await conn.query('DELETE FROM categories');

        // Add categories
        const categories = [
            { name: 'Chair', slug: 'chair' },
            { name: 'Table', slug: 'table' },
            { name: 'Bed', slug: 'bed' },
            { name: 'Sofa', slug: 'sofa' },
            { name: 'Storage', slug: 'storage' }
        ];

        const categoryIds = {};
        for (const cat of categories) {
            const [result] = await conn.query('INSERT INTO categories (name, slug) VALUES (?, ?)', [cat.name, cat.slug]);
            categoryIds[cat.slug] = result.insertId;
        }

        // Add sample products
        const products = [
            {
                category: 'chair',
                name: 'Dining Chair High-Back',
                slug: 'dining-chair-high-back',
                price: '₱8,500',
                short_desc: 'Elegant high-back dining chair with premium upholstery',
                description: 'This premium dining chair features a high-back design for superior comfort and support. Crafted with quality materials and attention to detail.',
                specifications: 'Height: 95cm\nWidth: 45cm\nDepth: 50cm\nMaterial: Solid wood frame with fabric upholstery',
                care: 'Wipe clean with damp cloth. Avoid direct sunlight. Professional cleaning recommended for fabric.',
                images: [
                    'assets/images/products/Ducco White .JPG',
                    'assets/images/products/Light Walnut .JPG',
                    'assets/images/products/Ducco Gold .JPG',
                    'assets/images/products/Walnut.JPG'
                ]
            },
            {
                category: 'table',
                name: 'Acacia Dining Table',
                slug: 'acacia-dining-table',
                price: '₱25,000',
                short_desc: 'Beautiful solid acacia wood dining table for 6 people',
                description: 'Handcrafted from premium acacia wood, this dining table combines durability with natural beauty. Perfect for family gatherings.',
                specifications: 'Length: 180cm\nWidth: 90cm\nHeight: 75cm\nMaterial: Solid acacia wood\nSeating: 6 people',
                care: 'Clean with wood cleaner. Apply wood oil every 6 months. Use coasters and placemats.',
                images: []
            },
            {
                category: 'bed',
                name: 'Queen Platform Bed',
                slug: 'queen-platform-bed',
                price: '₱18,000',
                short_desc: 'Modern platform bed with built-in storage',
                description: 'Sleek platform bed design with integrated storage drawers. Perfect for modern bedrooms.',
                specifications: 'Size: Queen (160cm x 200cm)\nHeight: 35cm\nMaterial: Engineered wood with laminate finish\nStorage: 4 drawers',
                care: 'Dust regularly. Clean with mild soap solution. Check hardware periodically.',
                images: []
            }
        ];

        for (const product of products) {
            const [result] = await conn.query(
                'INSERT INTO products (category_id, name, slug, price, short_desc, description, specifications, care) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
                [
                    categoryIds[product.category],
                    product.name,
                    product.slug,
                    product.price,
                    product.short_desc,
                    product.description,
                    product.specifications,
                    product.care
                ]
            );

            const productId = result.insertId;

            // Add images
            for (let i = 0; i < product.images.length; i++) {
                await conn.query(
                    'INSERT INTO product_images (product_id, url, sort_order) VALUES (?, ?, ?)',
                    [productId, product.images[i], i]
                );
            }
        }

        await conn.commit();
        console.log('✅ Database seeded successfully!');
        console.log(`Added ${categories.length} categories and ${products.length} products`);
    } catch (error) {
        await conn.rollback();
        console.error('❌ Seed failed:', error.message);
    } finally {
        conn.release();
        process.exit(0);
    }
}

seedDatabase();