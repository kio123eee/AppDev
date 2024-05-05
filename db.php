<?php
$servername = "mysql:host=viaduct.proxy.rlwy.net;port=15223;dbname=railway";
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
