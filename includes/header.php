<?php
if (!isset($site_title)) $site_title = 'Official Devices';
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?php echo htmlspecialchars($site_title); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head><body>
<nav class="navbar navbar-expand-lg navbar-light bg-light site-topbar">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="/"><div class="logo-placeholder">OD</div><div class="ms-2"><strong>Official Devices</strong><div class="small text-muted">Phones & Accessories</div></div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="/shop.php">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="/login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>
<main class="site-main">