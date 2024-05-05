<?php
$db_host = 'viaduct.proxy.rlwy.net'; // Hostname or IP address of your MySQL server
$db_port = '15223'; // Port number for MySQL (default is 3306)
$db_name = 'railway'; // Name of your MySQL database
$user_name = 'root'; // Replace 'root' with your actual MySQL username
$user_password = 'TSyEAqhggHUXqkiRPjuDYvHEhNeRyDUu'; // Use your MySQL password here

try {
    $conn = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $user_name, $user_password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optional: Set charset if needed
    $conn->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
