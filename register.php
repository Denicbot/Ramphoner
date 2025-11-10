<?php
require 'includes/config.php';
require 'includes/functions.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
        $errors[] = 'Please provide valid name, email and password (min 6 chars).';
    } else {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        if ($stmt->fetch()) $errors[] = 'Email already registered.';
        else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (name,email,password,verified,created_at) VALUES (?, ?, ?, 0, NOW())');
            $stmt->execute([$name,$email,$hash]);
            $user_id = $pdo->lastInsertId();
            $token = create_token(40);
            $stmt = $pdo->prepare('INSERT INTO email_verifications (user_id,token,created_at) VALUES (?, ?, NOW())');
            $stmt->execute([$user_id, $token]);
            send_verification_email($email, $token);
            header('Location: register.php?sent=1'); exit;
        }
    }
}
include 'includes/header.php';
?>
<div class="container py-5">
  <h2>Create an Account</h2>
  <?php if (!empty($errors)): foreach($errors as $e) echo '<div class="alert alert-danger">'.htmlspecialchars($e).'</div>'; endif; ?>
  <?php if (isset($_GET['sent'])): ?>
    <div class="alert alert-success">Registration successful. Check your email for verification link.</div>
  <?php else: ?>
  <form method="post" class="row g-3">
    <div class="col-md-6"><label class="form-label">Full name</label><input name="name" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Email</label><input name="email" type="email" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Password</label><input name="password" type="password" class="form-control" required></div>
    <div class="col-12"><button class="btn btn-primary">Register</button></div>
  </form>
  <?php endif; ?>
</div>
<?php include 'includes/footer.php'; ?>