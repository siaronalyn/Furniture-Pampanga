const express = require('express');
const multer = require('multer');
const path = require('path');
const fs = require('fs');

const app = express();
const PORT = 3000;

app.use(express.static(__dirname));
app.use(express.json());

const DATA_FILE = path.join(__dirname, 'data.json');

app.get('/site-data', (req, res) => {
    try {
        const raw = fs.existsSync(DATA_FILE) ? fs.readFileSync(DATA_FILE, 'utf8') : '{}';
        res.setHeader('Content-Type', 'application/json');
        res.setHeader('Cache-Control', 'no-store');
        res.send(raw);
    } catch (e) {
        res.json({});
    }
});

app.post('/save-data', (req, res) => {
    try {
        fs.writeFileSync(DATA_FILE, JSON.stringify(req.body, null, 2));
        res.json({ ok: true });
    } catch (e) {
        res.status(500).json({ error: 'Save failed' });
    }
});

// ── Storage config ──
function makeUploader(folder) {
    const storage = multer.diskStorage({
        destination: function (req, file, cb) {
            const dir = path.join(__dirname, 'assets/images/uploaded', folder);
            fs.mkdirSync(dir, { recursive: true });
            cb(null, dir);
        },
        filename: function (req, file, cb) {
            const unique = Date.now().toString(16) + Math.random().toString(16).slice(2, 8);
            const ext = path.extname(file.originalname).toLowerCase() || '.jpg';
            cb(null, unique + ext);
        }
    });
    return multer({
        storage,
        fileFilter: (req, file, cb) => {
            if (/^image\//i.test(file.mimetype)) cb(null, true);
            else cb(Object.assign(new Error('Only image files are allowed'), { status: 400 }));
        },
        limits: { fileSize: 10 * 1024 * 1024 }
    });
}

const uploadProduct = makeUploader('products');
const uploadCatalog = makeUploader('catalog');
const uploadVariant = makeUploader('variants');
const uploadHero    = makeUploader('hero');

// ── Upload endpoints ──
app.post('/upload/product', uploadProduct.single('image'), (req, res) => {
    if (!req.file) return res.status(400).json({ error: 'No file uploaded' });
    res.json({ url: '/assets/images/uploaded/products/' + req.file.filename });
});

app.post('/upload/catalog', uploadCatalog.single('image'), (req, res) => {
    if (!req.file) return res.status(400).json({ error: 'No file uploaded' });
    res.json({ url: '/assets/images/uploaded/catalog/' + req.file.filename });
});

app.post('/upload/variant', uploadVariant.single('image'), (req, res) => {
    if (!req.file) return res.status(400).json({ error: 'No file uploaded' });
    res.json({ url: '/assets/images/uploaded/variants/' + req.file.filename });
});

app.post('/upload/hero', uploadHero.single('image'), (req, res) => {
    if (!req.file) return res.status(400).json({ error: 'No file uploaded' });
    res.json({ url: '/assets/images/uploaded/hero/' + req.file.filename });
});

// ── Error handler ──
app.use((err, req, res, next) => {
    res.status(400).json({ error: err.message || 'Upload failed' });
});

app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
    console.log(`Open http://localhost:${PORT}/admin-login.html to access admin`);
});
