Official Devices - Phase 1 (Auth & Admin base)

Install steps:
1. Upload all files to your hosting public folder (htdocs or public_html).
2. Edit includes/config.php with your InfinityFree MySQL credentials.
3. Import database/db.sql into your database using phpMyAdmin.
4. Create a head admin manually in the admins table (use password_hash in PHP to create the hash).
   Example (run once via a script):

<?php
require 'includes/config.php';
$hash = password_hash('admin123', PASSWORD_DEFAULT);
$pdo->prepare('INSERT INTO admins (username,password) VALUES (?,?)')->execute(['admin', $hash]);
?>

5. Ensure your hosting can send email via PHP mail() or configure SMTP and update includes/functions.php to use PHPMailer.
6. Visit /register.php to create a user; email verification will be sent.

Files included:
- index.php, shop.php, product.php
- register.php, login.php, verify.php, logout.php
- includes/: config.php, functions.php, header.php, footer.php
- admin/: basic admin login and dashboard
- database/db.sql

This is Phase 1. After you test auth and email verification, we'll implement product upload, cart, checkout, and automated stock decrement.
