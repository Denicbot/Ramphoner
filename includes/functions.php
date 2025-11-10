<?php
require_once __DIR__ . '/config.php';

function send_verification_email($to, $token) {
    $subject = 'Verify your login — Official Devices';
    $verify_link = sprintf('https://%s/verify.php?token=%s', $_SERVER['HTTP_HOST'], urlencode($token));
    $message = "Hello,\n\nUse the link below to verify your login:\n\n" . $verify_link . "\n\nIf you didn't request this, ignore this email.";
    $headers = 'From: noreply@officialdevices.infinityfreeapp.com' . "\r\n" . 'Reply-To: noreply@officialdevices.infinityfreeapp.com' . "\r\n";
    return mail($to, $subject, $message, $headers);
}

function create_token($length = 40) {
    return bin2hex(random_bytes($length/2));
}
?>