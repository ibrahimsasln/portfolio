<?php
$host = 'sql311.infinityfree.com';
$dbname = 'if0_41907381_portfolio';
$username = 'if0_41907381';
$password = 'X9rYBBy9dh';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}
?>