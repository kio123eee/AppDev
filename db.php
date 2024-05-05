<?php
$servername = "roundhouse.proxy.rlwy.net";
$username = "root";
$password = "TSyEAqhggHUXqkiRPjuDYvHEhNeRyDUu";
$dbname = "railway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
