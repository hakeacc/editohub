<?php
// Secure Session Start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database Connection Details
$servername = "sql113.infinityfree.com";
$username = "if0_41074514";
$password = "E7go1H92xICC";
$dbname = "if0_41074514_editohubdata";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL Security
function clean($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($data)));
}

// --- PRODUCTION MODE ACTIVATED ---
// This hides backend errors from the public to prevent server mapping by hackers.
error_reporting(E_ALL);
ini_set('display_errors', 0); 
ini_set('log_errors', 1);
?>
