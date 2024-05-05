<?php
$db_name = 'mysql:host=viaduct.proxy.rlwy.net;port=15223;dbname=railway';
$user_name = 'root'; // Replace 'your_mysql_username' with your actual MySQL username
$user_password = 'TSyEAqhggHUXqkiRPjuDYvHEhNeRyDUu'; // Use your MySQL password here

$conn = new PDO($db_name, $user_name, $user_password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
