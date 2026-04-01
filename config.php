<?php
// --- AWS RDS DATABASE CONFIG ---
$db_host = 'YOUR_RDS_ENDPOINT';
$db_user = 'admin';
$db_pass = 'YOUR_PASSWORD';
$db_name = 'itemapp';

// Create connection
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($mysqli->connect_error) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    die("Database connection failed: " . $mysqli->connect_error);
}
?>