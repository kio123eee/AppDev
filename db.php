<?php
$servername = "viaduct.proxy.rlwy.net";  // Hostname or IP address
$port = 15223;  // Port number
$username = "root";  // Database username
$password = "TSyEAqhggHUXqkiRPjuDYvHEhNeRyDUu";  // Database password
$dbname = "railway";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
