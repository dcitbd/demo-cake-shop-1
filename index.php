<?php
$pageTitle = 'হোম — সকল প্রকার প্রিমিয়াম কেক';
require_once __DIR__ . '/includes/header.php';

$pdo = db();
$banners = $pdo->query("SELECT * FROM banners WHERE status = 1 ORDER BY sort_order ASC, id DESC")->fetchAll();
$brands = $pdo->query("SELECT * FROM brands WHERE status = 1 ORDER BY id ASC")->fetchAll();
$mainCats = $pdo->query("SELECT * FROM categories WHERE parent_id = 0 AND status = 1 ORDER BY sort_order ASC")->fetchAll();
$favIds = get_favorite_ids();
?>

<div class="container py-4">
  <!-- 1. Multi-Banner Hero Slider (Clean Single Text Layer #2) -->
  <section class="mb-5">
    <div id="heroBannerCarousel" class="carousel slide carousel-fade hero-banner-card" data-bs-ride="carousel" data-bs-interval="4800">
      <div class="carousel-indicators">
        <?php foreach ($banners as $i => $b): ?>
          <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>" aria-label="Slide <?= $i + 1 ?>"></button>
        <?php endforeach; ?>
      </div>
      <div class="carousel-inner">
        <?php foreach ($banners as $i => $b): ?>
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
            <img src="<?= e(asset_url($b['image'])) ?>" class="hero-slide-img" alt="<?= e($b['title']) ?>">
            <div class="hero-overlay-caption">
              <?php if (!empty($b['badge_text'])): ?>
                <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold mb-3 align-self-start"><?= e($b['badge_text']) ?></span>
              <?php endif; ?>
              <h1 style="max-width:600px;"><?= e($b['title']) ?></h1>
              <?php if (!empty($b['subtitle'])): ?>
                <p style="max-width:540px;"><?= e($b['subtitle']) ?></p>
              <?php endif; ?>
              <div class="d-flex gap-2 flex-wrap">
                <a href="<?= e(base_url($b['btn_link'] ?: 'products.php')) ?>" class="btn btn-warning btn-lg rounded-pill fw-bold px-4 shadow-sm">
                  <i class="fa-solid fa-cake-candles me-2"></i><?= e($b['btn_text'] ?: 'অর্ডার করুন') ?>
                </a>
                <a href="<?= e(base_url('products.php')) ?>" class="btn btn-outline-light btn-lg rounded-pill fw-bold px-4">
                  সব কেক দেখুন
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php if (count($banners) > 1): ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="prev" aria-label="Previous"><span class="carousel-control-prev-icon"></span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="next" aria-label="Next"><span class="carousel-control-next-icon"></span></button>
      <?php endif; ?>
    </div>
  </section>

  <!-- 2. Features / Benefits Cards -->
  <section class="mb-5">
    <div class="row g-3">
      <div class="col-6 col-lg-3">
        <div class="benefit-3d-card">
          <div class="benefit-icon-box"><i class="fa-solid fa-truck-fast"></i></div>
          <h6 class="fw-bold mb-1">দ্রুত এক্সপ্রেস ডেলিভারি</h6>
          <p class="small text-muted mb-0">২-৪ ঘন্টায় সেইম-ডে কুল-বক্স ডেলিভারি আপনার দোরগোড়ায়।</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="benefit-3d-card">
          <div class="benefit-icon-box" style="background:linear-gradient(135deg,#1c8557,#28a972);"><i class="fa-solid fa-award"></i></div>
          <h6 class="fw-bold mb-1">১০০% ফ্রেশ ও হালাল মান</h6>
          <p class="small text-muted mb-0">অর্ডার পাওয়ার পর প্রিমিয়াম বেলজিয়ান উপাদানে ফ্রেশ বেক করা হয়।</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="benefit-3d-card">
          <div class="benefit-icon-box" style="background:linear-gradient(135deg,#d99b38,#ebb44c);"><i class="fa-solid fa-tags"></i></div>
          <h6 class="fw-bold mb-1">৩৫% পর্যন্ত ডিসকাউন্ট</h6>
          <p class="small text-muted mb-0">প্রতিটি কেকে স্পেশাল ছাড়, কুপন অফার ও ফ্রি ক্যান্ডেল-নাইফ।</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="benefit-3d-card">
          <div class="benefit-icon-box" style="background:linear-gradient(135deg,#4f67d6,#6e83e8);"><i class="fa-solid fa-headset"></i></div>
          <h6 class="fw-bold mb-1">২৪/৭ কাস্টম সাপোর্ট</h6>
          <p class="small text-muted mb-0">ফটো কেক ও কাস্টম ডিজাইনের জন্য কল বা হোয়াটসঅ্যাপ সাপোর্ট।</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. Brands Section -->
  <section class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h4 class="fw-bold mb-0"><i class="fa-solid fa-crown text-warning me-2"></i>আমাদের প্রিমিয়াম কেক ব্র্যান্ডসমূহ</h4>
        <small class="text-muted">বিশ্বস্ত আর্টিসান বেকারি ও শেফ ব্র্যান্ড</small>
      </div>
      <a href="<?= e(base_url('products.php')) ?>" class="btn btn-sm btn-outline-danger rounded-pill fw-bold">সব দেখুন &rarr;</a>
    </div>
    <div class="row g-3">
      <?php foreach ($brands as $br): ?>
        <div class="col-6 col-md-4 col-lg-3">
          <a href="<?= e(base_url('products.php?brand=' . (int)$br['id'])) ?>" class="brand-pill-card">
            <img src="<?= e(asset_url($br['logo'] ?: 'assets/images/icon-192.png')) ?>" alt="<?= e($br['name']) ?>" width="44" height="44" class="rounded-3 border">
            <div class="overflow-hidden">
              <div class="fw-bold small text-truncate"><?= e($br['name']) ?></div>
              <div class="text-muted" style="font-size:11px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= e($br['description']) ?></div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- 4. Category-Wise Products (6 Products Per Category + Smooth Slide System) -->
  <?php foreach ($mainCats as $cat):
    $stmt = $pdo->prepare("
      SELECT p.*, b.name AS brand_name
      FROM products p
      LEFT JOIN brands b ON b.id = p.brand_id
      LEFT JOIN categories c ON c.id = p.category_id
      WHERE p.status = 1 AND (p.category_id = ? OR c.parent_id = ?)
      ORDER BY p.id DESC LIMIT 6
    ");
    $stmt->execute([$cat['id'], $cat['id']]);
    $catProducts = $stmt->fetchAll();
    if (empty($catProducts)) continue;
    $sliderId = 'catSlider_' . (int)$cat['id'];
  ?>
  <section class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
      <div class="d-flex align-items-center gap-2">
        <span class="badge bg-danger rounded-3 p-2"><i class="fa-solid <?= e($cat['icon']) ?> fs-5"></i></span>
        <div>
          <h4 class="fw-bold mb-0"><?= e($cat['name']) ?></h4>
          <small class="text-muted">সর্বাধিক জনপ্রিয় ৬টি কেক — স্লাইড করে দেখুন</small>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <button type="button" class="slider-nav-btn" onclick="slideCategory('<?= $sliderId ?>', -1)" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>
        <button type="button" class="slider-nav-btn" onclick="slideCategory('<?= $sliderId ?>', 1)" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
        <a href="<?= e(base_url('category.php?slug=' . urlencode($cat['slug']))) ?>" class="btn btn-sm btn-danger rounded-pill fw-bold px-3">সব দেখুন</a>
      </div>
    </div>

    <div class="category-slider-track" id="<?= $sliderId ?>">
      <?php foreach ($catProducts as $cp): ?>
        <div class="slider-slide-item">
          <?= render_cake_card($cp, $cp['brand_name'] ?? 'SweetDream', $favIds) ?>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endforeach; ?>

  <!-- 5. Mobile & Desktop Apps Download CTA -->
  <section class="my-5">
    <div class="p-4 p-md-5 rounded-4 shadow-lg soft-brand-banner">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold mb-2">📱 MOBILE &amp; DESKTOP APPS</span>
          <h2 class="fw-bold mb-2">SweetDream Cakes অ্যাপ ডাউনলোড করুন!</h2>
          <p class="mb-0 opacity-90">Android, iOS, Windows এবং Mac-এ সরাসরি অ্যাপ হিসেবে ব্যবহার করুন। নতুন অফার ও অর্ডার আপডেটের ইনস্ট্যান্ট মোবাইল নোটিফিকেশন পান।</p>
        </div>
        <div class="col-lg-4 d-flex flex-wrap gap-2 justify-content-lg-end">
          <button type="button" class="btn btn-warning btn-lg rounded-pill fw-bold px-4" onclick="triggerAppInstall()">
            <i class="fa-solid fa-download me-2"></i>ইনস্টল করুন
          </button>
          <a href="<?= e(base_url('apps.php')) ?>" class="btn btn-outline-light btn-lg rounded-pill fw-bold px-4">
            ডাউনলোড গাইড
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
