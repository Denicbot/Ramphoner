<?php
// Edit these values with your InfinityFree MySQL details after upload
$DB_HOST = 'sql213.infinityfree.com';
$DB_NAME = 'if0_40303933_officialdevices';
$DB_USER = 'if0_40303933';
$DB_PASS = 'YOUR_VPANEL_PASSWORD_HERE';

$DSN = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try { $pdo = new PDO($DSN, $DB_USER, $DB_PASS, $options); }
catch (Exception $e) { die('Database connection failed: '.htmlspecialchars($e->getMessage())); }
?>