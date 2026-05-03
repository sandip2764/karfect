<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Set session cookie path to root to ensure it works across all paths
    session_set_cookie_params(0, '/');
    session_start();
}

define('BASE_PATH', '/karfect/');

// Load environment config
require_once __DIR__ . '/../env.php';

try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>