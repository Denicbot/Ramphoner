<?php include 'includes/header.php'; ?>
<section class="hero py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="display-5 fw-bold">Official Devices — Phones & Accessories</h1>
        <p class="lead">Shop top phones with secure checkout, fast delivery and verified sellers.</p>
        <a href="/shop.php" class="btn btn-primary btn-lg">Shop Now</a>
      </div>
      <div class="col-md-6 d-none d-md-block">
        <img src="assets/images/hero-phone.png" alt="phones" style="max-width:100%;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,0.4);">
      </div>
    </div>
  </div>
</section>
<section class="container py-5">
  <h3>Featured Phones</h3>
  <div class="row" id="product-list">
    <div class="col-md-4">
      <div class="card p-3">
        <img src="assets/images/sample-phone.jpg" class="img-fluid" alt="sample">
        <h5 class="mt-2">Sample Phone X</h5>
        <div><small class="text-muted"><s>$499</s></small> <strong class="ms-2">$399</strong></div>
        <a class="btn btn-outline-primary mt-2" href="/product.php?id=1">View</a>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>