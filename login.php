<?php
require 'includes/config.php';
require 'includes/functions.php';
session_start();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]); $user = $stmt->fetch();
    if (!$user || !password_verify($password, $user['password'])) { $err = 'Invalid credentials.'; }
    else {
        if (!$user['verified']) { $err = 'Please verify your email first.'; }
        else {
            $device_key = hash('sha256', $_SERVER['REMOTE_ADDR'] . '|' . ($_SERVER['HTTP_USER_AGENT'] ?? 'unknown'));
            $stmt = $pdo->prepare('SELECT id FROM devices WHERE user_id = ? AND device_key = ? LIMIT 1');
            $stmt->execute([$user['id'], $device_key]);
            if ($stmt->fetch()) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /'); exit;
            } else {
                $token = create_token(40);
                $stmt = $pdo->prepare('INSERT INTO login_tokens (user_id, token, device_key, created_at) VALUES (?, ?, ?, NOW())');
                $stmt->execute([$user['id'], $token, $device_key]);
                send_verification_email($user['email'], $token);
                echo '<div class="container py-5"><div class="alert alert-info">A verification email was sent to your address. Please verify to complete login.</div></div>'; exit;
            }
        }
    }
}
include 'includes/header.php';
?>
<div class="container py-5">
  <h2>Login</h2>
  <?php if ($err) echo '<div class="alert alert-danger">'.htmlspecialchars($err).'</div>'; ?>
  <form method="post" class="row g-3">
    <div class="col-md-6"><label class="form-label">Email</label><input name="email" type="email" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Password</label><input name="password" type="password" class="form-control" required></div>
    <div class="col-12"><button class="btn btn-primary">Login</button></div>
  </form>
</div>
<?php include 'includes/footer.php'; ?>