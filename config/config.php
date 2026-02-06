<?php
$host = 'shortline.proxy.rlwy.net';
$port = '51571';
$dbname = 'railway';
$user = 'root';
$pass = 'KAoNLGbUIMieXGRMCPFfqSsjVcbCSxaI';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
