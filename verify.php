<?php
require 'includes/config.php';
$token = $_GET['token'] ?? '';
if (!$token) { die('Invalid token'); }
$stmt = $pdo->prepare('SELECT user_id FROM email_verifications WHERE token = ? LIMIT 1');
$stmt->execute([$token]); $row = $stmt->fetch();
if (!$row) { die('Token not found or expired.'); }
$user_id = $row['user_id'];
$pdo->prepare('UPDATE users SET verified = 1 WHERE id = ?')->execute([$user_id]);
$pdo->prepare('DELETE FROM email_verifications WHERE token = ?')->execute([$token]);
echo 'Email verified. You can now login at <a href="/login.php">login</a>.';
?>