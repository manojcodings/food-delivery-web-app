<?php
// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site Configuration
define('SITEURL', 'http://localhost/food_rebuilt_professional/'); // Update this to your actual URL
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food_order');

// Database Connection
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));

// Select Database
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

// Error Reporting (Turn off in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
