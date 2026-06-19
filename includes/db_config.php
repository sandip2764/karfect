<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Set session cookie path to root to ensure it works across all paths
    session_set_cookie_params(0, '/');
    session_start();
}

// Load environment config
require_once __DIR__ . '/../env.php';
// Define domain and base path if not already defined (e.g. from env.php)
if (!defined('DOMAIN')) {
    define('DOMAIN', 'https://xyz.com');
}
if (!defined('BASE_PATH')) {
    define('BASE_PATH', DOMAIN . '/');
}
try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
