<?php
session_start();
require_once 'db.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

$method = $_SERVER['REQUEST_METHOD'];
$path   = trim($_GET['path'] ?? '', '/');
$parts  = explode('/', $path);
$body   = json_decode(file_get_contents('php://input'), true) ?? [];

// ── Helper ──
function respond($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

// ══════════════════════════════════════
// AUTH
// ══════════════════════════════════════
if ($path === 'auth/login' && $method === 'POST') {
    global $pdo;
    $username = $body['username'] ?? '';
    $password = $body['password'] ?? '';
    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    if ($admin && ($admin['password'] === $password || password_verify($password, $admin['password']))) {
        $_SESSION['admin'] = true;
        respond(['ok' => true]);
    }
    respond(['error' => 'Invalid credentials'], 401);
}

if ($path === 'auth/logout' && $method === 'POST') {
    session_destroy();
    respond(['ok' => true]);
}

if ($path === 'auth/check') {
    respond(['ok' => isset($_SESSION['admin']) && $_SESSION['admin']]);
}

// ══════════════════════════════════════
// UPLOAD (local folder)
// ══════════════════════════════════════
if ($parts[0] === 'upload' && $method === 'POST') {
    $folderMap = ['hero'=>'hero','catalog'=>'catalog','product'=>'products','variant'=>'variants','misc'=>'misc'];
    $key = $parts[1] ?? 'misc';
    $folder = $folderMap[$key] ?? $key;
    $uploadDir = __DIR__ . '/assets/images/uploaded/' . $folder . '/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

    if (!isset($_FILES['image'])) respond(['error' => 'No file'], 400);
    $file = $_FILES['image'];
    if ($file['error'] !== UPLOAD_ERR_OK) respond(['error' => 'Upload error'], 400);

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif','webp','jfif'];
    if (!in_array($ext, $allowed)) respond(['error' => 'Invalid file type'], 400);

    $filename = uniqid() . '_' . time() . '.' . $ext;
    $dest = $uploadDir . $filename;
    if (!move_uploaded_file($file['tmp_name'], $dest)) respond(['error' => 'Failed to save file'], 500);

    $url = 'assets/images/uploaded/' . $folder . '/' . $filename;
    respond(['url' => $url]);
}

// ══════════════════════════════════════
// SITE IMAGES
// ══════════════════════════════════════
if ($parts[0] === 'site-images') {
    global $pdo;
    if ($method === 'GET') {
        $rows = $pdo->query('SELECT * FROM site_images')->fetchAll();
        $out = [];
        foreach ($rows as $r) {
            $out[$r['section']][$r['item_key']] = ['url' => $r['url'], 'name' => $r['name']];
        }
        respond($out);
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO site_images (section, item_key, url, name) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE url=VALUES(url), name=VALUES(name)');
        $stmt->execute([$body['section'], $body['item_key'], $body['url'], $body['name'] ?? null]);
        respond(['ok' => true]);
    }
    if ($method === 'DELETE' && isset($parts[1], $parts[2])) {
        $pdo->prepare('DELETE FROM site_images WHERE section=? AND item_key=?')->execute([$parts[1], $parts[2]]);
        respond(['ok' => true]);
    }
}

// ══════════════════════════════════════
// FINISHES
// ══════════════════════════════════════
if ($parts[0] === 'finishes') {
    global $pdo;
    if ($method === 'GET') {
        respond($pdo->query('SELECT * FROM finishes ORDER BY id')->fetchAll());
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO finishes (name, color, img_url) VALUES (?,?,?)');
        $stmt->execute([$body['name'], $body['color'] ?? '#cccccc', $body['img_url'] ?? '']);
        respond(['ok' => true, 'id' => $pdo->lastInsertId()]);
    }
    if ($method === 'PATCH' && isset($parts[1]) && isset($parts[2]) && $parts[2] === 'img') {
        $pdo->prepare('UPDATE finishes SET img_url=? WHERE id=?')->execute([$body['img_url'] ?? '', $parts[1]]);
        respond(['ok' => true]);
    }
    if ($method === 'DELETE' && isset($parts[1])) {
        $pdo->prepare('DELETE FROM finishes WHERE id=?')->execute([$parts[1]]);
        respond(['ok' => true]);
    }
}

// ══════════════════════════════════════
// FABRICS
// ══════════════════════════════════════
if ($parts[0] === 'fabrics') {
    global $pdo;
    if ($method === 'GET') {
        $rows = $pdo->query('SELECT * FROM fabrics ORDER BY id')->fetchAll();
        foreach ($rows as &$r) {
            $r['swatches'] = json_decode($r['swatches'] ?? '[]', true);
        }
        respond($rows);
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO fabrics (group_name, swatches) VALUES (?,?)');
        $stmt->execute([$body['group_name'], json_encode($body['swatches'] ?? [])]);
        respond(['ok' => true, 'id' => $pdo->lastInsertId()]);
    }
    if ($method === 'PUT' && isset($parts[1])) {
        $pdo->prepare('UPDATE fabrics SET swatches=? WHERE id=?')->execute([json_encode($body['swatches'] ?? []), $parts[1]]);
        respond(['ok' => true]);
    }
    if ($method === 'DELETE' && isset($parts[1])) {
        $pdo->prepare('DELETE FROM fabrics WHERE id=?')->execute([$parts[1]]);
        respond(['ok' => true]);
    }
}

// ══════════════════════════════════════
// PRODUCT DETAILS
// ══════════════════════════════════════
if ($parts[0] === 'product-details') {
    global $pdo;
    if ($method === 'GET') {
        $sub = $_GET['subcategory'] ?? '';
        $var = $_GET['variant'] ?? '';
        $stmt = $pdo->prepare('SELECT * FROM product_details WHERE subcategory=? AND variant=?');
        $stmt->execute([$sub, $var]);
        respond($stmt->fetch() ?: (object)[]);
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO product_details (subcategory, variant, description, specifications, care) VALUES (?,?,?,?,?) ON DUPLICATE KEY UPDATE description=VALUES(description), specifications=VALUES(specifications), care=VALUES(care)');
        $stmt->execute([$body['subcategory'], $body['variant'], $body['description'] ?? '', $body['specifications'] ?? '', $body['care'] ?? '']);
        respond(['ok' => true]);
    }
}

// ══════════════════════════════════════
// CATALOG LISTINGS
// ══════════════════════════════════════
if ($parts[0] === 'catalog-listings' && isset($parts[1])) {
    global $pdo;
    $sub = $parts[1];
    if ($method === 'GET') {
        $stmt = $pdo->prepare('SELECT * FROM catalog_listings WHERE subcategory=?');
        $stmt->execute([$sub]);
        $out = [];
        foreach ($stmt->fetchAll() as $r) {
            $out[$r['item_id']] = ['url' => $r['url'], 'name' => $r['name']];
        }
        respond($out);
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO catalog_listings (subcategory, item_id, name, url) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE name=VALUES(name), url=VALUES(url)');
        $stmt->execute([$sub, $body['item_id'], $body['name'] ?? '', $body['url'] ?? '']);
        respond(['ok' => true]);
    }
}

// ══════════════════════════════════════
// VARIANT DETAILS
// ══════════════════════════════════════
if ($parts[0] === 'variant-details' && isset($parts[1])) {
    global $pdo;
    $sub = $parts[1];
    if ($method === 'GET') {
        $stmt = $pdo->prepare('SELECT * FROM variant_details WHERE subcategory=? ORDER BY variant_id, img_index');
        $stmt->execute([$sub]);
        $out = [];
        foreach ($stmt->fetchAll() as $r) {
            if (!isset($out[$r['variant_id']])) $out[$r['variant_id']] = ['name' => $r['name'], 'images' => ['','','','']];
            $out[$r['variant_id']]['images'][$r['img_index']] = $r['url'] ?? '';
            if ($r['name']) $out[$r['variant_id']]['name'] = $r['name'];
        }
        respond($out);
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO variant_details (subcategory, variant_id, name, img_index, url) VALUES (?,?,?,?,?) ON DUPLICATE KEY UPDATE name=VALUES(name), url=VALUES(url)');
        $stmt->execute([$sub, $body['variant_id'], $body['name'] ?? '', $body['img_index'], $body['url'] ?? '']);
        respond(['ok' => true]);
    }
}

// ══════════════════════════════════════
// CATEGORIES
// ══════════════════════════════════════
if ($parts[0] === 'categories') {
    global $pdo;
    if ($method === 'GET') {
        $rows = $pdo->query('SELECT * FROM categories ORDER BY id')->fetchAll();
        foreach ($rows as &$r) $r['subs'] = json_decode($r['subs'] ?? '[]', true);
        respond($rows);
    }
    if ($method === 'POST') {
        $stmt = $pdo->prepare('INSERT INTO categories (name, img_url, subs) VALUES (?,?,?)');
        $stmt->execute([$body['name'], $body['img_url'] ?? '', json_encode($body['subs'] ?? [])]);
        respond(['ok' => true, 'id' => $pdo->lastInsertId()]);
    }
    if ($method === 'PUT' && isset($parts[1])) {
        $stmt = $pdo->prepare('UPDATE categories SET name=?, img_url=?, subs=? WHERE id=?');
        $stmt->execute([$body['name'], $body['img_url'] ?? '', json_encode($body['subs'] ?? []), $parts[1]]);
        respond(['ok' => true]);
    }
    if ($method === 'DELETE' && isset($parts[1])) {
        $pdo->prepare('DELETE FROM categories WHERE id=?')->execute([$parts[1]]);
        respond(['ok' => true]);
    }
}

respond(['error' => 'Not found'], 404);
