const admin = require('./backend-config');
const db = admin.database();
const ref = db.ref('catalog');

async function seed() {
  console.log('Seeding initial data...');

  // Sample categories from hardcoded
  const categories = {
    'chair-highback': { name: 'Chair - High Back', subcategories: ['high-back'], fabricless: false },
    'table': { name: 'Table', subcategories: [], fabricless: true },
    'night-table': { name: 'Night Table', subcategories: [], fabricless: true },
    'center-table': { name: 'Center Table', subcategories: [], fabricless: true },
    'bed': { name: 'Bed', subcategories: ['queen'], fabricless: false },
    'sofa': { name: 'Sofa', subcategories: [], fabricless: false }
  };

  await ref.child('categories').set(categories);

  // Sample items with tabContent
  const items = {
    'chair-highback': {
      'valen': {
        id: 'valen',
        name: 'Valen',
        price: '₱13,000',
        shortDesc: 'Elegant high-back dining chair with off-white upholstery.',
        tabContent: {
          description: 'Experience ultimate comfort with our Dining Chair (High-Back). Crafted with premium cream upholstery and dark wood legs for timeless design.',
          specifications: 'Dimensions: 24" W x 22" D x 42" H\nWeight: 18 kg\nMaterial: Premium Cream Upholstery, Dark Wood Legs\nAssembly: Required',
          care: 'Clean with soft dry cloth. Mild detergent for stains. Avoid sunlight. Professional cleaning recommended.',
          reviews: `<div class="review">
            <div class="review-header">
              <strong>John D.</strong>
              <div class="rating">★★★★★</div>
            </div>
            <p>Absolutely love this chair! Exceptional quality and comfort.</p>
          </div>
          <div class="review">
            <div class="review-header">
              <strong>Sarah M.</strong>
              <div class="rating">★★★★☆</div>
            </div>
            <p>Beautiful design, great value. Highly recommend!</p>
          </div>`
        },
        images: ['assets/images/products/Ducco White .JPG'],
        fabricless: false
      },
      'aurex': {
        id: 'aurex',
        name: 'Aurex',
        price: '₱13,000',
        shortDesc: 'Light cream high-back dining chair with dark tapered legs.',
        tabContent: {
          description: 'The Aurex combines comfort and style with light cream upholstery and dark tapered legs.',
          specifications: 'Dimensions: 24" W x 22" D x 42" H\nWeight: 18 kg\nMaterial: Light cream upholstery, dark wood legs',
          care: 'Same as above',
          reviews: ''
        },
        images: ['assets/images/products/Ash Gray .JPG'],
        fabricless: false
      }
    },
    'table': {
      'acacia': {
        id: 'acacia',
        name: 'Acacia Dining Table',
        price: '₱45,000',
        shortDesc: 'Solid acacia wood dining table for 8.',
        tabContent: {
          description: 'Durable solid acacia wood dining table seats 8 comfortably.',
          specifications: 'Dimensions: 72" W x 42" D x 30" H\nWeight: 80 kg\nMaterial: Solid Acacia Wood\nAssembly: Professional',
          care: 'Wipe with damp cloth, avoid harsh chemicals.',
          reviews: ''
        },
        images: ['assets/images/products/Oak Finish.JPG'],
        fabricless: true
      }
    },
    'night-table': {
      'accent': {
        id: 'accent',
        name: 'Accent Night Table',
        price: '₱8,500',
        shortDesc: 'Stylish bedside accent table.',
        tabContent: {
          description: 'Elegant night table with storage drawer.',
          specifications: 'Dimensions: 20" W x 16" D x 24" H\nWeight: 12 kg\nMaterial: Solid wood',
          care: 'Dust regularly.',
          reviews: ''
        },
        images: [],
        fabricless: true
      }
    },
    'center-table': {
      'coffee': {
        id: 'coffee',
        name: 'Coffee Center Table',
        price: '₱12,500',
        shortDesc: 'Modern coffee center table for living room.',
        tabContent: {
          description: 'Stylish center table perfect for any living room setup.',
          specifications: 'Dimensions: 40" W x 24" D x 18" H\nWeight: 25 kg\nMaterial: Solid wood with glass top\nAssembly: Easy assembly',
          care: 'Wipe with damp cloth. Avoid harsh chemicals on glass.',
          reviews: ''
        },
        images: [],
        fabricless: true
      }
    }
  };

  await ref.child('items').set(items);
  console.log('Seed complete! Visit http://localhost:3000/api/items/chair-highback');
}

seed().catch(console.error);

